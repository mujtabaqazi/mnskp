<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
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
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Health Facility</div>
					<div class="panel-body pbody">
						<?php 
						echo validation_errors();
						$action = $basePath."lhw/hf/save";
						$action .= isset($DataRow)?'/'.$id:'';
						$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
						echo form_open_multipart($action,$attributes); ?>
						<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-3 mt7">
								<label>Name of the Supervisor</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
							</div>
							<div class="col-xs-3 mt7">
								<label>Designation</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
							</div>        
						</div>
						<div class="row">
							<div class="col-xs-3 mt7">
								<label>Province</label>
							</div>
							<div class="col-xs-3">
								<input type="text"  class="form-control" value="Khyber Pakhtunkhwa" readonly="readonly" >
							</div>
							<div class="col-xs-3 mt7">
								<label>Reporting month</label>
							</div>
							<div class="col-xs-3">
								<input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->fmonth:''; ?>" readonly="readonly" >
							</div>	
						</div>
						<div class="row">						
							<div class="col-xs-3 mt7">
								<label>District</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
							</div>
							<div class="col-xs-3 mt7">
								<label>Name of FLCF</label>
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 mt7">
								<label>Date of visit</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" class="form-control dp1">
							</div>              
							<div class="col-xs-3 mt7">
								<label>No. of LHWs affiliated</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="lhw_attached"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text" class="form-control numberclass noDots">
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
        <div class="row bc">
          <div class="col-xs-6">
            <label>1. Training (including continuing education session)</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Status</label>
          </div>
          <div class="col-xs-3 text-center">
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
					<div class="col-xs-6 mt7">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-3 <?php if($i==9){echo 'zp';} ?>">						
						<?php if($i==3 || $i == 4){?>
							<div class="row">
								<div class="col-xs-4 zp text-right">
									<label>Poor</label>&nbsp;
									<input <?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="poor")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="poor" class="mt9" type="radio">
								</div>
								<div class="col-xs-4 zp text-center">
									<label>Fair</label>&nbsp;
									<input <?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="fair")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="fair" class="mt9" type="radio">
								</div>
								<div class="col-xs-4 zp">
									<label>Good</label>&nbsp;
									<input <?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="good")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="good" class="mt9" type="radio">
								</div>
							</div><?php
						} else if($i==9){?>
							<input value="<?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" placeholder="Number" type="text">
							<?php
						} else{ ?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Yes</label>&nbsp;
									<input <?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>No</label>&nbsp;
									<input <?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="col-xs-3 zp">
						<input value="<?php $var ='tr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
					</div>
				</div><?php 
			} 
		?>
        <div class="row bc">
          <div class="col-xs-6 text-center">
            <label>2. Record Keeping</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Status</label>
          </div>
          <div class="col-xs-3 text-center">
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
					<div class="col-xs-6 mt7">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-3  <?php if($i==1){echo 'zp';} ?>">
						<?php if($i==3){?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Complete</label>&nbsp;
									<input <?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="complete")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="complete" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>Incomplete</label>&nbsp;
									<input <?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="incomplete")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="incomplete" class="mt9" type="radio">
								</div>
							</div><?php
						} else if($i==1){?>
							<input value="<?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" placeholder="Number" type="text">
							<?php
						} else{ ?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Yes</label>&nbsp;
									<input <?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>No</label>&nbsp;
									<input <?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="col-xs-3 zp">
						<input value="<?php $var ='rk_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
					</div>
				</div><?php 
			} 
		?>
         <div class="row bc">
          <div class="col-xs-6 text-center">
            <label>3.  Logistics</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Status</label>
          </div>
          <div class="col-xs-3 text-center">
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
					if($i==6){echo '<div class="col-xs-6 mt7"><label>f) Sufficient stock (minimum level stock) available of</label></div><div class="col-xs-6 zp"></div></div><div class="row" >';} ?>
					<div class="col-xs-6 mt7">
						<label <?php if($i>=6 && $i<=8)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-3 <?php if($i>=6 && $i<=8){echo 'zp';} ?>">
						<?php if($i>=6 && $i<=8){?>
							<input value="<?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" placeholder="Number" type="text">
							<?php
						} else{ ?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Yes</label>&nbsp;
									<input <?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>No</label>&nbsp;
									<input <?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="col-xs-3 zp">
						<input value="<?php $var ='l_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
					</div>
				</div><?php 
			} 
			?>
			<div class="row bc">
			<div class="col-xs-6 text-center">
            <label>4. Referrals</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Status / Remarks</label>
          </div>
          <div class="col-xs-3 text-center">
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
				  <div class="col-xs-6 mt7">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
					<div class="col-xs-3 zp">
						<?php if($i==1){ ?>
						<div class="row">
							<div class="col-xs-4 zp text-right">
								<label>Poor</label>&nbsp;
								<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="poor")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="poor" class="mt9" type="radio">
							</div>
							<div class="col-xs-4 zp text-center">
								<label>Fair</label>&nbsp;
								<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="fair")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="fair" class="mt9" type="radio">
							</div>
							<div class="col-xs-4 zp">
								<label>Good</label>&nbsp;
								<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="good")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="good" class="mt9" type="radio">
							</div>
						</div>
						<?php }else{ ?>
						<div class="row">
							<div class="col-xs-4 zp text-right">
								<label>None</label>&nbsp;
								<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="none")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="none" class="mt9" type="radio">
							</div>
							<div class="col-xs-4 zp text-center">
								<label>Some</label>&nbsp;
								<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="some")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="some" class="mt9" type="radio">
							</div>
							<div class="col-xs-4 zp">
								<label>All</label>&nbsp;
								<input <?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="all")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="all" class="mt9" type="radio">
							</div>
						</div>
						<?php } ?>
					</div>
				  <div class="col-xs-3 zp">
					<input  value="<?php $var ='ref_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
				  </div>
				</div><?php 
			} 
		?>
        <div class="row bc">
          <div class="col-xs-6 text-center">
            <label>5. Supervision</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Status / Remarks</label>
          </div>
          <div class="col-xs-3 text-center">
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
				  <div class="col-xs-6 mt7">
					<label <?php if($i==3)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 <?php if($i==5){echo 'zp';} ?>">
						<?php if($i==2){?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Complete</label>&nbsp;
									<input <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="complete")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="complete" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>Timely</label>&nbsp;
									<input <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="timely")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="timely" class="mt9" type="radio">
								</div>
							</div><?php
						} else if($i==3){?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Discussion</label>&nbsp;
									<input <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="discussion")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="discussion" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>Action</label>&nbsp;
									<input <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="action")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="action" class="mt9" type="radio">
								</div>
							</div><?php
						} else if($i==5){?>
							<input value="<?php $var ="sup_r5_f1"; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control zp text-center anyOtherDate" type="text">
							<!-- <input value="<?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control dp" type="text"> -->
							<?php
						} else{ ?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Yes</label>&nbsp;
									<input <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>No</label>&nbsp;
									<input <?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
								</div>
							</div>
						<?php } ?>
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='sup_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
				  </div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Discussion with Trainers/FLCF In-charge:</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
            <label>Name of the Health Facility</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Discussion Attended by</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Issues discussed</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Action agreed for FLCF</label>
          </div>
          <div class="col-xs-3 zp text-center">
            <label>Action required at DPIU/PPIU (If required)</label>
          </div>
        </div>
					<div class="row">
						<div class="col-xs-3 zp">
							<input style="height: 170px;" value="<?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?>" readonly="readonly" class="form-control" type="text">
						</div>
						<div class="col-xs-2 zp">
							<input value="<?php $var ='dis_attnd_by'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="height: 170px;" class="form-control" type="text">
						</div>
						<div class="col-xs-2 zp">
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="1" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r2_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="2" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r3_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="3" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r4_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="4" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r5_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="5" type="text">
								</div>
							</div>
						</div>
						<div class="col-xs-2 zp">
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-12">
									<input value="<?php $var ='dis_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
								</div>
							</div>
						</div>
						<div class="col-xs-3 zp">
						<div class="row">
						  <div class="col-xs-12">
							<input value="<?php $var ='dis_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<input value="<?php $var ='dis_r2_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<input value="<?php $var ='dis_r3_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<input value="<?php $var ='dis_r4_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						  </div>
						</div>
						<div class="row">
						  <div class="col-xs-12">
							<input value="<?php $var ='dis_r5_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						  </div>
						</div>
						</div>
					</div>
					<div class="row bc mt1 mb1">
						<div class="col-xs-12">
							<label>Critical Issues (to be followed during next visit)</label>
						</div>
					</div>
					<div class="row bc">
						<div class="col-xs-2 br text-center">
							<label>Sr. No.</label>
						</div>
						<div class="col-xs-10 text-center">
							<label>Critical Issues</label>
						</div>
						</div>
					<div class="row">
						<div class="col-xs-2 cmargin27 text-center">
							<label>1</label>
						</div>
						<div class="col-xs-10 zp">
							<input value="<?php $var ='ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 cmargin27 text-center">
							<label>2</label>
						</div>
						<div class="col-xs-10 zp">
							<input value="<?php $var ='ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 cmargin27 text-center">
							<label>3</label>
						</div>
						<div class="col-xs-10 zp">
							<input value="<?php $var ='ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 cmargin27 text-center">
							<label>4</label>
						</div>
						<div class="col-xs-10 zp">
							<input value="<?php $var ='ci_4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 cmargin27 text-center">
							<label>5</label>
						</div>
						<div class="col-xs-10 zp">
							<input value="<?php $var ='ci_5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
						</div>
					</div>
				</div><!--end of row rowlightbg-->
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
	<script type="text/javascript">
		var triggerDist = "No";
	</script>
	<?php $this->load->view("templates/scripts"); ?>
	<?php $this->load->view("templates/chklsts_scripts"); ?>
</body>
</html>