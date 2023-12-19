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
	  <title>General Services - Operation Theater || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
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
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">General Services - Operation Theater Checklist</div>
				<div class="panel-body pbody">
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
									<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2">Date of Visit</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
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
									<label class="pt7 pb2"><?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?></label>
								</div>							
							</div>
							<div class="row">
								<div class="col-xs-2">
									<label class="pt7 pb2">Designation of Monitor</label>
								</div>
								<div class="col-xs-2">
									<label class="pt7 pb2"><?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?></label>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12 bgcolcl text-center">
									 <label>OPERATION THEATER </label><span> (Check the HF category, availability & functionality of OT)</span>
								</div>
							</div>
							<?php 							
								$labels = array(
									"General condition (Sanitary condition)",
									"Air Conditioning ",
									"Check & note last date of Fumigation ",
									"Separate Wash Room available ",
									"Separate Sterilization room available ",
									"Oxygen available  ",
									"Nitrous Oxide available ",
									"Health education/Counseling material available ",
									"Duty Doctors desk available",
									"Nurse/Dispenser desk available ",
								); 

							for($i=1; $i<=count($labels); $i++){ ?>								
							<div class="row">
								<div class="col-xs-<?php echo ($i==3)?"10":"11"; ?>">
									<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
								</div>
								<div class="col-xs-1 <?php echo ($i==3)?" zp text-right":"text-left"; ?>  ">
									<?php if ($i==3){?>
									<label class="pt7 pb2">Date:</label>&nbsp;
									<?php } else if($i<3){ ?>
									<p> <?php $var ='ot_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var == 1 ? "Good" : ($DataRow->$var == 0 ? "Average" : ($DataRow->$var == 2 ? "Poor" : "")):''; ?></p>
									<?php }else {?>
									<p><?php $var ='ot_r'.$i.'_f1';echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									<?php } ?>
								</div>
								<?php if ($i==3){?>
								<div class="col-xs-1 zp">
									<p><?php $var ='ot_r'.$i.'_f1'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):'';  ?></P>
								</div>
								<?php } ?>
							</div>
							<?php 	} ?>
							<div class="row">
								<div class="col-sm-12 bgcolcl text-center">
									 <label>Tick the relevant box</label>
								</div>
							</div>
							<div class="row bc mt1">
								<div class="col-sm-2 bgw" style="min-height:25.5px;">
									 
								</div>
								<div class="col-sm-2 brl text-center">
									<label>Operation Table</label>
								</div>
								<div class="col-sm-2 text-center">
									<label>Instrument Trolley </label>
								</div>
								<div class="col-sm-2 brl text-center">
									<label>OT Light</label>
								</div>
								<div class="col-sm-2 text-center">
									<label>Anesthesia Machine  </label>
								</div>
								<div class="col-sm-2 bl text-center">
									<label>Autoclave</label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2" >
									<label class="pt7 pb2">Furniture available</label> 
								</div>
								<?php for ($i=1;$i<=5;$i++){?>
								<div class="col-xs-2 text-center">
									<p><?php $var ='fa_r1_f'.$i;echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
								</div>
								<?php } ?>
							</div>
							<div class="row bc mt1">
								<div class="col-sm-2 bgw" style="min-height:25.5px;">
									 
								</div>
								<div class="col-sm-2 brl text-center">
									<label>Thermometer</label>
								</div>
								<div class="col-sm-2 text-center">
									<label>Drip Stand</label>
								</div>
								<div class="col-sm-2 brl text-center">
									<label>Flash Light</label>
								</div>
								<div class="col-sm-2 text-center">
									<label>Sphygmomanometer</label>
								</div>
								<div class="col-sm-2 bl text-center">
									<label>Stethoscope</label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2" >
									<label class="pt7 pb2">Instruments available</label> 
								</div>
								<?php for ($i=1;$i<=5;$i++){?>
								<div class="col-xs-2 text-center">
									<p><?php $var ='ia_r1_f'.$i; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
								</div>
								<?php } ?>
							</div>
							<div class="row bc mt1">
								<div class="col-sm-2 bgw" style="min-height:25.5px;">
								</div>
								<div class="col-sm-2 brl text-center">
									<label >Laryngo Scope</label>
								</div>
								<div class="col-sm-2 text-center">
									<label >Megils Forceps</label>
								</div>
								<div class="col-sm-2 brl text-center">
									<label >ETT  </label>
								</div>
								<div class="col-sm-2 zp text-center">
									<label >Neonatal Resuscitation Kit </label>
								</div>
								<div class="col-sm-2 bl text-center">
									<label >Ambu Bag</label>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2" >
									<label class="pt7 pb2">Instruments available</label> 
								</div>
								<?php for ($i=1;$i<=5;$i++){?>
								<div class="col-xs-2 text-center">
									<p><?php $var ='ia_r2_f'.$i; echo isset($DataRow)?$DataRow->$var == 1 ? "Yes" : ($DataRow->$var == 0 ? "No" : ""):'';?></p>
									
								</div>
								<?php } ?>
							</div>
						</div><!--end of rowlightbg-->		      
     
						<div class="row">
							<div class="col-sm-12 bgcolcl text-center">
								<label>GENERAL COMMENTS & RECOMMENDATIONS</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 zp ">
								<table class="table   table-bordered  ">
									<tbody>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Comments</td>
											<td>
												<p><?php $var ="comments"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
											</td>               
										</tr>
										<tr>
											<td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations</td>
											<td>
												<p><?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>imc/forms/ot_edit/<?php echo $vpvc_id; ?>">
									<i class="fa fa-pencil-square-o"></i> Update  
								</a>
							<?php } ?>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>imc/forms/ot_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});		
		</script>
	</body>
</html>