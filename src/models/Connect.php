<?php
namespace Src\Models;

abstract class Connect{
    private $instance;

    protected function connection()
    {
        try{
            $this->instance = new \PDO(
                "mysql:host=".DBHOST.";dbname=".DBNAME,
                DBUSER,
                DBPASS
            );

            return $this->instance;
        }catch(\PDOException $exception){
            echo $exception->getMessage();
        }
    }
}