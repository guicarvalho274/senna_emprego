# Landing Page | Senna Veículos
Criação de landing page que tem como foco a captura de lead para envio de informações a um banco de dados e com metodo de envio para o Trello.
---
1. ```Estrutura logica:``` Esse sistema tem como foco a captação de dados dos usuarios para inclusão no banco de dados e metdodo proprio para envio ao trello. 
Estamos utilizando essas linguagens:

| LINGUAGEM | FRAMEWORK |
|----------:|------------|
| PHP | PHP PURO |
| JAVASCRIPT | JQUERY |

Dentro do PHP temos alguns metodos de segurança e para envio de requisições por ajax.

Dentro do index estamos adicionado o arquivo para renderização de acordo com a url apresentada no navegador:
```php
    <?php
        if($url == 'home'){
            require_once('pages/home.php');
        };
    ?>
```

Dentro de toda estrutura logica temos algumas classes de acesso... Dentro dela temos a classe **Site.php** que é a responsável por cuidar, proteger e gerenciar as demandas do site de forma totalmente estática.

2. ```Estilos:``` O estilo da pagina é trabalhada totalmente em display flex, todo o conteúdo atualizado na medidade de .px e totalmente responsivo utilizando media queries e adpatável a todas as telas. Criamos um mini-framework para bloqueo de tamanho e trabalho com o flex:
```css
/*Framework*/
.container{
    padding: 0 4%;
    max-width: 1200px;
    margin: 0 auto;
}

.flex{
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
}
/*Framework*/
```