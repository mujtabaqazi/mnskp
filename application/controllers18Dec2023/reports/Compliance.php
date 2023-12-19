<?php
/*
          C__O__M__P__L__I__A__N__C__E
		 ______________________________
		/""""""""""""""""""""""""""""""\
        ||     Class : Compliance     ||
	    ||  Author: Raja Imran Qamer  ||
	    ||     Date : 2017-04-23      ||
	    ||  rajaimranqamer@gmail.com  ||
	    ||     {LHW + DHIS + MNS}     ||
	    ||   **Pace Technologies**    ||
		||____________________________||
		\__*_*_*________________:_:_:__/
	                ||   ||
		            ||___||
					'''''''
		   __________________________
		   """"""""""""""""""""""""""
		  //                       //
		 //   A S D F G H J K L   //
		//_______________________//
		""""""""""""""""""""""""""
*/defined('BASEPATH') OR exit('No direct script access allowed');
class Compliance extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this->load->library("Reportfilters");
		$this->load->helper("report_functions");
	}
	public function index($reportFunName)
	{
		$ulevel = $this -> session -> userLevel;
		$functionName = $this -> uri -> segment (1);
		$reportPath = base_url()."Compliances/".$functionName;
		$reportTitle = "Compliance Report Filters";
		$reportPeriod = array('monthly');
		$dataHtml = $this->reportfilters->filtersHeader($reportPath,$reportTitle);
		$dataHtml .= $this->reportfilters->createReportFilters(true,false,false,false,$reportPeriod);
		$dataHtml .= $this->reportfilters->filtersFooter();
		$data["filters"] = $dataHtml;
		$this->load->view("reports/filters",$data);
	}
	public function filled_planned_chklsts($reportforcode=NULL,$reportyear=NULL)
	{
		$data["distcode"] = $distcode = isset($_REQUEST["distcode"])?$_REQUEST["distcode"]:(($reportforcode)?$reportforcode:"");
		$data["year"] = $year = isset($_REQUEST["year"])?$_REQUEST["year"]:(($reportyear)?$reportyear:date("Y"));
		$data["month"] = $month = isset($_REQUEST["month"])?$_REQUEST["month"]:0;
		if($distcode>0)
		{
			$result = $this->Common_model->fetchall("facilities","","facode as code,fac_name as facility",array("distcode"=>$distcode));
		}else{
			$result = $this->Common_model->fetchall("districts","","distcode as code,district");
		}		
		$data["reportTitle"] = "Compliance of Planned vs Filled Checklists during Supervisory Visits";
		$totalRows = count($result);
		$allTotal = array();
		foreach($result as $key => $val)
		{
			$subTotDue = 0;$subTotSub = 0;$subTotPerc = 0;
			for($i=1;$i<13;$i++)
			{
				$ind = sprintf("%02d", $i);
				if($month>0 &&  $ind != $month){
					continue;
				}
				if($distcode>0)
				{
					$subTotDue += $result[$key]["due$ind"] = $due = countForDueChecklistIn_A_Facility("$year-$ind",$val["code"]);
					$subTotSub += $result[$key]["sub$ind"] = $sub = countForFilledChecklistIn_A_Facility("$year-$ind",$val["code"]);
				}else{
					$subTotDue += $result[$key]["due$ind"] = $due = countForDueChecklistIn_A_District("$year-$ind",$val["code"]);
					$subTotSub += $result[$key]["sub$ind"] = $sub = countForFilledChecklistIn_A_District("$year-$ind",$val["code"]);
				}				
				$result[$key]["%$ind"] = round(($sub/($due?$due:1))*100,2);
				$totdue = isset($allTotal["due$ind"])?$allTotal["due$ind"] += $due:$allTotal["due$ind"] = $due;
				$totsub = isset($allTotal["sub$ind"])?$allTotal["sub$ind"] += $sub:$allTotal["sub$ind"] = $sub;
				$allTotal["%$ind"] = round(($totsub/($totdue?$totdue:1))*100,2);
				if($month>0 &&  $ind == $month){
					$data["month"] = $i;
					$i=13;
					break;
				}
			}
			$ind = sprintf("%02d", $i);
			$result[$key]["due$ind"] = $subTotDue;
			$result[$key]["sub$ind"] = $subTotSub;
			$result[$key]["%$ind"] = round(($subTotSub/($subTotDue?$subTotDue:1))*100,2);
			$totdue = isset($allTotal["due$ind"])?$allTotal["due$ind"] += $subTotDue:$allTotal["due$ind"] = $subTotDue;
			$totsub = isset($allTotal["sub$ind"])?$allTotal["sub$ind"] += $subTotSub:$allTotal["sub$ind"] = $subTotSub;
			$allTotal["%$ind"] = round(($totsub/($totdue?$totdue:1))*100,2);
		}
		$data["allTotal"] = $allTotal;
		$data["reportData"] = $result;
		$this->load->view("reports/compliances/filled_planned_chklsts",$data);
	}
	public function planned_held_visits($reportforcode=NULL,$reportyear=NULL)
	{
		$data["distcode"] = $distcode = isset($_REQUEST["distcode"])?$_REQUEST["distcode"]:(($reportforcode)?$reportforcode:"");
		$data["year"] = $year = isset($_REQUEST["year"])?$_REQUEST["year"]:(($reportyear)?$reportyear:date("Y"));
		$data["month"] = $month = isset($_REQUEST["month"])?$_REQUEST["month"]:0;
		if($distcode>0)
		{
			$result = $this->Common_model->fetchall("facilities","","facode as code,fac_name as facility",array("distcode"=>$distcode));
		}else{
			$result = $this->Common_model->fetchall("districts","","distcode as code,district");
		}		
		$data["reportTitle"] = "Compliance of Planned vs Conducted Supervisory Visits";
		$totalRows = count($result);
		$allTotal = array();
		foreach($result as $key => $val)
		{
			$subTotDue = 0;$subTotSub = 0;$subTotPerc = 0;
			for($i=1;$i<13;$i++)
			{
				$ind = sprintf("%02d", $i);
				if($month>0 &&  $ind != $month){
					continue;
				}
				if($distcode>0)
				{
					$subTotDue += $result[$key]["due$ind"] = $due = countForDueVisitsIn_A_Facility("$year-$ind",$val["code"]);
					$subTotSub += $result[$key]["sub$ind"] = $sub = countForHeldVisitsIn_A_Facility("$year-$ind",$val["code"]);
				}else{
					$subTotDue += $result[$key]["due$ind"] = $due = countForDueVisitsIn_A_District("$year-$ind",$val["code"]);
					$subTotSub += $result[$key]["sub$ind"] = $sub = countForHeldVisitsIn_A_District("$year-$ind",$val["code"]);
				}				
				$result[$key]["%$ind"] = round(($sub/($due?$due:1))*100,2);
				$totdue = isset($allTotal["due$ind"])?$allTotal["due$ind"] += $due:$allTotal["due$ind"] = $due;
				$totsub = isset($allTotal["sub$ind"])?$allTotal["sub$ind"] += $sub:$allTotal["sub$ind"] = $sub;
				$allTotal["%$ind"] = round(($totsub/($totdue?$totdue:1))*100,2);
				if($month>0 &&  $ind == $month){
					$data["month"] = $i;
					$i=13;
					break;
				}
			}
			$ind = sprintf("%02d", $i);
			$result[$key]["due$ind"] = $subTotDue;
			$result[$key]["sub$ind"] = $subTotSub;
			$result[$key]["%$ind"] = round(($subTotSub/($subTotDue?$subTotDue:1))*100,2);
			$totdue = isset($allTotal["due$ind"])?$allTotal["due$ind"] += $subTotDue:$allTotal["due$ind"] = $subTotDue;
			$totsub = isset($allTotal["sub$ind"])?$allTotal["sub$ind"] += $subTotSub:$allTotal["sub$ind"] = $subTotSub;
			$allTotal["%$ind"] = round(($totsub/($totdue?$totdue:1))*100,2);
		}
		$data["allTotal"] = $allTotal;
		$data["reportData"] = $result;
		$this->load->view("reports/compliances/planned_held_visits",$data);
	}
	public function sup_visits_chklsts($disttcode=NULL,$reportyear=NULL,$ptype=NULL,$months=NULL)
	{
		
		$data["distcode"] = $distcode = isset($_REQUEST["distcode"])?$_REQUEST["distcode"]:(($disttcode)?$disttcode:"");
		$data["year"] = $year = isset($_REQUEST["year"])?$_REQUEST["year"]:(($reportyear)?$reportyear:date("Y"));
		$data["ptype"] = $ptype = isset($_REQUEST["ptype"])?$_REQUEST["ptype"]:(($ptype)?$ptype:"");
		$data["month"] = $month = isset($_REQUEST["month"])?$_REQUEST["month"]:(($months)?$months:"");
		$whrArr = array();
		$joinArr = array();
		if($distcode!=""){
			$whrArr["distcode"] = $distcode;
		}
		if($ptype!=""){
			$whrArr["ptype"] = $ptype;			
			$joinArr["table"] = "designations";
			$joinArr["id"] = "designation";			
		}
		$result = $this->Common_model->fetchall("users",((!empty($joinArr))?$joinArr:""),"users.id,fullname as Supervisor,getdesignation(users.designation) as Designation",((!empty($whrArr))?$whrArr:""));
		$data["reportTitle"] = "Compliance of Planned vs Held Visits And Planned vs Filled Checklists of Supervisors";
		$totalRows = count($result);
		$allTotal = array();
		foreach($result as $key => $val)
		{
			$subTotDuevisits = 0;$subTotDuechecklists = 0; $subTotSubvisits = 0;$subTotSubchecklists = 0;
			for($i=1;$i<13;$i++)
			{
				$ind = sprintf("%02d", $i);
				if($month>0 &&  $ind != $month){
					continue;
				}
				$dueData = countForDueChecklistsVisitsOf_A_Supervisor("$year-$ind",$val["id"],$ptype);
				$subData = countForSubChecklistsVisitsOf_A_Supervisor("$year-$ind",$val["id"],$ptype);
				
				$subTotDuevisits += $result[$key]["duevis$ind"] = $duevisits = $dueData->totalvisits;
				$subTotSubvisits += $result[$key]["subvis$ind"] = $subvisits = $subData["totalvisits"];
				$subTotDuechecklists += $result[$key]["Plannedchk$ind"] = $duechecklists = $dueData->totalchecklists;
				$subTotSubchecklists += $result[$key]["Filledchk$ind"] = $subchecklists = $subData["totalchecklists"];
				isset($allTotal["duevis$ind"])?$allTotal["duevis$ind"] += $duevisits:$allTotal["duevis$ind"] = $duevisits;
				isset($allTotal["subvis$ind"])?$allTotal["subvis$ind"] += $subvisits:$allTotal["subvis$ind"] = $subvisits;
				isset($allTotal["Plannedchk$ind"])?$allTotal["Plannedchk$ind"] += $duechecklists:$allTotal["Plannedchk$ind"] = $duechecklists;
				isset($allTotal["Filledchk$ind"])?$allTotal["Filledchk$ind"] += $subchecklists:$allTotal["Filledchk$ind"] = $subchecklists;
				if($month>0 &&  $ind == $month){
					$data["month"] = $i;
					$i=13;
					break;
				}
			}
			$ind = sprintf("%02d", $i);
			$result[$key]["duevis$ind"] = $subTotDuevisits;
			$result[$key]["subvis$ind"] = $subTotSubvisits;
			$result[$key]["Plannedchk$ind"] = $subTotDuechecklists;
			$result[$key]["Filledchk$ind"] = $subTotSubchecklists;
			isset($allTotal["duevis$ind"])?$allTotal["duevis$ind"] += $subTotDuevisits:$allTotal["duevis$ind"] = $subTotDuevisits;
			isset($allTotal["subvis$ind"])?$allTotal["subvis$ind"] += $subTotSubvisits:$allTotal["subvis$ind"] = $subTotSubvisits;
			isset($allTotal["Plannedchk$ind"])?$allTotal["Plannedchk$ind"] += $subTotDuechecklists:$allTotal["Plannedchk$ind"] = $subTotDuechecklists;
			isset($allTotal["Filledchk$ind"])?$allTotal["Filledchk$ind"] += $subTotSubchecklists:$allTotal["Filledchk$ind"] = $subTotSubchecklists;
		}
		$data["allTotal"] = $allTotal;
		$data["reportData"] = $result;
		$this->load->view("reports/compliances/sup_visits_chklsts",$data);
	}
	public function prgrm_visits_chklsts($disttcode=NULL,$reportyear=NULL)
	{
		$data["distcode"] = $distcode = isset($_REQUEST["distcode"])?$_REQUEST["distcode"]:(($disttcode)?$disttcode:"");
		$data["year"] = $year = isset($_REQUEST["year"])?$_REQUEST["year"]:(($reportyear)?$reportyear:date("Y"));
		$data["month"] = $month = isset($_REQUEST["month"])?$_REQUEST["month"]:0;
		$result = $this->Common_model->fetchall("programs","","ptype as \"Program Type\",pname as Program");
		$data["reportTitle"] = "Vertical Program wise Compliance of Planned vs Held Visits And Planned vs Filled Checklists";
		$totalRows = count($result);
		$allTotal = array();
		foreach($result as $key => $val)
		{
			$subTotDuevisits = 0;$subTotDuechecklists = 0; $subTotSubvisits = 0;$subTotSubchecklists = 0;
			for($i=1;$i<13;$i++)
			{
				$ind = sprintf("%02d", $i);
				if($month>0 &&  $ind != $month){
					continue;
				}
				$dueData = countForDueChecklistsVisitsOf_A_Program("$year-$ind",$val["Program Type"],$distcode);
				$subData = countForSubChecklistsVisitsOf_A_Program("$year-$ind",$val["Program Type"],$distcode);
				
				$subTotDuevisits += $result[$key]["duevis$ind"] = $duevisits = $dueData->totalvisits;
				$subTotSubvisits += $result[$key]["subvis$ind"] = $subvisits = $subData["totalvisits"];
				$subTotDuechecklists += $result[$key]["Plannedchk$ind"] = $duechecklists = $dueData->totalchecklists;
				$subTotSubchecklists += $result[$key]["Filledchk$ind"] = $subchecklists = $subData["totalchecklists"];
				isset($allTotal["duevis$ind"])?$allTotal["duevis$ind"] += $duevisits:$allTotal["duevis$ind"] = $duevisits;
				isset($allTotal["subvis$ind"])?$allTotal["subvis$ind"] += $subvisits:$allTotal["subvis$ind"] = $subvisits;
				isset($allTotal["Plannedchk$ind"])?$allTotal["Plannedchk$ind"] += $duechecklists:$allTotal["Plannedchk$ind"] = $duechecklists;
				isset($allTotal["Filledchk$ind"])?$allTotal["Filledchk$ind"] += $subchecklists:$allTotal["Filledchk$ind"] = $subchecklists;
				if($month>0 &&  $ind == $month){
					$data["month"] = $i;
					$i=13;
					break;
				}
			}
			$ind = sprintf("%02d", $i);
			$result[$key]["duevis$ind"] = $subTotDuevisits;
			$result[$key]["subvis$ind"] = $subTotSubvisits;
			$result[$key]["Plannedchk$ind"] = $subTotDuechecklists;
			$result[$key]["Filledchk$ind"] = $subTotSubchecklists;
			isset($allTotal["duevis$ind"])?$allTotal["duevis$ind"] += $subTotDuevisits:$allTotal["duevis$ind"] = $subTotDuevisits;
			isset($allTotal["subvis$ind"])?$allTotal["subvis$ind"] += $subTotSubvisits:$allTotal["subvis$ind"] = $subTotSubvisits;
			isset($allTotal["Plannedchk$ind"])?$allTotal["Plannedchk$ind"] += $subTotDuechecklists:$allTotal["Plannedchk$ind"] = $subTotDuechecklists;
			isset($allTotal["Filledchk$ind"])?$allTotal["Filledchk$ind"] += $subTotSubchecklists:$allTotal["Filledchk$ind"] = $subTotSubchecklists;
		}
		$data["allTotal"] = $allTotal;
		$data["reportData"] = $result;
		$this->load->view("reports/compliances/prgrm_visits_chklsts",$data);
	}
}