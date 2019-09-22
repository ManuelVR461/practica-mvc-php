<?php
require_once 'controllers/errores.php';

class App{
    function __construct(){
        
        $url = parse_url($_SERVER['REQUEST_URI']);
        $ruta = $url['path'];

        $ruta = rtrim(ltrim($ruta,'/'),'/');
        $partes_ruta = explode('/',$ruta);
        print_r($partes_ruta);
        $nparam = sizeof($partes_ruta);

        if($nparam>1){
            $controllers = './controllers/'.$partes_ruta[1].'.php';
            if(file_exists($controllers)){
                require_once $controllers;
                $controller = new $partes_ruta[1];
                $controller->loadModel($partes_ruta[1]);
                if($nparam>2){
                    if($nparam>3){
                        $param = [];
                        for ($i=3;$i<$nparam;$i++){
                            array_push($param,$partes_ruta[$i]);
                        }
                        $controller->{$partes_ruta[2]}($param);
                    }else{
                        if(isset($partes_ruta[2])){
                            $controller->{$partes_ruta[2]}();
                        }    
                    }
                }else{
                    $controller->render();
                }
                
            }else{
                $controller = new Errores();
            }

        }else{
            $controllers = './controllers/main.php';
            require_once $controllers;
            $controller = new Main();
            $controller->loadModel('main');
            $controller->render();
            return false;
        }

    }
}
?>