<?php
$basePath = base_url();
$assetsPath = base_url()."assets/";
$ulevel = $this -> session -> userLevel;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Visit Plan || Form</title>
<?php $this->load->view("templates/styles"); ?>
<style>
.form-control{
padding:4px !important;
font-size: 12px !important;
}
</style>
</head>
<body>
<!--start of header-->
<?php $this->load->view("templates/header"); ?>
<?php $this->load->view("templates/menu"); ?>
<!--End of header-->
<div class="container-fluid">
<div class="panel panel-primary">
<div class="panel-heading text-center"> Monthly Visit Plan</div>
<div class="panel-body pbody">
<?php
echo validation_errors();
$action = $basePath."plans/save";
$attributes = array('class' => 'form-horizontal', 'id' => 'myform','accept-charset' => 'utf-8');
echo form_open_multipart($action,$attributes);
?>
<div class="row">
<div class="col-xs-3">
<label class="pt7 pb2">Visit plan submission date</label>
</div>
<div class="col-xs-3">
<input class="dp form-control" value="<?php echo date("d-m-Y"); ?>" readonly="readonly" required="required" type="text" id="plandate" name="plandate">
</div>
<div class="col-xs-3">
<label class="pt7 pb2">Name of Supervisor</label>
</div>
<div class="col-xs-3">
<input class="form-control" required="required" type="text" id="supervisor" name="supervisor">
</div>
</div>
<div class="row">
<div class="col-xs-3">
<label class="pt7 pb2">Designation of Supervisor</label>
</div>
<div class="col-xs-3">
<select class="form-control">
<?php echo getDesignations_options(); ?>
</select>
</div>
<div class="col-xs-3">
<label class="pt7 pb2">Posting Place</label>
</div>
<div class="col-xs-3">
<input class="form-control" required="required" type="text" id="postingplace" name="postingplace">
</div>
</div>
<div class="row">
<div class="col-xs-3">
<label class="pt7 pb2">Program</label>
</div>
<div class="col-xs-3">
<select class="form-control" required="required" id="ptype" name="ptype" >
<?php echo getPrograms_options(); ?>
</select>
</div>
<div class="col-xs-3">
<label class="pt7 pb2">Total No. of field visits planned</label>
</div>
<div class="col-xs-3">
<input class="form-control" required="required" type="text" value="1" id="fieldvisitsplanned" name="fieldvisitsplanned" readonly>
</div>
</div>
<div class="row">
<div class="col-xs-3">
<label class="pt7 pb2">Year - Month</label>
</div>
<div class="col-xs-3">
<select class="form-control" required="required" id="fmonth" name="fmonth" >
<?php
$dayy = date("d");
if($dayy>15){
$nextfmnth=date('Y-m', strtotime(date('Y-m')." +1 month"));
echo getChklstFmonth_options(false,$nextfmnth);
}else{
echo getChklstFmonth_options();
}
?>
</select>
</div>
<div class="col-xs-3">
<label class="pt7 pb2"><?php if($ulevel=="3")echo "District";if($ulevel=="2")echo "Province"; ?></label>
</div>
<div class="col-xs-3">
<input class="form-control" type="text" readonly="readonly" value="<?php if($ulevel=="3")echo get_District_Name($this -> session -> distcode);if($ulevel=="2")echo "Khyber Pakhtunkhwa"; ?>" >
</div>
</div>
<div class="row" style="padding-bottom: 1px;">
<div class="col-xs-12 cmargin27 bgcolcl text-center">
<label>List Of Facilities - Visits Planned</label>
</div>
</div>
<div class="row bc">
<?php if($this -> session -> userLevel == '2'){ ?>
<div class="col-xs-1">
<div class="row">
<div class="col-xs-2 zp text-center">
<label>#</label>
</div>
<div class="col-xs-10 zp bl text-center">
<label>Visit Category</label>
</div>
</div>
</div>
<div class="col-xs-1 zp brl text-center">
<label>District</label>
</div>
<?php }else{ ?>
<div class="col-xs-1 text-left">
<label>Sr. No.</label>
</div>
<div class="col-xs-1 zp brl text-center">
<label>Visit Category</label>
</div>
<?php } ?>
<div class="col-xs-1 zp br text-center">
<label>Facility Type</label>
</div>
<div class="col-xs-2 br text-center">
<label>Facility Name</label>
</div>
<div class="col-xs-6">
<div class="row">
<div class="col-xs-6"><label>Checklist</label></div>
<div class="col-xs-2 brl zp text-center"><label>HCP Type</label></div>
<div class="col-xs-4 br "><label>HCP Name</label></div>
</div>
</div>
<div class="col-xs-1 text-center">
<label>Date</label>
</div>
</div>
<div class="cloned-row">
<div class="row">
<?php if($this -> session -> userLevel == '2'){ ?>
<div class="col-xs-1">
<div class="row">
<div class="col-xs-2 zp text-left">
<label class="pt7 pb2">1</label>
</div>
<div class="col-xs-10 zp">
<select class="form-control" name="visitcategory[1]">
<option value="DAP">DAP</option>
<option value="Vertical Program">Program</option>
</select>
</div>
</div>
</div>
<div class="col-xs-1 zp">
<select class="form-control" name="" id="distcode">
<?php echo getDistricts_options(true); ?>
</select>
</div>
<?php }else{ ?>
<div class="col-xs-1">
<label class="mt7">1</label>
</div>
<div class="col-xs-1 zp">
<select class="form-control" name="visitcategory[1]">
<option value="DAP">DAP</option>
<option value="Vertical Program">Program</option>
</select>
</div>
<?php } ?>

