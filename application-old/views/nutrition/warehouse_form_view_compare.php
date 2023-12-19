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
		<title>Monthly Monitoring Checklist of Warehouse at Districts || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Monthly Monitoring Checklist of Warehouse at Districts
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
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.6</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Village</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var="village"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var="village"; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.7</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Address of Location Site</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var="loc_address"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var="loc_address"; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.8</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Time of visit</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="tov";echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="tov"; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.9</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Functional Since (Date)</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="functional_date"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="functional_date"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
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
										<p><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.6</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">UC</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_UC_Name(get_Facility_UC_Name($DataRow->facode)):''; ?></p> 
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Maintenance of Warehouse:</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-9 col-xs-offset-1">
										<label class>Things to be monitored</label>
									</div>
									<div class="col-xs-2  text-center">
										<div class="row">
											<div class="col-xs-12 bl">
												<label>Yes / No</label>
											</div>
										</div>
										<div class="row bt">
											<div class="col-xs-6 brl">
												<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
											</div>
											<div class="col-xs-6">
												<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
											</div>
										</div>
									</div>
								</div>
								<?php 
								$labels=array(
									"Cleanliness",
									"Whitewash",
									"Ceiling condition (Leakage etc.)",
									"Floor cemented",
									"Ventilation",
									"Light",
									"Firefighting equipment", 
									"Door/Windows",
									"Direct Sunlight",
									"Secure",
									"1.	Are warehouse disinfected and sprayed every third month against insects, rodents and birds. Verify from records?", 
									"2.	Is staking of cartons four inches of the floor? (Using wooden planks and approximately two feet away from any wall).", 
									"3.	Is each consignment stacked separately? (To facilitate counting and access to hind stack?) ",
									"4.	Is First-Expiry First-Out (FEFO) method followed? ",
									"5.	Is staking of cartons according to prescribed protocols, maximum eight cartons only? ",
									"6.	Are marking labels, manufacturers or expiry dates visible on every carton? ",
									"7.	Is Bin Card present for each stake?", 
									"8.	If Yes? Entries proper"
								);
								for($index=1;$index<=count($labels);$index++){?>
								<div class="row">
									<div class="col-xs-<?php echo ($index<11)?'9  col-xs-offset-1':'10'; ?>">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p class="pt7 <?php $var ='mow_r'.$index.'_f1'; echo get_yn_class($DataRow->$var);?>">
										<?php  echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php echo get_yn_class($CompareRow->$var);?>">
										<?php  echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-4">
										<label>9. How many times in the last quarter the following officials have visited warehouse?</label>
									</div>
									<div class="col-xs-4 mt7">
										<div class="row">
											<div class="col-xs-12 text-center bc br">
												<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6 bt bc br">
												<label>Designation</label>
											</div>
											<div class="col-xs-6 bt bc br">
												<label>Number of times</label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<label>EDO (H) DHO</label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='edo_dho_visit'; echo isset($DataRow)?$DataRow->$var:''; ?> </p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<label>District Focal Person</label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='dfp_visit'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<label><?php $var ='other_visitor'; echo isset($DataRow)?$DataRow->$var:''; ?></label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='other_p_visit'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4 mt7">
										<div class="row">
											<div class="col-xs-12 text-center bc">
												<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6  bc bt br">
												<label>Designation</label>
											</div>
											<div class="col-xs-6 bt bc">
												<label>Number of times</label>
											</div>
										</div>
										<div class="row bg3">
											<div class="col-xs-6 ">
												<label>EDO (H) DHO</label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='edo_dho_visit'; echo isset($CompareRow)?$CompareRow->$var:''; ?> </p>
											</div>
										</div>
										<div class="row bg3">
											<div class="col-xs-6">
												<label>District Focal Person</label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='dfp_visit'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
										</div>
										<div class="row bg3">
											<div class="col-xs-6">
												<label><?php $var ='other_visitor'; echo isset($CompareRow)?$CompareRow->$var:''; ?></label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='other_p_visit'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label>10. Frequency of supply received from</label>
									</div>
									<div class="col-xs-4 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class =" pt7 <?php $var='frequency_supply'; echo get_mqi_class($DataRow->$var); ?>">
												<?php $var='frequency_supply'; echo isset($DataRow)?$DataRow->$var == 1 ? "Monthly" : ($DataRow->$var == 2 ? "Quarterly" : ($DataRow->$var == 3 ? "Irregular" : "")):'';?></p>
											</div>
										</div>	
									</div>
									<div class="col-xs-4 bg3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class =" pt7 <?php $var='frequency_supply'; echo get_mqi_class($CompareRow->$var); ?>">
												<?php $var='frequency_supply'; echo isset($CompareRow)?$CompareRow->$var == 1 ? "Monthly" : ($CompareRow->$var == 2 ? "Quarterly" : ($CompareRow->$var == 3 ? "Irregular" : "")):'';?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label>11. Mode of transportation: From Province warehouse to district warehouse</label>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ='mod_transport'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 bg3 text-center">
										<p><?php $var ='mod_transport'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>12. Physical Check at time of visit</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-2 text-center">
										<label class="pt14">Items</label>
									</div>
									<div class="col-sm-4">
										<div class="row">
											<div class="col-sm-4 zp brl text-center">
												<label>Out of stock at time of inspection? Yes/No</label>
											</div>
											<div class="col-sm-4 text-center">
												<label>Any stock Expired
													<br>
													Yes/No</label>
											</div>
											<div class="col-sm-4 zp brl text-center">
												<label>Physically Counted Stock in Hand
													<br>
													(# Units)</label>
											</div>
										</div>
									</div>
									<div class="col-sm-2">
										<label class="pt14">Quantity recorded on Bin Card (Stock Ledger)</label>
									</div>
									<div class="col-sm-2 brl">
										<label class="pt14 pb26">Quantity that is short</label>
									</div>
									<div class="col-sm-2">
										<label class="pt14">Quantity that is in excess</label>
									</div>
								</div>
								<div class="row bc bt">
									<div class="col-sm-12 text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<?php for($index=1;$index<=9;$index++){ ?>
								<div class="row">
									<div class="col-xs-2">
										<p><?php $var ='pc_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<p class="pt7 <?php $var ='pc_r'.$index.'_f2'; echo get_yn_class($DataRow->$var);?>">
												<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-4   text-center">
												<p class="pt7 <?php $var ='pc_r'.$index.'_f3'; echo get_yn_class($DataRow->$var);?>">
												<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-4 text-center">
												<p class="pt7"><?php $var ='pc_r'.$index.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row bc">
									<div class="col-sm-12 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php for($index=1;$index<=9;$index++){ ?>
								<div class="row">
									<div class="col-xs-2">
										<p><?php $var ='pc_r'.$index.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<p class="pt7 <?php $var ='pc_r'.$index.'_f2'; echo get_yn_class($CompareRow->$var);?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-4   text-center">
												<p class="pt7 <?php $var ='pc_r'.$index.'_f3'; echo get_yn_class($CompareRow->$var);?>">
												<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-4 text-center">
												<p class="pt7"><?php $var ='pc_r'.$index.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f7'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
							</div>	
							<div class="row">
								<div class="col-sm-12 bgcolcl text-center">
									<label>13. Problems and recommendations</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 zp">
									<table class="table   table-bordered">
										<thead>
											<tr class="bc">
												<th style="width: 14% !important;"> </th>
												<th style="width: 43% !important; text-align:center !important;">
													<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
												</th>
												<th style="width: 43% !important; text-align: center !important;">
													<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Problems </td>
												<td style="width: 43% !important;">
													<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</td>
												<td style="width: 43% !important;" class="bg3">
													<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</td>
											</tr>
											<tr>
												<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations </td>
												<td style="width: 43% !important;">
													<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?> </p>
												</td>
												<td style="width: 43% !important;" class="bg3">
													<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($CompareRow)?$CompareRow->$var:''; ?> </p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div><!--end of div rowlightbg-->
						</div>
						<!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div><!--end of panel body-->
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
	</body>
</html>