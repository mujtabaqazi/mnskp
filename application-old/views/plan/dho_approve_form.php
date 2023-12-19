<?php
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Monthly Visit Plan || Approve</title>
<?php $this->load->view("templates/styles"); ?>
<style>
.dp{
padding:4px 0px 4px 4px !important;
font-size: 12px;
}
</style>
</head>
<body>
<!--start of header-->
<?php $this->load->view("templates/header"); ?>
<?php $this->load->view("templates/menu"); ?>
<!--End of header-->
<div class="container-fluid">
<div class="row">
<div class="col-md-12 text-center">
<div class="bgrowlis">
<p>Monthly Visit Plan - Approve List</p>
</div>
</div>
</div>
<?php
echo validation_errors();
/* if(isset($app_stat) && $app_stat->approvaldate != ""){
$action = $basePath."plans/undo_dho_approved";
}else{ */
$action = $basePath."plans/dho_approved";
/* } */
$attributes = array('class' => 'form-horizontal', 'id' => 'myform','accept-charset' => 'utf-8');
$hidden = array('fmonth' => $fmonth);
echo form_open_multipart($action,$attributes,$hidden);
?>
<div class="filters">
<div class="row">
<div class="col-xs-2 col-xs-offset-2">
<label>Year - Month</label>
</div>
<div class="col-xs-2">
<p><?php echo $fmonth; ?></p>
</div>
</div>
</div><!--end of div with class filters-->
<br>
<?php
$returnData = '<table class="table table-striped table-bordered table-hover tbl-listing" id="tbl-approval-form">';
$returnData .= getPlanAjaxTable($allPlans);
echo $returnData .= "</tbody></table>";
?>
<br>
<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
<?php /* if(isset($app_stat) && $app_stat->approvaldate != ""){ ?>
<button type="submit" class="btn btn-success btn-md" role="button">
<i class="fa fa-floppy-o "></i> Undo Plan Approval
</button>
<?php }else{ */ ?>
<button type="submit" id="previewplanbtn" class="btn btn-info btn-md" role="button">
<i class="fa fa-search "></i> Preview Plan
</button>
<button type="submit" id="approveplanbtn" class="btn btn-success btn-md" role="button">
<i class="fa fa-floppy-o "></i> Approve Plan
</button>
<?php /* } */ ?>
<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
</div>
</div>
<?php echo form_close(); ?>
</div><!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<script type="text/javascript">
var dateSet = "custom";
</script>
<?php $this->load->view("templates/scripts"); ?>
<script type="text/javascript">
$(function () {
var options = {
format : "dd-mm-yyyy",
startDate: '-0m',
endDate: '+2m'
};
$('.dp').datepicker(options);
var currdate = '';
$(document).on('focus','.dp',function(){
currdate = $(this).val();
});
//to check visit dates count
$(document).on('change','.dp',function(e){
//call a function check if same facility with same date not selected in any other visit.
var sameCount = 0;
var orgobj = $(this);
var tocheckval = $(this).val();
var clickedRow = $(this).closest("tr").index();
var clickedCol = $(this).closest("tr td").index();
var prevSameVeh = "",prevSameDrvr = "";
//there cannot be more than 3 visits on same facility on same date
$('input[name="'+$(this).attr("name")+'"]').each(function(index){
var currvisitdate = $(this).val();
if(tocheckval===currvisitdate){
//there cannot be more than 1 visit on same facility on same date by same supervisor
var currRow = $(this).closest("tr").index();
var currCol = $(this).closest("tr td").index();
if(clickedRow!=currRow && clickedCol==currCol){
alert("Error: Same supervisor cannot visit same facility on same date twice.");
//set previous value again.
$(orgobj).val(currdate);
//prevSameVeh = "",prevSameDrvr = "";
}else{
//more than 3 visit code
sameCount++;
if(sameCount>3){
alert("Error: More than 3 Supervisors cannot visit same facility on same date.");
//set previous value again.
$(orgobj).val(currdate);
//prevSameVeh = "",prevSameDrvr = "";
}else{
var val="",val1="";
val = $(this).closest("tr").find("input[name*='[vehicleassigned]']").val();
prevSameVeh = (val!=="")?val:prevSameVeh;
val1 = $(this).closest("tr").find("input[name*='[driver]']").val();
prevSameDrvr = (val1!=="")?val1:prevSameDrvr;
}
}
}
});
//if(prevSameVeh!==""){
$(this).closest("td").find("input[name*='[vehicleassigned]']").val(prevSameVeh);
$(this).closest("td").find("input[name*='[driver]']").val(prevSameDrvr);
//}
});
$(document).on('click','#approveplanbtn',function(eve){
//custom settings for loader
$(".loading").css("width","20em");
$(".loading").css("height","4em");
$(".loading").css("line-height","1.3em");
$(".loading").text("Please Wait! Approval Process may take upto 2min...");
$(".loading:not(:required)").css("font-size","18px");
$(".loading:not(:required)").css("color","rgb(14,110,171)");
$(".loading:not(:required)").css("text-align","center");
//preventing default
eve.preventDefault();
//validate
var isemptyfield = false;
$("input[name*='[vehicleassigned]']").removeClass("bred");
$("input[name*='[driver]']").removeClass("bred");
$(".dp").removeClass("bred");
$("input[name*='[vehicleassigned]']").each(function(ind){
if($(this).val()==""){
$(this).addClass("bred");
isemptyfield = true;
}
});
$("input[name*='[driver]']").each(function(ind){
if($(this).val()==""){
$(this).addClass("bred");
isemptyfield = true;
}
});
$(".dp").each(function(ind){
if($(this).val()==""){
$(this).addClass("bred");
isemptyfield = true;
}
});
if(!(isemptyfield)){
$.post($('#myform').attr("action"), $('#myform').serialize(), function (data, textStatus) {
console.log(data);
var data  = jQuery.parseJSON(data);
if(data.message=='Success'){
alert("Plan Approved Successfully!\nSystem will redirect You to plan list page.");
window.location.replace('<?php echo $basePath.'plans/approve_list'; ?>');
}else{
alert(data.body);
}
});
}else{
alert("{Visit date},{Assign Vehicle No} and {Name of Driver} cannot be empty");
}
});
$(document).on('click','#previewplanbtn',function(eve){
//custom settings for loader
$(".loading").css("width","20em");
$(".loading").css("height","4em");
$(".loading").css("line-height","1.3em");
$(".loading").text("Please Wait! Preview Process may take upto 1min...");
$(".loading:not(:required)").css("font-size","18px");
$(".loading:not(:required)").css("color","rgb(14,110,171)");
$(".loading:not(:required)").css("text-align","center");
//preventing default
eve.preventDefault();
//$("input[name*='[visitdate]']").removeClass("bred");

//validate
var isemptyfield = false;
$(".dp").removeClass("bred");
$(".dp").each(function(ind){
if($(this).val()==""){
$(this).addClass("bred");
isemptyfield = true;
}
});
if(!(isemptyfield)){
$.post('<?php echo $basePath.'plans/dho_approve_preview'; ?>', $('#myform').serialize(), function (data, textStatus) {
console.log(data);
if(IsJsonString(data))
{
// It is JSON
var data  = jQuery.parseJSON(data);
if(data.message=='Success'){
//window.location.replace('<?php //echo $basePath.'plans/approve_list'; ?>');
}else{
alert(data.body);
if(data.data){
$("input[name*='planapproved["+data.data[1]+"][visitdate][]'][value*='"+data.data[2]+"']").addClass("bred");
}
}
}
else
{
var newWindow = window.open();
newWindow.focus();
newWindow.document.write(data);
//return false;
}
});
}else{
alert("{Visit date} cannot be empty");
}
});
function IsJsonString(str) {
try {
JSON.parse(str);
} catch (e) {
return false;
}
return true;
}
//yahan code likhna he jo ye check kre ga k agr driver assigned aor vehicle ki field mein value change hoi he to
//user se confirm box k through confirm kro wo iss date k saare visit k driver aor date same kr de
$(document).on('change',"input[name*='[driver]']",function(eve){
$(this).closest("table").parent("td").find(".dp").trigger("change");
});
$(document).on('change',"input[name*='[vehicleassigned]']",function(eve){
$(this).closest("table").parent("td").find(".dp").trigger("change");
});
document.onkeydown = function(e) {
if(e.keyCode == 123) {
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
return false;
}
if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
return false;
}

if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
return false;
}
}
});
</script>
</body>
</html>