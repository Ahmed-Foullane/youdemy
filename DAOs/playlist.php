<?php
require_once "crud.php";
require_once "../config/db.php";

class PlaylistDAO extends Crud {
    protected $table = "playlists"; 
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
        parent::__construct();
    }

  
    public function createPlaylist($name, $category_id, $teacher_id) {
        $data = [
            'name' => $name,
            'category_id' => $category_id,
            'teacher_id' => $teacher_id
        ];
        return $this->create($data); 
    }

    
    public function getPlaylistsByTeacher($teacher_id) {
        return $this->findBy(['teacher_id' => $teacher_id]);
    }

   
    public function getPlaylistById($id) {
        return $this->findBy(['id' => $id]);
    }



    
    public function getVideosByPlaylist($playlist_id) {
        $sql = "SELECT * FROM playlist_videos WHERE playlist_id = :playlist_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':playlist_id', $playlist_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function verifyTeacherOwnership($playlistId, $teacherId) {
        $stmt = $this->db->prepare("
            SELECT COUNT(*) as count 
            FROM playlists 
            WHERE id = ? AND teacher_id = ?
        ");
        $stmt->execute([$playlistId, $teacherId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['count'] > 0;
    }

    public function findById($id) {
        try {
            $stmt = $this->db->prepare("
                SELECT p.*, 
                       c.name as category_name,
                       u.name as teacher_name
                FROM playlists p
                LEFT JOIN categories c ON p.category_id = c.id
                LEFT JOIN users u ON p.teacher_id = u.id
                WHERE p.id = ?
            ");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in PlaylistDAO::findById: " . $e->getMessage());
            return null;
        }
    }



    public function getTeacherPlaylists($teacherId) {
        try {
            $stmt = $this->db->prepare("
                SELECT p.*, 
                       c.name as category_name,
                       (SELECT COUNT(*) FROM playlist_videos WHERE playlist_id = p.id) as video_count
                FROM playlists p
                LEFT JOIN categories c ON p.category_id = c.id
                WHERE p.teacher_id = ?
                ORDER BY p.created_at DESC
            ");
            $stmt->execute([$teacherId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error in PlaylistDAO::getTeacherPlaylists: " . $e->getMessage());
            return [];
        }
    }

    public function delete($id, $teacherId) {
        try {
            $stmt = $this->db->prepare("
                DELETE FROM playlists 
                WHERE id = ? AND teacher_id = ?
            ");
            return $stmt->execute([$id, $teacherId]);
        } catch (PDOException $e) {
            error_log("Error in PlaylistDAO::delete: " . $e->getMessage());
            return false;
        }
    }



   
}
?>