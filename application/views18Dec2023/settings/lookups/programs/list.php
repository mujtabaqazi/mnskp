<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>M&S || Programs List</title>
		<?php $this->load->view("templates/styles"); ?>     
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container container-listing">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="bgrowlis">
						<p>Programs Management (List of current Programs)</p> 
					</div>
				</div>
			</div>		
			<div class="filters">
				<?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'filter-form');
				echo form_open("",$attributes); ?>
				<div class="row">
					<!--<div class="col-xs-2 col-xs-offset-2 cmargin27">
						<label>Search :</label>
					</div>
					<div class="col-xs-2">
						<div class="input-group">
							<input type="Search" id="searchParam" name="searchParam" placeholder="Search..." class="form-control" />
							<div class="input-group-btn">
								<a class="btn btn-search" name="searchBtn" id="searchBtn">
									<span><i class="fa fa-search"></i></span>
								</a>
							</div>
						</div> 
					</div>
					<div class="col-xs-2" style="width: 10% ! important; margin-left: 90%;">
						<a href="<?php //echo $basePath; ?>settings/program_add" class="link-add-new"><img src="<?php //echo $assetsPath; ?>images/addnew.png">Add New</a>
					</div>-->
				</div>
				<?php echo form_close(); ?>
			</div><!--end of div with class filters-->
			<br>
			<?php 
			$optArr = array("column" => "Program Type","view"=>"yes","path"=>"settings/program");
			echo getListingTable($tableData,"",false,true,$optArr);
			//echo getListingTable($tableData,"settings/program"); ?>
			<?php if(isset($paging) && $paging!=""){?>
			<div style="margin-top: -41px;" class="row paginationParent">
			  <div style="margin-bottom: -6px;" class="pagination_div col-xs-6">
				<?php echo $paging; ?>
			  </div>
			</div>
			<?php } ?>
			<br>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			/* $(document).ready(function() {
				$('#searchBtn').on('click' , function (event){
					event.preventDefault();
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo base_url(); ?>settings/program",
						dataType: "json",
						success: function(result){
							$('#tbody').html('');
							if(result != null){
								$('#tbody').closest("table").html(result.tbody);
								$('.pagination_div').html(result.paging);
							}
						}
					});
				});
			});	 */		
		</script>
	</body>
</html>