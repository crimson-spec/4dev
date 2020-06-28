<?php

namespace Src\Models;

use Src\Models\Connect;

class Update extends Connect{
    private $data;

    public function setUpdate($update, $table = "products"){
        $this->data = $this->connection()->prepare("SELECT * FROM {$table} WHERE id = :id");
        $this->data->bindParam(":id", $update['id'], \PDO::PARAM_INT);
        $this->data->execute();
        if($this->data->rowCount()>0){
            for($i=1; $i<count($update); $i++){
                $row = array_keys($update)[$i];
                $this->data = $this->connection()->prepare("UPDATE {$table} SET {$row} = :var1 WHERE id = :id");
                $this->data->bindParam(':var1', $update[$row], \PDO::PARAM_STR);
                $this->data->bindParam(":id", $update['id'], \PDO::PARAM_INT);
                $this->data->execute();
            }
            return true;
        }else{
            return false;
        }
        
    }
}