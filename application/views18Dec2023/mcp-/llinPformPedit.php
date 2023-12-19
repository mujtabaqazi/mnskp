<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center || Form</title>
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
					Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."mcp/llin/save";
					$action .= isset($DataRow)?'/'.$id:'';
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$DataRow->fmonth);
					echo form_open_multipart($action,$attributes,$hidden); ?>
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
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
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
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->fmonth:''; ?></label>
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
								<input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >               
								<!-- <label class="pt7 pb2"><?php echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->dov)):''; ?></label> -->
							</div>
						</div>	
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Particulars:</label>
							</div>
						</div>
						<?php
						$labels=array(
							"Complete address of facility",
							"Population of district",
							"Catchment population of facility",
							"Name of focal person",
							"Official address of focal person",
							"Phone # of focal person",
							"Outlet",
							"Location",
							"Geographical accessibility",
							"Surroundings",
							"Security concerns",
							"Offloading space",
							"Spacious area for storage (dimensions of room",
							"Ventilation, humidity, temperature, protection from sunlight",
							"Protection from fire",
							"Pest control measures",
							"Cleanliness situation/arrangements"
						);
						$i=0;
						for($index=1;$index<=9;$index++){
						?>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo $labels[$i]; $i++; ?></label>
							</div>
							<div class="col-xs-3 zp">
								<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
								<div class="row">
									<div class="col-xs-4">
										<label>Yes</label>&nbsp;
										<input <?php $var ='pclr_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='pclr_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
								<?php }else { ?>
								<input class="form-control <?php echo ($i==3||$i==6)?"numberclass noDots":"" ; ?>" value="<?php $var ='pclr_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php } ?>
							</div>
							<?php if ($i!=17) { ?>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo $labels[$i]; $i++; ?></label>
							</div>
							<div class="col-xs-3 zp">
								<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
								<div class="row">
									<div class="col-xs-4">
										<label>Yes</label>&nbsp;
										<input <?php $var ='pclr_r'.$index.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='pclr_r'.$index.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
								<?php }else {?>
								<input class="form-control <?php echo ($i==2||$i==6)?"numberclass noDots":"" ; ?>" value="<?php $var ='pclr_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
								<?php } ?>
							</div>
							<?php } ?>
						</div>
						<?php } ?>
						<div class="row">
							<div class="col-xs-6 bc">
								<label>Storage</label>
							</div>
						</div>
						<?php 
						$labels=array(
							"Racks available or not",
							"Storage on ground",
							"Pallets (bales of 100 each) three can be piled up",
							"Mobility within store",
							"Distribution",
							"Recording desk",
							"Stationary",
							"Distribution window",
							"Waiting area",
							"Space Designated for waiting area",
							"Protection from sunlight and rain."
						);
						$i=1;
						for ($index=1;$index<=count($labels);$index++){
							if($index==4){
						?>
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label><?php echo $labels[$index-1]; ?></label>
							</div>
						</div>
						<?php }else if ($index==5 || $index==9){?>
						<div class="row">
							<div class="col-xs-6 bc">
								<label><?php echo $labels[$index-1]; ?></label>
							</div>
						</div>
						<?php }else {?>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
							</div>
							<div class="col-xs-3 zp">
								<div class="row">
									<div class="col-xs-4">
										<label>Yes</label>&nbsp;
										<input <?php $var ='smdw_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='smdw_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
							</div>
						</div>
						<?php $i++;} } ?>
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Inventory control</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-12">
								<label>Stocks & stationery</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-3 text-center">
								<label>Item</label>
							</div>
							<div class="col-xs-3 text-center brl">
								<label>Available</label>
							</div>
							<div class="col-xs-3 text-center">
								<label>Stock out since when?</label>
							</div>
							<div class="col-xs-3 bl text-center">
								<label>Remarks</label>
							</div>
						</div>
						<?php
						$labels=array(
							"LLIN",
							"Stock register",
							"Daily expense register",
							"Reporting forms"
						);
						for($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo $labels[$i-1];?></label>
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='ss_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="dp form-control anyOtherDate" value="<?php $var ='ss_r'.$i.'_f2'; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control" value="<?php $var ='ss_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
						<div class="row bc">
							<div class="col-xs-12">
								<label>Disease specific data</label>
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-3 text-center">
								<label>LLIN distributed during</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Pregnant women</label>
							</div>
							<div class="col-xs-2 text-center">
								<label>Children &gt; 5</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<label>Malaria patient</label>
							</div>
							<div class="col-xs-3 text-center">
								<label>Remarks</label>
							</div>
						</div>
						<?php 
						$labels=array(
							"Previous month",
							"Current month (till date)"
						);
						for ($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='ds_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='ds_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='ds_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control" value="<?php $var ='ds_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php } ?>
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Trainings conducted for community in previous month & target audience</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1">
								<label>Sr. #</label>
							</div>
							<div class="col-xs-8 text-center brl">
								<label>Name of trainings</label>
							</div>
							<div class="col-xs-3 text-center">
								<label>Number of Participants</label>
							</div>
						</div>
						<?php for ($i=1;$i<=3;$i++){ ?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $i; ?></label>
							</div>
							<div class="col-xs-8 zp">
								<input class="form-control" value="<?php $var ='tcc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='tcc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<?php }?>
						
						<div class="row bc">
							<div class="col-xs-12 bgcolcl text-center">
								<label>Comments/remarks by monitoring officer</label>
							</div>
						</div>
					</div><!--end of div rowlightbg-->
					<div class="row">
						<div class="col-xs-12 zp">
							<table class="table   table-bordered">
								<tbody>
									<tr>
										<td style="width: 26% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Comments </td>
										<td>
										<input style="border: 0px none;width: 100%;height: 68px;" value="<?php $var ='comments'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="comments" type="text">
										</td>
									</tr>
									<tr>
										<td style="width: 26% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Remarks </td>
										<td>
										<input style="border: 0px none;width: 100%;height: 68px;" value="<?php $var ='remarks'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" placeholder="remarks" type="text">
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
