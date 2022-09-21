<?php

namespace App\Models;
use PDO;
use FFI\Exception;

abstract class Model {
protected static ?PDO $connection= null;

public function __construct(){
    if (self::$connection instanceof PDO)return;
    try {
        self::$connection= new PDO(
            'mysql:host=localhost;dbname=todolist;charset=utf8',
            'Cloud',
            'Ethan1109@Arya'
        );
    
        self::$connection->setAttribute(
            PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC
        );
    }
     catch (Exception $e) {
        die("Unable to connect to the database." . $e->getMessage());
    }
    

}


}