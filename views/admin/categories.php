<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Create Categories</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="/styles/main.css">
   <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<?php require_once dirname(__DIR__)."/components/header.php"; ?>
<?php require_once dirname(__DIR__)."/components/admin/sidbar.php"; ?>
<?php require_once dirname(dirname(__DIR__))."/DAOs/category.php"; ?>

<section class="teachers">
    <h1 class="heading">Create Categories</h1>

    <form action="/create_category" method="post" class="search-tutor">
        <input type="text" name="search_box" placeholder="create category..." required maxlength="100">
        <button type="submit" class="fa-regular fa-square-plus" name="search_tutor"></button>
    </form>

    <div class="box-container">
        <?php
        $categoryDAO = new CategoryDAO();
        $categories = $categoryDAO->getAllCategories();

        foreach ($categories as $category): ?>
            <div class='box'>
                <div class='tutor'>
                    <div class='info'>
                        <h3><?= htmlspecialchars($category['name']) ?></h3>
                    </div>
                </div>
                <form action="/delete_category" method="post" class="search-tutor">
                    <input type="hidden" name="id" value="<?= $category['id'] ?>">
                    <button type="submit" class="inline-btn bg-[#ff3300]" style="background-color: orangered;" name="delete">delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<script src="js/darkmode.js?v=<?php echo time(); ?>"></script>
</body>
</html>