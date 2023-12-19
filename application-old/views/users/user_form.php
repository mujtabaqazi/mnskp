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
<div class="panel-heading text-center"> User Management (Add New User)</div>
<div class="panel-body">
<?php
echo validation_errors();
$action = $basePath."users/save";
$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
echo form_open_multipart($action,$attributes); ?>
<div class="row">
<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Level:</label>
</div>
<div class="col-xs-2">
<select class="form-control" required="required" type="text" name="level" id="level" >
<?php echo getlevel_options(false,NULL,NULL,true); ?>
</select>
</div>
<div class="col-xs-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Designation:</label>
</div>
<div class="col-xs-2">
<select size="1" class="form-control" id="designation" name="designation">

</select>
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>District:</label>
</div>
<div class="col-xs-2">
<select class="form-control" id="distcode" name="distcode"></select>
</div>
<div class="col-xs-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>User Type:</label>
</div>
<div class="col-xs-2">
<select size="1" class="form-control" name="utype" required="" id="utype">
<option value="DEO">Supervisor</option>
<!--<option value="Admin">Admin</option>-->
<option value="Manager">Manager</option>
<option value="Executive" class="distutype">Approving Authority</option>
<option value="ProExecutive" class="proutype">Approving Authority</option>
</select>
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Full Name:</label>
</div>
<div class="col-xs-2">
<input class="form-control" type="text" name="fullname" id="fullname" />
</div>
<div class="col-xs-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Username:</label>
</div>
<div class="col-xs-2">
<input class="form-control" required="required" type="text" name="username" id="username" />
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Password:</label>
</div>
<div class="col-xs-2">
<input class="form-control" required="required" type="password" name="password" id="password" />
</div>
<div class="col-xs-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Retype Password:</label>
</div>
<div class="col-xs-2">
<input class="form-control" required="required" type="password" name="" id="repass" />
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Email:</label>
</div>
<div class="col-xs-2">
<input class="form-control" type="text" name="email" id="email" />
</div>
<div class="col-xs-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Phone no:</label>
</div>
<div class="col-xs-2">
<input class="form-control numberclass" required="required" type="text" name="phone" id="phone" />
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
<label>Status:</label>
</div>
<div class="col-xs-2">
<select size="1" class="form-control" name="status" required="" id="status">
<option value="1">Active</option>
<option value="0">InActive</option>
</select>
</div>
<div class="col-xs-1 cmargin27"></div>
<div class="col-xs-2 cmargin27">
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