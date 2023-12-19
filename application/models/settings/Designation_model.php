<?php 
class Designation_model extends CI_Model {
	//=============List all records function starts=============//
	function get_designations($limit=null, $start=1, $where=NULL, $like=NULL)
	{
		$this->db->from("designations");
		//$this->db->join("designations","designations.ptype=programs.ptype");
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
		$this->db->select('id,designation,shortname,case when level=\'2\' then \'Province\' else \'District\' end as "Level",getprogram(ptype) as "Program",displayname', FALSE);
		$records = $this->db->get()->result_array();
		return $records;
	}
	//=============List all records function ends=============//
	//================== Get Table's Count Function start ============================//
	public function count_designations($where=NULL,$like=NULL)//$where is an array
	{		
		$this->db->from("designations");
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