<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>M&S || Users Login Logs</title>
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
						<p>District List</p> 
					</div>
				</div>
			</div>
			<!--
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
							<label>Level :</label>
						</div>
						<div class="col-xs-2">
							<select class="form-control" id="level" name="level">
								<?php echo getlevel_options(); ?>
							</select>
						</div>
						<div class="col-xs-2 cmargin27">
							<label>District(s) :</label>
						</div>
						<div class="col-xs-2">
							<select size="1" class="form-control" id="distcode" name="distcode">
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
						</div>
						<div class="col-xs-2">
							<a class="btn btn-search" name="searchBtn" id="searchBtn" style="width: 100%;border-radius: 0px;">
								<span><i class="fa fa-search"></i> Preview</span>
							</a>
						</div>
					</div>					
				<?php echo form_close(); ?>
			</div>end of div with class filters-->
			<div class="filters">
				<div class="row">
					<div class="col-xs-2" style="width: 10% ! important; margin-left: 90%;">
						<a href="<?php echo $basePath; ?>setup/district_add" class="link-add-new"><img src="<?php echo $assetsPath; ?>images/addnew.png">Add New</a>
					</div>
				</div>
			</div>
			<br>
			<?php echo getListingTableNew($tableData, "settings/Setup/district",false,false,"",false); ?>
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
				/* $(document).on("change","#level",function(){
					var itsvalue = $(this).val();					
					if(itsvalue === '3'){
						//district level
						var alldistricts = '<?php echo getDistricts_options(); ?>';					
						$("#distcode").html(alldistricts);
						
					}else if(itsvalue === '2'){
						//province level					
						$("#distcode").html('<option value="">-- All Districts --</option>');
					}
					else{
						//
					}
				}); 					
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
						if(diff<=30)
						{
							filterdata();
						}
						else{
							alert('Difference should be less than 30 days');
						}
					}else{
						alert('To period should be greater than OR equal to From period');
					}					
				});	
				function filterdata(){
					$('#tbody').html('');
					$('#tbody').html('<tr><td colspan="10" class="text-center" ><img src="<?php echo base_url(); ?>assets/images/ajax-loader_blue.gif"> loading...</td></tr>');
					$.ajax({
						type: "POST",
						data: $('#filter-form').serialize(),
						url: "<?php echo base_url(); ?>Users/loginlog",
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
							url:"<?php echo base_url(); ?>Users/loginlog/"+$(this).attr("data-ci-pagination-page"),
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
				});	 */		
			});
		</script>		
	</body>
</html>