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
  
  <div class="container">
   
    <div class="panel panel-primary">
   <div class="panel-heading text-center"> Checklist for EPI Activities
(Only for Health Facility with Functional EPI Centre)
</div>
     <div class="panel-body pbody">
		<?php 
		echo validation_errors();
		$action = $basePath."epi/activities/save";
		$action .= isset($DataRow)?'/'.$id:'';
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$DataRow->fmonth);
		echo form_open_multipart($action,$attributes,$hidden); ?>
        <div class="rowlightbg"> 
        <div class="row pb1">
          <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>1.0 Basic Information</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 cmargin27">
            <label>1.1.</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Date of Visit:</label>
          </div>
          <div class="col-xs-3">
            <input class="dp1 form-control" id="dov" name="dov"  value="<?php echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->dov)):''; ?>" placeholder="date of visit" type="text"> 
          </div>
          <div class="col-xs-1 cmargin27">
            <label>1.2.</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Province:</label>
          </div>
          <div class="col-xs-3">
            <label class="pt7 pb2">Khyber Pakhtunkhwa</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 cmargin27">
            <label>1.3.</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>District:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo (isset($DataRow))?$DataRow->distcode:''; ?>" >			
            <label class="pt7 pb2"><?php echo (isset($DataRow))?get_District_Name($DataRow->distcode):''; ?></label>
          </div>
          <div class="col-xs-1 cmargin27">
            <label>1.4.</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Taluka:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="tcode" id="tcode" value="<?php echo (isset($DataRow))?$DataRow->tcode:''; ?>" required="required" class="form-control"  readonly="readonly" >               			
            <label class="pt7 pb2"><?php echo (isset($DataRow))?get_Tehsil_Name($DataRow->tcode):''; ?></label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 cmargin27">
            <label>1.5.</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Union Council:</label>
          </div>
			<div class="col-xs-3">
				<input type="hidden" name="uncode" id="uncode" value="<?php echo (isset($DataRow))?$DataRow->uncode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
				<label class="pt7 pb2"><?php echo (isset($DataRow))?get_UC_Name($DataRow->uncode):''; ?></label> 
			</div>
			<div class="col-xs-1 cmargin27">
				<label>1.6.</label>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Health Facility:</label>
			</div>
			<div class="col-xs-3">
				<input type="hidden" name="facode" id="facode" value="<?php echo (isset($DataRow))?$DataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
				<label class="pt7 pb2"><?php echo (isset($DataRow))?get_Facility_Name($DataRow->facode):''; ?></label>
			</div>
        </div>
		<div class="row">
			<div class="col-xs-1 cmargin27">
				<label>1.6.1</label>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Type of Health Facility:</label>
			</div>
			<div class="col-xs-3">				
				<?php if(isset($DataRow)){$result = get_FaCat_Name($DataRow->fatype); ?>				
					<input type="hidden" name="facat" id="facat" value="<?php echo isset($result)?$result['facat']:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
					<label class="pt7 pb2"><?php echo isset($result)?($result['facat_name']):''; ?></label>				
				<?php } ?>
			</div>
			<div class="col-xs-1 cmargin27">
				<label>1.6.2</label>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Facility type:</label>
			</div>
			<div class="col-xs-3">
				<input type="hidden" name="fatype" id="fatype" value="<?php echo isset($DataRow)?$DataRow->fatype:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
				<label class="pt7 pb2"><?php echo isset($DataRow)?get_Fatype_Name($DataRow->fatype):''; ?></label>
			</div>
      
		</div>
		<div class="row">
          <div class="col-xs-1 cmargin27">
        <label>1.7</label>
      </div>
          <div class="col-xs-2 cmargin27">
            <label>Number of EPI staff assigned to this facility:</label>
          </div>
          <div class="col-xs-3">
            <input class="form-control numberclass noDots" id="staff_numb" name="staff_numb" value="<?php echo (isset($DataRow))?$DataRow->staff_numb:''; ?>" type="text" placeholder=" " />
          </div>
          <div class="col-xs-1 cmargin27">
        <label>1.8</label>
      </div>
          <div class="col-xs-2 cmargin27">
            <label>Number of EPI staff present:</label>
          </div>
          <div class="col-xs-3">
            <input class="form-control numberclass noDots" id="staff_present" name="staff_present" value="<?php echo (isset($DataRow))?$DataRow->staff_present:''; ?>" type="text" placeholder=" " />
          </div>
           
        </div>
        <div class="row">
                   
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>2.0 Logistics, Record Keeping and Planning</label>
                  </div>
              </div>
        
        <div class="row bc mt1 mb1" >
          <div class="col-xs-1">
             <label>2.1</label>
          </div>
          <div class="col-xs-11">
            <label>Vaccine and Supply Stock Availability</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-1"><label>#</label></div>
          <div class="col-xs-5 brl text-center"><label>Was there shortage of the following vaccines supplies?</label></div>
          <div class="col-xs-3 text-center"><label>Was the shortage reported?</label></div>
          <div class="col-xs-3 bl text-center"><label>Reason for shortage</label></div>
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
          <div class="col-xs-1"><label class="cmargin27">2.1.<?php echo $key; ?></label></div>
          <div class="col-xs-2"><label class="cmargin27"><?php echo $val; ?></label></div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 text-right">
                <label>Currently</label>&nbsp;
                <input <?php $var="lvs_r".$key."_f1"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="checkbox">
              </div>
              <div class="col-xs-6">
                <label>Last month</label>&nbsp;
                <input <?php $var="lvs_r".$key."_f2"; ?> name="<?php echo $var; ?>" value="2" <?php echo (isset($DataRow) && $DataRow->$var == '2')?'checked="checked"':''; ?> class="mt9" type="checkbox">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 text-right">
                <label>Yes</label>&nbsp;
                <input <?php $var="lvs_r".$key."_f3"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input <?php $var="lvs_r".$key."_f3"; ?> name="<?php echo $var; ?>" value="0" <?php echo (isset($DataRow) && $DataRow->$var == '0')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input <?php $var="lvs_r".$key."_f4"; ?> name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" class="form-control" type="text">
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
          <div class="col-xs-1"><label class="cmargin27">2.1.<?php echo $key; ?></label></div>
          <div class="col-xs-2"><label class="cmargin27"><?php echo $val; ?></label></div>
          <div class="col-xs-3">
           
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>Available</label>&nbsp;
                <input <?php $var="lvs_r".$key."_f1"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="checkbox">
              </div>
              
            </div>
          </div>
          <div class="col-xs-3 zp">
            <label>Maintained</label>&nbsp;
                <input <?php $var="lvs_r".$key."_f2"; ?> name="<?php echo $var; ?>" value="2" <?php echo (isset($DataRow) && $DataRow->$var == '2')?'checked="checked"':''; ?> class="mt9" type="checkbox">
          </div>
        </div>
        <?php } ?>
         <div class="row bc mt1 mb1">
          <div class="col-xs-1">
             <label>2.2</label>
          </div>
          <div class="col-xs-11">
            <label>Vaccine Stock Condition (Sample 1 vial for every 10 of each vaccine type)</label>
          </div>
        </div>
        <div class="row bc mt1 mb1">
          <div class="col-xs-1"><label>#</label></div>
          <div class="col-xs-2 brl text-center"><label>Vaccine</label></div>
          <div class="col-xs-3 text-center"><label>Kept at proper temperature</label></div>
          <div class="col-xs-2 brl text-center"><label>Frozen</label></div>
          <div class="col-xs-2 text-center"><label>Expired</label></div>
          <div class="col-xs-2 bl text-center"><label>VVM color changed</label></div>
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
          <div class="col-xs-1"><label class="cmargin27">2.2.<?php echo $key; ?></label></div>
          <div class="col-xs-2  "><label class="cmargin27"><?php echo $val; ?></label></div>
          <div class="col-xs-3 text-center"><input <?php $var="vsc_r".$key."_f1"; ?> name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="checkbox"></div>
          <div class="col-xs-2 text-center"><input <?php $var="vsc_r".$key."_f2"; ?> name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="checkbox"></div>
          <div class="col-xs-2 text-center"><input <?php $var="vsc_r".$key."_f3"; ?> name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="checkbox"></div>
          <div class="col-xs-2 text-center"><input <?php $var="vsc_r".$key."_f4"; ?> name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="checkbox"></div>
        </div>
        <?php } ?>
        <div class="row bc mt1 mb1">
          <div class="col-xs-1">
             <label>2.3</label>
          </div>
          <div class="col-xs-11">
            <label>Cold Chain (CC) Status</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.1</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there enough equipment to hold the cold vaccine supply?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input <?php $var="ccs_r1_f1"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input <?php $var="ccs_r1_f1"; ?> name="<?php echo $var; ?>" value="0" <?php echo (isset($DataRow) && $DataRow->$var == '0')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="ccs_r1_f2" value="<?php echo (isset($DataRow))?$DataRow->ccs_r1_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.2</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is all CC Equipment in use functioning?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input <?php $var="ccs_r2_f1"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input <?php $var="ccs_r2_f1"; ?> name="<?php echo $var; ?>" value="0" <?php echo (isset($DataRow) && $DataRow->$var == '0')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="ccs_r2_f2" value="<?php echo (isset($DataRow))?$DataRow->ccs_r2_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.3</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is an updated temperature chart displayed?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="ccs_r3_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->ccs_r3_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ccs_r3_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->ccs_r3_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="ccs_r3_f2" value="<?php echo (isset($DataRow))?$DataRow->ccs_r3_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.4</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Are there items other than routine EPI supplies (such as antigens, icepacks, saline) stored in the CC equipment?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="ccs_r4_f1" value="1" <?php echo (isset($DataRow) && $DataRow->ccs_r4_f1 == '1')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ccs_r4_f1" value="0" <?php echo (isset($DataRow) && $DataRow->ccs_r4_f1 == '0')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="ccs_r4_f2" value="<?php echo (isset($DataRow))?$DataRow->ccs_r4_f2:''; ?>" placeholder="If yes,what non-EPI items are stored" type="text">
          </div>
        </div>
        <div class="row bc mt1 mb1">
          <div class="col-xs-1">
             <label>2.4</label>
          </div>
          <div class="col-xs-11">
            <label>Immunization Coverage</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.4.1</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is an updated vaccination monitoring chart displayed at center?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="ic_r1_f1" value="1" <?php echo (isset($DataRow) && $DataRow->ic_r1_f1 == '1')?'checked="checked"':''; ?> class="mt9"  type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ic_r1_f1" value="0" <?php echo (isset($DataRow) && $DataRow->ic_r1_f1 == '0')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="ic_r1_f2" value="<?php echo (isset($DataRow))?$DataRow->ic_r1_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.4.2</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Check whether total number of doses of one of the antigens from the Permanent Register for the last month match with the monthly report sent to EDO Health Office.</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="ic_r2_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->ic_r2_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ic_r2_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->ic_r2_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="ic_r2_f2" value="<?php echo (isset($DataRow))?$DataRow->ic_r2_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row bc mt1 mb1">
          <div class="col-xs-1">
             <label>2.5</label>
          </div>
          <div class="col-xs-11">
            <label>Planning of EPI Activities</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.1</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Does the health center have a monthly outreach activity plan duly approved and signed by the Medical Officer or Health Facility In-charge?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="pa_r1_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r1_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="pa_r1_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r1_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="pa_r1_f2" value="<?php echo (isset($DataRow))?$DataRow->pa_r1_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.2</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Were the number of outreach activities last month conducted according to the plan?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="pa_r2_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r2_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="pa_r2_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r2_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="pa_r2_f2" value="<?php echo (isset($DataRow))?$DataRow->pa_r2_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.3</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there a vaccinator present at the time of this supervision visit?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="pa_r3_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r3_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="pa_r3_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r3_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="pa_r3_f2" value="<?php echo (isset($DataRow))?$DataRow->pa_r3_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.4</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">If no, is there a replacement vaccinator available for this facility?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="pa_r4_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r4_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="pa_r4_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r4_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="pa_r4_f2" value="<?php echo (isset($DataRow))?$DataRow->pa_r4_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.5</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there an updated list of defaulters available with the vaccinator?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="pa_r5_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r5_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="pa_r5_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r5_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="pa_r5_f2" value="<?php echo (isset($DataRow))?$DataRow->pa_r5_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.5.a</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">If yes, is it used for tracking defaulters?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="pa_r5_f3" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r5_f3 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="pa_r5_f3" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->pa_r5_f3 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            
          </div>
        </div>
        <div class="row">
                   
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>3.0 Monitoring of Vaccination Activity</label>
                  </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.1</label>
          </div>
          <div class="col-xs-8">
            <label class="cmargin27">Was any supervisory visit carried out in the health facility during last 30 days?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="mva_r1_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r1_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="mva_r1_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r1_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
           
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.1.a</label>
          </div>
          <div class="col-xs-8">
            <label class="cmargin27">What was the date when the visit conducted?</label>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control dp anyOtherDate" id="" name="mva_r2_f1" value="<?php echo (isset($DataRow) && $DataRow->mva_r2_f1 !== NULL)?date('d-m-Y',strtotime($DataRow->mva_r2_f1)):''; ?>"  type="text">
          </div>
           
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.1.b</label>
          </div>
          <div class="col-xs-8">
            <label class="cmargin27">Who conducted that visit?</label>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="mva_r3_f1" value="<?php echo (isset($DataRow))?$DataRow->mva_r3_f1:''; ?>"   type="text">
          </div>
           
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.2</label>
          </div>
          <div class="col-xs-8">
            <label class="cmargin27">Is a vaccination session being conducted at the time of this current visit?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="mva_r4_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r4_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="mva_r4_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r4_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.3</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Who is currently conducting vaccinations?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-4 text-right zp">
                <label>Vaccinator</label>&nbsp;
                <input name="mva_r5_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r5_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>LHV</label>&nbsp;
                <input name="mva_r5_f1" value="2" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r5_f1 == '2')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-4">
                <label>Other</label>&nbsp;
                <input name="mva_r5_f1" value="3" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r5_f1 == '3')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="mva_r5_f2" value="<?php echo (isset($DataRow))?$DataRow->mva_r5_f2:''; ?>" placeholder="Other (Specify)" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.4</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there any pre-counseling done with the parents / caretakers of the children receiving the vaccinations?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="mva_r6_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r6_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="mva_r6_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r6_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="mva_r6_f2" value="<?php echo (isset($DataRow))?$DataRow->mva_r6_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.5</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there any post-counseling done with the parents / caretakers of the children receiving the vaccinations?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="mva_r7_f1" value="1" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r7_f1 == '1')?'checked="checked"':''; ?> type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="mva_r7_f1" value="0" class="mt9" <?php echo (isset($DataRow) && $DataRow->mva_r7_f1 == '0')?'checked="checked"':''; ?> type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="" name="mva_r7_f2" value="<?php echo (isset($DataRow))?$DataRow->mva_r7_f2:''; ?>" placeholder="If no, why" type="text">
          </div>
        </div>
         
         
         
         <div class="row mt1 mb1">
                   
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>4. Household Verification Tool for Routine EPI Coverage (Optional)</label>
                  </div>
          </div>
         
        <div class="row bc">
          <div class="col-xs-2 text-center">
            <div class="row">
              <div class="col-xs-4">
                <label class="padding1">Sr.No</label>
              </div>
              <div class="col-xs-8 bl">
                <label class="padding1">Address</label>
              </div>
            </div>
          </div>
          <div class="col-xs-2 text-center brl">
            <label class="padding1">Father’s Name &amp; Cast</label>
          </div>
          <div class="col-xs-1 text-center">
            <label class="padding2">Name of Child</label>
          </div>
          <div class="col-xs-1 text-center brl">
            <label class="padding2">Age (in months)</label>
          </div>
          <div class="col-xs-1 text-center">
            <label class="padding1">BCG</label>
          </div>
          <div class="col-xs-1 text-center bl">
            <label class="padding1">OPV zero</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <div class="row bb">
              <div class="col-xs-12 zp">
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
				<div class="col-xs-2">
					<div class="row">
					  <div class="col-xs-4 text-center cmargin28">
						<label><?php echo $i; ?></label>
					  </div>
					  <div class="col-xs-8">
						<input class="form-control fc1" <?php $var = "hhvt_r".$i."_f1"; ?> id="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
					  </div>
					</div>
				</div>
				<div class="col-xs-2">
					<input class="form-control fc1" <?php $var = "hhvt_r".$i."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
				</div>
				<div class="col-xs-1">
					<input class="form-control fc1" <?php $var = "hhvt_r".$i."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
				</div>
				<div class="col-xs-1">
					<input class="form-control fc1 numberclass" <?php $var = "hhvt_r".$i."_f4"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
				</div>
				<div class="col-xs-1 text-center cmargin27">
					<input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f5"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
				</div>
				<div class="col-xs-1 text-center cmargin27">
					<input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f6"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
				</div>
				<div class="col-xs-2">
					<div class="row">
						<div class="col-xs-4 text-center cmargin27">
						  <input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f7"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
						</div>
						<div class="col-xs-4 text-center cmargin27">
						  <input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f8"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
						</div>
						<div class="col-xs-4 text-center cmargin27">
						  <input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f9"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
						</div>
					  </div>
				</div>
				<div class="col-xs-1">
					<div class="row">
					  <div class="col-xs-6 text-center cmargin27">
						<input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f10"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
					  </div>
					  <div class="col-xs-6 text-center cmargin27">
						<input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f11"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
					  </div>
					</div>
				</div>
				<div class="col-xs-1 text-center cmargin27">
					<input value="1" type="checkbox" <?php $var = "hhvt_r".$i."_f12"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> >
				</div>
			</div>
			<?php
		} ?>
    </div><!--end of rowlightbg-->
    <div class="row">
                   
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>5. Overall comments & feedback given to staff at Health Facility</label>
                  </div>
              </div>
         
        <div class="row" style="padding-bottom: 1px;">
          
          <div class="col-xs-6  cmargin27">
            <label>Overall Observations/Comments & Recommendations</label>
          </div>
          
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table   table-bordered  ">
            <tbody>
             <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Observations
              </td>
              <td>
                <input type="text" id="observations" name="observations" value="<?php echo (isset($DataRow))?$DataRow->observations:''; ?>"  placeholder="Observations" style="border: 0px none;width: 100%;height: 68px;">
              </td>               
             </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues
              </td>
              <td>
                <input type="text" id="issues" name="issues" value="<?php echo (isset($DataRow))?$DataRow->issues:''; ?>"  placeholder="Issues" style="border: 0px none;width: 100%;height: 68px;">
              </td>               
            </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions
              </td>
              <td>
                <input type="text" id="actions" name="actions" value="<?php echo (isset($DataRow))?$DataRow->actions:''; ?>"  placeholder="Actions" style="border: 0px none;width: 100%;height: 68px;">
              </td>               
            </tr>
           </tbody>
        </table>
          </div>
        </div>
        <div class="row rowmsr-filters row-signatures form-group">
          <label class="col-md-3 cmargin27">Name of the Monitor</label>
          <div class="col-md-3">
            <label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->supervisor_name:''; ?></label>
            <input class="form-control" id="supervisor_name" name="supervisor_name" readonly="readonly" value="<?php echo isset($DataRow)?$DataRow->supervisor_name:''; ?>" placeholder="" type="hidden">
          </div>
          <label class="col-md-3 cmargin27">Designation of the Monitor</label>
          <div class="col-md-3">
            <label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->supervisor_desg:''; ?></label>
            <input class="form-control" id="supervisor_desg" name="supervisor_desg" readonly="readonly" value="<?php echo isset($DataRow)?$DataRow->supervisor_desg:''; ?>" placeholder="" type="hidden">
          </div>
          
        </div>
      
        <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
          
            <div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
				<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
					<i class="fa fa-file"></i> Save Form  
				</button>
				<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
					<i class="fa fa-floppy-o"></i> Submit Form  
				</button>
				<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath."epi/listing/activities"; ?>" ><i class="fa fa-times"></i> Cancel </a>
            </div>
        </div>
		<?php echo form_close(); ?>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
 
   
    

    

  </div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
  <?php $this->load->view("templates/chklsts_scripts"); ?>
	<script type="text/javascript">
		$(".actionreasonYes").attr("readonly","true");
		$(document).on("change",".actionselected",function(){
			var valuee = $(this).val();
			if(valuee=="1")
			{
				//alert("aya");
				$(this).parent().parent(".row").find(".actionreasonNo").attr("readonly","true");
				$(this).parent().parent(".row").find(".actionreasonYes").removeAttr("readonly");
				//alert($(this).parent().parent(".row").find(".actionreasonYes"));
			}else{
				$(this).parent().parent(".row").find(".actionreasonYes").attr("readonly","true");
				$(this).parent().parent(".row").find(".actionreasonNo").removeAttr("readonly");
			}
		});
		$(document).on("change","#lvs_r1_f1",function(){
			var valuee = $(this).val();
			if(valuee=="1")
			{
				$("#lvs_r1_f2").removeAttr("readonly");
			}else{
				$("#lvs_r1_f2").attr("readonly","true");
			}
		});
		$(document).on("change","#lcc_r2_f1",function(){
			var valuee = $(this).val();
			if(valuee=="1")
			{
				$("#lcc_r2_f3").attr("readonly","true");
			}else{
				$("#lcc_r2_f3").removeAttr("readonly");
			}
		});
		$(document).on("change","#lpa_r4_f1",function(){
			var valuee = $(this).val();
			if(valuee=="1")
			{
				$("#lpa_r5_f1").removeAttr("readonly");
			}else{				
				$("#lpa_r5_f1").attr("readonly","true");
			}
		});
		$(document).on("change","#staff_numb",function(){
			var mesg = "Staff Present could not be greater than Staff assigned to this facility!";
			comparelessequal('staff_numb', 'staff_present', mesg);
		});
		$(document).on("change","#staff_present",function(){
			var mesg = "Staff Present could not be greater than Staff assigned to this facility!";
			comparelessequal('staff_numb', 'staff_present', mesg);
		});
		function comparelessequal(f1, f2, mesg){

			if(parseInt($("#"+f2).val())>parseInt($("#"+f1).val())){
		
				alert(mesg);
		
				$("#"+f2).css("background-color","#F54F4F");
				$("#"+f2).val('');
			}else{
		
				$("#"+f2).css("background-color","#FFF");
		
			} // end if/else
		}
	</script>
</body>
</html>