<?php

class Consulta extends Controller{

    function __construct(){
        parent::__construct();
        $this->views->mensaje = "";
        $this->views->alumnos = [];
    }

    function render(){
        $alumnos = $this->model->consulta();
        $this->views->alumnos = $alumnos;
        $this->views->render('consulta');
    }

    function verAlumno($param=null){
        //var_dump($param);
        $idAlumno = $param[0];
        $alumno = $this->model->getById($idAlumno);
        session_start();
        $_SESSION['matriculaAlumno']= $alumno->matricula;
        $this->views->alumno = $alumno;
        $this->views->render('detalle');
    }

    function actualizarAlumno(){
        session_start();
        $matricula = $_SESSION['matriculaAlumno'];
        $nombre = isset($_REQUEST['nombre'])?$_REQUEST['nombre']:null;
        $apellido = isset($_REQUEST['apellido'])?$_REQUEST['apellido']:null;
        unset($_SESSION['matriculaAlumno']);
        $res = $this->model->update([
            'matricula'=>$matricula,
            'nombre' => $nombre,
            'apellido' => $apellido
        ]);

        if($res){
            $alumno = new Alumno;
            $alumno->matricula = $matricula;
            $alumno->nombre = $nombre;
            $alumno->apellido = $apellido;
            $this->views->alumno = $alumno;
            $this->views->mensaje="Alumno actualizado correctamente";
        }else{
            $this->views->mensaje="No se pudo actualizar el alumno";
        }
        $this->views->render('detalle');
    }

    function eliminarAlumno($param=null){
        $matricula = $param[0];

        $res = $this->model->delete($matricula);

        if($res){
            //$this->views->mensaje="Alumno eliminado";
            $mensaje="Alumno eliminado";
        }else{
            //$this->views->mensaje="No se pudo eliminar el alumno";
            $mensaje="No se pudo eliminar el alumno";
        }
        //$this->render();
        echo $mensaje;
    }
    
}