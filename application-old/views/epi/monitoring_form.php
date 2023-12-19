<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Monitoring and Supervision</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
  <div class="container">
   
    <div class="panel panel-primary">
   <div class="panel-heading text-center"> Monitoring and Supervision
</div>
     <div class="panel-body pbody">
		<?php 
		echo validation_errors();
		$action = $basePath."epi/monitoring/save";
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$vpvcDataRow->fmonth);
		echo form_open_multipart($action,$attributes,$hidden); ?>
      <div class="rowlightbg">  
      <div class="row pb1">
          <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>1.0 Basic Information</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 cmargin27">
            <label>1.1</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Date of Visit:</label>
          </div>
          <div class="col-xs-3">
            <input id="dov" name="dov" class="dp1 form-control" value="<?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" placeholder="" type="text">
          </div>
          <div class="col-xs-1 cmargin27">
            <label>1.2</label>
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
            <label>1.3</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>District:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >			
            <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->district:''; ?></label>
          </div>        
           
          <div class="col-xs-1 cmargin27">
            <label>1.4</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Tehsil:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="tcode" id="tcode" value="<?php echo isset($vpvcDataRow)?get_Facility_Tehsil_Name($vpvcDataRow->facode):''; ?>" required="required" class="form-control"  readonly="readonly" >               			
            <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Tehsil_Name(get_Facility_Tehsil_Name($vpvcDataRow->facode)):''; ?></label>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-1 cmargin27">
            <label>1.5</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Union Council:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="uncode" id="uncode" value="<?php echo isset($vpvcDataRow)?get_Facility_UC_Name($vpvcDataRow->facode):''; ?>" required="required" class="form-control"  readonly="readonly" >               				
			<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_UC_Name(get_Facility_UC_Name($vpvcDataRow->facode)):''; ?></label>
          </div>        
           
          <div class="col-xs-1 cmargin27">
            <label>1.6</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Health Facility:</label>
          </div>
          <div class="col-xs-3">
	        <input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
			<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
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
		        <?php if(isset($vpvcDataRow)){$result = get_FaCat_Name($vpvcDataRow->fatype); ?>				
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
        	<input type="hidden" name="fatype" id="fatype" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
			<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Fatype_Name($vpvcDataRow->fatype):''; ?></label>
      	  </div>
      <!--
      <div class="col-xs-1" style="padding-left:0px;">
              <input class="form-control" id="" name="" placeholder="Other" type="text">
            </div>-->
      
    </div>
    <div class="row">
                 
           
          <div class="col-xs-1 cmargin27">
            <label>1.7</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Number of EPI staff assigned to this facility</label>
          </div>
           
          <div class="col-xs-3">
             <input class="form-control numberclass noDots" id="staff_numb" name="staff_numb"   type="text">
          </div>
    
          <div class="col-xs-1 cmargin27">
            <label>1.8</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Number of EPI staff present</label>
          </div>
          <div class="col-xs-3" >
          <input class="form-control numberclass noDots" id="staff_present" name="staff_present"   type="text">
          </div>
     </div>
     <div class="row">
          <div class="col-xs-1 cmargin27">
            <label>1.9</label>
          </div>
          <div class="col-xs-2 cmargin27">
            <label>Number of community volunteers involved in immunization</label>
          </div>
          <div class="col-xs-3" >
          <input class="form-control numberclass noDots" id="numb_cv_involved"  name="numb_cv_involved" type="text">
          </div>
        </div>
      <div class="row">
                   
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>2.0 Logistics, Record Keeping and Planning</label>
                  </div>
              </div>
              <div class="row bc mt1 mb1">
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
			'8' => 'Vaccine syringes'
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
                <input name="lvs_r<?php echo $key; ?>_f1" class="mt9" type="checkbox">
              </div>
              <div class="col-xs-6">
                <label>Last month</label>&nbsp;
                <input name="lvs_r<?php echo $key; ?>_f2" class="mt9" type="checkbox">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 text-right">
                <label>Yes</label>&nbsp;
                <input name="lvs_r<?php echo $key; ?>_f3" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="lvs_r<?php echo $key; ?>_f3" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input value="" name="lvs_r<?php echo $key; ?>_f4" class="form-control" type="text">
          </div>
        </div>
        <?php } ?>
        <div class="row">
          <div class="col-xs-1"><label class="cmargin27">2.1.8.a</label></div>
          <div class="col-xs-2"><label class="cmargin27">Are these Auto Disable (AD) syringes?</label></div>
          <div class="col-xs-3">
            <!--
            <div class="row">
                          <div class="col-xs-6 text-right">
                            <label>Currently</label>&nbsp;
                            <input name="lvs_r9_f1" class="mt9" type="radio">
                          </div>
                          <div class="col-xs-6">
                            <label>Last month</label>&nbsp;
                            <input name="lvs_r9_f2" value="0" class="mt9" type="radio">
                          </div>
                        </div>-->
            
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 text-right">
                <label>Yes</label>&nbsp;
                <input name="lvs_r9_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="lvs_r9_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input value="" name="lvs_r9_f2" class="form-control" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1"><label class="cmargin27">2.1.9</label></div>
          <div class="col-xs-2"><label class="cmargin27">Sharps safety box</label></div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 text-right">
                <label>Currently</label>&nbsp;
                <input name="lvs_r10_f1" class="mt9" value="1" type="checkbox">
              </div>
              <div class="col-xs-6">
                <label>Last month</label>&nbsp;
                <input name="lvs_r10_f2" class="mt9" value="1" type="checkbox">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-6 text-right">
                <label>Yes</label>&nbsp;
                <input name="lvs_r10_f3" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="lvs_r10_f3" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input value="" name="lvs_r10_f4" class="form-control" type="text">
          </div>
        </div>
        <?php $labelArray=array(
			'11' => 'Is there a burn and bury facility available on the premises?',
			'12' => 'Daily EPI Register',
			'13' => 'Permanent EPI Register',
			'14' => 'EPI Cards'
		); 
		foreach($labelArray as $key => $val){
		?>
        <div class="row">
          <div class="col-xs-1"><label class="cmargin27">2.1.<?php echo $key; ?></label></div>
          <div class="col-xs-5"><label class="cmargin27"><?php echo $val; ?></label></div>
           
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>Available</label>&nbsp;
                <input name="lvs_r<?php echo $key; ?>_f1" class="mt9" type="checkbox">
              </div>
              
            </div>
          </div>
          <div class="col-xs-3 zp">
            <label>Maintained</label>&nbsp;
                <input name="lvs_r<?php echo $key; ?>_f2" class="mt9" type="checkbox">
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
          <div class="col-xs-3 text-center"><input name="vsc_r<?php echo $key; ?>_f1" class="mt9" type="checkbox"></div>
          <div class="col-xs-2 text-center"><input name="vsc_r<?php echo $key; ?>_f2" class="mt9" type="checkbox"></div>
          <div class="col-xs-2 text-center"><input name="vsc_r<?php echo $key; ?>_f3" class="mt9" type="checkbox"></div>
          <div class="col-xs-2 text-center"><input name="vsc_r<?php echo $key; ?>_f4" class="mt9" type="checkbox"></div>
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
                <input name="ccs_r1_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ccs_r1_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="ccs_r1_f2" name="ccs_r1_f2" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.2</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Type of CC equipment</label>
          </div>
          <div class="col-xs-6 zp">
            <div class="row">
              <div class="col-xs-4 text-right zp">
                <label>Refrigerator</label>&nbsp;
                <input name="ccs_r2_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>Cold Box</label>&nbsp;
                <input name="ccs_r2_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-left">
                <label>Ice-lined Freezer</label>&nbsp;
                <input name="ccs_r2_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
         </div>
         <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.3</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is all CC Equipment in use functioning?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-4 text-right zp">
                <label>None</label>&nbsp;
                <input name="ccs_r3_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>Some</label>&nbsp;
                <input name="ccs_r3_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-left">
                <label>All</label>&nbsp;
                <input name="ccs_r3_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="ccs_r3_f2" name="ccs_r3_f2" placeholder="If “none” or “some”, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.4</label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27">Is an updated temperature chart / log displayed?</label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="ccs_r4_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ccs_r4_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp"></div>
         </div>
         <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.5</label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27">Is equipment clean?</label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Inside</label>&nbsp;
                <input name="ccs_r5_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>Outside</label>&nbsp;
                <input name="ccs_r5_f1" value="2" class="mt9" type="radio">
              </div>
            </div>
          </div>
           
         </div>
         <?php $labelArray3=array(
			'6' => 'Is a Voltage Stabilizer functioning for all equipment?',
			'7' => 'Is a thermostat functioning for all equipment?',
			'8' => 'Is a functioning dial thermometer inside each unit?',
			'9' => 'Is any ice accumulation on inner wall of ILR not more than 5 mm thick?',
			'10' => 'Are the tubes in the inner wall of the ILR filled / not empty?'
		); 
		foreach($labelArray3 as $key => $val){
		?>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.<?php echo $key; ?></label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27"><?php echo $val; ?></label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-4 text-right zp">
                <label>None</label>&nbsp;
                <input name="ccs_r<?php echo $key; ?>_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>Some</label>&nbsp;
                <input name="ccs_r<?php echo $key; ?>_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-left">
                <label>All</label>&nbsp;
                <input name="ccs_r<?php echo $key; ?>_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
         </div>
         <?php } ?>
         <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.11</label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27">Is BCG diluent stored with BCG vaccine?</label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes (please verify)</label>&nbsp;
                <input name="ccs_r11_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="ccs_r11_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
         </div>
         <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.12</label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27">Is Measles diluent stored with Measles vaccine?</label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes (please verify)</label>&nbsp;
                <input name="ccs_r12_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="ccs_r12_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
         </div>
         <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.13</label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27">Are there items other than routine EPI supplies (such as antigens, icepacks, and diluents) stored in the CC equipment?</label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-4 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="ccs_r13_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>No</label>&nbsp;
                <input name="ccs_r13_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
         </div>
         <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.3.13.a</label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27">If yes, what non-EPI items are stored (such as water bottles, soda etc)</label>
          </div>
          <div class="col-xs-4 zp">
            <input class="form-control" id="ccs_r13_f2" name="ccs_r13_f2"   type="text">
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
        <?php $labelArray3=array(
        	'1' => 'Is an updated vaccination monitoring chart displayed at center?',
			'2' => 'Is a map of the catchment area displayed in the health facility?',
			'3' => 'Is a spot map of measles displayed?',
			'4' => 'Is a spot map of numbers needed to treat (NNT) displayed?',
			'5' => 'Are immunization information posters displayed?',
			'6' => 'Are children screened for current immunizations during HF visits?',
			'7' => 'Are pregnant women counseled on immunization during HF visits?',
			'8' => 'Check whether total number of doses of one of the antigens from the Permanent Register for the last month match with the monthly report sent to EDO Health Office.'
		); 
		foreach($labelArray3 as $key => $val){
		?>
		<?php if($key == '1' || $key == '8'){ ?>
		<div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.4.<?php echo $key; ?></label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27"><?php echo $val; ?></label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes(please verify)</label>&nbsp;
                <input name="ic_r<?php echo $key; ?>_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6">
                <label>No</label>&nbsp;
                <input name="ic_r<?php echo $key; ?>_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="ic_r<?php echo $key; ?>_f2" name="ic_r<?php echo $key; ?>_f2" placeholder="If no, why" type="text">
          </div>
        </div>
		<?php }else{ ?>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.4.<?php echo $key; ?></label>
          </div>
          <div class="col-xs-7">
            <label class="cmargin27"><?php echo $val; ?></label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-8 text-right zp">
                <label>Yes<?php echo ($key == '6' || $key == '7')?'':'(please verify)'; ?></label>&nbsp;
                <input name="ic_r<?php echo $key; ?>_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4">
                <label>No</label>&nbsp;
                <input name="ic_r<?php echo $key; ?>_f1" value="0" class="mt9" type="radio">
              </div>
            </div>
          </div>
         </div>
         <?php } } ?>
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
            <label class="cmargin27">Does the health center have a monthly outreach activity or micro-plan duly approved and signed by the Medical Officer or Health Facility In-charge?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes (please verify)</label>&nbsp;
                <input name="pa_r1_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r1_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="pa_r1_f2" name="pa_r1_f2" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.2</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Were outreach activities last month conducted according to the field plan?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-4 text-right zp">
                <label>None</label>&nbsp;
                <input name="pa_r2_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>Some</label>&nbsp;
                <input name="pa_r2_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-left">
                <label>All</label>&nbsp;
                <input name="pa_r2_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="pa_r2_f2" name="pa_r2_f2" placeholder="If “none” or “some”, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.3</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there a schedule of community meetings available?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes (please verify)</label>&nbsp;
                <input name="pa_r3_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r3_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <!--<input class="form-control" id="" name="" placeholder="If no, why" type="text">-->
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.4</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there a vaccinator present at the time of this supervision visit?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="pa_r4_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r4_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="pa_r4_f2" name="pa_r4_f2" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.5</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">If no, is there a replacement vaccinator available for this facility?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="pa_r5_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r5_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="pa_r5_f2" name="pa_r5_f2" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.6</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is there an updated list of defaulters available with the vaccinator?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes (please verify)</label>&nbsp;
                <input name="pa_r6_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r6_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="pa_r6_f2" name="pa_r6_f2" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.6.b</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">If yes, is it used for tracking defaulters?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes (please verify)</label>&nbsp;
                <input name="pa_r6_f3" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r6_f3" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            
          </div>
        </div>
        <div class="row">
          <div class="col-xs-11 col-xs-offset-1">
            <p class="cmargin27">Ask vaccinator if present, or interviewee if he conducts vaccinations. If not, skip to 3.0</p></div></div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.7</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Do vaccinators get POL support from the district?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="pa_r7_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r7_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">2.5.8</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Does the district convene vaccinators for monthly review meetings?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="pa_r8_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="pa_r8_f1" value="0" class="mt9" type="radio">
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
          <div class="col-xs-5">
            <label class="cmargin27">Was any supervisory visit carried out in the health facility during last 30 days?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="mva_r1_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="mva_r1_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            
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
            <input value="<?php $var ='mva_r2_f1'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
            <!-- <input class="form-control dp" id="mva_r2_f1" name="mva_r2_f1"   type="text"> -->
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
            <input class="form-control" id="mva_r3_f1" name="mva_r3_f1"   type="text">
          </div>
           
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.2</label>
          </div>
          <div class="col-xs-5">
            <label class="cmargin27">Is a vaccination session being conducted at the time of this current visit?</label>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-6 text-right zp">
                <label>Yes</label>&nbsp;
                <input name="mva_r4_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="mva_r4_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            
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
                <input name="mva_r5_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <label>LHV</label>&nbsp;
                <input name="mva_r5_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-left">
                <label>Other</label>&nbsp;
                <input name="mva_r5_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="mva_r5_f2" name="mva_r5_f2" placeholder="(Specify)" type="text">
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
                <input name="mva_r6_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="mva_r6_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="mva_r6_f2" name="mva_r6_f2" placeholder="If no, why" type="text">
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
                <input name="mva_r7_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-6 text-center">
                <label>No</label>&nbsp;
                <input name="mva_r7_f1" value="0" class="mt9" type="radio">
              </div>
               
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="mva_r7_f2" name="mva_r7_f2" placeholder="If no, why" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.6</label>
          </div>
          <div class="col-xs-4">
            <label class="cmargin27">How do vaccinators travel for outreach activities?</label>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-2 text-right zp">
                <label>Foot</label>&nbsp;
                <input name="mva_r8_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-5 text-center">
                <label>EPI Motorcycle</label>&nbsp;
                <input name="mva_r8_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-5 text-left">
                <label>Other transport</label>&nbsp;
                <input name="mva_r8_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control" id="mva_r8_f2" name="mva_r8_f2" placeholder="(Specify)" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-11 col-xs-offset-1">
            <p class="cmargin27">Ask vaccinator if present, or interviewee if he/she conducts vaccinations. If not, skip to End</p></div>
        </div>
        <div class="row bc">
          <div class="col-xs-1">
            <label class="pt10">#</label>
          </div>
          <div class="col-xs-6 bl text-center">
            <label class="pt10 pb16">Question</label>
          </div>
          <div class="col-xs-3 brl">
            <div class="row">
              <div class="col-xs-12 text-center"><label>Skills</label></div>
            </div>
            <div class="row bt">
              <div class="col-xs-4 text-center"><label>Poor</label></div>
              <div class="col-xs-4 brl text-center"><label>Fair</label></div>
              <div class="col-xs-4 text-center"><label>Good</label></div>
            </div>
          </div>
          <div class="col-xs-2 text-center">
            <label class="pt10">Remarks or N/A</label>
          </div>
        </div>
        <?php
        $labelArray4 = array(
			'9' => 'Can the health worker read and interpret vaccine vial monitor (VVM)?',
			'10' => 'Can he/she describe the VVM stages?',
			'11' => 'Can he/she describe what the VVM stages mean?',
			'12' => 'Does he/she know when to perform the “shake test”?',
			'13' => 'Can he/she demonstrate or describe the “shake test”?',
			'14' => 'Describe or demonstrate (if possible) appropriate injection technique',
		);
		foreach($labelArray4 as $key => $val){
        ?>
        <div class="row">
          <div class="col-xs-1">
            <label class="cmargin27">3.1.<?php echo ($key-2); ?></label>
          </div>
          <div class="col-xs-6">
            <label class="cmargin27"><?php echo $val; ?></label>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-4 text-center">
                <input name="mva_r<?php echo $key; ?>_f1" value="1" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <input name="mva_r<?php echo $key; ?>_f1" value="2" class="mt9" type="radio">
              </div>
              <div class="col-xs-4 text-center">
                <input name="mva_r<?php echo $key; ?>_f1" value="3" class="mt9" type="radio">
              </div>
            </div>
          </div>
          <div class="col-xs-2 zp">
             <input class="form-control" id="mva_r<?php echo $key; ?>_f2" name="mva_r<?php echo $key; ?>_f2"  type="text">
          </div>
        </div>
        <?php } ?>
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
						<input class="form-control fc1" id="hhvt_r<?php echo $i; ?>_f1" name="hhvt_r<?php echo $i; ?>_f1" type="text">
					  </div>
					</div>
				</div>
				<div class="col-xs-2">
					<input class="form-control fc1" id="hhvt_r<?php echo $i; ?>_f2" name="hhvt_r<?php echo $i; ?>_f2" type="text">
				</div>
				<div class="col-xs-1">
					<input class="form-control fc1" id="hhvt_r<?php echo $i; ?>_f3" name="hhvt_r<?php echo $i; ?>_f3" type="text">
				</div>
				<div class="col-xs-1">
					<input class="form-control fc1 numberclass" id="hhvt_r<?php echo $i; ?>_f4" name="hhvt_r<?php echo $i; ?>_f4" type="text">
				</div>
				<div class="col-xs-1 text-center cmargin27">
					<input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f5" name="hhvt_r<?php echo $i; ?>_f5">
				</div>
				<div class="col-xs-1 text-center cmargin27">
					<input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f6" name="hhvt_r<?php echo $i; ?>_f6">
				</div>
				<div class="col-xs-2">
					<div class="row">
						<div class="col-xs-4 text-center cmargin27">
						  <input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f7" name="hhvt_r<?php echo $i; ?>_f7">
						</div>
						<div class="col-xs-4 text-center cmargin27">
						  <input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f8" name="hhvt_r<?php echo $i; ?>_f8">
						</div>
						<div class="col-xs-4 text-center cmargin27">
						  <input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f9" name="hhvt_r<?php echo $i; ?>_f9">
						</div>
					  </div>
				</div>
				<div class="col-xs-1">
					<div class="row">
					  <div class="col-xs-6 text-center cmargin27">
						<input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f10" name="hhvt_r<?php echo $i; ?>_f10">
					  </div>
					  <div class="col-xs-6 text-center cmargin27">
						<input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f11" name="hhvt_r<?php echo $i; ?>_f11">
					  </div>
					</div>
				</div>
				<div class="col-xs-1 text-center cmargin27">
					<input value="1" type="checkbox" id="hhvt_r<?php echo $i; ?>_f12" name="hhvt_r<?php echo $i; ?>_f12">
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
                <input type="text" id="observations" name="observations"  placeholder="Observations" style="border: 0px none;width: 100%;height: 68px;">
              </td>               
             </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues
              </td>
              <td>
                <input type="text" id="issues" name="issues"  placeholder="Issues" style="border: 0px none;width: 100%;height: 68px;">
              </td>               
            </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Actions
              </td>
              <td>
                <input type="text" id="actions" name="actions"  placeholder="Actions" style="border: 0px none;width: 100%;height: 68px;">
              </td>               
            </tr>
           </tbody>
        </table>
          </div>
        </div>
        <div class="row rowmsr-filters row-signatures form-group">
          <label class="col-md-3 cmargin27">Name of the Monitor</label>
          <div class="col-md-3">
            <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->supervisor_name:''; ?></label>
            <input class="form-control" id="supervisor_name" name="supervisor_name" readonly="readonly" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->supervisor_name:''; ?>" placeholder="" type="hidden">
          </div>
          <label class="col-md-3 cmargin27">Designation of the Monitor</label>
          <div class="col-md-3">
            <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->supervisor_desg:''; ?></label>
            <input class="form-control" id="supervisor_desg" name="supervisor_desg" readonly="readonly" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->supervisor_desg:''; ?>" placeholder="" type="hidden">
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
				<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath."epi/listing/monitoring"; ?>" ><i class="fa fa-times"></i> Cancel </a>
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