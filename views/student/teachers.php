<?php

// session_start(); 
require_once "../utils/utils.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/styles/main.css">

</head>
<body>

<?php  require_once  dirname(__DIR__)."/components/student/header.php"?>
<?php require_once  dirname(__DIR__)."/components/student/side_bar.php"?>



<?php  require_once  dirname(__DIR__)."/components/student/header.php"?>
<?php require_once  dirname(__DIR__)."/components/student/side_bar.php"?>

<section class="teachers">

   <h1 class="heading">expert teachers</h1>

   <form action="" method="post" class="search-tutor">
      <input type="text" name="search_box" placeholder="search tutors..." required maxlength="100">
      <button type="submit" class="fas fa-search" name="search_tutor"></button>
   </form>

   <div class="box-container">



      <div class="box">
         <div class="tutor">
            
            <div>
               <h3>teacher: <span>john deo</span></h3>
              
            </div>
         </div>
         <p>total playlists : <span>4</span></p>
         <p>total videos : <span>18</span></p>
         
         <a href="teacher_profile.html" class="inline-btn">view all playlists</a>
      </div>
      <div class="box">
         <div class="tutor">
            
            <div>
               <h3>teacher: <span>john deo</span></h3>
              
            </div>
         </div>
         <p>total playlists : <span>4</span></p>
         <p>total videos : <span>18</span></p>
         
         <a href="teacher_profile.html" class="inline-btn">view all playlists</a>
      </div>
      <div class="box">
         <div class="tutor">
            
            <div>
               <h3>teacher: <span>john deo</span></h3>
              
            </div>
         </div>
         <p>total playlists : <span>4</span></p>
         <p>total videos : <span>18</span></p>
         
         <a href="teacher_profile.html" class="inline-btn">view all playlists</a>
      </div>

   </div>

</section>

<script src="js/darkmode.js?v=<?php echo time()?>"></script>

   
</body>
</html>