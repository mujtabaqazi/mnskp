<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Lhw_model');
	}
	//============================ Constructor Function Ends ============================//
	//================= District Implementation Unit Portion Started ====================//
	//for dpiu
	public function dpiu($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('lhw/dpiu_form',$data);
	}
	//for dpiu view
	public function dpiu_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_dpiu",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Lhw_model -> get_previous('lhw_dpiu',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('lhw/dpiu_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for dpiu Compare view
	public function dpiu_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("lhw_dpiu",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_dpiu",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('lhw/dpiu_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit dpiu checklist
	public function dpiu_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_dpiu",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('lhw/dpiu_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save dpiu
	public function save_dpiu($id=0)
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
			$data = $this -> Common_model -> update_record("lhw_dpiu",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("lhw_dpiu",$data);
		}
		if($data > 0){
			redirect('lhw/listing/dpiu',$data);
		}else{
			redirect(base_url()."404");//echo "Error";
		}
	}
	//====================== Health Facility Portion Started ==========================//
	//for hf
	public function hf($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('lhw/hf_form',$data);
	}
	//for hf view
	public function hf_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_hf",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Lhw_model -> get_previous('lhw_hf',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('lhw/hf_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for hf Compare view
	public function hf_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("lhw_hf",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_hf",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('lhw/hf_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit hf checklist
	public function hf_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_hf",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('lhw/hf_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save hf
	public function save_hf($id=0)
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
			$data = $this -> Common_model -> update_record("lhw_hf",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("lhw_hf",$data);
		}
		if($data > 0){
			redirect('lhw/listing/hf',$data);
		}else{
			redirect(base_url()."404");//echo "Error";
		}
	}
	//====================== Lady Health Supervisor Portion Started ==========================//
	//for lhs
	public function lhs($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('lhw/lhs_form',$data);
	}
	//for lhs view
	public function lhs_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_lhs",$vpvc_id,"vpvc_id",NULL,$extraWhere);	
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov,'lhscode'=>$data["DataRow"]->lhscode);
		$previous=$this ->Lhw_model -> get_previous('lhw_lhs',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('lhw/lhs_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for lhs Compare view
	public function lhs_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("lhw_lhs",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_lhs",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('lhw/lhs_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit lhs checklist
	public function lhs_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_lhs",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('lhw/lhs_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save lhs
	public function save_lhs($id=0)
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
			$data = $this -> Common_model -> update_record("lhw_lhs",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("lhw_lhs",$data);
		}
		if($data > 0){
			redirect('lhw/listing/lhs',$data);
		}else{
			redirect(base_url()."404");//echo "Error";
		}
	}
	//====================== Health House & Lady Health Workers Portion Started ==========================//
	//for lhw
	public function lhw($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('lhw/lhw_form',$data);
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
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_lhw",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov,'lhwcode'=>$data["DataRow"]->lhwcode);
		$previous=$this ->Lhw_model -> get_previous('lhw_lhw',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('lhw/lhw_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for lhw Compare view
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
		$data["CompareRow"] = $this -> Common_model -> get_info("lhw_lhw",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_lhw",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('lhw/lhw_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
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
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_lhw",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('lhw/lhw_form_edit',$data);
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
			$data = $this -> Common_model -> update_record("lhw_lhw",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("lhw_lhw",$data);
		}
		if($data > 0){
			redirect('lhw/listing/lhw',$data);
		}else{
			redirect(base_url()."404");//echo "Error";
		}
	}
	//====================== Logistics Monitoring/Evaluation Portion Started ==========================//
	//for lmne
	public function lmne($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('lhw/lmne_form',$data);
	}
	//for lmne view
	public function lmne_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_logistics",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Lhw_model -> get_previous('lhw_logistics',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('lhw/lmne_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for lhw lmne view
	public function lmne_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("lhw_logistics",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_logistics",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('lhw/lmne_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit lmne checklist
	public function lmne_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_logistics",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('lhw/lmne_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save lmne
	public function save_lmne($id=0) {
		$data=array();
		$formats = array("d.m.Y","d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value) {
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format) {
				if($key == "supply_avg_time") {
				}
				else {
					$date = DateTime::createFromFormat($format, $data[$key]);
					if ($date == false || !(date_format($date,$format) == $data[$key]) ) {
					}
					else{
						$data[$key] = date("Y-m-d",strtotime($data[$key]));
					}
				}
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		$data["supply_avg_time"]="";
		if($this->input->post("supply_avg_time[0]")!='') {
			$data["supply_avg_time"] .= $this->input->post("supply_avg_time[0]")." week(s) ";
			unset($data["supply_avg_time[0]"]);
		}

		if($this->input->post("supply_avg_time[1]")!='') {
			$data["supply_avg_time"] .= $this->input->post("supply_avg_time[1]")." month(s) ";
			unset($data["supply_avg_time[1]"]);
		}

		if($id>0) {
			$data = $this -> Common_model -> update_record("lhw_logistics",$data,array("id" => $id));
		}
		else {
			$data = $this -> Common_model -> insert_record("lhw_logistics",$data);
		}

		if($data > 0) {
			redirect('lhw/listing/lmne',$data);
		}
		else{
			redirect(base_url()."404");//echo "Error";
		}
	}
	
	//====================== District Tour Report Portion Started ==========================//
	//for dtr
	public function dtr($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('lhw/dtr_form',$data);
	}
	//for dtr view
	public function dtr_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_dtr",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'distcode'=>$data["DataRow"]->distcode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Lhw_model -> get_previous('lhw_dtr',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('lhw/dtr_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for dtr Compare view
	public function dtr_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("lhw_dtr",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_dtr",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('lhw/dtr_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit dtr checklist
	public function dtr_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("lhw_dtr",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('lhw/dtr_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save dtr
	public function save_dtr($id=0)
	{
		$data=array();
		$formats = array("d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='on')?1:(($value=='')?NULL:$value);
			foreach ($formats as $format)
			{
				if($key == "supply_avg_time")
				{
				}else{
					$date = DateTime::createFromFormat($format, $data[$key]);
					if ($date == false || !(date_format($date,$format) == $data[$key]) ) 
					{}
					else
					{
						$data[$key] = date("Y-m-d",strtotime($data[$key]));
					}
				}				
			}
		}
		$data["submitted_by"]=$this -> session -> id;
		$data["date_submitted"]=date("Y-m-d");
		if($id>0)
		{
			$data = $this -> Common_model -> update_record("lhw_dtr",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("lhw_dtr",$data);
		}
		if($data > 0){
			redirect('lhw/listing/dtr',$data);
		}else{
			redirect(base_url()."404");//echo "Error";
		}
	}
}