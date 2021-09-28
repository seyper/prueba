<?php

    // Verifica que la direccion del archivo vista sea correcta
    function verificar_ruta($url){
        $result = is_file($url);
        return $result;        
    }

    // Comprueba la informacion del get/post para abrir la vista solicitada
    function cargar_vista($view,$action,$direction){

        //========== Si la vista es perfil =========//
        if ($view == 'perfil') {
            require_once 'controllers/control_perfil.php';
            require_once 'views/view-perfil.php';
            die;
        }

        //========== Si la direccion es principal ==========//
        if ($direction == 'principal') {
            if ($action == 'modificar') {
                $url_view = 'views/Modificar/view-'.$view.'-updater.php';
            }else if($action == 'agregar'){
                $url_view = 'views/Agregar/view-'.$view.'-agregar.php';
            }else{
                $url_view = 'views/view-'.$view.'.php';
            }
            $url_controller = 'controllers/control_'.$view.'.php';

        //========== Si la direccion es fichas ==========//
        }elseif ($direction == 'fichas') {  
            if ($action != 'modificar') {
                $url_view = 'views/Fichas/view-fichas-'.$view.'.php';
            }else{
                $url_view = 'views/Fichas/Fichas-modificar/view-fichas-'.$view.'-updater.php';
            }
            $url_controller = 'controllers/control_fichas.php';

        //========== Si la direccion es violencia ==========//
        }elseif ($direction == 'violencia') {   
            if ($action != 'modificar') {
                $url_view = 'views/Violencia/view-violencia-'.$view.'.php';
            }else{
                $url_view = 'views/Violencia/Violencia-modificar/view-violencia-'.$view.'-updater.php';
            }
            $url_controller = 'controllers/control_violencia.php';

        //========== Si la direccion es directorio ==========//
        }elseif ($direction == 'directorio') { 
            if ($action == 'modificar') {
                $url_view = 'views/Directorio/Directorio-modificar/view-directorio-'.$view.'-updater.php';
            }else if($action == 'agregar'){
                $url_view = 'views/Directorio/Directorio-agregar/view-directorio-'.$view.'-agregar.php';
            }
            else{
                $url_view = 'views/Directorio/view-directorio-'.$view.'.php';
            } 
            $url_controller = 'controllers/control_directorio-'.$view.'.php';

        //========== Si la direccion es policias ==========//
        }elseif ($direction == 'policias') { 
            if ($action == 'modificar') {
                $url_view = 'views/Directorio/Directorio-policias/policias-modificar/view-directorio-policias-'.$view.'-updater.php';
            }else if($action == 'agregar'){
                $url_view = 'views/Directorio/Directorio-policias/policias-agregar/view-directorio-policias-'.$view.'-agregar.php';
            }
            else{
                $url_view = 'views/Directorio/Directorio-policias/view-directorio-policias-'.$view.'.php';
            }
            $url_controller = 'controllers/control_directorio-policias-'.$view.'.php';

        }else{
            require_once 'views/view-principal.php';
            die;
        }
        
        //========== Carga la vista y el controlador ==========//
        if (verificar_ruta($url_controller)) {
            require_once $url_controller;
        }else{
            if($action != 'buscar'){
                $alert_color = "danger";
                $alert_text = 'Error no se encontro el controlador en la ruta: "'.$url_controller.'"';
                include 'assets/php/php-alert.php';
            }
        }

        if (verificar_ruta($url_view)) {
            require_once $url_view;
        }else{
            $alert_color = "danger";
            $alert_text = 'Error no se encontro la pagina en la ruta: "'.$url_view.'"';
            include 'assets/php/php-alert.php';
        }
    }

?>