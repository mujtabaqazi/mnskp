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
	  <title>Malaria - Supervisory Checklist Indoor Residual Spray (IRS) Operations || Form</title>
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
					Malaria - Supervisory Checklist Indoor Residual Spray (IRS) Operations
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
												<label class="pt7">Date of Visit</label>
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
												<label class="pt7 pb2">Taluka</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></p>
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
								<?php
								$labeles=array(
									"B.	Observation during visit",
									"1.	Is district Indoor Residual Spray (IRS) micro-plan available with DHO?",		
									"2.	Is target population identified in taluka/UCs/health facilities/village?",		
									"3.	Is IRS user guide available at DHO/EDO office?",		
									"4.	Is supervisor/team leader present during spraying?	",	
									"5.	Have spray persons been trained before spraying in this cycle?",		
									"C.	Storage facility from spray viewpoint",	
									"6.	Is the storage facility situated away from domestic dwellings?",		
									"7.	Is the store tidy and well arranged?",		
									"8.	Is there a well-stocked first aid kit?",		
									"9.	Is the ledger book updated?",		
									"D.	Soak pit and washing facilities",	
									"10.	Is the mixing of IRS chemical done away from community water supplies?",		
									"11.	Are there sufficient washing facilities/showers for the operators?",		
									"12.	Is there adequate soap for washing?",		
									"E.	Household preparation",	
									"13.	Are the household members informed about vacating houses?",		
									"14.	How much time are household members given to vacate houses",	
									"15.	Are the householders instructed on what to do during and after the spraying in their houses?",		
									"16.	Are household items, including water, food, cooking utensils removed from the House before spray?",		
									"17.	Is heavy furniture moved to the center of the rooms and covered to allow easy access for spraying the walls?",		
									"18.	Are domestic animals and pets kept away from the house at the time of spray?",		
									"F.	Workers’ safety	",
									"19.	Are all spray men, team leaders, malaria supervisors wearing appropriate PPE?",		
									"20.	Is the PPE in good condition?	",	
									"21.	Ask if the spray men/operators are comfortable of if they have any other comments about the protective clothing?	",	
									"G.	Mixing Insecticides	",
									"22.	Is the water filled up to the 10 liter mark on the spray pump?	",	
									"23.	Is the insecticide sachet opened and contents poured/dropped in to the tankwith no spilling and empty packaging is placed back in the haversack	",	
									"24.	Has the spray men/operator done some agitation to dissolve the insecticide?",
									"25.	Is the pump then pressurized to 55 psi and checked for leaks and re-shaken to mix?",
									"26.	Are spray men/operators carrying the pumps correctly (pump held under the arm and the gauge in front?	",	
									"H.	Applying insecticide	",
									"27.	Are the spray men/operators using the correct nozzle tip for the insecticide?",		
									"28.	Does  the  spray  operator  apply  vertical  swaths,  80  cm  wide,  with  a  5  cm overlap, and with the tip of the nozzle 45 cm from the wall?",		
									"29.	Are they applying right speed of 5 seconds per 2 vertical meters?",		
									"30.	Are they regularly shaking the pumps and checking the pressure gauges to ensure the pressure stays between 55 and 35 psi?",		
									"31.	Is there any run off insecticide dripping from the walls?	",	
									"32.	Are there any signs of leakage from any part on the spray pumps?",
									"I.	Spray men’s/operator’s conduct (ask Focal Person or supervisor)	",
									"33.	Are spray men/operators smoking while spraying?",
									"34.	Are spray men/operators eating while spraying?",
									"35.	Are spray men/operators carrying any food or cigarette?",
									"36.	Are they polite to community?",
									"37.	Do they look neat and presentable?",
									"38.	Are they able to explain instructions to household members?",
									"39.	Are they able to respond to the IRS FAQs?",
									"40.	Do the spray men/operators carry out mobilization?",
									"41.	Are houses correctly marked after spraying?",
									"J.	Daily post-spray operations	",
									"42.	Upon returning from the field, are spray pumps depressurized and left over insecticides in spray pumps poured into “Barrel # 1?”",
									"43.	Are  all  unused  and  empty  insecticides  sachets  surrendered  by  the  spray men/operators and recorded by the team leaders/malaria supervisors?	",	
									"44.	Is all PPE and equipment handed over to the team leader/malaria supervisor?	",
									"45.	At the end of day do all spray men/operators take a bath before leaving for their homes?",		
									"46.	Any other comments regarding IRS? If yes, please mention."
								);
								$i=1;
								for ($index=1;$index<=count($labeles);$index++){
									if ($index==1 || $index==7||$index==12|| $index==16||$index==23|| $index==27||$index==33|| $index==40||$index==50){
								?>
								<div class="row bc mt15 mb1">
									<div class="col-sm-10">
										<label><?php echo $labeles[$index-1]; ?></label>
									</div>
									<div class="col-sm-1 bl text-center">
										<label>Yes / No</label>
									</div>
									<div class="col-sm-1 bl text-center">
										<label>Yes / No</label>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<div class="col-sm-10 bgw" style="min-height:26px;">								 
									</div>
									<div class="col-sm-1 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-sm-1 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
									<?php } else{?>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2"><?php echo $labeles[$index-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p class =" pt7 <?php $var ='bi_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='bi_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class =" pt7 <?php $var ='bi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='bi_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<?php $i++;} }?>
								<div class="row bc bb">
									<div class="col-xs-12">
										<label>K.	In Door Residual Spraying (IRS) Database</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-5 text-left">
										<label> Sr. No </label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label>1</label>
									</div>
									<div class="col-xs-1  text-center">
										<label>2</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label>3</label>
									</div>
									<div class="col-xs-1  text-center">
										<label>4</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label>5</label>
									</div>
									<div class="col-xs-1  text-center">
										<label>6</label>
									</div>
									<div class="col-xs-1 bl text-center">
										<label>7</label>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<!-- <div class="col-sm-2 bgw" style="min-height:25px;">								 
									</div> -->
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<?php
								$labels=array(
									"Name of FLCL",
									"UC",
									"District",
									"Name of households",
									"Contact number",
									"Total Rooms",
									"Sprayed",
									"Un-sprayed",
									"No. of Child< 5",
									"No. PL",
									"Total no. of family members",
									"Refused",
									"Insecticides Used"
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-5">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row bc mt1 mb1">
									<!-- <div class="col-sm-2 bgw" style="min-height:25px;">								 
									</div> -->
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<?php
								$labels=array(
									"Name of FLCL",
									"UC",
									"District",
									"Name of households",
									"Contact number",
									"Total Rooms",
									"Sprayed",
									"Un-sprayed",
									"No. of Child< 5",
									"No. PL",
									"Total no. of family members",
									"Refused",
									"Insecticides Used"
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-5">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 ">
										<p><?php $var ='drs_r'.$i.'_f7'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
							<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div>
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		
	</body>
</html>