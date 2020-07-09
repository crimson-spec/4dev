<?php

namespace Src\Controllers;

use Src\Models\Delete;
use Src\Models\Consult;
use DateTimeZone;
use DateTime;

class ControllerDelete extends Delete{

    public function __construct($delete)
    {
        $data = new Consult;
        $data = $data->getOneData($delete['id']);
        $return = $this->setUpdate($delete);
        if($return){
            $response = array($data);
            $status = [
                "status" => "success",
                "message" => "Item deletado",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($response, $status);
            echo json_encode($response);
        }else{
            $response = array(null);
            $status = [
                "status" => "failed",
                "message" => "Erro ao deletar item",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($response, $status);
            echo json_encode($response);
        }
    }

}

