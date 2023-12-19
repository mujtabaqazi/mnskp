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
   <div class="panel-heading text-center"> Report of Hand-on Support Activity - M&E Cell  
   </div>
  <div class="panel-body pbody">
    <form class="form-horizontal">
    <div class="alignmentview">
    <div class="rowlightbg">
      <div class="row">
          <div class="col-xs-2">
            <label class="">Visit No</label>
          </div>
          <div class="col-xs-2">
            <p><?php echo $DataRow->visit_numb; ?></p>
          </div>
          <div class="col-xs-2">
            <label class="">Date of visit</label>
          </div>
          <div class="col-xs-2">
            <p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
          </div>
          <div class="col-xs-2">
            <label class="">District</label>
          </div>
          <div class="col-xs-2">
            <p><?php echo get_District_Name($DataRow->distcode); ?></p>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-2">
            <label class="">Facility Name</label>
          </div>
          <div class="col-xs-2">
            <p><?php echo get_Facility_Name($DataRow->facode); ?></p>
          </div>
          <div class="col-xs-2">
            <label class="">Reporting Month</label>
          </div>
          <div class="col-xs-2">
            <p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
          </div>
          <div class="col-xs-2">
           <label class="">Supervisor Name</label>
          </div>
          <div class="col-xs-2">
            <p><?php echo $DataRow->supervisor_name; ?></p>
          </div>
      </div>
      <div class="row">
          <div class="col-xs-2">
            <label class="">Supervisor Designation</label>
          </div>
          <div class="col-xs-2">
            <p><?php echo $DataRow->supervisor_desg; ?></p>
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
          <div class="col-sm-4">
            <label class="pt14">Name</label>
          </div>
          <div class="col-sm-8 bl">
            <div class="row bb">
              <div class="col-sm-12 text-center">
                <label>Contact Details</label>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4 text-center">
                <label>Office</label>
              </div>
              <div class="col-sm-4 brl text-center">
                <label>Mobile phone</label>
              </div>
              <div class="col-sm-4 text-center">
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
            <label class=""><?php echo $val; ?></label>
          </div>
          <div class="col-xs-8 pt7">
            <div class="row">
              <div class="col-xs-4 ">
              	<?php if($key != 'co'){ ?>
                <p><?php $var=$key."_office_numb"; ?><?php echo $DataRow->$var; ?></p>
                <?php }else{ ?>
                	<p></p>
                <?php } ?>
              </div>
              <div class="col-xs-4 ">
                <p><?php $var=$key."_mob_numb"; ?><?php echo $DataRow->$var; ?></p>
              </div>
              <div class="col-xs-4 ">
                <p><?php $var=$key."_email"; ?><?php echo $DataRow->$var; ?></p>
              </div>
            </div>
          </div>
      </div>
      <?php } ?>
      <div class="row bc mt1">
        <div class="col-sm-4">
          <label>Number of Health Facilities in district</label>
        </div>
        <div class="col-sm-4 brl text-center">
          <label>HFs with HID No.</label>
        </div>
        <div class="col-sm-4 text-center">
          <label>HFs working without HID No.</label>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="">Under control of DHO</label>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->disthf_r1_f1; ?></p>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->disthf_r1_f2; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="">PPHI</label>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->disthf_r2_f1; ?></p>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->disthf_r2_f2; ?></p>
        </div>
      </div>
      <div class="row bc mt1">
        <div class="col-sm-4">
          <label>Number of Health Facilities reporting through DHIS</label>
        </div>
        <div class="col-sm-4 brl text-center">
          <label>HFs with HID No.</label>
        </div>
        <div class="col-sm-4 text-center">
          <label>HFs working without HID No.</label>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="">Under control of DHO</label>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->dhishf_r1_f1; ?></p>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->dhishf_r1_f2; ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-4">
          <label class="">PPHI</label>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->dhishf_r2_f1; ?></p>
        </div>
        <div class="col-xs-4 ">
          <p><?php echo $DataRow->dhishf_r2_f2; ?></p>
        </div>
      </div>
      <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 cmargin27 bgcolcl text-center">
            <label>Hands-on Practice Support for improving data quality</label>
          </div>
      </div>
      <div class="row bc">
        <div class="col-sm-1">
          <label class="pt14">S/No.</label>
        </div>
        <div class="col-sm-9 brl">
          <div class="row">
            <div class="col-sm-12 text-center">
              <label>ITEM</label>
            </div>
          </div>
          <div class="row bt">
            <div class="col-sm-12 text-center">
              <label>DHIS</label>
            </div>
          </div>
        </div>
        <div class="col-sm-2 text-center">
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
	      <div class="row">
	        <div class="col-xs-1">
	          <label class=""><?php if(array_key_exists($key, array_fill_keys(array('8','9','10','11','13','14','19','20'),'yes')) == false){ echo $i; $i++; } ?></label>
	        </div>
	        <div class="col-xs-9">
	           <label class=""><?php echo $val; ?></label>
	        </div>
	        <div class="col-xs-2 ">
	           <p><?php $var="hop_c1_r".$key; ?><?php echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
	        </div>
	      </div>
	     <?php }elseif(array_key_exists($key, $inputKeysArray)){ ?>
	     	<div class="row">
		        <div class="col-xs-1">
		          <label class=""><?php echo $i; ?></label>
		        </div>
		        <div class="col-xs-9">
		           <label class=""><?php echo $val; ?></label>
		        </div>
		        <div class="col-xs-2 ">
		           <p><?php $var="hop_c1_r".$key; ?><?php echo (isset($DataRow))?$DataRow->$var:''; ?></p>
		        </div>
		      </div>
	     	<?php $i++; }else{ ?>
	     		<div class="row">
		        <div class="col-xs-1">
		          <label class=""><?php echo $i; ?></label>
		        </div>
		        <div class="col-xs-9">
		           <label class=""><?php echo $val; ?></label>
		        </div>
		        <div class="col-xs-2 ">
		           <p></p>
		        </div>
		      </div>
	     		<?php $i++; } } ?>
      
      
      <div class="row">
           <div class="col-sm-12 cmargin27 bgcolcl text-center">
            <label>Results  (Please be brief and specific while reporting table below)</label>
          </div>
      </div>
      <div class="row bc mt1">
        <div class="col-sm-1">
          <label>Sr. No.</label>
        </div>
        <div class="col-sm-2 brl text-center">
          <label>Specific Issue/Gap</label>
        </div>
        <div class="col-sm-2 text-center">
          <label>Reason/s</label>
        </div>
        <div class="col-sm-2 brl text-center">
          <label>Action/s taken</label>
        </div>
        <div class="col-sm-1  text-center zp">
          <label>Resolved (Y/N)</label>
        </div>
        <div class="col-sm-2 brl  text-center zp">
          <label>Reason if issue / gap persist</label>
        </div>
        <div class="col-sm-2 text-center">
          <label>Any suggestion/s</label>
        </div>
      </div>
      <?php
	  for($j=1;$j<5;$j++){
	  ?>
      <div class="row">
        <div class="col-xs-1">
          <label class=""><?php echo $j; ?></label>
        </div>
        <div class="col-xs-2 ">
          <p><?php $var="res_r".$j."_f1"; echo $DataRow->$var; ?></p>
        </div>
        <div class="col-xs-2 ">
          <p><?php $var="res_r".$j."_f2"; echo $DataRow->$var; ?></p>
        </div>
        <div class="col-xs-2 ">
          <p><?php $var="res_r".$j."_f3"; echo $DataRow->$var; ?></p>
        </div>
        <div class="col-xs-1 text-center">
          <p><?php $var="res_r".$j."_f4"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
        </div>
        <div class="col-xs-2 ">
          <p><?php $var="res_r".$j."_f5"; echo $DataRow->$var; ?></p>
        </div>
        <div class="col-xs-2 ">
           <p><?php $var="res_r".$j."_f6"; echo $DataRow->$var; ?></p>
        </div>
      </div>
      <?php } ?>
    </div><!--end od rowlightbg-->
  </div><!--end of alignmentview-->
      <br><br>
      <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
        
            <div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
                <?php if($DataRow->submitted_by==$userId){ ?>
                
              <a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>da/forms/mnecellact_edit/<?php echo $DataRow->vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
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
				window.location.href="<?php echo $basePath; ?>da/forms/mnecellact_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
		</script>

</body>
</html>