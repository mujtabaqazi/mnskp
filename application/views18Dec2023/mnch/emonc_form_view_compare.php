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
	  <title>Status Checklist for B and C EmONC Facilities || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Quarterly Health Facility Status Check List for B and C EmONC Facilities</div>
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
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7">1.2</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7">Name of Technical Supervisor</label>
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
										<label class="pt7">Designation of Technical Supervisor</label>
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
										<label class="pt7">1.5</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7">Designated Status of Health Facility</label>
									</div>
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php 
									$var ="designated_stat"; 
									if(isset($DataRow)){
										switch ($DataRow->$var){
											case "preventive mnch":
												echo 'Preventive MNCH';
												break;
											case "basic emonc":
												echo 'Basic EmONC';
												break;
											case "comprehensive emonc":
												echo 'Comprehensive EmONC';
												break;
											case "none of these":
												echo 'None of these';
												break;
											default : 
												echo '';
												break;
										}
									} ?>
								</p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php 
									$var ="designated_stat"; 
									if(isset($CompareRow)){
										switch ($CompareRow->$var){
											case "preventive mnch":
												echo 'Preventive MNCH';
												break;
											case "basic emonc":
												echo 'Basic EmONC';
												break;
											case "comprehensive emonc":
												echo 'Comprehensive EmONC';
												break;
											case "none of these":
												echo 'None of these';
												break;
											default : 
												echo '';
												break;
										}
									} ?>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7">1.6</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7">Availability of health care services</label>
									</div>
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ="availability"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php $var ="availability"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7">1.7</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7">Managed/Supported by</label>
									</div>
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ="managed_by"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php $var ="managed_by"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7">1.8</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7">Name of Health Facility In charge</label>
									</div>
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ="hf_incharge"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php $var ="hf_incharge"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
										<label class="pt7 pb2">PHS/DFP/MNCH Designated person</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.2</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">District</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.3</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Facility</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></p>
							</div>
						</div>							
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.4</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Facility Type</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_Facility_Fatype($DataRow->$var):''; ?></p>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.5</label>
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
						<div class="row mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section II: General Management and Infrastructure</label>
							</div>
						</div>
						<!-- <div class="row bc mb1">
				        	<div class="col-xs-6">				          	
				        	</div>
							<div class="col-xs-3 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?$DataRow->$var:''; ?></label></div>
							<div class="col-xs-3 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?$CompareRow->$var:''; ?></label></div>
				      	</div> -->
						<div class="row bc">
							<div class="col-xs-1"><label>#</label></div>
							<div class="col-xs-5 brl"><label>Management Items</label></div>
							<div class="col-xs-1 text-center"><label class="pl12">Status</label></div>
							<div class="col-xs-2 bl"><label>Comments</label></div>
							<div class="col-xs-1 bl text-center"><label class="pl12">Status</label></div>
							<div class="col-xs-2 bl"><label>Comments</label></div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-6 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$keys = array(
							'2.1',
							'2.2',
							'2.3 a',
							'2.3 b',
							'2.4 a',
							'2.4 b',
							'2.5',
							'2.6',
							'A',
							'B',
							'C',
							'D',
							'2.7',
							'A',
							'B',
							'C',
							'D',
							'E',
							'F',
							'G',
							'2.8',
							'A',
							'B',
							'C',
							'D',
							'E',
							'F',
							'G',
							'2.9',
							'2.10',
							'A',
							'B',
							'C',
							'D'
						);
						$labels = array(
							'Job descriptions of all technical staff available ',
							'DHIS tools are available',
							'Health facility staff meetings held for last period',
							'If yes, meeting minutes available',
							'LHWs-CMWs monthly meetings held for last period and minutes of meetings available',
							'If yes, meeting minutes available',
							'Deployment Guidelines for CMWs available',
							'Protocols are available for',
							'Antenatal care',
							'Delivery care',
							'Postnatal Care',
							'Neonatal care',
							'Space is available for',
							'Obstetrics/Gynecology consultations',
							'Immunization',
							'Neonatal/child care consultations',
							'Laboratory',
							'Operation Theatre',
							'Patient waiting area',
							'Other',
							'Residential facility available for on call staff is available and appropriately occupied by',
							'Woman Medical Officer',
							'Gynecologist',
							'Pediatrician',
							'Anesthetist',
							'Nurse',
							'Lady Health Visitor',
							'Other',
							'Building requires repairing (Specify in comment)',
							'Basic amenities and sewerage available',
							'Electricity',
							'Gas',
							'Water supply',
							'Sewerage system'
						);
						$i=1;						
						for($index = 1; $index<=count($labels); $index++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<p><?php echo $keys[$index-1]; ?></p>
								</div>
								<div class="col-xs-5">
									<p><?php echo $labels[$index-1]; ?></p>
								</div>
								<?php if($index==8 || $index==13 || $index==21 || $index==30){}else{ ?>
									<div class="col-xs-1">
										<div class="row">
											<?php if($i==1 || ($i>11 && $i<19) || ($i>26 && $i<31)){ ?>
												<div class="col-xs-12 text-center">
													<p class ="<?php $var ='gmi_r'.$i.'_f1'; echo get_gpnr_class($DataRow->$var); ?>" style="padding-top: 7px;">
													<?php 
														$var ='gmi_r'.$i.'_f1'; 
														echo isset($DataRow)?(($DataRow->$var=="0")?(($i==1)?'None':'Poor'):''):'';
														echo isset($DataRow)?(($DataRow->$var=="2")?(($i==1)?'Some':'Fair'):''):'';
														echo isset($DataRow)?(($DataRow->$var=="1")?(($i==1)?'All':'Good'):''):''; ?>
													</p>
												</div>
											<?php }else{ ?>
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='gmi_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='gmi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var ='gmi_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3">
										<div class="row">
											<?php if($i==1 || ($i>11 && $i<19) || ($i>26 && $i<31)){ ?>
												<div class="col-xs-12 text-center">
													<p class ="<?php $var ='gmi_r'.$i.'_f1'; echo get_gpnr_class($CompareRow->$var); ?>" style="padding-top: 7px;">
													<?php 
														$var ='gmi_r'.$i.'_f1'; 
														echo isset($CompareRow)?(($CompareRow->$var=="0")?(($i==1)?'None':'Poor'):''):'';
														echo isset($CompareRow)?(($CompareRow->$var=="2")?(($i==1)?'Some':'Fair'):''):'';
														echo isset($CompareRow)?(($CompareRow->$var=="1")?(($i==1)?'All':'Good'):''):''; ?>
													</p>
												</div>
											<?php }else{ ?>
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='gmi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='gmi_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
											<?php } ?>
										</div>
									</div>
									<div class="col-xs-2 zp bg3">
										<p><?php $var ='gmi_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div><?php 
									$i++;
								} ?>
							</div><?php 
						} 
						?>
						<div class="row mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section III: Essential MNCH Care Staff</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-2"><label class="pt9 pb11">#</label></div>
									<div class="col-xs-10 bl">
										<label class="pt9 pb11">Category of Post</label>
									</div>
								</div>
							</div>
							<div class="col-xs-10">
								<div class="row">
									<div class="col-xs-2 brl text-center">
										<label class="pt9 pb11">Sanctioned</label>
									</div>
									<div class="col-xs-1 text-center">
										<label class="pt9 pb11">Filled</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label class="pt9 pb11">Vacant</label>
									</div>
									<div class="col-xs-2">
										<label>Available at the time of assessment</label>
									</div>

									<div class="col-xs-2 brl text-center">
										<label class="pt9 pb11">Sanctioned</label>
									</div>
									<div class="col-xs-1 text-center">
										<label class="pt9 pb11">Filled</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label class="pt9 pb11">Vacant</label>
									</div>
									<div class="col-xs-2">
										<label>Available at the time of assessment</label>
									</div>
								</div>
							</div>          
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-2 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-5 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-5 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$labels = array(
							'Medical Officer',
							'Woman Medical Officer',
							'Gynecologist',
							'Pediatrician/Neonatologist',
							'Anesthetist',
							'Nurse',
							'LHV',
							'Laboratory Technician',
							'OT Technician',
							'X-Ray Technician',
							'Blood Bank Technician',
							'Anesthesia Technician',
							'Vaccinator',
							'Dispenser',
							'Midwife',
							'Aaya/Dai',
							'Ambulance Driver'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-2">
											<p><?php echo $i; ?></p>
										</div>
										<div class="col-xs-10">
											<p><?php echo $labels[$i-1]; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-10">
									<div class="row">
										<div class="col-xs-2 zp">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-1 zp">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-1 zp">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-2 zp">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>

										<div class="col-xs-2 zp bg3">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-1 zp bg3">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-1 zp bg3">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-2 zp bg3">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='cs_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>          
							</div><?php 
						} 
						?>
						<div class="row mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section IV: Preventive MNCH, and Basic and Comprehensive EmONC Signal Functions/services</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1 br"><label>#</label></div>
				        	<div class="col-xs-5">
				          		<label></label>
				        	</div>
							<div class="col-xs-1 brl text-center"><label>Status</label></div>
							<div class="col-xs-2"><label>Comments</label></div>
							<div class="col-xs-1 brl text-center"><label>Status</label></div>
							<div class="col-xs-2"><label>Comments</label></div>
				      	</div>
				      	<div class="row bc mt1 mb1">
							<div class="col-sm-6 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>						
						<?php 
						$keys = array(
							'A.',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'7',
							'B.',
							'1',
							'2',
							'3',
							'4',
							'C.',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'7',
							'D.',
							'1',
							'2',
							'E.',
							'1',
							'2',
							'2.1',
							'2.2',
							'2.3',
							'2.4',
							'2.5',
							'2.6',
							'F.',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'G.',
							'1',
							'2'
						);
						$labels = array(
							'Functional baby clinic:',
							'Growth Monitoring done',
							'Immunization (BCG, Polio, Pentavalent,  Measles) done',
							'Treatment of Diarrhea provided according to IMNCI guidelines',
							'Treatment of ARI including Pneumonia provided according to IMNCI guidelines',
							'Counseling for nutrition and breast feeding done',
							'Treatment of Malaria',
							'De-worming (Anthelminthic)',
							'Preventive/clinical Maternal Services',
							'Antenatal checkup performed',
							'TT Immunization performed',
							'Normal delivery performed',
							'Family Planning services (counseling and availability of at least 3 methods) provided Injectable,  CoC & Condoms ',
							'Signal Functions of Basic EmONC Services',
							'Parenteral antibiotics administered',
							'Parenteral oxytocic drugs administered',
							'Parenteral anticonvulsant administered',
							'Manual removal of placenta performed',
							'Removal of retained products performed',
							'Assisted vaginal delivery performed',
							'Newborn resuscitation',
							'Signal Functions of Comprehensive EmONC Services (in addition to 1-7 in C above)',
							'Blood transfusion performed',
							'Caesarean section performed',
							'Supportive Services',
							'Functional ambulance available',
							'Lab tests performed:',
							'i. Hemoglobin',
							'ii. Urine for Albumin',
							'iii. Blood Sugar',
							'iv. Pregnancy Test',
							'v. Blood Grouping ',
							'vi. Blood screening (HBs, HC, HIV, Syphilis & Malaria) only at C-EmONC ',
							'Functional Essential Newborn Care (ENC) unit',
							'Clean cord care',
							'Thermal protection and management of neonatal hypothermia. Warm room, immediate skin drying, and skin-to-skin contact.',
							'Early and exclusive breast feeding',
							'Early recognition of birth asphyxia and application of basic principles of  resuscitation',
							'Prevention and management of ophthalmia neonatorum including of eye  and application of tetracycline ointment',
							'Immunization with BCG and OPV-0',
							'Functional neonatal intensive care unit',
							'Pediatrician/Neonatologist is available',
							'Incubator services are available'
						);
						$i=1;						
						for($index = 1; $index<=count($labels); $index++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<p><?php echo $keys[$index-1]; ?></p>
								</div>
								<div class="col-xs-5">
									<p><?php echo $labels[$index-1]; ?></p>
								</div>
								<?php if($index==1 || $index==9 || $index==14 || $index==22 || $index==25 || $index==27 || $index==34 || $index==41){}else{ ?>
									<div class="col-xs-1">
										<div class="row">											
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pbc_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='pbc_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
											</div>											
										</div>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var ='pbc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3">
										<div class="row">											
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pbc_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='pbc_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
											</div>											
										</div>
									</div>
									<div class="col-xs-2 zp bg3">
										<p><?php $var ='pbc_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div><?php 
									$i++;
								} ?>
							</div><?php 
						} 
						?>
						<div class="row mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section V: Equipment (Labor Room)</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1"><label>#</label></div>
							<div class="col-xs-5 brl"><label>List of Equipment</label></div>
							<div class="col-xs-1"><label class="pl12">Status</label></div>
							<div class="col-xs-2 bl"><label>Comments</label></div>
							<div class="col-xs-1 bl"><label class="pl12">Status</label></div>
							<div class="col-xs-2 bl"><label>Comments</label></div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-6 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$keys = array(
							'',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'',
							'1',
							'2',
							'3',
							'4',
							'',
							'1',
							'2',
							'3',
							'',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'7',
							'8',
							'9',
							'10',
							'11',
							'12'
						);
						$labels = array(
							'Basic Equipment',
							'Infant weight machine',
							'Resuscitation equipment (Bag and Mask) for newborn',
							'Fetal stethoscope/Fetoscope',
							'Electric instrument sterilizer 12 x 6',
							'Chittle forceps with jar',
							'Spring type dressing forceps (ss)',
							'Insertion and Removal of IUD',
							'Cusco’s/duck speculum, small, large and medium',
							'Sponge forceps',
							'Uterine sound',
							'Valsellum forceps',
							'Scissors dissecting blunt pointed',
							'Gallipot',
							'Normal Vaginal Delivery',
							'Artery forceps 2',
							'Blunt-ended scissors',
							'D&C Set',
							'MVA kit',
							'Neonatal Resuscitation',
							'Bulb sucker',
							'Infant face mask (2 different sizes 0 and 1)',
							'Infant ambu bag Neonatal',
							'Miscellaneous equipment/Furniture',
							'ECG Machine',
							'Portable Light ē rechargeable batteries (OT/labor room)',
							'Sterilizing Drum',
							'Vacuum Extractor',
							'Pulse oximeter',
							'C.T.G. machine',
							'U/S machine',
							'X-Ray illuminator',
							'Delivery table',
							'Baby Warme',
							'Baby weighing machine',
							'Adult weighing machine'
						);
						$i=1;						
						for($index = 1; $index<=count($labels); $index++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<p><?php echo $keys[$index-1]; ?></p>
								</div>
								<div class="col-xs-5">
									<p><?php echo $labels[$index-1]; ?></p>
								</div>
								<?php if($index==1 || $index==8 || $index==15 || $index==20 || $index==24){}else{ ?>
									<div class="col-xs-1">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='lr_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='lr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?(($i==15 || $i==16)?'Complete':'Yes'):(($i==15 || $i==16)?'Incomplete':'No')):(($i==15 || $i==16)?'Incomplete':'No'); ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var ='lr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='lr_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='lr_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?(($i==15 || $i==16)?'Complete':'Yes'):(($i==15 || $i==16)?'Incomplete':'No')):(($i==15 || $i==16)?'Incomplete':'No'); ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 zp bg3">
										<p><?php $var ='lr_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div><?php 
									$i++;
								} ?>
							</div><?php 
						} 
						?>
						<div class="row mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section VI: Equipment (Labor Room)</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1"><label>#</label></div>
							<div class="col-xs-5 brl"><label>Name of Equipment</label></div>
							<div class="col-xs-1"><label class="pl12">Status</label></div>
							<div class="col-xs-2 bl"><label>Comments</label></div>
							<div class="col-xs-1 bl"><label class="pl12">Status</label></div>
							<div class="col-xs-2 bl"><label>Comments</label></div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-6 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-3 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$keys = array(
							'',
							'1',
							'2',
							'3',
							'4',
							'5',
							'6',
							'',
							'1',
							'2',
							'',
							'1',
							'2',
							'',
							'1',
							'2',
							'3'
						);
						$labels = array(
							'Perineal/Vaginal/Cervical Repair',
							'Sponge forceps',
							'Needle holder',
							'Stitch scissors',
							'Dissecting forceps, toothed',
							"Sim's speculum large",
							"Sim's speculum medium",
							'Vacuum Extraction or Forceps Delivery',
							'Vacuum extractor',
							'Obstetric forceps',
							'Obstetric Laparotomy/Caesarean Section set',
							'Gynecology Instrument set',
							'General Instrument set',
							'Anesthesia',
							'Anesthetic face masks',
							'Anesthesia Machine & monitor',
							'Laryngoscopes'
						);
						$i=1;						
						for($index = 1; $index<=count($labels); $index++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<p><?php echo $keys[$index-1]; ?></p>
								</div>
								<div class="col-xs-5">
									<p><?php echo $labels[$index-1]; ?></p>
								</div>
								<?php if($index==1 || $index==8 || $index==11 || $index==14){}else{ ?>
									<div class="col-xs-1">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ot_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='ot_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var ='ot_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ot_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='ot_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 zp bg3">
										<p><?php $var ='ot_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div><?php 
									$i++;
								} ?>
							</div><?php 
						} 
						?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section VII: Essential Drugs</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-1"><label></label>#</div>
							<div class="col-xs-3 text-center bl"><label>Name of Drug</label></div>
							<div class="col-xs-2 brl text-center"><label>Status</label></div>
							<div class="col-xs-2"><label>Comments</label></div>
							<div class="col-xs-2 brl text-center"><label>Status</label></div>
							<div class="col-xs-2"><label>Comments</label></div>
						</div>
						<div class="row bc mt1">         
							<div class="col-xs-4">
								<label class="pt5 pb7">Essential and Emergency Maternal care</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-5">
										<label class="pt5 pb7">Available &#10004;</label>
									</div>
									<div class="col-xs-7 bl">
										<label class="pt5 pb7"># of days stocked out</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2"><label></label></div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-5">
										<label class="pt5 pb7">Available &#10004;</label>
									</div>
									<div class="col-xs-7 bl">
										<label class="pt5 pb7"># of days stocked out</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2"><label></label></div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-4 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$labels = array(
							'Amoxicillin tab 500mg',
							'Amoxicillin tab 250mg',
							'Amoxicillin inj',
							'Metronidazole tab 400mg',
							'Metronidazole tab 200mg',
							"Metronidazole inj",
							"Ciprofloxacilin tab 500mg",
							'Ciprofloxacilin tab 250mg',
							'Ciprofloxacilin inj',
							'Dexamethasone tab',
							'Dexamethasone inj',
							'Adrenaline (epinephrine) inj',
							'Aminophylline inj',
							'Atropine sulfate inj',
							'Calcium gluconate In',
							'Digoxin inj',
							'Diphenhydramine inj',
							'Dopamine inj',
							'Frusemide tab 40mg',
							'Frusemide tab 20mg',
							'Frusemide inj',
							'Insulin inj 7/30',
							'Naloxone, Inj',
							'Glucose 5%',
							'Glucose 10%',
							'Normal saline',
							'Ringers lactate',
							'Magnesium sulphate inj',
							'Nifedil caps',
							'Methyldopa tab',
							'Adalat cap',
							'Ergometrine inj',
							'Oxytocin inj',
							'Diclofenac tab',
							'Diclofenac inj',
							'Salbutamol, Tab',
							'Salbutamol inj',
							'Heparin inj',
							'Sodium citrate',
							'Thiopentone inj',
							'Pancuronium/atracurium/vecuronium',
							'Lignocaine',
							'Propofol inj 50 ml',
							'Propofol inj 20 ml',
							'Neostigmine inj',
							'Syringes',
							'Surgical Cotton',
							'Gauze',
							'Bandages'
						);
						for($index = 1; $index<=count($labels); $index++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<p><?php echo $index; ?></p>
								</div>
								<div class="col-xs-3">
									<p><?php echo $labels[$index-1]; ?></p>
								</div>								
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-5 text-center">
											<p class =" pt7 <?php $var ='drg_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
											<?php $var ='drg_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
										</div>
										<div class="col-xs-7 text-center">
											<p><?php $var ='drg_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp">
									<p><?php $var ='drg_r'.$index.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<div class="row">
										<div class="col-xs-5 text-center">
											<p class =" pt7 <?php $var ='drg_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
											<?php $var ='drg_r'.$index.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
										</div>
										<div class="col-xs-7 text-center">
											<p><?php $var ='drg_r'.$index.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp bg3">
									<p><?php $var ='drg_r'.$index.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">         
							<div class="col-xs-4">
								<label>IMNCI Medicines</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-5">
										<label class="pt5 pb7">Available &#10004;</label>
									</div>
									<div class="col-xs-7 bl">
										<label class="pt5 pb7"># of days stocked out</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<label class="pt5 pb7">Comments</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-5">
										<label class="pt5 pb7">Available &#10004;</label>
									</div>
									<div class="col-xs-7 bl">
										<label class="pt5 pb7"># of days stocked out</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<label class="pt5 pb7">Comments</label>
							</div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-4 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$labels = array(
							'Antibiotics',
							'Syp. Amoxycillin',
							'Tab. Amoxycillin',
							'Syp Cephradine',
							'Syp. Ciprofloxin',
							"Inj. Ampicillin",
							"Inj. Chloramphenicol",
							'Inj. Gentamicin',
							'Inj. Benzyl Pencillin',
							'Antipyretic',
							'Syp Paracetamol',
							'Tab. Paracetamol',
							'Anti-Malarial',
							'Sup Chloroquine',
							'Tab. Chloroquine',
							'Syp. Fansidar',
							'Tab Fansidar',
							'Inj. Quinine',
							'Iron/Supplement',
							'Syp. Iron',
							'Syp. Multi vitamin',
							'Vitamin A',
							'De-worming (Anthelminthic)',
							'Tab. Mebendazole',
							'ORS',
							'Zinc (Syp /Tab)',
							'Chloramphenicol Eye Ointment',
							'Gention Violet',
							'Misoprostol',
							'Chlorhexidine',
							'Check out for maintaining stock register and filling in Bin card'
						);
						$i=1;
						for($index = 1; $index<=count($labels); $index++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<p><?php if($index==1 || $index==10 || $index==13 || $index==19 || $index==23){}else{ echo $i;} ?></p>
								</div>
								<div class="col-xs-3">
									<p><?php echo $labels[$index-1]; ?></p>
								</div>
								<?php if($index==1 || $index==10 || $index==13 || $index==19 || $index==23){}else{ ?>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-5 text-center">
												<p class =" pt7 <?php $var ='med_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='med_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?></p>
											</div>
											<div class="col-xs-7 text-center">
												<p><?php $var ='med_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var ='med_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<div class="row">
											<div class="col-xs-5 text-center">
												<p class =" pt7 <?php $var ='med_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='med_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?></p>
											</div>
											<div class="col-xs-7 text-center">
												<p><?php $var ='med_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 zp bg3">
										<p><?php $var ='med_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div><?php 
									$i++;
								} ?>
							</div><?php 
						} 
						?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section VIII: Clinical Audit</label>
							</div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-4 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<div class="row mt5 mb5">
							<div class="col-xs-4">
								<label class="pt7 pb2">Investigation period</label>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb5">Start Date</label>
							</div>
							<div class="col-xs-1 zp">
								<p><?php $var ='ca_start_date'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb5">End Date</label>
							</div>
							<div class="col-xs-1 zp">
								<p><?php $var ='ca_end_date'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>

							<div class="col-xs-1 bg3">
								<label class="pt7 pb5">Start Date</label>
							</div>
							<div class="col-xs-1 zp bg3">
								<p><?php $var ='ca_start_date'; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-1 bg3">
								<label class="pt7 pb5">End Date</label>
							</div>
							<div class="col-xs-1 zp bg3">
								<p><?php $var ='ca_end_date'; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-4">
								<label class="pt7 pb3">Type of death investigated</label>
							</div>
							<div class="col-xs-1 brl">
								<label class="pt7 pb3">Total number of deaths for period</label>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb3">Number of deaths investigated for period</label>
							</div>
							<div class="col-xs-2 bl">
								<label class="pt10 pb40">Not applicable for this facility</label>
							</div>

							<div class="col-xs-1 brl">
								<label class="pt7 pb3">Total number of deaths for period</label>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb3">Number of deaths investigated for period</label>
							</div>
							<div class="col-xs-2 bl">
								<label class="pt10 pb40">Not applicable for this facility</label>
							</div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-4 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$labels = array(
							'Maternal deaths investigated',
							'Neonatal deaths investigated',
							'Under 5 child deaths investigated'
						);
						for($i = 1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-4">
									<p><?php echo $labels[$i-1]; ?></p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var ='ca_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1  text-center">
									<p><?php $var ='ca_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row">
										<div class="col-xs-3"></div>
										<div class="col-xs-6">
											<p class =" pt7 <?php $var ='ca_r'.$i.'_f3'; echo get_yn_class($DataRow->$var); ?>">
											<?php $var ='ca_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p><?php $var ='ca_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1  text-center bg3">
									<p><?php $var ='ca_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 text-center bg3">
									<div class="row">
										<div class="col-xs-3"></div>
										<div class="col-xs-6">
											<p class =" pt7 <?php $var ='ca_r'.$i.'_f3'; echo get_yn_class($CompareRow->$var); ?>">
											<?php $var ='ca_r'.$i.'_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
										</div>
									</div>
								</div>
							</div><?php 
						} 
						?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Section IX: Reports</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-4"></div>
							<div class="col-xs-2 brl text-center"><label>Status</label></div>
							<div class="col-xs-2"><label>If no, reason</label></div>
							<div class="col-xs-2 brl text-center"><label>Status</label></div>
							<div class="col-xs-2"><label>If no, reason</label></div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-4 bgw" style="min-height:26px;">								 
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
							<div class="col-sm-4 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<?php 
						$labels = array(
							'Ask for monthly DHIS/MIS reports being filled and submitted on time',
							'Ask for contraceptive logistic reports being filled and submitted on time'
						);
						for($i = 1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-4">
									<p><?php echo $labels[$i-1]; ?></p>
								</div>
								<div class="col-xs-2 zp">
									<div class="row">
										<div class="col-xs-6 text-right">
											<p class="pt7"><?php $var ='rep_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Complete':''):'';?></p>
										</div>
										<div class="col-xs-6">
											<p class="pt7"><?php $var ='rep_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'Timely':''):'';?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp">
									<p><?php $var ='rep_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp bg3">
									<div class="row">
										<div class="col-xs-6 text-right">
											<p class="pt7"><?php $var ='rep_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Complete':''):'';?></p>
										</div>
										<div class="col-xs-6">
											<p class="pt7"><?php $var ='rep_r'.$i.'_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Timely':''):'';?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp bg3">
									<p><?php $var ='rep_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div><?php 
						} 
						?>
					</div><!--end of rowlightbg-->
					</div><!--end of alignmentview-->
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>