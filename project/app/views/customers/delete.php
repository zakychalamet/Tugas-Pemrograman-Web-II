<?php
require_once __DIR__ . '/../../controllers/CustomerController.php';

if (isset($_GET['id'])) {
    $controller = new CustomerController();
    $controller->delete();
} else {
    echo "Gagal menghapus.";
}
?>