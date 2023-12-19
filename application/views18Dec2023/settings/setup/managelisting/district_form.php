<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add District</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> Add New District</div>
			<div class="panel-body">
				<?php 
				echo validation_errors();
				if(isset($DataRow)){
					$id= $DataRow->distid;
					$action = $basePath."settings/setup/district_save/".$id;
				}else{
					$action = $basePath."settings/setup/district_save";
				}
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				echo form_open_multipart($action,$attributes); ?>				
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>District Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" type="text" value="<?php echo (isset($DataRow) && $DataRow->district !="")?$DataRow->district:''; ?>" name="district" id="district" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Population:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->population !="")?$DataRow->population:''; ?>" name="population" id="population" />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Coordinates:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->coordinates !="")?$DataRow->coordinates:''; ?>" name="coordinates" id="coordinates" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Short Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->shortname !="")?$DataRow->shortname:''; ?>" name="shortname" id="shortname" />
					</div>		  
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
						
					  <button type="reset" class="btn btn-primary btn-md">
						<i class="fa fa-repeat"></i> Reset Form </button>
					 
					  <a class="btn btn-primary btn-md" href="<?php echo $basePath."setup/district_list"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<script type="text/javascript">
		$(document).on("change","#level",function(){
			var itsvalue = $(this).val()
			$("#distcode").removeAttr("multiple");
			$("#distcode").css("height","auto");
			$("#distcode").attr("name","distcode");
			$(".distutype").hide();$(".proutype").hide();
			if(itsvalue === '3'){
				//district level
				var alldistricts = '<?php echo getDistricts_options(); ?>';
				var alldesg = '<?php echo getDesignations_options(false,NULL,3); ?>';
				$("#distcode").html(alldistricts);
				$(".distutype").show();$(".proutype").hide();
			}else if(itsvalue === '2'){
				//province level
				var alldesg = '<?php echo getDesignations_options(false,NULL,2); ?>';
				$("#distcode").html('<option value="">-- All Districts --</option>');
				$(".distutype").hide();$(".proutype").show();
			}else if(itsvalue === '4'){
					//multi district level
					var alldistricts = '<?php echo getDistricts_options(); ?>';
					var alldesg = alldesg + '<?php echo getDesignations_options(false,NULL,2); ?>';
					$("#distcode").html(alldistricts);
					//set option for multiple districts selection
					$("#distcode").attr("multiple","multiple");
					$("#distcode").css("height","60px");
					$("#distcode").attr("name","distcode[]");
					$(".distutype").hide();$(".proutype").show();
			}else{
				
			}
			$("#designation").html(alldesg);
		});
		//trigger level
		$("#level").trigger("change");
		$(document).on("change","#repass,#password",function(){
			var itsvalue = $("#repass").val()
			if(itsvalue === $("#password").val()){
				$("#repass").css("border","solid green");
			}else{
				$("#repass").css("border","solid red");
			}
		});
		//check username
		$("#myform").submit(function(e){
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
		});
	</script>
</body>
</html>