<?php

namespace Src\Controllers;

use Src\Models\Update;

class ControllerUpdate extends Update{

    public function __construct($update)
    {
        $return = $this->setUpdate($update);
        if($return){
            echo json_encode("Item Alterado!");
        }else{
            echo json_encode("Erro ao encontrar item");
        }
    }

}


