<?php


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="styles/style.css?v=<?php echo time()?>">
  <link rel="stylesheet" href="styles/particles.css?v=<?php echo time()?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' rel='stylesheet'>
 
  <!-- <link rel="stylesheet" href="/styles/main.css"> -->
  
  
</head>
<body>

<dive class="my_logo">
      <a href="/" class="logo">YouDemy</a>
</dive> 

</div>

  
<div id="particles-js" class="login">

                <div class="login__forms">
                <form class="form" method="POST" action="/controllers/auth.php" class="login__registre form" id="login-in">
    <input type="hidden" name="login" value="1">  
    <h1 class="login__title">Contact Us</h1>
    <div class="login__box">
    <i class="fa-regular fa-user login__icon"></i>
        <input type="text" name="name" placeholder="Name" class="login__input">
    </div>
    <div class="login__box">
    <i class='bx bx-at login__icon'></i>
        <input type="email" name="email" placeholder="Email" class="login__input">
    </div>

    <div class="login__box">
    <i class="fa-regular fa-envelope login__icon"></i>
        <textarea name="message" id="message" row="199" col="200"></textarea>
        <!-- <input type="password" name="password" placeholder="Password" class="login__input"> -->
    </div>

    <button type="submit" class="login__button">send</button>

</form>
                </div>
            </div>
        </div>


        
        <script src="js/particles.js?v=<?php echo time();?>"></script>
        <script src="js/app.js?v=<?php echo time();?>"></script>
        <script src="js/stats.js?v=<?php echo time();?>"></script>
        <script src="js/script.js?v=<?php echo time();?>"></script>
        <script src="js/darkmode.js?v=<?php echo time()?>"></script>
</body>
</html>







