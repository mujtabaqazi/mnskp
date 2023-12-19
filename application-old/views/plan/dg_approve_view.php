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
<div class="filters">
<div class="row">
<div class="col-xs-2 col-xs-offset-2">
<label>Year - Month</label>
</div>
<div class="col-xs-2">
<p><?php echo getNewFMonthFormat($fmonth); ?></p>
</div>
</div>
</div><!--end of div with class filters-->
<br>
<?php echo getListingTable($tableData,"",false,true); ?>
<br>
<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">

<!--<a class="btn btn-success btn-md btncc" href="<?php //echo $basePath."plans/dg_approve/".$fmonth; ?>">
<i class="fa fa-floppy-o "></i> Edit Plan
</a>-->

<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
</div>
</div>
</div><!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<?php $this->load->view("templates/scripts"); ?>
<script type="text/javascript">
$('.DrillDownRow').css('cursor','pointer');
$(document).on('click',".DrillDownRow", function(){
var code = $(this).find("td:first-child .rowCode").val();
//alert(code);
var url = '';
if(code > 0)
{
//mean code is supervisor
url = '<?php echo $basePath; ?>'+"plans/plan_view/"+code;
}
else{
code = $(this).find("td:nth-child(2)").text();
if(code.toString().length == 3){
//mean code is distcode
//url = '<?php echo $basePath; ?>'+"plans/managers_lists/"+code;
url = '<?php echo $basePath; ?>'+"plans/dho_approve_view/"+'<?php echo $fmonth; ?>'+"/"+code;
}
}
if(url != '')
{
var win = window.open(url,'_self');
if(win){
//Browser has allowed it to be opened
win.focus();
}else{
//Broswer has blocked it
alert('Please allow popups for this site');
}
}
});
</script>
</body>
</html>