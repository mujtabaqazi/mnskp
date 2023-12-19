<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Malaria - Supervisory Checklist Indoor Residual Spray (IRS) Operations || Form</title>
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
					Malaria - Supervisory Checklist Indoor Residual Spray (IRS) Operations
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."mcp/irs/save";
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
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
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
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
								<!-- <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label> -->
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
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >			
								<label class="pt7 pb2"><?php  echo (isset($vpvcDataRow))?get_Facility_District_Name($vpvcDataRow->facode):''; ?></label>
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
						
						<?php
						$labeles=array(
							"B.	Observation during visit",
							"1.	Is district Indoor Residual Spray (IRS) micro-plan available with DHO?",		
							"2.	Is target population identified in taluka/UCs/health facilities/village?",		
							"3.	Is IRS user guide available at DHO/EDO office?",		
							"4.	Is supervisor/team leader present during spraying?	",	
							"5.	Have spray persons been trained before spraying in this cycle?",		
							"C.	Storage facility from spray viewpoint",	
							"6.	Is the storage facility situated away from domestic dwellings?",		
							"7.	Is the store tidy and well arranged?",		
							"8.	Is there a well-stocked first aid kit?",		
							"9.	Is the ledger book updated?",		
							"D.	Soak pit and washing facilities",	
							"10.	Is the mixing of IRS chemical done away from community water supplies?",		
							"11.	Are there sufficient washing facilities/showers for the operators?",		
							"12.	Is there adequate soap for washing?",		
							"E.	Household preparation",	
							"13.	Are the household members informed about vacating houses?",		
							"14.	How much time are household members given to vacate houses",	
							"15.	Are the householders instructed on what to do during and after the spraying in their houses?",		
							"16.	Are household items, including water, food, cooking utensils removed from the House before spray?",		
							"17.	Is heavy furniture moved to the center of the rooms and covered to allow easy access for spraying the walls?",		
							"18.	Are domestic animals and pets kept away from the house at the time of spray?",		
							"F.	Workers’ safety	",
							"19.	Are all spray men, team leaders, malaria supervisors wearing appropriate PPE?",		
							"20.	Is the PPE in good condition?	",	
							"21.	Ask if the spray men/operators are comfortable of if they have any other comments about the protective clothing?	",	
							"G.	Mixing Insecticides	",
							"22.	Is the water filled up to the 10 liter mark on the spray pump?	",	
							"23.	Is the insecticide sachet opened and contents poured/dropped in to the tankwith no spilling and empty packaging is placed back in the haversack	",	
							"24.	Has the spray men/operator done some agitation to dissolve the insecticide?",
							"25.	Is the pump then pressurized to 55 psi and checked for leaks and re-shaken to mix?",
							"26.	Are spray men/operators carrying the pumps correctly (pump held under the arm and the gauge in front?	",	
							"H.	Applying insecticide	",
							"27.	Are the spray men/operators using the correct nozzle tip for the insecticide?",		
							"28.	Does  the  spray  operator  apply  vertical  swaths,  80  cm  wide,  with  a  5  cm overlap, and with the tip of the nozzle 45 cm from the wall?",		
							"29.	Are they applying right speed of 5 seconds per 2 vertical meters?",		
							"30.	Are they regularly shaking the pumps and checking the pressure gauges to ensure the pressure stays between 55 and 35 psi?",		
							"31.	Is there any run off insecticide dripping from the walls?	",	
							"32.	Are there any signs of leakage from any part on the spray pumps?",
							"I.	Spray men’s/operator’s conduct (ask Focal Person or supervisor)	",
							"33.	Are spray men/operators smoking while spraying?",
							"34.	Are spray men/operators eating while spraying?",
							"35.	Are spray men/operators carrying any food or cigarette?",
							"36.	Are they polite to community?",
							"37.	Do they look neat and presentable?",
							"38.	Are they able to explain instructions to household members?",
							"39.	Are they able to respond to the IRS FAQs?",
							"40.	Do the spray men/operators carry out mobilization?",
							"41.	Are houses correctly marked after spraying?",
							"J.	Daily post-spray operations	",
							"42.	Upon returning from the field, are spray pumps depressurized and left over insecticides in spray pumps poured into “Barrel # 1?”",
							"43.	Are  all  unused  and  empty  insecticides  sachets  surrendered  by  the  spray men/operators and recorded by the team leaders/malaria supervisors?	",	
							"44.	Is all PPE and equipment handed over to the team leader/malaria supervisor?	",
							"45.	At the end of day do all spray men/operators take a bath before leaving for their homes?",		
							"46.	Any other comments regarding IRS? If yes, please mention."
						);
						$i=1;
						for ($index=1;$index<=count($labeles);$index++){
							if ($index==1 || $index==7||$index==12|| $index==16||$index==23|| $index==27||$index==33|| $index==40||$index==50){
						?>
						<div class="row bc mt15 mb1">
							<div class="col-xs-10">
								<label><?php echo $labeles[$index-1]; ?></label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Yes / No</label>
							</div>
						</div>
							<?php } else{?>
						<div class="row">
							<div class="col-xs-10">
								<label class="pt7 pb2"><?php echo $labeles[$index-1]; ?></label>
							</div>
							<div class="col-xs-2 zp">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='bi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='bi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<?php $i++;} }?>
						<div class="row bc">
							<div class="col-xs-12">
								<label>K.	In Door Residual Spraying (IRS) Database</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-5 text-left">
								<label> Sr. No </label>
							</div>
							<div class="col-xs-1 brl text-center">
								<label>1</label>
							</div>
							<div class="col-xs-1  text-center">
								<label>2</label>
							</div>
							<div class="col-xs-1 brl text-center">
								<label>3</label>
							</div>
							<div class="col-xs-1  text-center">
								<label>4</label>
							</div>
							<div class="col-xs-1 brl text-center">
								<label>5</label>
							</div>
							<div class="col-xs-1  text-center">
								<label>6</label>
							</div>
							<div class="col-xs-1 bl text-center">
								<label>7</label>
							</div>
						</div>
						<?php
						$labels=array(
							"Name of FLCL",
							"UC",
							"District",
							"Name of households",
							"Contact number",
							"Total Rooms",
							"Sprayed",
							"Un-sprayed",
							"No. of Child< 5",
							"No. PL",
							"Total no. of family members",
							"Refused",
							"Insecticides Used"
						);
						for($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-5">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control <?php echo ($i > 4)?"numberclass noDots":""; ?>" value="<?php $var ='drs_r'.$i.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
					</div><!--end of div rowlightbg-->
					<br>
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