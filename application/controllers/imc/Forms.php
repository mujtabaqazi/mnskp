<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Imc_model');
	}
	//============================ Constructor Function Ends ============================//
	//================= SBA Technical Monitoring Checklist Portion Started ====================//
	//for sba
	public function sba($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/sba_form',$data);
	}
	//for sba view
	public function sba_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_sba",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_sba',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			//$data['previous']=$previous;
			$this->load->view('imc/sba_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit sba checklist
	public function sba_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_sba",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/sba_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save sba
	public function save_sba($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_sba",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_sba",$data);
		}
		if($data > 0){
			redirect('imc/listing/sba',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for sba Compare view
	public function sba_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_sba",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_sba",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/sba_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//================= General Outlook - Instrument and Service Availability  Portion Started ====================//
	//for gois
	public function gois($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/gois_form',$data);
	}
	//for gois view
	public function gois_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data['domain'] = $this->session->userdata('domain');
		$data["DataRow"] = $this -> Common_model -> get_info("imc_gois",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_gois',$wc);
					
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/gois_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit gois checklist
	public function gois_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_gois",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/gois_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save gois
	public function save_gois($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_gois",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_gois",$data);
		}
		if($data > 0){
			redirect('imc/listing/gois',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function gois_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_gois",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_gois",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/gois_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= MNCH Technical Monitoring Checklist Portion Started ====================//
	//for mnch
	public function mnch($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/mnch_form',$data);
	}
	//for mnch view
	public function mnch_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_mnch",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_mnch',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/mnch_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit mnch checklist
	public function mnch_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_mnch",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/mnch_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save mnch
	public function save_mnch($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_mnch",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_mnch",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/mnch',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function mnch_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_mnch",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_mnch",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/mnch_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= Nutrition Technical Monitoring Checklist Portion Started ====================//
	//for nutrition
	public function nutrition($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/nutrition_form',$data);
	}
	//for nutrition view
	public function nutrition_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_nutrition",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_nutrition',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/nutrition_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit nutrition checklist
	public function nutrition_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_nutrition",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/nutrition_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save nutrition
	public function save_nutrition($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_nutrition",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_nutrition",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/nutrition',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function nutrition_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_nutrition",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_nutrition",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/nutrition_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= EPI Technical Monitoring Checklist Portion Started ====================//
	//for epi
	public function epi($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/epi_form',$data);
	}
	//for epi view
	public function epi_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_epi",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_epi',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/epi_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit epi checklist
	public function epi_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_epi",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/epi_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save epi
	public function save_epi($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_epi",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_epi",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/epi',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function epi_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_epi",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_epi",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/epi_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= FP Technical Monitoring Checklist Portion Started ====================//
	//for fp
	public function fp($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/fp_form',$data);
	}
	//for fp view
	public function fp_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_fp",$vpvc_id,"vpvc_id",NULL,$extraWhere);	
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_fp',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/fp_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit fp checklist
	public function fp_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_fp",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/fp_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save fp
	public function save_fp($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_fp",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_fp",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/fp',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function fp_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_fp",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_fp",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/fp_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= LHW Technical Monitoring Checklist Portion Started ====================//
	//for lhw
	public function lhw($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/lhw_form',$data);
	}
	//for lhw view
	public function lhw_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_lhw",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_lhw',$wc);
				
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/lhw_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit lhw checklist
	public function lhw_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_lhw",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/lhw_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save lhw
	public function save_lhw($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_lhw",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_lhw",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/lhw',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function lhw_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_lhw",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_lhw",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/lhw_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= Malaria Technical Monitoring Checklist Portion Started ====================//
	//for malaria
	public function malaria($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/malaria_form',$data);
	}
	//for malaria view
	public function malaria_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_malaria",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_malaria',$wc);
				
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/malaria_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit malaria checklist
	public function malaria_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_malaria",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/malaria_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save malaria
	public function save_malaria($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_malaria",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_malaria",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/malaria',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function malaria_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_malaria",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_malaria",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/malaria_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= TBC Technical Monitoring Checklist Portion Started ====================//
	//for tbc
	public function tbc($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('imc/tbc_form',$data);
	}
	//for malaria view
	public function tbc_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_tbc",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_tbc',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('imc/tbc_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit malaria checklist
	public function tbc_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("imc_tbc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('imc/tbc_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save malaria
	public function save_tbc($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
				{}
				else
				{
					$data[$key] = date("Y-m-d",strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("imc_tbc",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("imc_tbc",$data);
		}
		if($data > 0){
			//print_r($data);exit();
			redirect('imc/listing/tbc',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	public function tbc_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode); 
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_tbc",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_tbc",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/tbc_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//================for Hepatitis Control Services===========================//
	public function hepatitis($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/hepatitis_form', $data);
	}

	public function hepatitis_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hepatitis", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_hepatitis',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/hepatitis_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function hepatitis_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hepatitis", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/hepatitis_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}

	public function save_hepatitis($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_hepatitis", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_hepatitis", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/hepatitis', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function hepatitis_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_hepatitis",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hepatitis",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/hepatitis_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================for HIV-AIDS Control Services===========================//
	public function hivaid($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/hivaid_form', $data);
	}

	public function hivaid_view($vpvc_id) {
		
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hivaid", $vpvc_id, "vpvc_id",NULL);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_hivaid',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/hivaid_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function hivaid_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hivaid", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{	
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/hivaid_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_hivaid($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			
			$data = $this -> Common_model -> update_record("imc_hivaid", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_hivaid", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/hivaid', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function hivaid_compare()
	{
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_hivaid",$query_array['current'],"vpvc_id",NULL);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hivaid",$query_array['compareto'],"vpvc_id",NULL);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/hivaid_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - OPD Room===========================//
	public function opd($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/opd_form', $data);
	}

	public function opd_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_opd", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_opd',$wc);
		//$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/opd_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function opd_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_opd", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/opd_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_opd($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_opd", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_opd", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/opd', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function opd_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_opd",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_opd",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/opd_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - INDOOR WARD===========================//
	public function indoor($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/indoor_form', $data);
	}

	public function indoor_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_indoor", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_indoor',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/indoor_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function indoor_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_indoor", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/indoor_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_indoor($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_indoor", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_indoor", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/indoor', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function indoor_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_indoor",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_indoor",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/indoor_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - LABOR ROOM===========================//
	public function labourroom($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/labourroom_form', $data);
	}

	public function labourroom_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_labourroom", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_labourroom',$wc);
		
		//$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/labourroom_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function labourroom_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_labourroom", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/labourroom_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_labourroom($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_labourroom", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_labourroom", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/labourroom', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function labourroom_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_labourroom",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_labourroom",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/labourroom_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - Operation Theater===========================//
	public function ot($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/ot_form', $data);
	}

	public function ot_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_ot", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_ot',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/ot_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function ot_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_ot", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/ot_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_ot($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_ot", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_ot", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/ot', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function ot_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_ot",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_ot",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/ot_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - RADIOLOGY & LABORATORY SERVICES===========================//
	public function rls($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/rls_form', $data);
	}

	public function rls_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}

		$data["DataRow"] = $this -> Common_model -> get_info("imc_rls", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_rls',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/rls_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function rls_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_rls", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/rls_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_rls($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_rls", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_rls", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/rls', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function rls_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_rls",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_rls",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/rls_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - LIST OF SURGICAL & OBSTETRICAL INSTRUMENTS===========================//
	public function soi($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/soi_form', $data);
	}

	public function soi_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		
		$data["DataRow"] = $this -> Common_model -> get_info("imc_soi", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_soi',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/soi_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function soi_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_soi", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/soi_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_soi($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_soi", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_soi", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/soi', $data);
			
		} else {
			redirect(base_url()."404");
		}
	}
	public function soi_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_soi",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_soi",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/soi_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - LIST OF ESSENTIAL MEDICINES STOCK OUT===========================//
	public function medicine($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/medicine_form', $data);
	}

	public function medicine_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		
		$data["DataRow"] = $this -> Common_model -> get_info("imc_medicine", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_medicine',$wc);

		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/medicine_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function medicine_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_medicine", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/medicine_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_medicine($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_medicine", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_medicine", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/medicine', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function medicine_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_medicine",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_medicine",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/medicine_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - HEALTH FACILITY STORE===========================//
	public function hfstore($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/hfstore_form', $data);
	}

	public function hfstore_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hfstore", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_hfstore',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/hfstore_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function hfstore_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hfstore", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/hfstore_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_hfstore($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_hfstore", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_hfstore", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/hfstore', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function hfstore_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_hfstore",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hfstore",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/hfstore_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - Human Resource===========================//
	public function hr($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/hr_form', $data);
	}

	public function hr_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hr", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_hr',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/hr_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function hr_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hr", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/hr_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_hr($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_hr", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_hr", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/hr', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function hr_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_hr",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_hr",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/hr_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================General Services - AVAILABLE STAFF TRAINED IN THE AREAS===========================//
	public function staff($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('imc/staff_form', $data);
	}

	public function staff_view($vpvc_id) {
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_staff", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Imc_model -> get_previous('imc_staff',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('imc/staff_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function staff_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("imc_staff", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('imc/staff_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	public function save_staff($id = 0) {
		$data = array();
		$formats = array("d.m.Y", "d/m/Y", "d-m-Y", "Y-m-d", "m-d-Y");
		foreach ($_POST as $key => $value) {
			$data[$key] = ($value == 'on') ? 1 : (($value == '') ? NULL : $value);
			foreach ($formats as $format) {
				$date = DateTime::createFromFormat($format, $data[$key]);
				if ($date == false || !(date_format($date, $format) == $data[$key])) {
				} else {
					$data[$key] = date("Y-m-d", strtotime($data[$key]));
				}
			}
		}
		$data["submitted_by"] = $this -> session -> id;
		$data["date_submitted"] = date("Y-m-d");
		if ($id > 0) {
			$data = $this -> Common_model -> update_record("imc_staff", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("imc_staff", $data);
		}
		if ($data > 0) {
			redirect('imc/listing/staff', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function staff_compare()
	{
		$ulevel = $this -> session -> userLevel;
		$query_array=array();
		parse_str($_SERVER["QUERY_STRING"], $query_array);
		if(isset($query_array)&& isset($query_array['current'])&& isset($query_array['compareto'])){
		$ulevel = $this -> session -> userLevel;
		
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["CompareRow"] = $this -> Common_model -> get_info("imc_staff",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("imc_staff",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('imc/staff_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
}