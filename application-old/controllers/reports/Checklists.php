<?php
//rajaimranqamer
//pace technologies
//2017-06-02
defined('BASEPATH') OR exit('No direct script access allowed');
class Checklists extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('reports/Checklists_model','moon');//Alias
		$this->load->library("Reportfilters");
		$this->load->helper("report_functions");
	}
	public function index($reportFunName)
	{
		$ulevel = $this -> session -> userLevel;
		$functionName = $this -> uri -> segment (1);
		$reportPath = base_url()."Reports/".$functionName;
		$reportTitle = "Report Filters";
		$reportPeriod = array('month-from-to');//array('monthly','allyear');
		$dataHtml = $this->reportfilters->filtersHeader($reportPath,$reportTitle);
		$dataHtml .= $this->reportfilters->createReportFilters(true,false,false,false,$reportPeriod);
		$dataHtml .= $this->reportfilters->filtersFooter();
		$data["filters"] = $dataHtml;
		$this->load->view("reports/filters",$data);
	}
	public function filled_chklsts_status($reportforcode=NULL,/* $reportyear=NULL */$monthfrom=NULL, $monthto=NULL)
	{
		$data["distcode"] = $distcode = isset($_REQUEST["distcode"])?$_REQUEST["distcode"]:(($reportforcode)?$reportforcode:0);
		$data["monthfrom"] = $monthfrom = isset($_REQUEST["monthfrom"])?$_REQUEST["monthfrom"]:(($monthfrom)?$monthfrom:0);
		$data["monthto"] = $monthto = isset($_REQUEST["monthto"])?$_REQUEST["monthto"]:(($monthto)?$monthto:0);
		$result = $this->moon->filled_chklsts_status($distcode,$monthfrom/* $year */,$monthto/* $month */);
		$data["reportTitle"] = "Checklists wise Planned & Filled Status";
		if($distcode>0){
			$data["reportTitle"] .= " of District: ". get_District_Name($distcode);
		}
		if($monthfrom>0){
			$data["reportTitle"] .= " From : ". $monthfrom;
			if($monthto>0){
				$data["reportTitle"] .= " To : ". $monthto;
			}
		}
		/* if($year>0){
			$data["reportTitle"] .= " For Year: ". $year;
			if($month>0){
				$data["reportTitle"] .= " , Month: ". $month;
			}
		} */
		$data["allTotal"] = "custom count";
		$data["reportData"] = $result;
		//for exporting
		if($this ->input -> post('export_excel')) {
			header("Content-type: application/octet-stream");
			header("Content-Disposition: attachment; filename=\"".$data["reportTitle"].".xls\"");
			header("Pragma: no-cache");
			header("Expires: 0");
		}
		$this->load->view("reports/others/filled_chklsts_status",$data);
	}
}