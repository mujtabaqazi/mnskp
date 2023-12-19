<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$userId = $this -> session -> id;
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
				<div class="panel-heading text-center">District Tour Report</div>
				<div class="panel-body pbody">
					<div class="alignmentview">
					<div class="rowlightbg"> 
					<div class="row pb1">
           				<div class="col-sm-12  bgcolcl text-center">
            				<label>Part A</label>
          				</div>
        			</div>
        			<div class="row bc mb1">
           				<div class="col-sm-12">
            				<label>Section 1: Identification</label>
          				</div>
        			</div>
					<div class="row">
						<div class="col-sm-3 col-xs-offset-1 ">
							<label>Name of reporting Officer</label>
						</div>
						<div class="col-sm-2">
							<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
						<div class="col-sm-3 ">
							<label>Designation</label>
						</div>
						<div class="col-sm-2">
							<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 ">
							<label>District</label>
						</div>
						<div class="col-xs-2">
							<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
						</div>
						<div class="col-xs-3 ">
							<label>Province</label>
						</div>
						<div class="col-xs-2">
							<p>Khyber Pakhtunkhwa</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 ">
							<label>Reporting month</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
						</div>
						<div class="col-xs-3 ">
							<label>Total days in Office (DPIU)</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="days_in_office"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 ">
							<label>Total days in Field</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="days_in_field"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
						<div class="col-xs-3 ">
							<label>Total Health Facilities visited</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="hf_visited"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-3 col-xs-offset-1 ">
							<label>Total LHSs visited</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="lhs_visited"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
						<div class="col-xs-3 ">
							<label>Total Health House Visited</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="hh_visited"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
							<div class="col-xs-5 col-xs-offset-1">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned):</label>
							</div>
							<div class="col-xs-5">
								<p><?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>

					</div>
					<div class="row pt1 pb1">
           				<div class="col-sm-12  bgcolcl">
            				<label>Section 2: Follow up of the previous visit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Should be filled from section 3 part B of the previous visit’s tour report)</label>
          				</div>
        			</div>
					<div class="row bc">
						<div class="col-sm-4 br text-center">
							<label>Critical issues identified(not more than three)</label>
						</div>
						<div class="col-sm-2 text-center">
							<label>Resolved (Y/N)</label>
						</div>
						<div class="col-sm-2 bl text-center">
							<label>Reasons if not resolved</label>
						</div>
						<div class="col-sm-4 bl text-center">
							<label>Suggestions for intervention & mention level applicable</label>
						</div>
					</div>
					<?php
						for($i=1;$i<=3;$i++)
						{?>
							<div class="row">
								<div class="col-xs-4 ">
									<p><?php $var ="followup_ci_".$i; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 text-center">
									<p><?php $var ="ci_".$i."_resolved"; if($DataRow->$var=="1"){echo 'Yes';}else{echo 'No';} ?></p>
								</div>
								<div class="col-xs-2 ">
									<p><?php $var ="ci_".$i."_reason"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-4 ">
									<p><?php $var ="ci_".$i."_suggestions"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div><?php 
						}
					?>
					 
					<div class="row">
           				<div class="col-sm-12  bgcolcl text-center">
            				<label>Part B OBSERVATIONS OF THE CURRENT VISIT</label>
          				</div>
        			</div>
					<div class="row bc mt1 mb1">
						<div class="col-sm-12">
							<label>Section 1: (a) Status of LHW's</label>
						</div>
					</div>
					<div class="row bc">
						<div class="col-sm-1">
							<label class="pt15 pb31">Program</label>
						</div>
						<div class="col-sm-1 brl">
							<label class="pt15 pb31">Allocated</label>
						</div>
						<div class="col-sm-1">
							<label class="pt15 pb31">Recruited</label>
						</div>
						<div class="col-sm-1 brl">
							<label class="pt15 pb31">Dropouts</label>
						</div>
						<div class="col-sm-1 br">
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
						<div class="col-xs-1 ">
							<label>NP</label>
						</div>
						<?php
							for($i=1;$i<=9;$i++)
							{
								$var ="lhw_r1_f".$i;
								if($i==6)
								{
									echo '<div class="col-xs-3 text-center"><div class="row pt7">';
								}
								if($i>=6 && $i<=8)
								{
									echo '<div class="col-xs-4 text-center"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
								}else if($i==5 || $i==9){
									$extraClass = '';if($i==5){$extraClass = 'text-center';}
									echo '<div class="col-xs-2 '.$extraClass.'"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
								}else{
									echo '<div class="col-xs-1 text-center"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
								}
								if($i==8)
								{
									echo '</div></div>';
								}
							}
						?>
					</div>
				<div class="row bc mt2 mb1">
				   <div class="col-sm-12">
					<label>(b) Lady Health Supervisors</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-sm-1">
					<label class="pt15 pb31">Program</label>
				  </div>
				  <div class="col-sm-1 brl">
					<label class="pt15 pb31">Allocated</label>
				  </div>
				  <div class="col-sm-1">
					<label class="pt15 pb31">Recruited</label>
				  </div>
				  <div class="col-sm-1 brl">
					<label class="pt15 pb31">Dropouts</label>
				  </div>
				  <div class="col-sm-1 br">
					<label class="pt15 pb31">Terminated</label>
				  </div>
				  <div class="col-sm-2">
					<div class="row bb">
					  <div class="col-sm-12 text-center">
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
					<div class="col-xs-1 ">
						<label>NP</label>
					</div>
					<?php
						for($i=1;$i<=9;$i++)
						{
							$var ="lhs_r1_f".$i;
							if($i==6)
							{
								echo '<div class="col-xs-3 text-center"><div class="row pt7">';
							}
							if($i>=6 && $i<=8)
							{
								echo '<div class="col-xs-4 text-center"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
							}else if($i==5 || $i==9){
								$extraClass = '';if($i==5){$extraClass = 'text-center';}
								echo '<div class="col-xs-2 '.$extraClass.'"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
							}else{
								echo '<div class="col-xs-1 text-center"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
							}
							if($i==8)
							{
								echo '</div></div>';
							}
						}
					?>
				</div>
				<div class="row bc mt2 mb1">
				   <div class="col-sm-12">
					<label>(c)  Drivers</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-sm-3 text-center">
					<label>Required</label>
				  </div>
				  <div class="col-sm-3 brl text-center">
					<label>Working</label>
				  </div>
				  <div class="col-sm-6 text-center">
					<label>Remarks</label>
				  </div>
				</div>
				<div class="row">
					<?php
						for($i=1;$i<=3;$i++)
						{
							$var ="drvr_r1_f".$i;
							if($i==3){
								echo '<div class="col-xs-6 "><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
							}else{
								echo '<div class="col-xs-3 text-center"><p>'.(isset($DataRow)?$DataRow->$var:'').'</p></div>';
							}
						}
					?>
				</div>
				<div class="row bc mt2 mb1">
				   <div class="col-sm-12">
					<label>(d)  Vehicles</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-sm-3 text-center">
					<label>Levels</label>
				  </div>
				  <div class="col-sm-2 brl text-center">
					<label>No. Received</label>
				  </div>
				  <div class="col-sm-2 text-center">
					<label>No. Available</label>
				  </div>
				  <div class="col-sm-2 brl text-center">
					<label>No. Functional</label>
				  </div>
				  <div class="col-sm-3 text-center">
					<label>Remarks</label>
				  </div>
				</div>
				<?php 
					$labels = array('DPIU','Supervisors');
					for($i=1;$i<=count($labels);$i++){ ?>
						<div class="row">
						  <div class="col-xs-3 ">
							<label><?php echo $labels[$i-1]; ?></label>
						  </div>
						  <div class="col-xs-2 text-center">
							<p><?php $var = 'v_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 text-center">
							<p><?php $var = 'v_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 text-center">
							<p><?php $var = 'v_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-3 ">
							<p><?php $var = 'v_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						</div><?php 
					} 
				?>
				<div class="row bc mt1 mb1">
				   <div class="col-sm-12">
					<label>(e)  Output/outcome indicators</label>
				  </div>
				</div>				
				<div class="row bc">
				  	<div class="col-sm-8 br text-center">
					 	<label>Indicators</label>
					</div>
				  <div class="col-sm-3 text-center">
					<label>Source</label>
				  </div>
				  <div class="col-sm-1 bl text-center">
					<label>Value</label>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Contraceptive Prevalence Rate</label>
					</div>
					<div class="col-xs-3">
						<label class="">MIS Chart</label>
					</div>
				  	<div class="col-xs-1 text-center">
						<p><?php $var ="oi_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Total number of deliveries</label>
					</div>
					<div class="col-xs-3">
						<label class="">DMR</label>
					</div>
				  	<div class="col-xs-1 text-center">
						<p><?php $var ="oi_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Total number of pregnant women seen at the facility that month (check for double counting)</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">MIS Chart</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Number of pregnant women who received TT</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">MIS Chart</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Number of pregnant women given iron tablets</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">DMR</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Number of post natal visits made</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">DMR</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r6_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Number of post natal cases visited 24 hours after deliveries.</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">DMR</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r7_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">EPI Coverage (fully immunized)</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">MIS Charts/Jaiza Karkardagi JK</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r8_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Number of of ARI cases under 5 seen per LHW/month</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">DMR</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r9_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Number of diarrhea cases under 5 seen per LHW/month</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">DMR</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r10_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row">
				  	<div class="col-xs-8">
						<label class="">Average District Performance (score)</label>
					</div>
				  <div class="col-xs-3">
					 <label class="">LHS Performance Report/JK</label>
				  </div>
				  <div class="col-xs-1 text-center">
					<p><?php $var ="oi_r11_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				</div>
				<div class="row bc mt1 mb1">
				   <div class="col-sm-12">
					<label>(f)  Major strengths of the Program found in the present visit:</label>
				  </div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>1</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ms_1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>2</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ms_2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>3</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ms_3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>4</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ms_4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row bc mt1 mb1">
				   <div class="col-sm-12">
					<label>Section 2: Issues Identified</label>
				  </div>
				</div>
				<div class="row bc">
				  <div class="col-sm-5 text-center">
					<label>Issues identified in the present visit(not more than seven )</label>
				  </div>
				  <div class="col-sm-2 brl text-center">
					<label>Level applicable</label>
				  </div>
				  <div class="col-sm-2  text-center zp">
					<label>Action taken by Supervisor</label>
				  </div>
				  <div class="col-sm-3 bl text-center zp">
					<label>Action required at DPIU/PPIU(if required)</label>
				  </div>
				</div>
				<?php 
					for($i=1;$i<=7;$i++){ ?>
						<div class="row">
						  <div class="col-xs-5 ">
							<p><?php $var ="id_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 ">
							<p><?php $var ="id_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 ">
							<p><?php $var ="id_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-3 ">
							<p><?php $var ="id_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						</div><?php
					}
				?>
				<div class="row bc mt1 mb1">
				   <div class="col-sm-12">
					<label>Section 3: Critical Issues to be followed on next visit (pick three most important from the issues identified in section2)</label>
				  </div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>1</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>2</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2  text-center">
						<label>3</label>
					</div>
					<div class="col-xs-10 ">
						<p><?php $var = 'ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
				<hr>
				<div class="row">
				  <div class="col-xs-2 col-xs-offset-1 ">
					<label>DPIU District:</label>
				  </div>
				  <div class="col-xs-2">
					<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
				  </div>
				  <div class="col-xs-2 col-xs-offset-1 ">
					<label>PPIU Province:</label>
				  </div>
				  <div class="col-xs-2">
					<p>Khyber Pakhtunkhwa</p>
				  </div>
				</div>
				<div class="row">
				  <div class="col-xs-2 col-xs-offset-1 ">
					<label>Copy to:</label>
				  </div>
				  <div class="col-xs-2">
					<p><?php $var ="copy_to"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				  <div class="col-xs-2 col-xs-offset-1 ">
					<label>Date:</label>
				  </div>
				  <div class="col-xs-2">
					<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
				  </div>
				</div>
			</div> <!--end of rowlightbg-->
			</div> <!--end of alignmentview-->
				<br>
				<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
					<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
						<?php if($DataRow->submitted_by==$userId){ ?>
							<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>lhw/forms/dtr_edit/<?php echo $vpvc_id; ?>">
								<i class="fa fa-pencil-square-o"></i> Update  
							</a>
						<?php } ?>
						<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
					</div>
				</div>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#compare_btn").on('click',function(e){
			window.location.href="<?php echo $basePath; ?>lhw/forms/dtr_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	});

	</script>
	</body>
</html>