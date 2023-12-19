<?php 
$basePath = base_url();
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session ->ptype;


$totalchklst 	= $this -> session ->totalchklst;
if($this->session->username=="dashboard"){//mean user from shis
	//dont show menu
}else{
?>
<div id="nav">
	<nav id='nav_bar'>
		<div class="navbar navbar-default main-dropdown menu" role="navigation">
			<div class="navbar-header main-dropdown-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $basePath."home"; ?>">Home</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<?php
					//user management
					if ((($ulevel=='1') || ($ulevel=='2')) && ($utype=='Admin')) {?>
						<li class="dropdown lih">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Settings<span class="caret"></span></a>
							<ul class="dropdown-menu leve1">
								<li class="dropdown-submenu">
									<a tabindex="-1" href="#">User Management</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $basePath."users/lists"; ?>">User Management</a></li>
										<li><a href="<?php echo $basePath."users/loginlog"; ?>">Login Logs</a></li>
										<li><a href="<?php echo $basePath."users/activities"; ?>">Activities Log</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="#">lookups Management</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $basePath."settings/programs/"; ?>">Programs Management</a></li>
										<li><a href="<?php echo $basePath."settings/hcptypes/"; ?>">HCP Types Management</a></li>
										<li><a href="<?php echo $basePath."settings/checklists/"; ?>">Checklists Management</a></li>
										<li><a href="<?php echo $basePath."settings/designations/"; ?>">Designations Management</a></li>
										<li><a href="<?php echo $basePath."settings/lqaspool/"; ?>">LQAS Pool Management</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="#">System Setup</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $basePath."settings/config/"; ?>">Basic Configuration</a></li>
										<li><a href="<?php echo $basePath."settings/ude/"; ?>">Unfreeze Data Entry Management</a></li>
										<li><a href="<?php echo $basePath."settings/fde/"; ?>">Freeze Data Entry Management</a></li>
										<li><a href="<?php echo $basePath."settings/setup/undo_approve_list"; ?>">Undo Approved Plan</a></li>
									</ul>
								</li>
								<li class="dropdown-submenu">
									<a tabindex="-1" href="#">Setup List</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $basePath."setup/district_list"; ?>">District List</a></li>
										<li><a href="<?php echo $basePath."setup/tehsil_list"; ?>">Tehsil List</a></li>
										<li><a href="<?php echo $basePath."setup/uc_list"; ?>">Union Council List</a></li>
										<li><a href="<?php echo $basePath."setup/facility_list"; ?>">Facility List</a></li>
									</ul>
								</li>
							</ul>
						</li><?php 
					}
					//Checklists
					if (!((($ulevel=='1') || ($ulevel=='2')) && ($utype=='Admin'))) {?>
						<li class="dropdown lih">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Checklists<span class="caret"></span></a>
							<ul class="dropdown-menu leve1">
								<li class="dropdown-submenu"><?php
									//Checklist for DOH Facilities
									if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='doh'))) {?>
										<!--DOH-->
										<a href="#" tabindex="-1">DOH Facilities</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."imc/listing/gois"; ?>">1-General Outlook and Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/mnch"; ?>">2-Maternal & Child Health Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/sba"; ?>">3-SBA Technical Monitoring Checklist</a></li>
											<li><a href="<?php echo $basePath."imc/listing/nutrition"; ?>">4-Nutrition Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/epi"; ?>">5-EPI Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/fp"; ?>">6-Family Planning Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/lhw"; ?>">7-LHW Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/malaria"; ?>">8-Malaria Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/tbc"; ?>">9-TB Control Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/hepatitis"; ?>">10-Hepatitis Control Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/hivaid"; ?>">11-HIV-AIDS Control Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/opd"; ?>">12-General Services - OPD Room</a></li>
											<li><a href="<?php echo $basePath."imc/listing/indoor"; ?>">13-General Services - Indoor Wards</a></li>
											<li><a href="<?php echo $basePath."imc/listing/labourroom"; ?>">14-General Services - Labour Room</a></li>
											<li><a href="<?php echo $basePath."imc/listing/ot"; ?>">15-General Services - Operation Theater</a></li>
											<li><a href="<?php echo $basePath."imc/listing/rls"; ?>">16-Radiology & Laboratory Services</a></li>
											<li><a href="<?php echo $basePath."imc/listing/soi"; ?>">17-List of Surgical & Obstetrical Instruments</a></li>
											<li><a href="<?php echo $basePath."imc/listing/medicine"; ?>">18-List of Essential Medicines Stockout</a></li>
											<li><a href="<?php echo $basePath."imc/listing/hr"; ?>">19-Human Resource</a></li>
											<li><a href="<?php echo $basePath."imc/listing/staff"; ?>">20-Available Staff Trained in the Areas</a></li>
											<li><a href="<?php echo $basePath."imc/listing/hfstore"; ?>">21-Health Facility Store</a></li>
										</ul><?php 
									}?>
								</li>
								<?php 
								//LHW Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='lhw') || ($ptype=='lmn') || ($ptype=='lhwMnchNutrition'))) {?>
									<!--LHW-->
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">LHW Program</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."lhw/listing/dpiu"; ?>">1-District Program Implementation Unit</a></li>
											<li><a href="<?php echo $basePath."lhw/listing/hf"; ?>">2-Health Facility</a></li>
											<li><a href="<?php echo $basePath."lhw/listing/lhs"; ?>">3-Lady Health Supervisor</a></li> 
											<li><a href="<?php echo $basePath."lhw/listing/lhw"; ?>">4-Health House & Lady Health Worker</a></li>
											<li><a href="<?php echo $basePath."lhw/listing/lmne"; ?>">5-Logistic Monitoring/Evaluation</a></li>
											<li><a href="<?php echo $basePath."lhw/listing/dtr"; ?>">6-District Tour Report</a></li>
										</ul>
									</li><?php 
								}
								
								//EPI Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='epi'))) {?>
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">EPI Program</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."epi/listing/activities"; ?>">1-Checklist for EPI activities (Only for Health Facilities with Functional EPI Centre)</a></li>
											<li><a href="<?php echo $basePath."epi/listing/monitoring"; ?>">2-Monitoring and Supervisory</a></li>
										</ul>
									</li><?php 
								}

								//Hepatitis Control Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='hcp'))) {?>
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">Hepatitis Program</a>
										<ul class="dropdown-menu">	
											<li><a href="<?php echo $basePath."hcp/listing/monitoring"; ?>">1-Visit Report/ Checklist of Monitoring Officers</a></li>
										</ul>
									</li><?php 
								}

								//MNCH Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') ||($ptype=='lmn')  || ($ptype=='mnch') || ($ptype=='lhwMnchNutrition'))) {?>
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">MNCH Program</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."mnch/listing/mmschool"; ?>">1-Monthly Monitoring of CMW/Nursing and Midwifery/Public Health School</a></li>
											<li><a href="<?php echo $basePath."mnch/listing/smschool"; ?>">2-Six monthly Monitoring of CMW/Nursing and Midwifery/Public Health School</a></li>
											<li><a href="<?php echo $basePath."mnch/listing/asc"; ?>">3-CMW’s Administrative Supervisory Checklist</a></li>
											<li><a href="<?php echo $basePath."mnch/listing/tmc"; ?>">4-CMW’s Technical Monitoring Checklist</a></li>
											<li><a href="<?php echo $basePath."mnch/listing/emonc"; ?>">5-Quarterly Health Facility status Checklist (B-EmONC and C-EmONC)</a></li>
										</ul>
									</li><?php 
								}

								//TB Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype==		'Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='tbc'))) {?>
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">TB Program</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."tbc/listing/bmu"; ?>">1-Monitoring Evaluation Checklist for Basic Management Unit (BMU)</a></li>
											<li><a href="<?php echo $basePath."tbc/listing/mdr"; ?>">2-Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit</a></li>
											<li><a href="<?php echo $basePath."tbc/listing/stores"; ?>">3-Monitoring checklist for Provincial warehouse/District stores</a></li>
										</ul>
									</li><?php 
								}

								//Nutrition Support Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') ||($ptype=='lmn') || ($ptype=='nutrition') || ($ptype=='lhwMnchNutrition'))) {?>
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">Nutrition Program</a>
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."/nutrition/listing/Stabilization"; ?>">1-Monitoring Checklist for Nutrition Stabilization Centers</a></li>
											<li><a href="<?php echo $basePath."/nutrition/listing/iycf"; ?>">2-Infant Young Child Feeding (IYCF) Checklist of Health Facility</a></li>
											<li><a href="<?php echo $basePath."/nutrition/listing/mmhf"; ?>">3-Monthly Monitoring Checklist of Health Facility</a></li>
											<li><a href="<?php echo $basePath."/nutrition/listing/smc"; ?>">4-Monitoring and Supervision Checklist for Social Mobilizers at Community</a></li>
											<li><a href="<?php echo $basePath."/nutrition/listing/warehouse"; ?>">5-Monthly Monitoring Checklist of Warehouse at Districts</a></li>
										</ul>
									</li><?php 
								}
								//Malaria Control Program
								if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='mcp'))) {?>
									<li class="dropdown-submenu">
										<a href="#" tabindex="-1">Malaria Program
										<ul class="dropdown-menu">
											<li><a href="<?php echo $basePath."/mcp/listing/llin"; ?>">1-Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center</a></li>
											<li><a href="<?php echo $basePath."/mcp/listing/irs"; ?>">2-Supervisory Checklist Indoor Residual Spray (IRS) Operations</a></li>
											<li><a href="<?php echo $basePath."/mcp/listing/mc"; ?>">3-Checklist for Microscopy Center</a></li>
											<li><a href="<?php echo $basePath."/mcp/listing/rdt"; ?>">4-Checklist for Rapid Diagnostic Test (RDT) Center</a></li>
										</ul>
									</li><?php 
								}?>
								<?php if(!($ptype=='lhwMnchNutrition' || $ptype=='lmn')) { ?>
								<li class="dropdown-submenu">
									<!--DHIS-->
									<a href="#" tabindex="-1">DHIS</a>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $basePath."da/listing/lqas"; ?>">1-Data Accuracy Using LQAS Techniques</a></li><?php 
										if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='ProExecutive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='doh'))) {?>
											<li><a href="<?php echo $basePath."da/listing/mnecellact"; ?>">2-Report of Hand-on Support Activity - M&E Cell</a></li>
											<li><a href="<?php echo $basePath."da/listing/facilityact"; ?>">3-Report of Hand-on Support Activity - Health Facility</a></li><?php 
										}?>
									</ul>
								</li>
								<?php } ?>
							</ul>
						</li><?php
					}
					//Supervisory Plan
					if (!((($ulevel=='1') || ($ulevel=='2')) && ($utype=='Admin'))) {?>
						<li class="dropdown lih">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Supervisory Plan<span class="caret"></span></a>
							<ul class="dropdown-menu leve1">
								<?php if ($totalchklst > 0) { ?>
									<li><a href="<?php echo $basePath."plans/lists"; ?>">My Plan</a></li>
								<?php } if (($ulevel=='2' || $ulevel=='3') && ($utype=='Admin' || $utype=='Executive' || $utype=='ProExecutive' || $utype=='Manager')) { ?>
									<li><a href="<?php echo $basePath."plans/managers_lists"; ?>">All Plan</a></li><?php 
									if (($utype=='Executive' && $ulevel=='3') || ($utype == 'ProExecutive' && $ulevel=='2')) { ?>
										<li><a href="<?php echo $basePath."plans/approve_list"; ?>">Approve Plan</a></li><?php 
									}
									if ($utype=='Executive' && $ulevel=='2') { ?>
										<li><a href="<?php echo $basePath."plans/dg_approve"; ?>">Approve Plan</a></li>
										<li><a href="<?php echo $basePath."plans/approve_list"; ?>">View Approved Plan</a></li><?php 
									} 
								}?>
							</ul>
						</li><?php
					}
					//Submission of Report
					if (!((($ulevel=='1') || ($ulevel=='2')) && ($utype=='Admin'))) {?>
						<li class="dropdown lih">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Submission of Report<span class="caret"></span></a> 
							<ul class="dropdown-menu leve1">
								<li><a href="<?php echo $basePath."Reports_Submission/getPlan/".date('Y-m'); ?>"><?php echo date('M Y'); ?></a></li>
								<?php 
								$freezeday = get_de_freeze_day();
								if(date("d")<= $freezeday){
									$baseTime = strtotime(date('Y-m',time()) . '-01 00:00:01'); ?>
									<li><a href="<?php echo $basePath."Reports_Submission/getPlan/".date('Y-m', strtotime('-1 month',$baseTime)); ?>"><?php echo date('M Y', strtotime('-1 month',$baseTime)); ?></a></li><?php 
								}
								//if user's special fmonth is enabled make a submission link
								$specialfmonth = $this -> session -> de_special_fmonth;
								if($specialfmonth){ ?>
									<li><a href="<?php echo $basePath."Reports_Submission/getPlan/".$specialfmonth; ?>"><?php echo date('M Y',strtotime($specialfmonth."-01")); ?></a></li><?php 
								}
								?>
							</ul>
						</li><?php 
					} ?>
					<li class="dropdown lih">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports<span class="caret"></span></a>
						<ul class="dropdown-menu leve1">
							<li class="dropdown-submenu">
								<a tabindex="-1" href="#">Compliance Reports</a>
								<?php 
								//Compliances
								if (($ulevel=='2' || $ulevel=='3') && ($utype=='Executive' || $utype=='ProExecutive')) {?>
									<ul class="dropdown-menu"><?php
										if($ulevel=='2'){ ?>
											<li><a href="<?php echo $basePath."filled-planned-chklsts"; ?>">Planned vs Filled Checklists Compliance</a></li>
											<li><a href="<?php echo $basePath."planned-held-visits"; ?>">Planned vs Held Visits Compliance</a></li><?php 
										}
										if($utype=='Executive'){ ?>
											<li><a href="<?php echo $basePath."prgrm-visits-chklsts"; ?>">Programs Planned vs Held/Submitted Visits/Checklists Compliance</a></li><?php
										}
										if($ulevel=='3'){ ?>
											<li><a href="<?php echo $basePath."sup-visits-chklsts"; ?>">Supervisors Planned vs Held/Submitted Visits/Checklists Compliance</a></li><?php
										}?>
									</ul><?php
								}?>								
							</li>
							<!--<li class="dropdown-submenu">
								<a tabindex="-1" href="#">Analytical Reports</a>
							</li>
							<li class="dropdown-submenu">
								<a tabindex="-1" href="#">Setup Reports</a>
							</li>-->
							<li class="dropdown-submenu">
								<a tabindex="-1" href="#">Other Reports</a>
								<?php
								//Compliances
								if (($ulevel=='2' || $ulevel=='3') && ($utype=='Executive' || $utype=='ProExecutive')) {?>
									<ul class="dropdown-menu">
										<li><a href="<?php echo $basePath."filled-chklsts-status"; ?>">Checklists Wise Filled Status</a></li>
									</ul><?php
								}?>								
							</li>
						</ul>
					</li>
					<li class="lih">
						<a href="<?php echo $basePath."dashboard"; ?>" target="_blank">Dashboard</a>
					</li>
					<li class="lih">
						<a href="<?php echo $basePath."contents/downloads"; ?>" target="_blank">Download Checklists</a>
					</li>
					
				</ul>
			</div>
		</div><!--end of menu-container-->
	</nav>
</div>
<?php } ?>
<br />