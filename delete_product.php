<?php
include 'db_connect.php';

if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    // Prepare the SQL query to delete the product
    $sql = "DELETE FROM product WHERE product_id = ?";
    
    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind parameters and execute the query
        $stmt->bind_param("i", $product_id);
        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Product deleted successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to delete product.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Database error: ' . $conn->error]);
    }
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Product ID is required.']);
}
?>