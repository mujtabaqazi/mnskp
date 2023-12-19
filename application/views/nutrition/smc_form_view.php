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
		<title>Monitoring and Supervision Checklist for Social Mobilizers at Community || Form</title>
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
				<div class="panel-heading text-center">  Monitoring and Supervision Checklist for Social Mobilizers at Community   
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
										<label class="pt7 pb2">District</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php  echo (isset($DataRow))?get_Facility_District_Name($DataRow->facode):''; ?></label>
									</div>
								</div>
				
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Taluka</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">UC</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo isset($DataRow)?get_UC_Name(get_Facility_UC_Name($DataRow->facode)):''; ?></label> 
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Village</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var="village"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Date of Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
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
										<label class="pt7 pb2">Facility Type</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo isset($DataRow)?get_Fatype_Name($DataRow->fatype):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 bgcolcl text-center">
										<label>Health & Nutrition Committee& Mother Support Groups (Information obtained from members)</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-xs-10 br">
										<label>Tittle</label>
									</div>
									<div class="col-xs-2 ">
										<label>Yes / No</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">1. Do Health and Nutrition Committee exist?</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r1_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">2. Does the committee have equal representation from all sections of community in the village?</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r2_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label class="pt7 pb2">3. How many members in the committee?</label>
									</div>
									<div class="col-xs-1 text-left">
										<p><?php $var="com_mem_count"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1">
										<label class="pt7 pb2">Names</label>
									</div>
									<div class="col-xs-2 zp">
										<p><?php $var="com_mem_names"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-right">
										<label class="pt7 pb2">Designations</label>
									</div>
									<div class="col-xs-2 ">
										<p><?php $var="com_mem_desgs"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">4. Regular meetings held</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r3_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label class="pt7 pb2">5. How many times meetings are held</label>
									</div>
									<div class="col-xs-6">
										<p><?php $var ='meet_time';echo isset($DataRow)?$DataRow->$var == 1 ? "Monthly" : ($DataRow->$var == 2 ? "Quarterly" : ($DataRow->$var == 3 ? "Irregular" : "")):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<label>6. When did the last meeting hold:</label>
									</div>
									<div class="col-xs-9">
										<div class="row">
											<div class="col-xs-1  bc zp text-center">
												<label>Date</label>
											</div>
											<div class="col-xs-2 bc brl">
												<label>Venue</label>
											</div>
											<div class="col-xs-3 bc">
												<label>Agenda of meeting</label>
											</div>
											<div class="col-xs-3 bc brl">
												<label>Any problems identified</label>
											</div>
											<div class="col-xs-3 bc">
												<label>Any Actions taken</label>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-1 zp">
												<p><?php $var ='meet_date'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
											</div>
											<div class="col-xs-2 zp">
												<p><?php $var ='meet_venue'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='agenda_meet_1'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='prob_iden_1'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='actn_tkn_1'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-1 zp">

											</div>
											<div class="col-xs-2 zp">

											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='agenda_meet_2'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='prob_iden_2'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='actn_tkn_2'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-1 zp">

											</div>
											<div class="col-xs-2 zp">

											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='agenda_meet_3'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='prob_iden_3'; echo isset($DataRow)?$DataRow->$var:''; ?><p>
											</div>
											<div class="col-xs-3 ">
												<p><?php $var ='actn_tkn_3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">7. Village mapping done by the Health and Nutrition Committee</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r4_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">If Yes: Community resources (Human & Non-Human (lists available)</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r5_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">8. Is there any other organization working in the village?</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r6_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-10">
										<label class="pt7 pb2">If Yes, is there any coordination exist between the organization, Health and Nutrition Committee?</label>
									</div>
									<div class="col-xs-2">
										<p class="pt7"><?php $var ='msg_r7_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-12">
										<label>Key Performance Nutrition Indicators</label>
									</div>
								</div>
								<?php
								$labels=array(
									"Total number of pregnant women in the village",
									"Total number of pregnant women registered during first trimester",
									"Total number of pregnant women received antenatal visits to health facility",
									"ANC-1 (Registration Age)",
									"ANC-2 Revisit",
									"ANC-3 ",
									"ANC-4",
									"Total number of pregnant women received counselling on nutrition by health care providers",
									"Total number of pregnant women received iron folic acid",
									"Total number of pregnant women received TT vaccination",
									"Total number of births in village",
									"Total number of babies having normal weight",
									"Total number of low birth weight babies",
									"Total number of new born started breastfeeding within one hour of birth.",
									"Total number of children < 2 years",
									"Total number of children < 6 months",
									"Total number of children continued breastfeeding", 
									"0I year",
									"18 months",
									"02 years",
									"Total number of children between 6-24 months received micronutrient sachet",
									"30 sachet",
									"60 sachet",
									"90 sachet",
									"Total number of identified as non-vaccinated or incomplete vaccination",
									"Number of cases received vaccination ",
									"Dose 1",
									"Dose 2",
									"Fully immunized",
									"Number of children < 5 received Vitamin A during last 6 months",
									"General cleanliness of the village", 
									"Number of houses having soap",
									"Number of houses using clean/safe water for drinking 
									(Boiled, Filter, treated or specify any other)",
									"Number of houses having functional latrines",
									"Number of ouses using iodized salt",
									"Total number of married couples using contraceptives."
								);
								$check_lables=array(
									4,
									5,
									6,
									7,
									18,
									19,
									20,
									22,
									23,
									24,
									27,
									28
								);
								$check_radio=array(
									4,
									5,
									6,
									7,
									31
								);
								for($index=1;$index<=count($labels);$index++){
								?>
								<div class="row">
									<div class="col-xs-<?php echo (in_array($index,$check_lables))?'9 col-xs-offset-1':'10'; ?>">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-2 zp">
										<?php if (in_array($index,$check_radio)){ ?>
										<p class="pt7"><?php $var ='pni_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else{?>
										<p><?php $var ='pni_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php } ?>
									</div>
								</div>
								<?php } ?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>nutrition/forms/smc_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#compare_btn").on('click',function(e){
				window.location.href="<?php echo $basePath; ?>nutrition/forms/smc_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
		</script>
	</body>
</html>