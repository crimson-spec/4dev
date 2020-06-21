<?php

/**
 * Treating the variables
 */

use Src\Controllers\ControllerRegister;

if(isset($_POST['name'])){
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $name = null;
}

if(isset($_POST['category'])){
    $category = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $category = null;
}

if(isset($_POST['price'])){
    $price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $price = null;
}

$json = json_encode($_POST);

echo $json;

//$post = new ControllerRegister($category, $name, $price);