<?php
include 'db_connect.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'] ?? null;
    $name = $_POST['name'] ?? null;
    $contacts = $_POST['contacts'] ?? null;

    if (!$customer_id || !$name || !$contacts) {
        echo json_encode(['success' => false, 'message' => 'All fields are required!']);
        exit;
    }

    $sql = "INSERT INTO customer (customer_id, name, contacts) 
            VALUES ('$customer_id', '$name', '$contacts')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Customer added successfully!', 'data' => $_POST]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    }
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method!']);
}