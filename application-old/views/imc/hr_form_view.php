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
	  <title>Human Resource || Form</title>
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
				<div class="panel-heading text-center">Human Resource Checklist</div>
				<div class="panel-body pbody">
					<div class="alignmentview">
						<div class="rowlightbg"> 
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Supervisor Name</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Supervisor Designation</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">District</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Facility</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Reporting Month</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Date of Visit</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Facility Type</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
								
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Province</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Name of Monitor</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
								</div>							
							</div>
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Designation of Monitor</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 bgcolcl text-center">
									 <label>HUMAN RESOURCE  </label>
								</div>
							</div>
							<div class="row mt1">
								<div class="col-xs-3">
									<label class="pt7 pb2">Total # of staff at facility</label>
								</div>
								<div class="col-xs-3 ">
									<p><?php $var="total_staff"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-3">
									<label class="pt7 pb2"># of LHWs attached to the HF</label>
								</div>
								<div class="col-xs-3 ">
									<p><?php $var="lhw_hf"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<label class="pt7 pb2"># of Vaccinators attached to the HF</label>
								</div>
								<div class="col-xs-3 ">
									<p><?php $var="vaccinators_hf"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-sm-7 text-center">
									<label class="pt14">Staff Category</label>
								</div>
								<div class="col-sm-1 brl text-center">
									<label class="pt14 pb13">Sanctioned</label>
								</div>
								<div class="col-sm-1 text-center">
									<label class="pt14">Filled</label>
								</div>
								<div class="col-sm-1 bl text-center">
									<label class="pt14 pb13">Vacant</label>
								</div>
								<div class="col-sm-2 bl">
									<div class="row bb">
										<div class="col-sm-12 text-center zp">
											<label>Deputation/Detailement</label>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-6 br text-center">
											<label>In</label>
										</div>
										<div class="col-sm-6 text-center">
											<label>Out</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
							$labels=array(
							"MS/AMS/Deputy MS",
							"Medical Specialist",
							"Surgical Specialist",
							"Cardiologist",
							"Chest Specialist",
							"Neurosurgeon",
							"Orthopedic surgeon",
							"Child specialists",
							"Gynecologists",
							"Eye Specialists",
							"ENT Specialists",
							"Anesthetist",
							"Pathologist",
							"Radiologist",
							"PMO/APMO/CMO/SMO/MO",
							"PW/MO/APWMO/SWMO/WMO",
							"Medical Assistant",
							"Dental Surgeon",
							"Physiotherapist",
							"Matron",
							"Head Name",
							"Staff Nurse/Charge Nurse",
							"Lab Assistant/Techs",
							"X-ray Assistant/Techs",
							"Dental Assistant/Techs",
							"ECG Assist/Techs",
							"Lady Health Visitors",
							"Health/Medical Assistants",
							"Dispensers",
							"Sanitary Inspectors",
							"Midwives",
							"Others"
							);
							for($i=1;$i<=count($labels);$i++){
							?>
							<div class="row">
								<div class="col-xs-7">
									<?php if($i==count($labels)){?>
									<label class="pt7 pb2"><?php $var="hr_other"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									<?php } else {?>
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									<?php } ?>
								</div>
								<div class="col-xs-1 ">
									<p><?php $var="hr_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 ">
									<p><?php $var="hr_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 ">
									<p><?php $var="hr_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 ">
									<p><?php $var="hr_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
								<div class="col-xs-1 ">
									<p><?php $var="hr_r".$i."_f5"; echo isset($DataRow)?$DataRow->$var:'';?></p>
								</div>
							</div>
							<?php } ?>
						</div><!--end of rowlightbg-->		      
     
						<div class="row">
							<div class="col-sm-12 bgcolcl text-center">
								<label>GENERAL COMMENTS & RECOMMENDATIONS</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp ">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Comments</td>
											<td>
												<p><?php $var ="comments"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations</td>
											<td>
												<p><?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>imc/forms/hr_edit/<?php echo $vpvc_id; ?>">
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
					window.location.href="<?php echo $basePath; ?>imc/forms/hr_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>