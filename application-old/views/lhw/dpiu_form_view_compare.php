<?php 
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
	  <title>DPIU || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> District Program Implementation Unit (DPIU) - Form
				</div>
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
											<label class="pt7 pb2">Name of FLCF</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
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
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>1) FUNCTIONING OF DPIU</label>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 1.1  Planning/Establishment</label>
								</div>
							</div>
							<div class="row bc mb1">
								<div class="col-xs-4">
									<label class="pt14">Indicator</label>
								</div>
								<div class="col-xs-2 brl text-center">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Yes/No</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center br">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
								<div class="col-xs-6 zp text-center">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Remarks(Briefly record relevant observations/inputs and functional status of equipment)</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center br">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<label class="pt5">Annual District Plan of Action available for current year</label>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row ">
										<div class="col-xs-6 text-center">
											<p class="pt5 <?php $var ="fun_r1_f1"; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?> " >
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt5 <?php  echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?> " >
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-6 ">
									<div class="row ">
										<div class="col-xs-6">
											<p class="pt5"><?php $var ="fun_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p class="pt5"><?php $var ="fun_r1_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 ">
									<label class="pt5">Management support available</label>
								</div>
								<div class="col-xs-1  text-center">

								</div>
								<div class="col-xs-1  text-center">

								</div>
								<div class="col-xs-6 zp">

								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<label class="pt5">Office furniture</label>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row ">
										<div class="col-xs-6 text-center">
											<p class="pt5 <?php $var ="fun_r2_f1"; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?> " >
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt5 <?php  echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?> " >
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-6 ">
									<div class="row ">
										<div class="col-xs-6">
											<p class="pt5"><?php $var ="fun_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p class="pt5"><?php $var ="fun_r2_f2"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 ">
									<label class="pt5">Office Equipment</label>
								</div>
								<div class="col-xs-1  text-center">

								</div>
								<div class="col-xs-1  text-center">

								</div>
								<div class="col-xs-6 zp">

								</div>
							</div>
						  <?php
							$labels = array('Telephone','Fax','Computer','Printer','Internet','Any Other');
							for($i=1;($i-1)< count($labels);$i++)
							{?>
							<div class="row">
								<div class="col-xs-4">
									<label class="pt5"><?php echo $i.'. '.$labels[($i-1)]; ?></label>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row ">
										<div class="col-xs-6 text-center">
											<p class="pt5 <?php $var ='fun_r'.($i+2).'_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?> " >
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt5 <?php  echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?> " >
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-6 ">
									<div class="row ">
										<div class="col-xs-6">
											<p class="pt5"><?php $var ='fun_r'.($i+2).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p class="pt5"><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>	
							<?php
								}
							  ?>
							<div class="row">
								<div class="col-xs-4">
									<label class="pt5">Staff Composition of DPIU as per policy</label>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row ">
										<div class="col-xs-6 text-center">
											<p class="pt5 <?php $var ="fun_r9_f1"; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?> " >
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt5 <?php  echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?> " >
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-6 ">
									<div class="row ">
										<div class="col-xs-6">
											<p class="pt5"><?php $var ="fun_r9_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p class="pt5"><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4">
									<label class="pt5">Name Unfilled positions</label>
								</div>
								<div class="col-xs-2 text-center">
									
								</div>
								<div class="col-xs-6 ">
									<div class="row ">
										<div class="col-xs-6">
											<p class="pt5"><?php $var ="fun_r10_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p class="pt5"><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 1.2 Meetings held during the previous month</label>
								</div>
							</div>        
							<div class="row bc">
								<div class="col-xs-4">
									<label>Type of Meeting (attended by)</label>
								</div>
								<div class="col-xs-2 text-center brl">
									<label>Date of meeting</label>
								</div>
								<div class="col-xs-2 text-center">
									<label>Specific issues discussed</label>
								</div>
								<div class="col-xs-2 text-center brl">
									<label>Minutes available</label>
								</div>
								<div class="col-xs-2 text-center">
									<label>Actions taken</label>
								</div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-12 text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
							</div>
							<?php
								$labels = array(
								'DPIU Monthly Meeting (EDO Health/DOH, DCO, ADCO, Accounts Supervisor)',
								'Maternal Mortality Conference (Lady Health Supervisors monthly meeting)',
								'District/FLCF Trainers',
								'DHMT/DTC with other departments, DPWO, others');
								for($i=1;($i-1)< count($labels);$i++)
								{?>
									<div class="row">
										<div class="col-xs-4 cmargin27">
											<label class="pt5"><?php echo $labels[($i-1)]; ?></label>
										</div>
										<div class="col-xs-2 text-center">
											<p class="pt5"><?php $var ='mtng_r'.$i.'_f1'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
										</div>
										<div class="col-xs-2">
											<p class="pt5"><?php $var ='mtng_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-2">
											<div class="row">
												<div class="col-xs-3 text-center"></div>
												<div class="col-xs-6 text-center">
													<p class="pt5 <?php $var ='mtng_r'.$i.'_f3'; echo isset($DataRow)?get_yn_class($DataRow->$var):''?>">
													<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?></p>
												</div>
												<div class="col-xs-3 text-center"></div>
											</div>
										</div>
										<div class="col-xs-2">
											<p class="pt5"><?php $var ='mtng_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div><?php
								}
							?>
							<div class="row bt bc">
								<div class="col-xs-12 text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php
								for($i=1;($i-1)< count($labels);$i++)
								{?>
									<div class="row">
										<div class="col-xs-4 cmargin27">
											<label class="pt5"><?php echo $labels[($i-1)]; ?></label>
										</div>
										<div class="col-xs-2 text-center">
											<p class="pt5"><?php $var ='mtng_r'.$i.'_f1'; echo isset($CompareRow)?date("d-m-Y",strtotime($CompareRow->$var)):''; ?></p>
										</div>
										<div class="col-xs-2">
											<p class="pt5"><?php $var ='mtng_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-2">
											<div class="row">
												<div class="col-xs-3 text-center"></div>
												<div class="col-xs-6 text-center">
													<p class="pt5 <?php $var ='mtng_r'.$i.'_f3'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):''?>">
													<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?></p>
												</div>
												<div class="col-xs-3 text-center"></div>
											</div>
										</div>
										<div class="col-xs-2">
											<p class="pt5"><?php $var ='mtng_r'.$i.'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div><?php
								}
							?>
							<div class="row">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>2) HUMAN RESOURCES</label>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 2.1 Lady Health Workers</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1">
									<label class="pt24 ">Allocated</label>
								</div>
								<div class="col-xs-1 brl">
									<label class="pt24 pb23">Recruited</label>
								</div>
								<div class="col-xs-1">
									<label class="pt24 ">Dropout</label>
								</div>
								<div class="col-xs-1 bl">
									<label class="pt24 pb23">Terminated</label>
								</div>
								<div class="col-xs-2 brl">
									<label class="pt14 pb13">Presently working <br>(after 3 months training)</label>
								</div>
								<div class="col-xs-2">
									<label class="pt14">Current training status (Mention numbers)</label>
								</div>
								<div class="col-xs-3 brl">
									<div class="row bb">
										<div class="col-xs-12 text-center">
											<label>Current training status <br>(Mention numbers)</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-3 zp text-center">
											<label>Months</label>
										</div>
										<div class="col-xs-5 brl zp text-center">
											<label>Under 12 months</label>
										</div>
										<div class="col-xs-4 zp text-center">
											<label>Completed</label>
										</div>
									</div>
								</div>
								<div class="col-xs-1">
									<label class="pt24">Remarks</label>
								</div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-12 text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhw_r1_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhw_r1_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-3 zp text-center">
											<p><?php $var ='lhw_r1_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-5 zp text-center">
											<p><?php $var ='lhw_r1_f8'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-4 zp text-center">
											<p><?php $var ='lhw_r1_f9'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='lhw_r1_f10'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row  bc">
								<div class="col-xs-12 text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhw_r1_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhw_r1_f5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhw_r1_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-3 zp text-center">
											<p><?php $var ='lhw_r1_f7'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-5 zp text-center">
											<p><?php $var ='lhw_r1_f8'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-4 zp text-center">
											<p><?php $var ='lhw_r1_f9'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='lhw_r1_f10'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 2.2 Lady Health Supervisors</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-1">
									<label class="pt5 ">Allocated @ 20-25 LHWs</label>
								</div>
								<div class="col-xs-1 brl">
									<label class="pt24 pb23">Recruited</label>
								</div>
								<div class="col-xs-1">
									<label class="pt24 ">Dropout</label>
								</div>
								<div class="col-xs-1 bl">
									<label class="pt24 pb23">Terminated</label>
								</div>
								<div class="col-xs-2 brl">
									<label class="pt14 pb13">Presently working <br>(after 3 months training)</label>
								</div>
								<div class="col-xs-2">
									<label class="pt14">Current training status (Mention numbers)</label>
								</div>
								<div class="col-xs-3 brl">
									<div class="row bb">
										<div class="col-xs-12 text-center">
											<label>Current training status <br>(Mention numbers)</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-3 zp text-center">
											<label>Months</label>
										</div>
										<div class="col-xs-5 brl zp text-center">
											<label>Under 12 months</label>
										</div>
										<div class="col-xs-4 zp text-center">
											<label>Completed</label>
										</div>
									</div>
								</div>
								<div class="col-xs-1">
									<label class="pt24">Remarks</label>
								</div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-12 text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhs_r1_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhs_r1_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-3 zp text-center">
											<p><?php $var ='lhs_r1_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-5 zp text-center">
											<p><?php $var ='lhs_r1_f8'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-4 zp text-center">
											<p><?php $var ='lhs_r1_f9'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='lhs_r1_f10'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-12 text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='lhs_r1_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhs_r1_f5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='lhs_r1_f6'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-3 zp text-center">
											<p><?php $var ='lhs_r1_f7'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-5 zp text-center">
											<p><?php $var ='lhs_r1_f8'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-4 zp text-center">
											<p><?php $var ='lhs_r1_f9'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 zp">
									<p><?php $var ='lhs_r1_f10'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row bc">
							   <div class="col-xs-12">
								<label>Section 2.3 Drivers</label>
							  </div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-6 text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-6 bl text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-6 text-center">
									<div class="row">
										<div class="col-xs-2">
											<label>Required</label>
										</div>
										<div class="col-xs-4 brl ">
											<label>Currently Working</label>
										</div>
										<div class="col-xs-6">
											<label>Remarks</label>
										</div>
									</div>
								</div>
								<div class="col-xs-6 bl text-center">
									<div class="row ">
										<div class="col-xs-2">
											<label>Required</label>
										</div>
										<div class="col-xs-4 brl">
											<label>Currently Working</label>
										</div>
										<div class="col-xs-6">
											<label>Remarks</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="row">
										<div class="col-xs-2 zp text-center">
											<p><?php $var ='drvr_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-4 zp text-center">
											<p><?php $var ='drvr_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 zp">
											<p><?php $var ='drvr_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-6 bg3">
									<div class="row">
										<div class="col-xs-2 zp text-center">
											<p><?php $var ='drvr_r1_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-4 zp text-center">
											<p><?php $var ='drvr_r1_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 zp">
											<p><?php $var ='drvr_r1_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row" style="padding-bottom: 1px;">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>3) FINANCES</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-6 text-center">
									<label>Item</label>
								</div>
								<div class="col-xs-2 brl">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Status</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 zp">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Remarks</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 cmargin27">
									<label>Cash Book maintained</label>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7 <?php $var ='fin_r1_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?>">
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?>">
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='fin_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php $var ='fin_r1_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 cmargin27">
									<label>Monthly SOE prepared & reconciled</label>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7 <?php $var ='fin_r2_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?>">
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?>">
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='fin_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 cmargin27">
									<label>Amount Received (in Rs.) (For current quarter from PPIH)</label>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7 <?php $var ='fin_r3_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?>">
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?>">
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='fin_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 cmargin27">
									<label>Payroll submitted by 20th of month</label>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7 <?php $var ='fin_r4_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):''; ?>">
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var):''; ?>">
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='fin_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 cmargin27">
									<label>Salary of LHWs/Supervisors/Drivers will be paid until what month and year?</label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7">
											<?php $var ='fin_r5_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7">
											<?php  echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='fin_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6">
									<div class="row">
										<div class="col-xs-6" style="padding-top: 37px;">
											<label>Training allowance paid for last month</label>
										</div>
										<div class="col-xs-6">
											<div class="row">
												<div class="col-xs-12 cmargin27">
													<label>FLCF Trainers</label>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 cmargin27">
													<label>LHWs refresher training allowance</label>
												</div>
											</div>
											<div class="row">
												<div class="col-xs-12 cmargin27">
													<label>District Trainers</label>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-2 ">
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-6 text-center">
													<p class="pt7 <?php $var ='fin_r6_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var=="1"):''; ?>">
													<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 text-center bg3">
													<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var=="1"):''; ?>">
													<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-6 text-center">
													<p class="pt7 <?php $var ='fin_r7_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var=="1"):''; ?>">
													<?php echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 text-center bg3">
													<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var=="1"):''; ?>">
													<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<div class="row">
												<div class="col-xs-6 text-center">
													<p class="pt7 <?php $var ='fin_r8_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var=="1"):''; ?>">
													<?php echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
												<div class="col-xs-6 text-center bg3">
													<p class="pt7 <?php echo isset($CompareRow)?get_yn_class($CompareRow->$var=="1"):''; ?>">
													<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xs-4">
									<div class="row">
										<div class="col-xs-6">
											<p><?php $var ='fin_r6_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p><?php $var ='fin_r6_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<p><?php $var ='fin_r7_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p><?php $var ='fin_r7_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6">
											<p><?php $var ='fin_r8_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p><?php $var ='fin_r8_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 cmargin27">
									<label>Amount for POL/Fixed travel allowance to be paid to supervisors until what month and year?</label>
								</div>
								<div class="col-xs-2 zp">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7">
											<?php $var ='fin_r9_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7">
											<?php  echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='fin_r9_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php  echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>4) LOGISTICS</label>
								</div>
							</div>
							<div class="row bc mt1 mb1">
							   <div class="col-xs-12">
									<label>Section 4.1 Store</label>
							  </div>
							</div>
							<div class="row bc">
								<div class="col-xs-6 text-center">
								 
								</div>
								<div class="col-xs-2 brl text-center">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>yes / No</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
								<div class="col-xs-4 text-center">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Remarks</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<?php 
							$labels = array('Is the storage space large enough to hold needed supplies?',
							'Are storage conditions proper?(Refer to checklist for store maintenance, C-III)',
							'Is the stock register up to date?',
							'Are issue-receipt vouchers up to date?',
							'Are issue-receipt vouchers up to date?',
							'Are bin cards up to date?',
							'Has the Demand & Distribution System been adopted?');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-6">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row ">
										<div class="col-xs-6 text-center">
											<p class="pt7 <?php $var ='str_r'.($i).'_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):'';?>">
											<?php echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7 <?php $var ='str_r'.($i).'_f1'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):'';?>">
											<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
										</div>
									</div>
								</div>
								<div class="col-xs-4 ">
									<div class="row ">
										<div class="col-xs-6">
											<p><?php $var ='str_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p><?php $var ='str_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>	
							<?php } ?>
							<div class="row bc">
								<div class="col-xs-12">
									<label>Section 4.2 Medicines, Contraceptives and other logistics
									</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2 text-center">
									
								</div>
								<div class="col-xs-5 brl text-center">
									<label class="padding6"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-5 text-center">
									<label class="padding6"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2 text-center">
									<label class="pt30">Items</label>
								</div>
								<div class="col-xs-5 text-center">
									<div class="row bc">
										<div class="col-xs-2 brl text-center">
											<label class="pt30 pb30">Available</label>
										</div>
										<div class="col-xs-2 zp text-center">
											<label class="pt30 pb30">Distributed </label>
										</div>
										<div class="col-xs-8 text-center brl">
											<label>Remarks (If item is either not available or not distributed, mention the reasons as well as for how long the item is out of stock in case of non-availability)</label>
										</div>
									</div>
								</div>
								<div class="col-xs-5 text-center">
									<div class="row bc">
										<div class="col-xs-2 br text-center">
											<label class="pt30 pb30">Available</label>
										</div>
										<div class="col-xs-2 zp text-center">
											<label class="pt30 pb30">Distributed </label>
										</div>
										<div class="col-xs-8 text-center bl">
											<label>Remarks (If item is either not available or not distributed, mention the reasons as well as for how long the item is out of stock in case of non-availability)</label>
										</div>
									</div>
								</div>
							</div>
							<?php 
							$labels = array('Medicines','Contraceptives','Printed Material','Non Drug items');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-2">
									<label class=""><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-5 ">
									<div class="row">
										<div class="col-xs-2 text-center">
											<p class="pt7 <?php $var ='mcl_r'.($i).'_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):'';?>">
											<?php echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
										</div>
										<div class="col-xs-2 text-center">
											<p class="pt7 <?php $var ='mcl_r'.($i).'_f2'; echo isset($DataRow)?get_yn_class($DataRow->$var):'';?>">
											<?php echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?>
										</div>
										<div class="col-xs-8">
											<p><?php $var ='mcl_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-5 bg3">
									<div class="row">
										<div class="col-xs-2 text-center">
											<p class="pt7 <?php $var ='mcl_r'.($i).'_f1'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):'';?>">
											<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
										</div>
										<div class="col-xs-2 text-center">
											<p class="pt7 <?php $var ='mcl_r'.($i).'_f2'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):'';?>">
											<?php echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):'No'; ?>
										</div>
										<div class="col-xs-8">
											<p><?php $var ='mcl_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row bc">
							   <div class="col-xs-12">
									<label>Section 4.3  Vehicles
								</label>
							  </div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-2 text-center">
									<label class=""></label>
								</div>
								<div class="col-xs-5 brl text-center">
									<label class="padding6"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-5 text-center">
									<label class="padding6"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bt bc">
								<div class="col-xs-2 text-center">
									<label class="pt14">Levels</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label class="padding6">No. Received</label>
								</div>
								<div class="col-xs-1 text-center">
									<label class="padding6">No. Available</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="padding6">No. Functional</label>
								</div>
								<div class="col-xs-2 br text-center">
									<label class="pt20 pb17">Remarks</label>
								</div>
								<div class="col-xs-1 br text-center">
									<label class="padding6">No. Received</label>
								</div>
								<div class="col-xs-1 text-center">
									<label class="padding6">No. Available</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="padding6">No. Functional</label>
								</div>
								<div class="col-xs-2 text-center">
									<label class="pt14 pb13">Remarks</label>
								</div>
							</div>
							<?php 
							$labels = array('DPIU','Supervisors');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-2 cmargin27">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='v_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='v_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='v_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='v_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='v_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='v_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='v_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php $var ='v_r'.($i).'_f4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div><?php } ?>
							<div class="row">
								<div class="col-xs-12 cmargin27 bgcolcl text-center">
									<label>5) SUPERVISION AND MONITORING</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-12">
									<label>Section 5.1 Supervisor’s visits</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2 text-center">
									<label class="pt27">Undertaken by</label>
								</div>
								<div class="col-xs-2 bl text-center">
									<label class="pt30 pb27">No. of days in the field <br>(during last month)</label>
								</div>
								<div class="col-xs-1 brl zp text-center">
									<label class="pb18 pt19">Tour reports available (Yes/No)</label>
								</div>
								<div class="col-xs-2 text-center">
									<label class="">Remarks (Comment on the purpose and quality of visit after reviewing the tour reports)</label>
								</div>
								<div class="col-xs-2 brl text-center">
									<label class="pt30 pb27">No. of days in the field <br>(during last month)</label>
								</div>
								<div class="col-xs-1 zp text-center">
									<label class="pb18 pt19">Tour reports available (Yes/No)</label>
								</div>
								<div class="col-xs-2 bl text-center">
									<label class="padding6">Remarks (Comment on the purpose and quality of visit after reviewing the tour reports)</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2 text-center">
									<label class=""></label>
								</div>
								<div class="col-xs-5 bl text-center">
									<label class=""><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-5 brl zp text-center">
									<label class=""><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php 
							$labels = array('District Coordinator','Assistant District Coordinator','Others (Specify)');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-2 cmargin27">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='sv_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 ">
									<div class="row">
										<div class="col-xs-12 text-center">
											<p class="pt7 <?php $var ='sv_r'.($i).'_f2'; echo isset($DataRow)?get_yn_class($DataRow->$var):''?>">
											<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<p><?php $var ='sv_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center bg3">
									<p><?php $var ='sv_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 bg3">
									<div class="row">
										<div class="col-xs-12 text-center">
											<p class="pt7 <?php $var ='sv_r'.($i).'_f2'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):''?>">
											<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 bg3">
									<p><?php $var ='sv_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<?php } ?>
							<div class="row bc">
								<div class="col-xs-12">
									<label>Section 5.2 Trainings</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-4 text-center">
								</div>
								<div class="col-xs-4 brl text-center">
									<label class="padding6"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-4 zp text-center">
									<label class="padding6"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-4 text-center">
									<label class="padding6">Training</label>
								</div>
								<div class="col-xs-2 brl text-center">
									<label class="pb18 pt18">Venue</label>
								</div>
								<div class="col-xs-1 zp text-center">
									<label class="pt18">Date of Start</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="padding6">Date of Completion</label>
								</div>
								<div class="col-xs-2 br text-center">
									<label class="pb18 pt18">Venue</label>
								</div>
								<div class="col-xs-1 zp text-center">
									<label class="pt18">Date of Start</label>
								</div>
								<div class="col-xs-1 text-center bl">
									<label class="padding6">Date of Completion</label>
								</div>
							</div>
							<?php 
							$labels = array('LHWs Basic Training','LHS Basic Training',
							'FLCF/District/Provincial','Trainers Training','Refresher Training (Please specify)',
							'Trainings organized by others (NGOs, International Agencies etc.)');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-4 cmargin27">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<p class="pt7"><?php $var ='trng_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center zp">
									<p class="pt7"><?php $var ='trng_r'.($i).'_f2'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
								</div>
								<div class="col-xs-1 text-center zp">
									<p class="pt7"><?php $var ='trng_r'.($i).'_f3'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
								</div>
								<div class="col-xs-2 bg3">
									<p class="pt7"> <?php $var ='trng_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center zp bg3">
									<p class="pt7"><?php $var ='trng_r'.($i).'_f2'; echo isset($CompareRow)?date("d-m-Y",strtotime($CompareRow->$var)):''; ?></p>
								</div>
								<div class="col-xs-1 text-center zp bg3">
									<p class="pt7"><?php $var ='trng_r'.($i).'_f3'; echo isset($CompareRow)?date("d-m-Y",strtotime($CompareRow->$var)):''; ?></p>
								</div>
							</div><?php 
							} 
							?>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 5.3 (a) Status of Monthly Report</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-2 text-center">
									<label class="pt10" style="padding-top:15px;"></label>
								</div>
								<div class="col-xs-5 bl text-center">
									<label class="pt10" style="padding-top:15px;"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-5 bl text-center">
									<label class="pt10" style="padding-top:15px;"><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2 text-center">
									<label class="pt10" style="padding-top:15px;">Type</label>
								</div>
								<div class="col-xs-2 brl">
									<div class="row bb">
										<div class="col-xs-12 text-center">
											<label >Number</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6 text-center br">
											<label class="pt10 pb10">Expected</label>
										</div>
										<div class="col-xs-6 text-center">
											<label class="pt10 pb10">Submitted</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="row bb">
										<div class="col-xs-12 text-center">
											<label>Remarks</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>(Comment on the quality of report after reviewing them)</label>
										</div> 
									</div>
								</div>
								<div class="col-xs-2 brl">
									<div class="row bb">
										<div class="col-xs-12 text-center">
											<label>Number</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-6 text-center br">
											<label class="pt10 pb10">Expected</label>
										</div>
										<div class="col-xs-6 text-center">
											<label class="pt10 pb10">Submitted</label>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="row bb">
										<div class="col-xs-12 text-center">
											<label>Remarks</label>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>(Comment on the quality of report after reviewing them)</label>
										</div> 
									</div>
								</div>
							</div>
							<?php 
							$labels = array('Facilities','Lady Health Supervisors','FPO','Proforma (NP)');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-2 cmargin27">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 zp text-center">
											<p class="pt7"><?php $var ='smr_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 zp text-center">
											<p class="pt7"><?php $var ='smr_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7"><?php $var ='smr_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div> 
									</div>
								</div>
								<div class="col-xs-2 bg3">
									<div class="row">
										<div class="col-xs-6 zp text-center">
											<p class="pt7"><?php $var ='smr_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 zp text-center">
											<p class="pt7"><?php $var ='smr_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-3 bg3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7"><?php $var ='smr_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div> 
									</div>
								</div>
							</div><?php 
								} 
							?> 
							<div class="row">
								<div class="col-xs-3 cmargin27">
									<label>FPO worksheet folders maintained</label>
								</div>
								<div class="col-xs-1 text-center">
									<p class="pt7 <?php $var ='smrb_r1_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
										<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
									</p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7">
												<?php $var ='smrb_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 text-center col-xs-offset-1 bg3">
									<p class="pt7 <?php $var ='smrb_r1_f1'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):""; ?>">
										<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
									</p>
								</div>
								<div class="col-xs-3 bg3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7">
												<?php $var ='smrb_r1_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 cmargin27">
									<label>DCO worksheet folders maintained</label>
								</div>
								<div class="col-xs-1 text-center">
									<p class="pt7 <?php $var ='smrb_r2_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
										<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
									</p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7">
												<?php $var ='smrb_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 text-center col-xs-offset-1 bg3">
									<p class="pt7 <?php $var ='smrb_r2_f1'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):""; ?>">
										<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
									</p>
								</div>
								<div class="col-xs-3 bg3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7">
												<?php $var ='smrb_r2_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 cmargin27">
									<label>ADC worksheet folders maintained</label>
								</div>
								<div class="col-xs-1 text-center">
									<p class="pt7 <?php $var ='smrb_r3_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
										<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
									</p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7">
												<?php $var ='smrb_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-1 text-center col-xs-offset-1 bg3">
									<p class="pt7 <?php $var ='smrb_r3_f1'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):""; ?>">
										<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
									</p>
								</div>
								<div class="col-xs-3 bg3">
									<div class="row">
										<div class="col-xs-12">
											<p class="pt7">
												<?php $var ='smrb_r3_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 5.3(b)  LHW-MIS</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-5 text-center">
									<label>Activities</label>
								</div>
								<div class="col-xs-2 text-center brl">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Status</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
								<div class="col-xs-5 text-center">
									<div class="row">
										<div class="col-xs-12 text-center">
											<label>Remarks</label>
										</div>
									</div>
									<div class="row bt">
										<div class="col-xs-6 text-center">
											<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
										</div>
										<div class="col-xs-6 bl text-center">
											<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
										</div>
									</div>
								</div>
							</div>
							<?php 
							$labels=array(
							'District Report',
							'No. of LHWs reporting (from DMR) (%age)',
							'Feedback from PPIU to District on DMR',
							'Feedback from DPIU to Health Facilities on Monthly Report',
							'HR database updated',
							'LHW-MIS software installed and made functional',
							'Computerized pay roll generated',
							'MIS charts displayed and updated',
							);
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row ">
								<div class="col-xs-5 ">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-center">
											<p class="pt7 <?php $var ='lhwmis_r'.$i.'_f1'; echo isset($DataRow)?get_yn_class($DataRow->$var):""; ?>">
												<?php  echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
										<div class="col-xs-6 text-center bg3">
											<p class="pt7 <?php $var ='lhwmis_r'.$i.'_f1'; echo isset($CompareRow)?get_yn_class($CompareRow->$var):""; ?>">
												<?php  echo isset($CompareRow)?(($CompareRow->$var=="1")?'Yes':'No'):''; ?>
											</p>
										</div>
									</div>
								</div>
								<div class="col-xs-5">
									<div class="row ">
										<div class="col-xs-6">
											<p><?php $var ='lhwmis_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-6 bg3">
											<p><?php $var ='lhwmis_r'.$i.'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>5.4  Program indicators</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-3">
									<label>Indicator</label>
								</div>
								<div class="col-xs-3 brl">
									<label class="pt14 pb13">Source</label>
								</div>
								<div class="col-xs-1 zp text-center">
									<label>Last Month</label>
								</div>
								<div class="col-xs-1 text-center bl">
									<label>2nd Last Month</label>
								</div>
								<div class="col-xs-1 brl text-center">
									<label>3rd Last Month</label>
								</div>
								<div class="col-xs-1 zp text-center">
									<label>Last Month</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label>2nd Last Month</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>3rd Last Month</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-3">
								</div>
								<div class="col-xs-3 brl">
								</div>
								<div class="col-xs-3 zp brl text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-3 text-center ">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php 
								$labels = array('Contraceptives Prevalence Rate',
								'Total number of deliveries',
								'Total number of deliveries by SBA',
								'Total number of pregnant women seen at the facility that month (check for double counting)',
								'Number of pregnant women who received TT',
								'Number of pregnant women given iron tablets',
								'Number of post natal visits made',
								'Number of post natal cases visited 24 hours after deliveries.',
								'EPI Coverage (fully immunized)',
								'Number of of ARI cases under 5 seen per LHW/month',
								'Number of diarrhea cases under 5 seen per LHW/month',
								'Average District Performance (score)');
								$sources = array('MIS Chart','DMR','DMR','MIS Chart','MIS Chart','DMR','DMR','DMR',
								'MIS Charts/Jaiza Karkardagi JK','DMR','DMR','LHS Performance Report/JK');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-3 cmargin27">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-3 cmargin27">
									<label><?php echo $sources[$i-1]; ?></label>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='pi_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='pi_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='pi_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='pi_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='pi_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='pi_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div><?php } ?>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>Section 5.5 Mortality Verification</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-4 text-center">
									<label>Mortality</label>
								</div>
								<div class="col-xs-2 text-center brl">
									<label>Reported Last DMR</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Verified</label>
								</div>
								<div class="col-xs-1 text-center bl">
									<label>Confirmed</label>
								</div>
								<div class="col-xs-2 text-center brl">
									<label>Reported Last DMR</label>
								</div>
								<div class="col-xs-1 text-center">
									<label>Verified</label>
								</div>
								<div class="col-xs-1 text-center bl">
									<label>Confirmed</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-4 text-center">
								</div>
								<div class="col-xs-4 text-center bl">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-4 bl text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<?php 
							$labels = array('No. of maternal deaths in the covered area',
							'No. of infant deaths');
							for($i=1;$i<=count($labels);$i++){ ?>
							<div class="row">
								<div class="col-xs-4 cmargin27">
									<label><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2 zp text-center">
									<p><?php $var ='mv_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='mv_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center">
									<p><?php $var ='mv_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-2 zp text-center bg3">
									<p><?php $var ='mv_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='mv_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 zp text-center bg3">
									<p><?php $var ='mv_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div><?php } ?>
							<div class="row bc mt1 mb1">
								<div class="col-xs-12">
									<label>DISCUSSION AT DPIU  (The supervisor should discuss the issues identified with the EDO Health (H)/DHO/District Coordinator after every visit)</label>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-2 br text-center">
									<label>Sr. No.</label>
								</div>
								<div class="col-xs-5 br text-center">
									<label>Name of managers who attended the discussion</label>
								</div>
								<div class="col-xs-5 text-center">
									<label>Name of managers who attended the discussion</label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2  text-center">
								</div>
								<div class="col-xs-5 brl text-center">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-5 text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>1</label>
								</div>
								<div class="col-xs-5">
									<p><?php $var ='m1_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ='m1_name'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>2</label>
								</div>
								<div class="col-xs-5">
									<p><?php $var ='m2_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ='m2_name'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>3</label>
								</div>
								<div class="col-xs-5">
									<p><?php $var ='m3_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ='m3_name'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2 cmargin27 text-center">
									<label>4</label>
								</div>
								<div class="col-xs-5">
									<p><?php $var ='m4_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-5 bg3">
									<p><?php $var ='m4_name'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
								</div>
							</div>
							<div class="row bc">
								<div class="col-xs-6 br text-center ">
									<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-6  text-center">
									<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
								</div>
							</div>
							<div class="row bc bt">
								<div class="col-xs-2 text-center zp">
									<label>Issues Discussed</label>
								</div>
								<div class="col-xs-2 bl text-center zp">
									<label class="pt14 pb13">Actions agreed for DPIU</label>
								</div>
								<div class="col-xs-2 brl text-center zp">
									<label>Actions required at PPIU/FPIU</label>
								</div>
								<div class="col-xs-2 text-center zp">
									<label>Issues Discussed</label>
								</div>
								<div class="col-xs-2 bl text-center zp">
									<label class="pt14 pb13">Actions agreed for DPIU</label>
								</div>
								<div class="col-xs-2 brl text-center zp">
									<label>Actions required at PPIU/FPIU</label>
								</div>
							</div>
						<?php 
							for($i=1;$i<=5;$i++){ ?>
								<div class="row">
									<div class="col-xs-2">
										<p><?php $var ='id_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									<div class="col-xs-2">
										<p><?php $var ='id_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2">
										<p><?php $var ='id_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<p><?php $var ='id_r'.($i).'_f1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
										</div>
									<div class="col-xs-2 bg3">
										<p><?php $var ='id_r'.($i).'_f2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 bg3">
										<p><?php $var ='id_r'.($i).'_f3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
									</div>
								</div><?php 
							} 
						?>
						<div class="row bc mt1 mb1">
							<div class="col-xs-12">
								<label>Critical Issues (to be followed during next visit)</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-2  text-center">
								<label>Sr. No.</label>
							</div>
							<div class="col-xs-5 brl text-center">
								<label>Critical Issues</label>
							</div>
							<div class="col-xs-5 text-center">
								<label>Critical Issues</label>
							</div>
						</div>
						<div class="row bc bt">
							<div class="col-xs-2 text-center">
								<label></label>
							</div>
							<div class="col-xs-5 brl text-center">
								<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-5 text-center">
								<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>1</label>
							</div>
							<div class="col-xs-5">
								<p class="pt12"><?php $var ='ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-5 bg3">
								<p class="pt12"><?php $var ='ci_1'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>2</label>
							</div>
							<div class="col-xs-5">
								<p class="pt12"><?php $var ='ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-5 bg3">
								<p class="pt12"><?php $var ='ci_2'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>3</label>
							</div>
							<div class="col-xs-5">
								<p class="pt12"><?php $var ='ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-5 bg3">
								<p class="pt12"><?php $var ='ci_3'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>4</label>
							</div>
							<div class="col-xs-5">
								<p class="pt12"><?php $var ='ci_4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-5 bg3">
								<p class="pt12"><?php $var ='ci_4'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 cmargin27 text-center">
								<label>5</label>
							</div>
							<div class="col-xs-5">
								<p class="pt12"><?php $var ='ci_5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-5 bg3">
								<p class="pt12"><?php $var ='ci_5'; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
							</div>
						</div>
				
					</div> <!--end of rowlightbg-->
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