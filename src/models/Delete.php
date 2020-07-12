<?php

namespace Src\Models;

use Src\Models\Connect;

class Delete extends Connect{
    private $data;

    public function setDelete($id, $table = "products"){
        $this->data = $this->connection()->prepare("SELECT * FROM {$table} WHERE id = :id");
        $this->data->bindParam(":id", $id, \PDO::PARAM_INT);
        $this->data->execute();
        if($this->data->rowCount()>0){
            $this->data = $this->connection()->prepare("DELETE FROM {$table} WHERE id = :id");
            $this->data->bindParam(":id", $id, \PDO::PARAM_INT);
            $this->data->execute();
            return true;
        }else{
            return false;
        }
        
    }
}