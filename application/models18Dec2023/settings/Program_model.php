<?php 
class Program_model extends CI_Model {
	//=============List all records function starts=============//
	function get_programs($limit=null, $start=1, $where=NULL, $like=NULL)
	{
		$this->db->from("programs");
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
		$this->db->select('ptype as "Program Type",case when pname = \'\' then \'DG/DHO Office\' else pname end as Program,
		get_users_count(\'2\',\'\',ptype,\'\') as "No of Provincial Supervisors",
		get_users_count(\'3\',\'\',ptype,\'\') as "No of District Supervisors",
		(select count(checklists_targets.id) from checklists 
		join  checklists_targets on checklists_targets.checklist_id=checklists.id
		where checklists_targets.ptype = programs.ptype) as "No of Checklists Associated"
		', FALSE);
		$records = $this->db->get()->result_array();
		return $records;
	}
	/*
	(select count(*) from users join designations on designations.id=users.designation where users.level = \'2\' and status = \'1\' and designations.ptype = programs.ptype) as "No of Provincial Supervisors (Active)",
		(select count(*) from users join designations on designations.id=users.designation where users.level = \'3\' and status = \'1\' and designations.ptype = programs.ptype) as "No of District Supervisors (Active)"
	*/
	//=============List all records function ends=============//
	//================== Get Table's Count Function start ============================//
	public function count_programs($where=NULL,$like=NULL)//$where is an array
	{		
		$this->db->from("programs");
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