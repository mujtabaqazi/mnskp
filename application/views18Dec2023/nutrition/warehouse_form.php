<?php
$basePath = base_url();
$assetsPath = base_url() . "assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Monthly Monitoring Checklist of Warehouse at Districts || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Monthly Monitoring Checklist of Warehouse at Districts
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."nutrition/warehouse/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$vpvcDataRow->fmonth);
					echo form_open_multipart($action,$attributes,$hidden); ?>
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Name</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Designation</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >			
								<label class="pt7 pb2"><?php  echo (isset($vpvcDataRow))?get_Facility_District_Name($vpvcDataRow->facode):''; ?></label>
							</div>
						</div>
		
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Taluka</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="tcode" id="tcode" value="<?php echo isset($vpvcDataRow)?get_Facility_Tehsil_Name($vpvcDataRow->facode):''; ?>" required="required" class="form-control"  readonly="readonly" >               			
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($vpvcDataRow->facode)):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">UC</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="uncode" id="uncode" value="<?php echo isset($vpvcDataRow)?get_Facility_UC_Name($vpvcDataRow->facode):''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_UC_Name(get_Facility_UC_Name($vpvcDataRow->facode)):''; ?></label> 
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Village</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " id="village" name="village" type="text" placeholder="" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Date of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
								<!-- <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label> -->
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " id="" name="moniter_name" value="<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Functional Since (Date)</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control dp anyOtherDate" id="" name="functional_date" value="<?php $var="functional_date"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):'';?>" type="text" placeholder="" />
							</div>
							
							<div class="col-xs-2">
								<label class="pt7 pb2">Time of visit</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control single-input" id="" name="tov" value="<?php $var="tov"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Address of Location Site</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control " id="" name="loc_address" value="<?php $var="loc_address"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text" placeholder="" />
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="fatype" id="fatype" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Fatype_Name($vpvcDataRow->fatype):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Maintenance of Warehouse:</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-9 col-xs-offset-1 br">
								<label>Things to be monitored</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Yes / No</label>
							</div>
						</div>
						<?php 
						$labels=array(
							"Cleanliness",
							"Whitewash",
							"Ceiling condition (Leakage etc.)",
							"Floor cemented",
							"Ventilation",
							"Light",
							"Firefighting equipment", 
							"Door/Windows",
							"Direct Sunlight",
							"Secure",
							"1.	Are warehouse disinfected and sprayed every third month against insects, rodents and birds. Verify from records?", 
							"2.	Is staking of cartons four inches of the floor? (Using wooden planks and approximately two feet away from any wall).", 
							"3.	Is each consignment stacked separately? (To facilitate counting and access to hind stack?) ",
							"4.	Is First-Expiry First-Out (FEFO) method followed? ",
							"5.	Is staking of cartons according to prescribed protocols, maximum eight cartons only? ",
							"6.	Are marking labels, manufacturers or expiry dates visible on every carton? ",
							"7.	Is Bin Card present for each stake?", 
							"8.	If Yes? Entries proper"
						);
						for($index=1;$index<=count($labels);$index++){?>
						<div class="row">
							<div class="col-xs-<?php echo ($index<11)?'9  col-xs-offset-1':'10'; ?>">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='mow_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='mow_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">9. How many times in the last quarter the following officials have visited warehouse?</label>
							</div>
							<div class="col-xs-6 mt7">
								<div class="row">
									<div class="col-xs-6  bc br">
										<label>Designation</label>
									</div>
									<div class="col-xs-6 bc">
										<label>Number of times</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label class="pt7 pb2">EDO (H) DHO</label>
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control numberclass noDots" id="" name="edo_dho_visit" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6">
										<label class="pt7 pb2">District Focal Person</label>
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control numberclass noDots" id="" name="dfp_visit" type="text">
									</div>
								</div>
								<div class="row">
									<div class="col-xs-6 zp">
										<input class="form-control" id="" name="other_visitor" type="text" placeholder="Any other person: specify">
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control numberclass noDots" id="" name="other_p_visit" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">10. Frequency of supply received from</label>
							</div>
							<div class="col-xs-6">
								<div class="row">
									<div class="col-xs-4 text-right">
										<label>Monthly</label>&nbsp;
										<input <?php $var ='frequency_supply'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-right">
										<label>Quarterly</label>&nbsp;
										<input <?php $var ='frequency_supply'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt9" type="radio">
									</div>
									<div class="col-xs-4 text-right">
										<label>Irregular</label>&nbsp;
										<input <?php $var ='frequency_supply'; echo isset($DataRow)?(($DataRow->$var=="3")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="3" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-9">
								<label class="pt7 pb2">11. Mode of transportation: From Province warehouse to district warehouse</label>
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control" id="" name="mod_transport" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>12. Physical Check at time of visit</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 text-center">
								<label class="pt14">Items</label>
							</div>
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-4 zp brl text-center">
										<label>Out of stock at time of inspection? Yes/No</label>
									</div>
									<div class="col-xs-4 text-center">
										<label>Any stock Expired
											<br>
											Yes/No</label>
									</div>
									<div class="col-xs-4 zp brl text-center">
										<label>Physically Counted Stock in Hand
											<br>
											(# Units)</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<label class="pt14">Quantity recorded on Bin Card (Stock Ledger)</label>
							</div>
							<div class="col-xs-2 brl">
								<label class="pt14 pb26">Quantity that is short</label>
							</div>
							<div class="col-xs-2">
								<label class="pt14">Quantity that is in excess</label>
							</div>
						</div>
						<?php for($index=1;$index<=9;$index++){ ?>
						<div class="row">
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='pc_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-4">
										<div class="row">
											<div class="col-xs-6 zp text-right">
												<label>Yes</label>&nbsp;
												<input <?php $var ='pc_r'.$index.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='pc_r'.$index.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-4 mn34 bg3">
										<div class="row">
											<div class="col-xs-6 zp text-right">
												<label>Yes</label>&nbsp;
												<input <?php $var ='pc_r'.$index.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='pc_r'.$index.'_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
									<div class="col-xs-4 zp">
										<input class="form-control numberclass noDots" value="<?php $var ='pc_r'.$index.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
									</div>
								</div>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='pc_r'.$index.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='pc_r'.$index.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='pc_r'.$index.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								<label>13. Problems and recommendations</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp">
								<table class="table   table-bordered">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Problems </td>
											<td>
											<input placeholder="Problems " name="problems" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Recommendations </td>
											<td>
											<input placeholder="Recommendations"  name="recommendations" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
									<i class="fa fa-file"></i> Save Form
								</button>
								<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
									<i class="fa fa-floppy-o"></i> Submit Form
								</button>
								<a class="btn btn-primary btn-md btncc" onclick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
							</div>
						</div>
						<?php echo form_close(); ?>
					</div>
					<!--end of panel body-->
				</div>
			</div><!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
	</body>
</html>