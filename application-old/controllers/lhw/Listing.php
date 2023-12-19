<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Lhw_model');
	}
	//============================ Constructor Function Ends ============================//
	public function dpiu()
	{
		
		////////////////////////////////////
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_dpiu"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Lhw_model -> get_dpiu_list("" ,"",$per_page,"");
		
		
		
		
		
		
		
		
		//$data["tableData"] = $this -> Lhw_model -> get_dpiu_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown();
		$this->load->view('lhw/dpiu_list',$data);
	}
	public function hf()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_hf"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Lhw_model -> get_hf_list("" ,"",$per_page,"");
		
		
		
		
		
		//$data["tableData"] = $this -> Lhw_model -> get_hf_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown("lhw_hf");
		$this->load->view('lhw/hf_list',$data);
	}
	public function lhs()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_lhs"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Lhw_model -> get_lhs_list("" ,"",$per_page,"");
		
		
		
		
		//$data["tableData"] = $this -> Lhw_model -> get_lhs_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown("lhw_lhs");
		$this->load->view('lhw/lhs_list',$data);
	}
	public function lhw()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_lhw"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Lhw_model -> get_lhw_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Lhw_model -> get_lhw_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown("lhw_lhw");
		$this->load->view('lhw/lhw_list',$data);
	}
	public function lmne()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_logistics"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Lhw_model -> get_lmne_list("" ,"",$per_page,"");
		
		
		
		
		
		
		//$data["tableData"] = $this -> Lhw_model -> get_lmne_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown("lhw_logistics");
		$this->load->view('lhw/lmne_list',$data);
	}
	public function dtr()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Lhw_model->count_record("lhw_dtr"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Lhw_model -> get_dtr_list("" ,"",$per_page,"");
		
		
		
		
		//$data["tableData"] = $this -> Lhw_model -> get_dtr_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown("lhw_dtr");
		$this->load->view('lhw/dtr_list',$data);
	}
	public function mtr()
	{
				
		$data["tableData"] = $this -> Lhw_model -> get_mtr_list();
		$data["supervisors"] = $this -> Lhw_model -> supervisor_dropdown("lhw_mtr");
		$this->load->view('lhw/mtr_list',$data);
	}
}
