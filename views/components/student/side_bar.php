

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>
   
   <div class="profile">
      <?php if (Utils::isLoggedIn()):  ?>
         <h3 class="name"><?=$_SESSION["user"]["name"]?></h3>
         <p class="role">studen</p>
         <a href="profile" class="btn" style="width: 100%">view my playlist</a>
         <a class="btn" href="controllers/auth.php?logout=1">Logout</a>
   <?php endif ?>
   <?php if (!Utils::isLoggedIn()):?>
         <div class="flex-btn">
            <a href="login" class="option-btn">login</a>
            <a href="register" class="option-btn">register</a>
         </div>
    <?php endif?>
      </div>

   <nav class="navbar">
      <a href="courses"><i class="fas fa-graduation-cap"></i><span>courses</span></a>
      <a href="teachers"><i class="fas fa-chalkboard-user"></i><span>teachers</span></a>
      <a href="contact"><i class="fas fa-headset"></i><span>contact us</span></a>
   </nav>
</div>
</body>
</html>


