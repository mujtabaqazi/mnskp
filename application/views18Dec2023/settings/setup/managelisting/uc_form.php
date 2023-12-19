<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>M&S || <?php if(isset($DataRow)){ echo "Update"; }else{ echo "Add";} ?> Unioncouncil</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> <?php if(isset($DataRow)){ echo "Update"; }else{ echo "Add New";} ?> Unioncouncil</div>
			<div class="panel-body">
				<?php 
				echo validation_errors();
				$distcode= $tcode ="";
				$edit = false;
				if(isset($DataRow)){
					$edit = true;
					$id= $DataRow->unid;
					$distcode = $DataRow->distcode;
					$tcode = $DataRow->tcode;
					$action = $basePath."settings/setup/uc_save/".$id;
				}else{
					$action = $basePath."settings/setup/uc_save";
				}
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				echo form_open_multipart($action,$attributes); ?>				
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
						<label>Unioncouncil Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->un_name !="")?$DataRow->un_name:''; ?>" name="un_name" id="un_name" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Uc code:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" readonly="readonly" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->uncode !="")?$DataRow->uncode:''; ?>" name="uncode" id="uncode" />
					</div>					
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Population:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" value="<?php echo (isset($DataRow) && $DataRow->population !="")?$DataRow->population:''; ?>" name="population" id="population" />
					</div>
					<div class="col-xs-1 cmargin27"></div>				
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
						
					  <button type="reset" class="btn btn-primary btn-md">
						<i class="fa fa-repeat"></i> Reset Form </button>
					 
					  <a class="btn btn-primary btn-md" href="<?php echo $basePath."setup/uc_list"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
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
				data: {distcode:distcode,tcode:tcode},
				url: "<?php echo $basePath; ?>settings/Setup/generateUcode",
				async: false,
				success: function(result){
					var data = JSON.parse(result);
					if(data['code']){
						$('#uncode').val(data['code']);
					}else{
						alert(data['message']);
					}
				}
			});
		});
		<?php if(isset($DataRow)){ ?>
		$(function(){
			$('#distcode option:nth-child(1)').remove();
			$('#tcode1 option:nth-child(1)').remove();
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