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
		<title>Infant Young Child Feeding (IYCF) Checklist of Health Facility || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">  Infant Young Child Feeding (IYCF) Checklist of Health Facility   
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
						<div class="alignmentview">
							<div class="rowlightbg">
								<div class="row bc">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">S#</label>
											</div>
											<div class="col-xs-10 bl">
												<label class="pt7">Reporting Month</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.1</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Date of visit</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
								<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php $var ="dov"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
							</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Supervisor Name</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="supervisor_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.3</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Supervisor Designation</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="supervisor_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Name of Monitor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="moniter_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="moniter_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Designation of Monitor</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="moniter_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="moniter_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.6</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Village</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var="village"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var="village"; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.7</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Outpatient Therapeutic Program (OTP)/Supplementary Feeding Program (SFP) site</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var="sfp_site"; echo isset($DataRow)?$DataRow->$var:'';?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var="sfp_site"; echo isset($CompareRow)?$CompareRow->$var:'';?></p>
									</div>
								</div>
								
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl text-center">
										<label>Section 2: Identification</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.1</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">District</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Facility</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.3</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Facility Type</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.4</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Province</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p>Khyber Pakhtunkhwa</p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">Taluka</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($DataRow->facode)):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.6</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7 pb2">UC</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p><?php echo isset($DataRow)?get_UC_Name(get_Facility_UC_Name($DataRow->facode)):''; ?></p> 
									</div>
								</div>							
								<div class="row bc mt1">
									<div class="col-sm-6 text-center">
									  <label class="pt14">Behavior</label>
									</div>
									<div class="col-sm-3 brl">
									  <div class="row">
										<div class="col-sm-12 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									  </div>			
									  <div class="row bt">
										<div class="col-xs-6 br text-center ">
											<label>Grading Score</label>											
										</div>
										<div class="col-xs-6 text-center">
											<label>Remarks</label>
										</div>
									  </div>
									</div>
									<div class="col-sm-3">
									  <div class="row">
										<div class="col-sm-12 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									  </div>									  
									  <div class="row bt">
										<div class="row">
											<div class="col-xs-6 br text-center ">
												<label>Grading Score</label>											
											</div>
											<div class="col-xs-6 text-center">
												<label>Remarks</label>
											</div>
									 	</div>
									  </div>
									</div>									
								</div>
								<?php 
								$labels = array(
									"1.	Breast Feeding Counsellor pays attention to the mother such as good eye contact is maintained, mother is properly listened. Due time is given to each mother. Group discussion is avoided. ",
									"2.	There are no barriers between the mother and counsellor. Breast Feeding Counsellor appears to be fully attentive to mother and is not involved in filling of checklist or writing on paper/note book. ",
									"3.	Breast Feeding Counsellor demonstrates good listening skills made apparent through body gesture and head nodding. ",  
									"4.	Breast Feeding Counsellor asks open ended questions i.e. what are the reasons for not giving breast milk? ",
									"5.	Avoid close ended questions i.e. do you feed your Child? ",
									"6.	Avoids using judging words and encourage/build mother’s confidence. ", 
									"7.	Listens and accepts what the mother thinks and feels. ",
									"8.	Uses appropriate therapeutic touch i.e. hug mother or rub her hand. ",
									"9.	Recognizes and praises what the mother is doing correctly. ", 
									"10.	Give a little and relevant information (according to the need assessment) i.e. for < 6 months only exclusive breastfeeding message needs to be given along with guiding her about the correct position for breastfeeding. ",
									"11.	Gives practical help (e.g. offers water) i.e. help her in breastfeeding, knowing correct positioning and attachment steps. ",
									"12.	Uses simple language (mother/caregiver understands) i.e. local language Khyber Pakhtunkhwai, Dhadki or Urdu.",
									"13.	Makes one or two suggestions, not commands for breastfeeding, complementary feeding. ",
									"14.	Suggest where mother can find support (attend educational talk at CMAM site, IYCF Support Groups in community, and refer to Community Volunteer) i.e. refer her to mother support group either in her village or nearby village."
								);
								for ($index=1;$index<=count($labels);$index++){ ?>	
								<div class="row">
									<div class="col-xs-6">
									  <label><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-6 text-center">
												<p class =" pt7 <?php $var ='bhv_r'.$index.'_f1'; echo get_esp_class($DataRow->$var); ?>">
												<?php $var ='bhv_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Poor" : ($DataRow->$var == 2 ? "Satisfactory" : ($DataRow->$var == 3 ? "Excellent" : "")):''; ?></p>
											</div>
											<div class="col-xs-6">
												<p class="pt7"><?php $var ='bhv_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p> 
											</div>
											
										</div>										
									</div>
									<div class="col-xs-3">
										<div class="row bg3">
											<div class="col-xs-6 text-center">
												<p class =" pt7 <?php $var ='bhv_r'.$index.'_f1'; echo get_esp_class($CompareRow->$var); ?>">
												<?php $var ='bhv_r'.$index.'_f1'; echo isset($CompareRow)?$CompareRow->$var == 1 ? "Poor" : ($CompareRow->$var == 2 ? "Satisfactory" : ($CompareRow->$var == 3 ? "Excellent" : "")):''; ?></p>
											</div>
											<div class="col-xs-6">
												<p class="pt7"><?php $var ='bhv_r'.$index.'_f2'; echo isset($CompareRow)?$CompareRow->$var:'';  ?></p> 
											</div>
										</div>										
									</div>
								</div>
								<?php } ?>
								<div class="row bc mt1">
									<div class="col-sm-6">
									  <label class="pt14">Quality of advise</label>
									</div>
									<div class="col-sm-3 brl">
									  <div class="row">
										<div class="col-sm-12 text-center">
										  <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
									  </div>			
									  <div class="row bt">
										<div class="col-xs-6 br text-center ">
											<label>Grading Score</label>											
										</div>
										<div class="col-xs-6 text-center">
											<label>Remarks</label>
										</div>
									  </div>
									</div>
									<div class="col-sm-3">
									  <div class="row">
										<div class="col-sm-12 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									  </div>									  
									  <div class="row bt">
										<div class="row">
											<div class="col-xs-6 br text-center ">
												<label>Grading Score</label>											
											</div>
											<div class="col-xs-6 text-center">
												<label>Remarks</label>
											</div>
									 	</div>
									  </div>
									</div>										
								</div>
								<!-- <div class="row bc">
									<div class="col-sm-12">
									  <label>Quality of advise</label>
									</div>
								</div> -->
								<div class="row mt1">
									<div class="col-sm-4 bc">
									  <label>If breastfeeding:</label>
									</div>
								</div>
								<?php 
								$labels=array(
									"1.	BFC discusses age-appropriate breastfeeding practices i.e. < 6 months only excusive breastfeeding and > 6 month breastfeeding with complementary foods.", 
									"2.	BFC accurately describes correct positioning for breast feeding:",
									"i.	Good attachment",
									"ii.	Chin touching breast",
									"iii.	Mouth wide open",
									"iv.	Lower lip turned out",
									"v.	More areola visible above than below mouth",
									"3.	Talks with mother about the characteristics of complementary feeding >6 months (FATVAH): F=Frequency, A= Amount, T=Texture (thickness/consistency) V= Variety, A=Active or responsive feeding and H=Hygiene",
									"4.	Presents small practical solutions to help mother overcome any difficulties and asks mother to repeat.",
									"5.	Agrees with mother when to come back for follow up",
									"6.	Thanks mother for her time",
									"7.	Total number of pregnant women in the villages covered in UC",
									"8.	Total number of pregnant women registered during first trimester.",
									"ANC-1 (Registration Age)",
									"ANC-2 Revisit",
									"ANC-3 ",
									"ANC-4",
									"Total number of pregnant women received counselling on nutrition by health care providers",
									"Total number of pregnant women received iron folic acid",
									"Total number of pregnant women received TT Vaccination"
								);
								$checks_array = array(
									"12",
									"13",
									"18",
									"19",
									"20"
								);
								$check_array2=array(
									"14",
									"15",
									"16",
									"17"
								);
								for($index=1;$index<=count($labels);$index++){ ?>
								<div class="row">
									<?php if($index==1 || $index==2 || ($index>=8 && $index<=13) || ($index>=18 && $index<=20)){ ?>
									<div class="col-xs-6">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<?php }else{ ?>
									<div class="col-xs-6">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<?php } ?>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-6 text-center">
												<?php $var ='qa_r'.$index.'_f1'; 
												  if(in_array($index,$checks_array)){?>
													  <p class="pt7">
													  <?php echo isset($DataRow)?$DataRow->$var:'';?>
													  </p>
													<?php }else if(in_array($index,$check_array2)){ ?>
													<p class=" pt7 <?php echo get_yn_class($DataRow->$var); ?>">
													<?php echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';
													?>
													</p>
												  <?php
												  } else { ?>
													<p class="pt7 <?php echo get_esp_class($DataRow->$var); ?>">
													<?php echo isset($CompareRow)?$DataRow->$var == 1 ? "Poor" : ($DataRow->$var == 2 ? "Satisfactory" : ($DataRow->$var == 3 ? "Excellent" : "")):'';?>
													</p>
												  <?php } ?>
											</div>
											<div class="col-xs-6">
												<p><?php $var ='qa_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
											</div>											
										</div>										
									</div>
									<div class="col-xs-3">
										<div class="row bg3">
											<div class="col-xs-6 text-center">
												  <?php $var ='qa_r'.$index.'_f1'; 
												  if(in_array($index,$checks_array)){?>
													  <p class="pt7">
													  <?php echo isset($CompareRow)?$CompareRow->$var:'';?>
													  </p>
													<?php }else if(in_array($index,$check_array2)){ ?>
													<p class=" pt7 <?php echo get_yn_class($CompareRow->$var); ?>">
													<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Yes" : ($CompareRow->$var == 0 ? "No" : ""):'';
													?>
													</p>
												  <?php
												  } else { ?>
													<p class="pt7 <?php echo get_esp_class($CompareRow->$var); ?>">
													<?php echo isset($CompareRow)?$CompareRow->$var == 1 ? "Poor" : ($CompareRow->$var == 2 ? "Satisfactory" : ($CompareRow->$var == 3 ? "Excellent" : "")):'';?>
													</p>
												  <?php } ?>
												
											</div>
											<div class="col-xs-6">
												<p><?php $var ='qa_r'.$index.'_f2'; echo isset($CompareRow)?$CompareRow->$var:'';  ?></p> 
											</div>
										</div>										
									</div>									
								</div>
								<?php } ?>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
							<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
	</body>
</html>