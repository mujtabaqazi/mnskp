<?php
$basePath = base_url();
$assetsPath = base_url()."assets/";
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$userId = $this -> session -> id;
$maxalloweddays = isset($sysconf)?$sysconf->checklistfilldays:30;
$maxalloweddays = ($maxalloweddays>0 && $maxalloweddays<32)?$maxalloweddays:30;
/*echo "<pre>";
print_r($DataRow]);
echo "--------";
print_r($sysconf']); */
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
<div class="container">
<div class="panel panel-primary">
<div class="panel-heading text-center"> Monthly Visit Plan</div>
<div class="panel-body pbody">
<div class="alignmentview">
<!--Start of Pop Up Div-->
<div>
<div id="pop1" class="simplePopup">
<div class="header">
<ul class="nav nav-tabs">
<li class="active">
<a href="#1" data-toggle="tab">Picture</a>
</li>
<li>
<a href="#2" data-toggle="tab">Map</a>
</li>
</ul>
</div>
<div class="popboy">
<div id="exTab2">
<div class="tab-content">
<div class="tab-pane active" id="1">
<img src="" class="img-responsive poppic"><!--../images/mz.png-->
</div>
<div class="tab-pane popmap" id="2">
<iframe src="https://www.google.com/maps/embed/v1/place?q=33.728467,73.081096&amp;key=AIzaSyBHNtLEuHSbyf-cSkQvM5EocmPDCeau4yY" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
</div>
</div>
</div>
</div>
</div>
<!--End of Pop Up Div-->
<div class="rowlightbg">
<div class="row">
<div class="col-xs-3">
<label>Visit plan submission date</label>
</div>
<div class="col-xs-3">
<p><?php $var ="plandate"; echo isset($DataRow[$var])?getNewDateFormat(date("d-m-Y",strtotime($DataRow[$var]))):''; ?></p>
</div>
<div class="col-xs-3">
<label>Name of Supervisor</label>
</div>
<div class="col-xs-3">
<p><?php $var ="supervisor"; echo isset($DataRow[$var])?$DataRow[$var]:''; ?></p>
</div>
</div>
<div class="row">
<div class="col-xs-3">
<label>Designation of Supervisor</label>
</div>
<div class="col-xs-3">
<p><?php $var ="designationid"; echo isset($DataRow[$var])?get_Designation_Name($DataRow[$var]):''; ?></p>
</div>
<div class="col-xs-3">
<label>Posting Place</label>
</div>
<div class="col-xs-3">
<p><?php $var ="postingplace"; echo isset($DataRow[$var])?$DataRow[$var]:''; ?></p>
</div>
</div>
<div class="row">
<div class="col-xs-3">
<label>Program</label>
</div>
<div class="col-xs-3">
<p><?php echo isset($DataRow["ptype"])?get_Program_Name($DataRow["ptype"]):''; ?></p>
</div>
<div class="col-xs-3">
<label>Total No. of field visits planned</label>
</div>
<div class="col-xs-3">
<p><?php $var ="fieldvisitsplanned"; echo isset($DataRow[$var])?$DataRow[$var]:''; ?></p>
</div>
</div>
<div class="row">
<div class="col-xs-3">
<label>Year - Month</label>
</div>
<div class="col-xs-3">
<p><?php $var ="fmonth"; echo isset($DataRow[$var])?date("M Y",strtotime($DataRow[$var])):''; ?></p>
</div>
<div class="col-xs-3">
<label><?php if($ulevel=="3")echo "District";if($ulevel=="2")echo "Province"; ?></label>
</div>
<div class="col-xs-3">
<p><?php if($ulevel=="3")echo get_District_Name((isset($DataRow)?$DataRow["distcode"]:$this -> session -> distcode));if($ulevel=="2")echo "Khyber PakhtunKhwa"; ?></p>
</div>
</div>
</div>
<div class="row" style="padding-bottom: 1px;">
<div class="col-xs-12 cmargin27 bgcolcl text-center">
<label>List Of Facilities - Visits Planned</label>
</div>
</div>
<div class="row bc">
<div class="col-xs-1 text-center">
<label>Sr. No.</label>
</div>
<div class="col-xs-1 zp brl text-center">
<label>Visit Category</label>
</div>
<div class="col-xs-2 zp br text-center">
<label>Facility Type</label>
</div>
<div class="col-xs-2 br text-center">
<label>Facility Name</label>
</div>
<div class="col-xs-5">
<div class="row">
<div class="col-xs-8 text-center"><label>Checklist <span class="blink_me">Fill within <?php echo $maxalloweddays; ?> days of visit date</span></label></div>
<div class="col-xs-4 brl text-center"><label>HCP Name</label></div>
</div>
</div>
<div class="col-xs-1 br text-center">
<label>Date</label>
</div>
<!--<div class="col-xs-1  text-center">
<label>Status</label>
</div>-->
</div>
<div class="rowlightbg">
<?php foreach($DataRow["visits"] as $key => $val){ ?>
<div class="row cloned-row" style="border-bottom: 1px solid rgba(0, 0, 0, 0.34);">
<div class="row" style="margin-left: 0px; margin-right: 0px;">
<div class="col-xs-1 text-center">
<label class=""><?php echo ($key+1); ?></label>
</div>
<div class="col-xs-1 text-left">
<p><?php if($val["visitcategory"] == "Vertical Program"){ echo "Program"; }else{ echo $val["visitcategory"]; } ?></p>
</div>
<div class="col-xs-2 text-left zp">
<p><?php echo get_Fatype_Name($val["fatype"]); ?></p>
</div>
<div class="col-xs-2 text-left">
<p><?php echo get_Facility_Name($val["facode"]); ?></p>
</div>
<div class="col-xs-5">
<?php foreach($val["checklists"] as $key1 =>$vall){
$approvedstat = (isset($DataRow["status"]))?$DataRow["status"]:"Not Approved";//list approved from dho or not will use to limit user for edit
$vpvc_id = $val["checklists"][$key1]["vpvc_id"];
$filledstats = getChecklstStat($val["checklists"][$key1]["chklsttable"],$vpvc_id,"true");
$val["checklists"][$key1]["filledstats"] = $filledstats;
$twoparts = explode("_",$vall["tablename"]);
?>
<div class="form-group" style="margin-bottom:0px !important;">
<div class="col-xs-8 text-left zp">
<p>
<?php
$chklsttName = get_Checklist_Name($vall["checklistid"]);
//if plan approved, only then data for checklist can be added or viewed
$chklstPathpath="";
//if($approvedstat=="Approved"){
if($filledstats=="true")
{
//checklist already filled, open its view
$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'_view/'.$vpvc_id;
}else if(isset($DataRow["supervisorid"]) && $DataRow["supervisorid"]==$userId)
{
//($val["visitdate"]<=date("Y-m-d")
$visitdate = $val["visitdate"];
$visitadvdate = date( "Y-m-d", strtotime("$visitdate +".$maxalloweddays." days" ) );
if(($visitadvdate >= date( "Y-m-d")) && ($val["visitdate"]<=date("Y-m-d")) && ($approvedstat=="Approved" || ($utype=='Executive' && $ulevel=='2'))){
//user is viewing own plan, so user can add checklist data
$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'/'.$vpvc_id;
//check if user already half filled checklist?
if($filledstats=="yes")
{
//checklist already half filled, open its edit
$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'_edit/'.$vpvc_id;
}
}
/* if($filledstats=="yes")
{
$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'_edit/'.$vpvc_id;
} */
}
//}
if($chklstPathpath==""){
?>- <?php echo $chklsttName;
}else{
?><a href="<?php echo $chklstPathpath; ?>">- <?php echo $chklsttName; ?></a><?php
}
if($filledstats=="true"){ ?>
<span style="color: green;" class="ml5">&#10004;</span><?php
}else{
?><span style="color: red;" class="ml5">&#10006;</span><?php
}
//if lqas checklist and saved or submitted
if(($vall["checklistid"]==20) &&($filledstats=="true" || $filledstats=="yes")){
$printpath = $basePath."lqas_download/".$vpvc_id;
}else{
$printpath = $basePath."assets/files/".$vall["file_name"].".pdf";
} ?>
<a target="_blank" data-original-title="Export in PDF/Print" href="<?php echo $printpath; ?>" class="my-tooltip pull-right" data-toggle="tooltip" data-placement="top"><i class="fa fa-print fa-2x" style="margin-top: 2px;"></i></a>
</p>
</div>
<div class="col-xs-4 text-center ">
<?php if(isset($vall["hcptype_id"]) && isset($vall["hcp_value"])){ ?>
<p><?php echo gethcpTypeValue(true,$vall["hcptype_id"],$vall["hcp_value"]); ?></p>
<?php } ?>
</div>
</div>
<?php } ?>
</div><!--end of main col xs-3-->

<?php
$var = "visit_confirmed";
if($val[$var]==1){
$tooltip = "Visit Confirmed by android app";
$html = '<span style="color: green;cursor: pointer;">&#10004;</span>';
$class= 'show1';
}else{
$tooltip = "Visit not Confirmed by android app";
$html = '<span style="color: red">&#10006;</span>';
$class= '';
} ?>
<div class="col-xs-1 zp text-center <?php echo $class; ?>" data-picture="<?php echo $val["picture"]; ?>" data-lat="<?php echo $val["latitude"]; ?>" data-long="<?php echo $val["longitude"]; ?>" data-visitdate="<?php echo $val["visitdate"]; ?>" data-date_confirmed="<?php echo $val["date_confirmed"]; ?>" data-time_confirmed="<?php echo $val["time_confirmed"]; ?>">
<p><?php $var ="visitdate[".($key+1)."]"; echo isset($val)?getNewDateFormat(date("d-m-Y",strtotime($val["visitdate"]))):''; ?></p>

<span data-placement="top" data-toggle="tooltip" class="link-add-new my-tooltip spanandroid" data-original-title="<?php echo $tooltip; ?>">
<img src="<?php echo $assetsPath; ?>images/a1.png">
<?php echo $html; ?>
</span>
</div>
</div>
</div>
<?php } ?>
</div>
</div>
<br>
<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
<?php
if(isset($DataRow["supervisorid"]) && isset($DataRow["status"]) && $userId==$DataRow["supervisorid"] && $DataRow["status"]!="Approved")
{ ?>
<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>plans/plan_edit/<?php echo $id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
<?php }
?>
<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
</div>
</div>
</div> <!--end of panel body-->
</div> <!--end of panel panel-primary-->
</div>
<!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<?php $this->load->view("templates/scripts"); ?>
<script src="<?php echo $assetsPath; ?>js/jquery.simplePopup.js"></script>
<script type="text/javascript">
var mouseX,mouseY,windowWidth,windowHeight;
var  popupLeft,popupTop;
$(document).ready(function(){
$(document).mousemove(function(e){
mouseX = e.pageX;
mouseY = e.pageY;
//To Get the relative position
if( this.offsetLeft !=undefined)
mouseX = e.pageX - this.offsetLeft;
if( this.offsetTop != undefined)
mouseY = e.pageY; - this.offsetTop;
if(mouseX < 0)
mouseX =0;
if(mouseY < 0)
mouseY = 0;
windowWidth  = $(window).width()+$(window).scrollLeft();
windowHeight = $(window).height()+$(window).scrollTop();
});
var newWindow = '';
$('.show1').click(function(){
/* //to show image
$(".poppic").attr("src","");
$(".poppic").attr("src",'<?php echo $assetsPath; ?>'+"appimages/"+$(this).data("picture"));
//to show map
var latt = $(this).data("lat");
var longg = $(this).data("long");
$(".popmap").html('<iframe src="https://www.google.com/maps/embed/v1/place?q='+latt+','+longg+'&amp;key=AIzaSyBHNtLEuHSbyf-cSkQvM5EocmPDCeau4yY" width="100%" height="230px" frameborder="0" style="border:0" allowfullscreen></iframe>');
//to show popup and set its options
$('#pop1').simplePopup();
var popupWidth  = $('#pop1').outerWidth();
var popupHeight =  $('#pop1').outerHeight();
if(mouseX+popupWidth > windowWidth)
popupLeft = mouseX-popupWidth;
else
popupLeft = mouseX;
if(mouseY+popupHeight > windowHeight)
popupTop = (mouseY+22)-popupHeight;
else
popupTop = (mouseY+22);
if( popupLeft < $(window).scrollLeft()){
popupLeft = $(window).scrollLeft();
}
if( popupTop < $(window).scrollTop()){
popupTop = $(window).scrollTop();
}
if(popupLeft < 0 || popupLeft == undefined)
popupLeft = 0;
if(popupTop < 0 || popupTop == undefined)
popupTop = 0;
$('#pop1').offset({top:popupTop,left:popupLeft}); */
var latt = $(this).data("lat");
var longg = $(this).data("long");
var vvisitdate = $(this).data("visitdate");
var ddate_confirmed = $(this).data("date_confirmed");
var ttime_confirmed = $(this).data("time_confirmed");
var htmlforPop = '<div id="popmob"><div>Planned Visit Date : '+vvisitdate+' <br />Visit Confirmation Date : '+ddate_confirmed+', Confirmation Time: '+ttime_confirmed+'</div><div class="img-controls"><span style="right: 20px; top: 20px; background: #517ee2; border: 1px solid #ffebab;; padding: 3px 12px; position: absolute;z-index: 999999; color: #fff;font-size: 27px; opacity: 0.7;border-radius: 4px;cursor: pointer;" class="rotateicon" onclick="rotateme(this)">&#8631;</span></div><div class="popboy"><div id="exTab2"><div class="tab-content"><div class="tab-pane active" id="mob1"><img id="poppic" src="<?php echo $assetsPath; ?>appimages/'+$(this).data("picture")+'" class="img-responsive poppic" style="width: 100%;"></br></div><div class="tab-pane popmapmob" id="mob2"><iframe src="https://www.google.com/maps/embed/v1/place?q='+latt+','+longg+'&amp;key=AIzaSyBHNtLEuHSbyf-cSkQvM5EocmPDCeau4yY" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe></div></div></div></div></div>';

if(newWindow!=''){
newWindow.close();
}
newWindow = window.open("","","height=700,width=700,resizable=yes,scrollbars=yes");
newWindow.document.write(htmlforPop);
//for rotation
var s=document.createElement('script');
s.type = "text/javascript";
s.text = 'var currdeg = 0;function rotateme(obj){if(currdeg==360){currdeg=0;}currdeg=currdeg+90;var elem = document.getElementById("poppic");if(navigator.userAgent.match("Chrome")){elem.style.WebkitTransform = "rotate("+currdeg+"deg)";} else if(navigator.userAgent.match("Firefox")){elem.style.MozTransform = "rotate("+currdeg+"deg)";} else if(navigator.userAgent.match("MSIE")){elem.style.msTransform = "rotate("+currdeg+"deg)";} else if(navigator.userAgent.match("Opera")){		elem.style.OTransform = "rotate("+currdeg+"deg)";} else {		elem.style.transform = "rotate("+currdeg+"deg)";}}';
newWindow.document.body.appendChild(s);
});
});
</script>
</body>
</html>