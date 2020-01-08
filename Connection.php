<?php

class Connection
{
    public $con;
    private $host = "localhost";
    private $dbname = "keamanan_data";
    private $username = "root";
    private $password = "";
    private $options = [
        PDO::ATTR_EMULATE_PREPARES   => false, // turn off emulation mode for "real" prepared statements
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //turn on errors in the form of exceptions
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, //make the default fetch be an associative array
    ];

    public function __construct()
    {
        try {
            $this->con = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password, $this->options);
            return $this;
        } catch (PDOException $th) {
            return new Error($th->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->con;
    }
}
