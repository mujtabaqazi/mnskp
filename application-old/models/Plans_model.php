<?php
class Plans_model extends CI_Model {
//=============List all records function starts=============//
public function get_plans(/* $distcode = 0 */$fmonth=NULL)
{
//$ulevel = $this -> session -> userLevel;
//$utype 	= $this -> session -> utype;
$wc = array();

$wc["vph.supervisorid"] = $this -> session -> id;

if($fmonth)
{
$wc["vph.fmonth"] = $fmonth;
}
if($this -> session -> userLevel == '2'){
$ptype = $this -> session -> ptype;
$this->db->select('vph.id,vph.supervisor,
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",programname(vph.ptype) as Program,vph.fieldvisitsplanned as "Total Visits",
TO_CHAR(vph.plandate,\'DD Mon YYYY\') as "Plan Date",
pd_approve_status(vph.fmonth,\''.$ptype.'\') as "PD Approved",TO_CHAR(vph.date_submitted,\'DD Mon YYYY\') as "Plan Submitted Date"', FALSE);
}else{
$this->db->select('vph.id,vph.supervisor, districtname(vph.distcode) as "District",
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",programname(vph.ptype) as Program,vph.fieldvisitsplanned as "Total Visits",
TO_CHAR(vph.plandate,\'DD Mon YYYY\') as "Plan Date",
dho_approved_stat(vph.distcode,vph.fmonth) as "DHO Approved",TO_CHAR(vph.date_submitted,\'DD Mon YYYY\') as "Plan Submitted Date"', FALSE);
}
$this->db->where($wc);
$this->db->order_by("vph.fmonth","DESC");
$records = $this->db->get("visit_plan_header vph")->result_array();
return $records;
}
//=============List all records function ends=============//
//=============List all records function starts=============//
public function get_managers_plans($distcode = 0,$fmonth=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = array();
if($ulevel=='3' && $utype=='DEO')
{
$wc["supervisorid"] = $this -> session -> id;
}
if($ulevel=='3' && ($utype=='Manager' || $utype=='Executive'))
{
$wc["distcode"] = $this -> session -> distcode;
}
if($ulevel=='2')
{
$wc["procode"] = $this -> session -> procode;
if($distcode > 0)
{
$wc["distcode"] = $distcode;
}
}
if($fmonth){}else{$fmonth=date("Y-m");}
if($wc=="")
redirect(base_url());
$wc["vph.fmonth"] = $fmonth;
if($ptype == 'all'){
}else{
$wc['vph.ptype'] = $ptype;
}
$this->db->select('vph.id,vph.supervisor||\' (\'||getdesignation(getdesigid(vph.supervisorid))||\')\' as "Supervisor (Designation)",
districtname(vph.distcode) as "District",
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",
programname(vph.ptype) as Program,
vph.fieldvisitsplanned as "Total Visits",
get_sup_hf_visited_count(vph.supervisorid,\''.$fmonth.'\') as "No of Facilities Visited",
get_sup_chklst_count(vph.supervisorid,\''.$fmonth.'\') as "No of Planned Checklists",
get_sup_filled_chklst_count(vph.supervisorid,\''.$fmonth.'\') as "No of Filled Checklists",
TO_CHAR(vph.plandate,\'DD Mon YYYY\') as "Date",
dho_approved_stat(vph.distcode,vph.fmonth) as "DHO Approval Status"', FALSE);
$this->db->where($wc);
$this->db->order_by("vph.fmonth","DESC");
$records = $this->db->get("visit_plan_header vph")->result_array();
//print_r($records);exit;//get_sup_visits_confirmed_count
return $records;
}
//=============List all records function ends=============//
//=============List all records function starts=============//
public function get_programs_plans($ptype = 0,$fmonth=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= ($ptype)?$ptype:$this -> session -> ptype;
$wc = array();
if($fmonth){}else{$fmonth=date("Y-m");}
$wc["vph.fmonth"] = $fmonth;
$wc['vph.ptype'] = $ptype;
$this->db->select('vph.id,vph.supervisor,
TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",programname(vph.ptype) as Program,vph.fieldvisitsplanned as "Total Visits",
TO_CHAR(vph.plandate,\'DD Mon YYYY\') as "Date"', FALSE);
$this->db->where($wc);
$this->db->where("vph.distcode IS NULL");
$this->db->order_by("vph.fmonth","DESC");
$records = $this->db->get("visit_plan_header vph")->result_array();
//print_r($records);exit;
return $records;
}
//=============List all records function ends=============//
//=============List all records function starts=============//
public function get_plans_list($fmonth=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "b.id > 0";
if($fmonth){$wc .= " and b.fmonth = '$fmonth'";}
if($ulevel=='2'){
if($utype == 'ProExecutive'){
$wc .= " and b.ptype = '$ptype' and b.supervisorid in (select id from users where level='2') ";
$this->db->select('TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",count(distinct visitplanid) as "No of Supervisor (Have Plan)",
count(distinct facode) as "No of HF to be Visited",
count(distinct visitdate) as "No of Days in Plan",count(distinct vehicleassigned) as "No of Vehicles Assigned",count(distinct driver) as "No of Drivers",
pd_approve_status(fmonth,\''.$ptype.'\') as "PD Approval Status"
from (select a.facode,b.fmonth, a.visitplanid,a.visitdate,a.vehicleassigned,a.driver from visit_plan_visits as a inner join visit_plan_header as b
on a.visitplanid=b.id where '.$wc.') as e', FALSE);
}else{
$this->db->select('TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",count(distcode) as "Total Districts",
sum(case when dhoapproved=\'Approved\' then 1 else 0 end) as "Districts approved by dho",
sum(facilities) as "Facilities in Plans",
sum(supervisors) as "Supervisors in Plans", sum(days) as "Days in Plans",sum(vehicles) as "Vehicles in Plans",sum(drivers) as "Drivers in Plans"
from(select b.distcode, dho_approved_stat(b.distcode,b.fmonth) as dhoapproved,
count(distinct a.facode) as facilities,b.fmonth, count(distinct a.visitplanid) as supervisors, count(distinct a.visitdate) as days,
count(distinct a.vehicleassigned) as vehicles, count(distinct a.driver) as drivers from visit_plan_visits as a inner join visit_plan_header as b
on a.visitplanid=b.id where '.$wc.' group by b.distcode,b.fmonth) as e',FALSE);//dg_approved_stat(b.distcode,b.fmonth) as dgapproved,
//sum(case when dgapproved=\'Approved\' then 1 else 0 end) as "Districts approved by dg",
}
}else{
$distcode = $this -> session -> distcode;
$wc .= " and b.distcode = '$distcode'";
if($ulevel=='3' && $utype=='DEO')
{
$wc .= " and b.supervisorid = '$this -> session -> id'";
}
if($distcode > 0){}else{redirect(base_url());}
$distcode = $this -> session -> distcode;
$this->db->select('TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month",count(distinct visitplanid) as "No of Supervisor (Have Plan)",
count(distinct facode) as "No of HF to be Visited",
count(distinct visitdate) as "No of Days in Plan",count(distinct vehicleassigned) as "No of Vehicles Assigned",count(distinct driver) as "No of Drivers",
dho_approved_stat(\''.$distcode.'\',fmonth) as "DHO Approval Status"
from (select a.facode,b.fmonth, a.visitplanid,a.visitdate,a.vehicleassigned,a.driver from visit_plan_visits as a inner join visit_plan_header as b
on a.visitplanid=b.id where '.$wc.') as e', FALSE);//,dg_approved_stat(\''.$distcode.'\',fmonth) as "DG Approval Status"
}
$this->db->order_by("fmonth","DESC");
$this->db->group_by("fmonth");
$records = $this->db->get()->result_array();
return $records;
}
//=============List all records function ends=============//
//=============get all data for given plan id function starts=============//
public function get_plan_info($id)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$wc = array();
$wc["id"] = $id;
if($ulevel=='3' && $utype=='DEO')
{
$wc["supervisorid"] = $this -> session -> id;
}
if($ulevel=='3' && ($utype=='Manager' || $utype=='Executive'))
{
$wc["distcode"] = $this -> session -> distcode;
}
if($ulevel=='2')
{
$wc["procode"] = $this -> session -> procode;
if($this -> session -> ptype=='all'){
//unset($wc["ptype"]);
}else{
$wc["vph.ptype"] = $this -> session -> ptype;
}
}
if($wc=="")
redirect(base_url());
$ptype = $this -> session -> ptype;
if($ulevel == '2' && $utype=="Executive"){
$this->db->select('vph.id,vph.supervisorid,vph.supervisor,getdesigid(vph.supervisorid) as designationid,vph.postingPlace,vph.distcode,vph.fmonth,
vph.ptype,vph.fieldvisitsplanned,dg_approved_stat(vph.distcode,vph.fmonth) as status,vph.plandate', FALSE);//ya approve status ko set nahi kia abhi
}
else if($ulevel == '2'){
$this->db->select('vph.id,vph.supervisorid,vph.supervisor,getdesigid(vph.supervisorid) as designationid,vph.postingPlace,vph.distcode,vph.fmonth,
vph.ptype,vph.fieldvisitsplanned,pd_approve_status(vph.fmonth,\''.$ptype.'\') as status,vph.plandate', FALSE);
}
else{
$this->db->select('vph.id,vph.supervisorid,vph.supervisor,getdesigid(vph.supervisorid) as designationid,vph.postingPlace,vph.distcode,vph.fmonth,
vph.ptype,vph.fieldvisitsplanned,dho_approved_stat(vph.distcode,vph.fmonth) as status,vph.plandate', FALSE);
}
$this->db->where($wc);
$records = $this->db->get("visit_plan_header vph")->row_array();
//echo ($this->db->last_query());exit;
//print_r($records);exit;
$this->db->select('id,facilitytype(vpv.facode) as fatype,vpv.facode,vpv.visitdate,visitplanid,vpv.visitcategory,vpv.visit_confirmed,vpv.picture,vpv.latitude,vpv.longitude,vpv.date_confirmed, vpv.time_confirmed', FALSE);
$this->db->where("visitplanid",$id);
$records["visits"] = $this->db->get("visit_plan_visits vpv")->result_array();
foreach($records["visits"] as $key => $val)
{
$this->db->select('vpvc.id as vpvc_id,vpvc.checklistid,vpvc.hcptype_id,vpvc.hcp_value,getchecklisttablename(vpvc.checklistid) as chklsttable,chklst.tablename,chklst.shortname,chklst.file_name', FALSE);
$this->db->join('checklists chklst','chklst.id = vpvc.checklistid','INNER JOIN');
$this->db->where("visitplanvisitsid",$val["id"]);
$records["visits"][$key]["checklists"] = $this->db->get("visit_plan_visit_checklists vpvc")->result_array();
}
//print_r($records);exit;
return $records;
}
//=============get all data for given plan id function ends=============//
//=============List all records to get approval from dho function starts=============//
public function get_plans_for_dho_approval($fmonth=NULL,$distcode=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$wc = array();
if($ulevel=='3' && $utype=='DEO')
{
$wc["supervisorid"] = $this -> session -> id;
}
if($ulevel=='3' && ($utype=='Manager' || $utype=='Executive'))
{
$wc["distcode"] = $this -> session -> distcode;
}
if($ulevel=='2')
{
$wc["procode"] = $this -> session -> procode;
if($distcode)
{
$wc["distcode"] = $distcode;
}
}
if($fmonth){}else{$fmonth=date("Y-m");}
if($wc=="")
redirect(base_url());
$wc["vph.fmonth"] = $fmonth;
$this->db->select('vph.fmonth,
getdesigid(vph.supervisorid) as designationid,
vph.supervisor||\' (\'||getdesignation(getdesigid(vph.supervisorid))||\')\' as designation,
vpv.facode,
facilityname(vpv.facode) as facility,
facilitytype(vpv.facode) as fatype,
vpv.id as visitid,
vpv.visitplanid,
vpv.visitdate,
vpv.vehicleassigned as vehicle,
vpv.driver as driver', FALSE);
$this->db->from("visit_plan_visits vpv");
$this->db->join("visit_plan_header vph","vph.id = vpv.visitplanid","INNER");
$this->db->where($wc);
$this->db->order_by("vpv.facode","ASC");
$this->db->order_by("vpv.visitdate","ASC");
$this->db->order_by("designationid","ASC");
$query = $this->db->get();
$num = $query->num_rows();
$records = "";
if($num > 0)
$records = $query->result_array();
//echo $this->db->last_query();exit;
return $records;
}
//=============List all records to get approval from dho function ends=============//
//=============List all records to get approval from pd function starts=============//
public function get_plans_for_pd_approval($fmonth=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = array();
//$wc["supervisorid"] = $this -> session -> id;
$wc["procode"] = $this -> session -> procode;
if($fmonth){}else{$fmonth=date("Y-m");}
if($wc=="")
redirect(base_url());
$wc["vph.fmonth"] = $fmonth;
$wc["vph.ptype"] = $ptype;
$this -> db -> select('id');
$this->db->from("users");
$this->db->where("level","2");
$query = $this->db->get()->result_array();
$res = array();
foreach($query as $key => $val){
$res[] = $val['id'];
}

$this->db->select('vph.fmonth,
getdesigid(vph.supervisorid) as designationid,
vph.supervisor||\' (\'||getdesignation(getdesigid(vph.supervisorid))||\')\' as designation,
vpv.facode,
facilityname(vpv.facode) as facility,
facilitytype(vpv.facode) as fatype,
vpv.id as visitid,
vpv.visitplanid,
vpv.visitdate,
vpv.vehicleassigned as vehicle,
vpv.driver as driver', FALSE);
$this->db->from("visit_plan_visits vpv");
$this->db->join("visit_plan_header vph","vph.id = vpv.visitplanid","INNER");
$this->db->where($wc);
$this->db->where_in('vph.supervisorid',$res );
$this->db->order_by("vpv.facode","ASC");
$this->db->order_by("designationid","ASC");
$this->db->order_by("vpv.visitdate","ASC");
$query = $this->db->get();
$num = $query->num_rows();
$records = "";
if($num > 0)
$records = $query->result_array();
return $records;
}
//=============List all records to get approval from pd function ends=============//
//=============List all records to get approval from dg function starts=============//
public function get_plans_for_dg_approval($fmonth=NULL)
{
if($fmonth){}else{$fmonth=date("Y-m");}
$ptype=$this -> session -> ptype;
if($ptype == 'all'){
$ptype = '';
}else{
$ptype = " and b.ptype = '$ptype' ";
}
$query = $this->db->query('select distcode as "District Code",case when distcode<>\'all\' then districtname else \'DG Office\' end as "District/Program Name", TO_CHAR((\''.$fmonth.'\' || \'-01\')::Date,\'Mon YYYY\') as "Year-Month" ,
count(distinct supervisorid) as "No of Supervisor (Have Plan)",
count(distinct visitdate) as "No of Days in Plan", count(distinct facode) as "No of HF to be Visited",
get_dist_hf_visited_count (distcode,\''.$fmonth.'\') as "No of Facilities Visited",
get_dist_chklst_count (distcode,\''.$fmonth.'\') as "No of Planned Checklists",
get_dist_filled_chklst_count(distcode,\''.$fmonth.'\') as "No of Filled Checklists",
count(distinct vehicleassigned) as "No of Vehicles Assigned",
count(distinct driver) as "No of Drivers",
dho_approved_stat(distcode,\''.$fmonth.'\') as "DHO Approval Status"
from (select case when distcode<>\'\' then b.distcode else b.ptype end as distcode, case when distcode<>\'\' then
districtname(b.distcode) else getprogram(b.ptype) end as districtname, a.id, a.facode, a.visitplanid,
a.visitdate,b.supervisorid,a.vehicleassigned,a.driver from visit_plan_visits as a inner join visit_plan_header as b on a.visitplanid=b.id inner join designations as c
on getdesigid(b.supervisorid)=c.id where b.fmonth=\''.$fmonth.'\' '.$ptype.' order by a.facode, c.designation, a.visitdate) as e
group by distcode,districtname order by distcode', FALSE);
//,dg_approved_stat(distcode,\''.$fmonth.'\') as "DG Approval Status"
$num = $query->num_rows();
$records = "";
if($num > 0)
$records = $query->result_array();
return $records;
}
//=============List all records to get approval from dho function ends=============//
//=============List all targets for selected checklist id function starts=============//
public function getchklst_targets($chklstId,$ptype=NULL)
{
$ptypeClause = "";
if($ptype)
$ptypeClause = " and ptype = '".$ptype."'";
$query = $this->db->query("select hcp.*,ct.hcptype_id,ct.ptype,ct.displaytitle from hcptypes hcp INNER JOIN checklists_targets ct on ct.hcptype_id = hcp.id where ct.checklist_id = $chklstId $ptypeClause", FALSE);
$num = $query->num_rows();
$records = "";
if($num > 0)
$records = $query->result_array();
return $records;
}
//=============List all targets for selected checklist id function ends=============//
//=============List all targets for selected hcptype: cmw function starts=============//
public function gettarget_cmws($facode=NULL)
{
$ulevel = $this -> session -> userLevel;
$wc = array();
if($ulevel=='3')
{
$wc["distcode"] = $this -> session -> distcode;
}
if($ulevel=='2')
{
$wc["procode"] = $this -> session -> procode;
}
if($facode)
{
$wc["facode"] = $facode;
}
$wc["cmw_left"] = "0";
$wc["deployment_date !="] = NULL;//
$this->db->select("cmwcode as code,cmw_name as name", FALSE);
$this->db->from("cmwdb");
$this->db->where($wc);
$records = $this->db->get()->result_array();
return $records;
}
//=============List all targets for selected hcptype: cmw function ends=============//
//=============List all targets for selected hcptype: lhw function starts=============//
public function gettarget_lhws($facode=NULL)
{
$ulevel = $this -> session -> userLevel;
$wc = array();
if($ulevel=='3')
{
$wc["distcode"] = $this -> session -> distcode;
}
if($ulevel=='2')
{
$wc["procode"] = $this -> session -> procode;
}
if($facode)
{
$wc["facode"] = $facode;
}
$wc["status"] = "Active";
$this->db->select("lhwcode as code,lhwname as name", FALSE);
$this->db->from("lhwdb");
$this->db->where($wc);
$records = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
return $records;
}
//=============List all targets for selected hcptype: lhw function ends=============//
//=============List all targets for selected hcptype: lhs function starts=============//
public function gettarget_lhs($facode=NULL)
{
$ulevel = $this -> session -> userLevel;
$wc = array();
if($ulevel=='3')
{
$wc["distcode"] = $this -> session -> distcode;
}
if($ulevel=='2')
{
$wc["procode"] = $this -> session -> procode;
}
if($facode)
{
$wc["facode"] = $facode;
}
$wc["status"] = "Active";
$this->db->select("lhscode as code,lhsname as name", FALSE);
$this->db->from("lhsdb");
$this->db->where($wc);
$records = $this->db->get()->result_array();
return $records;
}
public function get_plan_approval($fmonth){
$ptype = $this -> session -> ptype;
if($this -> session -> userLevel == '2'){
$wc = array(
'ptype' => $ptype,
'fmonth' => $fmonth
);
$this -> db -> select('id');
$this -> db -> from('pro_visit_plan_approval');
}else{
$wc = array(
'distcode' => $this -> session -> distcode,
'fmonth' => $fmonth
);
$this -> db -> select('id');
$this -> db -> from('visit_plan_approval');
}
$this -> db -> where($wc);
$id = $this -> db -> get() -> result_array();
return $id;
}
//=============List all targets for selected hcptype: lhs function ends=============//
//=============List all emails for ids in parameter: function start=============//
public function get_emails_list($wherein)
{
//array of ids $wherein
return $this -> db -> select('id,email,fullname,getdesignation(designation) as designation') -> from('users') ->where_in('id',$wherein) ->get() -> result_array();
}
//=============List all emails for ids in parameter: function ends=============//
//=============count all visits for given parameters: function start=============//
public function count_facility_visits($facode,$visitdate,$visitplanid=NULL)
{
$this->db->where("facode",$facode);
$this->db->where("visitdate",$visitdate);
if($visitplanid){
$this->db->where("(visitplanid != '".$visitplanid."')");
}
$records = $this->db->get("visit_plan_visits");
return $records->num_rows();
}
//=============count all visits for given parameters: function ends=============//
} //class ends
?>