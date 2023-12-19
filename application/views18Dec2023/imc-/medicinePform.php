<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>List Of Essential Medicines Stack Out || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">List Of Essential Medicines Stack Out</div>
					<div class="panel-body pbody">
						<?php 
						echo validation_errors();
						$action = $basePath."imc/medicine/save";
						$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
						$hidden = array('vpvc_id' => $vpvc_id);
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
									<label class="pt7 pb2">Facility</label>
								</div>
								<div class="col-xs-2">
									<input value="<?php $var = "facode"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control" type="hidden" >               
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
									<label class="pt7 pb2">Date of Visit</label>
								</div>
								<div class="col-xs-2">
									<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
									<!-- <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label> -->
								</div>
							</div>
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Facility Type</label>
								</div>
								<div class="col-xs-2">
									<input value="<?php $var = "fatype"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control" type="hidden" >               
									<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
								
								</div>
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
							</div>
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Designation of Monitor</label>
								</div>
								<div class="col-xs-2">
									<input class="form-control" id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 bgcolcl text-center">
									 <label>LIST OF ESSENTIAL MEDICINES STOCK OUT  </label><span> (check & tick against each)</span>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-xs-4 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">&#10004;</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">Days</label>
								</div>
								<div class="col-xs-4 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">&#10004;</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">Days</label>
								</div>
							</div>
							<?php 							
							$labels = array(
								"Amoxicillin Cap",			
								"Tab. Iron/Folic Acid ",
								"Amoxicillin Syp",			
								"ORS",
								"Co-trimoxazole Tab	",		
								"Oral pills (COC) ",      
								"Co-trimoxazole Syp	",		
								"Condoms",
								"Tab. Metronidazole ",			
								"Progesterone Inj.",
								"Syp. Metronidazole	",		
								"IUCDs",
								"Inj. Ampicillin ",			
								"Implants",
								"Tab. Diclofenac ",			
								"Emergency Contraceptives",
								"Syp. Paracetamol ",			
								"Bandages",
								"Inj. Diclofenac ",			
								"Anti-septic Solution",
								"Chloroquine Tab",			
								"Disposable syringes",
								"Syp. Salbutamol ",			
								"Anti-sera for blood testing",
								"Syp. Antihelminthic ",			
								"Misoprostol",
								"I/V infusions ",			
								"Chlorhexidine (CHX)",
								"Inj. Dexamethasone "	
							); 
							$j=1;
							for($i=1; $i<=15; $i++){ ?>						
							<div class="row">
								<div class="col-xs-4">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center ">
									<input <?php $var ='med_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" class="mt9" type="checkbox">
								</div>
								<div class="col-xs-1 zp">
									<input class="form-control  numberclass noDots"   value="<?php $var='med_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>"type="text">
								</div>
								<?php $j++; if($j<30){?>
								<div class="col-xs-4">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center ">
									<input <?php $var ='med_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" class="mt9" type="checkbox">
								</div>
								<div class="col-xs-1 zp">
									<input class="form-control  numberclass noDots"   value="<?php $var='med_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>"type="text">
								</div>
								<?php } ?>
							</div>
								<?php $j++; } ?>
							
							<div class="row">
								<div class="col-xs-12 bgcolcl text-center">
									 <label>LIST OF VACCINES STOCK OUT  </label><span> (check & tick against each)</span>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-xs-4 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">&#10004;</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">Days</label>
								</div>
								<div class="col-xs-4 text-center">
									<label class="pt7">Item</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">&#10004;</label>
								</div>
								<div class="col-xs-1 text-center brl">
									<label class="pt7">Days</label>
								</div>
							</div>
							<?php 							
							$labels = array(
								"BCG Vaccine	",		
								"Tetanus Toxoid ",
								"Pentavalent Vaccine",			
								"Anti-Rabies Vaccine ",
								"Polio Vaccine",			
								"Anti-Snake Venom  ",     
								"Hepatitis B Vaccine ",			
								"Vaccine Syringes ",
								"Measles Vaccine "
							); 
							$j=1;
							for($i=1; $i<=5; $i++){ ?>						
							<div class="row">
								<div class="col-xs-4">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center ">
									<input <?php $var ='vac_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" class="mt9" type="checkbox">
								</div>
								<div class="col-xs-1 zp">
									<input class="form-control  numberclass noDots"   value="<?php $var='vac_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>"type="text">
								</div>
								<?php $j++; if($j<10){?>
								<div class="col-xs-4">
									<label class="pt7"><?php echo $labels[$j-1]; ?></label>
								</div>
								<div class="col-xs-1 text-center ">
									<input <?php $var ='vac_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" class="mt9" type="checkbox">
								</div>
								<div class="col-xs-1 zp">
									<input class="form-control  numberclass noDots"   value="<?php $var='vac_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>"type="text">
								</div>
								<?php } ?>
							</div>
							<?php $j++; } ?>
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
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Comments</td>
											<td>
												<input value="<?php $var ="comments"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Comments" style="border: 0px none;width: 100%;height: 68px;" type="text">
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Recommendations</td>
											<td>
												<input value="<?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="Recommendations" style="border: 0px none;width: 100%;height: 68px;" type="text">
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