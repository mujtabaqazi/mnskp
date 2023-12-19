<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LHW || Form</title>
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
   <div class="panel-heading text-center">Health House & Lady Health Worker</div>
   <div class="panel-body pbody">
		<?php 
		echo validation_errors();
		$action = $basePath."lhw/save";
		$action .= "/".$id;
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		echo form_open_multipart($action,$attributes); ?>
    <div class="rowlightbg">         
		<div class="row">
			<div class="col-xs-2 mt7">
				<label>Name of the Supervisor</label>
			</div>
			<div class="col-xs-2">
				<input value="<?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
			</div>
			<div class="col-xs-2 mt7">
				<label>Designation</label>
			</div>
			<div class="col-xs-2">
				<input value="<?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
			</div>
			<div class="col-xs-2 mt7">
				<label>Reporting month</label>
			</div>
			<div class="col-xs-2">
				<input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->fmonth:''; ?>" readonly="readonly" >
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2 mt7">
				<label>Name of LHW</label>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="lhwcode" id="lhwcode" value="<?php echo isset($DataRow)?$DataRow->lhwcode:''; ?>" required="required" class="form-control"  readonly="readonly" >               
				<label class="pt7 pb2"><?php echo isset($DataRow)?get_LHW_Name($DataRow->lhwcode):''; ?></label>
			</div>
			<div class="col-xs-2 mt7">
				<label>Years of Service</label>
			</div>
			<div class="col-xs-2">
				<input type="text" name="service_years" id="service_years" value="<?php echo isset($DataRow)?$DataRow->service_years:'1'; ?>" class="form-control numberclass noDots">
			</div>
			<div class="col-xs-2 mt7">
				<label>Registered Population</label>
			</div>
			<div class="col-xs-2">
			<input value="<?php $var ="population"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2 mt7">
				<label>District</label>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($DataRow)?$DataRow->distcode:''; ?>" >
				<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
			</div>
			<div class="col-xs-2 mt7">
				<label>Health Facility to which attached</label>
			</div>
			<div class="col-xs-2">
				<input type="hidden" name="facode" id="facode" value="<?php echo isset($DataRow)?$DataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               
				<label class="pt7 pb2"><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></label>
			</div>
			<div class="col-xs-2 mt7">
				 <label>Date of visit</label>
			</div>
			<div class="col-xs-2">
				<input value="<?php $var ="dov"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" class="form-control dp1" type="text">
			</div>
		</div>
					<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<input class="form-control" id="remarks" name="remarks" type="text" value="<?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?>" >
							</div>

					</div>
        <div class="row bc">
			<div class="col-xs-1 text-center br"><label>#</label></div>
			<div class="col-xs-6 text-center"></div>
			<div class="col-xs-2 brl text-center">
				<label>Status</label>
			</div>
			<div class="col-xs-3 text-center">
				<label>Remarks</label>
			</div>
        </div>
        <?php 
			$labels = array(
				'Fulfills Selection Criteria (If not, specify reason)',
				'Health House established as per given guidelines',
				'Satisfactory knowledge of LHW (Use annex C-I)',
				'Satisfactory skills of LHW (Use annex C-I)',
				'Stipend received for the last month',
				'Supplies such as medicines and contraceptives are available (If not, for how long?)',
				'Correct maintenance of LHW-MIS instruments',
				'Daily entries made in monthly report',
				'Last monthly report submitted',
				'Referrals being entertained by FLCF (Check no. from record)',
				'Diary available and maintained correctly',
				'Health Committee constituted/functional (Comment on contribution of HC)',
				'Women Group constituted/functional (Comment on contribution of WG)',
				'Properly uses Counseling cards for IPC',
				'Regular visits by the vaccinator',
				'Date of next visit of LHS known',
				'Visits by anyone else during last one year',
				'EPI coverage (From LHW diary)',
				'% of modern contraceptive users (From LHW diary)',
				'% of deliveries conducted by SBAs during last six months.',
				'% of delivery cases visited by LHW during delivery or within 24 hours after delivery in last month.(From LHW diary and checklist of newborn)',
				'Involved in administering routine EPI vaccines.',
				'Involved in TB-DOTS'
			);
			for($i=1; $i<=count($labels); $i++){ ?>
				<div class="row">
					<div class="col-xs-1 text-center mt7">
						<label><?php echo $i; ?></label>
					</div>
					<div class="col-xs-6 mt7">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-2 <?php if($i==19 || $i == 20 || $i == 21){echo 'zp';} ?>">						
						<?php if($i==19 || $i == 20 || $i == 21){?>
							<input value="<?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" placeholder="Number" type="text">
							<?php
						} else{ ?>
							<div class="row">
								<div class="col-xs-6 text-right">
									<label>Yes</label>&nbsp;
									<input <?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
								</div>
								<div class="col-xs-6">
									<label>No</label>&nbsp;
									<input <?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="col-xs-3 zp">
						<input value="<?php $var ='sr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
					</div>
					<!--<div class="col-xs-4 zp">
						<input value="<?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>-->
				</div><?php 
			} 
		?>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Discussion with LHWs</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
            <label>Name of LHW</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label>Issues discussed</label>
          </div>
          <div class="col-xs-3 br text-center">
            <label>Action for FLCF/Supervisor</label>
          </div>
          <div class="col-xs-3 text-center">
            <label>Action for FPO/DPIU/PPIU</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 zp">
            <input readonly="true" style="height: 170px;" value="<?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?>" class="form-control" type="text">
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="1" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="2" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="3" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="4" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="5" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
          </div>
          <div class="col-xs-3 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-xs-12 cmargin27 bgcolcl text-center">
            <label>Critical issues identified to be followed by LHS</label>
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
          <div class="col-xs-2 cmargin27 text-center">
            <label>1</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="" type="text">
          </div>
        </div>
      </div><!--end of rowlightbg--> 
		<br> 
		<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
            <div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
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