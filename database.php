<?php

class Database {
    
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $name = "beginner";
    
    function __construct($host)
    {
        $this->host = $host;
    }

}