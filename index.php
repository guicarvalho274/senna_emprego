<?php
    require_once('config.php');
    $url = isset($_GET['url']) ? $_GET['url'] : 'home';
    Site::reloadPage($url, 'home', 'page');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senna - Emprego</title>
</head>
<body>
    
</body>
</html>