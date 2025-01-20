<?php
require_once "../utils/utils.php";
require_once "../DAOs/playlist.php"; // Include the PlaylistDAO to fetch data

// Assuming the teacher's ID is stored in the session
$teacher_id = $_SESSION['user']['id'] ?? null;

$playlistDAO = new PlaylistDAO();
$playlists = $playlistDAO->getPlaylistsByTeacher($teacher_id); // Fetch playlists for the teacher
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/styles/main.css">
</head>
<body>

<?php  require_once  dirname(__DIR__)."/components/student/header.php"?>
<?php require_once  dirname(__DIR__)."/components/teacher/sidbare.php"?>
<section class="teachers">

<h1 class="heading">My Playlists</h1>

<div class="box-container">
    <div class="box offer">
        <h3>Create a New Playlist</h3>
        <a href="/create-playlist" class="inline-btn">Create</a>
    </div>

    <?php if (!empty($playlists)): ?>
        <?php foreach ($playlists as $playlist): ?>
            <div class="box">
                <div class="tutor">
                         <div class="info">
                        <h3><?= $playlist['name']; ?></h3> 
                        <span><?= $playlist['created_at']; ?></span>
                    </div>
                </div>
                
                <a href="/teacher-playlist?id=<?php echo $playlist['id']; ?>" class="inline-btn">View Playlist</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No playlists found.</p>
    <?php endif; ?>

</div>

</section>

<script src="js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>
