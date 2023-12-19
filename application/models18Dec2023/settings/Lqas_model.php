<?php 
class Lqas_model extends CI_Model {
	//=============List all records function starts=============//
	function get_lqas($limit=null, $start=0, $where=NULL, $like=NULL)
	{
		$this->db->from("da_lqas_pool");
		$this->db->join("programs","da_lqas_pool.ptype=programs.ptype");
		//$this->db->join("usersdistricts","usersdistricts.userid=users.id","FULL OUTER");
		//$this->db->where("designations.designation != 'Super Admin'");
		/* $distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		} */
		if(($where) && (count($where)>0))
		{
			if(isset($where["ptype"])){
				$where["da_lqas_pool.ptype"] = $where["ptype"];
				unset($where["ptype"]);
			}
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
		$this->db->select('da_lqas_pool.id,description as "Data Element",mis_col as "MIS Field",programs.pname as "Program",register, 
			case when Programs.ptype = \'all\' Then
			case when isphc = \'1\' Then \'PHC,\' ELSE \'\' END || 
			case when isrhc = \'1\' Then \'RHC,\' ELSE \'\' END ||
			case when isshc = \'1\' Then \'SHC\' ELSE \'\' END
			ELSE \'\' END as "Apply on" ', FALSE);
		$records = $this->db->get()->result_array();
		return $records;
	} 
	//=============List all records function ends=============//
		//================== Get Table's Count Function start ============================//
	public function count_lqas($where=NULL,$like=NULL)//$where is an array
	{		
		$this->db->from("da_lqas_pool");
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