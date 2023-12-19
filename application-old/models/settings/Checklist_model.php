<?php
class Checklist_model extends CI_Model {
//=============List all records function starts=============//
function get_checklists($limit=null, $start=1, $where=NULL, $like=NULL)
{
$this->db->from("checklists chklst");
//$this->db->join("checklists_targets chktrg","chktrg.checklist_id = chklst.id","FULL OUTER");
//$this->db->join("usersdistricts","usersdistricts.userid=users.id","FULL OUTER");
//$this->db->where("designations.designation != 'Super Admin'");
/* $distcode = $this -> session -> distcode;
if($distcode > 0)
{
$where["distcode"] = $distcode;
} */
if(($where) && (count($where)>0))
{
$this->db->where($where);
}
if($like)
{
/* $this->db->like("LOWER(username)",strtolower($like));
$this->db->or_like("LOWER(fullname)",strtolower($like));
$this->db->or_like("LOWER(email)",strtolower($like));
$this->db->or_like("LOWER(phone)",strtolower($like)); */
}
if($limit){
$this->db->limit($limit, $start);
}
$this->db->select('chklst.id,chklst.name,getprogram(chklst.ptype) as "Program",case when chklst.fatypelevel=\'2\' then \'Province\' when fatypelevel = \'4\' then \'CMW School\' else \'District\' end as "Facility Type Level",(select array_to_string(array_agg(distinct displaytitle), \', \') from checklists_targets chktrg where chktrg.checklist_id = chklst.id) as Targets,chklst.purpose,chklst.interval
', FALSE);
//$this->db->group_by("chklst.id");
$records = $this->db->get()->result_array();
return $records;
}
//=============List all records function ends=============//
//================== Get Table's Count Function start ============================//
public function count_checklists($where=NULL,$like=NULL)//$where is an array
{
$this->db->from("checklists");
$distcode = $this -> session -> distcode;
if(($where) && (count($where)>0))
{
$this->db->where($where);
}
if($like)
{
/* $this->db->like("LOWER(username)",strtolower($like));
$this->db->or_like("LOWER(fullname)",strtolower($like));
$this->db->or_like("LOWER(email)",strtolower($like));
$this->db->or_like("LOWER(phone)",strtolower($like)); */
}
$query = $this->db->get();
return $rowcount = $query->num_rows();
}
//================== Table's Count Function ends ============================//
} //class ends
?>