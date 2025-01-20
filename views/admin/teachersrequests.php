<?php
require_once dirname(dirname(__DIR__)) . "/DAOs/user.php";
$userDAO = new UserDAO();
$pendingTeachers = $userDAO->getPendingTeachers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Teacher Requests</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/styles/main.css">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require_once dirname(__DIR__)."/components/header.php"; ?>
<?php require_once dirname(__DIR__)."/components/admin/sidbar.php"; ?>

<section class="courses">
   <h1 class="heading">Teacher Requests</h1>

<div class="box-container">
    <?php foreach ($pendingTeachers as $teacher): ?>
        <div class="box">
            <div class="tutor">
                <div class="info">
                    <h3>Name: <?= $teacher['name'] ?></h3>
                    <br>
                    <span>Email: <?= $teacher['email'] ?></span>
                </div>
            </div>

            
            <form action="/accept_teacher" method="post" class="search-tutor">
                <input type="hidden" name="id" value="<?= $teacher['id'] ?>">
                <button type="submit" class="inline-btn" name="accept">accept</button>
            </form>

           
            <form action="/reject_teacher" method="post" class="search-tutor">
                <input type="hidden" name="id" value="<?= $teacher['id'] ?>">
                <button type="submit" class="inline-btn bg-[#ff3300]" name="reject">reject</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
</section>

<script src="js/darkmode.js?v=<?php echo time(); ?>"></script>
</body>
</html>