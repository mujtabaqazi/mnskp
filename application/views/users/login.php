<?php
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>CheckList Login</title>  
		<?php $this->load->view("templates/login-styles"); ?>    
	</head>
	<body>
		<?php $this->load->view("templates/login-header"); ?>
		<div class="container logincon">
			<div class="row" style="padding-top:30px;">
				<div class="col-md-6 col-sm-6">
					<img class="img-responsive" src="<?php echo $assetsPath; ?>images/map2.png" style="max-width: 80%;">
				</div>
				<div class="col-md-4 col-sm-4" style="padding-top: 46px;">
					<div class="row">
						<div class="col-sm-12 form-box">
							<div class="form-top">
								<div class="form-top-left">
									<h3>Login</h3>
								</div>
							</div>
							<div class="form-bottom">
								<form role="form" action="<?php echo $basePath; ?>users/login" method="post" class="login-form">
									<div class="form-group">
										<label class="sr-only" for="form-username">Username</label>
										<input type="text" id="username" name="username" placeholder="Username..." class="form-username form-control">
									</div>
									<div class="form-group">
										<label class="sr-only" for="form-password">Password</label>
										<input type="password" id="password" name="password" placeholder="Password..." class="form-password form-control">
									</div>
									<p style="color: red;"><?php if($this -> session -> message){ echo $this -> session -> message;} ?></p>
									<button type="submit" class="btn btnsignin">Sign in!</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div><!--end of container-->
		<?php $this->load->view("templates/login-footer"); ?>
		<?php $this->load->view("templates/login-scripts"); ?>
	</body>
</html>