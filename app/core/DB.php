<?php
class ConnectDB {
    private $host = "localhost";
    private $port = "3306"; 
    private $username = "root";
    private $password = "";
    private $database = "68pm4";
    protected $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";port=" . $this->port . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
        return $this->conn;
    }
}