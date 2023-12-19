<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Communication extends CI_Controller {
public $module = "Communication";
public function __construct() {
parent::__construct();
date_default_timezone_set("Asia/Karachi");
$this -> load -> model ('Communication_model');
$sessionData = array(
'id'  => 0,
'username'  => 'communication',
'name'  => 'Communication',
'expire' => time() + (120 * 120)
);
$this -> session -> set_userdata($sessionData);
}

public function get_mns_supervisors_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('cchss'.date("Ymd").'to'.$code.'m&s');
if($servercode == $clientcode)
{
$districts  = $this -> input -> post('districts');
if((count($districts)>0)){
$data["tableData"] = $this -> Communication_model -> get_supervisors_for_fm($districts);
$activitydist = (is_array($districts))?implode(",",$districts):$districts;
set_activity_log($this->module, "M&S Supervisors list fetched.", "M&S Supervisors list fetched for districts ".$activitydist.".");
}else{
$data["error"] = "Districts not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_districts_visits_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('cchss'.date("Ymd").'to'.$code.'m&s');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
if($fmonth>0){
$data["tableData"] = $this -> Communication_model -> get_districts_visits_for_fm($fmonth);
set_activity_log($this->module, "M&S Districts Visit list fetched.", "M&S Districts Visit list fetched for fmonth $fmonth.");
}else{
$data["error"] = "Year-Month not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_districts_plans_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('cchs'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
if($fmonth>0){
$data["tableData"] = $this -> Communication_model -> get_districts_plans_for_fm($fmonth);
set_activity_log($this->module, "M&S Districts Plan list fetched.", "M&S Districts Plan list fetched for fmonth $fmonth.");
}else{
$data["error"] = "Year-Month not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_plans_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('cchs'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
$districts  = $this -> input -> post('districts');
if($fmonth>0 && (count($districts)>0)){
$data["tableData"] = $this -> Communication_model -> get_plans_for_fm($districts,$fmonth);
$activitydist = (is_array($districts))?implode(",",$districts):$districts;
set_activity_log($this->module, "M&S Plans list fetched.", "M&S Plans list fetched for fmonth $fmonth and districts ".$activitydist.".");
}else{
$data["error"] = "Year-Month Or Districts not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_visits_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('cchs'.date("Ymd").'to'.$code.'ms');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
$districts  = $this -> input -> post('districts');
if($fmonth>0 && (count($districts)>0)){
$data["tableData"] = $this -> Communication_model -> get_held_visits_for_fm($districts,$fmonth);
$activitydist = (is_array($districts))?implode(",",$districts):$districts;
set_activity_log($this->module, "M&S Visits list fetched.", "M&S Visits list fetched for fmonth $fmonth and districts ".$activitydist.".");
}else{
$data["error"] = "Year-Month Or Districts not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_visit_detail()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('cchs'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$vpv_id = $this -> input -> post('vpv_id');
if($vpv_id>0){
$data = $this -> Communication_model -> get_visit_details($vpv_id);
set_activity_log($this->module, "M&S Visit detail fetched.", "M&S Visit detail fetched for visit id $vpv_id.");
}else{
$data["error"] = "Visit ID not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_kpis_count()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('mne'.date("Ymd").'to'.$code.'mns');
$fmonth = NULL;$customfmonthwc = "defaultfmwc";
if($servercode == $clientcode)
{
$frequency = $this -> input -> post('frequency');
if(isset($frequency) && ($frequency=='y' || $frequency=='fy' || $frequency=='q' || $frequency=='m')){
switch($frequency){
case 'y':
$fyear = $this -> input -> post('fyear');
if($fyear > 0){
$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
}else{
$data["error"] = "Year not provided.";
}
break;
case 'fy':
$years = $this -> input -> post('fyear');
if($years){
$years = explode("-",$years);
$customfmonthwc = " and ( vph.fmonth > '".$years[0]."-06' and vph.fmonth < '".$years[1]."-07' ) ";
}else{
$data["error"] = "Years not provided.";
}
break;
case 'q':
$qmonth = $this -> input -> post('qmonth');
$qparts = explode("-",$qmonth);
if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
$year = $qparts[0];
$quarter = $qparts[1];
$startmonth = "0".($quarter-1)*3;
$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
}else{
$data["error"] = "Quarter not/wrong provided.";
}
break;
}
}
if($customfmonthwc=="defaultfmwc" && !isset($data["error"])){
$fmonth = $this -> input -> post('fmonth');
if($fmonth > 0){}else{
$data["error"] = "Year-Month not provided.";
}
}
if(isset($data["error"])){}else{
$distcode = $this -> input -> post('distcode');
$distcode = (isset($distcode) && $distcode>0)?$distcode:NULL;
$data["tableData"] = $this -> Communication_model -> get_all_kpis_count($fmonth,$distcode,NULL,$customfmonthwc);
set_activity_log($this->module, "M&S KPIs Count fetched.", "M&S KPIs Count fetched for fmonth $fmonth and district $distcode.");
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_visits_count()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('dapp'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fyear = $this -> input -> post('fyear');
$distcode = $this -> input -> post('distcode');
$distcode = (isset($distcode) && $distcode>0)?$distcode:NULL;
if($fyear){
$years = explode("-",$fyear);
if($years[0]>0 && $years[1]>0){
$data["tableData"] = $this -> Communication_model -> get_quarter_wise_visits_count($fyear,$distcode);
set_activity_log($this->module, "M&S Visits Count fetched.", "M&S Visits Count fetched for financial year $fyear and district $distcode.");
}else{
$data["error"] = "Wrong Year(s) provided.";
}
}else{
$data["error"] = "Years not provided.";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_sup_freq_visits_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('dapp'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fquarter = $this -> input -> post('fquarter');
$distcode = (isset($distcode) && $distcode>0)?$distcode:NULL;
if($fquarter && $distcode){
$qparts = explode("-",$fquarter);
if((isset($qparts[0]) && $qparts[0]>0) && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
$year = $qparts[0];
$quarter = $qparts[1];
$startmonth = "0".($quarter-1)*3;
$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
$customwc = ' distcode = \''.$distcode.'\' and ( fmonth > \''.$year.'-'.$startmonth.'\' and fmonth < \''.$year.'-'.$endmonth.'\' ) ';
$this -> load -> model ('Common_model');
$suplist = $this -> Common_model -> fetchall("visit_plan_header",NULL,"supervisorid,supervisor,getdesigdisplayname(supervisorid) as designation,array_to_string(array_agg(id), ',') as vphids",$customwc,"supervisorid,supervisor");
$countallplanned = 0;$countallheld = 0;
foreach($suplist as $key=>$onerow){
$customvphids = "visitplanid in ('".str_replace(",","','",$onerow["vphids"])."')";
$currvisits = $this -> Common_model -> fetchall("visit_plan_visits",NULL,"id,facode,facilityname(facode),visitdate",$customvphids." AND (select sum(checklist_filled_stat(vpvc.id,vpvc.checklistid)) from visit_plan_visit_checklists vpvc where vpvc.visitplanvisitsid = visit_plan_visits.id)>0");
$suplist[$key]["totplanned"] = $countcurrplanned = $this -> Common_model -> count_record("visit_plan_visits",$customvphids);
$suplist[$key]["totheld"] = $countcurrheld = count($currvisits);
$suplist[$key]["visits"] = $currvisits;
$countallplanned = $countallplanned+$countcurrplanned;
$countallheld = $countallheld+$countcurrheld;
unset($suplist[$key]["vphids"]);
}
$suplist["totalplanned"] = $countallplanned;
$suplist["totalheld"] = $countallheld;
$data["tableData"] = $suplist;
set_activity_log($this->module, "M&S Visits Count fetched.", "Supervisor Wise M&S Visits Count and details fetched for year-Quarter $fquarter and district $distcode. from DAP");
}else{
$data["error"] = "Wrong Year-Quarter provided.";
}
}else{
$data["error"] = "Required parameters not provided.";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}
public function get_sup_freq_visits_held_list()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('dapp'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fquarter = $this -> input -> post('fquarter');//2016-03 etc
$distcode = $this -> input -> post('distcode');
$distcode = (isset($distcode) && $distcode>0)?$distcode:NULL;

$qparts = explode("-",$fquarter);
$year=$qparts[0];
$yfirst = $year;
$ysecond = $year+1;
if($distcode){
if(isset($yfirst) && $yfirst > 0 ){
$data=array();
$this -> load -> model ('Common_model');
$this -> load -> helper ('communication_helper');
for($q=1; $q<5; $q++)
{
$fmonth = getquaterWisefmonth($q,$yfirst,$ysecond);
$customwc = "distcode ='$distcode' and $fmonth";
$suplist = $this -> Common_model -> fetchall("visit_plan_header",NULL,"array_to_string(array_agg(id), ',') as vphids",$customwc,"supervisorid,supervisor");
$countallheld = 0;
foreach($suplist as $key=>$onerow){
$customvphids = "visitplanid in ('".str_replace(",","','",$onerow["vphids"])."')";
$currvisits = $this -> Common_model -> fetchall("visit_plan_visits",NULL,"id,facode,facilityname(facode),visitdate",$customvphids." AND (select sum(checklist_filled_stat(vpvc.id,vpvc.checklistid)) from visit_plan_visit_checklists vpvc where vpvc.visitplanvisitsid = visit_plan_visits.id)>0");
$countcurrheld = count($currvisits);
$countallheld = $countallheld+$countcurrheld;
unset($data[$key]["vphids"]);
}
$data["q".$q] = $countallheld;
}
$data["totalheld"]=array_sum($data);
set_activity_log($this->module, "M&S Visits Count fetched.", "Supervisor Wise M&S Visits Count and details fetched for year-Quarter $fquarter and district $distcode. from DAP");
}else{
$data["error"] = "Wrong Year-Quarter provided.";
}
}else{
$data["error"] = "Required parameters not provided.";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_mns_lqas_count()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('mne'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
$distcode = $this -> input -> post('distcode');
$distcode = (isset($distcode) && $distcode>0)?$distcode:NULL;
if($fmonth>0){
$data["tableData"] = $this -> Communication_model -> get_lqas_filled_count($fmonth,$distcode);
set_activity_log($this->module, "M&S LQAS Count fetched.", "M&S LQAS Count fetched for fmonth $fmonth and district $distcode.");
}else{
$data["error"] = "Year-Month not provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_dhis_lqas_held_data()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('dhis2'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
$fmonthfrom = $this -> input -> post('fmonthfrom');
$fmonthto = $this -> input -> post('fmonthto');
$distcode = $this -> input -> post('distcode');
$distcode = (isset($distcode) && $distcode!=="")?$distcode:NULL;
if($fmonthfrom && $fmonthto){
$data["tableData"] = $this -> Communication_model -> get_dhis_lqas_withap_data($fmonthfrom,$fmonthto,$distcode);
set_activity_log($this->module, "M&S LQAS Count/List fetched.", "M&S LQAS Count/List fetched for period $fmonthfrom-$fmonthto and district $distcode. from dhis system");
}else if($fmonth){
$data["tableData"] = $this -> Communication_model -> get_dhis_lqas_held_data($fmonth,$distcode);
set_activity_log($this->module, "M&S LQAS Count/List fetched.", "M&S LQAS Count/List fetched for fmonth $fmonth and district $distcode. from dhis system");
}else{
$data["error"] = "Year-Month not/wrong provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}

public function get_lhw_lqas_held_data()
{
$clientcode = $this -> input -> post('hackerinfo');
$code = $this -> input -> post('code');
$servercode = md5('lhw'.date("Ymd").'to'.$code.'mns');
if($servercode == $clientcode)
{
$fmonth = $this -> input -> post('fmonth');
$distcode = $this -> input -> post('distcode');
$distcode = (isset($distcode) && $distcode!=="")?$distcode:NULL;
if($fmonth){
$data["tableData"] = $this -> Communication_model -> get_lhw_lqas_held_data($fmonth,$distcode);
set_activity_log($this->module, "M&S LQAS Count/List fetched.", "M&S LQAS Count/List fetched for fmonth $fmonth and district $distcode. from lhw system");
}else{
$data["error"] = "Year-Month not/wrong provided";
}
}else{
$data["error"] = "UnAuthorised Access, Please login first.";
}
echo json_encode($data);
}
}
?>