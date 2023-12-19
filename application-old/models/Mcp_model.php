<?php
class Mcp_model extends CI_Model {
//=============List all mcp records function starts=============//
public function get_llin_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
supervisor_name as "Supervisor", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("mcp_llin")->result_array();
return $records;
}
//=============List irs records function starts=============//
public function get_irs_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
supervisor_name as "Supervisor", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("mcp_irs")->result_array();
return $records;
}
//=============List all mc records function starts=============//
public function get_mc_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
supervisor_name as "Supervisor", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("mcp_mc")->result_array();
return $records;
}
//=============List all rdt records function starts=============//
public function get_rdt_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
supervisor_name as "Supervisor", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("mcp_rdt")->result_array();
return $records;
}
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
$this->db->or_like("LOWER(facilityname(facode))",strtolower($like));
$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
$this->db->or_like("fmonth",$like);
}
$query = $this->db->get();
return $rowcount = $query->num_rows();
}
//================== get previous vpvcid==================//
public function get_previous($table=NULL,$wc,$checklistid=0,$facode=null,$dov=NULL,$hcptype_id=NULL,$sba_name=NULL)
{
$date=isset($wc['dov']) ? "dov" : ($wc['dov'] ? "dov" :"");

$query="select distinct($table.vpvc_id),$date, fmonth from $table ";
$query.=" join visit_plan_visit_checklists on visit_plan_visit_checklists.checklistid=".$wc['checklistid']." AND visit_plan_visit_checklists.hcptype_id=".$wc['hcptype_id'] ;
$query.="where facode='".$wc['facode']."'";
// $query="select distinct($table.*) from $table ";
// $query.=" join visit_plan_visit_checklists on visit_plan_visit_checklists.checklistid=$checklistid AND visit_plan_visit_checklists.hcptype_id=$hcptype_id  " ;
// $query.="where facode='$facode'";
//$query.=" AND submitted_by=".$this -> session -> id;
// if($sba_name ){
// 	$query.=" AND sba_name='".$sba_name."'";
// }
if($wc && isset($wc['sba_name'])){
$query.=" AND sba_name='".$wc['sba_name']."'";
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
//================== end get_previous ==================//
}
?>