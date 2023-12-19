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
		$this -> load -> model ('Setup_model');
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
	public function district_listing($page=0)
	{
		authentication();
		$actions = "settings/setup/district_listing";
		$where = array();
		$pagination = true;
		$like = $this->input->post("searchParam");
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
			$config['total_rows'] = $this->Setup_model->get_listing_count("districts",$where,$like);
			$config['base_url'] = base_url()."settings/setup/district_listing";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		} 
		$select='distid as id,district as "District",distcode as "District Code", addeddate as "Added Date"';
		$orderby= "distid";
		$tableData = $this -> Setup_model -> get_listing("districts",$per_page,$startpoint,$select,$orderby,$where);
		
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingAjaxTable($tableData);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/setup/managelisting/district_listing',$data);
		}
	}
	
	public function add_district(){
		authentication();
		$data["id"] = "";
		$this->load->view('settings/setup/managelisting/district_form',$data);
	}
	public function district_edit($id){
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("districts",$id,"distid");
		$this->load->view('settings/setup/managelisting/district_form',$data);
	}
	public function district_save($id=null){
		authentication();
		$data=array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='')?NULL:$value;
		}
		$data["procode"] = "3";
		$data["	province"] = "3";
		if($id)
		{
			$data['updateddate'] = date('Y-m-d');
			$data = $this -> Common_model -> update_record("districts",$data,array("distid" => $id));
		}else{
			$data['addedby'] = $this->session->desg;
			$distcode = $this -> Setup_model ->maxCode('districts','','distcode');
			$data['distcode'] = $distcode;
			$data['addeddate'] = date('Y-m-d');
			$this -> Common_model -> insert_record("districts",$data);
		}
		if($data){
			redirect('settings/setup/district_listing',$data);exit();
		}else{
			echo "Error";
		}
	}
	public function district_delete ($id){
		authentication();
		if($id){
			$this -> Common_model->delete_record("districts",$id,"distid");
		}
		redirect('settings/setup/district_listing');exit();
	}
	////////////////////////////// tehsil //////////////////////////////
	public function tehsil_listing($page=0)
	{
		authentication();
		$actions = "settings/setup/tehsil_listing";
		$where = array();
		$pagination = true;
		$like = $this->input->post("searchParam");
		$per_page = $this->config->item("per_page");
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			if($this->input->post('distcode')){
				$where["distcode"] = $this->input->post('distcode');
			}
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}	
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this->Setup_model->get_listing_count("tehsil",$where,$like);
			$config['base_url'] = base_url()."settings/setup/tehsil_listing/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		} 
		
		$select='tid as id,tcode as "Tehsil Code",tehsil as "Tehsil",districtname(distcode) as Districts,population as Population, addeddate as "Added Date"';
		$orderby= "tid";
		$tableData = $this -> Setup_model -> get_listing("tehsil",$per_page,$startpoint,$select,$orderby,$where);
		
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingTableNew($tableData, "settings/Setup/tehsil",false,false,"",false);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/setup/managelisting/tehsil_listing',$data);
		}
	}
	
	public function add_tehsil(){
		authentication();
		$data["id"] = "";
		$data['district'] = getDistricts_options(true);
		$this->load->view('settings/setup/managelisting/tehsil_form',$data);
	}
	public function tehsil_edit($id){
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("tehsil",$id,"tid");
		$this->load->view('settings/setup/managelisting/tehsil_form',$data);
	}
	public function tehsil_save($id=null){
		authentication();
		$data=array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='')?NULL:$value;
		}
		$data["procode"] = "3";
		if($id)
		{
			$data['updateddate'] = date('Y-m-d');
			$data = $this -> Common_model -> update_record("tehsil",$data,array("tid" => $id));
		}else{
			$data['distcode'] = $distcode = $this->input->post('distcode');
			$data['addedby'] = $this->session->desg;
			$tcode = $this -> Setup_model ->maxCode('tehsil',$distcode,'tcode');
			$data['tcode'] = $tcode;
			$data['addeddate'] = date('Y-m-d');
			$id = $this -> Common_model -> insert_record("tehsil",$data);
		}
		if($data){
			redirect('settings/setup/tehsil_listing',$data);exit();
		}else{
			echo "Error";
		}
	}
	public function tehsil_delete ($id){
		authentication();
		if($id){
			$this -> Common_model->delete_record("tehsil",$id,"tid");
		}
		redirect('settings/setup/tehsil_listing');exit();
	}
	///////////////////////// unioncouncil //////////////////////////
	
	public function unioncouncil_listing($page=0)
	{
		authentication();
		$actions = "settings/setup/unioncouncil_listing";
		$where = array();
		$pagination = true;
		$like = $this->input->post("searchParam");
		$per_page = $this->config->item("per_page");
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			if($this->input->post('distcode')){
				$where["distcode"] = $this->input->post('distcode');
			}
			if($this->input->post('tcode')){
				$where["tcode"] = $this->input->post('tcode');
			}
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}	
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this->Setup_model->get_listing_count("unioncouncil",$where,$like);
			$config['base_url'] = base_url()."settings/setup/unioncouncil_listing/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		} 
		
		$select='unid as id,uncode as "UCs code",un_name as "Union Council", districtname(distcode) as District,tehsilname(tcode) as "Tehsil",population as Population, addeddate as "Added Date"';
		$orderby= "unid";
		$tableData = $this -> Setup_model -> get_listing("unioncouncil",$per_page,$startpoint,$select,$orderby,$where);
		
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingTableNew($tableData, "settings/Setup/uc",false,false,"",false);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/setup/managelisting/unioncouncil_listing',$data);
		}
	}
	public function getTehsils() {
		authentication();		
		$data = $this -> Setup_model -> getTehsils();	
		echo $data;	
	}
	public function generateUcode(){
		authentication();
		$result['message'] = "Please Select District and Tehsil";
		$result['code'] = "";
		if($this->input->post('distcode') && $this->input->post('tcode')){
			$where['distcode'] = $this->input->post('distcode');
			$where['tcode'] = $this->input->post('tcode');
			$result['code'] = $this -> Setup_model ->generateUcode('unioncouncil',$where,'uncode');
		}
		echo json_encode($result);
	}
	public function add_uc(){
		authentication();
		$data["id"] = "";
		$data['district'] = getDistricts_options(true);
		$this->load->view('settings/setup/managelisting/uc_form',$data);
	}
	public function uc_edit($id){
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("unioncouncil",$id,"unid");
		$this->load->view('settings/setup/managelisting/uc_form',$data);
	}
	public function uc_save($id=null){
		authentication();
		$data=array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='')?NULL:$value;
		}
		$data["procode"] = "3";
		if($id)
		{
			$data['updateddate'] = date('Y-m-d');
			$data = $this -> Common_model -> update_record("unioncouncil",$data,array("unid" => $id));
		}else{
			$data['addedby'] = $this->session->desg;
			$data['addeddate'] = date('Y-m-d');
			$data['unid'] = "D".$data['distcode']."-".$data['uncode'];
			$id = $this -> Common_model -> insert_nonpk_record("unioncouncil",$data);
		}
		if($data){
			redirect('settings/setup/unioncouncil_listing',$data);exit();
		}else{
			echo "Error";
		}
	}
	public function uc_delete ($id){
		authentication();
		if($id){
			$this -> Common_model->delete_record("unioncouncil",$id,"unid");
		}
		redirect('settings/setup/unioncouncil_listing');exit();
	}
	///////////////////////   facility ////////////////////////////////////////////////////
	public function facility_listing($page=0)
	{
		authentication();
		$actions = "settings/setup/facility_listing";
		$where = array("func_status"=>"F");
		$pagination = true;
		
		$like = $this->input->post("searchParam");
		$per_page = $this->config->item("per_page");
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			if($this->input->post('distcode')){
				$where["distcode"] = $this->input->post('distcode');
			}
			if($this->input->post('tcode')){
				$where["tcode"] = $this->input->post('tcode');
			}
			if($this->input->post('fatype')){
				$where["fatype"] = $this->input->post('fatype');
			}
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
			$actions = isset($where["actions"])?(($where["actions"]=="false")?"":$where["actions"]):$actions;
			unset($where["actions"]);
		}	
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this->Setup_model->get_listing_count("facilities",$where,$like);
			$config['base_url'] = base_url()."settings/setup/facility_listing/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		} 
		
		$select="facid as id,facode as \"Facility Code\",fac_name as \"Facility Name\",districtname(distcode) as Districts,tehsilname(tcode) as \"Tehsil\",unname(uncode) as \"Unioncouncil \",fatype as \"Facility Type \", (select array_to_string(array_agg(lhsname), ',') from lhsdb where lhsdb.facode=facilities.facode) as \"LHS Names \",addeddate as \"Added Date\"";
		$orderby= "addeddate";
		$tableData = $this -> Setup_model -> get_listing("facilities",$per_page,$startpoint,$select,$orderby,$where);
		$tableData["startpoint"]=$startpoint;
		if($is_ajax){
			$resultJson["tbody"] = getListingTableNew($tableData, "settings/Setup/facility",false,false,"",false);
			if($pagination){
				$resultJson["paging"] = $paging;
			}
			echo json_encode($resultJson);
		}else{
			$data["tableData"] = $tableData;
			if($pagination){
				$data["paging"] = $paging;
			}
			$this->load->view('settings/setup/managelisting/facility_listing',$data);
		}
	}
	
	public function facility_add(){
		authentication();
		$data["id"] = "";
		$data['district'] = getDistricts_options(true);
		$this->load->view('settings/setup/managelisting/facility_form',$data);
	}
	public function getUnC() {
		authentication();
		$tcode = $this -> input -> post('tcode');
		$data = $this -> Setup_model -> getUnC($tcode);
		echo $data;
	}
	public function generatefaCode() {
		authentication();
		$where['distcode'] = $this->input->post('distcode');
		$data=$this -> Setup_model -> generatefaCode($where);
		echo $data;
	}
	public function facility_edit($id){
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("facilities",$id,"facid");
		$this->load->view('settings/setup/managelisting/facility_form',$data);
	}
	public function facility_save($id=null){
		authentication();
		$data=array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='')?NULL:$value;
		}
		$data["procode"] = "3";
		if($id)
		{
			$data['updateddate'] = date('Y-m-d');
			$data = $this -> Common_model -> update_record("facilities",$data,array("facid" => $id));
		}else{
			$data['func_status'] = 'F';
			$data['addedby'] = $this->session->desg;
			$data['addeddate'] = date('Y-m-d');
			$data['facid'] = 'LD'.$data['distcode'].'-'.$data['facode'];
			$id = $this -> Common_model -> insert_nonpk_record("facilities",$data);
		}
		if($data){
			redirect('settings/setup/facility_listing',$data);exit();
		}else{
			echo "Error";
		}
	}
	public function facility_delete ($id){
		authentication();
		if($id){
			$this -> Common_model->delete_record("facilities",$id,"facid");
		}
		redirect('settings/setup/facility_listing');exit();
	}
	
	public function undo_approve_list($fmonth=0)
	{
		authentication();
		if($fmonth){}else{$fmonth = date("Y-m");}
		$data["fmonth"] = $fmonth;
		$data["tableData"] = $this -> Setup_model -> get_all_plans($fmonth);
		$this->load->view('settings/setup/undoapprovelist',$data);
	}
	public function undo_approve(){
		if($this->input->post('distcode')){
			$fmonth = $this->input->post('fmonth');
			if(is_numeric($this->input->post('distcode')))
			{
				$this -> Common_model -> delete_record_multiple_colum("visit_plan_approval",array('distcode' => $this->input->post('distcode'),'fmonth' => $_POST["fmonth"]));
				set_activity_log($this->module, "Undo approval", "DHO undo approval of plan for month of ".$_POST["fmonth"]." and distcode ".$this->input->post('distcode').".");
			}else{
				$this -> Common_model -> delete_record_multiple_colum("pro_visit_plan_approval",array('ptype' => $this->input->post('distcode'),'fmonth' => $_POST["fmonth"]));
				set_activity_log($this->module, "Undo approval", "PD undo approval of plan for month of ".$_POST["fmonth"]." and ptype ".$this->input->post('distcode').".");
			}
			echo "Success";
			
		}else if($this->input->post('fmonth') && $this->input->post('all')){
			$this -> Common_model -> delete_record_multiple_colum("visit_plan_approval",array('fmonth' => $_POST["fmonth"]));
			$this -> Common_model -> delete_record_multiple_colum("pro_visit_plan_approval",array('fmonth' => $_POST["fmonth"]));
			set_activity_log($this->module, "Undo approval", "Undo approval of All plan DHO,PD for month of ".$_POST["fmonth"]);
			redirect('settings/setup/undo_approve_list');exit();
		}
	}
	
}

?>