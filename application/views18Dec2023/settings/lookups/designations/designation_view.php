<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Designations Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  

	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> Designation Management (<?php echo isset($DataRow)?'View':''; ?> Designation)</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Designation:</label>
					</div>
					<div class="col-xs-7">
						<p><?php echo isset($DataRow)?$DataRow->designation:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Short Name:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->shortname:''; ?></p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Display Name:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->displayname:''; ?></p>
					</div>		  
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Level:</label>
					</div>
					<div class="col-xs-2">
						<p><?php 
							if($DataRow){
								switch($DataRow->level){
									case '1':
										echo 'Super Admin';
										break;
									case '2':
										echo 'Province';
										break;
									case '3':
										echo 'District';
										break;
									default:
										echo '';
										break;
								}
							} ?>
						</p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Program:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo get_Program_Name(($DataRow)?$DataRow->ptype:NULL); ?>
						</p>
					</div>
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/designation_edit/".$id; ?>" ><i class="fa fa-times"></i> Update </a> 
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/designations"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
</body>
</html>