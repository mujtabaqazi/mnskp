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
  <title>LHW || Form</title>
  <?php $this->load->view("templates/styles"); ?>
</head>
<body>
  <!--start of header-->
  <?php $this->load->view("templates/header"); ?>
  <?php $this->load->view("templates/menu"); ?>
  <!--End of header-->
  <!--End of header-->
<div class="container">
   <div class="panel panel-primary">
		<div class="panel-heading text-center">Health House & Lady Health Worker</div>
			<div class="panel-body pbody">
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
										<label class="pt7">Name of the Supervisor</label>
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
										<label class="pt7">Registered Population</label>
									</div>
								</div>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ="population"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-4 text-center bg3">
								<p><?php $var ="population"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
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
										<label class="pt7 pb2">Name of LHW</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php $lhwname = ""; echo isset($DataRow)?$lhwname = get_LHW_Name($DataRow->lhwcode):''; ?></p>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.2</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Years of Service</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?$DataRow->service_years:'1'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">2.3</label>
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
										<label class="pt7 pb2">2.4</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Health Facility to which attached</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1 text-center br"><label class="pt14 pb12">#</label></div>
							<div class="col-xs-5 text-center"></div>
							<div class="col-xs-3 text-center brl">
								<div class="row">
									<div class="col-xs-12">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-4 br">
										<label>Status</label>
									</div>
									<div class="col-xs-8">
										<label>Remarks</label>
									</div>
								</div>
							</div>
							<div class="col-sm-3 text-center">
								<div class="row">
									<div class="col-xs-12">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-4 br">
										<label>Status</label>
									</div>
									<div class="col-xs-8">
										<label>Remarks</label>
									</div>
								</div>
							</div>
						</div>
					<?php 
						$labels = array(
							'Fulfills Selection Criteria (If not, specify reason)',
							'Health House established as per given guidelines',
							'Satisfactory knowledge of LHW (Use annex C-I)',
							'Satisfactory skills of LHW (Use annex C-I)',
							'Stipend received for the last month',
							'Supplies such as medicines and contraceptives are available (If not, for how long?)',
							'Correct maintenance of LHW-MIS instruments',
							'Daily entries made in monthly report',
							'Last monthly report submitted',
							'Referrals being entertained by FLCF (Check no. from record)',
							'Diary available and maintained correctly',
							'Health Committee constituted/functional (Comment on contribution of HC)',
							'Women Group constituted/functional (Comment on contribution of WG)',
							'Properly uses Counseling cards for IPC',
							'Regular visits by the vaccinator',
							'Date of next visit of LHS known',
							'Visits by anyone else during last one year',
							'EPI coverage (From LHW diary)',
							'% of modern contraceptive users (From LHW diary)',
							'% of deliveries conducted by SBAs during last six months.',
							'% of delivery cases visited by LHW during delivery or within 24 hours after delivery in last month.(From LHW diary and checklist of newborn)',
							'Involved in administering routine EPI vaccines.',
							'Involved in TB-DOTS'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1 text-center">
									<label><?php echo $i; ?></label>
								</div>
								<div class="col-xs-5">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								
								<div class="col-xs-3 ">
									<div class="row">
										<div class="col-xs-4">
												<?php if($i==19 || $i == 20 || $i == 21){?>
												<p class="pt7 text-center ">
													<?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>
												</p>
													<?php
												} else{ ?>
												<p class="pt7 text-center <?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'bgreen':'bred'):'';?>">
													<?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
												</p>
												<?php } ?>
										</div>
										<div class="col-xs-8">
											<p class="pt7">
												<?php $var ='sr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 bg3">
									<div class="row">										
										<div class="col-xs-4">											
											<?php if($i==19 || $i == 20 || $i == 21){?>
											<p class="pt7 text-center ">
												<?php $var ='sr_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
												<?php
											} else{ ?>
											<p class="pt7 text-center <?php $var ='sr_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'bgreen':'bred'):'';?>">
												<?php $var ='sr_r'.$i.'_f1'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
											<?php } ?>											
										</div>
										<div class="col-xs-8">
											<p class="pt7">
												<?php $var ='sr_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								
							</div><?php 
						} 
					?>
					<div class="row" style="padding-bottom: 1px;">
					   <div class="col-sm-12 cmargin27 bgcolcl text-center">
						<label>Discussion with LHWs</label>
					  </div>
					</div>
					<div class="row bc">
					  <div class="col-sm-3 text-center">
						<label>Name of LHW</label>
					  </div>
					  <div class="col-sm-3 brl text-center">
						<label>Issues discussed</label>
					  </div>
					  <div class="col-sm-3 br text-center">
						<label>Action for FLCF/Supervisor</label>
					  </div>
					  <div class="col-sm-3 text-center">
						<label>Action for FPO/DPIU/PPIU</label>
					  </div>
					</div>
					<div class="row ">
						<div class="col-sm-3"> </div>
						<div class="col-sm-9 bc bt text-center">
							<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 text-center">
						<p><?php echo $lhwname; ?></p>
					  </div>
					  <div class="col-xs-3 ">
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
					  <div class="col-xs-3 ">
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
					  <div class="col-xs-3 ">
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
					<div class="row ">
						<div class="col-sm-3"> </div>
						<div class="col-sm-9 bc text-center">
							<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 text-center">
						<p><?php //echo $lhwname; ?></p>
					  </div>
					  <div class="col-xs-3 ">
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r1_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r2_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r3_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r4_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r5_f1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
					  </div>
					  <div class="col-xs-3 ">
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r1_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r2_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r3_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r4_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r5_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
					  </div>
					  <div class="col-xs-3 ">
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r1_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r2_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r3_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r4_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<p><?php $var ="dis_r5_f3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
						  </div>
						</div>
					  </div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
					   <div class="col-sm-12 cmargin27 bgcolcl text-center">
						<label>Critical issues identified to be followed by LHS</label>
					  </div>
					</div>
					<div class="row bc">
					  <div class="col-sm-2  text-center">
						<label>Sr. No.</label>
					  </div>
					  <div class="col-sm-10 bl text-center">
						<div class="row">
							<div class ="col-sm-12 bb text-center">
								<label>Critical Issues</label>
							</div>
						</div>
						<div class="row">
							<div class ="col-sm-6 text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class ="col-sm-6 bl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
							</div>
						</div>
					  </div>
					</div>
					 <div class="row">
					  <div class="col-xs-2  text-center">
						<label>1</label>
					  </div>
					  <div class="col-xs-5 ">
						<p><?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <div class="col-xs-5 bg3">
						<p><?php $var ="ci_1"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2  text-center">
						<label>2</label>
					  </div>
					  <div class="col-xs-5 ">
						<p><?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <div class="col-xs-5 bg3">
						<p><?php $var ="ci_2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2   text-center">
						<label>3</label>
					  </div>
					  <div class="col-xs-5 ">
						<p><?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <div class="col-xs-5 bg3">
						<p><?php $var ="ci_3"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
					  </div>
					</div>
				  </div><!--end of rowlightbg--> 
				  </div><!--end of alignmentview--> 
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