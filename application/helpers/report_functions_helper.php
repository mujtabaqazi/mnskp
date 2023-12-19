<?php 
//########## Functions to show different reports tables start##########
if(!function_exists('getDueSubComplianceTable')){
    function getDueSubComplianceTable($allData,$allTotal=NULL,$drilldown=false,$onemonth=NULL){
		$CI = & get_instance();
		$count = 0;
		$extraClass = "";
		$returnData = "<table class=\"table table-striped table-condensed table-bordered table-hover tbl-listing $extraClass\">";
		if(is_array($allData) && (count($allData) > 0))
		{
			foreach($allData as $key => $value)
			{
				if($count == 0)
				{
					$headNames	= array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Total");
					if($onemonth && $onemonth>0){
						$headNames	= array($headNames[$onemonth-1],"Total");
					}
					$returnData .= "<thead>";
					$returnData .= "<tr class=\"tr-h-list-bg\"><th colspan=3></th><th colspan=3>";
					$returnData .= implode("</th><th colspan=3>", array_map('ucwords',array_values($headNames)));
					$returnData .= "</th></tr>";
					$returnData .= "<tr class=\"tr-h-list-bg\"><th>Sr#<th>";
					$counter = 1;
					$returnData .= implode("</th><th>", array_map(function($v)use(&$counter){
							if($counter++ > 2)
								return ucwords(substr($v, 0, -2));
							return ucwords($v);
						},array_keys($value)));
					$returnData .= "</th>";
					$returnData .= "</tr></thead><tbody id=\"tbody\">";
				}       
				$drilldownClass = "";
				if($drilldown)
				{
					$drilldownClass = "DrillDownRow";
				}
				$count++;
				$returnData .= "<tr class=\"$drilldownClass\"><td>$count</td><td>";
				$returnData .= implode("</td><td>",$value);
				$returnData .= "</td>";			
				$returnData .= "</tr>";
			}
		}
		//for last row total
        if($allTotal)
        {
            $endbody ="<tr style='font-weight:bold;'><td colspan=\"3\">Aggregate Total:</td><td>";
            $endbody .= implode("</td><td>",$allTotal);
            $endbody .="</td></tr>";
            $returnData .= $endbody;
        } 
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
		}
		return $returnData .= "</tbody></table>";
	}
}
if(!function_exists('getSupervisorComplianceTable')){
    function getSupervisorComplianceTable($allData,$allTotal=NULL,$drilldown=false,$onemonth=NULL){
		$CI = & get_instance();
		$count = 0;
		$extraClass = "";
		$returnData = "<table class=\"table table-striped table-condensed table-bordered table-hover tbl-listing $extraClass\">";
		if(is_array($allData) && (count($allData) > 0))
		{
			foreach($allData as $key => $value)
			{
				//action linking with id start
				$id = 0;
				if (array_key_exists('id', $value)) {
					$id = $value["id"];
					unset($value["id"]);
				}
				if($count == 0)
				{
					$headNames	= array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Total");
					if($onemonth && $onemonth>0){
						$headNames	= array($headNames[$onemonth-1],"Total");
					}
					$head2Names   = array("Visits","Checklists");
					$returnData .= "<thead>";
					$returnData .= "<tr class=\"tr-h-list-bg\"><th colspan=3></th><th colspan=4>";					
					$returnData .= implode("</th><th colspan=4>", array_map('ucwords',array_values($headNames)));					
					$returnData .= "</th></tr>";
					$returnData .= "<tr class=\"tr-h-list-bg\"><th colspan=3></th>";
					foreach($headNames as $key=>$values){
						$returnData .= "<th colspan=2>";
						$returnData .= implode("</th><th colspan=2>", array_map('ucwords',array_values($head2Names)));
						$returnData .= "</th>";
					}
					$returnData .= "</tr>";
					$returnData .= "<tr class=\"tr-h-list-bg\"><th>Sr#<th>";
					$counter = 1;
					$returnData .= implode("</th><th>", array_map(function($v)use(&$counter){
							if($counter++ > 2)
								return ucwords(substr($v, 0, -5));
							return ucwords($v);
						},array_keys($value)));
					$returnData .= "</th>";
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
				$returnData .= "</tr>";
			}
		}
		//for last row total
        if($allTotal)
        {
            $endbody ="<tr style='font-weight:bold;'><td colspan=\"3\">Aggregate Total:</td><td>";
            $endbody .= implode("</td><td>",$allTotal);
            $endbody .="</td></tr>";
            $returnData .= $endbody;
        } 
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
		}
		return $returnData .= "</tbody></table>";
	}
}
if(!function_exists('getGeneralReportsTable')){
    function getGeneralReportsTable($allData,$allTotal=NULL,$drilldown=false,$onemonth=NULL){
		$CI = & get_instance();
		$count = 0;
		$extraClass = "";
		$returnData = "<table class=\"table table-striped table-condensed table-bordered table-hover tbl-listing $extraClass\">";
		if(is_array($allData) && (count($allData) > 0))
		{
			$allkeys = '';
			foreach($allData as $key => $value)
			{
				//action linking with id start
				$id = 0;
				if (array_key_exists('id', $value)) {
					$id = $value["id"];
					unset($value["id"]);
				}
				if($count == 0)
				{
					//$headNames	= array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec","Total");
					//if($onemonth && $onemonth>0){
						//$headNames	= array($headNames[$onemonth-1],"Total");
					//}
					//$head2Names   = array("Visits","Checklists");
					$returnData .= "<thead>";
					//$returnData .= "<tr class=\"tr-h-list-bg\"><th colspan=3></th><th colspan=4>";					
					//$returnData .= implode("</th><th colspan=4>", array_map('ucwords',array_values($headNames)));					
					//$returnData .= "</th></tr>";
					$returnData .= "<tr class=\"tr-h-list-bg\"><th>Sr#</th><th>";
					//foreach($headNames as $key=>$values){
						//$returnData .= "<th colspan=2>";
						$allkeys = array_keys($value);
						$returnData .= implode("</th><th>", array_map('ucwords',$allkeys));//array_values($head2Names)
						$returnData .= "</th>";
					//}
					//$returnData .= "</tr>";
					//$returnData .= "<tr class=\"tr-h-list-bg\"><th>Sr#<th>";
					//$counter = 1;
					//$returnData .= implode("</th><th>", array_map(function($v)use(&$counter){
					//		if($counter++ > 2)
					//			return ucwords(substr($v, 0, -5));
					//		return ucwords($v);
					//	},array_keys($value)));
					//$returnData .= "</th>";
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
				$returnData .= "</tr>";
			}
		}
		//for last row total
        if($allTotal)
        {
			$endbody ="<tr style='font-weight:bold;'><td colspan=\"3\">Aggregate Total:</td><td>";
			if(is_array($allTotal)){
				//mean last row total calculated from database
				$endbody .= implode("</td><td>",$allTotal);
			}else{
				//mean last row total should be calculated from result set
				$allTotal = array();
				foreach($allkeys as $key => $val)
				{
					if($key>1)
						$allTotal[$val] = array_sum(array_column($allData,$val));
				}
				$endbody .= implode("</td><td>",$allTotal);
			}
            $endbody .="</td></tr>";
            $returnData .= $endbody;
        } 
		if($count == 0)
		{
			$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
		}
		return $returnData .= "</tbody></table>";
	}
}
//########## Functions to show different reports tables end##########
//########## Functions to get due/submitted checklists count start##########
if(!function_exists('countForDueChecklistIn_A_District')){
	function countForDueChecklistIn_A_District($fmonth=NULL,$distcode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($distcode)
			$wc[] = "distcode = '".$distcode."'";
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select count(id) as total from visit_plan_visit_checklists where visitplanvisitsid in 
		(select id from visit_plan_visits where visitplanid in (select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"")."))");
		
		$result = $query -> row();		
		return $result -> total;
	}
}

if(!function_exists('countForDueChecklistIn_A_Facility')){
	function countForDueChecklistIn_A_Facility($fmonth=NULL,$facode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();$wc1 = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($facode)
		{
			$wc[] = "distcode = '".substr($facode,0,3)."'";
			$wc1[] = "facode = '".$facode."'";
		}
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select count(id) as total from visit_plan_visit_checklists where visitplanvisitsid in 
		(select id from visit_plan_visits where ".((!empty($wc1))?(implode(" AND ",$wc1)." AND "):"")."
		visitplanid in (select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"")."))");
		
		$result = $query -> row();		
		return $result -> total;
	}
}

if(!function_exists('countForFilledChecklistIn_A_District')){
	function countForFilledChecklistIn_A_District($fmonth=NULL,$distcode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($distcode)
			$wc[] = "distcode = '".$distcode."'";
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc 
		INNER JOIN checklists on checklists.id = vpvc.checklistid 
		where vpvc.visitplanvisitsid in (select id from visit_plan_visits where visitplanid in 
		(select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"")."))");
		
		$result = $query -> result_array();
		//print_r($result);exit;
		foreach($result as $key => $val){
			$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],"nottempfilled");
			if($filledstats == 'true'){
				$counter++;
			}else{}
		}
		return $counter;
	}
}

