<?php
require_once __DIR__ . '/../../controllers/OrderController.php';

if (isset($_GET['id'])) {
    $controller = new OrderController();
    $controller->delete();
} else {
    echo "Invalid request.";
}
?>