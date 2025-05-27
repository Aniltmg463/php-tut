<?php
class CategoryController {
    private $dbConn;
    private $category;

    public function __construct($dbConn, $category) {
        $this->dbConn = $dbConn;
        $this->category = $category;
    }

    public function getAllCategory() {
        $query = "SELECT * FROM categories";
        $result = $this->dbConn->query($query);
        $categories = [];
        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
        return $categories;
    }
}