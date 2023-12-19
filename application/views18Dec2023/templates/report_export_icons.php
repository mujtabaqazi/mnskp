<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
if(!($this ->input -> post('export_excel'))) {
?>
<div class="row">
	<div class="col-xs-12 text-right">
		<div class="exporticons" style="margin-bottom:3px !important">
			<form method="post" id="export-form" action="">
				<?php
					foreach($_POST as $key => $val){
						if($key!='submit'){
							echo '<input type="hidden" name="'.$key.'" value="'.$val.'">';
						}
					}
				?>
				<a data-original-title="Print this Report" href="#" onclick="window.print();" class="my-tooltip" data-toggle="tooltip" data-placement="top"><img src="<?php echo $assetsPath; ?>images/print.png" alt="Print"></a>
				
				<a data-original-title="Export in Excel" href="#" onclick="document.getElementById('export-form').submit()" class="my-tooltip" data-toggle="tooltip" data-placement="top"><img src="<?php echo $assetsPath; ?>images/excel.png" alt="Excel" style="height: 35px; width: 34px;"></a>
				<input type="hidden" name="export_excel" value="export_excel" />
				
				<a data-original-title="Export in PDF" href="#" class="my-tooltip" data-toggle="tooltip" data-placement="top"><img src="<?php echo $assetsPath; ?>images/pdf.png" alt="PDF" style="height: 35px; width: 34px;"></a>
				
				<a data-original-title="Full Secreen" href="#" class="my-tooltip" data-toggle="tooltip" data-placement="top"><img src="<?php echo $assetsPath; ?>images/fullsecreen.png" alt="FullScreen" style="height: 35px; width: 34px;" onclick="goFullscreen('player'); return false"></a>
			</form>
		</div>
	</div>
</div>
<?php } ?>