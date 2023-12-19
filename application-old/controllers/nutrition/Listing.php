<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model('Nutrition_model');
		
	}
	//============================ Constructor Function Ends ============================//
	public function stabilization() {
		/*
		 //Code for Pagination
		 $page = (int)(!($this -> input -> get('page')) ? 1 : $this -> input -> get('page'));
		 if ($page <= 0){
		 $page = 1;
		 }
		  // Set how many records do you want to display per page.
		 $startpoint = ($page * $per_page) - $per_page;
		 $statement = "aefi_rep"; // Change `records` according to your table name.
		 */
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Nutrition_model->count_record("nutrition_stabilization"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Nutrition_model -> get_stabilization_list("" ,"",$per_page,"");
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
		
		
		$this -> load -> view('nutrition/stabilization_list', $data);
	}
	public function iycf() {
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
		$config['total_rows'] = $this->Nutrition_model->count_record("nutrition_iycf"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Nutrition_model -> get_iycf_list("","",$per_page,"");
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
		$this -> load -> view('nutrition/iycf_list', $data);
	}
	public function mmhf() {
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
		$config['total_rows'] = $this->Nutrition_model->count_record("nutrition_mmhf"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Nutrition_model -> get_mmhf_list("","",$per_page,"");
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
		$this -> load -> view('nutrition/mmhf_list', $data);
	}
	public function smc() {
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
		$config['total_rows'] = $this->Nutrition_model->count_record("nutrition_smc"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Nutrition_model -> get_smc_list("","",$per_page,"");
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
		$this -> load -> view('nutrition/smc_list', $data);
	}
	public function warehouse() {
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
		$config['total_rows'] = $this->Nutrition_model->count_record("nutrition_warehouse"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Nutrition_model -> get_warehouse_list("","",$per_page,"");
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
		$this -> load -> view('nutrition/warehouse_list', $data);
	}
}