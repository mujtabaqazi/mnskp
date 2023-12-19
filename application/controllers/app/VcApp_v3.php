<?php 
/* 
*	Description		Server side code for visits confirmation of M&S version 3.0
*	Changes			---------------------------
*					1. Device date/time.
*					2. server confirmation.
*					3. IMEI # of supervisor.
*					4. supervisor will be able to confirm visit.
*					5. Picture name formatting issue solved
*					6. Device IP Added.
*					7. Client side app settings to make app compatible with advance versions of android. etc
*					---------------------------------
*	Author		    Raja Imran Qamer
*	Last updated    Raja Imran Qamer (2017-09-26)
*	For Help	    rajaimranqamer@gmail.com
*	Copyrights	    Pace Technologies
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class VcApp_v3 extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		$this -> load -> model ('Common_model');
		$this -> load -> model ('Vcapp_model_v2','VcApp_model');
	}
	//-------------------------------------------------------
	/* 
	*	Description		index function
	*	access			Public
	*	parameters		None
	*	posted data		None
	*/
	public function index()
	{
		$this->login();
	}
	//-------------------------------------------------------
	/* 
	*	Description		To check user authentication
	*	access			Public
	*	parameters		None
	*	posted data		imei or username and password
	*	last updated    Imran Qamer (2016-10-15)
	*/
	public function login()
	{
		$data = file_get_contents('php://input');
		$json = json_decode($data);
		//$IMEI_NO = (!empty($json->{'imei_no'}))?$json->{'imei_no'}:Null;
		$username=(!empty($json->{'userName'}))?$json->{'userName'}:Null;
		$password=(!empty($json->{'password'}))?$json->{'password'}:Null;
		$responce=array();
		if($username && !$password){
			$user=$this -> VcApp_model -> login(array('username' => $username));
			if ($user){
				$response["error"] = FALSE;
				$response["current_date"] = date("Y-m-d");
				echo json_encode($response);
			}else {
				$response["error"] = TRUE;
				$response["error_msg"] = "Credentials are wrong, Please Try Again!";
				echo json_encode($response);
			}
		}else if ($username && $password){
			$user=$this -> VcApp_model -> login(array('username' => $username, 'password' => md5($password)));
			if ($user){
				//$this -> Common_model -> update_record("users",array("imei_no"=>NULL),array("username" => $username));
				//$this -> Common_model -> update_record("users",array("imei_no"=>$IMEI_NO),array("id" => $user->id));
				$response["error"] = FALSE;
				$response["user_id"] = $user->id;
				$response["current_date"] = date("Y-m-d");
				echo json_encode($response);
			}else {
				$response["error"] = TRUE;
				$response["error_msg"] = "Login credentials are wrong. Please try again!";
				echo json_encode($response);
			}
		}
		else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Required credentials are missing or wrong!";
			echo json_encode($response);
		}
	}
	//======================= login in function end ========== //
	//-------------------------------------------------------
	/* 
	*	Description		to get upcomming visits 
	*	access			Public
	*	parameters		none
	*	last updated    Imran Qamer (2016-11-29)
	*/
	public function upcomming_visits()
	{
		$data = file_get_contents('php://input');
		$json = json_decode($data);
		//$IMEI_NO = (!empty($json->{'imei_no'}))?$json->{'imei_no'}:Null;
		$confirm = (!empty($json->{'confirm'}))?$json->{'confirm'}:Null;
		$userId = (!empty($json->{'user_id'}))?$json->{'user_id'}:Null;
		$where=array();
		if($userId){
			$user=$this -> Common_model -> get_info("users",$userId,"id");
			if ($user){
				$where['confirm']=$confirm;
				$info=$this -> VcApp_model -> up_comming_visits($user,$where);
				foreach($info as $key => $onerow){
					$info[$key]->checklists =  $this -> VcApp_model -> visit_checklists($onerow->id);
					$info[$key]->supervisors = $this -> VcApp_model -> visit_supervisors($onerow->facode,$onerow->visitdate);
				}
				$response["error"] = false;
				$response["count"] = count($info);
				$response["confirm"] = $json;
				$response["data"] = $info;
				$response["current_date"] = date("Y-m-d");
				echo json_encode($response);
			}else {
				$response["error"] = TRUE;
				$response["errorcode"]=1;
				$response["error_msg"] = "Please login to continue";
				echo json_encode($response);
			}
		}
		else {
			$response["error"] = TRUE;
			$response["errorcode"]=1;
			$response["error_msg"] = "Please login to continue";
			echo json_encode($response);
		}
	}
	//======================= upcomming visits function end ========== //
	//======================= visit_supervisors_confirm function  ========== //
	/* 
	*	Description		to confirm/update visit confirmation status/record
	*	access			Public
	*	parameters		none
	*	posted data		imei,image,vpvids,longitude,latitude,device_date,device_time
	*/
	public function visit_supervisors_confirm()
	{
		//$IMEI_NO=$this->input->post("imei_no");
		$userId=$this->input->post("user_id");
		if($userId){
			$user=$this -> Common_model -> get_info("users",$userId,"id");
			if ($user){
				$config['upload_path']   = './assets/appimages'; 
				$config['allowed_types'] = 'gif|jpg|png';  
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('image')) {
					$response["data"] = $this->upload->display_errors();
					$response["error"] = TRUE;
					$response["errorcode"]=1;
					$response["error_msg"] = "Image upload error occur.";
				}
				else { 
					if (count($_POST["vpvids"])<=0){
						$response["error"] = TRUE;
						$response["errorcode"]=5;
						$response["error_msg"] = "No Supervisor Selected";
					}else {
						$result = false;
						$response["data"] = $this->upload->data();
						for($i=0;$i<count($_POST["vpvids"]);$i++){
							$vpv=$this -> VcApp_model -> visit_confirm_check($_POST["vpvids"][$i]);
							$confirmed = "";
							if($vpv){
								$dataToSave = array(
									"visit_confirmed"=> "1",
									"picture" => $response["data"]["file_name"],
									"longitude"=> $_POST['longitude'],
									"latitude"=> $_POST['latitude'],
									"date_confirmed"=> date("Y-m-d"),
									"time_confirmed"=> date("H:i:s"),
									"device_date_confirmed"=> (isset($_POST['device_date']) && $_POST['device_date'])?$_POST['device_date']:NULL,
									"device_time_confirmed"=> (isset($_POST['device_time']) && $_POST['device_time'])?$_POST['device_time']:NULL,
									"device_ip"=> (isset($_POST['device_ip']) && $_POST['device_ip'])?$_POST['device_ip']:NULL
									
								);
								$result = $this -> Common_model -> update_record("visit_plan_visits",$dataToSave,array("id" =>$_POST["vpvids"][$i]));
								$confirmed += "VPVID: "+$_POST["vpvids"][$i]+", ";
							}
						}
						if($result){
							$response["error"] = false;
							$response["errorcode"]=0;
							$response["confirmed Ids"]=$confirmed;
							$response["error_msg"] = "visit confirmed and image uploaded to server.";
						}else{
							$response["error"] = TRUE;
							$response["errorcode"]=4;
							$response["error_msg"] = "Error in query ";
						}						
					}
				}
			}else {
				$response["error"] = TRUE;
				$response["errorcode"]=2;
				$response["error_msg"] = "Device not registered. Please Login to continue.";
			}
		}
		else {
			$response["error"] = TRUE;
			$response["errorcode"]=3;
			$response["error_msg"] = "Required Parameter Missing.";
		}
		echo json_encode($response);
	}
	//======================= visit_supervisors_confirm function end ========== //
	//======================= logout function ========== //
	/* 
	*	Description		to logout user
	*	access			Public
	*	parameters		none
	*	posted data		imei
	*/
	public function logout()
	{
		$data = file_get_contents('php://input');
		$json = json_decode($data);
		//$IMEI_NO = (!empty($json->{'imei_no'}))?$json->{'imei_no'}:Null;
		$userId = (!empty($json->{'user_id'}))?$json->{'user_id'}:Null;
		$responce=array();
		if($userId ){
			$user=$this -> Common_model -> get_info("users",$userId,"id");
			if ($user){
				//$this -> Common_model -> update_record("users",array("imei_no"=>NULL),array("imei_no" => $IMEI_NO));
				$response["error_msg"] = "Logout Successfully";
				$response["error"] = FALSE;
				echo json_encode($response);
			}else {
				$response["error"] = TRUE;
				$response["error_msg"] = "Please login to continue";
				echo json_encode($response);				
			}
		}
		else {
			$response["error"] = TRUE;
			$response["error_msg"] = "Please login to continue";
			echo json_encode($response);
		}
	}
	//======================= logout function end ========== //
}