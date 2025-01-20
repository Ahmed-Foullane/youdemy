<?php
require_once dirname(dirname(dirname(__DIR__)))."/DAOs/category.php";
require_once dirname(dirname(dirname(__DIR__)))."/utils/utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['search_box'] ?? '';

    if (!empty($name)) {
        $category = new Categorie($name);
        $categoryDAO = new CategoryDAO();
        if ($categoryDAO->createCategory($category)) {
            utils::redirect("categors"); // Success message
        } 
    }
}
?>