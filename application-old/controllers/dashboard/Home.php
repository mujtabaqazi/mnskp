<?php 
//developed by rajaimranqamer@gmail.com
//copyrights: Pace Technologies
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		if(is_logged_in()){}else{
			redirect(base_url());exit;
		}
		$this -> load -> helper ('dashboard_functions_helper');
		$this -> load -> model ('Common_model');
		$this -> load -> model ('dashboard/Home_model',"home");
	}
	//============================ Constructor Function Ends ============================//
	public function index()
	{		
		//print_r($_POST);exit;
		$frequency = $this -> input -> post('frequency');
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q')){
			switch($frequency){
				case 'y':
					$fyear = $this -> input -> post('fyear');
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["period"] = $fyear;
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["period"] = $years;
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["period"] = $qmonth;
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["period"] = $fmonth;
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		$data["usersInfo"] = getUsers_Counts();
		$data["PlansInfo"] = $this -> home -> get_all_plans_data($fmonth,NULL,NULL,$customfmonthwc);//this will get KPIs counts for given parameters 
		if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
			$data["monthlyview"] = true;
		}
		$this->load->view('dashboard/home',$data);
	}
	public function dist_plans_ajax()
	{
		$frequency = $this -> input -> post('frequency');
		$customfmonthwc = "defaultfmwc";
		if($frequency && ($frequency=='y' || $frequency=='fy' || $frequency=='q' || $frequency=='m')){
			switch($frequency){
				case 'y':
					$fyear = $this -> input -> post('fyear');
					if($fyear > 0){
						$customfmonthwc = " and ( vph.fmonth like '".$fyear."-%' ) ";
					}else{
						$customfmonthwc = " and ( vph.fmonth like '".date("Y")."-%' ) ";
					}
					$data["period"] = $fyear;
					break;
				case 'fy':
					$years = $this -> input -> post('fyear');
					if($years){
						$bothyears = explode("-",$years);
						$customfmonthwc = " and ( vph.fmonth > '".$bothyears[0]."-06' and vph.fmonth < '".$bothyears[1]."-07' ) ";
					}else{
						$currmnth = date("m");
						if($currmnth>6){
							$startyear = date("Y");
							$endyear = date("Y", strtotime('+1 year'));
						}else{
							$startyear = date("Y", strtotime('-1 year'));
							$endyear = date("Y");
						}
						$customfmonthwc = " and ( vph.fmonth > '".$startyear."-06' and vph.fmonth < '".$endyear."-07' ) ";
					}
					$data["period"] = $years;
					break;
				case 'q':
					$qmonth = $this -> input -> post('qmonth');
					$qparts = explode("-",$qmonth);
					if($qmonth && (isset($qparts[1]) && $qparts[1]>0 && $qparts[1]<5)){
						$year = $qparts[0];
						$quarter = $qparts[1];
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}else{
						$year = date("Y");
						$quarter = ceil(date('n', time()) / 3);
						$startmonth = "0".($quarter-1)*3;
						$endmonth = (($quarter*3)>8)?($quarter*3+1):"0".($quarter*3+1);
						$customfmonthwc = ' and ( vph.fmonth > \''.$year.'-'.$startmonth.'\' and vph.fmonth < \''.$year.'-'.$endmonth.'\' ) ';
					}
					$data["period"] = $qmonth;
					break;
			}
		}else{
			$frequency = "m";
		}
		if($frequency == "m"){
			if($this->input->post("fmonth")){
				$fmonth=$this->input->post("fmonth");
			}else{
				$fmonth=date("Y-m");
			}
			$customfmonthwc = "defaultfmwc";
			$data["period"] = $fmonth;
		}else{
			$fmonth=NULL;
		}
		$data["frequency"] = $frequency;
		$distcode = ($this->input->post("distcode"))?$this->input->post("distcode"):0;//get from post
		$data["distcode"] = $distcode;
		$data["PlansInfo"] = $this -> home -> get_all_plans_data($fmonth,NULL,$distcode,$customfmonthwc);//this will get sup wise info for given fmonth
		if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
			$this->load->view('dashboard/ajax/dist_freq_view',$data);
		}else{
			$this->load->view('dashboard/ajax/dist_sup_view',$data);
		}	
	}/* 
	public function dist_plans_ajax()
	{
		if($this->input->post("fmonth")){
			$fmonth=$this->input->post("fmonth");
		}else{
			$fmonth=date("Y-m");
		}
		$distcode = ($this->input->post("distcode"))?$this->input->post("distcode"):0;//get from post
		$data["distcode"] = $distcode;
		$data["PlansInfo"] = $this -> home -> get_all_plans_data($fmonth,NULL,$distcode);//this will get sup wise info for given fmonth
		$this->load->view('dashboard/ajax/dist_sup_view',$data);
	} */
}