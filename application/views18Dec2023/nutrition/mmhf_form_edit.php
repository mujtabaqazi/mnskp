<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monthly Monitoring Checklist of Health Facility || Form</title>
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
					Monthly Monitoring Checklist of Health Facility
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."nutrition/mmhf/save";
					$action .= isset($DataRow)?'/'.$id:'';
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$DataRow->fmonth);
					echo form_open_multipart($action,$attributes,$hidden); ?>
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
								<label class="pt7 pb2">Date of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >               
								<!-- <label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></label> -->
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
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Taluka</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">UC</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_UC_Name(get_Facility_UC_Name($DataRow->facode)):''; ?></label> 
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Village</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var="village"; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>" name="<?php echo $var;?>" class="form-control" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">OTP/SFP</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var="otp_sfp"; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>" name="<?php echo $var;?>" class="form-control" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Province</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section No. 1</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-1">
								<label class="pt14">Sr. No.</label>
							</div>
							<div class="col-xs-4 bl">
								<label class="pt14 pb12">Human Resource & Development</label>
							</div>
							<div class="col-xs-1 bl">
								<label class="pt6">Present (Yes/No)</label>
							</div>
							<div class="col-xs-6 bl">
								<div class="row bb">
									<div class="col-xs-12 text-center">
										<label>Trained on (Yes/No)</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3 text-center">
										<label>CMAM</label>
									</div>
									<div class="col-xs-3 brl text-center">
										<label>IYCF</label>
									</div>
									<div class="col-xs-2 text-center">
										<label>SC</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>NIS</label>
									</div>
									<div class="col-xs-2 text-center">
										<label>NiE</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<label class="pt7 pb2">Total No of Staff working in OTP/SFP site:</label>
							</div>
							<div class="col-xs-1 zp">
								<input value="<?php $var="sw_count"; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>" name="<?php echo $var;?>" class="form-control numberclass noDots" type="text">
							</div>
							<div class="col-xs-1"></div>
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-3 mn34 bg3"></div>
									<div class="col-xs-3"></div>
									<div class="col-xs-2 mn34 bg3"></div>
									<div class="col-xs-2"></div>
									<div class="col-xs-2 mn34 bg3"></div>
								</div>
							</div>
						</div>
						<?php 
						$lables=array(
							"Nutrition Assistant/LHV",
							"SFP Assistant",
							"Community Mobiliser",
							"IYCF Counsellor",
							"Store keeper",
						);
						$keys=array(
						"1",
						"2",
						"3",
						"4",
						"5"
						);
						$i=1;
						for ($index=1;$index<=count($lables);$index++){
							if ( $index==3 ){
								$innerIndex=2;
								}
							else{
								$innerIndex=1;
								}
						?>
						<div class="row">
							<div class="col-xs-1">
								<label class="<?php echo( $index==3)?"pt20":"pt7 pb2";?>"><?php  echo $keys [$index-1]; ?></label>
							</div>
							<div class="col-xs-4">
							<?php if ( $index==3){?>
							
								<div class="row">
									<div class="col-xs-7">
										<label class="pt20"><?php echo $lables[$index-1]; ?></label>
									</div>
									<div class="col-xs-5">
										<div class="row">
											<div class="col-xs-12">
												<label class="pt7 pb2">Male</label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<label class="pt5 pb2">Female</label>
											</div>
										</div>
									</div>
								</div>
							<?php }else{ ?>
								<label class="pt7 pb2"><?php echo $lables[$index-1]; ?></label>
							<?php } ?>
							</div>
							<?php for( $j=0; $j<$innerIndex;$j++){ ?> 
							<div class="col-xs-1">
								<div class="row">
									<div class="col-xs-6 zp text-center">
										<label>Yes</label>&nbsp;
										<input <?php $var ='hrd_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 zp text-center">
										<label>No</label>&nbsp;
										<input <?php $var ='hrd_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-3 text-center bg3 mn34">
										<div class="row">
											<div class="col-xs-6 zp text-center">
												<label>Yes</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-6 zp text-center">
												<label>Yes</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center bg3 mn34">
										<div class="row">
											<div class="col-xs-6 zp text-center">
												<label>Yes</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f4'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center">
										<div class="row">
											<div class="col-xs-6 zp text-center">
												<label>Yes</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f5'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center bg3 mn34">
										<div class="row">
											<div class="col-xs-6 zp text-center">
												<label>Yes</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='hrd_r'.$i.'_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $i++; } ?>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section No. 2</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-8 br">
								<label>Appearance of OTP/SFP Site</label>
							</div>
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-4 text-center">
										<label>Excellent</label>
									</div>
									<div class="col-xs-4 brl text-center">
										<label>Satisfactory</label>
									</div>
									<div class="col-xs-4 text-center">
										<label>Poor</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-12">
								<label>Functions</label>
							</div>
						</div>
						<?php 
						$labels=array(
							"1.	Waiting area",
							"i.	Shaded area for mothers to wait with adequate space-no overcrowding.",
							"ii.	Clean drinking water available",
							"iii.	Adequate number of staff are present to handle the number of beneficiaries",
							"iv.	A minimum of two key message posters are clearly visible (pasted at eye level) in the waiting area (The messages can be on hygiene promotion, anti-feeding bottles etc.)",
							"2.	Appetite test corner",
							"i.	Clean drinking water available.",
							"ii.	Availability of clean water to wash hands with soap.",
							"iii.	Comfortable seating arrangement is provided for mother and child.",
							"iv.	Appetite test is done according to protocol (Check one case on the spot)",
							"3.	Breastfeeding corner",
							"i.	BFC is adequately screened off",
							"ii.	Breast feeding corner:- Posters are pasted at eye level, designed in simple language carrying key messages",
							"iii.	Cups and spoons are present to replace feeding bottles",
							"iv.	BFC cards are present and all columns filled",
							"4.	Screening at static point (Health Facility)",
							"i.	Children are screened one at a time",
							"ii.	The waist of children below six months is examined", 
							"iii.	Token system is operating",
							"iv.	Donor funding symbols are clearly visible",
							"v.	Staff schedule is visible",
							"5.	Supplies: ",
							"i.	Organization of storage of supplies is orderly and above ground level ",
							"ii.	MUAC Tapes (At least 2) available",
							"iii.	Accurate scales - Check to ensure the scales are accurate with an object of known weight",
							"iv.	Following of the supplies and medicines are available and properly stored:",
							"a)	Calculator",
							"b)	Thermometer",
							"c)	Stop watch",
							"d)	Amoxicillin",
							"e)	Mebendazole",
							"f)	Vitamin A",
							"g)	Plumpy nut/ RUSF rations"
						);
						$i=1;
						$justLabels=array(
							1,
							6,
							11,
							16,
							22
						);
						for ($index=1;$index<=count($labels);$index++){
						if(in_array($index,$justLabels)){
						?>
						<div class="row mt1">
							<div class="col-xs-8 bc">
								<label>1. Waiting area</label>
							</div>
						</div>
						<?php }else { ?>
						<div class="row">
							<div class="col-xs-<?php echo ($index>26)?"7 col-xs-offset-1":"8"; ?>">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<?php if($index==26 ){}else{?>
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-4 text-center">
										<label>Excellent</label>&nbsp;
										<input <?php $var ='oss_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="3")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="3" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-center">
										<label>Satisfactory</label>&nbsp;
										<input <?php $var ='oss_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-center">
										<label>Poor</label>&nbsp;
										<input <?php $var ='oss_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php $i++; } ?>
						</div>
						<?php  } } ?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section No. 3</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-12">
								<label>Question & Observation</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-1 br">
								<label>Sr. No.</label>
							</div>
							<div class="col-xs-7"></div>
							<div class="col-xs-2 brl text-center">
								<label>Yes / No </label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Remarks</label>
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-8 bc">
								<label>Anthropometric measurement/Observed</label>
							</div>
							<div class="col-xs-2 bg3 mn25"></div>
						</div>
						<?php 
						$labels=array(
							"Grade of edema measured accurately",		
							"MUAC  measured accurately",		
							"Weight measured accurately",		
							"Height  measured accurately",		
							"Outpatient Therapeutic Program (OTP)",
							"Enrolment procedures and criteria are correct",		
							"Admission history is recorded accurately on OTP card",		
							"Medical examination is performed correctly and recorded", 		
							"Routine medicines are given correctly",		
							"Action protocol is used correctly",		
							"Children are correctly referred to inpatient care", 		
							"OTP card is filled correctly",		
							"Key messages are given correctly",		
							"Follow up history and examination are performed correctly", 		
							"Reasons for follow up are identified correctly",	
							"Links between health facility and community are established",		
							"Children absent or defaulted are followed up in community",		
							"Non responders are referred for medical investigation", 		
							"Exit procedures and criteria are correctly followed",		
							"Water for hand washing for care givers and OTP staff is available",		
							"A system exists for collecting medical wastes and other wastes",		
							"At least one health personnel is available for the OTP site",		
							"Supplementary Feeding Program (SFP)",
							"Enrolment procedures and criteria are correctly followed",
							"SFP routine medicines are available and given correctly",
							"Registration in SFP is recorded accurately",
							"SFP ration card is filled out accurately",
							"Exit procedure and criteria exist and correctly followed",
							"Key messages are given correctly"
						);
						$keys=array(
							1,
							2,
							3,
							4,
							1,
							2,
							3,
							4,
							5,
							6,
							7,
							8,
							9,
							10,
							11,
							12,
							13,
							14,
							15,
							16,
							17,
							1,
							2,
							3,
							4,
							5,
							6,
						);
						$i=1;
						for($index=1;$index<=count($labels);$index++){
						if($index==5 || $index==23){
						?>
						<div class="row">
							<div class="col-xs-8 bc">
								<label><?php echo $labels[$index-1]; ?></label>
							</div>
							<div class="col-xs-2 bg3 mn25"></div>
						</div>
						<?php  }else{ ?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $keys[$i-1];?></label>
							</div>
							<div class="col-xs-7">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?> </label>
							</div>
							<div class="col-xs-2 bg3 mn34">
								<div class="row">
									<div class="col-xs-6 text-center">
										<label>Yes</label>&nbsp;
										<input <?php $var ='qo_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-center">
										<label>No</label>&nbsp;
										<input <?php $var ='qo_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control " value="<?php $var ='qo_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php $i++; } } ?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section No. 4:</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-12">
								<label>Performance Indicators (Forms/Record/Registers)</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-1">
								<label class="pt14">Sr. No.</label>
							</div>
							<div class="col-xs-5 brl text-center">
								<label class="pt14 pb12">Categories</label>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt14">OTP</label>
							</div>
							<div class="col-xs-4 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>SFP</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br text-center">
										<label>Children</label>
									</div>
									<div class="col-xs-6 text-center">
										<label>PLWs</label>
									</div>
								</div>
							</div>
						</div>
						<?php $labels=array(
							"Total Registration",
							"Cured Discharged",
							"Transfer out",
							"Transfer to OTP (for SFP Patients)",
							"Transfer to SFP(for OTP Patients)",
							"Transfer to SC",
							"Defaults",
							"Deaths",
							"Non Recovered",
							"Total exits",
							"Remaining in program",
						); 
						$keys=array(
							1,
							2,
							3,
							4,
							5,
							6,
							7,
							8,
							9,
							10,
							11,
						);
						for($index=1;$index<=count($labels);$index++){
						?>
						
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $keys[$index-1]; ?></label>
							</div>
							<div class="col-xs-5">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='pi_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-6 zp">
										<input class="form-control numberclass noDots" value="<?php $var ='pi_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control numberclass noDots" value="<?php $var ='pi_r'.$index.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section No. 5</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-1 br">
								<label>Sr. No.</label>
							</div>
							<div class="col-xs-7 text-center">
								<label>CMAM Recording & Reporting Tools available</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Yes / No </label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Remarks</label>
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-8 bc">
								<label>Community Level</label>
							</div>
							<div class="col-xs-2 bg3 mn25"></div>
						</div>
						<?php 
						$labels= array(
									"Screening forms Children (6- 59 Months)",	
									"Screening forms Pregnant & Lactating Women",	
									"Referral slip to OTP/SFP Children (6- 59 Months)",	
									"Referral slip to SFP Pregnant & Lactating Women",	
									"Home visit form for absence, default or follow up",	
									"Confirm randomly selected SAM and MAM children with MUAC",  	
									"Confirm randomly selected PLW with MUAC",	
									"OTP Level Records",
									"Screening Register Children (6-59 Months)",	
									"Screening Register Pregnant & Lactating Women",	
									"OTP Admission & Follow-up form",	
									"OTP Ration Card & Register",	
									"Referral slip from OTP to SFP",	
									"Transfer slip from OTP to inpatient-SAM",	
									"Daily/Weekly tally sheets",	
									"Weekly/Monthly Statistical Report for OTP/SC",	
									"SFP Level Records",
									"SFP Registration Card&ndash; Children",	
									"SFP Ration Card &ndash;Children",	
									"SFP Registration Card &ndash; PLW",	
									"SFP Ration Card &ndash;PLW",	
									"Referral slip SFP to OTP &ndash; Children",	
									"SFP Tally Sheet- Children",	
									"SFP Tally Sheet- PLW",	
									"Weekly/Monthly Statistical Report for SFP",	
									"Stock is stored correctly",	
									"Supply gap more than 15 days during reported period"	
						); 
						$keys=array(
							1,
							2,
							3,
							4,
							5,
							6,
							7,
							1,
							2,
							3,
							4,
							5,
							6,
							7,
							8,
							1,
							2,
							3,
							4,
							5,
							6,
							7,
							8,
							9,
							10,
						);
						$i=1;
						for($index=1;$index<=count($labels);$index++){
							if($index==8||$index==17){
						?>
						<div class="row mt1">
							<div class="col-xs-8 bc">
							<label><?php echo $labels[$index-1];?></label>
							</div>
							<div class="col-xs-2 bg3 mn25"></div>
						</div>
							<?php }else{?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $keys[$i-1];?></label>
							</div>
							<div class="col-xs-7">
								<label class="pt7 pb2"><?php echo $labels[$index-1];?></label>
							</div>
							<div class="col-xs-2 bg3 mn34">
								<div class="row">
									<div class="col-xs-6 text-center">
										<label>Yes</label>&nbsp;
										<input <?php $var ='rrt_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-center">
										<label>No</label>&nbsp;
										<input <?php $var ='rrt_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control " value="<?php $var ='rrt_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php $i++; } }?>
					</div><!--end of div rowlightbg-->
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
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		<script>
			//$("#meet_date").datepicker({maxDate: 0});
		</script>
	</body>
</html>
