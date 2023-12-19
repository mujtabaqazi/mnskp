<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_calls extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Lhw_model');
	}
	//============================ Constructor Function Ends ============================//
	public function dpiu($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
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
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_dpiu",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		//print_r($where);exit;
		/*
		//Code for Pagination
		$page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = 30; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;		
		$statement = "aefi_rep"; // Change `records` according to your table name. 
		*/
		$tableData = $this -> Lhw_model -> get_dpiu_list($where,$like,$per_page,$startpoint);
		/* $data['pagination'] = $this -> Common_model -> pagination($statement,$per_page,$page,$url='?');
		
		$data['startpoint'] = $startpoint;
		$data['UserLevel'] = $this -> session -> UserLevel; */
		//if($data != 0){
		//$data['data']=$data;
		//$data['fileToLoad'] = 'data_entry/aefi_list';
		//$data['pageTitle']='EPI-MIS | Adverse Events Following Immunisation (AEFI) Reports';
		//$this->load->view('template/epi_template',$data);
		/* }
		else{
			$data['message'] ="You must have rights to access this page.";
			$this -> load -> view ('message',$data);
		} */
		//print_r($tableData);exit;
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"lhw/forms/dpiu",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function hf($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
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
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_hf",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		//print_r($where);exit;
		/*
		//Code for Pagination
		$page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = 30; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;		
		$statement = "aefi_rep"; // Change `records` according to your table name. 
		*/
		$tableData = $this -> Lhw_model -> get_hf_list($where,$like,$per_page,$startpoint);
		/* $data['pagination'] = $this -> Common_model -> pagination($statement,$per_page,$page,$url='?');
		
		$data['startpoint'] = $startpoint;
		$data['UserLevel'] = $this -> session -> UserLevel; */
		//if($data != 0){
		//$data['data']=$data;
		//$data['fileToLoad'] = 'data_entry/aefi_list';
		//$data['pageTitle']='EPI-MIS | Adverse Events Following Immunisation (AEFI) Reports';
		//$this->load->view('template/epi_template',$data);
		/* }
		else{
			$data['message'] ="You must have rights to access this page.";
			$this -> load -> view ('message',$data);
		} */
		//print_r($tableData);exit;
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"lhw/forms/hf",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function lhs($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
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
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_lhs",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		//print_r($where);exit;
		/*
		//Code for Pagination
		$page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = 30; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;		
		$statement = "aefi_rep"; // Change `records` according to your table name. 
		*/
		$tableData = $this -> Lhw_model -> get_lhs_list($where,$like,$per_page,$startpoint);
		/* $data['pagination'] = $this -> Common_model -> pagination($statement,$per_page,$page,$url='?');
		
		$data['startpoint'] = $startpoint;
		$data['UserLevel'] = $this -> session -> UserLevel; */
		//if($data != 0){
		//$data['data']=$data;
		//$data['fileToLoad'] = 'data_entry/aefi_list';
		//$data['pageTitle']='EPI-MIS | Adverse Events Following Immunisation (AEFI) Reports';
		//$this->load->view('template/epi_template',$data);
		/* }
		else{
			$data['message'] ="You must have rights to access this page.";
			$this -> load -> view ('message',$data);
		} */
		//print_r($tableData);exit;
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"lhw/forms/lhs",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function lhw($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
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
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_lhw",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		//print_r($where);exit;
		/*
		//Code for Pagination
		$page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = 30; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;		
		$statement = "aefi_rep"; // Change `records` according to your table name. 
		*/
		$tableData = $this -> Lhw_model -> get_lhw_list($where,$like,$per_page,$startpoint);
		/* $data['pagination'] = $this -> Common_model -> pagination($statement,$per_page,$page,$url='?');
		
		$data['startpoint'] = $startpoint;
		$data['UserLevel'] = $this -> session -> UserLevel; */
		//if($data != 0){
		//$data['data']=$data;
		//$data['fileToLoad'] = 'data_entry/aefi_list';
		//$data['pageTitle']='EPI-MIS | Adverse Events Following Immunisation (AEFI) Reports';
		//$this->load->view('template/epi_template',$data);
		/* }
		else{
			$data['message'] ="You must have rights to access this page.";
			$this -> load -> view ('message',$data);
		} */
		//print_r($tableData);exit;
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"lhw/forms/lhw",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function lmne($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
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
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_logistics",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		//print_r($where);exit;
		/*
		//Code for Pagination
		$page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = 30; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;		
		$statement = "aefi_rep"; // Change `records` according to your table name. 
		*/
		$tableData = $this -> Lhw_model -> get_lmne_list($where,$like,$per_page,$startpoint);
		/* $data['pagination'] = $this -> Common_model -> pagination($statement,$per_page,$page,$url='?');
		
		$data['startpoint'] = $startpoint;
		$data['UserLevel'] = $this -> session -> UserLevel; */
		//if($data != 0){
		//$data['data']=$data;
		//$data['fileToLoad'] = 'data_entry/aefi_list';
		//$data['pageTitle']='EPI-MIS | Adverse Events Following Immunisation (AEFI) Reports';
		//$this->load->view('template/epi_template',$data);
		/* }
		else{
			$data['message'] ="You must have rights to access this page.";
			$this -> load -> view ('message',$data);
		} */
		//print_r($tableData);exit;
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"lhw/forms/lmne",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function dtr($page=0)
	{
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
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
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_dtr",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		//print_r($where);exit;
		/*
		//Code for Pagination
		$page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		if ($page <= 0){ 
			$page = 1;
		}
		$per_page = 30; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;		
		$statement = "aefi_rep"; // Change `records` according to your table name. 
		*/
		$tableData = $this -> Lhw_model -> get_dtr_list($where,$like,$per_page,$startpoint);
		/* $data['pagination'] = $this -> Common_model -> pagination($statement,$per_page,$page,$url='?');
		
		$data['startpoint'] = $startpoint;
		$data['UserLevel'] = $this -> session -> UserLevel; */
		//if($data != 0){
		//$data['data']=$data;
		//$data['fileToLoad'] = 'data_entry/aefi_list';
		//$data['pageTitle']='EPI-MIS | Adverse Events Following Immunisation (AEFI) Reports';
		//$this->load->view('template/epi_template',$data);
		/* }
		else{
			$data['message'] ="You must have rights to access this page.";
			$this -> load -> view ('message',$data);
		} */
		//print_r($tableData);exit;
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"lhw/forms/dtr",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
}