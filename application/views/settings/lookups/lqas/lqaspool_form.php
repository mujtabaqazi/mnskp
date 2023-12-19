<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LQAS Pool Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> LQAS Pool Management (<?php echo isset($DataRow)?'Update':'Add New'; ?> LQAS Pool)</div>
			<div class="panel-body">
				<?php 
				echo validation_errors();
				$action = $basePath."settings/lqaspool_save";
				$action .= isset($DataRow)?'/'.$id:'';
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				echo form_open_multipart($action,$attributes); ?>				
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 "></div>
					<div class="col-xs-2 ">
						<label>Description:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="description" id="description" value="<?php echo isset($DataRow)?$DataRow->description:''; ?>" placeholder="Description e.g: OPD Male (New Cases) (< 1 yrs)" />
					</div>
					<div class="col-xs-1  "></div>
					<div class="col-xs-2 ">
						<label>Mis_col:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="mis_col" id="mis_col" value="<?php echo isset($DataRow)?$DataRow->mis_col:''; ?>" placeholder="N-34_f1" />
					</div>
				</div>
				<div class="row"> 
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2 ">
						<label>Program:</label>
					</div>
					<div class="col-xs-2">
						<select size="1" class="form-control" name="ptype" id="ptype">
							<?php echo getPrograms_options(false,isset($DataRow)?$DataRow->ptype:"DG/DHO Office");?>
							<!--<?php //echo isset($DataRow)?$DataRow->ptype:"DG/DHO Office"; ?>-->
						</select>
					</div>
					<div class="col-xs-1 "></div>
					<div class="col-xs-2 ">
						<label>Register:</label>
					</div>
					<div class="col-xs-2">
						<select size="1" class="form-control" name="register">
						<?php echo getregister_options(false,isset($DataRow)?$DataRow->register:NULL);?>
						</select>
					</div>	
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Apply On:</label>
					</div>
					<div class="col-xs-2">
					<?php $isphc= isset($DataRow)?$DataRow->isphc:0;
							$isrhc= isset($DataRow)?$DataRow->isrhc:0;
							$isshc= isset($DataRow)?$DataRow->isshc:0;
					?>
						<input type="checkbox" <?php echo ($isphc==1)?'checked="checked"':'';?> name="isphc" value="1">PHC
					
						<input type="checkbox" <?php echo ($isrhc==1)?'checked="checked"':'';?> name="isrhc" value="1">RHC
					
						<input type="checkbox" <?php echo ($isshc==1)?'checked="checked"':'';?> name="isshc" value="1">SHC
					
					</div>
					</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
						
						<button type="reset" class="btn btn-primary btn-md"><i class="fa fa-repeat"></i> Reset Form </button>
					 
					  <a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/lqaspool"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<script type="text/javascript">
			 $(document).ready(function() {
				 $(document).on("change","#ptype",function(){
						var itsvalue = $(this).val();
					$('#ptype option:last-child').text("DG/DHO Office");
						
				});
				$("#ptype").trigger("change");
				});			 
		</script>
</body>
</html>