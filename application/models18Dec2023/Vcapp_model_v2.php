<?php 
class Vcapp_model_v2 extends CI_Model {
	//function to get user logged in to system
	function login($where=NULL){
		$this->db->select("*");
		$this->db->from("users");
		$this->db->where($where);
		$row = $this->db->get()->row();
		return $row;
	}
	// function up comming visits list
	function up_comming_visits($user=Null,$where=Null)
	{
		//check pd approve condtion
		if ($user->level==2){
			//get ptype 
			$designation = $user->designation;
			$ptype = $this->db->select("ptype")->from("designations")->where("id",$designation)->get()->row()->ptype;
			//$query = "select ptype from  where id = $designation";
			$statusCondition="pd_approve_status(visit_plan_header.fmonth,'$ptype') = 'Approved'";
		}else {
			$statusCondition="dho_approved_stat(visit_plan_header.distcode,visit_plan_header.fmonth) = 'Approved'";
		}
		$this->db->select("vpv.*,
		facilityname(vpv.facode) as facility, 
		facilitytype(vpv.facode) as fatype,
		checklistcount(vpv.id) as checklist_count
		,districtname(visit_plan_header.distcode) as district
		,dho_approved_stat(visit_plan_header.distcode,visit_plan_header.fmonth) AS approved_status"
		);
		$this->db->from("visit_plan_visits AS vpv ");
		$this->db->join("visit_plan_header","visit_plan_header.supervisorid = ".$user->id." AND visit_plan_header.fmonth = '".date('Y-m')."'  AND ".$statusCondition);
		$this->db->where("vpv.visitplanid=visit_plan_header.id");
		if($where && $where['confirm']=='not'){
			//$this->db->where("vpv.visit_confirmed ",'1');
			$this->db->where("vpv.visit_confirmed IS NULL OR vpv.visit_confirmed != '1' ",null,false);
		}
		else if($where && $where['confirm']=='1'){
			$this->db->where("vpv.visit_confirmed ",'1');
		}
		$this->db->order_by("vpv.visitdate","asc");
		//print_r($this->db->get()->result());exit(0);
		return $this->db->get()->result();
	}
	//code updated by moon
	function visit_checklists($vpvid=NULL){
		$this->db->select("vpvc.*,
		checklistname(vpvc.checklistid) as checklist
		");
		$this->db->from("visit_plan_visit_checklists AS vpvc,visit_plan_visits AS vpv");
		$this->db->where("vpvc.visitplanvisitsid=".$vpvid);
		$this->db->where("vpv.id=vpvc.visitplanvisitsid");
		return $this->db->get()->result();
	}
	
	function visit_supervisors($facode=NULL,$dov=NULL){
		$this->db->select("vpv.id as vpvid,vpv.visitdate,vpv.facode,visit_plan_header.supervisor
		,facilityname(vpv.facode) as facility, 
		facilitytype(vpv.facode) as fatype,
		");
		$this->db->from("visit_plan_visits as vpv ");
		$this->db->join("visit_plan_header ","visit_plan_header.id= vpv.visitplanid");
		$this->db->where("vpv.facode='".$facode."'");
		$this->db->where("vpv.visitdate='".$dov."'");
		return $this->db->get()->result();
	}	
	function visit_confirm_check($id=NULL){
		$this->db->select("vpv.id as vpvid");
		$this->db->from("visit_plan_visits as vpv ");
		$this->db->where("vpv.id='".$id."'");
		//$this->db->where("vpv.visit_confirmed IS NULL OR vpv.visit_confirmed != '1'",null,false);
		return $this->db->get()->result();
	}	
}