if(!function_exists('countForFilledChecklistIn_A_Facility')){
	function countForFilledChecklistIn_A_Facility($fmonth=NULL,$facode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();$wc1 = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($facode)
		{
			$wc[] = "distcode = '".substr($facode,0,3)."'";
			$wc1[] = "facode = '".$facode."'";
		}
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc 
		INNER JOIN checklists on checklists.id = vpvc.checklistid 
		where vpvc.visitplanvisitsid in (select id from visit_plan_visits where ".((!empty($wc1))?(implode(" AND ",$wc1)." AND "):"")."
		visitplanid in (select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"")."))");
		
		$result = $query -> result_array();
		//print_r($result);exit;
		foreach($result as $key => $val){
			$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],"nottempfilled");
			if($filledstats == 'true'){
				$counter++;
			}else{}
		}
		return $counter;
	}
}
//########## Functions to get due/submitted checklists count end##########
//########## Functions to get planned/held visits count start##########
if(!function_exists('countForDueVisitsIn_A_District')){
	function countForDueVisitsIn_A_District($fmonth=NULL,$distcode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($distcode)
			$wc[] = "distcode = '".$distcode."'";
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select count(id) as total from visit_plan_visits where visitplanid in 
		(select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"").")");
		$result = $query -> row();		
		return $result -> total;
	}
}

