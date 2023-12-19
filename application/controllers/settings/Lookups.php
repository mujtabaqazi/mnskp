<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Lookups extends CI_Controller {
	public $module = "Lookups Management";
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		authentication();
		$uristring = $this->uri->uri_string();
		switch(true){
			case (strpos($uristring, "settings/program") !== FALSE):
				$this -> load -> model ('settings/Program_model',"moonprgrm");
				break;
			case (strpos($uristring, "settings/checklist") !== FALSE):
				$this -> load -> model ('settings/Checklist_model',"moonchklst");
				break;
			case (strpos($uristring, "settings/designation") !== FALSE):
				$this -> load -> model ('settings/Designation_model',"moondsgn");
				break;
			case (strpos($uristring, "settings/hcptype") !== FALSE):
				$this -> load -> model ('settings/Hcptype_model',"moonhcp");
				break;
			case (strpos($uristring, "settings/lqaspool") !== FALSE):
				$this -> load -> model ('settings/Lqas_model',"moonlqas");
				break;
			default:
				break;
		}
		$this -> load -> model ('Common_model');
		//hun ithe eh kam rai gaya k sirf oh hi banda isne which achi sake jaira super admin weh matlab baaqi bandiyaan na direct dakhla band krna aje
	}
	//============================ Constructor Function Ends ============================//
	public function index()
	{
		if(is_logged_in()){
			if($this->session->username=="dashboard"){//mean user from shis
				redirect(base_url()."dashboard");exit;
			}else{
				$this->load->view('users/main');
			}
		}else{
			$this->load->view('users/login');
		}
	}
	//============================ Programs Functions Starts ============================//
	//list down all programs
	public function programs($page=0)
	{
		//for filters
		$like = $this->input->post("searchParam");
		$where = array();
		/* foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else if($key=='ptype'){
				$where["designations.".$key] = $value;
			}else{
				$where["users.".$key] = $value;
			}	
		}
		unset($where["users.searchParam"]); */
		//for pagination
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		//to count records
		$config['total_rows'] = $this->moonprgrm->count_programs($where,$like); // Some variable count
		$config['base_url'] = base_url()."settings/programs/";
		$this->pagination->initialize($config);
		$paging = $this->pagination->create_links();
		//get data
		$tableData = $this -> moonprgrm -> get_programs($per_page,$startpoint,$where,$like);
		$tableData["startpoint"]=$startpoint;
		//to check if ajax or not
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$resultJson["tbody"] = getListingAjaxTable($tableData,"settings/program");
			$resultJson["paging"] = $paging;
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			$data["paging"] = $paging;
			$this->load->view('settings/lookups/programs/list',$data);
		}
	}
	//list down details of individual program
	public function program_view($program=NULL)
	{
		//get data
		$tableData = $this -> moonprgrm -> get_programs(null,1,($program)?array("ptype"=>$program):NULL);
		//to check if ajax or not
		$headers = apache_request_headers();
		$data["tableData"] = $tableData;
		$this->load->view('settings/lookups/programs/program_view',$data);
	}
	//============================ Programs Functions Ends ============================//
	//============================ Checklists Functions Starts ============================//
	//list down all checklists
	public function checklists($page=0)
	{
		//shuru krne waaste
		$actions = "settings/checklist";
		$pagination = true;
		//for filters
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else{
				$where[$key] = $value;
			}	
		}
		unset($where["searchParam"]);
		//to check if ajax or not
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}		
		//for pagination
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			//to count records
			$config['total_rows'] = $this->moonchklst->count_checklists($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/checklists/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonchklst -> get_checklists($per_page,$startpoint,$where,$like,$is_ajax);
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingAjaxTable($tableData,$actions);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/lookups/checklists/list',$data);
		}
	}  
	public function checklist_action($type,$id=0){
		$data["id"] = "";$view="";
		$data["hcptypes"] = $this -> Common_model -> fetchall("hcptypes",NULL,"id,displayname");
		if($id>0){
			$data["DataRow"] = $this -> Common_model -> get_info("checklists",$id);
			//to get checklist targets
			$this -> load -> model ('Plans_model');
			$data["chklst_targets"] = $this -> Plans_model -> getchklst_targets($id);
			$data["id"] = $id;		
		}
		switch($type){
			case "add":
				$view="settings/lookups/checklists/checklist_form";
				break;
			case "edit":
				$view="settings/lookups/checklists/checklist_form";
				break;
			case "view":
				$view="settings/lookups/checklists/checklist_view";
				break;
			case "save":
				$data = array(
					'name'			=> $this -> input -> post("name"),
					'purpose' 		=> $this -> input -> post("purpose"),
					'interval' 		=> $this -> input -> post("interval"),
					'fatypelevel'	=> $this -> input -> post("fatypelevel"),
					'ptype' 		=> $this -> input -> post("ptype"),
					'shortname' 	=> $this -> input -> post("shortname"),
					'tablename' 	=> $this -> input -> post("tablename")
				);
				if($id>0)
				{
					$recid = $this -> Common_model -> update_record("checklists",$data,array("id" => $id));
					set_activity_log($this->module, "Checklist updated", "Checklist {".$data["name"]."} updated.");
					$recid = ($recid)?$id:0;
				}else{
					$recid = $this -> Common_model -> insert_record("checklists",$data);
					set_activity_log($this->module, "New Checklist inserted", "Checklist {".$data["name"]."} inserted.");
				}
				//ithe record delete hosi fir nawaan add hosi, eh kam te pora hoi gaya lekin aje testing krni issni
				$this -> Common_model -> delete_record("checklists_targets",$recid,"checklist_id");
				$rowdata = array();
				foreach($_POST["trg_ptype"] as $key => $record)
				{
					$rowdata[] = array(
						'checklist_id'	=> $recid,
						'hcptype_id'	=> $this -> input -> post("trg_hcptype[".$key."]"),
						'ptype'			=> $this -> input -> post("trg_ptype[".$key."]"),
						'displaytitle'	=> $this -> input -> post("displaytitle[".$key."]")
					);
				}
				$this -> Common_model -> insert_batch_record("checklists_targets",$rowdata);
				set_activity_log($this->module, "Targets inserted", "Checklist {".$data["name"]."}'s targets inserted/updated.");
				redirect("settings/checklists");
				break;
			default:
				redirect("settings/checklists");
				break;
		}
		$this->load->view($view,$data);
	}
	//============================ Checklists Functions Ends ============================//
	//============================ Designations Functions Starts ============================//
	//list down all designations
	public function designations($page=0)
	{
		//initialization
		$actions = "settings/designation";
		$pagination = true;
		//for filters
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else{
				$where[$key] = $value;
			}	
		}
		unset($where["searchParam"]);
		//to check if ajax or not
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}		
		//for pagination
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			//to count records
			$config['total_rows'] = $this->moondsgn->count_designations($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/designations/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moondsgn -> get_designations($per_page,$startpoint,$where,$like);
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingAjaxTable($tableData,$actions);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/lookups/designations/list',$data);
		}
	} 
	public function designation_action($type,$id=0){
		$data["id"] = "";$view="";
		if($id>0){
			$data["DataRow"] = $this -> Common_model -> get_info("designations",$id);
			$data["id"] = $id;		
		}
		switch($type){
			case "add":
				$view="settings/lookups/designations/designation_form";
				break;
			case "edit":
				$view="settings/lookups/designations/designation_form";
				break;
			case "view":
				$view="settings/lookups/designations/designation_view";
				break;
			case "save":
				$data=array();
				foreach($_POST as $key => $value)
				{
					$data[$key] = ($value=='')?NULL:$value;
				}
				$desg = isset($data["designation"])?$data["designation"]:"";
				if($id>0)
				{
					$data = $this -> Common_model -> update_record("designations",$data,array("id" => $id));
					set_activity_log($this->module, "Designation updated", "Designation {".$desg."} updated.");
				}else{
					$designationid = $this -> Common_model -> insert_record("designations",$data);
					$checklists = $this -> Common_model -> fetchall("checklists",NULL,"id",array("ptype" => $data["ptype"]));
					foreach($checklists as $singledesgrow){
						$this -> Common_model -> insert_record("designationchecklist",array("designationid"=>$designationid,"checklistid"=>$singledesgrow["id"]));
					}
					set_activity_log($this->module, "Designation inserted", "Designation {".$desg."} inserted.");
				}
				redirect("settings/designations");
				break;
			default:
				redirect("settings/designations");
				break;
		}
		$this->load->view($view,$data);
	}
	//============================ Designations Functions ends ============================//
	//============================ hcptypes Functions Starts ============================//
	//list down all hcptypes
	public function hcptypes($page=0)
	{
		//initialization
		$actions = "settings/hcptype";
		$pagination = true;
		//for filters
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else{
				$where[$key] = $value;
			}	
		}
		unset($where["searchParam"]);
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}		
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingAjaxTable($tableData,$actions);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/lookups/hcptypes/list',$data);
		}
	} 
	public function hcptype_action($type,$id=0){
		$data["id"] = "";$view="";
		if($id>0){
			$data["DataRow"] = $this -> Common_model -> get_info("hcptypes",$id);
			$data["id"] = $id;		
		}
		switch($type){
			case "add":
				$view="settings/lookups/hcptypes/hcptype_form";
				break;
			case "edit":
				$view="settings/lookups/hcptypes/hcptype_form";
				break;
			case "view":
				$view="settings/lookups/hcptypes/hcptype_view";
				break;
			case "save":
				$data=array();
				foreach($_POST as $key => $value)
				{
					$data[$key] = ($value=='')?NULL:$value;
				}
				$hcp = isset($data["name"])?$data["name"]:"";
				if($id>0)
				{
					$data = $this -> Common_model -> update_record("hcptypes",$data,array("id" => $id));
					set_activity_log($this->module, "HCP Type updated", "HCP Type {".$hcp."} updated.");
				}else{
					$data = $this -> Common_model -> insert_record("hcptypes",$data);
					set_activity_log($this->module, "HCP Type inserted", "HCP Type {".$hcp."} inserted.");
				}
				redirect("settings/hcptypes");
				break;
			default:
				redirect("settings/hcptypes");
				break;
		}
		$this->load->view($view,$data);
	}
	//=========================================================================//
	//list down all lqas_pool
	public function lqaspool($page=0)
	{
		//initialization
		$actions = "settings/lqaspool";
		$pagination = true;
		//for filters
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else{
				$where[$key] = $value;
			}	
		}
		unset($where["searchParam"]);
		//to check if ajax or not
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}		
		//for pagination
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		//echo $per_page; exit;
		$serialNumber=($page-1)*$per_page;
		//$ctr = 1;
		$startpoint =  ($page * $per_page) - $per_page ;
		//echo $startpoint ; exit;
		if($pagination){
			//to count records
			$config['total_rows'] = $this->moonlqas->count_lqas($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/lqaspool/";
			//echo json_encode($config);
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonlqas-> get_lqas($per_page,$startpoint,$where,$like);
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingAjaxTable($tableData,$actions);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			 $data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			} 
			$this->load->view('settings/lookups/lqas/lqaspool',$data); 
		} 
	} 
	public function lqaspool_action($type,$id=0){		
		$data["id"] = "";$view="";
		if($id>0){
			$data["DataRow"] = $this -> Common_model -> get_info("da_lqas_pool",$id);
			$data["id"] = $id;		
		}
		switch($type){
			case "add":
				$view="settings/lookups/lqas/lqaspool_form";
				break;
			case "edit":
				$view="settings/lookups/lqas/lqaspool_form";
				break;
			case "view":
				$view="settings/lookups/lqas/lqaspool_view";
				break;
			case "save":		
				$data=array();
				$data["isphc"] = 0;
				$data["isrhc"] = 0;
 				$data["isshc"] = 0;
				foreach($_POST as $key => $value)
				{
					$data[$key] = ($value=='')?NULL:$value;
				}
				$dsc = isset($data["description"])?$data["description"]:"";
				if($id>0)
				{
					$data = $this -> Common_model -> update_record("da_lqas_pool",$data,array("id" => $id));
					set_activity_log($this->module, "Data Element of LQAS Pool updated", "Data Element {".$dsc."} updated.");
				}else{
					$data = $this -> Common_model -> insert_record("da_lqas_pool",$data);
					set_activity_log($this->module, "Data Element of LQAS Pool inserted", "Data Element {".$dsc."} inserted.");
				}
				redirect("settings/lqaspool");
				break;
			default:
				redirect("settings/lqaspool");
				break;
		}
		$this->load->view($view,$data);
	}
}