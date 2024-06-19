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
<body>
    <?php
        if($url == 'home'){
            require_once('page/home.php');
        };
    ?>
</body>
</html>