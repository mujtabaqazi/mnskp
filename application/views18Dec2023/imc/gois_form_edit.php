<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>General Outlook - Instrument and Service Availability || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> General Outlook - Instrument and Service Availability Checklist</div>
				<div class="panel-body">
					<?php 
					echo validation_errors();
					$action = $basePath."imc/gois/save/".$id;
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart($action,$attributes); ?>
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >               
								<!-- <label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></label> -->
							</div>
							<div class="col-xs-3">
								 <label class="pt7 pb2">Reporting month</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
							<div class="col-xs-3">
								 <label class="pt7 pb2">Tehsil</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var = "tcode"; echo isset($DataRow)?get_Tehsil_Name($DataRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">Union Council</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var = "uncode"; echo isset($DataRow)?get_UC_Name($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-3">
								 <label class="pt7 pb2">Name of Health Facility</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label class="pt7 pb2">Name of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-3">
								 <label class="pt7 pb2">Designation of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>FACILITY DESCRIPTION</label>
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-2">
								<label class="pt7 pb2">Catchment Population</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php echo isset($DataRow)?get_Facility_Population($DataRow->facode):''; ?>" name="population" class="form-control numberclass noDots" type="text" >
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">List of monthly targets</label>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">EPI:</label>
							</div>
							<div class="col-xs-1">
								<input value="<?php $var ="epi_target"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" placeholder="EPI">
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">FP:</label>
							</div>
							<div class="col-xs-1">
								<input value="<?php $var ="fp_target"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" placeholder="FP">
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">Deliveries at HF:</label>
							</div>
							<div class="col-xs-1">
								<input value="<?php $var ="deliveries_target"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" placeholder="Deliveries at HF">
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">Live Births:</label>
							</div>
							<div class="col-xs-1">
								<input value="<?php $var ="births_target"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" placeholder="Live Births">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Sign Board of HF</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-left">
										<label>Available</label>&nbsp;
										<input <?php $var ='sign_board'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>Not available</label>&nbsp;
										<input <?php $var ='sign_board'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1">
								<label class="pt7 pb2">Sign Plates in the HF</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-left">
										<label>Available</label>&nbsp;
										<input <?php $var ='sign_plates'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>Not available</label>&nbsp;
										<input <?php $var ='sign_plates'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Health Education Material</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-left">
										<label>Displayed</label>&nbsp;
										<input <?php $var ='education_material'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>Not displayed</label>&nbsp;
										<input <?php $var ='education_material'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1">
								<label class="pt7 pb2">Monthly DHIS reports submitted</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-left">
										<label>Regular</label>&nbsp;
										<input <?php $var ='dhis_mr_stat'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>Irregular</label>&nbsp;
										<input <?php $var ='dhis_mr_stat'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">DHIS tools</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-left">
										<label>Available</label>&nbsp;
										<input <?php $var ='dhis_tools'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>Not available</label>&nbsp;
										<input <?php $var ='dhis_tools'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1">
								<label class="pt7 pb2">Last month DHIS report submitted</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-left">
										<label>Yes</label>&nbsp;
										<input <?php $var ='last_month_dhis_mr'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='last_month_dhis_mr'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>GENERAL OUTLOOK OF HF (Observe & Tick the relevant Box)</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">General condition of the building</label>
							</div>
							<div class="col-xs-2">
								<label>Good</label>&nbsp;
								<input <?php $var ='building'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Need Repair</label>&nbsp;
								<input <?php $var ='building'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Poor</label>&nbsp;
								<input <?php $var ='building'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Cleanliness</label>
							</div>
							<div class="col-xs-2">
								<label>Good</label>&nbsp;
								<input <?php $var ='cleanliness'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Satisfactory</label>&nbsp;
								<input <?php $var ='cleanliness'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Poor</label>&nbsp;
								<input <?php $var ='cleanliness'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Waiting area</label>
							</div>
							<div class="col-xs-2">
								<label>Common</label>&nbsp;
								<input <?php $var ='waiting_area'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Male</label>&nbsp;
								<input <?php $var ='waiting_area'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Female</label>&nbsp;
								<input <?php $var ='waiting_area'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">OPD Registration Desk</label>
							</div>
							<div class="col-xs-2">
								<label>Available</label>&nbsp;
								<input <?php $var ='opd_reg_desk'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Not available</label>&nbsp;
								<input <?php $var ='opd_reg_desk'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Furniture</label>
							</div>
							<div class="col-xs-2">
								<label>Available</label>&nbsp;
								<input <?php $var ='furniture'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Not available</label>&nbsp;
								<input <?php $var ='furniture'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Drinking water</label>
							</div>
							<div class="col-xs-2">
								<label>Available</label>&nbsp;
								<input <?php $var ='water'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Not available</label>&nbsp;
								<input <?php $var ='water'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Toilets</label>
							</div>
							<div class="col-xs-2">
								<label>Available</label>&nbsp;
								<input <?php $var ='toilets'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Not available</label>&nbsp;
								<input <?php $var ='toilets'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Waste management</label>
							</div>
							<div class="col-xs-2">
								<label>Available</label>&nbsp;
								<input <?php $var ='waste_mang'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Not available</label>&nbsp;
								<input <?php $var ='waste_mang'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Insecticide</label>
							</div>
							<div class="col-xs-2">
								<label>Sprayed</label>&nbsp;
								<input <?php $var ='insecticides'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>Not Sprayed</label>&nbsp;
								<input <?php $var ='insecticides'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Fumigation</label>
							</div>
							<div class="col-xs-2">
								<label>Yes</label>&nbsp;
								<input <?php $var ='fumigation'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<label>No</label>&nbsp;
								<input <?php $var ='fumigation'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="date_fumigation"; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control zp text-center anyOtherDate" placeholder="Date of last fumigation" type="text">
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14">Other Resources (tick the relevant box)</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-12">
										<label>Check Availability</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-12">
										<label>Check Functionality</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Electricity',
							'Generators (with fuel)',
							'Other power supplies',
							'Water supply'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-8">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='or_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='or_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='or_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='or_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14">Communications (tick the relevant box)</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-12">
										<label>Check Availability</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-12">
										<label>Check Functionality</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Telephone',
							'Fax',
							'Internet',
							'Ambulance',
							'Vehicle',
							'Motorcycles (for vaccinators)'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-8">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='c_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='c_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='c_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='c_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>MANAGERIAL INSTRUMENT AVAILABLE AT THE TIME OF VISIT (Tick the relevant box.Y for yes, N for No)</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2"><label>Attendance Register</label></div>
							<div class="col-xs-1 brl zp text-center"><label>Visitor Book</label>
							</div>
							<div class="col-xs-2 text-center"><label>Movement Book</label></div>
							<div class="col-xs-1 brl zp text-center"><label>Cash Book</label></div>
							<div class="col-xs-1 zp text-center"><label>Stock Register</label></div>
							<div class="col-xs-2 brl text-center"><label>Condomn Register</label>
							</div>
							<div class="col-xs-2 text-center"><label>DHIS Instruments</label></div>
							<div class="col-xs-1 bl"><label>Others</label></div>
						</div>
						<div class="row" style="background: rgb(251, 251, 251) none repeat scroll 0% 0%;">
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-1 bg4 zp">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp bg4">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2 bg4">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='mia_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
									</div>
									<div class="col-xs-6">
										<label>N</label>&nbsp;
										<input <?php $var ='mia_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp bg4">
								<input value="<?php $var ="mia_r1_f8"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control text-center" type="text">
							</div>
						</div>
						 <div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>SERVICES AVAILABLE AT HF (Tick the relevant box.Y for yes, N for No)</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt31">General services</label>
							</div>
							<div class="col-xs-10">
								<div class="row bc mt1">
									<div class="col-xs-2">
										<label>OPD</label>
									</div>
									<div class="col-xs-2 brl">
										<label>Dispensary</label>
									</div>
									<div class="col-xs-2">
										<label>ORT Corner</label>
									</div>
									<div class="col-xs-2 brl">
										<label>Laboratory</label>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<label>Radiology</label>
											</div>
											<div class="col-xs-4 brl">
												<label>Sonology</label>
											</div>
											<div class="col-xs-4">
												<label>Causality</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Y</label>&nbsp;
												<input <?php $var ='gs_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='gs_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Y</label>&nbsp;
												<input <?php $var ='gs_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='gs_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Y</label>&nbsp;
												<input <?php $var ='gs_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='gs_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Y</label>&nbsp;
												<input <?php $var ='gs_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='gs_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<div class="row">
													<div class="col-xs-6 text-right">
														<label>Y</label>&nbsp;
														<input <?php $var ='gs_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
													</div>
													<div class="col-xs-6">
														<label>N</label>&nbsp;
														<input <?php $var ='gs_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
													</div>
												</div>
											</div>
											<div class="col-xs-4 bg4">
												<div class="row">
													<div class="col-xs-6 text-right">
														<label>Y</label>&nbsp;
														<input <?php $var ='gs_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
													</div>
													<div class="col-xs-6">
														<label>N</label>&nbsp;
														<input <?php $var ='gs_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
													</div>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="row">
													<div class="col-xs-6 text-right">
														<label>Y</label>&nbsp;
														<input <?php $var ='gs_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
													</div>
													<div class="col-xs-6">
														<label>N</label>&nbsp;
														<input <?php $var ='gs_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label style="padding-top:50px;">Specific services</label>
							</div>
							<div class="col-xs-10">
								<div class="row bc mt1">
									<div class="col-xs-2">
										<label>FP</label>
									</div>
									<div class="col-xs-2 brl">
										<label class="pb20">Labor Room</label>
									</div>
									<div class="col-xs-2">
										<label>Dental</label>
									</div>
									<div class="col-xs-2 brl">
										<label class="pb20">Operation Theatre</label>
									</div>
									<div class="col-xs-4 zp">
										<div class="row">
											<div class="col-xs-4 text-center">
												<label>Indoor</label>
											</div>
											<div class="col-xs-4 brl">
												<label>Surgical Consultancy</label>
											</div>
											<div class="col-xs-4">
												<label>Others</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='ss_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='ss_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='ss_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='ss_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='ss_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='ss_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='ss_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='ss_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-6 text-center zp">
													<label>Y</label>&nbsp;
													<input <?php $var ='ss_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6 zp">
													<label>N</label>&nbsp;
													<input <?php $var ='ss_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-6 text-center zp">
													<label>Y</label>&nbsp;
													<input <?php $var ='ss_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6 zp">
													<label>N</label>&nbsp;
													<input <?php $var ='ss_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-6 text-center zp">
													<label>Y</label>&nbsp;
													<input <?php $var ='ss_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6 zp">
													<label>N</label>&nbsp;
													<input <?php $var ='ss_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
												</div>
											</div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt31">Preventive Programs</label>
							</div>
							<div class="col-xs-10">
								<div class="row bc mt1">
									<div class="col-xs-2">
										<label>EPI</label>
									</div>
									<div class="col-xs-2 brl">
										<label class="pb20">MNCH</label>
									</div>
									<div class="col-xs-2">
										<label>Nutrition</label>
									</div>
									<div class="col-xs-2 brl">
										<label class="pb20">TB</label>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<label>Malaria</label>
											</div>
											<div class="col-xs-4 brl">
												<label class="pb20">Hepatitis</label>
											</div>
											<div class="col-xs-4">
												<label>HIV</label>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='pp_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='pp_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='pp_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='pp_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='pp_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='pp_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-6">
												<label>Y</label>&nbsp;
												<input <?php $var ='pp_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
											</div>
											<div class="col-xs-6">
												<label>N</label>&nbsp;
												<input <?php $var ='pp_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-6 text-center zp">
													<label>Y</label>&nbsp;
													<input <?php $var ='pp_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6 zp">
													<label>N</label>&nbsp;
													<input <?php $var ='pp_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-6 text-center zp">
													<label>Y</label>&nbsp;
													<input <?php $var ='pp_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6 zp">
													<label>N</label>&nbsp;
													<input <?php $var ='pp_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-6 text-center zp">
													<label>Y</label>&nbsp;
													<input <?php $var ='pp_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
												</div>
												<div class="col-xs-6 zp">
													<label>N</label>&nbsp;
													<input <?php $var ='pp_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
												</div>
											</div>
										</div>
									  </div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7">Others (specify)</label>
							</div>
							<div class="col-xs-10 zp">
								<input value="<?php $var ="other_services"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="i.e CDD" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>GENERAL COMMENTS & RECOMMENDATIONS</label>
							</div>
						</div>
					</div><!--end of rowlightbg-->
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Observations</td>
											<td>
												<input value="<?php $var ="observations"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Observations" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues</td>
											<td>
												<input value="<?php $var ="issues"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Issues" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions</td>
											<td>
												<input value="<?php $var ="actions"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Actions" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
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
