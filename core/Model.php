<?php

class Model
{
    // Property to store the database connection
    protected $db;

    public function __construct()
    {
        // Load database configuration from config/database.php
        $config = require __DIR__ . '/../config/database.php';

        // Create a new MySQLi connection using the config values
        $this->db = new mysqli(
            $config['host'],     // e.g., 'localhost'
            $config['username'], // e.g., 'root'
            $config['password'], // e.g., 'secret'
            $config['database']  // e.g., 'mvc_app'
        );

        // Check if the connection was successful
        if ($this->db->connect_error) {
            // Stop the script and display an error message
            die("Database connection failed: " . $this->db->connect_error);
        }
    }
}
