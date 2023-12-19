<?php
class Checklists_model extends CI_Model {
public function get_imc_gois_data($fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "vph.id > 0 and vpvc.checklistid = 31 ";
if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}
$columnstofetch = "count(vpvc.id) as planned,
count(imc_gois.id) as filled,

sum(Coalesce(sign_board,'0')::int) as sign_board,
sum(Coalesce(sign_plates,'0')::int) as sign_plates,
sum(Coalesce(education_material,'0')::int) as education_material,
sum(Coalesce(dhis_tools,'0')::int) as dhis_tools,
sum(Coalesce(opd_reg_desk,'0')::int) as opd_reg_desk,
sum(Coalesce(furniture,'0')::int) as furniture,
sum(Coalesce(water,'0')::int) as water,
sum(Coalesce(toilets,'0')::int) as toilets,
sum(Coalesce(waste_mang,'0')::int) as waste_mang,

sum( case when ((Coalesce(sign_board,'0')::float+Coalesce(sign_plates,'0')::float+Coalesce(education_material,'0')::float+Coalesce(dhis_tools,'0')::float+Coalesce(opd_reg_desk,'0')::float+Coalesce(furniture,'0')::float+Coalesce(water,'0')::float+Coalesce(toilets,'0')::float+Coalesce(waste_mang,'0')::float)/9)*100 BETWEEN 80 AND 100 then 1 else 0 end) as gogreater80,
sum( case when ((Coalesce(sign_board,'0')::float+Coalesce(sign_plates,'0')::float+Coalesce(education_material,'0')::float+Coalesce(dhis_tools,'0')::float+Coalesce(opd_reg_desk,'0')::float+Coalesce(furniture,'0')::float+Coalesce(water,'0')::float+Coalesce(toilets,'0')::float+Coalesce(waste_mang,'0')::float)/9)*100 BETWEEN 60 AND 80 then 1 else 0 end) as gogreater60,
sum( case when ((Coalesce(sign_board,'0')::float+Coalesce(sign_plates,'0')::float+Coalesce(education_material,'0')::float+Coalesce(dhis_tools,'0')::float+Coalesce(opd_reg_desk,'0')::float+Coalesce(furniture,'0')::float+Coalesce(water,'0')::float+Coalesce(toilets,'0')::float+Coalesce(waste_mang,'0')::float)/9)*100 BETWEEN 40 AND 60 then 1 else 0 end) as gogreater40,
sum( case when ((Coalesce(sign_board,'0')::float+Coalesce(sign_plates,'0')::float+Coalesce(education_material,'0')::float+Coalesce(dhis_tools,'0')::float+Coalesce(opd_reg_desk,'0')::float+Coalesce(furniture,'0')::float+Coalesce(water,'0')::float+Coalesce(toilets,'0')::float+Coalesce(waste_mang,'0')::float)/9)*100 BETWEEN 20 AND 40 then 1 else 0 end) as gogreater20,
sum( case when ((Coalesce(sign_board,'0')::float+Coalesce(sign_plates,'0')::float+Coalesce(education_material,'0')::float+Coalesce(dhis_tools,'0')::float+Coalesce(opd_reg_desk,'0')::float+Coalesce(furniture,'0')::float+Coalesce(water,'0')::float+Coalesce(toilets,'0')::float+Coalesce(waste_mang,'0')::float)/9)*100 BETWEEN 0 AND 20 then 1 else 0 end) as gogreater0,

sum(Coalesce(dhis_mr_stat,'0')::int) as dhis_mr_stat,
sum(Coalesce(last_month_dhis_mr,'0')::int) as last_month_dhis_mr,
sum(Coalesce(building,'0')::int) as building,
sum(Coalesce(cleanliness,'0')::int) as cleanliness,
sum(Coalesce(waiting_area,'0')::int) as waiting_area,
sum(Coalesce(insecticides,'0')::int) as insecticides,
sum(Coalesce(fumigation,'0')::int) as fumigation,

sum(Coalesce(or_r1_f1,'0')::int) as or_r1_f1,
sum(Coalesce(or_r1_f2,'0')::int) as or_r1_f2,
sum(Coalesce(or_r2_f1,'0')::int) as or_r2_f1,
sum(Coalesce(or_r2_f2,'0')::int) as or_r2_f2,
sum(Coalesce(or_r3_f1,'0')::int) as or_r3_f1,
sum(Coalesce(or_r3_f2,'0')::int) as or_r3_f2,
sum(Coalesce(or_r4_f1,'0')::int) as or_r4_f1,
sum(Coalesce(or_r4_f2,'0')::int) as or_r4_f2,
sum(Coalesce(c_r1_f1,'0')::int) as c_r1_f1,
sum(Coalesce(c_r1_f2,'0')::int) as c_r1_f2,
sum(Coalesce(c_r2_f1,'0')::int) as c_r2_f1,
sum(Coalesce(c_r2_f2,'0')::int) as c_r2_f2,
sum(Coalesce(c_r3_f1,'0')::int) as c_r3_f1,
sum(Coalesce(c_r3_f2,'0')::int) as c_r3_f2,
sum(Coalesce(c_r4_f1,'0')::int) as c_r4_f1,
sum(Coalesce(c_r4_f2,'0')::int) as c_r4_f2,
sum(Coalesce(c_r5_f1,'0')::int) as c_r5_f1,
sum(Coalesce(c_r5_f2,'0')::int) as c_r5_f2,
sum(Coalesce(c_r6_f1,'0')::int) as c_r6_f1,
sum(Coalesce(c_r6_f2,'0')::int) as c_r6_f2,

sum( case when ((Coalesce(or_r1_f1,'0')::float+Coalesce(or_r2_f1,'0')::float+Coalesce(or_r3_f1,'0')::float+Coalesce(or_r4_f1,'0')::float+Coalesce(c_r1_f1,'0')::float+Coalesce(c_r2_f1,'0')::float+Coalesce(c_r3_f1,'0')::float+Coalesce(c_r4_f1,'0')::float+Coalesce(c_r5_f1,'0')::float+Coalesce(c_r6_f1,'0')::float)/10)*100 BETWEEN 80 AND 100 then 1 else 0 end) as rcagreater80,
sum( case when ((Coalesce(or_r1_f1,'0')::float+Coalesce(or_r2_f1,'0')::float+Coalesce(or_r3_f1,'0')::float+Coalesce(or_r4_f1,'0')::float+Coalesce(c_r1_f1,'0')::float+Coalesce(c_r2_f1,'0')::float+Coalesce(c_r3_f1,'0')::float+Coalesce(c_r4_f1,'0')::float+Coalesce(c_r5_f1,'0')::float+Coalesce(c_r6_f1,'0')::float)/10)*100 BETWEEN 60 AND 80 then 1 else 0 end) as rcagreater60,
sum( case when ((Coalesce(or_r1_f1,'0')::float+Coalesce(or_r2_f1,'0')::float+Coalesce(or_r3_f1,'0')::float+Coalesce(or_r4_f1,'0')::float+Coalesce(c_r1_f1,'0')::float+Coalesce(c_r2_f1,'0')::float+Coalesce(c_r3_f1,'0')::float+Coalesce(c_r4_f1,'0')::float+Coalesce(c_r5_f1,'0')::float+Coalesce(c_r6_f1,'0')::float)/10)*100 BETWEEN 40 AND 60 then 1 else 0 end) as rcagreater40,
sum( case when ((Coalesce(or_r1_f1,'0')::float+Coalesce(or_r2_f1,'0')::float+Coalesce(or_r3_f1,'0')::float+Coalesce(or_r4_f1,'0')::float+Coalesce(c_r1_f1,'0')::float+Coalesce(c_r2_f1,'0')::float+Coalesce(c_r3_f1,'0')::float+Coalesce(c_r4_f1,'0')::float+Coalesce(c_r5_f1,'0')::float+Coalesce(c_r6_f1,'0')::float)/10)*100 BETWEEN 20 AND 40 then 1 else 0 end) as rcagreater20,
sum( case when ((Coalesce(or_r1_f1,'0')::float+Coalesce(or_r2_f1,'0')::float+Coalesce(or_r3_f1,'0')::float+Coalesce(or_r4_f1,'0')::float+Coalesce(c_r1_f1,'0')::float+Coalesce(c_r2_f1,'0')::float+Coalesce(c_r3_f1,'0')::float+Coalesce(c_r4_f1,'0')::float+Coalesce(c_r5_f1,'0')::float+Coalesce(c_r6_f1,'0')::float)/10)*100 BETWEEN 0 AND 20 then 1 else 0 end) as rcagreater0,

sum( case when ((Coalesce(or_r1_f2,'0')::float+Coalesce(or_r2_f2,'0')::float+Coalesce(or_r3_f2,'0')::float+Coalesce(or_r4_f2,'0')::float+Coalesce(c_r1_f2,'0')::float+Coalesce(c_r2_f2,'0')::float+Coalesce(c_r3_f2,'0')::float+Coalesce(c_r4_f2,'0')::float+Coalesce(c_r5_f2,'0')::float+Coalesce(c_r6_f2,'0')::float)/10)*100 BETWEEN 80 AND 100 then 1 else 0 end) as rcfgreater80,
sum( case when ((Coalesce(or_r1_f2,'0')::float+Coalesce(or_r2_f2,'0')::float+Coalesce(or_r3_f2,'0')::float+Coalesce(or_r4_f2,'0')::float+Coalesce(c_r1_f2,'0')::float+Coalesce(c_r2_f2,'0')::float+Coalesce(c_r3_f2,'0')::float+Coalesce(c_r4_f2,'0')::float+Coalesce(c_r5_f2,'0')::float+Coalesce(c_r6_f2,'0')::float)/10)*100 BETWEEN 60 AND 80 then 1 else 0 end) as rcfgreater60,
sum( case when ((Coalesce(or_r1_f2,'0')::float+Coalesce(or_r2_f2,'0')::float+Coalesce(or_r3_f2,'0')::float+Coalesce(or_r4_f2,'0')::float+Coalesce(c_r1_f2,'0')::float+Coalesce(c_r2_f2,'0')::float+Coalesce(c_r3_f2,'0')::float+Coalesce(c_r4_f2,'0')::float+Coalesce(c_r5_f2,'0')::float+Coalesce(c_r6_f2,'0')::float)/10)*100 BETWEEN 40 AND 60 then 1 else 0 end) as rcfgreater40,
sum( case when ((Coalesce(or_r1_f2,'0')::float+Coalesce(or_r2_f2,'0')::float+Coalesce(or_r3_f2,'0')::float+Coalesce(or_r4_f2,'0')::float+Coalesce(c_r1_f2,'0')::float+Coalesce(c_r2_f2,'0')::float+Coalesce(c_r3_f2,'0')::float+Coalesce(c_r4_f2,'0')::float+Coalesce(c_r5_f2,'0')::float+Coalesce(c_r6_f2,'0')::float)/10)*100 BETWEEN 20 AND 40 then 1 else 0 end) as rcfgreater20,
sum( case when ((Coalesce(or_r1_f2,'0')::float+Coalesce(or_r2_f2,'0')::float+Coalesce(or_r3_f2,'0')::float+Coalesce(or_r4_f2,'0')::float+Coalesce(c_r1_f2,'0')::float+Coalesce(c_r2_f2,'0')::float+Coalesce(c_r3_f2,'0')::float+Coalesce(c_r4_f2,'0')::float+Coalesce(c_r5_f2,'0')::float+Coalesce(c_r6_f2,'0')::float)/10)*100 BETWEEN 0 AND 20 then 1 else 0 end) as rcfgreater0,

sum(Coalesce(mia_r1_f1,'0')::int) as mia_r1_f1,
sum(Coalesce(mia_r1_f2,'0')::int) as mia_r1_f2,
sum(Coalesce(mia_r1_f3,'0')::int) as mia_r1_f3,
sum(Coalesce(mia_r1_f4,'0')::int) as mia_r1_f4,
sum(Coalesce(mia_r1_f5,'0')::int) as mia_r1_f5,
sum(Coalesce(mia_r1_f6,'0')::int) as mia_r1_f6,
sum(Coalesce(mia_r1_f7,'0')::int) as mia_r1_f7,

sum( case when ((Coalesce(mia_r1_f1,'0')::float+Coalesce(mia_r1_f2,'0')::float+Coalesce(mia_r1_f3,'0')::float+Coalesce(mia_r1_f4,'0')::float+Coalesce(mia_r1_f5,'0')::float+Coalesce(mia_r1_f6,'0')::float+Coalesce(mia_r1_f7,'0')::float)/7)*100 BETWEEN 80 AND 100 then 1 else 0 end) as migreater80,
sum( case when ((Coalesce(mia_r1_f1,'0')::float+Coalesce(mia_r1_f2,'0')::float+Coalesce(mia_r1_f3,'0')::float+Coalesce(mia_r1_f4,'0')::float+Coalesce(mia_r1_f5,'0')::float+Coalesce(mia_r1_f6,'0')::float+Coalesce(mia_r1_f7,'0')::float)/7)*100 BETWEEN 60 AND 80 then 1 else 0 end) as migreater60,
sum( case when ((Coalesce(mia_r1_f1,'0')::float+Coalesce(mia_r1_f2,'0')::float+Coalesce(mia_r1_f3,'0')::float+Coalesce(mia_r1_f4,'0')::float+Coalesce(mia_r1_f5,'0')::float+Coalesce(mia_r1_f6,'0')::float+Coalesce(mia_r1_f7,'0')::float)/7)*100 BETWEEN 40 AND 60 then 1 else 0 end) as migreater40,
sum( case when ((Coalesce(mia_r1_f1,'0')::float+Coalesce(mia_r1_f2,'0')::float+Coalesce(mia_r1_f3,'0')::float+Coalesce(mia_r1_f4,'0')::float+Coalesce(mia_r1_f5,'0')::float+Coalesce(mia_r1_f6,'0')::float+Coalesce(mia_r1_f7,'0')::float)/7)*100 BETWEEN 20 AND 40 then 1 else 0 end) as migreater20,
sum( case when ((Coalesce(mia_r1_f1,'0')::float+Coalesce(mia_r1_f2,'0')::float+Coalesce(mia_r1_f3,'0')::float+Coalesce(mia_r1_f4,'0')::float+Coalesce(mia_r1_f5,'0')::float+Coalesce(mia_r1_f6,'0')::float+Coalesce(mia_r1_f7,'0')::float)/7)*100 BETWEEN 0 AND 20 then 1 else 0 end) as migreater0,

sum(Coalesce(gs_r1_f1,'0')::int) as gs_r1_f1,
sum(Coalesce(gs_r1_f2,'0')::int) as gs_r1_f2,
sum(Coalesce(gs_r1_f3,'0')::int) as gs_r1_f3,
sum(Coalesce(gs_r1_f4,'0')::int) as gs_r1_f4,
sum(Coalesce(gs_r1_f5,'0')::int) as gs_r1_f5,
sum(Coalesce(gs_r1_f6,'0')::int) as gs_r1_f6,
sum(Coalesce(gs_r1_f7,'0')::int) as gs_r1_f7,

sum( case when ((Coalesce(gs_r1_f1,'0')::float+Coalesce(gs_r1_f2,'0')::float+Coalesce(gs_r1_f3,'0')::float+Coalesce(gs_r1_f4,'0')::float+Coalesce(gs_r1_f5,'0')::float+Coalesce(gs_r1_f6,'0')::float+Coalesce(gs_r1_f7,'0')::float)/7)*100 BETWEEN 80 AND 100 then 1 else 0 end) as gsgreater80,
sum( case when ((Coalesce(gs_r1_f1,'0')::float+Coalesce(gs_r1_f2,'0')::float+Coalesce(gs_r1_f3,'0')::float+Coalesce(gs_r1_f4,'0')::float+Coalesce(gs_r1_f5,'0')::float+Coalesce(gs_r1_f6,'0')::float+Coalesce(gs_r1_f7,'0')::float)/7)*100 BETWEEN 60 AND 80 then 1 else 0 end) as gsgreater60,
sum( case when ((Coalesce(gs_r1_f1,'0')::float+Coalesce(gs_r1_f2,'0')::float+Coalesce(gs_r1_f3,'0')::float+Coalesce(gs_r1_f4,'0')::float+Coalesce(gs_r1_f5,'0')::float+Coalesce(gs_r1_f6,'0')::float+Coalesce(gs_r1_f7,'0')::float)/7)*100 BETWEEN 40 AND 60 then 1 else 0 end) as gsgreater40,
sum( case when ((Coalesce(gs_r1_f1,'0')::float+Coalesce(gs_r1_f2,'0')::float+Coalesce(gs_r1_f3,'0')::float+Coalesce(gs_r1_f4,'0')::float+Coalesce(gs_r1_f5,'0')::float+Coalesce(gs_r1_f6,'0')::float+Coalesce(gs_r1_f7,'0')::float)/7)*100 BETWEEN 20 AND 40 then 1 else 0 end) as gsgreater20,
sum( case when ((Coalesce(gs_r1_f1,'0')::float+Coalesce(gs_r1_f2,'0')::float+Coalesce(gs_r1_f3,'0')::float+Coalesce(gs_r1_f4,'0')::float+Coalesce(gs_r1_f5,'0')::float+Coalesce(gs_r1_f6,'0')::float+Coalesce(gs_r1_f7,'0')::float)/7)*100 BETWEEN 0 AND 20 then 1 else 0 end) as gsgreater0,

sum(Coalesce(ss_r1_f1,'0')::int) as ss_r1_f1,
sum(Coalesce(ss_r1_f2,'0')::int) as ss_r1_f2,
sum(Coalesce(ss_r1_f3,'0')::int) as ss_r1_f3,
sum(Coalesce(ss_r1_f4,'0')::int) as ss_r1_f4,
sum(Coalesce(ss_r1_f5,'0')::int) as ss_r1_f5,
sum(Coalesce(ss_r1_f6,'0')::int) as ss_r1_f6,
sum(Coalesce(ss_r1_f7,'0')::int) as ss_r1_f7,

sum( case when ((Coalesce(ss_r1_f1,'0')::float+Coalesce(ss_r1_f2,'0')::float+Coalesce(ss_r1_f3,'0')::float+Coalesce(ss_r1_f4,'0')::float+Coalesce(ss_r1_f5,'0')::float+Coalesce(ss_r1_f6,'0')::float+Coalesce(ss_r1_f7,'0')::float)/7)*100 BETWEEN 80 AND 100 then 1 else 0 end) as ssgreater80,
sum( case when ((Coalesce(ss_r1_f1,'0')::float+Coalesce(ss_r1_f2,'0')::float+Coalesce(ss_r1_f3,'0')::float+Coalesce(ss_r1_f4,'0')::float+Coalesce(ss_r1_f5,'0')::float+Coalesce(ss_r1_f6,'0')::float+Coalesce(ss_r1_f7,'0')::float)/7)*100 BETWEEN 60 AND 80 then 1 else 0 end) as ssgreater60,
sum( case when ((Coalesce(ss_r1_f1,'0')::float+Coalesce(ss_r1_f2,'0')::float+Coalesce(ss_r1_f3,'0')::float+Coalesce(ss_r1_f4,'0')::float+Coalesce(ss_r1_f5,'0')::float+Coalesce(ss_r1_f6,'0')::float+Coalesce(ss_r1_f7,'0')::float)/7)*100 BETWEEN 40 AND 60 then 1 else 0 end) as ssgreater40,
sum( case when ((Coalesce(ss_r1_f1,'0')::float+Coalesce(ss_r1_f2,'0')::float+Coalesce(ss_r1_f3,'0')::float+Coalesce(ss_r1_f4,'0')::float+Coalesce(ss_r1_f5,'0')::float+Coalesce(ss_r1_f6,'0')::float+Coalesce(ss_r1_f7,'0')::float)/7)*100 BETWEEN 20 AND 40 then 1 else 0 end) as ssgreater20,
sum( case when ((Coalesce(ss_r1_f1,'0')::float+Coalesce(ss_r1_f2,'0')::float+Coalesce(ss_r1_f3,'0')::float+Coalesce(ss_r1_f4,'0')::float+Coalesce(ss_r1_f5,'0')::float+Coalesce(ss_r1_f6,'0')::float+Coalesce(ss_r1_f7,'0')::float)/7)*100 BETWEEN 0 AND 20 then 1 else 0 end) as ssgreater0,

sum(Coalesce(pp_r1_f1,'0')::int) as pp_r1_f1,
sum(Coalesce(pp_r1_f2,'0')::int) as pp_r1_f2,
sum(Coalesce(pp_r1_f3,'0')::int) as pp_r1_f3,
sum(Coalesce(pp_r1_f4,'0')::int) as pp_r1_f4,
sum(Coalesce(pp_r1_f5,'0')::int) as pp_r1_f5,
sum(Coalesce(pp_r1_f6,'0')::int) as pp_r1_f6,
sum(Coalesce(pp_r1_f7,'0')::int) as pp_r1_f7,

sum( case when ((Coalesce(pp_r1_f1,'0')::float+Coalesce(pp_r1_f2,'0')::float+Coalesce(pp_r1_f3,'0')::float+Coalesce(pp_r1_f4,'0')::float+Coalesce(pp_r1_f5,'0')::float+Coalesce(pp_r1_f6,'0')::float+Coalesce(pp_r1_f7,'0')::float)/7)*100 BETWEEN 80 AND 100 then 1 else 0 end) as ppgreater80,
sum( case when ((Coalesce(pp_r1_f1,'0')::float+Coalesce(pp_r1_f2,'0')::float+Coalesce(pp_r1_f3,'0')::float+Coalesce(pp_r1_f4,'0')::float+Coalesce(pp_r1_f5,'0')::float+Coalesce(pp_r1_f6,'0')::float+Coalesce(pp_r1_f7,'0')::float)/7)*100 BETWEEN 60 AND 80 then 1 else 0 end) as ppgreater60,
sum( case when ((Coalesce(pp_r1_f1,'0')::float+Coalesce(pp_r1_f2,'0')::float+Coalesce(pp_r1_f3,'0')::float+Coalesce(pp_r1_f4,'0')::float+Coalesce(pp_r1_f5,'0')::float+Coalesce(pp_r1_f6,'0')::float+Coalesce(pp_r1_f7,'0')::float)/7)*100 BETWEEN 40 AND 60 then 1 else 0 end) as ppgreater40,
sum( case when ((Coalesce(pp_r1_f1,'0')::float+Coalesce(pp_r1_f2,'0')::float+Coalesce(pp_r1_f3,'0')::float+Coalesce(pp_r1_f4,'0')::float+Coalesce(pp_r1_f5,'0')::float+Coalesce(pp_r1_f6,'0')::float+Coalesce(pp_r1_f7,'0')::float)/7)*100 BETWEEN 20 AND 40 then 1 else 0 end) as ppgreater20,
sum( case when ((Coalesce(pp_r1_f1,'0')::float+Coalesce(pp_r1_f2,'0')::float+Coalesce(pp_r1_f3,'0')::float+Coalesce(pp_r1_f4,'0')::float+Coalesce(pp_r1_f5,'0')::float+Coalesce(pp_r1_f6,'0')::float+Coalesce(pp_r1_f7,'0')::float)/7)*100 BETWEEN 0 AND 20 then 1 else 0 end) as ppgreater0

from imc_gois FULL join visit_plan_visit_checklists vpvc
on imc_gois.vpvc_id = vpvc.id FULL join visit_plan_visits vpv
on vpvc.visitplanvisitsid=vpv.id FULL join visit_plan_header vph
on vpv.visitplanid=vph.id ";
if($ulevel=='2' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
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
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
vph.supervisorid,
getusername(vph.supervisorid) as supervisor,
".$columnstofetch." group by
vph.supervisorid,vph.distcode order by vph.supervisorid",FALSE
);
}
$records = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
return $records;
}
public function get_imc_epi_data($fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "vph.id > 0 and vpvc.checklistid = 35 ";
if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}
$columnstofetch = "count(vpvc.id) as planned,count(imc_epi.id) as filled,";
$percentsum = "";
for($i=5;$i<=11;$i++){
$columnstofetch .= "sum(Coalesce(epi_r".$i."_f1,'0')::int) as epi_r".$i."_f1,";
$percentsum .= "Coalesce(epi_r".$i."_f1,'0')::float+";
}
$percentsum = substr($percentsum, 0, -1);
$columnstofetch .= "sum( case when (($percentsum)/6)*100 BETWEEN 80 AND 100 then 1 else 0 end) as epgreater80,";
$columnstofetch .= "sum( case when (($percentsum)/6)*100 BETWEEN 60 AND 80 then 1 else 0 end) as epgreater60,";
$columnstofetch .= "sum( case when (($percentsum)/6)*100 BETWEEN 40 AND 60 then 1 else 0 end) as epgreater40,";
$columnstofetch .= "sum( case when (($percentsum)/6)*100 BETWEEN 20 AND 40 then 1 else 0 end) as epgreater20,";
$columnstofetch .= "sum( case when (($percentsum)/6)*100 BETWEEN 0 AND 20 then 1 else 0 end) as epgreater0";

