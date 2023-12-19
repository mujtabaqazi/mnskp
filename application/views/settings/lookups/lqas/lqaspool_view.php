<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LQAS Pool Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> LQAS Pool Management (<?php echo isset($DataRow)?'View':''; ?> LQAS Pool)</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Description:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->description:''; ?></p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Mis_col:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->mis_col:''; ?></p>
					</div>	
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Program Name:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo $ptype=isset($DataRow)?$DataRow->ptype:"DG/DHO Office"; ?></p>
						<!--<p><?php// echo get_Program_Name(($DataRow)?$DataRow->ptype:NULL); ?></p>-->
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Register:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->register:''; ?></p>
					</div>
				</div>
				<?php if($ptype=="all"){ ?>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Apply On:</label>
					</div>
					<div class="col-xs-2">
					 <?php $isphc= isset($DataRow)?$DataRow->isphc:'';
							$isrhc= isset($DataRow)?$DataRow->isrhc:'';
							$isshc= isset($DataRow)?$DataRow->isshc:'';					
						 
							if($isphc==1 && $isrhc==1 && $isshc==1){
								echo "PHC,RHC,SHC";
							}
							else if($isphc==1 && $isrhc==1 && $isshc==0){
								echo "PHC,RHC";
							}
							else if ($isphc==0 && $isrhc==1 && $isshc==1){
								echo "RHC,SHC";
							}
							else if ($isphc==0 && $isrhc==1 && $isshc==0){
								echo "RHC";
							}
							else if ($isphc==0 && $isrhc==0 && $isshc==1){
								echo "SHC";
							}
							else if ($isphc==1 && $isrhc==0 && $isshc==1){
								echo "PHC,SHC";
							}
							else if ($isphc==1 && $isrhc==0 && $isshc==0){
								echo "PHC";
							}else{}
						}else{}
						?>
						
					</div>
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/lqaspool_edit/".$id; ?>" ><i class="fa fa-times"></i> Update </a> 
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/lqaspool"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
</body>
</html>