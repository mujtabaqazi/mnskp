<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model('Tbc_model');
	}
	//============================ Constructor Function Ends ============================//
	public function bmu() {
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
		$config['total_rows'] = $this->Tbc_model->count_record("tbc_bmu"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Tbc_model -> get_bmu_list("" ,"",$per_page,"");
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
		$this -> load -> view('tbc/bmu_list', $data);
	}
	//========================mdr==================================
	public function mdr() {
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
		$config['total_rows'] = $this->Tbc_model->count_record("tbc_mdr"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Tbc_model -> get_mdr_list("" ,"",$per_page,"");
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
		$this -> load -> view('tbc/mdr_list', $data);
	}
	//========================stores==================================
	public function stores() {
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
		$config['total_rows'] = $this->Tbc_model->count_record("tbc_stores"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Tbc_model -> get_stores_list("" ,"",$per_page,"");
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
		$this -> load -> view('tbc/stores_list', $data);
	}
}