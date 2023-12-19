<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Monthly Visit Plan || Approve</title>
		<?php $this->load->view("templates/styles"); ?>     
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="bgrowlis">
						<p>Monthly Visit Plan - Approve List</p> 
					</div>
				</div>
			</div>		
			<?php 
				echo validation_errors();
				$action = $basePath."plans/dg_approved";
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform','accept-charset' => 'utf-8');
				$hidden = array('fmonth' => $fmonth);
				echo form_open_multipart($action,$attributes); 
			?>        
			<div class="filters">
				<div class="row">
					<div class="col-xs-2 col-xs-offset-2 cmargin27">
						<label>Year - Month</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" name="fmonth" id="fmonthselected">
							<option value=""> -- ALL -- </option>
							<?php echo getSavedFmonth_options(false,isset($fmonth)?$fmonth:NULL); ?>
							<?php //echo getChklstFmonth_options(); ?>
						</select>
					</div>  
				</div>
			</div><!--end of div with class filters-->
			<br>
			<?php echo getListingTable($tableData); ?>
			<br> 
			<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
				<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
					<!--<button type="submit" class="btn btn-success btn-md btncc" role="button">
						<i class="fa fa-floppy-o "></i> Approve all 
					</button>-->
					<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>	
		<script type="text/javascript">
			$(document).ready(function() {
				//call to a function which will create last action column
				createActionColumn();
				function createActionColumn(){
					var hasRecord = false;
					$('.tbl-listing tbody tr').each(function(index){
						var secondLastText = $(this).find( "td:nth-last-child(2)" ).text();
						var lastText = $(this).find( "td:last" ).text();
						if(lastText=="Not Approved"){
							hasRecord = true;
							$(this).find( "td:last" ).after('<td><input type="button" role="button" class="btn btn-success btn-md approveAction" value="Approve this plan" ></button></td>')
						}
					});
					if(hasRecord)
					{
						$('.tbl-listing thead tr').find( "th:last" ).after('<th>Action</th>')
					}
				}
				$(document).on("click",".approveAction",function(){
					var distcode = $(this).closest("tr").find("td:nth-child(2)").text();
					var obj = $(this);
					$.ajax({
						type: "POST",
						data: {fmonth:'<?php echo $fmonth; ?>',distcode:distcode},
						url: "<?php echo base_url(); ?>plans/dg_approved",
						success: function(result){
							if(result == "Success"){
								$(obj).closest("tr").find("td:nth-last-child(2)").text("Approved");
								$(obj).closest("table").find("thead th:last-child").remove();
								$(obj).closest("table").find("tbody td:last-child .approveAction").parent("td").remove();								
							}else{
								
							}
							createActionColumn();
						}
					});
				});
				$(document).on("change","#fmonthselected",function(){
					var fmonth = $("#fmonthselected").val();
					let url = "<?php echo base_url(); ?>plans/dg_approve/"+fmonth;
					window.open(url, "_self");	
				});
			});
		</script>
	</body>
</html>