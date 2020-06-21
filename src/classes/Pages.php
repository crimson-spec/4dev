<?php

namespace Src\Classes;

class Pages{

    public function __construct($page)
    {
        require_once "views/$page.php";
    }
}