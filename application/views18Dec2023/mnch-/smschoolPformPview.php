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
		<?php if (count($previous)>0){?>
		<div class="container">
			<div class="row" style="background:#0F4A6F;color:white;margin: 0px; padding-top: 3px; padding-bottom: 3px;">
				<div class="col-xs-4 col-xs-offset-4 text-right">
					<label class="mt7">Compare With Previously Submitted Checklist</label>
				</div>
				<div class="col-xs-2">
					<select class="form-control" id="p_month" name="p_month">
						<!--<option value="0">Select Month</option>-->
						<?php foreach($previous as $row){?>
						<option value="<?php echo $row['vpvc_id']; ?>"><?php echo getNewFMonthFormat($row['fmonth']); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-xs-1 text-right">
					<button style="border-radius: 0px;" type="submit" id="compare_btn" name="compare_btn"  class="btn btn-primary btn-md btncc" role="button">
						<i class="fa fa-clipboard"></i> Compare
					</button>
				</div>
			</div>
		</div><!--end of container for compare-->
		<?php } ?>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Six Monthly Monitoring of CMW/Nursing & midwifery/PH Schools
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
						<div class="alignmentview">
							<div class="rowlightbg">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Supervisor Name</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Supervisor Designation</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">District</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Facility</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Reporting Month</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Date of Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Facility Type</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Province</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Name of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>							
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Designation of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Name of training school</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="tschool_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Address of training school</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="tschool_address"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Training School ID/registration</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="tschool_reg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
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
											<div class="col-sm-12 br">
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
									<div class="col-xs-2">
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
											<div class="col-xs-12">
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
										<label class="mt7" > <?php echo ($index==14 && isset($DataRow))? $DataRow->hr_others: $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
									<div class="col-xs-1">
										<p><?php $var ='hr_r'.$i.'_f5'; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='hr_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									
								</div>
								<?php $i++;} }?>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-sm-12 cmargin27 bgcolcl text-center">
										<label>Section II. Infrastructure/ Resources (Direct Observation If necessary Verify data and information from record)</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-8">
										<label>A. School</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Yes/No</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
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
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
									<?php }else { ?>
								<div class="row">
									<div class="col-xs-8">
										<label class="mt7"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<?php if ($index==14){?>
										
										<?php }else {?>
										<p><?php $var ='ir_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='ir_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
									<?php $i++;} }?>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-sm-12 cmargin27 bgcolcl text-center">
										<label>Section III. Academics (Class room and clinical posting schedule) (Verify data from training school record & Ask questions from concerned )</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-8">
										<label>A. Academic Activities</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>At School/ class room</label>
									</div>
									<div class="col-sm-2  text-center">
										<label>At Hospital/ Clinical site</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Timings observed         (e.g.: 9.00 am to 11.30 am)",
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
									<div class="col-xs-8">
										<label class="mt7"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<?php if($i==2||$i==8 ||$i==10){?>
										<p><?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php }else if($i==3){?>
										
										<?php }else{?>
										<p><?php $var ='acad_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>										
										<?php } ?>
									</div>
									<div class="col-xs-2 ">
										<?php if ($i==2 ||$i==9 ||$i==11){?>
										<?php }else if ($i==8 ||$i==10){?>
										<p><?php $var ='acad_r'.$i.'_f2'; if ($i==8){ echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; }else {echo isset($DataRow)?$DataRow->$var:''; }?></p>
										<?php }else {?>
										<p><?php $var ='acad_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
								<div class="row bc">
									<div class="col-sm-12">
										<label>B. Miscellaneous</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8"></div>
									<div class="col-sm-2 text-center brl">
										<label>Number</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
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
									<div class="col-xs-8">
										<label class="mt9"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2">
										<?php if ($i==9||$i==8){ ?>
										<p><?php $var ='misc_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else{ ?>
										<p><?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var ='misc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
						<div class="row mt1">
							<div class="col-xs-12">
								<p><?php $var='comments'; echo isset ($DataRow)?$DataRow->$var:"" ; ?></p>
							</div>
						</div>
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>mnch/forms/smschool_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div>
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>mnch/forms/smschool_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>		
	</body>
</html>