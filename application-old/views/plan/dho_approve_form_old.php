<?php
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Visit Plan || Form</title>
<?php $this->load->view("templates/styles"); ?>
</head>
<body>
<!--start of header-->
<?php $this->load->view("templates/header"); ?>
<?php $this->load->view("templates/menu"); ?>
<!--End of header-->
<div class="container-fluid">
<div class="panel panel-primary">
<div class="panel-heading text-center"> Monthly Visit Plan Approval</div>
<div class="panel-body pbody">
<?php
echo validation_errors();
$action = $basePath."plans/dho_approved";
$attributes = array('class' => 'form-horizontal', 'id' => 'myform','accept-charset' => 'utf-8');
echo form_open_multipart($action,$attributes);
?>
<div class="row">
<div class="col-xs-3">
<label class="pt7 pb2">F Month</label>
</div>
<div class="col-xs-3">
<select class="form-control">
<option value="<?php echo date("Y")."-".date("m"); ?>" ><?php echo date("Y")."-".date("m"); ?></option>
<?php echo getFmonth_options(); ?>
</select>
</div>
</div>
<div class="row" style="padding-bottom: 1px;">
<div class="col-xs-12 cmargin27 bgcolcl text-center">
<label>List Of Visits Planned by Supervisors</label>
</div>
</div>
<div class="row bc">
<div class="col-xs-1 text-center">
<label>Sr. No.</label>
</div>
<div class="col-xs-1 brl text-center">
<label>Facode</label>
</div>
<div class="col-xs-1 br text-center">
<label>Facility Name</label>
</div>
<div class="col-xs-1 br text-center">
<label>Fatype</label>
</div>
<div class="col-xs-1 br text-center">
<label>ADHO</label>
</div>
<div class="col-xs-1 br text-center">
<label>DDHO</label>
</div>
<div class="col-xs-1 br text-center">
<label>FP-MNCH</label>
</div>
<div class="col-xs-1 br text-center">
<label>FP-LHW</label>
</div>
<div class="col-xs-1 br text-center">
<label>FP-TBC</label>
</div>
<div class="col-xs-1 br text-center">
<label>FP-EPI</label>
</div>
<div class="col-xs-1 br text-center">
<label>Assigned Vehicle</label>
</div>
<div class="col-xs-1 br text-center">
<label>Driver</label>
</div>
</div>
<div class="cloned-row">
<div class="row">
<div class="col-xs-1">
<label class="mt7">1</label>
</div>
<div class="col-xs-2 zp">
<select class="form-control">
<option value="">-- Select Facility Type--</option>
<option value="DHQ">District Head Quarter (DHQ)</option>
<option value="THQ">Tehsil Head Quarter (THQ)</option>
<option value="HOSP">HOSPITAL (HOSP)</option>
<option value="RHC">RURAL HEALTH CENTER (RHC)</option>
<option value="BHU">BASIC HEALTH UNIT (BHU)</option>
<option value="MCH">MCH CENTRE (MCH)</option>
<option value="Dispensaries">Dispensaries</option>
<option value="Others">OTHER</option>
<?php //echo getFatypes_options(); ?>
</select>
</div>
<div class="col-xs-3 zp">
<select class="form-control">
<?php echo getFacilities_options(); ?>
</select>
</div>
<div class="col-xs-3">
<div class="form-group" style="margin-bottom:0px !important;">
<div class="col-xs-12 zp">
<select class="form-control" name="option[]" >
<option value="">-- Select --</option>
<option value="">Checklist 1</option>
<option value="">Checklist 2</option>
<option value="">Checklist 3</option>
</select>
</div>
</div>
</div><!--end of main col xs-3-->
<div class="col-xs-2 zp">
<input class="dp form-control" type="text" id="" name="">
</div>
<div class="col-xs-1 zp cpb text-center">
<button type="button" class="btn btn-danger btn-xs" data-original-title="delete record"  data-toggle="tooltip" title="" id="hide"><i  class="fa fa-minus"></i></button>
</div>
</div>
<div class="row">
<div class="col-xs-3 col-xs-offset-6">
<div class="row">
<div class="col-xs-2 col-xs-offset-10 text-center">
<button type="button" class="btn btn-xs btn-default addButton"><i class="fa fa-plus"></i></button>
</div>
</div>
</div>
</div>
</div>
<div class="cloned-rowHidden hide">
<div class="row">
<div class="col-xs-1">
<label class="mt7">1</label>
</div>
<div class="col-xs-2 zp">
<select class="form-control">
<?php echo getFatypes_options(); ?>
</select>
</div>
<div class="col-xs-3 zp">
<select class="form-control">
<?php echo getFacilities_options(); ?>
</select>
</div>
<div class="col-xs-3">
<div class="form-group" style="margin-bottom:0px !important;">
<div class="col-xs-12 zp">
<select class="form-control" name="option[]" >
<option value="">-- Select --</option>
<option value="">Checklist 1</option>
<option value="">Checklist 2</option>
<option value="">Checklist 3</option>
</select>
</div>
</div>
</div><!--end of main col xs-3-->
<div class="col-xs-2 zp">
<input class="dp form-control" type="text" id="" name="">
</div>
<div class="col-xs-1 zp cpb text-center">
<button type="button" class="btn btn-danger btn-xs delRow_btn" data-original-title="delete record"  data-toggle="tooltip" title="" ><i  class="fa fa-minus"></i></button>
</div>
</div>
<div class="row">
<div class="col-xs-3 col-xs-offset-6">
<div class="row">
<div class="col-xs-2 col-xs-offset-10 text-center">
<button type="button" class="btn btn-xs btn-default addButton"><i class="fa fa-plus"></i></button>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-11 text-center">
<button type="button" class="btn btn-success btn-xs" data-original-title="add new record"  data-toggle="tooltip" title="" value="clone" id="clone"><i class="fa fa-plus"></i></button>
</div>
</div>
<br>
<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
<button type="submit" class="btn btn-primary btn-md btncc" role="button">
<i class="fa fa-floppy-o "></i> Save Form
</button>
<button type="reset" class="btn btn-primary btn-md btncc">
<i class="fa fa-repeat"></i> Reset Form
</button>
<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
</div>
</div>
<!-- The option field template containing an option field and a Remove button -->
<div class="form-group hide" id="optionTemplate" style="margin-bottom:0px !important;">
<div class="col-xs-10 zp">
<select class="form-control text-center" name="option[]" >
<option value="">-- Select --</option>
<option value="">Checklist 4</option>
<option value="">Checklist 5</option>
<option value="">Checklist 6</option>
</select>
</div>
<div class="col-xs-2 zp cpb text-center">
<button type="button" class="btn btn-default removeButton btn-xs"><i class="fa fa-minus"></i></button>
</div>
</div>
<?php echo form_close(); ?>
</div> <!--end of panel body-->
</div> <!--end of panel panel-primary-->
</div>
<!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<?php $this->load->view("templates/scripts"); ?>
<script>
$(document).ready(function() {
// The maximum number of options
var MAX_OPTIONS = 8;
$('#myform')
.formValidation({
framework: 'bootstrap',
icon: {
valid: 'glyphicon glyphicon-ok',
invalid: 'glyphicon glyphicon-remove',
validating: 'glyphicon glyphicon-refresh'
},
fields: {
question: {
validators: {
notEmpty: {
message: 'The question required and cannot be empty'
}
}
},
'option[]': {
validators: {
notEmpty: {
message: 'The option required and cannot be empty'
},
stringLength: {
max: 100,
message: 'The option must be less than 100 characters long'
}
}
}
}
})
/* // Add button click handler
.on('click', '.addButton', function() {
var $template = $('#optionTemplate'),
$clone    = $template
.clone()
.removeClass('hide')
.removeAttr('id')
.insertBefore($template),
$option   = $clone.find('[name="option[]"]');
// Add new field
$('#myform').formValidation('addField', $option);
}) */
// Remove button click handler
.on('click', '.removeButton', function() {
var $row    = $(this).parents('.form-group'),
$option = $row.find('[name="option[]"]');
// Remove element containing the option
$row.remove();
// Remove field
$('#myform').formValidation('removeField', $option);
})
// Called after adding new field
.on('added.field.fv', function(e, data) {
// data.field   --> The field name
// data.element --> The new field element
// data.options --> The new field options
if (data.field === 'option[]') {
if ($('#myform').find(':visible[name="option[]"]').length >= MAX_OPTIONS) {
$('#myform').find('.addButton').attr('disabled', 'disabled');
}
}
})
// Called after removing the field
.on('removed.field.fv', function(e, data) {
if (data.field === 'option[]') {
if ($('#myform').find(':visible[name="option[]"]').length < MAX_OPTIONS) {
$('#myform').find('.addButton').removeAttr('disabled');
}
}
});
});
$("#clone").click(function() {
$(".cloned-rowHidden:first").clone().removeClass('cloned-rowHidden hide').addClass("cloned-row").insertAfter(".cloned-row:last");
});
$(document).on("click",".addButton",function() {
$("#optionTemplate").clone().removeClass('hide').removeAttr('id').insertAfter($(this).closest('div[class^="cloned-row"]').find(".form-group:last"));
});
$(document).on("click",".delRow_btn",function() {
$(this).closest('div[class^="cloned-row"]').remove();
});
$(document).ready(function(){
$("#hide").click(function(){
$('.t1').hide();
});
$("#show").click(function(){
$("p").show();
});
});
</script>
</body>
</html>