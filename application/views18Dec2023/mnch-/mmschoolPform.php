<?php
$basePath = base_url();
$assetsPath = base_url() . "assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Monthly Monitoring of CMW/Nursing & midwifery/PH Schools || Form</title>
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
					Monthly Monitoring of CMW/Nursing & midwifery/PH Schools
				</div>
				<div class="panel-body pbody">
					<?php 
						echo validation_errors();
						$action = $basePath."mnch/mmschool/save";
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
							<div class="col-xs-1"></div>
							<div class="col-xs-3 text-left">
								<label>Designation</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label>Name</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Present</label>
							</div>
							<div class="col-xs-3 bl text-center">
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
							<div class="col-xs-1">
								<label class="mt7" style="<?php if ( $index==3){echo "margin-top:55px !important;";}else if($index==4){echo "margin-top:23px !important;";}?>" > <?php echo $keys[$index-1]; ?></label>
							</div>
							<div class="col-xs-3">
								<?php if($index==14){ ?>
								<input class="form-control" placeholder="Others" value="<?php $var ='hr_others'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php }else if ($index==4){?>
								<label class="mt23" > <?php echo $labels[$index-1]; ?></label>
								<?php }else {?>
								<label class="<?php echo( $index==3)?" mb40":"mt7";?>" style="<?php if ( $index==3){echo "margin-top:55px !important;";}?>" > <?php echo $labels[$index-1]; ?></label>
								<?php } ?>
							</div>
							<?php for ($j=0;$j<$innerindex;$j++){ ?>
							<div class="col-xs-3 zp">
								<input class="form-control" value="<?php $var ='hr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='hr_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='hr_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control" value="<?php $var ='hr_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<?php $i++;} ?>
						</div>
						<?php } ?>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>Section II. Academics (Class room and clinical posting schedule) - To be verified from record</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1 br">
								<label>A</label>
							</div>
							<div class="col-xs-7">
								<label>B. Academic Activities</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>At School/ class room</label>
							</div>
							<div class="col-xs-2 text-center">
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
								<div class="row">
									<div class="col-xs-3 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-3">
										<label>No</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-left zp">
										<label>NA</label>&nbsp;
										<input <?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php }else { ?>
							<div class="col-xs-2 zp">
								<?php if($i==1||$i==2 ||$i==3||$i==4 ||$i==8||$i==9 ||$i==12||$i==13){?>
								<input class="form-control <?php echo ($i==2||$i==3||$i==12)?"numberclass noDots":""; ?>" placeholder="<?php echo($i==9)?"Action Detail":""; ?>" value="<?php $var ='acad_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" <?php echo ($i==4||$i==13)? 'readonly="readonly"':""; ?>  type="text">
								<?php }else{ ?>
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
								<?php  if ($i==1 ||$i==2||$i==3||$i==9||$i==11||$i==12||$i==14||$i==15||$i==16){?>
								<input class="form-control  <?php echo($i==9)?"dp text-center anyOtherDate":""; echo($i==12)?" numberclass noDots":"";?>"  value="<?php $var ='acad_r'.$i.'_f2'; if ($i==9){ echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; }else {echo isset($DataRow)?$DataRow->$var:''; }?>" name="<?php echo $var; ?>" <?php echo ($i==2||$i==3||$i==11||$i==14||$i==15||$i==16)? 'readonly="readonly"':""; ?> type="text">
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
							<?php } ?>
						</div>
						<?php } ?>
						<div class="row bc" style="margin-top: 4px; margin-bottom: 1px;">
							<div class="col-xs-12 text-center">
								<label>B. Miscellaneous </label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-8 text-center">
								<div class="row">
									<div class="col-xs-6">
										<label class="pt7 pb8">Senior batch  (Batch No:)</label>
									</div>
									<div class="col-xs-6">
										<input class="form-control text-center" value="<?php $var ='senior_batch_no'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="margin: 3px;" placeholder="Batch No" >
									</div>
								</div>
							</div>
							<div class="col-xs-2 brl text-center">
								<label class="pt7 pb8">At School/ class room</label>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt7 pb8">At Hospital</label>
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
							<div class="col-xs-8 text-center">
								<div class="row">
									<div class="col-xs-6">
										<label class="pt7 pb8">Junior batch  (Batch No:)</label>
									</div>
									<div class="col-xs-6">
										<input class="form-control text-center" value="<?php $var ='junior_batch_no'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"style="margin: 3px;" placeholder="Batch No" >
									</div>
								</div>
							</div>
							<div class="col-xs-2 brl text-center">
								<label class="pt7 pb8">At School/ class room</label>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt7 pb8">At Hospital</label>
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
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='misc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='misc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
							<?php $i++;}?>
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
		$(function() {
			$(".date-picker").datepicker( {
				format: "mm-yyyy",
				viewMode: "months", 
				minViewMode: "months"
			});
		});
		</script>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		
	</body>
</html>