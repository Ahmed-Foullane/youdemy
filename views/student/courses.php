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


<section class="courses">
   <h1 class="heading">our courses</h1>

   <div class="box-container">

      <div class="box">
         <div class="tutor">
          
            <div class="info">
               <h3>john deo</h3>
               
            </div>
         </div>
         <div class="thumb">
            <!-- <img src="images/thumb-1.png" alt=""> -->
             <!-- video img thumb -->
           
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist" class="inline-btn">view playlist</a>
      </div>
      <div class="box">
         <div class="tutor">
          
            <div class="info">
               <h3>john deo</h3>
               
            </div>
         </div>
         <div class="thumb">
            <!-- <img src="images/thumb-1.png" alt=""> -->
             <!-- video img thumb -->
           
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist" class="inline-btn">view playlist</a>
      </div>
      <div class="box">
         <div class="tutor">
          
            <div class="info">
               <h3>john deo</h3>
               
            </div>
         </div>
         <div class="thumb">
            <!-- <img src="images/thumb-1.png" alt=""> -->
             <!-- video img thumb -->
           
         </div>
         <h3 class="title">complete HTML tutorial</h3>
         <a href="playlist" class="inline-btn">view playlist</a>
      </div>



   </div>

   <!-- <div class="more-btn">
      <a href="courses.html" class="inline-option-btn">view all courses</a>
   </div> -->

</section>


<!-- <footer class="footer">

   &copy; copyright @ 2022 by <span>mr. web designer</span> | all rights reserved!

</footer> -->
<!-- custom js file link  -->
<script src="js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>