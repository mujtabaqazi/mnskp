<?php 
$basePath = base_url();
$dashboardPath = base_url()."dashboard/";
$ulevel = $this -> session -> userLevel;
$utype 	= $this -> session -> utype;
$ptype 	= $this -> session ->ptype;
?>
<div class="side-menu sidebar-inverse">
	<nav class="navbar navbar-default" role="navigation">
		<div class="side-menu-container">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo $dashboardPath; ?>">
					<div class="icon fa fa-paper-plane"></div>
					<div class="title">Checklists-Dashboard</div>
				</a>
				<button type="button" class="navbar-expand-toggle pull-right visible-xs">
					<i class="fa fa-times icon"></i>
				</button>
			</div>
			<ul class="nav navbar-nav">
				<li class="<?php echo (isset($currpage) && $currpage!="home")?"":"active"; ?>">
					<a href="<?php echo $dashboardPath; ?>">
						<span class="icon fa fa-home"></span><span class="title">Home</span>
					</a>
				</li>
				<li class="<?php echo (isset($currpage) && $currpage=="calendar")?"active":""; ?>">
					<a href="<?php echo $dashboardPath; ?>calendar">
						<span class="icon fa fa-calendar"></span><span class="title">Monthly Calendar</span>
					</a>
				</li>
				<li class="<?php echo (isset($currpage) && $currpage=="indicator-trend")?"active":""; ?>">
					<a href="<?php echo $dashboardPath; ?>trend/indicator">
						<span class="icon fa fa-bar-chart"></span><span class="title">Indicator Wise Trend</span>
					</a>
				</li>
				<li class="<?php echo (isset($currpage) && $currpage=="periodical-trend")?"active":""; ?>">
					<a href="<?php echo $dashboardPath; ?>trend/periodical">
						<span class="icon fa fa-line-chart"></span><span class="title">Periodical Trend</span>
					</a>
				</li>
				<li class="<?php echo (isset($currpage) && $currpage=="confirmed-map")?"active":""; ?>">
					<a href="<?php echo $dashboardPath; ?>map/confirmed">
						<span class="icon fa fa-map-marker"></span><span class="title">Mobile Verified Visits Map</span>
					</a>
				</li>
				<li class="<?php echo (isset($currpage) && $currpage=="lqas")?"active":""; ?>">
					<a href="<?php echo $dashboardPath; ?>checklists/lqas">
						<span class="icon fa fa-list-alt"></span><span class="title">LQAS Checklists Trend</span>
					</a>
				</li>
				<?php $modnames = array("imc","lhw","epi","mnch","nutrition","tbc","malaria","hepatitis"); ?>
				<li class="panel panel-default dropdown">
					<a <?php echo (isset($currpage) && (in_array($currpage,$modnames)))?'aria-expanded="true"':""; ?> data-toggle="collapse" href="#dropdown-element">
						<span class="icon fa fa-balance-scale"></span><span class="title">Gap Analysis</span>
					</a>
					<div id="dropdown-element" class="panel-collapse collapse  <?php echo (isset($currpage) && (in_array($currpage,$modnames)))?' in':""; ?>"  <?php echo (isset($currpage) && (in_array($currpage,$modnames)))?'aria-expanded="true"':""; ?>>
						<div class="panel-body">
							<ul class="nav navbar-nav">
								<li class="<?php echo (isset($currpage) && $currpage=="imc")?"active":""; ?>">
									<a href="<?php echo $dashboardPath; ?>checklists/imc_gois">Integrated Monitoring</a>
								</li>
								<li class="<?php echo (isset($currpage) && $currpage=="lhw")?"active":""; ?>">
									<a href="<?php echo $dashboardPath; ?>checklists/lhw_lhw">LHW Program</a>
								</li>
								<li><a href="#">EPI Program</a></li>
								<li><a href="#">MNCH Program</a></li>
								<li><a href="#">Nutrition Program</a></li>
								<li><a href="#">TB Program</a></li>
								<li><a href="#">Malaria Program</a></li>
								<li><a href="#">Hepatitis Program</a></li>
							</ul>
						</div>
					</div>
				</li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</nav>
</div>
<!--end of menu-container-->