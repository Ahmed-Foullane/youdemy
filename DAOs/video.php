<?php

require_once '../config/db.php';
class VideoManager {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function uploadVideo($playlistId, $title, $description, $videoUrl, $tags) {
       

            
            $stmt = $this->db->prepare("INSERT INTO playlist_videos (playlist_id, title, description, video_url) VALUES (?, ?, ?, ?)");
            $stmt->execute([$playlistId, $title, $description, $videoUrl]);
            $videoId = $this->db->lastInsertId();

           
            if (!empty($tags)) {
                $stmt = $this->db->prepare("INSERT INTO video_tags (video_id, tag_id) VALUES (?, ?)");
                foreach ($tags as $tagId) {
                    $stmt->execute([$videoId, $tagId]);
                }
            }

            
            return true;
        } 
    

    public function getPlaylistVideos($playlistId) {
        $stmt = $this->db->prepare("
            SELECT pv.*, GROUP_CONCAT(t.name) as tags
            FROM playlist_videos pv
            LEFT JOIN video_tags vt ON pv.id = vt.video_id
            LEFT JOIN tags t ON vt.tag_id = t.id
            WHERE pv.playlist_id = ?
            GROUP BY pv.id
        ");
        $stmt->execute([$playlistId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}