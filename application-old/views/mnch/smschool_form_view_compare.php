<?php
$basePath = base_url();
$assetsPath = base_url() . "assets/";
$userId = $this -> session -> id;
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Six Monthly Monitoring of CMW/Nursing & midwifery/PH Schools || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Six Monthly Monitoring of CMW/Nursing & midwifery/PH Schools
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
						<div class="alignmentview">
							<div class="rowlightbg">
								<div class="row bc">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">S#</label>
											</div>
											<div class="col-xs-10 bl">
												<label class="pt7">Reporting Month</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.1</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Date of Visit</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
								<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php $var ="dov"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
							</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Supervisor Name</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="supervisor_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.3</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Supervisor Designation</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="supervisor_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Name of Monitor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="moniter_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="moniter_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Designation of Monitor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="moniter_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="moniter_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.6</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Name of training school</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">										
										<p><?php $var="tschool_name"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="tschool_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.7</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Address of training school</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var="tschool_address"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="tschool_address"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.8</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Training School ID/registration</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var="tschool_reg"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="tschool_reg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl text-center">
										<label>Section 2: Identification</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.1</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">District</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Facility</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></p>
									</div>
								</div>							
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.3</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Facility Type</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Province</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p>Khyber Pakhtunkhwa</p>
									</div>
								</div>								
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-sm-12 cmargin27 bgcolcl text-center">
										<label>Section I. Human Resource</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-2 text-center">
										<label class="pt9 pb17">Designation</label>
									</div>
									<div class="col-sm-2 bl text-center">
										<label class="pt9 pb17">Name</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Posting</label>
										<div class="row bt">
											<div class="col-sm-12 ">
												<label>Posted/Deputed</label>
											</div>
										</div>
									</div>
									<div class="col-sm-2 text-center">
										<label>Last attended Training Topic</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label class="pt9 pb17">Duration</label>
									</div>
									<div class="col-sm-1 zp text-center">
										<label>Last attended training date</label>
									</div>
									<div class="col-sm-2 bl text-center">
										<label class="pt9 pb17">Remarks</label>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<!-- <div class="col-sm-2 bgw" style="min-height:25px;">								 
									</div> -->
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
									</div>
								</div>
								<?php 
								$labels=array(
									"Principal",
									"Vice Principal",
									"Tutors",
									"Clinical  Instructors",
									"Hostel Warden",
									"Assistant",
									"Data Processing Assistant",
									"Junior Clerk",
									"Driver",
									"Peon/ NaibQasid",
									"Chowkidars",
									"Masi/Aaya",
									"Sanitary worker",
									"Others",
								);
								$i=1;
								
								for($index=1;$index<=count($labels);$index++){
									if ($index==3 ||$index==4){ 
									if ($index==3){$innerindex=4;}else{$innerindex=2;}?>
								<div class="row">
									<div class="col-xs-2 pt7 pb2">
										<label class="<?php echo ($index==3)?"mt40":"mt20"; ?>"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f1';echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Posted" : ($DataRow->$var == 0 ? "Deputed" : ""):'';?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 ">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f3';echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-1 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f4';echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-1 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 text-center">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f5';echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 ">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f6';echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
									<?php $i=$temp+1;} else{ ?>
								<div class="row">
									<div class="col-xs-2">
										<label > <?php echo ($index==14 && isset($DataRow))? $DataRow->hr_others: $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<p class="pt7"><?php $var ='hr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2  ">
										<p><?php $var ='hr_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Posted" : ($DataRow->$var == 0 ? "Deputed" : ""):'';?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='hr_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1  text-center">
										<p><?php $var ='hr_r'.$i.'_f5'; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>									
								</div>
								<?php $i++;} }?>
								<div class="row bc mt1 mb1">
									<!-- <div class="col-sm-2 bgw" style="min-height:25px;">								 
									</div> -->
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
									</div>
								</div>
								<?php 
								$labels=array(
									"Principal",
									"Vice Principal",
									"Tutors",
									"Clinical  Instructors",
									"Hostel Warden",
									"Assistant",
									"Data Processing Assistant",
									"Junior Clerk",
									"Driver",
									"Peon/ NaibQasid",
									"Chowkidars",
									"Masi/Aaya",
									"Sanitary worker",
									"Others",
								);
								$i=1;
								
								for($index=1;$index<=count($labels);$index++){
									if ($index==3 ||$index==4){ 
									if ($index==3){$innerindex=4;}else{$innerindex=2;}?>
								<div class="row">
									<div class="col-xs-2 pb7">
										<label class="<?php echo ($index==3)?"mt40":"mt20"; ?>"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f1';echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f2';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Posted" : ($CompareRow->$var == 0 ? "Deputed" : ""):'';?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 ">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f3';echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-1 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f4';echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-1 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 text-center">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f5';echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 ">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f6';echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
								</div>
									<?php $i=$temp+1;} else{ ?>
								<div class="row">
									<div class="col-xs-2">
										<label > <?php echo ($index==14 && isset($CompareRow))? $CompareRow->hr_others: $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2  ">
										<p><?php $var ='hr_r'.$i.'_f2';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Posted" : ($CompareRow->$var == 0 ? "Deputed" : ""):'';?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='hr_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1  text-center">
										<p><?php $var ='hr_r'.$i.'_f5'; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>									
								</div>
								<?php $i++;} }?>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-sm-12 cmargin27 bgcolcl text-center">
										<label>Section II. Infrastructure/ Resources (Direct Observation If necessary Verify data and information from record)</label>
									</div>
								</div>								
								<div class="row bc">
									<div class="col-sm-4">
										<label>A. School</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Yes/No</label>
									</div>
									<div class="col-sm-3 text-center">
										<label>Remarks</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Yes/No</label>
									</div>
									<div class="col-sm-3 text-center">
										<label>Remarks</label>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<div class="col-sm-4 bgw" style="min-height:26px;">								 
									</div>
									<div class="col-sm-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
									</div>
									<div class="col-sm-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
									</div>
								</div>
								<?php
								$labels=array(
									"2.1 Renovation of training school in last 6 months",
									"2.2 New construction in school in last 6 months",
									"2.3 Class rooms have  at least chairs, table & white/black board",
									"2.4 Skill lab available",
									"2.5 If available, is it being used",
									"2.6 Library available",
									"2.6.1 If available, is it being used",
									"2.7 Training Manuals/ Library books available ",
									"2.7 Training equipment/models available",
									"2.7.1 If available, is it being used by students",
									"Functional vehicle is available to transport the students to the clinical site. ",
									"A.	Hostel",
									"Hostel available ",
									"If Yes, number of students living in the hostel ",
									"Rooms/common hall  in satisfactory condition",
									"Messing in satisfactory and hygienic condition",                      
									"B.	Hospital/Clinical site",
									"Sufficient space to accommodate 8-10 CMWs in one shift",
									"Learning atmosphere encouraging",
								);
								$i=1;
								for($index=1;$index<=count($labels);$index++){
									if($index==12||$index==17){
								?>
									
								<div class="row bc">
									<div class="col-xs-12">
										<label class="pt7"><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
									<?php }else { ?>
								<div class="row">
									<div class="col-xs-4">
										<label class="mt7"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center pt10">										
										<?php if ($index==14){?>										
										<?php }else {?>
										<p class =" pt7 <?php $var ='ir_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='ir_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>											
									</div>
									<div class="col-xs-3 pt10">
										<p><?php $var ='ir_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center pt10 bg3">										
										<?php if ($index==14){?>										
										<?php }else {?>
										<p class =" pt7 <?php $var ='ir_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='ir_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>											
									</div>
									<div class="col-xs-3 pt10 bg3">
										<p><?php $var ='ir_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php $i++;} }?>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-sm-12 cmargin27 bgcolcl text-center">
										<label>Section III. Academics (Class room and clinical posting schedule) (Verify data from training school record & Ask questions from concerned )</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-4">
										<label>A. Academic Activities</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>At School/ class room</label>
									</div>
									<div class="col-sm-2  text-center">
										<label>At Hospital/ Clinical site</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>At School/ class room</label>
									</div>
									<div class="col-sm-2  text-center">
										<label>At Hospital/ Clinical site</label>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<div class="col-sm-4 bgw" style="min-height:26px;">								 
									</div>
									<div class="col-sm-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
									</div>
									<div class="col-sm-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
									</div>
								</div>
								<?php 
								$labels=array(
									"Timings observed (e.g.: 9.00 am to 11.30 am)",
									"No: of classes planned daily ",
									"Periodic feedback by clinical instructors to CMWs (Randomly Check)",    
									"CMW-log book follow-up on regular basis  (Randomly check)",
									"CMW-log book properly signed by instructors ",
									"Regular Attendance Taken (Y/N)",
									"Action taken against absent students (Y/N)  ",
									"If yes, what and when action was taken ",
									"Term/midterm tests and evaluation (Y/N) ",
									"# of CMWs with consistently poor performance ",
									"Rotation of CMWs in clinical site  (check roster and confirm with clinical site)",
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-4">
										<label class=""><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 text-center pt10">
										<div class="row">
											<?php if($i!=8){?>
											<div class="col-xs-3"></div>
											<?php } ?>
											<div class="col-xs-<?php echo ($i==8)?"9 zp":'6';?>">
												<?php if($i==2||$i==8 ||$i==10){?>
												<p><?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												<?php }else if($i==3){?>										
												<?php }else{?>										
												<p class =" pt7 <?php $var ='acad_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='acad_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p><?php } ?>
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center pt10">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6 <?php if($i==8){ echo "zp";}?>">
												<?php if ($i==2 ||$i==9 ||$i==11){?>
												<?php }else if ($i==8 ||$i==10){?>
												<p><?php $var ='acad_r'.$i.'_f2'; if ($i==8){ echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; }else {echo isset($DataRow)?$DataRow->$var:''; }?></p>
												<?php }else {?>
												<p class =" pt7 <?php $var ='acad_r'.$i.'_f2'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='acad_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
												<?php } ?>
											</div>
										</div>	
									</div>
									<div class="col-xs-2 text-center pt10 bg3">
										<div class="row">
											<?php if($i!=8){?>
											<div class="col-xs-3"></div>
											<?php } ?>
											<div class="col-xs-<?php echo ($i==8)?"9 zp":'6';?>">
												<?php if($i==2||$i==8 ||$i==10){?>
												<p><?php $var ='acad_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												<?php }else if($i==3){?>										
												<?php }else{?>
												<p class =" pt7 <?php $var ='acad_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='acad_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p><?php } ?>
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center pt10 bg3">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6 <?php if($i==8){ echo "zp";}?>">
												<?php if ($i==2 ||$i==9 ||$i==11){?>
												<?php }else if ($i==8 ||$i==10){?>
												<p><?php $var ='acad_r'.$i.'_f2'; if ($i==8){ echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; }else {echo isset($CompareRow)?$CompareRow->$var:''; }?></p>
												<?php }else {?>
												<p class =" pt7 <?php $var ='acad_r'.$i.'_f2'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='acad_r'.$i.'_f2';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
												<?php } ?>
											</div>
										</div>	
									</div>
								</div>
								<?php } ?>
								<div class="row bc">
						        	<div class="col-xs-4">
						          		<label>B. Miscellaneous</label>
						        	</div>
									<div class="col-xs-2 brl text-center"><label>Number</label></div>
									<div class="col-xs-2 text-center"><label>Remarks</label></div>
									<div class="col-xs-2 brl text-center"><label>Number</label></div>
									<div class="col-xs-2 text-center"><label>Remarks</label></div>
						      	</div>								
								<div class="row bc mt1">
									<div class="col-sm-4 bgw" style="min-height:26px;">								 
									</div>
									<div class="col-sm-4 text-center brl">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>										
									</div>
									<div class="col-sm-4 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Total # of CMWs enrolled ",
									"Number of Senior Batch ",
									"Number of Junior Batch ",
									"Attendance on the day of visit (Class room)",
									"# of CMWs present in hospital (Labor room, ward, OPD, etc.)",
									"CMWs carrying training manuals at the time of visit",
									"CMWs having log book at the time of visit",
									"CMWs wearing uniform with name tag (at the time of visit)",
									"Did they received last month’s stipend (Randomly ask from three CMWs & cross verify from record) ", 
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-4">
										<label class="mt9"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 text-center pt10">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<?php if ($i==9||$i==8){ ?>
												<p class =" pt7 <?php $var ='misc_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='misc_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
												<?php }else{ ?>
												<p><?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												<?php } ?>
											</div>
										</div>	
									</div>
									<div class="col-xs-2 zp pt10">
										<p><?php $var ='misc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center pt10 bg3">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<?php if ($i==9||$i==8){ ?>
												<p class =" pt7 <?php $var ='misc_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='misc_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
												<?php }else{ ?>
												<p><?php $var ='misc_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												<?php } ?>
											</div>
										</div>	
									</div>
									<div class="col-xs-2 zp pt10 bg3">
										<p><?php $var ='misc_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section IV: Comments Of District Focal Person</label>
							</div>
						</div>
						<div class="row bc mt1 mb1">
							<!-- <div class="col-sm-2 bgw" style="min-height:25px;">								 
							</div> -->
							<div class="col-sm-6 brl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-6 b text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-6">
								<p><?php $var='comments'; echo isset ($DataRow)?$DataRow->$var:"" ; ?></p>
							</div>
							<div class="col-xs-6 bg3">
								<p><?php $var='comments'; echo isset ($CompareRow)?$CompareRow->$var:"" ; ?></p>
							</div>
						</div>
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
							<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div>
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		
	</body>
</html>