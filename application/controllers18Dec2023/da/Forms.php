<?php
//for help rajaimranqamer@gmail.com
defined('BASEPATH') OR exit('No direct script access allowed');
class Forms extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		if($this->router->method=="lqas_ext_view"){}else{
			authentication();
		}
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Da_model');
	}
	//============================ Constructor Function Ends ============================//
	//================= District Implementation Unit Portion Started ====================//
	//for lqas
	public function lqas($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('da/lqas_form',$data);
	}
	//for lqas view
	public function lqas_view($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_lqas",$vpvc_id,"vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'lqas_date'=>$data["DataRow"]->lqas_date,'entity_code'=>$data["DataRow"]->entity_code,'entity_type'=>$data["DataRow"]->entity_type);
		$previous=$this ->Da_model -> get_previous('da_lqas',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('da/lqas_form_view',$data);
		}else{
			redirect(base_url()."404");
		}		
	}
	//for lqas view from other MIS systems (un-Authorized Access)
	public function lqas_ext_view($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_lqas",$vpvc_id,"vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		//$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'lqas_date'=>$data["DataRow"]->lqas_date,'entity_code'=>$data["DataRow"]->entity_code,'entity_type'=>$data["DataRow"]->entity_type);
		//$previous=$this ->Da_model -> get_previous('da_lqas',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			//$data['previous']=$previous;
			$this->load->view('da/lqas_form_ext_view',$data);
		}else{
			redirect(base_url()."404");
		}		
	}
	//for lqas Compare view
	public function lqas_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("da_lqas",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("da_lqas",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('da/lqas_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//for lqas file download for specific user
	public function lqas_download($id)
	{
		if($id >0){
			$data["DataRow"] = $this -> Common_model -> get_info("da_lqas",$id,"vpvc_id");
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('da/lqas_form_download',$data);
		}else{
			redirect('da/listing/lqas');exit;
		}
	}
	//to edit lqas checklist
	public function lqas_edit($vpvc_id)
	{
		$ptypearr = array("lhw","mnch","all");
		$data["caneditelements"] = (in_array($this->session->ptype,$ptypearr))?false:true;
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_lqas",$vpvc_id,"vpvc_id");
		$data["id"] = $data["DataRow"]->id;
		$this->load->view('da/lqas_form_edit',$data);
	}	
	//to save lqas
	public function save_lqas($id=0)
	{
		$data=array();
		$formats = array("d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = (($value=='')?NULL:$value);
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
			$data = $this -> Common_model -> update_record("da_lqas",$data,array("id" => $id));
			//$data = 1;
			$postedupdated = $this -> Common_model -> get_info_array("da_lqas",$id);
		}else
		{
			$postedupdated = $data;
			$data = $this -> Common_model -> insert_record("da_lqas",$data);
		}
		if($data > 0){
			//set data to send to dhis/lhw/mnch to update lqas status 
			//if designation not like 'fp%',entity_type = 'DHIS' and  checklist completed(not temp saved)
			$is_temp_saved = $postedupdated["is_temp_saved"];
			$entity_type = $postedupdated["entity_type"];
			$supervisor_desg = $postedupdated["supervisor_desg"];
			$dhisdesgarray = array("ADHO","DDHO","DHIS-Coordinator","DHO");
			if($is_temp_saved==0 && $entity_type=="DHIS" && in_array($supervisor_desg,$dhisdesgarray)){
				//send to dhis
				$datatodhis = array(
					"fmonth"			=>	substr($postedupdated["fmonth"],-2)."-".substr($postedupdated["fmonth"],0,4),
					"facode"			=>	$postedupdated["facode"],
					"vpvc_id"			=>	$postedupdated["vpvc_id"],
					"supervisor_name"	=>	$postedupdated["supervisor_name"],
					"supervisor_desg"	=>	$postedupdated["supervisor_desg"],
					"lqas_date"			=>	$postedupdated["lqas_date"],
					"lqas_ap"			=>	$postedupdated["lqas_ap"]
				);
				/******************Code by Raja Imran (rajaimranqamer@gmail.com)****************************/
				//send_lqas_held_values
				//code to send data to dhis server so that lqas data can be updated there for future use in reports analysis etc
				$random = rand(0,99999999).date("Y").date("m");
				$validationcode = md5('M&S'.date("Y-m-d").'to'.$random.'dhiskp');
				$data = array('hackerinfo' => $validationcode, 'code' => $random)+$datatodhis;
				//post data mechanism
				$fields_string = "";
				foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				$fields_string = rtrim($fields_string, '&');
				//url to post
				$url = DHIS_BASE_URL.'dhis_mns/clientformns.php';
				//curl options
			    $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//FALSE				
				curl_setopt($ch,CURLOPT_POST, count($data));//posting data
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				$head = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);				
				curl_close($ch);
				$userData = json_decode($head, true);
				//echo "<pre>";
				//print_r($userData);
				//exit('exit');
				if(isset($userData["result"])){
					echo $userData["message"];//error and success here
				//exit("sucess by cbr");
				}else{
					echo "Something went wrong!";
					//exit('something wrong');
				}
				/**********************************************/
			}
			
			redirect('da/listing/lqas',$data);
		}else{
			echo "Error";
		}
	}
	//---------------------------LQAS Portion ends-------------------------------//
	//for m&e
	public function mnecellact($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('da/mne_form',$data);
	}
	//for m&e view
	public function mnecellact_view($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_mnecellact",$vpvc_id,"vpvc_id");
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Da_model -> get_previous('da_mnecellact',$wc);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["previous"] = $previous;
			$data["id"] = $data["DataRow"]->id;
			$this->load->view('da/mne_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	//for mnecellact Compare view
	public function mnecellact_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("da_mnecellact",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["DataRow"] = $this -> Common_model -> get_info("da_mnecellact",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('da/mne_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit m&e checklist
	public function mnecellact_edit($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_mnecellact",$vpvc_id,"vpvc_id");
		$data["id"] = $data["DataRow"]->id;
		$this->load->view('da/mne_form_edit',$data);
	}	
	//to save m&e
	public function save_mnecellact($id=0)
	{
		$data=array();
		$formats = array("d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($_POST as $key => $value)
		{
			$data[$key] = (($value=='')?NULL:$value);
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
			$data = $this -> Common_model -> update_record("da_mnecellact",$data,array("id" => $id));
		}else
		{
			$data = $this -> Common_model -> insert_record("da_mnecellact",$data);
		}
		if($data > 0){
			redirect('da/listing/mnecellact',$data);
		}else{
			echo "Error";
		}
	}
	//for dhisfacility 
	public function facilityact($vpvc_id)
	{
		$data["id"] = "";
		$data["vpvc_id"] = $vpvc_id;
		$data["vpvcDataRow"] = getchlistdetails($vpvc_id);
		$this->load->view('da/facilityact_form',$data);
	}
	//for dhisfacility view
	public function facilityact_view($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_dhisfacilityact",$vpvc_id,"vpvc_id");		
		$data["DataRowDetail"] = $this -> Common_model -> fetchall("da_dhisfacilityact_detail",'','',array('main_id'=>$data["DataRow"]->id));
		$checklist = $this -> Common_model -> get_info("visit_plan_visit_checklists",$vpvc_id,"id");
		$wc=array('checklistid'=>$checklist->checklistid,'hcptype_id'=>$checklist->hcptype_id,'facode'=>$data["DataRow"]->facode,'dov'=>$data["DataRow"]->dov);
		$previous=$this ->Da_model -> get_previous('da_dhisfacilityact',$wc);

		if(count((array)$data["DataRow"]) >0)
		{
			$data["vpvc_id"] = $vpvc_id;
			$data["id"] = $data["DataRow"]->id;
			$data['previous']=$previous;
			$this->load->view('da/facilityact_form_view',$data);
		}else{
			redirect(base_url()."404");
		}
		
	}
	//for dhisfacility Compare view
	public function facilityact_compare()
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
		$data["CompareRow"] = $this -> Common_model -> get_info("da_dhisfacilityact",$query_array['current'],"vpvc_id",NULL,$extraWhere);
		$data["CompareRowDetail"] = $this -> Common_model -> fetchall("da_dhisfacilityact_detail",'','',array('main_id'=>$data["CompareRow"]->id));
		$data["DataRow"] = $this -> Common_model -> get_info("da_dhisfacilityact",$query_array['compareto'],"vpvc_id",NULL,$extraWhere);
		$data["DataRowDetail"] = $this -> Common_model -> fetchall("da_dhisfacilityact_detail",'','',array('main_id'=>$data["DataRow"]->id));
		if(count((array)$data["DataRow"]) >0)
		{
			$data["id"] = $data["DataRow"]->id;
			
			$this->load->view('da/facilityact_form_view_compare',$data);
		}else{
			redirect(base_url()."404");
		}
		}else{
			redirect(base_url()."404");
		}
		
	}
	//to edit dhisfacility checklist
	public function facilityact_edit($vpvc_id)
	{
		$data["vpvc_id"] = $vpvc_id;
		$data["DataRow"] = $this -> Common_model -> get_info("da_dhisfacilityact",$vpvc_id,"vpvc_id");
		$data["id"] = $data["DataRow"]->id;
		$data["DataRowDetail"] = $this -> Common_model -> fetchall("da_dhisfacilityact_detail",'','',array('main_id'=>$data["DataRow"]->id));
		$this->load->view('da/facilityact_form_edit',$data);
	}	
	//to save dhisfacility
	public function save_facilityact($id=0)
	{
		$data=array();$detail=array();$dataPosted=array();
		$dataPosted = $_POST;
		$removeKeys = array('staff_name', 'staff_desg','dhis_01','dhis_02','dhis_02a','dhis_03','dhis_04','dhis_05','dhis_06','dhis_07','dhis_08','dhis_09','dhis_10','dhis_11','dhis_12','dhis_13','dhis_14','dhis_15','dhis_16','dhis_17','dhis_18','dhis_19','dhis_20','dhis_21','dhis_22','dhis_24','lqas_forms','cmrr');
		foreach($removeKeys as $key) {
		   unset($dataPosted[$key]);
		}
		$formats = array("d/m/Y","d-m-Y","Y-m-d","m-d-Y");
		foreach($dataPosted as $key => $value)
		{
			$data[$key] = (($value=='')?NULL:$value);
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
			$data = $this -> Common_model -> update_record("da_dhisfacilityact",$data,array("id" => $id));
			$this -> Common_model -> delete_record("da_dhisfacilityact_detail",$id,"main_id");
		}else
		{
			$id = $this -> Common_model -> insert_record("da_dhisfacilityact",$data);			
		}
		if($_POST['staff_name']){
			foreach($_POST['staff_name'] as $s_key => $s_val)
			{
				if(!empty($_POST['staff_name'][$s_key])){
					$detail[] = array(
						'staff_name' => $_POST['staff_name'][$s_key],
						'staff_desg' => $_POST['staff_desg'][$s_key],
						'dhis_01' => $_POST['dhis_01'][$s_key],
						'dhis_02' => $_POST['dhis_02'][$s_key],
						'dhis_02a' => $_POST['dhis_02a'][$s_key],
						'dhis_03' => $_POST['dhis_03'][$s_key],
						'dhis_04' => $_POST['dhis_04'][$s_key],
						'dhis_05' => $_POST['dhis_05'][$s_key],
						'dhis_06' => $_POST['dhis_06'][$s_key],
						'dhis_07' => $_POST['dhis_07'][$s_key],
						'dhis_08' => $_POST['dhis_08'][$s_key],
						'dhis_09' => $_POST['dhis_09'][$s_key],
						'dhis_10' => $_POST['dhis_10'][$s_key],
						'dhis_11' => $_POST['dhis_11'][$s_key],
						'dhis_12' => $_POST['dhis_12'][$s_key],
						'dhis_13' => $_POST['dhis_13'][$s_key],
						'dhis_14' => $_POST['dhis_14'][$s_key],
						'dhis_15' => $_POST['dhis_15'][$s_key],
						'dhis_16' => $_POST['dhis_16'][$s_key],
						'dhis_17' => $_POST['dhis_17'][$s_key],
						'dhis_18' => $_POST['dhis_18'][$s_key],
						'dhis_19' => $_POST['dhis_19'][$s_key],
						'dhis_20' => $_POST['dhis_20'][$s_key],
						'dhis_21' => $_POST['dhis_21'][$s_key],
						'dhis_22' => $_POST['dhis_22'][$s_key],
						'dhis_24' => $_POST['dhis_24'][$s_key],
						'lqas_forms' => $_POST['lqas_forms'][$s_key],
						'cmrr' => $_POST['cmrr'][$s_key],
						'main_id' => $id
					);
				}
			}
			if(!empty($detail)){
				$this -> Common_model -> insert_batch_record("da_dhisfacilityact_detail",$detail);
			}
		}
		if($data > 0){
			redirect('da/listing/facilityact',$data);
		}else{
			echo "Error";
		}
	}
}
