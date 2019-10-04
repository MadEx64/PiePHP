<?php
namespace Core;

use PDO;

class Database
{
    private $pdo;
    private $hostname = "localhost";
    private $username = "root";
    private $password = "root";

    public function __construct() {

        try {
            $this->pdo = new PDO("mysql:host=$this->hostname;dbname=PiePHP;charset=utf8", $this->username, $this->password, [
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        }
        catch(PDOException $e)  {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}
