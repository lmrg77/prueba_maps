<?php

class App{
    
    function __construct(){
        require_once 'controllers/errores.php';

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        //cuando se ingresa sin definir un controlador
        if(empty($url[0])){
            $archivoControlador = 'controllers/main.php';
            require_once $archivoControlador;
            $controlador = new Main();
            $controlador->loadModel('main');
            $controlador->render();
            return false;
        }

        $archivoControlador = 'controllers/' . $url[0].'.php';

        if(file_exists($archivoControlador)){
            require_once $archivoControlador;

            //inicializa el controlador
            $controlador = new $url[0];
            $controlador->loadModel($url[0]);



            // si hay un metodo que se requiere cargar
            if(isset($url[1])){
                $controlador->{$url[1]}();
            }else{
                $controlador->render();
            }
        }else{
            $controlador = new Errores();
        }
    }
}

?>