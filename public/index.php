<?php

    require_once '../config/database.php';
    require_once '../src/models/Blogs.php';

    $database = new Database();
    $db = $database->connect();

    $blogModel = new Blogs($db);
    $blogPosts = $blogModel->readAll();

    include 'header.php';

?>                
                <div class="container bg-white pt-5">
                    <?php while ($row = $blogPosts->fetch(PDO::FETCH_ASSOC)): ?>
                        <div class="row blog-item px-3 pb-5">
                            <div class="col-md-5">
                                <img class="img-fluid mb-4 mb-md-0" src="img/blog-placeholder.jpg" alt="Image">
                            </div>
                            <div class="col-md-7">
                                <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">
                                    <?php echo htmlspecialchars($row['title']); ?>
                                </h3>
                                <div class="d-flex mb-3">
                                    <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> <?php echo htmlspecialchars($row['created_at']); ?></small>
                                    <small class="mr-2 text-muted"><i class="fa fa-user"></i> <?php echo htmlspecialchars($row['author']); ?></small>
                                </div>
                                <p>
                                    <?php echo htmlspecialchars(substr($row['content'], 0, 150)) . '...'; ?>
                                </p>
                                <a class="btn btn-link p-0" href="single/<?php echo htmlspecialchars($row['slug']); ?>">Read More <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>

<?php include 'footer.php'; ?>