<?php
class Users
{
    private $con;

    public function __construct()
    {
        $this->con = mysqli_connect("localhost", "root", "", "oop_mydb");
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
    }

    public function getConnection()
    {
        return $this->con;
    }

    //  Moved inside the class
    public function fetchUsers()
    {
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->con, $query);

        if (!$result) {
            die("Query failed: " . mysqli_error($this->con));
        }

        return $result;
    }

    // This is to get the data of a user by ID
    public function getUserById($id)
    {
        $stmt = $this->con->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // return associative array
    }

    //This is to update the data
    public function updateUser($name, $email, $id)
    {
        $stmt = $this->con->prepare("UPDATE users SET name=?, email=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $email, $id);
        return $stmt->execute();
    }

    //delete
    public function deleteUser($id)
    {
        $stmt = $this->con->prepare("DELETE FROM users WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}