<?php

use Src\Controllers\ControllerRegister;

$json = file_get_contents('php://input');
$data = json_decode($json, 1);

$args =  [
    "idCategory" => FILTER_SANITIZE_NUMBER_INT,
    "name" => FILTER_SANITIZE_SPECIAL_CHARS,
    "price" => FILTER_SANITIZE_SPECIAL_CHARS
];

$register = filter_var_array($data, $args);

$post = new ControllerRegister($register['idCategory'], $register['name'], $register['price']);
