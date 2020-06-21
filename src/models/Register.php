<?php

namespace Src\Models;

use Src\Models\Connect;

class Register extends Connect{

    public function setData($category, $name, $price, $table = 'products'){

        $stmt = $this->connection();
        $insert = $stmt->prepare("INSERT INTO {$table} VALUES (null, :category, :name, :price)");
        $insert->bindParam(':category', $category, \PDO::PARAM_INT);
        $insert->bindParam(':name', $name, \PDO::PARAM_STR);
        $insert->bindParam(':price', $price, \PDO::PARAM_STR);
        $insert->execute();
        if($stmt->lastInsertId()){
            return true;
        }else{
            return false;
        }
    }        
}