<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Imc_model');
	}
	//============================ Constructor Function Ends ============================//
	
	public function gois()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_gois"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_gois_list("" ,"",$per_page,"");
		
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_gois_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_gois");
		$this->load->view('imc/gois_list',$data);
	}
	public function mnch()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_mnch"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_mnch_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_mnch_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_mnch");
		$this->load->view('imc/mnch_list',$data);
	}
	public function sba()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_sba"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_sba_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_sba_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_sba");
		$this->load->view('imc/sba_list',$data);
	}
	
	public function nutrition()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_nutrition"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_nutrition_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_nutrition_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_nutrition");
		$this->load->view('imc/nutrition_list',$data);
	}
	public function epi()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_epi"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_epi_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_epi_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_epi");
		$this->load->view('imc/epi_list',$data);
	}
	public function fp()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_fp"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_fp_list("" ,"",$per_page,"");
		
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_fp_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_fp");
		$this->load->view('imc/fp_list',$data);
	}
	public function lhw()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_lhw"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_lhw_list("" ,"",$per_page,"");
		
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_lhw_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_lhw");
		$this->load->view('imc/lhw_list',$data);
	}
	public function malaria()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_malaria"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_malaria_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_malaria_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_malaria");
		$this->load->view('imc/malaria_list',$data);
	}
	public function tbc()
	{
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_tbc"); // Some variable count
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_tbc_list("" ,"",$per_page,"");
		
		
		
		//$data["tableData"] = $this -> Imc_model -> get_tbc_list();
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_tbc");
		$this->load->view('imc/tbc_list',$data);
	}
	public function hepatitis() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_hepatitis"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_hepatitis_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_hepatitis");
		$this -> load -> view('imc/hepatitis_list', $data);
	}
	public function hivaid() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_hivaid"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_hivaid_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_hivaid");
		$this -> load -> view('imc/hivaid_list', $data);
	}
	public function opd() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_opd"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_opd_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_opd");
		$this -> load -> view('imc/opd_list', $data);
	}
	public function indoor() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_indoor"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_indoor_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_indoor");
		$this -> load -> view('imc/indoor_list', $data);
	}
		public function labourroom() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_labourroom"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_labourroom_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_labourroom");
		$this -> load -> view('imc/labourroom_list', $data);
	}
	public function ot() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_ot"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_ot_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_ot");
		$this -> load -> view('imc/ot_list', $data);
	}
	public function rls() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_rls"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_rls_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_rls");
		$this -> load -> view('imc/rls_list', $data);
	}
	public function soi() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_soi"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_soi_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_soi");
		$this -> load -> view('imc/soi_list', $data);
	}
	public function medicine() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_medicine"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_medicine_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_medicine");
		$this -> load -> view('imc/medicine_list', $data);
	}
	public function hfstore() {
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_hfstore"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_hfstore_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_hfstore");
		$this -> load -> view('imc/hfstore_list', $data);
	}
	public function hr(){
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_hr"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_hr_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_hr");
		$this -> load -> view('imc/hr_list', $data);
	}
	public function staff(){
		$per_page = $this->config->item("per_page");
		$config['total_rows'] = $this->Imc_model->count_record("imc_staff"); 
		$config['base_url'] ='#/';
		$this->pagination->initialize($config);
		$data["paging"] = $this->pagination->create_links();
		$data["tableData"] = $this -> Imc_model -> get_staff_list("" ,"",$per_page,"");
		$data["supervisors"] = $this -> Imc_model -> supervisor_dropdown("imc_staff");
		$this -> load -> view('imc/staff_list', $data);
	}
}