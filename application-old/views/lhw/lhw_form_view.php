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
  <title>LHW || Form</title>
  <?php $this->load->view("templates/styles"); ?>
</head>
<body>
  <!--start of header-->
  <?php $this->load->view("templates/header"); ?>
  <?php $this->load->view("templates/menu"); ?>
  <!--End of header-->
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
   <div class="panel-heading text-center">Health House & Lady Health Worker</div>
   <div class="panel-body pbody">
    <div class="alignmentview">
	<div class="rowlightbg">         
		<div class="row">
			<div class="col-xs-2">
				<label>Name of the Supervisor</label>
			</div>
			<div class="col-xs-2">
				<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2">
				<label>Designation</label>
			</div>
			<div class="col-xs-2">
				<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
			<div class="col-xs-2">
				<label>Reporting month</label>
			</div>
			<div class="col-xs-2">
				<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">
				<label>Name of LHW</label>
			</div>
			<div class="col-xs-2">
				<p><?php $lhwname = ""; echo isset($DataRow)?$lhwname = get_LHW_Name($DataRow->lhwcode):''; ?></p>
			</div>
			<div class="col-xs-2">
				<label>Years of Service</label>
			</div>
			<div class="col-xs-2">
				<p><?php echo isset($DataRow)?$DataRow->service_years:'1'; ?></p>
			</div>
			<div class="col-xs-2">
				<label>Registered Population</label>
			</div>
			<div class="col-xs-2">
				<p><?php $var ="population"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-2">
				<label>District</label>
			</div>
			<div class="col-xs-2">
				<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
			</div>
			<div class="col-xs-2">
				<label>Health Facility to which attached</label>
			</div>
			<div class="col-xs-2">
				<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
			</div>
			<div class="col-xs-2">
				 <label>Date of visit</label>
			</div>
			<div class="col-xs-2">
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
        <div class="row bc">
			<div class="col-sm-1 text-center br"><label>#</label></div>
			<div class="col-sm-6 text-center"></div>
			<div class="col-sm-2 text-center brl">
				<label>Status</label>
			</div>
			<div class="col-sm-3 text-center">
				<label>Status/Remarks</label>
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
					<div class="col-xs-1 text-center">
						<label><?php echo $i; ?></label>
					</div>
					<div class="col-xs-6">
						<label><?php echo $labels[$i-1]; ?></label>
					</div>
					<div class="col-xs-2 <?php if($i==19 || $i == 20 || $i == 21){echo ' text-center';} ?>">						
						<?php if($i==19 || $i == 20 || $i == 21){?>
							<p style="padding-top: 7px;"><?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							<?php
						} else{ ?>
							<div class="row">
								<div class="col-xs-12 text-center">
									<p style="padding-top: 7px;"><?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
								</div>
							</div>
						<?php } ?>
					</div>
					<div class="col-xs-3">
						<p><?php $var ='sr_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>
					<!--<div class="col-xs-4 ">
						<p><?php $var ='sr_r'.$i.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					</div>-->
				</div><?php 
			} 
		?>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 cmargin27 bgcolcl text-center">
            <label>Discussion with LHWs</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-sm-3 text-center">
            <label>Name of LHW</label>
          </div>
          <div class="col-sm-3 brl text-center">
            <label>Issues discussed</label>
          </div>
          <div class="col-sm-3 br text-center">
            <label>Action for FLCF/Supervisor</label>
          </div>
          <div class="col-sm-3 text-center">
            <label>Action for FPO/DPIU/PPIU</label>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-3 text-center">
            <p><?php echo $lhwname; ?></p>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r1_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r2_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r3_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r4_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r5_f1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r1_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r2_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r3_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r4_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r5_f2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
          <div class="col-xs-3 ">
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r1_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r2_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r3_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r4_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                <p><?php $var ="dis_r5_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="row" style="padding-bottom: 1px;">
           <div class="col-sm-12 cmargin27 bgcolcl text-center">
            <label>Critical issues identified to be followed by LHS</label>
          </div>
        </div>
        <div class="row bc">
          <div class="col-sm-2 br text-center">
            <label>Sr. No.</label>
          </div>
          <div class="col-sm-10 text-center">
            <label>Critical Issues</label>
          </div>
        </div>
         <div class="row">
          <div class="col-xs-2  text-center">
            <label>1</label>
          </div>
          <div class="col-xs-10 ">
            <p><?php $var ="ci_1"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2  text-center">
            <label>2</label>
          </div>
          <div class="col-xs-10 ">
            <p><?php $var ="ci_2"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-2   text-center">
            <label>3</label>
          </div>
          <div class="col-xs-10 ">
            <p><?php $var ="ci_3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
          </div>
        </div>
      </div><!--end of rowlightbg--> 
	  </div><!--end of alignmentview--> 
		<br> 
		<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
            <div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
                <?php if($DataRow->submitted_by==$userId){ ?>
					<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>lhw/forms/lhw_edit/<?php echo $vpvc_id; ?>">
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
			window.location.href="<?php echo $basePath; ?>lhw/forms/lhw_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
		});
	});

	</script>
</body>
</html>