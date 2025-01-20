<?php
require_once dirname(dirname(__DIR__)) . "/DAOs/playlist.php";
require_once dirname(dirname(__DIR__)) . "/utils/utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? ''; 
    $category_id = $_POST['category_id'] ?? null; 
    $teacher_id = $_SESSION['user']['id'] ?? null; 
    if (!empty($name) && !empty($category_id) && !empty($teacher_id)) {
        $playlistDAO = new PlaylistDAO();
        if ($playlistDAO->createPlaylist($name, $category_id, $teacher_id)) {
            Utils::redirect("create-playlist");
        } 
    }
}