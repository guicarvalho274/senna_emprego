<?php
    class Site{
        public static function reloadPage($page, $pageInicial, $diretorio){
            if($page != $pageInicial){
                $pagina = file_exists($diretorio.'/'.$page.'.php');
                if(!$pagina){
                    header('Location: '.INCLUDE_PATH);
                };
            };
        }
    }
?>