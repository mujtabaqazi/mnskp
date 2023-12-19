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
		<title>LHS || Form</title>
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
				<div class="panel-heading text-center">Lady Health Supervisors (LHS) (To be used for two Lady Health Supervisors only)</div>
				<div class="panel-body pbody">
					<div class="alignmentview">
						<div class="rowlightbg">
							<div class="row">
								<div class="col-xs-3 mt7">
									<label>Name of the Supervisor</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3 mt7">
									<label>Designation</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>        
							</div>
							<div class="row">						
								<div class="col-xs-3 mt7">
									<label>District</label>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
								</div>
								<div class="col-xs-3 mt7">
									<label>Name of FLCF</label>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 mt7">
									<label>Name of LHS</label>
								</div>
								<div class="col-xs-3">
									<p><?php $lhsname = ""; echo isset($DataRow)?$lhsname = get_LHS_Name($DataRow->lhscode):''; ?></p>
								</div>
								<div class="col-xs-3 mt7">
									<label>Reporting month</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
								</div>	
							</div>
							<div class="row">
								<div class="col-xs-3 mt7">
									<label>Date of visit</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
								</div>              
								<div class="col-xs-3 mt7">
									<label>No. of LHWs affiliated</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="lhw_attached"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
					<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<p><?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>

					</div>
							<div class="row bc bb" style="padding-bottom: 1px;">
								<div class="col-xs-12 text-center">
									<label>Section 1: MONITORING AND SUPERVISION</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1 text-center br"><label>#</label></div>
								<div class="col-xs-7 text-center"></div>
								<div class="col-xs-2 text-center brl">
									<label>Status</label>
								</div>
								<div class="col-xs-2 text-center">
									<label>Remarks</label>
								</div>
							</div>
							<?php 
								$labels = array(
									'Attending the HQ facility daily (Signing register)',
									'Advance tour plan available at FLCF and DPIU (Yes/No)',
									'Conducted 80% tours as per tour plan (Last month)',
									'Continued Education session attended in all concerned Health Facilities',
									'Each LHW visited (at least once every month) to the attached HQ health facility',
									'Uses Supervisory Checklist Properly',
									'Weaknesses in the knowledge and skills of the LHWs are communicated to the trainers',
									'Imparting on-job training to LHWs',
									'Cross checking the LHW-MIS (LHWs performance report, known as Jaiza Karkardagi, JK)',
									'Coordination with FLCF staff',
									'Average score of LHWs supervised (JK report)',
									'Using the training checklist (if the training is going on in the FLCF)',
									'Complete and timely monthly reports submitted for last three months to',
									'FLCF',
									'DPIU',
									'Attended MMC at DPIU for last month',
									'Log book of vehicle properly maintained',
									'Salary received for last month',
									'FOL/FTA paid for last month',
									'Knowledge of LHS (Categories) (May use annex C-I, C-II)',
									'Supervision & Training',
									'IPC and Community org.',
									'Maternal health',
									'Child health',
									'Family planning',
									'Common ailment',
									'Doses of medicines',
									'First aid',
									'LHW-MIS',
									'Skills of LHS (Categories)(May use annex C-I, C-Il)',
									'Supervision & Training',
									'IPC and Community org.',
									'Maternal health',
									'Child health',
									'Family planning',
									'Common ailment +doses of medicines + First aid',
									'LHW-MIS',
								);
								$srNo = 1;
								$rownum = 1;
								for($i=1; $i<=count($labels); $i++){ ?>
									<div class="row">
										<div class="col-xs-1 text-center mt7">
											<label><?php if($i==14 || $i==15 || ($i>=21 && $i<=29) || ($i>=31 && $i<=37)){}else{echo $srNo;} ?></label>
										</div>
										<div class="col-xs-7 mt7">
											<label><?php echo $labels[$i-1]; ?></label>
										</div>
										<div class="col-xs-2 zp">
											<?php 
											if($i==13 || $i==20 || $i==30){}else{
												if($i==11){?>
													<p class="text-center"><?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
													<?php
												} else{ ?>
													<div class="row">
														<div class="col-xs-12 text-center">
															<p class="pt7"><?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
														</div>
													</div>
												<?php }
											}?>
										</div>
										<div class="col-xs-2 zp">
											<?php 
											if($i==13 || $i==20 || $i==30){}else{ ?> 
												<p><?php $var ='ms_r'.$rownum.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											<?php } ?>
										</div>
									</div><?php 
									if($i==14 || $i==15 || ($i>=21 && $i<=29) || ($i>=31 && $i<=37)){}else{$srNo++;}
									if($i==13 || $i==20 || $i==30){}else{$rownum++;}
								} 
							?>
							<div class="row bc bb" style="padding-bottom: 1px;">
								<div class="col-xs-12 text-center">
									<label>Section 2: DISCUSSION WITH LHS</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-3 text-center">
									<label>Name of the LHS</label>
								</div>
								<div class="col-xs-3 brl text-center">
									<label>Issues discussed</label>
								</div>
								<div class="col-xs-3 br text-center">
									<label>Action agreed for LHS</label>
								</div>
								<div class="col-xs-3 text-center">
									<label>Action required at FLCF/DPIU/PPIU</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3">
									<p style="height: 170px;" ><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
								<div class="col-xs-3 zp">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
									  <div class="col-xs-12">
										<p><?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									  </div>
									</div>
								</div>
								<div class="col-xs-3 zp">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 zp">
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<p><?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc bb" style="padding-bottom: 1px;">
								<div class="col-xs-12 text-center">
									<label>Critical Issues (to be followed during next visit)</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-2 br text-center">
									<label>Sr. No.</label>
								</div>
								<div class="col-xs-10 text-center">
									<label>Critical Issues</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>1</label>
								</div>
								<div class="col-xs-10 zp">
									<p><?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>2</label>
								</div>
								<div class="col-xs-10 zp">
									<p><?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>3</label>
								</div>
								<div class="col-xs-10 zp">
									<p><?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>4</label>
								</div>
								<div class="col-xs-10 zp">
									<p><?php $var ="ci_4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>5</label>
								</div>
								<div class="col-xs-10 zp">
									<p><?php $var ="ci_5"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
						</div><!--end of row rowlightbg-->
					</div><!--end of alignmentview-->
					<br>
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
					<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<?php if($DataRow->submitted_by==$userId){ ?>
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>lhw/forms/lhs_edit/<?php echo $vpvc_id; ?>">
									<i class="fa fa-pencil-square-o"></i> Update  
								</a>
							<?php } ?>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<script type="text/javascript">
			var triggerDist = "No";
		</script>
		<?php $this->load->view("templates/scripts"); ?>
			<script type="text/javascript">
	$(document).ready(function() {
		$("#compare_btn").on('click',function(e){
			window.location.href="<?php echo $basePath; ?>lhw/forms/lhs_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	});

	</script>
	</body>
</html>