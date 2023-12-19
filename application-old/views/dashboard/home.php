<?php
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<!DOCTYPE html>
<html>
<head>
<title>Checklists :: Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--start of all style files -->
<?php $this->load->view("dashboard/templates/styles"); ?>
<!--style by bilal-->
<style>
.expandable{
background: #e8e8e8;
}
.expandable div{
/* padding: 30px; */
position: relative;
}
/* .expandable .table{
background: #e8e8e8;
} */
.expandable .table td{
color: #000;
}
.card.summary-inline .card-body {
padding: 20px 10px;
}
</style>
<!--style by bilal-->
<!--end of all style files-->
</head>
<body class="flat-blue">
<!--start of top banner-->
<?php $this->load->view("dashboard/templates/top_banner"); ?>
<!--end of top banner-->
<div class="app-container expanded">
<div class="row content-container">
<!--start of small banner used to toggle menu-->
<?php $this->load->view("dashboard/templates/sub_banner"); ?>
<!--End of small banner used to toggle menu-->
<!--start of Side bar menu-->
<?php $this->load->view("dashboard/templates/menu"); ?>
<!--End of Side bar menu-->
<!-- Main Content -->
<div class="container-fluid">
<div class="side-body">
<div class="row">
<form id="filter-form" method="POST" action="<?php echo $basePath; ?>dashboard" enctype="multipart/form-data">
<div class="col-md-7">
<div class="col-xs-4">
<label class="pt8">Periodical Frequency:</label>
</div>
<div class="col-xs-8">
<input type="radio" name="frequency" value="m" <?php echo (isset($frequency) && $frequency=="m")?'checked="checked"':'';?> class="mt9" >
<label>Monthly</label>&nbsp;
<input type="radio" name="frequency" value="q" <?php echo (isset($frequency) && $frequency=="q")?'checked="checked"':'';?> class="mt9" >
<label>Quarterly</label>&nbsp;
<input type="radio" name="frequency" value="y" <?php echo (isset($frequency) && $frequency=="y")?'checked="checked"':'';?> class="mt9" >
<label>Annually</label>&nbsp;
<input type="radio" name="frequency" value="fy" <?php echo (isset($frequency) && $frequency=="fy")?'checked="checked"':'';?> class="mt9" >
<label>Fiscal year</label>&nbsp;
</div>
</div>
<div class="col-md-3">
<div class="col-xs-3">
<label class="pt8">Period:</label>
</div>
<div class="col-xs-9">
<?php
$periodtext = "Year-Month";
if(isset($frequency) && $frequency=="fy"){
$attr = "fyear";
$periodtext = "Fiscal Year";
$htmloptions = getAllfiscalYearsOptions(true,isset($period)?$period:NULL);
}else if(isset($frequency) && $frequency=="y"){
$attr = "fyear";
$periodtext = "Year";
$htmloptions = getAllYearsOptions(true,isset($period)?$period:NULL);
}else if(isset($frequency) && $frequency=="q"){
$attr = "qmonth";
$periodtext = "Year-Quarter";
$htmloptions = getAllQuarterOptions(true,isset($period)?$period:NULL);
}else{
$attr = "fmonth";
$htmloptions = getSavedFmonth_options(true,isset($period)?$period:NULL);
}
?>
<select class="form-control period" name="<?php echo $attr; ?>" id="<?php echo $attr; ?>">
<?php echo $htmloptions; ?>
</select>
</div>
</div>
</form>
</div><!--end of row-->
<br>
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card green summary-inline">
<div class="card-body">
<i class="icon fa fa-plus fa-3x"></i>
<div class="content">
<div class="title"><?php echo $totplans = array_sum( array_column($PlansInfo,"plans")); ?></div>
<div class="sub-title">Plans Created</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card blue2 summary-inline">
<div class="card-body">
<i class="icon fa fa-map-marker fa-3x"></i>
<div class="content">
<div class="title"><?php echo $totvisits = array_sum( array_column($PlansInfo,"visits")); ?></div>
<div class="sub-title">Planned Visits</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card megenta summary-inline">
<div class="card-body">
<i class="icon fa fa-tags fa-3x"></i>
<div class="content">
<div class="title"><?php echo $totheld = array_sum( array_column($PlansInfo,"visitsheld")); ?></div>
<div class="sub-title">Visits Held</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card green2 summary-inline">
<div class="card-body">
<i class="icon fa fa-android fa-3x"></i>
<div class="content">
<div class="title"><?php echo $totconfirmed = array_sum( array_column($PlansInfo,"confirmed")); ?></div>
<div class="sub-title">Visits Confirmed By Android</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
</div><!--end of row-->
<div class="row">
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card blue summary-inline">
<div class="card-body">
<i class="icon fa fa-wpforms fa-3x"></i>
<div class="content">
<div class="title"><?php echo $totchecklists = array_sum( array_column($PlansInfo,"checklists")); ?></div>
<div class="sub-title">Planned Checklists</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card red3 summary-inline">
<div class="card-body">
<i class="icon fa fa-check-square-o fa-3x"></i>
<div class="content">
<div class="title"><?php echo $totfilled = array_sum( array_column($PlansInfo,"filled")); ?></div>
<div class="sub-title">Checklists Filled</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card teal summary-inline">
<div class="card-body">
<i class="icon fa fa-hospital-o fa-3x"></i>
<div class="content">
<div class="title"><?php echo $tothfplanned = array_sum( array_column($PlansInfo,"hfplanned")); ?></div>
<div class="sub-title">HF in Plans</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card dark summary-inline">
<div class="card-body">
<i class="icon fa fa-file-text fa-3x"></i>
<div class="content">
<div class="title"><?php echo $tothfvisited = array_sum( array_column($PlansInfo,"hfvisited")); ?></div>
<div class="sub-title">HF Visited & min 1 checklist Filled</div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
</div><!--end of row-->
<div class="row animated fadeInUp">
<div class="col-xs-12">
<div class="card">
<ul class="nav nav-tabs tabs-right" style="position: absolute;right: 0px;background: none;border: none;z-index: 999999;">
<li id="showchart">
<a href="javascript:void(1);" style="padding:5px 10px;" title="Graphical View">
<span class="icon fa fa-bar-chart fa-2x"></span>
</a>
</li>
<li style="display: none;" id="showtable">
<a href="javascript:void(1);" style="padding:5px 10px;" title="Tabular view">
<span class="icon fa fa-table fa-2x"></span>
</a>
</li>
</ul>
<div class="card-body">
<div class="row" id="districts_data">
<div class="col-sm-12 mb0" id="districts_tbl_data">
<table class="table table-striped mb0">
<thead>
<tr>
<th>#</th>
<th><?php if($ulevel=='2'){ echo 'District'; }else if(isset($monthlyview)){ echo 'Year-Month'; }else{ echo 'Supervisor'; } ?></th>
<?php if($frequency != "m" && $ulevel=='2'){ ?>
<th class="text-center">Plans</th>
<?php } ?>
<th class="text-center">Supervisors with Plan</th>
<th class="text-center">Planned Visits</th>
<th class="text-center">Visits Held</th>
<th class="text-center">Mobile verified Visits</th>
<th class="text-center">Planned Checklists</th>
<th class="text-center">Checklists Filled</th>
<th class="text-center">HF in Plans</th>
<th class="text-center">HF Visited</th>
</tr>
</thead>
<tbody>
<?php
$count = 1;$suptothtml="";
foreach($PlansInfo as $planinfo){ ?>
<tr class="<?php if(isset($frequency) && $frequency=="m" && $ulevel!='2'){echo 'drillSupPlan';}else{echo 'drillableRow';} ?>" data-code="<?php echo $planinfo["code"]; ?>" <?php if(isset($planinfo["fmonth"])){echo 'data-frequency="m" data-fmonth="'.$planinfo["fmonth"].'"';} ?>>
<th><?php echo $count; ?></th>
<td><?php echo $categories[]["label"] = isset($planinfo["fmonth"])?$planinfo["fmonth"]:$planinfo["name"]; ?></td>
<td class="text-center"><span class="badge success"><?php echo $plans[]["value"] = $planinfo["plans"]; ?></span></td>
<?php if(isset($planinfo["plans"]) && !isset($planinfo["fmonth"]) && $frequency!="m"){
$suptothtml = '<td class="text-center"><span class="badge success">'.array_sum( array_column($PlansInfo,"supervisors")).'</span></td>';
?>
<td class="text-center"><span class="badge success"><?php echo $planinfo["supervisors"]; ?></span></td>
<?php
} ?>
<td class="text-center"><span class="badge blue2"><?php echo $visits[]["value"] = $planinfo["visits"]; ?></span></td>
<td class="text-center"><span class="badge megenta"><?php echo $visitsheld[]["value"] = $planinfo["visitsheld"]; ?></span></td>
<td class="text-center"><span class="badge green2"><?php echo $confirmed[]["value"] = $planinfo["confirmed"]; ?></span></td>
<td class="text-center"><span class="badge info"><?php echo $checklists[]["value"] = $planinfo["checklists"]; ?></span></td>
<td class="text-center"><span class="badge red3"><?php echo $filled[]["value"] = $planinfo["filled"]; ?></span></td>
<td class="text-center"><span class="badge teal"><?php echo $hfplanned[]["value"] = $planinfo["hfplanned"]; ?></span></td>
<td class="text-center"><span class="badge primary"><?php echo $hfvisited[]["value"] = $planinfo["hfvisited"]; ?></span></td>
</tr><?php
$count++;
}
if($count>1){
//for total
?>
<tr>
<th></th>
<td>Total: </td>
<td class="text-center"><span class="badge success"><?php echo $totplans; ?></span></td>
<?php echo $suptothtml; ?>
<td class="text-center"><span class="badge blue2"><?php echo $totvisits; ?></span></td>
<td class="text-center"><span class="badge megenta"><?php echo $totheld; ?></span></td>
<td class="text-center"><span class="badge green2"><?php echo $totconfirmed; ?></span></td>
<td class="text-center"><span class="badge info"><?php echo $totchecklists; ?></span></td>
<td class="text-center"><span class="badge red3"><?php echo $totfilled; ?></span></td>
<td class="text-center"><span class="badge teal"><?php echo $tothfplanned; ?></span></td>
<td class="text-center"><span class="badge primary"><?php echo $tothfvisited; ?></span></td>
</tr>
<?php
}
?>
</tbody>
</table>
</div>
<div class="col-sm-12 mb0" id="districts_grph_data" style="display: none;">
<div id="plans-chart" class="col-xs-6 zp">Plans created chart will render here</div>
<div id="visits-chart" class="col-xs-6 zp">Visits chart will render here</div>
<div id="visits-planned_held-chart" class="col-xs-6 zp">Visits Planned Vs Held chart will render here</div>
<div id="held_confirmed-chart" class="col-xs-6 zp">Visits Held Vs Confirmed chart will render here</div>
<div id="checklists-chart" class="col-xs-6 zp">Checklists Planned Vs Filled chart will render here</div>
<div id="hf-chart" class="col-xs-6 zp">Health Facilities Planned Vs Visited chart will render here</div>
</div>
</div>
</div>
</div>
</div>
</div><!--end of row-->
<?php
if(isset($usersInfo) && $usersInfo!=""){
$keys = array_keys($usersInfo); ?>
<div class="row">
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card summary-inline">
<div class="card-body">
<div class="div-circle card green">
<i class="img-circle icon fa fa-user fa-3x text-center"></i>
</div>
<div class="content">
<div class="title"><?php echo $usersInfo[$keys[0]]; ?></div>
<div class="sub-title"><?php echo $keys[0]; ?></div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card summary-inline">
<div class="card-body">
<div class="div-circle card blue2">
<i class="img-circle icon fa fa-user fa-3x text-center"></i>
</div>
<div class="content">
<div class="title"><?php echo $usersInfo[$keys[1]]; ?></div>
<div class="sub-title"><?php echo $keys[1]; ?></div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 animated fadeInDown">
<a href="#">
<div class="card summary-inline">
<div class="card-body">
<div class="div-circle card red3">
<i class="img-circle icon fa fa-user fa-3x text-center"></i>
</div>
<div class="content">
<div class="title"><?php echo $usersInfo[$keys[2]]; ?></div>
<div class="sub-title"><?php echo $keys[2]; ?></div>
</div>
<div class="clear-both"></div>
</div>
</div>
</a>
</div>
</div>
<?php } ?>
</div><!--end of sidebody-->
</div>
</div>
<?php $this->load->view("dashboard/templates/footer"); ?>
</div>
<!-- Javascript Libs -->
<?php $this->load->view("dashboard/templates/scripts"); ?>
<?php $this->load->view("dashboard/templates/charts"); ?>
<script type="text/javascript">
$('.drillableRow').css('cursor','pointer');
$('.drillSupPlan').css('cursor','pointer');
$(document).on("click",".drillableRow",function(){
$(this).closest('table').find('.expandable').remove();
if($(this).hasClass('expanded')){
$(this).closest('table').find('tr.expanded').removeClass('expanded');
}else{
$(this).closest('table').find('tr.expanded').removeClass('expanded');
$(this).addClass('expanded');
var curRow = $(this).closest('tr');
curRow.after('<tr class="expandable"><td colspan="10"><div><img src="<?php echo $assetsPath; ?>images/ajax-loader_blue.gif" /></div></td></tr>');
//ithe db whichoun data aani te show krwao ajax naal
var datatosend = {distcode:curRow.data("code"),frequency:"m",<?php echo $attr; ?>:$(".period").val()};
if (typeof $(this).data('frequency') !== 'undefined')
{
datatosend.frequency = $(this).data('frequency');
delete datatosend.<?php echo $attr; ?>;
datatosend.fmonth = $(this).data('fmonth');
}else{
datatosend.frequency = $('input[type=radio][name=frequency]:checked').val();
}
$.ajax({
type: "POST",
data: datatosend,
url: "<?php echo base_url(); ?>dashboard/dist_plans_ajax",
success: function(result){
if(result != null){
curRow.closest('table').find('.expandable').remove();
curRow.after('<tr class="expandable"><td colspan="10"><div>'+result+'</div></td></tr>');
$('.drillSupPlan').css('cursor','pointer');
}
}
});
}
});
$(document).on("click",".drillSupPlan",function(){
var curRow = $(this).closest('tr');
//mean code is supervisor
url = '<?php echo $basePath; ?>'+"plans/plan_view/"+curRow.data("code");
//alert(url);
var win = window.open(url,'_blank');
if(win){
//Browser has allowed it to be opened
win.focus();
}else{
//Broswer has blocked it
alert('Please allow popups for this site');
};
});

