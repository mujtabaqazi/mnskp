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
	  <title>Monitoring and Supervision Checklist for Social Mobilizers at Community || Form</title>
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
												<label class="pt7">Date of visit</label>
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
												<label class="pt7">Village</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="village"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="village"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">OTP/SFP</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="otp_sfp"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="otp_sfp"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
												<label class="pt7 pb2">Facility</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Facility Type</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.3</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">UC</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_UC_Name(get_Facility_UC_Name($DataRow->facode)):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Taluka</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">District</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "distcode"; echo isset($DataRow)?get_District_Name($DataRow->$var):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.6</label>
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
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Section No. 1</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1">
										<label class="pt14">Sr. No.</label>
									</div>
									<div class="col-sm-3 bl">
										<label class="pt14 pb14">Human Resource & Development</label>
									</div>
									<div class="col-sm-1 bl">
										<label class="pt8">Present (Yes/No)</label>
									</div>
									<div class="col-sm-3 bl">
										<div class="row bb">
											<div class="col-sm-12 text-center">
												<label>Trained on (Yes/No)</label>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3 text-center">
												<label>CMAM</label>
											</div>
											<div class="col-sm-3 brl text-center">
												<label>IYCF</label>
											</div>
											<div class="col-sm-2 text-center">
												<label>SC</label>
											</div>
											<div class="col-sm-2 brl text-center">
												<label>NIS</label>
											</div>
											<div class="col-sm-2 text-center">
												<label>NiE</label>
											</div>
										</div>
									</div>
									<div class="col-sm-1 bl">
										<label class="pt8">Present (Yes/No)</label>
									</div>
									<div class="col-sm-3 bl">
										<div class="row bb">
											<div class="col-sm-12 text-center">
												<label>Trained on (Yes/No)</label>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-3 text-center">
												<label>CMAM</label>
											</div>
											<div class="col-sm-3 brl text-center">
												<label>IYCF</label>
											</div>
											<div class="col-sm-2 text-center">
												<label>SC</label>
											</div>
											<div class="col-sm-2 brl text-center">
												<label>NIS</label>
											</div>
											<div class="col-sm-2 text-center">
												<label>NiE</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-xs-4">
										<label class="pt7 pb2"></label>
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label class="pt7 pb2">Total No of Staff working in OTP/SFP site:</label>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var="sw_count"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-3"></div>
									<div class="col-xs-1 ">
										<p><?php $var="sw_count"; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
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
										<label class="<?php echo( $index==3)?"pt7":"pt7 pb2";?>"><?php  echo $keys [$index-1]; ?></label>
									</div>
									<div class="col-xs-3">
									<?php if ( $index==3){?>
									
										<div class="row">
											<div class="col-xs-7">
												<label class="pt20"><?php echo $lables[$index-1]; ?></label>
											</div>
											<div class="col-xs-5">
												<div class="row">
													<div class="col-xs-12">
														<label class="pt9 pb2">Male</label>
													</div>
												</div>
												<div class="row">
													<div class="col-xs-12">
														<label class="pt9 pb2">Female</label>
													</div>
												</div>
											</div>
										</div>
									<?php }else{ ?>
										<label class="pt7 pb2"><?php echo $lables[$index-1]; ?></label>
									<?php } ?>
									</div>
									<?php for( $j=0; $j<$innerIndex;$j++){ ?> 
									<div class="col-xs-1 text-center">
										<p class=" pt7 <?php $var ='hrd_r'.$i.'_f1';echo get_yn_class($DataRow->$var);  ?>"><?php  echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-3 ">
										<div class="row">
											<div class="col-xs-3 text-center mn34">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f2';echo get_yn_class($DataRow->$var);  ?>">
												<?php  echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-3 text-center">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f3';echo get_yn_class($DataRow->$var);  ?>">
												<?php  echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-2 text-center mn34 zp">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f4';echo get_yn_class($DataRow->$var);  ?>">
												<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-2 text-center brl zp" style="border-color: #ffffff !important;">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f5';echo get_yn_class($DataRow->$var);  ?>">
												<?php  echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-2 text-center mn34 zp">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f6';echo get_yn_class($DataRow->$var);  ?>">
												<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-1 bg3 text-center">
										<p class="pt7 <?php $var ='hrd_r'.$i.'_f1';echo get_yn_class($CompareRow->$var);  ?>">
										<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-3 text-center bg3 mn34">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f2';echo get_yn_class($CompareRow->$var);  ?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-3 text-center bg3">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f3';echo get_yn_class($CompareRow->$var);  ?>">
												<?php  echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-2 text-center bg3 mn34 zp">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f4';echo get_yn_class($CompareRow->$var);  ?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-2 text-center bg3 brl zp" style="border-color: #ffffff !important;">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f5';echo get_yn_class($CompareRow->$var);  ?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-2 text-center bg3 mn34 zp">
												<p class="pt7 <?php $var ='hrd_r'.$i.'_f6';echo get_yn_class($CompareRow->$var);  ?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
										</div>
									</div>
									<?php $i++; } ?>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Section No. 2</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-6">
										<label>Appearance of OTP/SFP Site</label>
									</div>
									<div class="col-sm-3">
										<div class="row">
											<div class="col-sm-12 brl text-center">
												<label>Excellent / Satisfactory /Poor </label>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label>Excellent / Satisfactory /Poor </label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-12">
										<label>Functions</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-6">
										<label></label>
									</div>
									<div class="col-sm-3">
										<div class="row">
											<div class="col-sm-12 brl text-center">
												<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
											</div>
										</div>
									</div>
									<div class="col-sm-3">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
											</div>
										</div>
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
									<div class="col-sm-6 bc">
										<label>1. Waiting area</label>
									</div>
								</div>
								<?php }else { ?>
								<div class="row">
									<div class="col-xs-<?php echo ($index>26)?"5 col-xs-offset-1":"6"; ?>">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<?php if($index==26 ){}else{?>
									<div class="col-xs-1 col-xs-offset-1 text-center">
										<p class="pt7 <?php $var ='oss_r'.$i.'_f1'; echo get_sna_class($DataRow->$var); ?> ">
										<?php  echo isset($DataRow)?$DataRow->$var == 1 ? "Poor" : ($DataRow->$var == 2 ? "Satisfactory" : ($DataRow->$var == 3 ? "Excellent" : "")):'';?>
										</p>
									</div>
									<div class="col-xs-1 col-xs-offset-1 bg3">
										<p class="pt26">
										</p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php $var ='oss_r'.$i.'_f1'; echo get_sna_class($CompareRow->$var); ?> ">
										<?php  $var ='oss_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Poor" : ($CompareRow->$var == 2 ? "Satisfactory" : ($CompareRow->$var == 3 ? "Excellent" : "")):'';?>
										</p>
									</div>
									<div class="col-xs-1 bg3">
										<p class="pt26">
										</p>
									</div>
									<?php $i++; } ?>
								</div>
								<?php  } } ?>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Section No. 3</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-12">
										<label>Question & Observation</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1 br">
										<label>Sr. No.</label>
									</div>
									<div class="col-sm-5"></div>
									<div class="col-sm-1 brl text-center">
										<label>Yes / No </label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Yes / No </label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1 br">
										<label></label>
									</div>
									<div class="col-sm-5"></div>
									<div class="col-sm-3 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-sm-3  text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row mt1">
									<div class="col-sm-6 bc">
										<label>Anthropometric measurement/Observed</label>
									</div>
									<div class="col-sm-2"></div>
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
									<div class="col-sm-6 bc">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 "></div>
								</div>
								<?php  }else{ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1];?></label>
									</div>
									<div class="col-xs-5">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?> </label>
									</div>
									<div class="col-xs-1 text-center">
									   <p class="pt7 <?php $var ='qo_r'.$i.'_f1'; echo get_yn_class($DataRow->$var);?>">
									   <?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
									   </p>
									</div>
									<div class="col-xs-2 zp">
									   <p><?php $var ='qo_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
									   <p class="pt7 <?php $var ='qo_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var);?>">
									   <?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):''; ?>
									   </p>
									</div>
									<div class="col-xs-2 zp bg3">
									   <p><?php $var ='qo_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:'';  ?></p>
									</div>
								</div>
								<?php $i++; } } ?>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Section No. 4:</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-12">
										<label>Performance Indicators (Forms/Record/Registers)</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1">
										<label class="pt14">Sr. No.</label>
									</div>
									<div class="col-sm-5 brl text-center">
										<label class="pt14 pb14">Categories</label>
									</div>
									<div class="col-sm-1 text-center">
										<label class="pt14">OTP</label>
									</div>
									<div class="col-sm-2 brl">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label>SFP</label>
											</div>
										</div>
										<div class="row bt">
											<div class="col-sm-6 br text-center">
												<label>Children</label>
											</div>
											<div class="col-sm-6 text-center">
												<label>PLWs</label>
											</div>
										</div>
									</div>
									<div class="col-sm-1 text-center">
										<label class="pt14">OTP</label>
									</div>
									<div class="col-sm-2 bl">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label>SFP</label>
											</div>
										</div>
										<div class="row bt">
											<div class="col-sm-6 br text-center">
												<label>Children</label>
											</div>
											<div class="col-sm-6 text-center">
												<label>PLWs</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1">
										<label class="pt14"></label>
									</div>
									<div class="col-sm-5 text-center">
										<label class=""></label>
									</div>
									<div class="col-sm-3 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-sm-3 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
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
									<div class="col-xs-1 text-center">
										<p><?php $var ='pi_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-6 text-center">
												<p  class="pt7"><?php $var ='pi_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<div class="col-xs-6 text-center">
												<p  class="pt7"><?php $var ='pi_r'.$index.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='pi_r'.$index.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-6 text-center bg3">
												<p  class="pt7"><?php $var ='pi_r'.$index.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
											<div class="col-xs-6 text-center bg3">
												<p  class="pt7"><?php $var ='pi_r'.$index.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
										</div>
									</div>
								</div>
								<?php } ?>
								
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Section No. 5</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1 br">
										<label>Sr. No.</label>
									</div>
									<div class="col-sm-7 text-center">
										
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Yes / No </label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1 br">
										<label>Sr. No.</label>
									</div>
									<div class="col-sm-5">
										<label>CMAM Recording & Reporting Tools available</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Yes / No </label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Yes / No </label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1">
										<label></label>
									</div>
									<div class="col-sm-5"></div>
									<div class="col-sm-3 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-sm-3  text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row mt1">
									<div class="col-sm-6 bc">
										<label>Community Level</label>
									</div>
									<div class="col-xs-2 "></div>
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
									<div class="col-sm-6 bc">
									<label><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-2 "></div>
								</div>
									<?php }else{?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1];?></label>
									</div>
									<div class="col-xs-5">
										<label class="pt7 pb2"><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-1 text-center">
									   <p class="pt7 <?php $var ='rrt_r'.$i.'_f1'; echo get_yn_class($DataRow->$var);?>">
									   <?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
									   </p>
									</div>
									<div class="col-xs-2 zp">
									   <p><?php $var ='rrt_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
									   <p class="pt7 <?php $var ='rrt_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var);?>">
									   <?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):''; ?>
									   </p>
									</div>
									<div class="col-xs-2 zp bg3">
									   <p><?php $var ='rrt_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:'';  ?></p>
									</div>
								</div>
								<?php $i++; } }?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script>
			//$("#meet_date").datepicker({maxDate: 0});
		</script>
	</body>
</html>