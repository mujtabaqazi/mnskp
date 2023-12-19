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
	  <title>LMNE || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Logistics Monitoring/Evaluation 
				</div>
				<div class="panel-body pbody">
					<div class="alignmentview">
						<div class="rowlightbg">
							<div class="row bc">
								<div class="col-xs-3 col-xs-offset-1">
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
								<div class="col-xs-3 col-xs-offset-1">
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
									<p> <?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="dov"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
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
								<div class="col-xs-3 col-xs-offset-1">
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
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.4</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Name of District Coordinator</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="district_coordinator_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="district_coordinator_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.5</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Name of In-charge FLCF</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="incharge_flcf_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="incharge_flcf_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.6</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">In-charge Store</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="incharge_store_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="incharge_store_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.7</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">In-charge Logistics</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="incharge_store_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="incharge_store_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.8</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Name of DHIS/HMIS Person</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="dhis_person_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="dhis_person_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.9</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Designation of DHIS/HMIS Person</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="dhis_person_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="dhis_person_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.10</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Number of LHWs</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<p><?php $var ="total_lhws"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 text-center bg3">
									<p><?php $var ="total_lhws"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7">1.11</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7">Is a separate space for the storage of contraceptives/general medicine provided?</label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<div class="row">
										<div class="col-xs-4">
										</div>
										<div class="col-xs-4">
											<p class="pt7 <?php $var ="storage_space"; echo get_yn_class($DataRow->$var); ?>"><?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
										</div>
										<div class="col-xs-4">
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center bg3">
									<div class="row">
										<div class="col-xs-4">
										</div>
										<div class="col-xs-4">
											<p class="pt7 <?php echo get_yn_class($CompareRow->$var); ?>"><?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
										</div>
										<div class="col-xs-4">
										</div>
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>Section 2: Identification</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.1</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">District</label>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var = "distcode"; echo isset($DataRow)?get_District_Name($DataRow->$var):''; ?></p>
								</div>
								<div class="col-xs-3 ">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.2</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Name of FLCF</label>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 col-xs-offset-1">
									<div class="row">
										<div class="col-xs-2">
											<label class="pt7 pb2">2.3</label>
										</div>
										<div class="col-xs-10">
											<label class="pt7 pb2">Province</label>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p>Khyber Pakhtunkhwa</p>
								</div>
							</div>
						<div class="row" style="">
							<div class="col-sm-12 cmargin27 bgcolcl text-center">
								<label>6. Store Specification</label>
							</div>
						</div>
						<div class="row bc bt">
							<div class="col-xs-5 col-xs-offset-1">
								<label class=""></label>
						  	</div>
						  	<div class="col-xs-3 brl text-center">
								<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
						  	</div>
						  	<div class="col-xs-3 text-center">
								<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
						  	</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-1 ">
							<label>Location</label>
							</div>
							<div class="col-xs-3">
							<p><?php $var ="ss_location"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-3 bg3">
							<p><?php $var ="ss_location"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-1 ">
							<label>Measurements of present space?</label>
							</div>
							<div class="col-xs-3">
							<p><?php $var ="ss_measurement"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-3 bg3">
							<p><?php $var ="ss_measurement"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-1 ">
							<label>Is the present space adequate?</label>
							</div>
							<div class="col-xs-3">
							<p><?php $var ="ss_adequate"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-3 bg3">
							<p><?php $var ="ss_adequate"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-1 ">
							<label>If no, area required in sq. ft.</label>
							</div>
							<div class="col-xs-3">
							<p><?php $var ="ss_area"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-3 bg3">
							<p><?php $var ="ss_area"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row" style="">
							<div class="col-sm-12 cmargin27 bgcolcl text-center">
								<label>7. Maintenance of Stores</label>
							</div>
						</div>
						<div class="row bc bt">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class=""></label>
						  </div>
						  <div class="col-xs-1 brl text-center">
							<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
						  </div>
						  <div class="col-xs-1 text-center">
							<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Cleanliness</label>
						  </div>
						  <div class="col-xs-1 text-center">
							<p class="pt7 <?php $var ="ms_cleanliness"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
								<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
							</p>
						  </div>
						  <div class="col-xs-1 text-center bg3">
							<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
								<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
							</p>
						  </div>
						</div>
						<div class="row">
							<div class="col-xs-9 col-xs-offset-1">
								<label class="">Whitewash</label>
							</div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_whitewash"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-9 col-xs-offset-1">
								<label class="">Ceiling Condition (No Leakage etc.)</label>
							</div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_ceiling"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Floor cemented</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_cemented"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Ventilation</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_ventilation"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Light</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_light"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							 <label class="">Fire-fighting equipment</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_ff_equipment"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Door/Windows</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_door_windows"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Direct Sunlight is penetrating in</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_sunlight"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">Secure</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="ms_security"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label></label>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">8. Are storerooms disinfected and sprayed every third month against insects, rodents andbi</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="sr_sprayed"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">9. Is stacking of cartons four (4) inches of the floor? (Using wooden planks and approximately two (2) feet away from any wall).</label>
						  </div>
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="cartons_stacking"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">10. Is each consignment stacked separately? (To facilitate counting and access to hind stack?)</label>
						  </div>	
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="consignment"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">11. Is fist-expiry-fist out (FEFO) method followed?</label>
						  </div>	
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="fefo"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">12. Are stacks more than eight (8) feet high?</label>
						  </div>	
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="stacks_8feet"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">13. Are marking, labels, manufacturing or expiry dates visible?</label>
						  </div>	
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="dates_visible"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">14. Has each stack a Bin Card?</label>
						  </div>	
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="bin_card"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">15. If yes? Entries proper</label>
						  </div>	
							<div class="col-xs-1 text-center">
								<p class="pt7 <?php $var ="entries_proper"; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
									<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
								</p>
							</div>
							<div class="col-xs-1 text-center bg3">
								<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):"";?>">
									<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):'';  ?>
								</p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">16. How many times in the last quarter the following officials have visited your store?</label>
						  </div>
						</div>
						<div class="row">
						  <div class="col-sm-5 col-sm-offset-3 bc text-center">
							<label>Officials</label>
						  </div>
						  <div class="col-sm-4 bc bl text-center">
							<label>Number of Times</label>
						  </div>
						</div>
						<div class="row  ">
						  <div class="col-sm-5 col-sm-offset-3">
							<label></label>
						  </div>
						  <div class="col-sm-2 bc bl bt text-center">
							<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
						  </div>
						  <div class="col-sm-2 bc bl bt text-center">
							<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
						  </div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3 ">
								<label>EDO(H)/DOH</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php $var ="edo_dho_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php $var ="edo_dho_visits"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3 ">
								<label>District Coordinator</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php $var ="dc_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php $var ="dc_visits"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3 ">
								<label>Program Officer</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php $var ="po_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php $var ="po_visits"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3 ">
								<label>Any Other</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php $var ="other_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php $var ="other_visits"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
						  <div class="col-xs-7 col-xs-offset-1">
							<label class="">17. Frequency of supply received from PPIU/DPIU</label>
						  </div>					  
						  <div class="col-xs-2">
							<p><?php $var ="supply_frequency"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 bg3">
							<p><?php $var ="supply_frequency"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-7 col-xs-offset-1">
							<label class="">18. What is the average time between a FLCF/District request for medicines/supplies and receipt against that indent?</label>
						  </div>
							<div class="col-xs-2 ">
								<p><?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 bg3">
								<p><?php $var ="supply_avg_time"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<!-- <div class="row">
						  <div class="col-xs-3 col-xs-offset-3">
							<div class="input-group">
							  <div class="input-group-btn">
								<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
								  <span>1.</span>
								</a>
							  </div>
							  <p><?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control" type="Search">
							  <div class="input-group-btn">
								<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
								  <span>Weeks</span>
								</a>
							  </div>
							</div>                         
						  </div>
						  <div class="col-xs-3">
							<div class="input-group">
							  <div class="input-group-btn">
								<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
								  <span>2.</span>
								</a>
							  </div>
							  <p><?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control" type="Search">
							  <div class="input-group-btn">
								<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
								  <span>Months</span>
								</a>
							  </div>
							</div>                         
						  </div>
						</div> -->
						<div class="row">
						  <div class="col-xs-9 col-xs-offset-1">
							<label class="">19.  Mode of Transportation:</label>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-4 col-xs-offset-4">
							<p class=""></p>
						  </div>
						  <div class="col-xs-2 bc br text-center">
							<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
						  </div>
						  <div class="col-xs-2 bc text-center">
							<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-5 col-xs-offset-3">
							<label class="">From PPIU to DPIU:</label>
						  </div>
						  <div class="col-xs-2">
							<p><?php $var ="ppiu_dpiu_trans"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 bg3">
							<p><?php $var ="ppiu_dpiu_trans"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3">
								<label class="">From DPIU to FLCF:</label>
							</div>
							<div class="col-xs-2">
								<p><?php $var ="dpiu_flcf_trans"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 bg3">
								<p><?php $var ="dpiu_flcf_trans"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3">
								<label class="">Date:</label>
							</div>
							<div class="col-xs-2">
								<p><?php $var ="store_date"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-2 bg3">
								<p><?php $var ="store_date"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3">
								<label class="">Time:</label>
							</div>
							<div class="col-xs-2">
								<p><?php $var ="store_time"; echo isset($DataRow)?date("H:i",strtotime($DataRow->$var)):''; ?></p>
							</div>
							<div class="col-xs-2 bg3">
								<p><?php $var ="store_time"; echo isset($CompareRow)?date("H:i",strtotime($CompareRow->$var)):''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-5 col-xs-offset-3">
								<label class="">Location:</label>
							</div>
							<div class="col-xs-2">
								<p><?php $var ="store_location"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 bg3">
								<p><?php $var ="store_location"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-2 text-center">
								<label style="padding-top:54px">Items</label>
							</div>
							<div class="col-xs-5 brl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-3 zp text-center">
										<label class="pt20">Items found to be out of stock at the time of inspection?</label>
									</div>
									<div class="col-xs-2 brl zp text-center">
										<label class="pt20 pb20">Any stock found expired?</label>
									</div>
									<div class="col-xs-2 zp text-center">
										<label>Physically counted stock in hand(# Units)</label>
									</div>
									<div class="col-xs-3 brl zp text-center">
										<label class="pt20 pb20">Quantity recorded on Bin Card (Stock Ledger)</label>
									</div>
									<div class="col-xs-2 zp text-center">
										<label class="pt20">Quantity</label>
									</div>
								</div>
							</div>
							<div class="col-xs-5">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-3 zp text-center">
										<label class="pt20">Items found to be out of stock at the time of inspection?</label>
									</div>
									<div class="col-xs-2 brl zp text-center">
										<label class="pt20 pb20">Any stock found expired?</label>
									</div>
									<div class="col-xs-2 zp text-center">
										<label>Physically counted stock in hand(# Units)</label>
									</div>
									<div class="col-xs-3 brl zp text-center">
										<label class="pt20 pb20">Quantity recorded on Bin Card (Stock Ledger)</label>
									</div>
									<div class="col-xs-2 zp text-center">
										<label class="pt20">Quantity</label>
									</div>
								</div>
							</div>
						</div>
						<?php
						$labels = array(
							'Paracetamole Tablets',
							'Paracetamole Syrup',
							'Cholorquine Tablets',
							'Cholorquine Syrup',
							'Cotrimoxazol Syrup',
							'Piperzine Syrup',
							'Ferrous Fumate & Folic Acid Tablets',
							'Sticking Plaster',
							'Antiseptic Lotion',
							'Cotton Wool',
							'Cotton Bandages',
							'Eye Ointment (Polyfax)',
							'Oral Rehydration Solution (ORS)',
							'Benzyl Benzoate Lotion',
							'B. Complex Syrup',
							'Geomizol tablets',
							'Condoms',
							'Oral Contraceptive Pills',
							'Inj. Depo Provera',
							'IUCDs'
						);
						for($i=1;$i<=count($labels); $i++)
						{ ?>
							<div class="row">
								<div class="col-xs-2">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-5">
									<div class="row">
										<div class="col-xs-3  text-center">
											<div class="row">
												<div class="col-xs-4"></div>
												<div class="col-xs-5 zp">
													<p class="pt7 <?php $var ="so_r".$i."_f1"; echo isset($DataRow)?get_yn_class($DataRow->$var):'';?>">
													<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
													</p>
												</div>
											</div>
										</div>
										<div class="col-xs-2  text-center">
											<p class="pt7 <?php $var ="so_r".$i."_f2"; echo isset($DataRow)?get_yn_class($DataRow->$var):'';?>">
												<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?>
											</p>
										</div>
										<div class="col-xs-2  text-center">
											<p class="pt7">
												<?php $var ="so_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
										<div class="col-xs-3  text-center">
											<p class="pt7">
												<?php $var ="so_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
										<div class="col-xs-2  text-center">
											<p class="pt7 <?php $var ="so_r".$i."_f5"; echo isset($DataRow)?get_se_class($DataRow->$var):'';?>">
												<?php  echo isset($DataRow)?ucfirst($DataRow->$var):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-5 bg3">
									<div class="row">
										<div class="col-xs-3  text-center">
											<div class="row">
												<div class="col-xs-4"></div>
												<div class="col-xs-5 zp">
													<p class="pt7 <?php $var ="so_r".$i."_f1"; echo isset($CompareRow)?get_yn_class($CompareRow->$var):'';?>">
													<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):''; ?>
													</p>
												</div>
											</div>
										</div>
										<div class="col-xs-2  text-center">
											<p class="pt7 <?php $var ="so_r".$i."_f2"; echo isset($CompareRow)?get_yn_class($CompareRow->$var):'';?>">
												<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':(($CompareRow->$var=="0")?'No':'')):''; ?>
											</p>
										</div>
										<div class="col-xs-2  text-center">
											<p class="pt7">
												<?php $var ="so_r".$i."_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
										<div class="col-xs-3  text-center">
											<p class="pt7">
												<?php $var ="so_r".$i."_f4"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
										<div class="col-xs-2  text-center">
											<p class="pt7 <?php $var ="so_r".$i."_f5"; echo isset($CompareRow)?get_se_class($CompareRow->$var):'';?>">
												<?php  echo isset($CompareRow)?ucfirst($CompareRow->$var):''; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<?php 
						} ?>
							<div class="row">
								<div class="col-xs-2">
									<label>Contact Person</label>
								</div>
								<div class="col-xs-5 text-center">
									<p><?php $var ="contact_person"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 text-center bg3">
									<p><?php $var ="contact_person"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							
						</div><!--end of rowlightbg-->
					</div><!--end of alignmentview-->
					<div class="row" style="">
           				<div class="col-sm-12 cmargin27 bgcolcl text-center">
            				<label>Problems and recommendations</label>
          				</div>
        			</div>
					<div class="row " style="">
           				<div class="col-xs-12 zp">
							<table class="table bt">
								<tbody>
									<tr>
										<td style="width: 14% !important;">
										</td>
										<td class="br" style="width: 43% !important;text-align: center !important;background-color: #0B7D05; color:white;font-weight: bold;">
											<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</td>
										<td style="width: 43% !important;text-align: center !important;background-color: #0B7D05; color:white;font-weight: bold;">
											<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</td>
									</tr>
							  </tbody>
							</table>
						</div>
        			</div>
					<div class="row">
						<div class="col-xs-12 zp">
						<table class="table   table-bordered">
							<tbody>
								<tr>
									<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Problems
									</td>
									<td style="width: 43% !important;text-align: left !important;">
										<p><?php $var ="problems"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</td> 
									<td style="width: 43% !important;text-align: left !important;" class="bg3">
										<p><?php $var ="problems"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</td>               
								</tr>
								<tr>
									<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations
									</td>
									<td style="width: 43% !important;text-align: left !important;">
										<p><?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</td> 
									<td style="width: 43% !important;text-align: left !important;" class="bg3">
										<p><?php $var ="recommendations"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</td>               
								</tr>
						  </tbody>
						</table>
						</div>
					</div>
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