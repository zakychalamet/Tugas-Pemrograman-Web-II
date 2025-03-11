<?php
require_once __DIR__ . '/../models/Order.php';

class OrderController {
    private $orderModel;

    public function __construct() {
        $this->orderModel = new Order();
    }

    public function index() {
        $orders = $this->orderModel->getAllOrders();
        return $orders;
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->orderModel->createOrder($_POST['customer_id'], $_POST['order_date']);
            header("Location: ../views/customers/index.php");
        } else {
            include __DIR__ . '/../views/orders/create.php';
        }
    }

    public function update($id) {
        $user = $this->orderModel->getOrderById($id);
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->orderModel->updateOrder($id, $_POST['customer_id'], $_POST['order_date']);
            header("Location: ../views/customers/index.php");
        } else {
            include __DIR__ . '/../views/orders/update.php';
        }
    }

    public function delete($id) {
        $this->orderModel->deleteOrder($id);
        header("Location: ../views/customers/index.php");
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'create'){
    $order = new OrderController();
    $order->create();
}
