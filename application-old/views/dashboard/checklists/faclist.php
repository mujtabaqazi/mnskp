<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title><?php echo $pagetitle ?></title>
	  <?php $this->load->view("templates/styles"); ?>
		<style>
			.vertical{
				-webkit-transform: rotate(270deg);
				-moz-transform: rotate(270deg);
				-ms-transform: rotate(270deg);
				white-space: nowrap;
				max-width: 20px;
				vertical-align: bottom;
				margin-top: 52px;
				font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
			}			
		</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Facility wise tools availability status</div>
			</div>
			<div class="row">
				<div class="col-xs-offset-2 col-xs-3">
					<strong>Checklist:</strong> <?php echo $pagetitle; ?>
				</div>
				<div class="col-xs-2">
					<strong><?php echo $periodtext; ?></strong>: <?php echo $period; ?>
				</div>
				<div class="col-xs-3">
					<strong>District:</strong> <?php echo ucfirst(get_District_Name($distcode)); ?>
				</div>
			</div>
			<br>
			<?php 
				$rowspan="";
				$headHtml="";
				if(array_key_exists('sname',$labels[0])){
					$rowspan="rowspan='2' style='vertical-align: middle;'";
					$headHtml = '<th colspan="2" class="text-center">'.implode("</th><th colspan='2' class='text-center'>",array_column($labels,"label")).'</th>';
					$headHtml .= '</tr><tr>';
					$headinnerCol ="";
					for($i=1; $i<=(count($labels)); $i++){
						$headinnerCol .= '<th><p class="vertical">Available</p></th><th><p class="vertical">Functional</p></th>';
					}
					$headHtml .= $headinnerCol.'</tr>';
				}else{
					$headHtml = '<th>'.implode("</th><th>",array_column($labels,"label")).'</th></tr>'; 
				} ?>
			<table class="table table-striped table-bordered table-hover tbl-listing">
				<thead>
					<tr>
						<th <?php echo $rowspan ?> >Sr#</th>
						<th <?php echo $rowspan ?> >Facode</th>
						<th <?php echo $rowspan ?> >Facility Name</th>
						<th <?php echo $rowspan ?> >Supervisor</th>
						<th <?php echo $rowspan ?> >Date of Visit</th>
						<?php 
						echo $headHtml;
						?>
				</thead>
				<tbody>
					<?php foreach($checklistdata as $key => $onerow){ ?>
						<tr class="DrillDownRow" style="cursor: pointer;">
							<td><?php echo ($key+1); ?><input class="rowCode" value="<?php echo $onerow["vpvc_id"]; ?>" type="hidden"></td>
							<td><?php echo $onerow["facode"]; ?></td>
							<td><?php echo $onerow["facility"]; ?></td>
							<td><?php echo $onerow["supervisor_name"]; ?></td>
							<td><?php echo $onerow["dov"]; ?></td>
							<?php 
							$names = array_column($labels,"name","sname");
							foreach($names as $key => $onename){
								$val = $onerow[$onename];
								$htmll = ($val==1)?'<span style="color: green">&#10004;</span>':'<span style="color: red">&#10006;</span>';
								echo '<td>'.$htmll.'</td>';
								if(!empty($rowspan)){
									$val1 = $onerow[$key];
									$htmll1 = ($val1==1)?'<span style="color: green">&#10004;</span>':'<span style="color: red">&#10006;</span>';
									echo '<td>'.$htmll1.'</td>';
								}
							} ?>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $parts = explode("_",$tablee); ?>
		<script type="text/javascript">
			$(document).on('click',".DrillDownRow", function(){
				var code = $(this).find("td:first-child .rowCode").val();
				var url = '';
				url = '<?php echo $basePath; ?>'+"<?php echo $parts[0]; ?>/forms/<?php echo $parts[1]; ?>_view/"+code;
				if(url != '')
				{
					var win = window.open(url,'_blank');
					if(win){
						//Browser has allowed it to be opened
						win.focus();
					}else{
						//Broswer has blocked it
						alert('Please allow popups for this site');
					}
				}
			});
			window.stop();
		</script>
	</body>
</html>