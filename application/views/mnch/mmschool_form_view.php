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
	  <title>Monthly Monitoring of CMW/Nursing & midwifery/PH Schools || Form</title>
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
					Monthly Monitoring of CMW/Nursing & midwifery/PH Schools
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
										<label class="pt7 pb2"><?php echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->dov))):''; ?></label>
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
									<div class="col-sm-1"></div>
									<div class="col-sm-3 text-left">
										<label>Designation</label>
									</div>
									<div class="col-sm-3 brl text-center">
										<label>Name</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Present</label>
									</div>
									<div class="col-sm-3 bl text-center">
										<label>Remarks/ Recommendations</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Principal",
									"Vice Principal",
									"Tutors",
									"Cl: Instructors",
									"Hostel Warden",
									"Assistant",
									"Data Processing Assistant",
									"Junior Clerk",
									"Driver",
									"Peon/ NaibQasid",
									"Chowkidars",
									"Masi/Aaya",
									"Sanit: worker",
									"Others",
								);
								$keys=array(
									"1.1",
									"1.2",
									"1.3",
									"1.4",
									"1.5",
									"1.6",
									"1.7",
									"1.8",
									"1.9",
									"1.10",
									"1.11",
									"1.12",
									"1.13",
									"1.14",
								);
								$i=1;
								for($index=1;$index<=count($labels);$index++){
										if ($index==3 ||$index==4){ 
										if ($index==3){$innerindex=4;}else{$innerindex=2;}?>
								<div class="row">
									<div class="col-xs-1">
										<label class="mt7" style="<?php if ( $index==3){echo "margin-top:55px !important;";}else if($index==4){echo "margin-top:23px !important;";}?>" > <?php echo $keys[$index-1]; ?></label>
									</div>
									<div class="col-xs-3">
										<label class="<?php echo ($index==3)?"mt40":"mt20"; ?>"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-3 ">
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
											<div class="col-xs-12 text-center">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-3 ">
										<div class="row">
											<?php for($j=0;$j<$innerindex;$j++){?>
											<div class="col-xs-12 ">
												<p><?php $temp=$i+$j; $var ='hr_r'.$temp.'_f3';echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<?php } ?>
										</div>
									</div>
									
								</div>
									<?php $i=$temp+1;} else{ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="mt7"><?php echo $keys[$index-1]; ?></label>
									</div>
									<div class="col-xs-3">
										<label class="mt7" > <?php echo ($index==14 && isset($DataRow))? $DataRow->hr_others: $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-3 ">
										<p><?php $var ='hr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center ">
										<p><?php $var ='hr_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-3 ">
										<p><?php $var ='hr_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php $i++;} }?>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-sm-12 cmargin27 bgcolcl text-center">
										<label>Section II. Academics (Class room and clinical posting schedule) - To be verified from record</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-1 br">
										<label>A</label>
									</div>
									<div class="col-sm-7">
										<label>B. Academic Activities</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>At School/ class room</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>At Hospital </label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Timings observed (e.g.: 9.00 am to 11.30 am)",
									"# of classes planned daily",
									"# of classes taken (on the day of visit)",
									"Periodic feedback by clinical instructors to CMWs (Check record from previous month)",
									"CMW-log book follow-up on regular basis  (Check record from previous month)",
									"CMW-log book properly signed by instructors  (Check record from previous month)",
									"Regular Attendance Taken",
									"Action taken against absent students ",
									"If yes, what action was taken (also mention date)",
									"Transportation Hostel-Hospital-Hostel available",
									"Term/midterm tests and evaluation completed",
									"# of CMWs with consistently poor performance",
									"Rotation of CMWs in clinical site  (check roster and confirm with clinical site)",
									"Skill lab is being used  on day of visit   ",
									"Is library available to students",
									"Is library being used on day of visit",
								);
								$keys=array(
									"2.1",
									"2.2",
									"2.3",
									"2.4",
									"2.5",
									"2.6",
									"2.7",
									"2.8",
									"2.9",
									"2.10",
									"2.11",
									"2.12",
									"2.13",
									"2.14",
									"2.15",
									"2.16"
								);
								
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-1">
										<label class="mt7"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="col-xs-7">
										<label class="mt7"><?php echo $labels[$i-1]; ?></label>
									</div>
									<?php if($i==10){ ?>
									<div class="col-xs-4">
										<p><?php $var ='acad_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ($DataRow->$var == 2 ? "N/A" : "")):'';?></p>
									</div>
									<?php }else { ?>
									<div class="col-xs-2 ">
										<?php if($i==1||$i==2 ||$i==3||$i==4 ||$i==8||$i==9 ||$i==12||$i==13){?>
										<p><?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php }else{ ?>
										<p><?php $var ='acad_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>
									</div>
									<div class="col-xs-2 ">
										<?php  if ($i==1 ||$i==2||$i==3||$i==9||$i==11||$i==12||$i==14||$i==15||$i==16){?>
										<p><?php $var ='acad_r'.$i.'_f2'; if ($i==9){ echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; }else {echo isset($DataRow)?$DataRow->$var:''; }?></p>
										
										<?php }else {?>
										<p><?php $var ='acad_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="row bc" style="margin-top: 4px; margin-bottom: 1px;">
									<div class="col-sm-12 text-center">
										<label>B. Miscellaneous </label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-8 text-center">
										<div class="row">
											<div class="col-sm-6">
												<label class="">Senior batch  (Batch No:)</label>
											</div>
											<div class="col-sm-6 text-left">
												<label ><?php $var ='senior_batch_no'; echo isset($DataRow)?$DataRow->$var:''; ?></label>
											</div>
										</div>
									</div>
									<div class="col-sm-2 brl text-center">
										<label >At School/ class room</label>
									</div>
									<div class="col-sm-2 text-center">
										<label >At Hospital</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Total # of CMWs enrolled",
									"Attendance on the day of visit (Class room)",
									"# of CMWs present in Hospital (Labor room, ward, OPD etc.)",
									"# of CMWs living in hostel",
									"CMWs carrying training manuals at the time of visit",
									"CMWs having log book at the time of visit",
									"CMWs wearing uniform with Name tag at the time of visit",
									"Junior batch ",
									"Total # of CMWs enrolled",
									"Attendance on the day of visit (Class room)",
									"No: of CMWs present in Hospital (Labor room, ward, OPD etc.)",
									"No: of CMWs living in hostel",
									"CMWs carrying training manuals at the time of visit",
									"CMWs having log book at the time of visit",
									"CMWs wearing uniform with Name tag (at the time of visit)",
								);
								$keys=array(
									"2.17",
									"2.18",
									"2.19",
									"2.20",
									"2.21",
									"2.22",
									"2.23",
									"",
									"2.24",
									"2.25",
									"2.26",
									"2.27",
									"2.28",
									"2.29",
									"2.30"
								);
								$i=1;
								for($index=1;$index<=count($labels);$index++){
									if($index==8){ ?>
								<div class="row bc">
									<div class="col-sm-8 text-center">
										<div class="row">
											<div class="col-sm-6">
												<label >Junior batch  (Batch No:)</label>
											</div>
											<div class="col-sm-6 text-left">
												<label ><?php $var ='junior_batch_no'; echo isset($DataRow)?$DataRow->$var:''; ?></label>
											</div>
										</div>
									</div>
									<div class="col-sm-2 brl text-center">
										<label >At School/ class room</label>
									</div>
									<div class="col-sm-2 text-center">
										<label >At Hospital</label>
									</div>
								</div>
									<?php }else { ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="mt7"><?php echo $keys[$index-1]; ?></label>
									</div>
									<div class="col-xs-7">
										<label class="mt7"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='misc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
									<?php $i++;}?>
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
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>mnch/forms/mmschool_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
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
					window.location.href="<?php echo $basePath; ?>mnch/forms/mmschool_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>