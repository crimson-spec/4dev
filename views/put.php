<?php

use Src\Controllers\ControllerUpdate;

$json = file_get_contents('php://input');
$data = json_decode($json, 1);

$update = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($update['id']) || empty($update)){
    echo json_encode("Item Não encontrado");
}else{
    $put = new ControllerUpdate($update);
}