if(!function_exists('countForDueVisitsIn_A_Facility')){
	function countForDueVisitsIn_A_Facility($fmonth=NULL,$facode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();$wc1 = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($facode)
		{
			$wc[] = "distcode = '".substr($facode,0,3)."'";
			$wc1[] = "facode = '".$facode."'";
		}
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select count(id) as total from visit_plan_visits where ".((!empty($wc1))?(implode(" AND ",$wc1)." AND "):"")."
		visitplanid in (select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"").")");
		$result = $query -> row();		
		return $result -> total;
	}
}

if(!function_exists('countForHeldVisitsIn_A_District')){
	function countForHeldVisitsIn_A_District($fmonth=NULL,$distcode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($distcode)
			$wc[] = "distcode = '".$distcode."'";
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select id from visit_plan_visits where visitplanid in 
		(select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"").")");
		$result1 = $query -> result_array();
		foreach($result1 as $key1 => $val1){
			$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc 
				INNER JOIN checklists on checklists.id = vpvc.checklistid where vpvc.visitplanvisitsid = ".$val1["id"]);
			$result = $query -> result_array();
			$counter1=0;
			foreach($result as $key => $val){
				$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],"nottempfilled");
				if($filledstats == 'true'){
					$counter1++;
				}else{}
			}
			if($counter1>0){
				$counter++;
			}
		}
		return $counter;
	}
}

