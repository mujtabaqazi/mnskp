<?php 

$basePath = base_url();
$assetsPath = base_url()."assets/";
?>

<!doctype html>

<html>

	<head>

	  <meta charset="utf-8">

	  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	  <title>HCPM || Form</title>

	  <?php $this->load->view("templates/styles"); ?>

	</head>

	<body>

		<!--start of header-->

		<?php $this->load->view("templates/header"); ?>

		<?php $this->load->view("templates/menu"); ?>

		<!--End of header-->

		<div class="container">
   			<div class="panel panel-primary">
  				 <div class="panel-heading text-center">Visit Report/ Checklist of Monitoring Officers</div>
  					 <div class="panel-body">
	   					<?php 

						echo validation_errors(); 
				
						$action = $basePath."hcp/forms/save_monitoring";
				
						$action .= "/".$id;
				
						$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				
						echo form_open_multipart($action,$attributes); ?>
						<div class="rowlightbg"> 
      <form class="form-horizontal">
        <div class="row">
          <div class="col-xs-3 pt7">
            <label>Name of the institution:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="facode" id="facode" value="<?php echo isset($DataRow)?$DataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               

			<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
          </div>
          <div class="col-xs-3 pt7">
            <label>Visiting date/month/year:</label>
          </div>
          <div class="col-xs-3">
            <input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->dov)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >               
			
			<!--<label class="pt7 pb2"><?php //echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->dov)):''; ?></label>-->
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 pt7">
            <label>Reporting officer:</label>
          </div>
          <div class="col-xs-3">
           <input value="<?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
		   <label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->$var:''; ?></label>
          </div>
          <div class="col-xs-3 pt7">
            <label>Designation:</label>
          </div>
          <div class="col-xs-3">
            <input value="<?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
			<label class="pt7 pb2"><?php echo isset($DataRow)?$DataRow->$var:''; ?></label>
          </div>
        </div>
        <div class="row">
        	<div class="col-xs-3 pt7">
            <label>Province:</label>
          </div>
          <div class="col-xs-3">
            <label class="pt7 pb2">Khyber Pakhtunkhwa</label>
          </div>
        	<div class="col-xs-3 pt7">
            <label>District:</label>
          </div>
          <div class="col-xs-3">
            <input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->distcode:''; ?>" >
			<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
          </div>
        </div>
        <div class="row">
        	<div class="col-xs-3 pt7">
            <label>Date of sentinel site started:</label>
          </div>
          <div class="col-xs-3">
            <input value="<?php $var ='date_sentinel'; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
          </div>
          <div class="col-xs-3 pt7">
            <label>Reporting month:</label>
          </div>
          <div class="col-xs-3">
            <input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->fmonth:''; ?>" readonly="readonly" >
          </div>
        </div>
        
        <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl" style="padding-bottom: 1px;">
            <label></label>
          </div>
        <div class="row pt10">
          <div class="col-xs-12"><label>1-Monthly sentinel site report submitted by medical officer</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-1">
            <label>Regular</label>&nbsp;<input <?php $var ='regular'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-2  ">
            <label>Irregular</label>&nbsp;<input id="regval" <?php $var ='regular'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
          <div class="col-xs-3" id="show">
            <label>Timely Submitted&nbsp;&nbsp;
            	Yes</label>&nbsp;<input <?php $var ='timely_subm'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio"><label>&nbsp;&nbsp;
            	No</label>&nbsp;<input <?php $var ='timely_subm'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
         </div>
        <div class="row">
          <div class="col-xs-3 pt7 text-right">
            <label>Name of Focal Person:</label>
          </div>
          <div class="col-xs-3">
            <input class="form-control" value="<?php $var ="focal_person_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-3 pt7">
            <label>Name of M.O of Sentinel Site:</label>
          </div>
          <div class="col-xs-3">
            <input class="form-control" id="" value="<?php $var ="name_mo_ss"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label>2-  Staff position at sentinel site:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 pt7 text-right">
            <label>M.O</label>
          </div>
          <div class="col-xs-1">
            <input class="form-control" id="" value="<?php $var ="stt_posstion_mo"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 pt7 text-right" style="padding-left:0px;padding-right:0px;">
            <label>Staff Nurse </label>
          </div>
          <div class="col-xs-1">
            <input class="form-control" id="" value="<?php $var ="stt_posstion_sn"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 pt7 text-right">
            <label>Data Processor</label>
          </div>
          <div class="col-xs-1">
            <input class="form-control" id="" value="<?php $var ="stt_posstion_dp"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 pt7 text-right">
            <label>Attendant</label>
          </div>
          <div class="col-xs-1">
            <input class="form-control" id="" value="<?php $var ="stt_posstion_att"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 pt7 text-right">
            <label>Lab Technician</label>
          </div>
          <div class="col-xs-1">
            <input class="form-control" id="" value="<?php $var ="stt_posstion_lt"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row mt5">
          <div class="col-xs-5 pt7">
            <label>3- Regularity of staff (Give details in case any absent staff):</label>
          </div>
         
          <div class="col-xs-7">
            <input class="form-control" id="" value="<?php $var ="regularity_stt"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label>4- Patients register maintained properly:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-1 pt7">
            <label>1)  If  Yes:</label>&nbsp;&nbsp;<input <?php $var ='patient_yes'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
          <div class="col-xs-3">
            <input class="form-control" placeholder="Since when" id="" value="<?php $var ="patient_reg_yes"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-1 pt7">
            <label>2) If  No: Reasons:</label>&nbsp;&nbsp;<input <?php $var ='patient_yes'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-2 pt7">
            <label>a) Over work&nbsp;&nbsp;</label><input <?php $var ='patient_reg_no'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-2 pt7">
            <label>b) Lack of training&nbsp;&nbsp;</label><input <?php $var ='patient_reg_no'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
          <div class="col-xs-1 pt7 text-right">
            <label>Other&nbsp;&nbsp;</label><input <?php $var ='patient_reg_no'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt10" type="radio">
          </div>
          <div class="col-xs-2">
            <input class="form-control" id="" value="<?php $var ="patient_reg_no_other"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label>5- Vaccination register maintained properly:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 col-xs-offset-1">
            <label>Yes</label>&nbsp;<input <?php $var ='vacc_register'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
          <div class="col-xs-2">
            <label>No</label>&nbsp;<input <?php $var ='vacc_register'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label>6- Stock register maintained properly:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-1 col-xs-offset-1 pt7">
            <label>Yes</label>&nbsp;<input <?php $var ='stk_register'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
          <div class="col-xs-2 pt7">
            <label>No</label>&nbsp;<input <?php $var ='stk_register'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-3 pt7">
            <label>If no, please mention last entry date</label>
          </div>
          <div class="col-xs-2">
            <input value="<?php $var ='stk_register_no'; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 pt7">
            <label>7- Average number of patients attending hepatitis clinic daily (Monthly OPD/30 days):</label>
          </div>
          <div class="col-xs-2 col-xs-offset-1">
            <input class="form-control numberclass noDots" id="" value="<?php $var ="avg_patient_monthly"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
         
          
         
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>8- Status of patients attended at hepatitis clinic since program started:</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-6 text-center">
          </div>
          <div class="col-xs-2 brl text-center">
            <label>HEPATITIS (C)</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>HEPATITIS (B)</label>
          </div>
          <div class="col-xs-2 bl text-center">
            <label>HEPATITIS (D)</label>
          </div>
        </div>
        <?php 

						$labels = array(

							'Total number of Patients attended Hepatitis OPD',

							'Total patients registered at sentinel site',

							'Number of patients receiving treatment (under treatment)',

							'Number of patients completed treatment',

							'Number of patients defaulter',

							'Number of patients non-responder'
						);

						for($i=1; $i<=count($labels); $i++){ ?>
        <div class="row">
          <div class="col-xs-6 pt7">
            <label><?php echo $labels[$i-1]; ?></label>
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ='sp_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ='sp_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ='sp_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
          </div>
        </div>
        <?php 
			}?>
                
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>9-Status of screening of persons/registered patients of Hepatitis (B, C, D) in last month :( Mention month)</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center"></div>
          <div class="col-xs-3 brl text-center">
            <label>HEPATITIS (C)</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>HEPATITIS (B)</label>
          </div>
          <div class="col-xs-3 bl text-center">
            <label>HEPATITIS (D)</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-8 text-right">
                <label>Total patients screened registered  / positive at sentinel site in last month</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="tot_patient"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text" style="height: 76px;">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7 text-right">
                <label>Month</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control" id="" value="<?php $var ="sc_last_month"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Screened on ICT+ Elisa</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_elisa_c"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on ICT:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_postive_ict_c"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on ELISA:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_postive_elisa_c"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on PCR:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_positvie_pcr_c"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Screened on ICT+ Elisa</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_elisa_b"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on ICT:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_postive_ict_b"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on ELISA:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_postive_elisa_b"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on PCR:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_positvie_pcr_b"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-3">
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Screened on ICT+ Elisa</label>
              </div>
              <div class="col-xs-4 zp">
               <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_elisa_d"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on ICT:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_postive_ict_d"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on ELISA:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_postive_elisa_d"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-8 pt7">
                <label>Positive on PCR:</label>
              </div>
              <div class="col-xs-4 zp">
                <input class="form-control numberclass noDots" id="" value="<?php $var ="sc_positvie_pcr_d"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
              </div>
            </div>
          </div>
        </div>
        <?php 

						$labels = array(

							'No. of patients receiving treatment',
							
							'No. of patients completed treatment',
							
							'No. of patients defaulter',
							
							'No. of patients non responder'

						);

						for($i=1; $i<=count($labels); $i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <label><?php echo $labels[$i-1]; ?></label>
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='sc_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='sc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-3 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='sc_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <?php } ?>
        <br>
        <div class="row">
          <div class="col-xs-3 pt7">
            <label>10- Any additional comments: </label>
          </div>
          <div class="col-xs-9 zp">
            <input class="form-control" id="" value="<?php $var ="any_add_comments"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row mt5">
          <div class="col-xs-12">
            <label>11-Status of record keeping:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-1">
            <label>Good&nbsp;&nbsp;</label>
            <input <?php $var ='status_record'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-2">
            <label>Satisfactory&nbsp;&nbsp;</label>
            <input <?php $var ='status_record'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
          <div class="col-xs-2">
            <label>Not satisfactory&nbsp;&nbsp;</label>
            <input <?php $var ='status_record'; echo isset($DataRow)?(($DataRow->$var=="2")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="2" class="mt10" type="radio">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label>12-Storage and supply of medicines:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 col-xs-offset-1">
            <label>Through sentinel site staff&nbsp;&nbsp;</label>
            <input <?php $var ='ss_medcines'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-4">
            <label>Through main store of hospital/EDOH store&nbsp;&nbsp;</label>
            <input <?php $var ='ss_medcines'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <label>13-Status of cold chain:</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4 col-xs-offset-1">
            <label>Proper temperature (+2_+8)&nbsp;&nbsp;&nbsp;&nbsp;
            Yes</label>
            <input <?php $var ='scc_proper_tem'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">&nbsp;&nbsp;
            <label>No</label>
            <input <?php $var ='scc_proper_tem'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
          <div class="col-xs-4">
            <label>Thermometer available&nbsp;&nbsp;&nbsp;&nbsp;
            Yes</label>
            <input <?php $var ='scc_proper_thermo'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt10" type="radio">&nbsp;&nbsp;
            <label>No</label>
            <input <?php $var ='scc_proper_thermo'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt10" type="radio">
          </div>
        </div>
         
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>14-Hepatitis-B vaccination (last month):</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-4 text-center">
          </div>
          <div class="col-xs-2 brl text-center">
            <label>No. of people screened</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>No. of people vaccinated</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>HCV +ve</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>HBV +ve</label>
          </div>
        </div>
        <?php 

						$labels = array(

							'Vaccination at sentinel site',
							
							'Vaccination at EDO (H)',
							
							'Vaccination in camps (high prevalence areas)',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'input',
							
							'Vaccination in jails ( Since the program started)',
							
							'input',
							
							'input'

						);
		$index=1;
		for($i=1; $i<=count($labels); $i++){ ?>
        
        <div class="row">
          <div class="col-xs-4 mt7"><?php if($labels[$i-1]!="input") { ?>
          	
          	<label><?php echo $labels[$i-1];?></label>
          
        	 <?php }else{
        	 	$var ='hepb_vacc_r'.$index.'_name'; 
             	echo '<input value="'.(isset($DataRow)?$DataRow->$var:"").'" name="'.$var.'" class="form-control" placeholder="camp '.($index-2).':" type="text">'; 
             }?>
          </div>
          <?php if($i==3 || $i==14){}else{ ?>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" value="<?php $var ='hepb_vacc_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" value="<?php $var ='hepb_vacc_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" value="<?php $var ='hepb_vacc_r'.$index.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" value="<?php $var ='hepb_vacc_r'.$index.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <?php $index++;} ?>
        </div>
        <?php } ?>
        
        <br>
        <div class="row">
          <div class="col-xs-4 mt7">
            <label>15-Any other social mobilization activity:</label>
          </div>
          <div class="col-xs-4 zp">
            <input class="form-control" id="" value="<?php $var ="social_mob_activity"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-4 mt7">
            <label>16-No. of Immunoglobulin used during last month:</label>
          </div>
          <div class="col-xs-4 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ="no_immuno"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <div class="row mt2">
          <div class="col-xs-5 mt7">
            <label>17-Laboratory services provided at sentinel site (Please tick):</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-1">
            <label>ICT&nbsp;&nbsp;</label>
            <input <?php $var ='lab_services_ict'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" type="checkbox">
          </div>
          <div class="col-xs-2">
            <label>Elisa&nbsp;&nbsp;</label>
            <input <?php $var ='lab_services_elisa'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" type="checkbox">
          </div>
          <div class="col-xs-2">
            <label>PCR&nbsp;&nbsp;</label>
            <input <?php $var ='lab_services_ict_pcr'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):'';?> name="<?php echo $var; ?>" value="1" type="checkbox">
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>18-Status of equipment/printing material as on visited date</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-4 text-center">
            <label>Name of equipment/printing material</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Working properly</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Faulty</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Describe  fault</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Remarks</label>
          </div>
        </div>
        <?php $labelArray=array(
			'1' => 'Cold chain refrigerator',
			'2' => 'Computer',
			'3' => 'Printer'
		); 
		foreach($labelArray as $key => $val){
		?>
        <div class="row">
          <div class="col-xs-4 pt7">
            <label><?php echo $val; ?></label>
          </div>
          <div class="col-xs-2  pt7 text-center">
            <input <?php $var="epm_r".$key."_f1"; ?> name="<?php echo $var; ?>" value="1" <?php echo (isset($DataRow) && $DataRow->$var == '1')?'checked="checked"':''; ?> type="radio">
          </div>
          <div class="col-xs-2 pt7 text-center">
            <input <?php $var="epm_r".$key."_f1"; ?> name="<?php echo $var; ?>" value="0" <?php echo (isset($DataRow) && $DataRow->$var == '0')?'checked="checked"':''; ?> type="radio">
          </div>
          <div class="col-xs-2 zp">
            <input <?php $var="epm_r".$key."_f3"; ?> name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" class="form-control" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input <?php $var="epm_r".$key."_f4"; ?> name="<?php echo $var; ?>" value="<?php echo (isset($DataRow))?$DataRow->$var:''; ?>" class="form-control" type="text">
          </div>
        </div>
        <?php } ?>
        
        <div class="row bc">
          <div class="col-xs-4 text-center">
            <label>Name</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Last balance</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Received</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Total</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Remarks</label>
          </div>
        </div>
        <?php 

						$labels = array(

							'Stock register',
							
							'Vaccine register',
							
							'OPD/treatment register',
							
							'Vaccination cards',
							
							'Social mobilization material',
							
							'others'

						);

						for($i=1; $i<=count($labels); $i++){ ?>
         <div class="row">
          <div class="col-xs-4 pt7">
          	<?php if($labels[$i-1]!="others") {?>
            <label><?php echo $labels[$i-1]; ?></label>
            <?php } else{
            	$var ='epm_other'; 
             	echo '<input value="'.(isset($DataRow)?$DataRow->$var:"").'" name="'.$var.'" class="form-control" placeholder="Others" type="text">';
				
            	} ?>
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='epm2_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='epm2_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='epm2_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control " id="" value="<?php $var ='epm2_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <?php } ?>
        
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>20-Stock position at sentinel site at (End of  last month)</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-2 text-center">
            <label class="pt10">Name of medicine</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Previous balance</label>
          </div>
          <div class="col-xs-1 text-center">
            <label class="pt10">Received</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Total Balance</label>
          </div>
          <div class="col-xs-1 text-center">
            <label class="pt10">Utilized</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label class="pt10 pb10">Expired</label>
          </div>
          <div class="col-xs-1 text-center">
            <label class="pt10">Damaged</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Current balance</label>
          </div>
          <div class="col-xs-1 text-center">
            <label>Expiry date</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label class="pt10 pb10">Demand</label>
          </div>
          <div class="col-xs-1 text-center">
            <label>Days out of stock </label>
          </div>
        </div>
        <?php 

						$labels = array(

							'Inj. Interferon',
							
							'TAB. Adefovir',
							
							'TAB. Entacavir',
							
							'TAB. Tenovefor',
							
							'TAB. Lamividine',
							
							'Cap. Ribavarin',
							
							'Vaccine 0.5 ml',
							
							'Vaccine 1 ml',
							
							'Immunoglobulin 0.5 ml',
							
							'Immunoglobulin 1.0 ml',
							
							'ICT KITS HEP B',
							
							'ICT KITS HEP C',
							
							'Elisa Kits B',
							
							'Elisa Kits C',
							
							'Elisa Kits D',
							
							'Auto destructable syringes 2 ml',
							
							'Auto destructable syringes 0.5 ml',
							
							'others'
							
						);

						for($i=1; $i<=count($labels); $i++){ ?>
        <div class="row">
          <div class="col-xs-2 pt7">
            <?php if($labels[$i-1]!="others") {?>
            <label><?php echo $labels[$i-1]; ?></label>
            <?php } else{
            	$var ='stkp_ohter'; 
             	echo '<input value="'.(isset($DataRow)?$DataRow->$var:"").'" name="'.$var.'" class="form-control" placeholder="Any Others" type="text">';
				
            	} ?>
          </div>
          <div class="col-xs-1 zp">
			      <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input value="<?php $var ='stkp_r'.$i.'_f8'; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
            <!-- <input class="dp form-control" id="" value="<?php $var ='stkp_r'.$i.'_f8'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text"> -->
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f9'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='stkp_r'.$i.'_f10'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <?php } ?>
       
        <div class="row mt5">
          <div class="col-xs-12">
            <label>21-Hepatitis patients database</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-1 pt7">
            <label>Patients database updated</label>
          </div>
          <div class="col-xs-1 pt7">
            <label>Yes</label>&nbsp;<input <?php $var ='patient_db_update'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" type="radio">
          </div>
          <div class="col-xs-2 pt7">
            <label>No</label>&nbsp;<input <?php $var ='patient_db_update'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" type="radio">
          </div>
          <div id="show_reson">
          <div class="col-xs-2 pt7">
            <label>if No, then reasons</label>
          </div>
          <div class="col-xs-4 zp">
            <input class="form-control" id="empty_reson" value="<?php $var ="no_reason"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>22-Category sex & age wise data of patients</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center"></div>
          <div class="col-xs-3 brl text-center">
            <label>Hepatitis-C</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>Hepatitis-B</label>
          </div>
          <div class="col-xs-3 bl text-center">
            <label>Hepatitis-D</label>
          </div>
        </div>
        <div class="row bc mt1">
          <div class="col-xs-3 text-center">
            <label>Years</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Male</label>
          </div>
          <div class="col-xs-1 text-center">
            <label>Female</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Total</label>
          </div>
          <div class="col-xs-1 text-center">
            <label>Male</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Female</label>
          </div>
          <div class="col-xs-1 text-center">
            <label>Total</label>
          </div>
          <div class="col-xs-1 brl text-center">
            <label>Male</label>
          </div>
          <div class="col-xs-1 text-center">
            <label>Female</label>
          </div>
          <div class="col-xs-1 bl text-center">
            <label>Total</label>
          </div>
        </div>
        <?php 

						$labels = array(

							'12-20 ',
							
							'21-30',
							
							'31-40',
							
							'41-50',
							
							'51-60',
							
							'Total'

						);

						for($i=1; $i<=count($labels); $i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7 text-center">
            <label><?php echo $labels[$i-1]; ?></label>
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f7'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f8'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='categ_sex_age_r'.$i.'_f9'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <?php } ?> 
        
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>23-Inventory stock position of sentinel site since (cmi) program started</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
            <label>Name of medicine</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Received</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Used</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Balance</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Expired</label>
          </div>
          <div class="col-xs-1 bl text-center">
            <label>Remarks</label>
          </div>
        </div>
        <?php 

						$labels = array(

							'Inj. Interferon',
							
							'Inj. Pegasys',
							
							'TAB. Adevofer',
							
							'TAB. Entacavir',
							
							'TAB. Tenovefor',
							
							'TAB. Lamividine',
							
							'Vaccine 0.5 ml',
							
							'Vaccine 1 ml',
							
							'Immunoglobulin 0.5 ml',
							
							'Immunoglobulin 1.0 ml',
							
							'ICT KITS HEP B:',
							
							'ICT KITS HEP C:',
							
							'ICT KITS HEP D:',
							
							'Elisa Kits B',
							
							'Elisa Kits C',
							
							'Elisa Kits D',
							
							'Auto destructible syringes 0.5 ml',
							
							'Auto destructible syringes 0.5 ml',
							
							'others'
							
							);

						for($i=1; $i<=count($labels); $i++){ ?>
        <div class="row">
          <div class="col-xs-3 pt7">
            <?php if($labels[$i-1]!="others") {?>
            <label><?php echo $labels[$i-1]; ?></label>
            <?php } else{
            	$var ='invent_stk_other'; 
             	echo '<input value="'.(isset($DataRow)?$DataRow->$var:"").'" name="'.$var.'" class="form-control" placeholder="Any Others" type="text">';
				
            	} ?>
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='invent_stk_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='invent_stk_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input class="form-control numberclass noDots" id="" value="<?php $var ='invent_stk_r'.$i.'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ='invent_stk_r'.$i.'_f4'; echo (isset($DataRow) && $DataRow->$var !== NULL)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
            <!-- <input class="dp form-control" id="" value="<?php $var ='invent_stk_r'.$i.'_f4'; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text"> -->
          </div>
          <div class="col-xs-1 zp">
            <input class="form-control" id="" value="<?php $var ='invent_stk_r'.$i.'_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
          </div>
        </div>
        <?php } ?>
        
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-10 col-xs-offset-1 cmargin27 bgcolcl">
            <label>24-Requirements/Issues if any: </label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <table class="table   table-bordered">
            <tbody>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Requirements
              </td>
              <td>
                <input placeholder="Requirements" value="<?php $var ="requirements"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 68px;" type="text">
              </td>               
            </tr>
            <tr>
              <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;padding-top: 32px;">Issues
              </td>
              <td>
                <input placeholder="Issues" value="<?php $var ="issues"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" style="border: 0px none;width: 100%;height: 68px;" type="text">
              </td>               
            </tr>
             
          </tbody>
        </table>
          </div>
        </div>
        <div class="row pt1 pb1">
           <div class="col-xs-10 col-xs-offset-1 bgcolcl">
            <label>25-Comments of monitoring officer:   </label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <textarea id="" <?php $var ="comments"; ?> name="<?php echo $var; ?>" rows="5" class="form-control" placeholder=""><?php echo isset($DataRow)?$DataRow->$var:''; ?></textarea>
          </div>
        </div>
        <div class="row">

            <div style="margin-left: 67.5%;padding-top: 5px;padding-bottom: 5px;" class="col-md-4 col-sm-4 col-xs-4 btnsubmits">

                <button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md" role="button">

					<i class="fa fa-file"></i> Save Form  

				</button>

				<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md" role="button">

					<i class="fa fa-floppy-o"></i> Submit Form  

				</button>

                <a class="btn btn-primary btn-md" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>

            </div>

        </div>
         


        
      <?php echo form_close(); ?>
    </div>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
 
</div><!--end of container-->

		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
    <?php $this->load->view("templates/chklsts_scripts"); ?>


		<script>
		$("form").submit(function () {
		
						var this_master = $(this);
						this_master.find('input[type="checkbox"]').each( function () {
							var checkbox_this = $(this);
							if( checkbox_this.is(":checked") == true ) {
								checkbox_this.attr('value','1');
		
							} else {
								checkbox_this.prop('checked',true);
								//DONT' ITS JUST CHECK THE CHECKBOX TO SUBMIT FORM DATA    
								checkbox_this.attr('value','0');
							}
		
						});
		
					});
		$(document).ready(function(){
			var val = '<?php echo $DataRow->regular; ?>';
				if(val=="0"){
					$('#show').show();
				}else{
					$('#show').hide();
				}
		$('input[name=regular]').change(function(){
			var value = $( this ).val();
			    if(value=="0"){
			    	 $('#show').show();
			    }else{
			    	$('#show').hide();
			    	$("input[name=timely_subm]:radio").removeAttr("checked");
			    }
		 });
		 
		 $('input[name=patient_db_update]').change(function(){
			var value = $( this ).val();
			    if(value=="1"){
			    	 $('#show_reson').show();
			    }else{
			    	$('#show_reson').hide();
			    	$('#empty_reson').val('');
			    }
		 });
		});
		
		</script>
	</body>
</html>