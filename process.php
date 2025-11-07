<?php
// Database connection
$host = "localhost";
$dbname = "db_project";
$username = "root";
$password = "";

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['signUp'])) {
        // Handle Sign-Up
        $firstName = $conn->real_escape_string($_POST['fName']);
        $lastName = $conn->real_escape_string($_POST['lName']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$firstName', '$lastName', '$email', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "Registration successful! <a href='index.html'>Go back to login</a>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif (isset($_POST['signIn'])) {
        $email = $conn->real_escape_string($_POST['email']);
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                echo "Login successful! Welcome " . $row['first_name'];
            } else {
                echo "Invalid password.";
            }
        } else {
            echo "No user found with this email.";
        }
    }
}

$conn->close();
?>