$columnstofetch .= " from imc_epi FULL join visit_plan_visit_checklists vpvc
on imc_epi.vpvc_id = vpvc.id FULL join visit_plan_visits vpv
on vpvc.visitplanvisitsid=vpv.id FULL join visit_plan_header vph
on vpv.visitplanid=vph.id";
if($ulevel=='2' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
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
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
}
$records = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
return $records;
}
public function get_imc_malaria_data($fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "vph.id > 0 and vpvc.checklistid = 38 ";
if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}
$columnstofetch = "count(vpvc.id) as planned,count(imc_malaria.id) as filled,";
$percentsum = "";
for($i=1;$i<=4;$i++){
$columnstofetch .= "sum(Coalesce(cl_r".$i."_f1,'0')::int) as cl_r".$i."_f1,";
$percentsum .= "Coalesce(cl_r".$i."_f1,'0')::float+";
}
$percentsum = substr($percentsum, 0, -1);
$columnstofetch .= "sum( case when (($percentsum)/4)*100 BETWEEN 80 AND 100 then 1 else 0 end) as msgreater80,";
$columnstofetch .= "sum( case when (($percentsum)/4)*100 BETWEEN 60 AND 80 then 1 else 0 end) as msgreater60,";
$columnstofetch .= "sum( case when (($percentsum)/4)*100 BETWEEN 40 AND 60 then 1 else 0 end) as msgreater40,";
$columnstofetch .= "sum( case when (($percentsum)/4)*100 BETWEEN 20 AND 40 then 1 else 0 end) as msgreater20,";
$columnstofetch .= "sum( case when (($percentsum)/4)*100 BETWEEN 0 AND 20 then 1 else 0 end) as msgreater0";

