<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checklists :: Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php $this->load->view("dashboard/templates/styles"); ?>
		<style>
			.expandable{
				background: #e8e8e8;
			}
			.expandable div{
				position: relative;
			}
			.expandable .table td{
				color: #000;
			}
			.card.summary-inline .card-body {
				padding: 20px 10px;
			}			
		</style>
	</head>
	<body class="flat-blue">
		<?php $this->load->view("dashboard/templates/top_banner"); ?>	
		<div class="app-container expanded">
			<div class="row content-container">            
				<?php $this->load->view("dashboard/templates/sub_banner"); ?>	
				<?php $this->load->view("dashboard/templates/menu"); ?>	
				<!-- Main Content -->
				<div class="container-fluid">
					<div class="side-body">
						<div class="row">
							<form id="filter-form" method="POST" action="<?php echo $basePath; ?>dashboard/trend/indicator" enctype="multipart/form-data">
								<div class="col-md-2">			
									<div class="col-xs-3">
										<label class="pt8">Year:</label>
									</div>
									<div class="col-xs-9">
										<?php $htmloptions = getAllYearsOptions(true,isset($period)?$period:NULL);?>
										<select class="form-control" name="year" id="year">
											<?php echo $htmloptions; ?>
										</select>
									</div>	
								</div>
								<div class="col-md-3">			
									<div class="col-xs-3">
										<label class="pt8">District:</label>
									</div>
									<div class="col-xs-9">
										<?php $htmloptions = getDistricts_options(true,isset($distcode)?$distcode:NULL); ?>
										<select class="form-control" name="distcode" id="distcode">
											<?php echo $htmloptions; ?>
										</select>
									</div>	
								</div>
								<div class="col-md-4">			
									<div class="col-xs-3">
										<label class="pt8">Program:</label>
									</div>
									<div class="col-xs-9">
										<?php $htmloptions = getPrograms_options(true,isset($ptype)?$ptype:NULL); ?>
										<select class="form-control" name="ptype" id="ptype">
											<?php echo $htmloptions; ?>
										</select>
									</div>	
								</div>
							</form>
						</div><!--end of row-->
						<br>
						<div class="row animated fadeInUp">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<!-- Graph goes here -->
											<div id="plans-trend" class="col-xs-6">Supervisors plans created chart will render here</div>
											<!-- Graph goes here -->
											<div id="visits-trend" class="col-xs-6">Visits Trend chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<!-- Graph goes here -->
											<div id="visits-planned_held-trend" class="col-xs-6">Visits Planned Vs Held Trend chart will render here</div>
											<!-- Graph goes here -->
											<div id="held_confirmed-trend" class="col-xs-6">Visits Held Vs Confirmed Trend chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<!-- Graph goes here -->
											<div id="checklists-trend" class="col-xs-6">Checklists Planned Vs Filled Trend chart will render here</div>
											<!-- Graph goes here -->
											<div id="hf-trend" class="col-xs-6">Health Facilities Trend chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
					</div><!--end of sidebody-->
				</div>
			</div>
			<?php $this->load->view("dashboard/templates/footer"); ?>
		</div>
        <!-- Javascript Libs -->
		<?php $this->load->view("dashboard/templates/scripts"); ?>
		<?php $this->load->view("dashboard/templates/charts"); ?>
		<script type="text/javascript">
			FusionCharts.ready(function () {
				//Plans Created Trend
				var plansChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_plans_chart',
					renderAt: 'plans-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Plans Created (# of Supervisors Having plan)",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?><?php echo (isset($ptype))?', Program: '.get_Program_Name($ptype):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan"
									},
									{
										"label": "Feb"
									},
									{
										"label": "Mar"
									},
									{
										"label": "Apr"
									},
									{
										"label": "May"
									},
									{
										"label": "Jun"
									},
									{
										"label": "Jul"
									},
									{
										"label": "Aug"
									},
									{
										"label": "Sep"
									},
									{
										"label": "Oct"
									},
									{
										"label": "Nov"
									},
									{
										"label": "Dec"
									}
								]
							}
						],
						<?php if(isset($distcode) && $distcode>0){?>
							"trendlines": [
								{
									"line": [
										{
											"startvalue": "9",
											"valueonright": "1",
											"color": "fda813",
											"displayvalue": "Due Plans",
											"showontop": "1",
											"thickness": "2"
										}
									]
								}
							],
						<?php } ?>
						"dataset": [
							{
								"seriesname": "Plans Created",
								"color" : "1ABC9C",
								"showValues": "1",
								"data": <?php echo isset($plansm)?json_encode($plansm):'[]'; ?>
							}
						],
						"styles": {
							"definition": [
								{
									"name": "captionFont",
									"type": "font",
									"size": "15"
								}
							],
							"application": [
								{
									"toobject": "caption",
									"styles": "captionfont"
								}
							]
						}
					}
				});
				plansChart.render();
				//Visits Planned Vs Held Indicator Trend
				var visitsplannedheldChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_visits_planned_held_chart',
					renderAt: 'visits-planned_held-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Visits Planned Vs Held",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?><?php echo (isset($ptype))?', Program: '.get_Program_Name($ptype):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan"
									},
									{
										"label": "Feb"
									},
									{
										"label": "Mar"
									},
									{
										"label": "Apr"
									},
									{
										"label": "May"
									},
									{
										"label": "Jun"
									},
									{
										"label": "Jul"
									},
									{
										"label": "Aug"
									},
									{
										"label": "Sep"
									},
									{
										"label": "Oct"
									},
									{
										"label": "Nov"
									},
									{
										"label": "Dec"
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Planned Visits",
								"color" : "0E6EAB",
								"showValues": "1",
								"data": <?php echo isset($visitsm)?json_encode($visitsm):'[]'; ?>
							},
							{
								"seriesname": "Visits Held",
								"renderAs": "area",
								"showValues": "1",
								"color": "740410",
								"data": <?php echo isset($visitsheldm)?json_encode($visitsheldm):'[]'; ?>
							}
						],
						"styles": {
							"definition": [
								{
									"name": "captionFont",
									"type": "font",
									"size": "15"
								}
							],
							"application": [
								{
									"toobject": "caption",
									"styles": "captionfont"
								}
							]
						}
					}
				});
				visitsplannedheldChart.render();
				//Visits Held Vs Confirmed Indicator Trend
				var visitsheldconfirmedChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_held_confirmed_chart',
					renderAt: 'held_confirmed-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Visits Held Vs Confirmed",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?><?php echo (isset($ptype))?', Program: '.get_Program_Name($ptype):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan"
									},
									{
										"label": "Feb"
									},
									{
										"label": "Mar"
									},
									{
										"label": "Apr"
									},
									{
										"label": "May"
									},
									{
										"label": "Jun"
									},
									{
										"label": "Jul"
									},
									{
										"label": "Aug"
									},
									{
										"label": "Sep"
									},
									{
										"label": "Oct"
									},
									{
										"label": "Nov"
									},
									{
										"label": "Dec"
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Visits Held",
								"showValues": "1",
								"color": "740410",
								"data": <?php echo isset($visitsheldm)?json_encode($visitsheldm):'[]'; ?>
							},
							{
								"seriesname": "Visits Confirmed",
								"renderAs": "area",
								"showValues": "1",
								"color": "228B22",
								"data": <?php echo isset($confirmedm)?json_encode($confirmedm):'[]'; ?>
							}
						],
						"styles": {
							"definition": [
								{
									"name": "captionFont",
									"type": "font",
									"size": "15"
								}
							],
							"application": [
								{
									"toobject": "caption",
									"styles": "captionfont"
								}
							]
						}
					}
				});
				visitsheldconfirmedChart.render();
				//Checklists Planned Vs Filled Indicator Trend
				var checklistsChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_checklists_chart',
					renderAt: 'checklists-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Checklists Planned Vs Filled",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?><?php echo (isset($ptype))?', Program: '.get_Program_Name($ptype):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan"
									},
									{
										"label": "Feb"
									},
									{
										"label": "Mar"
									},
									{
										"label": "Apr"
									},
									{
										"label": "May"
									},
									{
										"label": "Jun"
									},
									{
										"label": "Jul"
									},
									{
										"label": "Aug"
									},
									{
										"label": "Sep"
									},
									{
										"label": "Oct"
									},
									{
										"label": "Nov"
									},
									{
										"label": "Dec"
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Planned Checklists",
								"color" : "22A7F0",
								"showValues": "1",
								"data": <?php echo isset($checklistsm)?json_encode($checklistsm):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"renderAs": "area",
								"showValues": "1",
								"color": "BD4923",
								"data": <?php echo isset($filledm)?json_encode($filledm):'[]'; ?>
							}
						],
						"styles": {
							"definition": [
								{
									"name": "captionFont",
									"type": "font",
									"size": "15"
								}
							],
							"application": [
								{
									"toobject": "caption",
									"styles": "captionfont"
								}
							]
						}
					}
				});
				checklistsChart.render();
				//Health facilities Planed Vs Visited Indicator Trend
				var hfChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_hf_chart',
					renderAt: 'hf-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Health facilities Planned Vs Visited",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?><?php echo (isset($ptype))?', Program: '.get_Program_Name($ptype):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan"
									},
									{
										"label": "Feb"
									},
									{
										"label": "Mar"
									},
									{
										"label": "Apr"
									},
									{
										"label": "May"
									},
									{
										"label": "Jun"
									},
									{
										"label": "Jul"
									},
									{
										"label": "Aug"
									},
									{
										"label": "Sep"
									},
									{
										"label": "Oct"
									},
									{
										"label": "Nov"
									},
									{
										"label": "Dec"
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "HF in Plans",
								"color" : "0C838C",
								"showValues": "1",
								"data": <?php echo isset($hfplannedm)?json_encode($hfplannedm):'[]'; ?>
							},
							{
								"seriesname": "HF Visited",
								"renderAs": "area",
								"showValues": "1",
								"color": "#353d47",
								"data": <?php echo isset($hfvisitedm)?json_encode($hfvisitedm):'[]'; ?>
							}
						],
						"styles": {
							"definition": [
								{
									"name": "captionFont",
									"type": "font",
									"size": "15"
								}
							],
							"application": [
								{
									"toobject": "caption",
									"styles": "captionfont"
								}
							]
						}
					}
				});
				hfChart.render();
				//Visits Indicator Trend
				var visitsChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_visits_chart',
					renderAt: 'visits-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Visits Planned Vs Held Vs Confirmed",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?><?php echo (isset($ptype))?', Program: '.get_Program_Name($ptype):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values  (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan"
									},
									{
										"label": "Feb"
									},
									{
										"label": "Mar"
									},
									{
										"label": "Apr"
									},
									{
										"label": "May"
									},
									{
										"label": "Jun"
									},
									{
										"label": "Jul"
									},
									{
										"label": "Aug"
									},
									{
										"label": "Sep"
									},
									{
										"label": "Oct"
									},
									{
										"label": "Nov"
									},
									{
										"label": "Dec"
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Planned Visits",
								"color" : "0E6EAB",
								"showValues": "1",
								"data": <?php echo isset($visitsm)?json_encode($visitsm):'[]'; ?>
							},
							{
								"seriesname": "Visits Held",
								"renderAs": "line",
								"showValues": "1",
								"color": "740410",
								"data": <?php echo isset($visitsheldm)?json_encode($visitsheldm):'[]'; ?>
							},
							{
								"seriesname": "Visits Confirmed",
								"renderAs": "area",
								"showValues": "1",
								"color": "228B22",
								"data": <?php echo isset($confirmedm)?json_encode($confirmedm):'[]'; ?>
							}
						],
						"styles": {
							"definition": [
								{
									"name": "captionFont",
									"type": "font",
									"size": "15"
								}
							],
							"application": [
								{
									"toobject": "caption",
									"styles": "captionfont"
								}
							]
						}
					}
				});
				visitsChart.render();
			});
			$('#year').on('change' , function (event){
				$("#filter-form").submit();
			});
			$('#distcode').on('change' , function (event){
				$("#filter-form").submit();
			});
			$('#ptype').on('change' , function (event){
				$("#filter-form").submit();
			});
		</script>
	</body>
</html>