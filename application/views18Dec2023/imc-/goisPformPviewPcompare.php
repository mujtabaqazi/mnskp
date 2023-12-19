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
	  <title>General Outlook - Instrument and Service Availability || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->		
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> General Outlook - Instrument and Service Availability Checklist</div>
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
								<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-4 text-center">
								<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
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
										<label class="pt7 pb2">Tehsil</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php $var = "tcode"; echo isset($DataRow)?get_Tehsil_Name($DataRow->$var):''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.3</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Union Council</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php $var = "uncode"; echo isset($DataRow)?get_UC_Name($DataRow->$var):''; ?></p>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.4</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Name of Health Facility</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
							</div>
						</div>						
						<div class="row bc">
				        	<div class="col-xs-8 text-center">
				          		<label>FACILITY DESCRIPTION</label>
				        	</div>
							<div class="col-xs-2 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
							<div class="col-xs-2 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
				      	</div>
						<div class="row mt1">
							<div class="col-xs-8">
								<label class="pt7 pb2">Catchment Population</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php echo isset($DataRow)?get_Facility_Population($DataRow->facode):''; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php echo isset($CompareRow)?get_Facility_Population($CompareRow->facode):''; ?></p>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-sm-4 bgw" style="min-height:71px;">									 
							</div>
							<div class="col-sm-4 brl text-center">								
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								<div class="row bt">
									<div class="col-xs-3 br text-center ">
									  <label class="pt10 pb10">EPI</label>
									</div>
									<div class="col-xs-3 br text-center">
									  <label class="pt10 pb10">FP</label>
									</div>
									<div class="col-xs-3 br text-center">
									  <label>Deliveries at HF</label>
									</div>
									<div class="col-xs-3 text-center">
									  <label>Live Births</label>
									</div>
								</div>
							</div>
							<div class="col-sm-4 text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								<div class="row bt">
									<div class="col-xs-3 br text-center ">
									  <label class="pt10 pb10">EPI</label>
									</div>
									<div class="col-xs-3 br text-center">
									  <label class="pt10 pb10">FP</label>
									</div>
									<div class="col-xs-3 br text-center">
									  <label>Deliveries at HF</label>
									</div>
									<div class="col-xs-3 text-center">
									  <label>Live Births</label>
									</div>
								</div>
							</div>													
						</div>
						<div class="row">
							<div class="col-xs-4">
								<label class="pt7 pb2">List of monthly targets</label>
							</div>							
							<div class="col-xs-1 text-center">
								<p><?php $var ="epi_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-1 text-center">
								<p><?php $var ="fp_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-1 text-center">
								<p><?php $var ="deliveries_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-1 text-center">
								<p><?php $var ="births_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>

							<div class="col-xs-1 text-center bg3">
								<p><?php $var ="epi_target"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>							
							<div class="col-xs-1 text-center bg3">
								<p><?php $var ="fp_target"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>								
							<div class="col-xs-1 text-center bg3">
								<p><?php $var ="deliveries_target"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>								
							<div class="col-xs-1 text-center bg3">
								<p><?php $var ="births_target"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row bc">
				        	<div class="col-xs-8">
				          		<label></label>
				        	</div>
							<div class="col-xs-2 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
							<div class="col-xs-2 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
				      	</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Sign Board of HF</label>
							</div>
							<div class="col-xs-2 text-center">								
								<p class =" pt7 <?php $var ='sign_board'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='sign_board'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>								
							</div>
							<div class="col-xs-2 text-center bg3">								
								<p class =" pt7 <?php $var ='sign_board'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='sign_board'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>								
							</div>
						</div>
						<div class="row">	
							<div class="col-xs-8">
								<label class="pt7 pb2">Sign Plates in the HF</label>
							</div>
							<div class="col-xs-2 text-center">								
								<p class =" pt7 <?php $var ='sign_plates'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='sign_plates'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>									
							</div>
							<div class="col-xs-2 text-center bg3">								
								<p class =" pt7 <?php $var ='sign_plates'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='sign_plates'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>									
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Health Education Material</label>
							</div>
							<div class="col-xs-2 text-center">								
								<p class =" pt7 <?php $var ='education_material'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='education_material'; echo isset($DataRow)?(($DataRow->$var=="1")?'Displayed':'Not displayed'):'Not displayed'; ?></p>						
							</div>
							<div class="col-xs-2 text-center bg3">								
								<p class =" pt7 <?php $var ='education_material'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='education_material'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Displayed':'Not displayed'):'Not displayed'; ?></p>						
							</div>
						</div>	
						<div class="row">	
							<div class="col-xs-8">
								<label class="pt7 pb2">Monthly DHIS reports submitted</label>
							</div>
							<div class="col-xs-2 text-center">								
								<p class =" pt7 <?php $var ='dhis_mr_stat'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='dhis_mr_stat'; echo isset($DataRow)?(($DataRow->$var=="1")?'Regular':'Irregular'):'Irregular'; ?></p>								
							</div>
							<div class="col-xs-2 text-center bg3">								
								<p class =" pt7 <?php $var ='dhis_mr_stat'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='dhis_mr_stat'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Regular':'Irregular'):'Irregular'; ?></p>								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">DHIS tools</label>
							</div>
							<div class="col-xs-2 text-center">								
								<p class =" pt7 <?php $var ='dhis_tools'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='dhis_tools'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>								
							</div>
							<div class="col-xs-2 text-center bg3">								
								<p class =" pt7 <?php $var ='dhis_tools'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='dhis_tools'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>								
							</div>
						</div>	
						<div class="row">	
							<div class="col-xs-8">
								<label class="pt7 pb2">Last month DHIS report submitted</label>
							</div>
							<div class="col-xs-2 text-center">								
								<p class =" pt7 <?php $var ='last_month_dhis_mr'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='last_month_dhis_mr'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>								
							</div>
							<div class="col-xs-2 text-center bg3">								
								<p class =" pt7 <?php $var ='last_month_dhis_mr'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='last_month_dhis_mr'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>								
							</div>
						</div>
						
						<div class="row bc">
				        	<div class="col-xs-8">
				          		<label>GENERAL OUTLOOK OF HF</label>
				        	</div>
							<div class="col-xs-2 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
							<div class="col-xs-2 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
				      	</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">General condition of the building</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='building'; echo get_gpnr_class($DataRow->$var); ?>">
								<?php $var ='building'; echo isset($DataRow)?(($DataRow->$var=="1")?'Good':(($DataRow->$var=="2")?'Need Repair':'Poor')):'Poor'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='building'; echo get_gpnr_class($CompareRow->$var); ?>">
								<?php $var ='building'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Good':(($CompareRow->$var=="2")?'Need Repair':'Poor')):'Poor'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Cleanliness</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='cleanliness'; echo get_gpnr_class($DataRow->$var); ?>">
								<?php $var ='cleanliness'; echo isset($DataRow)?(($DataRow->$var=="1")?'Good':(($DataRow->$var=="2")?'Satisfactory':'Poor')):'Poor'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='cleanliness'; echo get_gpnr_class($CompareRow->$var); ?>">
								<?php $var ='cleanliness'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Good':(($CompareRow->$var=="2")?'Satisfactory':'Poor')):'Poor'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Waiting area</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php $var ='waiting_area'; echo isset($DataRow)?(($DataRow->$var=="1")?'Male':(($DataRow->$var=="2")?'Common':'Female')):'Female'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php $var ='waiting_area'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Male':(($CompareRow->$var=="2")?'Common':'Female')):'Female'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">OPD Registration Desk</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='opd_reg_desk'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='opd_reg_desk'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='opd_reg_desk'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='opd_reg_desk'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Furniture</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='furniture'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='furniture'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='furniture'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='furniture'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Drinking water</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='water'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='water'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='water'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='water'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Toilets</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='toilets'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='toilets'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='toilets'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='toilets'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Waste management</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='waste_mang'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='waste_mang'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='waste_mang'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='waste_mang'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Insecticide</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='insecticides'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='insecticides'; echo isset($DataRow)?(($DataRow->$var=="1")?'Sprayed':'Not Sprayed'):'Not Sprayed'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='insecticides'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='insecticides'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Sprayed':'Not Sprayed'):'Not Sprayed'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Fumigation</label>
							</div>
							<div class="col-xs-2 text-center">
								<p class =" pt7 <?php $var ='fumigation'; echo get_yn_class($DataRow->$var); ?>">
								<?php $var ='fumigation'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p class =" pt7 <?php $var ='fumigation'; echo get_yn_class($CompareRow->$var); ?>">
								<?php $var ='fumigation'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-8">
								<label class="pt7 pb2">Fumigation Date</label>
							</div>							
							<div class="col-xs-2 text-center">
								<p><?php $var ="date_fumigation"; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-2 text-center bg3">
								<p><?php $var ="date_fumigation"; echo (isset($CompareRow) && $CompareRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-4">
								<label class="pt14">Other Resources</label>
							</div>
							<div class="col-xs-4 brl text-center">
								<div class="row">
									<div class="col-xs-12">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-12">
										<label>Yes/No</label>
										<div class="row bt">
											<div class="col-xs-6 br text-center ">
												<label>Check Availability</label>											 	
											</div>
											<div class="col-xs-6 text-center">
												<label>Check Functionality</label>											 	
											</div>
										</div>
									</div>									
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<div class="row">
									<div class="col-xs-12">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-12">
										<label>Yes/No</label>
										<div class="row bt">
											<div class="col-xs-6 br text-center ">
												<label>Check Availability</label>											 	
											</div>
											<div class="col-xs-6 text-center">
												<label>Check Functionality</label>											 	
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Electricity',
							'Generators (with fuel)',
							'Other power supplies',
							'Water supply'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-4">
									<p><?php echo $labels[$i-1]; ?></p>
								</div>
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='or_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='or_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>	
										</div>
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='or_r'.$i.'_f2'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='or_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>	
										</div>																				
									</div>
								</div>
								<div class="col-xs-4">
									<div class="row bg3">										
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='or_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='or_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>	
										</div>
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='or_r'.$i.'_f2'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='or_r'.$i.'_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>	
										</div>									
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row bc mt1">
							<div class="col-xs-4">
								<label class="pt14">Communications</label>
							</div>
							<div class="col-xs-4 brl text-center">
								<div class="row">
									<div class="col-xs-12">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-12">
										<label>Yes/No</label>
										<div class="row bt">
											<div class="col-xs-6 br text-center ">
												<label>Check Availability</label>											 	
											</div>
											<div class="col-xs-6 text-center">
												<label>Check Functionality</label>											 	
											</div>
										</div>
									</div>									
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<div class="row">
									<div class="col-xs-12">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-12">
										<label>Yes/No</label>
										<div class="row bt">
											<div class="col-xs-6 br text-center ">
												<label>Check Availability</label>											 	
											</div>
											<div class="col-xs-6 text-center">
												<label>Check Functionality</label>											 	
											</div>
										</div>
									</div>									
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Telephone',
							'Fax',
							'Internet',
							'Ambulance',
							'Vehicle',
							'Motorcycles (for vaccinators)'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-4">
									<p><?php echo $labels[$i-1]; ?></p>
								</div>
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='c_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='c_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='c_r'.$i.'_f2'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='c_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>																			
									</div>
								</div>
								<div class="col-xs-4">
									<div class="row bg3">
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='c_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='c_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>	
										<div class="col-xs-6 text-center">
											<div class="row">
												<div class="col-xs-3"></div>
												<div class="col-xs-6">
													<p class =" pt7 <?php $var ='c_r'.$i.'_f2'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='c_r'.$i.'_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>											
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>MANAGERIAL INSTRUMENT AVAILABLE AT THE TIME OF VISIT (<?php echo '&#10004;'; ?> for yes)</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2"><label>Attendance Register</label>
								
							</div>
							<div class="col-xs-1 brl zp text-center"><label>Visitor Book</label>
								
							</div>
							<div class="col-xs-2 text-center"><label>Movement Book</label>
								
							</div>
							<div class="col-xs-1 brl zp text-center"><label>Cash Book</label>
								
							</div>
							<div class="col-xs-1 zp text-center"><label>Stock Register</label>
								
							</div>
							<div class="col-xs-2 brl text-center"><label>Condomn Register</label>
								
							</div>
							<div class="col-xs-2 text-center"><label>DHIS Instruments</label>
								
							</div>
							<div class="col-xs-1 bl"><label>Others</label>
								
							</div>
						</div>
						<div class="row bc mt1 mb1">							
							<div class="col-sm-12 bl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
							</div>
						</div>	
						<div class="row" style="background: rgb(251, 251, 251) none repeat scroll 0% 0%;">
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">										
										<p class =" pt7 <?php $var ='mia_r1_f1'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>											
									</div>
								</div>
							</div>
							<div class="col-xs-1 bg4 zp">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f2'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f3'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 bg4">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f4'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 ">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f5'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bg4">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f6'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f7'; echo get_yn_class($DataRow->$var); ?>">
										<?php $var ='mia_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp bg4 text-center">
								<p><?php $var ="mia_r1_f8"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row bc mt1 mb1">							
							<div class="col-sm-12 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
							</div>
						</div>
						<div class="row" style="background: rgb(251, 251, 251) none repeat scroll 0% 0%;">
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f1'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 bg4 zp">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f2'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f3'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f4'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f4'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f5'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f5'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bg4">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f6'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f6'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class =" pt7 <?php $var ='mia_r1_f7'; echo get_yn_class($CompareRow->$var); ?>">
										<?php $var ='mia_r1_f7'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp bg4 text-center">
								<p><?php $var ="mia_r1_f8"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>	
						 <div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>SERVICES AVAILABLE AT HF (<?php echo '&#10004;'; ?> for yes)</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt31">General services</label>
							</div>
							<div class="col-xs-10">
								<div class="row bc mt1">
									<div class="col-xs-2">
										<label>OPD</label>
									</div>
									<div class="col-xs-2 brl">
										<label>Dispensary</label>
									</div>
									<div class="col-xs-2">
										<label>ORT Corner</label>
									</div>
									<div class="col-xs-2 brl">
										<label>Laboratory</label>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<label>Radiology</label>
											</div>
											<div class="col-xs-4 brl">
												<label>Sonology</label>
											</div>
											<div class="col-xs-4">
												<label>Causality</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1 mb1">									
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='gs_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f2'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='gs_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f3'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='gs_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f4'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='gs_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p class =" pt7 <?php $var ='gs_r1_f5'; echo get_yn_class($DataRow->$var); ?>">
														<?php $var ='gs_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 bg4">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p class =" pt7 <?php $var ='gs_r1_f6'; echo get_yn_class($DataRow->$var); ?>">
														<?php $var ='gs_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p class =" pt7 <?php $var ='gs_r1_f7'; echo get_yn_class($DataRow->$var); ?>">
														<?php $var ='gs_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1 mb1">									
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='gs_r1_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f2'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='gs_r1_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f3'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='gs_r1_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='gs_r1_f4'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='gs_r1_f4'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p class =" pt7 <?php $var ='gs_r1_f5'; echo get_yn_class($CompareRow->$var); ?>">
														<?php $var ='gs_r1_f5'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 bg4">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p class =" pt7 <?php $var ='gs_r1_f6'; echo get_yn_class($CompareRow->$var); ?>">
														<?php $var ='gs_r1_f6'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p class =" pt7 <?php $var ='gs_r1_f7'; echo get_yn_class($CompareRow->$var); ?>">
														<?php $var ='gs_r1_f7'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label style="padding-top:50px;">Specific services</label>
							</div>
							<div class="col-xs-10">
								<div class="row bc mt1">
									<div class="col-xs-2">
										<label>FP</label>
									</div>
									<div class="col-xs-2 brl">
										<label class="pb20">Labor Room</label>
									</div>
									<div class="col-xs-2">
										<label>Dental</label>
									</div>
									<div class="col-xs-2 brl">
										<label class="pb20">Operation Theatre</label>
									</div>
									<div class="col-xs-4 zp">
										<div class="row">
											<div class="col-xs-4 text-center">
												<label>Indoor</label>
											</div>
											<div class="col-xs-4 brl">
												<label>Surgical Consultancy</label>
											</div>
											<div class="col-xs-4">
												<label>Others</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='ss_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f2'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='ss_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f3'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='ss_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f4'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='ss_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='ss_r1_f5'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='ss_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='ss_r1_f6'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='ss_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='ss_r1_f7'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='ss_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
									  </div>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='ss_r1_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f2'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='ss_r1_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f3'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='ss_r1_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='ss_r1_f4'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='ss_r1_f4'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='ss_r1_f5'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='ss_r1_f5'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='ss_r1_f6'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='ss_r1_f6'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='ss_r1_f7'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='ss_r1_f7'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt31">Preventive Programs</label>
							</div>
							<div class="col-xs-10">
								<div class="row bc mt1">
									<div class="col-xs-2">
										<label>EPI</label>
									</div>
									<div class="col-xs-2 brl">
										<label>MNCH</label>
									</div>
									<div class="col-xs-2">
										<label>Nutrition</label>
									</div>
									<div class="col-xs-2 brl">
										<label>TB</label>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<label>Malaria</label>
											</div>
											<div class="col-xs-4 brl">
												<label>Hepatitis</label>
											</div>
											<div class="col-xs-4">
												<label>HIV</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1 mb1">									
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>								
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='pp_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f2'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='pp_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f3'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='pp_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f4'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='pp_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='pp_r1_f5'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='pp_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='pp_r1_f6'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='pp_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='pp_r1_f7'; echo get_yn_class($DataRow->$var); ?>">
													<?php $var ='pp_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
									  </div>
									</div>
								</div>
								<div class="row bc mt1 mb1">									
									<div class="col-sm-12 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>								
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='pp_r1_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f2'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='pp_r1_f2'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f3'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='pp_r1_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p class =" pt7 <?php $var ='pp_r1_f4'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='pp_r1_f4'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='pp_r1_f5'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='pp_r1_f5'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='pp_r1_f6'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='pp_r1_f6'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p class =" pt7 <?php $var ='pp_r1_f7'; echo get_yn_class($CompareRow->$var); ?>">
													<?php $var ='pp_r1_f7'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row ">
							<div class="col-xs-2">
								<label class="pt7"></label>
							</div>
							<div class="col-xs-5 zp br bc text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-5 zp bc text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7">Others (specify)</label>
							</div>
							<div class="col-xs-5 zp">
								<p><?php $var ="other_services"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-5 zp bg3">
								<p><?php $var ="other_services"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
					</div><!--end of rowlightbg-->
						<div class="row bc">
				        	<div class="col-xs-4">
				          		<label>GENERAL COMMENTS & RECOMMENDATIONS</label>
				        	</div>
							<div class="col-xs-4 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
							<div class="col-xs-4 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
				      	</div>
				      	<div class="row">
							<div class="col-xs-12 zp ">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Observations</td>
											<td style="width: 33%">
												<?php $var ="observations"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="observations"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</td>               
										</tr>
										<tr>
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Issues</td>
											<td style="width: 33%">
												<?php $var ="issues"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="issues"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</td>               
										</tr>
										<tr>
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Actions</td>
											<td style="width: 33%">
												<?php $var ="actions"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="actions"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</td>               
										</tr>
									</tbody>
								</table>
							</div>
						</div>					
					
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