<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Mnch_model');
	}
	//============================ Constructor Function Ends ============================//
	//================= Monthly Monitoring of CMW... Checklist Portion Started ====================//
	//for mmschool
	public function mmschool($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mnch/mmschool_form',$data);
	}
	//for mmschool view
	public function mmschool_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_mmschool",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mnch_model -> get_previous('mnch_mmschool',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('mnch/mmschool_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for mmschool Compare view
	public function mmschool_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mnch_mmschool",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_mmschool",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mnch/mmschool_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit mmschool checklist
	public function mmschool_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_mmschool",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mnch/mmschool_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save mmschool
	public function save_mmschool($id=0)
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
			$data = $this -> Common_model -> update_record("mnch_mmschool",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mnch_mmschool",$data);
		}
		if($data > 0){
			redirect('mnch/listing/mmschool',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= MNCH - Six Monthly Monitoring of CMW/Nursing & Midwifery/ Public Health Schools ====================//
	//for smschool
	public function smschool($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mnch/smschool_form',$data);
	}
	//for smschool view
	public function smschool_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_smschool",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mnch_model -> get_previous('mnch_smschool',$wc);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('mnch/smschool_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for smschool Compare view
	public function smschool_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mnch_smschool",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_smschool",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mnch/smschool_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit smschool checklist
	public function smschool_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_smschool",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mnch/smschool_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save smschool
	public function save_smschool($id=0)
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
			$data = $this -> Common_model -> update_record("mnch_smschool",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mnch_smschool",$data);
		}
		if($data > 0){
			redirect('mnch/listing/smschool',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= CMW Technical Monitoring Checklist Portion Started ====================//
	//for tmc
	public function tmc($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mnch/tmc_form',$data);
	}
	//for tmc view
	public function tmc_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_tmc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov,'cmwcode'=>$data["DataRow"]->cmwcode);
		$previous=$this ->Mnch_model -> get_previous('mnch_tmc',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('mnch/tmc_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for tmc Compare view
	public function tmc_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mnch_tmc",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_tmc",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mnch/tmc_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit tmc checklist
	public function tmc_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_tmc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mnch/tmc_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save tmc
	public function save_tmc($id=0)
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
			$data = $this -> Common_model -> update_record("mnch_tmc",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mnch_tmc",$data);
		}
		if($data > 0){
			redirect('mnch/listing/tmc',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= CMW Administrative Supervisory Checklist Portion Started ====================//
	//for asc
	public function asc($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$data["cmwDataRow"] = getcmwdetails($data["vpvcDataRow"]->target_value);
		$this->load->view('mnch/asc_form',$data);
	}
	//for asc view
	public function asc_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_asc",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov,'cmwcode'=>$data["DataRow"]->cmwcode);
		$previous=$this ->Mnch_model -> get_previous('mnch_asc',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('mnch/asc_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for asc Compare view
	public function asc_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mnch_asc",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_asc",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mnch/asc_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit asc checklist
	public function asc_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_asc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mnch/asc_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save asc
	public function save_asc($id=0)
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
			$data = $this -> Common_model -> update_record("mnch_asc",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mnch_asc",$data);
		}
		if($data > 0){
			redirect('mnch/listing/asc',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= Status Checklist for B and C EmONC Facilities Portion Started ====================//
	//for emonc
	public function emonc($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$data["cmwDataRow"] = getcmwdetails($data["vpvcDataRow"]->target_value);
		$this->load->view('mnch/emonc_form',$data);
	}
	//for emonc view
	public function emonc_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_emonc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mnch_model -> get_previous('mnch_emonc',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('mnch/emonc_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for emonc Compare view
	public function emonc_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mnch_emonc",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_emonc",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mnch/emonc_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit emonc checklist
	public function emonc_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mnch_emonc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mnch/emonc_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save emonc
	public function save_emonc($id=0)
	{
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		$_POST["managed_by"]=(isset($_POST) && $_POST["managed_by_text"]!="")?$_POST["managed_by_text"]:$_POST["managed_by"];
		unset($_POST["managed_by_text"]);
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
			$data = $this -> Common_model -> update_record("mnch_emonc",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mnch_emonc",$data);
		}
		if($data > 0){
			redirect('mnch/listing/emonc',$data);
		}else{
			redirect(base_url()."404");
		}
	}
}