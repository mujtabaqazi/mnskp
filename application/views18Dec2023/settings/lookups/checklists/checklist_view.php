<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checklists Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> Checklist Management (View Checklist)</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Checklist:</label>
					</div>
					<div class="col-xs-7">
						<p><?php echo isset($DataRow)?$DataRow->name:''; ?></p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Purpose:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->purpose:''; ?></p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Interval:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->interval:''; ?></p>
					</div>		  
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Facility Type Level:</label>
					</div>
					<div class="col-xs-2">
						<p>
							<?php 
							if($DataRow){
								switch($DataRow->fatypelevel){
									case '1':
										echo 'Super Admin';
										break;
									case '2':
										echo 'Province';
										break;
									case '3':
										echo 'District';
										break;
									case '4':
										echo 'CMW School';
										break;
									default:
										echo '';
										break;
								}
							} ?>
						</p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Program:</label>
					</div>
					<div class="col-xs-2">
						<p>
							<?php echo get_Program_Name(($DataRow)?$DataRow->ptype:NULL); ?>
						</p>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1"></div>
					<div class="col-xs-2">
						<label>Short Name:</label>
					</div>
					<div class="col-xs-2">
						<p><?php echo isset($DataRow)?$DataRow->shortname:''; ?></p>
					</div>
					<div class="col-xs-1"></div>
					<div class="col-xs-2">
						<label>Table Name:</label>
					</div>
					<div class="col-xs-2">						
						<p><?php echo isset($DataRow)?$DataRow->tablename:''; ?></p>
					</div>		  
				</div>
				<hr>
				<div class="row" style="padding-bottom: 1px;">
					<div class="col-xs-12 cmargin27 bgcolcl text-center">
						<label>Respondents Of Checklists</label>
					</div>
				</div>				
				<div class="row bc">
					<div class="col-xs-1 text-center">
						<label>Sr. No.</label>
					</div>
					<div class="col-xs-4 zp brl text-center">
						<label>Program</label>
					</div>
					<div class="col-xs-3 br zp text-center">
						<label>Respondent</label>
					</div>
					<div class="col-xs-4 br text-left">
						<label>Respondent Display Name</label>
					</div>
				</div>
				<?php foreach($chklst_targets as $key => $val){ ?>
					<div class="row cloned-row" style="border-bottom: 1px solid rgba(0, 0, 0, 0.34);">
						<div class="row">								
							<div class="col-xs-1 text-center">
								<p><?php echo ($key+1); ?></p>
							</div>
							<div class="col-xs-4">
								<p><?php echo get_Program_Name($val["ptype"]); ?></p>
							</div>								
							<div class="col-xs-3">
								<p><?php echo $val["name"]; ?></p>
							</div>
							<div class="col-xs-4">
								<p><?php echo $val["displaytitle"]; ?></p>
							</div>
						</div>
					</div>
				<?php }?>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/checklist_edit/".$id; ?>" ><i class="fa fa-times"></i> Update </a> 
						<a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/checklists"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
</body>
</html>