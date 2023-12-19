<?php 
class Checklists_model extends CI_Model {	
	//=============List all records function starts=============//
	public function filled_chklsts_status($distcode = 0,$monthfrom=0 /* $year = 0 */,$monthto=0 /* $month = 0 */)
	{
		$ulevel = $this -> session -> userLevel;
		$utype 	= $this -> session -> utype;
		$ptype 	= $this -> session -> ptype;
		$wc = "";$wthis = "";
		if($ulevel=='3' && $utype=='DEO')
		{
			$wc[] = "vph.supervisorid = \'".$this -> session -> id."\'";
			$wcmoon[] = "vph.supervisorid = '".$this -> session -> id."'";
			//$wc["vph.supervisorid"] = $this -> session -> id;
		}
		if($ulevel=='3' && ($utype=='Manager' || $utype=='Executive'))
		{
			$wc[] = "vph.distcode = \'".$this -> session -> distcode."\'";
			$wcmoon[] = "vph.distcode = '".$this -> session -> distcode."'";
			//$wc["vph.distcode"] = $this -> session -> distcode;
		}
		if($ulevel=='2')
		{
			$wc[] = "vph.procode = \'".$this -> session -> procode."\'";
			$wcmoon[] = "vph.procode = '".$this -> session -> procode."'";
			//$wc["vph.procode"] = $this -> session -> procode;
			if($distcode > 0)
			{
				$wc[] = "vph.distcode = \'".$distcode."\'";
				$wcmoon[] = "vph.distcode = '".$distcode."'";
				//$wc["vph.distcode"] = $distcode;
			}
		}
		if($wc=="")
			redirect(base_url());
		if($monthfrom > 0)
		{
			if($monthto > 0)
			{
				$wc[] = " ( vph.fmonth >= \'".$monthfrom."\' and vph.fmonth <= \'".$monthto."\')";
				$wcmoon[] = " ( vph.fmonth >= '".$monthfrom."' and vph.fmonth <= '".$monthto."') ";
			}else{
				$wc[] = "vph.fmonth = \'".$monthfrom."\'";
				$wcmoon[] = "vph.fmonth = '".$monthfrom."'";
			}
		}
		/* if($year > 0)
		{
			if($month > 0)
			{
				$wc[] = "vph.fmonth = \'".$year."-".$month."\'";
				$wcmoon[] = "vph.fmonth = '".$year."-".$month."'";
			}else{
				$wc[] = "vph.fmonth like \'$year-%\'";
				$wcmoon[] = "vph.fmonth like '$year-%'";
			}
		}	 */	
		$wc1 = implode(" AND ",$wc);
		if($ptype == 'all'){
		}else{
			$wthis['ptype'] = $ptype;
		}
		$this->db->select("
			id,
			name as \"Checklist Name\",
			case when ptype = 'all' then 'All Program' ELSE getprogram(ptype) END as program,
			(select count(vpvc.id) from visit_plan_visit_checklists vpvc join visit_plan_visits vpv on vpv.id = vpvc.visitplanvisitsid join visit_plan_header vph on vph.id = vpv.visitplanid where vpvc.checklistid = checklists.id AND ".implode(" AND ",$wcmoon).") as \"Total Planned\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'','$wc1') as \"Total Filled\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'lhw','$wc1') as \"LHW\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'epi','$wc1') as \"EPI\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'hcp','$wc1') as \"Hepatitis\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'mnch','$wc1') as \"MNCH\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'tbc','$wc1') as \"TB\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'nutrition','$wc1') as \"Nutrition\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'mcp','$wc1') as \"Malaria\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'dengue','$wc1') as \"Dengue\",
			checklist_wise_filled_count(checklists.tablename,checklists.id,'all','$wc1') as \"DHIS & MNE\"
			from checklists"
		, FALSE);
		//$this->db->where($wc);
		if(!(empty($wthis)))
			$this->db->where($wthis);
		//$this->db->order_by("program","ASC");
		//$this->db->order_by("name","ASC");
		$this->db->order_by("id","ASC");
		$records = $this->db->get()->result_array();
		return $records;
	}
	//=============List all records function ends=============//
	/*
	case when ptype = 'all' then 'All Program' ELSE getprogram(ptype) END as program,
	checklist_wise_filled_count(checklists.tablename,checklists.id,1,'$wc1') as \"DHO\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,10,'$wc1') as \"M&E Staff\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,11,'$wc1') as \"DPIU Staff\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,2,'$wc1') as \"Health Facility\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,4,'$wc1') as \"LHW\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,5,'$wc1') as \"CMW\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,3,'$wc1') as \"LHS\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,8,'$wc1') as \"CMW School\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,9,'$wc1') as \"LHW Trainer\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,7,'$wc1') as \"LHV\",
	checklist_wise_filled_count(checklists.tablename,checklists.id,6,'$wc1') as \"WMO\"
	*/
} //class ends
?>