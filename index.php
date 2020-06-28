<?php

require_once 'config/config.php';
require_once 'vendor/autoload.php';

$method = $_SERVER['REQUEST_METHOD'];

$new = new Src\Classes\Pages($method);
