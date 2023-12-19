<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$mainassetsPath = base_url()."assets/";
$ulevel = $this -> session -> userLevel;
$stylesPath = base_url()."dashboards/css/";
$scriptsPath = base_url()."dashboards/js/";
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Checklists :: Dashboard</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!--start of all style files -->
		<?php $this->load->view("dashboard/templates/styles"); ?>
		<!--end of all style files-->
		<!--For Zing Chart Lib -->
		<!--<script src= "https://cdn.zingchart.com/zingchart.min.js"></script>-->
		<script> 
			//zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
			//ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9","ee6b7db5b51705a13dc2339db3edaf6d"];
		</script>
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
							<div class="col-md-12">
							 	<div id="pop1" class="simplePopup">
							 		<div class="header">
										<div class="tab-div-t1">
											<ul class="nav nav-tabs tabs-left">
												<li>
													<a href="#tab-4" data-toggle="tab">
														<img src="<?php echo $assetsPath; ?>images/tabeddivs/table.png">
													</a>
												</li>
												<li>
													<a href="#tab-5" data-toggle="tab">
														<img src="<?php echo $assetsPath; ?>images/tabeddivs/graph.png">
													</a>
												</li>
											</ul>
										</div>
							 			<span class="popheadertext">Thursday, September 1, 2016</span>
							 		</div>
									<div class="row tab-content">
										<div class="tab-pane active" id="tab-4">
											<!--table data here-->											
										</div>
										<div class="tab-pane" id="tab-5">
											<div class="row">
												<div class="col-md-6">
													<div id='plansChart'></div>
												</div>
												<div class="col-md-6">
													<div id='visitsChart'></div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div id='confirmedChart'></div>
												</div>
												<div class="col-md-6">
													<div id='filledChart'></div>
												</div>
											</div>
										</div>
									</div>								    
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<?php echo $calendar; ?>
							</div>
						</div><!--end of row-->
					</div><!--end of sidebody-->
				</div>
			</div>
			<?php $this->load->view("dashboard/templates/footer"); ?>
		</div>
        <!-- Javascript Libs -->
		<?php $this->load->view("dashboard/templates/scripts"); ?>
		<script type="text/javascript" src="<?php echo $scriptsPath; ?>jquery.simplePopup.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				$(document).on("click",".calendar-day",function(){
					var datenumber = $(this).data("id");
					//var seriesData = '<?php echo $PlansInfo; ?>';
					//seriesData = JSON.parse(seriesData);
					var total_days = '<?php echo $total_days; ?>';
					if(datenumber!="" && datenumber > 0 && datenumber <= total_days){
						//for title setting of popup
						setpoptitle(datenumber);
						//title setting ends
						//for table setting of popup
						$("#tab-4").html('');
						setpoptable(datenumber);
						//title setting ends
						//to show popup
						$('#pop1').simplePopup();
						//var dataToShow = seriesData[datenumber];
						/* if(typeof dataToShow !== 'undefined' && dataToShow !== null && dataToShow.length > 0)
						{						
							//end
							var plans = [],visits = [],confirmed = [],filled = [];
							var bgcolor = ["#3333cc","#ff3300","#ff6600","#F44336","#E91E63","#9C27B0","#673AB7","#3F51B5","#2196F3","#03A9F4","#00BCD4","#009688","#4CAF50","#8BC34A","#CDDC39","#FFEB3B","#FFC107","#FF9800","#FF5722","#0066ff","#66ccff","#FFCB45","#6877e5","#6FB07F","#50ADF5"];
							for (oneVal in dataToShow){
								//for plans series
								plans[oneVal]={
									"values" : [dataToShow[oneVal].plans],
									"background-color" : bgcolor[oneVal],
									"text" : dataToShow[oneVal].name
								};
								//for visits series
								visits[oneVal]={
									"values" : [dataToShow[oneVal].visits],
									"background-color" : bgcolor[oneVal],
									"text" : dataToShow[oneVal].name
								};
								//for confirmed series
								confirmed[oneVal]={
									"values" : [dataToShow[oneVal].confirmed],
									"background-color" : bgcolor[oneVal],
									"text" : dataToShow[oneVal].name
								};
								//for filled series
								filled[oneVal]={
									"values" : [dataToShow[oneVal].filled],
									"background-color" : bgcolor[oneVal],
									"text" : dataToShow[oneVal].name
								};
							}
							var myConfig = {
							  "type":"pie",
							  //"background-image": "image url or local path here",
							  "legend":{
								"x":"75%",
								"y":"25%",
								"border-width":1,
								"border-color":"gray",
								"border-radius":"5px",
								"header":{
								  "text":"Legend",
								  "font-family":"Georgia",
								  "font-size":8,
								  "font-color":"#3333cc",
								  "font-weight":"normal"
								},
								"marker":{
								  "type":"circle"
								},
								"toggle-action":"remove",
								"minimize":true,
								"icon":{
								  "line-color":"#9999ff"
								},
								"max-items":8,
								"overflow":"scroll"
							  },
							  "plotarea":{
								"margin-right":"30%",
								"margin-top":"15%"
							  },
							  "plot":{
								"animation":{
									"on-legend-toggle": true, //set to true to show animation and false to turn off
									"effect": 5,
									"method": 1,
									"sequence": 1,
									"speed": 1
								},
								"value-box":{
								  "text":"%v",
								  "font-size":8,
								  "font-family":"Georgia",
								  "font-weight":"normal",
									  "placement":"out",
									  "font-color":"gray",
								},
								"tooltip":{
								  "text":"%t: %v (%npv%)",
								  "font-color":"black",
								  "font-family":"Georgia",
								  "text-alpha":1,
								  "background-color":"white",
								  "alpha":0.7,
								  "border-width":1,
								  "border-color":"#cccccc",
								  "line-style":"dotted",
								  "border-radius":"10px",
								  "padding":"10%",
								  "placement":"node:center"
								},
								"border-width":1,
								"border-color":"#cccccc",
								"line-style":"dotted"
							  }
							  
							};
							myConfig["series"] = plans;
							myConfig["title"] = {"text":"Total Plans on <?php echo $fmonth; ?>-"+datenumber,"font-size":15,"text-align":"left"};
							zingchart.render({ 
								id : 'plansChart', 
								data : myConfig, 
								height: 250, 
								width: "100%",
								customprogresslogo: '<?php echo $assetsPath.'images/logo-pace.png'; ?>'
							});
							myConfig["series"] = visits;
							myConfig["title"] = {"text":"Total visits in plans on <?php echo $fmonth; ?>-"+datenumber,"font-size":15,"text-align":"left"};
							zingchart.render({ 
								id : 'visitsChart', 
								data : myConfig, 
								height: 250, 
								width: "100%",
								customprogresslogo: '<?php echo $assetsPath.'images/logo-pace.png'; ?>'
							});
							myConfig["series"] = confirmed;
							myConfig["title"] = {"text":"Confirmed Visits on <?php echo $fmonth; ?>-"+datenumber,"font-size":15,"text-align":"left"};
							zingchart.render({ 
								id : 'confirmedChart', 
								data : myConfig, 
								height: 250, 
								width: "100%",
								customprogresslogo: '<?php echo $assetsPath.'images/logo-pace.png'; ?>'
							});						
							myConfig["series"] = filled;
							myConfig["title"] = {"text":"Filled Checklists on <?php echo $fmonth; ?>-"+datenumber,"font-size":15,"text-align":"left"};
							zingchart.render({ 
								id : 'filledChart', 
								data : myConfig, 
								height: 250, 
								width: "100%",
								customprogresslogo: '<?php echo $assetsPath.'images/logo-pace.png'; ?>'
							});
							zingchart.load=function(p){
								switch(p.id){
									case 'plansChart':
										$("#plansChart-license").css("display","none");
										break;
									case 'visitsChart':
										$("#visitsChart-license").css("display","none");
										break;
									case 'confirmedChart':
										$("#confirmedChart-license").css("display","none");
										break;
									case 'filledChart':
										$("#filledChart-license").css("display","none");
										break;
								}
							}						
						}else{
							//destroy chart from div
							zingchart.exec('plansChart','destroy');
							zingchart.exec('visitsChart','destroy');
							zingchart.exec('confirmedChart','destroy');
							zingchart.exec('filledChart','destroy');
						} */
					}else{
						//destroy chart from div
						/* zingchart.exec('plansChart','destroy');
						zingchart.exec('visitsChart','destroy');
						zingchart.exec('confirmedChart','destroy');
						zingchart.exec('filledChart','destroy'); */
					}
				});	
			
				//popup title
				function setpoptitle(datenumber){
					var monthNames = ["January", "February", "March","April", "May", "June", "July","August", "September", "October","November", "December"];
					var days_full = ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'];
					var formattedDate = new Date("<?php echo $fmonth; ?>-"+datenumber);
					$(".popheadertext").text(days_full[formattedDate.getDay()]+", "+monthNames[formattedDate.getMonth()]+" "+formattedDate.getDate()+", "+formattedDate.getFullYear());
				}	
				//popup table
				function setpoptable(datenumber){
					//get data from array for this date
					var moonTablesData = '<?php echo $PlansSupInfo; ?>';
					moonTablesData = JSON.parse(moonTablesData);				
					var moonTableData = moonTablesData[datenumber];
					var htmltoAdd = '';
					$.each(moonTableData,function(index,val){
						var locArr = val;
						//to set status confirmation from mobile device tick cross
						var tooltip = '';
						var htmll = '';
						if(locArr['Status']==1){
							tooltip = "Visit Confirmed by android app";
							//htmll = '<span style="color: green">&#10004;</span>';
							htmll = 'mobiletick2.png';
							var mobileLink= '<div class="showmob" data-facility="'+locArr["Facility"]+'" data-supervisor="'+locArr["Supervisor"]+'" data-picture="'+locArr["picture"]+'" data-lat="'+locArr["latitude"]+'" data-long="'+locArr["longitude"]+'" data-visitdate="'+locArr["visitdate"]+'" data-date_confirmed="'+locArr["date_confirmed"]+'" data-time_confirmed="'+locArr["time_confirmed"]+'">';
						}else{
							tooltip = "Visit not Confirmed by android app";
							//htmll = '<span style="color: red">&#10006;</span>';
							htmll = 'mobilecross2.png';
							var mobileLink= '<div>';
						}
						locArr['Facility'] = mobileLink+locArr['Facility']+' '+'<span data-placement="top" data-toggle="tooltip" class="link-add-new my-tooltip spanandroid pull-right" data-original-title="'+tooltip+'"><img src="<?php echo $assetsPath; ?>images/'+htmll+'"></span>'+'</div>';
						var vpv_id = locArr['vpvid'];
						delete locArr['picture'];delete locArr['longitude'];delete locArr['latitude'];delete locArr['Status'];delete locArr['vpvid'];delete locArr['visitdate'];delete locArr['date_confirmed'];delete locArr['time_confirmed'];
						var chklstsObj = locArr['checklists'];
						//locArr['checklists'] = Object.values(chklstsObj).join('<br>');
						var checklists_names = '';
						$.each(chklstsObj,function(index,val){
							var twoparts = val["tablename"].split('_');
							var filledstats =  val["filledstat"];
							var vpvc_id = val["vpvc_id"];
							if(filledstats>0)
							{
								checklists_names += '<a href="<?php echo $basePath; ?>'+twoparts[0]+'/forms/'+val["shortname"]+'_view/'+vpvc_id+'" target="_blank" >'+val["name"]+'</a><br>';
							}else{
								checklists_names += val["name"]+'<br>';
							}							
						});
						locArr['checklists'] = checklists_names;
						//to set status confirmation ends
						if(index==0){
							htmltoAdd += '<table class="table table-striped mb0"><thead><tr><th>#</th><th>';
							htmltoAdd += Object.keys(locArr).join('</th><th>');
							htmltoAdd += '</th></tr></thead><tbody>';
						}
						htmltoAdd += '<tr><th>'+(index+1)+'</th><td>';
						htmltoAdd += Object.values(locArr).join('</td><td>');
						htmltoAdd += '</td></tr>';
					});
					if(htmltoAdd===''){}else{htmltoAdd += '</tbody></table>';}
					htmltoAdd = htmltoAdd.replace(/moongreenstat/g,'<span style="color: green">&#10004;</span>');
					htmltoAdd = htmltoAdd.replace(/moonredstat/g,'<span style="color: red">&#10006;</span>');
					$("#tab-4").html('');
					$("#tab-4").html(htmltoAdd);
				}
			});			
		</script>
		<script type="text/javascript">
			//var mouseXX,mouseYY,windowWidthh,windowHeightt;
			//var  popupLeftt,popupTopp;
			$(document).ready(function(){
				/* $(document).mousemove(function(e){
					mouseXX = e.pageX;
					mouseYY = e.pageY;
					//To Get the relative position
					if( this.offsetLeft !=undefined)
						mouseXX = e.pageX - this.offsetLeft;
					if( this.offsetTop != undefined)
						mouseYY = e.pageY; - this.offsetTop;
					if(mouseXX < 0)
						mouseXX =0;
					if(mouseYY < 0)
						mouseYY = 0;
					windowWidthh  = $(window).width()+$(window).scrollLeft();
					windowHeightt = $(window).height()+$(window).scrollTop();
				}); */
				var newWindow = '';
				$(document).on('click','.showmob',function(){
					
					var latt = $(this).data("lat");
					var longg = $(this).data("long");
					var htmlforPop = '<div id="popmob"><div class="img-controls"><span style="right: 20px; top: 100px; background: #517ee2; border: 1px solid #ffebab;; padding: 3px 12px; position: absolute;z-index: 999999; color: #fff;font-size: 27px; opacity: 0.7;border-radius: 4px;cursor: pointer;" class="rotateicon" onclick="rotateme(this)">&#8631;</span></div><div class="popboy"><div id="exTab2"><div class="tab-content"><div><b>Facility Visited: </b>'+$(this).data("facility")+'<br><b>Planned Visit Date: </b>'+$(this).data("visitdate")+'<br><b>Visit Confirmed On: </b>'+$(this).data("date_confirmed")+' '+$(this).data("time_confirmed")+'<br><strong>Supervisor: </strong>'+$(this).data("supervisor")+'<br></div><div class="tab-pane active" id="mob1"><img id="poppic" src="<?php echo $mainassetsPath; ?>appimages/'+$(this).data("picture")+'" class="img-responsive poppic" style="width: 100%;"></br></div><div class="tab-pane popmapmob" id="mob2"><iframe src="https://www.google.com/maps/embed/v1/place?q='+latt+','+longg+'&amp;key=AIzaSyBHNtLEuHSbyf-cSkQvM5EocmPDCeau4yY" width="100%" height="500px" frameborder="0" style="border:0" allowfullscreen></iframe></div></div></div></div></div>';
					
					if(newWindow!=''){
						newWindow.close();
					}
					newWindow = window.open("","","height=700,width=700,resizable=yes,scrollbars=yes");
					newWindow.document.write(htmlforPop);
					//for rotation
					var s=document.createElement('script');
					s.type = "text/javascript";
					s.text = 'var currdeg = 0;function rotateme(obj){if(currdeg==360){currdeg=0;}currdeg=currdeg+90;var elem = document.getElementById("poppic");if(navigator.userAgent.match("Chrome")){elem.style.WebkitTransform = "rotate("+currdeg+"deg)";} else if(navigator.userAgent.match("Firefox")){elem.style.MozTransform = "rotate("+currdeg+"deg)";} else if(navigator.userAgent.match("MSIE")){elem.style.msTransform = "rotate("+currdeg+"deg)";} else if(navigator.userAgent.match("Opera")){		elem.style.OTransform = "rotate("+currdeg+"deg)";} else {		elem.style.transform = "rotate("+currdeg+"deg)";}}';
					//newWindow.document.write(htmlforPop);
					newWindow.document.body.appendChild(s);
				});
			});
			/* <div class="img-controls"><span style="right: 20px; top: 20px; background: #fbbc05; border: 1px solid #ffebab;; padding: 12px 20px; position: absolute; z-index: 999999; color: #fff;     font-size: 18px; opacity: 0.9;border-radius: 4px" class="rotateicon" onclick="rotateme(this)">&#8631;</span><span style="right: 20px; top: 85px; background: #517ee2; border: 1px solid #93b3f9;; padding: 12px 20px; position: absolute; z-index: 999999; color: #fff;opacity: 0.8;border-radius: 4px; font-size: 18px;" class="rotateicon" onclick="rotateme(this)">&#8631;</span><span style="right: 20px; top: 150px; background: #71bc6e; border: 1px solid #9aef97;; padding: 15px 28px; position: absolute; z-index: 999999; color: #fff;opacity: 0.8;border-radius: 4px; font-size: 18px;" class="rotateicon" onclick="rotateme(this)">&#8631;</span></div> */
		</script>		
	</body>
</html>