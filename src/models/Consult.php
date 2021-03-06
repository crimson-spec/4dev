<?php

namespace Src\Models;

use Src\Models\Connect;

class Consult extends Connect{
    private $data;

    public function getData($table = "products")
    {
        if($table == 'users_all'){
            $this->data = $this->connection()->prepare("SELECT u.id, u.first_name, u.last_name, 
            u.email, u.document, a.street, a.number, a.complement FROM users u
            INNER JOIN users_address a ON u.id = a.user_id");
        }else{
            $this->data = $this->connection()->prepare("SELECT * FROM {$table}");
        }
        $this->data->execute();
        if($this->data->rowCount()>0){
            return $this->data;
        }else{
            return false;
        }
        
    }

    public function getOneData($id, $table = "products")
    {
        $this->data = $this->connection()->prepare("SELECT * FROM {$table} WHERE id = :id");
        $this->data->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->data->execute();
        if($this->data->rowCount()>0){
            return $this->data;
        }else{
            return false;
        }
    }
}