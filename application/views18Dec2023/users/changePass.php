<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$ulevel = $this -> session -> userLevel;
$utype = $this -> session -> utype;
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monitoring and Supervisory Checklists</title>
	  
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>	
		<!--End of header-->
		<div class="container"><?php 
			if($ulevel=="2" and $utype == 'Admin'){?>
				<div class="col-md-6 col-md-offset-3" style="border: 1px solid rgb(231, 231, 231); background-color: rgb(14, 110, 171);">
					<h3 style="color: white;font-weight: bold;" class="text-center">Update User's Password</h3><hr>				
					<form class="form-horizontal " method="post" action="<?php echo base_url("update_pass"); ?>">
						<div class="form-group">
							<label style="color: white;" class="col-sm-4 control-label">Enter user's username:</label>
							<div class="col-sm-7">
								<input class="form-control" id="user_username" name="user_username" placeholder="Username of user whose password will be changed" type="text" value="<?php echo set_value('user_username');?>">
							</div>
						</div>
						<div class="form-group">
							<label style="color: white;" for="inputPassword3" class="col-sm-4 control-label">Enter New Password:</label>
							<div class="col-sm-7">
							  <input class="form-control" id="new_pass" name="new_pass" placeholder="New Password" type="password" value="<?php echo set_value('new_pass');?>">
							</div>
						</div>
						<div class="form-group">
							<label style="color: white;" class="col-sm-4 control-label">Re-enter New Password:</label>
							<div class="col-sm-7">
							  <input class="form-control" id="conf_pass" name="conf_pass" placeholder="Confirm New Password" type="password" value="<?php echo set_value('conf_pass');?>">
							</div>
						</div>
						<p class="text-center"><?php echo validation_errors(); ?></p>
						<div class="form-group">
							<div class=" col-sm-4 col-sm-offset-4 col-xs-8" style="padding-right: 0px;">
								<button type="submit" class="btn btn-default" style="font-weight: bold; border-radius: 0px; width: 100%;"><i class="fa fa-pencil-square-o"></i> Update Password</button>
							</div>
							<div class="col-sm-3 col-xs-4" style="padding-left: 3px;">
								<button type="submit" class="btn btn-default" style="font-weight: bold; border-radius: 0px; width: 100%;"><i class="fa fa-times"></i> Cancel</button>
							</div>
						</div>
						<hr>
						<p style="color:white;">! Check all information before updating password.</p>
					</form>
				</div><?php
			}?>
			<div class="col-md-6 col-md-offset-3" style="border: 1px solid rgb(231, 231, 231); background-color: rgb(14, 110, 171);">
        		<h3 style="color: white;font-weight: bold;" class="text-center">Update Own Password</h3><hr>
				<form class="form-horizontal" method="post" action="<?php echo base_url("update_my_pass"); ?>">
					<div class="form-group">
					    <label style="color: white;" class="col-sm-4 control-label">Enter current password:</label>
					    <div class="col-sm-7">
							<input class="form-control" id="curr_pass" name="curr_pass" placeholder="Current" type="password" value="<?php echo set_value('curr_pass');?>">
					    </div>
					</div>
					<div class="form-group">
					    <label style="color: white;" for="inputPassword3" class="col-sm-4 control-label">Enter a new password:</label>
					    <div class="col-sm-7">
					      <input class="form-control" id="new_pass" name="new_pass" placeholder="New Password" type="password" value="<?php echo set_value('new_pass');?>">
					    </div>
					</div>
					<div class="form-group">
					    <label style="color: white;" class="col-sm-4 control-label">Re-enter new password:</label>
					    <div class="col-sm-7">
							<input class="form-control" id="conf_pass" name="conf_pass" placeholder="Confirm New Password" type="password" value="<?php echo set_value('conf_pass');?>">
					    </div>
					</div>
					<p class="text-center"><?php echo validation_errors(); ?></p>
					<div class="form-group">
						<div class=" col-sm-4 col-sm-offset-4 col-xs-8" style="padding-right: 0px;">
							<button type="submit" class="btn btn-default" style="font-weight: bold; border-radius: 0px; width: 100%;"><i class="fa fa-pencil-square-o"></i> Update Password</button>
						</div>
						<div class="col-sm-3 col-xs-4" style="padding-left: 3px;">
							<button type="submit" class="btn btn-default" style="font-weight: bold; border-radius: 0px; width: 100%;"><i class="fa fa-times"></i> Cancel</button>
						</div>
					</div>
					<hr>
					<p style="color:white;">! Check all information before updating password.</p>
				</form>
        	</div>
	</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>