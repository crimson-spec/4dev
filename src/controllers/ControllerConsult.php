<?php

namespace Src\Controllers;

use Src\Models\Consult;

class ControllerConsult extends Consult{

    public function __construct($table = "products")
    {
        $data = $this->getData($table);
        $data = json_encode($data->fetchAll(\PDO::FETCH_ASSOC));
        if ($data){
            echo $data;
        }else{
            echo json_encode("Tabela Inválida!");
        }
    }
}