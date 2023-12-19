<?php
class Mnch_model extends CI_Model {
//=============List all mmschool records function starts=============//
public function get_mmschool_list($where = NULL, $like = NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$where["getsupervisoridfromvpvcid(vpvc_id)"] = $this -> session -> id;
$this->db->select('id,distcode,districtname(distcode) as "District",TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Reporting Month",facode ,facilityname(facode) as "Facility Name",supervisor_name as "Supervisor",
supervisor_desg as "Supervisor designation",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');//TO_CHAR(dov,\'DD-MM-YYYY\')
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
$this->db->like("distcode",$like);
$this->db->or_like("facode",$like);
$this->db->like("LOWER(districtname(distcode))",strtolower($like));
$this->db->or_like("LOWER(facilityname(facode))",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
}
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("mnch_mmschool")->result_array();
return $records;
}
//=============List all mmschool records function ends=============//
//=============List all smschool records function starts=============//
public function get_smschool_list($where = NULL, $like = NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$where["getsupervisoridfromvpvcid(vpvc_id)"] = $this -> session -> id;
$this->db->select('id,distcode,districtname(distcode) as "District",TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Reporting Month",facode ,facilityname(facode) as "Facility Name",supervisor_name as "Supervisor",
supervisor_desg as "Supervisor designation",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');//TO_CHAR(dov,\'DD-MM-YYYY\')
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
$this->db->like("distcode",$like);
$this->db->or_like("facode",$like);
$this->db->like("LOWER(districtname(distcode))",strtolower($like));
$this->db->or_like("LOWER(facilityname(facode))",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
}
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("mnch_smschool")->result_array();
return $records;
}
//=============List all tmc records function starts=============//
public function get_tmc_list($where = NULL, $like = NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$where["getsupervisoridfromvpvcid(vpvc_id)"] = $this -> session -> id;
$this->db->select('id,distcode,districtname(distcode) as "District", facilityname(facode) as "Facility Name",cmwcode as "CMW Code",cmwname(cmwcode) as "CMW Name",
TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Reporting Month",supervisor_name as "Supervisor",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$this->db->or_like("facilityname(facode)",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
$this->db->or_like("fmonth",$like);
}
$this->db->order_by("id","DESC");
if($limit){
$this->db->limit($limit, $start);
}
$records = $this->db->get("mnch_tmc")->result_array();
return $records;
}
//=============List all tmc records function ends=============//
//=============List all asc records function starts=============//
public function get_asc_list($where = NULL, $like = NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$where["getsupervisoridfromvpvcid(vpvc_id)"] = $this -> session -> id;
$this->db->select('id,distcode,districtname(distcode) as "District", facilityname(facode) as "Facility Name",cmwcode as "CMW Code",
cmwname(cmwcode) as "CMW Name",TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Reporting Month",supervisor_name as "Supervisor",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$this->db->or_like("facilityname(facode)",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
$this->db->or_like("fmonth",$like);
}
$this->db->order_by("id","DESC");
if($limit){
$this->db->limit($limit, $start);
}
$records = $this->db->get("mnch_asc")->result_array();
return $records;
}
//=============List all asc records function ends=============//
//=============List all emonc records function starts=============//
public function get_emonc_list($where = NULL, $like = NULL,$limit=null, $start=1)
{
if(!is_array($where) ){
$where = array();
}
$distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
}
$where["getsupervisoridfromvpvcid(vpvc_id)"] = $this -> session -> id;
$this->db->select('id,distcode,districtname(distcode) as "District", facilityname(facode) as "Facility Name",TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Reporting Month",
supervisor_name as "Supervisor",managed_by as "Managed By", hf_incharge as "Facility Incharge", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$this->db->or_like("facilityname(facode)",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
$this->db->or_like("fmonth",$like);
}
$this->db->order_by("id","DESC");
if($limit){
$this->db->limit($limit, $start);
}
$records = $this->db->get("mnch_emonc")->result_array();
return $records;
}
//=============List all asc records function ends=============//
//================== dropdown Supervisor starts==================//
public function supervisor_dropdown($table="mnch_mmschool")
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
//------------------count table record--------------------------------------------//
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
$this->db->or_like("facilityname(facode)",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
$this->db->or_like("fmonth",$like);
}
$query = $this->db->get();
return $rowcount = $query->num_rows();
}
public function get_previous($table=NULL,$wc=NULL)
{
$date=isset($wc['lqas_date']) ? "lqas_date" : ($wc['dov'] ? "dov" :"");

$query="select distinct($table.vpvc_id),$date, fmonth from $table ";
$query.=" join visit_plan_visit_checklists on visit_plan_visit_checklists.checklistid=".$wc['checklistid']." AND visit_plan_visit_checklists.hcptype_id=".$wc['hcptype_id'] ;
$query.="where facode='".$wc['facode']."'";
//$query.=" AND submitted_by=".$this -> session -> id;
if($wc && isset($wc['cmwcode']) ){
$query.=" AND cmwcode ='".$wc['cmwcode']."' ";
}
if($wc && isset($wc['dov']) ){
$query.=" AND dov <'".$wc['dov']."' ";
$query.=" ORDER BY dov DESC ";
}
//echo $query;
$sql=$this->db->query($query);
$result=$sql->result_array();
return $result;
}
//================== end get_previous ==================//
} //class ends
?>