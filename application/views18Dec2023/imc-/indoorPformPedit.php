<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>General Services – Indoor Ward || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">General Services – Indoor Ward Checklist</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."imc/indoor/save/";
					$action .= isset($DataRow)?'/'.$id:'';
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					echo form_open_multipart($action,$attributes); ?>
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Name</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Designation</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >               
								<!-- <label class="pt7 pb2"><?php echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->dov)):''; ?></label> -->
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
							
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
				          		 <label>INDOOR WARD </label><span> Male Ward (Physically check/direct observation and tick the relevant column)</span>
				        	</div>
				      	</div>
				      	<?php 							
							$labels = array(
								"General condition (Sanitary condition)",
								"Light",
								"Health education/Counseling material available ",
								"Duty Doctor Desk available",
								"Nurse/Dispenser Desk available",
								"Indoor Register available",
								"Abstract Form available "
							); 

							for($i=1; $i<=count($labels); $i++){ ?>						
						<div class="row">
							<div class="col-xs-9">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-1 zp text-right">
								<label><?php echo ($i<3)?"Good":"Yes"; ?></label>&nbsp;
								<input <?php $var ='indm_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-1 zp text-right">
								<label><?php echo ($i<3)?"Average":"No"; ?></label>&nbsp;
								<input <?php $var ='indm_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-1 zp text-center">
							<?php if($i<3){ ?>
								<label>Poor</label>&nbsp;
								<input <?php $var ='indm_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="2" class="mt9" type="radio">
							<?php } ?>
							</div>
						</div>
						<?php 	} ?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								 <label>Tick the relevant box</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 bgw" style="min-height:25.5px;">
								 
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Bed</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Side Table</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Screen</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Attend Bench</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Other</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2" >
								<label class="pt7 pb2">Furniture available</label> 
							</div>
							<?php for ($i=1;$i<=4;$i++){?>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='fam_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>N</label>&nbsp;
										<input <?php $var ='fam_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="col-xs-1 zp">
								<input class="form-control" id=""  placeholder="Other" value="<?php $var ='fam_r1_f5'; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>" type="text">
								
							</div>
							<div class="col-xs-1 zp">
								<div class="row">
									<div class="col-xs-6 text-right zp">
										<label>Y</label>&nbsp;
										<input <?php $var ='fam_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-center zp">
										<label>N</label>&nbsp;
										<input <?php $var ='fam_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 bgw" style="min-height:25.5px;">
								 
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Thermometer</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Drip Stand</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Flash Light</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Sphygmomanometer</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Stethoscope</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2" >
								<label class="pt7 pb2">Instruments available</label> 
							</div>
							<?php for ($i=1;$i<=5;$i++){?>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='iam_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>N</label>&nbsp;
										<input <?php $var ='iam_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 bgw" style="min-height:25.5px;">
							</div>
							<div class="col-xs-2 brl text-center">
								<label >Tuning Fork</label>
							</div>
							<div class="col-xs-2 text-center">
								<label >Measuring Tape</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label >Weight Machine </label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label >Ambu Bag</label>
							</div>
							<div class="col-xs-2 text-center">
							    <label >Resuscitation Board</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2" >
								<label class="pt7 pb2">Instruments available</label> 
							</div>
							<?php for ($i=1;$i<=5;$i++){?>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='iam_r2_f'.$i; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>N</label>&nbsp;
										<input <?php $var ='iam_r2_f'.$i; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row">
				        	<div class="col-xs-12 bgcolcl text-center">
				          		 <label>INDOOR WARD </label><span> Female Ward (Physically check/direct observation and tick the relevant column)</span>
				        	</div>
				      	</div>
				      	<?php 							
							$labels = array(
								"General condition (Sanitary condition)",
								"Light",
								"Health education/Counseling material available ",
								"Duty Doctor Desk available",
								"Nurse/Dispenser Desk available",
								"Indoor Register available",
								"Abstract Form available "
							); 

							for($i=1; $i<=count($labels); $i++){ ?>						
						<div class="row">
							<div class="col-xs-9">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-1 zp text-right">
								<label><?php echo ($i<3)?"Good":"Yes"; ?></label>&nbsp;
								<input <?php $var ='indf_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-1 zp text-right">
								<label><?php echo ($i<3)?"Average":"No"; ?></label>&nbsp;
								<input <?php $var ='indf_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
							</div>
							<div class="col-xs-1 zp text-center">
							<?php if($i<3){ ?>
								<label>Poor</label>&nbsp;
								<input <?php $var ='indf_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="2" class="mt9" type="radio">
							<?php } ?>
							</div>
						</div>
						<?php 	} ?>
						<div class="row">
							<div class="col-xs-12 bgcolcl text-center">
								 <label>Tick the relevant box</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 bgw" style="min-height:25.5px;">
								 
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Bed</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Side Table</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Screen</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Attend Bench</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Other</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2" >
								<label class="pt7 pb2">Furniture available</label> 
							</div>
							<?php for ($i=1;$i<=4;$i++){?>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='faf_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>N</label>&nbsp;
										<input <?php $var ='faf_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php } ?>
							<div class="col-xs-1 zp">
								<input class="form-control" id=""  placeholder="Other" value="<?php $var ='faf_r1_f5'; echo isset($DataRow)?$DataRow->$var:'';?>" name="<?php echo $var; ?>" type="text">
								
							</div>
							<div class="col-xs-1 text-center zp">
								<div class="row">
									<div class="col-xs-6 text-right zp">
										<label>Y</label>&nbsp;
										<input <?php $var ='faf_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-center zp">
										<label>N</label>&nbsp;
										<input <?php $var ='faf_r1_f6'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 bgw" style="min-height:25.5px;">
								 
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Thermometer</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Drip Stand</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Flash Light</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Sphygmomanometer</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<label>Stethoscope</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2" >
								<label class="pt7 pb2">Instruments available</label> 
							</div>
							<?php for ($i=1;$i<=5;$i++){?>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='iaf_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>N</label>&nbsp;
										<input <?php $var ='iaf_r1_f'.$i; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php } ?>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-2 bgw" style="min-height:25.5px;">
							</div>
							<div class="col-xs-2 brl text-center">
								<label >Tuning Fork</label>
							</div>
							<div class="col-xs-2 text-center">
								<label >Measuring Tape</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label >Weight Machine </label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label >Ambu Bag</label>
							</div>
							<div class="col-xs-2 text-center">
							    <label >Resuscitation Board</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2" >
								<label class="pt7 pb2">Instruments available</label> 
							</div>
							<?php for ($i=1;$i<=5;$i++){ ?>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Y</label>&nbsp;
										<input <?php $var ='iaf_r2_f'.$i; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>N</label>&nbsp;
										<input <?php $var ='iaf_r2_f'.$i; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>"  value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
							<?php } ?>
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