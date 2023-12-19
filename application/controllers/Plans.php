<?php
/*
            ___P___L___A___N___S___ 
		 ______________________________
                                            
 .d8888b.  RIQ                       RIQ    
d88P  Y88b 8M8                       8M8    
Y88b.      8R8                       8R8    This is a main class for plan management 
 "IMRAN.   8A8888  .d88b.  8I888b.   8A8    written by Imran Qamer and copytighted by 
    "Y88b. 8N8    d88""88b 8M8 "88b  8N8    pace technologies and ministry of health, 
      "888 888    888  888 8R8  888  Y8P    if someone asked you to make some changes 
PACE  d88P Y88b.  Y88..88P 8A8 TECH         don't do directly without taking help from 
 "Y8888P"   "PACE  "TECH"  8N888P"   RIQ    rajaimranqamer@gmail.com
                           888              
                           888              
                           RIQ              

*/
defined('BASEPATH') OR exit('No direct script access allowed');
class Plans extends CI_Controller {
	public $module = "Plans Management";
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Plans_model');
	}
	public function lists(/* $distcode = 0 */)
	{
		/* $ulevel = $this -> session -> userLevel;
		if($ulevel=='2')
		{
			if($distcode > 0)
			{
				$data["tableData"] = $this -> Plans_model -> get_plans($distcode);
			}else{
				$data["tableData"] = $this -> Plans_model -> get_plans_for_dg_approval();
			}
		}else{ */
			$data["tableData"] = $this -> Plans_model -> get_plans();
		//}
		$this->load->view('plan/list',$data);
	}
	public function managers_lists($distcode = 0,$fmonth=NULL)
	{
		$ulevel = $this -> session -> userLevel;
		$utype = $this -> session -> utype;
		if($fmonth){}else{$fmonth=date("Y-m");}
		$data["fmonth"] = $fmonth;
		if($ulevel=='2')
		{
			if($distcode > 0)
			{
				$data["tableData"] = $this -> Plans_model -> get_managers_plans($distcode,$fmonth);
			}
			else if($utype == 'Manager' || $utype == 'ProExecutive'){
				$data["tableData"] = $this -> Plans_model -> get_managers_plans(0,$fmonth);
			}
			else{
				if($distcode=='0')
				{
					$data["tableData"] = $this -> Plans_model -> get_plans_for_dg_approval($fmonth);
				}
				else
				{
					$ptype = $distcode; //$distcode will act as ptype
					$data["tableData"] = $this -> Plans_model -> get_programs_plans($ptype,$fmonth);
				}
			}
		}else{
			$data["tableData"] = $this -> Plans_model -> get_managers_plans(0,$fmonth);
		}
		$this->load->view('plan/managers_list',$data);
	}
	public function add($selectedfmonth=NULL)
	{
		$data["id"] = "";
		if($selectedfmonth){}else{
			$dayy = date("d");
			if($dayy>15){
				$selectedfmonth=date('Y-m', strtotime(date('Y-m')." +1 month"));
			}
		}
		$data["selectedfmonth"] = $selectedfmonth;
		$this->load->view('plan/plan_form',$data);
	}
	public function approve_list()
	{
		$data["tableData"] = $this -> Plans_model -> get_plans_list();
		$this->load->view('plan/approve_list',$data);
	}
	public function dho_approve($fmonth=NULL)
	{
		
		
		$data["id"] = "";
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["allPlans"] = $this -> Plans_model -> get_plans_for_dho_approval($fmonth);
		$this->load->view('plan/dho_approve_form',$data);
	}
	public function pd_approve($fmonth=NULL)
	{
		$data["id"] = "";
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["allPlans"] = $this -> Plans_model -> get_plans_for_pd_approval($fmonth);
		$this->load->view('plan/pd_approve_form',$data);
	}
	public function dho_approve_view($fmonth=NULL,$distcode=NULL)
	{
		$data["id"] = "";
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["allPlans"] = $this -> Plans_model -> get_plans_for_dho_approval($fmonth,$distcode);
		$this -> db -> select("approvaldate");
		$this -> db -> from("visit_plan_approval");
		$this -> db -> where(array('distcode'=>$this -> session -> distcode,'approvedby'=>$this -> session -> id,'fmonth'=>$fmonth));
		$data["app_stat"] = $this -> db -> get()->row();
		$this->load->view('plan/dho_approve_view',$data);
	}
	public function dg_approve($fmonth=NULL)
	{
		$data["id"] = "";
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["tableData"] = $this -> Plans_model -> get_plans_for_dg_approval($data["fmonth"]);
		$this->load->view('plan/dg_approve_form',$data);
	}
	public function dg_approve_view($fmonth=NULL)
	{
		$data["id"] = "";
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["tableData"] = $this -> Plans_model -> get_plans_for_dg_approval($data["fmonth"]);
		$this->load->view('plan/dg_approve_view',$data);
	}
	public function pd_approve_view($fmonth=NULL)
	{
		$data["id"] = "";
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["allPlans"] = $this -> Plans_model -> get_plans_for_pd_approval($data["fmonth"]);
		$this -> db -> select("approvaldate");
		$this -> db -> from("pro_visit_plan_approval");
		$this -> db -> where(array('ptype'=>$this -> session -> ptype,'approvedby'=>$this -> session -> id,'fmonth'=>$fmonth));
		$data["app_stat"] = $this -> db -> get()->row();
		$this->load->view('plan/pd_approve_view',$data);
	}
	public function undo_pd_approved($fmonth=NULL)
	{
		$this -> Common_model -> delete_record_multiple_colum("pro_visit_plan_approval",array('ptype' => $this -> session -> ptype,'fmonth' => $_POST["fmonth"]));
		set_activity_log($this->module, "Undo approval", "PD undo approval of plan for month of ".$_POST["fmonth"]." and ptype ".$this -> session -> ptype.".");
		$query = "Delete from da_lqas where vpvc_id in (select id from visit_plan_visit_checklists where visitplanvisitsid in (select id from visit_plan_visits where visitplanid in (select id from visit_plan_header where ptype = '".$this -> session -> ptype."' and distcode is null and fmonth = '".$_POST["fmonth"]."'))) and is_temp_saved = '1'";
		$qryoutput = $this -> Common_model -> simple_query($query);
		$data["tableData"] = $this -> Plans_model -> get_plans_list();
		$this->load->view('plan/approve_list',$data);
	}
	public function undo_dho_approved($fmonth=NULL)
	{
		$this -> Common_model -> delete_record_multiple_colum("visit_plan_approval",array('distcode' => $this -> session -> distcode,'fmonth' => $_POST["fmonth"]));
		set_activity_log($this->module, "Undo approval", "DHO undo approval of plan for month of ".$_POST["fmonth"]." and distcode ".$this -> session -> distcode.".");
		$query = "Delete from da_lqas where vpvc_id in (select id from visit_plan_visit_checklists where visitplanvisitsid in (select id from visit_plan_visits where visitplanid in (select id from visit_plan_header where distcode = '".$this -> session -> distcode."' and fmonth = '".$_POST["fmonth"]."'))) and is_temp_saved = '1'";
		$qryoutput = $this -> Common_model -> simple_query($query);
		$data["tableData"] = $this -> Plans_model -> get_plans_list();
		$this->load->view('plan/approve_list',$data);
	}
	public function dho_approved()
	{
		$errorExist = false;
		$combinedarr = array();
		$singsuparr = array();
		foreach($_POST["planapproved"] as $facode => $value)
		{
			$tot_dates = count($value["visitdate"]);
			for($i=0; $i<$tot_dates; $i++)
			{
				$visitdate = date("Y-m-d",strtotime($value["visitdate"][$i]));
				$orgvisitdate = $value["visitdate"][$i];
				$vpid = $value["visitplanid"][$i];
				$comb = $combinedarr[$facode][$visitdate] = isset($combinedarr[$facode][$visitdate])?($combinedarr[$facode][$visitdate]+1):1;
				$single = $singsuparr[$facode][$visitdate][$vpid] = isset($singsuparr[$facode][$visitdate][$vpid])?($singsuparr[$facode][$visitdate][$vpid]+1):1;
				if($comb>3){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 3 visits on same facility on same date. Please rearrange your dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($single > 1){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 1 visits on same facility on same date for same supervisor. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate,$vpid);
					break;
				}
			}
			if($errorExist){break;}
		}
		if(!$errorExist)			
		{
			foreach($_POST["planapproved"] as $facode => $value)
			{
				$tot_dates = count($value["visitdate"]);
				for($i=0; $i<$tot_dates; $i++)
				{
					$visitDate = date("Y-m-d",strtotime($value["visitdate"][$i]));
					$data = array(
						'visitdate' => $visitDate ,
						'vehicleassigned' => $value["vehicleassigned"][$i],
						'driver' => $value["driver"][$i]
					);
					$this -> Common_model -> update_record("visit_plan_visits",$data,array("facode" => "$facode","id" => $value["vpvid"][$i]));
					$supData = $this -> Common_model -> get_info("visit_plan_header",$value["visitplanid"][$i],NULL,'supervisorid');
					$supervisorsid[] = $supData -> supervisorid;
					$emaildata[$supData -> supervisorid][] = array("facode" => "$facode")+$data;
					$allvpvcs = $this -> Common_model -> fetchall("visit_plan_visit_checklists",NULL,"id",array("visitplanvisitsid" => $value["vpvid"][$i],"checklistid"=>"20"));
					if(count($allvpvcs)>0){ 
						foreach ($allvpvcs as $onerow){
							$vpvc_id = $onerow["id"];
							$vpvcDataRow = getchlistdetails($vpvc_id);
							$de = get_lqas_data_elements($vpvcDataRow->fmonth,$vpvcDataRow->ptype,$facode);
							if($de){
								$this -> load -> helper ('communication_helper');
								$code = ($de->ptype=="all")?$vpvcDataRow->facode:$vpvcDataRow->target_value;
								$fields = '"'.$de->mis_col1.'","'.$de->mis_col2.'","'.$de->mis_col3.'","'.$de->mis_col4.'","'.$de->mis_col5.'","'.$de->mis_col6.'","'.$de->mis_col7.'","'.$de->mis_col8.'","'.$de->mis_col9.'","'.$de->mis_col10.'","'.$de->mis_col11.'","'.$de->mis_col12.'"';
								/* print_r($code);
								echo "<br/>";
								echo "<br/>";
								print_r($fields); */
								$deValues = get_lqas_de_mis_values(NULL,$de->ptype,$code,$fields);
								/* print_r($deValues);
								exit; */
								if(isset($deValues) && !empty($deValues)){
									$lqasdata = array( 
										"distcode" => $vpvcDataRow->distcode, 
										"supervisor_name" => $vpvcDataRow->supervisor_name,
										"supervisor_desg" => $vpvcDataRow->supervisor_desg, 
										"fmonth" => $vpvcDataRow->fmonth,
										"lqas_date" => $visitDate,						
										"entity_type" => ($vpvcDataRow->hcptype=='')?"DHIS":$vpvcDataRow->hcptype,
										"entity_code" => $vpvcDataRow->target_value,
										"entity_fatype" => $vpvcDataRow->fatype,
										"vpvc_id" => $vpvc_id,
										"facode" => $vpvcDataRow->facode							
									);
									for($ind=1;$ind<=12;$ind++){
										$var1 ="de".$ind;$var2 ="mis_col".$ind;$var3 ="reg".$ind;
										$lqasdata["lqas_r".$ind."_f1"] = $de->$var1;
										$lqasdata["lqas_r".$ind."_f2"] = (isset($deValues) && !empty($deValues))?$deValues[$de->$var2]:0;
										$lqasdata["lqas_r".$ind."_f3"] = $de->$var3;
									}
									$lqasdata["mis_data_fmonth"] = $deValues["fmonth"];
									$this -> Common_model -> insert_record("da_lqas",$lqasdata);
								}
							}
						}
					} 
				}			
			}
			$this -> Common_model -> delete_record_multiple_colum("visit_plan_approval",array('distcode' => $this -> session -> distcode,'fmonth' => $_POST["fmonth"]));
			$data1 = array(
				'distcode' => $this -> session -> distcode,
				'fmonth' => $_POST["fmonth"],
				'approvaldate' => date("Y-m-d"),
				'approvedby' => $this -> session -> id
			);
			$this -> Common_model -> insert_record("visit_plan_approval",$data1);
			set_activity_log($this->module, "plan approved", "DHO approved plan for month of ".$_POST["fmonth"]." and distcode ".$this -> session -> distcode.".");
			$supervisorsid = array_unique($supervisorsid) ;
			$toarray = $this -> Plans_model -> get_emails_list($supervisorsid);
			foreach($toarray as $oneArr){
				$oneArr['fmonth'] = $_POST["fmonth"];
				$oneArr['approved_by'] = "DHO";
				$oneArr['visits'] = $emaildata[$oneArr['id']];
				$body = $this->load->view('email_templates/plan_approved',$oneArr,TRUE);
				send_emails(
					$oneArr['email'], //to
					$this -> session -> email, //cc
					"Plan Approved", //subject
					$body
				);
			}
			$datar["message"] = "Success";
		}
		echo json_encode($datar);
	}
	public function dho_approve_preview()
	{
		$errorExist = false;
		$combinedarr = array();
		$singsuparr = array();
		foreach($_POST["planapproved"] as $facode => $value)
		{
			/* if($prevfacode!="" && $prevfacode!=$facode){
				//$countcomb = count($combinedarr);
				//$uniquearr = array_unique($combinedarr, SORT_REGULAR);
				$countsingsup = count($singsuparr);
				$uniquesingsup = array_unique($singsuparr, SORT_REGULAR);
				if($countcomb > (count($uniquearr)+3)){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 3 visits on same facility on same date. Please rearrange visit dates.";
					$datar["facode"][] = $prevfacode;
				}
				if($countsingsup==count($uniquesingsup)){}else{
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 1 visits on same facility on same date for same supervisor. Please rearrange visit dates.";
					$datar["facode"][] = $prevfacode;
				}
				$combinedarr = array();
				$singsuparr = array();
			} */
			//$prevfacode = $facode;
			$tot_dates = count($value["visitdate"]);
			for($i=0; $i<$tot_dates; $i++)
			{
				$visitdate = date("Y-m-d",strtotime($value["visitdate"][$i]));
				$orgvisitdate = $value["visitdate"][$i];$vpid = $value["visitplanid"][$i];$comb = $combinedarr[$facode][$visitdate] = isset($combinedarr[$facode][$visitdate])?($combinedarr[$facode][$visitdate]+1):1;$single = $singsuparr[$facode][$visitdate][$vpid] = isset($singsuparr[$facode][$visitdate][$vpid])?($singsuparr[$facode][$visitdate][$vpid]+1):1;
				if($orgvisitdate==""){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set empty visit date for any visit. Please recheck visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($comb>3){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 3 visits on same facility on same date. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($single>1){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 1 visits on same facility on same date for same supervisor. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate,$vpid);
					break;
				}
				$postedval[$value["vpvid"][$i]] = array(
					'visitdate' => $visitdate,
					'vehicle' => $value["vehicleassigned"][$i],
					'driver' => $value["driver"][$i]
				);			
			}
			if($errorExist){break;}
		}
		/* if($prevfacode!=""){
			$countcomb = count($combinedarr);
			$uniquearr = array_unique($combinedarr, SORT_REGULAR);
			$countsingsup = count($singsuparr);
			$uniquesingsup = array_unique($singsuparr, SORT_REGULAR);
			if($countcomb > (count($uniquearr)+3)){
				$errorExist = true;
				$datar["message"] = "Error";
				$datar["body"] = "You cannot set more than 3 visits on same facility on same date. Please rearrange your dates.";
				$datar["facode"][] = $prevfacode;
			}
			if($countsingsup==count($uniquesingsup)){}else{
				$errorExist = true;
				$datar["message"] = "Error";
				$datar["body"] = "You cannot set more than 1 visits on same facility on same date for same supervisor. Please rearrange visit dates.";
				$datar["facode"][] = $prevfacode;
			}
		} */					
		if(!$errorExist)			
		{
			$fmonth = $this->input->post("fmonth");$data["fmonth"] = $fmonth;
			$data["allPlans"] = $this -> Plans_model -> get_plans_for_dho_approval($data["fmonth"]);
			foreach($data["allPlans"] as $key => $oneplan){
				$vpvid = $oneplan["visitid"];
				$data["allPlans"][$key]["visitdate"] = $postedval[$vpvid]["visitdate"];
				$data["allPlans"][$key]["vehicle"] = $postedval[$vpvid]["vehicle"];
				$data["allPlans"][$key]["driver"] = $postedval[$vpvid]["driver"];
			}
			usort($data["allPlans"],function($a,$b){
				$c = $a['facode'] - $b['facode'];
				$c .= strcmp($a['visitdate'],$b['visitdate']);
				return $c;
			});
			echo $this->load->view("plan/dho_approve_preview",$data,TRUE);
		}else{
			echo json_encode($datar);
		}
	}
	/* public function dg_approved()
	{
		if($_POST["distcode"])
		{
			$data1 = array(
				'dgapprovaldate' => date("Y-m-d"),
				'dgapprovedby' => $this -> session -> id
			);
			$where = array(
				'distcode' => $_POST["distcode"],
				'fmonth' => $_POST["fmonth"]
			);
			$this -> Common_model -> update_record("visit_plan_approval",$data1,$where);
			echo "Success";
		}else{
			$data1 = array(
				'dgapprovaldate' => date("Y-m-d"),
				'dgapprovedby' => $this -> session -> id
			);
			$where = array(
				'fmonth' => $_POST["fmonth"]
			);
			$this -> Common_model -> update_record("visit_plan_approval",$data1,$where);
			redirect('plans/approve_list');exit();
		}
	} */
	public function dg_approved()
	{
		//var_dump(is_numeric($this->input->post('distcode')));exit;
		if(is_numeric($this->input->post('distcode')))
		{
			/* $data1 = array(
				'distcode' => $this->input->post('distcode'),
				'fmonth' => $_POST["fmonth"],
				'dgapprovaldate' => date("Y-m-d"),
				'dgapprovedby' => $this -> session -> id
			);
			 $where = array(
				'distcode' => $_POST["distcode"],
				'fmonth' => $_POST["fmonth"]
			); 
			$this -> Common_model -> insert_record("visit_plan_approval",$data1);*/
			$data1 = array(
				'distcode' => $this->input->post('distcode'),
				'fmonth' => $_POST["fmonth"],
				'approvaldate' => date("Y-m-d"),
				'approvedby' => $this -> session -> id,
				'dgapprovedby' => $this -> session -> id
			);
			$this -> Common_model -> delete_record_multiple_colum("visit_plan_approval",array('distcode' => $this->input->post('distcode'),'fmonth' => $_POST["fmonth"],'dgapprovedby'=>$this -> session -> id));
			$this -> Common_model -> insert_record("visit_plan_approval",$data1);
			echo "Success";
			
		}else{
			/* $data1 = array(
				'dgapprovaldate' => date("Y-m-d"),
				'dgapprovedby' => $this -> session -> id
			);
			$where = array(
				'fmonth' => $_POST["fmonth"]
			);
			$this -> Common_model -> update_record("visit_plan_approval",$data1,$where);
			redirect('plans/approve_list');exit(); */
			$ptype = $this->input->post('distcode');
			$data1 = array(
				'fmonth' => $_POST["fmonth"],
				'dgapprovaldate' => date("Y-m-d"),
				'approvedby' => $this -> session -> id,
				'ptype' => $ptype
			);
			$this -> Common_model -> delete_record_multiple_colum("pro_visit_plan_approval",array('ptype' => $ptype,'fmonth' => $_POST["fmonth"]));
			$this -> Common_model -> insert_record("pro_visit_plan_approval",$data1);
			echo "Success";
		}
	}
	public function pd_approved()
	{
		$errorExist = false;
		$combinedarr = array();
		$singsuparr = array();
		foreach($_POST["planapproved"] as $facode => $value)
		{
			$tot_dates = count($value["visitdate"]);
			for($i=0; $i<$tot_dates; $i++)
			{
				$visitdate = date("Y-m-d",strtotime($value["visitdate"][$i]));
				$orgvisitdate = $value["visitdate"][$i];
				$vpid = $value["visitplanid"][$i];$comb = $combinedarr[$facode][$visitdate] = isset($combinedarr[$facode][$visitdate])?($combinedarr[$facode][$visitdate]+1):1;$single = $singsuparr[$facode][$visitdate][$vpid] = isset($singsuparr[$facode][$visitdate][$vpid])?($singsuparr[$facode][$visitdate][$vpid]+1):1;
				if($orgvisitdate==""){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set empty visit date for any visit. Please recheck visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($comb>3){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 3 visits on same facility on same date. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($single>1){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 1 visits on same facility on same date for same supervisor. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate,$vpid);
					break;
				}
				$postedval[$value["vpvid"][$i]] = array(
					'visitdate' => $visitdate,
					'vehicle' => $value["vehicleassigned"][$i],
					'driver' => $value["driver"][$i]
				);			
			}
			if($errorExist){break;}
		}
		if(!$errorExist)
		{
			foreach($_POST["planapproved"] as $facode => $value)
			{
				$tot_dates = count($value["visitdate"]);
				for($i=0; $i<$tot_dates; $i++)
				{
					$visitDate = date("Y-m-d",strtotime($value["visitdate"][$i]));
					$data = array(
						'visitdate' => date("Y-m-d",strtotime($value["visitdate"][$i])),
						'vehicleassigned' => $value["vehicleassigned"][$i],//$vehicleassigned,
						'driver' => $value["driver"][$i]//$driver
					);
					$this -> Common_model -> update_record("visit_plan_visits",$data,array("facode" => "$facode","id" => $value["vpvid"][$i]));$supData = $this -> Common_model -> get_info("visit_plan_header",$value["visitplanid"][$i],NULL,'supervisorid');$supervisorsid[] = $supData -> supervisorid;$emaildata[$supData -> supervisorid][] = array("facode" => "$facode")+$data;$allvpvcs = $this -> Common_model -> fetchall("visit_plan_visit_checklists",NULL,"id",array("visitplanvisitsid" => $value["vpvid"][$i],"checklistid"=>"20"));
					if(count($allvpvcs)>0){
						foreach ($allvpvcs as $onerow){
							$vpvc_id = $onerow["id"];
							$vpvcDataRow = getchlistdetails($vpvc_id);
							$de = get_lqas_data_elements($vpvcDataRow->fmonth,$vpvcDataRow->ptype);
							if($de){
								$this -> load -> helper ('communication_helper');$code = ($de->ptype=="all")?$vpvcDataRow->facode:$vpvcDataRow->target_value;$fields = '"'.$de->mis_col1.'","'.$de->mis_col2.'","'.$de->mis_col3.'","'.$de->mis_col4.'","'.$de->mis_col5.'","'.$de->mis_col6.'","'.$de->mis_col7.'","'.$de->mis_col8.'","'.$de->mis_col9.'","'.$de->mis_col10.'","'.$de->mis_col11.'","'.$de->mis_col12.'"';$deValues = get_lqas_de_mis_values(NULL,$de->ptype,$code,$fields);
								$lqasdata = array(
									"distcode" => $vpvcDataRow->distcode,
									"supervisor_name" => $vpvcDataRow->supervisor_name,
									"supervisor_desg" => $vpvcDataRow->supervisor_desg,
									"fmonth" => $vpvcDataRow->fmonth,
									"lqas_date" => $visitDate,						
									"entity_type" => ($vpvcDataRow->hcptype=='')?"DHIS":$vpvcDataRow->hcptype,
									"entity_code" => $vpvcDataRow->target_value,
									"entity_fatype" => $vpvcDataRow->fatype,
									"vpvc_id" => $vpvc_id,
									"facode" => $vpvcDataRow->facode							
								);
								for($ind=1;$ind<=12;$ind++){
									$var1 ="de".$ind;$var2 ="mis_col".$ind;$var3 ="reg".$ind;
									$lqasdata["lqas_r".$ind."_f1"] = $de->$var1;
									$lqasdata["lqas_r".$ind."_f2"] = (isset($deValues) && !empty($deValues))?$deValues[$de->$var2]:0;
									$lqasdata["lqas_r".$ind."_f3"] = $de->$var3;
								}
								$lqasdata["mis_data_fmonth"] = (isset($deValues) && !empty($deValues))?$deValues["fmonth"]:NULL;
								$this -> Common_model -> insert_record("da_lqas",$lqasdata);
							}
						}
					}
				}			
			}
			$this -> Common_model -> delete_record_multiple_colum("pro_visit_plan_approval",array('ptype' => $this -> session -> ptype,'fmonth' => $_POST["fmonth"]));
			$data1 = array(
				'fmonth' => $_POST["fmonth"],
				'approvaldate' => date("Y-m-d"),
				'approvedby' => $this -> session -> id,
				'ptype' => $this -> session -> ptype
			);
			$this -> Common_model -> insert_record("pro_visit_plan_approval",$data1);
			set_activity_log($this->module, "plan approved", "PD approved plan for month of ".$_POST["fmonth"]." and ptype ".$this -> session -> ptype.".");
			$supervisorsid = array_unique($supervisorsid) ;
			$toarray = $this -> Plans_model -> get_emails_list($supervisorsid);
			foreach($toarray as $oneArr){
				$oneArr['fmonth'] = $_POST["fmonth"];
				$oneArr['approved_by'] = "PD";
				$oneArr['visits'] = $emaildata[$oneArr['id']];
				$body = $this->load->view('email_templates/plan_approved',$oneArr,TRUE);
				send_emails(
					$oneArr['email'], //to
					$this -> session -> email, //cc
					"Plan Approved", //subject
					$body
				);
			}
			$datar["message"] = "Success";
		}
		echo json_encode($datar);
	}
	public function pd_approve_preview()
	{
		$errorExist = false;
		$combinedarr = array();
		$singsuparr = array();
		foreach($_POST["planapproved"] as $facode => $value)
		{
			$tot_dates = count($value["visitdate"]);
			for($i=0; $i<$tot_dates; $i++)
			{
				$visitdate = date("Y-m-d",strtotime($value["visitdate"][$i]));
				$orgvisitdate = $value["visitdate"][$i];
				$vpid = $value["visitplanid"][$i];
				$comb = $combinedarr[$facode][$visitdate] = isset($combinedarr[$facode][$visitdate])?($combinedarr[$facode][$visitdate]+1):1;
				$single = $singsuparr[$facode][$visitdate][$vpid] = isset($singsuparr[$facode][$visitdate][$vpid])?($singsuparr[$facode][$visitdate][$vpid]+1):1;
				if($orgvisitdate==""){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set empty visit date for any visit. Please recheck visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($comb>3){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 3 visits on same facility on same date. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate);
					break;
				}
				if($single>1){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "You cannot set more than 1 visits on same facility on same date for same supervisor. Please rearrange visit dates.";
					$datar["data"] = array(($i+1),$facode,$orgvisitdate,$vpid);
					break;
				}
				$postedval[$value["vpvid"][$i]] = array(
					'visitdate' => $visitdate,
					'vehicle' => $value["vehicleassigned"][$i],
					'driver' => $value["driver"][$i]
				);			
			}
			if($errorExist){break;}
		}			
		if(!$errorExist)			
		{
			$fmonth = $this->input->post("fmonth");
			$data["fmonth"] = $fmonth;
			$data["allPlans"] = $this -> Plans_model -> get_plans_for_pd_approval($fmonth);
			foreach($data["allPlans"] as $key => $oneplan){
				$vpvid = $oneplan["visitid"];
				$data["allPlans"][$key]["visitdate"] = $postedval[$vpvid]["visitdate"];
				$data["allPlans"][$key]["vehicle"] = $postedval[$vpvid]["vehicle"];
				$data["allPlans"][$key]["driver"] = $postedval[$vpvid]["driver"];
			}
			usort($data["allPlans"],function($a,$b){
				$c = $a['facode'] - $b['facode'];
				$c .= strcmp($a['visitdate'],$b['visitdate']);
				return $c;
			});
			echo $this->load->view("plan/pd_approve_preview",$data,TRUE);
		}else{
			echo json_encode($datar);
		}
	}
	
	public function get_plan_view($id,$fmonth)
	{
		$data = $this -> Common_model -> get_info("visit_plan_header",$id,"supervisorid","id",array("fmonth"=>$fmonth));
		if($data)
			$this->plan_view($data->id);
		else
			header('Location: ' . $_SERVER['HTTP_REFERER']);
	}
	public function plan_view($id)
	{
		$data["DataRow"] = $this -> Plans_model -> get_plan_info($id);$data["sysconf"] = $this -> Common_model -> get_info("sysconf");$data["id"] = $id;
		$this->load->view('plan/plan_form_view',$data);
	}
	public function save($id=NULL)
	{
		$totalVisits = $_POST["fieldvisitsplanned"];
		if($totalVisits > 0 && isset($_POST["facode"][1]))
		{
			$errorExist = false;
			$combinedarr = array();
			for($i=1;$i<=$totalVisits;$i++)
			{
				$vpv = array(
					'facode' => $_POST["facode"][$i],
					'visitdate' => (empty($_POST["visitdate"][$i]))?date("Y-m-d"):date("Y-m-d",strtotime($_POST["visitdate"][$i]))
				);
				$combinedarr[] = $vpv;$vpv["visitplanid"] = NULL;
				if($id)
					$vpv["visitplanid"] = $id;
				$records = $this -> Plans_model -> count_facility_visits($vpv['facode'],$vpv['visitdate'],$vpv["visitplanid"]);
				if($records>2){
					$errorExist = true;
					$datar["message"] = "Error";
					$datar["body"] = "There are already three or more visits planned by different supervisors on same health facilities.";
					$datar["facode"][]=$vpv["facode"];
					$datar["visitdate"][]=$vpv["visitdate"];
					$datar["serial"][]=$i;
				}
			}
			$countcomb = count($combinedarr);
			$uniquearr = array_unique($combinedarr, SORT_REGULAR);
			if($countcomb==count($uniquearr)){
			}else{
				$errorExist = true;
				$datar["message"] = "Error";
				$datar["body"] = "You cannot visit same facility on same date twice. Please rearrange your visits.";	
				unset($datar["facode"]);unset($datar["visitdate"]);unset($datar["serial"]);
			};
			if(!$errorExist)			
			{
				$fmonth = $_POST["fmonth"];
				$ptype = $_POST["ptype"];
				$plandate = (empty($_POST["plandate"]))?date("Y-m-d"):date("Y-m-d",strtotime($_POST["plandate"]));
				$vph = array(
					'supervisorid' => $this -> session -> id,
					'supervisor' => $_POST["supervisor"],
					'postingplace' => $_POST["postingplace"],
					'ptype' => $ptype,
					'fieldvisitsplanned' => $totalVisits,
					'fmonth' => $fmonth,
					'plandate' => $plandate,
					'distcode' => $this -> session -> distcode,
					'procode' => $this -> session -> procode,
					'date_submitted' => date("Y-m-d")
				);
				if($id)
				{
					$vphId = $this -> Common_model -> update_record("visit_plan_header",$vph,array("id" => $id));
					set_activity_log($this->module, "plan updated", "Old plan updated for month of ".$fmonth.".");
					if($vphId)
						$vphId = $id;
				}else
				{
					$vphId = $this -> Common_model -> insert_record("visit_plan_header",$vph);
					set_activity_log($this->module, "plan created", "New plan created for month of ".$fmonth.".");
				}
				$this -> Common_model -> delete_record("visit_plan_visits",$vphId,"visitplanid");
				for($i=1;$i<=$totalVisits;$i++)
				{
					$facode = $_POST["facode"][$i];
					$vpv = array(
						'facode' => $facode,
						'visitdate' => (empty($_POST["visitdate"][$i]))?date("Y-m-d"):date("Y-m-d",strtotime($_POST["visitdate"][$i])),
						'visitplanid' => $vphId,
						'visitcategory' => $_POST["visitcategory"][$i],
						'date_submitted' => date("Y-m-d")
					);
					$vpvId = $this -> Common_model -> insert_record("visit_plan_visits",$vpv);
					$emaildata["visits"][] = array("supervisorid" => $this -> session -> id,"supervisor" => $_POST["supervisor"])+$vpv;
					$this -> Common_model -> delete_record("visit_plan_visit_checklists",$vpvId,"visitplanvisitsid");
					$vpvc = array();
					foreach($_POST["checklistid"][$i] as $key => $val)
					{
						$hcptype_id = isset($_POST["hcptype_id"][$i][$key])?$_POST["hcptype_id"][$i][$key]:2;
						if($val>0)
						{
							$vpvc[] = array(
								'checklistid' => $val,
								'hcptype_id' => $hcptype_id,
								'hcp_value' => isset($_POST["hcp_value"][$i][$key])?$_POST["hcp_value"][$i][$key]:NULL,
								'visitplanvisitsid' => $vpvId
							);
						}
						if($val=="20")
						{
							$hfcat = ($ptype=='all')?get_hfcat($facode):'';
							$datatocheck = array(
								'fmonth' => $fmonth,
								'hfcat' => $hfcat,
								'ptype' => $ptype
							);
							$records = $this -> Common_model -> count_record("da_lqas_chklst",$datatocheck);
							if(!($records >0)){
								$whrarr = array("ptype"=>$ptype);
								if($hfcat!=''){
									$whrarr['is'.$hfcat] = '1';
								}
								$data_elements = $this -> Common_model -> fetchall("da_lqas_pool",NULL,"description,mis_col,register",$whrarr,NULL,array("by"=>"id","type"=>"RANDOM"),NULL,12);
								if(count($data_elements)>0){
									$data_elements = implode("','",array_merge(array_column($data_elements,"description"),array_column($data_elements,"mis_col"),array_column($data_elements,"register")));$qry = "Insert into da_lqas_chklst values (nextval('da_lqas_chklst_id_seq'::regclass),'".implode("','",$datatocheck)."','".$data_elements."',1,'".date("Y-m-d")."')";$qryoutput = $this -> Common_model -> simple_query($qry);$datar["lqaschecklist"] = "not created";
									if($qryoutput){$datar["lqaschecklist"] = "created";}
								}
							}
						}
					}
					$this -> Common_model -> insert_batch_record("visit_plan_visit_checklists",$vpvc);
				}
			}
		}else{
			$datar["message"] = "Error";
			$datar["body"] = "Your plan does not have a visit.";
		}
		if(isset($vphId) && $vphId){
			if(($this -> session -> distcode) > 0){
				$toarray = get_approval_auth_info($this -> session -> distcode);
			}else{
				$toarray = get_approval_auth_info($this -> session -> ptype,'PD');
			}
			if($toarray!=='')
			{
				foreach($toarray as $oneArr){
					$oneArr['fmonth'] = $_POST["fmonth"];
					$oneArr['supervisor'] = $this -> session -> name;
					$oneArr['visits'] = $emaildata["visits"];
					$body = $this->load->view('email_templates/plan_created',$oneArr,TRUE);
					send_emails(
						$oneArr['email'], //to
						NULL, //cc
						"Plan Created/Updated", //subject
						$body
					);
				}
			}
			$datar["message"] = "Success";
		}
		echo json_encode($datar);
	}
	public function plan_edit($id)
	{
		$data["DataRow"] = $this -> Plans_model -> get_plan_info($id);
		$data["id"] = $id;
		$this->load->view('plan/plan_form_edit',$data);
	}
	public function plan_delete($id)
	{
		redirect('plans/lists');exit();
	}
}
?>