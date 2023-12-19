<?php 

$basePath = base_url();

$assetsPath = base_url()."assets/";

?>

<!doctype html>

<html>

	<head>

	  <meta charset="utf-8">

	  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	  <title>HCPM || Form</title>

	  <?php $this->load->view("templates/styles"); ?>

	</head>

	<body>

		<!--start of header-->

		<?php $this->load->view("templates/header"); ?>

		<?php $this->load->view("templates/menu"); ?>

		<!--End of header-->

		<div class="container">
   			<div class="panel panel-primary">
					<div class="panel-heading text-center">Visit Report/ Checklist of Monitoring Officers</div>
						<div class="panel-body">
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
										<label class="pt7"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 text-center">
										<label class="pt7"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-2">
												<label class="pt7">1.1</label>
											</div>
											<div class="col-xs-10">
												<label class="pt7">Visiting date/month/year:</label>
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
												<label class="pt7">Reporting officer:</label>
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
												<label class="pt7">Date of sentinel site started</label>
											</div>
										</div>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->date_sentinel))):''; ?></p>
									</div>
									<div class="col-xs-4 text-center bg3">
										<p><?php  echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->date_sentinel))):''; ?></p>
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
												<label class="pt7 pb2">Name of the institution:</label>
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
												<label class="pt7 pb2">Province</label>
											</div>
										</div>
									</div>
									<div class="col-xs-3">
										<p>Khyber Pakhtunkhwa</p>
									</div>
								</div>
								<div class="row">
							        <div class="col-sm-12 bgcolcl text-center">
							            <label></label>
							        </div>
						        </div>								
							
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label></label>
									</div>
									<div class="col-xs-3 bc mt1 text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-3 bc bl mt1 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>1-Monthly sentinel site report submitted by medical officer</label>
									</div>
								</div>								
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Regular/Irregular</label>
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php $var ='regular'; echo get_rir_class($DataRow->$var); ?>">
												<?php $var ='regular'; echo isset($DataRow)?(($DataRow->$var=="0")?'Regular':''):'';echo isset($DataRow)?(($DataRow->$var=="1")?'Irregular':''):''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-3 bg3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php $var ='regular'; echo get_rir_class($CompareRow->$var); ?>">
												<?php $var ='regular'; echo isset($CompareRow)?(($CompareRow->$var=="0")?'Regular':''):'';echo isset($CompareRow)?(($CompareRow->$var=="1")?'Irregular':''):''; ?></p>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Timely Submitted</label>
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php $var ='timely_subm'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='timely_subm'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-3 bg3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php echo get_yn_class($CompareRow->$var);?>">
												<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Name of Focal Person:</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->focal_person_name:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->focal_person_name:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Name of M.O of Sentinel Site:</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->name_mo_ss:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->name_mo_ss:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>2-  Staff position at sentinel site:</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>M.O</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->stt_posstion_mo:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->stt_posstion_mo:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Staff Nurse</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->stt_posstion_sn:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->stt_posstion_sn:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Data Processor</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->stt_posstion_dp:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->stt_posstion_dp:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Attendant</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->stt_posstion_att:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->stt_posstion_att:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 pt7 text-right">
										<label>Lab Technician</label>
									</div>
									<div class="col-xs-3">
										<p class="pt7"> <?php echo isset($DataRow)?$DataRow->stt_posstion_lt:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p class="pt7"> <?php echo isset($CompareRow)?$CompareRow->stt_posstion_lt:''; ?></p>
									</div>
								</div>
								<div class="row mt5">
									<div class="col-xs-6 pt7">
										<label>3- Regularity of staff (Give details in case any absent staff):</label>
									</div>
									<div class="col-xs-3">
										<p> <?php echo isset($DataRow)?$DataRow->regularity_stt:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p> <?php echo isset($CompareRow)?$CompareRow->regularity_stt:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4 pt7 text-right">
										<label></label>
									</div>
									<div class="col-xs-4 bc mt1 text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-4 bc bl mt1 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label>4- Patients register maintained properly:</label>
									</div>
									<div class="col-xs-4">
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var ='patient_yes'; echo get_yn_class($DataRow->$var); ?>">
											<?php $var ='patient_yes'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?></p>
										</div>
										<?php if($DataRow->$var=="1"){ ?>
										<div class="col-xs-4 pt7">
											<p> <?php echo isset($DataRow)?$DataRow->patient_reg_yes:''; ?></p>
										</div>
										<?php } else { ?>
										<div class="col-xs-4 pt7">
											&nbsp;&nbsp;<?php echo isset($DataRow)?(($DataRow->patient_reg_no=="0")?'Over work':''):'';echo isset($DataRow)?(($DataRow->patient_reg_no=="1")?'Lack of training':''):'';echo isset($DataRow)?(($DataRow->patient_reg_no=="2")?'Other':''):''; ?>
										</div>
										<div class="col-xs-2 pt7">
											<p><?php echo isset($DataRow)?$DataRow->patient_reg_no_other:''; ?></p>
										</div> 
									  <?php }?>
									</div>
									<div class="col-xs-4 bg3">
										<div class="col-xs-3 text-center">
											<p class="pt7 <?php $var ='patient_yes'; echo get_yn_class($CompareRow->$var); ?>">
											<?php $var ='patient_yes'; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No:'):''; ?></p>
										</div>
										<?php if($CompareRow->$var=="1"){ ?>
										<div class="col-xs-4 pt7">
											<p> <?php echo isset($CompareRow)?$CompareRow->patient_reg_yes:''; ?></p>
										</div>
										<?php } else { ?>
										<div class="col-xs-4 pt7">
											&nbsp;&nbsp;<?php echo isset($CompareRow)?(($CompareRow->patient_reg_no=="0")?'Over work':''):'';echo isset($CompareRow)?(($CompareRow->patient_reg_no=="1")?'Lack of training':''):'';echo isset($CompareRow)?(($CompareRow->patient_reg_no=="2")?'Other':''):''; ?>
										</div>
										<div class="col-xs-2 pt7">
											<p><?php echo isset($CompareRow)?$CompareRow->patient_reg_no_other:''; ?></p>
										</div> 
									  <?php }?>
									</div>
								</div>								
								<div class="row ">
									<div class="col-xs-4">
										<label>5- Vaccination register maintained properly:</label>
									</div>
									<div class="col-xs-4 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php $var ='vacc_register'; echo get_yn_class($DataRow->$var); ?>">
												<?php $var ='vacc_register'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4 bg3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php echo get_yn_class($CompareRow->$var); ?>">
												<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-4">
										<label>6- Stock register maintained properly:</label>
									</div>
									<div class="col-xs-1 text-center">
										<p class="pt7 <?php $var ='stk_register'; echo get_yn_class($DataRow->$var); ?>">
										<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?></p>
									</div>
									<div class="col-xs-2">
										<label>If no, please mention last entry date</label>
									</div>
									<div class="col-xs-1">
										<p><?php $var ='stk_register_no'; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>										
									</div>
									<div class="col-xs-1 text-center bg3">
										<p class="pt7 <?php $var ='stk_register'; echo get_yn_class($CompareRow->$var); ?>">
										<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<label>If no, please mention last entry date</label>
									</div>
									<div class="col-xs-1 bg3">
										<p><?php $var ='stk_register_no'; echo (isset($CompareRow) && $CompareRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>									
									</div>
								</div>								
								<div class="row ">
									<div class="col-xs-4">
										<label>7- Average number of patients attending hepatitis clinic daily (Monthly OPD/30 days):</label>
									</div>
									<div class="col-xs-4 text-center">
										<p><?php $var ='avg_patient_monthly'; echo isset($DataRow)?$DataRow->avg_patient_monthly:''; ?></p>
									</div>
									<div class="col-xs-4 bg3 text-center">
										<p><?php $var ='avg_patient_monthly'; echo isset($CompareRow)?$CompareRow->avg_patient_monthly:''; ?></p>
									</div>
								</div>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl">
										<label>8- Status of patients attended at hepatitis clinic since program started:</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-6 text-center">
									</div>
									<div class="col-xs-1 brl text-center zp">
										<label>HEPATITIS (C)</label>
									</div>
									<div class="col-xs-1 text-center zp">
										<label>HEPATITIS (B)</label>
									</div>
									<div class="col-xs-1 bl text-center zp">
										<label>HEPATITIS (D)</label>
									</div>
									<div class="col-xs-1 brl text-center zp">
										<label>HEPATITIS (C)</label>
									</div>
									<div class="col-xs-1 text-center zp">
										<label>HEPATITIS (B)</label>
									</div>
									<div class="col-xs-1 bl text-center zp">
										<label>HEPATITIS (D)</label>
									</div>
								</div>
								<div class="row mt1">
									<div class="col-xs-6 text-center">
									</div>
									<div class="col-xs-3 bc bl text-center ">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
									</div>
									<div class="col-xs-3 bc bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
									</div>
								</div>
								<?php 
								$labels = array(
									'Total number of Patients attended Hepatitis OPD',
									'Total patients registered at sentinel site',
									'Number of patients receiving treatment (under treatment)',
									'Number of patients completed treatment',
									'Number of patients defaulter',
									'Number of patients non-responder'
								);
								for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row">
									<div class="col-xs-6 pt7">
										<label><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='sp_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='sp_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='sp_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3 text-center">
										<p><?php $var ='sp_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3 text-center">
										<p><?php $var ='sp_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3 text-center">
										<p><?php $var ='sp_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
                
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl">
										<label>9-Status of screening of persons/registered patients of Hepatitis (B, C, D) in last month :( Mention month)</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-3 text-center"></div>
									<div class="col-xs-3 brl text-center">
										<label>HEPATITIS (C)</label>
									</div>
									<div class="col-xs-3 text-center">
										<label>HEPATITIS (B)</label>
									</div>
									<div class="col-xs-3 bl text-center">
										<label>HEPATITIS (D)</label>
									</div>
								</div>
								<div class="row mt1 bc" style="padding-bottom: 1px;">
									<div class="col-xs-12  text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
									</div>
								</div>
								<div class="row">
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 text-right">
										<label>Total patients screened registered  / positive at sentinel site in last month</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->tot_patient:''; ?></p>
									   </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7 text-right">
										<label>Month</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_last_month:''; ?></p>
									  </div>
									</div>
								  </div>
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Screened on ICT+ Elisa</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_elisa_c:''; ?></p>
									   </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ICT:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_postive_ict_c:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ELISA:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_postive_elisa_c:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on PCR:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_positvie_pcr_c:''; ?></p>
									  </div>
									</div>
								  </div>
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Screened on ICT+ Elisa</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_elisa_b:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ICT:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_postive_ict_b:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ELISA:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_postive_elisa_b:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on PCR:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_positvie_pcr_b:''; ?></p>
									   </div>
									</div>
								  </div>
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Screened on ICT+ Elisa</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_elisa_d:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ICT:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_postive_ict_d:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ELISA:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_postive_elisa_d:''; ?></p>
									   </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on PCR:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($DataRow)?$DataRow->sc_positvie_pcr_d:''; ?></p>
									   </div>
									</div>
								  </div>
								</div>
								
								<?php 
								$labels = array(
									'No. of patients receiving treatment',
									'No. of patients completed treatment',
									'No. of patients defaulter',
									'No. of patients non responder'
								);

								for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row">
									<div class="col-xs-3 pt7">
										<label><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-3 zp">
										<p><?php $var ='sc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 zp">
										<p><?php $var ='sc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 zp">
										<p><?php $var ='sc_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row mt1 bc" style="padding-bottom: 1px;">
									<div class="col-xs-12  text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
									</div>
								</div>
								<div class="row">
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 text-right">
										<label>Total patients screened registered  / positive at sentinel site in last month</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->tot_patient:''; ?></p>
									   </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7 text-right">
										<label>Month</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_last_month:''; ?></p>
									  </div>
									</div>
								  </div>
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Screened on ICT+ Elisa</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_elisa_c:''; ?></p>
									   </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ICT:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_postive_ict_c:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ELISA:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_postive_elisa_c:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on PCR:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_positvie_pcr_c:''; ?></p>
									  </div>
									</div>
								  </div>
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Screened on ICT+ Elisa</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_elisa_b:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ICT:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_postive_ict_b:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ELISA:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_postive_elisa_b:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on PCR:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_positvie_pcr_b:''; ?></p>
									   </div>
									</div>
								  </div>
								  <div class="col-xs-3">
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Screened on ICT+ Elisa</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_elisa_d:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ICT:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_postive_ict_d:''; ?></p>
									  </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on ELISA:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_postive_elisa_d:''; ?></p>
									   </div>
									</div>
									<div class="row">
									  <div class="col-xs-8 pt7">
										<label>Positive on PCR:</label>
									  </div>
									  <div class="col-xs-4 zp">
										<p> <?php echo isset($CompareRow)?$CompareRow->sc_positvie_pcr_d:''; ?></p>
									   </div>
									</div>
								  </div>
								</div>
								<?php 
								$labels = array(
									'No. of patients receiving treatment',
									'No. of patients completed treatment',
									'No. of patients defaulter',
									'No. of patients non responder'
								);

								for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row">
									<div class="col-xs-3 pt7">
										<label><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-3 zp">
										<p><?php $var ='sc_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 zp">
										<p><?php $var ='sc_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 zp">
										<p><?php $var ='sc_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<br>
								<div class="row bc">
						        	<div class="col-xs-6">
						          		<label></label>
						        	</div>
									<div class="col-xs-3 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
									<div class="col-xs-3 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
						      	</div>
								<div class="row ">
									<div class="col-xs-6">
										<label>10- Any additional comments:</label>
									</div>
									<div class="col-xs-3">
										<p><?php  echo isset($DataRow)?$DataRow->any_add_comments:''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p><?php echo isset($CompareRow)?$CompareRow->any_add_comments:''; ?></p>
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-6">
										<label>11-Status of record keeping:</label>
									</div>
									<div class="col-xs-3">
										<p><?php $var ='status_record'; echo isset($DataRow)?(($DataRow->$var=="0")?'Good':''):''; echo isset($DataRow)?(($DataRow->$var=="1")?'Satisfactory':''):''; echo isset($DataRow)?(($DataRow->$var=="2")?'Not satisfactory':''):''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p><?php $var ='status_record'; echo isset($CompareRow)?(($CompareRow->$var=="0")?'Good':''):''; echo isset($CompareRow)?(($CompareRow->$var=="1")?'Satisfactory':''):''; echo isset($CompareRow)?(($CompareRow->$var=="2")?'Not satisfactory':''):''; ?></p>
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-6">
										<label>12-Storage and supply of medicines:</label>
									</div>
									<div class="col-xs-3">
										<p><?php $var ='ss_medcines'; echo isset($DataRow)?(($DataRow->$var=="0")?'Through sentinel site staff':'Through main store of hospital/EDOH store'):''; ?></p>
									</div>
									<div class="col-xs-3 bg3">
										<p><?php $var ='ss_medcines'; echo isset($CompareRow)?(($CompareRow->$var=="0")?'Through sentinel site staff':'Through main store of hospital/EDOH store'):''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<label>13-Status of cold chain:</label>
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-5 col-xs-offset-1">
										<label>Proper temperature (+2_+8)</label>
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php echo get_yn_class($DataRow->scc_proper_tem);?>">
												<?php echo isset($DataRow)?(($DataRow->scc_proper_tem=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>	
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php echo get_yn_class($CompareRow->scc_proper_tem);?>">
												<?php echo isset($CompareRow)?(($CompareRow->scc_proper_tem=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>	
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-5 col-xs-offset-1">
										<label>Thermometer available</label>
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php echo get_yn_class($DataRow->scc_proper_thermo);?>">
												<?php echo isset($DataRow)?(($DataRow->scc_proper_thermo=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>	
									</div>
									<div class="col-xs-3 text-center">
										<div class="row">
											<div class="col-xs-3"></div>
											<div class="col-xs-6">
												<p class="pt7 <?php echo get_yn_class($CompareRow->scc_proper_thermo);?>">
												<?php echo isset($CompareRow)?(($CompareRow->scc_proper_thermo=="1")?'Yes':'No'):''; ?></p>
											</div>
										</div>	
									</div>
								</div>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl">
										<label>14-Hepatitis-B vaccination (last month):</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<div class="row bc">
											<div class="col-xs-4 text-center">
											</div>
											<div class="col-xs-2 brl text-center">
												<label>No. of people screened</label>
											</div>
											<div class="col-xs-2 text-center">
												<label>No. of people vaccinated</label>
											</div>
											<div class="col-xs-2 brl text-center">
												<label class="pt24 pb16">HCV +ve</label>
											</div>
											<div class="col-xs-2 br text-center">
												<label class="pt24 pb16">HBV +ve</label>
											</div>
										</div>
									</div>
									<div class="col-xs-6">
										<div class="row bc">
											<div class="col-xs-4 text-center">
											</div>
											<div class="col-xs-2 brl text-center">
												<label>No. of people screened</label>
											</div>
											<div class="col-xs-2 text-center">
												<label>No. of people vaccinated</label>
											</div>
											<div class="col-xs-2 brl text-center">
												<label class="pt24 pb16">HCV +ve</label>
											</div>
											<div class="col-xs-2 text-center">
												<label class="pt24 pb16">HBV +ve</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-xs-6 text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
									</div>
									<div class="col-xs-6 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
									</div>
								</div>
								<?php 
								$labels = array(
								'Vaccination at sentinel site',
								'Vaccination at EDO (H)',
								'Vaccination in camps (high prevalence areas)',
								'input',
								'input',
								'input',
								'input',
								'input',
								'input',
								'input',
								'input',
								'input',
								'input',
								'Vaccination in jails ( Since the program started)',
								'input',
								'input'
								);
								$index=1;
								for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row">
									<div class="col-xs-6">
										<div class="row">
										  <div class="col-xs-4 mt7"><?php if($labels[$i-1]!="input") { ?>
											
											<label><?php echo $labels[$i-1];?></label>
										  
											 <?php }else{
												$var ='hepb_vacc_r'.$index.'_name'; 
												echo '<p>'.(isset($DataRow)?$DataRow->$var:"").'</p>';
											 }?>
										  </div>
										  <?php if($i==3 || $i==14){}else{ ?>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										  </div>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										  </div>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										  </div>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										  </div>
										  <?php } ?>
										</div>
									</div>
									<div class="col-xs-6 bg3">
										<div class="row">
										  <div class="col-xs-4 mt7"><?php if($labels[$i-1]!="input") { ?>
											
											<label><?php echo $labels[$i-1];?></label>
										  
											 <?php }else{
												$var ='hepb_vacc_r'.$index.'_name'; 
												echo '<p>'.(isset($CompareRow)?$CompareRow->$var:"").'</p>';
											 }?>
										  </div>
										  <?php if($i==3 || $i==14){}else{ ?>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										  </div>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										  </div>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										  </div>
										  <div class="col-xs-2 text-center">
											<p><?php $var ='hepb_vacc_r'.$index.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										  </div>
										  <?php $index++;} ?>
										</div>
									</div>
								</div>
								<?php } ?>
								<br>
								<div class="row bc mt1 mb1">
									<div class="col-sm-6 bgw" style="min-height:25px;">								 
									</div>
									<div class="col-sm-3 brl text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>									
									</div>
									<div class="col-sm-3 b text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>									
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-5 col-xs-offset-1">
										<label>15-Any other social mobilization activity:</label>
									</div>
									<div class="col-xs-3">
										<p> <?php echo isset($DataRow)?$DataRow->social_mob_activity:''; ?> </p>
									</div>
									<div class="col-xs-3 bg3">
										<p> <?php echo isset($CompareRow)?$CompareRow->social_mob_activity:''; ?> </p>
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-5 col-xs-offset-1">
										<label>16-No. of Immunoglobulin used during last month:</label>
									</div>
									<div class="col-xs-3">
										<p> <?php echo isset($DataRow)?$DataRow->no_immuno:''; ?> </p>
									</div>
									<div class="col-xs-3 bg3">
										<p> <?php echo isset($CompareRow)?$CompareRow->no_immuno:''; ?> </p>
									</div>
								</div>
								<div class="row ">
									<div class="col-xs-5 col-xs-offset-1">
										<label>17-Laboratory services provided at sentinel site (Please tick):</label>
									</div>
									<div class="col-xs-3">
										<div class="row">
											<div class="col-xs-4">
												<label>ICT&nbsp;&nbsp;</label><?php echo isset($DataRow)?(($DataRow->lab_services_ict=="1")?'✔':'✖'):''; ?>
											</div>
											<div class="col-xs-4">
												<label>Elisa&nbsp;&nbsp;</label><?php echo isset($DataRow)?(($DataRow->lab_services_elisa=="1")?'✔':'✖'):''; ?>
											</div>
											<div class="col-xs-4">
												<label>PCR&nbsp;&nbsp;</label><?php echo isset($DataRow)?(($DataRow->lab_services_ict_pcr=="1")?'✔':'✖'):''; ?>
											</div>
										</div>
									</div>
									<div class="col-xs-3 bg3">
										<div class="row">
											<div class="col-xs-4">
												<label>ICT&nbsp;&nbsp;</label><?php echo isset($CompareRow)?(($CompareRow->lab_services_ict=="1")?'✔':'✖'):''; ?>
											</div>
											<div class="col-xs-4">
												<label>Elisa&nbsp;&nbsp;</label><?php echo isset($CompareRow)?(($CompareRow->lab_services_elisa=="1")?'✔':'✖'):''; ?>
											</div>
											<div class="col-xs-4">
												<label>PCR&nbsp;&nbsp;</label><?php echo isset($CompareRow)?(($CompareRow->lab_services_ict_pcr=="1")?'✔':'✖'):''; ?>
											</div>
										</div>
									</div>
								</div>
								<div class="row" style="padding-bottom: 1px;">
									<div class="col-xs-12 cmargin27 bgcolcl">
										<label>18-Status of equipment/printing material as on visited date</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-xs-4 text-center">
										<label>Name of equipment/printing material</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label>Working properly</label>
									</div>
									<div class="col-xs-1 text-center">
										<label class="pt10 pb10">Faulty</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label class="pt10 pb10">Describe  fault</label>
									</div>
									<div class="col-xs-1 br text-center">
										<label>Working properly</label>
									</div>
									<div class="col-xs-1 text-center">
										<label class="pt10 pb10">Faulty</label>
									</div>
									<div class="col-xs-2 bl text-center">
										<label class="pt10 pb10">Describe  fault</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-xs-4 text-center">
										<label></label>
									</div>
									<div class="col-xs-4 text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
									</div>
									<div class="col-xs-4 bl text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
									</div>
								</div>
								<?php $labelArray=array(
									'1' => 'Cold chain refrigerator',
									'2' => 'Computer',
									'3' => 'Printer'
								); 
								foreach($labelArray as $key => $val){
								?>
								<div class="row">
									<div class="col-xs-4 pt7">
										<label><?php echo $val; ?></label>
									</div>
									<div class="col-xs-1  pt7 text-center">
										<p class="pt7 <?php $var="epm_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '1')?'bgreen':'bred pt26'; ?>">  
										<?php $var="epm_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '1')?'✔':''; ?> </p>
									</div>
									<div class="col-xs-1 pt7 text-center">
										<p class="pt7 <?php $var="epm_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '0')?'bgreen':'bred pt26'; ?>"> 
										<?php  echo (isset($DataRow) && $DataRow->$var == '0')?'✔':''; ?> </p>
									</div>
									<div class="col-xs-2 zp">
										<p> <?php $var="epm_r".$key."_f3"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1  pt7 text-center">
										<p class="pt7 <?php $var="epm_r".$key."_f1"; echo (isset($CompareRow) && $CompareRow->$var == '1')?'bgreen':'bred pt26'; ?>">  
										<?php $var="epm_r".$key."_f1"; echo (isset($CompareRow) && $CompareRow->$var == '1')?'✔':''; ?> </p>
									</div>
									<div class="col-xs-1 pt7 text-center">
										<p class="pt7 <?php $var="epm_r".$key."_f1"; echo (isset($CompareRow) && $CompareRow->$var == '0')?'bgreen':'bred pt26'; ?>"> 
										<?php  echo (isset($DataRow) && $CompareRow->$var == '0')?'✔':''; ?> </p>
									</div>
									<div class="col-xs-2 zp bg3">
										<p> <?php $var="epm_r".$key."_f3"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
        
								<div class="row bc">
									<div class="col-xs-4 text-center">
										<label>Name</label>
									</div>
									<div class="col-xs-2 brl text-center">
										<label>Last balance</label>
									</div>
									<div class="col-xs-1 text-center">
										<label>Received</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label>Total</label>
									</div>
									<div class="col-xs-2 br text-center">
										<label>Last balance</label>
									</div>
									<div class="col-xs-1 text-center">
										<label>Received</label>
									</div>
									<div class="col-xs-1 brl text-center">
										<label>Total</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-xs-4 text-center">
										<label></label>
									</div>
									<div class="col-xs-4 br text-center">
										<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
									</div>
									<div class="col-xs-4 text-center">
										<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
									</div>
								</div>
								<?php 
								$labels = array(
								'Stock register',
								'Vaccine register',
								'OPD/treatment register',
								'Vaccination cards',
								'Social mobilization material',
								'others'
								);
								for($i=1; $i<=count($labels); $i++){ ?>
								<div class="row">
									<div class="col-xs-4 pt7">
										<?php if($labels[$i-1]!="others") {?>
										<label><?php echo $labels[$i-1]; ?></label>
										<?php } else{
										$var ='epm_other'; ?>
										<div class="row bc">
											<div class="col-xs-6 br text-center">
												<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
											</div>
											<div class="col-xs-6 text-center">
												<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
											</div>
										</div> 
										<div class="row">
											<div class="col-xs-6">
												<?php echo '<p>'.(isset($DataRow)?getNewFMonthFormat($DataRow->$var):"").'</p>'; ?>
											</div>
											<div class="col-xs-6">
												<?php echo '<p>'.(isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):"").'</p>'; ?>
											</div> 
										</div>
										<? } ?>
									</div>
									<div class="col-xs-2">
										<p><?php $var ='epm2_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1">
										<p><?php $var ='epm2_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1">
										<p><?php $var ='epm2_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<p><?php $var ='epm2_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3">
										<p><?php $var ='epm2_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-1 bg3">
										<p><?php $var ='epm2_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div>
							<?php } ?>
        
							<div class="row" style="padding-bottom: 1px;">
							   <div class="col-xs-12 cmargin27 bgcolcl">
								<label>20-Stock position at sentinel site at (End of  last month)</label>
							  </div>
							</div>
							<div class="row bc mb1">
							  <div class="col-xs-2 text-center">
								<label class="pt10">Name of medicine</label>
							  </div>
							  <div class="col-xs-1 brl text-center">
								<label>Previous balance</label>
							  </div>
							  <div class="col-xs-1 text-center">
								<label class="pt10">Received</label>
							  </div>
							  <div class="col-xs-1 brl text-center">
								<label>Total Balance</label>
							  </div>
							  <div class="col-xs-1 text-center">
								<label class="pt10">Utilized</label>
							  </div>
							  <div class="col-xs-1 brl text-center">
								<label class="pt10 pb10">Expired</label>
							  </div>
							  <div class="col-xs-1 text-center">
								<label class="pt10">Damaged</label>
							  </div>
							  <div class="col-xs-1 brl text-center">
								<label>Current balance</label>
							  </div>
							  <div class="col-xs-1 text-center">
								<label>Expiry date</label>
							  </div>
							  <div class="col-xs-1 brl text-center">
								<label class="pt10 pb10">Demand</label>
							  </div>
							  <div class="col-xs-1 text-center">
								<label>Days out of stock </label>
							  </div>
							</div>
							<?php 
							$labels = array(
							'Inj. Interferon',
							'TAB. Adefovir',
							'TAB. Entacavir',
							'TAB. Tenovefor',
							'TAB. Lamividine',
							'Cap. Ribavarin',
							'Vaccine 0.5 ml',
							'Vaccine 1 ml',
							'Immunoglobulin 0.5 ml',
							'Immunoglobulin 1.0 ml',
							'ICT KITS HEP B',
							'ICT KITS HEP C',
							'Elisa Kits B',
							'Elisa Kits C',
							'Elisa Kits D',
							'Auto destructable syringes 2 ml',
							'Auto destructable syringes 0.5 ml',
							'others'
							);?>
							<div class="row" style="padding-bottom: 1px;">
							   <div class="col-xs-12 bc text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
							  </div>
							</div>
							<?php for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
							  <div class="col-xs-2 pt7">
								<?php if($labels[$i-1]!="others") {?>
								<label><?php echo $labels[$i-1]; ?></label>
								<?php } else{
									$var ='stkp_ohter'; ?>
									<!-- <div class="row bc">
										<div class="col-xs-6 br text-center">
											<label><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
										</div>
										<div class="col-xs-6 text-center">
											<label><?php echo isset($CompareRow)?$CompareRow->fmonth:''; ?></label>
										</div>
									</div> -->
									<div class="row">
										<div class="col-xs-12">
											<label><?php echo '<p>'.(isset($DataRow)?$DataRow->$var:"").'</p>'; ?></label>
										</div>
										<!-- <div class="col-xs-6">
											<?php echo '<p>'.(isset($CompareRow)?$CompareRow->$var:"").'</p>'; ?>
										</div> -->
									</div>
									<?} ?>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
							  	<p><?php $var ='stkp_r'.$i.'_f8'; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
								<!-- <p><?php $var ='stkp_r'.$i.'_f8'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p> -->
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f9'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
								<p><?php $var ='stkp_r'.$i.'_f10'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							</div>
							<?php } ?>
							<div class="row mt5">
								<div class="col-xs-12">
									<label>21-Hepatitis patients database</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 pt7">
									<label>Patients database updated</label>
								</div>
								<div class="col-xs-1 pt7 text-center">
									<p class="<?php echo isset($DataRow)?(($DataRow->patient_db_update=="1")?'bred':'bgreen'):''; ?>">
									<?php echo isset($DataRow)?(($DataRow->patient_db_update=="1")?'No':'Yes'):''; ?></p>
								</div>
								<div class="col-xs-2 pt7">
									<label>if No, then reasons</label>
								</div>
								<div class="col-xs-4 zp">
									<p><?php echo isset($DataRow)?$DataRow->no_reason:''; ?></p>
								</div>
							</div>
							<div class="row" style="padding-bottom: 1px;">
							   <div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
							  </div>
							</div>
							<?php for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
							  <div class="col-xs-2 pt7">
								<?php if($labels[$i-1]!="others") {?>
								<label><?php echo $labels[$i-1]; ?></label>
								<?php } else{
									$var ='stkp_ohter'; ?>
									<div class="row bc">
										<div class="col-xs-6 br text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
										</div>
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<?php echo '<p>'.(isset($DataRow)?getNewFMonthFormat($DataRow->$var):"").'</p>'; ?>
										</div>
										<div class="col-xs-6">
											<?php echo '<p>'.(isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):"").'</p>'; ?>
										</div>
									</div>
									<?
									} ?>
							  </div>
							  <div class="col-xs-1">
								<p><?php $var ='stkp_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f7'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 zp">
							  	<p><?php $var ='stkp_r'.$i.'_f8'; echo (isset($CompareRow) && $CompareRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
								<!-- <p><?php $var ='stkp_r'.$i.'_f8'; echo isset($CompareRow)?date("d-m-Y",strtotime($CompareRow->$var)):''; ?></p> -->
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f9'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							  <div class="col-xs-1 ">
								<p><?php $var ='stkp_r'.$i.'_f10'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
							</div>
							<?php } ?>
							<div class="row mt5">
								<div class="col-xs-12">
									<label>21-Hepatitis patients database</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 pt7">
									<label>Patients database updated</label>
								</div>
								<div class="col-xs-1 text-center pt7">
									<p class="<?php echo isset($CompareRow)?(($CompareRow->patient_db_update=="1")?'bred':'bgreen'):''; ?>">
									<?php echo isset($CompareRow)?(($CompareRow->patient_db_update=="1")?'No':'Yes'):''; ?></p>
								</div>
								<div class="col-xs-2 pt7">
									<label>if No, then reasons</label>
								</div>
								<div class="col-xs-4 zp">
									<p><?php echo isset($CompareRow)?$CompareRow->no_reason:''; ?></p>
								</div>
							</div>
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl">
									<label>22-Category sex & age wise data of patients</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-3 text-center"></div>
								<div class="col-xs-3 brl text-center">
									<label>Hepatitis-C</label>
								</div>
								<div class="col-xs-3 text-center">
									<label>Hepatitis-B</label>
								</div>
								<div class="col-xs-3 bl text-center">
									<label>Hepatitis-D</label>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-xs-3 text-center">
									<label>Years</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Male</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Female</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Total</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Male</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Female</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Total</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Male</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Female</label>
								</div>
								<div class="col-xs-1 bl text-center">
									<label>Total</label>
								</div>
							</div>
							<?php 
							$labels = array(
							'12-20 ',
							'21-30',
							'31-40',
							'41-50',
							'51-60',
							'Total'
							);?>
							<div class="row bc mt1" style="padding-bottom: 1px;">
								<div class="col-xs-12  text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
								</div>
							</div>
							<?php 
							for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-3 pt7 text-center">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f8'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f9'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<?php } ?> 
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 bc text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
								</div>
							</div>
							<?php 
							for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-3 pt7 text-center">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							  </div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f7'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f8'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='categ_sex_age_r'.$i.'_f9'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<?php } ?> 
        
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl">
									<label>23-Inventory stock position of sentinel site since (cmi) program started</label>
								</div>
							</div>
							<div class="row bc mb1">
								<div class="col-xs-2 text-center">
									<label>Name of medicine</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Received</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Used</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Balance</label>
								</div>
								<div class="col-xs-2 text-center">
									<label>Expired</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Received</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Used</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>Balance</label>
								</div>
								<div class="col-xs-2 text-center">
									<label>Expired</label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 text-center">
									<label></label>
								</div>
								<div class="col-xs-5 bc bl text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
								</div>
								<div class="col-xs-5 bc bl text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
								</div>
							</div>
							<?php 
							$labels = array(
							'Inj. Interferon',
							'Inj. Pegasys',
							'TAB. Adevofer',
							'TAB. Entacavir',
							'TAB. Tenovefor',
							'TAB. Lamividine',
							'Vaccine 0.5 ml',
							'Vaccine 1 ml',
							'Immunoglobulin 0.5 ml',
							'Immunoglobulin 1.0 ml',
							'ICT KITS HEP B:',
							'ICT KITS HEP C:',
							'ICT KITS HEP D:',
							'Elisa Kits B',
							'Elisa Kits C',
							'Elisa Kits D',
							'Auto destructible syringes 0.5 ml',
							'Auto destructible syringes 0.5 ml',
							'others'
							);

							for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-2 pt7">
									<?php if($labels[$i-1]!="others") {?>
									<label><?php echo $labels[$i-1]; ?></label>
									<label><?php } else{
										$var ='invent_stk_other'; 
										echo '<p>'.(isset($DataRow)?$DataRow->$var:"").'</p>';
									
										} ?></label>
								</div>
								<div class="col-xs-1">
									<p><?php $var ='invent_stk_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1">
									<p><?php $var ='invent_stk_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1">
									<p><?php $var ='invent_stk_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 text-center">
									<p><?php $var ='invent_stk_r'.$i.'_f4'; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									<!-- <p><?php $var ='invent_stk_r'.$i.'_f4'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p> -->
								</div>
								<div class="col-xs-1 bg3">
									<p><?php $var ='invent_stk_r'.$i.'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 bg3">
									<p><?php $var ='invent_stk_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 bg3">
									<p><?php $var ='invent_stk_r'.$i.'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 text-center bg3">
									<p><?php $var ='invent_stk_r'.$i.'_f4'; echo (isset($CompareRow) && $CompareRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
									<!-- <p><?php $var ='invent_stk_r'.$i.'_f4'; echo isset($CompareRow)?date("d-m-Y",strtotime($CompareRow->$var)):''; ?></p> -->
								</div>
							</div>
							<?php } ?>
        
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl">
									<label>24-Requirements/Issues if any: </label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
								<table class="table   table-bordered">
									<thead >
										<tr class="bc">
											<th style="width: 14% !important;background-color: #0B7D05; color:white;font-weight: bold;"></t4>
											<th style="width: 43% !important;text-align: center !important;">
												<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
											</th>
											<th style="width: 43% !important; text-align: center !important;">
												<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
											</th>
										</tr>
									</thead>
								<tbody>
								<tr>
								  <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Requirements
								  </td>
								  <td style="width: 43% !important;">
									<p style="border: 0px none;width: 100%;height: 68px;" ><?php echo isset($DataRow)?$DataRow->requirements:''; ?></p>
								  </td> 
								  <td style="width: 43% !important;" class="bg3">
									<p style="border: 0px none;width: 100%;height: 68px;" ><?php echo isset($DataRow)?$CompareRow->requirements:''; ?></p>
								  </td>               
								</tr>
								<tr>
								  <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues
								  </td>
								  <td style="width: 43% !important;">
									<p style="border: 0px none;width: 100%;height: 68px;"><?php echo isset($DataRow)?$DataRow->issues:''; ?></p>
								  </td> 
								  <td style="width: 43% !important;" class="bg3">
									<p style="border: 0px none;width: 100%;height: 68px;"><?php echo isset($DataRow)?$CompareRow->issues:''; ?></p>
								  </td>               
								</tr>
								 
							  </tbody>
							</table>
							  </div>
							</div>
							<div class="row pt1 pb1">
								<div class="col-xs-12 bgcolcl">
									<label>25-Comments of monitoring officer:</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-6 text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>	
								</div>
								<div class="col-xs-6 text-center ">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>	
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<p><?php echo isset($DataRow)?$DataRow->comments:''; ?></p>
								</div>
								<div class="col-xs-6 bg3">
									<p><?php echo isset($CompareRow)?$CompareRow->comments:''; ?></p>
								</div>
							</div>
							<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
								<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
									<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
								</div>
							</div>
         
						</div>
					</div> <!--end of panel body-->
				</div> <!--end of panel panel-primary--> 
			</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>