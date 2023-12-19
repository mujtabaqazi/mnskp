<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit || Form</title>
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
					Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."tbc/mdr/save";
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
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
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
								<label class="pt7 pb2">Province</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
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
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" class="form-control dp1">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Visit’s objectives</label>
							</div>
							<div class="col-xs-6">
								<input class="form-control" id="" value="<?php $var="visit_obj"; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>	
						<div class="row bc mt15 mb1">
							<div class="col-xs-8">
								<label>Key Indicators to Monitor</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Yes / No</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Remarks</label>
							</div>
						</div>
						<?php
						$labeles=array(
							"Meeting with key stakeholders",
							"Hospital Administration",
							"MDR Facility staff",
							"Others",
							"MDR TB Management Facility (MDR TB-MU)",
							"1.	Facility identified as MDR TB care services point (Board displayed)?",
							"2.	Facility visited by NTP/PTP/NPO/DTC in the quarter under review?",
							"3.	MDRTB management guideline was available?",
							"4.	MDRTB management guideline is followed?",
							"5.	Relevant staff is trained on management guideline?",
							"6.	TB related IEC materials displayed?",
							"7.	Enrollment mechanism was according to NTP protocols?",
							"8.	Total enrolled MDR TB cases receiving treatment:",
							"9.	Number of enrolled MDR TB cases receiving indoor treatment:",
							"10. Number of enrolled MDR TB cases receiving outdoor door treatment:",
							"11. Number & %age of treating MDR TB cases receiving incentives:",
							"12. Protocols exists and following for referral and enrolment?",
							"13. MDR TB suspects are referred from public/private health facilities?",
							"14. Cases referred to MDR outdoor treatment centers are documented? ",
							"15. DR -TB 01 cards adequately filled?",
							"16. NTP protocols/regimen followed?",
							"17. DR-TB 03 adequately filled?",
							"18. Treatment monitoring (follow up) recorded?",
							"19. Retrieval of treatment interrupted cases documented?",
							"20. TSR (NSS+) in the quarter under review?",
							"21. Quarterly reports record maintained?",
							"22. MDR ATT drugs available in requisite quantity?",
							"23. MDR ATT drugs adequately stored?",
							"24. ATT drugs inventory/dispensing status adequate?", 
							"25. Other MDRTB related supply present?",
							"Laboratory",
							"1.	Lab properly upgraded to meet MDR TB needs",
							"2.	Electricity back up present",
							"3.	Effective infection control mechanism exists",
							"4.	Culture/DST being performed",
							"5.	Culture/DST materials available", 
							"6.	SOPs chart available",
							"7.	Work load over/under",
							"8.	DR-TB 06 register (C&DST) properly maintained",
							"9.	DR-TB 06 tallies with DR-TB 03 for case detection and follow up",
							"10. DR-TB 04 register properly maintained",
							"11. DR TB 04 tallies with TB 03 for case detection and follow up",
							"12. Lab is under EQA system",
							"13. Lab reagents available",
							"14. Other lab supply available: sputum cups/slides",
							"15. Lab wastes properly disposed"
						);
						$i=1;
						for ($index=1;$index<=count($labeles);$index++){
							if ($index==1 || $index==5||$index==31){
						?>
						<div class="row">
							<div class="col-xs-8 bc">
								<label><?php echo $labeles[$index-1]; ?></label>
							</div>
						</div>
							<?php } else{?>
						<div class="row">
							<div class="col-xs-8">
								<?php if ($index==4){?>
								<input class="form-control " value="<?php $var ='mdr_other'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Others" type="text">
								<?php }else {?>
								<label class="pt7 pb2"><?php echo $labeles[$index-1]; ?></label>
								<?php } ?>
							</div>
							<div class="col-xs-2 zp">
								<?php if(($index >12) && ($index < 17)){?>
								<input class="form-control numberclass noDots" value="<?php $var ='mdr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php }else{ ?>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='mdr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='mdr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
								<?php } ?>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='mdr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php $i++;} }?>
						
					</div><!--end of div rowlightbg-->
					<div class="row mt1">
						<div class="col-xs-12 bgcolcl text-center mn25"></div>
					</div>
					<div class="row">
						<div class="col-xs-12 zp">
							<table class="table   table-bordered">
								<tbody>
									<tr>
										<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Other activities undertaken during the visit </td>
										<td>
										<input placeholder="Other activities undertaken during the visit" value="<?php $var ='activities_undertaken'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
										</td>
									</tr>
									<tr>
										<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues/Challenges found during the visit </td>
										<td>
										<input placeholder="Issues/Challenges found during the visit" value="<?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
										</td>
									</tr>
									<tr>
										<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions taken </td>
										<td>
										<input placeholder="Actions taken" value="<?php $var ='actions_taken'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
										</td>
									</tr>
									<tr>
										<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Feedback/Recommendations to MDR unit </td>
										<td>
										<input placeholder="Feedback/Recommendations to MDR unit" value="<?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
										</td>
									</tr>
									<tr>
										<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Suggestions to NTP/PTP/SRs </td>
										<td>
										<input placeholder="Suggestions to NTP/PTP/SRs" value="<?php $var ='suggestions'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
										</td>
									</tr>
								</tbody>
							</table>
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