<div class="col-xs-1 zp">
<select class="form-control fatype" required="required">
<option value="">Select Facility Type</option>
<option value="DHQ">DHQ - District Head Quarter</option>
<option value="THQ">THQ - Tehsil Head Quarter</option>
<option value="HOSP">HOSP - HOSPITAL</option>
<option value="RHC">RHC - RURAL HEALTH CENTER</option>
<option value="BHU">BHU - BASIC HEALTH UNIT</option>
<option value="MCH">MCH - MCH CENTRE</option>
<option value="ADMIN">DHO - District Health Office</option>
<option value="Dispensaries">Dispensaries</option>
<option value="school">CMW School</option>
<option value="Others">OTHER</option>
</select>
</div>
<div class="col-xs-2 zp">
<select class="form-control facilities" required="required" name="facode[1]" >
<?php //echo getFacilities_options(); ?>
</select>
</div>
<div class="col-xs-6">
<div class="form-group" style="margin-bottom:0px !important;">
<div class="col-xs-6 zp">
<select class="form-control checklists" required="required" name="checklistid[1][]" >
<?php echo $checklists_options = getChecklists_options(true); ?>
</select>
</div>
<div class="col-xs-2 zp">
<select class="form-control targets" required="required" name="hcptype_id[1][]">

</select>
</div>
<div class="col-xs-4 zp hcp">

</div>
</div>
</div><!--end of main col xs-3-->
<div class="col-xs-1 zp">
<div class="row">
<div class="col-xs-12">
<input style="width:70%;float:left;" class="dp form-control firstdp" required="required" type="text" id="" name="visitdate[1]">
<button style="float:right;margin-top:4%;margin-right:3%;" type="button" class="btn btn-danger btn-xs" data-original-title="delete record"  data-toggle="tooltip" title="delete record" id="hide"><i  class="fa fa-minus"></i></button>
</div>
</div>
</div>
<!--<div class="col-xs-1 zp cpb text-center">

