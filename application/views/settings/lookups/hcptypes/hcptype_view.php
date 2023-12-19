<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HCP Types Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> HCP Type Management (View HCP Type)</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Name:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->name:''; ?></p>
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
						<label>Data Entry Type:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->entry_type:''; ?></p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Table:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->tablename:''; ?></p>
					</div>
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/hcptype_edit/".$id; ?>" ><i class="fa fa-times"></i> Update </a> 
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/hcptypes"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
</body>
</html>