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
	  <title>LQAS || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Data Accuracy Using LQAS Techniques
				</div>
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
											<label class="pt7">Plan Month</label>
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
											<label class="pt7">LQAS Date</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="lqas_date"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="lqas_date"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.2</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Name of reporting Officer</label>
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
											<label class="pt7 pb2">Entity Type</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?$DataRow->entity_type:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.2</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Entity Name</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($CompareRow)?get_Entity_Name($CompareRow->entity_code,$CompareRow->entity_type):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.3</label>
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
											<label class="pt7 pb2">2.4</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Facility</label>
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
							</br>
							<!--<div class="row bc">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-1 zp text-center">
													<label style="padding-top:60px;">Sr #</label>
												</div>
												<div class="col-xs-11 brl text-center">
													<div class="row bb">
														<div class="col-xs-12 text-center">
															<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
														</div>
													</div>
													<div class="row">
														<div class="col-xs-5">
															<div class="row">
																<div class="col-xs-12 text-center">
																	<label>Data From Monthly Reporting Form</label>
																</div>
															</div>
															<div class="row bt">
																<div class="col-xs-6 zp text-center">
																	<label class="pt20">Data Element Field</label>
																</div>
																<div class="col-xs-6 bl zp text-center">
																	<label>Numbers From Monthly Report Form</label>
																</div>
															</div>
														</div>
														<div class="col-xs-5 brl text-center">
															<div class="row">
																<div class="col-xs-12 text-center">
																	<label>Varification of data from registers</label>
																</div>
															</div>
															<div class="row bt">
																<div class="col-xs-8 br zp text-center">
																	<label class="pt20 pb20">Register / Form</label>
																</div>
																<div class="col-xs-4 text-center">
																	<label class="pt20">Numbers</label>
																</div>
															</div>
														</div>
														<div class="col-xs-2 zp">
															<label class="pt25">Do numbers in column match?</label>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-12 text-center">
													<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
												</div>
											</div>
											<div class="row bt">
												<div class="col-xs-5">
													<div class="row">
														<div class="col-xs-12 text-center">
															<label>Data From Monthly Reporting Form</label>
														</div>
													</div>
													<div class="row bt">
														<div class="col-xs-6 text-center">
															<label class="pt20">Data Element Field</label>
														</div>
														<div class="col-xs-6 bl text-center zp">
															<label>Numbers From Monthly Report Form</label>
														</div>
													</div>
												</div>
												<div class="col-xs-5 brl text-center">
													<div class="row">
														<div class="col-xs-12 text-center">
															<label>Varification of data from registers</label>
														</div>
													</div>
													<div class="row bt">
														<div class="col-xs-6 br text-center zp">
															<label class="pt20 pb20">Register / Form</label>
														</div>
														<div class="col-xs-6 text-center">
															<label class="pt20">Numbers</label>
														</div>
													</div>
												</div>
												<div class="col-xs-2 zp text-center">
													<label class="pt25">Do numbers
														<br>
														in column match?</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>-->
							<?php /* for($i=1;$i<=12;$i++){ ?>
							<div class="row">
								<div class="col-xs-12">
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-1 zp text-center">
													<label class="pt7"><?php echo $i; ?></label>
												</div>
												<div class="col-xs-11">
													<div class="row">
														<div class="col-xs-5">
															<div class="row">
																<div class="col-xs-6 zp">
																	<p class="pt7">
																		<?php $var ="lqas_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>
																	</p>
																</div>
																<div class="col-xs-6 zp text-center">
																	<p class="pt7">
																		<?php $var ="lqas_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>
																	</p>
																</div>
															</div>
														</div>
														<div class="col-xs-5">
															<div class="row">
																<div class="col-xs-8 zp">
																	<p class="pt7">
																		<?php $var ="lqas_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>
																	</p>
																</div>
																<div class="col-xs-4 text-center">
																	<p class="pt7">
																		<?php $var ="lqas_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?>
																	</p>
																</div>
															</div>
														</div>
														<div class="col-xs-2 text-center">
															<p class="mt7 <?php $var="lqas_r".$i."_f5"; echo get_yn_class($DataRow->$var); ?> " >
																<?php $var="lqas_r".$i."_f5"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-6 bg3">
											<div class="row">
												<div class="col-xs-5">
													<div class="row">
														<div class="col-xs-6 zp">
															<p class="pt7">
																<?php $var ="lqas_r".$i."_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
															</p>
														</div>
														<div class="col-xs-6 text-center zp">
															<p class="pt7">
																<?php $var ="lqas_r".$i."_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
															</p>
														</div>
													</div>
												</div>
												<div class="col-xs-5">
													<div class="row">
														<div class="col-xs-6 zp">
															<p class="pt7">
																<?php $var ="lqas_r".$i."_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
															</p>
														</div>
														<div class="col-xs-6 text-center">
															<p class="pt7">
																<?php $var ="lqas_r".$i."_f4"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
															</p>
														</div>
													</div>
												</div>
												<div class="col-xs-2 text-center">
													<p class="mt7 <?php $var="lqas_r".$i."_f5"; echo get_yn_class($CompareRow->$var); ?> " >
														<?php $var="lqas_r".$i."_f5"; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } */ ?>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-4 text-right">
									<label style="padding-top:55px;">Total</label>
								</div>
								<div class="col-xs-5 text-center">
									<div class="row bc">
										<div class="col-xs-6 br">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									<div class="row bt bc">
										<div class="col-xs-3 text-center  ">
											<label>Yes</label>
										</div>
										<div class="col-xs-3 brl text-center  ">
											<label>No</label>
										</div>
										<div class="col-xs-3 text-center  ">
											<label>Yes</label>
										</div>
										<div class="col-xs-3 bl text-center  ">
											<label>No</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-3  zp">
											<label><?php $var ="lqas_tot"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
										</div>
										<div class="col-xs-3  zp">
											<label><?php echo $varNo = 12-$DataRow->$var; ?></label>
										</div>
										<div class="col-xs-3 zp bg3">
											<label><?php $var ="lqas_tot"; echo isset($CompareRow)?$CompareRow->$var:''; ?></label>
										</div>
										<div class="col-xs-3 zp bg3">
											<label><?php echo $varNo = 12-$CompareRow->$var; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-4 text-right">
									<label>Accuracy Percentage</label>
								</div>
								<div class="col-xs-5">
									<div class="row">
										<div class="col-xs-6 text-center">
											<label class="pt7"><?php $var ="lqas_ap"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
										</div>
										<div class="col-xs-6 text-center bg3">
											<label class="pt7"><?php $var ="lqas_ap"; echo isset($CompareRow)?$CompareRow->$var:''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 bc cmargin27 text-center">
									<label>LQAS Table: Decisions Rules for Sample Sizes of 12 and Coverage Targets/Average of 40-95%</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1 zp text-center">
									<label>Sample Size</label>
								</div>
								<div class="col-xs-1 zp bl text-center">
									<label>Less than 20%</label>
								</div>
								<div class="col-xs-10 text-center">
									<div class="row">
										<div class="col-xs-1 brl"><label class="pt7">20%</label></div>
										<div class="col-xs-1"><label class="pt7">30%</label></div>
										<div class="col-xs-1 brl"><label class="pt7">40%</label></div>
										<div class="col-xs-1"><label class="pt7">45%</label></div>
										<div class="col-xs-1 brl"><label class="pt7">50%</label></div>
										<div class="col-xs-1"><label class="pt7">60%</label></div>
										<div class="col-xs-1 brl"><label class="pt7">65%</label></div>
										<div class="col-xs-1"><label class="pt7">75%</label></div>
										<div class="col-xs-1 brl"><label class="pt7">85%</label></div>
										<div class="col-xs-1"><label class="pt7">90%</label></div>
										<div class="col-xs-1 brl"><label class="pt7">95%</label></div>
										<div class="col-xs-1"><label class="pt7">100%</label></div>
									</div>
								</div>
							</div>
							<div style="border-top: 1px solid; border-bottom: 1px solid;" class="row">
								<div class="col-xs-1 zp text-center">
									<label>12</label>
								</div>
								<div class="col-xs-1 zp bl text-center">
									<label>N/A</label>
								</div>
								<div class="col-xs-10 text-center">
									<div class="row">
										<div class="col-xs-1 brl"><label class="pt7">1</label></div>
										<div class="col-xs-1"><label class="pt7">2</label></div>
										<div class="col-xs-1 brl"><label class="pt7">3</label></div>
										<div class="col-xs-1"><label class="pt7">4</label></div>
										<div class="col-xs-1 brl"><label class="pt7">5</label></div>
										<div class="col-xs-1"><label class="pt7">6</label></div>
										<div class="col-xs-1 brl"><label class="pt7">7</label></div>
										<div class="col-xs-1"><label class="pt7">8</label></div>
										<div class="col-xs-1 brl"><label class="pt7">9</label></div>
										<div class="col-xs-1"><label class="pt7">10</label></div>
										<div class="col-xs-1 brl"><label class="pt7">11</label></div>
										<div class="col-xs-1"><label class="pt7">12</label></div>
									</div>
								</div>
							</div>
						</div><!--end of div rowlightbg-->
					</div><!--end of alignmentview-->
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);" ><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>