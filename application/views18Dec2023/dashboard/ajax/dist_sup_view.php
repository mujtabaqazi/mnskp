<?php 
$basePath = base_url();
$assetsPath = base_url()."dashboards/";
$ulevel = $this -> session -> userLevel;
?>
<table class="table table-striped table-bordered mb0">
	<thead style="background: #0E6EAB;color: white;">
		<tr>
			<th>#</th>
			<th><?php if($distcode > 0){ echo 'Supervisor'; }else if($ulevel=='2'){ echo 'District'; }else{ echo 'Supervisor'; } ?></th>
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
			<tr class="drillSupPlan" data-code="<?php echo $planinfo["code"]; ?>">
				<th><?php echo $count; ?></th>
				<td><?php echo $planinfo["name"]; ?></td>
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
	$('.drillSupPlan').css('cursor','pointer');
</script>