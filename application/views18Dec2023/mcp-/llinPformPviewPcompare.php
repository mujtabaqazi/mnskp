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
		<title>Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">  Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center 
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
									
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Particulars:</label>
									</div>
								</div>
								<div class="row bc">
						 	
							        <div class="col-xs-2">
										<label class="pt7"></label>
									</div>
									<div class="col-xs-2 bl text-center">
										<label class="pt7 pb5"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label class="pt7 pb5"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7"> </label>
									</div>
									<div class="col-xs-2 bl text-center">
										<label class="pt7 pb5"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2 bl text-center">
										<label class="pt7 pb5"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
							
								</div>

								<?php
								$labels=array(
									"Complete address of facility",
									"Population of district",
									"Catchment population of facility",
									"Name of focal person",
									"Official address of focal person",
									"Phone # of focal person",
									"Outlet",
									"Location",
									"Geographical accessibility",
									"Surroundings",
									"Security concerns",
									"Offloading space",
									"Spacious area for storage (dimensions of room",
									"Ventilation, humidity, temperature, protection from sunlight",
									"Protection from fire",
									"Pest control measures",
									"Cleanliness situation/arrangements"
								);
								$i=0;
								for($index=1;$index<=9;$index++){
								?>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $labels[$i]; $i++; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
										<p class =" pt7 <?php $var ='pclr_r'.$index.'_f1'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='pclr_r'.$index.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else { ?>
										<p><?php $var ='pclr_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<div class="col-xs-2 text-center">
										<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
										<p class =" pt7 <?php $var ='pclr_r'.$index.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='pclr_r'.$index.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else { ?>
										<p><?php $var ='pclr_r'.$index.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<?php if ($i!=17) { ?>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $labels[$i]; $i++; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
										<p class =" pt7 <?php $var ='pclr_r'.$index.'_f2'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='pclr_r'.$index.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else {?>
										<p><?php $var ='pclr_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<div class="col-xs-2 zp text-center">
										<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
										<p class =" pt7 <?php $var ='pclr_r'.$index.'_f2'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='pclr_r'.$index.'_f2';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else {?>
										<p><?php $var ='pclr_r'.$index.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="row bc">
									<div class="col-xs-10">
										<label>Storage:</label>
									</div>
									<div class="col-xs-1 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
									<div class="col-xs-1 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
								</div>
								
								<?php 
								$labels=array(
									"Racks available or not",
									"Storage on ground",
									"Pallets (bales of 100 each) three can be piled up",
									"Mobility within store",
									"Distribution",
									"Recording desk",
									"Stationary",
									"Distribution window",
									"Waiting area",
									"Space Designated for waiting area",
									"Protection from sunlight and rain."
								);
								$i=1;
								for ($index=1;$index<=count($labels);$index++){
									if($index==4){
								?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
								<?php }else if ($index==5 || $index==9){?>								
								<div class="row bc">
									<div class="col-xs-10 bc">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-1 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
									<div class="col-xs-1 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
								</div>
								<?php }else {?>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p class =" pt7 <?php $var ='smdw_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='smdw_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p class =" pt7 <?php $var ='smdw_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='smdw_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<?php $i++;} } ?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Inventory control</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-2">
										<label>Stocks & stationery</label>
									</div>
									<div class="col-xs-5 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>								
									<div class="col-xs-5 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-2 text-center">
										<label>Item</label>
									</div>
									<div class="col-sm-1 text-center brl">
										<label>Available</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Stock out since when?</label>
									</div>
									<div class="col-sm-2 bl text-center">
										<label>Remarks</label>
									</div>
									<div class="col-sm-1 text-center brl">
										<label>Available</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Stock out since when?</label>
									</div>
									<div class="col-sm-2 bl text-center">
										<label>Remarks</label>
									</div>
								</div>
								<?php
								$labels=array(
									"LLIN",
									"Stock register",
									"Daily expense register",
									"Reporting forms"
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $labels[$i-1];?></label>
									</div>
									<div class="col-xs-1 text-center ">
										<p><?php $var ='ss_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center ">
										<p><?php $var ='ss_r'.$i.'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='ss_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='ss_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center bg3">
										<p><?php $var ='ss_r'.$i.'_f2'; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<p><?php $var ='ss_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Disease specific data</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-7  text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
									
									<div class="col-xs-5 bl text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
							
								</div>
								<div class="row bc mt1">
									<div class="col-sm-2 text-center">
										<label>LLIN distributed during</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Pregnant women</label>
									</div>
									<div class="col-sm-1 text-center">
										<label>Children &gt; 5</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Malaria patient</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Pregnant women</label>
									</div>
									<div class="col-sm-1 text-center">
										<label>Children &gt; 5</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>Malaria patient</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Remarks</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Previous month",
									"Current month (till date)"
								);
								for ($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='ds_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='ds_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='ds_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='ds_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='ds_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='ds_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p><?php $var ='ds_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 bg3 zp">
										<p><?php $var ='ds_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								
	
								
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Trainings conducted for community in previous month & target audience</label>
									</div>
								</div>
								<div class="row mt1 mb1 bc">
									<div class="col-xs-6  text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
									<div class="col-xs-6  text-center bl"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>

								</div>
								<div class="row bc">
									<div class="col-sm-1">
										<label>Sr. #</label>
									</div>
									<div class="col-sm-3 brl">
										<label>Name of trainings</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Number of Participants</label>
									</div>
									<div class="col-sm-3 brl">
										<label>Name of trainings</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Number of Participants</label>
									</div>
								</div>
								<?php for ($i=1;$i<=3;$i++){ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i; ?></label>
									</div>
									<div class="col-xs-3">
										<p><?php $var ='tcc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='tcc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									
									<div class="col-xs-3 bg3">
										<p><?php $var ='tcc_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 text-center bg3">
										<p><?php $var ='tcc_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php }?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Comments/remarks by monitoring officer</label>
									</div>
								</div>
								<div class="row mt1 bc">
								<div class="col-sm-4 bgcolcl text-center">
									<label></label>
									</div>
										<div class="col-xs-4  text-center bl"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
										<div class="col-xs-4  text-center bl"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
									</div>
						<div class="row">
							<div class="col-xs-12 zp ">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Comments</td>
											<td style="width: 33%">
												<?php $var ="comments"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="comments"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</td>               
										</tr>
										<tr>
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Remarks</td>
											<td style="width: 33%">
												<?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="remarks"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</td>               
										</tr>
									</tbody>
								</table>
							</div>
						</div>
								
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
					</form>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
		
	</body>
</html>