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
	 
	  
		
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/login-header"); ?>
		<?php //$this->load->view("templates/menu"); ?>	
		<!--End of header-->
	 <div class="container">
	  <div ></div>
	  <div class="row" style="padding-top: 25px; padding-bottom: 25px;">
		<div class="col-xs-12 text-center">
		  <h2 style="font-weight:bold; text-shadow: 0px 1px 1px !important;">Monitoring and Supervisory Checklists</h2>
		</div>
	  </div>
	  <div class="row">
		<div class="col-xs-8 col-xs-offset-2">
	<div class="panel-group" id="accordion">
	  <div class="panel panel-default">                        
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
		  <a class="accordion-toggle"  href="<?php echo $assetsPath; ?>files/Mobile Visit Confirmation v2_1live.apk"><span class="glyphicon glyphicon-plus"></span> On Field Visit Confirmation Android App </a>
		  </h4>
		</div>
	</div>
	  <div class="panel panel-default">                        
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsevp">
			  <span class="glyphicon glyphicon-plus"></span>
			  Online M&S User Manual and Supervisory Visit Plan
			</a>
		  </h4>
		</div>
		<div id="collapsevp" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Online Monitoring & Supervision User Manual</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/M&S Checklists User Manual(kp)_v1.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/M&S Checklists User Manual(kp)_v1.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>		
			<a href="#">- Online Monitoring & Supervision Presentation 1</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/SOPs MNS System 2019.pptx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
			  </span><br>			
			<a href="#">- Online Monitoring & Supervision System Presentation 2</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/MNS System Concepts.pptx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
			  </span><br>
			<a href="#">- Online Monitoring & Supervision - Quality Data Presentation 3</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/MNS QualityData.pptx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
			  </span><br>
			  <a href="#">- Online Monitoring & Supervision Online Software Presentation 4</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/M&S Presentation - Online Software.pptx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
			  </span><br>			
			  <a href="#">- Monitoring & Supervision Monthly Visit Plan</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monitoring and Supervision - Visit Plan.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monitoring and Supervision - Visit Plan.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Sampled. Monitoring & Supervision Monthly Visit Plan</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Sampled. Monitoring and Supervision - Visit Plan.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Sampled. Monitoring and Supervision - Visit Plan.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br />
			<a href="#">- Video. How to Make Supervisory Plan</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Supervisors Plan.mp4" >
				  <img src="<?php echo $assetsPath; ?>images/video.jpg" style="height:22px;"></a>
			  </span><br />
			<a href="#">- Video. How to Edit Plan</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Supervisor Plan Update.mp4" >
				  <img src="<?php echo $assetsPath; ?>images/video.jpg" style="height:22px;"></a>
			  </span><br />
			<a href="#">- Video. How to Submit Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Submission of checklist.mp4" >
				  <img src="<?php echo $assetsPath; ?>images/video.jpg" style="height:22px;"></a>
			  </span>
			  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
			  <span class="glyphicon glyphicon-plus"></span>
			  LHW Program Checklists 
			</a>
		  </h4>
		</div>
		<div id="collapseOne" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- District Program Implementation Unit Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/District Program Implementation Unit - LHW.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/District Program Implementation Unit - LHW.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Health Facility Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Health Facility - LHW.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Health Facility - LHW.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- Lady Health Supervisor Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Lady Health Supervisors (LHS) - LHW.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Lady Health Supervisors (LHS) - LHW.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Health House & Lady Health Worker Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Health House & Lady Health Worker - LHW.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Health House & Lady Health Worker - LHW.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- Logistic Monitoring/ Evaluation Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Logistics Monitoring & Evaluation Checklist - LHW.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Logistics Monitoring & Evaluation Checklist - LHW.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- District Tour Report Checklist</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/District Tour Report - LHW.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/District Tour Report - LHW.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 

		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
			  <span class="glyphicon glyphicon-plus"></span>
			  EPI Program Checklists
			</a>
		  </h4>
		</div>
		<div id="collapseTwo" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Checklist for EPI activities (Only for Health Facilities with Functional EPI Centre)</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Checklist for EPI Activities.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Checklist for EPI Activities.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- EPI Monitoring & Supervisory checklist</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monitoring and Supervision.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monitoring and Supervision.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			 
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
			  <span class="glyphicon glyphicon-plus"></span>
			  MNCH Program Checklists
			</a>
		  </h4>
		</div>
		<div id="collapseThree" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Monthly Monitoring of CMW/Nursing and Midwifery/Public Health School</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monthly Monitoring of CMW-Nursing & midwifery-PH Schools - MNCH.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monthly Monitoring of CMW-Nursing & midwifery-PH Schools - MNCH.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Six monthly Monitoring of CMW/Nursing and Midwifery/Public Health School</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Six Monthly Monitoring of CMW-Nursing & midwifery-PH Schools - MNCH.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Six Monthly Monitoring of CMW-Nursing & midwifery-PH Schools - MNCH.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- CMW’s Administrative Supervisory Checklist</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/CMW Administrative Supervisory Checklist - MNCH.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/CMW Administrative Supervisory Checklist - MNCH.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- CMW’s Technical Monitoring Checklist</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/CMW Technical Monitoring Checklist  - MNCH.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/CMW Technical Monitoring Checklist  - MNCH.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- Quarterly Health Facility status Checklist (B-EmONC and C-EmONC)</a>
			  <span  class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Quarterly Health Facility Status Check  - MNCH.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Quarterly Health Facility Status Check  - MNCH.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span> 
			 
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefour">
			  <span class="glyphicon glyphicon-plus"></span>
			  Nutrition Support Program Checklists
			</a>
		  </h4>
		</div>
		<div id="collapsefour" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Monitoring Checklist for Nutrition Stabilization Centers </a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Nutrition Stabilization Center Staff Status  - Nutrition.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Nutrition Stabilization Center Staff Status  - Nutrition.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Infant Young Child Feeding (IYCF) Checklist of Health Facility</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/IYCF Checklist of Health Facility  - Nutrition.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/IYCF Checklist of Health Facility  - Nutrition.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- Monthly Monitoring Checklist of Health Facility</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monthly Monitoring Checklist of Health Facility  - Nutrition.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monthly Monitoring Checklist of Health Facility  - Nutrition.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Monitoring and Supervision Checklist for Social Mobilizers at Community</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monitoring and Supervision Checklist for Social Mobilizers at community level  - Nutrition.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monitoring and Supervision Checklist for Social Mobilizers at community level  - Nutrition.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- Monthly Monitoring Checklist of Warehouse at Districts</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monthly Monitoring Checklist of Warehouse at District  - Nutrition.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monthly Monitoring Checklist of Warehouse at District  - Nutrition.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span> 
			 
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsefive">
			  <span class="glyphicon glyphicon-plus"></span>
			  TB Program Checklists
			</a>
		  </h4>
		</div>
		<div id="collapsefive" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Monitoring Evaluation Checklist for Basic Management Unit (BMU)</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/MONITORNG & EVALUATION CHECKLIST FOR BASIC MANAGEMENT UNIT - TB.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/MONITORNG & EVALUATION CHECKLIST FOR BASIC MANAGEMENT UNIT - TB.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monitoring and Evaluation Checklist For MDR Facility Visit - TB.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monitoring and Evaluation Checklist For MDR Facility Visit - TB.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br> 
			<a href="#">- Monitoring checklist for Provincial warehouse/District stores</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Monitoring Checklist For Provincial Warehouse-District Store - TB.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monitoring Checklist For Provincial Warehouse-District Store - TB.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
					  
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseseven">
			  <span class="glyphicon glyphicon-plus"></span>
			  Malaria Control Program Checklists
			</a>
		  </h4>
		</div>
		<div id="collapseseven" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center </a>
			  <span class="checklists">
					<a href="<?php echo $assetsPath; ?>files/Monitoring & Evaluation Checklist for LLIN Center - Malaria.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Monitoring & Evaluation Checklist for LLIN Center - Malaria.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Supervisory Checklist Indoor Residual Spray (IRS) Operations</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Indoor Residual Spraying (IRS) Operations Supervision Checklist - Malaria.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Indoor Residual Spraying (IRS) Operations Supervision Checklist - Malaria.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			  <a href="#">- Checklist for Microscopy Center</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Checklist for Microscopy Center - Malaria.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Checklist for Microscopy Center - Malaria.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			  <a href="#">- Checklist for Rapid Diagnostic Test (RDT) Center</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Checklist for RDT Center - Malaria.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Checklist for RDT Center - Malaria.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span>                 
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsesix">
			  <span class="glyphicon glyphicon-plus"></span>
			  Hepatitis Control Program Checklists
			</a>
		  </h4>
		</div>
		<div id="collapsesix" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Visit Report/ Checklist of Monitoring Officers</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Hep Checklist of Monitoring Officers.doc">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Hep Checklist of Monitoring Officers.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
							  
		  </div>
		</div>
	  </div> 
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseeight">
			  <span class="glyphicon glyphicon-plus"></span>
			  Integrated Monitoring Checklist for DOH Facilities
			</a>
		  </h4>
		</div>
		<div id="collapseeight" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- DOH Facilities Checklist - General Outlook - Instrument and Service Availability</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Outlook - Instrument and Service Availability.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Outlook - Instrument and Service Availability.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - Maternal & Child Health Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Maternal & Child Health Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Maternal & Child Health Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- SBA Technical Monitoring Checklist </a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/SBA Technical Monitoring Checklist.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/SBA Technical Monitoring Checklist.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  
			  
			<a href="#">- DOH Facilities Checklist - Nutrition Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Nutrition Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Nutrition Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - EPI Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/EPI Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/EPI Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - Family Planning Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/FP Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/FP Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - LHW Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/LHW Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/LHW Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - Malaria Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Malaria Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Malaria Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - TB Control Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/TB Control.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/TB Control.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - Hepatitis Control Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Hepatitis Control.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Hepatitis Control.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - HIV-AIDS Control Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/HIV-AIDS Control.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/HIV-AIDS Control.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - OPD Room</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - OPD Room.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - OPD Room.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Indoor Ward</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Indoor Ward.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Indoor Ward.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Labour Room</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Labour Room.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Labour Room.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Operation Theater</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Operation Theater.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Operation Theater.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Radiology & Laboratory Services</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Radiology & Laboratory Services.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Radiology & Laboratory Services.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - List of Surgical & Obstetrical Instruments</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - List of Surgical & Obstetrical Instruments.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - List of Surgical & Obstetrical Instruments.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - List of Essential Medicines Stockout</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - List of Essential Medicines Stockout.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - List of Essential Medicines Stockout.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Human Resource</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Human Resource.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Human Resource.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Available Staff Trained in the Areas</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Available Staff Trained in the Areas.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Available Staff Trained in the Areas.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  

			<a href="#">- DOH Facilities Checklist - General Services - Health Facility Store</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/General Services - Health Facility Store.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/General Services - Health Facility Store.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>							  
		  </div>
		</div>
	  </div>
	  <div class="panel panel-default">
		<div class="panel-heading pheadingchecklists">
		  <h4 class="panel-title">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapsenine">
			  <span class="glyphicon glyphicon-plus"></span>
			  Data Validation Form (LQAS)
			</a>
		  </h4>
		</div>
		<div id="collapsenine" class="panel-collapse collapse">
		  <div class="panel-body">
			<a href="#">- Data Validation Form (LQAS)</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Data Accuracy Using LQAS Techniques.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Data Accuracy Using LQAS Techniques.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Report of Hand-on Support Activity – Health Facility</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/DHIS-HF.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/DHIS-HF.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
			<a href="#">- Report of Hand-on Support Activity - M&E Cell</a>
			  <span class="checklists">
				<a href="<?php echo $assetsPath; ?>files/Hand-on Support Activity - Reporting M&E Cell.docx">
				  <img src="<?php echo $assetsPath; ?>images/word.png" style="height:22px;"></a>
				  <a href="<?php echo $assetsPath; ?>files/Hand-on Support Activity - Reporting M&E Cell.pdf" target="_blank">
					<img src="<?php echo $assetsPath; ?>images/pdf.png" style="height:20px;"></a>
			  </span><br>
							  
		  </div>
		</div>
	  </div>
	</div><!--end pf pannel group-->
	</div></div>
	</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/login-scripts"); ?>
	</body>
</html>