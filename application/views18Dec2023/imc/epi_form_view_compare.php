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
	  <title>EPI Services || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> EPI Services Checklist</div>
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
										<label class="pt7 pb2">Name of Health Facility</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></p>
							</div>
						</div> 
						<div class="row bc">
				        	<div class="col-xs-8 text-center">
				          		<label>EPI Services</label>
				        	</div>
							<div class="col-xs-2 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
							<div class="col-xs-2 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
				      	</div>
						
				      	<?php 							
							$labels = array(
								'Number of children < 12 months fully immunized',
								'Number of children received measles 1',
								'Number of children received Penta 3',
								'Number of women received TT1',
								'BCG scar verified children present at HF',
								'Monthly Movement Plan available at HF',
								'Cold Chain Maintained',
								'All vaccines available',
								'Permanent Register EPI available',
								'Daily Register EPI available',
								'Updated list of defaulters available'							
							);
							for($i=1; $i<=count($labels); $i++){ ?>						
					      	<div class="row">
						      	<div class="col-xs-8">
					          		<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
					        	</div>
					        	<div class="col-xs-2 text-center">
									<?php if($i==1 || $i==2 || $i==3 || $i==4){?>
										<p><?php $var ='epi_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php
									} else{ ?>
										<div class="row col-xs-offset-1 text-center">
											<div class="col-xs-4" style="width:85%;">												
												<p class =" pt7 <?php $var ='epi_r'.$i.'_f1'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='epi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>												
											</div>											
										</div><?php 										
									} ?>
								</div>
								<div class="col-xs-2 text-center bg3">
									<?php if($i==1 || $i==2 || $i==3 || $i==4){?>
										<p><?php $var ='epi_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										<?php
									} else{ ?>
										<div class="row col-xs-offset-1 text-center">
											<div class="col-xs-4" style="width:85%;">												
												<p class =" pt7 <?php $var ='epi_r'.$i.'_f1'; echo get_yn_class($CompareRow->$var); ?>">
												<?php $var ='epi_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?></p>												
											</div>											
										</div><?php 										
									} ?>
								</div>
					      	</div><?php 
						}?>	
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
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>