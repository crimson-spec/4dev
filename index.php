<?php

$method = $_SERVER['REQUEST_METHOD'];

require_once 'config/config.php';
require_once 'vendor/autoload.php';
require_once "views/$method.php";
