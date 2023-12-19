<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<table class="table table-striped table-bordered mb0">
	<thead style="background: #0E6EAB;color: white;">
		<tr>
			<th>#</th>
			<th>Year-Month</th>
			<th class="text-center">Supervisors with Plan</th>
			<th class="text-center">Planned Visits</th>
			<th class="text-center">Visits Held</th>
			<th class="text-center">Mobile verified Visits</th>
			<th class="text-center">Planned Checklists</th>
			<th class="text-center">Checklists Filled</th>
			<th class="text-center">HF in Plans</th>
			<th class="text-center">HF Visited</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		$count = 1;
		foreach($PlansInfo as $planinfo){ ?>
			<tr class="drillableRow" data-code="<?php echo $planinfo["code"]; ?>" data-frequency="m" data-fmonth="<?php echo $planinfo["fmonth"]; ?>">
				<th><?php echo $count; ?></th>
				<td><?php echo $planinfo["fmonth"]; ?></td>
				<td class="text-center"><span><?php echo $planinfo["supervisors"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["visits"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["visitsheld"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["confirmed"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["checklists"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["filled"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["hfplanned"]; ?></span></td>
				<td class="text-center"><span><?php echo $planinfo["hfvisited"]; ?></span></td>
			</tr><?php 
			$count++;
		} ?>
	</tbody>
</table>
<script type="text/javascript">
	$('.drillableRow').css('cursor','pointer');
</script>