if(!function_exists('countForHeldVisitsIn_A_Facility')){
	function countForHeldVisitsIn_A_Facility($fmonth=NULL,$facode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$ptype = $CI -> session -> ptype;
		$wc = array();$wc1 = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($facode)
		{
			$wc[] = "distcode = '".substr($facode,0,3)."'";
			$wc1[] = "facode = '".$facode."'";
		}
		if($ptype!='all')
		{
			$wc[] = "ptype = '".$ptype."'";
		}
		$query = $CI -> db -> query("select id from visit_plan_visits where ".((!empty($wc1))?(implode(" AND ",$wc1)." AND "):"")."
		visitplanid in (select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"").")");
		$result1 = $query -> result_array();
		foreach($result1 as $key1 => $val1){
			$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc 
				INNER JOIN checklists on checklists.id = vpvc.checklistid where vpvc.visitplanvisitsid = ".$val1["id"]);
			$result = $query -> result_array();
			$counter1=0;
			foreach($result as $key => $val){
				$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],"nottempfilled");
				if($filledstats == 'true'){
					$counter1++;
				}else{}
			}
			if($counter1>0){
				$counter++;
			}
		}
		return $counter;
	}
}
//########## Functions to get planned/held visits count end##########
//########## Functions to get planned/held visits and due/submitted checklists count for supervisor start##########
if(!function_exists('countForDueChecklistsVisitsOf_A_Supervisor')){
	function countForDueChecklistsVisitsOf_A_Supervisor($fmonth=NULL,$supId=NULL,$ptype=NULL){
		$counter = 0;
		$CI = & get_instance();
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($supId)
			$wc[] = "supervisorid = '".$supId."'";
		if($ptype)
			$wc[] = "ptype = '".$ptype."'";
		$query = $CI -> db -> query("select count(distinct vpv.id) as totalvisits,count(distinct vpvc.id) as totalchecklists from 
		visit_plan_visit_checklists vpvc join visit_plan_visits vpv on vpvc.visitplanvisitsid = vpv.id join visit_plan_header vph 
		on vpv.visitplanid = vph.id ".((!empty($wc))?("where ".implode(" AND ",$wc)):""));
		
		return $result = $query -> row();
	}
}
if(!function_exists('countForSubChecklistsVisitsOf_A_Supervisor')){
	function countForSubChecklistsVisitsOf_A_Supervisor($fmonth=NULL,$supId=NULL,$ptype=NULL){
		$counter = 0;
		$counter2 = 0;
		$CI = & get_instance();
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($supId)
			$wc[] = "supervisorid = '".$supId."'";
		if($ptype)
			$wc[] = "ptype = '".$ptype."'";
		$query = $CI -> db -> query("select id from visit_plan_visits where visitplanid in 
		(select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"").")");
		$result1 = $query -> result_array();
		foreach($result1 as $key1 => $val1){
			$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc 
				INNER JOIN checklists on checklists.id = vpvc.checklistid where vpvc.visitplanvisitsid = ".$val1["id"]);
			$result = $query -> result_array();
			$counter1=0;
			foreach($result as $key => $val){
				$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],"nottempfilled");
				if($filledstats == 'true'){
					$counter1++;$counter2++;
				}else{}
			}
			if($counter1>0){
				$counter++;
			}
		}
		return array("totalvisits"=>$counter,"totalchecklists"=>$counter2);
	}
}
//########## Functions to get planned/held visits and due/submitted checklists count for supervisor end##########
//########## Functions to get planned/held visits and due/submitted checklists count for Program start##########
if(!function_exists('countForDueChecklistsVisitsOf_A_Program')){
	function countForDueChecklistsVisitsOf_A_Program($fmonth=NULL,$ptype=NULL,$distcode=NULL){
		$counter = 0;
		$CI = & get_instance();
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($distcode)
			$wc[] = "distcode = '".$distcode."'";
		if($ptype){
			//if($ptype!='all')
			//{
				$wc[] = "ptype = '".$ptype."'";
			//}
		}
		$query = $CI -> db -> query("select count(distinct vpv.id) as totalvisits,count(distinct vpvc.id) as totalchecklists from 
		visit_plan_visit_checklists vpvc join visit_plan_visits vpv on vpvc.visitplanvisitsid = vpv.id join visit_plan_header vph 
		on vpv.visitplanid = vph.id ".((!empty($wc))?("where ".implode(" AND ",$wc)):""));
		
		return $result = $query -> row();
	}
}
if(!function_exists('countForSubChecklistsVisitsOf_A_Program')){
	function countForSubChecklistsVisitsOf_A_Program($fmonth=NULL,$ptype=NULL,$distcode=NULL){
		$counter = 0;
		$counter2 = 0;
		$CI = & get_instance();
		$wc = array();
		if($fmonth)
			$wc[] = "fmonth = '".$fmonth."'";
		if($distcode)
			$wc[] = "distcode = '".$distcode."'";
		if($ptype){
			//if($ptype!='all')
			//{
				$wc[] = "ptype = '".$ptype."'";
			//}
		}
		$query = $CI -> db -> query("select id from visit_plan_visits where visitplanid in 
		(select id from visit_plan_header ".((!empty($wc))?("where ".implode(" AND ",$wc)):"").")");
		$result1 = $query -> result_array();
		foreach($result1 as $key1 => $val1){
			$query = $CI -> db -> query("select vpvc.id as vpvc_id, tablename from visit_plan_visit_checklists vpvc 
				INNER JOIN checklists on checklists.id = vpvc.checklistid where vpvc.visitplanvisitsid = ".$val1["id"]);
			$result = $query -> result_array();
			$counter1=0;
			foreach($result as $key => $val){
				$filledstats = getChecklstStat($val["tablename"],$val["vpvc_id"],"nottempfilled");
				if($filledstats == 'true'){
					$counter1++;$counter2++;
				}else{}
			}
			if($counter1>0){
				$counter++;
			}
		}
		return array("totalvisits"=>$counter,"totalchecklists"=>$counter2);
	}
}
//########## Functions to get planned/held visits and due/submitted checklists count for Program end##########