<?php

$basePath = base_url();

$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session ->ptype;
$totalchklst 	= $this -> session ->totalchklst;
?>

<div id="nav">

<nav class="navbar navbar-default main-dropdown menu" role="navigation">

<div class="navbar-header main-dropdown-header">

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">

<span class="sr-only">Toggle navigation</span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

</button>

<a class="navbar-brand" href="<?php echo $basePath."home"; ?>">Home</a>

</div>

<!--/.navbar-header-->

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

<ul class="nav navbar-nav"><?php
//Plan, every one has access to plan

?>
<li class="dropdown lib lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Visit Plan</a>

<ul class="dropdown-menu">

<li><h5 class="liheading">Monthly Visit Plan</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>
<?php if ($totalchklst > 0) { ?>
<li><a href="<?php echo $basePath."plans/lists"; ?>">My Plans</a></li>
<?php } if (($ulevel=='2' || $ulevel=='3') && ($utype=='Admin' || $utype=='Executive' || $utype=='Manager')) { ?>
<li><a href="<?php echo $basePath."plans/managers_lists"; ?>">All Plans</a></li>
<?php if ($utype=='Executive') { ?>
<li><a href="<?php echo $basePath."plans/approve_list"; ?>">Approve Plan</a></li>
<?php } ?>
<?php }?>
</ul>

</li>
<?php

//LHW Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='lhw'))) {?>

<li class="dropdown lib lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">LHW Program</a>

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of LHW Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="<?php echo $basePath."lhw/listing/dpiu"; ?>">1-District Program Implementation Unit</a></li>

<li><a href="<?php echo $basePath."lhw/listing/hf"; ?>">2-Health Facility</a></li>

<li><a href="<?php echo $basePath."lhw/listing/lhs"; ?>">3-Lady Health Supervisor</a></li>

<li><a href="<?php echo $basePath."lhw/listing/lhw"; ?>">4-Health House & Lady Health Worker</a></li>

<li><a href="<?php echo $basePath."lhw/listing/lmne"; ?>">5-Logistic Monitoring/Evaluation</a></li>

<li><a href="<?php echo $basePath."lhw/listing/dtr"; ?>">6-District Tour Report</a></li>

<li><a href="<?php echo $basePath."lhw/listing/mtr"; ?>">7-Monthly Tour Report</a></li>

</ul>

</li><?php

}

//EPI Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='epi'))) {?>

<li class="dropdown lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">EPI Program</a>

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of EPI Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<!--epi-program/Only for Health Facilities with Functional EPI Centre.html-->

<li><a href="<?php echo $basePath."epi/listing/activities"; ?>">1-Checklist for EPI activities (Only for Health Facilities with Functional EPI Centre)</a></li>

<li><a href="<?php echo $basePath."epi/listing/monitoring"; ?>">2-Monitoring and Supervisory</a></li>

</ul>

</li><?php

}

//MNCH Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='mnch'))) {?>

<li class="dropdown lib lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">MNCH Program</a>

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of MNCH Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="#">1-Monthly Monitoring of CMW/Nursing and Midwifery/Public Health School</a></li>

<li><a href="#">2-Six monthly Monitoring of CMW/Nursing and Midwifery/Public Health School</a></li>

<li><a href="#">3-CMW’s Administrative Supervisory Checklist</a></li>

<li><a href="#">4-CMW’s Technical Monitoring Checklist</a></li>

<li><a href="#">5-Quarterly Health Facility status Checklist (B-EmONC and C-EmONC)</a></li>

</ul>

</li><?php

}

//Nutrition Support Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='nutrition'))) {?>

<li class="dropdown lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Nutrition Program</a><!--Support-->

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of Nutrition Support Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="#">1-Monitoring Checklist for Nutrition Stabilization Centers</a></li>

<li><a href="#">2-Infant Young Child Feeding (IYCF) Checklist of Health Facility</a></li>

<li><a href="#">3-Monthly Monitoring Checklist of Health Facility</a></li>

<li><a href="#">4-Monitoring and Supervision Checklist for Social Mobilizers at Community</a></li>

<li><a href="#">5-Monthly Monitoring Checklist of Warehouse at Districts</a></li>

</ul>

</li><?php

}

//TB Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='tb'))) {?>

<li class="dropdown lib lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">TB Program</a>

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of TB Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="#">1-Monitoring Evaluation Checklist for Basic Management Unit (BMU)</a></li>

<li><a href="#">2-Monitoring and Evaluation checklist for Multiple Drug Resistance (MDR) facility visit</a></li>

<li><a href="#">3-Monitoring checklist for Provincial warehouse/District stores</a></li>

</ul>

</li><?php

}

//Malaria Control Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='mcp'))) {?>

<li class="dropdown lih">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Malaria Program</a><!--Control-->

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of Malaria Control Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="#">1-Monitoring & Evaluation Checklist for Long Lasting Insecticide Nets (LLIN) Center</a></li>

<li><a href="#">2-Supervisory Checklist Indoor Residual Spray (IRS) Operations</a></li>

<li><a href="#">3-Checklist for Microscopy Center</a></li>

<li><a href="#">4-Checklist for Rapid Diagnostic Test (RDT) Center</a></li>

</ul>

</li><?php

}

//Hepatitis Control Program

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='hcp'))) {?>

<li class="dropdown lih lib">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hepatitis Program</a><!--Control-->

<ul class="dropdown-menu">

<li><h5 class="liheading">Checklists of Hepatitis Control Program</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="#">1-Visit Report/ Checklist of Monitoring Officers</a></li>

</ul>

</li><?php

}

//Checklist for DOH Facilities

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO')) && (($ptype=='all') || ($ptype=='doh'))) {?>

<li class="dropdown lih lib">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">DOH Facilities</a>

<ul class="dropdown-menu">
<li><h5 class="liheading">Checklists for DOH Facilities</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="#">Integrated Monitoring Checklist for DOH Facilities</a></li>

</ul>

</li><?php

}

//Checklist for LQAS, it will be available for all supervisors

if ((($ulevel=='2') || ($ulevel=='3')) && (($utype=='Manager') || ($utype=='Executive') || ($utype=='DEO'))) {?>

<li class="dropdown lih lib">

<a href="#" class="dropdown-toggle" data-toggle="dropdown">DHIS</a>

<ul class="dropdown-menu">
<li><h5 class="liheading">Checklists for DHIS</h5></li>

<li><hr style="margin-top:0px;margin-bottom:0px;"></li>

<li><a href="<?php echo $basePath."da/listing/lqas"; ?>">Data Accuracy Using LQAS Techniques</a></li>
<li><a href="#">Report of Hand-on Support Activity - DHIS Cell</a></li>
<li><a href="#">Report of Hand-on Support Activity - Health Facility</a></li>

</ul>

</li><?php

}

//user management

if ((($ulevel=='1') || ($ulevel=='2')) && ($utype=='Admin') && ($ptype=='all')) {?>

<li class="dropdown lib lih">

<a href="<?php echo $basePath."users/lists"; ?>">User Management</a>

</li><?php

}

//Reports
?>

</ul>

</div><!--/.navbar-collapse-->

</nav><!--/.navbar-->

</div><!--end of nav-->