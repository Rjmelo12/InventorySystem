<?php
include 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $category = $_POST['category'] ?? null;
    $price = $_POST['price'] ?? null;
    $stock = $_POST['stock'] ?? null;

    if (!$product_id || !$product_name || !$category || !$price || !$stock) {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    $sql = "INSERT INTO product (product_id, product_name, category, price, stock) 
            VALUES ('$product_id', '$product_name', '$category', '$price', '$stock')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Product added successfully!', 'data' => $_POST]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    }
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method!']);
}
?>