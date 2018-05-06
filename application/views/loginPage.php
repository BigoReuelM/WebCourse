<!doctype html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo base_url() ?>/public/assets/css/style.css">
	</head>
	<body>
		<section class="activity-area section">
			<div class="container">
				<div class="text-center">
					<a href="<?php echo base_url('welcome/index') ?>"><img src="<?php echo base_url() ?>/public/assets/img/logo.png" alt=""></a>
				</div>
				<div class="panel form-signin">
					<div class="panel-heading">
						<h2 class="form-signin-heading">Sign In</h2>
					</div>
					<div class="panel-body">
						<form action="<?php echo base_url('user/loginUser') ?>" method="POST">
						
							<?php 
								$error_msg = $this->session->flashdata('error_msg');

								if ($error_msg) {
									echo '<div class="alert alert-danger text-center">' .  $error_msg . '</div>';
								}

							?>
							<label for="inputEmail" class="sr-only">Email address</label>
					        <input type="text" name="username" id="username" class="form-control" placeholder="Login ID">
					        <label for="inputPassword" class="sr-only">Password</label>
					        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Password">

					        <button class="btn btn-lg btn-primary btn-block" name="login" type="submit">Sign in</button>
						</form>
					</div>
					<div class="panel-footer text-center">
						<p>Welcome to WebCourse.com</p>
					</div>
				</div>
			</div>
		</section>
	</body>
</html>
