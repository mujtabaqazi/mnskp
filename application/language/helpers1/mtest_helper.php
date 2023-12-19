<?php 
	function getchlistdetails($vpvcid=NULL){
			$CI = & get_instance();

		$CI -> db ->select("vph.fmonth, vph.id as planid, vph.supervisorid as supervisorid, vph.supervisor, vph.ptype, programname(vph.ptype) as program,  getdesigid(vph.supervisorid) as designationid, getdesigdisplayname(vph.supervisorid) as designation, vph.date_submitted, vpv.facode, facilityname(vpv.facode) as facility, vpv.visitdate, coalesce(vpv.vehicleassigned,'') as vehicle, coalesce(vpv.driver,'') as driver, vpv.visitcategory, vpvc.id as vpvcid, vpvc.checklistid, checklistname(vpvc.checklistid) as checklist, coalesce(gethcptype(vpvc.hcptype_id),'') as hcptype, coalesce((case when gethcptype(vpvc.hcptype_id)='' then '' when gethcptype(vpvc.hcptype_id)='name' then vpvc.hcp_value when gethcptype(vpvc.hcptype_id)='LHW' then lhwname(vpvc.hcp_value) when gethcptype(vpvc.hcptype_id)='LHS' then lhsname(vpvc.hcp_value) when gethcptype(vpvc.hcptype_id)='CMW' then cmwname(vpvc.hcp_value) end),'') as hcpvalue");
			$CI -> db ->from("visit_plan_header as vph");
		$CI -> db ->join("visit_plan_visits as vpv","vph.id = vpv.visitplanid");
		$CI -> db ->join("visit_plan_visit_checklists as vpvc","vpv.id = vpvc.visitplanvisitsid");
		$CI -> db ->where("vpvc.id = ".$vpvcid);
		$result = $CI -> db ->get()->row_array();
		return $result;
	}

