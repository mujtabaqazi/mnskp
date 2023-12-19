<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Malaria Control Services || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Malaria Control Services Checklist</div>
				<div class="panel-body">
					<?php 
					echo validation_errors();
					$action = $basePath."imc/malaria/save/".$id;
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart($action,$attributes); ?>
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >               
								<!-- <label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></label> -->
							</div>
							<div class="col-xs-3">
								 <label class="pt7 pb2">Reporting month</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Name of Health Facility</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
							</div>
						</div>						
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">Name of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>					
						
							<div class="col-xs-3">
								 <label class="pt7 pb2">Designation of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
				        	<div class="col-xs-12 bgcolcl text-center">
				          		<label>Malaria Control Services </label><span>(Check Lab, Register & office record. To fill this section use HF data of previous month)</span>
				        	</div>
				      	</div>
				      	<div class="row bc mt1">
					        <div class="col-xs-4 col-xs-offset-2">
					        	
					        </div>
					        <div class="col-xs-3 brl text-center"><label>ACD:</label></div>
					        <div class="col-xs-3 text-center"><label>PCD:</label></div>					        
				     	</div>
				     	<?php 							
							$labels = array(
								'Total number of slides collected',
								'Total number of positive slides'													
							);
							for($i=1; $i<=count($labels); $i++){ ?>						
					      	<div class="row">
						      	<div class="col-xs-4 col-xs-offset-2">
					          		<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
					        	</div>
					        	<div class="col-xs-3">
					        		<div class="row">
										<div class="col-xs-12 zp">
											<input value="<?php $var ='mc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">				          		
										</div>																				
									</div>
								</div>
								<div class="col-xs-3">
					        		<div class="row">
										<div class="col-xs-12 zp">
											<input value="<?php $var ='mc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">				          		
										</div>																				
									</div>
								</div>
					      	</div><?php 
						}?>				      	

				      	<div class="row">
					       
					    </div>
				      	<?php 							
							$labels = array(
								'Advance monthly program submitted by Malaria Supervisor',
								'Malaria Supervisor collecting the blood slides for MP from FLCF regularly',
								'Malaria Microscopist posted (Check this only in RHC & above HFs)',
								'RDT performed'						
							); 
							for($i=1; $i<=count($labels); $i++){ ?>						
					      	<div class="row">
						      	<div class="col-xs-6 col-xs-offset-2">
					          		<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
					        	</div>
					        	<div class="col-xs-2">
					        		<div class="row">
										<div class="col-xs-6 text-left">
											<label>Yes</label>&nbsp;
											<input <?php $var ='cl_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
										</div>
										<div class="col-xs-6 text-left">
											<label>No</label>&nbsp;
											<input <?php $var ='cl_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
										</div>										
									</div>
								</div>								
					      	</div><?php 
						}?>	
					</div><!--end of rowlightbg-->
     
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>GENERAL COMMENTS & RECOMMENDATIONS</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Observations</td>
											<td>
												<input value="<?php $var ="observations"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Observations" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues</td>
											<td>
												<input value="<?php $var ="issues"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Issues" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions</td>
											<td>
												<input value="<?php $var ="actions"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Actions" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
			                <button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-file"></i> Save Form  
							</button>
							<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-floppy-o"></i> Submit Form  
							</button>
			                <a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
			            </div>		
					</div>
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
	</body>
</html>