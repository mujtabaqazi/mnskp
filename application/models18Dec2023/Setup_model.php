<?php 
class Setup_model extends CI_Model {
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
	
	function get_listing($table=null,$limit=null, $start=1,$select,$orderby,$where)
	{
		
		$this->db->from($table);
		if($limit){
			$this->db->limit($limit, $start);
		}
		if(($where) && (count($where)>0))
		{
			$this->db->where($where);
		}
		$this->db->select($select, FALSE);
		$this->db->order_by($orderby,"ASC");
		$records = $this->db->get()->result_array();
		return $records;
	}
	function get_listing_count($table=null,$where,$like)
	{
		
		$this->db->from($table);
		if(($where) && (count($where)>0))
		{
			$this->db->where($where);
		}
		$this->db->select('*', FALSE);
		$query = $this->db->get();
		$count = $query->num_rows();
		return $count;
	}
	public function maxCode($table,$distcode=NULL,$field='distcode'){
		$wc= "procode = '3'";
		if($distcode){
			$wc .= " and distcode = '".$distcode."'";
		}
		$query="select max($field) as code FROM $table where $wc and distcode < '802'";
		$result=$this->db->query($query);
		$recode=$result->row();
		$code = $recode->code+1;
		return $code;
	}
	public function getTehsils() {
		$distcode = $this -> input -> post('distcode');
		$facode = $this -> input -> post('facode');
		if ($facode != '') {
			$facode = $_REQUEST['facode'];
		$query="SELECT *,(select count(lhwcode) from lhwdb where lhwdb.facode= facilities .facode and lhwdb.status='Active') as lhws,
		(select count(lhscode) from lhsdb where lhsdb.facode = facilities .facode and lhsdb.status='Active') as lhss,
		(select sum(lhwdb.catch_area_pop) from lhwdb where lhwdb.facode = facilities .facode) as lhwpopulation  
		from facilities where facode = '$facode' ";
			$result = $this -> db -> query($query);
			$result = $result -> row_array();
			$resultJson = array();
			$resultJson['tcode'] = $result['tcode'];
			$resultJson['uncode'] = $result['uncode'];
			$resultJson['catchM'] = $result['catchment_area_pop'];
			$resultJson['workingLHWs'] = $result['lhws'];
			$resultJson['workingLHSs'] = $result['lhss'];
			$resultJson['lhwpopulation'] = $result['lhwpopulation'];
			return json_encode($resultJson);
			exit();
		} else {
			$query = "select * from tehsil where distcode = '$distcode' ";
			$result = $this -> db -> query($query);
			$result = $result -> result_array();
			$data = '<option value="0">Select Tehsil</option>';
			foreach ($result as $fac_data) {
				$data .= '<option value="' . $fac_data['tcode'] . '">' . $fac_data['tehsil'] . '</option>';
			}
			return $data;
		}
	}
	public function generateUcode($table,$where=NULL,$field='distcode'){
		$wc= "procode = '3'";
		$this->db->from($table);
		if(($where) && (count($where)>0))
		{
			$this->db->where($where);
		}
		$this->db->select("max($field) as code", FALSE);
		$records = $this->db->get()->row_array();
		$code = $records['code']+1;
		return $code;
	}
	public function getUnC($tcode) {
		$this->db->from('unioncouncil');
		if($tcode)
		{
			$this->db->where(array('tcode'=>$tcode));
		}
		$this->db->select("*", FALSE);
		$result = $this->db->get()->result_array();
		$data = '';
		foreach ($result as $unc_data) {
			$data .= '<option value="' . $unc_data['uncode'] . '">' . $unc_data['un_name'] . '</option>';
		}
		return $data;
	}
	public function generatefaCode($where) {
		if(($where) && (count($where)>0)){
			$this->db->from('facilities');
			$this->db->like("distcode",$where['distcode']);
			$this->db->select("max(facode) as fsc", FALSE);
			$dict = $this->db->get()->row_array();
			if (count($dict) > 0){
				//code updated 1/21/2022
				if($dict['fsc'] == '323044'){
					$newCode = '327045';
				}

				else if($dict['fsc'] == '323038'){
					$newCode = '328039'; 
				}

				else{
					$newCode = $dict['fsc'] + 1;
				}

				$newCode2 = substr($newCode, 0, 6);
				if ($newCode2 != NULL) {
					return $newCode;
				} 
				else
				{
					return '001';
				}
			  }
			 else {
				return "error";
			}
		}
	}
	public function get_all_plans($fmonth=NULL)
	{
		if($fmonth){}else{$fmonth=date("Y-m");}
		$ptype=$this -> session -> ptype;
		if($ptype == 'all'){
			$ptype = '';
		}else{
			$ptype = " and b.ptype = '$ptype' ";
		}
		$query = $this->db->query('select "District Code","District/Program Name","No of Supervisor (Have Plan)","No of Days in Plan",
		"No of HF to be Visited","No of Facilities Visited","No of Planned Checklists","No of Vehicles Assigned","No of Drivers"
		,"Approval Status"
		from 
		(select distcode as "District Code",case when distcode<>\'all\' then districtname else \'DG Office\' end as "District/Program Name", TO_CHAR((\''.$fmonth.'\' || \'-01\')::Date,\'Mon YYYY\') as "Year-Month" ,
		count(distinct supervisorid) as "No of Supervisor (Have Plan)", 
		count(distinct visitdate) as "No of Days in Plan", count(distinct facode) as "No of HF to be Visited",
		get_dist_hf_visited_count (distcode,\''.$fmonth.'\') as "No of Facilities Visited",
		get_dist_chklst_count (distcode,\''.$fmonth.'\') as "No of Planned Checklists",
		get_dist_filled_chklst_count(distcode,\''.$fmonth.'\') as "No of Filled Checklists", 
		count(distinct vehicleassigned) as "No of Vehicles Assigned",
		count(distinct driver) as "No of Drivers",
		(case when distcode=\'all\' or distcode=\'lhw\' or distcode=\'epi\' or distcode=\'mnch\' or distcode=\'nutrition\' or distcode=\'mcp\' or distcode=\'hcp\' or distcode=\'school\' or distcode=\'tbc\' or distcode=\'dengue\' or distcode=\'lhwMnchNutrition\' then dg_approved_stat_pd(distcode,\''.$fmonth.'\') else dho_approved_stat(distcode,\''.$fmonth.'\') end) "Approval Status"
		from (select case when distcode<>\'\' then b.distcode else b.ptype end as distcode, case when distcode<>\'\' then 
		districtname(b.distcode) else getprogram(b.ptype) end as districtname, a.id, a.facode, a.visitplanid, 
		a.visitdate,b.supervisorid,a.vehicleassigned,a.driver from visit_plan_visits as a inner join visit_plan_header as b on a.visitplanid=b.id inner join designations as c 
		on getdesigid(b.supervisorid)=c.id where b.fmonth=\''.$fmonth.'\' '.$ptype.' order by a.facode, c.designation, a.visitdate) as e 
		group by distcode,districtname order by distcode) as d where "Approval Status"=\'Approved\'', FALSE);
		//,dg_approved_stat(distcode,\''.$fmonth.'\') as "DG Approval Status"
		$num = $query->num_rows();
		$records = "";
		if($num > 0)
			$records = $query->result_array();//echo $this->db->last_query();exit;
		return $records;
	}
} //class ends
?>