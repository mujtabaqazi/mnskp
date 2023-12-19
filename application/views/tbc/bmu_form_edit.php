<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monitoring Evaluation Checklist for Basic Management Unit (BMU) || Form</title>
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
					Monitoring Evaluation Checklist for Basic Management Unit (BMU)
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."tbc/bmu/save";
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
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
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
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
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
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of BMU</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " required id="" name="bmu_name" value="<?php $var="bmu_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Total medical staff</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control numberclass noDots" required id="" name="ms_count" value="<?php $var="ms_count"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of M&E Officer</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control  " required id="" name="meo_name" value="<?php $var="meo_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Date of last visit</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control dp anyOtherDate" required id="" name="dolv" value="<?php $var="dolv"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):'';?>" type="text" placeholder="" />
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date of current visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" type="text" class="form-control dp1">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Period under review</label>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 pr0">
										<select class="form-control zp cf11" name="pur">
											<option value="">Select </option>
											<option value="1" <?php echo (isset($DataRow)&& $DataRow->pur==1)?'selected':''; ?>>1st quarter</option>
											<option value="2" <?php echo (isset($DataRow)&& $DataRow->pur==2)?'selected':''; ?>>2nd quarter</option>
											<option value="3" <?php echo (isset($DataRow)&& $DataRow->pur==3)?'selected':''; ?>>3rd quarter</option>
											<option value="4" <?php echo (isset($DataRow)&& $DataRow->pur==4)?'selected':''; ?>>4th quarter</option>
										</select>
									</div>
									<div class="col-xs-6 pl0">
										<input class="form-control yp anyOtherDate" required id="" name="pyear" value="<?php $var="pyear"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
									</div>
								</div>
							</div>
						</div>	
						<div class="row bc mt15">
							<div class="col-xs-7">
								<label>General Information</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label>Response</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Remarks</label>
							</div>
						</div>
						<?php
						$lables=array(
							"1.	Important findings of desk review of BMU performed by the monitor before conducting field visit",
							"2.	Population of BMU (including catchment population of treatment centers) if applicable.",
							"3.	NTP Branding (TB sign board/direction board available and displayed)",
							"4.	No. of treatment centers attached",
							"5.	No. of treatment centers referring presumptive TB cases (suspects)",
							"6.	Health education messages displayed in patient waiting area",
							"7. National TB guidelines and training material for DOTS staff (training module and desk guide) available",
							"FUNCTIONAL/REPORTING STATUS OF BMU",
							"8.	Laboratory is functional",
							"9.	Presumptive TB cases are being identified in OPD",
							"10. Functional  weighing scale is available in OPD",
							"11. DOTS staff available",
							"12. RR tools are being used as per revised definitions and reporting framework-2013",
							"13. All TB case management record (OPD register, contact register, TB01, 03, 04, 05, 06, 07 , 08, 09 etc.) available",
							"14. All of the above management records are up to date for last month",
							"15. Patient identifier code practiced in RR tools for last month",
							"16. Quarterly reports (TB07, 09)available and tallied with record for last quarter",
							"17. Quarterly lab report available and tallied with record for last quarter",
							"18. Smoking status recorded at start of treatment in TB01, TB02 & TB03",
							"19. Smoking cessation advice recorded in TB01, TB02, TB03",
							"20. Smoking status recorded at treatment completion in TB01, TB02, TB04",
							"CASE MANAGEMENT PRACTICES",
							"21. Source of referral of presumptive TB cases (community/LHW/BHU/other) recorded",
							"22. # of TB presumptive TB cases highlighted in OPD register",
							"23. # of presumptive TB cases reported in DHIS report",
							"24. # of Previously Treated Cases (PTCs) referred for examination in lab",
							"25. # of PTC confirmed as B+ through Gene-Expert (cross check with TB04)",
							"TRAINING STATUS OF DOTS STAFF",
							"26. Number of untrained staff (Name & Designation, place of posting)",
							"27. Number trained within last two years",
							"28. Number of refresher trainings conducted for staff trained > 2 years",
							"29. Number of trainings on revised case definitions conducted",
						);
						$only_lable = array(
							8,
							22,
							28
						);
						$number_input=array(
							2,
							4,
							5,
							29,
							30,
							31,
							32
						);
						$neversome_input=array(
							15,
							16,
							23,
							24,
							25,
							26,
							27
						);
						$yesno_input=array(
							3,
							6,
							7,
							9,
							10,
							11,
							12,
							13,
							14,
							17,
							18,
							19,
							20,
							21
						);
						$i=1;
						for($index=1;$index<=count($lables);$index++){
							if(in_array($index,$only_lable)){ ?>
						<div class="row">
							<div class="col-xs-7 bc">
								<label><?php echo $lables[$index-1]; ?> </label>
							</div>

						</div>
						<?php } else {?>
						<div class="row">
							<div class="col-xs-7">
								<label class="pt7 pb2"><?php echo $lables[$index-1]; ?></label>
							</div>
							<div class="col-xs-3 zp">
								<?php if(in_array($index,$neversome_input)){ ?>
								<div class="row">
									<div class="col-xs-3 text-right zp">
										<label><?php echo ($index==15)?"None":"Never"; ?></label>&nbsp;
										<input <?php $var ='bi1_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-5 text-center zp">
										<label><?php echo ($index==15)?"Some":"Sometimes"; ?></label>&nbsp;
										<input <?php $var ='bi1_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-left zp">
										<label><?php echo ($index==15)?"All":"Always"; ?></label>&nbsp;
										<input <?php $var ='bi1_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="3")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="3" class="mt9" type="radio">
									</div>
								</div>
								<?php } else if(in_array($index,$yesno_input)){?>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='bi1_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='bi1_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
								<?php } else { ?>
								<input class="form-control <?php echo (in_array($index,$number_input))?"numberclass noDots":""?>" value="<?php $var ='bi1_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php } ?>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='bi1_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php $i++; } 
						} ?>
						<div class="row">
							<div class="col-xs-7">
								<label class="pt7 pb2">30. Tobacco cessation advice training done</label>
							</div>
							<div class="col-xs-3 zp">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Basic</label>&nbsp;
										<input <?php $var ='basic'; ?> name="<?php echo $var; ?>" id="basic" value="basic" <?php echo (isset($DataRow) && $DataRow->$var == 'basic')?'checked="checked"':''; ?>  class="mt9" type="checkbox">
									</div>
									<div class="col-xs-6 text-left">
										<label>Refresher</label>&nbsp;
										<input <?php $var ='refresher'; ?> name="<?php echo $var; ?>" id="refresher" value="refresher" <?php echo (isset($DataRow) && $DataRow->$var == 'refresher')?'checked="checked"':''; ?>  class="mt9" type="checkbox">
									</div>
								</div>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='bi1_r30_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-7 bc">
								<label>MONITORING & EVALUATION</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-12">
										<label class="pt32">31. M&E visits conducted during quarter under review (by whom with date) Feedback given on relevant record and shared with BMU staff</label>
									</div>
								</div>
							</div>
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label class="pt7 pb2">Name of monitor</label>
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control" value="<?php $var ='memonitor_name'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label class="pt7 pb2">Date</label>
									</div>
									<div class="col-xs-6 zp">
										<input class="dp form-control anyOtherDate" value="<?php $var ='medov'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label class="pt7 pb2">Feedback given</label>
									</div>
									<div class="col-xs-6 zp">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Yes</label>&nbsp;
												<input <?php $var ='mefeed_back'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 text-left">
												<label>No</label>&nbsp;
												<input <?php $var ='mefeed_back'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label class="pt7 pb2">If yes, mode of feedback</label>
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control" value="<?php $var ='memod_feed'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='meremarks'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text" placeholder="Remarks" style="min-height: 136px; text-align: center;">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-7 bc">
								<label>TREATMENT SUPPORTERS</label>
							</div>
						</div>
						<?php 
						$labeles=array(
							"32.	# of TB cases registered at BMU during quarter under review",
							"33.	# of TB cases provided with 'DOT' ",
							"34.	% of TB cases provided with 'DOT'",
							"LABORATORY",
							"35.	Lab staff is available and properly trained",
							"36.	Lab properly ventilated & exhaust fan functional",
							"37.	Facility for hand washing available and functioning",
							"38.	Senior Lab Supervisor (SLS) visited the lab during quarter under review and feedback documented",
							"39.	District Lab Supervisor (DLS) visited the lab during quarter under review and feedback documented",
							"40.	Laboratory Manual available and accessible in lab",
							"41.	Lab charts (smearing /staining/grading) and lab SOP displayed",
							"42.	Smears are properly prepared, stored and labeled", 
							"43.	All examined slides properly stained",
							"44.	All examined slides stored in serial order",
							"45.	Type of Microscope being used",
							"46.	Average slides processed per day (Lab work load measure)",
							"47.	TB 04 register properly maintained (diagnostic and follow up results entered in TB04 and TB03 (please cross check))",
							"48.	Availability of lab reagents in the reviewing period (for both AFB and LED microscopy.)",
							"49.	Availability of other lab supplies (sputum cups/slides etc.)",
							"50.	Lab is under External Quality Assurance (EQA)",
							"51.	EQA reports for previous quarter are available",
							"52.	# of PTC confirmed as B+ through AFB/LED Microscopy (cross check with TB03)",
							"HH CONTACT MANAGEMENT",
							"53.	# of HH contacts of all pulmonary TB cases entered in TB01 forms",
							"54.	# of HH contacts screened",
							"55.	HH Contact Screening Rate (HH contacts screened/# of HH contactsx100)",
							"56.	# HH contacts confirmed as TB cases",
							"57.	HH Contact Detection Rate (confirmed TB cases/Number of HH contacts screenedx100)",
							"GENE-EXPERT SCREENING",
							"58.	# of eligible presumptive TB cases for Gene-Expert screening",
							"59.	# of presumptive TB cases referred for Gene-Expert",
							"60.	# of cases confirmed as RR cases",
							"61.	# of staff trained on referring protocols for Gene-Expert screening",
							"62.	Referral and transport mechanism exists and R/R tools available",
							"63.	Feedback system in place for Rif Res/DR-TB cases",
							"INFECTION CONTROL",
							"64.	Use of safety measures (mask, gloves, cap etc.) by health staff/patients.", 
							"65.	Arrangement for ventilation and sunlight/UV lights in OPD",
							"66.	Space available for sputum collection",
							"67.	Arrangements for safe disposal of sputum (if yes, specify)",
							"68.	Infection control measures practiced in BMU lab",
							"69.	Triage for TB cases visiting for follow up",
							"TB DRUG MANAGEMENT",
							"70.	Facility storekeeper trained in logistic management",
							"71.	Ceiling fan available",
							"72.	Exhaust fan available and functional in drug store",
							"73.	Standardized storage/distribution/indenting practices observed",
							"74.	Condition of drug store satisfactory (walls, roof, floor, ventilation, sunlight, seepage, security etc.)",
							"75.	No. of courses of ATT drugs (adult/children) matching the requirement. (please specify in case of shortage/expiry)",
							"76.	Matching quantity of PPD vials (availability is according to the requirement) in the quarter under review",
							"77.	Refrigerator facility for PPD vials available",
							"78.	Updated inventory record /bin cards/vouchers)", 
							"CHILDHOOD TB (0-14 years)",
							"79.	Childhood TB case management guidelines developed /implemented",
							"80.	# pf facility staff trained on childhood TB management guidelines",
							"81.	Children screened/evaluated according to guidelines",
							"82.	Separate TB 03 maintained for children",
							"83.	PPA scoring chart available and record maintained",
							"84.	# of presumptive TB cases in children screened during quarter under review", 
							"85.	# of childhood TB cases detected during quarter under review",
							"86.	INH preventive therapy is employed and documented",
							"87.	PPD administration register is available",
							"88.	# of staff trained on PPD administration and reading result",
							"HOSPITAL DOTS LINKAGES & ADULT DIFFICULT TO DIAGNOSE TB CASES",
							"89.	Availability of guidelines on adult difficult to diagnose TB cases at the facility",
							"90.	Training status of staff on ADD guidelines",
							"91.	Status of ADD case management practices as per NTP protocols?",
							"92.	Evidence based diagnosis is made  for extra-pulmonary/pulmonary/NSS-Ve cases ",
							"93.	Lab procedures/investigations are performed for target cases in the facility", 
							"94.	Linkages amongst different units within the facility",
							"95.	Linkages outside the facility ",
							"96.	Referral record (pre-registration and transfer out) available & maintained",
							"97.	Record maintained for diagnosis and management of ADD TB cases",
							"TB HIV CO-INFECTION (if applicable)",
							"98.	BMU is a TB/HIV sentinel site",
							"99.	ART center of NACP is available in facility",
							"100.	Coordination B/W BMU staff & ART center staff exist",
							"101.	Availability of trained staff  for TB/HIV  activities",
							"102.	TB cases are counseled and screened for HIV",
							"103.	TB cases are marked in TB 03 counseled and screened for HIV",
							"104.	# of TB cases confirmed as HIV positive",
							"105.	# of HIV+ cases screened for TB",
							"106.	# of TB cases detected out of HIV+ screened",
							"107.	# of HIV+ cases receiving IPT",
							"108.	TB HIV register maintained and reports available", 
							"109.	HIV kits and syringes are available",
							"110.	Waste (syringes) is  properly disposed",
							"111.	Refrigerator is available",  
							"112.	Functioning for HIV kits",
							"113.	No. of TB patients, who were smokers at the start of treatment in last quarter",
							"114.	No of TB patients, given smoking cessation advice in the last quarter",
							"115.	No of TB patients, who had quit smoking at the treatment completion in the last quarter"
						);
						$i=1;
						for($index=1;$index<= count($labeles);$index++){
							if($index==4||$index==23||$index==29||$index==36||$index==43||$index==53||$index==64||$index==74){
						?>
						<div class="row">
							<div class="col-xs-7 bc">
								<label><?php echo $labeles[$index-1]; ?></label>
							</div>
						</div>
						<?php } else{ ?>
						<div class="row">
							<div class="col-xs-7">
								<label class="pt7 pb2"><?php echo $labeles[$index-1]; ?></label>
							</div>
							<div class="col-xs-3 zp">
								<?php if ($index==1||$index==2||$index==3||$index==16||$index==19||($index>21 && $index<34 )||$index==49||$index==55||$index==59||$index==60||$index==63||($index>80 && $index<85 )||($index>89 && $index<93 )){ ?>
								<input class="form-control <?php echo ($index==19)?'':'numberclass noDots';?> " value="<?php $var ='bi2_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php }else{?>
								<div class="row">
									<?php if ($index==17 || $index== 48 ||$index==69) { ?>
							
									<div class="col-xs-3 text-right zp">
										<label><?php echo ($index==69)?"Never":"Poor"; ?></label>&nbsp;
										<input <?php $var ='bi2_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-5 text-center zp">
										<label><?php echo ($index==69)?"Sometimes":"Fair"; ?></label>&nbsp;
										<input <?php $var ='bi2_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-left zp">
										<label><?php echo ($index==69)?"Always":"Good"; ?></label>&nbsp;
										<input <?php $var ='bi2_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="3")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="3" class="mt9" type="radio">
									</div>
									<?php } else { ?>
									<div class="col-xs-6 text-right">
										<label><?php  if ($index== 15) {echo "Binocular";}else if ($index==70||$index==71) { echo "Strong";} else if  ($index==72||$index==73||$index==85) { echo "Available" ;}else {echo "Yes";} ?></label>&nbsp;
										<input <?php $var ='bi2_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label><?php  if ($index== 15) {echo "LED";}else if ($index==70||$index==71) { echo "Weak";} else if  ($index==72||$index==73||$index==85) { echo "Maintained" ;}else {echo "No";} ?></label>&nbsp;
										<input <?php $var ='bi2_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
									<?php } ?>
								</div>
								<?php } ?>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='bi2_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php $i++; } } ?>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 12px;">116. Gene-Expert Screening <br>(if applicabble) </td>
											<td>
											<input placeholder="Gene-Expert Screening" value="<?php $var ='gene_expert'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 10px;">117. Hospital DOTS Linkages & Adult Difficult to Diagnose TB CASES <br>(if applicable) </td>
											<td>
											<input placeholder="Hospital DOTS Linkages & Adult Difficult to Diagnose TB CASES" value="<?php $var ='hosp_dots_linkages'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 100px;" type="text">
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 10px;">118. TB-HIV Co-Infection <br>(if applicable) </td>
											<td>
											<input placeholder="TB-HIV Co-Infection" value="<?php $var ='tb_hiv_coinfection'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">119. TB & Tobacco </td>
											<td>
											<input placeholder="TB & Tobacco" value="<?php $var ='tb_and_tobacco'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>120. OBSERVATIONS & ISSUES and RECOMMENDATIONS (not more than 3/4 bullets)</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Observations </td>
											<td>
											<input placeholder="Observations" value="<?php $var ='observations'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues </td>
											<td>
											<input placeholder="Issues" value="<?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Recommendations </td>
											<td>
											<input placeholder="Recommendations" value="<?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
					</div><!--end of div rowlightbg-->
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-file"></i> Save Form
							</button>
							<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-floppy-o"></i> Submit Form
							</button>
							<a class="btn btn-primary btn-md btncc" onclick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
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
			$(".yp").datepicker({
				format: " yyyy",
				viewMode: "years", 
				minViewMode: "years"
			});			
		</script>
	</body>
</html>