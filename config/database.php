<?php
class Database
{
    private $host = "localhost";
    private $db_name = "blog_crud";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection Failed: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}