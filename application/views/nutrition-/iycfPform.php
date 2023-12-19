<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Infant Young Child Feeding (IYCF) Checklist of Health Facility || Form</title>
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
					Infant Young Child Feeding (IYCF) Checklist of Health Facility
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."nutrition/iycf/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$vpvcDataRow->fmonth);
					echo form_open_multipart($action,$attributes,$hidden); ?>
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Name</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Designation</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >			
								<label class="pt7 pb2"><?php  echo (isset($vpvcDataRow))?get_Facility_District_Name($vpvcDataRow->facode):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
								<!-- <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label> -->
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="fatype" id="fatype" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Fatype_Name($vpvcDataRow->fatype):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Province</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Taluka</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="tcode" id="tcode" value="<?php echo isset($vpvcDataRow)?get_Facility_Tehsil_Name($vpvcDataRow->facode):''; ?>" required="required" class="form-control"  readonly="readonly" >               			
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($vpvcDataRow->facode)):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">UC</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="uncode" id="uncode" value="<?php echo isset($vpvcDataRow)?get_Facility_UC_Name($vpvcDataRow->facode):''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_UC_Name(get_Facility_UC_Name($vpvcDataRow->facode)):''; ?></label> 
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Village</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " id="village" name="village" type="text" placeholder=""  />
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control "  id="" name="moniter_name" value="<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " required id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
							<div class="col-xs-6">
								<label class="pt7 pb2">Outpatient Therapeutic Program
									(OTP)/Supplementary Feeding Program (SFP) site</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " required id="" name="sfp_site" value="<?php $var="sfp_site"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-8 text-center">
								<label class="pt36">Behavior</label>
							</div>
							<div class="col-xs-2 brl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Grading Score</label>
									</div>
								</div>
								<div class="row btb">
									<div class="col-xs-12">
										<label>1 = Poor</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>2 = Satisfactory</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-12">
										<label>3 = Excellent</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt36">Remarks</label>
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
							<div class="col-xs-8">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<div class="col-xs-2 zp">
								<div class="row">
									<div class="col-xs-4 text-right">
										<label>1</label>&nbsp;
										<input name="<?php $var ='bhv_r'.$index.'_f1'; echo $var; ?>"<?php echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-4  text-center">
										<label>2</label>&nbsp;
										<input name="<?php $var ='bhv_r'.$index.'_f1'; echo $var; ?>"<?php echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):'';?> value="2" class="mt9" type="radio">
									</div>
									<div class="col-xs-4">
										<label>3</label>&nbsp;
										<input name="<?php $var ='bhv_r'.$index.'_f1'; echo $var; ?>"<?php echo isset($DataRow)?(($DataRow->$var=="3")?'checked="checked"':''):'';?> value="3" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='bhv_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
						<div class="row bc">
							<div class="col-xs-12">
								<label>Quality of advise</label>
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-4 bc">
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
							"14",
							"15",
							"16",
							"17"
						);
						for($index=1;$index<=count($labels);$index++){ ?>
						<div class="row">
							<?php if($index==1 || $index==2 || ($index>=8 && $index<=13) || ($index>=18 && $index<=20)){ ?>
							<div class="col-xs-8">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<?php }else{ ?>
							<div class="col-xs-7 col-xs-offset-1">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<?php } ?>
							<div class="col-xs-2 zp">
								<?php if ($index==12 || $index==13 || $index==19 || $index==18 || $index==20){?>
								<input class="form-control numberclass noDots"  value="<?php $var ='qa_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text" placeholder="Number">
								<?php } else {?>
								<div class="row">
									<div class="col-xs-<?php echo (in_array($index,$checks_array))?"6":"4"; ?> text-right">
										<label><?php echo (in_array($index,$checks_array) )?"Yes":"1"; ?></label>&nbsp;
										
										<input name="<?php $var ='qa_r'.$index.'_f1'; echo $var; ?>"<?php echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-<?php echo (in_array($index,$checks_array) )?"6":"4"; ?>  text-center">
										<label><?php echo (in_array($index,$checks_array))?"No":"2"; ?></label>&nbsp;
										<input name="<?php $var ='qa_r'.$index.'_f1'; echo $var; ?>"<?php echo isset($DataRow)?(($DataRow->$var=="2" || $DataRow->$var=="0")?'checked="checked"':''):'';?> value="<?php echo ($index ==14 ||$index ==15 ||$index ==16 ||$index ==17 )?"0":"2"; ?>" class="mt9" type="radio">
									</div>
									<?php if (in_array($index,$checks_array) ) {}else{?>
									<div class="col-xs-4">
										<label>3</label>&nbsp;
										<input name="<?php $var ='qa_r'.$index.'_f1'; echo $var; ?>"<?php echo isset($DataRow)?(($DataRow->$var=="3" || $DataRow->$var=="3")?'checked="checked"':''):'';?> value="3" class="mt9" type="radio">
									</div>
									<?php } ?>
								</div>
								<?php }?>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='qa_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>							
					</div><!--end of div rowlightbg-->
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
	</body>
</html>
