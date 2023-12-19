<?php
$ulevel = $this -> session -> userLevel;
$utype = $this -> session -> utype;
$basePath = base_url();
$assetsPath = base_url()."assets/";
$optArr = array("column" => "Year-Month","view"=>"yes");
if($ulevel=='2' && $utype == 'ProExecutive')
{
$optArr["edit"] = "yes";
$planText = "Approve Plan(s)";
$planLink = "plans/pd_approve";
}else if($ulevel=='2' && $utype != 'ProExecutive'){
$planText = "Approve Plan(s)";
$planLink = "plans/dg_approve";
}
else{
$optArr["edit"] = "yes";
$planText = "Make Plan";
$planLink = "plans/dho_approve";
}
$optArr["path"] = $planLink;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Plans || List</title>
<?php $this->load->view("templates/styles"); ?>
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
<p>Plans Management (List of current plans)</p>
</div>
</div>
</div>
<div class="filters">
<div class="row">
<div class="col-xs-2 col-xs-offset-2 cmargin27">
<label>Year - Month</label>
</div>
<div class="col-xs-2">
<select class="form-control" name="fmonth" id="fmonth">
<option value=""> -- ALL -- </option>
<?php echo getSavedFmonth_options(false,isset($fmonth)?$fmonth:NULL); ?>
<?php //echo getChklstFmonth_options(); ?>
</select>
</div>
</div>
</div>
<br>
<?php
//print_r($tableData);
echo getListingTable($tableData,"",false,true,$optArr);
?>
</div><!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<?php $this->load->view("templates/scripts"); ?>
<script type="text/javascript">
$(document).ready(function() {
$('#fmonth').on('change' , function (event){
event.preventDefault();
$('.tbl-listing').html('');
$('.tbl-listing').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
$.ajax({
type: "POST",
data: {fmonth:$('#fmonth').val()},
url: "<?php echo base_url(); ?>Common_Ajax/approve_list",
dataType: "json",
success: function(result){
$('.tbl-listing').html('');
if(result != null){
$('.tbl-listing').html(result.tbody);
}else{
$('.tbl-listing').html('<tr><td colspan="10" class="text-center" >No Result Found</td></tr>');
}
var options = {
format : "dd-mm-yyyy"
};
$('.dp').datepicker(options);
}
});
});
//work for drill down

});
</script>
</body>
</html>