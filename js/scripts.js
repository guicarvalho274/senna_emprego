$(window).on('load', function(){
    $('#preload-criacao').find('img').fadeOut();
    $('#preload-criacao').delay(600).fadeOut('slow');
    $('body').delay(600).css({'overflow-y': 'scroll'});
});

$(document).ready(function(){
    var caminho = $('body').data('path');
    /**Variaveis de cerficiação */
    var nomeVerificacao;
    var whatsAppVerificacao;
    var experienciaVerificacao;
    var emailVerificacao;

    /**Variaveis de valores */
    var valorNome;
    var valorWhatsApp;
    var valorExperiencia;
    var valorEmail;

    $('#nome').keyup(function(){
        var valor = $(this).val();
        if(valor.length <= 1){
            nomeVerificacao = false;
        }else{
            nomeVerificacao = true;
        }
    })

    $('#whatsapp').keypress(function(){
        var valor = $(this).val();
        var input = $(this);
        if(valor.length === 0){
            input.val('('+valor)
        }else if(valor.length === 3){
            input.val(valor+') ')
        }else if(valor.length === 6){
            input.val(valor+' ')
        }else if(valor.length === 11){
            input.val(valor+'-')
        }

        if(valor.length < 13){
            whatsAppVerificacao = false;
        }else{
            whatsAppVerificacao = true;
        }
    });

    $('#experiencia').on('change', function(){
        if(!$(this)){
            experienciaVerificacao = false;
        }else{
            experienciaVerificacao = true;
        }
    });

    $('#email').on('keypress',function(){
        var email = $(this).val()
        if(email.match(/([a-z0-9-_.]{1,})+@+([a-z.]){1,}$/)){
            emailVerificacao = true;
        }else{
            emailVerificacao = false;
        }
    });

    $('form').on('submit', function(event){
        event.preventDefault();
        valorNome = $('#nome').val();
        valorWhatsApp = $('#whatsapp').val();
        valorExperiencia = $('#experiencia').val();
        valorEmail = $('#email').val();
        const valorToken = $('#token').val();
        if(nomeVerificacao && whatsAppVerificacao && experienciaVerificacao && emailVerificacao){
            $.ajax({
                'beforeSend': function(){
                    $('#loading').fadeIn();
                    $('#btn-action-form').css('opacity','0');
                },
                'url': caminho+'ajax/enviar_dados.php',
                'type': 'POST',
                'dataType':'json',
                'data': {
                    acao: 'true',
                    nome: valorNome,
                    whatsapp: valorWhatsApp,
                    experiencia: valorExperiencia,
                    email: valorEmail,
                    token: valorToken
                }
            }).done(function(response){
                if(response.status == 'sucesso'){
                    $('#loading').fadeOut();
                    $('#btn-action-form').css('opacity','1');
                    addCallback('callback','Deu tudo certo!', 'Os dados foram enviados e iremos entrar em contato com você em breve.','sucesso')
                }else{
                    $('#loading').fadeOut();
                    $('#btn-action-form').css('opacity','1');
                    addCallback('callback', 'Erro em nosso sistema.','Os dados não foram enviados. Existe um erro em nossa base que iremos corrigir o mais breve possivel.','error')
                }
            })
        }else{
            addCallback('callback', 'Verifique suas credenciais!','Os dados não foram enviados. Verifique se você não deixou algum vázio ou informou errado.','error')
        }
    })

    /**functions */
    function addCallback(classe, titulo, texto, tipoDeClasse){
        $('.'+classe).removeClass('sucesso');
        $('.'+classe).removeClass('error');
        $('.'+classe).find('h2').html(titulo);
        $('.'+classe).find('p').html(texto);
        $('.'+classe).addClass(tipoDeClasse);
        $('.'+classe).css({
            'opacity': '1',
            'top': '30px',
            'z-index': '1000'
        });
        setTimeout(function(){
            $('.'+classe).css({
                'top': '0px',
                'opacity': '0',
                'z-index': '-1'
            });
        }, 6000)
    }
})