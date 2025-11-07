<?php
include 'db_connect.php'; // Include the database connection

$sql = "SELECT order_id, customer_id, customer_name, product_id, product_name, quantity, price FROM orders";
$result = $conn->query($sql);

$orders = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row; // Append each row to orders array
    }
}

header('Content-Type: application/json'); // JSON response
echo json_encode($orders); // Return orders as JSON
$conn->close(); // Close database connection
?>