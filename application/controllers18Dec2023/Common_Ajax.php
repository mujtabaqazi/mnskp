<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Common_Ajax extends CI_Controller {
	public function get_faTypes_options($facat=NULL,$selectedFatype=NULL)
	{
		$result = getFaTypes($facat);	$output = '<option value="" >-- Select Fatype--</option>';foreach ($result            as $one) { 
			$selected = '';
			if(($selectedFatype)&&($selectedFatype == $one["fatype"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["fatype"].'" '.$selected.' >'.$one["fatype_name"].' - ('.$one["fatype"].')</option>';
		}
		echo $output;
	}
	public function getFacilities_options($selectedFacode=0) {
		if(isset($_POST["distcode"]))
		{
			$distcode = $_POST["distcode"];
		}else if(($this -> session -> distcode) > 0)
		{
			$distcode = $this -> session -> distcode;
		}else{
			$distcode = NULL;
		}
		if(isset($_POST["tcode"]))
		{
			$tcode = $_POST["tcode"];
		}else{
			$tcode = NULL;
		}
		if(isset($_POST["uncode"]))
		{
			$uncode = $_POST["uncode"];
		}else{
			$uncode = NULL;
		}
		if(isset($_POST["facat"]))
		{
			$facat = $_POST["facat"];
		}else{
			$facat = NULL;
		}
		if(isset($_POST["fatype"]))
		{
			$fatype = $_POST["fatype"];
		}else{
			$fatype = NULL;
		}
		$data = getFacilities($distcode,$tcode,$uncode,$facat,$fatype);		$output = '<option value="" >Select Facility</option>';
		foreach ($data as $one) { 
			$selected = '';			if(($selectedFacode > 0) && ($selectedFacode == $one["facode"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["facode"].'" '.$selected.' >'.$one["fac_name"].'</option>';
		}
		echo $output;
	}
	public function getTehsils_options($selectedTcode=0) {				
		if(isset($_POST["distcode"]))
		{
			$distcode = $_POST["distcode"];
		}else{
			$distcode = NULL;
		}		
		$data = getTehsils($distcode);		$output = '<option value="" >-- Select Tehsil--</option>';
		foreach ($data as $one) { 
			$selected = '';
			if(($selectedTcode > 0) && ($selectedTcode == $one["tcode"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["tcode"].'" '.$selected.' >'.$one["tehsil"].'</option>';
		}
		echo $output;	
	}
	public function getUnC_options($selectedUncode=0) {
		if(isset($_POST["distcode"]))
		{
			$distcode = $_POST["distcode"];
		}else{
			$distcode = NULL;
		}
		if(isset($_POST["tcode"]))
		{
			$tcode = $_POST["tcode"];
		}else{
			$tcode = NULL;
		}
		$data = getUcs($distcode,$tcode);
		$output = '<option value="" >-- Select Unioncouncil--</option>';
		foreach ($data as $one) { 
			$selected = '';
			if(($selectedUncode > 0) && ($selectedUncode == $one["uncode"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["uncode"].'" '.$selected.' >'.$one["un_name"].'</option>';
		}
		echo $output;
	}
	public function getDistUnC_options() {
	}
	public function getLHS_options($selectedLHScode=0) {				
		if(isset($_POST["distcode"]) && !empty($_POST["distcode"]))
		{
			$distcode = $_POST["distcode"];
		}else{
			echo '<option value="" >-- Select District First--</option>';
			exit;
		}		
		$data = getLHS($distcode);
		$output = '<option value="" >-- Select LHS--</option>';
		foreach ($data as $one) { 
			$selected = '';
			if(($selectedLHScode > 0) && ($selectedLHScode == $one["lhscode"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["lhscode"].'" '.$selected.' >'.$one["lhsname"].'</option>';
		}
		echo $output;	
	}
	public function getLHW_options($selectedLHWcode=0) {				
		if(isset($_POST["distcode"]) && !empty($_POST["distcode"]))
		{
			$distcode = $_POST["distcode"];
		}else{
			echo '<option value="" >-- Select District First--</option>';
			exit;
		}		
		$data = getLHW($distcode);
		$output = '<option value="" >-- Select LHW--</option>';
		foreach ($data as $one) { 
			$selected = '';
			if(($selectedLHWcode > 0) && ($selectedLHWcode == $one["lhwcode"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["lhwcode"].'" '.$selected.' >'.$one["lhwname"].'</option>';
		}
		echo $output;	
	}
	public function dho_approve_list(){
		$this -> load -> model ('Plans_model');		$data["id"] = "";$data["fmonth"] = $_POST["fmonth"];		$data["allPlans"] = $this -> Plans_model -> get_plans_for_dho_approval($data["fmonth"]);		$resultJson["tbody"] = getPlanAjaxTable($data["allPlans"]);		$resultJson["paging"] = "";
		echo json_encode($resultJson);}
	public function approve_list(){
		$this -> load -> model ('Plans_model');
		$ulevel = $this -> session -> userLevel;
		$utype = $this -> session -> utype;
		$optArr = array("column" => "Year-Month","view"=>"yes");
		if($ulevel=='2' && $utype == 'ProExecutive')
		{
			$optArr["edit"] = "yes";
			$planText = "Approve Plan(s)";
			$planLink = "plans/pd_approve";
		}else if($ulevel=='2' && $utype != 'ProExecutive'){
			$planText = "Approve Plan(s)";
			$planLink = "plans/dg_approve";
		}
		else{
			$optArr["edit"] = "yes";
			$planText = "Make Plan";
			$planLink = "plans/dho_approve";
		}
		$optArr["path"] = $planLink;
		$data["id"] = "";
		$data["fmonth"] = $_POST["fmonth"];
		$data["allPlans"] = $this -> Plans_model -> get_plans_list($data["fmonth"]);
		$resultJson["tbody"] = getListingAjaxTable($data["allPlans"],"",false,true/* false */,$optArr);
		$resultJson["paging"] = "";
		echo json_encode($resultJson);
	}
	public function managers_list(){
		$this -> load -> model ('Plans_model');		$distcode = $this -> input -> post("distcode");		$ulevel = $this -> session -> userLevel;		$utype = $this -> session -> utype;		$data["fmonth"] = $_POST["fmonth"];
		if($ulevel=='2')
		{
			if($distcode > 0)
			{				$data["allPlans"] = $this -> Plans_model -> get_managers_plans($distcode,$data["fmonth"]);			}			elseif($utype == 'Manager' || $utype == 'ProExecutive'){				$data["allPlans"] = $this -> Plans_model -> get_managers_plans(0,$data["fmonth"]);			}			else{$data["allPlans"] = $this -> Plans_model -> get_plans_for_dg_approval($data["fmonth"]);}		}else{			$data["allPlans"] = $this -> Plans_model -> get_managers_plans(0,$data["fmonth"]);		}$resultJson["tbody"] = getListingTable($data["allPlans"],"",false,true);$resultJson["paging"] = "";echo json_encode($resultJson);
	}
	public function getchklst_targets($selectedTcode=0) {				
		$output = '';
		$this -> load -> model ('Plans_model');
		$chklstId = $this->input->post("chklstId");
		if($chklstId>0){
			$ptype = $this->input->post("ptype");
			$data = $this -> Plans_model -> getchklst_targets($chklstId,$ptype);
			if(is_array($data)){
				foreach ($data as $one) { 
					$selected = '';
					if(($selectedTcode > 0) && ($selectedTcode == $one["id"]))
					{
						$selected = 'selected="selected"';
					}
					$output .= '<option value="'.$one["id"].'" '.$selected.' data-name="'.$one["name"].'" data-entry="'.$one["entry_type"].'" >'.$one["displaytitle"].'</option>';
				}
			}
		}
		echo $output;	
	}
	public function gettarget_val($selectedCode=0) {		
		$this -> load -> model ('Plans_model');		$this->load->helper("communication");		$hcptype = $this->input->post("hcptype");		$index = $this->input->post("rowIndex");		$chklstsIndex = "";
		if($this->input->post("chklstsIndex")){
			$chklstsIndex = $this->input->post("chklstsIndex");
		}
		$facode = $this->input->post("facode");
		$output = '<select class="form-control hcp_value" required="required" name="hcp_value['.$index.']['.$chklstsIndex.']" >';
		if($hcptype=="cmw")
		{
			$data = $this -> Plans_model -> gettarget_cmws($facode);
		}else if($hcptype=="lhw")
		{
			$data = $this -> Plans_model -> gettarget_lhws($facode);
		}else if($hcptype=="lhs")
		{
			$data = $this -> Plans_model -> gettarget_lhs($facode);
		}		
		foreach ($data as $one) { 
			$selected = '';
			if(($selectedCode > 0) && ($selectedCode == $one["code"]))
			{
				$selected = 'selected="selected"';
			}
			$output .= '<option value="'.$one["code"].'" '.$selected.' >'.$one["code"].'-'.$one["name"].'</option>';
		}
		$output .= '</select>';
		echo $output;	
	}
	public function check_plan_exist($fmonth=NULL) {		
		$this -> load -> model ('Plans_model');
		if($fmonth){}else{
			$fmonth = $this->input->post("fmonth");
		}
		$data = $this -> Plans_model -> get_plans($fmonth);
		if(isset($data[0]["id"]) && $data[0]["id"] > 0){echo $data[0]["id"];}else{echo 0;}	
	}
	public function check_plan_approval($fmonth=NULL) {		
		$this -> load -> model ('Plans_model');
		if($fmonth){}else{
			$fmonth = $this->input->post("fmonth");
		}
		$data = $this -> Plans_model -> get_plan_approval($fmonth);
		if(isset($data[0]["id"]) && $data[0]["id"] > 0){echo $data[0]["id"];}else{echo 0;}	
	}
	public function getMonths() {				
		getAllMonthsOptions();
	}
	public function getMonthsWithCurrent() {				
		getAllMonthsOptionsWithCurrent();
	}
	public function getUsers_options($selected=0) {
		$this -> db -> select("id,Case when distcode is null then fullname else districtname(distcode)||'-'||fullname end as name");		$this -> db -> from("users");if(isset($_POST["designation"])){$this -> db ->where("designation",$_POST["designation"]);}		$this -> db -> order_by("name","ASC");		$data = $this -> db -> get() -> result_array();
		foreach($data as $key => $val){			$selected = ($selected==$val["id"])?'selected="selected"':''; 			$output .= '<option value="'.$val["id"].'" '.$selected.'>'.$val["name"].'</option>';}echo $output;	
	}
}