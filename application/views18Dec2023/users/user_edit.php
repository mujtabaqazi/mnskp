<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
  <div class="container">
   
    <div class="panel panel-primary">
   <div class="panel-heading text-center"> User Management (Update User's Information)
</div>
     <div class="panel-body">
		<?php 
		echo validation_errors();
		$action = $basePath."users/save";
		$action .= isset($DataRow)?'/'.$id:'';
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		echo form_open_multipart($action,$attributes); ?>
        <div class="row">
          <div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
          <div class="col-xs-2 cmargin27">
            <label>Level:</label>
          </div>
			<div class="col-xs-2">
				<select size="1" class="form-control" name="level" required="" id="level">
					<?php 
					$levell = NULL;
					if(isset($DataRow)){$levell = (($DataRow->level=="2") && ($userdists = ifuserdistricts($DataRow->id)))?"4":$DataRow->level;}
					echo getlevel_options(false,$levell,NULL,true); ?>
				</select>
			</div>
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Designation:</label>
			</div>
			<div class="col-xs-2">
				<select size="1" class="form-control" name="designation">
					<?php echo getDesignations_options(false,isset($DataRow)?$DataRow->designation:''); ?>
				</select>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>District:</label>
			</div>
			<div class="col-xs-2">
				<?php $seldist = ($levell=="4")?$userdists:$DataRow->distcode;//print_r($seldist); ?>
				<select class="form-control" id="distcode" name="distcode<?php if($levell=="4")echo '[]'; ?>" <?php if($levell=="4")echo 'multiple="multiple" style="height:60px"'; ?>>
					<?php echo getDistricts_options(false,$seldist); ?>
				</select>
			</div>
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>User Type:</label>
			</div>
			<div class="col-xs-2">
				<select size="1" class="form-control" name="utype" required="" id="utype">
					<option <?php echo (isset($DataRow) && ($DataRow->utype=="DEO"))?'selected="selected"':''; ?> value="DEO">Supervisor</option>
					<!--<option <?php //echo (isset($DataRow) && ($DataRow->utype=="Admin"))?'selected="selected"':''; ?> value="Admin">Admin</option>-->
					<option <?php echo (isset($DataRow) && ($DataRow->utype=="Manager"))?'selected="selected"':''; ?> value="Manager">Manager</option>
					<option <?php echo (isset($DataRow) && ($DataRow->utype=="Executive"))?'selected="selected"':(($levell!="3")?' style="display: none;"':''); ?> value="Executive" class="distutype">Approving Authority</option>
					<option <?php echo (isset($DataRow) && ($DataRow->utype=="ProExecutive"))?'selected="selected"':(($levell=="3")?' style="display: none;"':''); ?> value="ProExecutive" class="proutype">Approving Authority</option>
				</select>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Full Name:</label>
			</div>
			<div class="col-xs-2">
				<input class="form-control" type="text" name="fullname" id="fullname" value="<?php echo isset($DataRow)?$DataRow->fullname:''; ?>" />
			</div>
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Username:</label>
			</div>
			<div class="col-xs-2 cmargin27">
				<label><?php echo isset($DataRow)?$DataRow->username:''; ?></label>
				<input class="form-control" type="hidden" name="username" id="username" value="<?php echo isset($DataRow)?$DataRow->username:''; ?>" />
			</div>
        </div>
		<div class="row">
			<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Password:</label>
			</div>
			<div class="col-xs-2">
				<input class="form-control" type="password" name="password" id="password" />
			</div>  
		</div>
		<div class="row">
			<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Email:</label>
			</div>
			<div class="col-xs-2">
				<input class="form-control" type="text" name="email" id="email" value="<?php echo isset($DataRow)?$DataRow->email:''; ?>" />
			</div>
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Phone no:</label>
			</div>
			<div class="col-xs-2">
				<input class="form-control numberclass" type="text" name="phone" id="phone" value="<?php echo isset($DataRow)?$DataRow->phone:''; ?>" />
			</div>		  
        </div>
		<div class="row">
			<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Status:</label>
			</div>
			<div class="col-xs-2">
				<select size="1" class="form-control" name="status" required="" id="status">
					<option <?php echo (isset($DataRow) && ($DataRow->status=="1"))?'selected="selected"':''; ?> value="1">Active</option>
					<option <?php echo (isset($DataRow) && ($DataRow->status=="0"))?'selected="selected"':''; ?> value="0">InActive</option>
				</select>
			</div>
			<div class="col-xs-2 col-xs-offset-1 cmargin27">
				<label></label>
			</div>
			<div class="col-xs-2">
				
			</div>
        </div>
        <div class="row">
			<hr>
			<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
				<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
				
			  <button type="reset" class="btn btn-primary btn-md">
				<i class="fa fa-repeat"></i> Reset Form </button>
			 
			  <a class="btn btn-primary btn-md" href="<?php echo $basePath."users/lists"; ?>" ><i class="fa fa-times"></i> Cancel </a>
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
				$(".distutype").show();$(".proutype").hide();
			}else if(itsvalue === '2'){
				$(".distutype").hide();$(".proutype").show();
			}else if(itsvalue === '4'){
				$("#distcode").attr("multiple","multiple");
				$("#distcode").css("height","60px");
				$("#distcode").attr("name","distcode[]");
				$(".distutype").hide();$(".proutype").show();
			}else{
				
			}
			//$("#designation").html(alldesg);
		});
	</script>
</body>
</html>