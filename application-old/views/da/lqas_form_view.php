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
	  <title>LQAS || Form</title>
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
				<div class="panel-heading text-center">Data Accuracy Using LQAS Techniques
				</div>
				<div class="panel-body">
					<div class="alignmentview">
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">Name of reporting Officer</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo $DataRow->supervisor_name; ?></p>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Designation</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo $DataRow->supervisor_desg; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">Plan month / Monthly Reporting month</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?> / <?php $var ="mis_data_fmonth"; echo (isset($DataRow) && $DataRow->$var!==NULL)?getNewFMonthFormat($DataRow->$var):'NA'; ?></p>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo get_District_Name(isset($DataRow)?$DataRow->distcode:0); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">LQAS Date</label>
							</div>
							<div class="col-xs-3">
								<p><?php $var ="lqas_date"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?$DataRow->facode.'-'.get_Facility_Name($DataRow->facode):''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned):</label>
							</div>
							<div class="col-xs-6">
								<p><?php echo isset($DataRow)?$DataRow->remarks:''; ?></p>
							</div>

						</div>						
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">Entity Type</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?$DataRow->entity_type:''; ?></p>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Entity Name</label>
							</div>
							<div class="col-xs-3">
								<p><?php echo isset($DataRow)?get_Entity_Name($DataRow->entity_code,$DataRow->entity_type):''; ?></p>
							</div>
						</div>
						<div class="row bc mt5">
							<div class="col-xs-1 text-center">
								<label class="pt20">Sr. #</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label class="pt14 pb13">Data elements from the monthly reporting form (randomly selected)</label>
							</div>
							<div class="col-xs-1 text-center zp">
								<label>Numbers  from the Monthly report form</label>
							</div>
							<div class="col-xs-3 text-center bl">
								<label>Verification of data</label>
								<div class="row bt">
									<div class="col-xs-9 br text-center">
										<label class="pt6 pb8">Register/form</label>
									</div>
									<div class="col-xs-3 text-center">
										<label class="pt6">No.</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 brl text-center">
								<label class="pt14 pb13">Do numbers in column 2 &amp;3 match?</label>
							</div>
							<div class="col-xs-2   zp text-center">
								<label class="pt10">Remarks(Such as Data availability, completeness etc)</label>
							</div>
						</div>
						<div class="row bc bt">
							<div class="col-xs-1"></div>
							<div class="col-xs-3 brl">
								<label>1</label>
							</div>
							<div class="col-xs-1">
								<label>2</label>
							</div>
							<div class="col-xs-3 bl">
								<label>3</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row pt3">
									<div class="col-xs-6 br pt2 pb1">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<?php for($i=1;$i<=12;$i++){ ?>
							<div class="row singlelqasrow">
								<div class="col-xs-1">
									<label class="mt7"><?php echo $i; ?></label>           
								</div>
								<div class="col-xs-3 text-left">
									<p><?php $var ="lqas_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-1 text-center">
									<p><?php $var ="lqas_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-9 text-left">
											<p><?php $var ="lqas_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-3 text-center">
											<p><?php $var ="lqas_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row">
										<div class="col-xs-6">
											<p><?php $var="lqas_r".$i."_f5";if($DataRow->$var=="1"){echo '&#10004;';} ?></p>
										</div>
										<div class="col-xs-6">
											<p><?php $var="lqas_r".$i."_f5";if($DataRow->$var!="1"){echo '&#10004;';} ?></p>
										</div>
									</div>
								</div>
								<div class="col-xs-2 text-left">  
									<p><?php $var ="lqas_r".$i."_f6"; echo isset($DataRow)?$DataRow->$var:''; ?></p> 
								</div>
							</div>
						<?php } ?>
						<div class="row">       
							<div class="col-xs-3 col-xs-offset-5 text-right">
								<label class="mt7">Total</label>
							</div>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 text-center">
										<p><?php $var ="lqas_tot"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
									<div class="col-xs-6 text-center">
										<p><?php echo $varNo = 12-$DataRow->$var; ?></p>
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="background: white none repeat scroll 0% 0%;">
							<div class="col-xs-3 col-xs-offset-5 text-right">
								<label class="mt7">Accuracy Percentage</label>
							</div>
							<div class="col-xs-2 text-center">
								<p><?php $var ="lqas_ap"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bc cmargin27 text-center">
								<label>LQAS Table: Decisions Rules for Sample Sizes of 12 and Coverage Targets/Average of 40-95%</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1 zp text-center">
								<label>Sample Size</label>
							</div>
							<div class="col-xs-1 zp bl text-center">
								<label>Less than 20%</label>
							</div>
							<div class="col-xs-10 text-center">
								<div class="row">
									<div class="col-xs-1 brl"><label class="pt7">20%</label></div>
									<div class="col-xs-1"><label class="pt7">30%</label></div>
									<div class="col-xs-1 brl"><label class="pt7">40%</label></div>
									<div class="col-xs-1"><label class="pt7">45%</label></div>
									<div class="col-xs-1 brl"><label class="pt7">50%</label></div>
									<div class="col-xs-1"><label class="pt7">60%</label></div>
									<div class="col-xs-1 brl"><label class="pt7">65%</label></div>
									<div class="col-xs-1"><label class="pt7">75%</label></div>
									<div class="col-xs-1 brl"><label class="pt7">85%</label></div>
									<div class="col-xs-1"><label class="pt7">90%</label></div>
									<div class="col-xs-1 brl"><label class="pt7">95%</label></div>
									<div class="col-xs-1"><label class="pt7">100%</label></div>
								</div>
							</div>
						</div>
						<div style="border-top: 1px solid; border-bottom: 1px solid;" class="row">
							<div class="col-xs-1 zp text-center">
								<label>12</label>
							</div>
							<div class="col-xs-1 zp bl text-center">
								<label>N/A</label>
							</div>
							<div class="col-xs-10 text-center">
								<div class="row">
									<div class="col-xs-1 brl"><label class="pt7">1</label></div>
									<div class="col-xs-1"><label class="pt7">2</label></div>
									<div class="col-xs-1 brl"><label class="pt7">3</label></div>
									<div class="col-xs-1"><label class="pt7">4</label></div>
									<div class="col-xs-1 brl"><label class="pt7">5</label></div>
									<div class="col-xs-1"><label class="pt7">6</label></div>
									<div class="col-xs-1 brl"><label class="pt7">7</label></div>
									<div class="col-xs-1"><label class="pt7">8</label></div>
									<div class="col-xs-1 brl"><label class="pt7">9</label></div>
									<div class="col-xs-1"><label class="pt7">10</label></div>
									<div class="col-xs-1 brl"><label class="pt7">11</label></div>
									<div class="col-xs-1"><label class="pt7">12</label></div>
								</div>
							</div>
						</div>
					</div><!--end of div rowlightbg-->
					</div><!--end of alignmentview-->
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<?php if($DataRow->submitted_by==$userId){ ?>
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>da/forms/lqas_edit/<?php echo $vpvc_id; ?>">
									<i class="fa fa-pencil-square-o"></i> Update  
								</a>
							<?php } ?>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);" ><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
	$(document).ready(function() {
		$("#compare_btn").on('click',function(e){
			window.location.href="<?php echo $basePath; ?>da/forms/lqas_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	});
	</script>
	</body>
</html>