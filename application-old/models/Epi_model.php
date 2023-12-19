<?php
class Epi_model extends CI_Model {
//=============List all activities records function starts=============//
public function get_activities($where=NULL,$like=NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$this->db->select('id,facode,facilityname(facode) as "Facility Name",fatype as "HF Type",districtname(distcode) as "District",tehsilname(tcode) as "Tehsil",unname(uncode) as "Union Council",supervisor_name as "Monitor",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit",vpvc_id');
if(($where) && (count($where)>0))
{
$this->db->where($where);
}
if($like)
{
$this->db->like("facode",$like);
//$this->db->or_like("name_desg",$like);
//$this->db->or_like("dov",$like);
}
//$this->db->group_by($groupby);
$this->db->order_by("id","DESC");
if($limit){
$this->db->limit($limit, $start);
}
$records = $this->db->get("epi_activities")->result_array();
return $records;
}
//=============List all activities records function ends=============//
//=============List all monitoring records function starts=============//
public function get_monitoring($where=NULL,$like=NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$this->db->select('id,facode,facilityname(facode) as "Facility Name",fatype as "HF Type",districtname(distcode) as "District",tehsilname(tcode) as "Tehsil",unname(uncode) as "Union Council",supervisor_name as "Monitor",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit",vpvc_id');
if(($where) && (count($where)>0))
{
$this->db->where($where);
}
if($like)
{
$this->db->like("facode",$like);
//$this->db->or_like("name_desg",$like);
//$this->db->or_like("dov",$like);
}
//$this->db->group_by($groupby);
$this->db->order_by("id","DESC");
if($limit){
$this->db->limit($limit, $start);
}
$records = $this->db->get("epi_monitoring")->result_array();
return $records;
}
//=============List all records function ends=============//
//================== dropdown Supervisor starts==================//
public function supervisor_dropdown($table="epi_monitoring")
{
$this->db->select('DISTINCT(supervisor_name) as "supervisor"');
$this->db->where("submitted_by",$this -> session -> id);
$records=$this->db->get($table);
$data=array();
foreach($records->result() as $row)
{
$data[$row->supervisor] = $row->supervisor;
}
return ($data);
}
//================== dropdown Supervisor ends==================//
//================== get_previous =============================//
public function get_previous($table='lhw_lhw',$wc,$checklistid=0,$facode=null,$dov=NULL,$hcptype_id=NULL,$lhwcode=NULL,$lhscode=NULL){
// which date ll be selected
$date=isset($wc['dov']) ? "dov" : ($wc['dov'] ? "dov" :"");

$query="select distinct($table.vpvc_id),$date, fmonth from $table ";
$query.=" join visit_plan_visit_checklists on visit_plan_visit_checklists.checklistid=".$wc['checklistid']." AND visit_plan_visit_checklists.hcptype_id=".$wc['hcptype_id'] ;
if($wc && isset($wc['facode'])){
$query.="where facode='".$wc['facode']."'";
}
if($wc && isset($wc['distcode'])){
$query.="where distcode='".$wc['distcode']."'";
}

//$query.=" AND submitted_by=".$this -> session -> id;
if($wc && isset($wc['lhwcode'])){
$query.=" AND lhwcode='".$wc['lhwcode']."'";
}
if($wc && isset($wc['lhscode'])){
$query.=" AND lhscode='".$wc['lhscode']."'";
}
if($wc && isset($wc['dov'])){
$query.=" AND dov <'".$wc['dov']."' ";
$query.=" ORDER BY dov DESC ";
}
//echo $query;
$sql=$this->db->query($query);
$result=$sql->result_array();
return $result;
}
//================== get previous ends=========================//
//================== Get table Count  ============================//
public function count_record($table,$where=NULL,$like=NULL)//$where is an array
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
$this->db->from($table);
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$where["getsupervisoridfromvpvcid(vpvc_id)"] = $this -> session -> id;
if(($where) && (count($where)>0))
{
if(array_key_exists("year",$where) && array_key_exists("month",$where))
{
$where["fmonth"]=$where["year"]."-".$where["month"];
}else if(array_key_exists("year",$where))
{
$fmonth=$where["year"]."-";
$this->db->like("fmonth",$fmonth);
}else if(array_key_exists("month",$where))
{
$fmonth="-".$where["month"];
$this->db->like("fmonth",$fmonth);
}
unset($where["year"]);unset($where["month"]);
$this->db->where($where);
}
if($like)
{
$this->db->like("LOWER(districtname(distcode))",strtolower($like));
$this->db->or_like("LOWER(facilityname(facode))",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
$this->db->or_like("fmonth",$like);
}
$query = $this->db->get();
return $rowcount = $query->num_rows();
}

//================== Table Count ends ============================//



} //class ends
?>