$('#<?php echo $attr; ?>').on('change' , function (event){
$("#filter-form").submit();
});

$('input[type=radio][name=frequency]').on('change' , function (event){
var freq = this.value;
if(freq=="m"){
$(".period").html('<?php echo getSavedFmonth_options(false,(isset($frequency) && isset($period) && $frequency=="m")?$period:NULL); ?>');
$(".period").attr("name","fmonth");
$(".period").attr("id","fmonth");
}
if(freq=="q"){
$(".period").html('<?php echo getAllQuarterOptions(false,(isset($frequency) && isset($period) && $frequency=="q")?$period:NULL); ?>');
$(".period").attr("name","qmonth");
$(".period").attr("id","qmonth");
}
if(freq=="fy"){
$(".period").html('<?php echo getAllfiscalYearsOptions(false,(isset($frequency) && isset($period) && $frequency=="fy")?$period:NULL); ?>');
$(".period").attr("name","fyear");
$(".period").attr("id","fyear");
}
if(freq=="y"){
$(".period").html('<?php echo getAllYearsOptions(false,(isset($frequency) && isset($period) && $frequency=="y")?$period:NULL); ?>');
$(".period").attr("name","fyear");
$(".period").attr("id","fyear");
}
$("#filter-form").submit();
});

//moon graph
FusionCharts.ready(function () {
//Plans Created Trend
var plansChart = new FusionCharts({
type: 'mscombi2d',
id: 'moon_plans_chart',
renderAt: 'plans-chart',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
"chart": {
"caption": "Plans Created (# of Supervisors Having plan)",
"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
"xaxisname": "Month",
"yaxisname": "Plans (in Numbers)",
"theme": "fint",
"exportEnabled": "1",
"slantLabels": "1",
"labelDisplay": "rotate",
"baseFont": "Helvetica Neue,Arial",
"animation": "1"
},
"categories": [
{
"category": [
<?php echo isset($categories)?json_encode($categories):'[]'; ?>
]
}
],
<?php if($attr == "fmonth"){?>
"trendlines": [
{
"line": [
{
"startvalue": "9",
"valueonright": "1",
"color": "fda813",
"displayvalue": "Due Plans",
"showontop": "1",
"thickness": "2"
}
]
}
],
<?php } ?>
"dataset": [
{
"seriesname": "Plans Created",
"color" : "1ABC9C",
"showValues": "1",
"data": <?php echo isset($plans)?json_encode($plans):'[]'; ?>
}
],
"styles": {
"definition": [
{
"name": "captionFont",
"type": "font",
"size": "15"
}
],
"application": [
{
"toobject": "caption",
"styles": "captionfont"
}
]
}
}
});
plansChart.render();
//Visits Planned Vs Held Indicator Trend
var visitsplannedheldChart = new FusionCharts({
type: 'mscombi2d',
id: 'moon_visits_planned_held_chart',
renderAt: 'visits-planned_held-chart',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
"chart": {
"caption": "Visits Planned Vs Held",
"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
"xaxisname": "Month",
"yaxisname": "Visits (in Numbers)",
"theme": "fint",
"exportEnabled": "1",
"slantLabels": "1",
"labelDisplay": "rotate",
"baseFont": "Helvetica Neue,Arial",
"animation": "1"
},
"categories": [
{
"category": [
<?php echo isset($categories)?json_encode($categories):'[]'; ?>
]
}
],
"dataset": [
{
"seriesname": "Planned Visits",
"color" : "0E6EAB",
"showValues": "1",
"data": <?php echo isset($visits)?json_encode($visits):'[]'; ?>
},
{
"seriesname": "Visits Held",
"renderAs": "area",
"showValues": "0",
"color": "740410",
"data": <?php echo isset($visitsheld)?json_encode($visitsheld):'[]'; ?>
}
],
"styles": {
"definition": [
{
"name": "captionFont",
"type": "font",
"size": "15"
}
],
"application": [
{
"toobject": "caption",
"styles": "captionfont"
}
]
}
}
});
visitsplannedheldChart.render();
//Visits Held Vs Confirmed Indicator Trend
var visitsheldconfirmedChart = new FusionCharts({
type: 'mscombi2d',
id: 'moon_held_confirmed_chart',
renderAt: 'held_confirmed-chart',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
"chart": {
"caption": "Visits Held Vs Confirmed",
"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
"xaxisname": "Month",
"yaxisname": "Visits (in Numbers)",
"theme": "fint",
"exportEnabled": "1",
"slantLabels": "1",
"labelDisplay": "rotate",
"baseFont": "Helvetica Neue,Arial",
"animation": "1"
},
"categories": [
{
"category": [
<?php echo isset($categories)?json_encode($categories):'[]'; ?>
]
}
],
"dataset": [
{
"seriesname": "Visits Held",
"showValues": "1",
"color": "740410",
"data": <?php echo isset($visitsheld)?json_encode($visitsheld):'[]'; ?>
},
{
"seriesname": "Visits Confirmed",
"renderAs": "area",
"showValues": "0",
"color": "228B22",
"data": <?php echo isset($confirmed)?json_encode($confirmed):'[]'; ?>
}
],
"styles": {
"definition": [
{
"name": "captionFont",
"type": "font",
"size": "15"
}
],
"application": [
{
"toobject": "caption",
"styles": "captionfont"
}
]
}
}
});
visitsheldconfirmedChart.render();
//Checklists Planned Vs Filled Indicator Trend
var checklistsChart = new FusionCharts({
type: 'mscombi2d',
id: 'moon_checklists_chart',
renderAt: 'checklists-chart',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
"chart": {
"caption": "Checklists Planned Vs Filled",
"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
"xaxisname": "Month",
"yaxisname": "Checklists (in Numbers)",
"theme": "fint",
"exportEnabled": "1",
"slantLabels": "1",
"labelDisplay": "rotate",
"baseFont": "Helvetica Neue,Arial",
"animation": "1"
},
"categories": [
{
"category": [
<?php echo isset($categories)?json_encode($categories):'[]'; ?>
]
}
],
"dataset": [
{
"seriesname": "Planned Checklists",
"color" : "22A7F0",
"showValues": "1",
"data": <?php echo isset($checklists)?json_encode($checklists):'[]'; ?>
},
{
"seriesname": "Checklists Filled",
"renderAs": "area",
"showValues": "0",
"color": "BD4923",
"data": <?php echo isset($filled)?json_encode($filled):'[]'; ?>
}
],
"styles": {
"definition": [
{
"name": "captionFont",
"type": "font",
"size": "15"
}
],
"application": [
{
"toobject": "caption",
"styles": "captionfont"
}
]
}
}
});
checklistsChart.render();
//Health facilities Planed Vs Visited Indicator Trend
var hfChart = new FusionCharts({
type: 'mscombi2d',
id: 'moon_hf_chart',
renderAt: 'hf-chart',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
"chart": {
"caption": "Health facilities Planned Vs Visited",
"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
"xaxisname": "Month",
"yaxisname": "Health Facilities (in Numbers)",
"theme": "fint",
"exportEnabled": "1",
"slantLabels": "1",
"labelDisplay": "rotate",
"baseFont": "Helvetica Neue,Arial",
"animation": "1"
},
"categories": [
{
"category": [
<?php echo isset($categories)?json_encode($categories):'[]'; ?>
]
}
],
"dataset": [
{
"seriesname": "HF in Plans",
"color" : "0C838C",
"showValues": "1",
"data": <?php echo isset($hfplanned)?json_encode($hfplanned):'[]'; ?>
},
{
"seriesname": "HF Visited",
"renderAs": "area",
"showValues": "0",
"color": "#353d47",
"data": <?php echo isset($hfvisited)?json_encode($hfvisited):'[]'; ?>
}
],
"styles": {
"definition": [
{
"name": "captionFont",
"type": "font",
"size": "15"
}
],
"application": [
{
"toobject": "caption",
"styles": "captionfont"
}
]
}
}
});
hfChart.render();
//Visits Indicator Trend
var visitsChart = new FusionCharts({
type: 'mscombi2d',
id: 'moon_visits_chart',
renderAt: 'visits-chart',
width: '100%',
height: '400',
dataFormat: 'json',
dataSource: {
"chart": {
"caption": "Visits Planned Vs Held Vs Confirmed",
"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
"xaxisname": "Month",
"yaxisname": "Visits (in Numbers)",
"theme": "fint",
"exportEnabled": "1",
"slantLabels": "1",
"labelDisplay": "rotate",
"baseFont": "Helvetica Neue,Arial",
"animation": "1"
},
"categories": [
{
"category": [
<?php echo isset($categories)?json_encode($categories):'[]'; ?>
]
}
],
"dataset": [
{
"seriesname": "Planned Visits",
"color" : "0E6EAB",
"showValues": "1",
"data": <?php echo isset($visits)?json_encode($visits):'[]'; ?>
},
{
"seriesname": "Visits Held",
"renderAs": "line",
"showValues": "0",
"color": "740410",
"data": <?php echo isset($visitsheld)?json_encode($visitsheld):'[]'; ?>
},
{
"seriesname": "Visits Confirmed",
"renderAs": "area",
"showValues": "0",
"color": "228B22",
"data": <?php echo isset($confirmed)?json_encode($confirmed):'[]'; ?>
}
],
"styles": {
"definition": [
{
"name": "captionFont",
"type": "font",
"size": "15"
}
],
"application": [
{
"toobject": "caption",
"styles": "captionfont"
}
]
}
}
});
visitsChart.render();
});
$(document).on("click","#showchart",function(){
$("#districts_grph_data").show();
$("#districts_tbl_data").hide();
$("#showtable").show();
$("#showchart").hide();
});
$(document).on("click","#showtable",function(){
$("#districts_tbl_data").show();
$("#districts_grph_data").hide();
$("#showchart").show();
$("#showtable").hide();
});
</script>
</body>
</html>