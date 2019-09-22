<?php

class Main extends Controller{

    function __construct(){
        parent::__construct();
        $this->views->mensaje = "envio de mensaje desde el controlador main a la vista home";
        
    }

    function render(){
        $this->views->render('home');
    }

    function saludo(){
        echo "metodo saludo";
    }
    
}