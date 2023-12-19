<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Hcp_model');
	}
	//============================ Constructor Function Ends ============================//
	public function monitoring()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Hcp_model->count_record("hcp_monitoring"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Hcp_model -> get_monitoring_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Hcp_model -> get_monitoring_list();
		$data["supervisors"] = $this -> Hcp_model -> supervisor_dropdown();
		$this->load->view('hcp/monitoring_list',$data);
	}
}