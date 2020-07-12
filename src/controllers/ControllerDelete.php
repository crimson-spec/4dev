<?php

namespace Src\Controllers;

use Src\Models\Delete;
use Src\Models\Consult;
use DateTimeZone;
use DateTime;

class ControllerDelete extends Delete{

    public function __construct($table = "products", $id = null)
    {
        $data = new Consult;
        $data = $data->getOneData($id, $table);
        ($data)?$response['data']=$data->fetch(\PDO::FETCH_OBJ):$response['data']=[null];
        $return = $this->setDelete($id);
        if($return){
            $status = [
                "status" => "success",
                "message" => "Item deletado",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            $response['info'] = $status;
            echo json_encode($response);
        }else{
            $status = [
                "status" => "failed",
                "message" => "Erro ao deletar item",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            $response['info'] = $status;
            echo json_encode($response);
        }
    }

}

