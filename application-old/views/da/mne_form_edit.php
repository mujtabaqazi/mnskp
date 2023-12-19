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
<div class="container">
   <div class="panel panel-primary">
   <div class="panel-heading text-center"> Report of Hand-on Support Activity - M&E Cell  
   </div>
  <div class="panel-body pbody">
    <?php 
		echo validation_errors();
		$action = $basePath."da/mne/save/".$id;
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		$hidden = array('vpvc_id' => $vpvc_id);
		echo form_open_multipart($action,$attributes,$hidden); ?>
    <div class="rowlightbg">
      <div class="row">
          <div class="col-xs-2">
            <label class="pt7 pb2">Visit No</label>
          </div>
          <div class="col-xs-2">
            <input class="form-control numberclass noDots" id="visit_numb" name="visit_numb" readonly="readonly" value="<?php echo (isset($DataRow))?$DataRow->visit_numb:''; ?>" type="text">
          </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">Date of visit</label>
          </div>
          <div class="col-xs-2">
            <input value="<?php $var = "dov";  echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" required="required" class="form-control dp1" type="text" >
            <!-- <input class="form-control dp" id="dov" name="dov" readonly="readonly" value="<?php echo (isset($DataRow))?date('d-m-Y',strtotime($DataRow->dov)):''; ?>" type="text"> -->
          </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">District:</label>
          </div>
          <div class="col-xs-2">
          	 <input class="form-control" id="distcode" name="distcode" value="<?php echo (isset($DataRow))?$DataRow->distcode:''; ?>" type="hidden">
            <p class="pt7"><?php echo (isset($DataRow))?get_District_Name($DataRow->distcode):''; ?></p>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-2">
            <label class="pt7 pb2">Health Facility:</label>
          </div>
          <div class="col-xs-2">
          	<input class="form-control" id="facode" name="facode" value="<?php echo (isset($DataRow))?$DataRow->facode:''; ?>" type="hidden">
            <p class="pt7"><?php echo (isset($DataRow))?get_Facility_Name($DataRow->facode):''; ?></p>
          </div>
          <div class="col-xs-2">
            <label class="pt7 pb2">Reporting Month:</label>
          </div>
          <div class="col-xs-2">
          	<input class="form-control" id="fmonth" name="fmonth" value="<?php echo (isset($DataRow))?$DataRow->fmonth:''; ?>" type="hidden">
            <p class="pt7"><?php echo (isset($DataRow))?$DataRow->fmonth:''; ?></p>
          </div>
          <div class="col-xs-2">
          	<label class="pt7 pb2">Supervisor Name:</label>
          </div>
          <div class="col-xs-2">
          	<input class="form-control" id="supervisor_name" name="supervisor_name" value="<?php echo (isset($DataRow))?$DataRow->supervisor_name:''; ?>" type="hidden">
            <p class="pt7"><?php echo (isset($DataRow))?$DataRow->supervisor_name:''; ?></p>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-2">
            <label class="pt7 pb2">Supervisor Designation</label>
          </div>
          <div class="col-xs-2">
          	<input class="form-control" id="supervisor_desg" name="supervisor_desg" value="<?php echo (isset($DataRow))?$DataRow->supervisor_desg:''; ?>" type="hidden">
            <p class="pt7"><?php echo (isset($DataRow))?$DataRow->supervisor_desg:''; ?></p>
          </div>
          <div class="col-xs-2">
            
          </div>
          <div class="col-xs-2">
          	
          </div>
          <div class="col-xs-2">
          	
          </div>
          <div class="col-xs-2">
          	
          </div>
      </div>
      <div class="row bc mt15">
          <div class="col-xs-4">
            <label class="pt14">Name</label>
          </div>
          <div class="col-xs-8 bl">
            <div class="row bb">
              <div class="col-xs-12 text-center">
                <label>Contact Details</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4 text-center">
                <label>Office</label>
              </div>
              <div class="col-xs-4 brl text-center">
                <label>Mobile phone</label>
              </div>
              <div class="col-xs-4 text-center">
                <label>Email ID</label>
              </div>
            </div>
          </div>
      </div>
      <?php
      $arrayLabel=array(
	  	'dho' => 'DHO',
	  	'dhis' => 'DHIS Coordinator',
	  	'co' => 'DHIS Computer Operator'
	  );
	  foreach($arrayLabel as $key => $val){
      ?>
      <div class="row">
          <div class="col-xs-4">
            <label class="pt7"><?php echo $val; ?></label>
          </div>
          <div class="col-xs-8">
            <div class="row">
              <div class="col-xs-4 zp">
              	<?php if($key != 'co'){ ?>
                <input class="form-control numberclass noDots" <?php $var=$key."_office_numb"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>"  type="text">
                <?php }else{ ?>
                	<input class="form-control" readonly="readonly" type="text">
                <?php } ?>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" <?php $var=$key."_mob_numb"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control" <?php $var=$key."_email"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="email">
              </div>
            </div>
          </div>
      </div>
      <?php } ?>
      <div class="row bc mt1">
        <div class="col-xs-4">
          <label>Number of Health Facilities in district</label>
        </div>
        <div class="col-xs-4 brl text-center">
          <label>HFs with HID No.</label>
        </div>
        <div class="col-xs-4 text-center">
          <label>HFs working without HID No.</label>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="pt7">Under control of DHO</label>
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="disthf_r1_f1" name="disthf_r1_f1" value="<?php echo (isset($DataRow))?$DataRow->disthf_r1_f1:''; ?>" type="text">
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="disthf_r1_f2" name="disthf_r1_f2" value="<?php echo (isset($DataRow))?$DataRow->disthf_r1_f2:''; ?>" type="text">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="pt7">PPHI</label>
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="disthf_r2_f1" name="disthf_r2_f1" value="<?php echo (isset($DataRow))?$DataRow->disthf_r2_f1:''; ?>" type="text">
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="disthf_r2_f2" name="disthf_r2_f2" value="<?php echo (isset($DataRow))?$DataRow->disthf_r2_f2:''; ?>" type="text">
        </div>
      </div>
      <div class="row bc mt1">
        <div class="col-xs-4">
          <label>Number of Health Facilities reporting through DHIS</label>
        </div>
        <div class="col-xs-4 brl text-center">
          <label>HFs with HID No.</label>
        </div>
        <div class="col-xs-4 text-center">
          <label>HFs working without HID No.</label>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="pt7">Under control of DHO</label>
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="dhishf_r1_f1" name="dhishf_r1_f1" value="<?php echo (isset($DataRow))?$DataRow->dhishf_r1_f1:''; ?>" type="text">
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="dhishf_r1_f2" name="dhishf_r1_f2" value="<?php echo (isset($DataRow))?$DataRow->dhishf_r1_f2:''; ?>" type="text">
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="pt7">PPHI</label>
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="dhishf_r2_f1" name="dhishf_r2_f1" value="<?php echo (isset($DataRow))?$DataRow->dhishf_r2_f1:''; ?>" type="text">
        </div>
        <div class="col-xs-4 zp">
          <input class="form-control numberclass noDots" id="dhishf_r2_f2" name="dhishf_r2_f2" value="<?php echo (isset($DataRow))?$DataRow->dhishf_r2_f2:''; ?>" type="text">
        </div>
      </div>
      <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Hands-on Practice Support for improving data quality</label>
          </div>
      </div>
      <div class="row bc">
        <div class="col-xs-1">
          <label class="pt14">S/No.</label>
        </div>
        <div class="col-xs-9 brl">
          <div class="row">
            <div class="col-xs-12 text-center">
              <label>ITEM</label>
            </div>
          </div>
          <div class="row bt">
            <div class="col-xs-12 text-center">
              <label>DHIS</label>
            </div>
          </div>
        </div>
        <div class="col-xs-2 text-center">
          <label class="pt14">Activity Status</label>
        </div>
      </div>
      <?php
      $labelArrayNew=array(
	  	'1' => 'M&E Cell established having separate computer for DHIS (Y/N)',
	  	'2' => 'DHIS reporting regularity (%)',
	  	'3' => 'DHIS report completeness (%)',
	  	'4' => 'District DHIS accuracy (Performed by Coordinator) - (%)',
	  	'5' => 'DHIS cell recording receipt date on the DHIS monthly report (Y/N)',
	  	'6' => 'Internet service available at DHIS cell (Y/N)',
	  	'7' => 'M&E Cell established (Y/N)',
	  	'nothing1' => 'Availability of 3 months stock at district store: (Y/N)',
	  	'8' => 'i. DHIS tools,',
	  	'9' => 'ii. DHIS manual',
	  	'10'=> 'iii. cLMIS procedure manual',
	  	'11'=> 'iv. LQAS forms',
	  	'12'=> 'TA provided to DHIS Coordinator enabling him in providing feedback to HFs (Y/N)',
	  	'nothing2'=> 'TA provided to DHIS Coordinator in: (Y/N)',
	  	'13'=> 'i. filling of all DHIS tools',
	  	'14'=> 'ii. manual checking of monthly reports for timeliness, accuracy & completeness',
	  	'15'=> 'TA provided to DHIS coordinator in understanding and use of DHIS dashboard (Y/N)',
	  	'16'=> 'TA provided to DHIS data entry operator in data entry (Y/N)',
	  	'17'=> 'TA provided to cLMIS operator in data entry (Y/N)',
	  	'18'=> 'TA provided to DHO and DHIS coordinator for removing discrepancies between DHIS & other MIS(s) to improve data quality by conducting meeting with coordinators of vertical programs to validate the information system of EPI, MNCH, TB, Malaria, NP for FP & PHC, Hepatitis, etc (Y/N)',
	  	'nothing3'=> 'TA provided to DHIS Coordinator in: (Y/N)',
	  	'19'=> 'i. data analysis',
	  	'20'=> 'ii. feedback writing',
	  	'21'=> 'MIS data displayed (Y/N)',
	  	'22'=> 'cLMIS',
	  	'23'=> 'cLMIS user manual available (Y/N)',
	  	'24'=> 'cLMIS Reporting compliance (%)',
	  );
	  $yesNoKeysArray = array('1','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23');
	  $yesNoKeysArray = array_fill_keys($yesNoKeysArray,'yesno'); 
	  $inputKeysArray = array('2','3','4','24');
	  $inputKeysArray = array_fill_keys($inputKeysArray,'inputs');
	  $i = 1;
      foreach($labelArrayNew as $key => $val){
	  	if(array_key_exists($key, $yesNoKeysArray)){ ?>
	  		<div class="row" <?php echo (array_key_exists($key, array_fill_keys(array('8','9','10','11','13','14','19','20'),'yes')) == true)?'style="background:white;"':''; ?> >
		        <div class="col-xs-1">
		          <label class="pt7"><?php if(array_key_exists($key, array_fill_keys(array('8','9','10','11','13','14','19','20'),'yes')) == false){ echo $i; $i++; } ?></php></label>
		        </div>
		        <div class="col-xs-9">
		           <label class="pt7"><?php echo $val; ?></label>
		        </div>
		        <div class="col-xs-2 zp">
		           <div class="row">
		              <div class="col-xs-6 text-right">
		                <label>Yes</label>&nbsp;
		                <input <?php $var="hop_c1_r".$key; ?> name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> value="1" class="mt9" type="radio">
		              </div>
		              <div class="col-xs-6">
		                <label>No</label>&nbsp;
		                <input <?php $var="hop_c1_r".$key; ?> name="<?php echo $var; ?>" <?php echo (isset($DataRow) && $DataRow->$var == '0')?'checked="checked"':''; ?> value="0" class="mt9" type="radio">
		              </div>
		            </div>
		        </div>
		      </div>
	  	<?php }elseif(array_key_exists($key, $inputKeysArray)){ ?>
		  		<div class="row">
			        <div class="col-xs-1">
			          <label class="pt7"><?php echo $i; ?></label>
			        </div>
			        <div class="col-xs-9">
			           <label class="pt7"><?php echo $val; ?></label>
			        </div>
			        <div class="col-xs-2 zp">
			           <input class="form-control numberclass" <?php $var="hop_c1_r".$key; ?> name="<?php echo $var; ?>" id="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
			        </div>
			      </div>
	  		<?php $i++; }else{ ?>
	  			<div class="row">
			        <div class="col-xs-1">
			          <label class="pt7"><?php echo $i; ?></label>
			        </div>
			        <div class="col-xs-9">
			           <label class="pt7"><?php echo $val; ?></label>
			        </div>
			        <div class="col-xs-2 zp">
			           
			        </div>
			      </div>
	  			<?php $i++; } ?>
	  <?php  } ?>
      <div class="row">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Results  (Please be brief and specific while reporting table below)</label>
          </div>
      </div>
      <div class="row bc mt1">
        <div class="col-xs-1">
          <label>Sr. No.</label>
        </div>
        <div class="col-xs-2 brl text-center">
          <label>Specific Issue/Gap</label>
        </div>
        <div class="col-xs-2 text-center">
          <label>Reason/s</label>
        </div>
        <div class="col-xs-2 brl text-center">
          <label>Action/s taken</label>
        </div>
        <div class="col-xs-1 zp text-center">
          <label>Resolved (Y/N)</label>
        </div>
        <div class="col-xs-2 brl zp text-center">
          <label>Reason if issue / gap persist</label>
        </div>
        <div class="col-xs-2 text-center">
          <label>Any suggestion/s</label>
        </div>
      </div>
      <?php
	  for($j=1;$j<5;$j++){
	  ?>
      <div class="row">
        <div class="col-xs-1">
          <label class="pt7"><?php echo $j; ?></label>
        </div>
        <div class="col-xs-2 zp">
          <input class="form-control" <?php $var="res_r".$j."_f1"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
        </div>
        <div class="col-xs-2 zp">
          <input class="form-control" <?php $var="res_r".$j."_f2"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
        </div>
        <div class="col-xs-2 zp">
          <input class="form-control" <?php $var="res_r".$j."_f3"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
        </div>
        <div class="col-xs-1 zp">
          <div class="row">
              <div class="col-xs-6 zp text-center">
                <label>Y</label> 
                <input <?php $var="res_r".$j."_f4"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
              <div class="col-xs-6 zp text-center">
                <label>N</label>
                <input <?php $var="res_r".$j."_f4"; ?> name="<?php echo $var; ?>" value="0" <?php echo (isset($DataRow) && $DataRow->$var == '0')?'checked="checked"':''; ?> class="mt9" type="radio">
              </div>
            </div>
        </div>
        <div class="col-xs-2 zp">
          <input class="form-control" <?php $var="res_r".$j."_f5"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
        </div>
        <div class="col-xs-2 zp">
           <input class="form-control" <?php $var="res_r".$j."_f6"; ?> id="<?php echo $var; ?>" name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" type="text">
        </div>
      </div>
      <?php } ?>
    </div>
      <br><br>
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
<?php $this->load->view("templates/scripts"); ?>
<?php $this->load->view("templates/chklsts_scripts"); ?>
</body>
</html>