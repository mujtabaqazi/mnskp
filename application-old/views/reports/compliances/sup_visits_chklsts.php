<?php 
$ulevel = $this -> session -> userLevel;
$utype = $this -> session -> utype;
$basePath = base_url();
$assetsPath = base_url()."assets/";
$data["columns"] = 4;
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Reports || Compliance</title>
		<?php $this->load->view("templates/styles"); ?>
		<?php $this->load->view("templates/styles_scroll",$data); ?> 
	</head>
	<body>
		<!--start of header-->
		<?php //$this->load->view("templates/header"); ?>
		<?php //$this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="bgrowlis">
						<p><?php echo $reportTitle; ?></p> 
					</div>
				</div>
			</div>
			<?php $this->load->view("templates/report_export_icons"); ?>
			<div id="player" class="video_player">
				<div  id="parent" class="shahbaz">
					<?php 
						echo getSupervisorComplianceTable($reportData,$allTotal,true,$month);			
					?>
				</div>
			</div>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/scripts_scroll"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				//work for drill down
				$('.DrillDownRow').css('cursor','pointer');
				$(document).on('click',".DrillDownRow td", function(){
					var value = parseInt($(this).text());
					if((this.cellIndex > 2) && (this.cellIndex < 51) && (value > 0))
					{
						var month = '<?php echo ($month>0)?$month:0; ?>';
						month = (month>0)?month:(Math.ceil(((this.cellIndex)-2)/4));
						var code = $(this).parent("tr").find("td:first-child .rowCode").val();
						var url = '';
						var fmonth = '<?php echo $year; ?>'+'-'+((month<10)?'0'+month:month);
						if(code > 0)
						{
							//mean code is supervisor id
							url = '<?php echo $basePath; ?>'+"Plans/get_plan_view/"+code+"/"+fmonth;      
						}
						if(url != '')
						{
							var win = window.open(url,'_self');
							if(win){
								//Browser has allowed it to be opened
								win.focus();
							}else{
								//Broswer has blocked it
								alert('Please allow popups for this site');
							}
						}
					}
				});
			});
			$(document).ready(function() {
				$(".tbl-listing").tableHeadFixer({"left" : 3}); 
			});
		</script>
	</body>
</html>