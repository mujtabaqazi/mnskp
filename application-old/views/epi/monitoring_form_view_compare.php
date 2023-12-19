<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monitoring and Supervision</title>
		<?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> Monitoring and Supervision
				</div>
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
											<label class="pt7">Number of EPI staff assigned to this facility</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="staff_numb"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="staff_numb"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.5</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Number of EPI staff present</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="staff_present"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="staff_present"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.6</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Number of community volunteers involved in immunization</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="numb_cv_involved"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="numb_cv_involved"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
									<p> <?php echo isset($DataRow)?get_Fatype_Name($DataRow->fatype):''; ?> </p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.3</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Type of Health Facility</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<?php if(isset($DataRow)){$result = get_FaCat_Name($DataRow->fatype); ?>               				
										<p><?php echo isset($result)?($result['facat_name']):''; ?></p>				
									<?php } ?>
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
									<p><?php echo (isset($DataRow))?get_UC_Name($DataRow->uncode):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.5</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Taluka</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo (isset($DataRow))?get_Tehsil_Name($DataRow->tcode):''; ?></p>
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
							<div class="row">
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.7</label>
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
								<div class="col-sm-12  bgcolcl text-center">
									<label>2.0 Logistics, Record Keeping and Planning</label>
								</div>
							</div>
        
							<div class="row bc mt1 mb1" >
								<div class="col-sm-1">
									<label>2.1</label>
								</div>
								<div class="col-sm-11">
									<label>Vaccine and Supply Stock Availability</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-sm-1"><label></label></div>
								<div class="col-sm-1"><label></label></div>
								<div class="col-sm-10 ">
									<div class="row">
										<div class="col-sm-6 brl text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-sm-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-sm-1">#</div>
								<div class="col-sm-1"></div>
								<div class="col-sm-10">
									<div class="row">
										<div class="col-sm-6 brl text-center">
											<div class="row">
												<div class="col-sm-4 text-center zp">
													<label>Was there shortage of the following vaccines supplies?</label>
												</div>
												<div class="col-sm-2 brl zp text-center">
													<label>Was the shortage reported?</label>
												</div>
												<div class="col-sm-6 text-center">
													<label>Reason for shortage</label>
												</div>
											</div>
										</div>
										<div class="col-sm-6 text-cente">
											<div class="row">
												<div class="col-sm-4 text-center zp">
													<label>Was there shortage of the following vaccines supplies?</label>
												</div>
												<div class="col-sm-2 brl text-center zp">
													<label>Was the shortage reported?</label>
												</div>
												<div class="col-sm-6  text-center">
													<label>Reason for shortage</label>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $labelArray=array(
								'1' => 'BCG',
								'2' => 'Penta',
								'3' => 'OPV',
								'4' => 'Measles',
								'5' => 'PCV-10',
								'6' => 'HBV',
								'7' => 'TT',
								'8' => 'Vaccine syringes'
							); 
							foreach($labelArray as $key => $val){
							?>
							<div class="row">
								<div class="col-xs-1">
									 <label class="pt7">2.1.<?php echo $key; ?></label>
								</div>
								<div class="col-xs-1">
									<label class="pt7"><?php echo $val; ?></label>
								</div>
								<div class="col-xs-10">
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-4">
													<div class="row">
														<div class="col-xs-6 text-right">
															<p class="pt7"><?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Currently':''; ?></p>
														</div>
														<div class="col-xs-6 zp">
															<p class="pt7"><?php $var="lvs_r".$key."_f2"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Last month':''; ?></p>
														</div>
													</div>
												</div>
												<div class="col-xs-2 text-center">
													<p class="pt7 <?php  $var="lvs_r".$key."_f3"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 ">
													<p class="pt7"><?php $var="lvs_r".$key."_f4"; ?><?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-6 bg3">
											<div class="row">
												<div class="col-xs-4">
													<div class="row">
														<div class="col-xs-6 text-right">
															<p class="pt7"><?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'Currently':''; ?></p>
														</div>
														<div class="col-xs-6 zp">
															<p class="pt7"><?php $var="lvs_r".$key."_f2"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'Last month':''; ?>
														</div>
													</div>
												</div>
												<div class="col-xs-2 text-center">
													<p class="pt7 <?php  $var="lvs_r".$key."_f3"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 ">
													<p class="pt7">
													<?php $var="lvs_r".$key."_f4"; ?><?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row">
								<div class="col-xs-1">
									 <label class="pt7">2.1.8.a</label>
								</div>
								<div class="col-xs-1">
									<label class="pt7">Are these Auto Disable (AD) syringes?</label>
								</div>
								<div class="col-xs-10">
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-4">
													
												</div>
												<div class="col-xs-2 text-center">
													<p class="pt7 <?php  $var="lvs_r9_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?>
													</p>
												</div>
												<div class="col-xs-6">
													<p class="pt7"><?php $var="lvs_r9_f2"; ?><?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-6 bg3">
											<div class="row">
												<div class="col-xs-4">
													
												</div>
												<div class="col-xs-2 text-center">
													<p class="pt7 <?php  $var="lvs_r9_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?>
													</p>
												</div>
												<div class="col-xs-6">
													<p class="pt7">
													<?php $var="lvs_r9_f2"; ?><?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1">
									 <label class="pt7">2.1.9</label>
								</div>
								<div class="col-xs-1">
									<label class="pt7">Sharps safety box</label>
								</div>
								<div class="col-xs-10">
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-4">
													<?php if($key!='8.a') {?>
													<div class="row">
														<div class="col-xs-6 text-right">
															<p class="pt7"><?php $var="lvs_r10_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Currently':''; ?></p>
														</div>
														<div class="col-xs-6 zp">
															<p class="pt7"><?php $var="lvs_r10_f2"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Last month':''; ?></p>
														</div>
													</div>
													<?php } ?>
												</div>
												<div class="col-xs-2 text-center">
													<p class="pt7 <?php  $var="lvs_r10_f3"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 zp">
													<p class="pt7"><?php $var="lvs_r10_f4"; ?><?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-6 bg3">
											<div class="row">
												<div class="col-xs-4">
													<div class="row">
														<div class="col-xs-6 text-right">
															<p class="pt7"><?php $var="lvs_r10_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'Currently':''; ?></p>
														</div>
														<div class="col-xs-6 zp">
															<p class="pt7"><?php $var="lvs_r10_f2"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'Last month':''; ?>
														</div>
													</div>
												</div>
												<div class="col-xs-2 text-center">
													<p class="pt7 <?php  $var="lvs_r10_f3"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 zp">
													<p class="pt7">
													<?php $var="lvs_r10_f4"; ?><?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $labelArray=array(
								'11' => 'Is there a burn and bury facility available on the premises?',
								'12' => 'Daily EPI Register',
								'13' => 'Permanent EPI Register',
								'14' => 'EPI Cards'
							); 
							foreach($labelArray as $key => $val){
							?>
							<div class="row">
								<div class="col-xs-1">
									<label class="">2.1.<?php echo $key; ?>
								</div>
								<div class="col-xs-1 zp">
									<label class="pt7"><?php echo $val; ?></label>
								</div>
								<div class="col-xs-10">
									<div class="row">
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-6 text-center">
													<p class="pt7 <?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':' bred pt26'; ?>">
													<?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Available':''; ?></p>
												</div>
												<div class="col-xs-6 text-center">
													<p class="pt7">
													<?php $var="lvs_r".$key."_f2"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Maintained':''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-6 bg3">
											<div class="row">
												<div class="col-xs-6 text-center">
													<p class="pt7 <?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':' bred pt26'; ?>">
													<?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'Available':''; ?></p>
												</div>
												<div class="col-xs-6 text-center">
													<p class="pt7">
													<?php $var="lvs_r".$key."_f2"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'Maintained':''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row bc mt1 mb1">
								<div class="col-sm-1">
									<label>2.2</label>
								</div>
								<div class="col-sm-11">
									<label>Vaccine Stock Condition (Sample 1 vial for every 10 of each vaccine type)</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-sm-1">
									<label>#</label>
								</div>
								<div class="col-sm-1  text-center">
									<label></label>
								</div>
								<div class="col-sm-5 brl text-center">
									<div class="row">
										<div class="col-sm-3 br text-center zp">
											<label>Kept at proper temperature</label>
										</div>
										<div class="col-sm-3 br text-center">
											<label class="pt14 pb6">Frozen</label>
										</div>
										<div class="col-sm-3 text-center">
											<label class="pt14 pb6">Expired</label>
										</div>
										<div class="col-sm-3 bl text-center zp">
											<label>VVM color changed</label>
										</div>
									</div>
								</div>
								<div class="col-sm-5  text-center">
									<div class="row">
										<div class="col-sm-3 br text-center zp">
											<label>Kept at proper temperature</label>
										</div>
										<div class="col-sm-3  text-center">
											<label class="pt14 pb6">Frozen</label>
										</div>
										<div class="col-sm-3 bl text-center">
											<label class="pt14 pb6">Expired</label>
										</div>
										<div class="col-sm-3 bl text-center zp">
											<label>VVM color changed</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc bt mb1">
								<div class="col-sm-1">
									<label></label>
								</div>
								<div class="col-sm-1  text-center">
									<label></label>
								</div>
								<div class="col-sm-5 brl text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-sm-5  text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php $labelArray2=array(
								'1' => 'BCG',
								'2' => 'Penta',
								'3' => 'OPV',
								'4' => 'Measles',
								'5' => 'PCV-10',
								'6' => 'HBV',
								'7' => 'TT',
							); 
							foreach($labelArray2 as $key => $val){ ?>
							<div class="row">
								<div class="col-xs-1"><label class="">2.2.<?php echo $key; ?></label></div>
								<div class="col-xs-1 "><label class=""><?php echo $val; ?></label></div>
								<div class="col-xs-5 text-center">
									<div class="row">
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f1";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f2";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-5  text-center bg3">
									<div class="row">
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f1";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f2";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f3";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var="vsc_r".$key."_f4";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row bc mt1 mb1">
								<div class="col-sm-1">
									<label>2.3</label>
								</div>
								<div class="col-sm-4">
									<label>Cold Chain (CC) Status</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6 brl text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-sm-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.1</label>
								</div>
								<div class="col-sm-4">
									<label>Is there enough equipment to hold the cold vaccine supply?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r1_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													<p><?php $var="ccs_r1_f2"; echo (isset($DataRow)&& $DataRow->$var)?$DataRow->$var:''; ?></p>
													
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r1_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													<p><?php $var="ccs_r1_f2"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.2</label>
								</div>
								<div class="col-sm-4">
									<label>Type of CC equipment</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6 ">
											<div class="row">
												<div class="col-xs-12 text-center">
												<?php $var="ccs_r2_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p class="pt7">Refrigerator</p>':''; ?>
											 
												<?php $var="ccs_r2_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '2')?'<p class="pt7">Cold Box</p>':''; ?>
											 
												<?php $var="ccs_r2_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '3')?'<p class="pt7">Ice-lined Freezer</p>':''; ?>
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-xs-12 text-center">
												<?php $var="ccs_r2_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'<p class="pt7">Refrigerator</p>':''; ?>
											 
												<?php $var="ccs_r2_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '2')?'<p class="pt7">Cold Box</p>':''; ?>
											 
												<?php $var="ccs_r2_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'<p class="pt7">Ice-lined Freezer</p>':''; ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.3</label>
								</div>
								<div class="col-sm-4">
									<label>Is all CC Equipment in use functioning?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													 <p class="pt7 <?php $var="ccs_r3_f1"; echo get_sna_class($DataRow->$var); ?>">
													<?php  ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'None':''; ?>
													<?php $var="ccs_r3_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '2')?'Some':''; ?>
													<?php $var="ccs_r3_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '3')?'All':''; ?></p>
												</div>
												<div class="col-sm-9 zp">
													<p class="pt7"><?php $var="ccs_r3_f2"; echo (isset($DataRow)&& $DataRow->$var)?$DataRow->$var:''; ?></p>
													
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													 <p class="pt7 <?php $var="ccs_r3_f1"; echo get_sna_class($DataRow->$var); ?>">
													<?php $var="ccs_r3_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'None':''; ?>
													<?php $var="ccs_r3_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '2')?'Some':''; ?>
													<?php $var="ccs_r3_f1"; ?><?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'All':''; ?></p>
												</div>
												<div class="col-sm-9 zp">
													<p class="pt7"><?php $var="ccs_r3_f2"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.4</label>
								</div>
								<div class="col-sm-4">
									<label>Is an updated temperature chart / log displayed?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r4_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r4_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.5</label>
								</div>
								<div class="col-sm-4">
									<label>Is equipment clean?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r5_f1"; ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Inside':''; ?>
													<?php   echo (isset($DataRow) && $DataRow->$var == '2')?'Outside':''; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r5_f1"; ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Inside':''; ?>
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '2')?'Outside':''; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $labelArray3=array(
								'6' => 'Is a Voltage Stabilizer functioning for all equipment?',
								'7' => 'Is a thermostat functioning for all equipment?',
								'8' => 'Is a functioning dial thermometer inside each unit?',
								'9' => 'Is any ice accumulation on inner wall of ILR not more than 5 mm thick?',
								'10' => 'Are the tubes in the inner wall of the ILR filled / not empty?'
							); 
							foreach($labelArray3 as $key => $val){
							?>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.<?php echo $key; ?></label>
								</div>
								<div class="col-sm-4">
									<label><?php echo $val; ?></label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r".$key."_f1"; echo get_sna_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'None':''; ?>
													<?php   echo (isset($DataRow) && $DataRow->$var == '2')?'Some':''; ?>
													<?php   echo (isset($DataRow) && $DataRow->$var == '3')?'All':''; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r".$key."_f1"; echo get_sna_class($CompareRow->$var);?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'None':''; ?>
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '2')?'Some':''; ?>
													<?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'All':''; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<?php $labelArray3=array(
								'11' => 'Is BCG diluent stored with BCG vaccine?',
								'12' => 'Is Measles diluent stored with Measles vaccine?',
								'13' => 'Are there items other than routine EPI supplies (such as antigens, icepacks, and diluents) stored in the CC equipment?'
							); 
							foreach($labelArray3 as $key => $val){
							?>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.<?php echo $key; ?></label>
								</div>
								<div class="col-sm-4">
									<label><?php echo $val; ?></label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r".$key."_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ccs_r".$key."_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row">
								<div class="col-sm-1">
									<label>2.3.13.a</label>
								</div>
								<div class="col-sm-4">
									<label>If yes, what non-EPI items are stored (such as water bottles, soda etc)</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-12">
													<p class="pt7 <?php  $var="ccs_r13_f2"; ?>">
													<?php   echo isset($DataRow)? $DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-12">
													<p class="pt7 <?php  $var="ccs_r13_f2"; ?>">
													<?php   echo isset($CompareRow)? $CompareRow->$var:''; ?></p>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-sm-1">
									<label>2.4</label>
								</div>
								<div class="col-sm-4">
									<label>Immunization Coverage</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6 brl  text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-sm-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									
								</div>
							</div>
							<?php $labelArray3=array(
								'1' => 'Is an updated vaccination monitoring chart displayed at center?',
								'2' => 'Is a map of the catchment area displayed in the health facility?',
								'3' => 'Is a spot map of measles displayed?',
								'4' => 'Is a spot map of numbers needed to treat (NNT) displayed?',
								'5' => 'Are immunization information posters displayed?',
								'6' => 'Are children screened for current immunizations during HF visits?',
								'7' => 'Are pregnant women counseled on immunization during HF visits?',
								'8' => 'Check whether total number of doses of one of the antigens from the Permanent Register for the last month match with the monthly report sent to EDO Health Office.'
							); 
							foreach($labelArray3 as $key => $val){
							?>
							<div class="row">
								<div class="col-sm-1">
									<label>2.4.<?php echo $key; ?></label>
								</div>
								<div class="col-sm-4">
									<label><?php echo $val; ?></label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ic_r".$key."_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													<?php if($key == '1' || $key == '8'){ ?>
													<p><?php $var="ic_r".$key."_f2"; echo (isset($DataRow)&& $DataRow->$var)?$DataRow->$var:''; ?></p>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="ic_r".$key."_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
													<?php if($key == '1' || $key == '8') { ?>
													<p><?php $var="ic_r".$key."_f2"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php  } ?>
							<div class="row bc mt1 mb1">
								<div class="col-sm-1">
									<label>2.5</label>
								</div>
								<div class="col-sm-4">
									<label>Planning of EPI Activities</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6 brl  text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-sm-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									
								</div>
							</div>
							<?php $labelArray3=array(
								'1' => 'Does the health center have a monthly outreach activity or micro-plan duly approved and signed by the Medical Officer or Health Facility In-charge?',
								'2' => 'Were outreach activities last month conducted according to the field plan?',
								'3' => 'Is there a schedule of community meetings available?',
								'4' => 'Is there a vaccinator present at the time of this supervision visit?',
								'5' => 'If no, is there a replacement vaccinator available for this facility?',
								'6' => 'Is there an updated list of defaulters available with the vaccinator?'
							); 
							$i=1;
							foreach($labelArray3 as $key => $val){
							?>
							<div class="row">
								<div class="col-sm-1">
									<label>2.5.<?php echo $key; ?></label>
								</div>
								<div class="col-sm-4">
									<label><?php echo $val; ?></label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<?php if($i==2 ){?>
													<p class="pt7 <?php  $var="pa_r".$i."_f1"; echo get_sna_class($DataRow->$var);?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'None':''; ?>
													<?php   echo (isset($DataRow) && $DataRow->$var == '2')?'Some':''; ?>
													<?php echo (isset($DataRow) && $DataRow->$var == '3')?'All':''; ?></p>
													<?php }else{ ?>
													<p class="pt7 <?php  $var="pa_r".$i."_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
													<?php } ?>
												</div>
												<div class="col-sm-9 zp">
													<?php if($i == '1' || $i == '2'|| $i == '4'|| $i == '5'|| $i == '6') { ?>
													<p class="pt7"><?php $var="pa_r".$i."_f2"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<?php if($i==2 ){?>
													<p class="pt7 <?php  $var="pa_r".$i."_f1"; echo get_sna_class($CompareRow->$var);?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'None':''; ?>
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '2')?'Some':''; ?>
													<?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'All':''; ?></p>
													<?php }else{ ?>
													<p class="pt7 <?php  $var="pa_r".$i."_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
													<?php } ?>
												</div>
												<div class="col-sm-9 zp">
													<?php if($i == '1' || $i == '2'|| $i == '4'|| $i == '5'|| $i == '6') { ?>
													<p class="pt7"><?php $var="pa_r".$i."_f2"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $i++;} ?>
							<div class="row">
								<div class="col-sm-1">
									<label>2.5.6.b</label>
								</div>
								<div class="col-sm-4">
									<label>If yes, is it used for tracking defaulters?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="pa_r6_f3"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													
													<p class="pt7 <?php  $var="pa_r6_f3"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
													
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-11 col-xs-offset-1">
									<p class="">Ask vaccinator if present, or interviewee if he conducts vaccinations. If not, skip to 3.0</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.5.7</label>
								</div>
								<div class="col-sm-4">
									<label>Do vaccinators get POL support from the district?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="pa_r7_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													
													<p class="pt7 <?php  $var="pa_r7_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
													
												</div>
												<div class="col-sm-9 zp">
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-1">
									<label>2.5.8</label>
								</div>
								<div class="col-sm-4">
									<label>Does the district convene vaccinators for monthly review meetings?</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="pa_r8_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center">
													<p class="pt7 <?php  $var="pa_r8_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
												</div>
												<div class="col-sm-9 zp">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-sm-1">
									<label>3.0</label>
								</div>
								<div class="col-sm-4">
									<label>Monitoring of Vaccination Activity</label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6 brl  text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-sm-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
									
								</div>
							</div>
							<?php $labelArray3=array(
								'1' => 'Was any supervisory visit carried out in the health facility during last 30 days?',
								'1.a' => 'What was the date when the visit conducted?',
								'1.b' => 'Who conducted that visit?',
								'2' => 'Is a vaccination session being conducted at the time of this current visit?',
								'3' => 'Who is currently conducting vaccinations?',
								'4' => 'Is there any pre-counseling done with the parents / caretakers of the children receiving the vaccinations?',
								'5' => 'Is there any post-counseling done with the parents / caretakers of the children receiving the vaccinations?',
								'6' => 'How do vaccinators travel for outreach activities?'
							); 
							$i=1;
							foreach($labelArray3 as $key => $val){
							?>
							<div class="row">
								<div class="col-sm-1">
									<label>3.1.<?php echo $key; ?></label>
								</div>
								<div class="col-sm-4">
									<label><?php echo $val; ?></label>
								</div>
								<div class="col-sm-7">
									<div class="row">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-sm-3 text-center <?php if($i==2 ){ echo "zp";}?>">
													<?php if($i==2 ){?>
													<p class="pt7">
														<?php $var ='mva_r2_f1'; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?>														
													</p>
													<?php } else if($i==5 ){?>
													<p class="pt7 <?php  $var="mva_r".$i."_f1"; ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Vaccinator':''; ?>
													<?php   echo (isset($DataRow) && $DataRow->$var == '2')?'LHV':''; ?>
													<?php echo (isset($DataRow) && $DataRow->$var == '3')?'Other':''; ?></p>
													<?php } else if($i==8 ){?>
													<p class="pt7 <?php  $var="mva_r".$i."_f1"; ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Foot':''; ?>
													<?php   echo (isset($DataRow) && $DataRow->$var == '2')?'EPI Motorcycle':''; ?>
													<?php echo (isset($DataRow) && $DataRow->$var == '3')?'Other transport':''; ?></p>
													<?php }else{ ?>
													<p class="pt7 <?php  $var="mva_r".$i."_f1"; echo get_yn_class($DataRow->$var); ?>">
													<?php   echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
													<?php } ?>
												</div>
												<div class="col-sm-9 zp">
													<?php if($i == '8' || $i == '7'|| $i == '6'|| $i == '5') { ?>
													<p class="pt7"><?php $var="mva_r".$i."_f2"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
													<?php } ?>
												</div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-sm-3 text-center <?php if($i==2 ){ echo "zp";}?>">
													<?php if($i==2 ){?>
													<p class="pt7">
														<?php $var ='mva_r2_f1'; echo (isset($CompareRow) && $CompareRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?>
													</p>
													<?php } else if($i==5 ){?>
													<p class="pt7 <?php  $var="mva_r".$i."_f1"; ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Vaccinator':''; ?>
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '2')?'LHV':''; ?>
													<?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'Other':''; ?></p>
													<?php } else if($i==8 ){?>
													<p class="pt7 <?php  $var="mva_r".$i."_f1"; ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Foot':''; ?>
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '2')?'EPI Motorcycle':''; ?>
													<?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'Other transport':''; ?></p>
													<?php }else{ ?>
													<p class="pt7 <?php  $var="mva_r".$i."_f1"; echo get_yn_class($CompareRow->$var); ?>">
													<?php   echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
													<?php } ?>
												</div>
												<div class="col-sm-9 zp">
													<?php if($i == '8' || $i == '7'|| $i == '6'|| $i == '5') { ?>
													<p class="pt7"><?php $var="mva_r".$i."_f2"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
													<?php } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php $i++;} ?>
							<div class="row">
								<div class="col-xs-11 col-xs-offset-1">
									<p class="">Ask vaccinator if present, or interviewee if he/she conducts vaccinations. If not, skip to End</p>
								</div>
							</div>
							<div class="row bc">
								<div class="col-sm-1">
									<label class="pt10">#</label>
								</div>
								<div class="col-sm-5 bl text-center">
									<label class="pt30 pb20">Question</label>
								</div>
								<div class="col-sm-3 brl">
									<div class="row">
										<div class="col-sm-12 text-center"><label>Skills</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-sm-4 text-center"><label>Poor</label></div>
										<div class="col-sm-4 brl text-center"><label>Fair</label></div>
										<div class="col-sm-4 text-center"><label>Good</label></div>
									</div>
									<div class="row bt">
										<div class="col-sm-12 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									</div>
								</div>
								<div class="col-sm-3">
									<div class="row">
										<div class="col-sm-12 text-center"><label>Skills</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-sm-4 text-center"><label>Poor</label></div>
										<div class="col-sm-4 brl text-center"><label>Fair</label></div>
										<div class="col-sm-4 text-center"><label>Good</label></div>
									</div>
									<div class="row bt">
										<div class="col-sm-12 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<?php
							$labelArray4 = array(
								'9' => 'Can the health worker read and interpret vaccine vial monitor (VVM)?',
								'10' => 'Can he/she describe the VVM stages?',
								'11' => 'Can he/she describe what the VVM stages mean?',
								'12' => 'Does he/she know when to perform the “shake test”?',
								'13' => 'Can he/she demonstrate or describe the “shake test”?',
								'14' => 'Describe or demonstrate (if possible) appropriate injection technique',
							);
							foreach($labelArray4 as $key => $val){
							?>
							<div class="row">
								<div class="col-xs-1">
									<label class="">3.1.<?php echo ($key-2); ?></label>
								</div>
								<div class="col-xs-5">
									<label class=""><?php echo $val; ?></label>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-4 text-center">
											<p class="pt7 <?php $var="mva_r".$key."_f1";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center">
											<p class="pt7 <?php $var="mva_r".$key."_f1";  echo (isset($DataRow) && $DataRow->$var == '2')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '2')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center">
											<p class="pt7 <?php $var="mva_r".$key."_f1";  echo (isset($DataRow) && $DataRow->$var == '3')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($DataRow) && $DataRow->$var == '3')?'&#10004;':''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 bg3">
									<div class="row">
										<div class="col-xs-4 text-center">
											<p class="pt7 <?php $var="mva_r".$key."_f1";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center">
											<p class="pt7 <?php $var="mva_r".$key."_f1";  echo (isset($CompareRow) && $CompareRow->$var == '2')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '2')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center">
											<p class="pt7 <?php $var="mva_r".$key."_f1";  echo (isset($CompareRow) && $CompareRow->$var == '3')?'bgreen':'pt26 bred'; ?>">
												<?php echo (isset($CompareRow) && $CompareRow->$var == '3')?'&#10004;':''; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row mt1 mb1">
								<div class="col-sm-12  bgcolcl text-center">
									<label>4. Household Verification Tool for Routine EPI Coverage (Optional)</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-sm-2 text-center">
									<div class="row">
										<div class="col-sm-4">
											<label class="padding1">Sr.No</label>
										</div>
										<div class="col-sm-8 bl">
											<label class="padding1">Address</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="padding1">Father’s Name &amp; Cast</label>
								</div>
								<div class="col-sm-1 text-center">
									<label class="padding2">Name of Child</label>
								</div>
								<div class="col-sm-1 text-center brl">
									<label class="padding2">Age (in months)</label>
								</div>
								<div class="col-sm-1 text-center">
									<label class="padding1">BCG</label>
								</div>
								<div class="col-sm-1 text-center bl">
									<label class="padding1">OPV zero</label>
								</div>
								<div class="col-sm-2 text-center brl">
									<div class="row bb">
										<div class="col-sm-12 zp">
											<label>OPV/Penta/ Pneumococcal</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-4">
											<label>1</label>
										</div>
										<div class="col-sm-4 brl">
											<label>2</label>
										</div>
										<div class="col-sm-4">
											<label>3</label>
										</div>
									</div>
								</div>
								<div class="col-sm-1 text-center">
									<div class="row bb">
										<div class="col-sm-12">
											<label>Measles</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 br">
											<label>1</label>
										</div>
										<div class="col-sm-6">
											<label>2</label>
										</div>
									</div>
								</div>
								<div class="col-sm-1 text-center bl">
									<label class="padding2">Vaccination Card</label>
								</div>
							</div>
							<div class="row bc bt mb1">
								<div class="col-sm-12 text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
							</div>
							<?php for($i=1;$i<11;$i++){?>
							<div class="row">
								<div class="col-xs-2 pt7">
									<div class="row">
									  <div class="col-xs-4 text-center">
										<label><?php echo $i; ?></label>
									  </div>
									  <div class="col-xs-8">
										<p><?php $var = "hhvt_r".$i."_f1"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
									  </div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var = "hhvt_r".$i."_f2"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1">
									<p><?php $var = "hhvt_r".$i."_f3"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1">
									<p><?php $var = "hhvt_r".$i."_f4"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center" style="background: rgba(215, 215, 215, 0.4) none repeat scroll 0% 0%; min-height: 37px;">
									<p class="pt7 <?php $var="hhvt_r".$i."_f5";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
										<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
									</p>
								</div>
								<div class="col-xs-1 text-center ">
									<p class="pt7 <?php $var="hhvt_r".$i."_f6";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
										<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
									</p>
								</div>
								<div class="col-xs-2 " style="background: rgba(122, 121, 121, 0.04) none repeat scroll 0% 0%; min-height: 37px;">
									<div class="row">
										<div class="col-xs-4 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f7";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
									</div>
										<div class="col-xs-4 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f8";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f9";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
									  </div>
								</div>
								<div class="col-xs-1 " style="background: rgba(215, 215, 215, 0.4) none repeat scroll 0% 0%; min-height: 37px;">
									<div class="row">
										<div class="col-xs-6 text-center ">
										<p class="pt7 <?php $var="hhvt_r".$i."_f10";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f11";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 text-center ">
									<p class="pt7 <?php $var="hhvt_r".$i."_f12";  echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
									<?php echo (isset($DataRow) && $DataRow->$var == '1')?'&#10004;':''; ?>
									</p>
								</div>
							</div>
							<?php } ?>
							<div class="row bc bt mb1">
								<div class="col-sm-12 text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php for($i=1;$i<11;$i++){?>
							<div class="row">
								<div class="col-xs-2 pt7">
									<div class="row">
									  <div class="col-xs-4 text-center">
										<label><?php echo $i; ?></label>
									  </div>
									  <div class="col-xs-8">
										<p><?php $var = "hhvt_r".$i."_f1"; ?> <?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
									  </div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var = "hhvt_r".$i."_f2"; ?> <?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1">
									<p><?php $var = "hhvt_r".$i."_f3"; ?> <?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1">
									<p><?php $var = "hhvt_r".$i."_f4"; ?> <?php echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center" style="background: rgba(215, 215, 215, 0.4) none repeat scroll 0% 0%; min-height: 37px;">
									<p class="pt7 <?php $var="hhvt_r".$i."_f5";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
										<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
									</p>
								</div>
								<div class="col-xs-1 text-center ">
									<p class="pt7 <?php $var="hhvt_r".$i."_f6";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
										<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
									</p>
								</div>
								<div class="col-xs-2 " style="background: rgba(122, 121, 121, 0.04) none repeat scroll 0% 0%; min-height: 37px;">
									<div class="row">
										<div class="col-xs-4 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f7";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
									</div>
										<div class="col-xs-4 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f8";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-4 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f9";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
									  </div>
								</div>
								<div class="col-xs-1 " style="background: rgba(215, 215, 215, 0.4) none repeat scroll 0% 0%; min-height: 37px;">
									<div class="row">
										<div class="col-xs-6 text-center ">
										<p class="pt7 <?php $var="hhvt_r".$i."_f10";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center ">
											<p class="pt7 <?php $var="hhvt_r".$i."_f11";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
											<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 text-center ">
									<p class="pt7 <?php $var="hhvt_r".$i."_f12";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'pt26 bred'; ?>">
									<?php echo (isset($CompareRow) && $CompareRow->$var == '1')?'&#10004;':''; ?>
									</p>
								</div>
							</div>
							<?php
						} ?>
					</div>
				</div><!--end of rowlightbg-->
				<div class="row">
					<div class="col-sm-12  bgcolcl text-center">
						<label>5. Overall comments & feedback given to staff at Health Facility</label>
					</div>
				</div>
				<div class="row" style="padding-bottom: 1px;">
					<div class="col-xs-6  ">
						<label>Overall Observations/Comments & Recommendations</label>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table   table-bordered  ">
							<thead class="bc">
								<tr>
									<th style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">
									</th>
									<th style="width: 43% !important; text-align: center !important;">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</th> 
									<th style="width: 43% !important; text-align: center !important;">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</th>               
								</tr>
							</thead>
							<tbody>
								<tr>
									<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Observations
									</td>
									<td style="width: 43% !important;">
										<p><?php echo (isset($DataRow))?$DataRow->observations:''; ?></p>
									</td> 
									<td style="width: 43% !important;" class="bg3">
										<p><?php echo (isset($CompareRow))?$CompareRow->observations:''; ?></p>
									</td>               
								</tr>
								<tr>
									<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Issues
									</td>
									<td style="width: 43% !important;" >
										<p><?php echo (isset($DataRow))?$DataRow->issues:''; ?></p>
									</td>  
									<td style="width: 43% !important;" class="bg3">
										<p><?php echo (isset($CompareRow))?$CompareRow->issues:''; ?></p>
									</td>               
								</tr>
								<tr>
									<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Actions
									</td>
									<td style="width: 43% !important;" >
										<p><?php echo (isset($DataRow))?$DataRow->actions:''; ?></p>
									</td> 
									<td style="width: 43% !important;" class="bg3">
										<p><?php echo (isset($CompareRow))?$CompareRow->actions:''; ?></p>
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
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
  <?php $this->load->view("templates/footer"); ?>
  <?php $this->load->view("templates/scripts"); ?>
</body>
</html>