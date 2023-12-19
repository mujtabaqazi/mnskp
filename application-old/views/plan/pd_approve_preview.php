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
<?php //$this->load->view("templates/menu"); ?>
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
<?php
$returnData = '<table class="table table-striped table-bordered table-hover tbl-listing" id="tbl-approval-form">';
$returnData .= getPlanAjaxTable($allPlans,"view");
echo $returnData .= "</tbody></table>";
?>
<br>
<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
<a class="btn btn-primary btn-md btncc" onClick="window.close();"><i class="fa fa-times"></i> Cancel </a>
</div>
</div>
</div><!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<?php //$this->load->view("templates/scripts"); ?>
</body>
</html>