$columnstofetch .= " from imc_malaria FULL join visit_plan_visit_checklists vpvc
on imc_malaria.vpvc_id = vpvc.id FULL join visit_plan_visits vpv
on vpvc.visitplanvisitsid=vpv.id FULL join visit_plan_header vph
on vpv.visitplanid=vph.id";
if($ulevel=='2' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
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
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
}
$records = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
return $records;
}
public function get_imc_indoor_data($fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "vph.id > 0 and vpvc.checklistid = 43 ";
if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}
$columnstofetch = "count(vpvc.id) as planned,count(imc_indoor.id) as filled,";
$percentsum = "";
$percentsumf = "";
for($i=3;$i<=7;$i++){
$columnstofetch .= "sum(Coalesce(indm_r".$i."_f1,'0')::int) as indm_r".$i."_f1,";
$columnstofetch .= "sum(Coalesce(indf_r".$i."_f1,'0')::int) as indf_r".$i."_f1,";
$percentsum .= "Coalesce(indm_r".$i."_f1,'0')::float+";
$percentsumf .= "Coalesce(indf_r".$i."_f1,'0')::float+";
}
$percentsum = substr($percentsum, 0, -1);
//print_r($percentsum);exit;
$columnstofetch .= "sum( case when (($percentsum)/5)*100 BETWEEN 80 AND 100 then 1 else 0 end) as indmgreater80,";
$columnstofetch .= "sum( case when (($percentsum)/5)*100 BETWEEN 60 AND 80 then 1 else 0 end) as indmgreater60,";
$columnstofetch .= "sum( case when (($percentsum)/5)*100 BETWEEN 40 AND 60 then 1 else 0 end) as indmgreater40,";
$columnstofetch .= "sum( case when (($percentsum)/5)*100 BETWEEN 20 AND 40 then 1 else 0 end) as indmgreater20,";
$columnstofetch .= "sum( case when (($percentsum)/5)*100 BETWEEN 0 AND 20 then 1 else 0 end) as indmgreater0,";
$percentsumf = substr($percentsumf, 0, -1);
$columnstofetch .= "sum( case when (($percentsumf)/5)*100 BETWEEN 80 AND 100 then 1 else 0 end) as indfgreater80,";
$columnstofetch .= "sum( case when (($percentsumf)/5)*100 BETWEEN 60 AND 80 then 1 else 0 end) as indfgreater60,";
$columnstofetch .= "sum( case when (($percentsumf)/5)*100 BETWEEN 40 AND 60 then 1 else 0 end) as indfgreater40,";
$columnstofetch .= "sum( case when (($percentsumf)/5)*100 BETWEEN 20 AND 40 then 1 else 0 end) as indfgreater20,";
$columnstofetch .= "sum( case when (($percentsumf)/5)*100 BETWEEN 0 AND 20 then 1 else 0 end) as indfgreater0,";

