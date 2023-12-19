<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checklists :: Dashboard-EPI Services</title>
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
			.score{
				margin-top: 48px;
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
						<div class="row animated fadeInUp" id="rc-block">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body" style="padding: 5px 25px 0px 5px">
										<div class="row">
											<div id="rc-num-fac" class="col-xs-6">General Services – Indoor Ward chart will render here</div>
											<div class="col-xs-6">
												<div class="row zp">
													<div id="rca-score-ma" class="col-xs-10 zp">Indoor Ward Male Availablility (Percentage Wise) chart will render here</div>
												</div>
												<div class="row zp">
													<div id="rcf-score-fe" class="col-xs-10 zp">Indoor Ward Female Availablility (Percentage Wise) chart will render here</div>
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
											<div id="fi-num-fac" class="col-xs-7">General Services – Indoor Ward Furniture & Instruments  Availablility chart will render here
											</div>
											<div class="col-xs-5">
												<div class="row zp">
													<div id="fim-score-ma" class="col-xs-8 zp">Indoor Ward Male Availablility (Percentage Wise) chart will render here</div>
												</div>
												<div class="row zp">
													<div id="fif-score-fe" class="col-xs-8 zp">Indoor Ward Female Availablility (Percentage Wise) chart will render here</div>
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
			<?php if($ulevel<=2){ ?>
				var distcat = <?php echo isset($districts)?json_encode($districts):'[]'; ?>;
			<?php } ?>
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
								"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?>",
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
			 });
			//function for single series bar/pie etc graph with coloured bars 
			function singleseriescolouredchart(typee,renderat,caption,xaxisname,catsdata,seriestitle,seriesdata,itemname){
				FusionCharts.ready(function() {
					new FusionCharts({
						type: typee,
						renderAt: renderat,
						width: '100%',
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
				
				doubleserieschart(
						'rc-num-fac',
						'Indoor Ward Availablility',
						'Indoor Ward Availablility Male vs Female',
						<?php echo isset($indtools_cats)?json_encode($indtools_cats):'[]'; ?>,
						'Facilities with Male Wards Available',
						'Facilities with Female Wards Available',
						<?php echo isset($indtools_num)?json_encode($indtools_num):'[]'; ?>,
						<?php echo isset($indftools_num)?json_encode($indftools_num):'[]'; ?>,
						'moon_rc-num-fac_chart',
						'100%',
						'450'
				);
				doubleserieschart(
						'fi-num-fac',
						'Indoor Ward Furniture & Instruments Availablility',
						'Indoor Ward Furniture & Instruments Availablility Male vs Female',
						<?php echo isset($fitools_cats)?json_encode($fitools_cats):'[]'; ?>,
						'Facilities with Furniture & Instruments Male Available',
						'Facilities with Furniture & Instruments Female Available',
						<?php echo isset($fitools_num)?json_encode($fitools_num):'[]'; ?>,
						<?php echo isset($fiftools_num)?json_encode($fiftools_num):'[]'; ?>,
						'moon_fi-num-fac_chart',
						'100%',
						'470'
					);
				function doubleserieschart(renderat,caption,xaxisname,catsdata,seriestitle1st,seriestitle2nd,seriesdata1st,seriesdata2nd,id,Width,Height){
					FusionCharts.ready(function() {
						new FusionCharts({
						type: 'mscombi2d',
						id: id,
						renderAt: renderat,
						width: Width,
						height: Height,
						dataFormat: 'json',
						dataSource: {
							"chart": {
								"caption": caption,
								"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
								"xaxisname": xaxisname,
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
									"seriesname": seriestitle1st,
									"showValues": "1",
									"data": seriesdata1st
								},
								{
									"seriesname": seriestitle2nd,
									"showValues": "1",
									"data": seriesdata2nd
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
				singleseriesSectionchart(
						'rca-score-ma',
						'Indoor Ward Availability Male',
						'Indoor Wards Availability Male %age (Section Wise)',
						<?php echo isset($indscores_cats)?json_encode($indscores_cats):'[]'; ?>,
						'Facilities With Male Indoor Wards Available',
						<?php echo isset($indscores_num)?json_encode($indscores_num):'[]'; ?>,
						'moon_rca-score-fac_chart',
						'100%',
						'220'
				);
				singleseriesSectionchart(
						'rcf-score-fe',
						'Indoor Ward Availability Female',
						'Indoor Wards Availability Female %age (Section Wise)',
						<?php echo isset($indfscores_cats)?json_encode($indfscores_cats):'[]'; ?>,
						'Facilities With Female Indoor Wards Available',
						<?php echo isset($indfscores_num)?json_encode($indfscores_num):'[]'; ?>,
						'moon_rcf-score-fac_chart',
						'100%',
						'220'
				);
				singleseriesSectionchart(
						'fim-score-ma',
						'Furniture & Instruments Availability Male',
						'Furniture & Instruments Availability Male %age',
						<?php echo isset($fiscores_cats)?json_encode($fiscores_cats):'[]'; ?>,
						'Facilities With Male Indoor Wards Available',
						<?php echo isset($fiscores_num)?json_encode($fiscores_num):'[]'; ?>,
						'moon_fim-score-fac_chart',
						'95%',
						'260'
				);
				singleseriesSectionchart(
						'fif-score-fe',
						'Furniture & Instruments Availability Female',
						'Furniture & Instruments Availability Female %age',
						<?php echo isset($fifscores_cats)?json_encode($fifscores_cats):'[]'; ?>,
						'Facilities With Female Indoor Wards Available',
						<?php echo isset($fifscores_num)?json_encode($fifscores_num):'[]'; ?>,
						'moon_fif-score-fac_chart',
						'95%',
						'260'
				);
				function singleseriesSectionchart(renderat,caption,xaxisname,catsdata,seriestitle1st,seriesdata1st,id,Width,Height){
					var key = renderat.split("-");
					key = key[0];
					FusionCharts.ready(function() {
						new FusionCharts({
						type: 'mscombi2d',
						id: id,
						renderAt: renderat,
						width: Width,
						height: Height,
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
								"labelDisplay": "rotate",
								"showPercentValues": "1",
								"showPercentInTooltip": "0",
								"baseFont": "Helvetica Neue,Arial"
							},
							"categories": [
								{
									"category": catsdata
								}
							],
							"dataset": [
								{
									"seriesname": seriestitle1st,
									"showValues": "1",
									"data": seriesdata1st
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
								if(key=="fim" || key=="fif"){
									thumbnails.classList.add("col-xs-4");
									thumbnails.classList.add("score");
								}else{
									thumbnails.classList.add("col-xs-2");
								}
								thumbnails.classList.add("zp");
								
								thumbnails.innerHTML = '<div class="thumbs" id="'+key+'-thumbnail-column"></div><div class="thumbs" id="'+key+'-thumbnail-pie"></div><div class="thumbs" id="'+key+'-thumbnail-bar"></div></div>';
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
									id: ''+key+'-chart-column',
									events: {}
								});
								var revenueChartPie = evt.sender.clone({
									type: 'pie2d',
									id: ''+key+'-chart-pie',
									events: {}
								});
								var revenueChartBar = evt.sender.clone({
									type: 'bar2d',
									id: ''+key+'-chart-bar',
									events: {}
								});

								// create thumbnails for all the three charts
								createThumbNail(''+key+'-chart-column', 100, 60, ''+key+'-thumbnail-column');
								createThumbNail(''+key+'-chart-pie', 100, 60, ''+key+'-thumbnail-pie');
								createThumbNail(''+key+'-chart-bar', 100, 60, ''+key+'-thumbnail-bar');
							}
						}
					}).render();
					});
				}
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
						var dataset = 	[{"seriesname": "Facilities with Male Ward Available","data": seriesdata,"color" : "#006600"},{"seriesname": "Facilities with Female Indoor Ward Available","data": seriesdataf,"color" : "#C0000"}];
					}else{
						var dataset = 	[{"seriesname": seriestitle,"data": seriesdata}];
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
								"showValues": "1",
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
				/* function drilldownfun(ddtype,ddvalue,title){
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
							'%age of Facilities',
							false
						);
						scrolltodiv('drilleddiv');
					}
				} */
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
			//Function for drill down data also func name change from lhwlist to func_list
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
			//end
			$('#<?php echo $attr; ?>').on('change' , function (event){
				var name = $('#checklist').find(':selected').data('short');
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