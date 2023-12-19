<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Only for Health Facilities with Functional EPI Centre</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->

  <!--End of header-->
<div class="container-fluid">
   <div class="panel panel-primary">
   <div class="panel-heading text-center"> Hand-on Support Activity – Reporting Health Facility Level
   </div>
   <div class="panel-body pbody">
      <?php 
		echo validation_errors();
		$action = $basePath."da/dhisfacility/save";
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		$hidden = array('vpvc_id' => $vpvc_id);
		echo form_open_multipart($action,$attributes,$hidden); ?>
      <div class="rowlightbg"> 
        <div class="row">
          <div class="col-xs-2">
            <label class="pt7 pb2">Supervisor Name</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="supervisor_name"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow))?$vpvcDataRow->$var:''; ?>" readonly="readonly">
			<p class="pt7"><?php echo $vpvcDataRow->$var; ?></p>
          </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">Supervisor Designation</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="supervisor_desg"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow))?$vpvcDataRow->$var:''; ?>" readonly="readonly">
			<p class="pt7"><?php echo $vpvcDataRow->$var; ?></p>
		  </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">District</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="distcode"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow->distcode))?$vpvcDataRow->$var:substr($vpvcDataRow->facode,0,3); ?>" readonly="readonly">
			<p class="pt7"><?php echo get_District_Name(substr($vpvcDataRow->facode,0,3)); ?></p>
		  </div>
        </div>
        <div class="row">
          <div class="col-xs-2">
            <label class="pt7 pb2">Reporting Month</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="fmonth"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow))?$vpvcDataRow->$var:''; ?>" readonly="readonly">
			<p class="pt7"><?php echo $vpvcDataRow->$var; ?></p>
		  </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">Date of Visit</label>
          </div>
          <div class="col-xs-2">
            <input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
			      <!-- <p class="pt7"><?php echo $vpvcDataRow->visitdate; ?></p> -->
		  </div>
		  <div class="col-xs-2">
            <label class="pt7 pb2">Province</label>
          </div>
          <div class="col-xs-2">
            <p class="pt7">Khyber Pakhtunkhwa</p>
          </div>
        </div>
        <div class="row">
		  <div class="col-xs-2">
			<label class="pt7 pb2">Name of HF</label>
		  </div>
		  <div class="col-xs-2">
			<input class="form-control" <?php $var="facode"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow))?$vpvcDataRow->$var:''; ?>" readonly="readonly">
			<p class="pt7"><?php echo get_Facility_Name($vpvcDataRow->$var); ?></p>
		  </div>
		  <div class="col-xs-2">
			<label class="pt7 pb2">Facility Type</label>
		  </div>
		  <div class="col-xs-2">
			<input class="form-control" <?php $var="fatype"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow))?$vpvcDataRow->$var:''; ?>" readonly="readonly">
			<p class="pt7"><?php echo $vpvcDataRow->$var; ?></p>
		  </div>
		  <div class="col-xs-2">
            <label class="pt7 pb2">HID code of HF</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="facode"; ?> type="hidden" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($vpvcDataRow))?$vpvcDataRow->$var:''; ?>" readonly="readonly">
			<p class="pt7"><?php echo $vpvcDataRow->$var; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2">
			<label class="pt7 pb2">Visit Number</label>
		  </div>
		  <div class="col-xs-2">
			<input class="form-control numberclass noDots" <?php $var="visit_numb"; ?> type="text" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="" >
		  </div>
          
          <div class="col-xs-2">
            <label class="pt7 pb2">Name of In-Charge</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="fac_inc_name"; ?> type="text" id="<?php echo $var; ?>" name="<?php echo $var; ?>" >
          </div>
		  <div class="col-xs-2">
            <label class="pt7 pb2">Name of DHIS FP</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="dhis_fp_name"; ?> type="text" id="<?php echo $var; ?>" name="<?php echo $var; ?>" >
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2">
            <label class="pt7 pb2">Designation of DHIS FP</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="dhis_fp_desg"; ?> type="text" id="<?php echo $var; ?>" name="<?php echo $var; ?>" >
          </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">Phone No. of HF</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control numberclass noDots" <?php $var="fac_phone"; ?> type="text" id="<?php echo $var; ?>" name="<?php echo $var; ?>" >
          </div>
		  <div class="col-xs-2">
            <label class="pt7 pb2">Phone No. of Incharge</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control numberclass noDots" <?php $var="inc_phone"; ?> type="text" id="<?php echo $var; ?>" name="<?php echo $var; ?>" >
          </div>
        </div>
        <div class="row">
          
          <div class="col-xs-2">
            <label class="pt7 pb2">In-charge Email ID</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control" <?php $var="inc_email"; ?> type="email" id="<?php echo $var; ?>" name="<?php echo $var; ?>" >
          </div>
        </div>
        
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Table 1 B: Hands-on Practice Support and Training Conducted</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 br">
                <label class="pt33 pb33">Staff Designation</label>
              </div>
              <div class="col-xs-6 text-center">
                <label class="pt33">Staff Name</label>
              </div>
            </div>
          </div>
          <div class="col-xs-5 brl text-center">
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>DHIS</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-xs-3 br zp">
                <label style="padding-bottom: 20px;">Monthly Report Preparation</label>
              </div>
              <div class="col-xs-3">
                <label>Use of Information</label>
              </div>
              <div class="col-xs-3 brl zp">
                <label style="padding-bottom: 20px;">Checking Data Accuracy LQAS</label>
              </div>
              <div class="col-xs-3 zp">
                <label>Reviewing Discrepancies in reported data</label>
              </div>
            </div>
          </div>
          <div class="col-xs-4 text-center">
            <div class="row">
              <div class="col-xs-12">
                <label>cLMIS</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-xs-4 zp">
                <label>Understanding on cLMIS monthly report proforma</label>
              </div>
              <div class="col-xs-4 brl">
                <label style="padding-bottom: 20px;">Monthly Report Preparation</label>
              </div>
              <div class="col-xs-4 text-left">
                <label>Reviewing Discrepancies inreported data</label>
              </div>
            </div>
          </div>
        </div>
		<?php for($i=1;$i<=5;$i++){ ?>
        <div class="row">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 zp">
                <select class="form-control zp" <?php $var="hop_r".$i."_f1"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" ><?php echo getHFStaffDesignation_options($vpvcDataRow->fatype); ?></select>
              </div>
              <div class="col-xs-6 zp">
                <input class="form-control" <?php $var="hop_r".$i."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-5 zp">
            <div class="row">
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f3"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f4"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f4"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f5"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f5"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-6 text-center zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f6"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f6"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f7"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f7"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f8"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f8"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-6 text-center zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f9"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="hop_r".$i."_f9"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php } ?>
		
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Table 2: Data Management (Instruction: Monthly report is expected to be managed by DHIS focal person and
data collection tools by the concerned staff)</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>Responsibility</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-xs-6">
                <label>Staff Designation</label>
              </div>
              <div class="col-xs-6 bl">
                <label class="pb20">Staff Name</label>
              </div>
            </div>
          </div>
          <div class="col-xs-4 brl">
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>Data management -DHIS</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-xs-6">
                <label>Retaining copy of monthly report</label>
              </div>
              <div class="col-xs-6 bl">
                <label>Safe custody of previously used DHIS Tools</label>
              </div>
            </div>
          </div>
          <div class="col-xs-5">
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>Data management -cLMIS</label>
              </div>
            </div>
              <div class="row bt">
              <div class="col-xs-6">
                <label>Retaining copy of monthly report</label>
              </div>
              <div class="col-xs-6 bl">
                <label>Retaining of Stock register of Contraceptive Commodities</label>
              </div>
            </div>
            </div>
          
        </div>
		<?php for($i=1;$i<=9;$i++){ ?>
        <div class="row">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 zp">
                <select class="form-control zp" <?php $var="dm_r".$i."_f1"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" ><?php echo getHFStaffDesignation_options($vpvcDataRow->fatype); ?></select>
              </div>
              <div class="col-xs-6 zp">
                <input class="form-control" <?php $var="dm_r".$i."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f3"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f4"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f4"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-5">
              <div class="row">
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f5"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f5"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-6 text-right zp">
                    <label>Yes</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f6"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var="dm_r".$i."_f6"; ?> checked="checked" id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                </div>
              </div>
            </div>
            </div>
          </div>
		  <?php } ?>
          <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Table 3: DHIS Tools Status</label>
          </div>
          </div>
          <div class="row bc mb1">
            <div class="col-xs-6 br">
              <label>List of DHIS Tools</label>
            </div>
            <div class="col-xs-6">
              <label>Tools/ Instruments - Please insert (Y, N, or NA) as applicable from list</label>
            </div>
          </div>

          <div class="row bc">
            <div class="col-xs-6 br">
              <div class="row">
                <div class="col-xs-1">
                  <label>#</label></div>
                <div class="col-xs-8 brl">
                  <label>Name</label></div>
                <div class="col-xs-3">
                  <label>DHIS Instrument No.</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6 zp">
              <div class="row">
                <div class="col-xs-3 zp text-center">
                   <label>Available</label>
                </div>
                <div class="col-xs-3 bl">
                   <label>In Use</label>
                </div>
                <div class="col-xs-3 brl zp">
                  <label>Filled By designated person</label>
                </div>
                <div class="col-xs-3 text-center">
                   <label>Filled Properly</label>
                </div>
              </div>
            </div>
          </div>
		  <?php
		  $DhisToolsStatusLabels = array(
			'CENTRAL REGISTRATION POINT REGISTER' => 'DHIS-01(R)',
			'OPD TICKET' => 'DHIS-02 (F)',
			'MEDICINE REQUISITION SLIP' => 'DHIS-02-A (F)',
			'OUTPATIENT DEPARTMENT REGISTER' => 'DHIS-03 (R)',
			'OPD ABSTRACT FORM' => 'DHIS-04 (F)',
			'LABORATORY REGISTER' => 'DHIS-05 (R)',
			'RADIOLOGY/ ULTRASONOGRAPHY/ CT SCAN/ECG REGISTER' => 'DHIS-06 (R)',
			'INDOOR PATIENT REGISTER' => 'DHIS-07 (R)',
			'INDOOR ABSTRACT FORM' => 'DHIS-08 (F)',
			'DAILY BED STATEMENT REGISTER' => 'DHIS-09 (R)',
			'O.T. REGISTER' => 'DHIS-10 (R)',
			'FAMILY PLANNING REGISTER' => 'DHIS-11 (R)',
			'FAMILY PLANNING CARD' => 'DHIS-12 (C)',
			'MATERNAL HEALTH REGISTER' => 'DHIS-13 (R)',
			'ANTENATAL CARD' => 'DHIS-14 (C)',
			'OBSTETRIC REGISTER' => ' DHIS-15 (R)',
			'DAILY MEDICINE EXPENSE REGISTER' => 'DHIS-16 (R)',
			'STOCK REGISTER (MEDICINE/SUPPLIES)' => 'DHIS-17 (R)',
			'STOCK REGISTER (EQUIPMENT/FURNITURE/ LINEN)' => 'DHIS-18(R)',
			'COMMUNITY MEETING REGISTER' => 'DHIS-19 (R)',
			'FACILITY STAFF MEETING REGISTER' => 'DHIS-20 (R)',
			'PHC FACILITY MONTHLY REPORT FORM' => 'DHIS-21 (MR)',
			'SECONDARY HOSPITAL MONTHLY REPORT FORM' => 'DHIS-22 (MR)',
			'CATCHMENT AREA POPULATION CHART' => 'DHIS-24 (YR)',
			'LQAS FORMS' => ''
		  );
		  $i=1;
		  foreach($DhisToolsStatusLabels as $key => $val){
		  ?>
          <div class="row">
            <div class="col-xs-6">
              <div class="row">
                <div class="col-xs-1">
                  <label class="pt7 pb2"><?php echo $i; ?></label></div>
                <div class="col-xs-8">
                  <label class="pt7 pb2"><?php echo $key; ?></label></div>
                <div class="col-xs-3">
                  <label class="pt7 pb2"><?php echo $val; ?></label>
                </div>
              </div>
            </div>
            <div class="col-xs-6 zp">
              <div class="row">
                <div class="col-xs-3 zp">
                  <div class="row">
                  <div class="col-xs-4 text-right zp">
                    <label>Y</label>
                    <input <?php $var="dts_r".$i."_f1"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp text-center">
                    <label>N</label>
                    <input <?php $var="dts_r".$i."_f1"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp">
                    <label>NA</label>
                    <input <?php $var="dts_r".$i."_f1"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" checked="checked" value="2" class="mt9" type="radio">
                  </div>
                </div>
                </div>
                <div class="col-xs-3">
                  <div class="row">
                  <div class="col-xs-4 text-right zp">
                    <label>Y</label>
                    <input <?php $var="dts_r".$i."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp text-center">
                    <label>N</label>
                    <input <?php $var="dts_r".$i."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp">
                    <label>NA</label>
                    <input <?php $var="dts_r".$i."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" checked="checked" value="2" class="mt9" type="radio">
                  </div>
                </div>
                </div>
                <div class="col-xs-3">
                  <div class="row">
                  <div class="col-xs-4 text-right zp">
                    <label>Y</label>
                    <input <?php $var="dts_r".$i."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp text-center">
                    <label>N</label>
                    <input <?php $var="dts_r".$i."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp">
                    <label>NA</label>
                    <input <?php $var="dts_r".$i."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" checked="checked" value="2" class="mt9" type="radio">
                  </div>
                </div>
                </div>
                <div class="col-xs-3">
                  <div class="row">
                  <div class="col-xs-4 text-right zp">
                    <label>Y</label>
                    <input <?php $var="dts_r".$i."_f4"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp text-center">
                    <label>N</label>
                    <input <?php $var="dts_r".$i."_f4"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-4 zp">
                    <label>NA</label>
                    <input <?php $var="dts_r".$i."_f4"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" checked="checked" value="2" class="mt9" type="radio">
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
		  <?php $i++; } ?>
          <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Table 5: DHIS and cLMIS Performance Status</label>
          </div>
          </div>
          <div class="row bc">
            <div class="col-xs-1">
              <label>S/No.</label>
            </div>
            <div class="col-xs-10 brl">
              <label>Data Quality Parameter</label>
            </div>
            <div class="col-xs-1">
              <label>Status</label>
            </div>
          </div>
          <div class="row bc mt1">
            <div class="col-xs-12">
              <label>DHIS</label>
            </div>
          </div>
		  <?php
		  $labelArrayNew=array(
	  	'1' => 'Availability of DHIS Procedure Manual (for consultation in case of ambiguity)',
	  	'2' => 'Reporting Regularity Number of Monthly Reports submitted during last year',
	  	'3' => 'Current report completely filled (Report completeness)',
	  	'4' => 'Accuracy of current report (Data Accuracy) - (%)',
		'5' => 'Number of monthly reports submitted within due date during last 12 months (Report timeliness)',
		'6' => 'HF received feedback regularly from M&E Cell (Check for availability of at least 4 quarterly feedback reports received during last 12 months)',
		'7' => 'Status of DHIS tools at facility Stock sufficient for three (03) months',
		'nothing' => 'Record keeping',
		'8' => 'Copy of last twelve (12) submitted monthly report available',
		'9' => 'Filled instruments of each data collection point used during last year(s) available',
		'10' => 'Decisions taken using DHIS information during last month (Check from Facility meeting register)',
		'11' => 'Minutes of monthly performance review meeting recorded in facility meeting register',
		'12' => 'DHIS data displayed (including KPIs)'
	  );
	  $yesNoKeysArray = array('1','3','5','6','7','8','9','10','11','12');
	  $yesNoKeysArray = array_fill_keys($yesNoKeysArray,'yesno'); 
	  $inputKeysArray = array('2','4');
	  $inputKeysArray = array_fill_keys($inputKeysArray,'inputs');
	  $i = 1;
      foreach($labelArrayNew as $key => $val){
	  	if(array_key_exists($key, $yesNoKeysArray)){
		  ?>
          <div class="row">
            <div class="col-xs-1">
               <label class="pt7 pb2"><?php if(array_key_exists($key, array_fill_keys(array('9','10'),'yes')) == false){ echo $i; $i++; } ?></label>
            </div>
            <div class="col-xs-10">
              <label class="pt7 pb2"><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 zp">
               <div class="row">
                  <div class="col-xs-6 text-center zp">
                    <label>Y</label>
                    <input <?php $var="ps_r".$key."_f1" ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6 zp text-center">
                    <label>N</label>
                    <input <?php $var="ps_r".$key."_f1" ?> name="<?php echo $var; ?>" checked="checked" value="0" class="mt9" type="radio">
                  </div>
                </div>
            </div>
          </div>
		  <?php }elseif(array_key_exists($key, $inputKeysArray)){ ?>
				<div class="row">
					<div class="col-xs-1">
					   <label class="pt7 pb2"><?php echo $i; $i++; ?></label>
					</div>
					<div class="col-xs-10">
					  <label class="pt7 pb2"><?php echo $val; ?></label>
					</div>
					<div class="col-xs-1 zp numberclass noDots">
						<input class="form-control" <?php $var="ps_r".$key."_f1" ?> name="<?php echo $var; ?>" type="text">
					</div>
				</div>
			<?php }else{ ?>
				<div class="row">
					<div class="col-xs-1">
					   <label class="pt7 pb2"><?php echo $i; $i++; ?></label>
					</div>
					<div class="col-xs-10">
					  <label class="pt7 pb2"><?php echo $val; ?></label>
					</div>
					<div class="col-xs-1 zp">
					   
					</div>
				</div>
			<?php } ?>
	  <?php } ?>
          
          <div class="row bc mt1">
            <div class="col-xs-12">
              <label>cLMIS</label>
            </div>
          </div>
		  <?php
		  $cLMISLabels = array(
		  '13' => 'Availability of monthly cLMIS reporting proforma',
		  '14' => 'Availability of filled monthly report proformas of last 6 months',
		  '15' => 'Current report completely filled (Report completeness)'
		  );
		  foreach($cLMISLabels as $key => $val){
		  ?>
          <div class="row">
            <div class="col-xs-1">
               <label class="pt7 pb2"><?php echo ($key-1); ?></label>
            </div>
            <div class="col-xs-10">
              <label class="pt7 pb2"><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 zp">
               <div class="row">
                  <div class="col-xs-6 text-center zp">
                    <label>Y</label>
                    <input <?php $var="ps_r".$key."_f1" ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6 zp text-center">
                    <label>N</label>
                    <input <?php $var="ps_r".$key."_f1" ?> name="<?php echo $var; ?>" checked="checked" value="0" class="mt9" type="radio">
                  </div>
                </div>
            </div>
          </div>
		  <?php } ?>
          <div class="row bc mt1">
            <div class="col-xs-1 br"><label>Results</label>
            </div>
            <div class="col-xs-11">
            <label>Please be brief and specific while reporting table below</label>
          </div>
        </div>
        <div class="row mt1 bc">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-2">
                <label>#</label>
              </div>
              <div class="col-xs-10 bl">
                <label>Specific Issue/Gap</label>
              </div>
            </div>
          </div>
          <div class="col-xs-2 brl">
            <label>Reason/s</label>
          </div>
          <div class="col-xs-2">
            <label>Action/s taken</label>
          </div>
          <div class="col-xs-1 brl zp text-center">
            <label>Resolved (Y/N)</label>
          </div>
          <div class="col-xs-2">
            <label>Reason if issue / gap persist</label>
          </div>
          <div class="col-xs-2 bl">
            <label>Any suggestion/s</label>
          </div>
        </div>
		<?php for($i=1;$i<=3;$i++){ ?>
        <div class="row">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-2">
                <label class="pt7 pb2"><?php echo $i; ?></label>
              </div>
              <div class="col-xs-10 zp">
                <input class="form-control" <?php $var="res_r".$i."_f1" ?> name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control" <?php $var="res_r".$i."_f2" ?> name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control" <?php $var="res_r".$i."_f3" ?> name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1">
            <div class="row">
                  <div class="col-xs-6 text-center zp">
                    <label>Y</label>
                    <input <?php $var="res_r".$i."_f4" ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
                  </div>
                  <div class="col-xs-6 zp text-center">
                    <label>N</label>
                    <input <?php $var="res_r".$i."_f4" ?> name="<?php echo $var; ?>" checked="checked" value="0" class="mt9" type="radio">
                  </div>
                </div>
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control" <?php $var="res_r".$i."_f5" ?> name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control" <?php $var="res_r".$i."_f6" ?> name="<?php echo $var; ?>" type="text">
          </div>
        </div>
		<?php } ?>
        <div class="row">
          <div class="col-xs-12">
            <p style="padding-left: 3%; padding-top: 5px;">Please carry-forward un-resolved issue/gap in next visit report.</p>
          </div>
        </div>
      </div><!--end of row lightbg-->
      <div class="rowlightbg2">
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Table 1 A: Hands-on Practice Support and Training Conducted</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-2">
                <label class="pt17">#</label>
              </div>
              <div class="col-xs-10 bl">
                <div class="row bb">
                  <div class="col-xs-12 text-center"><label>Staff</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-6 br">
                    <label class="pb8">Designation</label>
                  </div>
                  <div class="col-xs-6">
                    <label>Name</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 brl">
            <div class="row bb">
              <div class="col-xs-1 zp text-center">
                <label>1</label>
              </div>
              <div class="col-xs-1 brl text-center">
                <label>2</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>3</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>4</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>5</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>6</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>7</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>8</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>9</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>10</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>11</label>
              </div>
              <div class="col-xs-1 bl zp text-center">
                <label>12</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-01(R)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-02(F)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-02-A(F)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-03(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-04(F)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-05(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-06(R)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-07(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-08(F)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-09(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-10(R)</label>
              </div>
              <div class="col-xs-1 bl zp text-center">
                <label class="cf">DHIS<br>-11(R)</label>
              </div>
            </div>
          </div>
          <div class="col-xs-4 br">
            <div class="row bb">
              <div class="col-xs-1 zp text-center">
                <label>13</label>
              </div>
              <div class="col-xs-1 brl text-center">
                <label>14</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>15</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>16</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>17</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>18</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>19</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>20</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>21</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label>22</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label>23</label>
              </div>
              <div class="col-xs-1 bl zp text-center">
                <label>25</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-12(C)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-13(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-14(C)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-15(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-16(R)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-17(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-18(R)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-19(R)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-20(R)</label>
              </div>
              <div class="col-xs-1 brl zp text-center">
                <label class="cf">DHIS<br>-21(MR)</label>
              </div>
              <div class="col-xs-1 zp text-center">
                <label class="cf">DHIS<br>-22(MR)</label>
              </div>
              <div class="col-xs-1 bl zp text-center">
                <label class="cf">DHIS<br>-24(YR)</label>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row bb">
              <div class="col-xs-6 br">
                <label>26</label>
              </div>
              <div class="col-xs-6">
                <label>27</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 br">
                <label class="cf">LQAS Forms</label>
              </div>
              <div class="col-xs-6">
                <label class="cf">CMRR</label>
              </div>
            </div>
          </div>
        </div>
		<?php
		for($i=1;$i<=10;$i++){
		?>
        <div class="row cloned-row">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-2">
                <label class="pt14"><?php echo $i; ?></label>
              </div>
              <div class="col-xs-10">
                <div class="row">
                  <div class="col-xs-6 zp">

                    <select class="form-control zp" <?php $var="staff_desg[$i]" ?> name="<?php echo $var; ?>" style="height: 46px;"><?php echo getHFStaffDesignation_options($vpvcDataRow->fatype); ?></select>
                  </div>
                  <div class="col-xs-6 zp">

                    <input class="form-control" <?php $var="staff_name[$i]" ?> name="<?php echo $var; ?>" type="text" style="height: 46px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-01(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_01" style="margin: 0px;"  <?php $var="dhis_01[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_01" style="margin: 0px;"  <?php $var="dhis_01[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_01" style="margin: 0px;"  <?php $var="dhis_01[$i]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-02(F)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_02" style="margin: 0px;"  <?php $var="dhis_02[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_02" style="margin: 0px;"  <?php $var="dhis_02[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_02" style="margin: 0px;"  <?php $var="dhis_02[$i]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-02-A(F)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center a">Y<input class="dhis_02a" style="margin: 0px;"  <?php $var="dhis_02a[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center a">N<input class="dhis_02a" style="margin: 0px;"  <?php $var="dhis_02a[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp a">NA<input class="dhis_02a" style="margin: 0px;" <?php $var="dhis_02a[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-03(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_03" style="margin: 0px;"  <?php $var="dhis_03[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_03" style="margin: 0px;"  <?php $var="dhis_03[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_03" style="margin: 0px;" <?php $var="dhis_03[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-04(F)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center  ">Y<input class="dhis_04" style="margin: 0px;"  <?php $var="dhis_04[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_04" style="margin: 0px;"  <?php $var="dhis_04[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_04" style="margin: 0px;" <?php $var="dhis_04[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-05(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_05" style="margin: 0px;"  <?php $var="dhis_05[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_05" style="margin: 0px;"  <?php $var="dhis_05[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_05" style="margin: 0px;" <?php $var="dhis_05[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-06(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_06" style="margin: 0px;"  <?php $var="dhis_06[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_06" style="margin: 0px;"  <?php $var="dhis_06[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_06" style="margin: 0px;" <?php $var="dhis_06[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-07(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_07" style="margin: 0px;"  <?php $var="dhis_07[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_07" style="margin: 0px;"  <?php $var="dhis_07[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_07" style="margin: 0px;" <?php $var="dhis_07[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-08(F)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_08" style="margin: 0px;"  <?php $var="dhis_08[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_08" style="margin: 0px;"  <?php $var="dhis_08[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_08" style="margin: 0px;" <?php $var="dhis_08[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-09(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_09" style="margin: 0px;"  <?php $var="dhis_09[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_09" style="margin: 0px;"  <?php $var="dhis_09[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_09" style="margin: 0px;" <?php $var="dhis_09[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-10(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_10" style="margin: 0px;"  <?php $var="dhis_10[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_10" style="margin: 0px;"  <?php $var="dhis_10[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_10" style="margin: 0px;" <?php $var="dhis_10[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-11(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_11" style="margin: 0px;"  <?php $var="dhis_11[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_11" style="margin: 0px;"  <?php $var="dhis_11[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_11" style="margin: 0px;" <?php $var="dhis_11[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-12(C)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_12" style="margin: 0px;"  <?php $var="dhis_12[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_12" style="margin: 0px;"  <?php $var="dhis_12[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_12" style="margin: 0px;" <?php $var="dhis_12[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-13(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_13" style="margin: 0px;"  <?php $var="dhis_13[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_13" style="margin: 0px;"  <?php $var="dhis_13[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_13" style="margin: 0px;" <?php $var="dhis_13[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-14(C)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_14" style="margin: 0px;"  <?php $var="dhis_14[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_14" style="margin: 0px;"  <?php $var="dhis_14[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_14" style="margin: 0px;" <?php $var="dhis_14[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-15(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_15" style="margin: 0px;"  <?php $var="dhis_15[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_15" style="margin: 0px;"  <?php $var="dhis_15[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_15" style="margin: 0px;" <?php $var="dhis_15[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-16(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_16" style="margin: 0px;"  <?php $var="dhis_16[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_16" style="margin: 0px;" <?php $var="dhis_16[$i]" ?>  name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_16" style="margin: 0px;" <?php $var="dhis_16[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-17(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_17" style="margin: 0px;"  <?php $var="dhis_17[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_17" style="margin: 0px;"  <?php $var="dhis_17[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_17" style="margin: 0px;" <?php $var="dhis_17[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-18(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_18" style="margin: 0px;"  <?php $var="dhis_18[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_18" style="margin: 0px;"  <?php $var="dhis_18[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_18" style="margin: 0px;" <?php $var="dhis_18[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-19(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_19" style="margin: 0px;"  <?php $var="dhis_19[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_19" style="margin: 0px;"  <?php $var="dhis_19[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_19" style="margin: 0px;" <?php $var="dhis_19[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-20(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_20" style="margin: 0px;"  <?php $var="dhis_20[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_20" style="margin: 0px;"  <?php $var="dhis_20[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_20" style="margin: 0px;" <?php $var="dhis_20[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-21(MR)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_21" style="margin: 0px;"  <?php $var="dhis_21[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_21" style="margin: 0px;"  <?php $var="dhis_21[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input  class="dhis_21" style="margin: 0px;" <?php $var="dhis_21[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-22(MR)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_22" style="margin: 0px;"  <?php $var="dhis_22[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_22" style="margin: 0px;"  <?php $var="dhis_22[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_22" style="margin: 0px;" <?php $var="dhis_22[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-24(YR)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center">Y<input class="dhis_24" style="margin: 0px;"  <?php $var="dhis_24[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center">N<input class="dhis_24" style="margin: 0px;"  <?php $var="dhis_24[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp">NA<input class="dhis_24" style="margin: 0px;" <?php $var="dhis_24[$i]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3 my-tooltip" data-original-title="LQAS Forms" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl8 text-center ">Y<input class="lqas_forms" style="margin: 0px;"  <?php $var="lqas_forms[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl8 text-center ">N<input class="lqas_forms" style="margin: 0px;"  <?php $var="lqas_forms[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp text-center ">NA<input class="lqas_forms" style="margin: 0px;"  <?php $var="lqas_forms[$i]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-6 my-tooltip" data-original-title="CMRR" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl8 text-center">Y<input class="cmrr" style="margin: 0px;"  <?php $var="cmrr[$i]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl8 text-center">N<input class="cmrr" style="margin: 0px;"  <?php $var="cmrr[$i]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp text-center">NA<input class="cmrr" style="margin: 0px;"  <?php $var="cmrr[$i]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<?php } ?>
        <div class="row" style="background:white;">
          <div class="col-xs-3">
            <button type="button" class="btn btn-success btn-xs mt6" data-original-title="add new row" data-toggle="tooltip" title="" value="clone" id="clone"><i class="fa fa-plus"></i></button>
            <p class="pt6" style="display: inline; padding-left: 3%; vertical-align: middle;">Insert rows if number of staff increases</p>
          </div>
        </div>
      </div><!--end of row lightbg2-->
      <div class="row">
          <div class="col-xs-3 text-right">
            <label>Total Count</label>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-01(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_01">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-02(F)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_02">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-02-A(F)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_02a">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-03(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_03">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-04(F)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_04">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-05(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_05">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-06(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_06">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-07(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_07">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-08(F)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_08">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-09(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_09">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-10(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_10">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-11(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_11">0</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-12(C)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_12">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-13(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_13">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-14(C)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_14">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-15(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_15">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-16(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_16">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-17(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_17">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-18(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_18">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-19(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_19">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-20(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_20">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-21(MR)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_21">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-22(MR)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_22">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-24(YR)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12">
                    <label id="dhis_24">0</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3 my-tooltip" data-original-title="LQAS Forms" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12 text-center">
                    <label id="lqas_forms">0</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 my-tooltip" data-original-title="CMRR" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12 text-center">
                    <label id="cmrr">0</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
         
            <div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
                <button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
					<i class="fa fa-file"></i> Save Form  
				</button>
				<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
					<i class="fa fa-floppy-o"></i> Submit Form  
				</button>
             
              <a class="btn btn-primary btn-md btncc"><i class="fa fa-times"></i> Cancel </a>
            </div>
        </div>          
        
      <?php echo form_close(); ?>
      <div class="row cloned-rowHidden hide">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-2">
                <label class="pt14">1</label>
              </div>
              <div class="col-xs-10">
                <div class="row">
                  <div class="col-xs-6 zp">

                    <select class="form-control zp" <?php $var="staff_desg[]" ?> name="<?php echo $var; ?>" style="height: 46px;"><?php echo getHFStaffDesignation_options($vpvcDataRow->fatype); ?></select>
                  </div>
                  <div class="col-xs-6 zp">

                    <input class="form-control" <?php $var="staff_name[]" ?> name="<?php echo $var; ?>" type="text" style="height: 46px;">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-01(R)" data-toggle="tooltip" data-placement="top">
                <div class="row" >
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_01" style="margin: 0px;"  <?php $var="dhis_01[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_01" style="margin: 0px;"  <?php $var="dhis_01[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_01" style="margin: 0px;"  <?php $var="dhis_01[]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-02(F)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_02" style="margin: 0px;"  <?php $var="dhis_02[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_02" style="margin: 0px;"  <?php $var="dhis_02[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_02" style="margin: 0px;"  <?php $var="dhis_02[]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-02-A(F)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center a">Y<input class="dhis_02a" style="margin: 0px;"  <?php $var="dhis_02a[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center a">N<input class="dhis_02a" style="margin: 0px;"  <?php $var="dhis_02a[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp a">NA<input class="dhis_02a" style="margin: 0px;" <?php $var="dhis_02a[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-03(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_03" style="margin: 0px;"  <?php $var="dhis_03[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_03" style="margin: 0px;"  <?php $var="dhis_03[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_03" style="margin: 0px;" <?php $var="dhis_03[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-04(F)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center  ">Y<input class="dhis_04" style="margin: 0px;"  <?php $var="dhis_04[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_04" style="margin: 0px;"  <?php $var="dhis_04[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_04" style="margin: 0px;" <?php $var="dhis_04[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-05(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_05" style="margin: 0px;"  <?php $var="dhis_05[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_05" style="margin: 0px;"  <?php $var="dhis_05[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_05" style="margin: 0px;" <?php $var="dhis_05[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-06(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_06" style="margin: 0px;"  <?php $var="dhis_06[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_06" style="margin: 0px;"  <?php $var="dhis_06[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_06" style="margin: 0px;" <?php $var="dhis_06[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-07(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_07" style="margin: 0px;"  <?php $var="dhis_07[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_07" style="margin: 0px;"  <?php $var="dhis_07[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_07" style="margin: 0px;" <?php $var="dhis_07[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-08(F)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_08" style="margin: 0px;"  <?php $var="dhis_08[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_08" style="margin: 0px;"  <?php $var="dhis_08[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_08" style="margin: 0px;" <?php $var="dhis_08[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-09(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_09" style="margin: 0px;"  <?php $var="dhis_09[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_09" style="margin: 0px;"  <?php $var="dhis_09[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_09" style="margin: 0px;" <?php $var="dhis_09[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-10(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_10" style="margin: 0px;"  <?php $var="dhis_10[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_10" style="margin: 0px;"  <?php $var="dhis_10[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_10" style="margin: 0px;" <?php $var="dhis_10[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-11(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_11" style="margin: 0px;"  <?php $var="dhis_11[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_11" style="margin: 0px;"  <?php $var="dhis_11[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_11" style="margin: 0px;" <?php $var="dhis_11[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-12(C)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_12" style="margin: 0px;"  <?php $var="dhis_12[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_12" style="margin: 0px;"  <?php $var="dhis_12[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_12" style="margin: 0px;" <?php $var="dhis_12[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-13(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_13" style="margin: 0px;"  <?php $var="dhis_13[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_13" style="margin: 0px;"  <?php $var="dhis_13[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_13" style="margin: 0px;" <?php $var="dhis_13[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-14(C)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_14" style="margin: 0px;"  <?php $var="dhis_14[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_14" style="margin: 0px;"  <?php $var="dhis_14[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_14" style="margin: 0px;" <?php $var="dhis_14[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-15(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_15" style="margin: 0px;"  <?php $var="dhis_15[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_15" style="margin: 0px;"  <?php $var="dhis_15[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_15" style="margin: 0px;" <?php $var="dhis_15[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-16(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_16" style="margin: 0px;"  <?php $var="dhis_16[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_16" style="margin: 0px;" <?php $var="dhis_16[]" ?>  name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_16" style="margin: 0px;" <?php $var="dhis_16[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-17(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_17" style="margin: 0px;"  <?php $var="dhis_17[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_17" style="margin: 0px;"  <?php $var="dhis_17[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_17" style="margin: 0px;" <?php $var="dhis_17[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-18(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_18" style="margin: 0px;"  <?php $var="dhis_18[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_18" style="margin: 0px;"  <?php $var="dhis_18[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_18" style="margin: 0px;" <?php $var="dhis_18[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-19(R)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_19" style="margin: 0px;"  <?php $var="dhis_19[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_19" style="margin: 0px;"  <?php $var="dhis_19[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_19" style="margin: 0px;" <?php $var="dhis_19[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-20(R)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_20" style="margin: 0px;"  <?php $var="dhis_20[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_20" style="margin: 0px;"  <?php $var="dhis_20[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_20" style="margin: 0px;" <?php $var="dhis_20[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-21(MR)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_21" style="margin: 0px;"  <?php $var="dhis_21[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_21" style="margin: 0px;"  <?php $var="dhis_21[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input  class="dhis_21" style="margin: 0px;" <?php $var="dhis_21[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 bg3 my-tooltip" data-original-title="DHIS-22(MR)" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center ">Y<input class="dhis_22" style="margin: 0px;"  <?php $var="dhis_22[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center ">N<input class="dhis_22" style="margin: 0px;"  <?php $var="dhis_22[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp ">NA<input class="dhis_22" style="margin: 0px;" <?php $var="dhis_22[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-1 my-tooltip" data-original-title="DHIS-24(YR)" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl2 text-center">Y<input class="dhis_24" style="margin: 0px;"  <?php $var="dhis_24[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl2 text-center">N<input class="dhis_24" style="margin: 0px;"  <?php $var="dhis_24[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp">NA<input class="dhis_24" style="margin: 0px;" <?php $var="dhis_24[]" ?>  name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3 my-tooltip" data-original-title="LQAS Forms" data-toggle="tooltip" data-placement="top">
                <div class="row">
                  <div class="col-xs-12 temp zp pl8 text-center ">Y<input class="lqas_forms" style="margin: 0px;"  <?php $var="lqas_forms[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl8 text-center ">N<input class="lqas_forms" style="margin: 0px;"  <?php $var="lqas_forms[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp text-center ">NA<input class="lqas_forms" style="margin: 0px;"  <?php $var="lqas_forms[]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
              <div class="col-xs-6 my-tooltip" data-original-title="CMRR" data-toggle="tooltip" data-placement="top" style="background:white;">
                <div class="row">
                  <div class="col-xs-12 temp zp pl8 text-center">Y<input class="cmrr" style="margin: 0px;"  <?php $var="cmrr[]" ?> name="<?php echo $var; ?>" value="1" type="radio"></div>
                  <div class="col-xs-12 temp2 zp pl8 text-center">N<input class="cmrr" style="margin: 0px;"  <?php $var="cmrr[]" ?> name="<?php echo $var; ?>" value="0" type="radio"></div>
                  <div class="col-xs-12 temp2 zp text-center">NA<input class="cmrr" style="margin: 0px;"  <?php $var="cmrr[]" ?> name="<?php echo $var; ?>" checked="checked" value="2" type="radio"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
</div><!--end of container--> 
<?php $this->load->view("templates/footer"); ?>
<?php $this->load->view("templates/scripts"); ?>
<?php $this->load->view("templates/chklsts_scripts"); ?>
<script type="text/javascript">
	$(document).on('click','#clone',function(){
		var currentIndex = parseInt($(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last label:first').text());
		$(".cloned-rowHidden:first").clone().removeClass('cloned-rowHidden hide').addClass("cloned-row").insertAfter($(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last'));
		var newIndex = currentIndex+1;
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last .row:nth-child(1) div:first label:first').text(newIndex);
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="staff_name[]"]').attr("name","staff_name["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('select[name="staff_desg[]"]').attr("name","staff_desg["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_01[]"]').attr("name","dhis_01["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_02[]"]').attr("name","dhis_02["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_02a[]"]').attr("name","dhis_02a["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_03[]"]').attr("name","dhis_03["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_04[]"]').attr("name","dhis_04["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_05[]"]').attr("name","dhis_05["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_06[]"]').attr("name","dhis_06["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_07[]"]').attr("name","dhis_07["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_08[]"]').attr("name","dhis_08["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_09[]"]').attr("name","dhis_09["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_10[]"]').attr("name","dhis_10["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_11[]"]').attr("name","dhis_11["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_12[]"]').attr("name","dhis_12["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_13[]"]').attr("name","dhis_13["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_14[]"]').attr("name","dhis_14["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_15[]"]').attr("name","dhis_15["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_16[]"]').attr("name","dhis_16["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_17[]"]').attr("name","dhis_17["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_18[]"]').attr("name","dhis_18["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_19[]"]').attr("name","dhis_19["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_20[]"]').attr("name","dhis_20["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_21[]"]').attr("name","dhis_21["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_22[]"]').attr("name","dhis_22["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="dhis_24[]"]').attr("name","dhis_24["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="lqas_forms[]"]').attr("name","lqas_forms["+newIndex+"]");
		$(this).closest('div[class="rowlightbg2"]').find('.cloned-row:last').find('input[name="cmrr[]"]').attr("name","cmrr["+newIndex+"]");
	});
	$(document).on('change','.rowlightbg2 .cloned-row input:radio',function(){
		var countNo_Yes = 0;
		var className = $(this).attr('class');
		var obj = $('div[class="rowlightbg2"]').find('.cloned-row');
		$.each(obj,function(k,v){
			newIndex = (k+1);
			if(obj.find('input[name="'+className+'['+newIndex+']"]:checked').val() == '1'){
				countNo_Yes += 1;
			}
		});
		$('#'+className).text(countNo_Yes); 
	});

</script>
</body>
</html>