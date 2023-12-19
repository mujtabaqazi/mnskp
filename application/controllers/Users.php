<?php
/*
            ___U___S___E___R___S___ 
		 ______________________________
		/""""""""""""""""""""""""""""""\
        ||       Class : Users        ||
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
class Users extends CI_Controller {
	public $module = "Users Management";
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Users_model');
		
	}
	public function index()
	{
		if(is_logged_in()){
			if($this->session->username=="dashboard"){
				redirect(base_url()."dashboard");exit;
			}else{
				$this->load->view('users/main');
			}
		}else{
			$this->load->view('users/login');
		}
	}
	public function login($var=null)
	{
		$shared2="dh&s#98765.%,143";
		$key1=sha1(md5($shared2.date("Y-m-d")));
		if(is_logged_in()){
			if( isset($_REQUEST["key"]) && ($_REQUEST["key"]==$key1) && $this->session->domain=='chklist'){
				$this->session->unset_userdata('domain');
				$this->session->unset_userdata('userLevel');
				$this->session->unset_userdata('username');
				$this->session->set_userdata('domain','dhis');
				$this->session->set_userdata('userLevel','2');
				$this->session->set_userdata('username','dashboard');
				redirect(base_url()."dashboard/checklists/imc_gois");exit;
			}else{
				redirect(base_url());exit;
			}
		}
		$username = $this -> input -> post('username');
		$password = $this -> input -> post('password');		
		$row=$this->Users_model->login($username,md5($password));
		if(($row!=0) && (count($row) > 0)){
			$sessionData = array(
				'id'  		=> $row['id'],
				'username'  => $row['username'],
				'name'  	=> $row['fullname'],
				'distcode'  => $row['distcode'],
				'tcode'		=> $row['tcode'],
				'uncode'  	=> $row['uncode'],
				'procode'  	=> $row['procode'],
				'userAuth'  => 'Yes',
				'userLevel' => $row['level'],
				'email' 	=> $row['email'],
				'utype' 	=> $row['utype'],
				'ptype' 	=> $row['ptype'],
				'desg' 		=> $row['designation'],
				'totalchklst' => $row['totalchklst'],
				'expire' 	=> time() + (120 * 120),
				'de_special_fmonth' => $row['de_special_fmonth'],
				'domain' => 'chklist'
			);			
			$this -> session -> set_userdata($sessionData);
		}else if(isset($_GET["key"]) || isset($_GET["code"])){
			$authKey = (isset($_GET["key"]))?$_GET["key"]:'';
			$authKey2 = (isset($_GET["code"]))?$_GET["code"]:'';
			$shared="m&s#98765";
			$shared1="dap#,0%$#moon";
			$shared2="dh&s#98765.%,143";
			$key=sha1(md5($shared.date("Y-m-d")));
			$key1=sha1(md5($shared1.date("Y-m-d")));
			$key2=sha1(md5($shared2.date("Y-m-d")));
			$key3 = md5(date("Y-n-d"));
			if($authKey==$key || $authKey==$key1 || $authKey==$key2 || $authKey2==$key3){
				$sessionData = array(
					'id'  => 99999,
					'username'  => 'dashboard',
					'name'  => 'Dashboard',
					'distcode'  => '',
					'tcode'  => '',
					'uncode'  => '',
					'procode'  => '3',
					'userAuth'  => 'Yes',
					'userLevel' => '2',
					'email' => 'imran@pace-tech.com',
					'utype' => 'Executive',
					'ptype' => 'all',
					'desg' => 0,
					'totalchklst' => 0,
					'expire' => time() + (120 * 120),
					'domain' => ''
				);			
				$this -> session -> set_userdata($sessionData);
				if($authKey==$key1){
					$dataresp = array(
						'code' => 200,
						'message' => "Success",
						'body' => "You Successfully loggedin"
					);
					echo json_encode($dataresp);
					exit;
				}elseif($authKey==$key2){
					$this->session->unset_userdata('domain');
					$this->session->set_userdata('domain','dhis');
					//$this->session->set_userdata($sessionData['domain'],'dhis');
					/* $this->session->unset_userdata('domain')
					$this->session->set_userdata('domain', 'dhis'); */
					/* echo "<script type='text/javascript'>window.close();</script>";
					$var=true;
					return $var; */
					$dhisresp = array(
						'message' => "Success"
					);
					echo json_encode($dhisresp);
				}else{
					redirect(base_url()."dashboard");exit;
				}
			}else{
				$this -> session -> set_flashdata('message', 'Sorry, You are not authorized to Access this Page! Try Again!');
				redirect(base_url());exit;
			}
		}
		else{
			$this -> session -> set_flashdata('message', 'Sorry, you entered wrong Username or Password! Try Again!');
			redirect(base_url());exit;
		}		
		$this->load->view('users/main');
	}
	public function changePass()
	{
		if(authentication()){
			$this->load->view('users/changePass');
		}else{
			$this->load->view('users/login');
		}
	}
	public function logout() {
		if(is_logged_in()){
			date_default_timezone_set("Asia/Karachi");
			$data = array(
				'logout_date_time' => date("Y-m-d h:i:s")
			);		
			$this->Common_model->update_record("login_log",$data,array("login_id" => $this->session -> UserLogId));
			$this->session->sess_destroy();
		}
		redirect(base_url());exit();
	}
	public function lists($page=0)
	{
		authentication();
		$actions = "users/user";
		$pagination = true;
		$like = $this->input->post("searchParam");
		$where = array();
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else if($key=='ptype'){
				$where["designations.".$key] = $value;
			}else{
				$where["users.".$key] = $value;
			}	
		}
		unset($where["users.searchParam"]);
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["users.pagination"])?(($where["users.pagination"]=="false")?false:$where["users.pagination"]):$pagination;
			unset($where["users.pagination"]);
			$actions = isset($where["users.actions"])?(($where["users.actions"]=="false")?"":$where["users.actions"]):$actions;
			unset($where["users.actions"]);
		}
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this->Users_model->count_users($where,$like); // Some variable count
			$config['base_url'] = base_url()."users/lists/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		$tableData = $this -> Users_model -> get_users($per_page,$startpoint,$where,$like);
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
			$this->load->view('users/list',$data);
		}
	}
	public function add()
	{
		authentication();
		$data["id"] = "";
		$this->load->view('users/user_form',$data);
	}
	public function save($id=NULL)
	{
		authentication();
		$data=array();
		foreach($_POST as $key => $value)
		{
			$data[$key] = ($value=='')?NULL:$value;
		}
		$allselecteddists = array();
		$data["procode"] = "2";
		if(isset($data["level"]) && ($data["level"] == "4"))
		{
			$data["level"] = "2";
			$allselecteddists = $data["distcode"];
			unset($data["distcode"]);
		}
		if($id)
		{
			$data["updateddate"]=date("Y-m-d");
			if($data["password"] && $data["password"]!=''){ $data["password"] = md5($data["password"]); }else{
				unset($data["password"]);
			}

			$userdata = $this -> Common_model -> get_info("users",$id,"username");
			$data = $this -> Common_model -> update_record("users",$data,array("username" => $id));
			$this -> Common_model -> delete_record("usersdistricts",$userdata->id,"userid");	
			foreach($allselecteddists as $key =>$record){
				$this -> Common_model -> insert_nonpk_record("usersdistricts",array("userid"=>$userdata->id,"distcode"=>$record));
			}
			set_activity_log($this->module, "User updated", "Information of user {".$id."} changed.");
		}else
		{
			$data["password"] = md5($data["password"]);
			$data["addeddate"]= date("Y-m-d");
			$data = $this -> Common_model -> insert_record("users",$data);
			foreach($allselecteddists as $key =>$record){
				$this -> Common_model -> insert_record("usersdistricts",array("userid"=>$data,"distcode"=>$record));
			}
			set_activity_log($this->module, "User created", "New user with username {".$data["username"]."} created.");
		}
		if($data){
			redirect('users/lists',$data);exit();
		}else{
			echo "Error";
		}
	}
	public function update_my_pass(){
		authentication();//for authentication
		$this->form_validation->set_rules('curr_pass', 'Current Password', 'trim|required|min_length[6]|callback_curr_pass_check');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('conf_pass', 'Password Confirmation', 'trim|required|matches[new_pass]|min_length[6]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('users/changePass');
		}
		else
		{
			$username = $this->session->userdata("username");
			$datatosave = array(
				"password" => md5($this->input->post("new_pass")),
				"updateddate" => date("Y-m-d")
			);
			$this->Common_model->update_record("users",$datatosave,array("username"=>$username));
			$this -> session -> set_flashdata('message', 'You have Successfully changed Your Password!');
			redirect(base_url());
		}
	}
	public function curr_pass_check($old_password){
		$old_password_hash = md5($old_password);
		$username = $this->session->userdata("username");
		$old_record = $this->Common_model->get_info_array("users",$username,"username","password");
		$old_password_db_hash = isset($old_record)?$old_record["password"]:"";
		if($old_password_hash != $old_password_db_hash)
		{
			$this->form_validation->set_message('curr_pass_check', 'Current password is Wrong!');
			return FALSE;
		} 
	   return TRUE;
	}
	public function update_pass(){
		authentication();
		$ulevel = $this -> session -> userLevel;
		$utype = $this -> session -> utype;
		$this->form_validation->set_rules('user_username', 'UserName', 'trim|required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('conf_pass', 'Password Confirmation', 'trim|required|matches[new_pass]|min_length[6]');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('users/changePass');exit;
		}
		else if($ulevel=="2" and $utype == 'Admin')
		{
			$datatosave = array(
				"password" => md5($this->input->post("new_pass")),
				"updateddate" => date("Y-m-d")
			);
			$this->Common_model->update_record("users",$datatosave,array("username"=>$this->input->post("user_username")));
			$this -> session -> set_flashdata('message', 'You have Successfully changed Your Password!');
		}
		redirect(base_url());
	}
	public function user_view($username)
	{
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("users",$username,"username");
		$data["id"] = $username;
		$this->load->view('users/user_view',$data);
	}
	public function check_username($username=NULL)
	{
		$username = ($username)?$username:$this->input->post("username");
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("users",$username,"username");
		if(isset($data["DataRow"]->id) && ($data["DataRow"]->id)>0){
			echo "exists";
		}else{
			echo "not exists";
		} 
	}
	public function user_edit($username)
	{
		authentication();
		$data["DataRow"] = $this -> Common_model -> get_info("users",$username,"username");
		$data["id"] = $username;
		$this->load->view('users/user_edit',$data);
	}
	public function user_delete($username)
	{
		authentication();
		$this -> Common_model -> delete_record("users",$username,"username");
		set_activity_log($this->module, "User deleted", "Information of user {".$data["username"]."} deleted.");
		redirect('users/lists',$data);exit();
	}
	//user login log function start here
	/*  public function loginlog()
	{
		  if(isset($_POST))
		authentication();//for authentication
		$startDate  	= $this->input->post('startDate');
		$endDate 	= $this->input->post('endDate');
		$data["startDate"] 	= $startDate 	= ($startDate)?$startDate:date("Y-m-d");
		$data["endDate"] 	= $endDate 		= ($endDate)?$endDate:date("Y-m-d");
		$data["tableData"] 	= $tableData 	= $this -> Users_model -> get_loginlog($startDate,$endDate);
		$this->load->view('users/logs',$data); 
	}      */
	public function loginlog($page=0)
	{
		authentication();
		$where = array();
		$pagination = true;
		$where["startDate"] = date("Y-m-d");
		$where["endDate"] = date("Y-m-d");
		$like = $this->input->post("searchParam");
		foreach($_REQUEST as $key => $value)
		{
			if($value=='' || $value=="0"){
			}else if($key=='ptype'){
				$where["designations.".$key] = $value;
			}else{
				$where[$key] = $value;
			}	
		}
		unset($where["searchParam"]);
		$data["startDate"] 	= $startDate 	= $where["startDate"];
		$data["endDate"] 	= $endDate 		= $where["endDate"];
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
		}		
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this->Users_model->count_loginlog($where,$like);
			$config['base_url'] = base_url()."users/logs/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		$tableData = $this -> Users_model -> get_loginlog($per_page,$startpoint,$where,$like);
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
			$this->load->view('users/logs',$data);
		}
	}
	public function user_activity($page=0)
	{
		authentication();
		$where = array();
		$pagination = true;
		$where["startDate"] = date("Y-m-d");
		$where["endDate"] = date("Y-m-d");
		$like = $this->input->post("searchParam");
		foreach($_REQUEST as $key => $value)
		{
				if($value=='' || $value=="0"){
			}else{
				$where[$key] = $value;
			}
		}
		unset($where["searchParam"]);
		$data["startDate"] 	= $startDate 	= $where["startDate"];
		$data["endDate"] 	= $endDate 		= $where["endDate"];
		$headers = apache_request_headers();
		$is_ajax = (isset($headers['X-Requested-With']) && $headers['X-Requested-With'] == 'XMLHttpRequest');
		if($is_ajax){
			$pagination = isset($where["pagination"])?(($where["pagination"]=="false")?false:$where["pagination"]):$pagination;
			unset($where["pagination"]);
		}
		$per_page = $this->config->item("per_page");
		if ($page <= 0){ 
			$page = 1;
		}
		$serialNumber=($page-1)*$per_page;
		$startpoint = ($page * $per_page) - $per_page;
		if($pagination){
			$config['total_rows'] = $this->Users_model->count_activities($where,$like);
			$config['base_url'] = base_url()."users/user_activity/";
			$this->pagination->initialize($config);
			$paging = $this->pagination->create_links();
		}else{
			$per_page = NULL;
		}
		$tableData = $this -> Users_model -> get_activities($per_page,$startpoint,$where,$like);
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
			$this->load->view('users/user_activity',$data);
		}
	}
}