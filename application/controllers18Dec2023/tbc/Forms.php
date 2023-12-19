<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Tbc_model');
	}
	//============================ Constructor Function Ends ============================//
	//================= Monitoring Evaluation Checklist for Basic Management Unit (BMU) ====================//
	//for bmu
	public function bmu($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('tbc/bmu_form',$data);
	}
	//for bmu view
	public function bmu_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_bmu",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Tbc_model -> get_previous('tbc_bmu',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('tbc/bmu_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for bmu Compare view
	public function bmu_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("tbc_bmu",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_bmu",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('tbc/bmu_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit bmu checklist
	public function bmu_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_bmu",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('tbc/bmu_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save bmu
	public function save_bmu($id=0)
	{
		//print_r($_POST); exit();
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
			if(!$this->input->post('basic')){
				$data["basic"] = '';
			}
			if(!$this->input->post('refresher')){
				$data["refresher"] = '';
			}
			$data = $this -> Common_model -> update_record("tbc_bmu",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("tbc_bmu",$data);
		}
		if($data > 0){
			redirect('tbc/listing/bmu',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit ====================//
	//for mdr
	public function mdr($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('tbc/mdr_form',$data);
	}
	//for mdr view
	public function mdr_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_mdr",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Tbc_model -> get_previous('tbc_mdr',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["previous"] = $previous;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('tbc/mdr_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for mdr Compare view
	public function mdr_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("tbc_mdr",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_mdr",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('tbc/mdr_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit mdr checklist
	public function mdr_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_mdr",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('tbc/mdr_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save mdr
	public function save_mdr($id=0)
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
			$data = $this -> Common_model -> update_record("tbc_mdr",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("tbc_mdr",$data);
		}
		if($data > 0){
			redirect('tbc/listing/mdr',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= Monitoring checklist for Provincial warehouse/District stores ====================//
	//for stores
	public function stores($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('tbc/stores_form',$data);
	}
	//for stores view
	public function stores_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_stores",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Tbc_model -> get_previous('tbc_stores',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('tbc/stores_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for stores Compare view
	public function stores_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("tbc_stores",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_stores",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('tbc/stores_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit stores checklist
	public function stores_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("tbc_stores",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('tbc/stores_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save stores
	public function save_stores($id=0)
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
			$data = $this -> Common_model -> update_record("tbc_stores",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("tbc_stores",$data);
		}
		if($data > 0){
			redirect('tbc/listing/stores',$data);
		}else{
			redirect(base_url()."404");
		}
	}
}