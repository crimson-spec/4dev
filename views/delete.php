<?php

use Src\Controllers\ControllerDelete;
use Src\Classes\Routes;

$table = Routes::getRoute(0);
$id = Routes::getRoute(1);

if(empty($table) || empty($id)){
    $null['data'] = array(null);
    empty($id)?$message='Dados insuficientes para deletar dados!':$message='url sintaxe error';
    $status = [
        "status" => "failed",
        "message" => $message,
        "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
    ];
    $null['info'] = $status;
    echo json_encode($null);
}else{
    $delete = new ControllerDelete($table, $id);
}