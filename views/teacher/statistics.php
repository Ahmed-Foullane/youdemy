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
<?php require_once  dirname(__DIR__)."/components/teacher/sidbare.php"?>


<section class="teacher-profile">

   <h1 class="heading">profile details</h1>

   <div class="details">
      <div class="tutor">
         
         <h3>john deo</h3>
         <span>developer</span>
      </div>
      <div class="flex">
         <p>total playlists : <span>4</span></p>
         <p>total videos : <span>18</span></p>
         <p>total students : <span>1208</span></p>
      </div>
   </div>

</section>

<script src="js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>