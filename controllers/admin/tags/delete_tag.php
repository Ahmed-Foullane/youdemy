<?php
require_once dirname(dirname(dirname(__DIR__))) . "/DAOs/tags.php";
require_once dirname(dirname(dirname(__DIR__))) . "/utils/utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
    $id = $_POST['id'] ?? null;

    if ($id) {
        $tagDAO = new TagDAO();
        if ($tagDAO->deleteTag($id)) {
            Utils::redirect("tags");
        } 
    } 
}
?>