<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>SBA Technical Monitoring || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> SBA Technical Monitoring Checklist</div>
				<div class="panel-body">
					<?php 
					echo validation_errors();
					$action = $basePath."imc/sba/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id);
					echo form_open_multipart($action,$attributes,$hidden); ?>
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
								<!-- <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label> -->
							</div>
							<div class="col-xs-3">
								 <label class="pt7 pb2">Reporting month</label>
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
										<label class="pt7 pb2">Facility Code</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?></label>
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
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.3</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">SBA Name</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="sba_name" id="sba_name" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->target_value:''; ?>" required="required" class="form-control"  readonly="readonly" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->target_value:''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.4</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">SBA Designation</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="sba_desg" id="sba_desg" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->hcptypename:''; ?>" required="required" class="form-control"  readonly="readonly" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->hcptypename:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.7</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Province</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
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
						<div class="singlesbasec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>INFECTION PREVENTION</label>
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
								'Score: (Total Scores=10)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singlesbarow">
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
						<div class="singlesbasec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>ANTENATAL EXAMINATION</label>
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
								'6.2',
								'6.3',
								'6.4',
								''
							);
							$labels = array(
								'Pregnant women are attending FANC according to recommended schedule of ANC visits',
								'SBAs follows WHO-recommended schedule of ANC visits',
								'1st visit: <16 weeks',
								'2nd visit: 24–28 weeks',
								'3rd visit: 30–32 weeks',
								'4th visit: 36–38 weeks',
								'SBA takes proper History of the client and document',
								'Parity and Number of living children',
								'History of Ante partum hemorrhage, Postpartum hemorrhage, convulsions, Operative (C-Section) delivery, Still birth, Place of last delivery',
								'History of Medical problems (e.g., Diabetes, TB, Hypertension, Jaundice)',
								'SBA properly documents the information on Card and register',
								'SBA calculates the estimated date of delivery according to her last menstrual period at her first antenatal visit and documents it',
								'The SBA properly conducts obstetric physical exam of the pregnant woman',
								'Measures vital signs (blood pressure, temperature, pulse respiration and weight)',
								'Conjunctiva and palm of hand for signs of anemia',
								'Explains the procedure to the woman and ensures that the bladder is empty before examination',
								'Measures fundal height (after 12 weeks)',
								'Listens to fetal heart sounds (after 20 weeks)',
								'Determines fetal lie and presentation (after 36 weeks)',
								'SBA requests laboratory tests according to the protocols',
								'SBA requests laboratory tests according to the protocols',
								'Routine investigation (blood group and Rh factor, hemoglobin, blood glucose and Urine analysis for protein urea)',
								'Specific investigation if needed (i.e., hepatitis B, hepatitis C)',
								'The SBA refer all pregnant women for TT Shots',
								'Refer the client for TT vaccine',
								'SBA properly plans for birth and complication readiness',
								'Informed about danger signs and symptoms of labour',
								'Informed about taking Iron, folate, calcium during pregnancy',
								'Informed about hygiene, nutrition, rest, FP during pregnancy',
								'Prescribe and instruct Misoprostol as AMTSL in case of home delivery',
								'Score:(Total Scores=23)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singlesbarow">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $keys[$i-1]; ?></label>
									</div>
									<div class="<?php if($i>=3 && $i<=6){echo 'col-xs-8 col-xs-offset-1';}else{echo 'col-xs-9';} ?> zp">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if($i==1 || $i==2 || $i==7 || $i==13 || $i==20 || $i==24 || $i==26){}else if($i==31){?>
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
						<div class="singlesbasec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Normal Labour with use of Partograph and AMTSL</label>
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
								'Score:(Total Scores=9)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singlesbarow">
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
						<div class="singlesbasec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>IMMEDIATE CARE OF NEWBORN</label>
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
								'The SBAs properly conducts a newborn exam',
								'Weighs the baby',
								'Counts respiration (normal 30 to 60 per minute)',
								'Measures axillary temperature ( 36.5–37.5)',
								'Performs head-to-toe examination of baby',
								'The SBAs advises the mother about danger signs and Routine Care',
								'Convulsions and lethargic or unconscious',
								'Vomits everything or sucking or feeding poorly',
								'Any problems with breathing',
								'Hot to touch or very cold to touch',
								'Any oozing from the umbilical stump (pus, clear or blood)',
								'Tell the mother or family about delayed bathing (24 hours when temperature established)',
								'Educate the mother to not apply anything except Chlorhexidine',
								'Educate the mother to initiate breast feeding',
								'Educate the mother for exclusive breast feeding',
								'Educate the mother for immunization',
								'Helping Babies Breathe (HBB) Equipment and supplies are available at delivery side and ready to use',
								'Labor room has resuscitation/ventilation area with all HBB equipment and supplies',
								'HBB action plan displayed in labor room',
								'Provider successfully performs 7 steps of bag/mask use',
								'Score:(Total Scores=21)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singlesbarow">
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
						<div class="singlesbasec">
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>POST NATAL CARE</label>
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
								'2.3.1',
								'2.3.2',
								'2.3.3',
								'2.3.4',
								'2.3.5',
								'2.3.6',
								'2.3.7',
								'2.3.8',
								''
							);
							$labels = array(
								'SBA conducts a routine physical exam of the postnatal woman within 48 hours of delivery',
								'SBAs takes proper history of the client',
								'Takes vital signs and check for anemia',
								'Examines the breasts for establishment of lactation, engorgement and/or tenderness',
								'Examines abdomen for involution of uterus, tenderness or distension',
								'Assesses amount of bleeding and healing of laceration/episiotomy (if needed)',
								'SBA properly counsels the postpartum mother and manages care according to the assessment findings',
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
								'Score:(Total Scores=15)'
							);
							$index=1;
							for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row singlesbarow">
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
								<label class="pt7 pb2">Grand Total</label>
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
								<input value="<?php $var ='possible_points'; echo isset($DataRow)?$DataRow->$var:78; ?>" name="<?php echo $var; ?>" class="form-control text-center possible_points" readonly="readonly" type="text">
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
					var yeslen = $(this).closest('div[class^="singlesbasec"]').find(".yesradio:checked").length;
					var nolen = $(this).closest('div[class^="singlesbasec"]').find(".noradio:checked").length;
					$(this).closest('div[class^="singlesbasec"]').find(".totalScr").val(yeslen);
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
					$(".score").val(Math.round(finalscore * 100) / 100);
				}
			});
		</script>
	</body>
</html>