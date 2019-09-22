<?php

class Nuevo extends Controller{

    function __construct(){
        parent::__construct();
        $this->views->mensaje = "";
    }

    function render(){
        $this->views->render('nuevo');
    }

    function registrarAlumno(){
        $matricula = isset($_REQUEST['matricula'])?$_REQUEST['matricula']:null;
        $nombre = isset($_REQUEST['nombre'])?$_REQUEST['nombre']:null;
        $apellido = isset($_REQUEST['apellido'])?$_REQUEST['apellido']:null;
        $mensaje = "";
        $res = $this->model->insert([
            'matricula'=>$matricula,
            'nombre'=>$nombre,
            'apellido'=>$apellido
        ]);

        if($res){
            $mensaje = "Nuevo Alumno Insertado";
        }else{
            $mensaje = "no se puedo insertar";
        }
        $this->views->mensaje = $mensaje;
        $this->render();
    }
    
    
}