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
			<div class="panel-heading text-center"> HCP Type Management (<?php echo isset($DataRow)?'Update':'Add New'; ?> HCP Type)</div>
			<div class="panel-body">
				<?php 
				echo validation_errors();
				$action = $basePath."settings/hcptype_save";
				$action .= isset($DataRow)?'/'.$id:'';
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				echo form_open_multipart($action,$attributes); ?>				
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="name" id="name" value="<?php echo isset($DataRow)?$DataRow->name:''; ?>" placeholder="e.g:dho office" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Display Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="displayname" id="displayname" value="<?php echo isset($DataRow)?$DataRow->displayname:''; ?>" placeholder="e.g:DHO Office" />
					</div>		  
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Data Entry Type:</label>
					</div>
					<div class="col-xs-2">
						<select size="1" class="form-control" name="entry_type" id="entry_type">
							<option value="" <?php echo (isset($DataRow) && ($DataRow->entry_type==""))?'selected="selected"':''; ?>>Default</option>
							<option value="code" <?php echo (isset($DataRow) && ($DataRow->entry_type=="code"))?'selected="selected"':''; ?>>Code</option>
							<option value="name" <?php echo (isset($DataRow) && ($DataRow->entry_type=="name"))?'selected="selected"':''; ?>>Name</option>
						</select>
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Table:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="tablename" id="tablename" value="<?php echo isset($DataRow)?$DataRow->tablename:''; ?>" placeholder="e.g:cmwdb" />
					</div>
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
						
					  <button type="reset" class="btn btn-primary btn-md">
						<i class="fa fa-repeat"></i> Reset Form </button>
					 
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