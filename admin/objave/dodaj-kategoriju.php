<?php

    session_start();

    require_once '../../config/database.php';
    require_once '../../src/models/User.php';
    require_once '../../src/models/Category.php';

    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }

    $database = new Database();
    $db = $database->connect();

    $userModel = new User($db);
    $user = $userModel->findUserById($_SESSION['user_id']);

    $categoryModel = new Category($db);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $categoryModel->name = $_POST['name'];

        if ($categoryModel->create()) {
            $successMessage = "Kategorija je uspešno dodata.";
        } else {
            $errorMessage = "Došlo je do greške prilikom dodavanja kategorije.";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge" http-equiv="X-UA-Compatible">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="Mile Slijepcevic" name="author">
    <meta name="robots" content="noindex, nofollow">
    <title>PZAgency - Dodaj novu kategoriju</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <link href="../public/css/fontawesome.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../public/css/custom-dashboard.css" rel="stylesheet"><body id="page-top">
    <style>input:focus::placeholder {color: transparent;}</style>
    <style>.errorWrap {padding: 10px;margin: 0 0 20px 0;background: #dd3d36;color:#fff;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);}.succWrap{padding: 10px;margin: 0 0 20px 0;background: #5cb85c;color:#fff;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);}</style>
</head>
<body id="page-top">
	<div id="wrapper">
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <li style="list-style: none; display: inline">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#0">
                    <div class="sidebar-brand-text mx-3">
                        PZAgency
                    </div>
                </a> 
                <hr class="sidebar-divider my-0">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i> 
                    <span>Dashboard</span>
                </a>
            </li>
            <li style="list-style: none; display: inline">
                <hr class="sidebar-divider">
            </li>
            <li class="nav-item">
                <a aria-controls="collapseObjekti" aria-expanded="true" class="nav-link collapsed" data-target="#collapseObjekti" data-toggle="collapse" href="#">
                    <i class="fas fa-fw fa-plus"></i> 
                    <span>Novosti</span>
                </a>
                <div class="collapse" data-parent="#accordionSidebar" id="collapseObjekti">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../objave/">Sve novosti</a>
                        <a class="collapse-item" href="../objave/dodaj-blog">Dodajte novost</a>
                        <h6 class="collapse-header">Kategorije</h6>
                        <a class="collapse-item" href="../objave/kategorije">Sve kategorije</a>
                        <a class="collapse-item" href="../objave/dodaj-kategoriju">Dodajte kategoriju</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a aria-controls="collapseUsers" aria-expanded="true" class="nav-link collapsed" data-target="#collapseUsers" data-toggle="collapse" href="#">
                    <i class="fas fa-fw fa-user"></i> 
                    <span>Korisnici</span>
                </a>
                <div class="collapse" data-parent="#accordionSidebar" id="collapseUsers">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../korisnici/">Svi korisnici</a>
                    </div>
                </div>
            </li>
        </ul>		
        <div class="d-flex flex-column" id="content-wrapper">
			<div id="content">
				<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
	                <button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop"><i class="fa fa-bars"></i></button> 
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a class="view-website-link d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="http://localhost/blog/" target="_blank">
                                <i class="fab fa-chrome"></i> Portal
                            </a>
                        </li>
                        <li style="list-style: none; display: inline">
                            <div class="topbar-divider d-none d-sm-block"></div>
                        </li>
                        <li class="nav-item dropdown no-arrow">
                            <a aria-expanded="false" aria-haspopup="true" class="nav-link dropdown-toggle" data-toggle="dropdown" href="" id="userDropdown" role="button">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Ćaoo, <?php echo htmlspecialchars($user->username); ?></span> 
                            </a>
                            <div aria-labelledby="userDropdown" class="dropdown-menu dropdown-menu-right shadow animated--grow-in">
                                <a class="dropdown-item" href="../korisnici/profile">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i> Ažurirajte profil
                                </a>
                                <a class="dropdown-item" href="../korisnici/promena-lozinke">
                                    <i class="fas fa-star fa-sm fa-fw mr-2 text-gray-400"></i> Ažurirajte lozinku
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" data-target="#logoutModal" data-toggle="modal" href="">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Odjavite se
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>				
                <div class="container-fluid">
                    <a class="btn btn-primary btn-back" href="./kategorije">Sve kategorije</a>
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <?php if (isset($successMessage)): ?>
                                <div class="succWrap"><?php echo $successMessage; ?></div>
                            <?php elseif (isset($errorMessage)): ?>
                                <div class="errorWrap"><?php echo $errorMessage; ?></div>
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="img-container">
                                        <img alt="" class="img-fluid" src="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <form method='post' enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12">
                                                <div class="form-group">
                                                    <strong>Naziv kategorije</strong> 
                                                    <input class="form-control" type="text" name="name" required>
                                                </div>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                                                <button type="submit" class="btn btn-primary" name="submit">Dodajte kategoriju</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
			
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright © Mile Slijepčević - 2024.</span>
                    </div>
                </div>
            </footer>
	    </div>
	</div>
	
    <a class="scroll-to-top rounded" href="#page-top"><i class="fas fa-angle-up"></i></a> 

    <div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="logoutModal" role="dialog" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Želite da se odjavite?</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                    Kliknite na &quot;<strong>Odjavite se</strong>&quot; da bi prekinuli sesiju.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Otkažite</button> 
                    <a class="btn btn-primary" href="../logout">Odjavite se</a>
                </div>
            </div>
        </div>
    </div>    
            
    <!-- Scripts -->
    <script src="../public/js/jquery.min.js"></script> 
    <script src="../public/js/bootstrap.bundle.min.js"></script> 
    <script src="../public/js/sb-admin-2.min.js"></script>
    <script src="../public/js/inputfile.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

</body>
</html>
