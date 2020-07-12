<?php

use Src\Controllers\ControllerUpdate;
use Src\Classes\Routes;

$table = Routes::getRoute(0);
$id = Routes::getRoute(1);

$json = file_get_contents('php://input');
$data = json_decode($json, 1);

$update = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($id) || empty($table) || empty($update)){
    $null['data'] = array(null);
    ($update)?$message='url sintaxe error':$message='Dados insuficientes para realizar alterações!';
    $status = [
        "status" => "failed",
        "message" => $message,
        "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
    ];
    $null['info'] = $status;
    echo json_encode($null);
}else{
    $put = new ControllerUpdate($update, $table, $id);
}