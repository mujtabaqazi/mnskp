<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monitoring and Supervisory Checklists</title>
	  
	  <?php $this->load->view("templates/login-styles"); ?>
	 
	<style>
		h2.section-title{
			background-color: rgb(14, 110, 171);
			color: #FFF;
			font-size: 20px;
			padding: 8px;
			border-radius: 3px;
			box-shadow: 0px 0px 2px #888 !important;
		}
		.section-body{
			box-shadow: 0px 0px 2px #888 !important;
		}
	</style>	 
		
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/login-header"); ?>
		<?php //$this->load->view("templates/menu"); ?>	
		<!--End of header-->
		<br>
			<div class="container-fluid">
				<div class="row" style="">
				  <div class="col-md-12 text-center">
					<div style="margin: 0px ! important; background-color: rgb(14, 110, 171); height: 51px; color: rgb(255, 255, 255); padding: 10px; font-size: 23px; font-weight: bold;text-shadow: 0px 0px 7px rgba(0, 0, 0, 0.75);">
					  <p>Standard Operating Procedures (SOPs) Monitoring &amp; Supervision
					 </p> 
					</div>
				  </div>
				</div>
				<div style="background: rgb(245, 245, 245) none repeat scroll 0% 0%;" >
				<div class="row">
				  <div class="col-xs-3">
					<div class="row">
					  <div class="col-xs-12">
						<h2 class="section-title">A. Planning for the field visit plan</h2>
						<div class="section-body" style="min-height:442px;">
						  <ol>
							<li>Prepare, on monthly basis, online supervision plan selecting; Date & health facility/outreach to be visited and Checklist(s) to be filled at www. checklists.dhissindh.pk</li>
							<li>Submit the supervision plan to competent authority for review and approval;</li>
							<li>Approval granted if plan seems feasible. The competent authority also assigns vehicle and driver to exceute the supervision plan. (expect email of approved plan);</li>
							<li>Once approval is sought, do the following:<br>
								a) Accompany other supervisor visiting on the same date, if any. This helps save the cost.<br>
								b) Share the visit plan before hand with the concerned personnel to be visited.<br>
								c) Print: the approved copy of the field plan; relevant checklist; last visit report; last monthly performance report; and LQAS form.
							</li>
						  </ol>       
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12">
						<h2 class="section-title">B. Personal Protocols to follow</h2>
						<div class="section-body">
						  <ol>
							<li>Show respect and patience throughout the supervisory visit.</li>
							<li>Allow staff to complete any consultations underway before initiating the question-answer session.</li>
							<li>Reserve adequate time for supervisees to ask questions at the end of the field visit.</li>
							<li>Don’t forget to thank supervisees before concluding the field visit.
							</li>
						  </ol>       
						</div>
					  </div>
					</div>
				  </div>

				  <div class="col-xs-6">
					<div class="row">
					  <div class="col-xs-12">
						<h2  class="section-title">Monitoring and Supervisory Flow Chart</h2>
						<div class="section-body" style="min-height:442px;">
						  <img src="<?php echo $assetsPath; ?>images/flow3.png" class="img-responsive" style="min-height:440px;">
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12">
						<h2  class="section-title">C. Essentials of the field visit plan</h2>
						<div class="section-body">
						  <ol>
							<li>Use relevant checklist to observe and gather information.</li>
							<li>Fill the tool/checklist completely according to the given user guidelines.</li>
							<li>In case a procedure is performed incorrectly, demonstrate the correct procedure and then request for re-demonstration. Coordinate with mentors, if required.</li>
							<li>Give on-job training on new techniques and approaches, if required.</li>
							<li>Address the problems and challenges faced by health facility staff/In-charge.</li>
							<li>Update supervisees on new guidelines and share information about training opportunities, if any.</li>
							<li>Review the previous action points and status of implementation.</li>
							<li>Mark monitoring visit in the attendance register of the facility, or in the LHW, CMW registers etc.</li>
						  </ol>       
						</div>
					  </div>
					</div>
				  </div>
				  <div class="col-xs-3">
					<div class="row">
					  <div class="col-xs-12">
						<h2 class="section-title">D. Do’s and Don’ts of how to provide feedback</h2>
						<div class="section-body" style="min-height:442px;">
						  <ol>
							<li>Once done with supervision, provide feedback to individual staff members. Feedback will always be given in written.</li>
							<li>Always use positive feedback, when performance is good; and constructive feedback, when performance needs improvement.</li>
							<li>First provide feedback on the areas in which staff’s performance is good followed by areas that need improvement.</li>
							<li>Share observations/findings specifically on data recording and reporting.</li>
							<li>Focus on systems and processes, the performance or action, and not on the person.</li>
							<li>Discuss the reasons why previous action points were not implemented and include them in the new action plan with specified timelines. Identify persons responsible to take action on the identified problems.</li>
							<li>Give a chance to the supervisee to respond.</li>
						  </ol>       
						</div>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-12">
						<h2 class="section-title">E. Reporting the field visit plan</h2>
						<div class="section-body">
						  <ol>
							<li>Upload online monitoring field visit report, on the prescribed format, within one week.</li>
							<li>Provide written feedback to facility /outreach staff</li>
						  </ol>       
						</div>
					  </div>
					</div>
				  </div>
				</div>
				</div>
			  </div><!--end of container-fluid-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/login-scripts"); ?>
	</body>
</html>