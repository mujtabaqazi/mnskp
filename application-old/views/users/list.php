<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>M&S || Users List</title>
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
						<p>User Management (List of current Users)</p> 
					</div>
				</div>
			</div>		
			<div class="filters">
				<?php 
				$attributes = array('class' => 'form-horizontal', 'id' => 'filter-form');
				echo form_open("",$attributes); ?>
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2 cmargin27">
							<label>Level :</label>
						</div>
						<div class="col-xs-2">
							<select class="form-control" id="level" name="level">
								<?php echo getlevel_options(false,NULL,NULL,true); ?>
							</select>
						</div>
						<div class="col-xs-2 cmargin27">
							<label>District(s) :</label>
						</div>
						<div class="col-xs-2">
							<select size="1" class="form-control" id="distcode" name="distcode"><!--[]-->
								<option value=""> -- All Districts -- </option>
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-2 col-xs-offset-2 cmargin27">
							<label>Program :</label>
						</div>
						<div class="col-xs-2">
							<select class="form-control" id="ptype" name="ptype">
								<?php echo getprograms_options(); ?>
							</select>
						</div>
						<div class="col-xs-2 cmargin27">
							<!--<label>Designation :</label>
							<label>Search :</label>-->
						</div>
						<div class="col-xs-2">
							<!--<select size="1" class="form-control" id="designation" name="designation">
								
							</select>
							<div class="input-group">
								<input type="Search" id="searchParam" name="searchParam" placeholder="Search..." class="form-control" />
								<div class="input-group-btn">
									<a class="btn btn-search" name="searchBtn" id="searchBtn">
										<span>Preview <i class="fa fa-search"></i></span>
									</a>
								</div>
							</div>-->
							<a class="btn btn-search" name="searchBtn" id="searchBtn" style="width: 100%;border-radius: 0px;">
								<span><i class="fa fa-search"></i> Preview</span>
							</a>
						</div>
					</div>				
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
						</div>-->
						<div class="col-xs-2" style="width: 10% ! important; margin-left: 90%;">
							<a href="<?php echo $basePath; ?>users/add" class="link-add-new"><img src="<?php echo $assetsPath; ?>images/addnew.png">Add New</a>
						</div>
					</div>
				<?php echo form_close(); ?>
			</div><!--end of div with class filters-->
			<br>
			<?php echo getListingTable($tableData,"users/user"); ?>
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
			$(document).on("change","#level",function(){
				var itsvalue = $(this).val();
				//var alldesg = '<option value="">-- All Designations --</option>';
				/* $("#distcode").removeAttr("multiple");
				$("#distcode").css("height","auto");
				$("#distcode").attr("name","distcode"); */
				$('#ptype option:last-child').text("DG Office");
				if(itsvalue === '3'){
					//district level
					var alldistricts = '<?php echo getDistricts_options(); ?>';
					//var alldesg = alldesg + '<?php echo getDesignations_options(false,NULL,3); ?>';
					$("#distcode").html(alldistricts);
					$('#ptype option:last-child').text("DHO Office");
				}else if(itsvalue === '2'){
					//province level
					//var alldesg = alldesg + '<?php echo getDesignations_options(false,NULL,2); ?>';
					$("#distcode").html('<option value="">-- All Districts --</option>');
				}else if(itsvalue === '4'){
					//multi district level
					/* var alldistricts = '<?php echo getDistricts_options(); ?>';
					var alldesg = alldesg + '<?php echo getDesignations_options(false,NULL,2); ?>';
					$("#distcode").html(alldistricts);
					//set option for multiple districts selection
					$("#distcode").attr("multiple","multiple");
					$("#distcode").css("height","100px");
					$("#distcode").attr("name","distcode[]"); */
					$("#distcode").html('<option value="">-- Multiple Districts --</option>');
				}else{	
					$('#ptype option:last-child').text("");
				}
				//$("#designation").html(alldesg);
			});
			//trigger level
			$("#level").trigger("change");
			
			$(document).ready(function() {
				$('#searchBtn').on('click' , function (event){
					event.preventDefault();
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo base_url(); ?>users/lists/0",
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
							url:"<?php echo base_url(); ?>users/lists/"+$(this).attr("data-ci-pagination-page"),
							dataType: "json",
							success:function(result/* responce */){
								/* var result=JSON.parse(responce); */
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