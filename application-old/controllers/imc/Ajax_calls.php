<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ajax_calls extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		//authentication();
		$this -> load -> model ('Imc_model');
	}
	//============================ Constructor Function Ends ============================//
	
	public function gois($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_gois",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_gois_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/gois",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function mnch($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_mnch",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_mnch_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/mnch",'','','',false,$serialNumber);

		echo json_encode($resultJson);
	}
	public function sba($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_sba",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_sba_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/sba",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	
	
	public function nutrition($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_nutrition",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_nutrition_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/nutrition",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function epi($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_epi",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_epi_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/epi",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function fp($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_fp",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_fp_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/fp",'','','',false,$serialNumber);

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
		$config['total_rows'] = $this->Imc_model->count_record("imc_lhw",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_lhw_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/lhw",'','','',false,$serialNumber);

		echo json_encode($resultJson);
	}
	public function malaria($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_malaria",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_malaria_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/malaria",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	public function tbc($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_tbc",$where,$like); 
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
		$tableData = $this -> Imc_model -> get_tbc_list($where,$like,$per_page,$startpoint);
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
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/tbc",'','','',false,$serialNumber);
	
		echo json_encode($resultJson);
	}
	public function hepatitis($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_hepatitis",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_hepatitis_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/hepatitis",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========Hiv Aid control program listing======//
	public function hivaid($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_hivaid",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_hivaid_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/hivaid",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - OPD Room listing======//
	public function opd($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_opd",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_opd_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/opd",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - Indoor Ward listing======//
	public function indoor($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_indoor",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_indoor_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/indoor",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - Labor Room listing======//
	public function labourroom($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_labourroom",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_labourroom_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/labourroom",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - Operation Theater listing======//
	public function ot($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_ot",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_ot_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/ot",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - RADIOLOGY & LABORATORY SERVICES listing======//
	public function rls($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_rls",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_rls_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/rls",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - LIST OF SURGICAL & OBSTETRICAL INSTRUMENTS  listing======//
	public function soi($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_soi",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_soi_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/soi",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - LIST OF ESSENTIAL MEDICINES STOCK OUT  listing======//
	public function medicine($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_medicine",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_medicine_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/medicine",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - HEALTH FACILITY STORE  listing======//
	public function hfstore($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_hfstore",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_hfstore_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/hfstore",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - HUMAN RESOURCE listing======//
	public function hr($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_hr",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_hr_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/hr",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
	//=========General Services - AVAILABLE STAFF TRAINED IN THE AREAS listing======//
	public function staff($page=0)
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
		$config['total_rows'] = $this->Imc_model->count_record("imc_staff",$where,$like); 
		$config['base_url'] ='#/';
		$page = ($page!='')? $page : 0;
		$config["cur_page"] = $page;
		$this->pagination->initialize($config);
		$resultJson["paging"] = $this->pagination->create_links();
		$tableData = $this -> Imc_model -> get_staff_list($where,$like,$per_page,$startpoint);
		$resultJson["tbody"] = getChklstListingAjaxTable($tableData,"imc/forms/staff",'','','',false,$serialNumber);
		echo json_encode($resultJson);
	}
}