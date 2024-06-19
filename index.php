<?php
    require_once('config.php');
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    Site::reloadPage($url, 'home', 'page');
    $clientId = uniqid();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo INCLUDE_PATH;?>style/style.css">
    <title>Senna - Emprego</title>
</head>
<body data-path="<?php echo INCLUDE_PATH;?>">
    <div id="preload-criacao">
        <img src="<?php echo INCLUDE_PATH;?>imagens/preload-img.png" alt="">
    </div><!--preload-criação-->

    <div class="callback sucesso">
        <h2></h2>
        <p></p>
    </div><!--callback-->
    <?php
        if($url == 'home'){
            require_once('page/home.php');
        };
    ?>

    <script src="<?php echo INCLUDE_PATH;?>js/jquery.js"></script>
    <script src="<?php echo INCLUDE_PATH;?>js/scripts.js"></script>
</body>
</html>