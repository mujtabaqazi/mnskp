<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Mcp_model');

	}
	//============================ Constructor Function Ends ============================//
	//================= Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center ====================//
	//for llin
	public function llin($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mcp/llin_form',$data);
	}
	//for llin view
	public function llin_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_llin",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mcp_model -> get_previous('mcp_llin',$wc);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('mcp/llin_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit llin checklist
	public function llin_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_llin",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mcp/llin_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save llin
	public function save_llin($id=0)
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
			$data = $this -> Common_model -> update_record("mcp_llin",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mcp_llin",$data);
		}
		if($data > 0){
			redirect('mcp/listing/llin',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================== llin compare===========================//
	public function llin_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mcp_llin",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_llin",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mcp/llin_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404"); 
		}
		
	}
	//================= Malaria - Supervisory Checklist Indoor Residual Spray (IRS) Operations ====================//
	//for irs
	public function irs($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mcp/irs_form',$data);
	}
	//for irs view
	public function irs_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_irs",$vpvc_id,"vpvc_id",NULL,$extraWhere);	
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mcp_model -> get_previous('mcp_irs',$wc);	
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('mcp/irs_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for irs Compare view
	public function irs_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mcp_irs",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_irs",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mcp/irs_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit irs checklist
	public function irs_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_irs",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mcp/irs_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save irs
	public function save_irs($id=0)
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
			$data = $this -> Common_model -> update_record("mcp_irs",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mcp_irs",$data);
		}
		if($data > 0){
			redirect('mcp/listing/irs',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//================= Malaria - Checklist for Microscopy Center ====================//
	//for mc
	public function mc($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mcp/mc_form',$data);
	}
	//for mc view
	public function mc_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_mc",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mcp_model -> get_previous('mcp_mc',$wc);				
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('mcp/mc_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for mc Compare view
	public function mc_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mcp_mc",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_mc",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mcp/mc_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit mc checklist
	public function mc_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_mc",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mcp/mc_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save mc
	public function save_mc($id=0)
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
			$data = $this -> Common_model -> update_record("mcp_mc",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mcp_mc",$data);
		}
		if($data > 0){
			redirect('mcp/listing/mc',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//========================================= Malaria - Checklist for Rapid Diagnostic Test (RDT) Center========
	//for rdt
	public function rdt($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('mcp/rdt_form',$data);
	}
	//for rdt view
	public function rdt_view($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_rdt",$vpvc_id,"vpvc_id",NULL,$extraWhere);
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Mcp_model -> get_previous('mcp_rdt',$wc);	
		//print_r($wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('mcp/rdt_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for rdt Compare view
	public function rdt_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("mcp_rdt",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_rdt",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('mcp/rdt_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	//to edit rdt checklist
	public function rdt_edit($vpvc_id)
	{
		$ulevel = $this -> session -> userLevel;
		$extraWhere = NULL;
		if($ulevel=="3")
		{
			$extraWhere = array("distcode" => $this -> session -> distcode);
		}
		$data["DataRow"] = $this -> Common_model -> get_info("mcp_rdt",$vpvc_id,"vpvc_id",NULL,$extraWhere);		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('mcp/rdt_form_edit',$data);
		}else{
			redirect(base_url()."404");
		}
	}	
	//to save rdt
	public function save_rdt($id=0)
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
			$data = $this -> Common_model -> update_record("mcp_rdt",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("mcp_rdt",$data);
		}
		if($data > 0){
			redirect('mcp/listing/rdt',$data);
		}else{
			redirect(base_url()."404");
		}
	}
}