<?php

namespace Src\Controllers;

use DateTime;
use DateTimeZone;
use Src\Models\Consult;

class ControllerConsult extends Consult{

    public function __construct($table = "products")
    {
        $data = $this->getData($table);
        ($data)?$consult = $data->fetchAll(\PDO::FETCH_ASSOC):$consult = [null];
        if ($data){
            $status = [
                "status" => "success",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($consult, $status);
            echo json_encode($consult);
        }else{
            $status = [
                "status" => "failed",
                "message" => "tabela inválida",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($consult, $status);
            echo json_encode($consult);
        }
    }
}