<?php 
//for help rajaimranqamer@gmail.com
defined('BASEPATH') OR exit('No direct script access allowed');
class Trend extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		if(is_logged_in()){}else{
			redirect(base_url());exit;
		}
		$this -> load -> helper ('dashboard_functions_helper');
		$this -> load -> model ('Common_model');
		$this -> load -> model ('dashboard/Trend_model',"trend");
	}
	//============================ Constructor Function Ends ============================//
	public function periodical()
	{		
		$data = array();
		$data["pagetitle"] = "Periodical Trend";
		$data["currpage"] = "periodical-trend";
		if($this->input->post("year")){
			$data["periodtext"] = "Year";
			$data["period"] = $year = $this->input->post("year");
		}else{
			//later it can be changed for fiscal year or for anum etc
			$data["periodtext"] = "Year";
			$data["period"] = $year = date("Y");
		}	
		if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}
		$periodicaldata = $this -> trend -> get_periodical_data('monthly',$year,$distcode);
		foreach($periodicaldata as $onearr){
			$fmonth = $onearr["fmonth"];
			$splitted = explode("-",$fmonth);
			$mnth = $splitted[1];
			$qtr = ceil($splitted[1]/3);
			$q = $qtr-1;
			$m = $mnth-1;
			$data["plansm"][$m]["value"] = $plans = $onearr["plans"];
			$data["visitsm"][$m]["value"] = $visits = $onearr["visits"];
			$data["visitsheldm"][$m]["value"] = $visitsheld = $onearr["visitsheld"];
			$data["confirmedm"][$m]["value"] = $confirmed = $onearr["confirmed"];
			$data["checklistsm"][$m]["value"] = $checklists = $onearr["checklists"];
			$data["filledm"][$m]["value"] = $filled = $onearr["filled"];
			$data["hfplannedm"][$m]["value"] = $hfplanned = $onearr["hfplanned"];
			$data["hfvisitedm"][$m]["value"] = $hfvisited = $onearr["hfvisited"];
			$data["plansq"][$q]["value"] = isset($data["plansq"][$q]["value"])?$data["plansq"][$q]["value"]+$plans:$plans;
			$data["visitsq"][$q]["value"] = isset($data["visitsq"][$q]["value"])?$data["visitsq"][$q]["value"]+$visits:$visits;
			$data["visitsheldq"][$q]["value"] = isset($data["visitsheldq"][$q]["value"])?$data["visitsheldq"][$q]["value"]+$visitsheld:$visitsheld;
			$data["confirmedq"][$q]["value"] = isset($data["confirmedq"][$q]["value"])?$data["confirmedq"][$q]["value"]+$confirmed:$confirmed;
			$data["checklistsq"][$q]["value"] = isset($data["checklistsq"][$q]["value"])?$data["checklistsq"][$q]["value"]+$checklists:$checklists;
			$data["filledq"][$q]["value"] = isset($data["filledq"][$q]["value"])?$data["filledq"][$q]["value"]+$filled:$filled;
			$data["hfplannedq"][$q]["value"] = isset($data["hfplannedq"][$q]["value"])?$data["hfplannedq"][$q]["value"]+$hfplanned:$hfplanned;
			$data["hfvisitedq"][$q]["value"] = isset($data["hfvisitedq"][$q]["value"])?$data["hfvisitedq"][$q]["value"]+$hfvisited:$hfvisited;
			$data["plansy"] = isset($data["plansy"])?$data["plansy"]+$plans:$plans;
			$data["visitsy"] = isset($data["visitsy"])?$data["visitsy"]+$visits:$visits;
			$data["visitsheldy"] = isset($data["visitsheldy"])?$data["visitsheldy"]+$visitsheld:$visitsheld;
			$data["confirmedy"] = isset($data["confirmedy"])?$data["confirmedy"]+$confirmed:$confirmed;
			$data["checklistsy"] = isset($data["checklistsy"])?$data["checklistsy"]+$checklists:$checklists;
			$data["filledy"] = isset($data["filledy"])?$data["filledy"]+$filled:$filled;
			$data["hfplannedy"] = isset($data["hfplannedy"])?$data["hfplannedy"]+$hfplanned:$hfplanned;
			$data["hfvisitedy"] = isset($data["hfvisitedy"])?$data["hfvisitedy"]+$hfvisited:$hfvisited;
		}
		$this->load->view('dashboard/trend/periodical',$data);
	}
	public function indicator()
	{		
		$data = array();
		$data["pagetitle"] = "Indicator Wise Trend";
		$data["currpage"] = "indicator-trend";
		if($this->input->post("year")){
			$data["periodtext"] = "Year";
			$data["period"] = $year = $this->input->post("year");
		}else{
			$data["periodtext"] = "Year";
			$data["period"] = $year = date("Y");
		}	
		if($this->input->post("distcode")){
			$data["distcode"] = $distcode = $this->input->post("distcode");
		}else{
			$distcode = NULL;
		}	
		if($this->input->post("ptype")){
			$data["ptype"] = $ptype = $this->input->post("ptype");
		}else{
			$ptype = NULL;
		}
		$periodicaldata = $this -> trend -> get_periodical_data('monthly',$year,$distcode,$ptype);
		foreach($periodicaldata as $onearr){
			$fmonth = $onearr["fmonth"];
			$splitted = explode("-",$fmonth);
			$mnth = $splitted[1];
			$qtr = ceil($splitted[1]/3);
			$q = $qtr-1;
			$m = $mnth-1;
			//for monthly trend
			$data["plansm"][$m]["value"] = $plans = $onearr["plans"];
			$data["visitsm"][$m]["value"] = $visits = $onearr["visits"];
			$data["visitsheldm"][$m]["value"] = $visitsheld = $onearr["visitsheld"];
			$data["confirmedm"][$m]["value"] = $confirmed = $onearr["confirmed"];
			$data["checklistsm"][$m]["value"] = $checklists = $onearr["checklists"];
			$data["filledm"][$m]["value"] = $filled = $onearr["filled"];
			$data["hfplannedm"][$m]["value"] = $hfplanned = $onearr["hfplanned"];
			$data["hfvisitedm"][$m]["value"] = $hfvisited = $onearr["hfvisited"];
			/* $data["plansq"][$q]["value"] = isset($data["plansq"][$q]["value"])?$data["plansq"][$q]["value"]+$plans:$plans;
			$data["visitsq"][$q]["value"] = isset($data["visitsq"][$q]["value"])?$data["visitsq"][$q]["value"]+$visits:$visits;
			$data["visitsheldq"][$q]["value"] = isset($data["visitsheldq"][$q]["value"])?$data["visitsheldq"][$q]["value"]+$visitsheld:$visitsheld;
			$data["confirmedq"][$q]["value"] = isset($data["confirmedq"][$q]["value"])?$data["confirmedq"][$q]["value"]+$confirmed:$confirmed;
			$data["checklistsq"][$q]["value"] = isset($data["checklistsq"][$q]["value"])?$data["checklistsq"][$q]["value"]+$checklists:$checklists;
			$data["filledq"][$q]["value"] = isset($data["filledq"][$q]["value"])?$data["filledq"][$q]["value"]+$filled:$filled;
			$data["hfplannedq"][$q]["value"] = isset($data["hfplannedq"][$q]["value"])?$data["hfplannedq"][$q]["value"]+$hfplanned:$hfplanned;
			$data["hfvisitedq"][$q]["value"] = isset($data["hfvisitedq"][$q]["value"])?$data["hfvisitedq"][$q]["value"]+$hfvisited:$hfvisited; */
			/* $data["plansy"] = isset($data["plansy"])?$data["plansy"]+$plans:$plans;
			$data["visitsy"] = isset($data["visitsy"])?$data["visitsy"]+$visits:$visits;
			$data["visitsheldy"] = isset($data["visitsheldy"])?$data["visitsheldy"]+$visitsheld:$visitsheld;
			$data["confirmedy"] = isset($data["confirmedy"])?$data["confirmedy"]+$confirmed:$confirmed;
			$data["checklistsy"] = isset($data["checklistsy"])?$data["checklistsy"]+$checklists:$checklists;
			$data["filledy"] = isset($data["filledy"])?$data["filledy"]+$filled:$filled;
			$data["hfplannedy"] = isset($data["hfplannedy"])?$data["hfplannedy"]+$hfplanned:$hfplanned;
			$data["hfvisitedy"] = isset($data["hfvisitedy"])?$data["hfvisitedy"]+$hfvisited:$hfvisited; */
		}
		$this->load->view('dashboard/trend/indicator',$data);
	}
}