<?php

namespace Src\Classes;

class Routes{
    public static function getRoute($param)
    {
        $url = explode("/", rtrim($_GET['get']),FILTER_SANITIZE_URL);
        return isset($param)?$url[$param]:$url;
    }
}