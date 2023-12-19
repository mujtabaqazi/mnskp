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
		<title>LHS || Form</title>
		<?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Lady Health Supervisors (LHS) (To be used for two Lady Health Supervisors only)</div>
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
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Name of LHS</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $lhsname = ""; echo isset($DataRow)?$lhsname = get_LHS_Name($DataRow->lhscode):''; ?></p>
									</div>
								</div>
							<div class="row">
								<div class="col-xs-3 mt7">
									<label>Name of LHS</label>
								</div>
								<div class="col-xs-3">
									<p><?php $lhsname = ""; echo isset($DataRow)?$lhsname = get_LHS_Name($DataRow->lhscode):''; ?></p>
								</div>
							</div>
							<div class="row bc bb" style="padding-bottom: 1px;">
								<div class="col-xs-12 text-center">
									<label>Section 1: MONITORING AND SUPERVISION</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 text-center br"><label class="pt7 pb19">#</label></div>
								<div class="col-xs-5 text-center"></div>
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
									'Attending the HQ facility daily (Signing register)',
									'Advance tour plan available at FLCF and DPIU (Yes/No)',
									'Conducted 80% tours as per tour plan (Last month)',
									'Continued Education session attended in all concerned Health Facilities',
									'Each LHW visited (at least once every month) to the attached HQ health facility',
									'Uses Supervisory Checklist Properly',
									'Weaknesses in the knowledge and skills of the LHWs are communicated to the trainers',
									'Imparting on-job training to LHWs',
									'Cross checking the LHW-MIS (LHWs performance report, known as Jaiza Karkardagi, JK)',
									'Coordination with FLCF staff',
									'Average score of LHWs supervised (JK report)',
									'Using the training checklist (if the training is going on in the FLCF)',
									'Complete and timely monthly reports submitted for last three months to',
									'FLCF',
									'DPIU',
									'Attended MMC at DPIU for last month',
									'Log book of vehicle properly maintained',
									'Salary received for last month',
									'FOL/FTA paid for last month',
									'Knowledge of LHS (Categories) (May use annex C-I, C-II)',
									'Supervision & Training',
									'IPC and Community org.',
									'Maternal health',
									'Child health',
									'Family planning',
									'Common ailment',
									'Doses of medicines',
									'First aid',
									'LHW-MIS',
									'Skills of LHS (Categories)(May use annex C-I, C-Il)',
									'Supervision & Training',
									'IPC and Community org.',
									'Maternal health',
									'Child health',
									'Family planning',
									'Common ailment +doses of medicines + First aid',
									'LHW-MIS',
								);
								$srNo = 1;
								$rownum = 1;
								for($i=1; $i<=count($labels); $i++){ ?>
									<div class="row">
										<div class="col-xs-1 text-center mt7">
											<label><?php if($i==14 || $i==15 || ($i>=21 && $i<=29) || ($i>=31 && $i<=37)){}else{echo $srNo;} ?></label>
										</div>
										<div class="col-xs-5 mt7">
											<label><?php echo $labels[$i-1]; ?></label>
										</div>
										<div class="col-xs-3 zp">
											<div class="row">
												<div class="col-xs-4 text-center">
													<?php 
													if($i==13 || $i==20 || $i==30){}else{
														if($i==11){?>
															<p class="">
																<?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>
															</p>
															<?php
														} else{ ?>
															<p class="pt7 <?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'bgreen':'bred'):''; ?>">
																<?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
															</p>
														<?php }
													}?>
												</div>
												<div class="col-xs-8">
													<p class="">
														<?php 
														if($i==13 || $i==20 || $i==30){}else{ ?> 
															<p><?php $var ='ms_r'.$rownum.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
														<?php } ?>
													</p>
												</div>
											</div>
										</div>
										<div class="col-xs-3 ">
											<div class="row">												
												<div class="col-xs-4 text-center bg3">
													<?php 
													if($i==13 || $i==20 || $i==30){}else{
														if($i==11){?>
															<p class="">
																<?php $var ='ms_r'.$rownum.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?>
															</p>
															<?php
														} else{ ?>
															<p class="pt7 <?php $var ='ms_r'.$rownum.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'bgreen':'bred'):''; ?>">
																<?php $var ='ms_r'.$rownum.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
															</p>
														<?php }
													}?>
												</div>
												<div class="col-xs-8 bg3">
													<p class="">
														<?php 
														if($i==13 || $i==20 || $i==30){}else{ ?> 
															<p><?php $var ='ms_r'.$rownum.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
														<?php } ?>
													</p>
												</div>
											</div>
											
										</div>
									</div><?php 
									if($i==14 || $i==15 || ($i>=21 && $i<=29) || ($i>=31 && $i<=37)){}else{$srNo++;}
									if($i==13 || $i==20 || $i==30){}else{$rownum++;}
								} 
							?>
							<div class="row bc bb" style="padding-bottom: 1px;">
								<div class="col-xs-12 text-center">
									<label>Section 2: DISCUSSION WITH LHS</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-3 text-center">
									<label>Name of the LHS</label>
								</div>
								<div class="col-xs-3 brl text-center">
									<label>Issues discussed</label>
								</div>
								<div class="col-xs-3 br text-center">
									<label>Action agreed for LHS</label>
								</div>
								<div class="col-xs-3 text-center">
									<label>Action required at FLCF/DPIU/PPIU</label>
								</div>
							</div>
							<div class="row ">
								<div class="col-sm-3"> </div>
								<div class="col-sm-9 bc bt text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<p style="height: 170px;" ><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
								<div class="col-xs-3 zp">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
									  <div class="col-xs-12">
										<p><?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									  </div>
									</div>
								</div>
								<div class="col-xs-3 zp">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 zp">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row ">
								<div class="col-sm-3"> </div>
								<div class="col-sm-9 bc text-center">
									<label><?php $var ="fm