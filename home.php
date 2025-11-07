<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.html"); 
    exit;
}

echo "<h1>Welcome, " . $_SESSION['user_name'] . "!</h1>";
echo "<a href='logout.php'>Logout</a>";
?>