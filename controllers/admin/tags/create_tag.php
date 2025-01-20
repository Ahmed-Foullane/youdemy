<?php

require_once dirname(dirname(dirname(__DIR__)))."/DAOs/tags.php";
require_once dirname(dirname(dirname(__DIR__)))."/utils/utils.php";
require_once dirname(dirname(dirname(__DIR__)))."/models/tag.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['search_box'] ?? '';

    if (!empty($name)) {
        $tag = new Tag($name);
        $tagDAO = new TagDAO();
        if ($tagDAO->createTag($tag)) {
            
            Utils::redirect("tags");
            exit();
        }
    } 
}