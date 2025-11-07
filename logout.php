<?php
session_start();
session_destroy();
echo "You have been logged out. Redirecting...";
header("Refresh: 1; url=index.html"); 
exit;
?>