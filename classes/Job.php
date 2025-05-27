<?php
class Job
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM jobs";
        return $this->conn->query($sql);
    }

    public function create($title, $company, $location)
    {
        $stmt = $this->conn->prepare("INSERT INTO jobs (title, company, location) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $title, $company, $location);
        return $stmt->execute();
    }

    public function getOne($id)
    {
        $sql = "SELECT * FROM jobs WHERE id = $id";
        return $this->conn->query($sql)->fetch_assoc();
    }

    public function update($id, $title, $company, $location)
    {
        $stmt = $this->conn->prepare("UPDATE jobs SET title = ?, company = ?, location = ? WHERE id = ?");
        $stmt->bind_param("sssi", $title, $company, $location, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM jobs WHERE id = $id";
        return $this->conn->query($sql);
    }
}
