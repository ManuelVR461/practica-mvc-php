<?php
include_once 'models/alumno.php';

class ConsultaModel extends Model{
    public function __contruct(){
        parent::__contruct();

    }
    public function consulta(){
        try {
            $items = [];

            $query = $this->db->connect()->query(
                'SELECT * FROM alumnos'
            );
            while($row = $query->fetch()){
                $item = new Alumno;
                $item->id = $row['id'];
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];

                array_push($items,$item);
            }
            return $items;
        } catch (PDOException $e) {
            echo $e->getMesage();
            return [];
        }
        

    }


    public function getById($idAlumno){
        try {
            $item = new Alumno;
            $query = $this->db->connect()->prepare(
                'SELECT * FROM alumnos WHERE matricula = :matricula'
            );
            $query->execute(['matricula' => $idAlumno]);
            while($row = $query->fetch()){
                $item->matricula = $row['matricula'];
                $item->nombre = $row['nombre'];
                $item->apellido = $row['apellido'];
            }
            return $item;
        } catch (PDOException $e) {
            echo $e->getMesage();
            return [];
        }
    }

    public function update($item){
        try {
            $query = $this->db->connect()->prepare(
                'UPDATE alumnos SET nombre=:nombre,apellido=:apellido WHERE matricula = :matricula'
            );

            $query->execute([
                'matricula'=>$item['matricula'],
                'nombre'=>$item['nombre'],
                'apellido'=>$item['apellido']
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMesage();
            return false;
        }
        
    }

    public function delete($matricula){
        try {
            $query = $this->db->connect()->prepare(
                'DELETE FROM alumnos WHERE matricula = :matricula'
            );

            $query->execute([
                'matricula'=>$matricula
            ]);
            return true;
        } catch (PDOException $e) {
            echo $e->getMesage();
            return false;
        }
    }
}