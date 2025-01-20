<?php
require_once dirname(dirname(__DIR__)) . "/DAOs/user.php";
require_once dirname(dirname(__DIR__)) . "/utils/utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['accept'])) {
    $id = $_POST['id'] ?? null; // Get the teacher ID from the POST data

    if ($id) {
        $userDAO = new UserDAO();

        if ($userDAO->updateUserStatus($id, "active")) {
            // Redirect with success message
            Utils::redirect("admin");
        } 
    }
}
?>