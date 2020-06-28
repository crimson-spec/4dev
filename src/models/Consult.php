<?php

namespace Src\Models;

use Src\Models\Connect;

class Consult extends Connect{
    private $data;

    public function getData($table = "products"){
        $this->data = $this->connection()->prepare("SELECT * FROM {$table}");
        $this->data->execute();
        if($this->data->rowCount()>0){
            return $this->data;
        }else{
            return false;
        exit;
        }
        
    }
}