<?php
require_once __DIR__ . '/../../controllers/CustomerController.php';
require_once __DIR__ . '/../../controllers/OrderController.php';
$customerController = new CustomerController();
$customers = $customerController->index();
$orderController = new OrderController();
$orders = $orderController->index();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customers & Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1 class="mb-4">Customers</h1>
    <a href="create.php" class="btn btn-primary mb-3">Tambah Customer</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Operasi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($customers)): ?>
                <?php foreach ($customers as $customer): ?>
                    <tr>
                        <td><?= htmlspecialchars($customer['id']); ?></td>
                        <td><?= htmlspecialchars($customer['name']); ?></td>
                        <td><?= htmlspecialchars($customer['email']); ?></td>
                        <td><?= htmlspecialchars($customer['phone']); ?></td>
                        <td>
                            <a href="update.php?id=<?= $customer['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="../../controllers/CustomerController.php?action=delete&id=<?= $customer['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus customer?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="5" class="text-center">Customer tidak ditemukan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <h1 class="mt-5">Orders</h1>
    <a href="../create.php" class="btn btn-primary mb-3">Tambah Order</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Customer ID</th>
                <th>Tanggal Order</th>
                <th>Operasi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($orders)): ?>
                <?php foreach ($orders as $order): ?>
                    <tr>
                        <td><?= htmlspecialchars($order['id']); ?></td>
                        <td><?= htmlspecialchars($order['customer_id']); ?></td>
                        <td><?= htmlspecialchars($order['order_date']); ?></td>
                        <td>
                            <a href="../orders/update.php?id=<?= $order['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="../../controllers/OrderController.php?action=delete&id=<?= $order['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus order?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr><td colspan="4" class="text-center">Order tidak ditemukan.</td></tr>
            <?php endif; ?>
        </tbody>
    </table>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>