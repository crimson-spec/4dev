<?php

namespace Src\Controllers;

use DateTime;
use DateTimeZone;
use Src\Models\Consult;

class ControllerConsult extends Consult{

    public function __construct($table = "products", $id = null)
    {
        if($id){
            $data = $this->getOneData($id, $table);
            ($data)?$consult['data'] = $data->fetch(\PDO::FETCH_OBJ):$consult['data'] = [null];
        }else{
            $data = $this->getData($table);
            ($data)?$consult['data'] = $data->fetchAll(\PDO::FETCH_OBJ):$consult['data'] = [null];
        }
        if ($data){
            $status = [
                "status" => "success",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            $consult['info'] = $status;
            echo json_encode($consult);
        }else{
            $status = [
                "status" => "failed",
                "message" => "tabela ou item inválido(s)",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            $consult['info'] = $status;
            echo json_encode($consult);
        }
    }
}