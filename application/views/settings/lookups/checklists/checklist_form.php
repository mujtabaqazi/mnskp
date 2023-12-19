<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Checklists Management</title>
	<?php $this->load->view("templates/styles"); ?>
</head>
<body>
	<!--start of header-->
	<?php $this->load->view("templates/header"); ?>
	<?php $this->load->view("templates/menu"); ?>
	<!--End of header-->
  
	<div class="container">   
		<div class="panel panel-primary">
			<div class="panel-heading text-center"> Checklist Management (<?php echo isset($DataRow)?'Update':'Add New'; ?> Checklist)</div>
			<div class="panel-body">
				<?php 
				echo validation_errors();
				$action = $basePath."settings/checklist_save";
				$action .= isset($DataRow)?'/'.$id:'';
				$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
				echo form_open_multipart($action,$attributes); ?>				
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Checklist:</label>
					</div>
					<div class="col-xs-7">
						<input class="form-control" required="required" type="text" name="name" id="name" value="<?php echo isset($DataRow)?$DataRow->name:''; ?>" placeholder="Checklist Name e.g: District Program Implementation Unit Checklist" />
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Purpose:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="purpose" id="purpose" value="<?php echo isset($DataRow)?$DataRow->purpose:''; ?>" placeholder="e.g:Assessment of DPIU" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Interval:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="interval" id="interval" value="<?php echo isset($DataRow)?$DataRow->interval:''; ?>" placeholder="e.g:Monthly/Quarterly" />
					</div>		  
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Facility Type Level:</label>
					</div>
					<div class="col-xs-2">
						<select size="1" class="form-control" name="fatypelevel" required="" id="fatypelevel">
							<?php 
							echo getlevel_options(false,isset($DataRow)?$DataRow->fatypelevel:NULL); ?>
							<option value="4" <?php echo (isset($DataRow) && ($DataRow->fatypelevel=="4"))?'selected="selected"':''; ?>>CMW School</option>
						</select>
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Program:</label>
					</div>
					<div class="col-xs-2">
						<select size="1" class="form-control" name="ptype" id="ptype">
							<?php echo getPrograms_options(false,isset($DataRow)?$DataRow->ptype:NULL); ?>
						</select>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-1 col-xs-offset-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Short Name:</label>
					</div>
					<div class="col-xs-2">
						<input class="form-control" required="required" type="text" name="shortname" id="shortname" value="<?php echo isset($DataRow)?$DataRow->shortname:''; ?>" placeholder="e.g:dpiu" />
					</div>
					<div class="col-xs-1 cmargin27"></div>
					<div class="col-xs-2 cmargin27">
						<label>Table Name:</label>
					</div>
					<div class="col-xs-2">						
						<input class="form-control" required="required" readonly="readonly" type="text" name="tablename" id="tablename" value="<?php echo isset($DataRow)?$DataRow->tablename:''; ?>" placeholder="e.g:lhw_dpiu" />
					</div>		  
				</div>
				<hr>
				<div class="row" style="padding-bottom: 1px;">
					<div class="col-xs-12 cmargin27 bgcolcl text-center">
						<label>Respondents Of Checklists</label>
					</div>
				</div>				
				<div class="row bc">
					<div class="col-xs-1 text-center">
						<label>Sr. No.</label>
					</div>
					<div class="col-xs-4 zp brl text-center">
						<label>Program</label>
					</div>
					<div class="col-xs-3 br zp text-center">
						<label>Respondent</label>
					</div>
					<div class="col-xs-4 br text-left">
						<label>Respondent Display Name</label>
					</div>
				</div>
				<?php if(isset($chklst_targets)){ ?>
					<?php foreach($chklst_targets as $key => $val){ ?>
						<div class="cloned-row">
							<div class="row">								
								<div class="col-xs-1">
									<label class="mt7"><?php echo ($key+1); ?></label>
								</div>
								<div class="col-xs-4 zp">
									<select class="form-control" name="trg_ptype[]">
										<?php echo getPrograms_options(false,$val["ptype"]); ?>
									</select>
								</div>								
								<div class="col-xs-3 zp">
									<select class="form-control" name="trg_hcptype[]">
										<?php echo getHCP_options(false,$val["hcptype_id"]); ?>
									</select>
								</div>
								<div class="col-xs-4 zp">
									<input class="form-control" required="required" type="text" name="displaytitle[]" value="<?php echo $val["displaytitle"]; ?>" style="width:92%;float:left;" />									
									<button style="float:right;margin-top:2%;margin-right:1%;" type="button" class="btn btn-danger btn-xs <?php if($key!=0){ echo "delRow_btn";} ?>" data-original-title="delete record"  data-toggle="tooltip" title="Delete record" id="hide"><i  class="fa fa-minus"></i></button>
								</div>
							</div>
						</div>
					<?php }?><?php
				}else{ ?>
					<div class="cloned-row">
						<div class="row">								
							<div class="col-xs-1">
								<label class="mt7">1</label>
							</div>
							<div class="col-xs-4 zp">
								<select class="form-control" name="trg_ptype[]">
									<?php echo getPrograms_options(); ?>
								</select>
							</div>								
							<div class="col-xs-3 zp">
								<select class="form-control" name="trg_hcptype[]">
									<?php echo getHCP_options(); ?>
								</select>
							</div>
							<div class="col-xs-4 zp">
								<input class="form-control" required="required" type="text" name="displaytitle[]" value="" style="width:92%;float:left;" />									
								<button style="float:right;margin-top:2%;margin-right:1%;" type="button" class="btn btn-danger btn-xs" data-original-title="delete record"  data-toggle="tooltip" title="Delete record" id="hide"><i  class="fa fa-minus"></i></button>
							</div>
						</div>
					</div>
				<?php } ?>
				<div class="row">          
					<div class="col-xs-1 col-xs-offset-11 text-right zp">
						<button style="margin-right:3%" type="button" class="btn btn-success btn-xs" data-original-title="add new record"  data-toggle="tooltip" title="" value="clone" id="clone"><i class="fa fa-plus"></i></button>
					</div>
				</div>
				<div class="row">
					<hr>
					<div class="col-md-4 col-sm-4 col-xs-4" style="margin-left: 60.3%;">
						<button type="submit" class="btn btn-primary btn-md" role="button"><i class="fa fa-floppy-o "></i> Save Form  </button>
						
					  <button type="reset" class="btn btn-primary btn-md">
						<i class="fa fa-repeat"></i> Reset Form </button>
					 
					  <a class="btn btn-primary btn-md" href="<?php echo $basePath."settings/checklists"; ?>" ><i class="fa fa-times"></i> Cancel </a>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div> <!--end of panel body-->
		</div> <!--end of panel panel-primary-->
	</div><!--end of container-->
	<!-- common div use to create new target rows -->
	<div class="cloned-rowHidden hide">
		<div class="row">								
			<div class="col-xs-1">
				<label class="mt7">1</label>
			</div>
			<div class="col-xs-4 zp">
				<select class="form-control" name="trg_ptype[]">
					<?php echo getPrograms_options(); ?>
				</select>
			</div>								
			<div class="col-xs-3 zp">
				<select class="form-control" name="trg_hcptype[]">
					<?php echo getHCP_options(); ?>
				</select>
			</div>
			<div class="col-xs-4 zp">
				<input class="form-control" required="required" type="text" name="displaytitle[]" value="" style="width:92%;float:left;" />									
				<button style="float:right;margin-top:2%;margin-right:1%;" type="button" class="btn btn-danger btn-xs delRow_btn" data-original-title="delete record"  data-toggle="tooltip" title="Delete record" id="hide"><i  class="fa fa-minus"></i></button>
			</div>
		</div>
	</div>
	<?php $this->load->view("templates/footer"); ?>
	<?php $this->load->view("templates/scripts"); ?>
	<script type="text/javascript">
	$(document).ready(function(){
		$("#shortname").change(function(){
			$("#tablename").val($("#ptype").val()+"_"+$("#shortname").val());
		});
		$("#ptype").change(function(){
			$("#tablename").val($("#ptype").val()+"_"+$("#shortname").val());
		});
		//function to reset all indexes and names of all visits
		function resetNames()
		{
			$(".cloned-row").each(function(index){
				var newIndex = parseInt(index)+1;
				$(this).find(".row:nth-child(1) div:first label:first").text(newIndex);
				//set all names
				$(this).find('select[name^="trg_ptype"]').attr("name","trg_ptype["+newIndex+"]");
				$(this).find('select[name^="trg_hcptype"]').attr("name","trg_hcptype["+newIndex+"]");
				$(this).find('input[name^="displaytitle"]').attr("name","displaytitle["+newIndex+"]");
			});
		}
		$(document).on("click","#clone",function() {
			var currentIndex = parseInt($(".cloned-row:last .row:nth-child(1) div:first label:first").text());
			$(".cloned-rowHidden:first").clone().removeClass('cloned-rowHidden hide').addClass("cloned-row").insertAfter(".cloned-row:last");
			var newIndex = currentIndex+1;
			$(".cloned-row:last .row:nth-child(1) div:first label:first").text(newIndex);
			//set all names
			$(".cloned-row:last").find('select[name="trg_ptype[]"]').attr("name","trg_ptype["+newIndex+"]");
			$(".cloned-row:last").find('select[name="trg_hcptype[]"]').attr("name","trg_hcptype["+newIndex+"]");
			$(".cloned-row:last").find('input[name="displaytitle[]"]').attr("name","displaytitle["+newIndex+"]");
		});
		$(document).on("click",".delRow_btn",function() {
			$(this).closest('div[class^="cloned-row"]').remove();
			//reset all names
			resetNames();
		});
	});
	</script>
</body>
</html>