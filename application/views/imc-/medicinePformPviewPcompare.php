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
	  <title>List Of Essential Medicines Stack Out || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">List Of Essential Medicines Stack Out</div>
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
							<div class="row">
								<div class="col-xs-12 bgcolcl text-center">
									 <label>LIST OF ESSENTIAL MEDICINES STOCK OUT  </label><span> (check & tick against each)</span>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-sm-2 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
							</div>
							<?php 							
							$labels = array(
								"Amoxicillin Cap",			
								"Tab. Iron/Folic Acid ",
								"Amoxicillin Syp",			
								"ORS",
								"Co-trimoxazole Tab	",		
								"Oral pills (COC) ",      
								"Co-trimoxazole Syp	",		
								"Condoms",
								"Tab. Metronidazole ",			
								"Progesterone Inj.",
								"Syp. Metronidazole	",		
								"IUCDs",
								"Inj. Ampicillin ",			
								"Implants",
								"Tab. Diclofenac ",			
								"Emergency Contraceptives",
								"Syp. Paracetamol ",			
								"Bandages",
								"Inj. Diclofenac ",			
								"Anti-septic Solution",
								"Chloroquine Tab",			
								"Disposable syringes",
								"Syp. Salbutamol ",			
								"Anti-sera for blood testing",
								"Syp. Antihelminthic ",			
								"Misoprostol",
								"I/V infusions ",			
								"Chlorhexidine (CHX)",
								"Inj. Dexamethasone "
							); 
							$j=1;
							for($i=1; $i<=15; $i++){ ?>						
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center">
									<p class =" pt7 <?php $var ='med_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
									<?php $var ='med_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var='med_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p class =" pt7 <?php $var ='med_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
									<?php $var ='med_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>								
								<div class="col-xs-1 text-center bg3">
									<p><?php $var='med_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
								</div>
								<?php $j++;if($j<30){?>
								<div class="col-xs-2">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center">
									<p class =" pt7 <?php $var ='med_r'.$i.'_f3'; echo get_yn_class($DataRow->$var); ?>">
									<?php $var ='med_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var='med_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p class =" pt7 <?php $var ='med_r'.$i.'_f3'; echo get_yn_class($CompareRow->$var); ?>">
									<?php $var ='med_r'.$i.'_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p><?php $var='med_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
								</div>
								<?php } ?>
							</div>
							<?php $j++;	} ?>
							<div class="row">
								<div class="col-xs-12 bgcolcl text-center">
									 <label>LIST OF VACCINES STOCK OUT  </label><span> (check & tick against each)</span>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-sm-2 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
								<div class="col-sm-2 text-center brl">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-6 br text-center ">
										  <label>&#10004;</label>
										</div>
										<div class="col-xs-6 text-center">
										  <label>Days</label>
										</div>
									</div>
								</div>
							</div>
							<?php 							
							$labels = array(
								"BCG Vaccine",		
								"Tetanus Toxoid ",
								"Pentavalent Vaccine",			
								"Anti-Rabies Vaccine ",
								"Polio Vaccine",			
								"Anti-Snake Venom  ",     
								"Hepatitis B Vaccine ",			
								"Vaccine Syringes ",
								"Measles Vaccine "
							); 
							$j=1;
							for($i=1; $i<=5; $i++){ ?>						
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center">
									<p class =" pt7 <?php $var ='vac_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
									<?php $var ='vac_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var='vac_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p class =" pt7 <?php $var ='vac_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
									<?php $var ='vac_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p><?php $var='vac_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
								</div>
								<?php $j++;if($j<10){ ?>
								<div class="col-xs-2">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center">
									<p class =" pt7 <?php $var ='vac_r'.$i.'_f3'; echo get_yn_class($DataRow->$var); ?>">
									<?php $var ='vac_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var='vac_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p class =" pt7 <?php $var ='vac_r'.$i.'_f3'; echo get_yn_class($CompareRow->$var); ?>">
									<?php $var ='vac_r'.$i.'_f3'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;';?> </p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p><?php $var='vac_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
								</div>
								<?php } ?>
							</div>
							<?php $j++;	} ?>
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
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Comments</td>
											<td style="width: 33%">
												<?php $var ="comments"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="comments"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</td>               
										</tr>
										<tr>
											<td style="width: 33% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations</td>
											<td style="width: 33%">
												<?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?>
											</td>
											<td style="width: 33%" class="bg3">
												<?php $var ="recommendations"; echo isset($CompareRow)?$CompareRow->$var:''; ?>
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
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>