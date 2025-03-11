<a href="../orders/index.php"></a>
<form action="../../controllers/OrderController.php?action=create" method="POST">
    <input type="number" name="customer_id" placeholder="Customer ID">
    <input type="date" name="order_date" placeholder="Tanggal Order">
    <input type="submit" name="submit" value="Tambah Order">
</form>