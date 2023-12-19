<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>404 Page Not Found</title>
	  
	  <?php $this->load->view("templates/login-styles"); ?>
	 
	  
		
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/login-header"); ?>
		<?php //$this->load->view("templates/menu"); ?>	
		<!--End of header-->
		<div class="container">
			<h1><?php echo isset($heading)?$heading:"404 Page Not Found"; ?></h1>
			<?php echo isset($message)?$message:'Click <a href="'.$basePath.'" >here</a> for home page'; ?>
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/login-scripts"); ?>
	</body>
</html>