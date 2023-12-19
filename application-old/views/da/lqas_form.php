<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>LQAS || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Data Accuracy Using LQAS Techniques
				</div>
				<div class="panel-body">
					<?php 
					echo validation_errors();
					$action = $basePath."da/lqas/save";
					$attributes = array('class' => 'form-horizontal', 'id' => 'myform');
					$hidden = array('vpvc_id' => $vpvc_id);
					echo form_open_multipart($action,$attributes,$hidden); ?>        
					<div class="rowlightbg">
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">Name of reporting Officer</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_name"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" required="required" type="text"  readonly="readonly" >
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Designation</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php $var ="supervisor_desg"; echo isset($vpvcDataRow)?$vpvcDataRow->$var:''; ?>" name="<?php echo $var; ?>" class="form-control" type="text"  readonly="readonly" >
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">Reporting month</label>
							</div>
							<div class="col-xs-3">
								<input type="text" name="fmonth" id="fmonth" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fmonth:''; ?>" readonly="readonly" >
								
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">District</label>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="distcode" id="distcode" required="required" class="form-control" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->distcode:''; ?>" >
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->district:''; ?></label>								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">LQAS Date</label>
							</div>
							<div class="col-xs-3">
								<input class="form-control dp" id="lqas_date" name="lqas_date" type="text" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->date_submitted:''; ?>" readonly="readonly">
							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Facility</label>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="entity_fatype" id="entity_fatype" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype:''; ?>" required="required" class="form-control">
								<input type="hidden" name="facode" id="facode" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->facode:''; ?>" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->fatype.'-'.$vpvcDataRow->facility:''; ?></label>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<input class="form-control" id="remarks" name="remarks" type="text" value="" >
							</div>

						</div>						
						<div class="row">
							<div class="col-xs-3">
								<label class="pt7 pb2">Entity Type</label>
							</div>
							<div class="col-xs-3">
								<input value="<?php if(isset($vpvcDataRow)){ if($vpvcDataRow->hcptype==''){ echo "DHIS";}else{echo $vpvcDataRow->hcptype;}}else{echo "DHIS";} ?>" name="entity_type" class="form-control" type="text" readonly="readonly" >

							</div>
							<div class="col-xs-3">
								<label class="pt7 pb2">Report For</label>
							</div>
							<div class="col-xs-3">
								<input type="hidden" name="entity_code" id="entity_code" value="<?php echo isset($vpvcDataRow)?$vpvcDataRow->target_value:''; ?>" required="required" class="form-control" >               
								<label class="pt7 pb2"><?php echo isset($vpvcDataRow)?$vpvcDataRow->target_value.'-'.$vpvcDataRow->hcpvalue:''; ?></label>
							</div>
						</div>
						<div class="row bc mt5">
							<div class="col-xs-1 text-center">
								<label class="pt20">Sr. #</label>
							</div>
							<div class="col-xs-3 brl text-center">
								<label class="pt10 pb10">Data elements from the monthly reporting form (randomly selected)</label>
							</div>
							<div class="col-xs-1 text-center zp">
								<label>No. from the MR form <?php //echo "(".((isset($deValues) && !empty($deValues))?$deValues["fmonth"]:"No MR Submitted").")"; ?></label>
							</div>
							<div class="col-xs-3 text-center bl">
								<label>Verification of data</label>
								<div class="row bt">
									<div class="col-xs-9 br text-center">
										<label class="pt6 pb8">Register/form</label>
									</div>
									<div class="col-xs-3 text-center">
										<label class="pt6">No.</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2 brl text-center">
								<label class="pt10 pb10">Do numbers in column 2 &amp;3 match?</label>
							</div>
							<div class="col-xs-2   zp text-center">
								<label class="pt10">Remarks(Such as Data availability, completeness etc)</label>
							</div>
						</div>
						<div class="row bc bt">
							<div class="col-xs-1"></div>
							<div class="col-xs-3 brl">
								<label>1</label>
							</div>
							<div class="col-xs-1">
								<label>2</label>
							</div>
							<div class="col-xs-3 bl">
								<label>3</label>
							</div>
							<div class="col-xs-2 brl text-center">
								<div class="row">
									<div class="col-xs-6 br">
										<label>Yes</label>
									</div>
									<div class="col-xs-6">
										<label>No</label>
									</div>
								</div>
							</div>
							<div class="col-xs-2"></div>
						</div>
						<?php for($i=1;$i<=12;$i++){ ?>
							<div class="row singlelqasrow">
								<div class="col-xs-1">
									<label class="mt7"><?php echo $i; ?></label>           
								</div>
								<div class="col-xs-3 zp">
									<input class="form-control" id="lqas_r<?php echo $i; ?>_f1" name="lqas_r<?php echo $i; ?>_f1" type="text" value="<?php //$var ="de".$i; echo isset($DataRow)?$DataRow->$var:''; ?>">
								</div>
								<div class="col-xs-1 zp">
									<input class="form-control number mrdata numberclass noDots" id="lqas_r<?php echo $i; ?>_f2" name="lqas_r<?php echo $i; ?>_f2" type="text" value="<?php //$var ="mis_col".$i; echo (isset($DataRow) && isset($deValues) && !empty($deValues))?$deValues[$DataRow->$var]:0; ?>">
								</div>
								<div class="col-xs-3">
									<div class="row">
										<div class="col-xs-9 zp">
											<input class="form-control" id="lqas_r<?php echo $i; ?>_f3" name="lqas_r<?php echo $i; ?>_f3" type="text" value="<?php //$var ="reg".$i; echo isset($DataRow)?$DataRow->$var:''; ?>">
										</div>
										<div class="col-xs-3 zp">
											<input class="form-control number vrfdata numberclass noDots" id="lqas_r<?php echo $i; ?>_f4" name="lqas_r<?php echo $i; ?>_f4" type="text">
										</div>
									</div>
								</div>
								<div class="col-xs-2 text-center">
									<div class="row">
										<div class="col-xs-6">
											<input value="1" type="radio" readonly="readonly" name="lqas_r<?php echo $i; ?>_f5" class="mt9 yesradio" >
										</div>
										<div class="col-xs-6">
											<input value="0" type="radio" readonly="readonly" name="lqas_r<?php echo $i; ?>_f5" class="mt9 noradio" >
										</div>
									</div>
								</div>
								<div class="col-xs-2 zp">  
									<input class="form-control" name="lqas_r<?php echo $i; ?>_f6" type="text"> 
								</div>
							</div>
						<?php } ?>
						<div class="row">       
							<div class="col-xs-3 col-xs-offset-5 text-right">
								<label class="mt7">Total</label>
							</div>
							<div class="col-xs-2 text-center">
								<div class="row">
									<div class="col-xs-6 zp">
										<input class="form-control text-center" id="lqas_tot" name="lqas_tot" readonly="readonly" type="text">
									</div>
									<div class="col-xs-6 zp">
										<input class="form-control text-center" id="lqas_tot_no" readonly="readonly" type="text">
									</div>
								</div>
							</div>
						</div>
						<div class="row" style="background: white none repeat scroll 0% 0%;">
							<div class="col-xs-3 col-xs-offset-5 text-right">
								<label class="mt7">Accuracy Percentage</label>
							</div>
							<div class="col-xs-2 zp">
								<input class="form-control text-center" id="lqas_ap" name="lqas_ap" readonly="readonly" type="text">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 bc cmargin27 text-center">
								<label>LQAS Table: Decisions Rules for Sample Sizes of 12 and Coverage Targets/Average of 40-95%</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-1 zp text-center">
								<label>Sample Size</label>
							</div>
							<div class="col-xs-1 zp bl text-center">
								<label>Less than 20%</label>
							</div>
							<div class="col-xs-10 text-center">
								<div class="row">
									<div class="col-xs-1 brl"><label>20%</label></div>
									<div class="col-xs-1"><label>30%</label></div>
									<div class="col-xs-1 brl"><label>40%</label></div>
									<div class="col-xs-1"><label>45%</label></div>
									<div class="col-xs-1 brl"><label>50%</label></div>
									<div class="col-xs-1"><label>60%</label></div>
									<div class="col-xs-1 brl"><label>65%</label></div>
									<div class="col-xs-1"><label>75%</label></div>
									<div class="col-xs-1 brl"><label>85%</label></div>
									<div class="col-xs-1"><label>90%</label></div>
									<div class="col-xs-1 brl"><label>95%</label></div>
									<div class="col-xs-1"><label>100%</label></div>
								</div>
							</div>
						</div>
						<div style="border-top: 1px solid; border-bottom: 1px solid;" class="row">
							<div class="col-xs-1 zp text-center">
								<label>12</label>
							</div>
							<div class="col-xs-1 zp bl text-center">
								<label>N/A</label>
							</div>
							<div class="col-xs-10 text-center">
								<div class="row">
									<div class="col-xs-1 brl"><label>1</label></div>
									<div class="col-xs-1"><label>2</label></div>
									<div class="col-xs-1 brl"><label>3</label></div>
									<div class="col-xs-1"><label>4</label></div>
									<div class="col-xs-1 brl"><label>5</label></div>
									<div class="col-xs-1"><label>6</label></div>
									<div class="col-xs-1 brl"><label>7</label></div>
									<div class="col-xs-1"><label>8</label></div>
									<div class="col-xs-1 brl"><label>9</label></div>
									<div class="col-xs-1"><label>10</label></div>
									<div class="col-xs-1 brl"><label>11</label></div>
									<div class="col-xs-1"><label>12</label></div>
								</div>
							</div>
						</div>
					</div><!--end of div rowlightbg-->
					<div class="row mt3">
						<div class="col-xs-12">
							<p class="mb1">•  Write the numbers from the DHIS monthly report for the previous month in column No. 2.</p>
							<p>•  Write the numbers from the relevant register in column No. 3. Of the same period.</p>
						</div>
					</div>
					<br> 
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<button type="submit" name="is_temp_saved" value="1" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-file"></i> Save Form  
							</button>
							<button type="submit" name="is_temp_saved" value="0" class="btn btn-primary btn-md btncc" role="button">
								<i class="fa fa-floppy-o"></i> Submit Form  
							</button>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-times"></i> Cancel </a>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<?php $this->load->view("templates/chklsts_scripts"); ?>
		<script>
			$(document).ready(function(){
				//to disable click 
				$(':radio').click(function(){
					return false;
				});
				//to set filter of facilities on change of fatype
				/* $(document).on('change','#entity_fatype',function (event){
					var moon = $(this);
					$.ajax({
						type: "POST",
						data: {fatype:$(this).val()},
						url: "<?php echo base_url(); ?>Common_Ajax/getFacilities_options",
						success: function(result){
							if(result != null){
								$("#entity_code").html(result);
							}
						}
					});
				}); */
				//to set yes/no radio on input of numbers of fatype
				$(document).on('blur','.number',function (event){
					var mrdata = $(this).closest('div[class^="row singlelqasrow"]').find(".mrdata").val();
					var vrfdata = $(this).closest('div[class^="row singlelqasrow"]').find(".vrfdata").val();
					if(mrdata == vrfdata)
					{						
						$(this).closest('div[class^="row singlelqasrow"]').find(".yesradio").prop("checked",true);
					}else{						
						$(this).closest('div[class^="row singlelqasrow"]').find(".noradio").prop("checked",true);
					}
					//to set total yes,total no and total accuracy
					var yeslen = $(".yesradio:checked").length;
					var nolen = $(".noradio:checked").length;
					var totalap = 0;
					switch(yeslen){
						case 1 : totalap = 20;
								break;
						case 2: totalap = 30;
								break;
						case 3: totalap = 40;
								break;
						case 4: totalap = 45;
								break;
						case 5: totalap = 50;
								break;
						case 6: totalap = 60;
								break;
						case 7: totalap = 65;
								break;
						case 8: totalap = 75;
								break;
						case 9: totalap = 85;
								break;
						case 10: totalap = 90;
								break;
						case 11: totalap = 95;
								break;
						case 12: totalap = 100;
								break;
						default : totalap = 0;		
					}
					//var totalap = parseFloat((yeslen/(yeslen+nolen))*100,2);
					$("#lqas_tot").val(yeslen);
					$("#lqas_tot_no").val(nolen);
					$("#lqas_ap").val(totalap.toFixed(0));
				});
			});
		</script>
	</body>
</html>