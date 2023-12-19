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
	  <title>Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit || Form</title>
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
					Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit
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
										<label class="pt7 pb2">Reporting Month</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
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
										<label class="pt7 pb2"><?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Designation of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Date Of Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Visit’s objectives</label>
									</div>
									<div class="col-xs-6">
										<label class="pt7 pb2"><?php $var="visit_obj"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
								</div>	
								<div class="row bc mt15 mb1">
									<div class="col-sm-8">
										<label>Key Indicators to Monitor</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Yes / No</label>
									</div>
									<div class="col-sm-2 text-center">
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
									<div class="col-sm-8 bc">
										<label><?php echo $labeles[$index-1]; ?></label>
									</div>
								</div>
									<?php } else{?>
								<div class="row">
									<div class="col-xs-8">
										<?php if ($index==4){?>
										<label class="pt7 pb2"><?php $var ='mdr_other'; echo isset($DataRow)?$DataRow->$var:''; ?></label>
										<?php }else {?>
										<label class="pt7 pb2"><?php echo $labeles[$index-1]; ?></label>
										<?php } ?>
									</div>
									<div class="col-xs-2 text-center">
										<?php if(($index >12) && ($index < 17)){?>
										<p><?php $var ='mdr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php }else{ ?>
										<p><?php $var ='mdr_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php } ?>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='mdr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php $i++;} }?>
								
							</div><!--end of div rowlightbg-->
					</div><!--end of div alignmentview-->
						<div class="row mt1">
							<div class="col-xs-12 bgcolcl text-center mn25"></div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Other activities undertaken during the visit </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='activities_undertaken'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Issues/Challenges found during the visit </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Actions taken </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='actions_taken'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Feedback/Recommendations to MDR unit </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Suggestions to NTP/PTP/SRs </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='suggestions'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>tbc/forms/mdr_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
			</div>
			<!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#compare_btn").on('click',function(e){
				window.location.href="<?php echo $basePath; ?>tbc/forms/mdr_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
		</script>
	</body>
</html>