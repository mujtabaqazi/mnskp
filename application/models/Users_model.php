<?php 
class Users_model extends CI_Model {
	
	//function to get user logged in to system
	function login($username,$password){
		$curr_date = date("Y-m-d H:i:s");
		$ip = $_SERVER['REMOTE_ADDR'];
		$system_info = browser();	
		$row = $this->db->select("users.*,designations.ptype as ptype,(select count(*) from checklists where id in (select checklistid from designationchecklist where designationid  = users.designation)) as totalchklst")->from("users")->join("designations","designations.id = users.designation")->where(array('username' => $username, 'password' => $password))->get()->row_array();
		//$query = "Select * from users where username='$username' and password= '$password'";
		if (count($row) > 0 ) {
			if (empty($_SESSION['UserLogId'])) {

				$_query1 = "insert into login_log (username, login_date_time, system_info, ip_address, success,userid) values('" . $_REQUEST['username'] . "', '$curr_date','$system_info' , '$ip','Yes',".$row['id'].")";
				$this -> db -> query($_query1);
				$_SESSION['UserLogId'] = $this->db->insert_id();
			}
			return $row;
		} else {
			return 0;
		}
	}
	//=============List all records function starts=============//
	function get_users($limit=null, $start=1, $where=NULL, $like=NULL)
	{
		//$dynCol = 'districtname(users.distcode) as "District"';
		$dynCol = 'case when users.level = \'2\' Then array_to_string(array(select districtname(usersdistricts.distcode) from usersdistricts where userid = users.id), \', \') ELSE districtname(users.distcode) END as "District(s)"';
		$this->db->from("users");
		$this->db->join("designations","designations.id=users.designation");
		//$this->db->join("usersdistricts","usersdistricts.userid=users.id","FULL OUTER");
		$this->db->where("designations.designation != 'Super Admin'");
		$distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		}
		if(($where) && (count($where)>0))
		{
			/* if(array_key_exists("users.distcode",$where) && is_array($where["users.distcode"]))
			{
				$alldists = implode("','",$where["users.distcode"]);
				if($alldists!==''){
					$this->db->join("usersdistricts","usersdistricts.userid=users.id");
					$this->db->where("(usersdistricts.distcode IN ('".$alldists."'))");
				}
				unset($where["users.distcode"]);
			} */
			if(isset($where["users.level"]) && $where["users.level"]=="4"){
				$this->db->join("usersdistricts","usersdistricts.userid=users.id");
				/* $dynCol = 'array_to_string(array(select districtname(usersdistricts.distcode) from usersdistricts where userid = users.id), \', \') as "Districts"'; */
				unset($where["users.level"]);
			}
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like("LOWER(username)",strtolower($like));
			$this->db->or_like("LOWER(fullname)",strtolower($like));
			$this->db->or_like("LOWER(email)",strtolower($like));
			$this->db->or_like("LOWER(phone)",strtolower($like));
		}
		if($limit){
			$this->db->limit($limit, $start);
		} 
		$this->db->select('distinct username as id,username,fullname as "Full Name",'.$dynCol.',
		CASE 
		WHEN designations.ptype=\'all\' and users.level = \'2\' THEN \'DG Office\'
		WHEN designations.ptype=\'all\' and users.level = \'3\' THEN \'DHO Office\' 
		ELSE programname(designations.ptype) 
		END as Program, designations.designation,
		CASE WHEN users.utype=\'DEO\' THEN \'Supervisor\' WHEN ((users.utype=\'ProExecutive\' and users.level = \'2\') OR (users.utype=\'Executive\' and users.level = \'3\')) THEN \'Approving Authority\' ELSE users.utype END as "User Type",
		(select count(checklistid) from designationchecklist where designations.id = designationchecklist.designationid) as "Checklists Associated", email as "E-MAIL",phone as "Phone",CASE WHEN users.status=\'1\' THEN \'Active\' ELSE \'InActive\' END as "Status",(select login_date_time from login_log where login_id = ((select MAX(login_id) from login_log where userid=users.id))) as "Last Login"', FALSE);
		//CASE WHEN users.level=\'2\' THEN \'Province\' ELSE \'District\' END as level,
		$records = $this->db->get()->result_array();
		//echo $this->db->last_query();exit;
		return $records;
	}
	//=============List all records function ends=============//
	//=============List login logs function starts=============//
	/* function get_loginlog($startDate=null, $endDate=null)
	{
		$this->db->select('fullname as "Full Name",districtname(distcode) as "District",programname(designations.ptype) as Program, designations.designation, login_date_time as "Login time",logout_date_time "Logout time"', FALSE);
		$this->db->from("users");
		$this->db->join("designations","designations.id=users.designation");
		$this->db->join("login_log","login_log.userid=users.id");
		$this->db->where("(login_date_time >='".$startDate." 00:00:00' and login_date_time <='".$endDate." 23:59:59') ");
		$this->db->or_where("(logout_date_time >='".$startDate." 00:00:00' and logout_date_time <='".$endDate." 23:59:59')");
		$this->db->order_by('login_date_time',"DESC");
		$this->db->order_by('logout_date_time',"DESC");
		$records = $this->db->get()->result_array();
		return $records;
	} */
	//=============List login logs function ends=============//
	//================== Get Table's Count Function start ============================//
	public function count_users($where=NULL,$like=NULL)//$where is an array
	{		
		$this->db->from("users");
		$this->db->join("designations","designations.id=users.designation");
		$this->db->where("designations.designation != 'Super Admin'");
		$distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		}
		if(($where) && (count($where)>0))
		{
			/* if(array_key_exists("users.distcode",$where) && is_array($where["users.distcode"]))
			{
				$alldists = implode("','",$where["users.distcode"]);
				if($alldists!==''){
					$this->db->join("usersdistricts","usersdistricts.userid=users.id");
					$this->db->where("(usersdistricts.distcode IN ('".$alldists."'))");
				}
				unset($where["users.distcode"]);
			} */	
			if(isset($where["users.level"]) && $where["users.level"]=="4"){
				$this->db->join("usersdistricts","usersdistricts.userid=users.id");
				unset($where["users.level"]);
			}
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like("LOWER(username)",strtolower($like));
			$this->db->or_like("LOWER(fullname)",strtolower($like));
			$this->db->or_like("LOWER(email)",strtolower($like));
			$this->db->or_like("LOWER(phone)",strtolower($like));
		}
		$query = $this->db->get();
		return $rowcount = $query->num_rows();
	}	
	//================== Table's Count Function ends ============================//
	//================== Get Table's Count Function start ============================//
	public function count_loginlog($where=NULL,$like=NULL)//$where is an array
	{	
		$this->db->from("users");
		$this->db->join("designations","designations.id=users.designation");
		$this->db->join("login_log","login_log.userid=users.id");
		$distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		}
		if(isset($where) && (count($where)>0))
		{
			/* if(array_key_exists("distcode",$where) && is_array($where["distcode"]))
			{
				$alldists = implode("','",$where["distcode"]);
				if($alldists!==''){
					$this->db->join("usersdistricts","usersdistricts.userid=id");
					$this->db->where("(usersdistricts.distcode IN ('".$alldists."'))");
				}
				unset($where["distcode"]);
			} */
			if(isset($where["level"])){
				$where["users.level"] = $where["level"];
				unset($where["level"]);
			}
			if(isset($where["startDate"]) && isset($where["endDate"])){
				$this->db->where("((login_date_time >='".$where["startDate"]." 00:00:00' and login_date_time <='".$where["endDate"]." 23:59:59') OR (logout_date_time >='".$where["startDate"]." 00:00:00' and logout_date_time <='".$where["endDate"]." 23:59:59'))");
			}
			unset($where["startDate"]);
			unset($where["endDate"]); 
			$this->db->where($where);
		}
		if($like)
		 {
			$this->db->like("LOWER(users.username)",strtolower($like));
			$this->db->or_like("LOWER(fullname)",strtolower($like));
		} 
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $rowcount = $query->num_rows();
		
	}
	//================== Table's Count Function ends ============================//
	//================== List all records function starts=============//
	 function get_loginlog($limit=null, $start=1, $where=NULL, $like=NULL)
	{
		$dynCol = 'case when users.level = \'2\' Then array_to_string(array(select districtname(usersdistricts.distcode) from usersdistricts where userid = users.id), \', \') ELSE districtname(users.distcode) END as "District(s)"';
		$this->db->from("users");
		$this->db->join("designations","designations.id=users.designation");
		$this->db->join("login_log","login_log.userid=users.id");
		//$this->db->join("usersdistricts","usersdistricts.userid=users.id","FULL OUTER");
		$distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		}
		if(isset($where) && (count($where)>0))
		{
			/* if(array_key_exists("distcode",$where) && is_array($where["distcode"]))
			{
				$alldists = implode("','",$where["distcode"]);
				if($alldists!==''){
					$this->db->join("usersdistricts","usersdistricts.userid=users.id");
					$this->db->where("(usersdistricts.distcode IN ('".$alldists."'))");
				}
				unset($where["distcode"]);
			} */
			if(isset($where["level"])){
				$where["users.level"] = $where["level"];
				unset($where["level"]);
			}
			if(isset($where["startDate"]) && isset($where["endDate"])){
				$this->db->where("((login_date_time >='".$where["startDate"]." 00:00:00' and login_date_time <='".$where["endDate"]." 23:59:59') OR (logout_date_time >='".$where["startDate"]." 00:00:00' and logout_date_time <='".$where["endDate"]." 23:59:59'))");
			}
			unset($where["startDate"]);
			unset($where["endDate"]);
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like("LOWER(users.username)",strtolower($like));
			$this->db->or_like("LOWER(fullname)",strtolower($like));
		}
		if($limit){
			$this->db->limit($limit, $start);
		} 
		$this->db->select('fullname as "Full Name",'.$dynCol.',programname(designations.ptype) as Program, designations.designation, login_date_time as "Login time",logout_date_time "Logout time"', FALSE);
		$this->db->order_by("login_date_time","DESC");		
		$this->db->order_by("logout_date_time","DESC");		
		$records = $this->db->get()->result_array();
		//echo $this->db->last_query();exit;
		return $records;
	} 
	//=============List all records function ends=============//
	//================== Get Table's Count Function start ============================//
	public function count_activities($where=NULL,$like=NULL)//$where is an array
	{
		$this->db->from("user_transaction_log");
		//$this->db->join("usersdistricts","usersdistricts.userid=users.id","FULL OUTER");
		//$this->db->join("users","users.id=user_transaction_log.userid");
		//$this->db->join("users","users.id=user_transaction_log.userid");
		//$this->db->join("login_log","login_log.userid=users.id");
		$distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		}
		if(isset($where) && (count($where)>0))
		{
			/* if(isset($where["users.level"]) && $where["users.level"]=="4"){
				$this->db->join("usersdistricts","usersdistricts.userid=users.id");
				unset($where["users.level"]);
			} */
			if(array_key_exists("distcode",$where) && is_array($where["distcode"]))
			{
				$alldists = implode("','",$where["distcode"]);
				if($alldists!==''){
					$this->db->join("usersdistricts","usersdistricts.userid=users.id");
					$this->db->where("(usersdistricts.distcode IN ('".$alldists."'))");
				}
				unset($where["distcode"]);
			} 
			if(isset($where["startDate"]) && isset($where["endDate"])){
			$this->db->where("(( datetime>='".$where["startDate"]." 00:00:00' and datetime <='".$where["endDate"]." 23:59:59') OR (datetime >='".$where["startDate"]." 00:00:00' and datetime <='".$where["endDate"]." 23:59:59'))");
			}
			unset($where["startDate"]);
			unset($where["endDate"]);  
			$this->db->where($where);
		}
		if($like)
		 {
			$this->db->like("LOWER(users.username)",strtolower($like));
			$this->db->or_like("LOWER(fullname)",strtolower($like));
		} 
		$query = $this->db->get();
		//echo $this->db->last_query();exit;
		return $rowcount = $query->num_rows();
		
	}	
		
		
	//================== Table's Count Function ends ============================//
	//================== List all records function starts=============//
	 function get_activities($limit=null, $start=1, $where=NULL, $like=NULL)
	{
		$dynCol = 'case when users.level = \'2\' Then array_to_string(array(select districtname(usersdistricts.distcode) from usersdistricts where userid = users.id), \', \') ELSE districtname(users.distcode) END as "District(s)"';
		

		$this->db->from("user_transaction_log");
		$this->db->join("users","users.id=user_transaction_log.userid");
		$this->db->join("designations","designations.id=users.designation");
		//$this->db->join("progams","programs.id=users.id");
		//$this->db->join("usersdistricts","usersdistricts.userid=users.id");
		$distcode = $this -> session -> distcode;
		if($distcode > 0)
		{
			$where["distcode"] = $distcode;
		}
		if(isset($where) && (count($where)>0))
		{
			/* if(isset($where["users.level"]) && $where["users.level"]=="4"){
				$this->db->join("usersdistricts","usersdistricts.userid=users.id");
				unset($where["users.level"]);
			} */
			if(array_key_exists("distcode",$where) && is_array($where["distcode"]))
			{
				$alldists = implode("','",$where["distcode"]);
				if($alldists!==''){
					$this->db->join("usersdistricts","usersdistricts.userid=users.id");
					$this->db->where("(usersdistricts.distcode IN ('".$alldists."'))");
				}
				unset($where["distcode"]);
			} 
			if(isset($where["startDate"]) && isset($where["endDate"])){
				$this->db->where("((datetime >='".$where["startDate"]." 00:00:00' and datetime <='".$where["endDate"]." 23:59:59') OR (datetime >='".$where["startDate"]." 00:00:00' and datetime <='".$where["endDate"]." 23:59:59'))");
			}
			unset($where["startDate"]);
			unset($where["endDate"]); 
			$this->db->where($where);
		}
		if($like)
		{
			$this->db->like("LOWER(users.username)",strtolower($like));
			$this->db->or_like("LOWER(fullname)",strtolower($like));
		}
		if($limit){
			$this->db->limit($limit, $start);
		} 
		$this->db->select('users.fullname,'.$dynCol.',
		CASE 
		WHEN designations.ptype=\'all\' and users.level = \'2\' THEN \'DG Office\'
		WHEN designations.ptype=\'all\' and users.level = \'3\' THEN \'DHO Office\' 
		ELSE programname(designations.ptype) 
		END as Program,
		module,action,datetime,ip_address,description,browser', FALSE);
		//$this->db->order_by("login_date_time","DESC");		
		//$this->db->order_by("logout_date_time","DESC");		
		$records = $this->db->get()->result_array();
		//echo $this->db->last_query();exit;
		return $records;
		
	} 
	//=============List all records function ends=============//
} //class ends
?>