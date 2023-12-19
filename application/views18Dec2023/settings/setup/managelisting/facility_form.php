<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M&S || <?php if(isset($DataRow)){ echo "Update"; }else{ echo "Add";} ?> Facility</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> <?php if(isset($DataRow)){ echo "Update"; }else{ echo "Add New";} ?> Facility</div>
			<div class="panel-body">
				<?php 
				echo validation_errors();
				$distcode= $tcode = $uncode ="";
				$edit = false;
				if(isset($DataRow)){
					$edit = true;
					$id= $DataRow->facid;
					$distcode = $DataRow->distcode;
					$tcode = $DataRow->tcode;
					$uncode = $DataRow->uncode;
					$action = $basePath."settings/setup/facility_save/".$id;
				}else{
					$action = $basePath."settings/setup/facility_save";
				}
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				echo form_open_multipart($action,$attributes); ?>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Facility Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->fac_name !="")?$DataRow->fac_name:''; ?>" name="fac_name" id="fac_name" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Facility Code:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" readonly="readonly" type="text" value="<?php echo (isset($DataRow) && $DataRow->facode !="")?$DataRow->facode:''; ?>" name="facode" id="facode" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>District Name:</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="distcode" name="distcode">
						<?php 
						echo getDistricts_options(false,$distcode,$edit); ?>
						</select>
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Tehsil Name:</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="tcode1" name="tcode">
						<?php if(isset($DataRow)){ 
							echo getTehsils_options(false,$tcode,$distcode,$edit);
						}else{
						?>
						<option value="">--Tehsil--</option>
						<?php } ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Union Council:</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="uncode" name="uncode">
						<?php if(isset($DataRow)){ 
							echo getUCs_options(false,$uncode,$distcode,$edit);
						}else{ 
						?>
						<option value="">--UCs--</option>
						<?php }
						?>
						</select>
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Area Type:</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" name="areatype" id="areatype">
							<option <?php echo ( (isset($DataRow) && $DataRow->areatype == 'Urban') ? 'selected = "selected"' : ''); ?> value="Urban">Urban</option>
							<option <?php echo ( (isset($DataRow) && $DataRow->areatype == 'Rural') ? 'selected = "selected"' : ''); ?> value="Rural">Rural</option>
						</select>
					</div>					
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Facility Type:</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" name="fatype" id="fatype">
						</select>
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Facility Class:</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" name="fac_class" id="fac_class">
							<option <?php echo ( (isset($DataRow) && $DataRow->fac_class == 'Class 1') ? 'selected = "selected"' : ''); ?> value="Class 1">Class 1</option>
							<option <?php echo ( (isset($DataRow) && $DataRow->fac_class == 'Class 2') ? 'selected = "selected"' : ''); ?> value="Class 2">Class 2</option>
							<option <?php echo ( (isset($DataRow) && $DataRow->fac_class == 'Class 3') ? 'selected = "selected"' : ''); ?> value="Class 3">Class 3</option>
							<option <?php echo ( (isset($DataRow) && $DataRow->fac_class == 'Class 4') ? 'selected = "selected"' : ''); ?> value="Class 4">Class 4</option>
							<option <?php echo ( (isset($DataRow) && $DataRow->fac_class == 'Class 5') ? 'selected = "selected"' : ''); ?> value="Class 5">Class 5</option>
						</select>
					</div>					
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
						
					  <button type="reset" class="btn btn-primary btn-md">
						<i class="fa fa-repeat"></i> Reset Form </button>
					 
					  <a class="btn btn-primary btn-md" href="<?php echo $basePath."setup/facility_list"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<script>
	<?php if(isset($DataRow)){ ?>
	var selectedfatype = '<?php echo $DataRow->fatype; ?>';
	<?php } ?>
	</script>
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<script type="text/javascript">
		
		$('#distcode').on('change' , function (){
			var distcode = $('#distcode').val();
		  $.ajax({
			type: "POST",
			data: "distcode="+distcode,
			url: "<?php echo $basePath; ?>settings/Setup/getTehsils",
			async: false,
			success: function(result){
			  $('#tcode1').html(result);

			  <?php if(isset($dataFacility) && !empty($dataFacility)){ ?>
			  $('#tcode1').val(<?php echo $dataFacility['tcode']; ?>);
			  <?php } ?>
			}
		  });
			
		});
		$('#tcode1').on('change' , function (){
			var distcode = $('#distcode').val();
			var tcode = $('#tcode1').val();
			$.ajax({
				type: "POST",
				data: {tcode:tcode},
				url: "<?php echo $basePath; ?>settings/Setup/getUnC",
				async: false,
				success: function(result){
					$('#uncode').html(result);
				}
			});
			$.ajax({
				type: "POST",
				data: {distcode:distcode,tcode:tcode},
				url: "<?php echo $basePath; ?>settings/Setup/generatefaCode",
				async: false,
				success: function(returnD){
					if(returnD){
						$('#facode').val(returnD);
					}else{
						alert('Please select district!');
					} 
				}
			});
		});
		
		/* $('#fac_name').on('blur' , function (){
			
		}); */
		<?php if(isset($DataRow)){ ?>
		$(function(){
			$('#distcode option:nth-child(1)').remove();
			$('#tcode1 option:nth-child(1)').remove();
			$('#uncode option:nth-child(1)').remove();
		});
		<?php } ?>
		//check username
		/* $("#myform").submit(function(e){
			var form    = $(this);
			e.preventDefault();
			//check if username exist.
			$.ajax({
				type: 'POST',
				url:'<?php echo $basePath; ?>Users/check_username',
				data:{username:$("#username").val()},
				success: function(response){
					console.log(response);
					if (response=="exists") {
						alert("Username Already Exists, Please Try Again.");
					}else
					{
						form.get(0).submit();
					}
				}
			});
		}); */
	</script>
</body>
</html>