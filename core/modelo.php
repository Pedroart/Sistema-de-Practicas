<?php

namespace core;

use mysqli;

class modelo{
    protected $db_host = "localhost";
    protected $db_user = "root";
    protected $db_pass = "";
    protected $db_name = "practicas";

    protected $coneccion;
    protected $query;

    public $table="";

    public function __construct(){
        $this->connection();
    }

    public function connection(){
        $this->coneccion = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);

        if($this->coneccion->connect_error) {
            die('Erros de conexion: '.$this->coneccion->connect_error);
        }
    }

    public function query($sql){
        $this->query = $this->coneccion->query($sql);
        return $this;
    }

    public function first(){
        return $this->query->fetch_assoc();
    }
    public function get(){
        return $this->query->fetch_all(MYSQLI_ASSOC);
    }

    // Consultas

    public function all(){
        $sql = "SELECT * FROM {$this->table}";
        return $this->query($sql)->get();
    }

    public function find($id){
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
        return $this->query($sql)->first();
    }

    public function where($columna,$operador, $valor = null){
        if ($operador == null){
            $valor = $operador;
            $operador = '=';
        }

        $sql = "SELECT * FROM {$this->table} WHERE {$columna} {$operador} '{$valor}'";
        return $this->query($sql);
        
    }

    public function create($data){
        $columnas = implode(', ',array_keys($data));
        $valores  = "'".implode("', '",array_values($data)). "'";

        $sql = "INSERT INTO {$this->table} ({$columnas}) VALUES ({$valores})";

        $this->query($sql);

        return $this->coneccion->insert_id;
    }

    public function update($id,$data){

        $fields = [];

        foreach ($data as $key => $value){
            $fields[]= "{$key} = '{$value}'";
        }
        $fields = implode(', ', $fields);

        $sql = "UPDATE {$this->table} SET {$fields} WHERE id = {$id} ";
        $this->query($sql);

        if ( $this->coneccion->error){
            return [false];
        }
        return [true];
    }

    public function delete($id){
        $sql = "DELETE FROM {$this->table} WHERE id = {$id}";
        $this->query($sql);

        if ( $this->coneccion->error){
            return [false];
        }
        return [true];
    }
}