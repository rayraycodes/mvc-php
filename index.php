<?php
require_once 'controllers/RegistrationController.php';
require_once 'controllers/AdminController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'register';

$conn = mysqli_connect('webtech.c5ass6jdq6wa.us-east-2.rds.amazonaws.com', 'admin', 'admin12345678', 'webtechdb');

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}

if ($action == 'register') {
    $controller = new RegistrationController($conn);
    $controller->register();
} elseif ($action == 'admin') {
    $controller = new AdminController($conn);
    $controller->index();
}

mysqli_close($conn);

?>