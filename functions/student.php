<?php

class Student
{
    private $con;

    public function __construct()
    {
        $config = require __DIR__ . '/../config/database.php';

        // Validate config structure
        if (!is_array($config) || !isset($config['host'], $config['username'], $config['password'], $config['dbname'])) {
            die("Invalid database configuration.");
        }

        // Create MySQLi connection
        $this->con = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['dbname']
        );

        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }

        $this->con->set_charset("utf8mb4");
    }

    public function isConnected(): bool
    {
        return $this->con->ping();
    }

    public function getConnection(): mysqli
    {
        return $this->con;
    }

    public function getAllStudents(): mysqli_result
    {
        return $this->con->query("SELECT * FROM students");
    }

    public function getStudentById(int $id): mysqli_result
    {
        $stmt = $this->con->prepare("SELECT * FROM students WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result();
    }
}