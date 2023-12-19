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
	  <title>Maternal & Child Health Services || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<?php if (count($previous)>0){?>
		<div class="container">
			<div class="row" style="background:#0F4A6F;color:white;margin: 0px; padding-top: 3px; padding-bottom: 3px;">
				<div class="col-xs-4 col-xs-offset-4 text-right">
					<label class="mt7">Compare With Previously Submitted Checklist</label>
				</div>
				<div class="col-xs-2">
					<select class="form-control" id="p_month" name="p_month">
						<!--<option value="0">Select Month</option>-->
						<?php foreach($previous as $row){?>
						<option value="<?php echo $row['vpvc_id']; ?>"><?php echo getNewFMonthFormat($row['fmonth']); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-xs-1 text-right">
					<button style="border-radius: 0px;" type="submit" id="compare_btn" name="compare_btn"  class="btn btn-primary btn-md btncc" role="button">
						<i class="fa fa-clipboard"></i> Compare
					</button>
				</div>
			</div>
		</div><!--end of container for compare-->
		<?php } ?>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> Maternal & Child Health Services Checklist</div>
				<div class="panel-body">
					<div class="alignmentview">
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label>Date of visit</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
							</div>
							<div class="col-xs-3">
								 <label>Reporting month</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>District</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
							<div class="col-xs-3">
								<label>Name of Health Facility</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
							</div>
						</div>						
						<div class="row">
							<div class="col-xs-3">
								 <label>Name of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>					
						
							<div class="col-xs-3">
								 <label>Designation of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
				        	<div class="col-xs-12 bgcolcl text-center">
				          		<label>Maternal & Child Health (MCH) Services</label><span> (ANC, Delivery & PNC)</span>
				        	</div>
				      	</div>
				      	<?php 							
							$labels = array(
								'Number of ANC Visit',
								'Number of PNC Visit',
								'Number of Deliveries Conducted',
								'Number of Live Births during last month',
								'Number of Still Births during last month',
								'IMR',
								'Maternal Deaths during last month'							
							); 

							for($i=1; $i<=count($labels); $i++){ ?>						
					      	<div class="row">
						      	<div class="col-xs-4 col-xs-offset-2">
					          		<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
					        	</div>				        	
					        	<div class="col-xs-3">
					        		<p><?php $var ='mch_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>					        		
					        	</div>
					      	</div><?php 
						}?>	
						
				      	<div class="row">
					        <div class="col-xs-4 col-xs-offset-2">
					          <label class="pt7 pb2">Blood Transfusion Services Provided</label>
					        </div>
					        <div class="col-xs-3">
					          	<div class="row">
					            	<div class="col-xs-10 text-left">
					                	<p><?php $var ='mch_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>					                						             		
					              	</div>
					            </div>
				        	</div>
				      	</div>
				      	<div class="row">
					        <div class="col-xs-4 col-xs-offset-2">
					        	<label class="pt7 pb2">MCHC Tools Available</label>
					        </div>
					        <div class="col-xs-3">
					        	<div class="row">
					            	<div class="col-xs-10 text-left">
					                	<p><?php $var ='mch_r9_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>					                	
					              	</div>
					            </div>
					        </div>
				      	</div>
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
												<p><?php $var ="observations"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues</td>
											<td>
												<p><?php $var ="issues"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions</td>
											<td>
												<p><?php $var ="actions"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
							<?php if($DataRow->submitted_by==$userId){ ?>
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>imc/forms/mnch_edit/<?php echo $vpvc_id; ?>">
									<i class="fa fa-pencil-square-o"></i> Update  
								</a>
							<?php } ?>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>imc/forms/mnch_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>