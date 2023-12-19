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
	  <title>Hepatitis Control Services || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Hepatitis Control Services Checklist</div>
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

						<div class="row bc">
				        	<div class="col-xs-8">
				          		<label>Hepatitis Control Services</label><span> (Check Lab Register & office record. To fill this section use HF data of previous month)</span>
				        	</div>
							<div class="col-xs-2 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
							<div class="col-xs-2 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
				      	</div>
						
				      	<?php 							
							$labels = array(
								"Total number of suspected for Hepatitis registered",
								"Total number of cases referred for screening ",
								"Number of feedback received ",
								"Number of advocacy meetings held"
							
							); 

							for($i=1; $i<=count($labels); $i++){ ?>						
					      	<div class="row">
						      	<div class="col-xs-8">
					          		<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
					        	</div>
								
					        	<div class="col-xs-2 text-center">
					        		<p><?php $var ='hc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>				          		
					        	</div>
					        	<div class="col-xs-2 text-center bg3">
					        		<p><?php $var ='hc_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>				          		
					        	</div>
					      	</div>
							<?php 	} ?>
							<div class="row bc mt1">
								<div class="col-sm-4 bgw" style="min-height:51px;">
									 
								</div>
								<div class="col-sm-4 brl text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-2 br text-center ">
										  <label>Total</label>
										</div>
										<div class="col-xs-3 br text-center">
										  <label>On ICT</label>
										</div>
										<div class="col-xs-4 br text-center ">
										  <label>On ELISA</label>
										</div>
										<div class="col-xs-3 text-center">
										  <label>On PCR</label>
										</div>
									</div>									
								</div>
								<div class="col-sm-4 text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									<div class="row bt">
										<div class="col-xs-2 br text-center ">
										  <label>Total</label>
										</div>
										<div class="col-xs-3 br text-center">
										  <label>On ICT</label>
										</div>
										<div class="col-xs-4 br text-center ">
										  <label>On ELISA</label>
										</div>
										<div class="col-xs-3 text-center">
										  <label>On PCR</label>
										</div>
									</div>									
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4" >
									<label class="pt7 pb2">Number of Hepatitis B cases +ve</label> 
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r5_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r5_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var ='hc_r5_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r5_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r5_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r5_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-center bg3">
									<p><?php $var ='hc_r5_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">								
								<div class="col-xs-4" >
									<label class="pt7 pb2">Number of Hepatitis C cases +ve</label> 
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r6_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r6_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r6_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var ='hc_r6_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r6_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r6_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r6_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-center bg3">
									<p><?php $var ='hc_r6_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">								
								<div class="col-xs-4" >
									<label class="pt7 pb2">Number of Hepatitis D cases +ve</label> 
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r7_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r7_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-left">
									<p><?php $var ='hc_r7_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var ='hc_r7_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>	
								</div>
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r7_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r7_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-left bg3">
									<p><?php $var ='hc_r7_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>								
								<div class="col-xs-1 text-center bg3">
									<p><?php $var ='hc_r7_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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