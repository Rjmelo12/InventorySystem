<?php
include 'db_connect.php';

$sql = "SELECT product_id, product_name, category, price, stock FROM product";
$result = $conn->query($sql);

$products = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($products);
$conn->close();
?>