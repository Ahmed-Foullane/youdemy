<?php
// views/teacher/playlists.php
require_once "../utils/utils.php";
require_once "../DAOs/tags.php";
require_once "../DAOs/video.php";

$tagManager = new TagDAO();
$tags = $tagManager->getAllTags();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Home</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/styles/main.css">
</head>
<body>
    <?php require_once dirname(__DIR__)."/components/student/header.php" ?>
    <?php require_once dirname(__DIR__)."/components/teacher/sidbare.php" ?>
    
    <section class="form-container">
       <form action="/teacher/video" method="post">
            <h3>Add New Video</h3>
            <input type="hidden" name="playlist_id" value="<?php echo $_GET['id'] ?? ''; ?>">
            <input type="text" placeholder="Enter video title" name="title" class="box" required>
            <textarea name="description" class="box" placeholder="Enter video description" maxlength="1000" cols="30" rows="2"></textarea>
            <input type="url" placeholder="Enter video URL from YouTube" name="video_url" class="box" required>
            
            <div class="home-grid">
                <div class="box-container">
                    <div class="box">
                        <h3 class="title">Select Tags</h3>
                        <div class="flex">
                            <?php foreach ($tags as $tag): ?>
                                <label class="tag-label">
                                    <input type="checkbox" name="tags[]" value="<?= $tag['id'] ?>">
                                    #<?= htmlspecialchars($tag['name']) ?>
                                </label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" value="Add Video" class="inline-btn" name="submit">
        </form>
    </section>

    <!-- Display Videos -->
    <section class="playlist-videos">
        <h1 class="heading">Playlist Videos</h1>
        <div class="box-container">
        <?php
        $videoManager = new VideoManager();
        $videos = $videoManager->getPlaylistVideos($_GET['id'] ?? 0);
        foreach($videos as $video) {
            $video_id = "";
                if (preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/', $video['video_url'], $matches)) {
                     $video_id = $matches[1];
                }
            ?>
            <a class="box" href="watch-video.html">
            <div class="video-container">
                    <iframe 
                        src="https://www.youtube.com/embed/<?= $video_id; ?>" 
                        frameborder="0" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="video-info">
                    <h3 class="video-title">Title: <?= $video['title']; ?></h3>
                    <h4 class="video-description">Descreption: <?= $video['description']; ?></h4>
                    <form action="/delete_video" method="post" class="search-tutor">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                    <button type="submit" class="inline-btn bg-[#ff3300]" style="background-color: orangered;" name="delete">delete</button>
                </form>
                </div>
      </a>  
        <?php } ?>
        </div>
    </section>
    <script src="js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>