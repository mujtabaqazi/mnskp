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
	  <title>Monitoring Checklist for Provincial warehouse/District stores || Form</title>
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
					Monitoring Checklist for Provincial warehouse/District stores
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
												<label class="pt7">Name of Monitor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="moniter_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="moniter_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Designation of Monitor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="moniter_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="moniter_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
										<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.2</label>
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
												<label class="pt7 pb2">2.3</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Facility Type</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.4</label>
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
								<div class="row mt1 mb1 bc">
									<div class="col-xs-8">
										<label>General information</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php 
								$labels=array(
									"1. Location (accessibility)",
									"2. Security (secure doors & windows)",
									"3. Independent store for TB drugs?",
									"4. Store keeper trained",
									"5. Physical condition of store satisfactory (roof, walls, ceiling, any seepage, condition of white wash, etc.)",
									"6. Seating arrangements (office furniture, availability and condition)",
									"7. Medicine stored on racks & pellets",
									"8. Accessibility: (about 2 Meter )",
									"9. Height from floor: (about 12 cm)",
									"10. Distance from wall as per guidelines (about 40 cm)",
									"11. Exposed to sunlight",
									"12. Bin cards present and tally with stock register and stock",
									"13. Medicines storage following FIFO & FEFO rule",
									"14. Place for loading/unloading",
									"15. Room temperature at the time of visit",
									"16. Temperature chart maintained"
								);
								for($i=1;$i<=count($labels);$i++){ ?>
								<div class="row">
									<?php if($i==1||$i==2 ||$i==4) { ?>
									<div class="col-xs-4">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<?php if($i==4){ ?>
									<div class="col-xs-2 text-center">
									</div>
									<div class="col-xs-2 ">
										<div class="row">
											<div class="col-xs-12 ">
												<label class="pt26"></label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12 ">
												<label class="pt7 pb2">If yes, Date of training</label>
											</div>
										</div>
										
									</div>
									<div class="col-xs-4 text-center">
										<div class="row">
											<div class="col-xs-6 text-center">
												<div class="row">
													<div class="col-xs-3"></div>
													<div class="col-xs-6">
														<p class="pt7 <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($DataRow->$var);?>">
														<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?>
														</p>
													</div>
												</div>		
											</div>
											<div class="col-xs-6 text-center bg3">
												<div class="row">
													<div class="col-xs-3"></div>
													<div class="col-xs-6">
														<p class="pt7 <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var);?>">
														<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?>
														</p>
													</div>
												</div>		
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 text-center zp">
												<p><?php echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->dot))):''; ?></p>
											</div>
											<div class="col-xs-6 text-center bg3 zp">
												<p><?php echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->dot))):''; ?></p>
											</div>
										</div>
									</div>
									<?php }else { ?>
									<div class="col-xs-2 col-xs-offset-4">
										<p><?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<p><?php $var ='gi_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									
									<?php } }else { ?>
									<div class="col-xs-<?php echo ($i==15)?"6":"8"; ?>">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<?php if ($i==15){?>
									<div class="col-xs-4 col-xs-offset-2 text-center">
										<div class="row">
											<div class="col-xs-6 text-center zp">
												<div class="row">
													<div class="col-xs-3"></div>
													<div class="col-xs-6">
														<p class="pt7 br <?php $var ='gi_r'.$i.'_f1';  echo get_yn_class($DataRow->$var);?>" >
														<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Satisfactory" : ($DataRow->$var == 0 ? "Unsatisfactory" : ""):'';?>
														</p>
													</div>
												</div>		
											</div>
											<div class="col-xs-6 text-center bg3 zp">
												<div class="row">
													<div class="col-xs-3"></div>
													<div class="col-xs-6">
														<p class="pt7 bl <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var);?>">
														<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Satisfactory" : ($CompareRow->$var == 0 ? "Unsatisfactory" : ""):'';?>
														</p>
													</div>
												</div>		
											</div>
										</div>
										<div class="row">
											<div class="col-xs-3 text-right">
												<p class="pt5"><?php $var ='temperature'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
											<div class="col-xs-3 text-left">
												<label class="pt7">&deg;C</label>
											</div>
											<div class="col-xs-3 text-right bg3">
												<p class="pt5"><?php $var ='temperature'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
											<div class="col-xs-3 text-left bg3">
												<label class="pt7">&deg;C</label>
											</div>
										</div>
									</div>
									<?php }?>
									<?php if ($i==6||$i==7||$i==14||$i==15) {
									if ($i==15){}else{ ?>
									<div class="col-xs-2 text-center zp">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 br <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($DataRow->$var);?>">
												<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Satisfactory" : ($DataRow->$var == 0 ? "Unsatisfactory" : ""):'';?>
												</p>
											</div>
										</div>	
									</div>
									<div class="col-xs-2 text-center bg3 zp">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 bl <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var);?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Satisfactory" : ($CompareRow->$var == 0 ? "Unsatisfactory" : ""):'';?>
												</p>
											</div>
										</div>		
									</div>
									<?php } }else { ?>
									<div class="col-xs-2 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($DataRow->$var);?>">
												<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?>
												</p>
											</div>
										</div>	
									</div>
									<div class="col-xs-2 text-center bg3">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php $var ='gi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var);?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?>
												</p>
											</div>
										</div>	
									</div>
									<?php } } ?>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-12">
										<label class="pt7 pb2">17. ATT drugs: (after physical verification information to be obtained from stock register)</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-1 text-center">
										<label>Sr. #</label>
									</div>
									<div class="col-xs-3 bl text-center">
										<label class="pt14 pb13">Name of drugs</label>
									</div>
									<div class="col-xs-1 bl text-center">
										<label>Last consignment</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Last consignment received on</label>
									</div>
									<div class="col-xs-1 text-center">
										<label>Stock balance</label>
									</div>
									<div class="col-xs-1 bl text-center">
										<label>Last consignment</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Last consignment received on</label>
									</div>
									<div class="col-xs-1 text-center">
										<label>Stock balance</label>
									</div>
								</div>
								<div class="row bc bt">
									<div class="col-xs-1 text-center">
										<label></label>
									</div>
									<div class="col-xs-3 text-center">
										<label class=""></label>
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php 
								$labels=array(
									"4 FDCs ",
									"2 FDCs 150 mg",
									"2 FDCs 450 mg",
									"HRE",
									"Inj. Streptomycin",
									"Distilled Water",
									"Disposable syringes",
								);
								for ($i=1;$i<=count($labels);$i++){ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i;?></label>
									</div>
									<div class="col-xs-3">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='atd_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='atd_r'.$i.'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='atd_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='atd_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center bg3">
										<p><?php $var ='atd_r'.$i.'_f2'; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='atd_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-12">
										<label class="pt7 pb2">Pediatric Drugs</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-1 text-center">
										<label>Sr. #</label>
									</div>
									<div class="col-xs-3 bl text-center">
										<label class="pt14 pb13">Name of drugs</label>
									</div>
									<div class="col-xs-1 bl text-center">
										<label>Last consignment</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Last consignment received on</label>
									</div>
									<div class="col-xs-1 text-center">
										<label>Stock balance</label>
									</div>
									<div class="col-xs-1 bl text-center">
										<label>Last consignment</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Last consignment received on</label>
									</div>
									<div class="col-xs-1 text-center">
										<label>Stock balance</label>
									</div>
								</div>
								<div class="row bc bt">
									<div class="col-xs-1 text-center">
										<label></label>
									</div>
									<div class="col-xs-3 text-center">
										<label class=""></label>
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php
								$labels=array(
									"3 FDCs ",
									"2 FDCs 60/30",
									"H 100 mg",
									"Z 400 mg"
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i;?></label>
									</div>
									<div class="col-xs-3">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='pd_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pd_r'.$i.'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='pd_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='pd_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center bg3">
										<p><?php $var ='pd_r'.$i.'_f2'; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='pd_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-12">
										<label class="pt7 pb2">18. Record pertaining to issue the drugs: (from indents, issue voucher and stock register)</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1">
										<label class="pt14">Sr.#</label>
									</div>
									<div class="col-sm-3 bl text-center">
										<label class="pt24 pb16">Name of document</label>
									</div>
									<div class="col-sm-1 bl text-center">
										<label class="pt24 pb16">Present</label>
									</div>
									<div class="col-sm-1 bl zp text-center">
										<label class="pt14 pb6">Complete / Incomplete</label>
									</div>
									<div class="col-sm-1 brl zp text-center">
										<label>Signed by store keeper and DDO</label>
									</div>
									<div class="col-sm-1 zp br text-center">
										<label>Tally with other documents?</label>
									</div>
									<div class="col-sm-1 text-center">
										<label class="pt14">Present</label>
									</div>
									<div class="col-sm-1 bl zp text-center">
										<label class="pt14 pb6">Complete / Incomplete</label>
									</div>
									<div class="col-sm-1 zp brl text-center">
										<label>Signed by store keeper and DDO</label>
									</div>
									<div class="col-sm-1 zp text-center">
										<label>Tally with other documents?</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-1">
										<label class="pt14"></label>
									</div>
									<div class="col-sm-3 text-center">
										<label class=""></label>
									</div>
									<div class="col-sm-4 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-sm-4 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php
								$labels=array(
									"Indent voucher ",
									"Issue voucher",
									"Stock register ",
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i; ?></label>
									</div>
									<div class="col-xs-3">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
										<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f2'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='pid_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Complete" : ($DataRow->$var == 0 ? "Incomplete" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f3'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='pid_r'.$i.'_f3';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f4'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='pid_r'.$i.'_f4';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
										<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f2'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='pid_r'.$i.'_f2';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Complete" : ($CompareRow->$var == 0 ? "Incomplete" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f3'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='pid_r'.$i.'_f3';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php $var ='pid_r'.$i.'_f4'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='pid_r'.$i.'_f4';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<?php } ?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<div class="row mt1">
							<div class="col-xs-12 bgcolcl text-center mn25"></div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered">
									<thead >
										<tr class="bc">
											<th style="width: 14% !important;background-color: #0B7D05; color:white;font-weight: bold;"></t4>
											<th style="width: 43% !important;text-align: center !important;">
												<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
											</th>
											<th style="width: 43% !important; text-align: center !important;" >
												<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Issues/Challenges found during the visit </td>
											<td style="width: 43% !important;">
											<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
											<td style="width: 43% !important;" class="bg3">
											<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Feedback/Recommendations to MDR unit </td>
											<td style="width: 43% !important;">
											<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
											<td style="width: 43% !important;" class="bg3">
											<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
			</div>
			<!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#compare_btn").on('click',function(e){
				window.location.href="<?php echo $basePath; ?>tbc/forms/stores_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
		</script>
	</body>
</html>