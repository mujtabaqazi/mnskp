<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Apiscontroller extends CI_Controller {
		public function __construct() {
			parent::__construct();
			date_default_timezone_set("Asia/Karachi");
			$this->load->model('apismodel/Apismodel');
		}

		public function all_plan_lists($distcode = 0, $fmonth = NULL, $ulevel = NULL, $utype = NULL, $ptype = NULL){
			if (empty($ulevel)) {
				if (isset($_REQUEST['ulevel'])) {
					$ulevel = $_REQUEST['ulevel'];
				}
			}
			if (empty($utype)) {
				if (isset($_REQUEST['utype'])) {
					$utype = $_REQUEST['utype'];
				}
			}
			if (empty($ptype)) {
				if (isset($_REQUEST['ptype'])) {
					$ptype = $_REQUEST['ptype'];
				}
			}
			if (empty($distcode)) {
				if (isset($_REQUEST['distcode'])) {
					$distcode = $_REQUEST['distcode'];
				}
			}
			if (empty($fmonth)) {
				if (isset($_REQUEST['fmonth'])) {
					$fmonth = $_REQUEST['fmonth'];
				}
				else{
					$fmonth=date("Y-m");
				}
			}
			$data["fmonth"] = $fmonth;
			if($ulevel=='2') {
				if($distcode > 0) {
					$data["tableData"] = $this->Apismodel->get_managers_plans($distcode, $fmonth, $ulevel, $utype, $ptype);
				}
				else if($utype == 'Manager' || $utype == 'ProExecutive') {
					$data["tableData"] = $this->Apismodel->get_managers_plans(0,$fmonth, $ulevel, $utype, $ptype);
				}
				else {
					if($distcode=='0') {
						$data["tableData"] = $this->Apismodel->get_plans_for_dg_approval($fmonth, $ulevel, $utype, $ptype);
					}
					else {
						$ptype = $distcode;
						$data["tableData"] = $this->Apismodel->get_programs_plans($ptype,$fmonth, $ulevel, $utype);
					}
				}
			}
			else {
				$data["tableData"] = $this->Apismodel->get_managers_plans(0,$fmonth, NULL, $utype, $ptype);
			}
			if (!empty($data["tableData"])) {
				$data["status"] = true;
			}
			else{
				$data["status"] = false;
			}
			echo json_encode($data); exit;
		}

		public function save_lmne($formdata = array(), $id=0) {
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
	}
?>