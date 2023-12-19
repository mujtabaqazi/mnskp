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
		<title>HF || Form</title>
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
				<div class="panel-heading text-center">Health Facility</div>
					<div class="panel-body pbody">
						<div class="alignmentview">
							<div class="rowlightbg">
							<div class="row">
								<div class="col-xs-3 ">
									<label>Name of the Supervisor</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
								<div class="col-xs-3 ">
									<label>Designation</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>        
							</div>
							<div class="row">
								<div class="col-xs-3 ">
									<label>Province</label>
								</div>
								<div class="col-xs-3">
									<input type="text"  class="form-control" value="Khyber Pakhtunkhwa" readonly="readonly" >
								</div>
								<div class="col-xs-3 ">
									<label>Reporting month</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
								</div>	
							</div>
							<div class="row">						
								<div class="col-xs-3 ">
									<label>District</label>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
								</div>
								<div class="col-xs-3 ">
									<label>Name of FLCF</label>
								</div>
								<div class="col-xs-3">
									<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-3 ">
									<label>Date of visit</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
								</div>              
								<div class="col-xs-3 ">
									<label>No. of LHWs affiliated</label>
								</div>
								<div class="col-xs-3">
									<p><?php $var ="lhw_attached"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								</div>
							</div>
					<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<p><?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>

					</div>
			<div class="row bc">
			  <div class="col-sm-6">
				<label>1. Training (including continuing education session)</label>
			  </div>
			  <div class="col-sm-3 brl text-center">
				<label>Status</label>
			  </div>
			  <div class="col-sm-3 text-center">
				<label>Remarks</label>
			  </div>
			</div>
			<?php 
				$labels = array(
					'i. Trained Trainers available (at least 2)',
					'ii. Female trainer in the team',
					'iii. Classroom conditions',
					'iv. Training content quality including display of charts/maps etc.',
					'v. Training material available',
					'vi. Training delivered according to the given guidelines. (Use training checklist if training session in process)',
					'vii. Attendance register up to date',
					'viii. Trainers aware of LHWs weak areas',
					'ix. Number of LHWs in a training batch'
				);
				for($i=1; $i<=count($labels); $i++){?>
					<div class="row">
						<div class="col-xs-6 ">
							<label><?php echo $labels[$i-1]; ?></label>
						</div>
						<div class="col-xs-3 <?php if($i==9){echo ' text-center';} ?>">						
							<?php if($i==3 || $i == 4){?>
								<div class="row">
									<div class="col-xs-12  text-center">
										<p style="padding-top: 7px;"><?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
									</div>
								</div><?php
							} else if($i==9){?>
								<p style="padding-top: 7px;"><?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								<?php
							} else{ ?>
								<div class="row">
									<div class="col-xs-12 text-center">
										<p style="padding-top: 7px;"><?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'N0'; ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-xs-3">
							<p><?php $var ='tr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div><?php 
				} 
			?>
			<div class="row bc">
			  <div class="col-sm-6 text-center">
				<label>2. Record Keeping</label>
			  </div>
			  <div class="col-sm-3 brl text-center">
				<label>Status</label>
			  </div>
			  <div class="col-sm-3 text-center">
				<label>Remarks</label>
			  </div>
			</div>
			<?php 
				$labels = array(
					'a) No. of LHWs reported last month',
					'b) Facility report of last month submitted to DPIU',
					'c) Personal files of LHWs',
					'd) Feedback from DPIU on reports'
				);
				for($i=1; $i<=count($labels); $i++){?>
					<div class="row">
						<div class="col-xs-6 ">
							<label><?php echo $labels[$i-1]; ?></label>
						</div>
						<div class="col-xs-3  <?php if($i==1){echo 'text-center';} ?>">
							<?php if($i==3){?>
								<div class="row">
									<div class="col-xs-12  text-center">
										<p style="padding-top:7px"><?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
									</div>
								</div><?php
							} else if($i==1){?>
								<p style="padding-top:7px"><?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								<?php
							} else{ ?>
								<div class="row">
									<div class="col-xs-12 text-center">
										<p style="padding-top:7px"><?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-xs-3 ">
							<p><?php $var ='rk_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div><?php 
				} 
			?>
			 <div class="row bc">
			  <div class="col-sm-6 text-center">
				<label>3.  Logistics</label>
			  </div>
			  <div class="col-sm-3 brl text-center">
				<label>Status</label>
			  </div>
			  <div class="col-sm-3 text-center">
				<label>Remarks</label>
			  </div>
			</div>
			<?php 
				$labels = array(
					'a) Storage is proper (Refer to checklist for store maintenance, C-III)',
					'b) Stock register maintained',
					'c) Issue-receipt vouchers maintained',
					'd) Bin card maintained',
					'e) Submitted demand for the quarter',
					//here f comes but it will be added manualy 'f) Sufficient stock (minimum level stock) available of',
					'a) Medicines',
					'b) Contraceptives',
					'c) LHW-MIS tools',
					'h) Regular monthly replenishment to LHWs by First Level Care Facility (FLCF)',
					'f) Regular quarterly replenishment to FLCF by the DPIU'
				);
				for($i=1; $i<=count($labels); $i++){?>
					<div class="row" ><?php 
						if($i==6){echo '<div class="col-xs-6 "><label>f) Sufficient stock (minimum level stock) available of</label></div><div class="col-xs-6 "></div></div><div class="row" >';} ?>
						<div class="col-xs-6">
							<label <?php if($i>=6 && $i<=8)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
						</div>
						<div class="col-xs-3 <?php if($i>=6 && $i<=8){echo 'text-center';} ?>">
							<?php if($i>=6 && $i<=8){?>
								<p class="pt7"><?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
								<?php
							} else{ ?>
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class="pt7"><?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
									</div>
								</div>
							<?php } ?>
						</div>
						<div class="col-xs-3 ">
							<p><?php $var ='l_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div><?php 
				} 
				?>
				<div class="row bc">
				<div class="col-sm-6 text-center">
				<label>4. Referrals</label>
			  </div>
			  <div class="col-sm-3 brl text-center">
				<label>Status / Remarks</label>
			  </div>
			  <div class="col-sm-3 text-center">
				<label>Status / Remarks</label>
			  </div>
			</div>
			<?php 
				$labels = array(
					'a) Records of LHW referrals maintained (Check record of Referral slips)',
					'b) Feedback to the LHW given for sampled referral slips'
				);
				for($i=1; $i<=count($labels); $i++){?>
					<div class="row">
					  <div class="col-xs-6 ">
						<label><?php echo $labels[$i-1]; ?></label>
					  </div>
						<div class="col-xs-3 ">
							<div class="row">
								<div class="col-xs-12  text-center">
									<p class="pt7"><?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
								</div>
							</div>
						</div>
					  <div class="col-xs-3 ">
						<p><?php $var ='ref_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div><?php 
				} 
			?>
			<div class="row bc">
			  <div class="col-sm-6 text-center">
				<label>5. Supervision</label>
			  </div>
			  <div class="col-sm-3 brl text-center">
				<label>Status / Remarks</label>
			  </div>
			  <div class="col-sm-3 text-center">
				<label>Status / Remarks</label>
			  </div>
			</div>
			<?php 
				$labels = array(
					'a) Trainers undertaking routine field visits',
					'b) Complete and timely submission of monthly reports by LHS to Health Facility',
					'Discussion & actions taken on LHS report',
					'c) Health Facility visited by any district supervisor during last 6 months',
					'd) Date of district supervisor\'s next visit known to staff'
				);
				for($i=1; $i<=count($labels); $i++){?>
					<div class="row">
					  <div class="col-xs-6 ">
						<label <?php if($i==3)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
					  </div>
					  <div class="col-xs-3 <?php if($i==5){echo 'text-center';} ?>">
							<?php if($i==2 || $i==3){?>
								<div class="row">
									<div class="col-xs-12  text-center">
										<p class="pt7"><?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
									</div>
								</div><?php
							} else if($i==5){?>
								<p class="pt7"><?php $var ="sup_r5_f1"; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
								<!-- <p class="pt7"><?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p> -->
								<?php
							} else{ ?>
								<div class="row">
									<div class="col-xs-12 text-center">
										<p class="pt7"><?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
									</div>
								</div>
							<?php } ?>
					  </div>
					  <div class="col-xs-3 ">
						<p><?php $var ='sup_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div><?php 
				} 
			?>
			<div class="row bc mt1 mb1">
			   <div class="col-sm-12">
				<label>Discussion with Trainers/FLCF In-charge:</label>
			  </div>
			</div>
			<div class="row bc">
			  <div class="col-sm-3 text-center">
				<label>Name of the Health Facility</label>
			  </div>
			  <div class="col-sm-2 brl text-center">
				<label>Discussion Attended by</label>
			  </div>
			  <div class="col-sm-2 text-center">
				<label>Issues discussed</label>
			  </div>
			  <div class="col-sm-2 brl text-center">
				<label>Action agreed for FLCF</label>
			  </div>
			  <div class="col-sm-3  zp text-center">
				<label>Action required at DPIU/PPIU (If required)</label>
			  </div>
			</div>
						<div class="row">
							<div class="col-xs-3 ">
								<p style="height: 170px;padding-top:0px;"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
							</div>
							<div class="col-xs-2 ">
								<p style="height: 170px;padding-top:0px;"><?php $var ='dis_attnd_by'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-2 ">
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r2_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r3_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r4_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r5_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-2 ">
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-12">
										<p><?php $var ='dis_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
									</div>
								</div>
							</div>
							<div class="col-xs-3 ">
							<div class="row">
							  <div class="col-xs-12">
								<p><?php $var ='dis_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							</div>
							<div class="row">
							  <div class="col-xs-12">
								<p><?php $var ='dis_r2_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							</div>
							<div class="row">
							  <div class="col-xs-12">
								<p><?php $var ='dis_r3_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							</div>
							<div class="row">
							  <div class="col-xs-12">
								<p><?php $var ='dis_r4_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							</div>
							<div class="row">
							  <div class="col-xs-12">
								<p><?php $var ='dis_r5_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							  </div>
							</div>
							</div>
						</div>
						<div class="row bc mt1 mb1">
							<div class="col-sm-12">
								<label>Critical Issues (to be followed during next visit)</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-sm-2 br text-center">
								<label>Sr. No.</label>
							</div>
							<div class="col-sm-10 text-center">
								<label>Critical Issues</label>
							</div>
							</div>
						<div class="row">
							<div class="col-xs-2  text-center">
								<label>1</label>
							</div>
							<div class="col-xs-10 ">
								<p><?php $var ='ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 text-center">
								<label>2</label>
							</div>
							<div class="col-xs-10 ">
								<p><?php $var ='ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2  text-center">
								<label>3</label>
							</div>
							<div class="col-xs-10 ">
								<p><?php $var ='ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2   text-center">
								<label>4</label>
							</div>
							<div class="col-xs-10 ">
								<p><?php $var ='ci_4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2   text-center">
								<label>5</label>
							</div>
							<div class="col-xs-10 ">
								<p><?php $var ='ci_5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
					</div><!--end of row rowlightbg-->
				</div><!--end of alignmentview-->
				<br>
				<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
					<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
						<?php if($DataRow->submitted_by==$userId){ ?>
							<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>lhw/forms/hf_edit/<?php echo $vpvc_id; ?>">
								<i class="fa fa-pencil-square-o"></i> Update  
							</a>
						<?php } ?>
						<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
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
			window.location.href="<?php echo $basePath; ?>lhw/forms/hf_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	});

	</script>
</body>
</html>