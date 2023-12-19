<?php 
class Common_model extends CI_Model {
	/* function authentication()
	{
		if ($_SESSION["UserAuth"]!="Yes"){
			return 404;
			exit();
		}else if($_SESSION['expire'] >=time()){
			 	$timeout1 = $_SESSION['expire'] - time();
				$reset_time = round((3600 - $timeout1));
	  			$_SESSION['expire'] = time() + (60 * 120); 
		}else{
			return 404;
			exit();
		}		
	} */
	//================== dropdown Common starts==================//
	public function dropdown($table , $field,$where=NULL)
	{
		$this->db->select('*');
		if($where){
			$this->db->where($where);
		}
		$records=$this->db->get($table);
		$data=array();
		foreach($records->result() as $row)
		{
			$data[$row->id] = $row->$field;
		}
		return ($data);
	}
	//================== dropdown Common ends==================//
	//=============List all records function starts=============//
	public function fetchall($table, $arr=NULL, $range=NULL, $where=NULL, $groupby=NULL,$orderby=NULL,$like=NULL,$limit=NULL)
	{
		if($range){
			$this->db->select($range);
		}else{
			$this->db->select('*');
		}
		if($arr){
			$this->db->join($arr['table'], $table.'.'.$arr['id'].' = '.$arr['table'].'.'.'id');
		}
		if($where){
			$this->db->where($where);
		}
		if($groupby){
			$this->db->group_by($groupby);
		}
		if($orderby){
			$this->db->order_by($orderby['by'],$orderby['type']);
		}
		if($like){
			$this->db->like($like);
		}
		if($limit){
			$records = $this->db->get($table,$limit)->result_array();
		}else{
			$records = $this->db->get($table)->result_array();
		}
		//$records = $this->db->get($table)->result_array();
		return $records;
	}
	//=============List all records function ends=============//
	//============== Function to fetch a row starts===========//
	public function get_info($tablename, $id=NULL, $field=NULL,$range=NULL,$extrawhere=NULL){
		if($range){
			$this->db->select($range);
		}else{
			$this->db->select('*');
		}
		if($field){
			$this->db->where($field, $id);
		}else{
			if($id)
				$this->db->where('id', $id);
		}
		if($extrawhere){
			//array of extra where clauses
			$this->db->where($extrawhere);
		}
		$query = $this->db->get($tablename)->row();
		return $query;
	}
	//============== Function to fetch row ends===========//
	//============== Function to fetch a row array starts===========//
	public function get_info_array($tablename, $id=NULL, $field=NULL,$range=NULL,$extrawhere=NULL){
		if($range){
			$this->db->select($range);
		}else{
			$this->db->select('*');
		}
		if($field){
			$this->db->where($field, $id);
		}else{
			if($id)
				$this->db->where('id', $id);
		}
		if($extrawhere){
			//array of extra where clauses
			$this->db->where($extrawhere);
		}
		$query = $this->db->get($tablename)->row_array();
		return $query;
	}
	//============== Function to fetch row array ends===========//
	//=============getlocation function starts=============//
	public function get_by_limit($table,$limit,$start)
	{
		$records = $this->db->get($table,$limit,$start)->result_array();
		return $records;
	}
	//=============getlocation function ends=============//
	//=============count records function starts=============//
	public function count_record($table,$where=NULL)//$where is an array
	{
		if($where){
			$this->db->where($where);
		}		
		$records = $this->db->get($table);
		return $records->num_rows();
	}
	//=============count records function ends=============//
	//=============Delete record from table function starts=============//
	public function delete_record($table, $id, $field=NULL){
		if($field){
			$this->db->where($field, $id);

		}else{
			$this->db->where('id', $id);
		}
		$delete=$this->db->delete($table);
	}
	//=============Delete record from table function ends===============//
	//=============update record from table function starts=============//
	public function update_record($table, $data,$where){
		$this->db->where($where);
		$update=$this->db->update($table,$data);
		return $update;
	}
	//=============update record from table function ends===============//
	//=============update records in table function starts=============//
	public function update_all_records($table, $data){
		$update=$this->db->update($table,$data);
		return $update;
	}
	//=============update records in table function ends===============//
	//=============delete_record_multiple_colum record from table function starts=============//
	public function delete_record_multiple_colum($table,$where){
		$this->db->where($where);
		$update=$this->db->delete($table);
	}
	//=============delete_record_multiple_colum record from table function ends===============//
	public function insert_record($table, $data){
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}
	//=============insert record into table function ends===============//
	public function insert_batch_record($table, $data){
		$this->db->insert_batch($table, $data);
		return true;
	}
	//=============insert batch record into table function ends===============//
	public function insert_nonpk_record($table, $data){
		$this->db->insert($table,$data);
		return true;
	}
	//=============insert non primary key record into table function ends===============//
	public function query($query){
		return $this->db->query($query);
	}
	public function simple_query($query){
		return $this->db->simple_query($query);
	}
} //class ends
?>