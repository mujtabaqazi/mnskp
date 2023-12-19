<?php
/*
            ___F___O___R___M___S___ 
		 ______________________________
		/""""""""""""""""""""""""""""""\
        ||       Class : Forms        ||
	    ||  Author: Raja Imran Qamer  ||
	    ||     Date : 2017-05-12      ||
	    ||  rajaimranqamer@gmail.com  ||
	    ||     {LHW + DHIS + MNS}     ||
	    ||   **Pace Technologies**    ||
		||____________________________||
		\__*_*_*________________:_:_:__/
	                ||   ||
		            ||___||
					'''''''
		   __________________________
		   """"""""""""""""""""""""""
		  //                       //
		 //   A S D F G H J K L   //
		//_______________________//
		""""""""""""""""""""""""""
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Epi_model');
	}
	//============================ Constructor Function Ends ============================//
	//for epi activities
	public function activities($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('epi/activities_form',$data);
	}
	public function activities_view($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("epi_activities",$vpvc_id,"vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Epi_model -> get_previous('epi_activities',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('epi/activities_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for activities Compare view
	public function activities_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("epi_activities",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("epi_activities",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('epi/activities_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	public function activities_edit($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("epi_activities",$vpvc_id,"vpvc_id");
		$data["id"] = $data["DataRow"]->id;
		$this->load->view('epi/activities_form_edit',$data);
	}	
	public function save_activities($id=0)
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
			$data = $this -> Common_model -> update_record("epi_activities",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("epi_activities",$data);
		}
		if($data > 0){
			redirect('epi/listing/activities',$data);
		}else{
			echo "Error";
		}
	}
	//for epi monitoring
	public function monitoring($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('epi/monitoring_form',$data);
	}
	public function monitoring_view($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("epi_monitoring",$vpvc_id,"vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Epi_model -> get_previous('epi_monitoring',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data["previous"] = $previous;
			$this->load->view('epi/monitoring_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
	}
	//for monitoring Compare view
	public function monitoring_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("epi_monitoring",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("epi_monitoring",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('epi/monitoring_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
	}
	public function monitoring_edit($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("epi_monitoring",$vpvc_id,"vpvc_id");
		$data["id"] = $data["DataRow"]->id;
		$this->load->view('epi/monitoring_form_edit',$data);
	}
	public function save_monitoring($id=0)
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
			$data = $this -> Common_model -> update_record("epi_monitoring",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("epi_monitoring",$data);
		}
		if($data > 0){
			redirect('epi/listing/monitoring',$data);
		}else{
			echo "Error";
		}
	}
}