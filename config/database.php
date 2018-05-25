<?php
namespace MusicCd\Config;


class Database
{
 
    // specify your own database credentials
    private $host       = "127.0.0.1";
    private $db         = "mycd";
    private $username   = "root";
    private $password   = "";
    private $port       = "3307"; // using Maria DB
    public  $conn;
 
    // get the database connection
    public function getConnection()
    {
 
        $this->conn = null;
 
        try {
            $this->conn = new \PDO("mysql:host=" . $this->host . ";port=".$this->port.";dbname=" . $this->db, $this->username, $this->password);
            $this->conn->exec("set names utf8");
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            // prevent emulation of prepared statements
            $this->conn->setAttribute(\PDO::ATTR_EMULATE_PREPARES, false);
        } catch (\PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->conn;
    }
}