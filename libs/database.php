<?php


class Database {
    private $host;
    private $db;
    private $user;
    private $pwd;
    private $charset;

    public function __construct(){
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->pwd = constant('PASSWORD');
        $this->charset = constant('CHARSET');
    }

    function connect(){
        try {
            $cnx = "mysql:host=".$this->host.";dbname=".$this->db.";charset=".$this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => FALSE,
            ];
            $pdo = new PDO($cnx, $this->user,$this->pwd,$options);
            return $pdo;
        } catch (PDOException $e) {
            print_r("Error conexion: ".$e->getMessage());
        }
    }
}