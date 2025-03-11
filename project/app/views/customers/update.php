<?php
require_once __DIR__ . '/../../controllers/CustomerController.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $customerController = new CustomerController();
    $customer = $customerController->getCustomer($id);
} 
?>

<a href="index.php">Kembali</a>
<form action="../../controllers/CustomerController.php?action=update" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($customer['id'] ?? '') ?>">
    <input type="text" name="name" placeholder="Nama Customer" value="<?= htmlspecialchars($customer['name'] ?? '') ?>">
    <input type="text" name="email" placeholder="Email" value="<?= htmlspecialchars($customer['email'] ?? '') ?>">
    <input type="number" name="phone" placeholder="Nomor Telepon" value="<?= htmlspecialchars($customer['phone'] ?? '') ?>">
    <input type="submit" name="submit" value="Perbarui Customer">
</form>