<?php

	require_once '../src/controllers/AuthController.php';
	$auth = new AuthController();

	if (isset($_SESSION['user_id'])) {
		header("Location: dashboard.php");
		exit();
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$error = $auth->login($email, $password);
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta content="" name="description">
	<meta content="" name="author">
	<title>PZAgency - Prijavite se</title>
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="./public/css/bootstrap.min.css" rel="stylesheet">
	<link href="./public/css/fontawesome.min.css" rel="stylesheet">
    <style>input:focus::placeholder {color: transparent;}</style>
	<style>.errorWrap {padding: 10px;margin: 0 0 20px 0;background: #dd3d36;color:#fff;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);}.succWrap{padding: 10px;margin: 0 0 20px 0;background: #5cb85c;color:#fff;-webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);}</style>
</head>
<body class="bg-gradient-primary">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-xl-10 col-lg-12 col-md-9">
				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-body p-0">
						<div class="row">
							<div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image: url(./public/images/login-section-bg.jfif);"></div>
							<div class="col-lg-6">
								<div class="p-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Dobrodošli!</h1>
									</div>
                                    <form class="user" method="post" action="">
										<?php if (isset($error)): ?>
                                            <p style="color: red;"><?php echo $error; ?></p>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" placeholder="Vaša email adresa" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" placeholder="Vaša lozinka" name="password" required>
                                        </div>
                                        <input class="btn btn-primary btn-user btn-block" type="submit" name="login" value="Prijavite se">
                                    </form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    
    <script src="./public/js/jquery.min.js"></script> 
	<script src="./public/js/bootstrap.bundle.min.js"></script> 
	<script src="./public/js/sb-admin-2.min.js"></script>
    <script src="./public/js/jquery-1.12.4-jquery.min.js"></script>
    <script src="./public/js/bootstrap.min.js"></script>
    <script src="./public/js/inputfile.js"></script>
    
</body>
</html>