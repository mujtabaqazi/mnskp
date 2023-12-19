<?php 
class Hcp_model extends CI_Model {
	//=============List all lqas records function starts=============//
	public function get_monitoring_list($where=NULL,$like=NULL,$limit=null, $start=1)
	{
		if(!is_array($where) ){
			$where = array();
		}
		$where["submitted_by"] = $this -> session -> id;
		$this->db->select('id,distcode,districtname(distcode) as "District",supervisor_name as "Institution Name", TO_CHAR((fmonth || \'-01\')::Date,\'Mon YYYY\') as "Report Month",TO_CHAR(dov,\'DD Mon YYYY\') as "Date", vpvc_id');//entity_name(entity_code)
		if(($where) && (count($where)>0))
		{
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like("distcode",$like);
			$this->db->or_like("supervisor_name",$like);
			//$this->db->or_like("entity_type",$like);
		}
		$this->db->order_by("id","DESC");
		if($limit){
			$this->db->limit($limit, $start);
		}
		$records = $this->db->get("hcp_monitoring")->result_array();
		return $records;
	}
	
	//================== dropdown Supervisor starts==================//
	public function supervisor_dropdown($table="hcp_monitoring")
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
	public function get_previous($table='hcp_monitoring',$wc,$checklistid=0,$facode=null,$dov=NULL,$hcptype_id=NULL,$lhwcode=NULL,$lhscode=NULL){
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