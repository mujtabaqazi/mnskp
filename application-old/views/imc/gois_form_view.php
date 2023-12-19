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
	  <title>General Outlook - Instrument and Service Availability || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<?php if(isset($domain) && ($domain!='dhis')){ ?>
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
		<?php } ?>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center"> General Outlook - Instrument and Service Availability Checklist</div>
				<div class="panel-body">
					<div class="alignmentview">
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3">
								 <label>Date of visit</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-3">
								 <label>Reporting month</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>									
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>District</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
							</div>
							<div class="col-xs-3">
								 <label>Tehsil</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var = "tcode"; echo isset($DataRow)?get_Tehsil_Name($DataRow->$var):''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>Union Council</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var = "uncode"; echo isset($DataRow)?get_UC_Name($DataRow->$var):''; ?></p>
							</div>
							<div class="col-xs-3">
								 <label>Name of Health Facility</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								 <label>Name of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-3">
								 <label>Designation of Technical Supervisor</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
								<p><?php echo isset($DataRow)?get_Facility_Population($DataRow->facode):''; ?></p>
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
								<p><?php $var ="epi_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">FP:</label>
							</div>
							<div class="col-xs-1">
								<p><?php $var ="fp_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">Deliveries at HF:</label>
							</div>
							<div class="col-xs-1">
								<p><?php $var ="deliveries_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-1">
								<label class="pt7 pb2">Live Births:</label>
							</div>
							<div class="col-xs-1">
								<p><?php $var ="births_target"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Sign Board of HF</label>
							</div>
							<div class="col-xs-3">
								<div class="row">									
									<div class="col-xs-12 text-center">
										<p><?php $var ='sign_board'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1">
								<label class="pt7 pb2">Sign Plates in the HF</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='sign_plates'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
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
									<div class="col-xs-12 text-center">
										<p><?php $var ='education_material'; echo isset($DataRow)?(($DataRow->$var=="1")?'Displayed':'Not displayed'):'Not displayed'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1">
								<label class="pt7 pb2">Monthly DHIS reports submitted</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='dhis_mr_stat'; echo isset($DataRow)?(($DataRow->$var=="1")?'Regular':'Irregular'):'Irregular'; ?></p>
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
									<div class="col-xs-12 text-center">
										<p><?php $var ='dhis_tools'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 col-xs-offset-1">
								<label class="pt7 pb2">Last month DHIS report submitted</label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='last_month_dhis_mr'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>GENERAL OUTLOOK OF HF</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">General condition of the building</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='building'; echo isset($DataRow)?(($DataRow->$var=="1")?'Good':(($DataRow->$var=="2")?'Need Repair':'Poor')):'Poor'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Cleanliness</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='cleanliness'; echo isset($DataRow)?(($DataRow->$var=="1")?'Good':(($DataRow->$var=="2")?'Satisfactory':'Poor')):'Poor'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Waiting area</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='waiting_area'; echo isset($DataRow)?(($DataRow->$var=="1")?'Male':(($DataRow->$var=="2")?'Common':'Female')):'Female'; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">OPD Registration Desk</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='opd_reg_desk'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Furniture</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='furniture'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Drinking water</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='water'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Toilets</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='toilets'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Waste management</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='waste_mang'; echo isset($DataRow)?(($DataRow->$var=="1")?'Available':'Not available'):'Not available'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Insecticide</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='insecticides'; echo isset($DataRow)?(($DataRow->$var=="1")?'Sprayed':'Not Sprayed'):'Not Sprayed'; ?></p>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Fumigation</label>
							</div>
							<div class="col-xs-4 text-center">
								<p><?php $var ='fumigation'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
							</div>
							<div class="col-xs-2">
								<p><?php $var ="date_fumigation"; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14">Other Resources</label>
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
									<p><?php echo $labels[$i-1]; ?></p>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<p><?php $var ='or_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':''):''; ?></p>
										</div>
										<div class="col-xs-6">
											<p><?php $var ='or_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':''):''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<p><?php $var ='or_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':''):''; ?></p>
										</div>
										<div class="col-xs-6">
											<p><?php $var ='or_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':''):''; ?></p>
										</div>
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row bc mt1">
							<div class="col-xs-8">
								<label class="pt14">Communications</label>
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
									<p><?php echo $labels[$i-1]; ?></p>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<p><?php $var ='c_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':''):''; ?></p>
										</div>
										<div class="col-xs-6">
											<p><?php $var ='c_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':''):''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2">
									<div class="row">
										<div class="col-xs-6 text-right">
											<p><?php $var ='c_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':''):''; ?></p>
										</div>
										<div class="col-xs-6">
											<p><?php $var ='c_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':''):''; ?></p>
										</div>
									</div>
								</div>
							</div><?php 
						}?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>MANAGERIAL INSTRUMENT AVAILABLE AT THE TIME OF VISIT (<?php echo '&#10004;'; ?> for yes)</label>
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
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 bg4 zp">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp bg4">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 bg4">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-12 text-center">
										<p><?php $var ='mia_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp bg4">
								<p><?php $var ="mia_r1_f8"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						 <div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>SERVICES AVAILABLE AT HF (<?php echo '&#10004;'; ?> for yes)</label>
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
											<div class="col-xs-12 text-center">
												<p><?php $var ='gs_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='gs_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='gs_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='gs_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-4 text-center">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p><?php $var ='gs_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-4 bg4">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p><?php $var ='gs_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
													</div>
												</div>
											</div>
											<div class="col-xs-4">
												<div class="row">
													<div class="col-xs-12 text-center">
														<p><?php $var ='gs_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
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
											<div class="col-xs-12 text-center">
												<p><?php $var ='ss_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='ss_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='ss_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='ss_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='ss_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='ss_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='ss_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
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
												<label>Hepatitis</label>
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
											<div class="col-xs-12 text-center">
												<p><?php $var ='pp_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='pp_r1_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bgw">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='pp_r1_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-2 bg4">
										<div class="row">
											<div class="col-xs-12 text-center">
												<p><?php $var ='pp_r1_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
											</div>
										</div>
									</div>
									<div class="col-xs-4">
									  <div class="row">
										<div class="col-xs-4 text-center">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='pp_r1_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4 bg4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='pp_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-4">
											<div class="row">
												<div class="col-xs-12 text-center">
													<p><?php $var ='pp_r1_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#x2716;'):'&#x2716;'; ?></p>
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
								<p><?php $var ="other_services"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
					</div><!--end of rowlightbg-->
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>GENERAL COMMENTS & RECOMMENDATIONS</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Observations</td>
											<td>
												<p><?php $var ="observations"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues</td>
											<td>
												<p><?php $var ="issues"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions</td>
											<td>
												<p><?php $var ="actions"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					
					</div><!--end of alignmentview-->
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<?php if($DataRow->submitted_by==$userId){ ?>
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>imc/forms/gois_edit/<?php echo $vpvc_id; ?>">
									<i class="fa fa-pencil-square-o"></i> Update  
								</a>
							<?php } ?>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php if(isset($domain) && ($domain!='dhis')){ ?>
		<?php $this->load->view("templates/footer"); ?>
		<?php } ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>imc/forms/gois_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>