$columnstofetch	.="	sum(Coalesce(fam_r1_f1,'0')::int) as fam_r1_f1,
sum(Coalesce(fam_r1_f2,'0')::int) as fam_r1_f2,
sum(Coalesce(fam_r1_f3,'0')::int) as fam_r1_f3,
sum(Coalesce(fam_r1_f4,'0')::int) as fam_r1_f4,
sum(Coalesce(iam_r1_f1,'0')::int) as iam_r1_f1,
sum(Coalesce(iam_r1_f2,'0')::int) as iam_r1_f2,
sum(Coalesce(iam_r1_f3,'0')::int) as iam_r1_f3,
sum(Coalesce(iam_r1_f4,'0')::int) as iam_r1_f4,
sum(Coalesce(iam_r1_f5,'0')::int) as iam_r1_f5,
sum(Coalesce(iam_r2_f1,'0')::int) as iam_r2_f1,
sum(Coalesce(iam_r2_f2,'0')::int) as iam_r2_f2,
sum(Coalesce(iam_r2_f3,'0')::int) as iam_r2_f3,
sum(Coalesce(iam_r2_f4,'0')::int) as iam_r2_f4,
sum(Coalesce(iam_r2_f5,'0')::int) as iam_r2_f5,

sum( case when ((Coalesce(fam_r1_f1,'0')::float+Coalesce(fam_r1_f2,'0')::float+Coalesce(fam_r1_f3,'0')::float+Coalesce(fam_r1_f4,'0')::float+Coalesce(iam_r1_f1,'0')::float+Coalesce(iam_r1_f2,'0')::float+Coalesce(iam_r1_f3,'0')::float+Coalesce(iam_r1_f4,'0')::float+Coalesce(iam_r1_f5,'0')::float+Coalesce(iam_r2_f1,'0')::float+Coalesce(iam_r2_f2,'0')::float+Coalesce(iam_r2_f3,'0')::float+Coalesce(iam_r2_f4,'0')::float+Coalesce(iam_r2_f5,'0')::float)/14)*100 BETWEEN 80 AND 100 then 1 else 0 end) as fimgreater80,
sum( case when ((Coalesce(fam_r1_f1,'0')::float+Coalesce(fam_r1_f2,'0')::float+Coalesce(fam_r1_f3,'0')::float+Coalesce(fam_r1_f4,'0')::float+Coalesce(iam_r1_f1,'0')::float+Coalesce(iam_r1_f2,'0')::float+Coalesce(iam_r1_f3,'0')::float+Coalesce(iam_r1_f4,'0')::float+Coalesce(iam_r1_f5,'0')::float+Coalesce(iam_r2_f1,'0')::float+Coalesce(iam_r2_f2,'0')::float+Coalesce(iam_r2_f3,'0')::float+Coalesce(iam_r2_f4,'0')::float+Coalesce(iam_r2_f5,'0')::float)/14)*100 BETWEEN 60 AND 80 then 1 else 0 end) as fimgreater60,
sum( case when ((Coalesce(fam_r1_f1,'0')::float+Coalesce(fam_r1_f2,'0')::float+Coalesce(fam_r1_f3,'0')::float+Coalesce(fam_r1_f4,'0')::float+Coalesce(iam_r1_f1,'0')::float+Coalesce(iam_r1_f2,'0')::float+Coalesce(iam_r1_f3,'0')::float+Coalesce(iam_r1_f4,'0')::float+Coalesce(iam_r1_f5,'0')::float+Coalesce(iam_r2_f1,'0')::float+Coalesce(iam_r2_f2,'0')::float+Coalesce(iam_r2_f3,'0')::float+Coalesce(iam_r2_f4,'0')::float+Coalesce(iam_r2_f5,'0')::float)/14)*100 BETWEEN 40 AND 60 then 1 else 0 end) as fimgreater40,
sum( case when ((Coalesce(fam_r1_f1,'0')::float+Coalesce(fam_r1_f2,'0')::float+Coalesce(fam_r1_f3,'0')::float+Coalesce(fam_r1_f4,'0')::float+Coalesce(iam_r1_f1,'0')::float+Coalesce(iam_r1_f2,'0')::float+Coalesce(iam_r1_f3,'0')::float+Coalesce(iam_r1_f4,'0')::float+Coalesce(iam_r1_f5,'0')::float+Coalesce(iam_r2_f1,'0')::float+Coalesce(iam_r2_f2,'0')::float+Coalesce(iam_r2_f3,'0')::float+Coalesce(iam_r2_f4,'0')::float+Coalesce(iam_r2_f5,'0')::float)/14)*100 BETWEEN 20 AND 40 then 1 else 0 end) as fimgreater20,
sum( case when ((Coalesce(fam_r1_f1,'0')::float+Coalesce(fam_r1_f2,'0')::float+Coalesce(fam_r1_f3,'0')::float+Coalesce(fam_r1_f4,'0')::float+Coalesce(iam_r1_f1,'0')::float+Coalesce(iam_r1_f2)::float+Coalesce(iam_r1_f3,'0')::float+Coalesce(iam_r1_f4,'0')::float+Coalesce(iam_r1_f5,'0')::float+Coalesce(iam_r2_f1,'0')::float+Coalesce(iam_r2_f2,'0')::float+Coalesce(iam_r2_f3,'0')::float+Coalesce(iam_r2_f4,'0')::float+Coalesce(iam_r2_f5,'0')::float)/14)*100 BETWEEN 0 AND 20 then 1 else 0 end) as fimgreater0,
";

