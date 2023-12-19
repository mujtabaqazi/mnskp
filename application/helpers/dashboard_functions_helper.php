<?php 
if(!function_exists('getDashboard_Counts')){
	function getUsers_Counts(){
		$CI = & get_instance();
		$ulevel = $CI -> session -> userLevel;
		$utype 	= $CI -> session -> utype;
		$ptype 	= $CI -> session ->ptype;
		$query = "";
		if($ulevel == '2'){
			if($utype == 'Admin'){
				$query = " get_users_count('','','','') as \"Total Users\", get_users_count('2','','','') as \"Provincial Users\", get_users_count('3','','','') as \"District Users\"";
			}else if($utype == 'Executive'){
				$query = " get_users_count('','','','') as \"Total Users\", get_users_count('2','','','') as \"Provincial Users\", get_users_count('3','','','') as \"District Users\"";
			}else if($utype == 'ProExecutive'){
				$query = " get_users_count('','','$ptype','') as \"Total Users\", get_users_count('2','','$ptype','') as \"Provincial Users\", get_users_count('3','','$ptype','') as \"District Users\"";
			}else if($utype == 'Manager'){
				$query = " (pro + dist) as \"Total Users\", pro as \"Provincial Users\", dist as \"District Users\" from( Select get_users_count('2','$utype','$ptype','') as pro, get_users_count('3','','$ptype','') as dist ) as temp";
			}
		}else if($ulevel == '3'){
			$distcode = $CI -> session -> distcode;
			if($utype == 'Executive'){
				$query = " total as \"Total Users\", (total - sup) as \"District M&E Cell Users\", sup as \"Program Supervisors\" from (Select get_users_count('3','','','$distcode') as total, get_users_count('3','DEO','','$distcode') as sup) as temp";
			}else if($utype == 'Manager'){
			}else if($utype == 'DEO'){
			}
		}
		$resultDist = "";
		if($query != ""){
			$query = "Select ".$query;
			$resultData = $CI -> db ->query($query);
			$resultDist = $resultData->row_array();
		}
		return $resultDist;
	}
}
if(!function_exists('getSupervisors_having_plan_Count')){
	function getSupervisors_having_plan_Count(){
		$CI = & get_instance();
		$ulevel = $CI -> session -> userLevel;
		$utype 	= $CI -> session -> utype;
		$ptype 	= $CI -> session ->ptype;
		$query = "";
		if($ulevel == '2'){
			if($utype == 'Admin'){
				$query = " get_users_count('','','','') as total, get_users_count('2','','','') as province, get_users_count('3','','','') as districts";
			}else if($utype == 'Executive'){
				$query = " get_users_count('','','','') as total, get_users_count('2','','','') as province, get_users_count('3','','','') as districts";
			}else if($utype == 'ProExecutive'){
				$query = " get_users_count('2','','$ptype','') as province, get_users_count('3','','$ptype','') as districts";
			}else if($utype == 'Manager'){
				$query = " get_users_count('2','$utype','$ptype','') as province, get_users_count('3','','$ptype','') as districts";
			}
		}else if($ulevel == '3'){
			if($utype == 'Executive'){
			}else if($utype == 'Manager'){
			}else if($utype == 'DEO'){
			}
		}
		$resultDist = "";
		if($query != ""){
			$query = "Select ".$query;
			$resultData = $CI -> db ->query($query);
			$resultDist = $resultData->row_array();
		}
		return $resultDist;
	}
}
function checkUsersRoles(){
	$CI = & get_instance();
	$ulevel = $CI -> session -> userLevel;
	$utype 	= $CI -> session -> utype;
	$ptype 	= $CI -> session ->ptype;
	if($ulevel == '2'){
		if($utype == 'Admin'){
		}else if($utype == 'Executive'){
		}else if($utype == 'ProExecutive'){
		}else if($utype == 'Manager'){
		}
	}else if($ulevel == '3'){
		if($utype == 'Executive'){
		}else if($utype == 'Manager'){
		}else if($utype == 'DEO'){
		}
	}
}
//function for php 5.5 or lesser.
if(!function_exists("array_column"))
{
	function array_column($array,$column_name)
	{
		return array_map(function($element) use($column_name){return $element[$column_name];}, $array);
	}
}
	