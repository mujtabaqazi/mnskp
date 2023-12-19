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
  <title>DPIU || Form</title>
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
   <div class="panel-heading text-center"> District Program Implementation Unit (DPIU) - Form
   </div>
   <div class="panel-body pbody">
    <div class="alignmentview">
	<div class="rowlightbg"> 
      <div class="row">
			<div class="col-xs-3 cmargin27">
				<label>Name of the Supervisor</label>
			</div>
			<div class="col-xs-3">
				<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-3 cmargin27">
				<label>Designation of the Supervisor</label>
			</div>
			<div class="col-xs-3">
				<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
		<div class="row">
			<div class="col-xs-3 cmargin27">
				<label>District</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
			</div>
			<div class="col-xs-3 cmargin27">
				<label>Date of visit to district in the province</label>
			</div>
			<div class="col-xs-3">
				<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
			</div>
        </div>
					<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<p><?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>

					</div>
		<div class="row">
			<div class="col-xs-3">
				<label class="pt7 pb2">Reporting month</label>
			</div>
			<div class="col-xs-3">
				<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
			</div>
			<div class="col-xs-3 cmargin27">
				<label>Name of FLCF</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
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
              <p><?php $var ="fun_r1_f1"; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
              <p><?php $var ="fun_r1_f1"; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
			</div>
            <div class="col-xs-6 zp">
				<p><?php $var ="fun_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
				<p><?php $var ="fun_r2_f1"; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<p><?php $var ="fun_r2_f1"; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
            </div>
            <div class="col-xs-6 zp">
				<p><?php $var ="fun_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
						<p><?php $var ='fun_r'.($i+2).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
					<div class="col-xs-1 cmargin27 text-center">
						<p><?php $var ='fun_r'.($i+2).'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
					<div class="col-xs-6 zp">
						<p><?php $var ='fun_r'.($i+2).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div><?php
			}
		  ?>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label>Staff Composition of DPIU as per policy</label>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<p><?php $var ='fun_r9_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
            </div>
            <div class="col-xs-1 cmargin27 text-center">
				<p><?php $var ='fun_r9_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
            </div>
            <div class="col-xs-6 zp">
				<p><?php $var ='fun_r9_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-4 cmargin27">
              <label>Name Unfilled positions</label>
            </div>
            <div class="col-xs-6 col-xs-offset-2 zp">
				<p><?php $var ='fun_r10_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
						<p><?php $var ='mtng_r'.$i.'_f1'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
					</div>
					<div class="col-xs-2 zp">
						<p><?php $var ='mtng_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-2 zp">
						<div class="row">
							<div class="col-xs-12 text-center">
								<p><?php $var ='mtng_r'.$i.'_f3'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
							</div>
						</div>
					</div>
					<div class="col-xs-2 zp">
						<p><?php $var ='mtng_r'.$i.'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhw_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhw_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhw_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhw_r1_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2 zp text-center">
				<p><?php $var ='lhw_r1_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2 zp text-center">
				<p><?php $var ='lhw_r1_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-3">
				<div class="row">
					<div class="col-xs-3 zp text-center">
						<p><?php $var ='lhw_r1_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-5 zp text-center">
						<p><?php $var ='lhw_r1_f8'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-4 zp text-center">
						<p><?php $var ='lhw_r1_f9'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
			</div>
			<div class="col-xs-1 zp">
				<p><?php $var ='lhw_r1_f10'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhs_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhs_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhs_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-1 zp text-center">
				<p><?php $var ='lhs_r1_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2 zp text-center">
				<p><?php $var ='lhs_r1_f5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2 zp text-center">
				<p><?php $var ='lhs_r1_f6'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-3">
				<div class="row">
					<div class="col-xs-3 zp text-center">
						<p><?php $var ='lhs_r1_f7'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-5 zp text-center">
						<p><?php $var ='lhs_r1_f8'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-4 zp text-center">
						<p><?php $var ='lhs_r1_f9'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				</div>
			</div>
			<div class="col-xs-1 zp">
				<p><?php $var ='lhs_r1_f10'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
			<div class="col-xs-2 zp text-center">
				<p><?php $var ='drvr_r1_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2 zp text-center">
				<p><?php $var ='drvr_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-8 zp">
				<p><?php $var ='drvr_r1_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<p><?php $var ='fin_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Monthly SOE prepared & reconciled</label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<p><?php $var ='fin_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Amount Received (in Rs.) (For current quarter from PPIH) </label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<p><?php $var ='fin_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-6 cmargin27">
				<label>Payroll submitted by 20th of month</label>
			</div>
			<div class="col-xs-2 zp">
				<div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r4_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
				</div>
            </div>
			<div class="col-xs-4 zp">
				<p><?php $var ='fin_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
         <div class="row">
          <div class="col-xs-6 cmargin27">
            <label>Salary of LHWs/Supervisors/Drivers will be paid until what month and year?</label>
          </div>
          <div class="col-xs-2 zp">
            <p><?php $var ='fin_r5_f1'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
		</div>
          <div class="col-xs-4 zp">
            <p><?php $var ='fin_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r6_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r7_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='fin_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
              </div>
              </div>
            </div>
          </div>
          <div class="col-xs-4 zp">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ='fin_r6_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				</div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ='fin_r7_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				</div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ='fin_r8_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				</div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6 cmargin27">
            <label>Amount for POL/Fixed travel allowance to be paid to supervisors until what month and year?</label>
          </div>
          <div class="col-xs-2 zp">
            <p><?php $var ='fin_r9_f1'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
			</div>
          <div class="col-xs-4 zp">
            <p><?php $var ='fin_r9_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='str_r'.($i).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
				</div>
				  </div>
				  <div class="col-xs-4 zp">
					<p><?php $var ='str_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='mcl_r'.($i).'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
            </div>
				  </div>
				  <div class="col-xs-2 zp">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='mcl_r'.($i).'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
            </div>
				  </div>
				  <div class="col-xs-6 zp">
						<p><?php $var ='mcl_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
				  <div class="col-xs-2 zp text-center">
						<p><?php $var ='v_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-2 zp text-center">
						<p><?php $var ='v_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-2 zp text-center">
						<p><?php $var ='v_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-4 zp">
						<p><?php $var ='v_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
				  <div class="col-xs-3 zp text-center">
						<p><?php $var ='sv_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-2 zp">
					<div class="row">
						  <div class="col-xs-12 text-center">
							<p><?php $var ='sv_r'.($i).'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
							</div>
					</div>
					</div>
					<div class="col-xs-4 zp">
						<p><?php $var ='sv_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
						<p><?php $var ='trng_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<div class="col-xs-1 zp">
						<p><?php $var ='trng_r'.($i).'_f2'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
					</div>
					<div class="col-xs-2 zp">
						<p><?php $var ='trng_r'.($i).'_f3'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
					</div>
					<div class="col-xs-4 zp">
						<p><?php $var ='trng_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
							<div class="col-xs-6 zp text-center">
								<p><?php $var ='smr_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
							<div class="col-xs-6 zp text-center">
								<p><?php $var ='smr_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>
						</div>
					</div>
					<div class="col-xs-5 zp">
						<div class="row">
							<div class="col-xs-12 text-center">
								<p><?php $var ='smr_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='smrb_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp">
          <div class="row">
            <div class="col-xs-12 text-center">
				<p><?php $var ='smrb_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='smrb_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp">
          <div class="row">
            <div class="col-xs-12 text-center">
				<p><?php $var ='smrb_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='smrb_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
					</div>
              </div>
          </div>
          <div class="col-xs-5 zp">
          <div class="row">
            <div class="col-xs-12 text-center">
				<p><?php $var ='smrb_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r1_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r1_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>No. of LHWs reporting (from DMR) (%age)</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r2_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r2_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>Feedback from PPIU to District on DMR</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r3_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r3_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
		  </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>Feedback from DPIU to Health Facilities on Monthly Report</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r4_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r4_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
             </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>HR database updated</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r5_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r5_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>LHW-MIS software installed and made functional</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r6_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r6_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>Computerized pay roll generated</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r7_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r7_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-5 cmargin27">
            <label>MIS charts displayed and updated</label>
          </div>
          <div class="col-xs-2">
            <div class="row">
                  <div class="col-xs-12 text-center">
                    <p><?php $var ='lhwmis_r8_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'&#10004;':'&#10060;'):'&#10060;'; ?></p>
					</div>
            </div>
          </div>
          <div class="col-xs-5 zp text-center">
				<p><?php $var ='lhwmis_r8_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
				  <div class="col-xs-1 zp text-center">
						<p><?php $var ='pi_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-2 zp text-center">
						<p><?php $var ='pi_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				  <div class="col-xs-2 zp text-center">
						<p><?php $var ='pi_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
					<p><?php $var ='mv_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-2 zp text-center">
					<p><?php $var ='mv_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				  <div class="col-xs-2 zp text-center">
					<p><?php $var ='mv_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				  </div>
				  <div class="col-xs-2">
					<p><?php $var ='mv_r'.($i).'_f4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
            <p><?php $var ='m1_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 zp">
            <p><?php $var ='m2_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 zp">
            <p><?php $var ='m3_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>4</label>
          </div>
          <div class="col-xs-10">
            <p><?php $var ='m4_name'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
				  <div class="col-xs-4">
					<p><?php $var ='id_r'.($i).'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
				  <div class="col-xs-4">
					<p><?php $var ='id_r'.($i).'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
				</div>
				  <div class="col-xs-4">
					<p><?php $var ='id_r'.($i).'_f3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
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
          <div class="col-xs-10">
            <p><?php $var ='ci_1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10">
            <p><?php $var ='ci_2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10">
            <p><?php $var ='ci_3'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>4</label>
          </div>
          <div class="col-xs-10">
            <p><?php $var ='ci_4'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
        <div class="row">
          <div class="col-xs-2 cmargin27 text-center">
            <label>5</label>
          </div>
          <div class="col-xs-10">
            <p><?php $var ='ci_5'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
        </div>
		<hr>
        <div class="row">
          <div class="col-xs-2 col-xs-offset-2 cmargin27">
            <label>Date of Discussion:</label>
          </div>
          <div class="col-xs-2">
            <p class="pt12" ><?php $var ='dod'; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
			</div>
          <div class="col-xs-2 cmargin27">
            <label>District Name:</label>
          </div>
          <div class="col-xs-2">
				    <p class="pt12" ><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
          </div>
        </div>
      </div> <!--end of rowlightbg-->
	  </div><!--end of alignmentview-->
      <br>
        <div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
			<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
				<?php if($DataRow->submitted_by==$userId){ ?>
					<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>lhw/forms/dpiu_edit/<?php echo $vpvc_id; ?>">
						<i class="fa fa-pencil-square-o"></i> Update  
					</a>
				<?php } ?>
				<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
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
			window.location.href="<?php echo $basePath; ?>lhw/forms/dpiu_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	})
	</script>

</body>
</html>