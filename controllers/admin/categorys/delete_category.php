<?php
require_once dirname(dirname(dirname(__DIR__))) . "/DAOs/category.php";
require_once dirname(dirname(dirname(__DIR__))) . "/utils/utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'] ?? null; // Get the category ID from the POST data

    if ($id) {
        $categoryDAO = new CategoryDAO();

        if ($categoryDAO->deleteCategory($id)) {
            // Redirect with success message
            Utils::redirect("categors");
        } 
    }
}
?>