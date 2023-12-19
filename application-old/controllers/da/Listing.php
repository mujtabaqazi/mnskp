<?php
//by: rajaimranqamer@gmail.com, date: 2017-01-13
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Da_model');
	}
	//============================ Constructor Function Ends ============================//
	public function lqas()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Da_model->count_record("da_lqas"); 
		$config['base_url'] ='#';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Da_model -> get_lqas_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Da_model -> supervisor_dropdown();
		$this->load->view('da/lqas_list',$data);
	}
	public function mnecellact()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Da_model->count_record("da_mnecellact"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Da_model -> get_mne_list("" ,"",$per_page,"");
		$this->load->view('da/mne_list',$data);
	}
	public function facilityact(){
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Da_model->count_record("da_dhisfacilityact"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Da_model -> get_facilityact_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Da_model -> get_facilityact_list();
		$data["supervisors"] = $this -> Da_model -> supervisor_dropdown('da_dhisfacilityact');
		$this->load->view('da/facilityact_list',$data);
	}
}
