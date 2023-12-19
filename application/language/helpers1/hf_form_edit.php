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
  <!--End of header-->
<div class="container">
   <div class="panel panel-primary">
   <div class="panel-heading text-center">Health Facility (The supervisor will be visiting at least two health facilities)
   </div>
   <div class="panel-body">
		<?php 
		echo validation_errors();
		$action = $basePath."lhw/hf/save";
		$action .= isset($DataRow)?'/'.$id:'';
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		echo form_open_multipart($action,$attributes); ?>
        <div class="row">
          <div class="col-xs-3 mt7">
            <label>Name of the Supervisor</label>
          </div>
          <div class="col-xs-3">
            <input value="<?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" required="required"  class="form-control text-center" type="text">
          </div>
          <div class="col-xs-3 mt7">
            <label>Designation</label>
          </div>
          <div class="col-xs-3">
            <input value="<?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>"  class="form-control text-center" type="text">
          </div>
        </div>
        <div class="row">         
          <div class="col-xs-3 mt7">
            <label>District</label>
          </div>
          <div class="col-xs-3">
            <select name="distcode" id="distcode" required="required" class="form-control text-center">
				<?php echo getDistricts_options(false,(isset($DataRow)?$DataRow->distcode:0)); ?>
            </select>
          </div>
        </div>
        <div class="row bc mt7">
          <div class="col-xs-6 text-center">
            <label></label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>For Health Facility 1</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>For Health Facility 2</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 mt7">
            <label>Name of Health Facility</label>
          </div>
          <div class="col-xs-3 zp">
				<select name="facode1" required="required" class="form-control text-center">
					<?php echo getFacilities_options(false,(isset($DataRow)?$DataRow->facode1:0),(isset($DataRow)?$DataRow->distcode:0)); ?>
				</select>
          </div>
          <div class="col-xs-3 zp">
				<select name="facode2" required="required" class="form-control text-center">
					<?php echo getFacilities_options(false,(isset($DataRow)?$DataRow->facode2:0),(isset($DataRow)?$DataRow->distcode:0)); ?>
				</select>
          </div>
        </div>
		<div class="row">
          <div class="col-xs-6 mt7">
            <label>Date of visit:</label>
          </div>
          <div class="col-xs-3 zp">
            <input value="<?php $var ="dov1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control dp" placeholder="" type="text">
          </div>
          <div class="col-xs-3 zp">
            <input value="<?php $var ="dov2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control dp" placeholder="" type="text">
          </div>
        </div>
		<div class="row">
          <div class="col-xs-6 mt7">
            <label>No. of LHWs attached:</label>
          </div>
          <div class="col-xs-3 zp">
            <input value="<?php $var ="lhw_attached1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
          <div class="col-xs-3 zp">
            <input value="<?php $var ="lhw_attached2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-6 text-center">
            <label>1. Training (including continuing education session)</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Status/Remarks (For Health Facility 1)</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>Status/Remarks (For Health Facility 2)</label>
          </div>
        </div>
		<?php 
			$labels = array(
				'a) Trained Trainers available (at least 2)',
				'b) Female trainer in the team',
				'c) Classroom conditions',
				'd) Training content is satisfactory including display of charts/maps etc.',
				'e) Training material available',
				'f) Training delivered according to the given guidelines. (Use training checklist if training session in process)',
				'g) Attendance register maintained',
				'h) Trainers aware of LHWs weak areas',
				'i) No. of LHWs in a training batch'
			);
			for($i=1; $i<=count($labels); $i++){?>
				<div class="row">
				  <div class="col-xs-6 mt7">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='tr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
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
            <label>Status/Remarks (For Health Facility 1)</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>Status/Remarks (For Health Facility 2)</label>
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
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='rk_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
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
            <label>Status / Remarks</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>Status / Remarks</label>
          </div>
        </div>
		<?php 
			$labels = array(
				'a) Storage is proper (Refer to checklist for store maintenance, C-III)',
				'b) Stock register/issue¬-receipt vouchers/ bin card maintained',
				'c) Submitted demand for the quarter',
				'd) Sufficient stock (minimum level stock) available of',
				'a) Medicines',
				'b) Contraceptives',
				'c) LHW-MIS tools',
				'e) Regular monthly replenishment to LHWs by First Level Care Facility (FLCF)',
				'f) Regular quarterly replenishment to FLCF by the DPIU'
			);
			for($i=1; $i<=count($labels); $i++){?>
				<div class="row">
				  <div class="col-xs-6 mt7">
					<label <?php if($i>=5 && $i<=7)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='l_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
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
				'b)  Feedback to the LHW'
			);
			for($i=1; $i<=count($labels); $i++){?>
				<div class="row">
				  <div class="col-xs-6 mt7">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='ref_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='ref_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
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
				'b) Regular submission of monthly reports by LHS to Health Facility',
				'Discussion & actions taken on LHS report',
				'c) Health Facility visited by any district supervisor during last 6 months (Please specify)',
				'd) Date of district supervisor\'s next visit known to staff'
			);
			for($i=1; $i<=count($labels); $i++){?>
				<div class="row">
				  <div class="col-xs-6 mt7">
					<label <?php if($i==3)echo ' class="pl15"'; ?>><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='sup_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
				  </div>
				  <div class="col-xs-3 zp">
					<input value="<?php $var ='sup_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
				  </div>
				</div><?php 
			} 
		?>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
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
            <input style="height: 170px;" readonly="readonly" class="form-control" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ="dis_attnd_by"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="height: 170px;" class="form-control" type="text">
          </div>
          <div class="col-xs-2 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="1" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="2" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="3" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="4" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="5" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-2 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
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
            <input value="<?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>4</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_4"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>5</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_5"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
         <hr>
            <div class="col-md-4 col-sm-4 col-xs-4 btnsubmits">
                <button type="submit" class="btn btn-primary btn-md" role="button">
					<i class="fa fa-floppy-o "></i> Save Form  
				</button>
                <button type="reset" class="btn btn-primary btn-md">
					<i class="fa fa-repeat"></i> Reset Form 
				</button>
                <a class="btn btn-primary btn-md" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
            </div>
        </div>
		<?php echo form_close(); ?>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
</div><!--end of container-->
  <?php $this->load->view("templates/footer"); ?>
  <?php $this->load->view("templates/scripts"); ?>
</body>
</html>