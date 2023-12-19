<?php
class Trend_model extends CI_Model {
//=============List all records function starts=============//
public function get_periodical_data($freq='monthly',$year=NULL,$distcode=NULL,$ptype=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= ($ptype)?$ptype:$this -> session -> ptype;
$wc = "vph.id > 0";
$fmnthparm = "";
$groupby = "vph.fmonth";
if(!$year){
$year = date("Y");
}
if($freq=='monthly'){
$fmnthparm = "vph.fmonth";
$wc .= " and vph.fmonth like '$year-%' ";
}else{
//incase if fiscal or annual work needed
}
if($ulevel=='2' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
if($utype == 'ProExecutive'){
$this->db->select("vph.fmonth,
count(distinct vpv.visitplanid) as plans,
count(distinct vpv.id) as visits,
get_held_visits_count($fmnthparm,'0',0,'".$ptype1."') as visitsheld,
count(vpvc.id) as checklists,
get_prgrm_filled_chklst_count('0',$fmnthparm,'".$ptype."') as filled,
count(distinct vpv.facode) as hfplanned,
get_prgrm_hf_visited_count('0',$fmnthparm,'".$ptype."') as hfvisited,
get_prgrm_visits_confirmed_count('0',$fmnthparm,'".$ptype."') as confirmed from
visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc." group by $groupby order by vph.fmonth",FALSE);
}else{
$this->db->select("vph.fmonth,
count(distinct vpv.visitplanid) as plans,
count(distinct vpv.id) as visits,
get_held_visits_count($fmnthparm,'0',0,'".$ptype1."') as visitsheld,
count(distinct vpvc.id) as checklists,
get_prgrm_filled_chklst_count('0',$fmnthparm,'".$ptype."') as filled,
count(distinct vpv.facode) as hfplanned,
get_prgrm_hf_visited_count('0',$fmnthparm,'".$ptype."') as hfvisited,
get_prgrm_visits_confirmed_count('0',$fmnthparm,'".$ptype."') as confirmed
from visit_plan_visit_checklists as vpvc
inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc." group by $groupby order by vph.fmonth",FALSE);
}
}else{
if($distcode===0){
$wc .= " and vph.distcode IS NULL ";
}else{
$distcode = ($distcode>0)?$distcode:$this -> session -> distcode;
$wc .= " and vph.distcode = '$distcode'";
}
if($ulevel=='3' && $utype=='DEO')
{
$wc .= " and vph.supervisorid = '".$this -> session -> id."'";
}
if($ptype!='all'){
$wc .= " and vph.ptype = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$groupby .= ",vph.distcode";
$this->db->select("vph.fmonth,
count(distinct vpv.visitplanid) as plans,
count(distinct vpv.id) as visits,
get_held_visits_count($fmnthparm,'$distcode',0,'".$ptype1."') as visitsheld,
count(distinct vpvc.id) as checklists,
get_prgrm_filled_chklst_count('$distcode',$fmnthparm,'".$ptype."') as filled,
count(distinct vpv.facode) as hfplanned,
get_prgrm_hf_visited_count('$distcode',$fmnthparm,'".$ptype."') as hfvisited,
get_prgrm_visits_confirmed_count('$distcode',$fmnthparm,'".$ptype."') as confirmed
from visit_plan_visit_checklists as vpvc
inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc." group by $groupby order by vph.fmonth",FALSE);
}
$records = $this->db->get()->result_array();
return $records;
}
//=============List all records function ends=============//
public function get_lqas_data($year=NULL,$distcode=NULL)
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
if(!$year){
$year = date("Y");
}
$wc = "vph.id > 0 and vph.fmonth like '$year-%' and vpvc.checklistid = 20";
if($ulevel=='2' && is_null($distcode)){
}else{
if($distcode===0){
$wc .= " and vph.distcode IS NULL ";
}else{
$distcode = ($distcode>0)?$distcode:$this -> session -> distcode;
$wc .= " and vph.distcode = '$distcode'";
}
}
if($ulevel=='3' && $utype=='DEO')
{
$wc .= " and vph.supervisorid = '".$this -> session -> id."'";
}
if($ptype!='all'){
$wc .= " and vph.ptype = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$this->db->select("vph.fmonth,
vph.distcode,
districtname(vph.distcode) as district,
(select report_name from checklists_targets trg where trg.checklist_id = vpvc.checklistid and trg.ptype = vph.ptype) as ptype,
count(vpvc.id) as planned,
count(da_lqas.id) as filled
from da_lqas FULL join visit_plan_visit_checklists vpvc
on da_lqas.vpvc_id = vpvc.id join visit_plan_visits vpv
on vpvc.visitplanvisitsid=vpv.id join visit_plan_header vph
on vpv.visitplanid=vph.id where ".$wc." group by
vph.fmonth,vph.ptype,vph.distcode,vpvc.checklistid order by vph.fmonth,vph.ptype,vph.distcode",FALSE);
$records = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
return $records;
}
} //class ends
?>