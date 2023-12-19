<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Reports || Filters</title>
		<?php $this->load->view("templates/styles"); ?>     
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container-fluid">
			<br>
			<?php 
				echo $filters;
			?>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/report_filters_scripts"); ?>
		<script type="text/javascript">
			$(".dp-my").datepicker({
				autoclose: true,
				format: "yyyy-mm",
				startDate: '2015-01',
				viewMode: "months", 
				minViewMode: "months",
				endDate: new Date()
			});
			$("#monthfrom").datepicker({}).on('changeDate', function (selected) {
				var minDate = new Date(selected.date.valueOf());
				$('#monthto').datepicker('setStartDate', minDate);
			});
		</script>
	</body>
</html>