<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
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
					<?php 
					echo validation_errors();
					$action = $basePath."mnch/tmc/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id);
					echo form_open_multipart($action,$attributes,$hidden); ?>
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label>Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >               
								<!--<label class="pt7 pb2"><?php //echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label>-->
							</div>
							<div class="col-xs-3">
								 <label>Time of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="tov"; echo isset($DataRow)?date("H:i",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="form-control single-input" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>Reporting month</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>Section 1: Identification</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.1</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW ID</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->target_value:''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.2</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Reporting Facility</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facode.'-'.$vpvcDataRow->facility:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.3</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW  Name</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="cmwcode" id="cmwcode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->target_value:''; ?>" required="required" class="form-control"  readonly="readonly" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->hcpvalue:''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.4</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Catchment Area Population</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="population"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.5</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Address of CMW</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="address"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text" >
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.6</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Union Council</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<?php $ucdata = get_CMW_UC_data($vpvcDataRow->target_value); ?>
								<input type="hidden" value="<?php $var = "uncode"; echo isset($ucdata)?$ucdata->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control"  readonly="readonly" >               
								<label class="pt7 pb2"><?php $var = "unioncouncil"; echo isset($ucdata)?$ucdata->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.7</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Tehsil</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<?php $tehsildata = get_CMW_Tehsil_data($vpvcDataRow->target_value); ?>
								<input type="hidden" value="<?php $var = "tcode"; echo isset($tehsildata)?$tehsildata->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control"  readonly="readonly" >               
								<label class="pt7 pb2"><?php $var = "tehsil"; echo isset($tehsildata)?$tehsildata->$var:''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.8</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">District</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->district:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.9</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Name of Technical Supervisor</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.10</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Designation</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="singletmcsec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section II: INTERPERSONAL RELATIONS OF CMW</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-10 br text-center">
									<label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singletmcrow">
									<div class="col-xs-10">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==8){?>
											<input value="<?php $var ='ir_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='ir_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='ir_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
								<div class="col-xs-1 text-center"><label>Indicator</label></div>
								<div class="col-xs-9 brl text-center"><label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
									<div class="col-xs-9 zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==4 || $i==9){}else if($i==14){?>
											<input value="<?php $var ='ip_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='ip_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='ip_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
								<div class="col-xs-1 text-center"><label></label></div>
								<div class="col-xs-9 brl text-center"><label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
									<div class="<?php if(($i>=3 && $i<=6) || ($i>=8 && $i<=14) || ($i>=36 && $i<=39)){echo 'col-xs-8 col-xs-offset-1';}else{echo 'col-xs-9';} ?> zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==2 || $i==7 || $i==15 || $i==21 || $i==28 || $i==32 || $i==34 || $i==35){}else if($i==44){?>
											<input value="<?php $var ='ae_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='ae_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='ae_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
								<div class="col-xs-1 text-center"><label>S. No</label></div>
								<div class="col-xs-9 brl text-center"><label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
									<div class="col-xs-9 zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==7){}else if($i==12){?>
											<input value="<?php $var ='nc_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='nc_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='nc_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
								<div class="col-xs-1 text-center"><label>S. No</label></div>
								<div class="col-xs-9 brl text-center"><label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
									<div class="col-xs-9 zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==6 || $i==11 || $i==22){}else if($i==26){?>
											<input value="<?php $var ='ic_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='ic_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='ic_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
								<div class="col-xs-1 text-center"><label>S. No</label></div>
								<div class="col-xs-9 brl text-center"><label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
									<div class="<?php if($i>=11 && $i<=18){echo 'col-xs-8 col-xs-offset-1';}else{echo 'col-xs-9';} ?> zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==7 || $i==10){}else if($i==19){?>
											<input value="<?php $var ='pnc_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='pnc_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='pnc_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
								<div class="col-xs-1 text-center"><label>S. No</label></div>
								<div class="col-xs-9 brl text-center"><label>Steps</label></div>
								<div class="col-xs-2 text-center"><label>Score</label></div>
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
									<div class="col-xs-9 zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==5){}else if($i==11){?>
											<input value="<?php $var ='fp_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center totalScr" readonly="readonly" type="text">
											<?php
										} else{ ?>
											<div class="row">
												<div class="col-xs-6 text-right">
													<label>Yes</label>&nbsp;
													<input <?php $var ='fp_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6">
													<label>No</label>&nbsp;
													<input <?php $var ='fp_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
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
							<div class="col-xs-9 zp">
								<label class="pt7 pb2">Grand Total from  Sections I through IV-E</label>
							</div>
							<div class="col-xs-2 zp">
								<input value="<?php $var ='grand_tot'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center grand_tot" readonly="readonly" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"></label>
							</div>
							<div class="col-xs-9 zp">
								<label class="pt7 pb2">Total possible points</label>
							</div>
							<div class="col-xs-2 zp">
								<input value="<?php $var ='possible_points'; echo isset($DataRow)?$DataRow->$var:104; ?>" name="<?php echo $var; ?>" class="form-control text-center possible_points" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"></label>
							</div>
							<div class="col-xs-9 zp">
								<label class="pt7 pb2">Percentage Score</label>
							</div>
							<div class="col-xs-2 zp">
								<input value="<?php $var ='score'; echo isset($DataRow)?$DataRow->$var:0; ?>" name="<?php echo $var; ?>" class="form-control text-center score" readonly="readonly" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1"></div>
							<div class="col-xs-9 zp">
								<label class="pt7 pb2">Does the CMW need a Refresher course on any particular aspect of Service delivery?</label>
								<p>(Set a metric for this –if the CMW achieves below 70%, needs refresher)</p>
							</div>
							<div class="col-xs-2 zp">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='need_course'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 courseyesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='need_course'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 coursenoradio" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-11 col-xs-offset-1 zp">
								<input value="<?php $var ='course_area'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control course_area" type="text" placeholder="If yes to the above elaborate the area/s">
							</div>
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>FEEDBACK SUMMARY</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<textarea <?php $var ='feedback'; ?> name="<?php echo $var; ?>" rows="5" class="form-control" placeholder="PLEASE  GIVE  WRITTEN  FEEDBACK  TO  THE  CMW  FOR  IMPROVEMENT BASED ON THE ABOVE FINDINGS"><?php echo isset($DataRow)?$DataRow->$var:''; ?></textarea>
							</div>
						</div>
					</div><!--end of rowlightbg-->
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
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		<script>
			$(document).ready(function(){
				//to set score after clicking on yes/no radio of specific section
				$(document).on('click','input:radio',function (event){
					var yeslen = $(this).closest('div[class^="singletmcsec"]').find(".yesradio:checked").length;
					var nolen = $(this).closest('div[class^="singletmcsec"]').find(".noradio:checked").length;
					$(this).closest('div[class^="singletmcsec"]').find(".totalScr").val(yeslen);
					calculate_score();
				});
				$(document).on('change','.possible_points',function (event){
					calculate_score();
				});
				function calculate_score(){
					var totalscore = 0;
					$(".totalScr").each(function(e){
						totalscore = parseInt(totalscore)+parseInt($(this).val());
					});
					$(".grand_tot").val(totalscore);
					var possible = parseInt($(".possible_points").val());
					possible = (possible<=0)?1:possible;
					var finalscore = ((totalscore/possible)*100);
					$(".score").val(finalscore);
					if(finalscore<70)
					{
						$(".courseyesradio").prop("checked",true);
						$(".course_area").attr("readonly", false);
					}else{
						$(".coursenoradio").prop("checked",true);
						$(".course_area").attr("readonly", true);
					}
				}
			});
		</script>
	</body>
</html>