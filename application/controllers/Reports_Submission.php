<?php

/*
        R_E_P_O_R_T_S S_U_B_M_I_S_S_I_O_N
		 ______________________________
		/""""""""""""""""""""""""""""""\
        ||  Author: Raja Imran Qamer  ||
	    ||     Date : 2017-04-15      ||
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
class Reports_Submission extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Plans_model');
	}
	public function getPlan(){
		$fmonth = $this -> uri -> segment(3);
		$ulevel = $this -> session -> userLevel;
		$utype 	= $this -> session -> utype;
		$wc = array();
		$wc["fmonth"] = $fmonth;
		$wc["supervisorid"] = $this -> session -> id;
		$result = $this -> Common_model -> fetchall("visit_plan_header", '', "id", $wc);

		if(!empty($result)){
			$id = $result[0]['id'];
			$data["DataRow"] = $this -> Plans_model -> get_plan_info($id);
			$data["id"] = $id;
			// print_r($data["DataRow"]); exit();
		}else{
			$data['message'] = "No Record Found";
		}
		$data["sysconf"] = $this -> Common_model -> get_info("sysconf");
		$this->load->view('reportSubmission/plan_view',$data);
	}
}