$columnstofetch	.="	sum(Coalesce(faf_r1_f1,'0')::int) as faf_r1_f1,
sum(Coalesce(faf_r1_f2,'0')::int) as faf_r1_f2,
sum(Coalesce(faf_r1_f3,'0')::int) as faf_r1_f3,
sum(Coalesce(faf_r1_f4,'0')::int) as faf_r1_f4,
sum(Coalesce(iaf_r1_f1,'0')::int) as iaf_r1_f1,
sum(Coalesce(iaf_r1_f2,'0')::int) as iaf_r1_f2,
sum(Coalesce(iaf_r1_f3,'0')::int) as iaf_r1_f3,
sum(Coalesce(iaf_r1_f4,'0')::int) as iaf_r1_f4,
sum(Coalesce(iaf_r1_f5,'0')::int) as iaf_r1_f5,
sum(Coalesce(iaf_r2_f1,'0')::int) as iaf_r2_f1,
sum(Coalesce(iaf_r2_f2,'0')::int) as iaf_r2_f2,
sum(Coalesce(iaf_r2_f3,'0')::int) as iaf_r2_f3,
sum(Coalesce(iaf_r2_f4,'0')::int) as iaf_r2_f4,
sum(Coalesce(iaf_r2_f5,'0')::int) as iaf_r2_f5,

