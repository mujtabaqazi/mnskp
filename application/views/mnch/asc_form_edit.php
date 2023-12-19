<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>CMW Administrative Supervisory Checklist || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">CMW Administrative Supervisory Checklist</div>
				<div class="panel-body">
					<?php 
					echo validation_errors();
					$action = $basePath."mnch/asc/save/".$id;
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart($action,$attributes); ?>
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label>Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >               
								<!--<label class="pt7 pb2"><?php //echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></label>-->
							</div>
							<div class="col-xs-3">
								 <label>Reporting month</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>Province</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
							<div class="col-xs-3">
								 <label>District</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="distcode"; echo isset($DataRow)?get_District_Name($DataRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>Health Facility ID</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-3">
								 <label>Name of Health Facility</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>Name of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-3">
								 <label>Designation of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
						</div>
						<div class="row" style="padding-bottom: 1px;">
							<div class="col-xs-12 cmargin27 bgcolcl text-center">
								<label>Section I. Basic information of CMW</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.1</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Name of CMW</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_CMW_Name($DataRow->cmwcode):''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.2</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">PNC registration No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var = "final_reg_no"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text" class="form-control" >
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.3</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Union Council of Deployment</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var = "uncode"; echo isset($DataRow)?get_UC_Name($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.4</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Union Council where currently working</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php $var = "uncode"; echo isset($DataRow)?get_UC_Name($DataRow->$var):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.5</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Address of CMW</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="address"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text" >
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.6</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">Catchment Area Population</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="population"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" >
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.7</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW Contact Number</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="contact_no";echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" >
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.8</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW Deployment date</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="deployment_date"; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="form-control dp anyOtherDate" type="text" >
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.9</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW working hours</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="working_hours"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text" >
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.10</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW sign board displayed</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='sign_board'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='sign_board'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.11</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">CMW is working with any other organization?</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='other_org_working'; echo isset($DataRow)?(($DataRow->$var!=NULL || $DataRow->$var!='')?'checked="checked"':''):''; ?> value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='other_org_working'; echo isset($DataRow)?(($DataRow->$var==NULL || $DataRow->$var=='')?'checked="checked"':''):''; ?> value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">1.12</label>
									</div>
									<div class="col-xs-10">
										<label class="pt7 pb2">If yes, mention the name of organization.</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="other_org_working"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text" >
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section II-A: Basic Equipment</label>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Available</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Functional</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'BP apparatus',
							'Stethoscope',
							'Fetoscope',
							'Emergency rechargeable light',
							'Baby weighing machine',
							'Weighting machine Adult',
							'Baby Warmer (Optional)',
							'Sterilizer (Electric 12 X 16)',
							'Normal delivery set',
							'Episiotomy set',
							'Safety box',
							'Bulb sucker',
							'Thermometer',
							'Measuring Tape',
							'Safe delivery kit (SDK) (Packed)',
							'Ambo bag with mask (If mask is not present, then it is incomplete)',
							'IUCD set',
							'Glucometer (Optional)',
							'Hemoglobin meter',
							'Manual Vacuum Aspiration (MVA) Kit'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">A.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='be_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='be_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='be_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='be_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section II.B Medicines</label>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Available</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Functional</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Iron and folate',
							'Vitamin A',
							'Cap: Amoxicillin',
							'Syp: Amoxicillin (or any other antibiotics)',
							'Tab: Mefnamic Acid',
							'Tab: Paracetamol',
							'Drops. Paracetamol',
							'Tab: Metronidazole (200mg and 400 mg)',
							'Canestine Vaginal Tablet with Applicator',
							'Inj. Oxytocin',
							'If Inj. Oxytocin is cold stored?',
							'Tab. Misoprostol',
							'Inj. Methergin 0.2mg',
							'Inj Magnesium Sulphate',
							'Inj Valium',
							'Inj Calcium gluconate',
							'Inj Dexamethasone',
							'N/S 500 ml, 1000 ml with drip sets',
							'Ringers Lactate 500 ml with drip sets',
							'Antiseptic solution (Pyodine, Alcohol)',
							'Chlorhexidine'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">B.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='med_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='med_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='med_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='med_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section II.C Family Planning commodities</label>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Available</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Functional</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Oral Contraceptive Pills',
							'Injectable',
							'IUCD',
							'Condoms',
							'Emergency Contraceptive Pill (ECP)'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">C.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='fp_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='fp_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='fp_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='fp_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section II. D Consumables</label>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Available</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Functional</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Urine dip stick',
							'Folly’s catheter',
							'Urine bag',
							'Syringes',
							'I/V cannulas',
							'Adhesive tape',
							'Gloves',
							'Face mask',
							'Apron',
							'Cotton',
							'Plastic sheet'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">D.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='con_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='con_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='con_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='con_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section II.E Furniture items</label>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Available</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Functional</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels = array(
							'Examination Couch',
							'Curtin screen',
							'Delivery table',
							'Office table',
							'Chair',
							'Client stool',
							'Almira'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">E.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='fi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='fi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='fi_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='fi_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-5">
								<label class="pt5">Section II. F CMW-MIS tools & Registers (Available stock should be enough for 3 months at least)</label>
							</div>
							<div class="col-xs-2 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Available</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3 brl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Currently used (Check for last month)</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt5">Remarks</label>
							</div>
						</div>
						<?php 
						$labels = array(
							'Daily Register',
							'Stock register',
							'MNCH Cards',
							'Partograph Charts',
							'Monthly Report Forms',
							'Health Education Material',
							'Family Planning Client cards',
							'Referral slips'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">F.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-4">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='stock_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='stock_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='stock_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='stock_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp">
									<input value="<?php $var ='stock_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section III. A Data</label>
							</div>
							<div class="col-xs-2 brl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Status</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt5">Remarks</label>
							</div>
						</div>
						<?php 
						$labels = array(
							'Is CMW daily register updated?',
							'Has CMW kept the copy of monthly report of previous month?',
							'Does the CMW Monthly Report Data tally with the Register data?',
							'Has CMW technical/administrative supervisor visited during last three months?'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">3.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<?php if($i==1){ ?>
										<div class="row">
											<div class="col-xs-6 zp">
												<label>Complete</label>&nbsp;
												<input <?php $var ='data_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="complete")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="complete" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp">
												<label>Timely</label>&nbsp;
												<input <?php $var ='data_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="timely")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="timely" class="mt9" type="radio">
											</div>
										</div><?php
									}else{ ?>
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Yes</label>&nbsp;
												<input <?php $var ='data_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6">
												<label>No</label>&nbsp;
												<input <?php $var ='data_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div><?php 
									} ?>
								</div>
								<div class="col-xs-2 zp">
									<input value="<?php $var ='data_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section III. B Disposal of Waste</label>
							</div>
							<div class="col-xs-2 brl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Status</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt5">Remarks</label>
							</div>
						</div>
						<?php 
						$labels = array(
							'Is the Placenta appropriately disposed through burial?',
							'Are blade/syringe/sharps burned or buried properly?'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">3.b.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='data_r'.($i+4).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='data_r'.($i+4).'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp">
									<input value="<?php $var ='data_r'.($i+4).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14 pb12">Section IV. Referrals</label>
							</div>
							<div class="col-xs-2 brl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Status</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 text-center">
								<label class="pt5">Remarks</label>
							</div>
						</div>
						<?php 
						$labels = array(
							'Number of referrals from LHWs/community workers to CMWin last month',
							'Number of referrals from CMW to health facility in last month',
							'List of referral health facilities for referrals with contact numbers is available',
							'Available mode of transport for referrals',
							'Number of referrals of Pregnant women for TT',
							'Number of newborns referred for BCG and / or OPV'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7">4.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-7">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>								
								<?php if($i ==3 || $i ==4){ ?>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Yes</label>&nbsp;
												<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6">
												<label>No</label>&nbsp;
												<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div><?php
								}else{ ?>
									<div class="col-xs-2 zp">
										<input value="<?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
									</div><?php
								} ?>
								<div class="col-xs-2 zp">
									<input value="<?php $var ='ref_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
								</div>
							</div><?php 
						} 
						?>
						<div class="row bc">
							<div class="col-xs-12">
								<label>Section V: Community/Service Users Satisfaction (Check, Observe and report by ticking ‘Yes’ or ‘No’)</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-1 br">
								<label>S.No.</label>
							</div>
							<div class="col-xs-9"></div>
							<div class="col-xs-1 brl">
								<label>Yes</label>
							</div>
							<div class="col-xs-1">
								<label>No</label>
							</div>
						</div>
						<?php 
						$labels = array(
							'CMW responsiveness/attitude',
							'Provision of quality ANC',
							'Provision of quality PNC',
							'Provision of quality PNC',
							'Provision of contraceptives (method opted by client)',
							'Timely Response to the call for delivery (Within 1 Hour)'
						);
						for($i=1; $i<=count($labels); $i++){ ?>
							<div class="row">
								<div class="col-xs-1">
									<label class="pt7 pb2">5.<?php echo $i; ?></label>
								</div>
								<div class="col-xs-9">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<label>Yes</label>&nbsp;
											<input <?php $var ='cs_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9 yesradio" type="radio">
										</div>
										<div class="col-xs-6">
											<label>No</label>&nbsp;
											<input <?php $var ='cs_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9 noradio" type="radio">
										</div>
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row bc mt1">
							<div class="col-xs-12">
								<label>Summary of Findings</label>
							</div>
						</div>
						<div class="row mt1">
							<div class="col-xs-12 zp">
								<textarea <?php $var ='summary'; ?> name="<?php echo $var; ?>" rows="5" class="form-control" placeholder="PLEASE GIVE WRITTEN AND VERBAL FEEDBACK TO THE CMW FOR IMPROVEMENT BASED ON THE ABOVE FINDINGS"><?php echo isset($DataRow)?$DataRow->$var:''; ?></textarea>
							</div>
						</div>
					</div><!--end of rowlightbg-->
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