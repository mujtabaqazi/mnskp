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
		<title>HF || Form</title>
		<?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Health Facility</div>
					<div class="panel-body pbody">
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
												<label class="pt7">1.3</label>
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
												<label class="pt7">1.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">No. of LHWs affiliated</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="lhw_attached"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="lhw_attached"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
												<label class="pt7 pb2">2.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Name of FLCF</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.3</label>
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
							<div class="row bc">
							    <div class="col-sm-6">
									<label>1. Training (including continuing education session)</label>
							 	</div>
							  	<div class="col-xs-3 text-center brl">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3 text-center">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$labels = array(
									'i. Trained Trainers available (at least 2)',
									'ii. Female trainer in the team',
									'iii. Classroom conditions',
									'iv. Training content quality including display of charts/maps etc.',
									'v. Training material available',
									'vi. Training delivered according to the given guidelines. (Use training checklist if training session in process)',
									'vii. Attendance register up to date',
									'viii. Trainers aware of LHWs weak areas',
									'ix. Number of LHWs in a training batch'
								);
								for($i=1; $i<=count($labels); $i++){?>
									<div class="row">
										<div class="col-xs-6 ">
											<label><?php echo $labels[$i-1]; ?></label>
										</div>
										<div class="col-xs-3 <?php if($i==9){echo ' text-center';} ?>">	
											<div class="row">
												<div class="col-xs-4">
													<?php if($i==3 || $i == 4){?>
														<div class="row">
															<div class="col-xs-12  text-center">
																<p class ="<?php $var ='tr_r'.$i.'_f1'; echo get_gpf_class($DataRow->$var); ?>" style="padding-top: 7px;">
																	<?php echo isset($DataRow)?ucfirst($DataRow->$var):''; ?>
																</p>
															</div>
														</div><?php
													} else if($i==9){?>
														<p style="padding-top: 7px;" class="text-center">
														<?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class =" pt7 <?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'bgreen':'bred'):''; ?>" >
																	<?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8">
													<p><?php $var ='tr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="row">												
												<div class="col-xs-4 bg3">
													<?php if($i==3 || $i == 4){?>
														<div class="row">
															<div class="col-xs-12  text-center">
																<p class="<?php $var ='tr_r'.$i.'_f1'; echo get_gpf_class($CompareRow->$var); ?>" style="padding-top: 7px;">
																<?php $var ='tr_r'.$i.'_f1'; echo isset($CompareRow)?ucfirst($CompareRow->$var):''; ?></p>
															</div>
														</div><?php
													} else if($i==9){?>
														<p style="padding-top: 7px;" class="text-center"><?php $var ='tr_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='tr_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'bgreen':'bred'):''; ?> " >
																	<?php $var ='tr_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8 bg3">
													<p><?php $var ='tr_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div><?php 
								} 
							?>
							<div class="row bc">
							  <div class="col-sm-6 text-center">
								<label>2. Record Keeping</label>
							  </div>
								<div class="col-xs-3 text-center brl">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3 text-center">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$labels = array(
									'a) No. of LHWs reported last month',
									'b) Facility report of last month submitted to DPIU',
									'c) Personal files of LHWs',
									'd) Feedback from DPIU on reports'
								);
								for($i=1; $i<=count($labels); $i++){?>
									<div class="row">
										<div class="col-xs-6 ">
											<label><?php echo $labels[$i-1]; ?></label>
										</div>
										<div class="col-xs-3 ">
											<div class="row">
												<div class="col-xs-4">
													<?php if($i==3){?>
														<div class="row">
															<div class="col-xs-12  text-center">
																<p class="<?php $var ='rk_r'.$i.'_f1'; echo get_ci_class($DataRow->$var); ?>" style="padding-top:7px"><?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
															</div>
														</div><?php
													} else if($i==1){?>
														<p style="padding-top:7px" class="text-center"><?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'bgreen':'bred'):''; ?>"> 
																	<?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8">
													<p><?php $var ='rk_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="row">												
												<div class="col-xs-4 bg3">
													<?php if($i==3){?>
														<div class="row">
															<div class="col-xs-12  text-center">
																<p class="<?php $var ='rk_r'.$i.'_f1'; echo get_ci_class($CompareRow->$var); ?>" style="padding-top:7px">
																<?php $var ='rk_r'.$i.'_f1'; echo isset($CompareRow)?ucfirst($CompareRow->$var):''; ?></p>
															</div>
														</div><?php
													} else if($i==1){?>
														<p style="padding-top:7px" class="text-center"><?php $var ='rk_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='rk_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'bgreen':'bred'):''; ?>">
																	<?php $var ='rk_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8 bg3">
													<p><?php $var ='rk_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>										
									</div><?php 
								} 
							?>
							<div class="row bc">
							  <div class="col-sm-6 text-center">
								<label>3.  Logistics</label>
							  </div>
							  	<div class="col-xs-3 text-center brl">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3 text-center">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$labels = array(
									'a) Storage is proper (Refer to checklist for store maintenance, C-III)',
									'b) Stock register maintained',
									'c) Issue-receipt vouchers maintained',
									'd) Bin card maintained',
									'e) Submitted demand for the quarter',
									//here f comes but it will be added manualy 'f) Sufficient stock (minimum level stock) available of',
									'a) Medicines',
									'b) Contraceptives',
									'c) LHW-MIS tools',
									'h) Regular monthly replenishment to LHWs by First Level Care Facility (FLCF)',
									'f) Regular quarterly replenishment to FLCF by the DPIU'
								);
								for($i=1; $i<=count($labels); $i++){?>
									<div class="row" ><?php 
										if($i==6){echo '<div class="col-xs-6 "><label>f) Sufficient stock (minimum level stock) available of</label></div><div class="col-xs-6 "></div></div><div class="row" >';} ?>
										<div class="col-xs-6">
											<label <?php if($i>=6 && $i<=8)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
										</div>
										<div class="col-xs-3 ">
											<div class="row">
												<div class="col-xs-4">
													<?php if($i>=6 && $i<=8){?>
														<p class="pt7 text-center"><?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'bgreen':'bred'):''; ?>">
																<?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
																</p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8">
													<p><?php $var ='l_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="row">												
												<div class="col-xs-4 bg3">
													<?php if($i>=6 && $i<=8){?>
														<p class="pt7 text-center"><?php $var ='l_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='l_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'bgreen':'bred'):''; ?>">
																<?php $var ='l_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
																</p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8 bg3">
													<p><?php $var ='l_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>											
										</div>										
									</div><?php 
								} 
								?>
								<div class="row bc">
								<div class="col-sm-6 text-center">
								<label>4. Referrals</label>
							  </div>
							  	<div class="col-xs-3 text-center brl">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3 text-center">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$labels = array(
									'a) Records of LHW referrals maintained (Check record of Referral slips)',
									'b) Feedback to the LHW given for sampled referral slips'
								);
								for($i=1; $i<=count($labels); $i++){?>
									<div class="row">
									  <div class="col-xs-6 ">
										<label><?php echo $labels[$i-1]; ?></label>
									  </div>
										<div class="col-xs-3 ">
											<div class="row">
												<div class="col-xs-4  text-center">
													<p class="pt7 <?php $var ='ref_r'.$i.'_f1'; echo get_gpf_class($DataRow->$var); echo get_nsa_class($DataRow->$var); ?>">
													<?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
												</div>
												<div class="col-xs-8">
													<p><?php $var ='ref_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									  <div class="col-xs-3">
											<div class="row">												
												<div class="col-xs-4  text-center bg3">
													<p class="pt7 <?php $var ='ref_r'.$i.'_f1'; echo get_gpf_class($CompareRow->$var); echo get_nsa_class($CompareRow->$var); ?> text">
													<?php $var ='ref_r'.$i.'_f1'; echo isset($CompareRow)?ucfirst($CompareRow->$var):''; ?></p>
												</div>
												<div class="col-xs-8 bg3">
													<p><?php $var ='ref_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>											
										</div>
									</div><?php 
								} 
							?>
							<div class="row bc">
							  <div class="col-sm-6 text-center">
								<label>5. Supervision</label>
							  </div>
							 	<div class="col-xs-3 text-center brl">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
								<div class="col-sm-3 text-center">
									<div class="row">
										<div class="col-xs-12">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-4 br">
											<label>Status</label>
										</div>
										<div class="col-xs-8">
											<label>Remarks</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$labels = array(
									'a) Trainers undertaking routine field visits',
									'b) Complete and timely submission of monthly reports by LHS to Health Facility',
									'Discussion & actions taken on LHS report',
									'c) Health Facility visited by any district supervisor during last 6 months',
									'd) Date of district supervisor\'s next visit known to staff'
								);
								for($i=1; $i<=count($labels); $i++){?>
									<div class="row">
									  <div class="col-xs-6 ">
										<label <?php if($i==3)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
									  </div>
									  <div class="col-xs-3">
											<div class="row">
												<div class="col-xs-4">
													<?php if($i==2 || $i==3){?>
														<div class="row">
															<div class="col-xs-12  text-center">
																<p class="pt7 <?php $var ='sup_r'.$i.'_f1'; echo get_ct_class($DataRow->$var); echo get_da_class($DataRow->$var); ?>">
																<?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
															</div>
														</div><?php
													} else if($i==5){?>
														<p class="pt7 zp"><?php $var ="sup_r5_f1"; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
														<!-- <p class="pt7 text-center"><?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p> -->
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'bgreen':'bred'):''; ?>">
																<?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
																</p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8">
													<p><?php $var ='sup_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
									  </div>
									  <div class="col-xs-3">
											<div class="row">												
												<div class="col-xs-4 bg3">
													<?php if($i==2 || $i==3){?>
														<div class="row">
															<div class="col-xs-12  text-center">
																<p class="pt7 <?php $var ='sup_r'.$i.'_f1'; echo get_ct_class($CompareRow->$var); echo get_da_class($CompareRow->$var); ?>">
																<?php $var ='sup_r'.$i.'_f1'; echo isset($CompareRow)?ucfirst($CompareRow->$var):''; ?></p>
															</div>
														</div><?php
													} else if($i==5){?>
														<p class="pt7 zp"><?php $var ="sup_r5_f1"; echo (isset($CompareRow) && $CompareRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
														<!-- <p class="pt7 text-center"><?php $var ='sup_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p> -->
														<?php
													} else{ ?>
														<div class="row">
															<div class="col-xs-12 text-center">
																<p class="pt7 <?php $var ='sup_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'bgreen':'bred'):''; ?>">
																<?php $var ='sup_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
																</p>
															</div>
														</div>
													<?php } ?>
												</div>
												<div class="col-xs-8 bg3">
													<p><?php $var ='sup_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div><?php 
								} 
							?>
							<div class="row bc mt1 mb1">
							   <div class="col-sm-12">
								<label>Discussion with Trainers/FLCF In-charge:</label>
							  </div>
							</div>
							<div class="row bc">
							  <div class="col-sm-3 text-center">
								<label>Name of the Health Facility</label>
							  </div>
							  <div class="col-sm-2 brl text-center">
								<label>Discussion Attended by</label>
							  </div>
							  <div class="col-sm-2 text-center">
								<label>Issues discussed</label>
							  </div>
							  <div class="col-sm-2 brl text-center">
								<label>Action agreed for FLCF</label>
							  </div>
							  <div class="col-sm-3  zp text-center">
								<label>Action required at DPIU/PPIU (If required)</label>
							  </div>
							</div>
							<div class="row ">
								<div class="col-sm-3"> </div>
								<div class="col-sm-9 bc bt text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 ">
									<p style="height: 170px;padding-top:0px;"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
								<div class="col-xs-2 ">
									<p style="height: 170px;padding-top:0px;"><?php $var ='dis_attnd_by'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r2_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r3_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r4_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r5_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 ">
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r2_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r3_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r4_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r5_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								  </div>
								</div>
								</div>
							</div>
							<div class="row ">
								<div class="col-sm-3"> </div>
								<div class="col-sm-9 bc text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 ">
									<p style="height: 170px;padding-top:0px;"><?php //echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
								<div class="col-xs-2 ">
									<p style="height: 170px;padding-top:0px;"><?php $var ='dis_attnd_by'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r1_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r2_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r3_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r4_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r5_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r1_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r2_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r3_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r4_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ='dis_r5_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 ">
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r1_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r2_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r3_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r4_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								  </div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<p><?php $var ='dis_r5_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								  </div>
								</div>
								</div>
							</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-12">
								<label>Critical Issues (to be followed during next visit)</label>
							</div>
						</div>
						<div class="row bc">
								<div class="col-xs-2 text-center">
									<label>Sr. No.</label>
								</div>
								<div class="col-sm-10 bl text-center">
									<div class="row">
										<div class ="col-sm-12 bb text-center">
											<label>Critical Issues</label>
										</div>
									</div>
									<div class="row">
										<div class ="col-sm-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class ="col-sm-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label>1</label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ="ci_1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label>2</label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ="ci_2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label>3</label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ="ci_3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label>4</label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var ="ci_4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ="ci_4"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label>5</label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var ="ci_5"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ="ci_5"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
					</div><!--end of row rowlightbg-->
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