sum( case when ((Coalesce(faf_r1_f1,'0')::float+Coalesce(faf_r1_f2,'0')::float+Coalesce(faf_r1_f3,'0')::float+Coalesce(faf_r1_f4,'0')::float+Coalesce(iaf_r1_f1,'0')::float+Coalesce(iaf_r1_f2,'0')::float+Coalesce(iaf_r1_f3,'0')::float+Coalesce(iaf_r1_f4,'0')::float+Coalesce(iaf_r1_f5,'0')::float+Coalesce(iaf_r2_f1,'0')::float+Coalesce(iaf_r2_f2,'0')::float+Coalesce(iaf_r2_f3,'0')::float+Coalesce(iaf_r2_f4,'0')::float+Coalesce(iaf_r2_f5,'0')::float)/14)*100 BETWEEN 80 AND 100 then 1 else 0 end) as fifgreater80,
sum( case when ((Coalesce(faf_r1_f1,'0')::float+Coalesce(faf_r1_f2,'0')::float+Coalesce(faf_r1_f3,'0')::float+Coalesce(faf_r1_f4,'0')::float+Coalesce(iaf_r1_f1,'0')::float+Coalesce(iaf_r1_f2,'0')::float+Coalesce(iaf_r1_f3,'0')::float+Coalesce(iaf_r1_f4,'0')::float+Coalesce(iaf_r1_f5,'0')::float+Coalesce(iaf_r2_f1,'0')::float+Coalesce(iaf_r2_f2,'0')::float+Coalesce(iaf_r2_f3,'0')::float+Coalesce(iaf_r2_f4,'0')::float+Coalesce(iaf_r2_f5,'0')::float)/14)*100 BETWEEN 60 AND 80 then 1 else 0 end) as fifgreater60,
sum( case when ((Coalesce(faf_r1_f1,'0')::float+Coalesce(faf_r1_f2,'0')::float+Coalesce(faf_r1_f3,'0')::float+Coalesce(faf_r1_f4,'0')::float+Coalesce(iaf_r1_f1,'0')::float+Coalesce(iaf_r1_f2,'0')::float+Coalesce(iaf_r1_f3,'0')::float+Coalesce(iaf_r1_f4,'0')::float+Coalesce(iaf_r1_f5,'0')::float+Coalesce(iaf_r2_f1,'0')::float+Coalesce(iaf_r2_f2,'0')::float+Coalesce(iaf_r2_f3,'0')::float+Coalesce(iaf_r2_f4,'0')::float+Coalesce(iaf_r2_f5,'0')::float)/14)*100 BETWEEN 40 AND 60 then 1 else 0 end) as fifgreater40,
sum( case when ((Coalesce(faf_r1_f1,'0')::float+Coalesce(faf_r1_f2,'0')::float+Coalesce(faf_r1_f3,'0')::float+Coalesce(faf_r1_f4,'0')::float+Coalesce(iaf_r1_f1,'0')::float+Coalesce(iaf_r1_f2,'0')::float+Coalesce(iaf_r1_f3,'0')::float+Coalesce(iaf_r1_f4,'0')::float+Coalesce(iaf_r1_f5,'0')::float+Coalesce(iaf_r2_f1,'0')::float+Coalesce(iaf_r2_f2,'0')::float+Coalesce(iaf_r2_f3,'0')::float+Coalesce(iaf_r2_f4,'0')::float+Coalesce(iaf_r2_f5,'0')::float)/14)*100 BETWEEN 20 AND 40 then 1 else 0 end) as fifgreater20,
sum( case when ((Coalesce(faf_r1_f1,'0')::float+Coalesce(faf_r1_f2,'0')::float+Coalesce(faf_r1_f3,'0')::float+Coalesce(faf_r1_f4,'0')::float+Coalesce(iaf_r1_f1,'0')::float+Coalesce(iaf_r1_f2)::float+Coalesce(iaf_r1_f3,'0')::float+Coalesce(iaf_r1_f4,'0')::float+Coalesce(iaf_r1_f5,'0')::float+Coalesce(iaf_r2_f1,'0')::float+Coalesce(iaf_r2_f2,'0')::float+Coalesce(iaf_r2_f3,'0')::float+Coalesce(iaf_r2_f4,'0')::float+Coalesce(iaf_r2_f5,'0')::float)/14)*100 BETWEEN 0 AND 20 then 1 else 0 end) as fifgreater0
";

