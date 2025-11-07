<?php
include 'db_connect.php';

$sql = "SELECT inventory_id, product_id, product_name, category, price, stock FROM inventory";
$result = $conn->query($sql);

$inventory = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $inventory[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($inventory);
$conn->close();
?>