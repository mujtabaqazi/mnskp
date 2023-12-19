<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_calls extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		//authentication();
		$this -> load -> model ('Tbc_model');
	}
	//============================ Constructor Function Ends ============================//
	public function bmu($page=0)
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
		$config['total_rows'] = $this->Tbc_model->count_record("tbc_bmu",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Tbc_model -> get_bmu_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"tbc/forms/bmu",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
	//-----------------------mdr-----------------------------
	public function mdr($page=0)
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
		$config['total_rows'] = $this->Tbc_model->count_record("tbc_mdr",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Tbc_model -> get_mdr_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"tbc/forms/mdr",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
	//-----------------------stores-----------------------------
	public function stores($page=0)
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
		$config['total_rows'] = $this->Tbc_model->count_record("tbc_stores",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Tbc_model -> get_mdr_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"tbc/forms/stores",'','','',false,$serialNumber);
		
		echo json_encode($resultJson);
	}
}