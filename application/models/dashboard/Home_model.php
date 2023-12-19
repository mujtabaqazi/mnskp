<?php 
class Home_model extends CI_Model {	
	//=============List all records function starts=============//
	public function get_all_plans_data($fmonth=NULL,$visitDate=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
	{
		$ulevel = $this -> session -> userLevel;
		$utype 	= $this -> session -> utype;
		$ptype 	= $this -> session -> ptype;
		$wc = "vph.id > 0";
		$fmnthparm = "vph.fmonth";
		$groupby = ",vph.fmonth";
		$countplans = "count(distinct vpv.visitplanid) as plans,";
		if($fmonth){
			$wc .= " and vph.fmonth = '$fmonth'";
		}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
			$wc .= $customfmonthwc;
			$customfmonthwc = str_replace("'","''",$customfmonthwc);
			$fmnthparm = "''";
			$groupby = "";
			$countplans = "count(distinct vph.supervisorid) as supervisors,count(distinct vpv.visitplanid) as plans,";
		}
		if($visitDate){$wc .= " and vpv.visitdate = '$visitDate'";}
		//yahaan se aage kaam krna he frequency setting wala
		if($ulevel=='2' && is_null($distcode)){
			if($ptype!='all'){
				$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
				$ptype1 = $ptype;
			}else{
				$ptype1 = 'defaultptype';
			}
			if($utype == 'ProExecutive'){
				$this->db->select("vph.distcode as code, 
				COALESCE(districtname(vph.distcode),'Provincial') as name, 
				$countplans				
				count(distinct vpv.id) as visits,
				get_held_visits_count($fmnthparm,CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,0,'".$ptype1."','".$customfmonthwc."') as visitsheld,
				count(vpvc.id) as checklists, 
				get_prgrm_filled_chklst_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as filled,
				count(distinct vpv.facode) as hfplanned,
				get_prgrm_hf_visited_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as hfvisited,
				get_prgrm_visits_confirmed_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as confirmed from 
				visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id 
				where ".$wc." group by vph.distcode$groupby order by code",FALSE);
			}else{	
				$this->db->select("vph.distcode as code,
				COALESCE(districtname(vph.distcode),'Provincial') as name,
				$countplans 
				count(distinct vpv.id) as visits, 	
				get_held_visits_count($fmnthparm,CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,0,'".$ptype1."','".$customfmonthwc."') as visitsheld,
				count(distinct vpvc.id) as checklists, 
				get_prgrm_filled_chklst_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as filled,
				count(distinct vpv.facode) as hfplanned,
				get_prgrm_hf_visited_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as hfvisited,
				get_prgrm_visits_confirmed_count(CASE When vph.distcode::Integer > 0 Then vph.distcode Else '' END,$fmnthparm,'".$ptype."','".$customfmonthwc."') as confirmed 
				from visit_plan_visit_checklists as vpvc 
				inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id 
				where ".$wc." group by vph.distcode$groupby order by code",FALSE);
			}
		}else{
			if($distcode===0){
			    $wc .= " and vph.distcode IS NULL ";			
			}else{
				$distcode = ($distcode>0)?$distcode:$this -> session -> distcode;
				$wc .= " and vph.distcode = '$distcode'";
			}			
			if($ulevel=='3' && $utype=='DEO')
			{
				$wc .= " and vph.supervisorid = '".$this -> session -> id."'";
			}
			if($ptype!='all'){
				$wc .= " and vph.ptype = '$ptype' ";
				$ptype1 = $ptype;
			}else{
				$ptype1 = 'defaultptype';
			}
			if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
				$this->db->select("'".$distcode."' as code,
					vph.fmonth as fmonth, 
					count(distinct vph.supervisorid) as supervisors, 
					count(distinct vpv.visitplanid) as plans, 
					count(distinct vpv.id) as visits, 
					get_held_visits_count(vph.fmonth,'".$distcode."',0,'".$ptype1."') as visitsheld,
					count(distinct vpvc.id) as checklists, 
					get_prgrm_filled_chklst_count('".$distcode."',vph.fmonth,'".$ptype."') as filled,
					count(distinct vpv.facode) as hfplanned,
					get_prgrm_hf_visited_count('".$distcode."',vph.fmonth,'".$ptype."') as hfvisited,
					get_prgrm_visits_confirmed_count('".$distcode."',vph.fmonth,'".$ptype."') as confirmed 
					from visit_plan_visit_checklists as vpvc 
					inner join visit_plan_visits as vpv on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id 
					where ".$wc." group by vph.fmonth order by code",FALSE);
			}else{
				$this->db->select('vph.id as code, 
				vph.supervisor||\' (\'||getdesignation(getdesigid(vph.supervisorid))||\')\' as name, 
				count(distinct vpv.visitplanid) as plans, 
				count(distinct vpv.id) as visits,
				get_held_visits_count(vph.fmonth,vph.distcode,vph.supervisorid) as visitsheld,
				count(vpvc.id) as checklists, 
				get_sup_filled_chklst_count(vph.supervisorid,vph.fmonth) as filled,
				count(distinct vpv.facode) as hfplanned,
				get_sup_hf_visited_count(vph.supervisorid,vph.fmonth) as hfvisited,
				get_sup_visits_confirmed_count(vph.supervisorid,vph.fmonth) as confirmed from visit_plan_visit_checklists as vpvc inner join visit_plan_visits as vpv 
				on vpvc.visitplanvisitsid=vpv.id inner join visit_plan_header as vph on vpv.visitplanid=vph.id 
				where '.$wc.' group by vph.id,vph.supervisor,vph.supervisorid,vph.fmonth,vph.distcode order by name',FALSE);
			}
		}
		$records = $this->db->get()->result_array();
		 //echo $this->db->last_query();exit;
		return $records;
	}
	//=============List all records function ends=============//
	//=============List all records function starts=============//
	public function get_all_plans_sup_data($fmonth=NULL,$visitDate=NULL)
	{
		$ulevel = $this -> session -> userLevel;
		$utype 	= $this -> session -> utype;
		$ptype 	= $this -> session -> ptype;
		$wc = "vph.id > 0";
		if($fmonth){$wc .= " and vph.fmonth = '$fmonth'";}
		if($visitDate){$wc .= " and vpv.visitdate = '$visitDate'";}
		if($ulevel=='2'){
			if($ptype!='all'){
				$wc .= " and vph.ptype = '$ptype' ";
			}
			if($utype == 'ProExecutive'){
				$this->db->select('
				COALESCE(districtname(vph.distcode),\'Provincial\') as "District",
				vph.supervisor || \' (\' || getdesignation(u.designation) || \')\' as "Supervisor",
				u.email || \' / \' || u.phone  as "Contact Email/Phone",
				facilityname(vpv.facode) as "Facility", 
				vpv.visit_confirmed as "Status",
				vpv.id as vpvid ,
				vpv.picture,
				vpv.visitdate,
				vpv.date_confirmed,
				vpv.time_confirmed,
				vpv.latitude,
				vpv.longitude 
				from 
				visit_plan_visits as vpv inner join visit_plan_header as vph on vpv.visitplanid=vph.id inner join users as u on u.id=vph.supervisorid 
				where '.$wc,FALSE);
			}else{	
				$this->db->select('
				COALESCE(districtname(vph.distcode),\'Provincial\') as "District",
				vph.supervisor || \' (\' || getdesignation(u.designation) || \')\' as "Supervisor",
				u.email || \' / \' || u.phone  as "Contact Email/Phone",
				facilityname(vpv.facode) as "Facility", 
				vpv.visit_confirmed as "Status",
				vpv.id as vpvid,
				vpv.picture,
				vpv.visitdate,
				vpv.date_confirmed,
				vpv.time_confirmed,
				vpv.latitude,
				vpv.longitude			
				from 
				visit_plan_visits as vpv inner join visit_plan_header as vph on vpv.visitplanid=vph.id inner join users as u on u.id = vph.supervisorid 
				where '.$wc,FALSE);
			}
			$this->db->order_by("District");
		}else{
			$distcode = $this -> session -> distcode;
			$wc .= " and vph.distcode = '$distcode'";
			if($ulevel=='3' && $utype=='DEO')
			{
				$wc .= " and vph.supervisorid = '".$this -> session -> id."'";
			}
			$this->db->select('
				vph.supervisor || \' (\' || getdesignation(u.designation) || \')\' as "Supervisor",
				u.email || \' / \' || u.phone  as "Contact Email/Phone",
				facilityname(vpv.facode) as "Facility", 
				vpv.visit_confirmed as "Status",
				vpv.id as vpvid,
				vpv.picture,
				vpv.visitdate,
				vpv.date_confirmed,
				vpv.time_confirmed,
				vpv.latitude,
				vpv.longitude 
				from 
				visit_plan_visits as vpv inner join visit_plan_header as vph on vpv.visitplanid=vph.id inner join users as u on u.id = vph.supervisorid
				where '.$wc,FALSE);
			$this->db->order_by("Supervisor");
		}
		$records = $this->db->get()->result_array();
		return $records;
	}
	//=============List all records function ends=============//
	function get_visit_checklists($vpvid){
		$this->db->select('id as vpvc_id,tablename,shortname, name || hcptype || case when filledstat > 0 then \' moongreenstat\' else \' moonredstat\' end as name, filledstat
			from 
			( select vpvc.id,chklst.name,chklst.tablename,chklst.shortname,checklist_filled_stat(vpvc.id,vpvc.checklistid) as filledstat,
			CASE gethcptype(vpvc.hcptype_id) 
				WHEN \'name\' THEN \' {\' || vpvc.hcp_value || \' (\' || gethcptypename(vpvc.hcptype_id) || \')}\' 
				WHEN \'\' THEN \'\' 
			ELSE 
				CASE gethcptypename(vpvc.hcptype_id)
					WHEN \'CMW\' THEN \' {\' || (select cmwname(vpvc.hcp_value)) || \' (CMW)}\'
					WHEN \'LHW\' THEN \' {\' || (select lhwname(vpvc.hcp_value)) || \' (LHW)}\'
					WHEN \'LHS\' THEN \' {\' || (select lhsname(vpvc.hcp_value)) || \' (LHS)}\'
					ELSE
						\'\'
				END
			END
				as hcptype
			from visit_plan_visit_checklists vpvc
			INNER JOIN checklists chklst ON chklst.id = vpvc.checklistid where visitplanvisitsid = \''.$vpvid.'\') as moon',FALSE);
		return $records = $this->db->get()->result_array();
	}
} //class ends
?>