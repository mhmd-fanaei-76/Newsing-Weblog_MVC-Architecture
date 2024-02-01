<?php
namespace App\DataBase;
interface DatabaseConnectionInterface{
    public function connection() : \PDO;

}





?>