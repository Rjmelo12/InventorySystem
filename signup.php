<?php
include 'db_connect.php';   


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $user_id = $_POST['user_id'] ?? null;
    $fname = $_POST['fname'] ?? null;
    $lname = $_POST['lname'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;

   
    if (!$user_id || !$fname || !$lname || !$email || !$password) {
        die("Error: All fields are required!");
    }

    
    $sql = "INSERT INTO users (user_id, fname, lname, email, password) 
        VALUES ('$user_id', '$fname', '$lname', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "User added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Invalid request method!";
}
?>  