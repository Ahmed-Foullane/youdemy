<?php
// session_start();
require_once '../utils/utils.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="styles/style.css?v=<?php echo time()?>">
  <link rel="stylesheet" href="styles/particles.css?v=<?php echo time()?>">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css' rel='stylesheet'>

</head>
<body>
<dive class="my_logo">
      <a href="/" class="logo">YouDemy</a>
</dive> 

  <?php
  // Display error message if any
  echo Utils::displayFlash('register_error', 'red');
  ?>

  <div id="particles-js" class="login">
    <div class="login__content">
      <div class="login__forms">
        <form class="form" action="/controllers/auth.php" method="POST" class="login__create " id="login-up">
          <input type="hidden" name="register" value="1">
          <h1 class="login__title">Create Account</h1>

          <div class="login__box">
            <i class='bx bx-user login__icon'></i>
            <input type="text" name="name" placeholder="Name" class="login__input" >
          </div>

          <div class="login__box">
            <i class='bx bx-at login__icon'></i>
            <input type="text" name="email" placeholder="Email" class="login__input" >
          </div>

          <div class="login__box">
            <i class='bx bx-lock-alt login__icon'></i>
            <input type="password" name="password" placeholder="Password" class="login__input" >
            <i onclick="show(this, false)"  class="fa-solid fa-eye eye open" style="font-size: 1.6em; display: none;"></i>
            <i onclick="show(this, true)" class="fa-solid fa-eye-slash eye close" style="font-size: 1.6em;"></i>          </div>

          <div class="login__box">
            <i class='bx bx-lock-alt login__icon'></i>
            <input type="password" name="confirm_password" placeholder="Confirm Password" class="login__input" >
            <i onclick="show(this, false)"  class="fa-solid fa-eye eye open" style="font-size: 1.6em; display: none;"></i>
            <i onclick="show(this, true)" class="fa-solid fa-eye-slash eye close" style="font-size: 1.6em;"></i>          </div>
         
          <div class="flex">

                        <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
            <input onchange='handleChange(this);' id="bordered-checkbox-1" type="checkbox" name="role" value="teacher" class="cursor-pointer teach">
            <label for="bordered-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Enseignant</label>
            </div>
            <div class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
            <input onchange='handleChange(this);' checked id="bordered-2" type="checkbox" name="role" value="student" class="cursor-pointer stud">
            <label for="bordered-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Etudiant</label>
            </div>
                    </div>
          <button type="submit" class="login__button">Sign Up</button>

          <div>
            <span class="login__account">Already have an Account ?</span>
            <span class="login__signup" id="sign-in"><a href="/login">Login</a></span>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="js/particles.js?v=<?php echo time();?>"></script>
  <script src="js/app.js?v=<?php echo time();?>"></script>
  <script src="js/stats.js?v=<?php echo time();?>"></script>
  <script src="js/script.js?v=<?php echo time();?>"></script>
</body>
</html>