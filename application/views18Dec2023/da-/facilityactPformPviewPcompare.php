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
<div class="container-fluid">
   <div class="panel panel-primary">
   <div class="panel-heading text-center"> Hand-on Support Activity – Reporting Health Facility Level
   </div>
   <div class="panel-body pbody">
      <form class="form-horizontal">
      <div class="alignmentview">
      <div class="rowlightbg">        
         <div class="row bc">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">S#</label>
                  </div>
                  <div class="col-xs-10 bl">
                    <label class="pt7">Reporting Month</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 brl text-center">
                <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
              </div>
              <div class="col-xs-4 text-center">
                <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.1</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Date of visit</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="dov"; echo isset($CompareRow)?getNewDateFormat(date("d-m-Y",strtotime($CompareRow->$var))):''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.2</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Supervisor Name</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="supervisor_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.3</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Supervisor Designation</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="supervisor_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.4</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Visit Number</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="visit_numb"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="visit_numb"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.5</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Name of In-Charge</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="fac_inc_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="fac_inc_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.6</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Phone No. of Incharge</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="inc_phone"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="inc_phone"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.7</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">In-charge Email ID</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="inc_email"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="inc_email"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.8</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Name of DHIS FP</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="dhis_fp_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="dhis_fp_name"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-4">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7">1.9</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7">Designation of DHIS FP</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-4 text-center">
                <p><?php $var ="dhis_fp_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-4 text-center bg3">
                <p><?php $var ="dhis_fp_desg"; echo isset($CompareRow)?$CompareRow->$var:''; ?></p>
              </div>
            </div>
            
            <div class="row" style="padding-bottom: 1px;">
              <div class="col-xs-12 cmargin27 bgcolcl text-center">
                <label>Section 2: Identification</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7 pb2">2.1</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7 pb2">District</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7 pb2">2.2</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7 pb2">Facility</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <p><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></p>
              </div>
            </div>              
            <div class="row">
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7 pb2">2.3</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7 pb2">Facility Type</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <p><?php $var = "fatype"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7 pb2">2.4</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7 pb2">Province</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <p>Khyber Pakhtunkhwa</p>
              </div>
            </div>
             <div class="row">
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7 pb2">2.5</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7 pb2">HID code of HF</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <p><?php echo $DataRow->facode; ?></p>
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-2">
                    <label class="pt7 pb2">2.6</label>
                  </div>
                  <div class="col-xs-10">
                    <label class="pt7 pb2">Phone No. of HF</label>
                  </div>
                </div>
              </div>
              <div class="col-xs-3">
                <p><?php echo $DataRow->fac_phone; ?></p>
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
        <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
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
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f3"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div>  
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f4"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div>  
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f5"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f5";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div> 
              </div>
              <div class="col-xs-3">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f6"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f6";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-xs-4 pt7 text-center">
            <div class="row">
              <div class="col-xs-4">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f7"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f7";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div> 
              </div>
              <div class="col-xs-4">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f8"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f8";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div> 
              </div>
              <div class="col-xs-4">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f9"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="hop_r".$i."_f9";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div> 
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
         <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
          </div>
        </div>  
        <?php for($i=1;$i<=5;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-6">
                <label><?php $var="hop_r".$i."_f1"; echo (isset($CompareRow) && ($CompareRow->$var > 0))?get_HFStaffDesignation_Name($CompareRow->fatype,$CompareRow->$var):''; ?></label>
              </div>
              <div class="col-xs-6">
                <label><?php $var="hop_r".$i."_f2";  echo $CompareRow->$var; ?></label>
              </div>
            </div>
          </div>
          <div class="col-xs-5 pt7 text-center">
            <div class="row">
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f3"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f3";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div>  
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f4"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f4";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div>  
              </div>
              <div class="col-xs-3">
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f5"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f5";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div> 
              </div>
              <div class="col-xs-3">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f6"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f6";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-xs-4 pt7 text-center">
            <div class="row">
              <div class="col-xs-4">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f7"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f7";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div> 
              </div>
              <div class="col-xs-4">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f8"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f8";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div> 
              </div>
              <div class="col-xs-4">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="hop_r".$i."_f9"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="hop_r".$i."_f9";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                   </div>
                </div> 
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
         <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
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
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f3"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="dm_r".$i."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div>  
              </div>
              <div class="col-xs-6">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f4"; echo get_yn_class($DataRow->$var); ?>">
                      <?php $var="dm_r".$i."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                    </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-xs-5 pt7 text-center">
              <div class="row">
              <div class="col-xs-6">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f5"; echo get_yn_class($DataRow->$var); ?>">
                      <?php $var="dm_r".$i."_f5";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                    </div>
                </div> 
              </div>
              <div class="col-xs-6">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f6"; echo get_yn_class($DataRow->$var); ?>">
                    <?php $var="dm_r".$i."_f6";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div> 
              </div>
            </div>
            </div>
          </div>
	   	<?php } ?>
       <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
          </div>
        </div> 
        <?php for($i=1;$i<=9;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-6">
                <label><?php $var="dm_r".$i."_f1";  echo (isset($CompareRow) && ($CompareRow->$var > 0))?get_HFStaffDesignation_Name($CompareRow->fatype,$CompareRow->$var):''; ?></label>
              </div>
              <div class="col-xs-6">
                <label><?php $var="dm_r".$i."_f2";  echo $CompareRow->$var; ?></label>
              </div>
            </div>
          </div>
          <div class="col-xs-4 pt7 text-center">
            <div class="row">
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f3"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="dm_r".$i."_f3";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div>  
              </div>
              <div class="col-xs-6">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f4"; echo get_yn_class($CompareRow->$var); ?>">
                      <?php $var="dm_r".$i."_f4";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                    </div>
                </div> 
              </div>
            </div>
          </div>
          <div class="col-xs-5 pt7 text-center">
              <div class="row">
              <div class="col-xs-6">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f5"; echo get_yn_class($CompareRow->$var); ?>">
                      <?php $var="dm_r".$i."_f5";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                    </div>
                </div> 
              </div>
              <div class="col-xs-6">
                 <div class="row">
                  <div class="col-xs-3"></div>
                  <div class="col-xs-6">
                    <p class =" pt7 <?php $var="dm_r".$i."_f6"; echo get_yn_class($CompareRow->$var); ?>">
                    <?php $var="dm_r".$i."_f6";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
                  </div>
                </div> 
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
            <div class="col-sm-5">
              <div class="row">
                <div class="col-sm-1">
                  <label>#</label></div>
                <div class="col-sm-8 brl">
                  <label class="pt20 pb20">Name</label></div>
                <div class="col-sm-3 zp">
                  <label class="pt20 pb20">DHIS Instrument No.</label>
                </div>
              </div>
            </div>
            <div class="col-xs-7">
				<div class="row">
					<div class="col-sm-6 zp brl text-center">
						<div class="row">
							<div class="col-sm-3 zp text-center">
							   <label class="pt20 pb20">Available</label>
							</div>
							<div class="col-sm-3 bl text-center">
							   <label class="pt20 pb20">In Use</label>
							</div>
							<div class="col-sm-3 brl zp">
							  <label>Filled By designated person</label>
							</div>
							<div class="col-sm-3 text-center">
							   <label>Filled Properly</label>
							</div>
						</div>
					</div>
					<div class="col-sm-6 zp text-center">
						<div class="row">
							<div class="col-sm-3 zp text-center">
							   <label class="pt20 pb20">Available</label>
							</div>
							<div class="col-sm-3 bl text-center">
							   <label class="pt20 pb20">In Use</label>
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
            </div>
          </div>
		  <div class="row bc bt">
            <div class="col-sm-5">
				<div class="row">
					<div class="col-sm-1">
					<label></label></div>
					<div class="col-sm-8">
					<label ></label>
					</div>
					<div class="col-sm-3">
					<label></label>
					</div>
				</div>
            </div>
            <div class="col-xs-7">
				<div class="row">
					<div class="col-sm-6 zp brl text-center">
						<label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
					</div>
					<div class="col-sm-6 text-center">
						<label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>
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
            <div class="col-xs-5 pt7">
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
            <div class="col-xs-7 text-center pt7">
				<div class="row">
					<div class="col-xs-6">
						<div class="row">
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f1"; echo get_gpnr_class($DataRow->$var); ?>">
								  <?php $var="dts_r".$i."_f1";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
							</div>
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f2"; echo get_gpnr_class($DataRow->$var); ?>">
								  <?php $var="dts_r".$i."_f2";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
							</div>
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f3"; echo get_gpnr_class($DataRow->$var); ?>">
								<?php $var="dts_r".$i."_f3";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
							</div>
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f4"; echo get_gpnr_class($DataRow->$var); ?>">
								<?php $var="dts_r".$i."_f4";  echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':(($DataRow->$var == '2')?'NA':'No'); ?></p>
							</div>
						</div>
					</div>
					<div class="col-xs-6 bg3">
						<div class="row">
							<div class="col-xs-3 ">
								<p class =" pt7 <?php $var="dts_r".$i."_f1"; echo get_gpnr_class($CompareRow->$var); ?>">
								  <?php $var="dts_r".$i."_f1";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':(($CompareRow->$var == '2')?'NA':'No'); ?></p>
							</div>
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f2"; echo get_gpnr_class($CompareRow->$var); ?>">
								  <?php $var="dts_r".$i."_f2";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':(($CompareRow->$var == '2')?'NA':'No'); ?></p>
							</div>
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f3"; echo get_gpnr_class($CompareRow->$var); ?>">
								<?php $var="dts_r".$i."_f3";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':(($CompareRow->$var == '2')?'NA':'No'); ?></p>
							</div>
							<div class="col-xs-3">
								<p class =" pt7 <?php $var="dts_r".$i."_f4"; echo get_gpnr_class($CompareRow->$var); ?>">
								<?php $var="dts_r".$i."_f4";  echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':(($CompareRow->$var == '2')?'NA':'No'); ?></p>
							</div>
						</div>
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
            <div class="col-sm-9 brl">
              <label>Data Quality Parameter</label>
            </div>
            <div class="col-sm-2 text-center">
              <label>Status</label>
            </div>
          </div>          
          <div class="row bc mt1">
            <div class="col-xs-10">
              <label>DHIS</label>
            </div>
            <div class="col-xs-1 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
            <div class="col-xs-1 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
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
            <div class="col-xs-9">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">             
              <p class =" pt7 <?php $var="ps_r".$key."_f1"; echo get_yn_class($DataRow->$var); ?>">
              <?php $var="ps_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>               
            </div>
            <div class="col-xs-1 text-center bg3">
              <p class =" pt7 <?php $var="ps_r".$key."_f1"; echo get_yn_class($CompareRow->$var); ?>">
              <?php $var="ps_r".$key."_f1"; echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
            </div>
          </div>
		  <?php }elseif(array_key_exists($key, $inputKeysArray)){ ?>
		  <div class="row">
            <div class="col-xs-1">
               <label><?php echo $i; $i++; ?></label>
            </div>
            <div class="col-xs-9">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">
               <p><?php $var="ps_r".$key."_f1"; echo (isset($DataRow))?$DataRow->$var:''; ?></p>
            </div>
            <div class="col-xs-1 text-center">
               <p><?php $var="ps_r".$key."_f1"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
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
          <!-- <div class="row bc mt1">
            <div class="col-sm-12">
              <label>cLMIS</label>
            </div>
          </div> -->
          <div class="row bc mt1">
            <div class="col-xs-10">
              <label>cLMIS</label>
            </div>
            <div class="col-xs-1 brl text-center"><label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label></div>
            <div class="col-xs-1 text-center"><label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label></div>
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
            <div class="col-xs-9">
              <label><?php echo $val; ?></label>
            </div>
            <div class="col-xs-1 text-center">
              <p class =" pt7 <?php $var="ps_r".$key."_f1"; echo get_yn_class($DataRow->$var); ?>">
              <?php $var="ps_r".$key."_f1"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
            </div>
            <div class="col-xs-1 text-center bg3">
              <p class =" pt7 <?php $var="ps_r".$key."_f1"; echo get_yn_class($CompareRow->$var); ?>">
              <?php $var="ps_r".$key."_f1"; echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
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
        <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>               
          </div>
        </div> 
		<?php for($i=1;$i<=3;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-2">
                <label><?php echo $i; ?></label>
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
            <p class =" pt7 <?php $var="res_r".$i."_f4"; echo get_yn_class($DataRow->$var); ?>">
            <?php $var="res_r".$i."_f4"; echo (isset($DataRow) && $DataRow->$var == '1')?'Yes':'No'; ?></p>
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
         <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>               
          </div>
        </div> 
    <?php for($i=1;$i<=3;$i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <div class="row">
              <div class="col-xs-2">
                <label><?php echo $i; ?></label>
              </div>
              <div class="col-xs-10">
                <p><?php $var="res_r".$i."_f1"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f2"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f3"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
          </div>
          <div class="col-xs-1 text-center">
            <p class =" pt7 <?php $var="res_r".$i."_f4"; echo get_yn_class($CompareRow->$var); ?>">
            <?php $var="res_r".$i."_f4"; echo (isset($CompareRow) && $CompareRow->$var == '1')?'Yes':'No'; ?></p>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f5"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
          </div>
          <div class="col-xs-2">
            <p><?php $var="res_r".$i."_f6"; echo (isset($CompareRow))?$CompareRow->$var:''; ?></p>
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
        <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>               
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
              <div class="col-xs-1 bg3 text-left <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_01']); ?>">
                <p >
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_01'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_01'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-left <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_02']); ?>">
               <p >
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_02'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_02'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_02a']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_02a'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_02a'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_03']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_03'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_03'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_04']); ?>">
               <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_04'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_04'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_05']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_05'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_05'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_06']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_06'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_06'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_07']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_07'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_07'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_08']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_08'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_08'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_09']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_09'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_09'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_10']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_10'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_10'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_11']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_11'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_11'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_12']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_12'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_12'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_13']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_13'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_13'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_14']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_14'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_14'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_15']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_15'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_15'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_16']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_16'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_16'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_17']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_17'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_17'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_18']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_18'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_18'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_19']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_19'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_19'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_20']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_20'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_20'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_21']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_21'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_21'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_22']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_22'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_22'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['dhis_24']); ?>">
                <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['dhis_24'] == '1')?'Yes':(($DataRowDetail[$index]['dhis_24'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['lqas_forms']); ?>">
                 <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['lqas_forms'] == '1')?'Yes':(($DataRowDetail[$index]['lqas_forms'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-6 text-center <?php echo get_gpnr_class($DataRowDetail[$index]['cmrr']); ?>">
                 <p>
                <?php echo (isset($DataRowDetail) && $DataRowDetail[$index]['cmrr'] == '1')?'Yes':(($DataRowDetail[$index]['cmrr'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <br>
		<?php } ?>
		 <div class="row bc mt1 mb1">
          <!-- <div class="col-sm-2 bgw" style="min-height:25px;">                
          </div> -->
          <div class="col-sm-12 bl text-center">
            <label><?php $var ="fmonth"; echo isset($CompareRow)?getNewFMonthFormat($CompareRow->$var):''; ?></label>               
          </div>
        </div> 
        <?php
		$arraySize = count($CompareRowDetail);
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

                    <p class="pt7"><?php echo (isset($CompareRowDetail) && ($CompareRowDetail[$index]['staff_desg'] > 0))?get_HFStaffDesignation_Name($CompareRow->fatype,$CompareRowDetail[$index]['staff_desg']):''; ?></p>
                  </div>
                  <div class="col-xs-6">

                    <p class="pt7"><?php echo (isset($CompareRowDetail))?$CompareRowDetail[$index]['staff_name']:''; ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4">
            <div class="row">
              <div class="col-xs-1 bg3 text-left <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_01']); ?>">
                <p >
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_01'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_01'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-left <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_02']); ?>">
               <p >
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_02'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_02'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_02a']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_02a'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_02a'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_03']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_03'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_03'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_04']); ?>">
               <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_04'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_04'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_05']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_05'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_05'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_06']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_06'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_06'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_07']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_07'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_07'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_08']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_08'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_08'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_09']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_09'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_09'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_10']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_10'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_10'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_11']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_11'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_11'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-4 ">
            <div class="row">
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_12']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_12'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_12'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_13']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_13'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_13'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_14']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_14'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_14'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_15']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_15'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_15'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_16']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_16'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_16'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_17']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_17'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_17'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_18']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_18'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_18'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_19']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_19'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_19'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_20']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_20'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_20'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_21']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_21'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_21'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_22']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_22'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_22'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-1 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['dhis_24']); ?>">
                <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['dhis_24'] == '1')?'Yes':(($CompareRowDetail[$index]['dhis_24'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <div class="row">
              <div class="col-xs-6 bg3 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['lqas_forms']); ?>">
                 <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['lqas_forms'] == '1')?'Yes':(($CompareRowDetail[$index]['lqas_forms'] == '2')?'NA':'No'); ?></p>
              </div>
              <div class="col-xs-6 text-center <?php echo get_gpnr_class($CompareRowDetail[$index]['cmrr']); ?>">
                 <p>
                <?php echo (isset($CompareRowDetail) && $CompareRowDetail[$index]['cmrr'] == '1')?'Yes':(($CompareRowDetail[$index]['cmrr'] == '2')?'NA':'No'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <br>
		<?php } ?>
      </div><!--end of row lightbg2-->     
      </div><!--end of alignmentview-->
      
        <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
          <div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
            <a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
          </div>
        </div>         
        
      </form>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
</div><!--end of container-->
<?php $this->load->view("templates/footer"); ?>
<?php $this->load->view("templates/scripts"); ?>
</body>
</html>