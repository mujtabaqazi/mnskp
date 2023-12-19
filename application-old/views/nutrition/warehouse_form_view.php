
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
		<title>Monthly Monitoring Checklist of Warehouse at Districts || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
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
					Monthly Monitoring Checklist of Warehouse at Districts
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
						<div class="alignmentview">
							<div class="rowlightbg">
								<div class="row">
									<div class="col-xs-2">
										<label>Supervisor Name</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label>Supervisor Designation</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label>District</label>
									</div>
									<div class="col-xs-2">
										<label><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
									</div>
								</div>
				
								<div class="row">
									<div class="col-xs-2">
										<label>Taluka</label>
									</div>
									<div class="col-xs-2">
										<label><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label>UC</label>
									</div>
									<div class="col-xs-2">
										<label><?php echo isset($DataRow)?get_UC_Name(get_Facility_UC_Name($DataRow->facode)):''; ?></label> 
									</div>
									<div class="col-xs-2">
										<label>Village</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="village"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label>Date of Visit</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label>Name of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label>Designation of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label>Functional Since (Date)</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="functional_date"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):'';?></label>
									</div>
									
									<div class="col-xs-2">
										<label>Time of visit</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="tov"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label>Address of Location Site</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var="loc_address"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label>Facility</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label>Reporting Month</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label>Facility Type</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Maintenance of Warehouse:</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-9 col-xs-offset-1 br">
										<label>Things to be monitored</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Yes / No</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"Cleanliness",
									"Whitewash",
									"Ceiling condition (Leakage etc.)",
									"Floor cemented",
									"Ventilation",
									"Light",
									"Firefighting equipment", 
									"Door/Windows",
									"Direct Sunlight",
									"Secure",
									"1.	Are warehouse disinfected and sprayed every third month against insects, rodents and birds. Verify from records?", 
									"2.	Is staking of cartons four inches of the floor? (Using wooden planks and approximately two feet away from any wall).", 
									"3.	Is each consignment stacked separately? (To facilitate counting and access to hind stack?) ",
									"4.	Is First-Expiry First-Out (FEFO) method followed? ",
									"5.	Is staking of cartons according to prescribed protocols, maximum eight cartons only? ",
									"6.	Are marking labels, manufacturers or expiry dates visible on every carton? ",
									"7.	Is Bin Card present for each stake?", 
									"8.	If Yes? Entries proper"
								);
								for($index=1;$index<=count($labels);$index++){?>
								<div class="row">
									<div class="col-xs-<?php echo ($index<11)?'9  col-xs-offset-1':'10'; ?>">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='mow_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-6">
										<label>9. How many times in the last quarter the following officials have visited warehouse?</label>
									</div>
									<div class="col-xs-6 mt7">
										<div class="row">
											<div class="col-xs-6  bc br">
												<label>Designation</label>
											</div>
											<div class="col-xs-6 bc">
												<label>Number of times</label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<label>EDO (H) DHO</label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='edo_dho_visit'; echo isset($DataRow)?$DataRow->$var:''; ?> </p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<label>District Focal Person</label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='dfp_visit'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-6">
												<label><?php $var ='other_visitor'; echo isset($DataRow)?$DataRow->$var:''; ?></label>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='other_p_visit'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>10. Frequency of supply received from</label>
									</div>
									<div class="col-xs-6">
										<p><?php echo isset($DataRow)?$DataRow->$var == 1 ? "Monthly" : ($DataRow->$var == 2 ? "Quarterly" : ($DataRow->$var == 3 ? "Irregular" : "")):'';?></p>
										
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label>11. Mode of transportation: From Province warehouse to district warehouse</label>
									</div>
									<div class="col-xs-3">
										<p><?php $var ='mod_transport'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
										<label>12. Physical Check at time of visit</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-2 text-center">
										<label class="pt14">Items</label>
									</div>
									<div class="col-sm-4">
										<div class="row">
											<div class="col-sm-4 zp brl text-center">
												<label>Out of stock at time of inspection? Yes/No</label>
											</div>
											<div class="col-sm-4 text-center">
												<label>Any stock Expired
													<br>
													Yes/No</label>
											</div>
											<div class="col-sm-4 zp brl text-center">
												<label>Physically Counted Stock in Hand
													<br>
													(# Units)</label>
											</div>
										</div>
									</div>
									<div class="col-sm-2">
										<label class="pt14">Quantity recorded on Bin Card (Stock Ledger)</label>
									</div>
									<div class="col-sm-2 brl">
										<label class="pt14 pb26">Quantity that is short</label>
									</div>
									<div class="col-sm-2">
										<label class="pt14">Quantity that is in excess</label>
									</div>
								</div>
								<?php for($index=1;$index<=9;$index++){ ?>
								<div class="row">
									<div class="col-xs-2">
										<p><?php $var ='pc_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<p class="pt7"><?php $var ='pc_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-4   text-center">
												<p class="pt7"><?php $var ='pc_r'.$index.'_f3'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
											</div>
											<div class="col-xs-4 text-center">
												<p class="pt7"><?php $var ='pc_r'.$index.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='pc_r'.$index.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2">
										<p><?php $var ='pc_r'.$index.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2">
										<p><?php $var ='pc_r'.$index.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
							</div>	
							<div class="row">
								<div class="col-sm-12 bgcolcl text-center">
									<label>13. Problems and recommendations</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 zp">
									<table class="table   table-bordered">
										<tbody>
											<tr>
												<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Problems </td>
												<td>
												<p style="border: 0px none;width: 100%;"><?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?>"  </p>
												</td>
											</tr>
											<tr>
												<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations </td>
												<td>
												<p style="border: 0px none;width: 100%;"><?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?> </p>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div><!--end of div rowlightbg-->
						</div>
						<!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>nutrition/forms/warehouse_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div><!--end of panel body-->
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#compare_btn").on('click',function(e){
				window.location.href="<?php echo $basePath; ?>nutrition/forms/warehouse_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
		</script>
	</body>
</html>