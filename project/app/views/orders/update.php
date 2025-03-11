<?php
require_once __DIR__ . '/../../controllers/OrderController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $productController = new OrderController();
    $product = $productController->getProduct($id);
} 
?>

<a href="index.php">Kembali</a>
<form action="../../controllers/OrderController.php?action=update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($product['id'] ?? '') ?>">
    <input type="number" name="customer_id" placeholder="Customer ID" value="<?= htmlspecialchars($product['name'] ?? '') ?>">
    <input type="date" name="order_date" placeholder="Tanggal Order">
    <input type="submit" name="submit" value="Perbarui Order">
</form>