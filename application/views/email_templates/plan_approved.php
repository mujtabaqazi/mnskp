<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Monitoring and Supervisory Checklists</title>
	</head>
	<body>
		<p>Dear <b><?php echo $fullname; ?></b></p>
		<p><?php echo $designation; ?></p>
		<p>Your Plan for the month of <?php echo $fmonth; ?> has been approved by <?php echo $approved_by; ?>.</p>
		<p>Following are the details of your plan for <?php echo $fmonth; ?></p>
		<table cellspacing="0" cellpadding="0" border="1">
			<tbody>
				<tr>
					<td width="43" valign="top">
						<p><strong>S#</strong></p>
					</td>
					<td width="90" valign="top">
						<p><strong>Date of Visit</strong></p>
					</td>
					<td width="90" valign="top">
						<p><strong>Facility Code</strong></p>
					</td>
					<td width="108" valign="top">
						<p><strong>Facility Name</strong></p>
					</td>
					<td width="84" valign="top">
						<p><strong>Vehicle No</strong></p>
					</td>
					<td width="85" valign="top">
						<p><strong>Driver Name</strong></p>
					</td>
				</tr><?php 
				if(isset($visits) && is_array($visits)){
					foreach($visits as $key => $val){ ?>
						<tr>
							<td width="43" valign="top">
								<p><?php echo ($key+1); ?></p>
							</td>
							<td width="90" valign="top">
								<p><?php echo $val["visitdate"]; ?></p>
							</td>
							<td width="90" valign="top">
								<p><?php echo $val["facode"]; ?></p>
							</td>
							<td width="108" valign="top">
								<p><?php echo get_Facility_Name($val["facode"]); ?></p>
							</td>
							<td width="84" valign="top">
								<p><?php echo $val["vehicleassigned"]; ?></p>
							</td>
							<td width="85" valign="top">
								<p><?php echo $val["driver"]; ?></p>
							</td>
						</tr><?php 
					}
				}?>
			</tbody>
		</table>
		<p>&nbsp;</p>
		<p>Monitoring and Supervision MIS</p>
		<p>Link: <?php echo $basePath; ?></p>
		<p>&nbsp;</p>
	</body>
</html>