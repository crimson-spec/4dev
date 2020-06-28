<?php

namespace Src\Controllers;

use Src\Models\Delete;

class ControllerDelete extends Delete{

    public function __construct($delete)
    {
        $return = $this->setUpdate($delete);
        if($return){
            echo json_encode("Item Deletado!");
        }else{
            echo json_encode("Erro ao deletar item");
        }
    }

}

