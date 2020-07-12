<?php

namespace Src\Controllers;

use Src\Models\Update;
use Src\Models\Consult;
use DateTime;
use DateTimeZone;

class ControllerUpdate extends Update{

    public function __construct($update, $table, $id)
    {
        $return = $this->setUpdate($update, $id, $table);
        $data = new Consult;
        $data = $data->getOneData($id);
        ($data)?$response['data']=$data->fetch(\PDO::FETCH_OBJ):$response['data']=[null];
        if($return){
            $status = [
                "status" => "success",
                "message" => "Item alterado",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            $response['info'] = $status;
            echo json_encode($response);
        }else{
            $status = [
                "status" => "failed",
                "message" => "Erro ao encontrar item",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            $response['info'] = $status;
            echo json_encode($response);
        }
    }

}


