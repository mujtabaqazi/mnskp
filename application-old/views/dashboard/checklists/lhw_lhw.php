<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
//print_r($srtools_num);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checklists :: Dashboard-LHW Program</title>
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
							<form id="filter-form" method="POST" action="<?php echo $basePath; ?>dashboard/checklists/lhw_lhw" enctype="multipart/form-data">
								<div class="col-md-5 zp">			
									<div class="col-xs-2">
										<label class="pt8">Frequency:</label>
									</div>
									<div class="col-xs-10">
										<input type="radio" name="frequency" value="m" <?php echo (isset($frequency) && $frequency=="m")?'checked="checked"':'';?> class="mt9" >
										<label>Monthly</label>&nbsp;
										<input type="radio" name="frequency" value="q" <?php echo (isset($frequency) && $frequency=="q")?'checked="checked"':'';?> class="mt9" >
										<label>Quarterly</label>&nbsp;
										<input type="radio" name="frequency" value="y" <?php echo (isset($frequency) && $frequency=="y")?'checked="checked"':'';?> class="mt9" >
										<label>Annually</label>&nbsp;
										<input type="radio" name="frequency" value="fy" <?php echo (isset($frequency) && $frequency=="fy")?'checked="checked"':'';?> class="mt9" >
										<label>Fiscal year</label>&nbsp;
									</div>	
								</div>
								<div class="col-md-3 zp">			
									<div class="col-xs-3">
										<label class="pt8">Period:</label>
									</div>
									<div class="col-xs-9">
										<?php
											$periodtext = "Year-Month";
											if(isset($frequency) && $frequency=="fy"){
												$attr = "fyear";
												$periodtext = "Fiscal Year";
												$htmloptions = getAllfiscalYearsOptions(true,isset($period)?$period:NULL);
											}else if(isset($frequency) && $frequency=="y"){
												$attr = "fyear";
												$periodtext = "Year";
												$htmloptions = getAllYearsOptions(true,isset($period)?$period:NULL);
											}else if(isset($frequency) && $frequency=="q"){
												$attr = "qmonth";
												$periodtext = "Year-Quarter";
												$htmloptions = getAllQuarterOptions(true,isset($period)?$period:NULL);
											}else{
												$attr = "fmonth";
												$htmloptions = getFmonthIncludingCurrentMonth_options(true,isset($period)?$period:NULL);
											}
										?>
										<select class="form-control period" name="<?php echo $attr; ?>" id="<?php echo $attr; ?>">
											<?php echo $htmloptions; ?>
										</select>
									</div>	
								</div>
								<div class="col-md-4 zp">			
									<div class="col-xs-2 zp">
										<label class="pt8">Checklist:</label>
									</div>
									<div class="col-xs-10">
										<?php
											// later get all checklists from some function for specific module and show here
											$htmloptions = '<option value="4" data-short="lhw">Health House & Lady Health Worker</option>';
										?>
										<select class="form-control" name="checklist" id="checklist">
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
											<div id="sr-num-lhw" class="col-xs-8">Tools/Services Availablility (Item Wise) chart will render here</div>
											<div class="col-xs-4 zp">
												<div class="row zp">
													<div id="sr-score-lhw-pie" class="col-xs-12 zp">Tools/Services Availablility (Percentage Wise) Pie chart will render here</div>
												</div>
												<div class="row zp">
													<div id="sr-score-lhw-bar" class="col-xs-12 zp">Tools/Services Availablility (Percentage Wise) Bar chart will render here</div>
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
			<?php $this->load->view("dashboard/templates/footer"); ?>
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
				singleserieschart(
					'sr-num-lhw',
					"Tools/Services Availablility",
					"Tools/Services (Item Wise)",
					<?php echo isset($srtools_cats)?json_encode($srtools_cats):'[]'; ?>,
					"LHWs With Tools/Services Available",
					<?php echo isset($srtools_num)?json_encode($srtools_num):'[]'; ?>,
					'# of LHWs'
				);
				//
				singleseriescolouredchart(
					'doughnut3d',
					'sr-score-lhw-pie',
					"Tools/Services Availablility",
					"Tools/Services %age (Section Wise)",
					<?php echo isset($srscores_cats)?json_encode($srscores_cats):'[]'; ?>,
					"LHWs With Tools/Services Available",
					<?php echo isset($srscores_num)?json_encode($srscores_num):'[]'; ?>,
					'LHWs'
				);
				//
				singleseriescolouredchart(
					'mscombi2d',
					'sr-score-lhw-bar',
					"Tools/Services Availablility",
					"Tools/Services %age (Section Wise)",
					<?php echo isset($srscores_cats)?json_encode($srscores_cats):'[]'; ?>,
					"LHWs With Tools/Services Available",
					<?php echo isset($srscores_num)?json_encode($srscores_num):'[]'; ?>,
					'LHWs'
				);				
			});
			//function for single series bar graph
			function singleserieschart(renderat,caption,xaxisname,catsdata,seriestitle,seriesdata,yaxisname,needtrendlines){
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
						var annotationtitle = "%age of LHWs";
					}else{
						var moontrendline = [];
						var maxval = "";
						var annotationtitle = "";
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
							'%age of LHWs',
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
				$("#filter-form").submit();
			});			
			$('input[type=radio][name=frequency]').on('change' , function (event){
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
				$("#filter-form").submit();
			});
		</script>
	</body>
</html>