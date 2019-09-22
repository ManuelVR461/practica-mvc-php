<?php

class Ayuda extends Controller{

    function __construct(){
        parent::__construct();
        $this->views->mensaje = "Modulo de Ayuda";
    }

    function render(){
        //$this->views->render('ayuda');
    }

    function saludo(){
        echo "metodo saludo";
    }
    
}