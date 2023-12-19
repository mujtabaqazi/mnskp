<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Setup extends CI_Controller {
	public $module = "Setup Management";
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
		authentication();//for authentication
		$uristring = $this->uri->uri_string();
		
		switch(true){
			case ((strpos($uristring, "settings/ude") !== FALSE) || (strpos($uristring, "settings/fde") !== FALSE)):
				break;
			default:
				break;
		}
		$this -> load -> model ('Common_model');
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
	//============================ config Functions Starts ============================//
	public function config()
	{
		$data["DataRow"] = $this -> Common_model -> get_info("sysconf");
		$this->load->view('settings/setup/config_form',$data);
	}
	public function config_save(){
		$datee = 15;
		if($date1 = $this->input->post("checklistfilldays")){
			$datee = ($date1>75)?75:$date1;
			$datee = ($datee<1)?1:$datee;
		}
		$data["checklistfilldays"] = $datee;
		$result = $this -> Common_model -> count_record("sysconf");		
		if($result>0){
			$this -> Common_model -> update_all_records("sysconf",$data);
		}else{
			$this -> Common_model -> insert_nonpk_record("sysconf",$data);
		}
		set_activity_log($this->module, "System Configuration changed", "System Configuration changed");
		redirect("settings/config");
	}
	//======================= config Functions Ends ============================//
	//============================ Freeze data Entry Functions Starts ============================//
	public function fde()
	{
		/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
		$data["DataRow"] = $this -> Common_model -> get_info("plan_de_settings",NULL,NULL,"de_freeze_date");
		$this->load->view('settings/setup/fde_form',$data);
		/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
	}
	public function fde_save(){
		$datee = 15;
		if($date1 = $this->input->post("de_freeze_date")){
			$datee = ($date1>31)?31:$date1;
			$datee = ($datee<1)?1:$datee;
			/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
		}
		$data["de_freeze_date"] = $datee;
		$data = $this -> Common_model -> update_all_records("plan_de_settings",$data);
		/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
		set_activity_log($this->module, "DE Freeze Date changed", "Date entry freeze date changed to $datee.");
		/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
		redirect("settings/fde");
	}
	//======================= Freeze data Entry Functions Ends ============================//
	//======================= Un-Freeze data Entry Functions Starts =======================//
	//list down all un freezed fmonths with users
	public function ude($page=0)
	{
		/* //initialization
		$actions = "settings/ude";
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
			$config['total_rows'] = $this-> moonhcp ->count_hcptypes($where,$like); // Some variable count
			$config['base_url'] = base_url()."settings/hcptypes/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		//get data
		$tableData = $this -> moonhcp -> get_hcptypes($per_page,$startpoint,$where,$like);
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
		} */
	} 
	public function ude_action($type,$id=0){
		/* $data["id"] = "";$view="";
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
				if($id>0)
				{
					$data = $this -> Common_model -> update_record("hcptypes",$data,array("id" => $id));
				}else{
					$data = $this -> Common_model -> insert_record("hcptypes",$data);
				}
				redirect("settings/hcptypes");
				break;
			default:
				redirect("settings/hcptypes");
				break;
		}
		$this->load->view($view,$data); */
	}
}