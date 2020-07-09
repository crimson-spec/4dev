<?php

namespace Src\Controllers;

use Src\Models\Register;
use DateTime;
use DateTimeZone;

class ControllerRegister extends Register{

    public function __construct($register)
    {
        $return = array($register);
        $post = $this->setData($register['idCategory'], $register['name'], $register['price']);

        if($post){            
            $status = [
                "status" => "success",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($return, $status);
            echo json_encode($return);
        }else{
            $status = [
                "status" => "failed",
                "message" => "dados insuficientes",
                "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
            ];
            array_push($return, $status);
            echo json_encode($return);
        }
    }

}



