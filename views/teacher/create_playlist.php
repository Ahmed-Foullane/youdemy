<?php

// session_start(); 
require_once "../utils/utils.php";
require_once "../DAOs/category.php";

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

<?php require_once dirname(__DIR__) . "/components/student/header.php"; ?>
<?php require_once dirname(__DIR__) . "/components/teacher/sidbare.php"; ?>

<section class="form-container">
    <form action="/create-playlist" method="post">
        <h3>Create Playlist</h3>

        <p>Playlist Title</p>
        <input type="text" name="name" placeholder="Enter the playlist title" class="box" required>

       
        <p>Playlist Category</p>
        <select class="box" name="category_id" required>
            <?php
            require_once dirname(dirname(__DIR__)) . "/DAOs/category.php";
            $categoryDAO = new CategoryDAO();
            $categories = $categoryDAO->getAllCategories();

            foreach ($categories as $category) {
                echo "<option value='{$category['id']}'>{$category['name']}</option>";
            }
            ?>
        </select>

       
        <input type="submit" value="Create" name="submit" class="btn">
    </form>
</section>


<script src="js/darkmode.js?v=<?php echo time(); ?>"></script>
</body>
</html>
