<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Malaria - Checklist for Rapid Diagnostic Test (RDT) Center || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">
					Malaria - Checklist for Rapid Diagnostic Test (RDT) Center
				</div>
				<div class="panel-body pbody">
					<?php 
					echo validation_errors();
					$action = $basePath."mcp/rdt/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id,'fmonth'=>$vpvcDataRow->fmonth);
					echo form_open_multipart($action,$attributes,$hidden); ?>
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Name</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Supervisor Designation</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->facility:''; ?></label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Facility Type</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="fatype" id="fatype" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype:''; ?>" required="required" class="form-control"  readonly="readonly" >               				
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?get_Fatype_Name($vpvcDataRow->fatype):''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Province</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-2">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >			
								<label class="pt7 pb2"><?php  echo (isset($vpvcDataRow))?get_Facility_District_Name($vpvcDataRow->facode):''; ?></label>
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Reporting Month</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="fmonth"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" type="hidden" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?></label>
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dov"; echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?>" name="<?php echo $var; ?>" id="<?php echo $var; ?>" type="text" required="required" class="form-control dp1" >
								<!-- <label class="pt7 pb2"><?php echo isset($vpvcDataRow)?date("d-m-Y",strtotime($vpvcDataRow->visitdate)):''; ?></label> -->
							</div>
							
							<div class="col-xs-2">
								<label class="pt7 pb2">Date Of Last Visit</label>
							</div>
							<div class="col-xs-2">
								<input value="<?php $var ="dolv"; echo isset($DataRow)?date("d-m-Y",strtotime($DataRow->$var)):''; ?>" name="<?php echo $var; ?>" type="text"  class="form-control dp anyOtherDate" >               
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Name of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_name" value="<?php $var="moniter_name"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Designation of Monitor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="moniter_desg" value="<?php $var="moniter_desg"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">District Lab Supervisor</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="lab_supervisor" value="<?php $var="lab_supervisor"; echo isset($DataRow)?$DataRow->$var:'';?>" type="text">
							</div>
							
						</div>
						<div class="row">
							<div class="col-xs-2">
								<label class="pt7 pb2">Medical Officer/Incharge</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control" id="" name="incharge" value="<?php $var="incharge"; echo isset($vpvcDataRow)?get_Facility_Incharge($vpvcDataRow->facode):'';?>" type="text">
							</div>
							<div class="col-xs-2">
								<label class="pt7 pb2">Catchment Area Population</label>
							</div>
							<div class="col-xs-2">
								<input class="form-control numberclass noDots" id="" name="catchment_area_pop" value="<?php $var="catchment_area_pop"; echo isset($vpvcDataRow)?get_Facility_Population($vpvcDataRow->facode):'';?>" type="text">
							</div>
						</div>
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>C. Stock update</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-2 text-center">
								<label>RDTs available in stock</label>
							</div>
							<div class="col-xs-2 brl zp text-center">
								<label>CQ tablets available in stock</label>
							</div>
							<div class="col-xs-2 zp text-center">
								<label>CQ syrups available in stock</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label>ACT adult doses available in stock</label>
							</div>
							<div class="col-xs-3 text-center">
								<label>ACT child doses available in stock</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='rdt_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='cq_tab_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='cq_syp_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='act_adult_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='act_child_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<div class="row bc mt1">
							<div class="col-xs-3 text-center">
								<label>Tab. Primaquine 15 mg available in stock</label>
							</div>
							<div class="col-xs-3 brl zp text-center">
								<label>Tab. Primaquine 7.5 mg available in stock</label>
							</div>
							<div class="col-xs-3 text-center">
								<label>Inj. Artemether 80 mg available in stock</label>
							</div>
							<div class="col-xs-3 bl text-center">
								<label>Inj. Artemether 40 mg available in stock</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var='prim_fifteen_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='prim_seven_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='art_eighty_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
							<div class="col-xs-3 zp">
								<input class="form-control numberclass noDots" value="<?php $var ='art_forty_stock'; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>" type="text">
							</div>
						</div>
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>D. Store and storage</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1">
								<label class="pt14">Sr. No.</label>
							</div>
							<div class="col-xs-7 brl">
								<label class="pt14 pb12">Item</label>
							</div>
							<div class="col-xs-2 br text-center">
								<label class="pt14 pb12">Available</label>
							</div>
							<div class="col-xs-2 bl text-center">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Observation</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-12 text-center">
										<label>3-month supply</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels=array(
							"RDT stored in a cool, shaded area",
							"RDT protected from heat, fire, rain, pests, etc.",
							"RDT sufficient stock",
							"Lancets ",
							"Alcohol ",
							"Cotton",
							"CQ tabs",
							"CQ syrup ",
							"Tab. Primaquin 15 mg",
							"Tab. Primaquin 7.5 mg",
							"Inj. Artemether 80 mg",
							"Inj. Artemether 40 mg",
							"ACTs adult doses ",
							"ACTs child doses "
						);
						for($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $i;?></label>
							</div>
							<div class="col-xs-7">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-2">
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='ss_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='ss_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
							</div>
							<div class="col-xs-2">
								<?php if ($i>2){ ?>
								<div class="row">
									<div class="col-xs-6 text-right">
										<label>Yes</label>&nbsp;
										<input <?php $var ='ss_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9"  type="radio">
									</div>
									<div class="col-xs-6 text-left">
										<label>No</label>&nbsp;
										<input <?php $var ='ss_r'.$i.'_f2'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9"  type="radio">
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<div class="row mt1 mb1">
							<div class="col-xs-12 bgcolcl text-center">
								<label>E. Quality assurance</label>
							</div>
						</div>
						<div class="row bc">
							<div class="col-xs-1">
								<label class="pt14">Sr. No.</label>
							</div>
							<div class="col-xs-8 bl text-center">
								<label class="pt14 pb12">Item</label>
							</div>
							<div class="col-xs-3 bl">
								<div class="row">
									<div class="col-xs-12 text-center">
										<label>Observation</label>
									</div>
								</div>
								<div class="row bt">
									<div class="col-xs-6 br text-center">
										<label>Yes</label>
									</div>
									<div class="col-xs-6 text-center">
										<label>No</label>
									</div>
								</div>
							</div>
						</div>
						<?php 
						$labels=array(
							"FM 1 register complete, up-dated and includes monthly summary?", 
							"HW attended a formal training on RDT?",
							"HW has been supervised at least once during past one month by the facility in-charge?",
							"HW has been supervised at least once during past 3 months by the DLS or an external senior supervisor?",
							"Procedure manual/job aid available in the testing site?",
							"Manual/job aid regularly used by the health worker?",
							"Guidelines on treatment and management of RDT outcomes available?",
							"RDT expiry date checked before performing test?",
							"RDT device labeled properly?",
							"Proper timing observed before reading test result?",
							"Test result interpreted correctly?",
							"Appropriate container available for used lancets, cotton and other infectious wastes?",
							"Patient details in RDT cross-checked with details in FM1 register before reporting of the result/",
							"Test result recorded in patient FM1 register?",
							"Action taken on RDT results correct?"
						);
						for($i=1;$i<=count($labels);$i++){
						?>
						<div class="row">
							<div class="col-xs-1">
								<label class="pt7 pb2"><?php echo $i; ?></label>
							</div>
							<div class="col-xs-8">
								<label class="pt7 pb2"><?php echo $labels[$i-1]; ?></label>
							</div>
							<div class="col-xs-3">
								<div class="row">
									<div class="col-xs-6 text-center">
										<label>Yes</label>&nbsp;
										<input <?php $var ='qa_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="1" class="mt9" type="radio">
									</div>
									<div class="col-xs-6 text-center">
										<label>No</label>&nbsp;
										<input <?php $var ='qa_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="0")?'checked="checked"':''):''; ?> name="<?php echo $var; ?>" value="0" class="mt9" type="radio">
									</div>
								</div>
							</div>
						</div>
						<?php } ?>
					</div><!--end of div rowlightbg-->
					<div class="row mt1 mb1">
						<div class="col-xs-12 bgcolcl text-center">
							<label>COMMENTS</label>
						</div>
					</div>
					<div class="row mt1">
						<div class="col-xs-12 zp">
							<textarea id="" name="comments" rows="5" class="form-control"><?php $var='comments'; echo isset ($DataRow)?$DataRow->$var:"" ; ?></textarea>
						</div>
					</div>
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-file"></i> Save Form
							</button>
							<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-floppy-o"></i> Submit Form
							</button>
							<a class="btn btn-primary btn-md btncc" onclick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
						</div>
					</div>

					<?php echo form_close(); ?>
				</div>
				<!--end of panel body-->
			</div>
			<!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		<script>
			$(".yp").datepicker({
				format: " yyyy",
				viewMode: "years", 
				minViewMode: "years"
			});
		</script>
	</body>
</html>