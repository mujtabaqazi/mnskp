<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<footer class="footer">
	<div class="row roww" style="height: 15px;background: #0B7D05;"></div>
    <div class="row roww" style="background-color: #FFF;">
        <div class="col-md-5 col-md-offset-3">
			<p style="padding-top: 14px;font-weight: bold;color: rgb(70, 80, 71);">Copyright all rights reserved.Health Department Government of khyber Pakhtunkhwa.</p>
		</div>
		<div class="col-md-2 zp">
        <a href="<?php echo $basePath; ?>contents/downloads" target="_blank" ><img src="<?php echo $assetsPath; ?>images/download.jpg" style="width: 124px; margin-left: 30px; padding-top: 3px;"></a>
      </div>
    </div>
</footer>
<?php 
//for google analytics
include_once("analyticstracking.php"); ?>