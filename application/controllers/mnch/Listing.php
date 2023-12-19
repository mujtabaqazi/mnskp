<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Mnch_model');
	}
	//============================ Constructor Function Ends ============================//
	public function mmschool()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mnch_model->count_record("mnch_mmschool"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mnch_model -> get_mmschool_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Mnch_model -> supervisor_dropdown("mnch_mmschool");
		$this->load->view('mnch/mmschool_list',$data);
	}
	public function smschool()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mnch_model->count_record("mnch_smschool"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mnch_model -> get_smschool_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Mnch_model -> supervisor_dropdown("mnch_smschool");
		$this->load->view('mnch/smschool_list',$data);
	}
	public function tmc()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mnch_model->count_record("mnch_tmc"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mnch_model -> get_tmc_list("" ,"",$per_page,"");
		
		
		
		
		//$data["tableData"] = $this -> Mnch_model -> get_tmc_list();
		$data["supervisors"] = $this -> Mnch_model -> supervisor_dropdown("mnch_tmc");
		$this->load->view('mnch/tmc_list',$data);
	}
	public function asc()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mnch_model->count_record("mnch_asc"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mnch_model -> get_asc_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Mnch_model -> get_asc_list();
		$data["supervisors"] = $this -> Mnch_model -> supervisor_dropdown("mnch_asc");
		$this->load->view('mnch/asc_list',$data);
	}
	public function emonc()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Mnch_model->count_record("mnch_emonc"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Mnch_model -> get_emonc_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Mnch_model -> get_emonc_list();
		$data["supervisors"] = $this -> Mnch_model -> supervisor_dropdown("mnch_emonc");
		$this->load->view('mnch/emonc_list',$data);
	}
}