<?php
class itemController{
    private $dbConn;
    private $item;


    public function __construct($dbConn, $item){
        $this->dbConn = $dbConn;
        $this->item = $item;
    }
    public function create() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $price = $_POST['price'];
        $category_id = $_POST['category']; 
        $this->item->create($name, $quantity, $price, $category_id);

        echo "Item created successfully!";
    } else {
        $categoryController = new CategoryController($this->dbConn, null);
        $categories = $categoryController->getAllCategory();

        include 'views/items/create.php';
    }
}

     
    public function index() {
        $items = $this->item->read();
        include 'views/items/index.php';
    }

public function update() {
    $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = isset($_POST['id']) ? (int)$_POST['id'] : $id;
        $name = $_POST['name'] ?? '';
        $quantity = $_POST['quantity'] ?? 0;
        $price = $_POST['price'] ?? 0;
        $category_id = $_POST['category'] ?? 0;

        if ($this->item->update($id, $name, $quantity, $price, $category_id)) {
            header("Location: index.php");
            exit;
        } else {
            echo "Update failed.";
        }
    } else {
        $item = $this->item->readOne($id);

        $categoryController = new CategoryController($this->dbConn, null);
        $categories = $categoryController->getAllCategory();

        include 'views/items/edit.php';
    }
}



    public function delete() {
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($this->item->delete($id)) {
            header("Location: index.php");
            exit;
        }
    }
}