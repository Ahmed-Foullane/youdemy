<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Tags</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/styles/main.css">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require_once dirname(__DIR__)."/components/header.php"; ?>
<?php require_once dirname(__DIR__)."/components/admin/sidbar.php"; ?>
<?php require_once dirname(dirname(__DIR__))."/DAOs/tags.php"; ?>

<section class="teachers">
    <h1 class="heading">Create Tags</h1>

<form action="/create_tag" method="post" class="search-tutor">
    <input type="text" name="search_box" placeholder="create tag..." required maxlength="100">
    <button type="submit" class="fa-regular fa-square-plus" name="search_tutor"></button>
</form>

    <div class="box-container">
    <?php
$tagDAO = new TagDAO();
$tags = $tagDAO->getAllTags();
?>

<?php foreach ($tags as $tag): ?>
    <div class='box'>
        <div class='tutor'>
            <div class='info'>
                <h3>#<?= $tag['name'] ?></h3>
            </div>
        </div>

       
        <form action="/delete_tag" method="post" class="search-tutor">
            <input type="hidden" name="id" value="<?= $tag['id'] ?>">
            <button  type="submit" name="delete" class="inline-btn bg-[#ff3300]" style="background-color: orangered;">delete</button>
        </form>
    </div>
<?php endforeach; ?>
     
    </div>
</section>

<script src="js/darkmode.js?v=<?php echo time(); ?>"></script>
</body>
</html>