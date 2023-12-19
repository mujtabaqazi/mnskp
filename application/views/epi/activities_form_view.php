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
  <title>Only for Health Facilities with Functional EPI Centre</title>
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
   <div class="panel-heading text-center"> Checklist for EPI Activities
(Only for Health Facility with Functional EPI Centre)
</div>
     <div class="panel-body pbody">
        <div class="alignmentview">
        <div class="rowlightbg"> 
        <div class="row pb1">
          <div class="col-sm-12  bgcolcl text-center">
            <label>1.0 Basic Information</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 ">
            <label>1.1.</label>
          </div>
          <div class="col-xs-2">
            <label>Date of Visit:</label>
          </div>
          <div class="col-xs-3">
            <p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
          </div>
          <div class="col-xs-1 ">
            <label>1.2.</label>
          </div>
          <div class="col-xs-2 ">
            <label>Province:</label>
          </div>
          <div class="col-xs-3">
            <p>Khyber Pakhtunkhwa</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 ">
            <label>1.3.</label>
          </div>
          <div class="col-xs-2 ">
            <label>District:</label>
          </div>
          <div class="col-xs-3">			
            <p><?php echo (isset($DataRow))?get_District_Name($DataRow->distcode):''; ?></p>
          </div>
          <div class="col-xs-1 ">
            <label>1.4.</label>
          </div>
          <div class="col-xs-2 ">
            <label>Taluka:</label>
          </div>
          <div class="col-xs-3">               			
            <p><?php echo (isset($DataRow))?get_Tehsil_Name($DataRow->tcode):''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 ">
            <label>1.5.</label>
          </div>
          <div class="col-xs-2 ">
            <label>Union Council:</label>
          </div>
			<div class="col-xs-3">               				
				<p><?php echo (isset($DataRow))?get_UC_Name($DataRow->uncode):''; ?></p> 
			</div>
			<div class="col-xs-1 ">
				<label>1.6.</label>
			</div>
			<div class="col-xs-2 ">
				<label>Health Facility:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo (isset($DataRow))?get_Facility_Name($DataRow->facode):''; ?></p>
			</div>
        </div>
		<div class="row">
			<div class="col-xs-1 ">
				<label>1.6.1</label>
			</div>
			<div class="col-xs-2 ">
				<label>Type of Health Facility:</label>
			</div>
			<div class="col-xs-3">				
				<?php if(isset($DataRow)){$result = get_FaCat_Name($DataRow->fatype); ?>               				
					<p><?php echo isset($result)?($result['facat_name']):''; ?></p>				
				<?php } ?>
			</div>
			<div class="col-xs-1 ">
				<label>1.6.2</label>
			</div>
			<div class="col-xs-2 ">
				<label>Facility type:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?get_Fatype_Name($DataRow->fatype):''; ?></p>
			</div>
		</div>
		<div class="row">
          <div class="col-xs-1 ">
        <label>1.7</label>
      </div>
          <div class="col-xs-2 ">
            <label>Number of EPI staff assigned to this facility:</label>
          </div>
          <div class="col-xs-3">
            <p><?php echo (isset($DataRow))?$DataRow->staff_numb:''; ?></p>
          </div>
          <div class="col-xs-1 ">
        <label>1.8</label>
      </div>
          <div class="col-xs-2 ">
            <label>Number of EPI staff present:</label>
          </div>
          <div class="col-xs-3">
           <p><?php echo (isset($DataRow))?$DataRow->staff_present:''; ?></p>
          </div>
        </div>
        <div class="row">
                  <div class="col-sm-12  bgcolcl text-center">
                    <label>2.0 Logistics, Record Keeping and Planning</label>
                  </div>
              </div>
        <div class="row bc mt1 mb1" >
          <div class="col-sm-1">
             <label>2.1</label>
          </div>
          <div class="col-sm-11">
            <label>Vaccine and Supply Stock Availability</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-sm-1"><label>#</label></div>
          <div class="col-sm-5 brl text-center"><label>Was there shortage of the following vaccines supplies?</label></div>
          <div class="col-sm-3 text-center"><label>Was the shortage reported?</label></div>
          <div class="col-sm-3 bl text-center"><label>Reason for shortage</label></div>
        </div>
        <?php $labelArray=array(
			'1' => 'BCG',
			'2' => 'Penta',
			'3' => 'OPV',
			'4' => 'Measles',
			'5' => 'PCV-10',
			'6' => 'HBV',
			'7' => 'TT',
			'8' => 'Vaccine syringes',
			'9' => 'Sharps safety box'
		); 
		foreach($labelArray as $key => $val){
		?>
        <div class="row">
          <div class="col-xs-1"><label class="">2.1.<?php echo $key; ?></label></div>
          <div class="col-xs-2"><label class=""><?php echo $val; ?></label></div>
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-6 text-right">
                <?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p>Currently</p>':''; ?>
              </div>
              <div class="col-xs-6">
                <?php $var="lvs_r".$key."_f2"; ?><?php echo (isset($DataRow) && $DataRow->$var == '2')?'<p>Last month</p>':''; ?>
              </div>
            </div>
          </div>
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p><?php $var="lvs_r".$key."_f3"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php $var="lvs_r".$key."_f4"; ?><?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <?php } ?>
        <?php $labelArray1=array(
			'10' => 'Daily EPI Register',
			'11' => 'Permanent EPI Register',
			'12' => 'EPI Cards',
		);
		foreach($labelArray1 as $key => $val){
		?>
        <div class="row">
          <div class="col-xs-1"><label class="">2.1.<?php echo $key; ?></label></div>
          <div class="col-xs-2"><label class=""><?php echo $val; ?></label></div>
          <div class="col-xs-3">
          </div>
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-12 text-center">
                <?php $var="lvs_r".$key."_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p>Available</p>':''; ?>
              </div>
            </div>
          </div>
          <div class="col-xs-3">
                <?php $var="lvs_r".$key."_f2"; ?><?php echo (isset($DataRow) && $DataRow->$var == '2')?'<p>Maintained</p>':''; ?>
          </div>
        </div>
        <?php } ?>
         <div class="row bc mt1 mb1">
          <div class="col-sm-1">
             <label>2.2</label>
          </div>
          <div class="col-sm-11">
            <label>Vaccine Stock Condition (Sample 1 vial for every 10 of each vaccine type)</label>
          </div>
        </div>
        <div class="row bc mt1 mb1">
          <div class="col-sm-1"><label>#</label></div>
          <div class="col-sm-2 brl text-center"><label>Vaccine</label></div>
          <div class="col-sm-3 text-center"><label>Kept at proper temperature</label></div>
          <div class="col-sm-2 brl text-center"><label>Frozen</label></div>
          <div class="col-sm-2 text-center"><label>Expired</label></div>
          <div class="col-sm-2 bl text-center"><label>VVM color changed</label></div>
        </div>
        <?php $labelArray2=array(
			'1' => 'BCG',
			'2' => 'Penta',
			'3' => 'OPV',
			'4' => 'Measles',
			'5' => 'PCV-10',
			'6' => 'HBV',
			'7' => 'TT',
		); 
		foreach($labelArray2 as $key => $val){
		?>
        <div class="row">
          <div class="col-xs-1"><label class="">2.2.<?php echo $key; ?></label></div>
          <div class="col-xs-2  "><label class=""><?php echo $val; ?></label></div>
          <div class="col-xs-3 text-center"><?php $var="vsc_r".$key."_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?></div>
          <div class="col-xs-2 text-center"><?php $var="vsc_r".$key."_f2"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?></div>
          <div class="col-xs-2 text-center"><?php $var="vsc_r".$key."_f3"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?></div>
          <div class="col-xs-2 text-center"><?php $var="vsc_r".$key."_f4"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?></div>
        </div>
        <?php } ?>
        <div class="row bc mt1 mb1">
          <div class="col-sm-1">
             <label>2.3</label>
          </div>
          <div class="col-sm-11">
            <label>Cold Chain (CC) Status</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.3.1</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is there enough equipment to hold the cold vaccine supply?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center ">
                <p class="pt7"><?php $var="ccs_r1_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->ccs_r1_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.3.2</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is all CC Equipment in use functioning?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="ccs_r2_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
           <p><?php echo (isset($DataRow))?$DataRow->ccs_r2_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.3.3</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is an updated temperature chart displayed?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="ccs_r3_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->ccs_r3_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.3.4</label>
          </div>
          <div class="col-xs-5">
            <label class="">Are there items other than routine EPI supplies (such as antigens, icepacks, saline) stored in the CC equipment?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="ccs_r4_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->ccs_r4_f2:''; ?></p>
          </div>
        </div>
        <div class="row bc mt1 mb1">
          <div class="col-sm-1">
             <label>2.4</label>
          </div>
          <div class="col-sm-11">
            <label>Immunization Coverage</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.4.1</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is an updated vaccination monitoring chart displayed at center?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="ic_r1_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->ic_r1_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.4.2</label>
          </div>
          <div class="col-xs-5">
            <label class="">Check whether total number of doses of one of the antigens from the Permanent Register for the last month match with the monthly report sent to EDO Health Office.</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="ic_r2_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->ic_r2_f2:''; ?></p>
          </div>
        </div>
        <div class="row bc mt1 mb1">
          <div class="col-sm-1">
             <label>2.5</label>
          </div>
          <div class="col-sm-11">
            <label>Planning of EPI Activities</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.5.1</label>
          </div>
          <div class="col-xs-5">
            <label class="">Does the health center have a monthly outreach activity plan duly approved and signed by the Medical Officer or Health Facility In-charge?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="pa_r1_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->pa_r1_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.5.2</label>
          </div>
          <div class="col-xs-5">
            <label class="">Were the number of outreach activities last month conducted according to the plan?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="pa_r2_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->pa_r2_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.5.3</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is there a vaccinator present at the time of this supervision visit?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="pa_r3_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->pa_r3_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.5.4</label>
          </div>
          <div class="col-xs-5">
            <label class="">If no, is there a replacement vaccinator available for this facility?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="pa_r4_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p class="pt7"><?php echo (isset($DataRow))?$DataRow->pa_r4_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.5.5</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is there an updated list of defaulters available with the vaccinator?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="pa_r5_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->pa_r5_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">2.5.5.a</label>
          </div>
          <div class="col-xs-5">
            <label class="">If yes, is it used for tracking defaulters?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="pa_r5_f3"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
          </div>
        </div>
        <div class="row">
                  <div class="col-sm-12  bgcolcl text-center">
                    <label>3.0 Monitoring of Vaccination Activity</label>
                  </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.1</label>
          </div>
          <div class="col-xs-8">
            <label class="">Was any supervisory visit carried out in the health facility during last 30 days?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="mva_r1_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.1.a</label>
          </div>
          <div class="col-xs-8">
            <label class="">What was the date when the visit conducted?</label>
          </div>
          <div class="col-xs-3 text-center">
          <p><?php $var ="mva_r2_f1"; echo (isset($DataRow) && $DataRow->$var !== NULL)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->mva_r2_f1))):''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.1.b</label>
          </div>
          <div class="col-xs-8">
            <label class="">Who conducted that visit?</label>
          </div>
          <div class="col-xs-3 text-center">
            <p><?php echo (isset($DataRow))?$DataRow->mva_r3_f1:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.2</label>
          </div>
          <div class="col-xs-8">
            <label class="">Is a vaccination session being conducted at the time of this current visit?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="mva_r4_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.3</label>
          </div>
          <div class="col-xs-5">
            <label class="">Who is currently conducting vaccinations?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-4 text-right ">
                <?php echo (isset($DataRow) && $DataRow->mva_r5_f1 == '1')?'<p class="pt7">Vaccinator</p>':''; ?>
              </div>
              <div class="col-xs-4 text-center">
                <?php echo (isset($DataRow) && $DataRow->mva_r5_f1 == '2')?'<p class="pt7">LHV</p>':''; ?>
              </div>
              <div class="col-xs-4">
                <?php echo (isset($DataRow) && $DataRow->mva_r5_f1 == '3')?'<p class="pt7">Other</p>':''; ?>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->mva_r5_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.4</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is there any pre-counseling done with the parents / caretakers of the children receiving the vaccinations?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="mva_r6_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->mva_r6_f2:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="">3.1.5</label>
          </div>
          <div class="col-xs-5">
            <label class="">Is there any post-counseling done with the parents / caretakers of the children receiving the vaccinations?</label>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12 text-center">
                <p class="pt7"><?php $var="mva_r7_f1"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <p><?php echo (isset($DataRow))?$DataRow->mva_r6_f2:''; ?></p>
          </div>
        </div>
         <div class="row mt1 mb1">
                  <div class="col-sm-12  bgcolcl text-center">
                    <label>4. Household Verification Tool for Routine EPI Coverage (Optional)</label>
                  </div>
          </div>
        <div class="row bc">
          <div class="col-sm-2 text-center">
            <div class="row">
              <div class="col-sm-4">
                <label class="padding1">Sr.No</label>
              </div>
              <div class="col-sm-8 bl">
                <label class="padding1">Address</label>
              </div>
            </div>
          </div>
          <div class="col-sm-2 text-center brl">
            <label class="padding1">Father’s Name &amp; Cast</label>
          </div>
          <div class="col-sm-1 text-center">
            <label class="padding2">Name of Child</label>
          </div>
          <div class="col-sm-1 text-center brl">
            <label class="padding2">Age (in months)</label>
          </div>
          <div class="col-sm-1 text-center">
            <label class="padding1">BCG</label>
          </div>
          <div class="col-sm-1 text-center bl">
            <label class="padding1">OPV zero</label>
          </div>
          <div class="col-sm-2 text-center brl">
            <div class="row bb">
              <div class="col-sm-12 zp">
                <label>OPV/Penta/ Pneumococcal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <label>1</label></div>
                <div class="col-xs-4 brl">
                  <label>2</label>
                </div>
                <div class="col-xs-4">
                  <label>3</label>
                </div>
              </div>
          </div>
          <div class="col-xs-1 text-center">
            <div class="row bb">
              <div class="col-xs-12">
                <label>Measles</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 br">
                <label>1</label>
              </div>
              <div class="col-xs-6">
                <label>2</label>
              </div>
            </div>
          </div>
          <div class="col-xs-1 text-center bl">
            <label class="padding2">Vaccination Card</label>
          </div>
        </div>
		<?php for($i=1;$i<11;$i++){?>
			<div class="row">
				<div class="col-xs-2 pt7">
					<div class="row">
					  <div class="col-xs-4 text-center">
						<label><?php echo $i; ?></label>
					  </div>
					  <div class="col-xs-8">
						<p><?php $var = "hhvt_r".$i."_f1"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
					  </div>
					</div>
				</div>
				<div class="col-xs-2">
					<p><?php $var = "hhvt_r".$i."_f2"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
				</div>
				<div class="col-xs-1">
					<p><?php $var = "hhvt_r".$i."_f3"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
				</div>
				<div class="col-xs-1">
					<p><?php $var = "hhvt_r".$i."_f4"; ?> <?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
				</div>
				<div class="col-xs-1 text-center" style="background: rgba(215, 215, 215, 0.4) none repeat scroll 0% 0%; min-height: 37px;">
					<?php $var = "hhvt_r".$i."_f5"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
				</div>
				<div class="col-xs-1 text-center ">
					<?php $var = "hhvt_r".$i."_f6"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
				</div>
				<div class="col-xs-2 pt7" style="background: rgba(122, 121, 121, 0.04) none repeat scroll 0% 0%; min-height: 37px;">
					<div class="row">
						<div class="col-xs-4 text-center ">
						  <?php $var = "hhvt_r".$i."_f7"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
						</div>
						<div class="col-xs-4 text-center ">
						  <?php $var = "hhvt_r".$i."_f8"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
						</div>
						<div class="col-xs-4 text-center ">
						  <?php $var = "hhvt_r".$i."_f9"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
						</div>
					  </div>
				</div>
				<div class="col-xs-1 pt7" style="background: rgba(215, 215, 215, 0.4) none repeat scroll 0% 0%; min-height: 37px;">
					<div class="row">
					  <div class="col-xs-6 text-center ">
						<?php $var = "hhvt_r".$i."_f10"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
					  </div>
					  <div class="col-xs-6 text-center ">
						<?php $var = "hhvt_r".$i."_f11"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
					  </div>
					</div>
				</div>
				<div class="col-xs-1 text-center ">
					<?php $var = "hhvt_r".$i."_f12"; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'<p style="color: black;">&#10004;</p>':''; ?>
				</div>
			</div>
			<?php
		} ?>
    </div></div><!--end of rowlightbg-->
    <div class="row">
                  <div class="col-sm-12  bgcolcl text-center">
                    <label>5. Overall comments & feedback given to staff at Health Facility</label>
                  </div>
              </div>
        <div class="row" style="padding-bottom: 1px;">
          <div class="col-xs-6  ">
            <label>Overall Observations/Comments & Recommendations</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table   table-bordered  ">
            <tbody>
             <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Observations
              </td>
              <td>
                <p><?php echo (isset($DataRow))?$DataRow->observations:''; ?></p>
              </td>               
             </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Issues
              </td>
              <td>
                <p><?php echo (isset($DataRow))?$DataRow->issues:''; ?></p>
              </td>               
            </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Actions
              </td>
              <td>
                <p><?php echo (isset($DataRow))?$DataRow->actions:''; ?></p>
              </td>               
            </tr>
           </tbody>
        </table>
          </div>
        </div>
        <div class="row">
          <label class="col-md-3 ">Name of the Monitor</label>
          <div class="col-md-3">
            <p><?php echo (isset($DataRow))?$DataRow->supervisor_name:''; ?></p>
          </div>
          <label class="col-md-3 ">Designation of the Monitor</label>
          <div class="col-md-3">
            <p><?php echo (isset($DataRow))?$DataRow->supervisor_desg:''; ?></p>
          </div>
        </div>
        <br>
        <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
            <div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
				<?php if($DataRow->submitted_by==$userId){ ?>
					<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>epi/forms/activities_edit/<?php echo $DataRow->vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
				<?php } ?>
              <a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
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
			window.location.href="<?php echo $basePath; ?>epi/forms/activities_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	})
	</script>
</body>
</html>