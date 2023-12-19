<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>EPI-Activities || List</title>
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
						<p>Checklist for EPI Activities (Only for Health Facility with Functional EPI Centre)</p> 
					</div>
				</div>
			</div>		
			<div class="filters">
				<?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'filter-form');
				echo form_open("",$attributes); ?>
				<div class="row">
					<div class="col-xs-2 col-xs-offset-2 cmargin27">
						<label>District :</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="distcode" name="distcode">
							<option value=""></option>
							<?php echo getDistricts_options(); ?>
						</select>
					</div>
					<div class="col-xs-2 cmargin27">
						<label>Teshil :</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="tcode" name="tcode"></select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 col-xs-offset-2 cmargin27">
						<label>Union Council :</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="uncode" name="uncode"></select>
					</div>
					<div class="col-xs-2 cmargin27">
						<label>Health Facility Type :</label>
					</div>
					<div class="col-xs-2">
						<select class="form-control" id="fatype" name="fatype"></select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-2 col-xs-offset-2 cmargin27">
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
				</div>
				<?php echo form_close(); ?>
			<?php if(isset($paging) && $paging!=""){?>
				<div style="margin-bottom: -18px;" class="row">
				  
					<div class="col-xs-2" style="width: 10% ! important; margin-left: 72%;">
						<a href="<?php echo $basePath; ?>epi/forms/activities" class="link-add-new"><img src="<?php echo $assetsPath; ?>images/addnew.png">Add New</a>
					</div>
				  
					<div style="margin-top: -15px; margin-bottom: -27px; width: 18%;" class="col-xs-2">
						<ul class="pagination pagination-sm uper-pagination">
							 <li><a href="#">«</a></li>
							 <li class="active"><a href="#">1</a></li>
							 <li><a href="#">2</a></li>
							 <li><a href="#">3</a></li>
							 <li><a href="#">4</a></li>
							 <li><a href="#">»</a></li>
							 <li><a href="#">last</a></li>
						</ul>
					</div>
				</div>
				<?php } ?>
			</div><!--end of div with class filters-->
			<br>
			<?php echo getListingTable($tableData,"epi/forms/activities"); ?>
			<?php if(isset($paging) && $paging!=""){?>
			<div style="margin-top: -41px;" class="row">
			  <div style="margin-bottom: -6px;" class="col-xs-4">
				<ul class="pagination pagination-sm lower-pagination">
					 <li><a href="#">«</a></li>
					 <li class="active"><a href="#">1</a></li>
					 <li><a href="#">2</a></li>
					 <li><a href="#">3</a></li>
					 <li><a href="#">4</a></li>
					 <li><a href="#">5</a></li>
					 <li><a href="#">6</a></li>
					 <li><a href="#">»</a></li>
					 <li><a href="#">last</a></li>
				</ul>
			  </div>
			</div>
			<?php } ?>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>	
		<script type="text/javascript">
			function search(term){
				var searchParam = term;
				$('#tbody').html('');
			    $('#tbody').html('<h1><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>includes/images/ajax-loader_blue.gif"> loading...</td></h1>');
				$.ajax({
					type: "GET",
					data: "searchParam="+searchParam,
					url: "<?php echo base_url(); ?>Ajax_calls/quickSearch",
					dataType: "json",
					success: function(result){
						$('#tbody').html('');
						if(result != null){
							$('#tbody').html(result.tbody);
							//$('#paging').html(result.paging);
						}
					}
				});
			}
			/* $(document).ready(function() {
				//executes code below when user click on pagination links
				$(document).on("click",".paginateMe",  function (e){
					e.preventDefault();
					$('#paging').html('')
					$('#tbody').html('<h1><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>includes/images/ajax-loader_blue.gif"> loading...</td></h1>');
					$(".loading-div").show(); //show loading element
					var page = $(this).attr("id"); //get page number from link
					$.ajax({
						type: "GET",
						data: $('#filter-form').serialize(),
						dataType:"json",
						url: "<?php echo base_url(); ?>Ajax_calls/fmvrf_filter?page="+page,
						success: function(result){
							console.log(result);
							$('#tbody').html(result.tbody);
							$('#paging').html(result.paging);
						}
					});        
				});
			}); */
			$(document).ready(function() {
				$('#searchBtn').on('click' , function (event){
					event.preventDefault();
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo base_url(); ?>epi/ajax_calls/activities",
						dataType: "json",
						success: function(result){
							$('#tbody').html('');
							if(result != null){
								$('#tbody').html(result.tbody);
								//$('#paging').html(result.paging);
							}
						}
					});
				});	
			});			
		</script>
	</body>
</html>