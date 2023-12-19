<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DPIU || Form</title>
  <?php $this->load->view("templates/styles"); ?>
</head>
<body>
  <!--start of header-->
  <?php $this->load->view("templates/header"); ?>
  <?php $this->load->view("templates/menu"); ?>
  <!--End of header-->


<div class="container">
   <div class="panel panel-primary">
   <div class="panel-heading text-center"> District Program Implementation Unit (DPIU) - Form
   </div>
   <div class="panel-body pbody">
      <?php 
		echo validation_errors();
		$action = $basePath."lhw/dpiu/save";
		$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
		$hidden = array('vpvc_id' => $vpvc_id);
		echo form_open_multipart($action,$attributes,$hidden); ?>
      <div class="rowlightbg"> 
      <div class="row">
			<div class="col-xs-3 cmargin27">
				<label>Name of the Supervisor</label>
			</div>
			<div class="col-xs-3">
				<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
			</div>
			<div class="col-xs-3 cmargin27">
				<label>Designation of the Supervisor</label>
			</div>
			<div class="col-xs-3">
				<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
			</div>
        </div>
		<div class="row">
			<div class="col-xs-3 cmargin27">
				<label>District</label>
			</div>
			<div class="col-xs-3">
				<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >
				<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->district:''; ?></label>
			</div>
			<div class="col-xs-3 cmargin27">
				<label>Date of visit to district in the province</label>
			</div>
			<div class="col-xs-3">
				<input value="<?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" <?php $var ="dov"; ?> name="<?php echo $var; ?>" id="<?php echo $var; ?>" class="dp1 form-control text-center" type="text">
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
		<div class="row">
			<div class="col-xs-3">
				<label class="pt7 pb2">Reporting month</label>
			</div>
			<div class="col-xs-3">
				<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" required="required" class="form-control" readonly="readonly" type="text" >
			</div>
			<div class="col-xs-3 cmargin27">
				<label>Name of FLCF</label>
			</div>
			<div class="col-xs-3">
				<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >								
				<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
			</div>
		</div>
        <div class="row">
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>1) FUNCTIONING OF DPIU</label>
                  </div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 1.1  Planning/Establishment</label>
          </div>
        </div>
         <div class="row bc mb1">
            <div class="col-xs-4">
              <label>Indicator</label>
            </div>
            <div class="col-xs-1 brl text-center">
              <label>Yes</label>
            </div>
            <div class="col-xs-1 br text-center">
              <label>No</label>
            </div>
            <div class="col-xs-6 zp text-center">
              <label>Remarks(Briefly record relevant observations/inputs and functional status of equipment)</label>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label>Annual District Plan of Action available for current year</label>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
              <input <?php $var ="fun_r1_f1"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" type="radio">
            </div>
            <div class="col-xs-1 cmargin27 text-center">
              <input <?php $var ="fun_r1_f1"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" type="radio">
			</div>
            <div class="col-xs-6 zp">
				<input value="<?php $var ="fun_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label>Management support available</label>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
              
            </div>
            <div class="col-xs-1 cmargin27 text-center">
              
            </div>
            <div class="col-xs-6 zp">
              
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label class="padding10">Office furniture</label>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<input <?php $var ="fun_r2_f1"; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" type="radio">
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<input <?php $var ="fun_r2_f1"; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" type="radio">
            </div>
            <div class="col-xs-6 zp">
				<input value="<?php $var ="fun_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label class="padding10">Office Equipment</label>
            </div>
            <div class="col-xs-1 cmargin27">
               
            </div>
            <div class="col-xs-1 cmargin27">
               
            </div>
            <div class="col-xs-6 zp">
               
            </div>
          </div>
		  <?php
			$labels = array('Telephone','Fax','Computer','Printer','Internet','Any Other');
			for($i=1;($i-1)< count($labels);$i++)
			{?>
				<div class="row">
					<div class="col-xs-4 cmargin27">
						<label class="padding20"><?php echo $i.'. '.$labels[($i-1)]; ?></label>
					</div>
					<div class="col-xs-1 cmargin27 text-center">
						<input <?php $var ='fun_r'.($i+2).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" type="radio">
					</div>
					<div class="col-xs-1 cmargin27 text-center">
						<input <?php $var ='fun_r'.($i+2).'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" type="radio">
					</div>
					<div class="col-xs-6 zp">
						<input value="<?php $var ='fun_r'.($i+2).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php
			}
		  ?>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label>Staff Composition of DPIU as per policy</label>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<input <?php $var ='fun_r9_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" type="radio">
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<input <?php $var ='fun_r9_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" type="radio">
            </div>
            <div class="col-xs-6 zp">
				<input value="<?php $var ='fun_r9_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label>Name Unfilled positions</label>
            </div>
            <div class="col-xs-6 col-xs-offset-2 zp">
				<input value="<?php $var ='fun_r10_f1'; echo '1'; ?>" name="<?php echo $var; ?>" class="form-control" type="hidden">
				<input value="<?php $var ='fun_r10_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
          </div>
          <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 1.2 Meetings held during the previous month</label>
          </div>
        </div>        
        <div class="row bc">
          <div class="col-xs-4">
            <label>Type of Meeting (attended by)</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label>Date of meeting</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Specific issues discussed</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label>Minutes available</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Actions taken</label>
          </div>
        </div>
		<?php
			$labels = array(
			'DPIU Monthly Meeting (EDO Health/DOH, DCO, ADCO, Accounts Supervisor)',
			'Maternal Mortality Conference (Lady Health Supervisors monthly meeting)',
			'District/FLCF Trainers',
			'DHMT/DTC with other departments, DPWO, others');
			for($i=1;($i-1)< count($labels);$i++)
			{?>
				<div class="row">
					<div class="col-xs-4 cmargin27">
						<label><?php echo $labels[($i-1)]; ?></label>
					</div>
					<div class="col-xs-2 zp">
						<input value="<?php $var ='mtng_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
					</div>
					<div class="col-xs-2 zp">
						<input value="<?php $var ='mtng_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
					<div class="col-xs-2 zp">
						<div class="row">
							<div class="col-xs-6 text-right">
								<label>Yes</label>&nbsp;
								<input <?php $var ='mtng_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
							<div class="col-xs-6">
								<label>No</label>&nbsp;
								<input <?php $var ='mtng_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
						</div>
					</div>
					<div class="col-xs-2 zp">
						<input value="<?php $var ='mtng_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php
			}
		?>
        <div class="row">
                  <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>2) HUMAN RESOURCES</label>
                  </div>
              </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 2.1 Lady Health Workers</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-1">
            <label class="padding4">Allocated</label>
          </div>
          <div class="col-xs-1 brl">
            <label class="padding4">Recruited</label>
          </div>
          <div class="col-xs-1">
            <label class="padding4">Dropout</label>
          </div>
          <div class="col-xs-1 bl">
            <label class="padding4">Terminated</label>
          </div>
          <div class="col-xs-2 brl">
            <label class="padding5">Presently working <br>(after 3 months training)</label>
          </div>
          <div class="col-xs-2">
            <label class="padding5">Current training status (Mention numbers)</label>
          </div>
          <div class="col-xs-3 brl">
            <div class="row bb">
              <div class="col-xs-12 text-center">
                <label>Current training status <br>(Mention numbers)</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3 zp text-center">
                <label>Months</label>
              </div>
              <div class="col-xs-5 brl zp text-center">
                <label>Under 12 months</label>
              </div>
              <div class="col-xs-4 zp text-center">
                <label>Completed</label>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <label class="padding3">Remarks</label>
          </div>
        </div>

        <div class="row">
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhw_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhw_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhw_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhw_r1_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-2 zp">
				<input value="<?php $var ='lhw_r1_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-2 zp">
				<input value="<?php $var ='lhw_r1_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-3">
				<div class="row">
					<div class="col-xs-3 zp">
						<input value="<?php $var ='lhw_r1_f7'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
					<div class="col-xs-5 zp">
						<input value="<?php $var ='lhw_r1_f8'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
					<div class="col-xs-4 zp">
						<input value="<?php $var ='lhw_r1_f9'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				</div>
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhw_r1_f10'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 2.2 Lady Health Supervisors</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-1">
            <label>Allocated @ 20-25 LHWs</label>
          </div>
          <div class="col-xs-1 brl">
            <label class="padding4">Recruited</label>
          </div>
          <div class="col-xs-1">
            <label class="padding4">Dropout</label>
          </div>
          <div class="col-xs-1 bl">
            <label class="padding4">Terminated</label>
          </div>
          <div class="col-xs-2 brl">
            <label class="padding5">Presently working <br>(after 3 months training)</label>
          </div>
          <div class="col-xs-2">
            <label class="padding5">Current training status (Mention numbers)</label>
          </div>
          <div class="col-xs-3 brl">
            <div class="row bb">
              <div class="col-xs-12 text-center">
                <label>Current training status <br>(Mention numbers)</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-3 zp text-center">
                <label>Months</label>
              </div>
              <div class="col-xs-5 brl zp text-center">
                <label>Under 12 months</label>
              </div>
              <div class="col-xs-4 zp text-center">
                <label>Completed</label>
              </div>
            </div>
          </div>
          <div class="col-xs-1">
            <label class="padding3">Remarks</label>
          </div>
        </div>
		<div class="row">
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhs_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhs_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhs_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhs_r1_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-2 zp">
				<input value="<?php $var ='lhs_r1_f5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-2 zp">
				<input value="<?php $var ='lhs_r1_f6'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-3">
				<div class="row">
					<div class="col-xs-3 zp">
						<input value="<?php $var ='lhs_r1_f7'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
					<div class="col-xs-5 zp">
						<input value="<?php $var ='lhs_r1_f8'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
					<div class="col-xs-4 zp">
						<input value="<?php $var ='lhs_r1_f9'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				</div>
			</div>
			<div class="col-xs-1 zp">
				<input value="<?php $var ='lhs_r1_f10'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 2.3 Drivers</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-2">
            <label>Required</label>
          </div>
          <div class="col-xs-2 brl">
            <label>Currently Working</label>
          </div>
          <div class="col-xs-8">
            <label>Remarks</label>
          </div>
        </div>
        <div class="row">
			<div class="col-xs-2 zp">
				<input value="<?php $var ='drvr_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-2 zp">
				<input value="<?php $var ='drvr_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
			</div>
			<div class="col-xs-8 zp">
				<input value="<?php $var ='drvr_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
            <div class="col-xs-12 cmargin27 bgcolcl text-center">
                    <label>3) FINANCES</label>
                  </div>
              </div>
        <div class="row bc">
          <div class="col-xs-6 text-center">
            <label>Item</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Status</label>
          </div>
          <div class="col-xs-4 text-center">
            <label>Remarks</label>
          </div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Cash Book maintained</label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<input value="<?php $var ='fin_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Monthly SOE prepared & reconciled</label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<input value="<?php $var ='fin_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Amount Received (in Rs.) (For current quarter from PPIH) </label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<input value="<?php $var ='fin_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Payroll submitted by 20th of month</label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r4_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r4_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<input value="<?php $var ='fin_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
         <div class="row">
          <div class="col-xs-6 cmargin27">
            <label>Salary of LHWs/Supervisors/Drivers will be paid until what month and year?</label>
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ='fin_r5_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
		</div>
          <div class="col-xs-4 zp">
            <input value="<?php $var ='fin_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <div class="row">
              <div class="col-xs-6" style="padding-top: 37px;">
                <label>Training allowance paid for last month</label>
              </div>
              <div class="col-xs-6">
                <div class="row">
                  <div class="col-xs-12 cmargin27">
                    <label>FLCF Trainers</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 cmargin27">
                    <label>LHWs refresher training allowance</label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 cmargin27">
                    <label>District Trainers</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xs-2 zp">
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r6_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r6_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r7_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r7_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='fin_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='fin_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ='fin_r6_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				</div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ='fin_r7_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				</div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <input value="<?php $var ='fin_r8_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 cmargin27">
            <label>Amount for POL/Fixed travel allowance to be paid to supervisors until what month and year?</label>
          </div>
          <div class="col-xs-2 zp">
            <input value="<?php $var ='fin_r9_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
			</div>
          <div class="col-xs-4 zp">
            <input value="<?php $var ='fin_r9_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
            <div class="col-xs-12 cmargin27 bgcolcl text-center">
                <label>4) LOGISTICS</label>
            </div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 4.1 Store</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-6 text-center">
             
          </div>
          <div class="col-xs-2 brl text-center">
            <label>Yes / No</label>
          </div>
          <div class="col-xs-4 text-center">
            <label>Remarks</label>
          </div>
        </div>
		<?php 
			$labels = array('Is the storage space large enough to hold needed supplies?',
			'Are storage conditions proper?(Refer to checklist for store maintenance, C-III)',
			'Is the stock register up to date?',
			'Are issue-receipt vouchers up to date?',
			'Are issue-receipt vouchers up to date?',
			'Are bin cards up to date?',
			'Has the Demand & Distribution System been adopted?');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
				  <div class="col-xs-6 cmargin27">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-2 zp">
					<div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='str_r'.($i).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='str_r'.($i).'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
				</div>
				  </div>
				  <div class="col-xs-4 zp">
					<input value="<?php $var ='str_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 4.2 Medicines, Contraceptives and other logistics
            </label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-2 text-center">
             <label class="padding6">Items</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label class="padding6">Available</label>
          </div>
          <div class="col-xs-2 text-center">
            <label class="padding6">Distributed </label>
          </div>
          <div class="col-xs-6 text-center bl">
            <label>Remarks (If item is either not available or not distributed, mention the reasons as well as for how long the item is out of stock in case of non-availability)</label>
          </div>
        </div>
		<?php 
			$labels = array('Medicines','Contraceptives','Printed Material','Non Drug items');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
				  <div class="col-xs-2 cmargin27">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-2 zp">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='mcl_r'.($i).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='mcl_r'.($i).'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
				  </div>
				  <div class="col-xs-2 zp">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='mcl_r'.($i).'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='mcl_r'.($i).'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
				  </div>
				  <div class="col-xs-6 zp">
						<input value="<?php $var ='mcl_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 4.3  Vehicles
            </label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-2 text-center">
             <label class="padding6">Levels</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label class="padding6">No. Received</label>
          </div>
          <div class="col-xs-2 text-center">
            <label class="padding6">No. Available</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label class="padding6">No. Functional</label>
          </div>
          <div class="col-xs-4 text-center">
            <label class="padding6">Remarks</label>
          </div>
        </div>
		<?php 
			$labels = array('DPIU','Supervisors');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
				  <div class="col-xs-2 cmargin27">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-2 zp">
						<input value="<?php $var ='v_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				  <div class="col-xs-2 zp">
						<input value="<?php $var ='v_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				  <div class="col-xs-2 zp">
						<input value="<?php $var ='v_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				  <div class="col-xs-4 zp">
						<input value="<?php $var ='v_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php 
			} 
		?>
        <div class="row">
            <div class="col-xs-12 cmargin27 bgcolcl text-center">
                <label>5) SUPERVISION AND MONITORING</label>
            </div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 5.1 Supervisor’s visits</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
             <label class="padding6">Undertaken by</label>
          </div>
          <div class="col-xs-3 brl text-center">
            <label class="padding6">No. of days in the field <br>(during last month)</label>
          </div>
          <div class="col-xs-2 br text-center">
            <label class="padding6">Tour reports available (Yes/No)</label>
          </div>
          <div class="col-xs-4 text-center">
            <label class="padding6">Remarks (Comment on the purpose and quality of visit after reviewing the tour reports)</label>
          </div>
        </div>
		<?php 
			$labels = array('District Coordinator','Assistant District Coordinator','Others (Specify)');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
				  <div class="col-xs-3 cmargin27">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 zp">
						<input value="<?php $var ='sv_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				  <div class="col-xs-2 zp">
					<div class="row">
						  <div class="col-xs-6 text-right">
							<label>Yes</label>&nbsp;
							<input <?php $var ='sv_r'.($i).'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
							</div>
						  <div class="col-xs-6">
							<label>No</label>&nbsp;
							<input <?php $var ='sv_r'.($i).'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
							</div>
					</div>
					</div>
					<div class="col-xs-4 zp">
						<input value="<?php $var ='sv_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 5.2 Trainings</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
             <label class="padding6">Training</label>
          </div>
          <div class="col-xs-2 brl text-center">
            <label class="padding6">Venue</label>
          </div>
          <div class="col-xs-1 zp text-center">
            <label class="padding6">Date of Start</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label class="padding6">Date of Completion</label>
          </div>
          <div class="col-xs-4 text-center">
            <label class="padding6">Remarks (On the basis of Training Checklists)</label>
          </div>
        </div>
		<?php 
			$labels = array('LHWs Basic Training','LHS Basic Training',
			'FLCF/District/Provincial','Trainers Training','Refresher Training (Please specify)',
			'Trainings organized by others (NGOs, International Agencies etc.)');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
					<div class="col-xs-3 cmargin27">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-2 zp">
						<input value="<?php $var ='trng_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
					<div class="col-xs-1 zp">
						<input value="<?php $var ='trng_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control zp text-center anyOtherDate" type="text">
					</div>
					<div class="col-xs-2 zp">
						<input value="<?php $var ='trng_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
					</div>
					<div class="col-xs-4 zp">
						<input value="<?php $var ='trng_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
					</div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 5.3 (a) Status of Monthly Report</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-3 text-center">
            <label class="padding3" style="padding-top:15px;">Type</label>
          </div>
          <div class="col-xs-4 brl">
            <div class="row bb">
              <div class="col-xs-12 text-center">
                <label>Number</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-6 text-center br">
                <label>Expected</label>
              </div>
              <div class="col-xs-6 text-center">
                <label>Submitted</label>
              </div>
            </div>
          </div>
          <div class="col-xs-5">
            <div class="row bb">
              <div class="col-xs-12 text-center">
                <label>Remarks</label>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12 text-center">
                <label>(Comment on the quality of report after reviewing them)</label>
              </div> 
            </div>
          </div>
        </div>
		<?php 
			$labels = array('Facilities','Lady Health Supervisors','FPO','Proforma (NP)');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
					<div class="col-xs-3 cmargin27">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-4">
						<div class="row">
							<div class="col-xs-6 zp">
								<input value="<?php $var ='smr_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
							</div>
							<div class="col-xs-6 zp">
								<input value="<?php $var ='smr_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
							</div>
						</div>
					</div>
					<div class="col-xs-5 zp">
						<div class="row">
							<div class="col-xs-12 text-center">
								<input value="<?php $var ='smr_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
							</div> 
						</div>
					</div>
				</div><?php 
			} 
		?>  
    <div class="row">
          <div class="col-xs-3 cmargin27">
          <label>FPO worksheet folders maintained</label>
          </div>
          <div class="col-xs-4">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='smrb_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='smrb_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp">
          <div class="row">
            <div class="col-xs-12 text-center">
				<input value="<?php $var ='smrb_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div> 
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 cmargin27">
          <label>DCO worksheet folders maintained</label>
          </div>
          <div class="col-xs-4">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='smrb_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='smrb_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp">
          <div class="row">
            <div class="col-xs-12 text-center">
				<input value="<?php $var ='smrb_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div> 
          </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 cmargin27">
          <label>ADC worksheet folders maintained</label>
          </div>
          <div class="col-xs-4">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='smrb_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='smrb_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
              </div>
          </div>
          <div class="col-xs-5 zp">
          <div class="row">
            <div class="col-xs-12 text-center">
				<input value="<?php $var ='smrb_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div> 
          </div>
          </div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 5.3(b)  LHW-MIS</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-5 text-center">
            <label>Activities</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label>Status</label>
          </div>
          <div class="col-xs-5 text-center">
            <label>Remarks</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>District Report</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>No. of LHWs reporting (from DMR) (%age)</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>Feedback from PPIU to District on DMR</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
		  </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>Feedback from DPIU to Health Facilities on Monthly Report</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r4_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
				</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r4_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
             </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>HR database updated</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r5_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r5_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>LHW-MIS software installed and made functional</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r6_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r6_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r6_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>Computerized pay roll generated</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r7_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r7_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r7_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>MIS charts displayed and updated</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-6 text-right">
                    <label>Yes</label>&nbsp;
                    <input <?php $var ='lhwmis_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
					</div>
                  <div class="col-xs-6">
                    <label>No</label>&nbsp;
                    <input <?php $var ='lhwmis_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<input value="<?php $var ='lhwmis_r8_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
            </div>
        </div>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>5.4  Program indicators</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-4">
            <label>Indicator</label>
          </div>
          <div class="col-xs-3 brl">
            <label>Source</label>
          </div>
          <div class="col-xs-1 zp text-center">
            <label>Last Month</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label>2nd Last Month</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>3rd Last Month</label>
          </div>
        </div>
		<?php 
			$labels = array('Contraceptives Prevalence Rate',
			'Total number of deliveries',
			'Total number of deliveries by SBA',
			'Total number of pregnant women seen at the facility that month (check for double counting)',
			'Number of pregnant women who received TT',
			'Number of pregnant women given iron tablets',
			'Number of post natal visits made',
			'Number of post natal cases visited 24 hours after deliveries.',
			'EPI Coverage (fully immunized)',
			'Number of of ARI cases under 5 seen per LHW/month',
			'Number of diarrhea cases under 5 seen per LHW/month',
			'Average District Performance (score)');
			$sources = array('MIS Chart','DMR','DMR','MIS Chart','MIS Chart','DMR','DMR','DMR',
			'MIS Charts/Jaiza Karkardagi JK','DMR','DMR','LHS Performance Report/JK');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
				  <div class="col-xs-4 cmargin27">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-3 cmargin27">
					<label><?php echo $sources[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-1 zp">
						<input value="<?php $var ='pi_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control <?php echo ($i!=1)?'numberclass noDots':''; ?>" type="text">
					</div>
				  <div class="col-xs-2 zp">
						<input value="<?php $var ='pi_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control <?php echo ($i!=1)?'numberclass noDots':''; ?>" type="text">
				  </div>
				  <div class="col-xs-2 zp">
						<input value="<?php $var ='pi_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control <?php echo ($i!=1)?'numberclass noDots':''; ?>" type="text">
				  </div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Section 5.5 Mortality Verification</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-4 text-center">
            <label>Mortality</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label>Reported Last DMR</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Verified</label>
          </div>
          <div class="col-xs-2 text-center brl">
            <label>Confirmed</label>
          </div>
          <div class="col-xs-2 text-center">
            <label>Remarks</label>
          </div>
        </div>
        <?php 
			$labels = array('No. of maternal deaths in the covered area',
			'No. of infant deaths');
			for($i=1;$i<=count($labels);$i++){ ?>
				<div class="row">
				  <div class="col-xs-4 cmargin27">
					<label><?php echo $labels[$i-1]; ?></label>
				  </div>
				  <div class="col-xs-2 zp text-center">
					<input value="<?php $var ='mv_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
					</div>
				  <div class="col-xs-2 zp">
					<input value="<?php $var ='mv_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				  <div class="col-xs-2 zp">
					<input value="<?php $var ='mv_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control numberclass noDots" type="text">
				  </div>
				  <div class="col-xs-2 zp">
					<input value="<?php $var ='mv_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				  </div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>DISCUSSION AT DPIU  (The supervisor should discuss the issues identified with the EDO Health (H)/DHO/District Coordinator after every visit)</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-xs-2 br text-center">
            <label>Sr. No.</label>
          </div>
          <div class="col-xs-10 text-center">
            <label>Name of managers who attended the discussion</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>1</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='m1_name'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='m2_name'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='m3_name'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>4</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='m4_name'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row bc">
          <div class="col-xs-4 text-center">
            <label>Issues Discussed</label>
          </div>
          <div class="col-xs-4 brl text-center">
            <label>Actions agreed for DPIU</label>
          </div>
          <div class="col-xs-4 text-center">
            <label>Actions required at PPIU/FPIU</label>
          </div>
        </div>
        <?php 
			for($i=1;$i<=5;$i++){ ?>
				<div class="row">
				  <div class="col-xs-4 zp">
					<input value="<?php $var ='id_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" placeholder="<?php echo $i; ?>." type="text">
					</div>
				  <div class="col-xs-4 zp">
					<input value="<?php $var ='id_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				</div>
				  <div class="col-xs-4 zp">
					<input value="<?php $var ='id_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
				</div>
				</div><?php 
			} 
		?>
        <div class="row bc mt1 mb1">
           <div class="col-xs-12">
            <label>Critical Issues (to be followed during next visit)</label>
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
            <input value="<?php $var ='ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>4</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='ci_4'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>5</label>
          </div>
          <div class="col-xs-10 zp">
            <input value="<?php $var ='ci_5'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text">
			</div>
        </div>
		<hr>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-2 cmargin27">
            <label>Date of Discussion:</label>
          </div>
          <div class="col-xs-2">
            <input value="<?php $var ='dod'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" class="dp form-control anyOtherDate" type="text">
			</div>
          <div class="col-xs-2 cmargin27">
            <label>District Name:</label>
          </div>
          <div class="col-xs-2">
				<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->district:''; ?></label>
          </div>
        </div>
      </div> <!--end of rowlightbg-->
      <br>
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