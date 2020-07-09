<?php

namespace Src\Controllers;

use Src\Models\Update;
use Src\Models\Consult;
use DateTime;
use DateTimeZone;

class ControllerUpdate extends Update{

    public function __construct($update)
    {
        $return = $this->setUpdate($update);
        $data = new Consult;
        $data = $data->getOneData($update['id']);
        if($return){
            $response = array($data);
            $status = [
                "status" => "success",
                "message" => "Item alterado",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($response, $status);
            echo json_encode($response);
        }else{
            $response = array(null);
            $status = [
                "status" => "failed",
                "message" => "Erro ao encontrar item",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($response, $status);
            echo json_encode($response);
        }
    }

}


