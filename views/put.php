<?php

use Src\Controllers\ControllerUpdate;

$json = file_get_contents('php://input');
$data = json_decode($json, 1);

$update = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($update['id']) || empty($update)){
    $null = array(null);
    $status = [
        "status" => "failed",
        "message" => "Item não encontrado ou inexistente",
        "dateNow" => (new DateTime('now', new DateTimeZone('America/Sao_paulo')))->format('d-m-Y, H:i:s')
    ];
    array_push($null, $status);
    echo json_encode($null);
}else{
    $put = new ControllerUpdate($update);
}