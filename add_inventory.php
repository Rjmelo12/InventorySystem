<?php
include 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inventory_id = $_POST['inventory_id'] ?? null;
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $category = $_POST['category'] ?? null;
    $price = $_POST['price'] ?? null;
    $stock = $_POST['stock'] ?? null;

    if (!$inventory_id || !$product_id || !$product_name || !$category || !$price || !$stock) {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    $sql = "INSERT INTO inventory (inventory_id, product_id, product_name, category, price, stock) 
            VALUES ('$inventory_id', '$product_id', '$product_name', '$category', '$price', '$stock')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Inventory added successfully!', 'data' => $_POST]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    }
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method!']);
}
?>