<?php
$basePath = base_url();
$assetsPath = base_url() . "assets/";
$userId = $this -> session -> id;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
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

		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">  Malaria - Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center 
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
						<div class="alignmentview">
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
										<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
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
										<label class="pt7 pb2"><?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Designation of Monitor</label>
									</div>
									<div class="col-xs-2">
										<label><?php $var ="moniter_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Date Of Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
									</div>
								</div>	
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
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
										<p><?php $var ='pclr_r'.$index.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else { ?>
										<p><?php $var ='pclr_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<?php if ($i!=17) { ?>
									<div class="col-xs-3">
										<label class="pt7 pb2"><?php echo $labels[$i]; $i++; ?></label>
									</div>
									<div class="col-xs-3 zp">
										<?php if($i==12||$i==14||$i==15||$i==16||$i==17){ ?> 
										<p><?php $var ='pclr_r'.$index.'_f2';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										<?php }else {?>
										<p><?php $var ='pclr_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										<?php } ?>
									</div>
									<?php } ?>
								</div>
								<?php } ?>
								<div class="row">
									<div class="col-sm-6 bc">
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
									<div class="col-sm-12 bgcolcl text-center">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
								<?php }else if ($index==5 || $index==9){?>
								<div class="row">
									<div class="col-sm-6 bc">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
								<?php }else {?>
								<div class="row">
									<div class="col-xs-3">
										<label class="pt7 pb2"><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-3 ">
										<p><?php $var ='smdw_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
										
									</div>
								</div>
								<?php $i++;} } ?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Inventory control</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-12">
										<label>Stocks & stationery</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-3 text-center">
										<label>Item</label>
									</div>
									<div class="col-sm-3 text-center brl">
										<label>Available</label>
									</div>
									<div class="col-sm-3 text-center">
										<label>Stock out since when?</label>
									</div>
									<div class="col-sm-3 bl text-center">
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
									<div class="col-xs-3 text-center">
										<p><?php $var ='ss_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 text-center">
										<p><?php $var ='ss_r'.$i.'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
									</div>
									<div class="col-xs-3 ">
										<p><?php $var ='ss_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row bc">
									<div class="col-sm-12">
										<label>Disease specific data</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-3 text-center">
										<label>LLIN distributed during</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Pregnant women</label>
									</div>
									<div class="col-sm-2 text-center">
										<label>Children &gt; 5</label>
									</div>
									<div class="col-sm-2 brl text-center">
										<label>Malaria patient</label>
									</div>
									<div class="col-sm-3 text-center">
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
									<div class="col-xs-2 text-center">
										<p><?php $var ='ds_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='ds_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-2 text-center">
										<p><?php $var ='ds_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 ">
										<p><?php $var ='ds_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row mt1 mb1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>Trainings conducted for community in previous month & target audience</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-1">
										<label>Sr. #</label>
									</div>
									<div class="col-sm-8 text-center brl">
										<label>Name of trainings</label>
									</div>
									<div class="col-sm-3 text-center">
										<label>Number of Participants</label>
									</div>
								</div>
								<?php for ($i=1;$i<=3;$i++){ ?>
								<div class="row">
									<div class="col-xs-1">
										<label class="pt7 pb2"><?php echo $i; ?></label>
									</div>
									<div class="col-xs-8 ">
										<p><?php $var ='tcc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-3 text-center">
										<p><?php $var ='tcc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<?php }?>
								
								<div class="row bc">
									<div class="col-xs-12 bgcolcl text-center">
										<label>Comments/remarks by monitoring officer</label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12 zp">
										<table class="table   table-bordered">
											<tbody>
												<tr>
													<td style="width: 26% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Comments </td>
													<td>
													<p style="border: 0px none;width: 100%;" ><?php $var ='comments'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
													</td>
												</tr>
												<tr>
													<td style="width: 26% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Remarks </td>
													<td>
													<p style="border: 0px none;width: 100%;"> <?php $var ='remarks'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>mcp/forms/llin_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>mcp/forms/llin_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>