<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>M&S || Users Activity Logs</title>
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
						<!--<p>User Management (List of Login Logs From <i><?php // echo isset($startDate) ? $startDate : ''; ?></i> to <i><?php // echo isset($endDate) ? $endDate : ''; ?></i>)</p>--> 
						<p>User Management (Activity Logs)</p> 

					</div>
				</div>
			</div>
			<div class="filters"><?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'filter-form');
				echo form_open("",$attributes); ?>
				
				<div class="row">
						<div class="col-xs-2 col-xs-offset-2 cmargin27">
							<label>From Period :</label>
						</div>
						<div class="col-xs-2">
							<input type="text" placeholder="From period" class="dpmoon form-control" id="startDate" name="startDate" value="<?php echo isset($startDate) ? $startDate : ''; ?>">				
						</div>
						<div class="col-xs-2 cmargin27">
							<label>To Period :</label>
						</div>
						<div class="col-xs-2">
							<input type="text" placeholder="To period" class="dpmoon form-control" id="endDate" name="endDate" value="<?php echo isset($endDate) ? $endDate : ''; ?>">
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2 cmargin27">
							<label>Module :</label>
						</div>
						<div class="col-xs-2">
							<select class="form-control" id="module" name="module">
								<?php echo getmodule_options(); ?>
							</select>
						</div>
						<div class="col-xs-2 cmargin27">
							<label>Action :</label>
						</div>
						<div class="col-xs-2">
							<select class="form-control" id="action" name="action">
								<?php echo getaction_options(); ?>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2 cmargin27">
							<label>District  :</label>
						</div>
						<div class="col-xs-2">
							<select class="form-control" id="district" name="district">
								<?php echo getDistricts_options(); ?>
							</select>
						</div>
						<div class="col-xs-2 cmargin27">
						</div>
						<div class="col-xs-2">
							<a class="btn btn-search" name="searchBtn" id="searchBtn" style="width: 100%;border-radius: 0px;">
								<span><i class="fa fa-search"></i> Preview</span>
							</a>
						</div>
					</div>					
				<?php echo form_close(); ?>
			</div><!--end of div with class filters-->
			<br>
			<?php echo getListingTable($tableData); ?>
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
				 $('.dpmoon').datepicker({
					format : "yyyy-mm-dd",
					startDate: "2015-01-01",
					endDate: '+0d'
				}); 	
				//submit the form on button click 
				 $('#searchBtn').on('click' , function (event){
					var start = $('#startDate').datepicker('getDate');
					var end = $('#endDate').datepicker('getDate');
					// end - start returns difference  
					if (end>=start){
						var diff = (end - start)/1000/60/60/24;
						if(diff<=15)
						{
							filterdata();
						}
						else{
							alert('Difference should be less than 15 days');
						}
					}else{
						alert('To period should be greater than OR equal to From period');
					}					
				});
					$(document).on("change","#module",function(){
						filterdata();
				});
				$(document).on("change","#action",function(){
						filterdata();
				});
				$(document).on("change","#district",function(){
						filterdata();
				});
				function filterdata(){
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo base_url(); ?>Users/user_activity",
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
							url:"<?php echo base_url(); ?>Users/user_activity/"+$(this).attr("data-ci-pagination-page"),
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
				/* $(document).on("change","#module",function()
				{
					var itsvalue = $(this).val();
					console.log(itsvalue);
					if(itsvalue === "Users Management")
					{
						var all = ' <?php echo getaction_options(); ?> ' ;
						console.log(all);
						$("#action").html(all);
					} 
				});
				$("#module").trigger("change"); */
		</script>		
	</body>
</html>