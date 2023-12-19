<?php 
$basePath = base_url();
$dashboardPath = base_url()."dashboards/";
$scriptsPath = base_url()."dashboards/js/";
?>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>bootstrap-switch.min.js"></script>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>jquery.matchHeight-min.js"></script>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>app.js"></script>

<!--start of script for common ajax-->
<script type="text/javascript">
	/*--------- Code by Raja for ajax loader start ----------*/
	$( document ).ajaxStart(function() {
		$('.loading').removeClass('hide'); 
	});
	$( document ).ajaxComplete(function() {
		$('.loading').addClass('hide'); 
	});
	/*--------- Code by Raja for ajax loader start ----------*/
	$('#year').on('change', function(){
		var year = this.value;
		var curryear = (new Date).getFullYear();
		if(year < curryear)
		{
			$data1 = "month=13";
		}else{
			$data1 = "";
		}
		$.ajax({
			type: "POST",
			data: $data1,
			url: "<?php echo base_url(); ?>Common_Ajax/getMonths",
			success: function(result){
				$('#month').html(result);
			}
		});
	});
	$(document).ready(function(){
		$(".navbar-expand-toggle").click(function(){
			$(".container-top-banner").css({"top":"-116px"});
			$(".navbar-top, .side-menu").css({"margin-top":"-90px"});
			$(".side-body").css({"padding-top":"70px"});
		});
	});
	function scrolltodiv(moonblockid){
		$('html,body').animate({
			scrollTop: ($("#"+moonblockid).offset().top)-145},
		'slow');
	}
</script>
<!--end of script for common ajax-->