$columnstofetch .= " from imc_indoor FULL join visit_plan_visit_checklists vpvc
on imc_indoor.vpvc_id = vpvc.id FULL join visit_plan_visits vpv
on vpvc.visitplanvisitsid=vpv.id FULL join visit_plan_header vph
on vpv.visitplanid=vph.id";
if($ulevel=='2' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
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
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
}
$records = $this->db->get()->result_array();
//echo $this->db->last_query();exit;
return $records;
}
public function get_lhw_lhw_data($fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "vph.id > 0 and vpvc.checklistid = 4 ";
if($fmonth){
$wc .= " and vph.fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}
$columnstofetch = "count(vpvc.id) as planned,count(lhw_lhw.id) as filled,";
$percentsum = "";
for($i=1;$i<=18;$i++){
$columnstofetch .= "sum(Coalesce(sr_r".$i."_f1,'0')::int) as sr_r".$i."_f1,";
$percentsum .= "Coalesce(sr_r".$i."_f1,'0')::float+";
}
$percentsum = substr($percentsum, 0, -1);
$columnstofetch .= "sum(Coalesce(sr_r22_f1,'0')::int) as sr_r22_f1,";
$columnstofetch .= "sum(Coalesce(sr_r23_f1,'0')::int) as sr_r23_f1,";
$columnstofetch .= "sum( case when (($percentsum)/20)*100 BETWEEN 80 AND 100 then 1 else 0 end) as srgreater80,";
$columnstofetch .= "sum( case when (($percentsum)/20)*100 BETWEEN 60 AND 80 then 1 else 0 end) as srgreater60,";
$columnstofetch .= "sum( case when (($percentsum)/20)*100 BETWEEN 40 AND 60 then 1 else 0 end) as srgreater40,";
$columnstofetch .= "sum( case when (($percentsum)/20)*100 BETWEEN 20 AND 40 then 1 else 0 end) as srgreater20,";
$columnstofetch .= "sum( case when (($percentsum)/20)*100 BETWEEN 0 AND 20 then 1 else 0 end) as srgreater0";

$columnstofetch .= " from lhw_lhw FULL join visit_plan_visit_checklists vpvc
on lhw_lhw.vpvc_id = vpvc.id FULL join visit_plan_visits vpv
on vpvc.visitplanvisitsid=vpv.id FULL join visit_plan_header vph
on vpv.visitplanid=vph.id";
if($ulevel=='2' && is_null($distcode)){
if($ptype!='all'){
$wc .= " and get_user_ptype(vph.supervisorid) = '$ptype' ";
$ptype1 = $ptype;
}else{
$ptype1 = 'defaultptype';
}
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
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
$columnstofetch .= " where ".$wc;
$this->db->select("
vph.distcode,
districtname(vph.distcode) as district,
".$columnstofetch." group by
vph.distcode order by vph.distcode",FALSE
);
/* $this->db->select("
vph.supervisorid,
getusername(vph.supervisorid) as supervisor,
".$columnstofetch." group by
vph.supervisorid order by vph.supervisorid",FALSE
); */
}
$records = $this->db->get()->result_array();
return $records;
}
public function get_lhwlist($tablee,$colums,$fmonth=NULL,$distcode=NULL,$customfmonthwc="defaultfmwc")
{
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session -> ptype;
$wc = "id > 0 ";
if($fmonth){
$wc .= " and fmonth = '$fmonth'";
}else if($customfmonthwc && $customfmonthwc!='defaultfmwc'){
$wc .= $customfmonthwc;
}
if(is_null($distcode)){
//code here if district not selected
}else{
$wc .= " and distcode = '$distcode'";
if($ulevel=='3' && $utype=='DEO')
{
$wc .= " and submitted_by = '".$this -> session -> id."'";
}
$this->db->select($colums)->from($tablee)->where($wc)->order_by("dov","desc");
}
$records = $this->db->get()->result_array();
return $records;
}
} //class ends
?>