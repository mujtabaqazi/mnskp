<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>DTR || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">District Tour Report</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."lhw/dtr/save";
					$action .= isset($DataRow)?'/'.$id:'';
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart($action,$attributes); ?>        
					<div class="rowlightbg"> 
					<div class="row pb1">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label>Part A</label>
          				</div>
        			</div>
        			<div class="row bc mb1">
           				<div class="col-xs-12">
            				<label>Section 1: Identification</label>
          				</div>
        			</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 pt7">
							<label>Name of reporting Officer</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
						</div>
						<div class="col-xs-3 pt7">
							<label>Designation</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 pt7">
							<label>District</label>
						</div>
						<div class="col-xs-2">
							<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->distcode:''; ?>" >
							<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
						</div>
						<div class="col-xs-3 pt7">
							<label>Province</label>
						</div>
						<div class="col-xs-2">
							<input class="form-control text-center" readonly="readonly" placeholder="Khyber Pakhtunkhwa" type="text" >
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 pt7">
							<label>Reporting month</label>
						</div>
						<div class="col-xs-2">
							<input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->fmonth:''; ?>" readonly="readonly" >
						</div>
						<div class="col-xs-3 pt7">
							<label>Total days in Office (DPIU)</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="days_in_office"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 pt7">
							<label>Total days in Field</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="days_in_field"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						</div>
						<div class="col-xs-3 pt7">
							<label>Total Health Facilities visited</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="hf_visited"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 pt7">
							<label>Total LHSs visited</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="lhs_visited"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						</div>
						<div class="col-xs-3 pt7">
							<label>Total Health House Visited</label>
						</div>
						<div class="col-xs-2">
							<input value="<?php $var ="hh_visited"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						</div>
					</div>
					<div class="row">
							<div class="col-xs-5 col-xs-offset-1">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-5">
								<input class="form-control" id="remarks" name="remarks" type="text" value="<?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?>" >
							</div>

					</div>
					<div class="row pt1 pb1">
           				<div class="col-xs-12 cmargin27 bgcolcl">
            				<label>Section 2: Follow up of the previous visit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Should be filled from section 3 part B of the previous visit’s tour report)</label>
          				</div>
        			</div>
					<div class="row bc">
						<div class="col-xs-4 br text-center">
							<label>Critical issues identified(not more than three)</label>
						</div>
						<div class="col-xs-2 text-center">
							<label>Resolved (Y/N)</label>
						</div>
						<div class="col-xs-2 bl text-center">
							<label>Reasons if not resolved</label>
						</div>
						<div class="col-xs-4 bl text-center">
							<label>Suggestions for intervention & mention level applicable</label>
						</div>
					</div>
					<?php
						for($i=1;$i<=3;$i++)
						{?>
							<div class="row">
								<div class="col-xs-4 zp">
									<input value="<?php $var ="followup_ci_".$i; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
								<div class="col-xs-2 zp">
									<select <?php $var ="ci_".$i."_resolved"; ?> name="<?php echo $var; ?>" class="form-control text-center">
										<option <?php if($DataRow->$var=="0"){echo 'selected="selected"';} ?> value="0">No</option>
										<option <?php if($DataRow->$var=="1"){echo 'selected="selected"';} ?> value="1">Yes</option>										
									</select>
								</div>
								<div class="col-xs-2 zp">
									<input value="<?php $var ="ci_".$i."_reason"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
								<div class="col-xs-4 zp">
									<input value="<?php $var ="ci_".$i."_suggestions"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
							</div><?php 
						}
					?>
					 
					<div class="row">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label>Part B OBSERVATIONS OF THE CURRENT VISIT</label>
          				</div>
        			</div>
					<div class="row bc mt1 mb1">
						<div class="col-xs-12">
							<label>Section 1: (a) Status of LHW's</label>
						</div>
					</div>
					<div class="row bc">
						<div class="col-xs-1">
							<label class="pt15 pb31">Program</label>
						</div>
						<div class="col-xs-1 brl">
							<label class="pt15 pb31">Allocated</label>
						</div>
						<div class="col-xs-1">
							<label class="pt15 pb31">Recruited</label>
						</div>
						<div class="col-xs-1 brl">
							<label class="pt15 pb31">Dropouts</label>
						</div>
						<div class="col-xs-1 br">
							<label class="pt15 pb31">Terminated</label>
						</div>
						<div class="col-xs-2">
							<div class="row bb">
								<div class="col-xs-12 text-center">
									<label>Presently working</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<label>(after 3 months Training)</label>
								</div>
							</div>
						</div>
						<div class="col-xs-3 brl">
							<div class="row bb">
								<div class="col-xs-12 text-center">
									<label>Training Status</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<label>Under 3 months</label>
								</div>
								<div class="col-xs-4 brl">
									<label>Under 12 months</label>
								</div>
								<div class="col-xs-4">
									<label>Completed</label>
								</div>
							</div>
						</div>
						<div class="col-xs-2 text-center">
							<label class="pt15 pb31">Remarks</label>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-1 pt7">
							<label>NP</label>
						</div>
						<?php
							for($i=1;$i<=9;$i++)
							{
								$var ="lhw_r1_f".$i;
								if($i==6)
								{
									echo '<div class="col-xs-3"><div class="row">';
								}
								if($i>=6 && $i<=8)
								{
									echo '<div class="col-xs-4 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control numberclass noDots" type="text"></div>';
								}else if($i==5 || $i==9){
									echo '<div class="col-xs-2 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control '.(($i!=9)?"numberclass noDots":"").'" type="text"></div>';
								}else{
									echo '<div class="col-xs-1 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control numberclass noDots" type="text"></div>';
								}
								if($i==8)
								{
									echo '</div></div>';
								}
							}
						?>
					</div>
				<div class="row bc mt2 mb1">
				   <div class="col-xs-12">
					<label>(b) Lady Health Supervisors</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-xs-1">
					<label class="pt15 pb31">Program</label>
				  </div>
				  <div class="col-xs-1 brl">
					<label class="pt15 pb31">Allocated</label>
				  </div>
				  <div class="col-xs-1">
					<label class="pt15 pb31">Recruited</label>
				  </div>
				  <div class="col-xs-1 brl">
					<label class="pt15 pb31">Dropouts</label>
				  </div>
				  <div class="col-xs-1 br">
					<label class="pt15 pb31">Terminated</label>
				  </div>
				  <div class="col-xs-2">
					<div class="row bb">
					  <div class="col-xs-12 text-center">
						<label>Presently working</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12">
						<label>(after 3 months Training)</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 brl">
					<div class="row bb">
					  <div class="col-xs-12 text-center">
						<label>Training Status (Phase)</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-4">
						<label>Under 3 months</label>
					  </div>
					  <div class="col-xs-4 brl">
						<label>Under 9 months</label>
					  </div>
					  <div class="col-xs-4">
						<label>Completed</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-2 text-center">
					<label class="pt15 pb31">Remarks</label>
				  </div>
				</div>
				<div class="row">
					<div class="col-xs-1 pt7">
						<label>NP</label>
					</div>
					<?php
						for($i=1;$i<=9;$i++)
						{
							$var ="lhs_r1_f".$i;
							if($i==6)
							{
								echo '<div class="col-xs-3"><div class="row">';
							}
							if($i>=6 && $i<=8)
							{
								echo '<div class="col-xs-4 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control numberclass noDots" type="text"></div>';
							}else if($i==5 || $i==9){
								echo '<div class="col-xs-2 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control '.(($i!=9)?"numberclass noDots":"").'" type="text"></div>';
							}else{
								echo '<div class="col-xs-1 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control numberclass noDots" type="text"></div>';
							}
							if($i==8)
							{
								echo '</div></div>';
							}
						}
					?>
				</div>
				<div class="row bc mt2 mb1">
				   <div class="col-xs-12">
					<label>(c)  Drivers</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-xs-3 text-center">
					<label>Required</label>
				  </div>
				  <div class="col-xs-3 brl text-center">
					<label>Working</label>
				  </div>
				  <div class="col-xs-6 text-center">
					<label>Remarks</label>
				  </div>
				</div>
				<div class="row">
					<?php
						for($i=1;$i<=3;$i++)
						{
							$var ="drvr_r1_f".$i;
							if($i==3){
								echo '<div class="col-xs-6 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control" type="text"></div>';
							}else{
								echo '<div class="col-xs-3 zp"><input value="'.(isset($DataRow)?$DataRow->$var:'').'" name="'.$var.'" class="form-control numberclass noDots" type="text"></div>';
							}
						}
					?>
				</div>
				<div class="row bc mt2 mb1">
				   <div class="col-xs-12">
					<label>(d)  Vehicles</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-xs-3 text-center">
					<label>Levels</label>
				  </div>
				  <div class="col-xs-2 brl text-center">
					<label>No. Received</label>
				  </div>
				  <div class="col-xs-2 text-center">
					<label>No. Available</label>
				  </div>
				  <div class="col-xs-2 brl text-center">
					<label>No. Functional</label>
				  </div>
				  <div class="col-xs-3 text-center">
					<label>Remarks</label>
				  </div>
				</div>
				<?php 
					$labels = array('DPIU','Supervisors');
					for($i=1;$i<=count($labels);$i++){ ?>
						<div class="row">
						  <div class="col-xs-3 pt7">
							<label><?php echo $labels[$i-1]; ?></label>
						  </div>
						  <div class="col-xs-2 zp">
							<input class="form-control numberclass noDots" value="<?php $var = 'v_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
						  </div>
						  <div class="col-xs-2 zp">
							<input class="form-control numberclass noDots" value="<?php $var = 'v_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
						  </div>
						  <div class="col-xs-2 zp">
							<input class="form-control numberclass noDots" value="<?php $var = 'v_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
						  </div>
						  <div class="col-xs-3 zp">
							<input class="form-control" value="<?php $var = 'v_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
						  </div>
						</div><?php 
					} 
				?>
				<div class="row bc mt1 mb1">
				   <div class="col-xs-12">
					<label>(e)  Output/outcome indicators</label>
				  </div>
				</div>				
				<div class="row bc">
				  	<div class="col-xs-8 br text-center">
					 	<label>Indicators</label>
					</div>
				  <div class="col-xs-3 text-center">
					<label>Source</label>
				  </div>
				  <div class="col-xs-1 bl text-center">
					<label>Value</label>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Contraceptive Prevalence Rate</label>
					</div>
					<div class="col-xs-3">
						<label class="mt7">MIS Chart</label>
					</div>
				  	<div class="col-xs-1 zp">
						<input value="<?php $var ="oi_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass" type="text">
					</div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Total number of deliveries</label>
					</div>
					<div class="col-xs-3">
						<label class="mt7">DMR</label>
					</div>
				  	<div class="col-xs-1 zp">
						<input value="<?php $var ="oi_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Total number of pregnant women seen at the facility that month (check for double counting)</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">MIS Chart</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Number of pregnant women who received TT</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">MIS Chart</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Number of pregnant women given iron tablets</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Number of post natal visits made</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r6_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Number of post natal cases visited 24 hours after deliveries.</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r7_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">EPI Coverage (fully immunized)</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">MIS Charts/Jaiza Karkardagi JK</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r8_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Number of of ARI cases under 5 seen per LHW/month</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r9_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Number of diarrhea cases under 5 seen per LHW/month</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r10_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="mt7">Average District Performance (score)</label>
					</div>
				  <div class="col-xs-3">
					 <label class="mt7">LHS Performance Report/JK</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r11_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				</div>

				<!-- <div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt7 text-center">
						<label>3.</label>
					  </div>
					  <div class="col-xs-11 pt7">
						<label>Percentage of delivery cases visited by LHW during delivery or within 24 hours after delivery in last month
						</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 pt7">
					 <label>DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt7 text-center">
						<label>4.</label>
					  </div>
					  <div class="col-xs-11 pt7">
						<label>Percentage of pregnant ladies completed TT</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 pt7">
					 <label>J.K.</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt7 text-center">
						<label>5.</label>
					  </div>
					  <div class="col-xs-11 pt7">
						<label>Percentage of pregnant women given Iron tablets</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 pt7">
					 <label>DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r6_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt7 text-center">
						<label>6.</label>
					  </div>
					  <div class="col-xs-11 pt7">
						<label>EPI Coverage (Fully immunized)</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 pt7">
					 <label>J.K.</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r7_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt25 text-center">
						<label>7.</label>
					  </div>
					  <div class="col-xs-11 pt25">
						<label>No. of ARI cases under 5 seen per LHW/month</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3">
					<div class="row">
					  <div class="col-xs-12 pt7">
						<label>DMR</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 pt8">
						<label>J.K.</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-1 zp">
					<div class="row">
					  <div class="col-xs-12">
						<input value="<?php $var ="oi_r8_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12">
						<input value="<?php $var ="oi_r9_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt25 text-center">
						<label>8.</label>
					  </div>
					  <div class="col-xs-11 pt25">
						<label>No. of diarrhea cases under 5 seen per LHW/month</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3">
					<div class="row">
					  <div class="col-xs-12 pt7">
						<label>DMR</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12 pt8">
						<label>J.K.</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-1 zp">
					<div class="row">
					  <div class="col-xs-12">
						<input value="<?php $var ="oi_r10_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12">
						<input value="<?php $var ="oi_r11_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt7 text-center">
						<label>9.</label>
					  </div>
					  <div class="col-xs-11 pt7">
						<label>Average District Performance Score</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 pt7">
					 <label>J.K.</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r12_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-8">
					<div class="row">
					  <div class="col-xs-1 zp pt7 text-center">
						<label>10.</label>
					  </div>
					  <div class="col-xs-11 pt7">
						<label>Maternal Mortality Verification status from last DMR</label>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3 pt7">
					 <label>DMR</label>
				  </div>
				  <div class="col-xs-1 zp">
					<input value="<?php $var ="oi_r13_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div> -->
				<div class="row bc mt1 mb1">
				   <div class="col-xs-12">
					<label>(f)  Major strengths of the Program found in the present visit:</label>
				  </div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>1</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ms_1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>2</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ms_2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>3</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ms_3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>4</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ms_4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<div class="row bc mt1 mb1">
				   <div class="col-xs-12">
					<label>Section 2: Issues Identified</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-xs-5 text-center">
					<label>Issues identified in the present visit(not more than seven )</label>
				  </div>
				  <div class="col-xs-2 brl text-center">
					<label>Level applicable</label>
				  </div>
				  <div class="col-xs-2 zp text-center">
					<label>Action taken by Supervisor</label>
				  </div>
				  <div class="col-xs-3 bl text-center zp">
					<label>Action required at DPIU/PPIU(if required)</label>
				  </div>
				</div>
				<?php 
					for($i=1;$i<=7;$i++){ ?>
						<div class="row">
						  <div class="col-xs-5 zp">
							<input value="<?php $var ="id_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						  </div>
						  <div class="col-xs-2 zp">
							<input value="<?php $var ="id_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						  </div>
						  <div class="col-xs-2 zp">
							<input value="<?php $var ="id_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						  </div>
						  <div class="col-xs-3 zp">
							<input value="<?php $var ="id_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						  </div>
						</div><?php
					}
				?>
				<div class="row bc mt1 mb1">
				   <div class="col-xs-12">
					<label>Section 3: Critical Issues to be followed on next visit (pick three most important from the issues identified in section2)</label>
				  </div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>1</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>2</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 cmargin27 text-center">
						<label>3</label>
					</div>
					<div class="col-xs-10 zp">
						<input class="form-control" value="<?php $var = 'ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="" type="text">
					</div>
				</div>
				<hr>
				<div class="row">
				  <div class="col-xs-2 col-xs-offset-1 pt7">
					<label>DPIU District:</label>
				  </div>
				  <div class="col-xs-2">
					<input type="hidden" name="dpiu" id="dpiu" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->distcode:''; ?>" >
					<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
				  </div>
				  <div class="col-xs-2 col-xs-offset-1 pt7">
					<label>PPIU Province:</label>
				  </div>
				  <div class="col-xs-2">
					<input class="form-control text-center" readonly="readonly" placeholder="Khyber Pakhtunkhwa" type="text" >
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-2 col-xs-offset-1 pt7">
					<label>Copy to:</label>
				  </div>
				  <div class="col-xs-2">
					<input value="<?php $var ="copy_to"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				  <div class="col-xs-2 col-xs-offset-1 pt7">
					<label>Date:</label>
				  </div>
				  <div class="col-xs-2">
					<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" class="dp1 form-control" type="text">
				  </div>
				</div>
			</div> <!--end of rowlightbg-->
				<br>
				<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">					 
					<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
						<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
							<i class="fa fa-file"></i> Save Form  
						</button>
						<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
							<i class="fa fa-floppy-o"></i> Submit Form  
						</button>
						<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<?php $this->load->view("templates/chklsts_scripts"); ?>
	</body>
</html>