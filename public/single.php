<?php

    require_once '../config/database.php';
    require_once '../src/models/Blogs.php';

    $database = new Database();
    $db = $database->connect();

    $blogModel = new Blogs($db);

    if (!isset($_GET['slug'])) {
        die('Blog post not found.');
    }

    $slug = $_GET['slug'];

    $blogPost = $blogModel->readSingle($slug);

    if (!$blogPost) {
        die('Blog post not found.');
    }

    include './include/header.php';

?>

<div class="container bg-white pt-5">
    <h1 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">
        <?php echo htmlspecialchars($blogPost['title']); ?>
    </h1>
    <div class="d-flex mb-3">
        <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo htmlspecialchars($blogPost['created_at']); ?></small>
        <small class="mr-2 text-muted"><i class="fa fa-user"></i> <?php echo htmlspecialchars($blogPost['author']); ?></small>
        <small class="mr-2 text-muted"><i class="fa fa-folder"></i> <?php echo htmlspecialchars($blogPost['category_name']); ?></small>
    </div>
    <div class="mb-4">
        <img class="img-fluid" src="./public/img/uploads/<?php echo htmlspecialchars($blogPost['image']); ?>" alt="Blog Image">
    </div>
    <p><?php echo nl2br(htmlspecialchars($blogPost['content'])); ?></p>
</div>

<?php include './include/footer.php'; ?>