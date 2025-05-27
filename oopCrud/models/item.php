<?php
class Item
{
    private $conn;
    private $table = 'items';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function create($name, $quantity, $price, $category_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO items (name, quantity, price, category_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sidi", $name, $quantity, $price, $category_id);
        $result =  $stmt->execute();
        return $result;
    }
    public function read()
    {
        $query = "
        SELECT items.*, categories.name AS category
        FROM items
        LEFT JOIN categories ON items.category_id = categories.id
    ";
        $result = $this->conn->query($query);

        $items = [];
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
        return $items;
    }

    public function readOne($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $stmt->close();
        return $row;
    }

    public function update($id, $name, $quantity, $price, $category_id)
    {
        $stmt = $this->conn->prepare("UPDATE items SET name = ?, quantity = ?, price = ?, category_id = ? WHERE id = ?");
        $stmt->bind_param("sidii", $name, $quantity, $price, $category_id, $id);
        return $stmt->execute();
    }


    public function delete($id)
    {
        $id = (int)$this->conn->real_escape_string($id);
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}