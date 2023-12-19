<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
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
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Lady Health Supervisors (LHS) (To be used for two Lady Health Supervisors only)</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."lhw/lhs/save";
					$action .= isset($DataRow)?'/'.$id:'';
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart($action,$attributes); ?>       
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-3 mt7">
								<label>Name of the Supervisor</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
							</div>
							<div class="col-xs-3 mt7">
								<label>Designation</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
							</div>        
						</div>
						<div class="row">						
							<div class="col-xs-3 mt7">
								<label>District</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
							<div class="col-xs-3 mt7">
								<label>Name of FLCF</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 mt7">
								<label>Name of LHS</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $lhsname = ""; echo isset($DataRow)?$lhsname = get_LHS_Name($DataRow->lhscode):''; ?></label>
							</div>
							<div class="col-xs-3 mt7">
								<label>Reporting month</label>
							</div>
							<div class="col-xs-3">
								<input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->fmonth:''; ?>" readonly="readonly" >
							</div>	
						</div>
						<div class="row">
							<div class="col-xs-3 mt7">
								<label>Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" class="form-control dp1">
							</div>              
							<div class="col-xs-3 mt7">
								<label>No. of LHWs affiliated</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="lhw_attached"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text" class="form-control numberclass noDots">
							</div>
						</div>
					<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<input class="form-control" id="remarks" name="remarks" type="text" value="<?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?>" >
							</div>

					</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
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
												<input value="<?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" placeholder="Number">
												<?php
											} else{ ?>
												<div class="row">
													<div class="col-xs-6 text-right">
														<label>Yes</label>&nbsp;
														<input <?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
													</div>
													<div class="col-xs-6">
														<label>No</label>&nbsp;
														<input <?php $var ='ms_r'.$rownum.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
													</div>
												</div>
											<?php }
										}?>
									</div>
									<div class="col-xs-2 zp">
										<?php 
										if($i==13 || $i==20 || $i==30){}else{ ?> 
											<input value="<?php $var ='ms_r'.$rownum.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
										<?php } ?>
									</div>
								</div><?php 
								if($i==14 || $i==15 || ($i>=21 && $i<=29) || ($i>=31 && $i<=37)){}else{$srNo++;}
								if($i==13 || $i==20 || $i==30){}else{$rownum++;}
							} 
						?>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
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
							<div class="col-xs-3 zp">
								<input readonly="true" value="<?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?>" style="height: 170px;" class="form-control" type="text">
							</div>
							<div class="col-xs-3 zp">
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="1" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="2" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="3" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="4" type="text">
									</div>
								</div>
								<div class="row">
								  <div class="col-xs-12">
									<input value="<?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="5" type="text">
								  </div>
								</div>
							</div>
							<div class="col-xs-3 zp">
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
							</div>
							<div class="col-xs-3 zp">
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<input value="<?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
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
								<input value="<?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>2</label>
							</div>
							<div class="col-xs-10 zp">
								<input value="<?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>3</label>
							</div>
							<div class="col-xs-10 zp">
								<input value="<?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>4</label>
							</div>
							<div class="col-xs-10 zp">
								<input value="<?php $var ="ci_4"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>5</label>
							</div>
							<div class="col-xs-10 zp">
								<input value="<?php $var ="ci_5"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
							</div>
						</div>
					</div><!--end of row rowlightbg-->
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
		<script type="text/javascript">
			var triggerDist = "No";
		</script>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
	</body>
</html>