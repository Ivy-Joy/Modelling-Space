<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'modelling');

class Database
{
    public function Connect()
    {
        
        $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // Check connection
        if ($conn === false) {
            die("ERROR: Could not connect. " . $conn->connect_error);
        }else {
            return $conn;
        }
    }
}
