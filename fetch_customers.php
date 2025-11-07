<?php
include 'db_connect.php';

$sql = "SELECT customer_id, name, contacts FROM customer";
$result = $conn->query($sql);

$customers = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $customers[] = $row;
    }
}

header('Content-Type: application/json');
echo json_encode($customers);
$conn->close();
?>