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
		<!--start of all style files -->
		<?php $this->load->view("dashboard/templates/styles"); ?>
		<!--style by bilal-->
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
		<!--style by bilal-->		
		<!--end of all style files-->
	</head>
	<body class="flat-blue">
		<!--start of top banner-->
		<?php $this->load->view("dashboard/templates/top_banner"); ?>	
		<!--end of top banner-->
		<div class="app-container expanded">
			<div class="row content-container">            
				<!--start of small banner used to toggle menu-->
				<?php $this->load->view("dashboard/templates/sub_banner"); ?>	
				<!--End of small banner used to toggle menu-->
				<!--start of Side bar menu-->
				<?php $this->load->view("dashboard/templates/menu"); ?>	
				<!--End of Side bar menu-->
				<!-- Main Content -->
				<div class="container-fluid">
					<div class="side-body">
						<div class="row">
							<form id="filter-form" method="POST" action="<?php echo $basePath; ?>dashboard/trend/periodical" enctype="multipart/form-data">
								<div class="col-md-3">			
									<div class="col-xs-3">
										<label class="pt8">Year:</label>
									</div>
									<div class="col-xs-9">
										<?php $htmloptions = getAllYearsOptions(true,isset($period)?$period:NULL);?>
										<select class="form-control period" name="year" id="year">
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
										<select class="form-control period" name="distcode" id="distcode">
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
											<div id="monthly-trend">Monthly Trend chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->	
						<div class="row animated fadeInDown">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<!-- Graph goes here -->
											<div id="quarterly-trend">Quarterly Trend chart will render here</div>
										</div>
									</div>
								</div>
							</div>
						</div><!--end of row-->	
						<div class="row animated fadeInDown">
							<div class="col-xs-12">
								<div class="card">
									<div class="card-body">
										<div class="row">
											<div class="col-md-12 text-center" style="margin-bottom: 5px;">
												<h4 style="margin:0">Yearly Trend (Total Plans: <?php echo isset($plansy)?$plansy:0; ?>)</h4>
											</div>
										</div>
										<div class="row">
											<!-- Graph goes here -->
											<div id="yearly-visits_trend" class="col-xs-3 col-md-3 col-sm-3">Yearly Trend of Visits planned vs held chart will render here</div>
											<div id="yearly-vconfirmed_trend" class="col-xs-3 col-md-3 col-sm-3">Yearly Trend of Visits held vs confirmed chart will render here</div>
											<div id="yearly-checklists_trend" class="col-xs-3 col-md-3 col-sm-3">Yearly Trend of checklists planned vs filled chart will render here</div>
											<div id="yearly-hf_trend" class="col-xs-3 col-md-3 col-sm-3">Yearly Trend of HF planned vs visited chart will render here</div>
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
				//monthly Trend
				var mChart = new FusionCharts({
					type: 'msline',
					id: 'moon_mt_chart',
					renderAt: 'monthly-trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Monthly Trend",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Month",
							"yaxisname": "Values  (in Numbers)",
							"palette": "3",
							"bgcolor": "FFFFFF",
							"canvasbgcolor": "66D6FF",
							"canvasbgalpha": "5",
							"canvasborderthickness": "1",
							"canvasborderalpha": "20",
							"legendshadow": "0",
							//"numbersuffix": "°",
							"showvalues": "0",
							"alternatehgridcolor": "ffffff",
							"alternatehgridalpha": "100",
							"showborder": "0",
							"legendborderalpha": "0",
							"legendiconscale": "1.5",
							"divlineisdashed": "1",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Jan",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Feb",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Mar",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Apr",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "May",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Jun",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Jul",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Aug",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Sep",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Oct",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Nov",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Dec",
										"stepSkipped": false,
										"appliedSmartLabel": true
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Plans Created",
								"color": "1ABC9C",
								"data": <?php echo isset($plansm)?json_encode($plansm):'[]'; ?>
							},
							{
								"seriesname": "Planned Visits",
								"color" : "0E6EAB",
								"data": <?php echo isset($visitsm)?json_encode($visitsm):'[]'; ?>
							},
							{
								"seriesname": "Visits Held",
								"color": "740410",
								"data": <?php echo isset($visitsheldm)?json_encode($visitsheldm):'[]'; ?>
							},
							{
								"seriesname": "Visits Confirmed",
								"color": "228B22",
								"data": <?php echo isset($confirmedm)?json_encode($confirmedm):'[]'; ?>
							},
							{
								"seriesname": "Planned Checklists",
								"color": "22A7F0",
								"data": <?php echo isset($checklistsm)?json_encode($checklistsm):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"color": "BD4923",
								"data": <?php echo isset($filledm)?json_encode($filledm):'[]'; ?>
							},
							{
								"seriesname": "HF in Plans",
								"color": "0C838C",
								"data": <?php echo isset($hfplannedm)?json_encode($hfplannedm):'[]'; ?>
							},
							{
								"seriesname": "HF Visited",
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
				mChart.render();
				//quarterly Trend
				//monthly trend
				var qtChart = new FusionCharts({
					type: 'msline',
					id: 'moon_qt_chart',
					renderAt: 'quarterly-trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"caption": "Quarterly Trend",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"xaxisname": "Quarter",
							"yaxisname": "Values  (in Numbers)",
							"palette": "3",
							"bgcolor": "FFFFFF",
							"canvasbgcolor": "66D6FF",
							"canvasbgalpha": "5",
							"canvasborderthickness": "1",
							"canvasborderalpha": "20",
							"legendshadow": "0",
							//"numbersuffix": "°",
							"showvalues": "0",
							"alternatehgridcolor": "ffffff",
							"alternatehgridalpha": "100",
							"showborder": "0",
							"legendborderalpha": "0",
							"legendiconscale": "1.5",
							"divlineisdashed": "1",
							"exportEnabled": "1"
						},
						"categories": [
							{
								"category": [
									{
										"label": "Q1 (jan,feb,mar)",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Q2 (apr,may,jun)",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Q3 (jul,aug,sep)",
										"stepSkipped": false,
										"appliedSmartLabel": true
									},
									{
										"label": "Q4 (oct,nov,dec)",
										"stepSkipped": false,
										"appliedSmartLabel": true
									}
								]
							}
						],
						"dataset": [
							{
								"seriesname": "Plans Created",
								"color": "1ABC9C",
								"data": <?php echo isset($plansq)?json_encode($plansq):'[]'; ?>
							},
							{
								"seriesname": "Planned Visits",
								"color" : "0E6EAB",
								"data": <?php echo isset($visitsq)?json_encode($visitsq):'[]'; ?>
							},
							{
								"seriesname": "Visits Held",
								"color": "740410",
								"data": <?php echo isset($visitsheldq)?json_encode($visitsheldq):'[]'; ?>
							},
							{
								"seriesname": "Visits Confirmed",
								"color": "228B22",
								"data": <?php echo isset($confirmedq)?json_encode($confirmedq):'[]'; ?>
							},
							{
								"seriesname": "Planned Checklists",
								"color": "22A7F0",
								"data": <?php echo isset($checklistsq)?json_encode($checklistsq):'[]'; ?>
							},
							{
								"seriesname": "Checklists Filled",
								"color": "BD4923",
								"data": <?php echo isset($filledq)?json_encode($filledq):'[]'; ?>
							},
							{
								"seriesname": "HF in Plans",
								"color": "0C838C",
								"data": <?php echo isset($hfplannedq)?json_encode($hfplannedq):'[]'; ?>
							},
							{
								"seriesname": "HF Visited",
								"color": "#353d47",
								"data": <?php echo isset($hfvisitedq)?json_encode($hfvisitedq):'[]'; ?>
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
				qtChart.render();
				//Yearly trend
				var y1Chart = new FusionCharts({
					type: 'cylinder',
					id: 'moon_yvisits_chart',
					renderAt: 'yearly-visits_trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"theme": "fint",
							"caption": "Visits Planned vs Held",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"manageresize": "1",
							"upperlimit": "<?php echo isset($visitsy)?$visitsy:100;?>",
							"lowerlimit": "0",
							"showborder": "0",
							"cylFillHoverColor": "#0099fd",
							"cylFillHoverAlpha": "85",
							"showValue": "0",
							"exportEnabled": "1"
						},
						"value": "<?php echo isset($visitsheldy)?$visitsheldy:0;?>",
						"annotations": {
							"origw": "400",
							"origh": "190",
							"autoscale": "1",
							"groups": [
								{
									"id": "range",
									"items": [
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "Visits Planned : <?php echo isset($visitsy)?$visitsy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-30"
										},
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "Visits Held : <?php echo isset($visitsheldy)?$visitsheldy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-10"
										}
									]
								}
							]
						}
					}
				});
				y1Chart.render();
				var y2Chart = new FusionCharts({
					type: 'cylinder',
					id: 'moon_yconfirmed_chart',
					renderAt: 'yearly-vconfirmed_trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"theme": "fint",
							"caption": "Visits Held vs Confirmed",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"manageresize": "1",
							"upperlimit": "<?php echo isset($visitsheldy)?$visitsheldy:100;?>",
							"lowerlimit": "0",
							"showborder": "0",
							"cylFillHoverColor": "#0099fd",
							"cylFillHoverAlpha": "85",
							"showValue": "0",
							"exportEnabled": "1"
						},
						"value": "<?php echo isset($confirmedy)?$confirmedy:0;?>",
						"annotations": {
							"origw": "400",
							"origh": "190",
							"autoscale": "1",
							"groups": [
								{
									"id": "range",
									"items": [
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "Visits Held : <?php echo isset($visitsheldy)?$visitsheldy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-30"
										},
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "Visits Confirmed : <?php echo isset($confirmedy)?$confirmedy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-10"
										}
									]
								}
							]
						}
					}
				});
				y2Chart.render();
				var y3Chart = new FusionCharts({
					type: 'cylinder',
					id: 'moon_ychecklists_chart',
					renderAt: 'yearly-checklists_trend',
					width: '100%',
					height: '400',
					dataFormat: 'json',
					dataSource: {
						"chart": {
							"theme": "fint",
							"caption": "Checklists Planned vs Filled",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"manageresize": "1",
							"upperlimit": "<?php echo isset($checklistsy)?$checklistsy:100;?>",
							"lowerlimit": "0",
							"showborder": "0",
							"cylFillHoverColor": "#0099fd",
							"cylFillHoverAlpha": "85",
							"showValue": "0",
							"exportEnabled": "1"
						},
						"value": "<?php echo isset($filledy)?$filledy:0;?>",
						"annotations": {
							"origw": "400",
							"origh": "190",
							"autoscale": "1",
							"groups": [
								{
									"id": "range",
									"items": [
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "Checklists Planned : <?php echo isset($checklistsy)?$checklistsy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-30"
										},
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "Checklists Filled : <?php echo isset($filledy)?$filledy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-10"
										}
									]
								}
							]
						}
					}
				});
				y3Chart.render();
				var y4Chart = new FusionCharts({
					type: 'cylinder',
					id: 'moon_yhf_chart',
					renderAt: 'yearly-hf_trend',
					width: '100%',
					height: '400',
					dataSource: {
						"chart": {
							"theme": "fint",
							"caption": "HF Planned vs Visited",
							"subcaption": "<?php echo $periodtext; ?>: <?php echo $period; ?><?php echo (isset($distcode) && $distcode>0)?', District: '.get_District_Name($distcode):''; ?>",
							"manageresize": "1",
							"upperlimit": "<?php echo isset($hfplannedy)?$hfplannedy:100;?>",
							"lowerlimit": "0",
							"showborder": "0",
							"cylFillHoverColor": "#0099fd",
							"cylFillHoverAlpha": "85",
							"showValue": "0",
							"exportEnabled": "1"
						},
						"value": "<?php echo isset($hfvisitedy)?$hfvisitedy:0;?>",
						"annotations": {
							"origw": "400",
							"origh": "190",
							"autoscale": "1",
							"groups": [
								{
									"id": "range",
									"items": [
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "HF Planned : <?php echo isset($hfplannedy)?$hfplannedy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-30"
										},
										{
											"id": "rangeText",
											"type": "Text",
											"fontSize": "11",
											"fillcolor": "#333333",
											"text": "HF Visited : <?php echo isset($hfvisitedy)?$hfvisitedy:0;?>",
											"x": "$chartCenterX-30",
											"y": "$chartEndY-10"
										}
									]
								}
							]
						}
					}
				});
				y4Chart.render();
			});
			$('#year').on('change' , function (event){
				$("#filter-form").submit();
			});
			$('#distcode').on('change' , function (event){
				$("#filter-form").submit();
			});
		</script>
	</body>
</html>