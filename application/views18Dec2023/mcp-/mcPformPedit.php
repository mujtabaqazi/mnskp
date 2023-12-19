<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
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
					<?php 
					echo validation_errors();
					$action = $basePath."mcp/mc/save";
					$action .= isset($DataRow)?'/'.$id:'';
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$DataRow->fmonth);
					echo form_open_multipart($action,$attributes,$hidden); ?>
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
								<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >               
								<!-- <label class="pt7 pb2"><?php echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->dov)):''; ?></label> -->
							</div>
							
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Last Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dolv"; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text"  class="form-control dp anyOtherDate" >               
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_name" value="<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District Lab Supervisor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="lab_supervisor" value="<?php $var="lab_supervisor"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Medical Officer/Incharge</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="incharge" value="<?php $var="incharge"; echo isset($DataRow)?$DataRow->$var:''; ?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Catchment Area Population</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control numberclass noDots" id="" name="catchment_area_pop" value="<?php $var="catchment_area_pop"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
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
							<div class="col-xs-12 bgcolcl text-center">
								<label><?php echo $labels[$index-1]; ?></label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1">
								<label class="pt14">Sr. No.</label>
							</div>
							<div class="col-xs-8 bl text-center">
								<label class="pt14 pb12">Item</label>
							</div>
							<div class="col-xs-3 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Observation</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br text-center">
										<label>Yes</label>
									</div>
									<div class="col-xs-6 text-center">
										<label>No</label>
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
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-center">
										<label>Yes</label>&nbsp;
										<input <?php $var ='mc_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-center">
										<label>No</label>&nbsp;
										<input <?php $var ='mc_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<?php $i++;$serialNumber++;} } ?>
					</div><!--end of div rowlightbg-->
					<div class="row mt1 mb1">
						<div class="col-xs-12 bgcolcl text-center">
							<label>COMMENTS</label>
						</div>
					</div>
					<div class="row mt1">
						<div class="col-xs-12 zp">
							<textarea id="" name="comments" rows="5" class="form-control"><?php $var='comments';echo isset($DataRow)?$DataRow->$var:"";?></textarea>
						</div>
					</div>
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-file"></i> Save Form
							</button>
							<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-floppy-o"></i> Submit Form
							</button>
							<a class="btn btn-primary btn-md btncc" onclick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
						</div>
					</div>

					<?php echo form_close(); ?>
				</div>
				<!--end of panel body-->
			</div>
			<!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		<script>
			$(".yp").datepicker({
				format: " yyyy",
				viewMode: "years", 
				minViewMode: "years"
			});
		</script>
	</body>
</html>