<?php
// Database configuration
$dbhost = "webtech.c5ass6jdq6wa.us-east-2.rds.amazonaws.com";
$dbname = "webtechdb";
$dbuser = "admin";
$dbpass = "admin12345678";

try {
    // Create a new PDO instance
    $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>