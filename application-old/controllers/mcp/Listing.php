<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model('Mcp_model');
	}
	//============================ Constructor Function Ends ============================//
	public function llin() {
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
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_llin"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mcp_model -> get_llin_list("" ,"",$per_page,"");
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
		$this -> load -> view('mcp/llin_list', $data);
	}
	//========================irs==================================
	public function irs() {
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
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_irs"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mcp_model -> get_irs_list("" ,"",$per_page,"");
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
		$this -> load -> view('mcp/irs_list', $data);
	}
	//========================mc==================================
	public function mc() {
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
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_mc"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mcp_model -> get_mc_list("" ,"",$per_page,"");
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
		$this -> load -> view('mcp/mc_list', $data);
	}
	//========================rdt==================================
	public function rdt() {
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
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mcp_model->count_record("mcp_rdt"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mcp_model -> get_rdt_list("" ,"",$per_page,"");
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
		$this -> load -> view('mcp/rdt_list', $data);
	}
}