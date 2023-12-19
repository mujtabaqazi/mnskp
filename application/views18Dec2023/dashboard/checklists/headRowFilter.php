<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<div class="row">
	<form id="filter-form" method="POST" action="<?php echo $basePath; ?>dashboard/checklists/imc_<?php echo $target; ?>" enctype="multipart/form-data">
		<div class="col-md-5 zp">			
			<div class="col-xs-2">
				<label class="pt8">Frequency:</label>
			</div>
			<div class="col-xs-10">
				<input type="radio" name="frequency" value="m" <?php echo (isset($frequency) && $frequency=="m")?'checked="checked"':'';?> class="mt9" >
				<label>Monthly</label>&nbsp;
				<input type="radio" name="frequency" value="q" <?php echo (isset($frequency) && $frequency=="q")?'checked="checked"':'';?> class="mt9" >
				<label>Quarterly</label>&nbsp;
				<input type="radio" name="frequency" value="y" <?php echo (isset($frequency) && $frequency=="y")?'checked="checked"':'';?> class="mt9" >
				<label>Annually</label>&nbsp;
				<input type="radio" name="frequency" value="fy" <?php echo (isset($frequency) && $frequency=="fy")?'checked="checked"':'';?> class="mt9" >
				<label>Fiscal year</label>&nbsp;
			</div>	
		</div>
		<div class="col-md-3 zp">			
			<div class="col-xs-3">
				<label class="pt8">Period:</label>
			</div>
			<div class="col-xs-9">
				<select class="form-control period" name="<?php echo $attr; ?>" id="<?php echo $attr; ?>">
					<?php echo $htmloptions; ?>
				</select>
			</div>	
		</div>
		<div class="col-md-4 zp">			
			<div class="col-xs-2 zp">
				<label class="pt8">Checklist:</label>
			</div>
			<div class="col-xs-10">
				<?php
					// later get all checklists from some function for specific module and show here
					$htmloptions = '<option value="31" data-short="gois" '.(($target=="gois")?"selected='selected'":"").'>General Outlook - Instrument and Service Availability Checklist</option>';
					$htmloptions .= '<option value="35" data-short="epi" '.(($target=="epi")?"selected='selected'":"").'>EPI Services Checklist</option>';
					$htmloptions .= '<option value="38" data-short="malaria" '.(($target=="malaria")?"selected='selected'":"").'>Malaria Services Checklist</option>';
					$htmloptions .= '<option value="43" data-short="indoor" '.(($target=="indoor")?"selected='selected'":"").'>General Services – Indoor Ward Checklist</option>';
				?>
				<select class="form-control" name="checklist" id="checklist">
					<?php echo $htmloptions; ?>
				</select>
			</div>	
		</div>
	</form>
</div><!--end of row-->