<?php

use Src\Controllers\ControllerConsult;

/**
 * Treating the variables
 */

if(isset($_GET['get'])){
    $table = filter_input(INPUT_GET, 'get', FILTER_SANITIZE_SPECIAL_CHARS);
}else{
    $table = "products";
}

$get = new ControllerConsult($table);
