<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/main.css">
   <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>

<?php  require_once dirname(__DIR__)."/components/header.php" ?>


  <section class="user-profile">

<h1 class="heading">your profile</h1>

<div class="info">

 

   <div class="box-container">

      <div class="box">
         <div class="flex">
         <i class="fa-solid fa-person-chalkboard"></i>
            <div>
               <span>4</span>
               <p>teachers</p>
            </div>
         </div>
         <a href="#" class="inline-btn">view all teachers</a>
      </div>

      <div class="box">
         <div class="flex">
         <i class="fa-solid fa-graduation-cap"></i>
            <div>
               <span>33</span>
               <p>Students</p>
            </div>
         </div>
         <a href="#" class="inline-btn">view All Students</a>
      </div>

      <div class="box">
         <div class="flex">
         <i class="fa-solid fa-play"></i>
            <div>
               <span>12</span>
               <p>play lists</p>
            </div>
         </div>
         <a href="#" class="inline-btn">View All Play Lists</a>
      </div>

   </div>
</div>

</section>

<?php  require_once dirname(__DIR__)."/components/admin/sidbar.php" ?>
<script src="js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>