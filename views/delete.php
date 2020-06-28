<?php

use Src\Controllers\ControllerDelete;

$json = file_get_contents('php://input');
$data = json_decode($json, 1);

$delete = filter_var_array($data, FILTER_SANITIZE_SPECIAL_CHARS);

if(empty($delete['id']) || empty($delete)){
    echo json_encode("Item Não encontrado");
}else{
    $delete = new ControllerDelete($delete);
}