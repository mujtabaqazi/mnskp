<?php 
if(!function_exists('gettarget_cmws')){
	function gettarget_cmws($facode)
	{
		$CI = & get_instance();
		$userId = $CI -> session -> id;
		if (($userId > 0) && ($CI -> session -> userLevel > 0)){
			if($facode > 0){
				//validation mechanism
				$random = rand(0,99999999).date("Y").date("m");
				$validationcode = md5('m&s'.date("Y-m-d").'to'.$random.'mnch');
				$data = array('hackerinfo' => $validationcode, 'code' => $random, 'facode' => $facode);
				//post data mechanism
				$fields_string = "";
				foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				$fields_string = rtrim($fields_string, '&');
				//url to post
				$url = MNCH_BASE_URL."communication/getcmws.php";
				//curl options
			    $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//FALSE				
				curl_setopt($ch,CURLOPT_POST, count($data));//posting data
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				$head = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);				
				curl_close($ch);
				//workout for data in response
				$userData = json_decode($head, true);
				if(isset($userData["tableData"])){
					return $userData["tableData"];
				}else{
					return array();
				}
			}else{
				return array();
			}
		}else{
			echo "Not Logged In.";
		}
	}
}
if(!function_exists('gettarget_lhws')){
	function gettarget_lhws($facode)
	{
		$CI = & get_instance();
		$userId = $CI -> session -> id;
		if (($userId > 0) && ($CI -> session -> userLevel > 0)){
			if($facode > 0){
				//validation mechanism
				$random = rand(0,99999999).date("Y").date("m");
				$validationcode = md5('m&s'.date("Y-m-d").'to'.$random.'lhwmis');
				$data = array('hackerinfo' => $validationcode, 'code' => $random, 'facode' => $facode);
				//post data mechanism
				$fields_string = "";
				foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				$fields_string = rtrim($fields_string, '&');
				//url to post
				$url = LHW_BASE_URL."communication/getlhws";
				//curl options
			    $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//FALSE				
				curl_setopt($ch,CURLOPT_POST, count($data));//posting data
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				$head = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);				
				curl_close($ch);
				//workout for data in response
				$userData = json_decode($head, true);
				if(isset($userData["tableData"])){
					return $userData["tableData"];
				}else{
					return array();
				}
			}else{
				return array();
			}
		}else{
			echo "Not Logged In.";
		}
	}
}
if(!function_exists('gettarget_lhs')){
	function gettarget_lhs($facode)
	{
		$CI = & get_instance();
		$userId = $CI -> session -> id;
		if (($userId > 0) && ($CI -> session -> userLevel > 0)){
			if($facode > 0){
				//validation mechanism
				$random = rand(0,99999999).date("Y").date("m");
				$validationcode = md5('m&s'.date("Y-m-d").'to'.$random.'lhwmis');
				$data = array('hackerinfo' => $validationcode, 'code' => $random, 'facode' => $facode);
				//post data mechanism
				$fields_string = "";
				foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				$fields_string = rtrim($fields_string, '&');
				//url to post
				$url = LHW_BASE_URL."communication/getlhs";
				//curl options
			    $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//FALSE				
				curl_setopt($ch,CURLOPT_POST, count($data));//posting data
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				$head = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);				
				curl_close($ch);
				//workout for data in response
				$userData = json_decode($head, true);
				if(isset($userData["tableData"])){
					return $userData["tableData"];
				}else{
					return array();
				}
			}else{
				return array();
			}
		}else{
			echo "Not Logged In.";
		}
	}
}
if(!function_exists('get_lqas_de_mis_values')){
	function get_lqas_de_mis_values($fmonth,$prgrmtype,$code,$fields)
	{
		$CI = & get_instance();
		$userId = $CI -> session -> id;
		if (($userId > 0) && ($CI -> session -> userLevel > 0)){
			//url to post
			switch($prgrmtype){
				case "all":
					$url = DHIS_BASE_URL."communication/get_custom_fields.php";
					$name = "facode";$mis = "dhis";
					break;
				case "lhw":
					$url = LHW_BASE_URL."communication/get_custom_fields";
					$name = "lhwcode";$mis = "lhwmis";
					break;
				case "mnch":
					$url = MNCH_BASE_URL."communication/get_custom_fields.php";
					$name = "cmwcode";$mis = "mnch";
					break;
				default:
					$url = "";
					$name = "";
					break;
			}
			if($url != ""){
				//validation mechanism
				$random = rand(0,99999999).date("Y").date("m");
				$validationcode = md5('m&s'.date("Y-m-d").'to'.$random.$mis);
				$data = array('hackerinfo' => $validationcode, 'code' => $random, 'fmonth' => $fmonth, $name => $code, 'fields' => $fields);
				//post data mechanism
				//print_r($data);
				$fields_string = "";
				foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				$fields_string = rtrim($fields_string, '&');
				//curl options
			    $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//FALSE				
				curl_setopt($ch,CURLOPT_POST, count($data));//posting data
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				curl_setopt($ch, CURLOPT_VERBOSE, true);
				$head = curl_exec($ch);
				//print_r($head);

				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);				
				curl_close($ch);
				//workout for data in response
				$userData = json_decode($head, true);
				//print_r($userData);
				if(isset($userData["info"]) || isset($userData["error"])){
					return array();
				}else{
					return $userData["tableData"][0];
				}
			}else{
				return array();
			}
		}else{
			echo "Not Logged In.";
		}
	}
}
if(!function_exists('send_lqas_held_values')){
	function send_lqas_held_values($prgrmtype,$fmonth,$code,$fields)
	{
		$CI = & get_instance();
		$userId = $CI -> session -> id;
		if (($userId > 0) && ($CI -> session -> userLevel > 0)){
			//url to post
			switch($prgrmtype){
				case "all":
					$url = DHIS_BASE_URL."communication/get_custom_fields.php";
					$name = "facode";$mis = "dhis";
					break;
				case "lhw":
					$url = LHW_BASE_URL."communication/get_custom_fields";
					$name = "lhwcode";$mis = "lhwmis";
					break;
				case "mnch":
					$url = MNCH_BASE_URL."communication/get_custom_fields.php";
					$name = "cmwcode";$mis = "mnch";
					break;
				default:
					$url = "";
					$name = "";
					break;
			}			
			if($url != ""){
				//validation mechanism
				$random = rand(0,99999999).date("Y").date("m");
				$validationcode = md5('m&s'.date("Y-m-d").'to'.$random.$mis);
				$data = array('hackerinfo' => $validationcode, 'code' => $random, 'fmonth' => $fmonth, $name => $code, 'fields' => $fields);
				//post data mechanism
				$fields_string = "";
				foreach($data as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
				$fields_string = rtrim($fields_string, '&');
				//curl options
			    $ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);//FALSE				
				curl_setopt($ch,CURLOPT_POST, count($data));//posting data
				curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
				$head = curl_exec($ch);
				$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);				
				curl_close($ch);
				//workout for data in response
				$userData = json_decode($head, true);
				if(isset($userData["info"]) || isset($userData["error"])){
					return array();
				}else{
					return $userData["tableData"][0];
				}
			}else{
				return array();
			}
		}else{
			echo "Not Logged In.";
		}
	}
}
if(!function_exists('getquaterWisefmonth')){
	function getquaterWisefmonth($parmq,$yfirst,$ysecond){
		switch($parmq){
			case "1" :
				$startmonth ="07";
				$endmonth ="09";
				return $fmonth ='( fmonth >= \''.$yfirst.'-'.$startmonth.'\' and fmonth <= \''.$yfirst.'-'.$endmonth.'\' )';
				break;
			case "2" :
				$startmonth ="10";
				$endmonth ="12";
				return $fmonth ='( fmonth >= \''.$yfirst.'-'.$startmonth.'\' and fmonth <= \''.$yfirst.'-'.$endmonth.'\' )';
				break;
			case "3" :
				$startmonth ="01";
				$endmonth ="03";
				return $fmonth ='( fmonth >= \''.$ysecond.'-'.$startmonth.'\' and fmonth <= \''.$ysecond.'-'.$endmonth.'\' )';
				break;
			case "4" :
				$startmonth ="04";
				$endmonth ="06";
				return $fmonth ='( fmonth >= \''.$ysecond.'-'.$startmonth.'\' and fmonth <= \''.$ysecond.'-'.$endmonth.'\' ) ';
				break;
		}
		return $fmonth;
	}
}