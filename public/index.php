<?php

    require_once '../config/database.php';

    $database = new Database();
    $db = $database->connect();

    include 'header.php';

?>
                <div class="container p-0">
                    <div id="blog-carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="mb-3 text-white font-weight-bold">Lorem ipsum dolor sit amet</h2>
                                    <div class="d-flex text-white">
                                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                        <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                        <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                                    </div>
                                    <a href="" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="text-white font-weight-bold">Lorem ipsum dolor sit amet</h2>
                                    <div class="d-flex">
                                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                        <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                        <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                                    </div>
                                    <a href="" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img class="w-100" src="img/carousel-3.jpg" alt="Image">
                                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                    <h2 class="text-white font-weight-bold">Lorem ipsum dolor sit amet</h2>
                                    <div class="d-flex">
                                        <small class="mr-2"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                        <small class="mr-2"><i class="fa fa-folder"></i> Web Design</small>
                                        <small class="mr-2"><i class="fa fa-comments"></i> 15 Comments</small>
                                    </div>
                                    <a href="" class="btn btn-lg btn-outline-light mt-4">Read More</a>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                
                <div class="container bg-white pt-5">
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-1.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-2.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="row blog-item px-3 pb-5">
                        <div class="col-md-5">
                            <img class="img-fluid mb-4 mb-md-0" src="img/blog-3.jpg" alt="Image">
                        </div>
                        <div class="col-md-7">
                            <h3 class="mt-md-4 px-md-3 mb-2 py-2 bg-white font-weight-bold">Lorem ipsum dolor sit amet</h3>
                            <div class="d-flex mb-3">
                                <small class="mr-2 text-muted"><i class="fa fa-calendar-alt"></i> 01-Jan-2045</small>
                                <small class="mr-2 text-muted"><i class="fa fa-folder"></i> Web Design</small>
                                <small class="mr-2 text-muted"><i class="fa fa-comments"></i> 15 Comments</small>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eu suscipit orci velit id libero
                            </p>
                            <a class="btn btn-link p-0" href="">Read More <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

<?php include 'footer.php'; ?>