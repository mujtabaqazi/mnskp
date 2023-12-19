<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$userId=$this -> session -> id;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hand-on Support Activity – Reporting Health Facility Level</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
  <!--start of header-->
  <?php $this->load->view("templates/header"); ?>
  <?php $this->load->view("templates/menu"); ?>
  <!--End of header-->
  <?php if (count($previous)>0){?>
  <div class="container-fluid">
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
<div class="container-fluid">
   <div class="panel panel-primary">
   <div class="panel-heading text-center"> Hand-on Support Activity – Reporting Health Facility Level
   </div>
   <div class="panel-body pbody">
      <form class="form-horizontal">
      <div class="alignmentview">
      <div class="rowlightbg"> 
        <div class="row">
          <div class="col-xs-2">
            <label>Supervisor Name</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->supervisor_name; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Supervisor Designation</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->supervisor_desg; ?></label>
          </div>
          <div class="col-xs-2">
            <label>District</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo get_District_Name($DataRow->distcode); ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2">
            <label>Facility</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo get_Facility_Name($DataRow->facode); ?></label>
          </div>
          <div class="col-xs-2">
            <label>Reporting Month</label>
          </div>
          <div class="col-xs-2">
            <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Date of visit</label>
          </div>
          <div class="col-xs-2">
            <label><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2">
            <label>Province</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo "Khyber Pakhtunkhwa"; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Facility Type</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->fatype; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Visit Number</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->visit_numb; ?></label>
          </div>
        </div>
        <div class="row">          
          <div class="col-xs-2">
            <label>HID code of HF</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->facode; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Name of In-Charge</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->fac_inc_name; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Name of DHIS FP</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->dhis_fp_name; ?></label>
          </div>
        </div>
        <div class="row">          
          <div class="col-xs-2">
            <label>Designation of DHIS FP</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->dhis_fp_desg; ?></label>
          </div>
          <div class="col-xs-2">
            <label>Phone No. of HF</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->fac_phone; ?></label>
          </div>
           <div class="col-xs-2">
            <label>Phone No. of Incharge</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->inc_phone; ?></label>
          </div>
        </div>
        <div class="row">         
          <div class="col-xs-2">
            <label>In-charge Email ID</label>
          </div>
          <div class="col-xs-2">
            <label><?php echo $DataRow->inc_email; ?></label>
          </div>
        </div>
        
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 bgcolcl text-center">
            <label>Table 1 B: Hands-on Practice Support and Training Conducted</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-sm-3">
            <div class="row">
              <div class="col-sm-6 br">
                <label class="pt33 pb33">Staff Designation</label>
              </div>
              <div class="col-sm-6 text-center">
                <label class="pt33">Staff Name</label>
              </div>
            </div>
          </div>
          <div class="col-sm-5 brl text-center">
            <div class="row">
              <div class="col-sm-12 text-center">
                <label>DHIS</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-sm-3 br zp">
                <label style="padding-bottom: 20px;">Monthly Report Preparation</label>
              </div>
              <div class="col-sm-3">
                <label>Use of Information</label>
              </div>
              <div class="col-sm-3 brl zp">
                <label style="padding-bottom: 20px;">Checking Data Accuracy LQAS</label>
              </div>
              <div class="col-sm-3 zp">
                <label>Reviewing Discrepancies in reported data</label>
              </div>
            </div>
          </div>
          <div class="col-sm-4 text-center">
            <div class="row">
              <div class="col-sm-12">
                <label>cLMIS</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-sm-4 zp">
                <label>Understanding on cLMIS monthly report proforma</label>
              </div>
              <div class="col-sm-4 brl">
                <label style="padding-bottom: 20px;">Monthly Report Preparation</label>
              </div>
              <div class="col-sm-4 text-left">
                <label>Reviewing Discrepancies inreported data</label>
              </div>
            </div>
          </div>
        </div>
		<?php for($i=1;$i<=5;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-6">
                <label><?php $var="hop_r".$i."_f1"; echo (isset($DataRow) && ($DataRow->$var > 0))?get_HFStaffDesignation_Name($DataRow->fatype,$DataRow->$var):''; ?></label>
              </div>
              <div class="col-xs-6">
                <label><?php $var="hop_r".$i."_f2";  echo $DataRow->$var; ?></label>
              </div>
            </div>
          </div>
          <div class="col-xs-5 pt7 text-center">
            <div class="row">
              <div class="col-xs-3">
                <p><?php $var="hop_r".$i."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-3">
                <p><?php $var="hop_r".$i."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-3">
                <p><?php $var="hop_r".$i."_f5";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-3">
                <p><?php $var="hop_r".$i."_f6";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-4 pt7 text-center">
            <div class="row">
              <div class="col-xs-4">
                <p><?php $var="hop_r".$i."_f7";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-4">
                <p><?php $var="hop_r".$i."_f8";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-4">
                <p><?php $var="hop_r".$i."_f9";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>

        <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 bgcolcl text-center">
            <label>Table 2: Data Management (Instruction: Monthly report is expected to be managed by DHIS focal person and
data collection tools by the concerned staff)</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-sm-3">
            <div class="row">
              <div class="col-sm-12 text-center">
                <label>Responsibility</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-sm-6">
                <label>Staff Designation</label>
              </div>
              <div class="col-sm-6 bl">
                <label class="pb20">Staff Name</label>
              </div>
            </div>
          </div>
          <div class="col-sm-4 brl">
            <div class="row">
              <div class="col-sm-12 text-center">
                <label>Data management -DHIS</label>
              </div>
            </div>
            <div class="row bt">
              <div class="col-sm-6">
                <label>Retaining copy of monthly report</label>
              </div>
              <div class="col-sm-6 bl">
                <label>Safe custody of previously used DHIS Tools</label>
              </div>
            </div>
          </div>
          <div class="col-sm-5">
            <div class="row">
              <div class="col-sm-12 text-center">
                <label>Data management -cLMIS</label>
              </div>
            </div>
              <div class="row bt">
              <div class="col-sm-6">
                <label>Retaining copy of monthly report</label>
              </div>
              <div class="col-sm-6 bl">
                <label>Retaining of Stock register of Contraceptive Commodities</label>
              </div>
            </div>
            </div>
          
        </div>
		<?php for($i=1;$i<=9;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-6">
                <label><?php $var="dm_r".$i."_f1";  echo (isset($DataRow) && ($DataRow->$var > 0))?get_HFStaffDesignation_Name($DataRow->fatype,$DataRow->$var):''; ?></label>
              </div>
              <div class="col-xs-6">
                <label><?php $var="dm_r".$i."_f2";  echo $DataRow->$var; ?></label>
              </div>
            </div>
          </div>
          <div class="col-xs-4 pt7 text-center">
            <div class="row">
              <div class="col-xs-6">
                <p><?php $var="dm_r".$i."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-6">
                <p><?php $var="dm_r".$i."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-5 pt7 text-center">
              <div class="row">
              <div class="col-xs-6">
                <p><?php $var="dm_r".$i."_f5";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
              <div class="col-xs-6">
                <p><?php $var="dm_r".$i."_f6";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
            </div>
          </div>
		<?php } ?>
          <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 bgcolcl text-center">
            <label>Table 3: DHIS Tools Status</label>
          </div>
          </div>
          <div class="row bc mb1">
            <div class="col-sm-6 br">
              <label>List of DHIS Tools</label>
            </div>
            <div class="col-sm-6">
              <label>Tools/ Instruments - Please insert (Y, N, or NA) as applicable from list</label>
            </div>
          </div>

          <div class="row bc">
            <div class="col-sm-6 br">
              <div class="row">
                <div class="col-sm-1">
                  <label>#</label></div>
                <div class="col-sm-8 brl">
                  <label>Name</label></div>
                <div class="col-sm-3">
                  <label>DHIS Instrument No.</label>
                </div>
              </div>
            </div>
            <div class="col-xs-6 zp">
              <div class="row">
                <div class="col-sm-3 zp text-center">
                   <label>Available</label>
                </div>
                <div class="col-sm-3 bl text-center">
                   <label>In Use</label>
                </div>
                <div class="col-sm-3 brl zp">
                  <label>Filled By designated person</label>
                </div>
                <div class="col-sm-3 text-center">
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
            <div class="col-xs-6 pt7">
              <div class="row">
                <div class="col-xs-1">
                  <label><?php echo $i; ?></label></div>
                <div class="col-xs-8">
                  <label><?php echo $key; ?></label></div>
                <div class="col-xs-3">
                  <label><?php echo $val; ?></label>
                </div>
              </div>
            </div>
            <div class="col-xs-6 text-center pt7">
              <div class="row">
                <div class="col-xs-3 zp">
                  <p><?php $var="dts_r".$i."_f1";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
                </div>
                <div class="col-xs-3">
                  <p><?php $var="dts_r".$i."_f2";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
                </div>
                <div class="col-xs-3">
                  <p><?php $var="dts_r".$i."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
                </div>
                <div class="col-xs-3">
                  <p><?php $var="dts_r".$i."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
                </div>
              </div>
            </div>
          </div>
		  <?php $i++; } ?>
          <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 bgcolcl text-center">
            <label>Table 5: DHIS and cLMIS Performance Status</label>
          </div>
          </div>
          <div class="row bc">
            <div class="col-sm-1">
              <label>S/No.</label>
            </div>
            <div class="col-sm-10 brl">
              <label>Data Quality Parameter</label>
            </div>
            <div class="col-sm-1">
              <label>Status</label>
            </div>
          </div>
          <div class="row bc mt1">
            <div class="col-sm-12">
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
               <label><?php if(array_key_exists($key, array_fill_keys(array('8','9'),'yes')) == false){ echo $i; $i++; } ?></label>
            </div>
            <div class="col-xs-10">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">
               <p><?php $var="ps_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
            </div>
          </div>
		  <?php }elseif(array_key_exists($key, $inputKeysArray)){ ?>
		  <div class="row">
            <div class="col-xs-1">
               <label><?php echo $i; $i++; ?></label>
            </div>
            <div class="col-xs-10">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">
               <p><?php $var="ps_r".$key."_f1"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
            </div>
          </div>
		  <?php }else{ ?>
		  <div class="row">
            <div class="col-xs-1">
               <label><?php echo $i; $i++; ?></label>
            </div>
            <div class="col-xs-10">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">
               
            </div>
          </div>
		  <?php } } ?>
          <div class="row bc mt1">
            <div class="col-sm-12">
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
               <label><?php echo ($key-1); ?></label>
            </div>
            <div class="col-xs-10">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">
               <p><?php $var="ps_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
            </div>
          </div>
		  <?php } ?>
          <div class="row bc mt1">
            <div class="col-sm-1 br"><label>Results</label>
            </div>
            <div class="col-sm-11">
            <label>Please be brief and specific while reporting table below</label>
          </div>
        </div>
        <div class="row mt1 bc">
          <div class="col-sm-3">
            <div class="row">
              <div class="col-sm-2">
                <label>#</label>
              </div>
              <div class="col-sm-10 bl">
                <label>Specific Issue/Gap</label>
              </div>
            </div>
          </div>
          <div class="col-sm-2 brl">
            <label>Reason/s</label>
          </div>
          <div class="col-sm-2">
            <label>Action/s taken</label>
          </div>
          <div class="col-sm-1 brl zp text-center">
            <label>Resolved (Y/N)</label>
          </div>
          <div class="col-sm-2">
            <label>Reason if issue / gap persist</label>
          </div>
          <div class="col-sm-2 bl">
            <label>Any suggestion/s</label>
          </div>
        </div>
		<?php for($i=1;$i<=3;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-2">
                <label>1</label>
              </div>
              <div class="col-xs-10">
                <p><?php $var="res_r".$i."_f1"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f2"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f3"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
          </div>
          <div class="col-xs-1 text-center">
            <p><?php $var="res_r".$i."_f4"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f5"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f6"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
          </div>
        </div>
		<?php } ?>
        <div class="row">
          <div class="col-xs-12">
            <p style="padding-left: 3%; padding-top: 5px;">Please carry-forward un-resolved issue/gap in next visit report.</p>
          </div>
        </div>
      </div><!--end of row lightbg-->
      <div class="rowlightbg3">
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 bgcolcl text-center">
            <label>Table 1 A: Hands-on Practice Support and Training Conducted</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-sm-3">
            <div class="row">
              <div class="col-sm-2">
                <label class="pt17">#</label>
              </div>
              <div class="col-sm-10 bl">
                <div class="row bb">
                  <div class="col-sm-12 text-center"><label>Staff</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6 br">
                    <label class="pb8">Designation</label>
                  </div>
                  <div class="col-sm-6">
                    <label>Name</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-4 brl">
            <div class="row bb">
              <div class="col-sm-1 zp text-center">
                <label>1</label>
              </div>
              <div class="col-sm-1 brl text-center">
                <label>2</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>3</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>4</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>5</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>6</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>7</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>8</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>9</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>10</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>11</label>
              </div>
              <div class="col-sm-1 bl zp text-center">
                <label>12</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-01(R)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-02(F)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-02-A(F)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-03(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-04(F)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-05(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-06(R)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-07(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-08(F)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-09(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-10(R)</label>
              </div>
              <div class="col-sm-1 bl zp text-center">
                <label class="cf">DHIS<br>-11(R)</label>
              </div>
            </div>
          </div>
          <div class="col-sm-4 br">
            <div class="row bb">
              <div class="col-sm-1 zp text-center">
                <label>13</label>
              </div>
              <div class="col-sm-1 brl text-center">
                <label>14</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>15</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>16</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>17</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>18</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>19</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>20</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>21</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label>22</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label>23</label>
              </div>
              <div class="col-sm-1 bl zp text-center">
                <label>25</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-12(C)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-13(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-14(C)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-15(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-16(R)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-17(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-18(R)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-19(R)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-20(R)</label>
              </div>
              <div class="col-sm-1 brl zp text-center">
                <label class="cf">DHIS<br>-21(MR)</label>
              </div>
              <div class="col-sm-1 zp text-center">
                <label class="cf">DHIS<br>-22(MR)</label>
              </div>
              <div class="col-sm-1 bl zp text-center">
                <label class="cf">DHIS<br>-24(YR)</label>
              </div>
            </div>
          </div>
          <div class="col-sm-1">
            <div class="row bb">
              <div class="col-sm-6 br">
                <label>26</label>
              </div>
              <div class="col-sm-6">
                <label>27</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 br">
                <label class="cf">LQAS Forms</label>
              </div>
              <div class="col-sm-6">
                <label class="cf">CMRR</label>
              </div>
            </div>
          </div>
        </div>
		<?php
		$arraySize = count($DataRowDetail);
		for($i=1;$i<=$arraySize;$i++){
			$index = $i-1;
		?>
        <div class="row">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-2">
                <label class="pt7"><?php echo $i; ?></label>
              </div>
              <div class="col-xs-10">
                <div class="row">
                  <div class="col-xs-6">

                    <p class="pt7"><?php echo (isset($DataRowDetail) && ($DataRowDetail[$index]['staff_desg'] > 0))?get_HFStaffDesignation_Name($DataRow->fatype,$DataRowDetail[$index]['staff_desg']):''; ?></p>
                  </div>
                  <div class="col-xs-6">

                    <p class="pt7"><?php echo (isset($DataRowDetail))?$DataRowDetail[$index]['staff_name']:''; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_01'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_01'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_02'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_02'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_02a'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_02a'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_03'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_03'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_04'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_04'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_05'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_05'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_06'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_06'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_07'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_07'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_08'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_08'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_09'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_09'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_10'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_10'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_11'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_11'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_12'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_12'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_13'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_13'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_14'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_14'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_15'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_15'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_16'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_16'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_17'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_17'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_18'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_18'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_19'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_19'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_20'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_20'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_21'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_21'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_22'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_22'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_24'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_24'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['lqas_forms'] == '1')?'Yes':(($DataRowDetail[$index]['lqas_forms'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-6 text-center">
                <p><?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['cmrr'] == '1')?'Yes':(($DataRowDetail[$index]['cmrr'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
        </div>
		<?php } ?>
      </div><!--end of row lightbg2-->
      <!-- <div class="row">
          <div class="col-xs-3 text-right">
            <label>Total Count</label>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1 bg3">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-1">
                <div class="row" >
                  <div class="col-xs-12">
                    <label>20</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3">
                <div class="row" >
                  <div class="col-xs-12 text-center">
                    <label>20</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="row" >
                  <div class="col-xs-12 text-center">
                    <label>20</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div><!--end of alignmentview-->
      
        <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
        
            <div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
                
                <?php if($DataRow->submitted_by==$userId){ ?>
              <a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>da/forms/facilityact_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
				<?php } ?>
              <a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
            </div>
        </div>          
        
      </form>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
</div><!--end of container-->

  <?php $this->load->view("templates/footer"); ?>
  <?php $this->load->view("templates/scripts"); ?>
  <script type="text/javascript">
      $(document).ready(function() {
        $("#compare_btn").on('click',function(e){
          window.location.href="<?php echo $basePath; ?>da/forms/facilityact_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
        });
      });   
    </script>
</body>
</html>