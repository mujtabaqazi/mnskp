<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Program Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container-fluid">
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> Program Management (View Program)</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Program Type:</label>
					</div>
					<div class="col-xs-3">
						<p><?php echo $prgrmtype = (isset($tableData))?$tableData[0]["Program Type"]:""; ?></p>
					</div>
					<div class="col-xs-2">
						<label>Program:</label>
					</div>
					<div class="col-xs-3">
						<p><?php echo $prgrmname = (isset($tableData))?(($tableData[0]["program"] == '')?'All Program':$tableData[0]["program"]):""; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Total Supervisors:</label>
					</div>
					<div class="col-xs-3">
						<p>Provincial:<b><?php echo (isset($tableData))?$tableData[0]["No of Provincial Supervisors"]:""; ?></b>, District:<b><?php echo (isset($tableData))?$tableData[0]["No of District Supervisors"]:""; ?></b></p>
					</div>
					<div class="col-xs-2">
						<label>Total Checklists:</label>
					</div>
					<div class="col-xs-3">
						<p><?php echo (isset($tableData))?$tableData[0]["No of Checklists Associated"]:""; ?></p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 bgcolcl text-center">
						<label>Checklists Of Program </label>
					</div>
				</div>
				<div class="row">
					<table class="table table-striped table-bordered table-hover tbl-listing table-condensed">
						<thead></thead>
						<tbody id="chklststbody"></tbody>
					</table>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12 bgcolcl text-center">
						<label>Supervisors Linked with Program <?php //echo ' :<i>'.$prgrmname.'</i>'; ?></label>
					</div>
				</div>
				<div class="row">
					<table class="table table-striped table-bordered table-hover tbl-listing table-condensed">
						<thead></thead>
						<tbody id="userstbody"></tbody>
					</table>
				</div>
				<?php //echo getListingTable($tableData); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<script type="text/javascript">
		$(document).ready(function() {
			//$('#searchBtn').on('click' , function (event){
				//event.preventDefault();
				$('#userstbody').html('');
				$('#userstbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
				$.ajax({
					type: "POST",
					data: {ptype:"<?php echo $prgrmtype; ?>",actions:"false",pagination:"false"},
					url: "<?php echo base_url(); ?>users/lists/0",
					dataType: "json",
					success: function(result){
						$('#userstbody').html('');
						if(result != null){
							$('#userstbody').closest("table").html(result.tbody);
						}
					}
				});
				
				$('#chklststbody').html('');
				$('#chklststbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
				$.ajax({
					type: "POST",
					data: {ptype:"<?php echo $prgrmtype; ?>",actions:"false",pagination:"false"},
					url: "<?php echo base_url(); ?>settings/checklists/0",
					dataType: "json",
					success: function(result){
						$('#chklststbody').html('');
						if(result != null){
							$('#chklststbody').closest("table").html(result.tbody);
						}
					}
				});
			//});
		});
	</script>
</body>
</html>