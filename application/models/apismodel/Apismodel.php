<?php
	class Apismodel extends CI_Model {	
			//=============List all records function starts=============//

		public function get_managers_plans($distcode = 0,$fmonth = NULL, $ulevel = NULL, $utype = NULL, $ptype = NULL){
			$wc = array();
			if($ulevel=='3' && $utype=='DEO'){
				//$wc["supervisorid"] = $this -> session -> id;
			}
			if($ulevel=='3' && ($utype=='Manager' || $utype=='Executive')){
				$wc["distcode"] = $distcode;
			}
			if($ulevel=='2'){
				//$wc["procode"] = $this -> session -> procode;
				if($distcode > 0){
					$wc["distcode"] = $distcode;
				}
			}
			if($wc=="")
				redirect(base_url());
			$wc["vph.fmonth"] = $fmonth;
			if($ptype == 'all'){
			}
			else{
				$wc['vph.ptype'] = $ptype;
			}
			$this->db->select('vph.id, vph.supervisor||\' (\'||getdesignation(getdesigid(vph.supervisorid))||\')\' as "Supervisor (Designation)", districtname(vph.distcode) as "District", TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month", programname(vph.ptype) as Program, vph.fieldvisitsplanned as "Total Visits", get_sup_hf_visited_count(vph.supervisorid,\''.$fmonth.'\') as "No of Facilities Visited", get_sup_chklst_count(vph.supervisorid,\''.$fmonth.'\') as "No of Planned Checklists", get_sup_filled_chklst_count(vph.supervisorid,\''.$fmonth.'\') as "No of Filled Checklists", TO_CHAR(vph.plandate,\'DD Mon YYYY\') as "Date", dho_approved_stat(vph.distcode,vph.fmonth) as "DHO Approval Status"', FALSE);
			$this->db->where($wc);
			$this->db->order_by("vph.fmonth","DESC");
			$records = $this->db->get("visit_plan_header vph")->result_array();
			return $records;
		}

			//=============List all records function ends=============//
			
			//=============List all records function starts=============//

		public function get_programs_plans($ptype = 0,$fmonth = NULL, $ulevel = NULL, $utype = NULL){
			$wc = array();
			$wc["vph.fmonth"] = $fmonth;
			$wc['vph.ptype'] = $ptype;
			$this->db->select('vph.id, vph.supervisor, TO_CHAR((vph.fmonth || \'-01\')::Date,\'Mon YYYY\') as "Year-Month", programname(vph.ptype) as Program, vph.fieldvisitsplanned as "Total Visits", TO_CHAR(vph.plandate,\'DD Mon YYYY\') as "Date"', FALSE);
			$this->db->where($wc);
			$this->db->where("vph.distcode IS NULL");
			$this->db->order_by("vph.fmonth","DESC");
			$records = $this->db->get("visit_plan_header vph")->result_array();
			return $records;
		}

			//=============List all records function ends=============//
			
			//=============List all records to get approval from dg function starts=============//
	
		public function get_plans_for_dg_approval($fmonth=NULL, $ulevel = NULL, $utype = NULL, $ptype = NULL){
			if($ptype == 'all'){
				$ptype = '';
			}
			else{
				$ptype = " and b.ptype = '$ptype' ";
			}
			$query = $this->db->query('select distcode as "District Code", case when distcode<>\'all\' then districtname else \'DG Office\' end as "District/Program Name", TO_CHAR((\''.$fmonth.'\' || \'-01\')::Date,\'Mon YYYY\') as "Year-Month" , count(distinct supervisorid) as "No of Supervisor (Have Plan)", count(distinct visitdate) as "No of Days in Plan", count(distinct facode) as "No of HF to be Visited", get_dist_hf_visited_count (distcode,\''.$fmonth.'\') as "No of Facilities Visited", get_dist_chklst_count (distcode,\''.$fmonth.'\') as "No of Planned Checklists", get_dist_filled_chklst_count(distcode,\''.$fmonth.'\') as "No of Filled Checklists", count(distinct vehicleassigned) as "No of Vehicles Assigned", count(distinct driver) as "No of Drivers", (case when distcode=\'all\' or distcode=\'lhw\' or distcode=\'epi\' or distcode=\'mnch\' or distcode=\'nutrition\' or distcode=\'mcp\' or distcode=\'hcp\' or distcode=\'school\' or distcode=\'tbc\' or distcode=\'dengue\' or distcode=\'lhwMnchNutrition\' then dg_approved_stat(distcode,\''.$fmonth.'\') else dho_approved_stat(distcode,\''.$fmonth.'\') end) "DG Approval Status"
			from (select case when b.distcode<>\'\' then b.distcode else b.ptype end as distcode, case when b.distcode<>\'\' then  districtname(b.distcode) else getprogram(b.ptype) end as districtname, a.id, a.facode, a.visitplanid, a.visitdate, b.supervisorid, a.vehicleassigned, a.driver 
			from visit_plan_visits as a 
			inner join visit_plan_header as b on a.visitplanid = b.id 
			inner join designations as c on getdesigid(b.supervisorid) = c.id 
			inner join users as users on users.designation = c.id 
			where b.fmonth = \''.$fmonth.'\' '.$ptype.'  AND "users"."utype" IN(\'ProExecutive\', \'Executive\') AND "users"."level" IN(\'2\', \'3\')
			order by a.facode, c.designation, a.visitdate) as e 
			group by distcode, districtname order by distcode', FALSE);
			$num = $query->num_rows();
			$records = "";
			if($num > 0)
				$records = $query->result_array();
			return $records;
		}

			//=============List all records to get approval from dho function ends=============//

			//=============update record from table function starts=============//
		
		public function update_record($table, $data,$where){
			$this->db->where($where);
			$update=$this->db->update($table,$data);
			return $update;
		}
		
			//=============update record from table function ends===============//
			
			//=============insert record into table function starts===============//
		
		public function insert_record($table, $data){
			$this->db->insert($table,$data);
			return $this->db->insert_id();
		}
	
			//=============insert record into table function ends===============//
	}
?>