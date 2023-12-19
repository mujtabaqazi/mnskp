<?php
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<div class="row roww" style="background-color:#0B7D05;">
<div class="col-lg-2 col-md-2 col-sm-1 col-xs-2 text-right">
<img src="<?php echo $assetsPath; ?>images/logo6.png" style="width: 83px;">
</div>

<div class="col-lg-6 col-md-6 col-sm-8 col-xs-6 zp">
<h1 class="title" >Monitoring and Supervisory System</h1>
<h3 class="subtittle" >Department of Health, Government of Khyber Pakhtunkhwa <span><?php echo get_District_Name($this -> session -> distcode); ?> </span></h3>
</div>
<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1">
<img src="<?php echo $assetsPath; ?>images/3.png" style="height: 90px; margin-top: 2px;">
</div>


<div class="col-lg-3 col-md-3 col-sm-12  col-xs-12" style="background-color: #0B7D05; padding-top: 4px;min-height: 90px;">
<div class="row" style="padding-top: 2px;">
<div class="col-xs-12 zp">
<ul class="userinfo">
<?php
$dists = '';
if($this -> session -> distcode > 0){
$dists = get_District_Name($this -> session -> distcode);
}else{
$dists = getuserdistricts();
}
if($dists!=''){?>
<li><span>District:</span><span class="sptxt"><?php echo $dists; ?></span></li>
<?php }?>
<li><span class="splbl">Programme:</span><span class="sptxt"><?php echo get_Program_Name($this -> session -> ptype); ?></span></li>
<li><span class="splbl">Designation:</span><span class="sptxt"><?php echo get_Designation_Name($this -> session -> desg); ?></span></li>
<li class="liu"><a class="link-user dropdown-toggle" data-toggle="dropdown"><span class="splbl">User Id:</span><span class="sptxt"><?php echo $this -> session -> username; ?></span></a>
<ul class="dropdown-menu dpdown-user">
<li class="libuser">
<a href="<?php echo $basePath."users/logout"; ?>" class="test">
<i class="fa fa-sign-out fa-lg" style="color:#0B7D05;"></i>  Log out
</a>
</li><hr style="margin:0px;">
<li class="libuser">
<a href="<?php echo $basePath."users/changePass"; ?>" class="test">
<i class="fa fa-key fa-lg" style="color:#0B7D05;"></i>  Change Password
</a>

</li>
</ul></li>
</ul>

</div>
</div>
</div>

</div>
<div class="loading hide">Loading&#8230;</div>