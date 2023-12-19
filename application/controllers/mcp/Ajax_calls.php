<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_calls extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		//authentication();
		$this -> load -> model ('Mcp_model');
	}
	//============================ Constructor Function Ends ============================//
	public function llin($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
				//echo $value;
			}else{
				$where[$key] = $value;
			}			
		}
		unset($where["searchParam"]);
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = $this->config->item("per_page");
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_llin",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Mcp_model -> get_llin_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"mcp/forms/llin",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
	//-----------------------irs-----------------------------
	public function irs($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
				//echo $value;
			}else{
				$where[$key] = $value;
			}			
		}
		unset($where["searchParam"]);
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = $this->config->item("per_page");
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_irs",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Mcp_model -> get_irs_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"mcp/forms/irs",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
	//-----------------------mc-----------------------------
	public function mc($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
				//echo $value;
			}else{
				$where[$key] = $value;
			}			
		}
		unset($where["searchParam"]);
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = $this->config->item("per_page");
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_mc",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Mcp_model -> get_mc_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"mcp/forms/mc",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
	//-----------------------rdt-----------------------------
	public function rdt($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
				//echo $value;
			}else{
				$where[$key] = $value;
			}			
		}
		unset($where["searchParam"]);
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = $this->config->item("per_page");
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_rdt",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Mcp_model -> get_rdt_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"mcp/forms/rdt",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
}