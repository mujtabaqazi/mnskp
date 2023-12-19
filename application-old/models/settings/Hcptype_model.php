<?php
class Hcptype_model extends CI_Model {
//=============List all records function starts=============//
function get_hcptypes($limit=null, $start=1, $where=NULL, $like=NULL)
{
$this->db->from("hcptypes");
if(($where) && (count($where)>0))
{
$this->db->where($where);
}
if($like)
{

}
if($limit){
$this->db->limit($limit, $start);
}
$this->db->select('id,name,entry_type as "Data Entry Type",displayname as "Display Name",tablename as "Table"', FALSE);
$records = $this->db->get()->result_array();
return $records;
}
//=============List all records function ends=============//
//================== Get Table's Count Function start ============================//
public function count_hcptypes($where=NULL,$like=NULL)//$where is an array
{
$this->db->from("hcptypes");
$distcode = $this -> session -> distcode;
if(($where) && (count($where)>0))
{
$this->db->where($where);
}
if($like)
{
}
$query = $this->db->get();
return $rowcount = $query->num_rows();
}
//================== Table's Count Function ends ============================//
} //class ends
?>