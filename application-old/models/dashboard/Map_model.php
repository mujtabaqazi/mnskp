<?php
class Map_model extends CI_Model {
//=============List all records function starts=============//
public function get_markers_data($fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "vph.id > 0 and visit_confirmed = '1' ";
if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}

if($ulevel=='3' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
}else{
if($distcode===0){
$wc .= " and vph.distcode IS NULL ";
}else{
$distcode = ($distcode>0)?$distcode:$this -> session -> distcode;
$wc .= " and vph.distcode = '$distcode'";
}
if($ulevel=='3' && $utype=='DEO')
{
$wc .= " and vph.supervisorid = '".$this -> session -> id."'";
}
if($ptype!='all'){
$wc .= " and vph.ptype = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
}
$this->db->select("
vpv.facode,
facilityname(facode) as facility,
getuserfullname(vph.supervisorid)|| '(' || getdesigdisplayname(vph.supervisorid) || ')' as supervisor,
vpv.visitdate,
vpv.latitude,
vpv.longitude,
vpv.date_confirmed,
vpv.time_confirmed,
vpv.picture from visit_plan_visits as vpv
inner join visit_plan_header as vph on vpv.visitplanid=vph.id
where ".$wc,FALSE);
$records = $this->db->get()->result_array();
return $records;
}
//=============List all records function ends=============//
} //class ends
?>