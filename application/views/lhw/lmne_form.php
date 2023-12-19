<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>LMNE || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Logistics Monitoring/Evaluation 
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."lhw/lmne/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id);
					echo form_open_multipart($action,$attributes,$hidden); ?>       
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3 col-xs-offset-1  mt7">
								<label>Reporting month</label>
							</div>
							<div class="col-xs-2">
								<input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fmonth:''; ?>" readonly="readonly" >
							</div>
							<div class="col-xs-3 mt7">
								<label>Province</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-xs-offset-1  mt7">
								<label>Name of District</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->district:''; ?></label>
							</div>
							<div class="col-xs-3 mt7">
								<label>Name of FLCF</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >								
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
						</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 mt7">
						<label>Name of District Coordinator</label>
					  </div>
						<div class="col-xs-2">
							<input value="<?php $var ="district_coordinator_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						</div>
						<div class="col-xs-3  mt7">
						<label>Name of In-charge FLCF</label>
					  </div>
						<div class="col-xs-2">
							<input value="<?php $var ="incharge_flcf_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 mt7">
						<label>In-charge Store</label>
					  </div>
						<div class="col-xs-2">
							<input value="<?php $var ="incharge_store_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						</div>
						<div class="col-xs-3 mt7">
						<label>In-charge Logistics</label>
					  </div>
						<div class="col-xs-2">
							<input value="<?php $var ="incharge_store_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 mt7">
						<label>Name of DHIS/HMIS Person</label>
					  </div>
						<div class="col-xs-2">
							<input value="<?php $var ="dhis_person_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						</div>
						<div class="col-xs-3 mt7">
						<label>Designation of DHIS/HMIS Person</label>
					  </div>
						<div class="col-xs-2">
							<input value="<?php $var ="dhis_person_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 mt7">
						<label>Number of LHWs</label>
					  </div>
					  <div class="col-xs-2">
						<input value="<?php $var ="total_lhws"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					  </div>
						<div class="col-xs-3 mt7">
							<label>Is a separate space for the storage of contraceptives/general medicine provided?</label>
						</div>
						<div class="col-xs-1  text-center">
							<label>Yes</label> <input value="1" class="mt9" <?php $var ="storage_space"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
						</div>
						<div class="col-xs-1 text-center">
							<label>No</label> <input value="0" class="mt9" <?php $var ="storage_space"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
						</div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label>6. Store Specification</label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 mt7">
						<label>Location</label>
					  </div>
					  <div class="col-xs-2">
						<input value="<?php $var ="ss_location"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					  <div class="col-xs-3 mt7">
						<label>Measurements of present space?</label>
					  </div>
					  <div class="col-xs-2">
						<input value="<?php $var ="ss_measurement"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 mt7">
						<label>Is the present space adequate?</label>
					  </div>
					  <div class="col-xs-2">
						<input value="<?php $var ="ss_adequate"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					  <div class="col-xs-3 mt7">
						<label>If no, area required in sq. ft.</label>
					  </div>
					  <div class="col-xs-2">
						<input value="<?php $var ="ss_area"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					  </div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label>7. Maintenance of Stores</label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Cleanliness</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_cleanliness"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_cleanliness"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Whitewash</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_whitewash"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_whitewash"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Ceiling Condition (No Leakage etc.)</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_ceiling"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_ceiling"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Floor cemented</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_cemented"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_cemented"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Ventilation</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_ventilation"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_ventilation"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Light</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_light"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_light"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						 <label class="mt5">Fire-fighting equipment</label>
					  </div>
					  <div class="col-xs-1  text-center">
						 <label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_ff_equipment"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_ff_equipment"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Door/Windows</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_door_windows"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_door_windows"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Direct Sunlight is penetrating in</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_sunlight"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_sunlight"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">Secure</label>
					  </div>
					  <div class="col-xs-1  text-center">
						<label>Yes</label> <input value="1" class="mt9" <?php $var ="ms_security"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label> <input value="0" class="mt9" <?php $var ="ms_security"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label></label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">8. Are storerooms disinfected and sprayed every third month against insects, rodents andbi</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="sr_sprayed"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="sr_sprayed"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">9. Is stacking of cartons four (4) inches of the floor? (Using wooden planks and approximately two (2) feet away from any wall).</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9"  <?php $var ="cartons_stacking"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="cartons_stacking"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">10. Is each consignment stacked separately? (To facilitate counting and access to hind stack?)</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="consignment"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="consignment"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">11. Is fist-expiry-fist out (FEFO) method followed?</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="fefo"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="fefo"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">12. Are stacks more than eight (8) feet high?</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="stacks_8feet"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="stacks_8feet"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">13. Are marking, labels, manufacturing or expiry dates visible?</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="dates_visible"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="dates_visible"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">14. Has each stack a Bin Card?</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="bin_card"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="bin_card"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">15. If yes? Entries proper</label>
					  </div>
					  <div class="col-xs-1 text-center">
						<label>Yes</label>&nbsp;<input value="1" class="mt9" <?php $var ="entries_proper"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-1 text-center">
						<label>No</label>&nbsp;<input value="0" class="mt9" <?php $var ="entries_proper"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">16. How many times in the last quarter the following officials have visited your store?</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 bc text-center">
						<label>Officials</label>
					  </div>
					  <div class="col-xs-2 bc bl text-center">
						<label>Number of Times</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 mt7">
						<label>EDO(H)/DOH</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="edo_dho_visits"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 mt7">
						<label>District Coordinator</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="dc_visits"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 mt7">
						<label>Program Officer</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="po_visits"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 mt7">
						<label>Any Other</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="other_visits"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-4 col-xs-offset-1">
						<label class="mt5">17. Frequency of supply received from PPIU/DPIU</label>
					  </div>
					  <div class="col-xs-2">
						<label>Monthly</label>&nbsp;<input value="Monthly" class="mt9" <?php $var ="supply_frequency"; echo isset($DataRow)?(($DataRow->$var=="Monthly")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-2">
						<label>Quarterly</label>&nbsp;<input value="Quarterly" class="mt9" <?php $var ="supply_frequency"; echo isset($DataRow)?(($DataRow->$var=="Quarterly")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					  <div class="col-xs-2">
						<label>Irregular</label>&nbsp;<input value="Irregular" class="mt9" <?php $var ="supply_frequency"; echo isset($DataRow)?(($DataRow->$var=="Irregular")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" type="radio">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">18. What is the average time between a FLCF/District request for medicines/supplies and receipt against that indent?</label>
					  </div>
					  <div class="col-xs-1 zp">
					  	<input value="<?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control numberclass noDots" placeholder="Weeks">
					  </div>
					  <div class="col-xs-1 zp">
					  	<input value="<?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control numberclass noDots" placeholder="Months">
					  </div>
					</div>
					<!-- <div class="row">
					  <div class="col-xs-3 col-xs-offset-3">
						<div class="input-group">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>1.</span>
							</a>
						  </div>
						  <input value="<?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control" type="Search">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>Weeks</span>
							</a>
						  </div>
						</div>                         
					  </div>
					  <div class="col-xs-3">
						<div class="input-group">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>2.</span>
							</a>
						  </div>
						  <input value="<?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control" type="Search">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>Months</span>
							</a>
						  </div>
						</div>                         
					  </div>
					</div> -->
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="mt5">10.  Mode of Transportation:</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2 col-xs-offset-3">
						<label class="mt5">From PPIU to DPIU:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="ppiu_dpiu_trans"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					  <div class="col-xs-2">
						<label class="mt5">From DPIU to FLCF:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="dpiu_flcf_trans"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2 col-xs-offset-3">
						<label class="mt5">Date:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="store_date"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
					  </div>
					  <div class="col-xs-2">
						<label class="mt5">Time:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="store_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="single-input form-control" type="text">
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2 col-xs-offset-3">
						<label class="mt5">Location:</label>
					  </div>
						<div class="col-xs-2 zp">
							<select <?php $var = "store_location"; ?> name="<?php echo $var; ?>" class="form-control text-center">
								<option value="Health House/FLCF">Health House/FLCF</option>
								<option value="District">District</option>
								<option value="PPIU Warehouse">PPIU Warehouse</option>
								<option value="Central Warehouse">Central Warehouse</option>
							</select>
						</div>
					  <div class="col-xs-2 mt7">
						<label></label>
					  </div>
					  <div class="col-xs-2 zp">
					</div>
					</div>
					<div class="row bc">
					  <div class="col-xs-2 text-center">
						<label class="pt10">Items</label>
					  </div>
					  <div class="col-xs-2 brl zp text-center">
						<label>Items found to be out of stock at the time of inspection?</label>
					  </div>
					  <div class="col-xs-2 text-center">
						<label class="pt10">Any stock found expired?</label>
					  </div>
					  <div class="col-xs-2 brl text-center">
						<label>Physically counted stock in hand(# Units)</label>
					  </div>
					  <div class="col-xs-2 br text-center">
						<label>Quantity recorded on Bin Card (Stock Ledger)</label>
					  </div>
					  <div class="col-xs-2 text-center">
						<label class="pt10">Quantity</label>
					  </div>
					</div>
					<?php
					$labels = array(
						'Paracetamole Tablets',
						'Paracetamole Syrup',
						'Cholorquine Tablets',
						'Cholorquine Syrup',
						'Cotrimoxazol Syrup',
						'Piperzine Syrup',
						'Ferrous Fumate & Folic Acid Tablets',
						'Sticking Plaster',
						'Antiseptic Lotion',
						'Cotton Wool',
						'Cotton Bandages',
						'Eye Ointment (Polyfax)',
						'Oral Rehydration Solution (ORS)',
						'Benzyl Benzoate Lotion',
						'B. Complex Syrup',
						'Geomizol tablets',
						'Condoms',
						'Oral Contraceptive Pills',
						'Inj. Depo Provera',
						'IUCDs'
					);
					for($i=1;$i<=count($labels); $i++)
					{
						?>
						<div class="row">
						  <div class="col-xs-2">
							<label class="mt5"><?php echo $labels[$i-1]; ?></label>
						  </div>
						  <div class="col-xs-2">
						  	<div class="row">
						  		<div class="col-xs-6 text-right">
						  			<label>Yes</label>&nbsp;
						  			<input <?php $var = "so_r".$i."_f1"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
						  		</div>
						  		<div class="col-xs-6">
						  			<label>No</label>&nbsp;
						  			<input <?php $var = "so_r".$i."_f1"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
						  		</div>
						  	</div>
						  </div>
						  <div class="col-xs-2">
							 <div class="row">
						  		<div class="col-xs-6 text-right">
						  			<label>Yes</label>&nbsp;
						  			<input <?php $var = "so_r".$i."_f2"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
						  		</div>
						  		<div class="col-xs-6">
						  			<label>No</label>&nbsp;
						  			<input <?php $var = "so_r".$i."_f2"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
						  		</div>
						  	</div>
						  </div>
						  <div class="col-xs-2 zp">
							<input value="<?php $var ="so_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						  </div>
						  <div class="col-xs-2 zp">
							<input value="<?php $var ="so_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
						  </div>
						  <div class="col-xs-2 zp">
							<div class="row">
						  		<div class="col-xs-6 text-center">
						  			<label>Short</label>&nbsp;
						  			<input <?php $var = "so_r".$i."_f5"; echo isset($DataRow)?(($DataRow->$var=="short")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="short" class="mt9" type="radio">
						  		</div>
						  		<div class="col-xs-6">
						  			<label>Excess</label>&nbsp;
						  			<input <?php $var = "so_r".$i."_f5"; echo isset($DataRow)?(($DataRow->$var=="excess")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="excess" class="mt9" type="radio">
						  		</div>
						  	</div>
						  </div>
						</div>
						<?php 
					} ?>
					<div class="row">
					  <div class="col-xs-2 mt7">
						<label>Contact Person</label>
					  </div>
					  <div class="col-xs-2 zp">
						<input value="<?php $var ="contact_person"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					  </div>
					</div>
					</div><!--end of rowlightbg-->
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label>Problems and recommendations</label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-12 zp">
						<table class="table   table-bordered">
						<tbody>
						<tr>
						  <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Problems
						  </td>
						  <td>
							<input value="<?php $var ="problems"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Problems" style="border: 0px none;width: 100%;height: 68px;" type="text">
						  </td>               
						</tr>
						<tr>
						  <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Recommendations
						  </td>
						  <td>
							<input value="<?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Recommendations" style="border: 0px none;width: 100%;height: 68px;" type="text">
						  </td>               
						</tr>
						
					  </tbody>
					</table>
					  </div>
					</div>
					<div class="row rowmsr-filters row-signatures form-group">
					  <label class="col-md-3 mt7">Name of visiting Supervisor</label>
					  <div class="col-md-2">
							<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
						</div>
					  <label class="col-md-2 mt7">Designation</label>
					  <div class="col-md-2">
						<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
					  </div>
					  <label class="col-md-1 mt7 zp">Date of Visit</label>
					  <div class="col-md-2">
						<input value="<?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" <?php $var ="dov"; ?> name="<?php echo $var; ?>" id="<?php echo $var; ?>" class="dp1 form-control" placeholder="" type="text">
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
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
	</body>
</html>