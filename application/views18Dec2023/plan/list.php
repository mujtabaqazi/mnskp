<?php 
$ulevel = $this -> session -> userLevel;
$basePath = base_url();
$assetsPath = base_url()."assets/";
$totalchklst 	= $this -> session ->totalchklst;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Plans || List</title>
		<?php $this->load->view("templates/styles"); ?>     
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="bgrowlis">
						<p>Plans Management (List of current plans)</p> 
					</div>
				</div>
			</div>
			<div class="filters">
				<?php if ($totalchklst > 0) { ?>
					<div style="margin-bottom: -18px;" class="row">
						<div class="col-xs-2" style="width: 12% ! important; margin-left: 88%;">
							<a href="<?php echo $basePath."plans/add"; ?>" class="link-add-new"><img src="<?php echo $assetsPath; ?>images/addnew.png"><?php echo "Make Plan"; ?></a>
						</div>
					</div>
				<?php } ?>
			</div>
			<br>
			<?php 
				//echo getListingTable($tableData,"plans/plan",true,true);
				$count = 0;
				$returnData = "<table class=\"table table-striped table-bordered table-hover tbl-listing\">";
				foreach($tableData as $key => $value)
				{
					$id = 0;
					$id = $value["id"];
					$stat = (isset($value["DHO Approved"]))?$value["DHO Approved"]:$value["PD Approved"];
					unset($value["id"]);
					$delPath = base_url()."plans/plan_delete/".$id;
					if($count == 0)
					{
						$returnData .= "<thead><tr class=\"tr-h-list-bg\"><th>Sr#</th><th>";
						$returnData .= implode("</th><th>",array_map("ucwords",array_keys($value)));
						$returnData .= "</th>";
						$returnData .= "<th colspan=\"3\">Action</th>";
						$returnData .= "</tr></thead><tbody id=\"tbody\">";
					}       
					$count++;
					$returnData .= "<tr><td>$count<input type=\"hidden\" class=\"rowCode\" value=\"$id\" ></td><td>";
					$returnData .= implode("</td><td>",$value);
					$returnData .= "</td>";
					$returnData .= "<td><a href=\"".base_url()."plans/plan_view/$id\"><i class=\"fa fa-search\"></i></a></td>";
					if($stat=="Approved"){}else{
						$returnData .= "<td><a href=\"".base_url()."plans/plan_edit/$id\"><i class=\"fa fa-pencil\"></i></a></td>";
					}
					//$returnData .= "<td><a href=\"$delPath\" onclick=\"return confirm('Are you sure you want to delete this?');\"><i class=\"fa fa-trash-o\"></i></a></td>";
					$returnData .= "</tr>";
				}
				if($count == 0)
				{
					$returnData .= "<thead><tr><th> No Record Found </th></tr></thead><tbody>";
				}
				echo $returnData .= "</tbody></table>";
			?>
		</div><!--end of container-->		
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>