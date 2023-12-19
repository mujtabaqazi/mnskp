<?php 
$ulevel = $this -> session -> userLevel;
$utype = $this -> session -> utype;
$basePath = base_url();
$assetsPath = base_url()."assets/";
$data["columns"] = 3;	
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
						echo getGeneralReportsTable($reportData,$allTotal,true,18);			
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
				$(document).on('click',".DrillDownRow", function(){
					var code = $(this).find("td:nth-child(2)").text();
					url = '';
					if(code.toString().length == 3){
						//mean code is distcode
						//url = '<?php //echo $basePath; ?>'+"Compliances/sup-visits-chklsts/"+code+"/"+'<?php //echo $year; ?>'+"/noprogram/"+'<?php //echo $month; ?>';      
						url = '<?php echo $basePath; ?>'+"Compliances/sup-visits-chklsts/"+code+"/"+'<?php echo $monthfrom; ?>'+"/noprogram/"+'<?php echo $monthto; ?>';      
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
				});
			});
			$(document).ready(function() {
				$(".tbl-listing").tableHeadFixer({"left" : 3}); 
			});
		</script>
	</body>
</html>