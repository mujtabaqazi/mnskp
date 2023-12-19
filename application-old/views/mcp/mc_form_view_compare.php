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
	  <title>Malaria - Checklist for Microscopy Center || Form</title>
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
					Malaria - Checklist for Microscopy Center
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
												<label class="pt7">Date of Last Visit</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="dolv"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="dolv"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.3</label>
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
												<label class="pt7">1.4</label>
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
												<label class="pt7">1.5</label>
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
												<label class="pt7">1.6</label>
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
												<label class="pt7">1.7</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">District Lab Supervisor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="lab_supervisor"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="lab_supervisor"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.8</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Medical Officer/Incharge</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="incharge"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="incharge"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.9</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Catchment Area Population</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="catchment_area_pop"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="catchment_area_pop"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
								
								<?php 
								$labels=array(
									"A.	General Information",
									"White wash done and walls are clean	",	
									"SOPs are available		",
									"Monthly data plotted on wall chart	",	
									"Staining area adequate and water proof	",	
									"Water Source/Running water		",
									"Drainage 		",
									"Electricity		",
									"Disposal of waste		",
									"Ventilation		",
									"Necessary furniture available	",	
									"B.	Lab reagents and consumables",
									"Lens cleaning tissue",		
									"Slides and slide box",		
									"Disinfectant swabs",		
									"Lancets",		
									"Xylene",		
									"Immersion oil",		
									"Methyl alcohol",		
									"Giemsa stain",		
									"Disposable gloves",		
									"Staining jar",		
									"Dropping bottle",		
									"Graduated cylinder",		
									"Timer",		
									"Sharp box",		
									"Buffer tablets",		
									"Distilled water", 		
									"C.	Quality Assurance",
									"FM 1 register complete and up-to-date and includes a monthly summary?",		
									"HW attended a formal training on microscopy?", 		
									"Slides labeled and placed in rack properly?",  		
									"Knows the correct use of microscope?",		
									"Knows the correct maintenance of microscope?",		
									"Knows the correct staining procedure of thin films with all the 3 available stains?	",	
									"Results entered in the FM1 register correctly?	",	
									"Appropriate container for used lancets, cotton and other infectious wastes available?",		
									"Follow-up instructions by all supervisors are available? 	",	
									"Procedure manual/job aid (species identification chart) available in the testing site?",		
									"Is the manual/job aid regularly used by the health worker?	",	
									"Is there a guideline on treatment and management of microscopy outcomes available?	",	
									"Are the slides routinely sent to DLS for cross check?	",	
									"Any feedback report from reference lab available?",
								);
								$i=1;
								$serialNumber=1;
								for($index=1;$index<=count($labels);$index++){
									if ($index==1||$index==12||$index==29){
								?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-1">
										<label class="pt14">Sr. No.</label>
									</div>
									<div class="col-sm-7 bl text-center">
										<label class="pt14 pb12">Item</label>
									</div>
									<div class="col-sm-2 bl">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label>Observation</label>
											</div>
										</div>
										<div class="row bt">
											<div class="col-sm-12 text-center">
												<label>Yes/No</label>
											</div>
										</div>
									</div>
									<div class="col-sm-2 bl">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label>Observation</label>
											</div>
										</div>
										<div class="row bt">
											<div class="col-sm-12 text-center">
												<label>Yes/No</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1 mb1">
									<div class="col-sm-8 bgw" style="min-height:26px;">								 
									</div>
									<div class="col-sm-2 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-sm-2 b text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
									<?php $serialNumber=1;}else { ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $serialNumber; ?></label>
									</div>
									<div class="col-xs-7">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class =" pt7 <?php $var ='mc_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='mc_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
										</div>	
									</div>
									<div class="col-xs-2 text-center">
										<div class="row bg3">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class =" pt7 <?php $var ='mc_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='mc_r'.$i.'_f1';echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
										</div>
									</div>
								</div>
								<?php $i++;$serialNumber++;} } ?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<div class="row mt1 mb1">
							<div class="col-sm-12 bgcolcl text-center">
								<label>COMMENTS</label>
							</div>
						</div>
						<div class="row bc mt1 mb1">
							<!-- <div class="col-sm-2 bgw" style="min-height:25px;">								 
							</div> -->
							<div class="col-sm-6 brl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class="col-sm-6 b text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-6">
								<p><?php $var='comments'; echo isset ($DataRow)?$DataRow->$var:""?></p>
							</div>
							<div class="col-xs-6 bg3">
								<p><?php $var='comments'; echo isset ($CompareRow)?$CompareRow->$var:""?></p>
							</div>
						</div>
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