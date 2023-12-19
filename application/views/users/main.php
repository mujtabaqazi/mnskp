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
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>	
		<!--End of header-->
		<div class="container-fluid">
			<div></div>
			<div class="row">
				<div class="col-xs-6" style="background-color: rgb(244, 244, 248); padding: 0px 1px ! important; box-shadow: 2px 2px 2px rgb(212, 212, 212); min-height: 465px;">
					<h2 style="font-weight: bold; background: #0B7D05 none repeat scroll 0% 0%; color: white; font-size: 19px; padding: 10px; text-align: center; text-shadow: 0px 0px 7px rgba(0, 0, 0, 0.75); margin-top: 0px;border-radius: 4px;">Welcome to Online Monitoring and Supervisory System</h2>
					<div style="margin-top: -12px; padding: 0px 10px;">
						<p style="font-size: 16px; text-align: justify; margin-top: 25px;">USAID IHSS-SD Activity provided technical assistance to DOH Khyber Pakhtunkhwa to design a Monitoring and supervisory system for service delivery from the district and/or provincial level. The goal of supervision is to promote efficient, effective, and equitable health care delivery system. Supportive supervision will promote quality of care at all levels of the health system by strengthening relationships within the system and focusing on the identification and resolution of problems. The supportive supervision includes quality checks of reporting and recording: patient cards and registers are inspected, data transfer is rechecked, and some elements of the monthly reports are recalculated. The proposed supervisory system involves identification and discussion of challenges in data management and provides opportunities for learning. All supervisors strive to enhance employees’ performance by supporting professional development. Health managers and supervisors will continuously challenge staff to achieve their goals according to district and facility objectives, standards, and expectations. </p>
						<p style="font-size: 16px; padding: 5px; text-align: justify; margin-bottom: 0px;">The SOPs have been developed for conducting the monitoring and supervisory visits in accordance with the plan along with roles and responsibilities at different levels. These are made available in the Monitoring and Supervisory Manual which is prepared to ensure standard approach to monitoring and supervisory process and activities in health care services.  It supports supervisors, program and health facility managers in executing their roles and responsibilities to monitor and supervise quality health care service delivery.</p>
					</div>
				</div>
				<div style="" class="col-xs-6"><!--<a href="<?php //echo $basePath.'sop'; ?>" target="_blank"  style="color:white;text-decoration: none;">-->
					<h2 style="font-weight: bold; background: #0B7D05 none repeat scroll 0% 0%; color: white; font-size: 19px; padding: 10px; text-align: center; margin-top: 0px;border-radius: 4px;">SOP Flow Chart</h2>
					<img src="<?php echo $assetsPath; ?>images/flow.png" class="img-responsive"><!--</a>-->
				</div>
			</div>
		</div><!--end of container-fluid-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>