</div>-->
</div>
<div class="row">
<div class="col-xs-3 col-xs-offset-8">
<div class="row">
<div class="col-xs-1 col-xs-offset-10 text-left">
<button type="button" class="btn btn-xs btn-default addButton"><i class="fa fa-plus"></i></button>
</div>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-1 col-xs-offset-11 text-right zp">
<button style="margin-right:3%" type="button" class="btn btn-success btn-xs" data-original-title="add new record"  data-toggle="tooltip" title="" value="clone" id="clone"><i class="fa fa-plus"></i></button>
</div>
</div>
<br>
<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
<button type="submit" class="btn btn-primary btn-md btncc" role="button">
<i class="fa fa-floppy-o "></i> Submit Plan
</button>
<button type="reset" class="btn btn-primary btn-md btncc">
<i class="fa fa-repeat"></i> Reset Form
</button>
<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
</div>
</div>
<?php echo form_close(); ?>
<div class="cloned-rowHidden hide">
<div class="row">
<?php if($this -> session -> userLevel == '2'){ ?>
<div class="col-xs-1">
<div class="row">
<div class="col-xs-2 zp text-left">
<label class="pt7 pb2">1</label>
</div>
<div class="col-xs-10 zp">
<select class="form-control" name="visitcategory[]">
<option value="DAP">DAP</option>
<option value="Vertical Program">Program</option>
</select>
</div>
</div>
</div>
<div class="col-xs-1 zp">
<select class="form-control" name="" id="distcode">
<?php echo getDistricts_options(true); ?>
</select>
</div>
<?php }else{ ?>
<div class="col-xs-1">
<label class="mt7">1</label>
</div>
<div class="col-xs-1 zp">
<select class="form-control" name="visitcategory[]">
<option value="DAP">DAP</option>
<option value="Vertical Program">Program</option>
</select>
</div>
<?php } ?>
<div class="col-xs-1 zp">
<select class="form-control fatype">
<option value="">Select Facility Type</option>
<option value="DHQ">District Head Quarter (DHQ)</option>
<option value="THQ">Tehsil Head Quarter (THQ)</option>
<option value="HOSP">HOSPITAL (HOSP)</option>
<option value="RHC">RURAL HEALTH CENTER (RHC)</option>
<option value="BHU">BASIC HEALTH UNIT (BHU)</option>
<option value="MCH">MCH CENTRE (MCH)</option>
<option value="ADMIN">District Health Office (DHO)</option>
<option value="Dispensaries">Dispensaries</option>
<option value="school">CMW School</option>
<option value="Others">OTHER</option>
</select>
</div>
<div class="col-xs-2 zp">
<select class="form-control facilities" required="required" name="facode[]" >
<?php //echo getFacilities_options(); ?>
</select>
</div>
<div class="col-xs-6">
<div class="form-group" style="margin-bottom:0px !important;">
<div class="col-xs-6 zp">
<select class="form-control checklists" required="required" name="checklistid[]" >
<?php echo $checklists_options; ?>
</select>
</div>
<div class="col-xs-2 zp">
<select class="form-control targets" required="required" name="hcptype_id[]">

</select>
</div>
<div class="col-xs-4 zp hcp">

</div>
</div>
</div><!--end of main col xs-3-->
<div class="col-xs-1 zp">
<div class="row">
<div class="col-xs-12">
<input style="width:70%;float:left;" class="dp form-control" required="required" type="text" id="" name="visitdate[]">
<button style="float:right;margin-top:4%;margin-right:3%;" type="button" class="btn btn-danger btn-xs delRow_btn" data-original-title="delete record"  data-toggle="tooltip" title="delete record" id="hide"><i  class="fa fa-minus"></i></button>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-3 col-xs-offset-8">
<div class="row">
<div class="col-xs-1 col-xs-offset-10 text-left">
<button type="button" class="btn btn-xs btn-default addButton"><i class="fa fa-plus"></i></button>
</div>
</div>
</div>
</div>
</div>
<!-- The option field template containing an option field and a Remove button -->
<div class="form-group hide" id="optionTemplate" style="margin-bottom:0px !important;">
<div class="col-xs-6 zp">
<select class="form-control checklists" required="required" name="checklistid[]">
<?php echo $checklists_options; ?>
</select>
</div>
<div class="col-xs-2 zp">
<select class="form-control targets" required="required" name="hcptype_id[]">

</select>
</div>
<div class="col-xs-3 zp hcp">

