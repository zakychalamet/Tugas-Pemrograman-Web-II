<?php
require_once __DIR__ . '/../../config/database.php';

class Order {
    private $pdo;

    public function __construct(){
        $this->pdo = Database::getInstance()->getConnection();
    }
    public function getAllOrders() {
        $stmt = $this->pdo->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function createOrder($customer_id, $order_date) {
        $stmt = $this->pdo->prepare("INSERT INTO orders (customer_id, order_date) VALUES (?, ?)");
        return $stmt->execute([$customer_id, $order_date]);
    }

    public function getOrderById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateOrder($id, $customer_id, $order_date) {
        $stmt = $this->pdo->prepare("UPDATE orders SET customer_id=?, order_date=? WHERE id=?");
        return $stmt->execute([$customer_id, $order_date, $id]);
    }

    public function deleteOrder($id) {
        $stmt = $this->pdo->prepare("DELETE FROM orders WHERE id = ?");
        return $stmt->execute([$id]);
    }
}