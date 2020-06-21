<?php

namespace Src\Controllers;

use Src\Models\Register;

class ControllerRegister extends Register{

    public function __construct($category, $name, $price)
    {
        $this->setData($category, $name, $price);
    }

}



