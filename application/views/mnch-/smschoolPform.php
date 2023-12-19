<?php
$basePath = base_url();
$assetsPath = base_url() . "assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Six Monthly Monitoring of CMW/Nursing & midwifery/PH Schools || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Six Monthly Monitoring of CMW/Nursing & midwifery/PH Schools
				</div>
				<div class="panel-body pbody">
					<?php 
						echo validation_errors();
						$action = $basePath."mnch/smschool/save";
						$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
						$hidden = array('vpvc_id' => $vpvc_id);
						echo form_open_multipart($action,$attributes,$hidden); ?>
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Name</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Designation</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >			
								<label class="pt7 pb2"><?php  echo (isset($vpvcDataRow))?get_Facility_District_Name($vpvcDataRow->facode):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var = "facode"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control" type="hidden" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >               
								<!--<label class="pt7 pb2"><?php //echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label>-->
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var = "fatype"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control" type="hidden" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							
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
								<input class="form-control" id="" name="moniter_name" value="<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>							
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of training school</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="tschool_name" value="<?php $var="tschool_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Address of training school</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="tschool_address" value="<?php $var="tschool_address"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Training School ID/registration</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="tschool_reg" value="<?php $var="tschool_reg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>	
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>Section I. Human Resource</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-2 text-center">
								<label class="pt9 pb17">Designation</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label class="pt9 pb17">Name</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Posting</label>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Posted</label>
									</div>
									<div class="col-xs-6">
										<label>Deputed</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<label>Last attended Training Topic</label>
							</div>
							<div class="col-xs-1 brl text-center">
								<label class="pt9 pb17">Duration</label>
							</div>
							<div class="col-xs-1 zp text-center">
								<label>Last attended training date</label>
							</div>
							<div class="col-xs-2 bl text-center">
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
							if ($index==3){
								$innerindex=4;
							}
							else if ($index==4){
								$innerindex=2;
							}else{
								$innerindex=1;
							}
						?>
						<div class="row">
							<div class="col-xs-2">
								<?php if($index==14){ ?>
								<input class="form-control" placeholder="Others" value="<?php $var ='hr_others'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php }else if ($index==4){?>
								<label class="mt20" > <?php echo $labels[$index-1]; ?></label>
								<?php }else {?>
								<label class="<?php echo( $index==3)?" mb40":"mt7";?>" style="<?php if ( $index==3){echo "margin-top:50px !important;";}?>" > <?php echo $labels[$index-1]; ?></label>
								<?php } ?>
							</div>
							<?php for ($j=0;$j<$innerindex;$j++){ ?>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='hr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp text-center bg3 mn34">
								<label>Posted</label>&nbsp;
									<input <?php $var ='hr_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-1 zp text-center">
								<label>Deputed</label>&nbsp;
									<input <?php $var ='hr_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='hr_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control" value="<?php $var ='hr_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp ">
								<input class="form-control date-picker anyOtherDate" value="<?php $var ='hr_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='hr_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<?php $i++;} ?>
						</div>
						<?php } ?>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>Section II. Infrastructure/ Resources (Direct Observation If necessary Verify data and information from record)</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-8">
								<label>A. School</label>
							</div>
							<div class="col-xs-1 brl text-center">
								<label>Yes</label>
							</div>
							<div class="col-xs-1 text-center">
								<label>No</label>
							</div>
							<div class="col-xs-2 bl text-center">
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
							<div class="col-xs-1 zp text-center bg3 mn34">
								<?php if ($index==14){?>
								<input class="form-control text-center" id="" name=""   type="text" readonly="readonly">
								<?php }else {?>
								<input <?php $var ='ir_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
								<?php } ?>
							</div>
							<div class="col-xs-1 text-center zp">
								<?php if ($index==14){?>
								<input class="form-control text-center" id="" name=""   type="text" readonly="readonly">
								<?php }else {?>
								<input <?php $var ='ir_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
								<?php } ?>
							</div>
							<div class="col-xs-2  zp text-center">
								<input class="form-control <?php if($index==14){ echo "numberclass noDots";}?>" placeholder="<?php if($index==14){ echo "Specify Number:";}?>" value="<?php $var ='ir_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
							<?php $i++;} }?>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>Section III. Academics (Class room and clinical posting schedule) (Verify data from training school record & Ask questions from concerned )</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-8">
								<label>A. Academic Activities</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>At School/ class room</label>
							</div>
							<div class="col-xs-2 bl text-center">
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
							<div class="col-xs-2 zp">
								<?php if($i==2||$i==8 ||$i==10){?>
								<input class="form-control <?php echo ($i==2||$i==10)?"numberclass noDots":""; ?>" placeholder="<?php echo($i==8)?"Action Detail":""; ?>" value="<?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php }else if($i==3){?>
								<input class="form-control text-center" id="" name=""   type="text" readonly="readonly">
								<?php }else{?>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
								<?php } ?>
							</div>
							<div class="col-xs-2 zp">
								<?php if ($i==2 ||$i==9 ||$i==11){?>
								<input class="form-control text-center" id="" name=""   type="text" readonly="readonly">
								<?php }else if ($i==8 ||$i==10){?>
								<input class="form-control  <?php echo($i==8)?"dp text-center anyOtherDate":"numberclass noDots";?>"  value="<?php $var ='acad_r'.$i.'_f2'; if ($i==8){ echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; }else {echo isset($DataRow)?$DataRow->$var:''; }?>" name="<?php echo $var; ?>" type="text">
								<?php }else {?>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<div class="row bc">
							<div class="col-xs-12">
								<label>B. Miscellaneous</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-8"></div>
							<div class="col-xs-2 brl">
								<label>Number</label>
							</div>
							<div class="col-xs-2">
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
							<div class="col-xs-2 zp">
								<?php if ($i==9||$i==8){ ?>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
								<?php }else{ ?>
								<input class="form-control numberclass noDots" value="<?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php } ?>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='misc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
					</div><!--end of div rowlightbg-->
					<div class="row mt1 mb1">
						<div class="col-xs-12 bgcolcl text-center">
							<label>Section IV: Comments Of District Focal Person</label>
						</div>
					</div>
					<div class="row mt1">
						<div class="col-xs-12 zp">
							<textarea id="" name="comments" rows="5" class="form-control"><?php $var='comments'; echo isset ($DataRow)?$DataRow->$var:"" ; ?></textarea>
						</div>
					</div>
					<br>
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-file"></i> Save Form
							</button>
							<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-floppy-o"></i> Submit Form
							</button>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
				<!--end of panel body-->
			</div>
			<!--end of panel panel-primary-->
		</div>
		<!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<script type="text/javascript">
		/* $(function() {
			$(".date-picker").datepicker( {
				format: "mm-yyyy",
				viewMode: "months", 
				minViewMode: "months"
			});
		}); */

		</script>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		
	</body>
</html>