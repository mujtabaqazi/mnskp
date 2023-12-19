<?php
class Nutrition_model extends CI_Model {
//=============List all stabilization records function starts=============//
public function get_stabilization_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
$this->db->order_by("id","DESC");
if($limit){
$this->db->limit($limit, $start);
}
$records = $this->db->get("nutrition_stabilization")->result_array();
return $records;
}
//=============List all iycf records function starts=============//
public function get_iycf_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
$records = $this->db->get("nutrition_iycf")->result_array();
return $records;
}
//=============List all warehouse records function starts=============//
public function get_warehouse_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
$records = $this->db->get("nutrition_warehouse")->result_array();
return $records;
}
//=============List all smc records function starts=============//
public function get_smc_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
$records = $this->db->get("nutrition_smc")->result_array();
return $records;
}
//=============List all mmhf records function starts=============//
public function get_mmhf_list($where = NULL, $like = NULL,$limit=null, $start=1) {
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
$records = $this->db->get("nutrition_mmhf")->result_array();
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
//================== end get_previous ==================//
}