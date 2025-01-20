<?php
// controllers/teacher/video.php
require_once dirname(dirname(__DIR__)) . "/DAOs/video.php";
require_once dirname(dirname(__DIR__)) . "/DAOs/tags.php";
require_once dirname(dirname(__DIR__)) . "/utils/utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $playlistId = $_POST['playlist_id'] ?? '';
    $title = $_POST['title'] ?? '';
    $description = $_POST['description'] ?? '';
    $videoUrl = $_POST['video_url'] ?? '';
    $selectedTags = $_POST['tags'] ?? [];
        $videoManager = new VideoManager();
        if ($videoManager->uploadVideo($playlistId, $title, $description, $videoUrl, $selectedTags)) {
            Utils::redirect('teacher-playlist');
            exit();
        }
    
}