<?php

use Src\Controllers\ControllerConsult;

/**
 * Treating the variables
 */

use Src\Classes\Routes;

$table = Routes::getRoute(0);
$id = Routes::getRoute(1);

$get = new ControllerConsult($table, $id);
