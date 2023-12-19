<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$userId = $this -> session -> id;
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>CMW Technical Monitoring || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> CMW Technical Monitoring Checklist</div>
				<div class="panel-body">
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
							<div class="row">
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.2</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Time of visit</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="tov"; echo isset($DataRow)?getNewDateFormat(date("H:i",strtotime($DataRow->$var))):''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="tov"; echo isset($CompareRow)?getNewDateFormat(date("H:i",strtotime($CompareRow->$var))):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.3</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Name of the Supervisor</label>
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
											<label class="pt7">1.4</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Designation</label>
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
											<label class="pt7">1.5</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Catchment Area Population</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="population"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="population"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.6</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Address of CMW</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="address"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="address"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl text-center">
										<label>Identification</label>
									</div>
								</div>
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.1</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">CMW ID</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?$DataRow->cmwcode:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.2</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Reporting Facility</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?$DataRow->facode.'-'.get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.3</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">CMW  Name</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?get_CMW_Name($DataRow->cmwcode):''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.4</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Union Council</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php $var = "uncode"; echo isset($DataRow)?get_UC_Name($DataRow->$var):''; ?></p>
								</div>
							</div>
							
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.5</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Tehsil</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php $var = "tcode"; echo isset($DataRow)?get_Tehsil_Name($DataRow->$var):''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.6</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">District</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php $var = "distcode"; echo isset($DataRow)?get_District_Name($DataRow->$var):''; ?></p>
								</div>
							</div>
						
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section II: INTERPERSONAL RELATIONS OF CMW</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-10 text-center">
									<label class="pt14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$labels = array(
								'Greet the client & other family members',
								'Speaks in easy to understand language for the client',
								'Review client’s previous records',
								'Encourage client to ask questions',
								'Responds to Questions using easy to understand language for the client',
								'Use appropriate IEC materials',
								'Wash hands before and after client contact',
								'Score: (Total of “Yes” Responses)'
							);
							$index = 1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-10">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==8){?>
											<p><?php $var ='ir_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<?php $var ='ir_r'.$index.'_f1'; echo get_yn_class($DataRow->$var);?>">
													<?php $var ='ir_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==8){?>
											<p><?php $var ='ir_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;" class="<?php $var ='ir_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var);?>">
													<?php $var ='ir_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							} 
							?>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section III: INFECTION PREVENTION</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 br text-center">
								<label class="pt14 pb14">Indicator</label>
								</div>
								<div class="col-xs-9 text-center">
									<label class="pt14 pb14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$keys = array(
								'1.',
								'1.1',
								'1.2',
								'2.',
								'2.1',
								'2.2',
								'2.3',
								'2.4',
								'3.',
								'3.1',
								'3.2',
								'3.3',
								'3.4',
								''
							);
							$labels = array(
								'Working station is clean',
								'Observe the room free of trash, spider web, blood, dust and sharps',
								'Washing area for used instruments/sterilization and high-level disinfection (HLD) processing area',
								'Instruments processing for decontamination and other articles (immediately after use)',
								'Decontamination of instruments immediately after procedure (delivery/IUCD insertion, etc.) with 0.5% chlorine solution for 10 minutes',
								'Cleaning of instruments with brush and soapy water after decontamination',
								'High level disinfection: instruments are boiled for 20 minutes starting from the time a rolling boil begins OR using autoclave',
								'HLD/sterilized packs stored properly with expiration dates on them',
								'Waste is collected and disposed of properly to avoid injuries and contamination',
								'Containers with sharps are incinerated',
								'Solid waste (used dressings and other materials contaminated with blood and organic matter) are incinerated/buried',
								'Contaminated liquid waste (blood, urine and other body fluids) are disposed into a toilet or sink and sink is rinsed with water',
								'Placenta is disposed in placenta pit',
								'Score: (Total of “Yes” Responses)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="col-xs-9">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==1 || $i==4 || $i==9){}else if($i==14){?>
											<p><?php $var ='ip_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;" class="<? $var ='ip_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==1 || $i==4 || $i==9){}else if($i==14){?>
											<p><?php $var ='ip_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;" class="<? $var ='ip_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='ip_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							}?>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section IV-A—ANTENATAL EXAMINATION</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 br text-center">
								<label class="pt14 pb14">S. No</label>
								</div>
								<div class="col-xs-9 text-center">
									<label class="pt14 pb14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$keys = array(
								'1.',
								'1.1',
								'1.1.1',
								'1.1.2',
								'1.1.3',
								'1.1.4',
								'1.2',
								'1.2.1',
								'1.2.2',
								'1.2.3',
								'1.2.4',
								'1.2.5',
								'1.2.6',
								'1.2.7',
								'2.',
								'2.1',
								'2.2',
								'2.3',
								'2.4',
								'2.5',
								'3.',
								'3.1',
								'3.2',
								'3.3',
								'3.4',
								'3.5',
								'3.6',
								'4.',
								'4.1',
								'4.2',
								'4.3',
								'5.',
								'5.1',
								'6.',
								'6.1',
								'6.1.a',
								'6.1.b',
								'6.1.c',
								'6.1.d',
								'6.2',
								'6.3',
								'6.4',
								'6.5',
								''
							);
							$labels = array(
								'Pregnant women are attending FANC according to recommended schedule of ANC visits',
								'CMWs follows WHO-recommended schedule of ANC visits',
								'1st visit: <16 weeks',
								'2nd visit: 24–28 weeks',
								'3rd visit: 30–32 weeks',
								'4th visit: 36–38 weeks',
								'Asks about and records danger signs that the woman may have, or has had',
								'Vaginal bleeding',
								'Respiratory difficulty',
								'Fever',
								'Severe headache',
								'Blurred vision',
								'Severe abdominal pain',
								'Convulsions/loss of consciousness',
								'CMW takes proper History of the client and document',
								'Asks about parity and Number of living children',
								'Takes history of Ante partum hemorrhage, Postpartum hemorrhage, convulsions, Operative (C-Section) delivery, Still birth, Place of last delivery',
								'Takes history of Medical problems (e.g., Diabetes, TB, Hypertension, Jaundice)',
								'CMW properly documents the information on Card and register',
								'CMW calculates the estimated date of delivery according to her last menstrual period at her first antenatal visit and documents it',
								'The CMW properly conducts obstetric physical exam of the pregnant woman',
								'Measures vital signs (blood pressure, temperature, pulse respiration and weight)',
								'Conjunctiva and palm of hand for signs of anemia',
								'Explains the procedure to the woman and ensures that the bladder is empty before examination',
								'Measures fundal height (after 12 weeks)',
								'Listens to fetal heart sounds (after 20 weeks)',
								'Determines fetal lie and presentation (after 36 weeks)',
								'CMW requests laboratory tests according to the protocols',
								'CMW requests laboratory tests according to the protocols',
								'Routine investigation (blood group and Rh factor, hemoglobin, blood glucose and Urine analysis for protein urea)',
								'Specific investigation if needed (i.e., hepatitis B, hepatitis C)',
								'The CMW refer all pregnant women for TT Shots',
								'Refer the client to near health facility for TT vaccine',
								'CMW properly plans for birth and complication readiness',
								'While talking about the Birth Preparedness Plan with the client, following were discussed',
								'Delivery by SBA',
								'Delivery location',
								'How the couple / family will pay for services',
								'Transportation',
								'Counsel about danger signs and symptoms of labour',
								'Counsel about taking Iron, folate, calcium during pregnancy',
								'Counsel about hygiene, nutrition, rest, FP during pregnancy',
								'Prescribe and instruct Misoprostol as AMTSL in case of home delivery',
								'Score:(Total from Section IV-A)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="<?php if(($i>=3 && $i<=6) || ($i>=8 && $i<=14) || ($i>=36 && $i<=39)){echo 'col-xs-8 col-xs-offset-1';}else{echo 'col-xs-9';} ?>">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==1 || $i==2 || $i==7 || $i==15 || $i==21 || $i==28 || $i==32 || $i==34 || $i==35){}else if($i==44){?>
											<p><?php $var ='ae_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='ae_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='ae_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==1 || $i==2 || $i==7 || $i==15 || $i==21 || $i==28 || $i==32 || $i==34 || $i==35){}else if($i==44){?>
											<p><?php $var ='ae_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='ae_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='ae_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							}?>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section IV  B—Normal Labour with use of Partograph and AMTSL</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 br text-center">
								<label class="pt14 pb14">S. No</label>
								</div>
								<div class="col-xs-9 text-center">
									<label class="pt14 pb14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$keys = array(
								'1.',
								'1.1',
								'1.2',
								'1.3',
								'1.4',
								'1.5',
								'2.',
								'2.1',
								'2.2',
								'2.3',
								'2.4',
								''
							);
							$labels = array(
								'All women in labor are monitored with a partograph that is complete and accurate (Starts at 4cm cervical dilatation)',
								'Fetal heart rate',
								'Labor progress: cervical dilatation',
								'Strength and frequency of contractions',
								'Oxytocin, when used',
								'Maternal pulse and blood pressure',
								'AMTSL is performed for all women during childbirth',
								'Provide uterotonic*within one minute after the baby is born (3 tablets of Misoprostol in-case Oxytocin not available',
								'Refrigeration available for oxytocin storage ?',
								'Controlled cord traction (CCT)',
								'Uterine massage after delivery of placenta',
								'Score:(Total from Section IV-B)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="col-xs-9">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==1 || $i==7){}else if($i==12){?>
											<p><?php $var ='nc_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='ae_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='nc_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==1 || $i==7){}else if($i==12){?>
											<p><?php $var ='nc_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='nc_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='nc_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							}?>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section IV  C—IMMEDIATE CARE OF NEWBORN</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 br text-center">
								<label class="pt14 pb14">S. No</label>
								</div>
								<div class="col-xs-9 text-center">
									<label class="pt14 pb14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$keys = array(
								'1.',
								'1.1',
								'1.2',
								'1.3',
								'1.4',
								'2.',
								'2.1',
								'2.2',
								'2.3',
								'2.4',
								'3.',
								'3.1',
								'3.2',
								'3.3',
								'3.4',
								'3.5',
								'3.6',
								'3.7',
								'3.8',
								'3.9',
								'3.10',
								'4.',
								'4.1',
								'4.2',
								'4.3',
								''
							);
							$labels = array(
								'Routine immediate care of a newborn is properly performed',
								'Thoroughly dries baby, stimulates baby and covers baby’s head immediately',
								'Assesses breathing',
								'Places baby on mother’s chest in skin-to-skin contact and start breastfeeding',
								'Applies CHX to the cord stump',
								'The CMWs properly conducts a newborn exam',
								'Weighs the baby',
								'Counts respiration (normal 30 to 60 per minute)',
								'Measures axillary temperature ( 36.5–37.5)',
								'Performs head-to-toe examination of baby',
								'The CMWs advises the mother about danger signs and Routine Care',
								'Convulsions and lethargic or unconscious',
								'Vomits everything or sucking or feeding poorly',
								'Any problems with breathing',
								'Hot to touch or very cold to touch',
								'Any oozing from the umbilical stump (pus, clear or blood)',
								'Tell the mother or family about delayed bathing (24 hours when temperature established)',
								'Counsel the mother to not apply anything except Chlorhexidine',
								'Counsel the mother to initiate breast feeding',
								'Counsel the mother for exclusive breast feeding',
								'Counsel the mother for immunization',
								'Helping Babies Breathe (HBB) Equipment and supplies are available at delivery side and ready to use',
								'Labor room has resuscitation/ventilation area with all HBB equipment and supplies',
								'HBB action plan displayed in labor room',
								'Provider successfully performs 7 steps of bag/mask use',
								'Score:(Total from Section IV-C)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="col-xs-9">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==1 || $i==6 || $i==11 || $i==22){}else if($i==26){?>
											<p><?php $var ='ic_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='ic_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='ic_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==1 || $i==6 || $i==11 || $i==22){}else if($i==26){?>
											<p><?php $var ='ic_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='ic_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='ic_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							}?>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section IV-D  POST NATAL CARE</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 br text-center">
								<label class="pt14 pb14">S. No</label>
								</div>
								<div class="col-xs-9 text-center">
									<label class="pt14 pb14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$keys = array(
								'1.',
								'1.1',
								'1.2',
								'1.3',
								'1.4',
								'1.5',
								'2.',
								'2.1',
								'2.2',
								'2.3',
								'2.3.a',
								'2.3.b',
								'2.3.c',
								'2.3.d',
								'2.3.e',
								'2.3.f',
								'2.3.g',
								'2.3.h',
								''
							);
							$labels = array(
								'CMW conducts a routine physical exam of the postnatal woman within 48 hours of delivery',
								'CMWs takes proper history of the client',
								'Takes vital signs and check for anemia',
								'Examines the breasts for establishment of lactation, engorgement and/or tenderness',
								'Examines abdomen for involution of uterus, tenderness or distension',
								'Assesses amount of bleeding and healing of laceration/episiotomy (if needed)',
								'CMW properly counsels the postpartum mother and manages care according to the assessment findings',
								'Use of family planning methods',
								'Nutrition/iron folic supplementation',
								'Explains to the mother AND her husband or another family member the need to report to the health facility when the following danger signs are observed',
								'Excessive vaginal bleeding',
								'Severe headache',
								'Severe abdominal pains',
								'Offensive vaginal discharge',
								'Fever',
								'Convulsions',
								'Blurred vision',
								'Extreme fatigue',
								'Score:(Total from Section IV-D)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="<?php if($i>=11 && $i<=18){echo 'col-xs-8 col-xs-offset-1';}else{echo 'col-xs-9';} ?>">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==1 || $i==7 || $i==10){}else if($i==19){?>
											<p><?php $var ='pnc_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='pnc_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='pnc_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==1 || $i==7 || $i==10){}else if($i==19){?>
											<p><?php $var ='pnc_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='pnc_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='pnc_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							}?>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section IV- E  Family Planning</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 br text-center">
								<label class="pt14 pb14">S. No</label>
								</div>
								<div class="col-xs-9 text-center">
									<label class="pt14 pb14">Steps</label>
								</div>
								<div class="col-xs-2 ">
								  <div class="row">
									<div class="col-xs-12 bl text-center">
									  <label>Score</label>
									</div>
								  </div>
								  <div class="row bt">
									<div class="col-xs-6 brl text-center ">
									  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-6 text-center">
									  <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								  </div>
								</div>
							</div>
							<?php 
							$keys = array(
								'1.',
								'1.1',
								'1.2',
								'1.3',
								'2.',
								'2.1',
								'2.2',
								'2.3',
								'2.4',
								'2.5',
								''
							);
							$labels = array(
								'CMWs properly counsel the client',
								'CMWs takes history',
								'CMW counsels client on FP choices, benefits and risks',
								'CMW uses Medical Eligibility Criteria for contraindication of the specific methods to the client',
								'The client’s receives method of her choice',
								'CMWs gives informed choice to the client',
								'Provides methods as per client’s decision',
								'Provides correct information to use the method, side effects and follow up visit',
								'CMWs properly document the client’s information',
								'CMW properly manages the complication of the methods or refer (if needed)',
								'Score:(Total from Section IV-E)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="col-xs-9">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<?php if($i==1 || $i==5){}else if($i==11){?>
											<p><?php $var ='fp_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='fp_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='fp_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php
										} ?>
									</div>
									<div class="col-xs-1 text-center bg3">
										<?php if($i==1 || $i==5){}else if($i==11){?>
											<p><?php $var ='fp_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-12 text-center">
													<p style="padding-top: 7px;"class="<? $var ='fp_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='fp_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											</div><?php 
											$index++;
										} ?>
									</div>
								</div><?php 
							}?>
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label> </label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"></label>
							</div>
							<div class="col-xs-9">
								<label class="pt7 pb2">Grand Total from  Sections I through IV-E</label>
							</div>
							<div class="col-xs-1 text-center">
								<p><?php $var ='grand_tot'; echo isset($DataRow)?$DataRow->$var:0; ?></p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p><?php $var ='grand_tot'; echo isset($CompareRow)?$CompareRow->$var:0; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"></label>
							</div>
							<div class="col-xs-9">
								<label class="pt7 pb2">Total possible points</label>
							</div>
							<div class="col-xs-1 text-center">
								<p><?php $var ='possible_points'; echo isset($DataRow)?$DataRow->$var:97; ?></p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p><?php $var ='possible_points'; echo isset($CompareRow)?$CompareRow->$var:97; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"></label>
							</div>
							<div class="col-xs-9">
								<label class="pt7 pb2">Percentage Score</label>
							</div>
							<div class="col-xs-1 text-center">
								<p><?php $var ='score'; echo isset($DataRow)?round($DataRow->$var, 2):0; ?></p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p><?php $var ='score'; echo isset($CompareRow)?round($CompareRow->$var, 2):0; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-9">
								<label class="pt7 pb2">Does the CMW need a Refresher course on any particular aspect of Service delivery?</label>
								<p>(Set a metric for this –if the CMW achieves below 70%, needs refresher)</p>
							</div>
							<div class="col-xs-1">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p style="padding-top: 7px;" class="<?php  $var ='need_course'; echo get_yn_class($DataRow->$var);?>"><?php $var ='need_course'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1">
								<div class="row">
									<div class="col-xs-12 text-center bg3">
										<p style="padding-top: 7px;" class="<?php  $var ='need_course'; echo get_yn_class($CompareRow->$var);?>"><?php $var ='need_course'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row bc" style="padding-bottom: 1px;">
							<div class="col-xs-6   br text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-6   text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 ">
								<p><?php $var ='course_area'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-6 bg3">
								<p><?php $var ='course_area'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-12   text-center">
								<label>FEEDBACK SUMMARY</label>
							</div>
						</div>
						<div class="row bt bc" style="padding-bottom: 1px;">
							<div class="col-xs-6   br text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-6   text-center ">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<p><?php $var ='feedback'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-6 bg3">
								<p><?php $var ='feedback'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
					</div><!--end of rowlightbg-->
					</div><!--end of alignmentview-->
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>