</div>
<div class="col-xs-1 zp cpb text-center">
<button type="button" class="btn btn-default removeButton btn-xs"><i class="fa fa-minus"></i></button>
</div>
</div>
</div> <!--end of panel body-->
</div> <!--end of panel panel-primary-->
</div>
<!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<script>
var dateSet = "custom";
</script>
<?php $this->load->view("templates/scripts"); ?>
<script>
function dateBasedonFmonth(){
$('.dp').datepicker({
format : "dd-mm-yyyy",
startDate: getStartDate(),
endDate: getEndDate()
});
}
function getStartDate() {
var yearMonth = $('#fmonth').val();
var arr = yearMonth.split('-');
var Month = parseInt(arr[1]);
var today = new Date();
if((Month-1) == today.getMonth()){
var ourStartDate = '-0m';
}else{
var ourStartDate = new Date(today.getFullYear(), today.getMonth() + 1, 1);
}
return ourStartDate;
}
function getEndDate() {
var yearMonth = $('#fmonth').val();
var arr = yearMonth.split('-');
var Month = parseInt(arr[1]);
var today = new Date();
if((Month-1) == today.getMonth()){
var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0);
}else{
var lastDate = new Date(today.getFullYear(), today.getMonth() + 2, 0);
}
return lastDate;
}
$( function(){
dateBasedonFmonth();
});
$(document).ready(function() {

// The maximum number of options
var MAX_OPTIONS = 8;
$('#myform')/*.formValidation({
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
'checklistid[]': {
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
})*/
// Remove button click handler
.on('click', '.removeButton', function() {
var $row    = $(this).parents('.form-group'),
$option = $row.find('[name="checklistid[]"]');
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
if (data.field === 'checklistid[]') {
if ($('#myform').find(':visible[name="checklistid[]"]').length >= MAX_OPTIONS) {
$('#myform').find('.addButton').attr('disabled', 'disabled');
}
}
})
// Called after removing the field
.on('removed.field.fv', function(e, data) {
if (data.field === 'checklistid[]') {
if ($('#myform').find(':visible[name="checklistid[]"]').length < MAX_OPTIONS) {
$('#myform').find('.addButton').removeAttr('disabled');
}
}
});
});
$(document).on("click","#clone",function() {
var currentIndex = parseInt($(".cloned-row:last .row:nth-child(1) div:first label:first").text());
$(".cloned-rowHidden:first").clone().removeClass('cloned-rowHidden hide').addClass("cloned-row").insertAfter(".cloned-row:last");
var newIndex = currentIndex+1;
$(".cloned-row:last .row:nth-child(1) div:first label:first").text(newIndex);
//set all names
$(".cloned-row:last").find('select[name="facode[]"]').attr("name","facode["+newIndex+"]");
$(".cloned-row:last").find('select[name="visitcategory[]"]').attr("name","visitcategory["+newIndex+"]");
$(".cloned-row:last").find('select[name="checklistid[]"]').attr("name","checklistid["+newIndex+"][]");
$(".cloned-row:last").find('select[name="hcptype_id[]"]').attr("name","hcptype_id["+newIndex+"][]");
$(".cloned-row:last").find('input[name="visitdate[]"]').attr("name","visitdate["+newIndex+"]");
//set sum
$("#fieldvisitsplanned").val(newIndex);
dateBasedonFmonth();
});
$(document).on("click",".addButton",function() {
var currentIndex = parseInt($(this).closest('div[class^="cloned-row"]').find('.row:nth-child(1) div:first label:first').text());
$("#optionTemplate").clone().removeClass('hide').removeAttr('id').insertAfter($(this).closest('div[class^="cloned-row"]').find(".form-group:last"));
$(this).closest('div[class^="cloned-row"]').find('.form-group:last select[name="checklistid[]"]').attr('name',"checklistid["+currentIndex+"][]");
$(this).closest('div[class^="cloned-row"]').find('.form-group:last select[name="hcptype_id[]"]').attr('name',"hcptype_id["+currentIndex+"][]");
});
$(document).on("click",".delRow_btn",function() {
$(this).closest('div[class^="cloned-row"]').remove();
$(".cloned-row").each(function(index){
var newIndex = parseInt(index)+1;
$(this).find(".row:nth-child(1) div:first label:first").text(newIndex);
//set all names
$(this).find('select[name^="facode"]').attr("name","facode["+newIndex+"]");
$(this).find('select[name^="visitcategory"]').attr("name","visitcategory["+newIndex+"]");
$(this).find('select[name^="checklistid"]').attr("name","checklistid["+newIndex+"][]");
$(this).find('select[name^="hcptype_id"]').attr("name","hcptype_id["+newIndex+"][]");
//hcp mayb input or select
$(this).find('input[name^="hcp_value"]').attr("name","hcp_value["+newIndex+"][]");
$(this).find('select[name^="hcp_value"]').attr("name","hcp_value["+newIndex+"][]");
//
$(this).find('input[name^="visitdate"]').attr("name","visitdate["+newIndex+"]");
//set sum
$("#fieldvisitsplanned").val(newIndex);

});
});
$(document).ready(function(){
$("#hide").click(function(){
$('.t1').hide();
});
$("#show").click(function(){
$("p").show();
});
//to set filters of hcptype on change of checklists
$(document).on('change','.checklists',function(e){
var chklstId = $(this).val();
var moon = $(this);
//get targets
$.ajax({
type: "POST",
data: {chklstId:chklstId},
url: "<?php echo base_url(); ?>Common_Ajax/getchklst_targets",
success: function(result){
if(result != null){
moon.closest('div[class^="form-group"]').find(".targets").html(result);
moon.closest('div[class^="form-group"]').find(".targets").trigger("change");
}
}
});
});
//to set filters of hcp on change of hcptype
$(document).on('change','.targets',function(e){
var hcptype = $(this).find(':selected').data("name");
var hcpdataentry = $(this).find(':selected').data("entry");
var moon = $(this);
moon.closest('div[class^="form-group"]').find(".hcp").html('');
var currentIndex = parseInt($(this).closest('div[class^="cloned-row"]').find('.row:nth-child(1) div:first label:first').text());
var selectedfacode = parseInt($(this).closest('div[class^="cloned-row"]').find('.facilities').find(':selected').val());
if(hcpdataentry=="name")
{
var htmlVal = '<input class="form-control" type="text" name="hcp_value['+currentIndex+'][]" >';
moon.closest('div[class^="form-group"]').find(".hcp").html(htmlVal);
}else if(hcpdataentry=="code")
{
//get list of specific target's values
$.ajax({
type: "POST",
data: {hcptype:hcptype,facode:selectedfacode,rowIndex:currentIndex},//sending hcptype which will be like cmw,lhw,lhs etc,
url: "<?php echo base_url(); ?>Common_Ajax/gettarget_val",
success: function(result){
if(result != null){
moon.closest('div[class^="form-group"]').find(".hcp").html(result);
}
}
});
}

});
//to set filter of facilities on change of fatype
$(document).on('change','.fatype',function (event){
var moon = $(this);
var distcode = moon.closest('div[class^="row"]').find("#distcode").val();
//alert(distcode);
$.ajax({
type: "POST",
data: {fatype:$(this).val(),distcode:distcode},
url: "<?php echo base_url(); ?>Common_Ajax/getFacilities_options",
success: function(result){
if(result != null){
moon.closest('div[class^="row"]').find(".facilities").html(result);
//$('.targets').trigger('change');
moon.closest('div[class^="row"]').find(".targets").trigger("change");
}
}
});
});
//to check if record of selected fmonth exist open it in edit mode
$(document).on('change','.fatype',function(){
//check if record exist for this fmonth or not
var fmonthh = $("#fmonth").val();
//---------------To Check whether Plan for selected fmonth has been approved by dho/pd or not-----------------
$.ajax({
type: "POST",
data: {fmonth:fmonthh},//sending fmonth,
url: "<?php echo base_url(); ?>Common_Ajax/check_plan_approval",
success: function(result){
//console.log(result);
if(result > 0){
//plan for given fmonth already exist, ask user to open in edit mode or not
if (confirm('Plan for selected fmonth have been already approved!')) {
//redirect to List page
window.location.assign("<?php echo base_url(); ?>"+"plans/lists");
} else {
//redirect to List page
window.location.assign("<?php echo base_url(); ?>"+"plans/lists");
}
}
if(result == 0){
//plan for given fmonth haven't been approved.
$.ajax({
type: "POST",
data: {fmonth:fmonthh},//sending hcptype which will be like cmw,lhw,lhs etc,
url: "<?php echo base_url(); ?>Common_Ajax/check_plan_exist",
success: function(result){
if(result > 0){
//plan for given fmonth already exist, ask user to open in edit mode or not
if (confirm('Plan for selected fmonth already exist, Do you want to modify this plan?')) {
//redirect to edit page
window.location.assign("<?php echo base_url(); ?>"+"plans/plan_edit/"+result);
} else {
//redirect to list page
window.location.assign("<?php echo base_url(); ?>"+"plans/lists");
}
}
if(result === 0){
//plan for given fmonth no exist, no need to take any further validation check.
//filter checklists here for this specific row.
//$(this).find('option:selected').text();
/* $.ajax({
type: "POST",
data: {fatype:fmonthh},//sending hcptype which will be like cmw,lhw,lhs etc,
url: "<?php echo base_url(); ?>Common_Ajax/check_plan_exist",
success: function(result){
if(result > 0){
//plan for given fmonth already exist, ask user to open in edit mode or not
if (confirm('Plan for selected fmonth already exist, Do you want to modify this plan?')) {
//redirect to edit page
window.location.assign("<?php echo base_url(); ?>"+"plans/plan_edit/"+result);
} else {
//redirect to list page
window.location.assign("<?php echo base_url(); ?>"+"plans/lists");
}
}
if(result === 0){
//plan for given fmonth no exist, no need to take any further validation check.
//filter checklists here
}
}
}); */
}
}
});
}
}
});
});
$(document).on('change','.facilities',function(){
//$('.targets').trigger('change');
$(this).closest('div[class^="cloned-row"]').find('.targets').trigger('change');
});
$(document).on('change','#distcode',function(){
$(this).closest('div[class^="cloned-row"]').find('.fatype').trigger('change');
});
$(document).on('change','#fmonth',function(){
dateBasedonFmonth();
});
});

</script>
</body>
</html>