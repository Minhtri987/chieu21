<?php
class OrderModel {
    private $conn;
    private $table_name = "orders";

    public function __construct($db) {
        $this->conn = $db;
    }
    public function getOrderItems($orderId) {
        $query = "SELECT * FROM orderdetails WHERE orderID = :orderId";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':orderId', $orderId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function createOrder($name, $phone, $address, $email, $products, $username)
    {
        $errors = [];
        if (empty($name)) {
            $errors['name'] = 'Name is required';
        }
        if (empty($phone)) {
            $errors['phone'] = 'Phone number is required';
        }
        if (empty($address)) {
            $errors['address'] = 'Address is required';
        }
        if (empty($email)) {
            $errors['email'] = 'Address is required';
        }
        if (empty($products)) {
            $errors['product'] = 'No product in list';
        }
        if (count($errors) > 0) {
            return $errors;
        }
        $query = "INSERT INTO " . $this->table_name . " (name, phone, address, email, username) VALUES (:name, :phone, :address, :email, :username)";
        $stmt = $this->conn->prepare($query);
        $name = htmlspecialchars(strip_tags($name));
        $phone = htmlspecialchars(strip_tags($phone));
        $address = htmlspecialchars(strip_tags($address));
        $email = htmlspecialchars(strip_tags($email));
        $username = htmlspecialchars(strip_tags($username));
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);
        if ($stmt->execute()) {
            $orderID = $this->conn->lastInsertId();
            foreach ($products as $product) {
                $this->insertOrderDetails($orderID, $product->id, $product->quantity);
            }
            return true;
        }

        return false;
    }
    function insertOrderDetails($orderID, $productID, $quantity)
    {
        $checkQuery = "SELECT id FROM " . $this->table_name . " WHERE id = :orderID";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bindParam(':orderID', $orderID);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            $query = "INSERT INTO orderdetails (orderID, productID, quantity) VALUES (:orderID, :productID, :quantity)";
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(':orderID', $orderID);
            $stmt->bindParam(':productID', $productID);
            $stmt->bindParam(':quantity', $quantity);

            if ($stmt->execute()) {
                return true;
            }
        }

        return false;
    }
    function getOrdersByRole($role, $username = null) {
        if ($role === 'admin') {
            $query = "SELECT * FROM orders";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } else {
            $query = "SELECT * FROM orders WHERE username = :username";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
}