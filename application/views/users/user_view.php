<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Users Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
  <div class="container">
   
    <div class="panel panel-primary">
   <div class="panel-heading text-center"> User Management (View User)
</div>
     <div class="panel-body">
		<div class="row">
          <div class="col-xs-1 cmargin27"></div>
          <div class="col-xs-2 cmargin27">
            <label>District:</label>
          </div>
			<div class="col-xs-3">
				<p><?php echo (isset($DataRow) && ($DataRow->distcode > 0))?get_District_Name($DataRow->distcode):""; ?></p>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Taluka:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo (isset($DataRow) && ($DataRow->tcode > 0))?get_Tehsil_Name($DataRow->tcode):""; ?></p>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Union Council:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo (isset($DataRow) && ($DataRow->uncode > 0))?get_UC_Name($DataRow->uncode):""; ?></p> 
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Health Facility:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo (isset($DataRow) && ($DataRow->facode > 0))?get_Facility_Name($DataRow->facode):""; ?></p>
			</div>
        </div>
        <div class="row">
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Designation:</label>
			</div>
			<div class="col-xs-3">
				<?php echo isset($DataRow)?get_Designation_Name($DataRow->designation):""; ?>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>User Type:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?$DataRow->utype:""; ?></p>
			</div>
        </div>
		<div class="row">
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Email:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?$DataRow->email:""; ?></p>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Full Name:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?$DataRow->fullname:""; ?></p>
			</div>		  
        </div>
		<div class="row">
			<div class="col-xs-1 cmargin27"></div>
			<div class="col-xs-2 cmargin27">
				<label>Username:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?$DataRow->username:""; ?></p>
			</div>
			<div class="col-xs-2 cmargin27">
				<label>Level:</label>
			</div>
			<div class="col-xs-3">
				<p><?php echo isset($DataRow)?(($DataRow->level==2)?"Province":"District"):""; ?></p>
			</div>		  
        </div>
        <div class="row">
			<hr>
			<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 72%;">
				<a class="btn btn-primary btn-md" href="<?php echo $basePath."users/user_edit/".$id; ?>" ><i class="fa fa-times"></i> Update </a> 
				<a class="btn btn-primary btn-md" href="<?php echo $basePath."users/lists"; ?>" ><i class="fa fa-times"></i> Cancel </a>
			</div>
        </div>
    </div> <!--end of panel body-->
 </div> <!--end of panel panel-primary-->
 
   
    

    

  </div><!--end of container-->
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>

</body>
</html>