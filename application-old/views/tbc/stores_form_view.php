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
	  <title>Monitoring checklist for Provincial warehouse/District stores || Form</title>
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
					Monitoring checklist for Provincial warehouse/District stores
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
								</div>	
								<div class="row mt1 mb1">
									<div class="col-xs-12 bgcolcl text-center">
										<label>General information</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"1. Location (accessibility)",
									"2. Security (secure doors & windows)",
									"3. Independent store for TB drugs?",
									"4. Store keeper trained",
									"5. Physical condition of store satisfactory (roof, walls, ceiling, any seepage, condition of white wash, etc.)",
									"6. Seating arrangements (office furniture, availability and condition)",
									"7. Medicine stored on racks & pellets",
									"8. Accessibility: (about 2 Meter )",
									"9. Height from floor: (about 12 cm)",
									"10. Distance from wall as per guidelines (about 40 cm)",
									"11. Exposed to sunlight",
									"12. Bin cards present and tally with stock register and stock",
									"13. Medicines storage following FIFO & FEFO rule",
									"14. Place for loading/unloading",
									"15. Room temperature at the time of visit",
									"16. Temperature chart maintained"
								);
								for($i=1;$i<=count($labels);$i++){ ?>
								<div class="row">
									<?php if($i==1||$i==2 ||$i==4) { ?>
									<div class="col-xs-4">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<?php if($i==4){ ?>
									<div class="col-xs-2 zp">
										<p><?php $var ='gi_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">If yes, Date of training</label>
									</div>
									<div class="col-xs-4 zp">
										<p><?php $var ="dot"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<?php }else { ?>
									<div class="col-xs-8 zp">
										<p><?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									
									<?php } }else { ?>
									<div class="col-xs-<?php echo ($i==15)?"4":"8"; ?>">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<?php if ($i==15){?>
									<div class="col-xs-1 text-right zp">
										<p><?php $var ='temperature'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										
									</div>
									<div class="col-xs-3 zp">
										<label class="pt7 pb2">&deg;C</label>
									</div>
									<?php }?>
									<?php if ($i==6||$i==7||$i==14||$i==15) {?> 
									<div class="col-xs-4 zp">
										<p><?php $var ='gi_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Satisfactory" : ($DataRow->$var == 0 ? "Unsatisfactory" : ""):'';?></p>
									</div>
									<?php }else { ?>
									<div class="col-xs-2 zp">
										<p><?php $var ='gi_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<?php } } ?>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-12">
										<label class="pt7 pb2">17. ATT drugs: (after physical verification information to be obtained from stock register)</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-1 text-center">
										<label>Sr. #</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Name of drugs</label>
									</div>
									<div class="col-xs-2 text-center">
										<label>Last consignment</label>
									</div>
									<div class="col-xs-3 brl text-center">
										<label>Last consignment received on</label>
									</div>
									<div class="col-xs-2 text-center">
										<label>Stock balance</label>
									</div>
									<div class="col-xs-2 bl text-center">
										<label>Remarks</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"4 FDCs ",
									"2 FDCs 150 mg",
									"2 FDCs 450 mg",
									"HRE",
									"Inj. Streptomycin",
									"Distilled Water",
									"Disposable syringes",
								);
								for ($i=1;$i<=count($labels);$i++){ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i;?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='atd_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 text-center">
										<p><?php $var ='atd_r'.$i.'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='atd_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='atd_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-12">
										<label class="pt7 pb2">Pediatric Drugs</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-1 text-center">
										<label>Sr. #</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Name of drugs</label>
									</div>
									<div class="col-xs-2 text-center">
										<label>Last consignment</label>
									</div>
									<div class="col-xs-3 brl text-center">
										<label>Last consignment received on</label>
									</div>
									<div class="col-xs-2 text-center">
										<label>Stock balance</label>
									</div>
									<div class="col-xs-2 bl text-center">
										<label>Remarks</label>
									</div>
								</div>
								<?php
								$labels=array(
									"3 FDCs ",
									"2 FDCs 60/30",
									"H 100 mg",
									"Z 400 mg"
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i;?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pd_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 text-center">
										<p><?php $var ='pd_r'.$i.'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pd_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var ='pd_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-12">
										<label class="pt7 pb2">18. Record pertaining to issue the drugs: (from indents, issue voucher and stock register)</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-3">
										<div class="row">
											<div class="col-sm-2">
												<label class="pt14">Sr.#</label>
											</div>
											<div class="col-sm-7 brl text-center">
												<label class="pt14 pb6">Name of document</label>
											</div>
											<div class="col-sm-3 text-center">
												<label class="pt14">Present</label>
											</div>
										</div>
									</div>
									<div class="col-sm-2 brl text-center">
										<label class="pt14 pb6">Complete / Incomplete</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Signed by store keeper and DDO</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Tally with other documents?</label>
									</div>
									<div class="col-sm-3 text-center">
										<label class="pt14">Remarks</label>
									</div>
								</div>
								<?php
								$labels=array(
									"Indent voucher ",
									"Issue voucher",
									"Stock register ",
								);
								for($i=1;$i<=count($labels);$i++){
								?>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2"><?php echo $i; ?></label>
											</div>
											<div class="col-xs-7">
												<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
											</div>
											<div class="col-xs-3 text-center">
												<p class="pt7 pb2"><?php $var ='pid_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pid_r'.$i.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Complete" : ($DataRow->$var == 0 ? "Incomplete" : ""):'';?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pid_r'.$i.'_f3';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pid_r'.$i.'_f4';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
									<div class="col-xs-3">
										<p><?php $var ='pid_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
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
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Issues/Challenges found during the visit </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Feedback/Recommendations to MDR unit </td>
											<td>
											<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>tbc/forms/stores_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
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
				window.location.href="<?php echo $basePath; ?>tbc/forms/stores_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
		</script>
	</body>
</html>