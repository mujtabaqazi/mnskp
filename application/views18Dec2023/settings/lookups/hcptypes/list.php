<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>M&S || HCP Types List</title>
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
						<p>HCP Type Management (List of current HCP Types)</p> 
					</div>
				</div>
			</div>		
			<div class="filters">
				<div class="row">
					<div class="col-xs-2" style="width: 10% ! important; margin-left: 90%;">
						<a href="<?php echo $basePath; ?>settings/hcptype_add" class="link-add-new"><img src="<?php echo $assetsPath; ?>images/addnew.png">Add New</a>
					</div>
				</div>
			</div><!--end of div with class filters-->
			<br>
			<?php echo getListingTable($tableData,"settings/hcptype"); ?>
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
			$(document).ready(function() {
				function filterdata(){
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo base_url(); ?>settings/hcptypes/0",
						dataType: "json",
						success: function(result){
							$('#tbody').html('');
							if(result != null){
								$('#tbody').closest("table").html(result.tbody);
								$('.pagination_div').html(result.paging);
							}
						}
					});
				}
				$(function(){
					$('body').on('click','ul.search_page_pagination>li>a',function(e){
						e.preventDefault();  // prevent default behaviour for anchor tag
						$('#tbody').html('');
						//$('#pagina').html('');
						$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
						var Pagination_url = $(this).attr('href'); // getting href of <a> tag
						$.ajax({
							type:'POST',
							data: $('#filter-form').serialize(),
							url:"<?php echo base_url(); ?>settings/hcptypes/"+$(this).attr("data-ci-pagination-page"),
							dataType: "json",
							success:function(result){
								$('#tbody').html('');
								if(result != null){
									$('#tbody').closest("table").html(result.tbody);
									if(result.paging !== ""){
										$('.pagination_div').html(result.paging);
										//here Add pagination div style
										$(".paginationParent").css("margin-top","-41px");
									}else{
										$('.pagination_div').html('');
										//here remove pagination div style
										$(".paginationParent").css("margin-top","0px");
									}
								}
							}
						});
					});
			    });
			});			
		</script>
	</body>
</html>