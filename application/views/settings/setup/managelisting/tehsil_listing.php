<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>M&S || Tehsil List</title>
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
						<p>Tehsil List</p> 
					</div>
				</div>
			</div>
			
			<div class="filters"><?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'filter-form');
				echo form_open("",$attributes); ?>
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2 cmargin27">
							<label>District(s) :</label>
						</div>
						<div class="col-xs-2">
							
								<select class="form-control" id="distcode" name="distcode">
								<?php 
								echo getDistricts_options(); ?>
								</select>
							
						</div>
						<div class="col-xs-2 col-xs-offset-1">
							<a class="btn btn-search" name="searchBtn" id="searchBtn" style="width: 100%;border-radius: 0px;">
								<span><i class="fa fa-search"></i> Preview</span>
							</a>
						</div>
					</div>			
				<?php echo form_close(); ?>
			</div><!-- end of div with class filters-->
			<div class="filters">
				<div class="row">
					<div class="col-xs-2" style="width: 10% ! important; margin-left: 90%;">
						<a href="<?php echo $basePath; ?>setup/tehsil_add" class="link-add-new"><img src="<?php echo $assetsPath; ?>images/addnew.png">Add New</a>
					</div>
				</div>
			</div>
			<br>
			<?php echo getListingTableNew($tableData, "settings/Setup/tehsil",false,false,"",false); ?>
			<?php 
			$style1 = "";
			if(isset($paging) && $paging!=""){
				$style1 = "margin-top: -36px;";
			}else{
				$paging = "";
			}?>
			<div style="<?php echo $style1; ?>" class="row paginationParent">
			  <div style="margin-bottom: -6px;" class="pagination_div col-xs-6">
				<?php echo $paging; ?>
			  </div>
			</div>
			<br>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>		
		<script type="text/javascript">
			$(document).ready(function(){
				$('#searchBtn').on('click' , function (event){
					filterdata();				
				});
				function filterdata(){
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo $basePath; ?>settings/Setup/tehsil_listing",
						dataType: "json",
						success: function(result){
							$('#tbody').html('');
							if(result != null){
								$('#tbody').closest("table").html(result.tbody);
								if(result.paging !== ""){
									$('.pagination_div').html(result.paging);
									$(".paginationParent").css("margin-top","-36px");
								}else{
									$('.pagination_div').html('');
									$(".paginationParent").css("margin-top","0px");
								}
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
							url:"<?php echo $basePath; ?>settings/Setup/tehsil_listing/"+$(this).attr("data-ci-pagination-page"),
							dataType: "json",
							success:function(result){
								$('#tbody').html('');
								if(result != null){
									$('#tbody').closest("table").html(result.tbody);
									if(result.paging !== ""){
										$('.pagination_div').html(result.paging);
										//here Add pagination div style
										$(".paginationParent").css("margin-top","-36px");
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