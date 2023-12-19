<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
$monthscat = array(array("label"=>"Jan"),array("label"=>"Feb"),array("label"=>"Mar"),array("label"=>"Apr"),array("label"=>"May"),array("label"=>"Jun"),array("label"=>"Jul"),array("label"=>"Aug"),array("label"=>"Sep"),array("label"=>"Oct"),array("label"=>"Nov"),array("label"=>"Dec"));
$qtrscat = array(array("label"=>"Q1 (Jan,Feb,Mar)"),array("label"=>"Q2 (Apr,May,Jun)"),array("label"=>"Q3 (Jul,Aug,Sep)"),array("label"=>"Q4 (Oct,Nov,Dec)"));
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
							<form id="filter-form" method="POST" action="<?php echo $basePath; ?>dashboard/checklists/lqas" enctype="multipart/form-data">
								<div class="col-md-3">			
									<div class="col-xs-3">
										<label class="pt8">Year:</label>
									</div>
									<div class="col-xs-9">
										<?php $moon  = getAllYearsOptions(true,isset($period)?$period:NULL);?>
										<select class="form-control" name="year" id="year">
											<?php echo $moon ; ?>
										</select>
									</div>	
								</div>
								<div class="col-md-3">			
									<div class="col-xs-3">
										<label class="pt8">District:</label>
									</div>
									<div class="col-xs-9">
										<?php $moon  = getDistricts_options(true,isset($distcode)?$distcode:NULL); ?>
										<select class="form-control" name="distcode" id="distcode">
											<?php echo $moon ; ?>
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
											<div id="monthly-trend" class="col-xs-6">LQAS Checklists Monthly Trend chart will render here</div>
											<!-- Graph goes here -->
											<div id="quarterly-trend" class="col-xs-6">LQAS Checklists Quarterly Trend chart will render here</div>
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
											<div id="programs-trend" class="col-xs-6">LQAS Checklists Program Wise Trend chart will render here</div>
											<!-- Graph goes here -->
											<div id="hf-trend" class="col-xs-6">Your Desired Trend chart will render here</div>
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
											<div id="districts-trend">LQAS Checklists Program Wise Trend chart will render here</div>
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
			var monthscat = <?php echo isset($monthscat)?json_encode($monthscat):'[]'; ?>;
			var prgrmscat = <?php echo isset($programs)?json_encode($programs):'[]'; ?>;
			var distcat = <?php echo isset($districts)?json_encode($districts):'[]'; ?>;
			FusionCharts.ready(function () {
				//Monthly Trend
				var monthlyChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_monthly-trend_chart',
					renderAt: 'monthly-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "LQAS Checklists Planned Vs Filled (Monthly)",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": monthscat
							}
						],
						"dataset": [
							{
								"seriesname": "Checklists Planned",
								"showValues": "1",
								"data": <?php echo isset($plannedm)?json_encode($plannedm):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"showValues": "1",
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
				monthlyChart.render();
				//Quarterly Trend
				var quarterlyChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_quarterly-trend_chart',
					renderAt: 'quarterly-trend',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "LQAS Checklists Planned Vs Filled (Quarterly)",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Quarter",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": <?php echo isset($qtrscat)?json_encode($qtrscat):'[]'; ?>
							}
						],
						"dataset": [
							{
								"seriesname": "Checklists Planned",
								"showValues": "1",
								"data": <?php echo isset($plannedq)?json_encode($plannedq):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"showValues": "1",
								"data": <?php echo isset($filledq)?json_encode($filledq):'[]'; ?>
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
				quarterlyChart.render();
				//Program Wise Trend
				var programsChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_programs_chart',
					renderAt: 'programs-trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "LQAS Checklists Planned Vs Filled (Program Wise)",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Program",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": prgrmscat
							}
						],
						"dataset": [
							{
								"seriesname": "Checklists Planned",
								"showValues": "1",
								"data": <?php echo isset($plannedp)?json_encode($plannedp):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"renderAs": "area",
								"showValues": "1",
								"data": <?php echo isset($filledp)?json_encode($filledp):'[]'; ?>
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
				programsChart.render();
				//Districts Wise Trend
				var distChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_districts_chart',
					renderAt: 'districts-trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "LQAS Checklists Planned Vs Filled (Districts Wise)",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "District",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1",
							"slantLabels": "1",
							"labelDisplay": "rotate",
							"baseFont": "Helvetica Neue,Arial"
						},
						"categories": [
							{
								"category": distcat
							}
						],
						"dataset": [
							{
								"seriesname": "Checklists Planned",
								"showValues": "1",
								"data": <?php echo isset($plannedd)?json_encode($plannedd):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"renderAs": "area",
								"showValues": "1",
								"data": <?php echo isset($filledd)?json_encode($filledd):'[]'; ?>
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
				distChart.render();
			});
			//Function for drill down data
			function drilldownfun(ddtype,ddvalue){
				var drilledmonths = <?php echo isset($pmonthly)?json_encode($pmonthly):''; ?>;
				var drilleddists = <?php echo isset($pdistricts)?json_encode($pdistricts):''; ?>;
				var caption = '';
				var xaxis = '';
				var catgry = '[]';
				var planneddata = '[]';
				var filleddata = '[]';
				if(ddtype=="ptype"){
					xaxis = "Month";
					catgry = monthscat;
					caption = "LQAS Checklists Planned Vs Filled ("+ddvalue+")";
					planneddata = drilledmonths["planned_"+ddvalue];
					filleddata = drilledmonths["filled_"+ddvalue];					
					drilledchart('mscombi2d','hf-trend',caption,xaxis,catgry,planneddata,filleddata);
					xaxis = "District";
					catgry = distcat;
					planneddata = drilleddists["planned_"+ddvalue];
					filleddata = drilleddists["filled_"+ddvalue];
					drilledchart('mscombi2d','districts-trend',caption,xaxis,catgry,planneddata,filleddata);
				}else{
					catgry = prgrmscat;
					//work remaining for monthly drill down
					planneddata = <?php echo isset($plannedm)?json_encode($plannedm):'[]'; ?>;
					filleddata = <?php echo isset($filledm)?json_encode($filledm):'[]'; ?>;
				}
			}
			//fusion chart settings
			function drilledchart(type,divid,caption,xaxis,catgry,planneddata,filleddata){
				FusionCharts.ready(function() {
					var ddChart = new FusionCharts({
						type: type,
						renderAt: divid,
						width: '100%',
						height: '400',
						dataFormat: 'json',
						dataSource: {
							"chart": {
								"caption": caption,
								"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
								"xaxisname": xaxis,
								"yaxisname": "Values (in Numbers)",
								"theme": "fint",
								"exportEnabled": "1"
							},
							"categories": [
								{
									"category": catgry
								}
							],
							"dataset": [
								{
									"seriesname": "Checklists Planned",
									"showValues": "1",
									"data": planneddata
								},
								{
									"seriesname": "Checklists Filled",
									"renderAs": "area",
									"showValues": "1",
									"data": filleddata
								}
							]
						}
					}).render();
				});
			}
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