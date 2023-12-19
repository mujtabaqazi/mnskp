<?php 
class Lhw_model extends CI_Model {
	//=============List all dpiu records function starts=============//
	public function get_dpiu_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",facilityname(facode) as "Facility", supervisor_name as "Supervisor", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",dov as "Date of Visit",dod as "Date of Discussion", vpvc_id');
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
			$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
			$this->db->or_like("fmonth",$like);
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get("lhw_dpiu")->result_array();
		return $records;
	}
	//=============List all dpiu records function ends=============//
	//=============List all hf records function starts=============//
	public function get_hf_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",facilityname(facode) as "Facility", supervisor_name as "Supervisor", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
		
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
			$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get("lhw_hf")->result_array();
		return $records;
	}
	//=============List all hf records function ends=============//
	//=============List all lhs records function starts=============//
	public function get_lhs_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",facilityname(facode) as "Facility",lhsname(lhscode) as "LHS", supervisor_name as "Supervisor", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
			$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
			$this->db->or_like("LOWER(lhsname(lhscode))",strtolower($like));
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get("lhw_lhs")->result_array();
		return $records;
	}
	//=============List all lhs records function ends=============//
	//=============List all lhw records function starts=============//
	public function get_lhw_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",facilityname(facode) as "Facility", lhwname(lhwcode) as "LHW", supervisor_name as "Supervisor", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
		$this->db->from("lhw_lhw");
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
			$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
			$this->db->or_like("LOWER(lhwname(lhwcode))",strtolower($like));
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get()->result_array();
		return $records;
	}
	//=============List all lhw records function ends=============//
	//=============List all lmne records function starts=============//
	public function get_lmne_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",facilityname(facode) as "Facility", district_coordinator_name as "District Coordinator", incharge_flcf_name as "FLCF Incharge",supervisor_name as "Supervisor",total_lhws as "Number of LHWs", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",TO_CHAR(dov,\'DD Mon YYYY\') as "Date of Visit", vpvc_id');
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
			$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
			$this->db->or_like("LOWER(district_coordinator_name)",strtolower($like));
			$this->db->or_like("LOWER(incharge_flcf_name)",strtolower($like));
			$this->db->or_like("fmonth",$like);
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get("lhw_logistics")->result_array();
		return $records;
	}
	//=============List all lmne records function ends=============//
	//=============List all dtr records function starts=============//
	public function get_dtr_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",supervisor_name as "Supervisor", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Reporting Month",days_in_office as "Days in Office",days_in_field as "Days in Field",TO_CHAR(dov,\'DD Mon YYYY\') as "Date", vpvc_id');
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
			$this->db->or_like("LOWER(supervisor_name)",strtolower($like));
			$this->db->or_like("fmonth",$like);
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get("lhw_dtr")->result_array();
		return $records;
	}
	//=============List all dtr records function ends=============//
	//=============List all mtr records function starts=============//
	public function get_mtr_list($where=NULL,$like=NULL)
	{
		$this->db->select('id,distcodes,districtsname(distcodes) as "Districts",supervisor_name as "Supervisor", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",fmonth as "Reporting Month",days_in_office as "Days in Office",days_in_field as "Days in Field",TO_CHAR(dov,\'DD Mon YYYY\') as "Date", vpvc_id,submitted_by');
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
			$this->db->like("distcodes",$like);
			$this->db->or_like("supervisor_name",$like);
			$this->db->or_like("fmonth",$like);
		}
		$this->db->order_by("id","DESC");
		$records = $this->db->get("lhw_mtr")->result_array();
		//echo $this->db->last_query();
		return $records;
	}
	//=============List all mtr records function ends=============//
	//================== dropdown Supervisor starts==================//
	public function supervisor_dropdown($table="lhw_dpiu")
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
	//================== get previous ends=========================//
	//================== Get table Count  ============================//
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
	
	//================== Table Count ends ============================//
	
	
} //class ends
?>