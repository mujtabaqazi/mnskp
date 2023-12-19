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
										<p><?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="dov"; echo isset($CompareRow)?date("d-m-Y",strtotime($CompareRow->$var)):''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.2</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Name of reporting Officer</label>
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
												<label class="pt7">Designation</label>
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
												<label class="pt7">Total days in Office (DPIU)</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="days_in_office"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="days_in_office"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.5</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Total days in Field</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="days_in_field"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="days_in_field"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.6</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Total Health Facilities visited</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="hf_visited"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="hf_visited"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.7</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Total LHSs visited</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="lhs_visited"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="lhs_visited"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.8</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Total Health House Visited</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ="hh_visited"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php $var ="hh_visited"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
										<p><?php $var = "distcode"; echo isset($DataRow)?get_District_Name($DataRow->$var):''; ?></p>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7 pb2">2.2</label>
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
									<div class="col-sm-12  bgcolcl">
										<label>Section 2: Follow up of the previous visit &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(Should be filled from section 3 part B of the previous visit’s tour report)</label>
									</div>
								</div>
								<div class="row bc bt">
									<div class="col-sm-6 br text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
									</div>
									<div class="col-sm-6  text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
									</div>
								</div>
								<div class="row bc bt">
									<div class="col-sm-6 br text-center">
										<div class="row ">
											<div class="col-sm-4 br text-center">
												<label>Critical issues identified(not more than three)</label>
											</div>
											<div class="col-sm-2 text-center">
												<label class="pt14">Resolved (Y/N)</label>
											</div>
											<div class="col-sm-2 bl text-center zp">
												<label class="pt14 pb7">Reasons if not resolved</label>
											</div>
											<div class="col-sm-4 bl text-center">
												<label>Suggestions for intervention & mention level applicable</label>
											</div>
										</div>
									</div>
									<div class="col-sm-6  text-center">
										<div class="row ">
											<div class="col-sm-4 br text-center">
												<label>Critical issues identified(not more than three)</label>
											</div>
											<div class="col-sm-2 text-center">
												<label class="pt14">Resolved (Y/N)</label>
											</div>
											<div class="col-sm-2 bl text-center zp">
												<label class="pt14 pb7">Reasons if not resolved</label>
											</div>
											<div class="col-sm-4 bl text-center">
												<label>Suggestions for intervention & mention level applicable</label>
											</div>
										</div>
									</div>
								</div>
								
								<?php
									for($i=1;$i<=3;$i++)
									{?>
										<div class="row">
											<div class="col-xs-6 ">
												<div class="row">
													<div class="col-xs-4">
														<p><?php $var ="followup_ci_".$i; echo isset($DataRow)?$DataRow->$var:''; ?></p>
													</div>
													<div class="col-xs-2 text-center">
														<p class="pt7 <?php $var ="ci_".$i."_resolved"; echo isset($DataRow)?get_yn_class($DataRow->$var):'';?>">
														<?php  if($DataRow->$var=="1"){echo 'Yes';}else{echo 'No';} ?></p>
													</div>
													<div class="col-xs-2">
														<p><?php $var ="ci_".$i."_reason"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
													</div>
													<div class="col-xs-4">
														<p><?php $var ="ci_".$i."_suggestions"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-6 bg3">
												<div class="row">
													<div class="col-xs-4">
														<p><?php $var ="followup_ci_".$i; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
													</div>
													<div class="col-xs-2 text-center">
														<p class="pt7 <?php $var ="ci_".$i."_resolved"; echo isset($CompareRow)?get_yn_class($CompareRow->$var):'';?>">
														<?php $var ="ci_".$i."_resolved"; if($CompareRow->$var=="1"){echo 'Yes';}else{echo 'No';} ?></p>
													</div>
													<div class="col-xs-2">
														<p><?php $var ="ci_".$i."_reason"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
													</div>
													<div class="col-xs-4">
														<p><?php $var ="ci_".$i."_suggestions"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
													</div>
												</div>
											</div>
										</div>
										<?php 
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
								<div class="row ">
									<div class="col-sm-1">
										<label class="pt7"></label>
									</div>
									<div class="col-sm-11 text-center bc bt">
										<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
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
								<div class="row">
									<div class="col-sm-1">
										<label class="pt7"></label>
									</div>
									<div class="col-sm-11 text-center bc bt">
										<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-1 ">
										<label></label>
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
												echo '<div class="col-xs-4 text-center"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
											}else if($i==5 || $i==9){
												$extraClass = '';if($i==5){$extraClass = 'text-center';}
												echo '<div class="col-xs-2 '.$extraClass.'"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
											}else{
												echo '<div class="col-xs-1 text-center"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
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
							<div class="row ">
								<div class="col-sm-1">
									<label class="pt7"></label>
								</div>
								<div class="col-sm-11 text-center bc bt">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
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
							<div class="row ">
								<div class="col-sm-1">
									<label class=""></label>
								</div>
								<div class="col-sm-11 text-center bc bt">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1 ">
									<label></label>
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
											echo '<div class="col-xs-4 text-center"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
										}else if($i==5 || $i==9){
											$extraClass = '';if($i==5){$extraClass = 'text-center';}
											echo '<div class="col-xs-2 '.$extraClass.'"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
										}else{
											echo '<div class="col-xs-1 text-center"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
										}
										if($i==8)
										{
											echo '</div></div>';
										}
									}
								?>
							</div>
							<div class="row bc mt2 ">
							   <div class="col-sm-12">
								<label>(c)  Drivers</label>
							  </div>
							</div>
							<div class="row bc bt">
							   <div class="col-sm-6 text-center br">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-sm-6 text-center">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
							   <div class="col-sm-6 text-center br">
									<div class="row ">
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
								</div>
								<div class="col-sm-6 text-center">
									<div class="row ">
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
								</div>
							</div>
							<div class="row">
							   <div class="col-xs-6">
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
								</div>
								<div class="col-xs-6 bg3">
									<div class="row">
										<?php
											for($i=1;$i<=3;$i++)
											{
												$var ="drvr_r1_f".$i;
												if($i==3){
													echo '<div class="col-xs-6 "><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
												}else{
													echo '<div class="col-xs-3 text-center"><p>'.(isset($CompareRow)?$CompareRow->$var:'').'</p></div>';
												}
											}
										?>
									</div>
								</div>
							</div>
							<div class="row bc ">
							   <div class="col-sm-12">
								<label>(d)  Vehicles</label>
							  </div>
							</div>
							<div class="row bc bt">
								<div class="col-sm-6 text-center br">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-sm-6 text-center">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-sm-6 br">
									<div class="row ">
										<div class="col-sm-3 text-center">
											<label>Levels</label>
										</div>
										<div class="col-sm-3 brl text-center">
											<label>No. Received</label>
										</div>
										<div class="col-sm-3 text-center">
											<label>No. Available</label>
										</div>
										<div class="col-sm-3 bl text-center">
											<label>No. Functional</label>
										</div>
									</div>
								</div>
								<div class="col-sm-6 text-center">
									<div class="row ">
										<div class="col-sm-4 br text-center">
											<label>No. Received</label>
										</div>
										<div class="col-sm-4 text-center">
											<label>No. Available</label>
										</div>
										<div class="col-sm-4 bl text-center">
											<label>No. Functional</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								$labels = array('DPIU','Supervisors');
								for($i=1;$i<=count($labels);$i++){ ?>
									<div class="row  ">
										<div class="col-sm-6 ">
											<div class="row">
												<div class="col-xs-3 ">
													<label><?php echo $labels[$i-1]; ?></label>
												</div>
												<div class="col-xs-3 text-center">
													<p><?php $var = 'v_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
												<div class="col-xs-3 text-center">
													<p><?php $var = 'v_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
												<div class="col-xs-3 text-center">
													<p><?php $var = 'v_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
												</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-xs-4 text-center">
													<p><?php $var = 'v_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
												<div class="col-xs-4 text-center">
													<p><?php $var = 'v_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
												<div class="col-xs-4 text-center">
													<p><?php $var = 'v_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
											</div>
										</div>
									</div>
									<?php } 
							?>
							<div class="row bc mt1 mb1">
							   <div class="col-sm-12">
								<label>(e)  Output/outcome indicators</label>
							  </div>
							</div>				
							<div class="row bc">
								<div class="col-sm-7 br text-center">
									<label class="pt20 pb13">Indicators</label>
								</div>
								<div class="col-sm-3 text-center">
									<label class="pt20 pb13">Source</label>
								</div>
								<div class="col-sm-2 bl text-center">
									<div class="row">
										<div class="col-sm-12 text-center">
											<label>Value</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-sm-6 text-center br">
											<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-sm-6 text-center">
											<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<?php 
							$labels = array(
								'Contraceptive Prevalence Rate',
								'Total number of deliveries',
								'Total number of pregnant women seen at the facility that month (check for double counting)',
								'Number of pregnant women who received TT',
								'Number of pregnant women given iron tablets',
								'Number of post natal visits made',
								'Number of post natal cases visited 24 hours after deliveries.',
								'EPI Coverage (fully immunized)',
								'Number of of ARI cases under 5 seen per LHW/month',
								'Number of diarrhea cases under 5 seen per LHW/month',
								'Average District Performance (score)'
								);
							$labels1 = array(
							'MIS Chart',
							'DMR',
							'MIS Chart',
							'MIS Chart',
							'DMR',
							'DMR',
							'DMR',
							'MIS Charts/Jaiza Karkardagi JK',
							'DMR',
							'DMR',
							'LHS Performance Report/JK'
							);
							for($i=1;$i<=count($labels1);$i++){ ?>
							<div class="row">
								<div class="col-xs-7">
									<label class=""><?php echo $labels[$i-1];  ?></label>
								</div>
								<div class="col-xs-3">
									<label class=""><?php echo $labels1[$i-1];  ?></label>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var ="oi_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center bg3">
									<p><?php $var ="oi_r".$i."_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>	
							<?php } ?>
							
							<div class="row bc bb">
							   <div class="col-sm-12">
								<label>(f)  Major strengths of the Program found in the present visit:</label>
							  </div>
							</div>
							<div class="row">
								<div class="col-sm-2  text-center">
									<label></label>
								</div>
								<div class="col-sm-5 br bc text-center">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-sm-5 bc text-center">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php for ($i=1;$i<=4;$i++) { ?>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label><?php echo $i; ?></label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var = 'ms_'.$i.''; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var = 'ms_'.$i.''; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<?php } ?>
							<div class="row bc">
							   <div class="col-sm-12">
								<label>Section 2: Issues Identified</label>
							  </div>
							</div>
							<div class="row bc bt">
								<div class="col-sm-6 br text-center">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-sm-6 text-center">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-sm-6 text-center br ">
									<div class="row bc">
										<div class="col-sm-5  text-center zp">
											<label class="pt10 pb10">Issues identified in the present visit(not more than seven )</label>
										</div>
										<div class="col-sm-2 brl text-center zp">
											<label class="pt10 pb10">Level applicable</label>
										</div>
										<div class="col-sm-2  text-center zp">
											<label class="pt10 pb10">Action taken by Supervisor</label>
										</div>
										<div class="col-sm-3 bl text-center zp">
											<label>Action required at DPIU/PPIU(if required)</label>
										</div>
									</div>
								</div>
								<div class="col-sm-6 text-center ">
									<div class="row bc">
										<div class="col-sm-5 br text-center zp">
											<label class="pt10 pb10">Issues identified in the present visit(not more than seven )</label>
										</div>
										<div class="col-sm-2 br text-center zp">
											<label class="pt10 pb10">Level applicable</label>
										</div>
										<div class="col-sm-2  text-center zp">
											<label class="pt10 pb10">Action taken by Supervisor</label>
										</div>
										<div class="col-sm-3 bl text-center zp">
											<label>Action required at DPIU/PPIU(if required)</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
								for($i=1;$i<=7;$i++){ ?>
									<div class="row ">
										<div class="col-sm-6">
											<div class="row">
												<div class="col-xs-5">
													<p><?php $var ="id_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
												<div class="col-xs-2">
													<p><?php $var ="id_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
												<div class="col-xs-2">
													<p><?php $var ="id_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
												<div class="col-xs-3">
														<p><?php $var ="id_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											  </div>
											</div>
										</div>
										<div class="col-sm-6 bg3">
											<div class="row">
												<div class="col-xs-5">
													<p><?php $var ="id_r".$i."_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
												<div class="col-xs-2">
													<p><?php $var ="id_r".$i."_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
												<div class="col-xs-2">
													<p><?php $var ="id_r".$i."_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
												</div>
												<div class="col-xs-3">
													<p><?php $var ="id_r".$i."_f4"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
											  </div>
											</div>
										</div>
									</div>
									<?php
								}
							?>
							<div class="row bc bb">
							   <div class="col-sm-12">
								<label>Section 3: Critical Issues to be followed on next visit (pick three most important from the issues identified in section2)</label>
							  </div>
							</div>
							<div class="row">
								<div class="col-sm-2">
									<label></label>
								</div>
								<div class="col-sm-5 bc text-center br">
									<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-sm-5 bc text-center ">
									<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php for($i=1;$i<4;$i++) { ?>
							<div class="row">
								<div class="col-xs-2  text-center">
									<label><?php echo $i; ?></label>
								</div>
								<div class="col-xs-5 ">
									<p><?php $var = 'ci_'.$i.''; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var = 'ci_'.$i.''; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<?php } ?>							
						</div> <!--end of rowlightbg-->
						</div> <!--end of alignmentview-->
							<br>
							<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
								<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
									<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
								</div>
							</div>
					</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>