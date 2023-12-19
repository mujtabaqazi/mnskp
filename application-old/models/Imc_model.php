<?php
class Imc_model extends CI_Model {

//=============List all gois records function starts=============//
public function get_gois_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
$this->db->select('id,distcode,districtname(distcode) as "District",tehsilname(tcode) as "Tehsil",unname(uncode) as "Unioncouncil", facilityname(facode) as "Facility Name",
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
$records = $this->db->get("imc_gois")->result_array();
return $records;
}
//=============List all gois records function ends=============//
//=============List all mnch records function starts=============//
public function get_mnch_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_mnch")->result_array();
return $records;
}
//=============List all mnch records function ends=============//
//=============List all sba records function starts=============//
public function get_sba_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
$this->db->select('id,distcode,districtname(distcode) as "District", facilityname(facode) as "Facility Name",sba_name as "SBA Name",sba_desg as "SBA Designation",
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
$records = $this->db->get("imc_sba")->result_array();
return $records;
}
//=============List all sba records function ends=============//
//=============List all nutrition records function starts=============//
public function get_nutrition_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_nutrition")->result_array();
return $records;
}
//=============List all nutrition records function ends=============//
//=============List all epi records function starts=============//
public function get_epi_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_epi")->result_array();
return $records;
}
//=============List all epi records function ends=============//
//=============List all fp records function starts=============//
public function get_fp_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_fp")->result_array();
return $records;
}
//=============List all fp records function ends=============//
//=============List all lhw records function starts=============//
public function get_lhw_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_lhw")->result_array();
return $records;
}
//=============List all lhw records function ends=============//
//===========List all malaria records function starts==========//
public function get_malaria_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_malaria")->result_array();
return $records;
}
//=============List all malaria records function ends=============//
//==============List all tbc records function starts==============//
public function get_tbc_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
$records = $this->db->get("imc_tbc")->result_array();
return $records;
}
//===============List all tbc records function ends==============//
//==============List all hepatitis records function starts==============//
public function get_hepatitis_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_hepatitis")->result_array();
return $records;
}
//===============List all hepatitis records function ends==============//
//==============List all hivaid records function starts==============//
public function get_hivaid_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_hivaid")->result_array();
return $records;
}
//===============List all hivaid records function ends==============//
//==============List all opd records function starts==============//
public function get_opd_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_opd")->result_array();
return $records;
}
//===============List all opd records function ends==============//
//==============List all indoor records function starts==============//
public function get_indoor_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_indoor")->result_array();
return $records;
}
//===============List all indoor records function ends==============//
//==============List all labourroom records function starts==============//
public function get_labourroom_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_labourroom")->result_array();
return $records;
}
//===============List all labourroom records function ends==============//
//==============List all ot records function starts==============//
public function get_ot_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_ot")->result_array();
return $records;
}
//===============List all ot records function ends==============//
//==============List all rls records function starts==============//
public function get_rls_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_rls")->result_array();
return $records;
}
//===============List all rls records function ends==============//
//==============List all soi records function starts==============//
public function get_soi_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_soi")->result_array();
return $records;
}
//===============List all soi records function ends==============//
//==============List all medicine records function starts==============//
public function get_medicine_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_medicine")->result_array();
return $records;
}
//===============List all medicine records function ends==============//
//==============List all hfstore records function starts==============//
public function get_hfstore_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_hfstore")->result_array();
return $records;
}
//===============List all hfstore records function ends==============//
//==============List all hr records function starts==============//
public function get_hr_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_hr")->result_array();
return $records;
}
//===============List all hr records function ends==============//
//==============List all staff records function starts==============//
public function get_staff_list($where=NULL,$like=NULL,$limit=null, $start=1)
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
supervisor_name as "Supervisor", supervisor_desg as "Supervisor Designation", TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
if($limit){
$this->db->limit($limit, $start);
}
$this->db->order_by("id","DESC");
$records = $this->db->get("imc_staff")->result_array();
return $records;
}
//===============List all staff records function ends==============//
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
//================== dropdown Supervisor starts==================//
public function supervisor_dropdown($table="imc_sba")
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
} //class ends
?>