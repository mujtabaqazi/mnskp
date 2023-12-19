<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checklists :: Dashboard-Integrated Monitoring</title>
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
		<?php if(isset($domain) && ($domain!='dhis')){ ?>
		<?php $this->load->view("dashboard/templates/top_banner"); ?>	
		<div class="app-container expanded">
			<div class="row content-container">            
				<?php $this->load->view("dashboard/templates/sub_banner"); ?>	
				<?php $this->load->view("dashboard/templates/menu"); ?>	
				<?php }else{ ?>
				<div style="margin-left: 1%;">
				<nav class="navbar" style="margin-left: -5%;">
					<div class="container-fluid">
						<div class="navbar-header" style="width:100%">
							<h2>
								<ol class="breadcrumb navbar-breadcrumb">Executive Dashboard Khyber Pakhtunkhwa</ol>
							</h2>
						</div>	
					</div>
				</nav>
				<nav class="navbar" style="margin-left: -5%;">
					<div class="container-fluid">
						<div class="navbar-header" style="width:100%">
							<ol class="breadcrumb navbar-breadcrumb">
								<li class="active"><?php echo (isset($pagetitle))?$pagetitle:""; ?></li>
							</ol>
						</div>
					</div>
				</nav>
				</div>
				<?php } ?>
				<!-- Main Content -->
				<div class="container-fluid">
					<div class="side-body">
						<?php $this->load->view("dashboard/checklists/headRowFilter"); ?>	
						<br>
						<div class="row animated fadeInUp">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div id="sections-chart">Sections Wise Comparison chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<?php if(isset($distcode) && $distcode>0){}else{ ?>						
						<div class="row animated fadeInUp">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div id="districts-chart">Districts Wise Planned Filled chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<?php } ?>
						<div class="row animated fadeInUp" id="go-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="go-num-fac" class="col-xs-8">General outlook Availablility (Outlook Wise) chart will render here</div>
											<div class="col-xs-4">
												<div class="row zp">
													<div id="go-score-fac-pie" class="col-xs-12 zp">General Outlook (Percentage Wise) Pie chart will render here</div>
												</div>
												<div class="row zp">
													<div id="go-score-fac-bar" class="col-xs-12 zp">General Outlook (Percentage Wise) Bar chart will render here</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp" id="mi-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="mi-num-fac" class="col-xs-8">Managerial Instruments Availablility (Instrument Wise) chart will render here</div>
											<div class="col-xs-4">
												<div class="row zp">
													<div id="mi-score-fac-pie" class="col-xs-12 zp">Managerial Instruments Availablility (Percentage Wise) Pie chart will render here</div>
												</div>
												<div class="row zp">
													<div id="mi-score-fac-bar" class="col-xs-12 zp">Managerial Instruments Availablility (Percentage Wise) Bar chart will render here</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp" id="rc-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="rc-num-fac" class="col-xs-6">Resources and Communication Availablility Vs Functionality (Item Wise) chart will render here</div>
											<div class="col-xs-6">
												<div class="row zp">
													<div id="rca-score-fac" class="col-xs-10 zp">Resources and Communication Availablility (Percentage Wise) chart will render here</div>
												</div>
												<div class="row zp">
													<div id="rcf-score-fac" class="col-xs-10 zp">Resources and Communication Functionality (Percentage Wise) chart will render here</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp" id="gs-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="gs-num-fac" class="col-xs-8">General Services Availablility (Service Wise) chart will render here</div>
											<div class="col-xs-4">
												<div class="row zp">
													<div id="gs-score-fac-pie" class="col-xs-12 zp">General Services Availablility (Percentage Wise) Pie chart will render here</div>
												</div>
												<div class="row zp">
													<div id="gs-score-fac-bar" class="col-xs-12 zp">General Services Availablility (Percentage Wise) Bar chart will render here</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp" id="ss-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="ss-num-fac" class="col-xs-8">Specific Services Availablility (Service Wise) chart will render here</div>
											<div class="col-xs-4">
												<div class="row zp">
													<div id="ss-score-fac-pie" class="col-xs-12 zp">Specific Services Availablility (Percentage Wise) Pie chart will render here</div>
												</div>
												<div class="row zp">
													<div id="ss-score-fac-bar" class="col-xs-12 zp">Specific Services Availablility (Percentage Wise) Bar chart will render here</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<div class="row animated fadeInUp" id="pp-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="pp-num-fac" class="col-xs-8">Preventive Programs Availablility (Program Wise) chart will render here</div>
											<div class="col-xs-4">
												<div class="row zp">
													<div id="pp-score-fac-pie" class="col-xs-12 zp">Preventive Programs Availablility (Percentage Wise) Pie chart will render here</div>
												</div>
												<div class="row zp">
													<div id="pp-score-fac-bar" class="col-xs-12 zp">Preventive Programs Availablility (Percentage Wise) Bar chart will render here</div>
												</div>
											</div>											
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<?php if(isset($distcode) && $distcode>0){}else{ ?>
						<div class="row animated fadeInUp" id="drilleddiv" style="display:none;">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div id="districts-drilled-chart">Districts wise drill down of individual item chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->
						<?php } ?>
					</div><!--end of sidebody-->
				</div>
			</div>
			<?php if(isset($domain) && ($domain!='dhis')){ ?>
			<?php $this->load->view("dashboard/templates/footer"); ?>
			<?php } ?>
		</div>
        <!-- Javascript Libs -->
		<?php $this->load->view("dashboard/templates/scripts"); ?>
		<?php $this->load->view("dashboard/templates/charts"); ?>
		<script type="text/javascript">
			var distcat = <?php echo isset($districts)?json_encode($districts):'[]'; ?>;
			FusionCharts.ready(function () {
				//
				<?php if(isset($distcode) && $distcode>0){}else{ ?>
				var districtsChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_districts-chart',
					renderAt: 'districts-chart',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Districts Wise Planned Vs Filled Comparison",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?> ",
							"xaxisname": "Districts",
							"yaxisname": "Values (in Numbers)",
							"theme": "fint",
							"exportEnabled": "1"
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
								"data": <?php echo isset($planned)?json_encode($planned):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"showValues": "1",
								"renderAs": "area",
								"data": <?php echo isset($filled)?json_encode($filled):'[]'; ?>
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
				districtsChart.render();
				<?php } ?>
				
				//function for single series bar graph
				function singleserieschart(renderat,caption,xaxisname,catsdata,seriestitle,seriesdata){
					new FusionCharts({
						type: 'mscombi2d',
						renderAt: renderat,
						width: '100%',
						height: '400',
						dataFormat: 'json',
						dataSource: {
							"chart": {
								"caption": caption,
								"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
								"xaxisname": xaxisname,
								"yaxisname": "# of Facilities",
								"showLegend": "0",
								"theme": "fint",
								"rotateValues": "1",
								"placevaluesInside": "1",
								"valueFontColor": "#FFFFFF",
								"valueFontSize": "12",
								"exportEnabled": "1",
								"slantLabels": "1",
								"labelDisplay": "rotate",
								"baseFont": "Helvetica Neue,Arial",
								"YAxisMaxValue": "<?php echo $totfilled+floor($totfilled*10/100); ?>"
							},
							"categories": [
								{
									"category": catsdata
								}
							],
							"annotations": {
								"origw": "400",
								"origh": "190",
								"autoscale": "1",
								"groups": [
									{
										"id": "range",
										"items": [
											{
												"type": "Text",
												"fillcolor": "#333333",
												"label": "%age of Facilities",
												"align": "right",
												"vAlign": "middle",
												"rotateText": "1",
												"x": "$chartEndX-23",
												"y": "$chartCenterY-50"
											}
										]
									}
								]
							},
							"trendlines": [
								{
									"line": [
										{
											"startvalue": "<?php echo $totfilled; ?>",
											"valueonright": "1",
											"color": "#006600",
											"displayvalue": "Total - <?php echo $totfilled; ?>",
											"showontop": "1",										
											"trendValueFontBold": "1",
											"trendValueFontItalic": "1",
											"thickness": "2"
										},									
										{
											"startvalue": "<?php echo floor($totfilled*20/100); ?>",
											"color": "#CC0000",
											"valueOnRight": "1",
											"trendValueFontBold": "1",
											"displayvalue": "20%",
											"thickness": "2"
										},									
										{
											"startvalue": "<?php echo floor($totfilled*40/100); ?>",
											"color": "#fda813",
											"valueOnRight": "1",
											"trendValueFontBold": "1",
											"displayvalue": "40%",
											"thickness": "2"
										},									
										{
											"startvalue": "<?php echo floor($totfilled*60/100); ?>",
											"color": "#FF8000",
											"valueOnRight": "1",
											"trendValueFontBold": "1",
											"displayvalue": "60%",
											"thickness": "2"
										},									
										{
											"startvalue": "<?php echo floor($totfilled*80/100); ?>",
											"color": "#8BD100",
											"valueOnRight": "1",
											"trendValueFontBold": "1",
											"displayvalue": "80%",
											"thickness": "2"
										}								
									]
								}
							],
							"dataset": [
								{
									"seriesname": seriestitle,
									"showValues": "1",
									"data": seriesdata
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
					}).render();
				}
				//
				//function for single series bar/pie etc graph with coloured bars 
				function singleseriescolouredchart(typee,renderat,caption,xaxisname,catsdata,seriestitle,seriesdata,itemname){
					FusionCharts.ready(function() {
						new FusionCharts({
							type: typee,
							renderAt: renderat,
							width: '106%',
							height: '200',
							dataFormat: 'json',
							dataSource: {
								"chart": {
									"caption": caption,
									"subCaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
									"xaxisname": xaxisname,
									"yAxisName": "# of "+itemname,
									"showLegend": (typee=="doughnut3d")?"1":"0",
									"showLabels": (typee=="doughnut3d")?"0":"1",
									"legendPosition": "right",
									"theme": "fint",
									"valueFontSize": "12",
									"exportEnabled": "1",
									"slantLabels": "1",
									"baseFont": "Helvetica Neue,Arial",
									"showPercentValues": "1",
									"showPercentInTooltip": "0",
									"useDataPlotColorForLabels": "1"
								},
								"categories": [
									{
										"category": catsdata
									}
								],
								"dataset": [
									{
										"seriesname": seriestitle,
										"showValues": "1",
										"data": seriesdata
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
						}).render();
					});
				}
				//
				//function for single series bar graph with thumbnails as pie etc
				function singleserieschartwiththumb(renderat,caption,xaxisname,catsdata,seriestitle,seriesdata,shortname){
					new FusionCharts({
						type: 'mscombi2d',
						renderAt: renderat,
						width: '100%',
						height: '400',
						dataFormat: 'json',
						dataSource: {
							"chart": {
								"caption": caption,
								"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
								"xaxisname": xaxisname,
								"yAxisName": "# of Facilities",
								"showLegend": "0",
								"theme": "fint",
								"valueFontSize": "12",
								"exportEnabled": "1",
								"slantLabels": "1",
								"baseFont": "Helvetica Neue,Arial",
								"showPercentValues": "1",
								"showPercentInTooltip": "0"
							},
							"categories": [
								{
									"category": catsdata
								}
							],
							"dataset": [
								{
									"seriesname": seriestitle,
									"showValues": "1",
									"data": seriesdata
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
						},
						events: {
							'beforeRender': function(evt, args) {
								var thumbnails = document.createElement('div');
								thumbnails.classList.add("col-xs-3");
								thumbnails.classList.add("zp");
								thumbnails.innerHTML = '<div class="thumbs" id="'+shortname+'-thumbnail-column"></div><div class="thumbs" id="'+shortname+'-thumbnail-pie"></div><div class="thumbs" id="'+shortname+'-thumbnail-bar"></div></div>';
								thumbnails.style.cssText = 'display:inline-block; float:right;';
								args.container.parentNode.insertBefore(thumbnails, args.container.nextSibling);
								args.container.style.cssText = 'padding:5px; font-size:11px; display:inline-block; float:left; clear:right;';
							},
							'renderComplete': function(evt, args) {
								var createThumbNail = function(chartId, width, height, divId) {
									var chartRef = FusionCharts(chartId),
										clonedChart = chartRef.clone({
											"width": width,
											"height": height,
											"events": {}
										});
									clonedChart.setChartAttribute({
										"showValues": "0",
										"rotateValues": "0",
										"placevaluesInside": "0",
										"showLabels": "0",
										"animation": "1",
										"exportEnabled": "0",
										"showTooltip": "1",
										"showHoverEffect": "1",
										"showYAxisValues": "0",
										"caption": "",
										"subCaption": "",
										"xAxisName": "",
										"yAxisName": "",
										"showXAxisLine": "0",
										"showYAxisLine": "0",
										"numDivLines": "0",
										"enableSlicing": "0",
										"enableRotation": "0"
									});
									clonedChart.addEventListener('chartClick', function() {
										if (chartId != evt.sender.id) {
											FusionCharts(chartId).render(args.container);
										}
									});
									clonedChart.render(divId);
								};
								var revenueChartColumn = evt.sender.clone({
									id: shortname+'-chart-column',
									events: {}
								});
								var revenueChartPie = evt.sender.clone({
									type: 'doughnut2d',
									id: shortname+'-chart-pie',
									events: {}
								});
								var revenueChartBar = evt.sender.clone({
									type: 'bar2d',
									id: shortname+'-chart-bar',
									events: {}
								});
								createThumbNail(shortname+'-chart-column', 130, 100, shortname+'-thumbnail-column');
								createThumbNail(shortname+'-chart-pie', 130, 100, shortname+'-thumbnail-pie');
								createThumbNail(shortname+'-chart-bar', 130, 100, shortname+'-thumbnail-bar');
							}
						}
					}).render();
				}
				//General Outlooks (Item wise) bar graph
				singleserieschart(
					'go-num-fac',
					"General Outlooks",
					"General Outlooks (Item Wise)",
					<?php echo isset($gotools_cats)?json_encode($gotools_cats):'[]'; ?>,
					"Facilities With Outlook Available",
					<?php echo isset($gotools_num)?json_encode($gotools_num):'[]'; ?>
				);
				//
				singleseriescolouredchart(
					'doughnut3d','go-score-fac-pie',
					"General Outlooks",
					"General Outlooks %age (Section Wise)",
					<?php echo isset($goscores_cats)?json_encode($goscores_cats):'[]'; ?>,
					"Facilities With Outlook Available",
					<?php echo isset($goscores_num)?json_encode($goscores_num):'[]'; ?>,
					'Facilities'
				);
				//
				singleseriescolouredchart(
					'mscombi2d',
					'go-score-fac-bar',
					"General Outlooks",
					"General Outlooks %age (Section Wise)",
					<?php echo isset($goscores_cats)?json_encode($goscores_cats):'[]'; ?>,
					"Facilities With Outlook Available",
					<?php echo isset($goscores_num)?json_encode($goscores_num):'[]'; ?>,
					'Facilities'
				);
				//Managerial Instruments (Item wise) bar graph
				singleserieschart('mi-num-fac',"Managerial Instruments Availability","Managerial Instruments (Item Wise)",<?php echo isset($mitools_cats)?json_encode($mitools_cats):'[]'; ?>,"Facilities With Instrument Available",<?php echo isset($mitools_num)?json_encode($mitools_num):'[]'; ?>);
				//
				singleseriescolouredchart('doughnut3d','mi-score-fac-pie',"Managerial Instruments Availability","Managerial Instruments %age (Section Wise)",<?php echo isset($miscores_cats)?json_encode($miscores_cats):'[]'; ?>,"Facilities With Instrument Available",<?php echo isset($miscores_num)?json_encode($miscores_num):'[]'; ?>,'Facilities');
				//
				singleseriescolouredchart('mscombi2d','mi-score-fac-bar',"Managerial Instruments Availability","Managerial Instruments %age (Section Wise)",<?php echo isset($miscores_cats)?json_encode($miscores_cats):'[]'; ?>,"Facilities With Instrument Available",<?php echo isset($miscores_num)?json_encode($miscores_num):'[]'; ?>,'Facilities');
				//General Services (Service wise) bar graph
				singleserieschart('gs-num-fac',"General Services Availability","General Services (Service Wise)",<?php echo isset($gstools_cats)?json_encode($gstools_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($gstools_num)?json_encode($gstools_num):'[]'; ?>);
				//
				singleseriescolouredchart('doughnut3d','gs-score-fac-pie',"General Services Availablility","General Services %age (Section Wise)",<?php echo isset($gsscores_cats)?json_encode($gsscores_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($gsscores_num)?json_encode($gsscores_num):'[]'; ?>,'Facilities');
				//
				singleseriescolouredchart('mscombi2d','gs-score-fac-bar',"General Services Availablility","General Services %age (Section Wise)",<?php echo isset($gsscores_cats)?json_encode($gsscores_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($gsscores_num)?json_encode($gsscores_num):'[]'; ?>,'Facilities');
				//Specific Services (Service wise) bar graph
				singleserieschart('ss-num-fac',"Specific Services Availability","Specific Services (Service Wise)",<?php echo isset($sstools_cats)?json_encode($sstools_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($sstools_num)?json_encode($sstools_num):'[]'; ?>);
				//Specific Services percentage wise pie graph
				singleseriescolouredchart('doughnut3d','ss-score-fac-pie',"Specific Services Availability","Specific Services %age (Section Wise)",<?php echo isset($ssscores_cats)?json_encode($ssscores_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($ssscores_num)?json_encode($ssscores_num):'[]'; ?>,'Facilities');
				//Specific Services percentage wise bar graph
				singleseriescolouredchart('mscombi2d','ss-score-fac-bar',"Specific Services Availability","Specific Services %age (Section Wise)",<?php echo isset($ssscores_cats)?json_encode($ssscores_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($ssscores_num)?json_encode($ssscores_num):'[]'; ?>,'Facilities');
				//Preventive Programs (Program wise) bar graph
				singleserieschart('pp-num-fac',"Preventive Programs Availability","Preventive Programs (Service Wise)",<?php echo isset($pptools_cats)?json_encode($pptools_cats):'[]'; ?>,"Facilities With Service Available",<?php echo isset($pptools_num)?json_encode($pptools_num):'[]'; ?>);
				//Preventive Programs percentage wise pie graph
				singleseriescolouredchart('doughnut3d','pp-score-fac-pie',"Preventive Programs Availability","Preventive Programs %age (Program Wise)",<?php echo isset($ppscores_cats)?json_encode($ppscores_cats):'[]'; ?>,"Facilities With Program Available",<?php echo isset($ppscores_num)?json_encode($ppscores_num):'[]'; ?>,'Facilities');
				//Preventive Programs percentage wise bar graph
				singleseriescolouredchart('mscombi2d','pp-score-fac-bar',"Preventive Programs Availability","Preventive Programs %age (Program Wise)",<?php echo isset($ppscores_cats)?json_encode($ppscores_cats):'[]'; ?>,"Facilities With Program Available",<?php echo isset($ppscores_num)?json_encode($ppscores_num):'[]'; ?>,'Facilities');
				//
				var rcNumFacChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_rc-num-fac_chart',
					renderAt: 'rc-num-fac',
					width: '100%',
					height: '450',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Resources & Communication",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Resources and Communication Availablility Vs Functionality (Item Wise)",
							"yaxisname": "# of Facilities",
							"showLegend": "1",
							"theme": "fint",
							"rotateValues": "1",
							"placevaluesInside": "1",
							"valueFontColor": "#FFFFFF",
							"valueFontSize": "12",
							"exportEnabled": "1",
							"slantLabels": "1",
							"labelDisplay": "rotate",
							"baseFont": "Helvetica Neue,Arial",
							"YAxisMaxValue": "<?php echo $totfilled+floor($totfilled*10/100); ?>"
						},
						"categories": [
							{
								"category": <?php echo isset($rctools_cats)?json_encode($rctools_cats):'[]'; ?>
							}
						],
						"annotations": {
							"origw": "400",
							"origh": "190",
							"autoscale": "1",
							"groups": [
								{
									"id": "range",
									"items": [
										{
											"type": "Text",
											"fillcolor": "#333333",
											"label": "%age of Facilities",
											"align": "right",
											"vAlign": "middle",
											"rotateText": "1",
											"x": "$chartEndX-23",
											"y": "$chartCenterY-55"
										}
									]
								}
							]
						},
						"trendlines": [
							{
								"line": [
									{
										"startvalue": "<?php echo $totfilled; ?>",
										"valueonright": "1",
										"color": "#006600",
										"displayvalue": "Total - <?php echo $totfilled; ?>",
										"showontop": "1",										
										"trendValueFontBold": "1",
										"trendValueFontItalic": "1",
										"thickness": "2"
									},									
									{
										"startvalue": "<?php echo floor($totfilled*20/100); ?>",
										"color": "#CC0000",
										"valueOnRight": "1",
										"trendValueFontBold": "1",
										"displayvalue": "20%",
										"thickness": "2"
									},									
									{
										"startvalue": "<?php echo floor($totfilled*40/100); ?>",
										"color": "#fda813",
										"valueOnRight": "1",
										"trendValueFontBold": "1",
										"displayvalue": "40%",
										"thickness": "2"
									},									
									{
										"startvalue": "<?php echo floor($totfilled*60/100); ?>",
										"color": "#FF8000",
										"valueOnRight": "1",
										"trendValueFontBold": "1",
										"displayvalue": "60%",
										"thickness": "2"
									},									
									{
										"startvalue": "<?php echo floor($totfilled*80/100); ?>",
										"color": "#8BD100",
										"valueOnRight": "1",
										"trendValueFontBold": "1",
										"displayvalue": "80%",
										"thickness": "2"
									}								
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Facilities With Item Available",
								"showValues": "1",
								"data": <?php echo isset($rctools_num)?json_encode($rctools_num):'[]'; ?>
							},
							{
								"seriesname": "Facilities With Item Functional",
								"showValues": "1",
								"data": <?php echo isset($rcftools_num)?json_encode($rcftools_num):'[]'; ?>
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
				rcNumFacChart.render();
				//
				var rcaScoreFacChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_rca-score-fac_chart',
					renderAt: 'rca-score-fac',
					width: '100%',
					height: '220',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Resources & Communication Availability",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Resources & Communication Availability %age (Section Wise)",
							"yAxisName": "# of Facilities",
							"showLegend": "0",
							"theme": "fint",
							"valueFontSize": "12",
							"exportEnabled": "1",
							"slantLabels": "1",
							"labelDisplay": "rotate",
							"showPercentValues": "1",
							"showPercentInTooltip": "0",
							"baseFont": "Helvetica Neue,Arial"
						},
						"categories": [
							{
								"category": <?php echo isset($rcscores_cats)?json_encode($rcscores_cats):'[]'; ?>
							}
						],
						"dataset": [
							{
								"seriesname": "Facilities With Item Available",
								"showValues": "1",
								"data": <?php echo isset($rcscores_num)?json_encode($rcscores_num):'[]'; ?>
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
					},
					events: {
						'beforeRender': function(evt, args) {
							var thumbnails = document.createElement('div');
							thumbnails.classList.add("col-xs-2");
							thumbnails.classList.add("zp");
							thumbnails.innerHTML = '<div class="thumbs" id="rca-thumbnail-column"></div><div class="thumbs" id="rca-thumbnail-pie"></div><div class="thumbs" id="rca-thumbnail-bar"></div></div>';
							thumbnails.style.cssText = 'display:inline-block; float:right;';
							args.container.parentNode.insertBefore(thumbnails, args.container.nextSibling);
							args.container.style.cssText = 'padding:5px; font-size:11px; display:inline-block; float:left; clear:right;';
						},
						'renderComplete': function(evt, args) {
							var createThumbNail = function(chartId, width, height, divId) {
								var chartRef = FusionCharts(chartId),
									clonedChart = chartRef.clone({
										"width": width,
										"height": height,
										"events": {}
									});
								clonedChart.setChartAttribute({
									"showValues": "0",
									"rotateValues": "1",
									"placevaluesInside": "1",
									"showLabels": "0",
									"animation": "1",
									"exportEnabled": "0",
									"showTooltip": "1",
									"showHoverEffect": "1",
									"showYAxisValues": "0",
									"caption": "",
									"subCaption": "",
									"xAxisName": "",
									"yAxisName": "",
									"showXAxisLine": "0",
									"showYAxisLine": "0",
									"numDivLines": "0",
									"enableSlicing": "0",
									"enableRotation": "0"
								});
								// listend for the chartClick event to render the detailed chart
								clonedChart.addEventListener('chartClick', function() {
									if (chartId != evt.sender.id) {
										FusionCharts(chartId).render(args.container);
									}
								});
								clonedChart.render(divId);
							};

							// Create instance of all charts (including current one)
							var revenueChartColumn = evt.sender.clone({
								id: 'rca-chart-column',
								events: {}
							});
							var revenueChartPie = evt.sender.clone({
								type: 'pie2d',
								id: 'rca-chart-pie',
								events: {}
							});
							var revenueChartBar = evt.sender.clone({
								type: 'bar2d',
								id: 'rca-chart-bar',
								events: {}
							});

							// create thumbnails for all the three charts
							createThumbNail('rca-chart-column', 100, 60, 'rca-thumbnail-column');
							createThumbNail('rca-chart-pie', 100, 60, 'rca-thumbnail-pie');
							createThumbNail('rca-chart-bar', 100, 60, 'rca-thumbnail-bar');
						}
					}
				});
				rcaScoreFacChart.render();
				//
				var rcfScoreFacChart = new FusionCharts({
					type: 'mscombi2d',
					id: 'moon_rcf-score-fac_chart',
					renderAt: 'rcf-score-fac',
					width: '100%',
					height: '220',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Resources & Communication Functionality",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Resources & Communication Functionality %age (Section Wise)",
							"yAxisName": "# of Facilities",
							"showLegend": "0",
							"theme": "fint",
							"valueFontSize": "12",
							"exportEnabled": "1",
							"slantLabels": "1",
							"labelDisplay": "rotate",
							"showPercentValues": "1",
							"showPercentInTooltip": "0",
							"baseFont": "Helvetica Neue,Arial"
						},
						"categories": [
							{
								"category": <?php echo isset($rcscores_cats)?json_encode($rcscores_cats):'[]'; ?>
							}
						],
						"dataset": [
							{
								"seriesname": "Facilities With Item Functional",
								"showValues": "1",
								"data": <?php echo isset($rcfscores_num)?json_encode($rcfscores_num):'[]'; ?>
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
					},
					events: {
						'beforeRender': function(evt, args) {
							var thumbnails = document.createElement('div');
							thumbnails.classList.add("col-xs-2");
							thumbnails.classList.add("zp");
							thumbnails.innerHTML = '<div class="thumbs" id="rcf-thumbnail-column"></div><div class="thumbs" id="rcf-thumbnail-pie"></div><div class="thumbs" id="rcf-thumbnail-bar"></div></div>';
							thumbnails.style.cssText = 'display:inline-block; float:right;';
							args.container.parentNode.insertBefore(thumbnails, args.container.nextSibling);
							args.container.style.cssText = 'padding:5px; font-size:11px; display:inline-block; float:left; clear:right;';
						},
						'renderComplete': function(evt, args) {
							var createThumbNail = function(chartId, width, height, divId) {
								var chartRef = FusionCharts(chartId),
									clonedChart = chartRef.clone({
										"width": width,
										"height": height,
										"events": {}
									});
								clonedChart.setChartAttribute({
									"showValues": "0",
									"rotateValues": "1",
									"placevaluesInside": "1",
									"showLabels": "0",
									"animation": "1",
									"exportEnabled": "0",
									"showTooltip": "1",
									"showHoverEffect": "1",
									"showYAxisValues": "0",
									"caption": "",
									"subCaption": "",
									"xAxisName": "",
									"yAxisName": "",
									"showXAxisLine": "0",
									"showYAxisLine": "0",
									"numDivLines": "0",
									"enableSlicing": "0",
									"enableRotation": "0"
								});
								// listend for the chartClick event to render the detailed chart
								clonedChart.addEventListener('chartClick', function() {
									if (chartId != evt.sender.id) {
										FusionCharts(chartId).render(args.container);
									}
								});
								clonedChart.render(divId);
							};

							// Create instance of all charts (including current one)
							var revenueChartColumn = evt.sender.clone({
								id: 'rcf-chart-column',
								events: {}
							});
							var revenueChartPie = evt.sender.clone({
								type: 'pie2d',
								id: 'rcf-chart-pie',
								events: {}
							});
							var revenueChartBar = evt.sender.clone({
								type: 'bar2d',
								id: 'rcf-chart-bar',
								events: {}
							});

							// create thumbnails for all the three charts
							createThumbNail('rcf-chart-column', 100, 60, 'rcf-thumbnail-column');
							createThumbNail('rcf-chart-pie', 100, 60, 'rcf-thumbnail-pie');
							createThumbNail('rcf-chart-bar', 100, 60, 'rcf-thumbnail-bar');
						}
					}
				});
				rcfScoreFacChart.render();				
				var sectionsChart = new FusionCharts({
					type: 'mscombi2d',
					renderAt: 'sections-chart',
					width: '100%',
					height: '300',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Sections Wise Comparison",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?> <?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Sections Wise Comparison (%age of section available in # of facilities out of <?php echo $totfilled; ?> Facilities)",
							"yaxisname": "# of Facilities",
							"theme": "fint",
							"exportEnabled": "1",
							"useRoundEdges": "1"
						},
						"categories": [
							{
								"category": [
									{"label": "General Outlooks","link": "JavaScript:scrolltodiv('go-block')"},
									{"label": "Managerial Instruments Availability","link": "JavaScript:scrolltodiv('mi-block')"},
									{"label": "General Services Availability","link": "JavaScript:scrolltodiv('gs-block')"},
									{"label": "Specific Services Availability","link": "JavaScript:scrolltodiv('ss-block')"},
									{"label": "Preventive Programs Availability","link": "JavaScript:scrolltodiv('pp-block')"},
									{"label": "Resources & Communication Availability","link": "JavaScript:scrolltodiv('rc-block')"},
									{"label": "Resources & Communication Functionality","link": "JavaScript:scrolltodiv('rc-block')"}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "80-100%",
								"showValues": "1",
								"color": "#006600",
								"link": "JavaScript:scrolltodiv('go-block')",
								"data": <?php echo isset($scores_num_greater80)?json_encode($scores_num_greater80):'[]'; ?>
							},
							{
								"seriesname": "60-80%",
								"showValues": "1",
								"color": "#8BD100",
								"link": "JavaScript:scrolltodiv('mi-block')",
								"data": <?php echo isset($scores_num_greater60)?json_encode($scores_num_greater60):'[]'; ?>
							},
							{
								"seriesname": "40-60%",
								"showValues": "1",
								"color": "#FF8000",
								"data": <?php echo isset($scores_num_greater40)?json_encode($scores_num_greater40):'[]'; ?>
							},
							{
								"seriesname": "20-40%",
								"showValues": "1",
								"color": "#fda813",
								"data": <?php echo isset($scores_num_greater20)?json_encode($scores_num_greater20):'[]'; ?>
							},
							{
								"seriesname": "0-20%",
								"showValues": "1",
								"color": "#CC0000",
								"data": <?php echo isset($scores_num_greater0)?json_encode($scores_num_greater0):'[]'; ?>
							}
						]
					}
           
				});
				sectionsChart.render();				
			});
			//function for single series bar graph
			function singleserieschart(renderat,caption,xaxisname,catsdata,seriestitle,seriesdata,seriesdataf,yaxisname,needtrendlines){
				FusionCharts.ready(function() {
					if(needtrendlines){
						var moontrendline = [
							{"line": 
								[
									{"startvalue": "<?php echo $totfilled; ?>","valueonright": "1","color": "#006600","displayvalue": "Total - <?php echo $totfilled; ?>","showontop": "1","trendValueFontBold": "1","trendValueFontItalic": "1","thickness": "2"},
									{"startvalue": "<?php echo floor($totfilled*20/100); ?>","color": "#CC0000","valueOnRight": "1","trendValueFontBold": "1","displayvalue": "20%","thickness": "2"},
									{"startvalue": "<?php echo floor($totfilled*40/100); ?>","color": "#fda813","valueOnRight": "1","trendValueFontBold": "1","displayvalue": "40%","thickness": "2"},
									{"startvalue": "<?php echo floor($totfilled*60/100); ?>","color": "#FF8000","valueOnRight": "1","trendValueFontBold": "1","displayvalue": "60%","thickness": "2"},
									{"startvalue": "<?php echo floor($totfilled*80/100); ?>","color": "#8BD100","valueOnRight": "1","trendValueFontBold": "1","displayvalue": "80%","thickness": "2"}
								]
							}
						];
						var maxval = <?php echo $totfilled+floor($totfilled*10/100); ?>;
						var annotationtitle = "%age of Facilities";
					}else{
						var moontrendline = [];
						var maxval = "";
						var annotationtitle = "";
					}
					if(seriesdataf){
						var dataset = 	[{"seriesname": "Facilities With Item Available","showValues": "1","data": seriesdata,"color" : "#006600"},{"seriesname": "Facilities With Item Functional","showValues": "1","data": seriesdataf,"color" : "#C0000"}];
					}else{
						var dataset = 	[{"seriesname": seriestitle,"showValues": "1","data": seriesdata}];
					}
					new FusionCharts({
						type: 'mscombi2d',
						renderAt: renderat,
						width: '100%',
						height: '440',
						dataFormat: 'json',
						dataSource: {
							"chart": {
								"caption": caption,
								"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
								"xaxisname": xaxisname,
								"yaxisname": yaxisname,
								"showLegend": "1",
								"theme": "fint",
								"rotateValues": "1",
								"placevaluesInside": "1",
								"valueFontColor": "#FFFFFF",
								"valueFontSize": "12",
								"exportEnabled": "1",
								"slantLabels": "1",
								"labelDisplay": "rotate",
								"baseFont": "Helvetica Neue,Arial",
								"YAxisMaxValue": maxval
							},
							"categories": [
								{
									"category": catsdata
								}
							],
							"annotations": {
								"origw": "400",
								"origh": "190",
								"autoscale": "1",
								"groups": [
									{
										"id": "range",
										"items": [
											{
												"type": "Text",
												"fillcolor": "#333333",
												"label": annotationtitle,
												"align": "right",
												"vAlign": "middle",
												"rotateText": "1",
												"x": "$chartEndX-23",
												"y": "$chartCenterY-74"
											}
										]
									}
								]
							},
							"trendlines": moontrendline,
							"dataset": dataset,
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
					}).render();
				});
			}
			//
			<?php if(isset($distcode) && $distcode>0){}else{ ?>
			var alldrilled = <?php echo isset($singletooldist)?json_encode($singletooldist):'[]'; ?>;
			//Function for drill down data
			function drilldownfun(ddtype,ddvalue,title){
				$("#drilleddiv").css("display","block");
				var distcat1 = distcat.slice(0, -1);
				var xaxis = '';
				var catgry = '[]';
				var datatoshow = '[]';
				if(ddtype=="district"){
					xaxis = "Districts";
					catgry = distcat1;
					singleitemdata = alldrilled[ddvalue];
					singleserieschart(
						'districts-drilled-chart',
						title,
						xaxis,
						catgry,
						"",
						singleitemdata,
						false,
						'%age of Facilities',
						false
					);
					scrolltodiv('drilleddiv');
				}
			}
			//Function for drill down data
			function drilldownfun1(ddtype,ddvalue,ddvaluef,title){
				$("#drilleddiv").css("display","block");
				var distcat1 = distcat.slice(0, -1);
				var xaxis = '';
				var catgry = '[]';
				var datatoshow = '[]';
				if(ddtype=="district"){
					xaxis = "Districts";
					catgry = distcat1;
					singleitemdata = alldrilled[ddvalue];
					singleitemdataf = alldrilled[ddvaluef];
					singleserieschart(
						'districts-drilled-chart',
						title,
						xaxis,
						catgry,
						"",
						singleitemdata,
						singleitemdataf,
						'%age of Facilities',
						false
					);
					scrolltodiv('drilleddiv');
				}
			}
			<?php } ?>
			//Function for drill down data
			var newWindow = '';
			function func_list(checklist,distcode,seccname){
				$.ajax({
					type:'POST',
					data: ($('#filter-form').serialize())+"&distcode="+distcode+"&checklistname="+checklist+"&secname="+seccname,
					url:"<?php echo base_url(); ?>dashboard/checklists/lhwlist",
					success:function(htmlresult){
						var htmlforPop = htmlresult;
						if(newWindow!=''){
							newWindow.close();
						}
						newWindow = window.open("","_blank");
						newWindow.document.write(htmlforPop);
					}
				});
			}
			function districtview(distcode){
				$('<form id="tempform" action="'+$('#filter-form').attr("action")+'" method="POST" target="_blank">'+'<input type="hidden" name="distcode" value="' + distcode + '">'+$('#filter-form').html()+'</form>').appendTo($(document.body)).submit();
				$("#tempform").remove();	
			}
			$('#<?php echo $attr; ?>').on('change' , function (event){
				var name = $('#checklist').find(':selected').data('short');
				//$("#filter-form").submit();
				$('#filter-form').attr('action', "<?php echo $basePath; ?>dashboard/checklists/imc_"+name).submit();
			});			
			$('input[type=radio][name=frequency]').on('change' , function (event){
				var name = $('#checklist').find(':selected').data('short');
				var freq = this.value;
				if(freq=="m"){
					$(".period").html('<?php echo getFmonthIncludingCurrentMonth_options(false,(isset($frequency) && isset($period) && $frequency=="m")?$period:NULL); ?>');
					$(".period").attr("name","fmonth");
					$(".period").attr("id","fmonth");
				}
				if(freq=="q"){
					$(".period").html('<?php echo getAllQuarterOptions(false,(isset($frequency) && isset($period) && $frequency=="q")?$period:NULL); ?>');
					$(".period").attr("name","qmonth");
					$(".period").attr("id","qmonth");
				}
				if(freq=="fy"){
					$(".period").html('<?php echo getAllfiscalYearsOptions(false,(isset($frequency) && isset($period) && $frequency=="fy")?$period:NULL); ?>');
					$(".period").attr("name","fyear");
					$(".period").attr("id","fyear");
				}
				if(freq=="y"){
					$(".period").html('<?php echo getAllYearsOptions(false,(isset($frequency) && isset($period) && $frequency=="y")?$period:NULL); ?>');
					$(".period").attr("name","fyear");
					$(".period").attr("id","fyear");
				}
				//$("#filter-form").submit();
				$('#filter-form').attr('action', "<?php echo $basePath; ?>dashboard/checklists/imc_"+name).submit();
			});
			$('#checklist').on('change' , function (event){
				var name = $('#checklist').find(':selected').data('short');
				$('#filter-form').attr('action', "<?php echo $basePath; ?>dashboard/checklists/imc_"+name).submit();
				//$("#filter-form").submit();
			});
		</script>
	</body>
</html>