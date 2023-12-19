<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model('Common_model');
		$this -> load -> model('Nutrition_model');
	}

	//============================ Constructor Function Ends ============================//
	//for nutrition stabilization
	public function stabilization($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('nutrition/stabilization_form', $data);
	}

	public function stabilization_view($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_stabilization", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Nutrition_model -> get_previous('nutrition_stabilization',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this -> load -> view('nutrition/stabilization_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for stabilization Compare view
	public function stabilization_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("nutrition_stabilization",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_stabilization",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('nutrition/stabilization_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	public function stabilization_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_stabilization", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('nutrition/stabilization_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}

	public function save_stabilization($id = 0) {
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
			$data = $this -> Common_model -> update_record("nutrition_stabilization", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("nutrition_stabilization", $data);
		}
		if ($data > 0) {
			redirect('nutrition/listing/stabilization', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	//for nutrition iycf
	public function iycf($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('nutrition/iycf_form', $data);
	}
	public function iycf_view($vpvc_id) {

		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		//$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_iycf", $vpvc_id, "vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Nutrition_model -> get_previous('nutrition_iycf',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('nutrition/iycf_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}

	public function iycf_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_iycf", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('nutrition/iycf_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}

	public function save_iycf($id = 0) {
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
			$data = $this -> Common_model -> update_record("nutrition_iycf", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("nutrition_iycf", $data);
		}
		if ($data > 0) {
			redirect('nutrition/listing/iycf', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	public function iycf_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("nutrition_iycf",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_iycf",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('nutrition/iycf_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//for nutrition mmhf
	public function mmhf($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('nutrition/mmhf_form', $data);
	}
	public function mmhf_view($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_mmhf", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Nutrition_model -> get_previous('nutrition_mmhf',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this -> load -> view('nutrition/mmhf_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for mmhf Compare view
	public function mmhf_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("nutrition_mmhf",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_mmhf",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('nutrition/mmhf_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}

	public function mmhf_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_mmhf", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('nutrition/mmhf_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}

	public function save_mmhf($id = 0) {
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
			$data = $this -> Common_model -> update_record("nutrition_mmhf", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("nutrition_mmhf", $data);
		}
		if ($data > 0) {
			redirect('nutrition/listing/mmhf', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	//for nutrition smc
	public function smc($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('nutrition/smc_form', $data);
	}
	public function smc_view($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_smc", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Nutrition_model -> get_previous('nutrition_smc',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this -> load -> view('nutrition/smc_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for smc Compare view
	public function smc_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("nutrition_smc",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_smc",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('nutrition/smc_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	public function smc_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_smc", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('nutrition/smc_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}

	public function save_smc($id = 0) {
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
			$data = $this -> Common_model -> update_record("nutrition_smc", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("nutrition_smc", $data);
		}
		if ($data > 0) {
			redirect('nutrition/listing/smc', $data);
		} else {
			redirect(base_url()."404");
		}
	}
	//for nutrition warehouse
	public function warehouse($vpvc_id) {
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this -> load -> view('nutrition/warehouse_form', $data);
	}
	public function warehouse_view($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_warehouse", $vpvc_id, "vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Nutrition_model -> get_previous('nutrition_warehouse',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this -> load -> view('nutrition/warehouse_form_view', $data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for warehouse Compare view
	public function warehouse_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("nutrition_warehouse",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_warehouse",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('nutrition/warehouse_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	public function warehouse_edit($vpvc_id) {
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("nutrition_warehouse", $vpvc_id, "vpvc_id");
		$data["id"] = $data["DataRow"] -> id;
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this -> load -> view('nutrition/warehouse_form_edit', $data);
		}else{
			redirect(base_url()."404");
		}
		
	}

	public function save_warehouse($id = 0) {
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
			$data = $this -> Common_model -> update_record("nutrition_warehouse", $data, array("id" => $id));
		} else {
			$data = $this -> Common_model -> insert_record("nutrition_warehouse", $data);
		}
		if ($data > 0) {
			redirect('nutrition/listing/warehouse', $data);
		} else {
			redirect(base_url()."404");
		}
	}
}