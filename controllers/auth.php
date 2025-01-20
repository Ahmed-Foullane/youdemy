<?php
// session_start();
require_once '../models/auth.php';

$authSystem = new AuthSystem();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $authSystem->loginUser($_POST['email'], $_POST['password']);
    } elseif (isset($_POST['register'])) {
        $authSystem->registerUser(
            $_POST['role'],
            $_POST['name'],
            $_POST['email'],
            $_POST['password'],
            $_POST['confirm_password']
        );
    }
} elseif (isset($_GET['logout'])) {
    $authSystem->logoutUser();
}
?>
