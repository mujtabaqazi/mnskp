<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
?>
<div class="container-fluid container-top-banner">
	<div class="row">
		<div class="col-lg-2 col-md-2 hidden-sm hidden-xs zp mb0">
			<div class="logos-div">
				<img src="<?php echo $assetsPath; ?>images/sindh.png" class="logo-gov" alt="khyber Pakhtunkhwa Goverment Logo">
				<img src="<?php echo $assetsPath; ?>images/checklist.png" class="logo-checklist" alt="Checklists Logo">
			</div>
		</div>
		<div class="col-lg-8 col-md-8 col-sm-10 col-xs-8 main-headings mb0">
		  <h1>Monitoring and Supervisory System</h1>
		  <h3>Department of Health, Government of khyber Pakhtunkhwa</h3> 
		</div>
		 
		<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 icons-div pb11">
			<div class="row mt18">
				<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-12 mb0">
					<a href="#" class="user-actions">
					<img class="icon-user" src="<?php echo $assetsPath; ?>images/user.png">&nbsp;&nbsp;<?php echo $this -> session -> username; ?></a>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-9 col-lg-offset-3 col-md-9 col-md-offset-3 col-sm-12 mb0">
					<a href="<?php echo $basePath."users/logout"; ?>" class="user-actions">
					<img class="icon-logout" src="<?php echo $assetsPath; ?>images/logout.png">&nbsp;&nbsp;logout</a>
				</div>
			</div>
		</div>
	</div>
</div>