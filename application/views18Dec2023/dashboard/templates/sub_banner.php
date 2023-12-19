<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<div class="loading hide">Loading&#8230;</div>
<nav class="navbar navbar-default navbar-fixed-top navbar-top">
	<div class="container-fluid">
		<div class="navbar-header" style="width:100%">
			<button type="button" class="navbar-expand-toggle">
				<i class="fa fa-bars icon"></i>
			</button>
			<ol class="breadcrumb navbar-breadcrumb">
				<li class="active"><?php echo (isset($pagetitle))?$pagetitle:"Home"; ?></li>
			</ol>
			<a href="<?php echo $basePath; ?>contents/downloads" target="_blank" title="Download Checklists">
				<img class="pull-right" src="<?php echo $basePath.'dashboards/images/checklist.png'; ?>" style="height: 50px;margin-top: 10px;" />
			</a>
			<a href="<?php echo $basePath.'sop'; ?>" target="_blank" title="Standard Operating Procedures (SOPs)">
				<img class="pull-right" src="<?php echo $basePath.'dashboards/images/SOP.png'; ?>" style="height: 50px;margin-top: 10px;" />
			</a>
		</div>	
	</div>
</nav>