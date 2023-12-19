<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monitoring checklist for Provincial warehouse/District stores || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Monitoring checklist for Provincial warehouse/District stores
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."tbc/stores/save";
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
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="fatype" id="fatype" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Fatype_Name($vpvcDataRow->fatype):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
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
								<label class="pt7 pb2">Province</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_name" value="<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >               
								<!--<label class="pt7 pb2"><?php //echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label>-->
							</div>
						</div>	
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>General information</label>
							</div>
						</div>
						<?php 
						$labels=array(
							"1. Location (accessibility)",
							"2. Security (secure doors & windows)",
							"3. Independent store for TB drugs?",
							"4. Store keeper trained",
							"5. Physical condition of store satisfactory (roof, walls, ceiling, any seepage, condition of white wash, etc.)",
							"6. Seating arrangements (office furniture, availability and condition)",
							"7. Medicine stored on racks & pellets",
							"8. Accessibility: (about 2 Meter )",
							"9. Height from floor: (about 12 cm)",
							"10. Distance from wall as per guidelines (about 40 cm)",
							"11. Exposed to sunlight",
							"12. Bin cards present and tally with stock register and stock",
							"13. Medicines storage following FIFO & FEFO rule",
							"14. Place for loading/unloading",
							"15. Room temperature at the time of visit",
							"16. Temperature chart maintained"
						);
						for($i=1;$i<=count($labels);$i++){ ?>
						<div class="row">
							<?php if($i==1||$i==2 ||$i==4) { ?>
							<div class="col-xs-4">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<?php if($i==4){ ?>
							<div class="col-xs-2 zp">
								<div class="row">
									<div class="col-xs-6">
										<label>Yes</label>&nbsp;
										<input <?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">If yes, Date of training</label>
							</div>
							<div class="col-xs-4 zp">
								<input class="dp form-control anyOtherDate" value="<?php $var ='dot'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<?php }else { ?>
							<div class="col-xs-8 zp">
								<input class="form-control" value="<?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							
							<?php } }else { ?>
							<div class="col-xs-<?php echo ($i==15)?"4":"8"; ?>">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<?php if ($i==15){?>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='temperature'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<label class="pt7 pb2 pl5">&deg;C</label>
							</div>
							<?php }?>
							<?php if ($i==6||$i==7||$i==14||$i==15) {?> 
							<div class="col-xs-4 zp">
								<div class="row">
									<div class="col-xs-6">
										<label>Satisfactory</label>&nbsp;
										<input <?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6">
										<label>Unsatisfactory</label>&nbsp;
										<input <?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
							</div>
							<?php }else { ?>
							<div class="col-xs-2 zp">
								<div class="row">
									<div class="col-xs-6">
										<label>Yes</label>&nbsp;
										<input <?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='gi_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
							</div>
							<?php } } ?>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-12">
								<label class="pt7 pb2">17. ATT drugs: (after physical verification information to be obtained from stock register)</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1 text-center">
								<label>Sr. #</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Name of drugs</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Last consignment</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label>Last consignment received on</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Stock balance</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Remarks</label>
							</div>
						</div>
						<?php 
						$labels=array(
							"4 FDCs ",
							"2 FDCs 150 mg",
							"2 FDCs 450 mg",
							"HRE",
							"Inj. Streptomycin",
							"Distilled Water",
							"Disposable syringes",
						);
						for ($i=1;$i<=count($labels);$i++){ ?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $i;?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='atd_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="dp form-control anyOtherDate" value="<?php $var ='atd_r'.$i.'_f2'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='atd_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='atd_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-12">
								<label class="pt7 pb2">Pediatric Drugs</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1 text-center">
								<label>Sr. #</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Name of drugs</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Last consignment</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label>Last consignment received on</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Stock balance</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Remarks</label>
							</div>
						</div>
						<?php
						$labels=array(
							"3 FDCs ",
							"2 FDCs 60/30",
							"H 100 mg",
							"Z 400 mg"
						);
						for($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $i;?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='pd_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="dp form-control " value="<?php $var ='pd_r'.$i.'_f2'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='pd_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control" value="<?php $var ='pd_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"type="text">
							</div>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-12">
								<label class="pt7 pb2">18. Record pertaining to issue the drugs: (from indents, issue voucher and stock register)</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt14">Sr.#</label>
									</div>
									<div class="col-xs-5 brl text-center">
										<label class="pt14 pb6">Name of document</label>
									</div>
									<div class="col-xs-5 text-center">
										<label class="pt14">Present</label>
									</div>
								</div>
							</div>
							<div class="col-xs-3 brl text-center">
								<label class="pt14 pb6">Complete / Incomplete</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Signed by store keeper and DDO</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Tally with other documents?</label>
							</div>
							<div class="col-xs-1 text-center">
								<label class="pt14">Remarks</label>
							</div>
						</div>
						<?php
						$labels=array(
							"Indent voucher ",
							"Issue voucher",
							"Stock register ",
						);
						for($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-4">
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo $i; ?></label>
									</div>
									<div class="col-xs-5">
										<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
									</div>
									<div class="col-xs-5">
										<div class="row">
											<div class="col-xs-6 text-right">
												<label>Yes</label>&nbsp;
												<input <?php $var ='pid_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
											</div>
											<div class="col-xs-6 zp text-center">
												<label>No</label>&nbsp;
												<input <?php $var ='pid_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Complete</label>&nbsp;
										<input <?php $var ='pid_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 zp">
										<label>Incomplete</label>&nbsp;
										<input <?php $var ='pid_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='pid_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='pid_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='pid_r'.$i.'_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6">
										<label>No</label>&nbsp;
										<input <?php $var ='pid_r'.$i.'_f4'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0"class="mt9" type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-1 zp">
								<input class="form-control" value="<?php $var ='pid_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"type="text">
							</div>
						</div>
						<?php } ?>
					</div><!--end of div rowlightbg-->
					<div class="row mt1">
						<div class="col-xs-12 bgcolcl text-center mn25"></div>
					</div>
					<div class="row">
						<div class="col-xs-12 zp">
							<table class="table   table-bordered">
								<tbody>
									<tr>
										<td style="width: 26% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">19. Issues, challenges/identified (if any) </td>
										<td>
										<input value="<?php $var ='problems'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
										</td>
									</tr>
									<tr>
										<td style="width: 26% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">20. Recommendations </td>
										<td>
										<input value="<?php $var ='recommendations'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  style="border: 0px none;width: 100%;height: 68px;" type="text">
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
			<!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		<script>
			$(".yp").datepicker({
				format: " yyyy",
				viewMode: "years", 
				minViewMode: "years"
			});
		</script>
	</body>
</html>