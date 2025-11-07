<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $table = $_GET['table'] ?? null;

    if ($table === null) {
        die("Error: No table parameter provided!");
    } else {
        echo "Debug: Table parameter received is '$table'.<br>";
    }

    if ($table === 'product') {
        $sql = "SELECT * FROM product";
    } elseif ($table === 'inventory') {
        $sql = "SELECT * FROM inventory";
    } elseif ($table === 'customer') {
        $sql = "SELECT * FROM customer";
    } elseif ($table === 'orders') {
        $sql = "SELECT * FROM orders";
    } else {
        echo "Invalid table name!";
        exit;
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($table === 'product') {
                echo "<tr><td>{$row['ProductID']}</td><td>{$row['Product Name']}</td><td>{$row['Category']}</td><td>{$row['Price']}</td><td>{$row['Stock']}</td></tr>";
            } elseif ($table === 'inventory') {
                echo "<tr><td>{$row['InventoryID']}</td><td>{$row['ProductID']}</td><td>{$row['Stock']}</td></tr>";
            } elseif ($table === 'customer') {
                echo "<tr><td>{$row['Customer_ID']}</td><td>{$row['Name']}</td><td>{$row['Contacts']}</td></tr>";
            } elseif ($table === 'orders') {
                echo "<tr><td>{$row['OrderID']}</td><td>{$row['CustomerID']}</td><td>{$row['ProductID']}</td><td>{$row['Quantity']}</td></tr>";
            }
        }
    } else {
        echo "<tr><td colspan='5'>No data available</td></tr>";
    }

    $conn->close();
}
?>