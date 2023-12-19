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
				<div class="panel-heading text-center">
					Malaria - Checklist for Microscopy Center
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
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
										<label class="pt7 pb2">Facility</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
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
										<label class="pt7 pb2">District</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
									</div>
								</div>
								
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Reporting Month</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Date Of Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
									</div>
									
									<div class="col-xs-2">
										<label class="pt7 pb2">Date Of Last Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dolv"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>              
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Name of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">"<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Designation of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">District Lab Supervisor</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="lab_supervisor"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Medical Officer/Incharge</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="incharge"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Catchment Area Population</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="catchment_area_pop"; echo isset($DataRow)?$DataRow->$var:'';?></label>
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
									<div class="col-sm-8 bl text-center">
										<label class="pt14 pb12">Item</label>
									</div>
									<div class="col-sm-3 bl">
										<div class="row">
											<div class="col-sm-12 text-center">
												<label>Observation</label>
											</div>
										</div>
										<div class="row bt">
											<div class="col-sm-12 br text-center">
												<label>Yes/No</label>
											</div>
										</div>
									</div>
								</div>
									<?php $serialNumber=1;}else { ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $serialNumber; ?></label>
									</div>
									<div class="col-xs-8">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-3 text-center">
										<p><?php $var ='mc_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
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
						<div class="row mt1">
							<div class="col-xs-12">
								<p>
								<?php $var='comments'; echo isset ($DataRow)?$DataRow->$var:""?>
								</p>
							</div>
						</div>
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>mcp/forms/mc_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div>
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>mcp/forms/mc_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>