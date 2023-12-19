<?php
class Communication_model extends CI_Model {
public function get_supervisors_for_fm($distcode = 0)
{
$this->db->select('id,districtname(distcode) as "District",fullname as supervisor,getdesignation(users.designation) as designation,utype',FALSE);
$this->db->from("users");
if(is_array($distcode)){
$distcodess=array();
foreach($distcode as $code){
array_push($distcodess,$code);
}
$this->db->where_in("distcode",$distcodess);
}else if($distcode > 0)
{
$this->db->where("distcode",$distcode);
}
$this->db->order_by("District","ASC");
$this->db->order_by("designation","ASC");
$records = $this->db->get()->result_array();
return $records;
}
public function get_plans_for_fm($distcode = 0,$fmonth=NULL)
{
$this->db->select('
vph.distcode,
districtname(vph.distcode) as "District",
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",
count(id) as "No of Supervisors in Plan",
get_dist_visits_count(vph.distcode,vph.fmonth) as "No of Visit in Plan",
get_dist_chklst_count(vph.distcode,vph.fmonth) as "Total Checklists",
get_dist_filled_chklst_count(vph.distcode,vph.fmonth) as "Filled Checklists",
dho_approved_stat(vph.distcode,vph.fmonth) as status',
FALSE);
$this->db->from("visit_plan_header vph");
if($fmonth){}else{$fmonth=date("Y-m");}
$this->db->where("vph.fmonth",$fmonth);
if(is_array($distcode)){
$distcodess=array();
foreach($distcode as $code){
array_push($distcodess,$code);
}
$this->db->where_in("vph.distcode",$distcodess);
}else if($distcode > 0)
{
$this->db->where("vph.distcode",$distcode);
}
$this->db->group_by("vph.distcode,vph.fmonth");
$records = $this->db->get()->result_array();
return $records;
}
public function get_held_visits_for_fm($distcode = 0,$fmonth=NULL)
{
$this->db->select('districtname(vph.distcode) as "District",
programname(vph.ptype) as Program,
getuserfullname(vph.supervisorid) as supervisor,
getdesigdisplayname(vph.supervisorid) as designation,
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",
vpv.facode,
facilityname(vpv.facode) as facility,
facilitytype(vpv.facode) as fatype,
vpv.id as vpv_id,
TO_CHAR((vpv.visitdate)::Date,\'DD Mon YYYY\') as "visitdate",
vpv.vehicleassigned as vehicle,
vpv.driver as driver,
case when get_sup_filled_chklst_count(vph.supervisorid,vph.fmonth)>0 then \'Held\' else \'Not Held\' end as status',
FALSE);
$this->db->from("visit_plan_visits vpv");
$this->db->join("visit_plan_header vph","vph.id = vpv.visitplanid","INNER");
$this->db->where("vpv.visitdate <=",date("Y-m-d"));
if($fmonth){}else{$fmonth=date("Y-m");}
$this->db->where("vph.fmonth",$fmonth);
if(is_array($distcode)){
$distcodess=array();
foreach($distcode as $code){
array_push($distcodess,$code);
}
$this->db->where_in("vph.distcode",$distcodess);
}else if($distcode > 0)
{
$this->db->where("vph.distcode",$distcode);
}
$this->db->order_by("vpv.visitdate","DESC");
$this->db->order_by("vpv.facode","ASC");
$records = $this->db->get()->result_array();
return $records;
}
public function get_visit_details($vpv_id)
{
$this->db->select('districtname(vph.distcode) as "District",
getuserfullname(vph.supervisorid) as supervisor_name,
getdesigdisplayname(vph.supervisorid) as supervisor_desg,
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as fmonth,
vpv.facode,
facilityname(vpv.facode) as facility,
facilitytype(vpv.facode) as fatype,
vpv.visitdate,
vpv.vehicleassigned as vehicle,
vpv.driver as driver',
FALSE);
$this->db->from("visit_plan_visits vpv");
$this->db->join("visit_plan_header vph","vph.id = vpv.visitplanid","INNER");
$this->db->where("vpv.id",$vpv_id);
$records = $this->db->get()->row();
return $records;
}
public function get_districts_visits_for_fm($fmonth)
{
$todayy = date("Y-m-d");
$this->db->select('
distcode,
district,
TO_CHAR((\''.$fmonth.'\' || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",
get_dist_approved_visits_count(distcode,\''.$fmonth.'\') as "No of Planned Visits of Supervisors",
get_dist_approved_visits_tilldate_count(distcode,\''.$fmonth.'\',\''.$todayy.'\') as "No of Planned Visits Till Today"',
FALSE);
$this->db->from("districts");
$this->db->order_by("district","ASC");
$records = $this->db->get()->result_array();
return $records;
}
public function get_districts_plans_for_fm($fmonth)
{
$this->db->select('
distcode,
district,
TO_CHAR((\''.$fmonth.'\' || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",
get_users_count(\'3\',\'\',\'\',distcode) as "Total Supervisors",
(select count (*) from visit_plan_header where fmonth = \''.$fmonth.'\' and distcode = districts.distcode) as "Supervisors having Plan"',
FALSE);
$this->db->from("districts");
$this->db->order_by("district","ASC");
$records = $this->db->get()->result_array();
return $records;
}
public function get_all_kpis_count($fmonth=NULL,$distcode=NULL,$visitDate=NULL,$customfmonthwc='defaultfmwc')
{
$ptype 	= '';
$wc = "";
if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
$customfmonthwc = str_replace("'","''",$customfmonthwc);
$fmnthparm = "''";
$groupby = "";
$countplans = "count(distinct vpv.visitplanid) as plans,";
}
else if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
$fmnthparm = "vph.fmonth";
$groupby = ",vph.fmonth";
$countplans = "";
}
if($visitDate){$wc .= " and vpv.visitdate = '$visitDate'";}
if(is_null($distcode)){
$this->db->select("vph.distcode as code,
COALESCE(districtname(vph.distcode),'Provincial') as name,
count(distinct vph.supervisorid) as supervisors,
$countplans
count(distinct vpv.id) as plannedvisits,
get_held_visits_count($fmnthparm,CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,0,'defaultptype','".$customfmonthwc."') as visitsheld,
count(distinct vpvc.id) as plannedchecklists,
get_prgrm_filled_chklst_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as checklistsfilled,
count(distinct vpv.facode) as hfinplan,
get_prgrm_hf_visited_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as hfvisited,
get_prgrm_visits_confirmed_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as visitsconfirmed
from visit_plan_visit_checklists as vpvc
inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc." group by vph.distcode$groupby order by code",FALSE);
}else{
if($distcode===0){
$wc .= " and vph.distcode IS NULL ";
}else{
$wc .= " and vph.distcode = '$distcode'";
}
if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$this->db->select("'".$distcode."' as code,vph.fmonth as fmonth,
count(distinct vph.supervisorid) as supervisors,
count(distinct vpv.id) as plannedvisits,
get_held_visits_count(vph.fmonth,'".$distcode."') as visitsheld,
count(distinct vpvc.id) as plannedchecklists,
get_prgrm_filled_chklst_count('".$distcode."',vph.fmonth,'".$ptype."') as checklistsfilled,
count(distinct vpv.facode) as hfinplan,
get_prgrm_hf_visited_count('".$distcode."',vph.fmonth,'".$ptype."') as hfvisited,
get_prgrm_visits_confirmed_count('".$distcode."',vph.fmonth,'".$ptype."') as visitsconfirmed
from visit_plan_visit_checklists as vpvc
inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc." group by vph.fmonth order by code",FALSE);
}else{
$this->db->select("vph.id as code,
vph.supervisor||' ('||getdesignation(getdesigid(vph.supervisorid))||')' as name,
count(distinct vpv.id) as plannedvisits,
get_held_visits_count(vph.fmonth,vph.distcode,vph.supervisorid) as visitsheld,
count(vpvc.id) as plannedchecklists,
get_sup_filled_chklst_count(vph.supervisorid,vph.fmonth) as checklistsfilled,
count(distinct vpv.facode) as hfinplan,
get_sup_hf_visited_count(vph.supervisorid,vph.fmonth) as hfvisited,
get_sup_visits_confirmed_count(vph.supervisorid,vph.fmonth) as visitsconfirmed
from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv
on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc." group by vph.id,vph.distcode,vph.supervisorid,vph.supervisor,vph.fmonth order by name",FALSE);
}
}
$records = $this->db->get()->result_array();
return $records;
}
public function get_quarter_wise_visits_count($fyear=NULL,$distcode=NULL)
{
$wc = "vph.id > 0";
if($fyear){
$years = explode("-",$fyear);
$customqmonth1wc = " and ( vph.fmonth > '".$years[0]."-06' and vph.fmonth < '".$years[0]."-10' ) ";
$customqmonth2wc = " and ( vph.fmonth > '".$years[0]."-09' and vph.fmonth < '".$years[0]."-13' ) ";
$customqmonth4wc = " and ( vph.fmonth > '".$years[1]."-03' and vph.fmonth < '".$years[1]."-07' ) ";
}
if(is_null($distcode)){
$query = $this->db->query("Select 'Khyber Pakhtunkhwa' as name,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth1wc." ) as plannedvisitsq1,
get_held_visits_count('','0',0,'defaultptype','".str_replace("'","''",$customqmonth1wc)."') as visitsheldq1,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth2wc." ) as plannedvisitsq2,
get_held_visits_count('','0',0,'defaultptype','".str_replace("'","''",$customqmonth2wc)."') as visitsheldq2,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth3wc." ) as plannedvisitsq3,
get_held_visits_count('','0',0,'defaultptype','".str_replace("'","''",$customqmonth3wc)."') as visitsheldq3,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth4wc." ) as plannedvisitsq4,
get_held_visits_count('','0',0,'defaultptype','".str_replace("'","''",$customqmonth4wc)."') as visitsheldq4",FALSE);
}else{
$wc.=" and vph.distcode = '".$distcode."'";
$query = $this->db->query("Select 'Khyber Pakhtunkhwa' as name,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth1wc." ) as plannedvisitsq1,
get_held_visits_count('','$distcode',0,'defaultptype','".str_replace("'","''",$customqmonth1wc)."') as visitsheldq1,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth2wc." ) as plannedvisitsq2,
get_held_visits_count('','$distcode',0,'defaultptype','".str_replace("'","''",$customqmonth2wc)."') as visitsheldq2,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth3wc." ) as plannedvisitsq3,
get_held_visits_count('','$distcode',0,'defaultptype','".str_replace("'","''",$customqmonth3wc)."') as visitsheldq3,
(select count(distinct vpv.id) from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id where ".$wc.$customqmonth4wc." ) as plannedvisitsq4,
get_held_visits_count('','$distcode',0,'defaultptype','".str_replace("'","''",$customqmonth4wc)."') as visitsheldq4",FALSE);
}
$records = $query->row_array();
return $records;
}
public function get_lqas_filled_count($fmonth=NULL,$distcode=NULL)
{
$wc = "vph.id > 0";
if($fmonth){$wc .= " and vph.fmonth = '$fmonth'";}
if(is_null($distcode)){
$this->db->select('distcode as code,
district as name,
get_lqas_filled_count(\''.$fmonth.'\',distcode,\'all\',3) as nolqasdhis,
get_lqas_filled_count(\''.$fmonth.'\',distcode,\'lhw\',3) as nolqaslhw,
get_lqas_filled_count(\''.$fmonth.'\',distcode,\'mnch\',3) as nolqascmw,
get_lqas_filled_count(\''.$fmonth.'\',distcode,\'all\',3,80) as dhisaccuracy,
get_lqas_filled_count(\''.$fmonth.'\',distcode,\'lhw\',3,80) as lhwaccuracy,
get_lqas_filled_count(\''.$fmonth.'\',distcode,\'mnch\',3,80) as cmwaccuracy
from districts order by code',FALSE);
}else{
if($distcode===0){
$wc .= " and vph.distcode IS NULL ";
}else{
$wc .= " and vph.distcode = '$distcode'";
}
$wc .= " and vpvc.checklistid = '20'";
$this->db->select('vph.id as code,
vph.supervisor||\' (\'||getdesignation(getdesigid(vph.supervisorid))||\')\' as name,
count(vpvc.id) as plannedchecklists,
get_lqas_filled_count(vph.fmonth,vph.distcode,vph.ptype,3,-1,vph.supervisorid) as checklistsfilled,
get_lqas_filled_count(vph.fmonth,vph.distcode,vph.ptype,3,80,vph.supervisorid) as checklistswaccuracy
from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv
on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where '.$wc.' group by vph.id,vph.distcode,vph.ptype,vph.supervisorid,vph.supervisor,vph.fmonth order by name',FALSE);
}
$records = $this->db->get()->result_array();
return $records;
}
public function get_dhis_lqas_held_data($fmonth=NULL,$distcode=NULL)
{
$wc = "da_lqas.is_temp_saved <> '1'";
if($fmonth){$wc .= " and mis_data_fmonth = '$fmonth'";}
if(is_null($distcode)){
$this->db->select("
districts.distcode as code,
districts.distcode || '-' || districts.district as \"District\",
COALESCE(lqascounts.totalrep,0) as \"Total # of LQAS Conducted\",
COALESCE(lqascounts.ap,0) as \"# of LQAS with Accuracy atleast 70\",
round(COALESCE(lqascounts.ap::numeric/NULLIF(lqascounts.totalrep::numeric,0)*100,0)::numeric,2) as \"Percentage LQAS with Accuracy atleast 80%\",
COALESCE(lqascounts.avgap,0) as \"Average Accuracy Percentage\"
from districts
FULL OUTER JOIN
(
select distcode,
count(*) as totalrep,
COALESCE(sum(CASE WHEN lqas_ap>59 THEN 1 ELSE 0 END),0) as ap,
round(AVG(lqas_ap)::numeric,2) as avgap from da_lqas where $wc
and entity_type = 'DHIS' group by distcode
) as lqascounts
ON lqascounts.distcode = districts.distcode
order by code",FALSE);
}else{
if($distcode===0 || $distcode=="0"){
$wc .= "";
$distrcol = " distcode || '-' || districtname(distcode) as \"District\", ";
}else{
$wc .= " and da_lqas.distcode = '$distcode'";
$distrcol = "";
}
$this->db->select("
vpvc_id as code,
$distrcol
facode || '-' || facilityname(facode) as \"Facility\",
facilitytype(facode) as \"Facility Type\",
COALESCE(lqas_ap,0) as \"Accuracy Percentage\",
supervisor_name as \"Supervisor Conducted LQAS\",
lqas_date as \"Date LQAS Conducted\"
from da_lqas where $wc and entity_type = 'DHIS'
order by code",FALSE);
}
$records = $this->db->get()->result_array();
return $records;
}
public function get_dhis_lqas_withap_data($fmonthfrom,$fmonthto,$distcode=NULL)
{
$wc = "da_lqas.is_temp_saved <> '1'";
$wc .= " and mis_data_fmonth >= '$fmonthfrom' and mis_data_fmonth <= '$fmonthto'";
if(is_null($distcode)){
$this->db->select("
districts.distcode as code,
districts.distcode || '-' || districts.district as district,
COALESCE(lqascounts.totalrep,0) as lqasconducted,
COALESCE(lqascounts.ap90,0) as lqaswithap80,
COALESCE(lqascounts.ap60,0) as lqaswithap60to90
from districts
FULL OUTER JOIN
(
select distcode,
count(*) as totalrep,
COALESCE(sum(CASE WHEN lqas_ap>80 THEN 1 ELSE 0 END),0) as ap80,
COALESCE(sum(CASE WHEN lqas_ap BETWEEN 60 and 80 THEN 1 ELSE 0 END),0) as ap60
from da_lqas where $wc
and entity_type = 'DHIS' group by distcode
) as lqascounts
ON lqascounts.distcode = districts.distcode
order by code",FALSE);
}else{
if($distcode===0 || $distcode=="0"){
$wc .= "";
$distrcol = " distcode || '-' || districtname(distcode) as \"District\", ";
}else{
$wc .= " and da_lqas.distcode = '$distcode'";
$distrcol = "";
}
$this->db->select("
vpvc_id as code,
$distrcol
facode || '-' || facilityname(facode) as \"Facility\",
facilitytype(facode) as \"Facility Type\",
COALESCE(lqas_ap,0) as \"Accuracy Percentage\",
supervisor_name as \"Supervisor Conducted LQAS\",
lqas_date as \"Date LQAS Conducted\"
from da_lqas where $wc and entity_type = 'DHIS'
order by code",FALSE);
}
$records = $this->db->get()->result_array();
return $records;
}
public function get_lhw_lqas_held_data($fmonth=NULL,$distcode=NULL)
{
$wc = "";
if($fmonth){$wc .= " and mis_data_fmonth = '$fmonth'";}
if(is_null($distcode)){
$this->db->select("
districts.distcode as code,
districts.distcode || '-' || districts.district as \"District\",
COALESCE(lqascounts.totalrep,0) as \"Total # of LQAS Conducted\",
COALESCE(lqascounts.ap,0) as \"# of LQAS with Accuracy atleast 80\",
round(COALESCE(lqascounts.ap::numeric/NULLIF(lqascounts.totalrep::numeric,0)*100,0)::numeric,2) as \"Percentage LQAS with Accuracy atleast 70%\",
COALESCE(lqascounts.avgap,0) as \"Average Accuracy Percentage\"
from districts
FULL OUTER JOIN
(
select distcode,
count(*) as totalrep,
COALESCE(sum(CASE WHEN lqas_ap>59 THEN 1 ELSE 0 END),0) as ap,
round(AVG(lqas_ap)::numeric,2) as avgap from da_lqas where $wc
and entity_type = 'LHW' group by distcode
) as lqascounts
ON lqascounts.distcode = districts.distcode
order by code",FALSE);
}else{
if($distcode===0 || $distcode=="0"){
$wc .= "";
$distrcol = " distcode || '-' || districtname(distcode) as \"District\", ";
}else{
$wc .= " and da_lqas.distcode = '$distcode'";
$distrcol = "";
}
$this->db->select("
vpvc_id as code,
$distrcol
facode || '-' || facilityname(facode) as \"Facility\",
entity_code || '-' || lhwname(entity_code) as \"LHW\",
COALESCE(lqas_ap,0) as \"Accuracy Percentage\",
supervisor_name as \"Supervisor Conducted LQAS\",
lqas_date as \"Date LQAS Conducted\"
from da_lqas where $wc and entity_type = 'LHW'
order by code",FALSE);
}
$records = $this->db->get()->result_array();
return $records;
}
}
?>