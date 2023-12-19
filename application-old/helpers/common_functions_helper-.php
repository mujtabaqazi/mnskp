<?php 
if(!function_exists('posted_Values')){
	function posted_Values(){
		/* $CI = & get_instance();
		$data['year'] 		= $CI -> input -> post('report_year') ? $CI -> input -> post('report_year') : date('Y');
		$data['month'] 		= $CI -> input -> post('report_month') ? $CI -> input -> post('report_month') : "";
		$data['procode']	= $CI -> session -> Province;
		$data['distcode'] 	= $CI -> input -> post('distcode') ? $CI -> input -> post('distcode') : $CI -> session -> District;
		$data['tcode'] 		= $CI -> input -> post('tcode') ? $CI -> input -> post('tcode') : "";
		$data['facode'] 	= $CI -> input -> post('facode') ? $CI -> input -> post('facode') : "";
		$data['fmonth'] 	= $CI -> input -> post('fmonth') ? $CI -> input -> post('fmonth') : "";
		return $data; */
	}
}
if(!function_exists('authentication')){
	function authentication()
	{
		$CI = & get_instance();
		$userId = $CI -> session -> id;
		if (($userId > 0) && ($CI -> session -> userLevel > 0)){
			if($CI -> session -> expire >= time()){
				//$timeout1 = $CI -> session -> expire - time();
				//$reset_time = round((3600 - $timeout1));
				$CI -> session -> expire = time() + (120 * 120); 
			}else{
				$CI -> session -> set_flashdata('message', 'You session expired! Please Login again!');
				redirect(base_url()); exit;
			}
			return true;
		}else{
			$CI -> session -> set_flashdata('message', 'You are not authorized to access this page! Please Login!');
			redirect(base_url());  exit;
		}
	}
}
function is_logged_in()
{
	$CI = & get_instance();
	if (($CI -> session -> userLevel > 0)){
		return true;
	}else{
		return false;
	}
}
//function to save activities information on basis of provided parameters
if(!function_exists('set_activity_log')){
	function set_activity_log($module, $action, $desc=NULL) {
		//echo "moon";//"rajaimranqamer@gmail";//exit;
		$CI				=& get_instance();
		$CI->load->library('user_agent');
		date_default_timezone_set("Asia/Karachi");
		$dateTime		= date("Y-m-d H:i:s");
		$system_info	= isset($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:(isset($_SERVER['REMOTE_HOST'])?$_SERVER['REMOTE_HOST']:'communicating server');
		$data = array(
			"userid" 		=> $CI -> session -> id,
			"username" 		=> $CI -> session -> username,
			"datetime" 		=> $dateTime,
			"module" 		=> $module,
			"action" 		=> $action,
			"description"	=> $desc,
			"ip_address" 	=> $_SERVER['REMOTE_ADDR'],
			"browser" 		=> $system_info
		);
		$CI->db->insert("user_transaction_log",$data);
	}
}
if(!function_exists('monthname')){
	function monthname($month)
	{
		switch($month){
			case "01": return "January";
					break;
			case "02": return "February";
					break;
			case "03": return "March";
					break;
			case "04": return "April";
					break;
			case "05": return "May";
					break;
			case "06": return "June";
					break;
			case "07": return "July";
					break;
			case "08": return "Auguest";
					break;
			case "09": return "September";
					break;
			case "10": return "October";
					break;
			case "11": return "November";
					break;
			case "12": return "December";				
		}
	}
}
if(!function_exists('getAllYearsOptions')){
	function getAllYearsOptions($isreturn=false,$selected=NULL){		
		$moon = "";
		$years=date('Y');$moon = '';
		$preyears=2019;
		for($x=$years;$x>=$preyears;$x--){
			$isSelected = ($selected && $selected==$x)?'selected="selected"':((isset($_REQUEST["year"]) && $_REQUEST["year"]==$x)?'selected="selected"':'');
			$moon .= '<option value="'.$x.'" '.$isSelected.' >'.$x.'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getAllfiscalYearsOptions')){
	function getAllfiscalYearsOptions($isreturn=false,$selected=NULL){		
		$moon = "";
		$years=(date('m')>6)?date('Y',strtotime("+1 year")):date('Y');
		$moon = '';
		$preyears=2019;
		for($x=$years;$x>=$preyears;$x--){
			$fiscalyear = ($x-1)."-".$x;
			$isSelected = ($selected && $selected==$fiscalyear)?'selected="selected"':'';
			$moon .= '<option value="'.$fiscalyear.'" '.$isSelected.' >'.$fiscalyear.'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getAllQuarterOptions')){
	function getAllQuarterOptions($isreturn=false,$selected=NULL){
		$moon = "";
		$years=date('Y');
		$quarter = floor((date('m')+2)/3);
		$moon = '';
		$preyears=2019;
		for($x=$years;$x>=$preyears;){
			$yearquarter = $x."-".$quarter;
			$isSelected = ($selected && $selected==$yearquarter)?'selected="selected"':'';
			$moon .= '<option value="'.$yearquarter.'" '.$isSelected.' >'.$yearquarter.'</option>';
			if($quarter==1){
				$x--;
				$quarter=4;
			}else{
				$quarter--;
			}
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getAllMonthsOptions')){
	function getAllMonthsOptions($isreturn=false){		
		$moon = "";
		$months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
		$mnth = isset($_REQUEST["month"])?$_REQUEST["month"]:date('m');
		foreach ($months as $num => $monthitem) { 
			if($num > ($mnth-1))
			{}else{
				$isSelected = (($mnth-1)==$num)?'selected="selected"':'';
				$month = sprintf("%02d", $num);
				$moon .= '<option value="'.$month.'" '.$isSelected.' >'.$monthitem.'</option>';								
			}
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getAllMonthsOptionsWithCurrent')){
	function getAllMonthsOptionsWithCurrent($isreturn=false){		
		$moon = "";
		$months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
		$mnth = isset($_REQUEST["month"])?$_REQUEST["month"]:date('m');
		foreach ($months as $num => $monthitem) { 
			if($num > ($mnth))
			{}else{
				$isSelected = (($mnth)==$num)?'selected="selected"':'';
				$month = sprintf("%02d", $num);
				$moon .= '<option value="'.$month.'" '.$isSelected.' >'.$monthitem.'</option>';								
			}
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getFmonth_options')){
	function getFmonth_options($isreturn=false,$selectedfmonth=NULL){		
		$months = array(12 => 'December', 11 => 'November', 10 => 'October', 9 => 'September', 8 => 'August', 7 => 'July', 6 => 'June', 5 => 'May', 4 => 'April', 3 => 'March', 2 => 'February', 1 => 'January');
		$years=date('Y');
		$moon = '';
		$preyears=2019;
		for($x=$years;$x>=$preyears;$x--){
			foreach ($months as $num => $monthitem) { 
				if(($x==$years) && ($num >= date('m'))){}
				else{
					if($num<10){$month='0'.$num;}else{$month=$num;}
					$val = $x."-".$month;
					$selected = ($selectedfmonth==$val)?'selected="selected"':''; 
					$moon .= '<option value="'.$val.'" '.$selected.' >'.$val.'</option>';								
				}
			}
		}	
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getFmonthIncludingNextMonth_options')){
	function getFmonthIncludingNextMonth_options($isreturn=false,$selectedfmonth=NULL){		
		$months = array(12 => 'December', 11 => 'November', 10 => 'October', 9 => 'September', 8 => 'August', 7 => 'July', 6 => 'June', 5 => 'May', 4 => 'April', 3 => 'March', 2 => 'February', 1 => 'January');
		$years=date('Y');
		$moon = '';
		$preyears=2019;
		for($x=$years;$x>=$preyears;$x--){
			foreach ($months as $num => $monthitem) { 
				if(($x==$years) && ($num > (date('m')+1))){}
				else{
					if($num<10){$month='0'.$num;}else{$month=$num;}
					$val = $x."-".$month;
					$selected = ($selectedfmonth==$val)?'selected="selected"':''; 
					$moon .= '<option value="'.$val.'" '.$selected.' >'.date('M-Y',strtotime($val)).'</option>';								
				}
			}
		}	
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getFmonthIncludingCurrentMonth_options')){
	function getFmonthIncludingCurrentMonth_options($isreturn=false,$selectedfmonth=NULL){		
		$months = array(12 => 'December', 11 => 'November', 10 => 'October', 9 => 'September', 8 => 'August', 7 => 'July', 6 => 'June', 5 => 'May', 4 => 'April', 3 => 'March', 2 => 'February', 1 => 'January');
		$years=date('Y');
		$moon = '';
		$preyears=2019;
		for($x=$years;$x>=$preyears;$x--){
			foreach ($months as $num => $monthitem) { 
				if(($x==$years) && ($num > date('m'))){}
				else{
					if($num<10){$month='0'.$num;}else{$month=$num;}
					$val = $x."-".$month;
					$selected = ($selectedfmonth==$val)?'selected="selected"':''; 
					$moon .= '<option value="'.$val.'" '.$selected.' >'.date('M-Y',strtotime($val)).'</option>';								
				}
			}
		}	
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getChklstFmonth_options')){
	function getChklstFmonth_options($isreturn=false,$selectedfmonth=NULL){		
		$moon = '';
		$currentfmnth=date('Y-m');
		$nextfmnth=date('Y-m', strtotime(date('Y-m')." +1 month"));
		$currentdisplayfmnth=date('M-Y');
		$nextdisplayfmnth=date('M-Y', strtotime(date('Y-m')." +1 month"));
		$selected = ($selectedfmonth==$currentfmnth)?'selected="selected"':''; 
		$moon .= '<option value="'.$currentfmnth.'" '.$selected.' >'.$currentdisplayfmnth.'</option>';
		$selected = ($selectedfmonth==$nextfmnth)?'selected="selected"':''; 
		$moon .= '<option value="'.$nextfmnth.'" '.$selected.' >'.$nextdisplayfmnth.'</option>';
		if($isreturn)
			return $output;
		echo $output;
	}
}
//this function will get all levels in options, its static lateron can be make dynamic
if(!function_exists('getlevel_options')){
	function getlevel_options($isreturn=false,$selectedlevel=NULL,$noempty=NULL,$multi=NULL){
		$CI = & get_instance();		
		$moon = '';
		if($noempty===NULL){
			$moon .= '<option value=""> -- All Levels -- </option>';
		}
		$moon .= '<option value="3" '.(($selectedlevel==="3")?'selected="selected"':'').'>District</option>';
		if($multi){
			$moon .= '<option value="4" '.(($selectedlevel==="4")?'selected="selected"':'').'>Multiple Districts</option>';
		}
		$moon .= '<option value="2" '.(($selectedlevel==="2")?'selected="selected"':'').'>Province</option>';
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getSavedFmonth_options')){
	function getSavedFmonth_options($isreturn=false,$selectedfmonth=NULL){
		$CI = & get_instance();
		$moon = '';
		$CI -> db -> select("distinct (fmonth) fmonth");
		//$CI -> db -> where('fmonth <=',  date("Y-m").'');
		$CI -> db -> from("visit_plan_header");
		$CI -> db -> order_by("fmonth","DESC");
		$fmonthResult = $CI -> db -> get() -> result_array();
		foreach($fmonthResult as $key => $val){
			$selected = ($selectedfmonth==$val["fmonth"])?'selected="selected"':''; 
			$moon .= '<option value="'.$val["fmonth"].'" '.$selected.'>'.date("M Y",strtotime($val["fmonth"]."-01")).'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getDistricts_options')){
	function getDistricts_options($isreturn=false,$distcode=NULL){
		$CI = & get_instance();
		$wc = "province = '3'";
		if($distcode){}else{$distcode = $CI -> session -> distcode;}
		if($distcode > 0 && !is_array($distcode) && ($CI -> session -> distcode > 0))
		{
			$wc .= " AND distcode = '$distcode'";
		}else{
			//check if user is 2 level manager, then may have multiple districts attached instead of all.
			$CI->db->select('userid');
			$CI->db->from('usersdistricts');
			$CI->db->where("userid = '".$CI -> session -> id."'");
			$num_results = $CI->db->count_all_results();
			if($num_results>0){
				$wc .= " AND distcode in (select distcode from usersdistricts where userid = '".$CI -> session -> id."')";
			}
		}
		$moon = '<option value="" >Select District</option>';
		$query="Select district, distcode from districts where $wc order by district";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$selected = '';
			if(is_array($distcode) && in_array($onedist["distcode"],array_column($distcode,"distcode"))){
				$selected = 'selected="selected"';
			}
			else if(($distcode > 0)&&($distcode == $onedist["distcode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onedist["distcode"].'" '.$selected.' >'.$onedist["district"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getSelectedDistricts_options')){
	function getSelectedDistricts_options($isreturn=false,$facode=NULL){
		$CI = & get_instance();
		if($facode > 0){
			$wc = " facode = '$facode' ";
		}
		$query="Select distcode from facilities where $wc order by facode";
		$resultDist = $CI -> db ->query($query);
		$resultDist = $resultDist->row_array();
		$distcode = $resultDist['distcode'];
		$wc = "province = '3'";
		$distcodesess = $CI -> session -> distcode;
		if($distcodesess){
			$wc .= " AND distcode = '$distcodesess'";
		}else{
			//check if user is 2 level manager, then may have multiple districts attached instead of all.
			$CI->db->select('userid');
			$CI->db->from('usersdistricts');
			$CI->db->where("userid = '".$CI -> session -> id."'");
			$num_results = $CI->db->count_all_results();
			if($num_results>0){
				$wc .= " AND distcode in (select distcode from usersdistricts where userid = '".$CI -> session -> id."')";
			}
		}
		$moon = '<option value="" >Select District</option>';
		$query="Select distcode, district from districts where $wc order by district";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$selected = '';
			if(($distcode > 0)&&($distcode == $onedist["distcode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onedist["distcode"].'" '.$selected.' >'.$onedist["district"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getPrograms_options')){
	function getPrograms_options($isreturn=false,$ptype=NULL){
		$CI = & get_instance();
		if($ptype){}else{$ptype = '';} //$CI -> session -> ptype;}
		/* if($ptype != '' || $ptype != NULL)
		{
			$wc .= " AND  = '$distcode'";
		} */
		$moon = '<option value="" >-- Select Program--</option>';
		$query="Select pname,ptype from programs";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$selected = '';
			if(($ptype != '' || $ptype != NULL)&&($ptype == $onedist["ptype"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onedist["ptype"].'" '.$selected.' >'.$onedist["pname"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getHCP_options')){
	function getHCP_options($isreturn=false,$hcptypeid=NULL){
		$CI = & get_instance();
		if($hcptypeid){}else{$hcptypeid = '';}
		$moon = '<option value="" >-- Select HCP Type--</option>';
		$query="Select id,name,displayname from hcptypes";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $singleRow) { 
			$selected = '';
			if(($hcptypeid != '' || $hcptypeid != NULL)&&($hcptypeid == $singleRow["id"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$singleRow["id"].'" '.$selected.' >'.$singleRow["displayname"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getChecklists_options')){
	function getChecklists_options($isreturn=false,$ptype=NULL,$chklstId=NULL){
		$CI = & get_instance();
		$moon = '<option value="" >-- Select Checklist--</option>';
		$query="select id, name from checklists where id in (select checklistid from designationchecklist where designationid in (select designation from users where username='".$CI -> session -> username."')) order by id";//"Select name,id from checklists";
		if($ptype)
			$query .= " where ptype = '$ptype'";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$selected = '';
			if(($chklstId != '' || $chklstId != NULL)&&($chklstId == $onedist["id"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onedist["id"].'" '.$selected.' >'.$onedist["name"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('hcpTypeName')){
	function hcpTypeName($isreturn=false,$hcpId=NULL){
		//echo $hcpId;exit;
		$CI = & get_instance();
		$moon = '';
		$query="select id, name,displayname from hcptypes where id='$hcpId'";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		//print_r($result1);exit;
		foreach ($result1 as $onedist) { 
			$selected = '';
			if(($hcpId != '' || $hcpId != NULL)&&($hcpId == $onedist["id"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onedist["id"].'" '.$selected.' >'.$onedist["displayname"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
//this function will return input or select options of hcptype value
if(!function_exists('hcpTypeValue')){
	function hcpTypeValue($isreturn=false,$hcpId=NULL,$hcpCode=NULL,$index,$para=false,$chklstindex=0){
		//echo $hcpId;exit;
		$CI = & get_instance();
		$moon = '';
		$query="select id, tablename,entry_type from hcptypes where id='$hcpId'";
		$result = $CI -> db ->query($query);
		$result = $result -> row_array();
		$tableName = $result['tablename'];
		$entryType = $result['entry_type'];
		$additional = "";
		//print_r($result1);exit;
		if($entryType == 'code')
		{
			if($para == true){
				if($tableName=="cmwdb")
				{
					$query = "select cmwname('$hcpCode') as name";
					$additional=" (CMW)";
				}else if($tableName=="lhwdb")
				{
					$query = "select lhwname('$hcpCode') as name";
					$additional=" (LHW)";
				}else if($tableName=="lhsdb")
				{
					$query = "select lhsname('$hcpCode') as name";
					$additional=" (LHS)";
				}
				$qResult = $CI -> db -> query($query);
				$qResult = $qResult->row_array();
				$hcpName = $qResult['name'];
				$moon = $hcpName.$additional;
			}else{
				$moon = '<select class="form-control hcp_value" required="required" name="hcp_value['.($index).']['.($chklstindex).']" >';
				if($tableName=="cmwdb")
				{
					$data = $CI -> Plans_model -> gettarget_cmws();
				}else if($tableName=="lhwdb")
				{
					$data = $CI -> Plans_model -> gettarget_lhws();
				}else if($tableName=="lhsdb")
				{
					$data = $CI -> Plans_model -> gettarget_lhs();
				}		
				foreach ($data as $one) { 
					$selected = '';
					if(($hcpCode > 0) && ($hcpCode == $one["code"]))
					{
						$selected = 'selected="selected"';
					}
					$moon .= '<option value="'.$one["code"].'" '.$selected.' >'.$one["code"].'-'.$one["name"].'</option>';
				}
				$moon .= '</select>';
			}if($tableName == "name"){
				$moon .= '<input class="form-control" required="required" name="hcp_value['.$index.']['.($chklstindex).']" value="'.$hcpCode.'" />';
			}else{
				$moon .= '';
			}
		}else if($entryType == 'name')
		{
			$moon .= '<input  class="form-control" required="required" name="hcp_value['.$index.']['.($chklstindex).']" value="'.$hcpCode.'" />';
		}
		echo $output;
	}
}
//this function will return hcptype value not option.
if(!function_exists('gethcpTypeValue')){
	function gethcpTypeValue($isreturn=false,$hcpId=NULL,$hcpCode=NULL){
		//echo $hcpId;exit;
		$CI = & get_instance();
		$moon = '';
		$query="select id, tablename,entry_type from hcptypes where id='$hcpId'";
		$result = $CI -> db ->query($query);
		$result = $result -> row_array();
		$tableName = $result['tablename'];
		$entryType = $result['entry_type'];
		$additional = "";
		//print_r($result1);exit;
		if($entryType == 'code')
		{
			if($tableName=="cmwdb")
			{
				$query = "select cmwname('$hcpCode') as name";
				$additional=" (CMW)";
			}else if($tableName=="lhwdb")
			{
				$query = "select lhwname('$hcpCode') as name";
				$additional=" (LHW)";
			}else if($tableName=="lhsdb")
			{
				$query = "select lhsname('$hcpCode') as name";
				$additional=" (LHS)";
			}
			$qResult = $CI -> db -> query($query);
			$qResult = $qResult->row_array();
			$hcpName = $qResult['name'];
			$moon = $hcpName.$additional;
		}else if($entryType == 'name')
		{
			$moon .= $hcpCode;
		}
		echo $output;
	}
}
if(!function_exists('getFatypes_options')){
	function getFatypes_options($isreturn=false,$ptype=NULL){
		$CI = & get_instance();
		$moon = '<option value="" >-- Select Fatype--</option>';
		$query="Select fatype_name,fatype from facilities_types";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$selected = '';
			$moon .= '<option value="'.$onedist["fatype"].'" >'.$onedist["fatype_name"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getDesignations_options')){
	function getDesignations_options($isreturn=false,$desgId=NULL,$desgLevel=NULL){
		$CI = & get_instance();
		$wc = " 1 = '1'";
		//if($desgId){}else{$desgId = $CI -> session -> desg;}
		if($desgId > 0)
		{
			$wc .= " AND id = '$desgId'";
		}
		if($desgLevel > 0)
		{
			$wc .= " AND level = '$desgLevel'";
		}
		//$moon = '<option value="" >-- Select Designation--</option>';
		$moon = '';
		$query="Select designation,id from designations where $wc order by id";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$selected = '';
			if(($desgId > 0)&&($desgId == $onedist["id"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onedist["id"].'" '.$selected.' >'.$onedist["designation"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getTehsils_options')){
	function getTehsils_options($isreturn=false,$tcode=NULL,$distcode=NULL){
		$CI = & get_instance();
		$wc = "procode = '3'";
		if($distcode)
			$wc .= " AND distcode = '$distcode'";
		$moon = '<option value="" >-- Select Tehsil--</option>';
		$query="Select tehsil,tcode from tehsil where $wc order by tcode";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $oneteh) { 
			$selected = '';
			if(($tcode > 0)&&($tcode == $oneteh["tcode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$oneteh["tcode"].'" '.$selected.' >'.$oneteh["tehsil"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getUCs_options')){
	function getUCs_options($isreturn=false,$uncode=NULL,$distcode=NULL){
		$CI = & get_instance();
		$wc = "procode = '3'";
		if($distcode)
			$wc .= " AND distcode = '$distcode'";
		$moon = '<option value="" >-- Select Unioncouncil--</option>';
		$query="Select un_name,uncode from unioncouncil where $wc order by uncode";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $oneteh) { 
			$selected = '';
			if(($uncode > 0)&&($uncode == $oneteh["uncode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$oneteh["uncode"].'" '.$selected.' >'.$oneteh["un_name"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getFacilities_options')){
	function getFacilities_options($isreturn=false,$selectedfacode=NULL,$distcode=NULL,$tcode=NULL,$uncode=NULL,$facat=NULL,$fatype=NULL){
		$CI = & get_instance();
		if($distcode){}else{$distcode = $CI -> session -> distcode;}
		$wc = array();
		if($distcode)
		{
			$wc["distcode"]=$distcode;
		}
		if($tcode)
		{
			$wc["tcode"]=$tcode;
		}
		if($uncode)
		{
			$wc["uncode"]=$uncode;
		}
		if($facat)
		{
			$wc["facat"]=$facat;
		}
		$CI -> db ->select("fac.facode,fac.fac_name");
		$CI -> db ->from("facilities fac");
		$CI -> db ->join("facilities_types types","types.fatype = fac.fatype");
		if($fatype=="Dispensaries"){
			$allTypes = array('MD', 'UD', 'RD', 'DISP', 'HOM', 'TD', 'UDIS', 'CD', 'GRD', 'HD');
			$CI ->db -> where_in('fac.fatype', $allTypes);
		}else if($fatype)
		{
			$wc["fac.fatype"]=$fatype;
		}
		$CI -> db ->where($wc);
		$CI -> db ->order_by("fac.facode");
		$result = $CI -> db ->get();
		$result1 = $result->result_array();
		
		$moon = '<option value="" >-- Select Facility--</option>';
		foreach ($result1 as $onefa) { 
			$selected = '';
			if(($selectedfacode > 0)&&($selectedfacode == $onefa["facode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onefa["facode"].'" '.$selected.' >'.$onefa["facode"].' - '.$onefa["fac_name"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getEntities_options')){
	function getEntities_options($isreturn=false,$facode=NULL,$distcode=NULL){
		//later it will be checked which entity is selected and how to get entity name
		$CI = & get_instance();
		$wc = "procode = '3'";
		if($distcode){}else{$distcode = $CI -> session -> distcode;}
		if($distcode)
			$wc .= " AND distcode = '$distcode'";
		$moon = '<option value="" >-- Select Facility--</option>';
		$query="Select fac_name,facode from facilities where $wc order by facode";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onefa) { 
			$selected = '';
			if(($facode > 0)&&($facode == $onefa["facode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onefa["facode"].'" '.$selected.' >'.$onefa["facode"].' - '.$onefa["fac_name"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('get_approval_auth_info')){
	function get_approval_auth_info($code_or_ptype,$type='DHO'){
		$CI = & get_instance();
		if($type == 'PD'){
			$query 	= "Select users.id,email,fullname,displayname as designation from users join designations on designations.id = users.designation where designations.ptype = '$code_or_ptype' and users.status = '1' and users.level = '2' and users.utype = 'ProExecutive'";
		}else{
			$query 	= "Select id,email,fullname,getdesignation(designation) as designation from users where distcode = '$code_or_ptype' and status = '1' and level = '3' and utype = 'Executive'";
		}
		$resultDist = $CI -> db -> query($query);		
		if ($resultDist->num_rows() > 0)
		{
			return $resultDist -> result_array();	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_District_Name')){
	function get_District_Name($distcode){
		$CI = & get_instance();
		$query 		= "Select district from districts where distcode = '$distcode'";
		$resultDist = $CI -> db -> query($query);		
		if ($resultDist->num_rows() > 0)
		{
			return $resultDist -> row()->district;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Tehsil_Name')){
	function get_Tehsil_Name($tcode){
		$CI = & get_instance();
		$query 		= "Select tehsil from tehsil where tcode = '$tcode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row()->tehsil;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_District_Name')){
	function get_Facility_District_Name($facode){
		$CI = & get_instance();
		$query 		= "Select districtname(distcode) as district from facilities where facode = '$facode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row()->district;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_Tehsil_Name')){
	function get_Facility_Tehsil_Name($facode){
		$CI = & get_instance();
		$query 		= "Select tcode from facilities where facode = '$facode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row()->tcode;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_UC_Name')){
	function get_Facility_UC_Name($facode){
		$CI = & get_instance();
		$query 		= "Select uncode from facilities where facode = '$facode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row()->uncode;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_Tehsil_data')){
	function get_Facility_Tehsil_data($facode){
		$CI = & get_instance();
		$query 		= "Select tcode,tehsilname(tcode) as tehsil from facilities where facode = '$facode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row();	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_UC_data')){
	function get_Facility_UC_data($facode){
		$CI = & get_instance();
		$query 		= "Select uncode,unname(uncode) as unioncouncil from facilities where facode = '$facode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row();	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_CMW_Tehsil_data')){
	function get_CMW_Tehsil_data($cmwcode){
		$CI = & get_instance();
		$query 		= "Select tcode,tehsilname(tcode) as tehsil from cmwdb where cmwcode = '$cmwcode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row();	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_CMW_UC_data')){
	function get_CMW_UC_data($cmwcode){
		$CI = & get_instance();
		$query 		= "Select uncode,unname(uncode) as unioncouncil from cmwdb where cmwcode = '$cmwcode'";
		$resultTeh = $CI -> db -> query($query);
		if ($resultTeh->num_rows() > 0)
		{
			return $resultTeh -> row();	
		}else{
			return '';	
		}
	}
}

if(!function_exists('get_UC_Name')){
	function get_UC_Name($uncode){
		$CI = & get_instance();
		$query 		= "Select un_name from unioncouncil where uncode = '$uncode'";
		$resultUC = $CI -> db -> query($query);
		if($resultUC -> num_rows() >0)
		{
			return $resultUC -> row()->un_name;	
		}
		return "";	
	}
}
if(!function_exists('get_Facility_Name')){
	function get_Facility_Name($facode){
		$CI = & get_instance();
		$query 		= "Select fac_name from facilities where facode = '$facode'";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->fac_name;
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Entity_Name')){
	function get_Entity_Name($code,$type=''){
		$CI = & get_instance();
		$query 		= "Select coalesce((
			case when '$type'='' then '' 
			when '$type'='name' then '$code' 
			when '$type'='CMW' then cmwname('$code') end),'') as entity";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->entity;
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_LHS_Name')){
	function get_LHS_Name($lhscode){
		$CI = & get_instance();
		$query 		= "Select lhsname from lhsdb where lhscode = '$lhscode'";
		$result = $CI -> db -> query($query);
		if ($result->num_rows() > 0)
		{
			return $result -> row()->lhsname;	
		}else{
			return '';	
		}		
	}
}
if(!function_exists('get_CMW_Name')){
	function get_CMW_Name($cmwcode){
		$CI = & get_instance();
		$query 		= "Select cmw_name from cmwdb where cmwcode = '$cmwcode'";
		$resultCMW = $CI -> db -> query($query);
		if($resultCMW -> num_rows() >0)
		{
			return $resultCMW -> row()->cmw_name;	
		}
		return "";	
	}
}

if(!function_exists('get_hfcat')){
	function get_hfcat($facode){
		$CI = & get_instance();
		$query 		= "Select hfcat from facilities where facode = '$facode'";
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->hfcat;	
		}else{
			return NULL;	
		}
	}
}
function getChecklstStat($table,$vpvc_id,$checkHalfSaved=NULL)
{
	if($table){
		$CI = & get_instance();
		$query 	= 	"SELECT EXISTS (
						SELECT 1 
						FROM   pg_catalog.pg_class c
						JOIN   pg_catalog.pg_namespace n ON n.oid = c.relnamespace
						WHERE  c.relname = '$table'
					) as moon";
		$result = $CI -> db -> query($query);
		$val = $result -> row()->moon;
		if($val=='t'){
			$query 	= 	"Select count(id) as total from $table where $table.vpvc_id IS NOT NULL and $table.vpvc_id = $vpvc_id";
			$result = $CI -> db -> query($query);
			$tot = $result -> row()->total;
			if ($tot > 0)
			{
				if($checkHalfSaved)
				{
					//code here to check if checklist is saved after half filling or full filling.
					$query 	= 	"Select is_temp_saved from $table where $table.vpvc_id IS NOT NULL and $table.vpvc_id = $vpvc_id";
					$result = $CI -> db -> query($query);
					$is_temp_saved = $result -> row()->is_temp_saved;
					if ($is_temp_saved == 1)
					{
						return 'yes';	
					}
				}
				return 'true';	
			}
			return 'false';	
		}
		return 'false';
	}
	return 'false';
}
if(!function_exists('get_LHW_Name')){
	function get_LHW_Name($lhwcode){
		$CI = & get_instance();
		$query 		= "Select lhwname from lhwdb where lhwcode = '$lhwcode'";
		$result = $CI -> db -> query($query);
		if ($result->num_rows() > 0)
		{
			return $result -> row()->lhwname;	
		}else{
			return '';	
		}		
	}
}

if(!function_exists('get_User_FullName')){
	function get_User_FullName($userid=NULL){
		$CI = & get_instance();
		if($userid){}else{
			$userid=$CI->session->id;
		}
		$query 		= "Select fullname from users where id = $userid";
		$result = $CI -> db -> query($query);
		if ($result->num_rows() > 0)
		{
			return $result -> row()->fullname;	
		}else{
			return '';	
		}		
	}
} 

if(!function_exists('get_Program_Name')){
	function get_Program_Name($ptype){
		$CI = & get_instance();
		$query 		= "Select pname from programs where ptype = '$ptype'";
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->pname;	
		}else{
			return '';	
		}
	}
}

if(!function_exists('get_User_Program_Name')){
	function get_User_Program_Name($designation){
		$CI = & get_instance();
		$query 		= "Select pname from programs where ptype = (select ptype from designations where id = $designation)";
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->pname;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_User_Designation_Id')){
	function get_User_Designation_Id($userId=NULL){
		$CI = & get_instance();
		if($userId){}else{$userId= $CI -> session ->id;}
		$query 		= "Select designation from users where id = '$userId'";
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->designation;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Designation_Name')){
	function get_Designation_Name($desgId=NULL){
		$CI = & get_instance();
		if($desgId){}else{$desgId = $CI -> session -> desg;}
		$query 		= "Select designation from designations where id = '$desgId'";
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->designation;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Fatype_Name')){
	function get_Fatype_Name($fatype){
		$allTypes = array('MD', 'UD', 'RD', 'DISP', 'HOM', 'TD', 'UDIS', 'CD', 'GRD', 'HD');
		switch($fatype)
		{
			case "RHC":
				return "RHC - RURAL HEALTH CENTER";
			case "BHU":
				return "BHU - BASIC HEALTH UNIT";
			case "MCH":
				return "MCH - MCH CENTRE";
			case "Dispensaries":
				return "Dispensaries";
			case in_array($fatype, $allTypes):
				return "Dispensaries";
		}
	}
}
if(!function_exists('get_Checklist_Name')){
	function get_Checklist_Name($chklstId){
		$CI = & get_instance();
		$query 		= "Select name from checklists where id = '$chklstId'";
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->name;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_FaCat_Name')){
	function get_FaCat_Name($fatype=NULL){
		$CI = & get_instance();
		$moon = "";
		$query="Select distinct facat,facat_name from facilities_types where fatype='$fatype'";// where $wc
		$result = $CI -> db ->query($query);
		$result1 = $result->row_array();
		return $result1;
	}
}
if(!function_exists('get_Facility_Population')){
	function get_Facility_Population($facode){
		$CI = & get_instance();
		$query 		= "Select catchment_area_pop from facilities where facode = '$facode'";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->catchment_area_pop;
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_Fatype')){
	function get_Facility_Fatype($facode){
		$CI = & get_instance();
		$query 		= "Select fatype from facilities where facode = '$facode'";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->fatype;
		}else{
			return '';	
		}
	}
}
if(!function_exists('getFaCats')){
	function getFaCats($isreturn=false,$facat=NULL){
		$CI = & get_instance();
		$moon = "";
		$query="Select distinct facat,facat_name from facilities_types";// where $wc
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $one) { 
			$selected = '';
			if(($facat)&&($facat == $one["facat"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$one["facat"].'" '.$selected.' >'.$one["facat_name"].' - ('.$one["facat"].')</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getFaTypes')){
	function getFaTypes($facat=NULL){
		$CI = & get_instance();
		if($facat)
		{
			$wc = "facat = '$facat'";
		}else{
			$wc = "'1'";
		}
		$query="Select distinct fatype,fatype_name from facilities_types where $wc";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		return $result1;
	}
}
if(!function_exists('getTehsils')){
	function getTehsils($distcode=NULL){
		$CI = & get_instance();
		$wc = array();
		if($distcode)
		{
			$wc["distcode"]=$distcode;
		}
		$CI -> db ->select("tehsil,tcode");
		$CI -> db ->from("tehsil");
		$CI -> db ->where($wc);
		$CI -> db ->order_by("tcode");
		$result = $CI -> db ->get();
		return $result->result_array();
	}
}
if(!function_exists('getUcs')){
	function getUcs($distcode=NULL,$tcode=NULL){
		error_reporting(E_ALL);
		$CI = & get_instance();
		$wc = array();
		if($distcode)
		{
			$wc["distcode"]=$distcode;
		}
		if($tcode)
		{
			$wc["tcode"]=$tcode;
		}
		$CI -> db ->select("un_name,uncode");
		$CI -> db ->from("unioncouncil");
		$CI -> db ->where($wc);
		$CI -> db ->order_by("uncode");
		$result = $CI -> db ->get();
		//$result = $CI -> db ->query("Select facode,fac_name from facilities join facilities_types types on types.fatype = facilities.fatype where $wc");
		return $result->result_array();
	}
}
if(!function_exists('getFacilities')){
	function getFacilities($distcode=NULL,$tcode=NULL,$uncode=NULL,$facat=NULL,$fatype=NULL){
		error_reporting(E_ALL);
		$CI = & get_instance();
		$wc = array();
		if($distcode)
		{
			$wc["distcode"]=$distcode;
		}
		if($tcode)
		{
			$wc["tcode"]=$tcode;
		}
		if($uncode)
		{
			$wc["uncode"]=$uncode;
		}
		if($facat)
		{
			$wc["facat"]=$facat;
		}
		$CI -> db ->select("fac.facode,fac.fac_name");
		$CI -> db ->from("facilities as fac");
		$CI -> db ->join("facilities_types types","types.fatype = fac.fatype");
		if($fatype=="Dispensaries"){
			$allTypes = array('MD', 'UD', 'RD', 'DISP', 'HOM', 'TD', 'UDIS', 'CD', 'GRD', 'HD');
			$CI ->db -> where_in('fac.fatype', $allTypes);
		}else if($fatype=="HOSP"){
			$allTypes = array('HOSP', 'THOS', 'CH');
			$CI ->db -> where_in('fac.fatype', $allTypes);
		}else if($fatype=="Others"){
			$allTypes = array('Others', 'SHC', 'TBC', 'LC');
			$CI ->db -> where_in('fac.fatype', $allTypes);
		}else if($fatype)
		{
			$wc["fac.fatype"]=$fatype;
		}
		$CI -> db ->where($wc);
		$result = $CI -> db ->get();
		return $result->result_array();
	}
}
//get LHSs
if(!function_exists('getLHS')){
	function getLHS($distcode=NULL,$tcode=NULL,$uncode=NULL,$facode=NULL){
		error_reporting(E_ALL);
		$CI = & get_instance();
		$wc = array();
		if($distcode)
		{
			$wc["distcode"]=$distcode;
		}
		if($tcode)
		{
			$wc["tcode"]=$tcode;
		}
		if($uncode)
		{
			$wc["uncode"]=$uncode;
		}
		if($facode)
		{
			$wc["facode"]=$facode;
		}
		$wc["status"]="Active";
		$CI -> db ->select("lhscode,lhsname");
		$CI -> db ->from("lhsdb");
		$CI -> db ->where($wc);
		$result = $CI -> db ->get();
		return $result->result_array();
	}
}
//get LHSs
if(!function_exists('getLHS_options')){
	function getLHS_options($isreturn=False,$lhscode=NULL,$distcode=NULL,$tcode=NULL,$uncode=NULL,$facode=NULL){
		$result1 = getLHS($distcode,$tcode,$uncode,$facode);
		$moon = '<option value="" >-- Select LHS--</option>';
		foreach ($result1 as $onelhs) { 
			$selected = '';
			if(($lhscode > 0)&&($lhscode == $onelhs["lhscode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onelhs["lhscode"].'" '.$selected.' >'.$onelhs["lhsname"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
//get LHWs
if(!function_exists('getLHW')){
	function getLHW($distcode=NULL,$tcode=NULL,$uncode=NULL,$facode=NULL,$lhscode=NULL){
		error_reporting(E_ALL);
		$CI = & get_instance();
		$wc = array();
		if($distcode)
		{
			$wc["distcode"]=$distcode;
		}
		if($tcode)
		{
			$wc["tcode"]=$tcode;
		}
		if($uncode)
		{
			$wc["uncode"]=$uncode;
		}
		if($facode)
		{
			$wc["facode"]=$facode;
		}
		if($lhscode)
		{
			$wc["lhscode"]=$lhscode;
		}
		$wc["status"]="Active";
		$CI -> db ->select("lhwcode,lhwname");
		$CI -> db ->from("lhwdb");
		$CI -> db ->where($wc);
		$result = $CI -> db ->get();
		return $result->result_array();
	}
}
//get LHW options
if(!function_exists('getLHW_options')){
	function getLHW_options($isreturn=False,$lhwcode=NULL,$distcode=NULL,$tcode=NULL,$uncode=NULL,$facode=NULL,$lhscode=NULL){
		$result1 = getLHW($distcode,$tcode,$uncode,$facode,$lhscode);
		$moon = '<option value="" >-- Select LHW--</option>';
		foreach ($result1 as $onelhw) { 
			$selected = '';
			if(($lhwcode > 0)&&($lhwcode == $onelhw["lhwcode"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onelhw["lhwcode"].'" '.$selected.' >'.$onelhw["lhwname"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
//to print list of checklists
if(!function_exists('getChklstListingTable')){
    function getChklstListingTable($allData,$actionPath="",$addDel = false,$drilldown=false,$editViewPath=""){
		$count = 0;
		$extraClass = "";
		if (strpos($actionPath, 'lqas') !== false) {
		    $extraClass = "tbl-algn";
		}
		$returnData = "<table class=\"table table-striped table-bordered table-hover tbl-listing $extraClass\">";
		$delPath = '';
		foreach($allData as $key => $value)
		{
			//action linking with id or vpvcid start
			$id = 0;$idd = 0;
			$vpvcid = 0;
			if (array_key_exists('vpvc_id', $value)) {
				$vpvcid = $value["vpvc_id"];
				unset($value["vpvc_id"]);
			}
			if (array_key_exists('id', $value)) {
				$idd = $value["id"];
				unset($value["id"]);
			}
			if($vpvcid==0){
				$id = $idd;
			}else{
				$id = $vpvcid;
			}			
			//action linking with id or vpvcid end
			if($count == 0)
			{
				$returnData .= "<thead><tr class=\"tr-h-list-bg\"><th>Sr#</th><th>";
				$returnData .= implode("</th><th>",array_map("ucwords",array_keys($value)));
				$returnData .= "</th>";
				if($actionPath!="")
				{
					$colspan = 2;
					if($addDel)
					{
						$colspan++;
					}
					$returnData .= '<th colspan="'.$colspan.'">Action</th>';
				}
				if($editViewPath!="")
				{
					$colspan = 0;
					if (array_key_exists('view', $editViewPath)) {
						$colspan++;
					}
					if (array_key_exists('edit', $editViewPath)) {
						$colspan++;
					}
					$returnData .= '<th colspan="'.$colspan.'">Action</th>';
				}				
				$returnData .= "</tr></thead><tbody id=\"tbody\">";
			}       
			$drilldownClass = "";
			if($drilldown)
			{
				$drilldownClass = "DrillDownRow";
			}
			$count++;
			$returnData .= "<tr class=\"$drilldownClass\"><td>$count<input type=\"hidden\" class=\"rowCode\" value=\"$id\" ></td><td>";
			$returnData .= implode("</td><td>",$value);
			$returnData .= "</td>";
			if($actionPath!="")
			{
				$returnData .= "<td><a href=\"".base_url().$actionPath."_view/$id\"><i class=\"fa fa-search\"></i></a></td>";
				$returnData .= "<td><a href=\"".base_url().$actionPath."_edit/$id\"><i class=\"fa fa-pencil\"></i></a></td>";
				if($addDel)
				{
					$delPath = base_url().$actionPath."_delete/".$id;
					$returnData .= "<td><a href=\"$delPath\" onclick=\"return confirm('Are you sure you want to delete this?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
				}
			}
			if($editViewPath!="")
			{
				if (array_key_exists('view', $editViewPath)) {
					$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."_view/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-search\"></i></a></td>";
				}
				if (array_key_exists('edit', $editViewPath)) {
					$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
				}
			}			
			$returnData .= "</tr>";
		}
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
		}
		return $returnData .= "</tbody></table>";
	}
}
//to print list of checklists on ajax
if(!function_exists('getChklstListingAjaxTable')){
    function getChklstListingAjaxTable($allData,$actionPath="",$addDel = false,$drilldown=false,$editViewPath="",$header=true,$serialNumberStart=NULL){
		$count = 0;
		if(!$serialNumberStart){
			$serialNumberStart=$count;
		}
		$returnData = '';
		foreach($allData as $key => $value)
		{
			//action linking with id or vpvcid start
			$id = 0;$idd = 0;
			$vpvcid = 0;
			if (array_key_exists('vpvc_id', $value)) {
				$vpvcid = $value["vpvc_id"];
				unset($value["vpvc_id"]);
			}
			if (array_key_exists('id', $value)) {
				$idd = $value["id"];
				unset($value["id"]);
			}
			if($vpvcid==0){
				$id = $idd;
			}else{
				$id = $vpvcid;
			}		
			$drilldownClass = "";
			if($drilldown)
			{
				$drilldownClass = "DrillDownRow";
			}
			$count++;
			$serialNumberStart++;
			$returnData .= "<tr class=\"$drilldownClass\"><td>$serialNumberStart<input type=\"hidden\" class=\"rowCode\" value=\"$id\" ></td><td>";
			$returnData .= implode("</td><td>",$value);
			$returnData .= "</td>";
			if($actionPath!="")
			{
				$returnData .= "<td><a href=\"".base_url().$actionPath."_view/$id\"><i class=\"fa fa-search\"></i></a></td>";
				$returnData .= "<td><a href=\"".base_url().$actionPath."_edit/$id\"><i class=\"fa fa-pencil\"></i></a></td>";
				if($addDel)
				{
					$delPath = base_url().$actionPath."_delete/".$id;
					$returnData .= "<td><a href=\"$delPath\" onclick=\"return confirm('Are you sure you want to delete this?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
				}
			}
			if($editViewPath!="")
			{
				if (array_key_exists('view', $editViewPath)) {
					$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."_view/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-search\"></i></a></td>";
				}
				if (array_key_exists('edit', $editViewPath)) {
					$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
				}
			}			
			$returnData .= "</tr>";
		}
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
		}
		if($header){
			$returnData .= "</tbody>";
		}
		return $returnData;
	}
}
if(!function_exists('getListingTable')){
    function getListingTable($allData,$actionPath="",$addDel = false,$drilldown=false,$editViewPath=""){
		$CI = & get_instance();
		$count = 0;
		$extraClass = "";
		if (strpos($actionPath, 'lqas') !== false) {
		    $extraClass = "tbl-algn";
		}
		$returnData = "<table class=\"table table-striped table-bordered table-hover tbl-listing $extraClass\">";
		$delPath = '';
		$startpoint=0;
		if (is_array($allData) && array_key_exists('startpoint', $allData)) {
			$startpoint = $allData["startpoint"];
			unset($allData["startpoint"]);
		}
		if(is_array($allData) && (count($allData) > 0))
		{
			foreach($allData as $key => $value)
			{
				$id = 0;$idd = 0;
				$vpvcid = 0;
				if (array_key_exists('vpvc_id', $value)) {
					$vpvcid = $value["vpvc_id"];
					unset($value["vpvc_id"]);
				}
				if (array_key_exists('id', $value)) {
					$idd = $value["id"];
					unset($value["id"]);
				}
				if($vpvcid==0){
					$id = $idd;
				}else{
					$id = $vpvcid;
				}			
				//action linking with id or vpvcid end
				if($count == 0)
				{
					$returnData .= "<thead><tr class=\"tr-h-list-bg\"><th>Sr#</th><th>";
					$returnData .= implode("</th><th>",array_map("ucwords",array_keys($value)));
					$returnData .= "</th>";
					if($actionPath!="")
					{
						$colspan = 2;
						if($addDel)
						{
							$colspan++;
						}
						$returnData .= '<th colspan="'.$colspan.'">Action</th>';
					}
					if($editViewPath!="")
					{
						$colspan = 0;
						if (array_key_exists('view', $editViewPath)) {
							$colspan++;
						}
						if (array_key_exists('edit', $editViewPath)) {
							$colspan++;
						}
						$returnData .= '<th colspan="'.$colspan.'">Action</th>';
					}				
					$returnData .= "</tr></thead><tbody id=\"tbody\">";
				}       
				$drilldownClass = "";
				if($drilldown)
				{
					$drilldownClass = "DrillDownRow";
				}
				$count++;
				$startpoint++;
				$returnData .= "<tr class=\"$drilldownClass\"><td>$startpoint<input type=\"hidden\" class=\"rowCode\" value=\"$id\" ></td><td>";
				$returnData .= implode("</td><td>",$value);
				$returnData .= "</td>";
				if($actionPath!="")
				{
					$returnData .= "<td><a href=\"".base_url().$actionPath."_view/$id\"><i class=\"fa fa-search\"></i></a></td>";
					$returnData .= "<td><a href=\"".base_url().$actionPath."_edit/$id\"><i class=\"fa fa-pencil\"></i></a></td>";
					if($addDel)
					{
						$delPath = base_url().$actionPath."_delete/".$id;
						$returnData .= "<td><a href=\"$delPath\" onclick=\"return confirm('Are you sure you want to delete this?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
					}
				}
				if($editViewPath!="")
				{
					if(array_key_exists("Year-Month", $value)){
						$value["Year-Month"] = date("Y-m",strtotime("01 ".$value["Year-Month"]));
					}					
					if (array_key_exists('view', $editViewPath)) {
						$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."_view/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-search\"></i></a></td>";
					}
					if (array_key_exists('edit', $editViewPath)) {
						
						$pd  = array_key_exists("PD Approval Status", $value);
						$dho = array_key_exists("DHO Approval Status", $value);
						if($pd || $dho){
							$approvalKey = ($pd)?"PD Approval Status":(($dho)?"DHO Approval Status":"");
							if(isset($value[$approvalKey]) && $value[$approvalKey] == "Approved"){
							}else{
								$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
							}
						}else{
							$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
						}
					}
				}			
				$returnData .= "</tr>";
			}
		}
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody id=\"tbody\">";
		}
		return $returnData .= "</tbody></table>";
	}
}
if(!function_exists('getListingAjaxTable')){
    function getListingAjaxTable($allData,$actionPath="",$addDel = false,$drilldown=false,$editViewPath="",$header=true){
		$CI = & get_instance();	
		$count = 0;
		$returnData = '';
		$startpoint=0;
		if (is_array($allData) && array_key_exists('startpoint', $allData)) {
			$startpoint = $allData["startpoint"];
			unset($allData["startpoint"]);
		}
		if(is_array($allData) && (count($allData) > 0))
		{
			
			foreach($allData as $key => $value)
			{	
				$id = 0;$idd = 0;
				$vpvcid = 0;
				if (array_key_exists('vpvc_id', $value)) {
					$vpvcid = $value["vpvc_id"];
					unset($value["vpvc_id"]);
				}
				if (array_key_exists('id', $value)) {
					$idd = $value["id"];
					unset($value["id"]);
				}
				if($vpvcid==0){
					$id = $idd;
				}else{
					$id = $vpvcid;
				}
				if($count == 0)
				{
					if($header){
						$returnData .= "<thead><tr class=\"tr-h-list-bg\"><th>Sr#</th><th>";
						$returnData .= implode("</th><th>",array_map("ucwords",array_keys($value)));
						$returnData .= "</th>";
						
						if($actionPath!="")
						{
							$colspan = 2;
							if($addDel)
							{
								$colspan++;
							}
							$returnData .= '<th colspan="'.$colspan.'">Action</th>';						
						}
						if($editViewPath!="")
						{
							$colspan = 0;
							if (array_key_exists('view', $editViewPath)) {
								$colspan++;
							}
							if (array_key_exists('edit', $editViewPath)) {
								$colspan++;
							}
							$returnData .= '<th colspan="'.$colspan.'">Action</th>';
						}				
						$returnData .= "</tr></thead><tbody id=\"tbody\">";
					}
					
				}       
				$drilldownClass = "";
				if($drilldown)
				{
					$drilldownClass = "DrillDownRow";
				}
				$count++;
				$startpoint++;
				$returnData .= "<tr class=\"$drilldownClass\"><td>$startpoint<input type=\"hidden\" class=\"rowCode\" value=\"$id\" ></td><td>";
				$returnData .= implode("</td><td>",$value);
				$returnData .= "</td>";
				if($actionPath!="")
				{
					$returnData .= "<td><a href=\"".base_url().$actionPath."_view/$id\"><i class=\"fa fa-search\"></i></a></td>";
					$returnData .= "<td><a href=\"".base_url().$actionPath."_edit/$id\"><i class=\"fa fa-pencil\"></i></a></td>";
					if($addDel)
					{
						$delPath = base_url().$actionPath."_delete/".$id;
						$returnData .= "<td><a href=\"$delPath\" onclick=\"return confirm('Are you sure you want to delete this?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
					}
				}
				if($editViewPath!="")
				{
					if(array_key_exists("Year-Month", $value)){
						$value["Year-Month"] = date("Y-m",strtotime("01 ".$value["Year-Month"]));
					}
					if (array_key_exists('view', $editViewPath)) {
						$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."_view/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-search\"></i></a></td>";
					}
					if (array_key_exists('edit', $editViewPath)) {
						
						if(array_key_exists("PD Approval Status", $value) || array_key_exists("DHO Approval Status", $value)){
							$approvalKey = (array_key_exists("PD Approval Status", $value))?"PD Approval Status":(array_key_exists("DHO Approval Status", $value))?"DHO Approval Status":"";
							if(isset($value[$approvalKey]) && $value[$approvalKey] == "Approved"){
								
								/* if(array_key_exists("Year-Month", $value)){
									$statusResult = statusForFilledChecklistIn_A_Plan($value["Year-Month"],$CI->session->ptype,$CI->session->userLevel);
									if($statusResult == "true"){}else{
										$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
									}
								}else{
									$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
								} */
							}else{
								$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
							}
						}else{
							$returnData .= "<td><a href=\"".base_url().$editViewPath["path"]."/".$value[$editViewPath["column"]]."\"><i class=\"fa fa-pencil\"></i></a></td>";
						}
					}
				}			
				$returnData .= "</tr>";
			}
		}
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody id=\"tbody\">";
		}
		if($header){
			$returnData .= "</tbody>";
		}
		return $returnData;
	}
}
if(!function_exists('approvePlanTable')){
    function approvePlanTable(&$allPlans,&$finalarr,&$staticarr,&$dynarr,&$counter,&$fincounter,$newarr=NULL,$locrowcount = 0){
		$totalCount = count($allPlans);
		if($totalCount > 0){
			if($newarr)
			{
				if($locrowcount=="newrow")
				{
					foreach($staticarr as $key => $val)
					{
						$finalarr[$fincounter][$val] = $newarr[$val];
					}
				}
				$locrowcount = 0;
				foreach($dynarr as $key => $val)
				{
					//$finalarr[$fincounter][$val] = ($newarr["designation"]==$val)?array($newarr["facode"],$newarr["visitdate"],$newarr["visitplanid"]):$finalarr[$fincounter][$val];
					if($newarr["designation"]==$val){
						$finalarr[$fincounter][$val] = array($newarr["facode"],$newarr["visitdate"],$newarr["visitplanid"],$newarr["visitid"]);
					}else{
						$finalarr[$fincounter][$val] = (isset($finalarr[$fincounter][$val])?$finalarr[$fincounter][$val]:"");
					}					
					if($finalarr[$fincounter][$val]!=""){$locrowcount++;}
				}
			}else{
				$newarr = $allPlans[$counter];
				foreach($staticarr as $key => $val)
				{
					$finalarr[$fincounter][$val] = $newarr[$val];
				}
				$locrowcount = 0;
				foreach($dynarr as $key => $val)
				{
					$finalarr[$fincounter][$val] = "";
					if($newarr["designation"]==$val){
						$finalarr[$fincounter][$val] = array($newarr["facode"],$newarr["visitdate"],$newarr["visitplanid"],$newarr["visitid"]);
					}
					if($finalarr[$fincounter][$val]!=""){$locrowcount++;}
				}
			}													
			$oldcounter = $counter;
			$counter++;
			if($counter<$totalCount)
			{
				if(($allPlans[$oldcounter]["facode"]==$allPlans[$counter]["facode"]))
				{
					if($locrowcount<3 && $allPlans[$oldcounter]["visitdate"]==$allPlans[$counter]["visitdate"])
					{
						approvePlanTable($allPlans,$finalarr,$staticarr,$dynarr,$counter,$fincounter,$allPlans[$counter]);
					}else{
						$fincounter++;
						approvePlanTable($allPlans,$finalarr,$staticarr,$dynarr,$counter,$fincounter,$allPlans[$counter],"newrow");
					}
				}
			}
			return true;
		}
		return true;
	}
}
if(!function_exists('getPlanAjaxTable')){
    function getPlanAjaxTable($allPlans,$viewType=""){
		$count = 0;
		$returnData = '';		
		if($allPlans != "")
		{
			$dynarr = array_unique(array_column($allPlans, 'designation'));
			$staticarr = array("facode","facility","fatype","driver","vehicle");
			$counter = 0;
			$fincounter = 0;
			$finalarr = array();
			approvePlanTable($allPlans,$finalarr,$staticarr,$dynarr,$counter,$fincounter);
			////print_r($finalarr);exit;
			$newheadings = array_merge($staticarr,$dynarr);
			unset($newheadings[array_search("vehicle", $newheadings)]);unset($newheadings[array_search("driver", $newheadings)]);
			$returnData .= "<thead><tr class=\"tr-h-list-bg\"><th>Sr#</th><th>";
			$returnData .= implode("</th><th>",array_map("ucwords",array_values($newheadings)));
			$returnData .= "</th>";
			if($viewType=="view")
			{
				$returnData .= '<th>Assign Vehicle No</th><th>Name of Driver</th>';
			}
			$returnData .= "</tr></thead><tbody id=\"tbody\">";//<th>Assign Vehicle No</th><th>Name of Driver</th>
			foreach($finalarr as $key => $value)
			{
				$count++;
				$returnData .= "<tr><td text-align=\"left\">$count</td><td>";
				$counter = 0;
				$vehicle = $value["vehicle"];unset($value["vehicle"]);
				$driver = $value["driver"];unset($value["driver"]);
				$returnData .= implode("</td><td>",array_map(function($v)use(&$counter,&$viewType,&$vehicle,&$driver){
					if($counter++ >2)
					{
						if($viewType!="view")
						{
							return ($v!='')?'
							<input class="dp form-control" type="text" name="planapproved['.$v[0].'][visitdate][]" value="'.date("d-m-Y",strtotime($v[1])).'">
							<table><tr>
								<td><input name="planapproved['.$v[0].'][vehicleassigned][]" value="'.$vehicle.'" placeholder="Vehicle" class="zp form-control" type="text" required="required"></td>
								<td><input name="planapproved['.$v[0].'][driver][]" value="'.$driver.'" placeholder="Driver" class="zp form-control" type="text" required="required"></td>
							</tr></table>
							<input class="form-control" type="hidden" name="planapproved['.$v[0].'][visitplanid][]" value="'.$v[2].'">
							<input class="form-control" type="hidden" name="planapproved['.$v[0].'][vpvid][]" value="'.$v[3].'">':$v;
						}else{
							return ($v!='')?getNewDateFormat(date("d-m-Y",strtotime($v[1]))):$v;
						}						
					}
					return $v;
				},$value));
				if($viewType!="view")
				{
					//$returnData .= '</td><td><input class="form-control" type="text" name="planapproved['.$value["facode"].'][vehicleassigned]" value="'.$vehicle.'" required="required"></td>
					//<td><input class="form-control" type="text" name="planapproved['.$value["facode"].'][driver]" value="'.$driver.'" required="required"></td></tr>';
				}else{
					$returnData .= '</td><td>'.$vehicle.'</td><td>'.$driver.'</td></tr>';
				}
			}
		}
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
		}
		return $returnData;
	}
}

if(!function_exists('getchlistdetails')){
function getchlistdetails($vpvcid=NULL){
	$CI = & get_instance();
	$CI -> db ->select("
		vph.fmonth,
		substr(vpv.facode,1,3) as distcode,
		districtname(vph.distcode) as district, 
		vph.id as planid, 
		vph.supervisorid as supervisorid, 
		vph.supervisor as supervisor_name,
		vph.ptype, 
		programname(vph.ptype) as program,  
		getdesigid(vph.supervisorid) as designationid, 
		getdesigdisplayname(vph.supervisorid) as supervisor_desg,
		vph.date_submitted, 
		vpv.facode, 
		facilityname(vpv.facode) as facility, 
		facilitytype(vpv.facode) as fatype, 
		vpv.visitdate, 
		coalesce(vpv.vehicleassigned,'') as vehicle,
		coalesce(vpv.driver,'') as driver, 
		vpv.visitcategory, 
		vpvc.id as vpvcid, 
		vpvc.checklistid, 
		checklistname(vpvc.checklistid) as checklist,
		coalesce(gethcptype(vpvc.hcptype_id),'') as hcptype,
		vpvc.hcp_value as target_value,
		coalesce((
			case when gethcptype(vpvc.hcptype_id)='' then '' 
			when gethcptype(vpvc.hcptype_id)='name' then vpvc.hcp_value 
			when gethcptype(vpvc.hcptype_id)='LHW' then lhwname(vpvc.hcp_value) 
			when gethcptype(vpvc.hcptype_id)='LHS' then lhsname(vpvc.hcp_value) 
			when gethcptype(vpvc.hcptype_id)='CMW' then cmwname(vpvc.hcp_value) end),'') as hcpvalue,
		gethcptypename(vpvc.hcptype_id) as hcptypename
	");
	$CI -> db ->from("visit_plan_header as vph");
	$CI -> db ->join("visit_plan_visits as vpv","vph.id = vpv.visitplanid");
	$CI -> db ->join("visit_plan_visit_checklists as vpvc","vpv.id = vpvc.visitplanvisitsid");
	$CI -> db ->where("vpvc.id = ".$vpvcid);
	$result = $CI -> db ->get()->row();
	return $result;
}
}
if(!function_exists('getcmwdetails')){
	function getcmwdetails($cmwcode){
		$CI = & get_instance();
		$CI -> db ->select("final_reg_no,cell,phone,deployment_date,address,catchment_area_pop");
		$CI -> db ->from("cmwdb");
		$CI -> db ->where("cmwcode",$cmwcode);
		$result = $CI -> db ->get()->row();
		return $result;
	}
}
if(!function_exists('get_lqas_data_elements')){
	//to get lqas data elements dynamiclly based upon user's type and month
	function get_lqas_data_elements($fmonth = NULL,$ptype = NULL,$facode = NULL){
		$CI = & get_instance();
		$fmonth = ($fmonth)?$fmonth:date("Y-m");
		$userptype = ($ptype)?$ptype:$CI -> session ->ptype;
		$whrarr = array("fmonth"=>$fmonth,"ptype"=>$userptype);
		if($userptype=='all'){
			$hfcat = ($facode)?get_hfcat($facode):NULL;
			$whrarr["hfcat"] = $hfcat;
		}
		
		return $CI -> Common_model -> get_info("da_lqas_chklst",NULL,NULL,NULL,$whrarr);
	}
}
if(!function_exists('statusForFilledChecklistIn_A_Plan')){
	function statusForFilledChecklistIn_A_Plan($fmonth=NULL,$ptype=NULL,$ulevel=NULL,$checkHalfSaved=NULL){
		$CI = & get_instance();
		if($ulevel == '2'){
			$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc INNER JOIN checklists on checklists.id = vpvc.checklistid 
			where vpvc.visitplanvisitsid in (select id from visit_plan_visits where visitplanid in (select id from visit_plan_header where fmonth='$fmonth' and ptype='$ptype' 
			and supervisorid in (select id from users where level='$ulevel' and	(utype='Manager' OR utype='ProExecutive'))))");
		}else{
			$distcode= $CI -> session -> distcode;
			$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc INNER JOIN checklists on checklists.id = vpvc.checklistid 
			where vpvc.visitplanvisitsid in (select id from visit_plan_visits where visitplanid in (select id from visit_plan_header where fmonth='$fmonth' and ptype='$ptype' 
			and supervisorid in (select id from users where level='$ulevel' and distcode='$distcode' )))");
		}
		$result = $query -> result_array();
		foreach($result as $key => $val){
			$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],$checkHalfSaved);
			if($filledstats == 'true'){
				return 'true';
			}else{}
		}
		return false;
	}
}

if(!function_exists('getuserdistricts')){
	function getuserdistricts(){
		$CI = & get_instance();
		$moon = '';
		$query="select userid, distcode, districtname(distcode) as district from usersdistricts where userid='".$CI -> session -> id."' order by distcode";//"Select name,id from checklists";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			$moon .= $onedist["district"].', ';
		}
		return $moon;
	}
}
 
if(!function_exists('ifuserdistricts')){
	function ifuserdistricts($userid=NULL){
		$CI = & get_instance();
		$query="select userid, distcode, districtname(distcode) as district from usersdistricts where userid='".(($userid)?$userid:$CI -> session -> id)."' order by distcode";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onedist) { 
			if($userid){
				return $result1;
			}
			return true;
		}
		return false;
	}
}

if(!function_exists('ifusertehsils')){
	function ifusertehsils($userid=NULL){
		$CI = & get_instance();
		$query="select userid, tcode, tehsilname(tcode) as tehsil from userstehsils where userid='".(($userid)?$userid:$CI -> session -> id)."' order by tcode";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $oneteh) { 
			if($userid){
				return $result1;
			}
			return true;
		}
		return false;
	}
}

if(!function_exists('ifuserfacilities')){
	function ifuserfacilities($userid=NULL){
		$CI = & get_instance();
		$query="select userid, facode, facilityname(facode) as facility from usersfacilities where userid='".(($userid)?$userid:$CI -> session -> id)."' order by facode";
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onefac) { 
			if($userid){
				return $result1;
			}
			return true;
		}
		return false;
	}
}
	
function browser() {
	$user_agent = $_SERVER['HTTP_USER_AGENT'];
	$browsers = array('Chrome' => array('Google Chrome', 'Chrome/(.*)\s'), 'MSIE' => array('Internet Explorer', 'MSIE\s([0-9\.]*)'), 'Firefox' => array('Firefox', 'Firefox/([0-9\.]*)'), 'Safari' => array('Safari', 'Version/([0-9\.]*)'), 'Opera' => array('Opera', 'Version/([0-9\.]*)'));
	$browser_details = array();
	foreach ($browsers as $browser => $browser_info) {
		if (preg_match('@' . $browser . '@i', $user_agent)) {
			$browser_details['name'] = $browser_info[0];
			preg_match('@' . $browser_info[1] . '@i', $user_agent, $version);
			$browser_details['version'] = $version[1];
			break;
		} else {
			$browser_details['name'] = 'Unknown';
			$browser_details['version'] = 'Unknown';
		}
	}
	return 'Browser: ' . $browser_details['name'] . ' Version: ' . $browser_details['version'];
}
if(!function_exists('apache_request_headers')) {
    function apache_request_headers() {
        $arrCasedHeaders = array(
            'Dasl'             => 'DASL',
            'Dav'              => 'DAV',
            'Etag'             => 'ETag',
            'Mime-Version'     => 'MIME-Version',
            'Slug'             => 'SLUG',
            'Te'               => 'TE',
            'Www-Authenticate' => 'WWW-Authenticate',
            'Content-Md5'      => 'Content-MD5',
            'Content-Id'       => 'Content-ID',
            'Content-Features' => 'Content-features',
        );
        $arrHttpHeaders = array();
        foreach($_SERVER as $strKey => $mixValue) {
            if('HTTP_' !== substr($strKey, 0, 5)) {
                continue;
            }
            $strHeaderKey = strtolower(substr($strKey, 5));
            if(0 < substr_count($strHeaderKey, '_')) {
                $arrHeaderKey = explode('_', $strHeaderKey);
                $arrHeaderKey = array_map('ucfirst', $arrHeaderKey);
                $strHeaderKey = implode('-', $arrHeaderKey);
            }
            else {
                $strHeaderKey = ucfirst($strHeaderKey);
            }
            if(array_key_exists($strHeaderKey, $arrCasedHeaders)) {
                $strHeaderKey = $arrCasedHeaders[$strHeaderKey];
            }
            $arrHttpHeaders[$strHeaderKey] = $mixValue;
        }
        return $arrHttpHeaders;
    }
}
if(!function_exists('getHFStaffDesignation_options')){
	function getHFStaffDesignation_options($fatype=NULL, $desigid=NULL){
		$CI = & get_instance();
		if($fatype=='HOSP'||$fatype=='THQ'||$fatype=='THQH'||$fatype=='THOS'||$fatype=='DHQ'||$fatype=='CH'||$fatype=='OTHER'||$fatype=='DHQH'){
			$query="Select id, shcdescription as designations from hfstaffdesignations order by id";
		}else{
			$query="Select id, phcdescription as designations from hfstaffdesignations where isphc='1' order by id";			
		}
		$moon = '<option value="" >-- Select Designation--</option>';
		$result = $CI -> db ->query($query);
		$result1 = $result->result_array();
		foreach ($result1 as $onefa) { 
			$selected = '';
			if(($desigid > 0)&&($desigid == $onefa["id"]))
			{
				$selected = 'selected="selected"';
			}
			$moon .= '<option value="'.$onefa["id"].'" '.$selected.' >'.$onefa["designations"].'</option>';
		}
			return $output;
	}
}
if(!function_exists('get_HFStaffDesignation_Name')){
	function get_HFStaffDesignation_Name($fatype=NULL, $desigid=NULL){
		$CI = & get_instance();
		if($fatype=='HOSP'||$fatype=='THQ'||$fatype=='THQH'||$fatype=='THOS'||$fatype=='DHQ'||$fatype=='CH'||$fatype=='OTHER'||$fatype=='DHQH'){
			$query="Select shcdescription as designations from hfstaffdesignations where id = ".$desigid;
		}else{
			$query="Select phcdescription as designations from hfstaffdesignations where isphc='1' and id = ".$desigid;
		}
		$result = $CI -> db -> query($query);		
		if ($result->num_rows() > 0)
		{
			return $result -> row()->designations;	
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_District_Population')){
	function get_District_Population($distcode){
		$CI = & get_instance();
		$query 		= "Select population from districts where distcode = '$distcode'";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->population;
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_Facility_Incharge')){
	function get_Facility_Incharge($facode){
		$CI = & get_instance();
		$query 		= "Select incharge from facilities where facode = '$facode'";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->incharge;
		}else{
			return '';	
		}
	}
}
if(!function_exists('get_de_freeze_day')){
	function get_de_freeze_day(){
		$CI = & get_instance();
		$query 		= "Select de_freeze_date from plan_de_settings";
		$result = $CI -> db -> query($query);			
		if ($result->num_rows() > 0)
		{
			return $result -> row()->de_freeze_date;
		}else{
			return '1';	
		}
	}
}
if(!function_exists('get_yn_class')){
	function get_yn_class($val){
		return ($val == 1 || strtolower($val) == 'yes') ? "bgreen" : (($val == 0 || strtolower($val) == 'no') ? "bred" :"");
	}
}
if(!function_exists('get_ci_class')){
	function get_ci_class($val){
		return ucfirst($val) == 'Complete' ? "bgreen" : (ucfirst($val) == 'Incomplete' ? "bred" :"");
	}
}
if(!function_exists('get_ct_class')){
	function get_ct_class($val){
		return ucfirst($val) == 'Timely' ? "bgreen" : (ucfirst($val) == 'Complete' ? "bred" :"");
	}
}
//get Discussion Action class for coloring
if(!function_exists('get_da_class')){
	function get_da_class($val){
		return ucfirst($val) == 'Discussion' ? "bgreen" : (ucfirst($val) == 'Action' ? "bred" :"");
	}
}
//get NOne some All class for coloring
if(!function_exists('get_nsa_class')){
	function get_nsa_class($val){
		return ucfirst($val) == 'All' ? "bgreen" : (ucfirst($val) == 'None' ? "bred" : (ucfirst($val) == 'Some' ? "byellow" : ""));
	}
}
//get Good Poor Fair class for coloring
if(!function_exists('get_gpf_class')){
	function get_gpf_class($val){
		return ucfirst($val) == 'Good' ? "bgreen" : (ucfirst($val) == 'Poor' ? "bred" : (ucfirst($val) == 'Fair' ? "byellow" : ""));
	}
}
//get Good Poor Average class for coloring
if(!function_exists('get_gap_class')){
	function get_gap_class($val){
		return ucfirst($val) == 'Good' ? "bgreen" : (ucfirst($val) == 'Poor' ? "bred" : (ucfirst($val) == 'Average' ? "byellow" : ""));
	}
}
//get Good Poor Average class for coloring on base of 0 1
if(!function_exists('get_ngap_class')){
	function get_ngap_class($val){
		return $val == '1' ? "bgreen" : ($val == '2' ? "bred" : ($val == '0' ? "byellow" : ""));
	}
}
//get Yes No NA class for coloring
if(!function_exists('get_yna_class')){
	function get_yna_class($val){
		return $val == '2' ? "bgreen" : ($val == '1' ? "bred" : ($val == '0' ? "byellow" : ""));
	}
}
//get Good Poor Need Repair class for coloring on base of 0 1
if(!function_exists('get_gpnr_class')){
	function get_gpnr_class($val){
		return $val == '1' ? "bgreen" : ($val == '2' ? "byellow" : ($val == '0' ? "bred" : ""));
	}
}
//get Complete Short Excess class for coloring
if(!function_exists('get_se_class')){
	function get_se_class($val){
		return strtolower($val) == 'excess' ? "bgreen" : (strtolower($val) == 'short' ? "bred" :"");
	}
}
//get some none all class for coloring
if(!function_exists('get_sna_class')){
	function get_sna_class($val){
		return $val == '3' ? "bgreen" : ($val == '1' ? "bred" : ($val == '2' ? "byellow" : ""));
	}
}
// get excellent satisfactory poor class for coloring
if(!function_exists('get_esp_class')){
	function get_esp_class($val){
		return $val == '3' ? "bgreen" : ($val == '2' ? "byellow" : ($val == '1' ? "bred" : ""));
	}
}
// get regular irregular class for coloring
if(!function_exists('get_rir_class')){
	function get_rir_class($val){
		return $val == '0' ? "bgreen" : ($val == '2' ? "byellow" : ($val == '1' ? "bred" : ""));
	}
}
// get monthly quarterly irregular class for coloring
if(!function_exists('get_mqi_class')){
	function get_mqi_class($val){
		return $val == '1' ? "bgreen" : ($val == '2' ? "byellow" : ($val == '3' ? "bred" : ""));
	}
}
//new format will look like "Sep 2019" instead of "2019-09"
if(!function_exists('getNewFMonthFormat')){
	function getNewFMonthFormat($val){
		return date("M Y",strtotime($val));
	}
}
//new format will look like "01 Sep 2019" instead of "01-09-2019"
if(!function_exists('getNewDateFormat')){
	function getNewDateFormat($val){
		return date("d M Y",strtotime($val));
	}
}
// //get Completely Timely class for coloring
// if(!function_exists('get_ct_class')){
// 	function get_ct_class($val){
// 		return ucfirst($val) == 'Timely' ? "bgreen" : (ucfirst($val) == 'Complete' ? "bred" :"");
// 	}
// }
if(!function_exists('get_bcc_add')){
	function get_bcc_add(){
		return 'mata@pace-tech.com';
	}
}
if(!function_exists('send_emails')){
	//function to send email
	function send_emails($to=NULL,$cc=NULL,$subject=NULL,$message=NULL,$from=NULL,$fromName=NULL){
		//$to : an array of email addresses to whome email should be sent
		$CI = & get_instance();		
		$to = ($to)?$to:'mata@pace-tech.com';
		$subject = ($subject)?$subject:'Email From Checklists MIS';
		$message = ($message)?$message:'Email Sent from Checklists project.';
		$from = ($from)?$from:'info@sindhealth.pk';
		$fromName = ($fromName)?$fromName:'Cheklists MIS';
		$CI->load->library('email');
		$CI->email->set_mailtype("html");
		$CI->email->from($from, $fromName);
		$CI->email->to($to);
		if($cc){
			$CI->email->cc($cc);
		}		
		$CI->email->bcc(get_bcc_add());
		$CI->email->subject($subject);
		$CI->email->message($message);
		$CI->email->send(TRUE);
	}
}
if(!function_exists('getregister_options')){
	function getregister_options($isreturn=false,$selectedregister=NULL){
		$CI = & get_instance();		
		$moon = '<option value="" >-- Select Register--</option>';
		$CI -> db -> select("distinct (register) register");
		$CI -> db -> from("da_lqas_pool");
		$registerResult = $CI -> db -> get() -> result_array();
		foreach($registerResult as $key => $val){
			$selected = ($selectedregister==$val["register"])?'selected="selected"':''; 
			$moon .= '<option value="'.$val["register"].'" '.$selected.'>'.$val["register"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getmodule_options')){
	function getmodule_options($isreturn=false,$selectedmodule=NULL){
		$CI = & get_instance();		
		$moon = '<option value="" >Select Module</option>';
		$CI -> db -> select("distinct (module) module");
		$CI -> db -> from("user_transaction_log");
		$moduleResult = $CI -> db -> get() -> result_array();
		foreach($moduleResult as $key => $val){
			$selected = ($selectedmodule==$val["module"])?'selected="selected"':''; 
			$moon .= '<option value="'.$val["module"].'" '.$selected.'>'.$val["module"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getaction_options')){
	function getaction_options($isreturn=false,$selectedaction=NULL){
		$CI = & get_instance();		
		$moon = '<option value="" >Select Action</option>';
		$CI -> db -> select('distinct (action) as action');
		$CI -> db -> from("user_transaction_log");
		$actionResult = $CI -> db -> get() -> result_array();
		foreach($actionResult as $key => $val){
			$selected = ($selectedaction==$val["action"])?'selected="selected"':''; 
			$moon .= '<option value="'.$val["action"].'" '.$selected.'>'.$val["action"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}
if(!function_exists('getusername_options')){
	function getusername_options($isreturn=false,$selectedusername=NULL){
		$CI = & get_instance();		
		$moon = '<option value="" >-- Select Username--</option>';
		$CI -> db -> select("distinct (username) username");
		$CI -> db -> from("user_transaction_log");
		$usernameResult = $CI -> db -> get() -> result_array();
		foreach($usernameResult as $key => $val){
			$selected = ($selectedusername==$val["username"])?'selected="selected"':''; 
			$moon .= '<option value="'.$val["username"].'" '.$selected.'>'.$val["username"].'</option>';
		}
		if($isreturn)
			return $output;
		echo $output;
	}
}