<?php

class Errores extends Controller{

    function __construct(){
        parent::__construct();
        
        $this->views->mensaje = "Error Detectado";
        $this->views->render("errores");
    }
}