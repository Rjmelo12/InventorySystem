<?php
include 'db_connect.php'; // Include the database connection

header('Content-Type: application/json'); // JSON response

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $order_id = $_POST['order_id'] ?? null;
    $customer_id = $_POST['customer_id'] ?? null;
    $customer_name = $_POST['customer_name'] ?? null;
    $product_id = $_POST['product_id'] ?? null;
    $product_name = $_POST['product_name'] ?? null;
    $quantity = $_POST['quantity'] ?? null;
    $price = $_POST['price'] ?? null;

    // Validate form data
    if (!$order_id || !$customer_id || !$customer_name || !$product_id || !$product_name || !$quantity || !$price) {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    // Insert data into database
    $sql = "INSERT INTO orders (order_id, customer_id, customer_name, product_id, product_name, quantity, price) 
            VALUES ('$order_id', '$customer_id', '$customer_name', '$product_id', '$product_name', '$quantity', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Order added successfully!', 'data' => $_POST]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    }

    $conn->close(); // Close database connection
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method!']);
}
?>