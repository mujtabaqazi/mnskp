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
  <title>LHS || Form</title>
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
   <div class="panel-heading text-center">Lady Health Supervisors (LHS) (To be used for two Lady Health Supervisors only)</div>
   <div class="panel-body">
		<div class="row">
          <div class="col-xs-3 mt7">
            <label>Name of the Supervisor</label>
          </div>
          <div class="col-xs-3">
            <p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
          <div class="col-xs-3 mt7">
            <label>Designation</label>
          </div>
          <div class="col-xs-3">
            <p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">         
          <div class="col-xs-3 mt7">
            <label>District</label>
          </div>
          <div class="col-xs-3">
            <p><?php echo get_District_Name(isset($DataRow)?$DataRow->distcode:0); ?></p>
          </div>
		  <div class="col-xs-3 mt7">
            <label>Date</label>
          </div>
          <div class="col-xs-3">
            <p><?php $var ="date"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
          </div>
        </div>
		<div class="row bc mt7">
          <div class="col-xs-8 text-center">
            <label></label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label></label>
          </div>
          <div class="col-xs-2 text-center">
            <label></label>
          </div>
        </div>
		<div class="row">
          <div class="col-xs-8 mt7">
            <label>Name of LHSs</label>
          </div>
          <div class="col-xs-2 text-center">
				<p><?php echo isset($DataRow)?(($DataRow->lhscode1 > 0)?get_LHS_Name($DataRow->lhscode1):''):''; ?></p>
          </div>
          <div class="col-xs-2 text-center">
				<p><?php echo isset($DataRow)?(($DataRow->lhscode2 > 0)?get_LHS_Name($DataRow->lhscode2):''):''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-8 mt7">
            <label>Headquarter Health Facility</label>
          </div>
          <div class="col-xs-2 text-center">
				<p><?php echo get_Facility_Name(isset($DataRow)?$DataRow->facode1:0); ?></p>
          </div>
          <div class="col-xs-2 text-center">
				<p><?php echo get_Facility_Name(isset($DataRow)?$DataRow->facode2:0); ?></p>
          </div>
        </div>
		<div class="row">
          <div class="col-xs-8 mt7">
            <label>Date of Visit</label>
          </div>
          <div class="col-xs-2 text-center">
            <p><?php $var ="dov1"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
          </div>
          <div class="col-xs-2 text-center">
            <p><?php $var ="dov2"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?></p>
          </div>
        </div>
		<div class="row">
          <div class="col-xs-8 mt7">
            <label>No. of LHWs attached</label>
          </div>
          <div class="col-xs-2 text-center">
            <p><?php $var ="lhw_attached1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
          <div class="col-xs-2 text-center">
            <p><?php $var ="lhw_attached2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1  bgcolcl">
            <label>Section 1: MONITORING AND SUPERVISION</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-1 text-center br"><label>#</label></div>
          <div class="col-xs-7 text-center"></div>
          <div class="col-xs-2 text-center brl">
            <label>Status/Remarks</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Status/Remarks</label>
          </div>
        </div>
		<?php 
			$labels = array(
				'Attending the HQ facility daily (Signing register)',
				'Advance tour plan available at FLCF and DPIU (Yes/No)',
				'Conducted 80% tours as per tour plan (Last month)',
				'Continued Education session attended in all concerned Health Facilities',
				'Each LHW visited (at least once every month) to the attached HQ health facility',
				'Uses Supervisory Checklist Properly',
				'Weaknesses in the knowledge and skills of the LHWs are communicated to the trainers',
				'Imparting on-job training to LHWs',
				'Cross checking the LHW-MIS (LHWs performance report, known as Jaiza Karkardagi, JK, Report in local language)',
				'Coordination with FLCF staff',
				'Average score of LHWs supervised (JK report)',
				'Using the training checklist (if the training is going on in the FLCF)',
				'Monthly reports submitted regular to',
				'FLCF',
				'DPIU',
				'Attended MMC at DPIU for last month',
				'Log book of vehicle properly maintained',
				'Salary received for last month',
				'FOL/FTA paid for last month',
				'FOL/FTA paid for last month',
				'Supervision & Training',
				'IPC and Community org.',
				'Maternal health',
				'Child health',
				'Family planning',
				'Family planning',
				'Doses of medicines',
				'First aid',
				'LHW-MIS',
				'(May use annex C-I, C-Il )',
				'Skills of LHS (Categories)',
				'Supervision & Training',
				'IPC and Community org.',
				'Maternal health',
				'Child health',
				'Family planning',
				'Common ailment +doses of medicines + First aid',
				'LHW-MIS',
				'(May use annex C-I, C-Il )'
			);
			$srNo = 1;
			for($i=1; $i<=count($labels); $i++){ ?>
				<div class="row">
					<div class="col-xs-1 text-center mt7">
						<label><?php if($i==14 || $i==15 || ($i>=21 && $i<=30) || ($i>=32 && $i<=39)){}else{echo $srNo;} ?></label>
					</div>
					<div class="col-xs-7 mt7">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-2 text-center">
						<p><?php $var ='ms_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-2 text-center">
						<p><?php $var ='ms_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div><?php 
				if($i==14 || $i==15 || ($i>=21 && $i<=30) || ($i>=32 && $i<=39)){}else{$srNo++;}
			} 
		?>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1  bgcolcl">
            <label>Section 2: DISCUSSION WITH LHS</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
            <label>Name of the LHS</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Issues discussed</label>
          </div>
          <div class="col-xs-3 br text-center">
            <label>Action agreed for LHS</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>Action required at FLCF/DPIU/PPIU</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 text-center">
            <input readonly="true" style="height: 170px;" class="form-control" type="text">
          </div>
          <div class="col-xs-3 text-center">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 text-center">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 text-center">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 text-center">
            <input readonly="true" style="height: 170px;" class="form-control" type="text">
          </div>
          <div class="col-xs-3 text-center">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r6_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r7_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r8_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r9_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r10_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 text-center">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r6_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r7_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r8_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r9_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r10_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 text-center">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r6_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r7_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r8_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r9_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r10_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1  bgcolcl">
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
          <div class="col-xs-2  text-center">
            <label>1</label>
          </div>
          <div class="col-xs-10 text-center">
            <p><?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2  text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 text-center">
            <p><?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2  text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 text-center">
            <p><?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2  text-center">
            <label>4</label>
          </div>
          <div class="col-xs-10 text-center">
            <p><?php $var ="ci_4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2  text-center">
            <label>5</label>
          </div>
          <div clas