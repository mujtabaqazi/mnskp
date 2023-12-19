<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$ulevel = $this -> session -> userLevel;
$utype = $this -> session -> utype;
$userId = $this -> session -> id;
$maxalloweddays = isset($sysconf)?$sysconf->checklistfilldays:30;
$maxalloweddays = ($maxalloweddays>0 && $maxalloweddays<32)?$maxalloweddays:30;
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>Monthly Visit Plan || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
        <div class="container">
   			<div class="panel panel-primary" style="border-bottom: none;">
   				<div class="panel-heading text-center"> Monthly Visit Plan</div>
   					<div class="panel-body" style="padding-bottom: 0px;">
   						<div class="alignmentview">
	   						
	                        <div class="row" style="padding-bottom: 1px;">
	                            <div class="col-xs-12 cmargin27 bgcolcl text-center">
	                                <label>Report Submission from Current Plan</label>
	                            </div>
	                        </div>
							<div class="row bc">
								<div class="col-xs-3 br text-center">
									<label>Facility Name</label>
								</div>
								<div class="col-xs-8">
								    <div class="row">
										<div class="col-xs-8 text-center"><label>Checklist <span class="blink_me">checklist can only be filled within <?php echo $maxalloweddays; ?> days of visit date</span></label></div>
										<div class="col-xs-3 brl text-center"><label>HCP Name</label></div>
										<div class="col-xs-1 br text-center">
											<label>Status</label>
										</div>
								    </div>
							  </div>
								<div class="col-xs-1 text-center">
									<label>Date</label>
								</div>
							</div>
							<div class="rowlightbg">
							<?php if(isset($DataRow)){ ?>
							<?php foreach($DataRow["visits"] as $key => $val){ ?>
								<div class="row cloned-row" style="border-bottom: 1px solid rgba(0, 0, 0, 0.34);">
									<div class="row" style="margin-left: 0px; margin-right: 0px;">
										<div class="col-xs-3 text-left">
											<p><?php echo get_Facility_Name($val["facode"]); ?></p>
										</div>
										<div class="col-xs-8">
											<?php foreach($val["checklists"] as $key1 =>$vall){
												$approvedstat = (isset($DataRow["status"]))?$DataRow["status"]:"Not Approved";//list approved from dho or not will use to limit user for edit
												$vpvc_id = $val["checklists"][$key1]["vpvc_id"];
												$filledstats = getChecklstStat($val["checklists"][$key1]["chklsttable"],$vpvc_id,"true");
												$val["checklists"][$key1]["filledstats"] = $filledstats;
												$twoparts = explode("_",$vall["tablename"]);
											?>
												<div class="form-group" style="margin-bottom:0px !important;">
													<div class="col-xs-8 text-left zp">
														<p>
															<?php 
															$chklsttName = get_Checklist_Name($vall["checklistid"]);
															//if plan approved, only then data for checklist can be added or viewed
															$chklstPathpath="";
															if($filledstats=="true")
															{
																//checklist already filled, open its view
																$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'_view/'.$vpvc_id;
															}else if($DataRow["supervisorid"]==$userId)
															{
																//($val["visitdate"]<=date("Y-m-d")
																$visitdate = $val["visitdate"];
																$visitadvdate = date( "Y-m-d", strtotime("$visitdate +".$maxalloweddays." days" ) );
																if(($visitadvdate >= date( "Y-m-d")) && ($val["visitdate"]<=date("Y-m-d")) && ($approvedstat=="Approved" || ($utype=='Executive' && $ulevel=='2'))){
																	//user is viewing own plan, so user can add checklist data
																	$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'/'.$vpvc_id;
																	//check if user already half filled checklist?
																	if($filledstats=="yes")
																	{
																		//checklist already half filled, open its edit
																		$chklstPathpath = base_url().$twoparts[0].'/forms/'.$vall["shortname"].'_edit/'.$vpvc_id;
																	}
																}
															}
															if($chklstPathpath==""){
																?>- <?php echo $chklsttName;
															}else{
																?><a href="<?php echo $chklstPathpath; ?>">- <?php echo $chklsttName; ?></a><?php
															}
															//if lqas checklist and saved or submitted
															if(($vall["checklistid"]==20) && ($filledstats=="true" || $filledstats=="yes")){
															?>
															<a target="_blank" data-original-title="Export in PDF/Print" href="<?php echo $basePath."lqas_download/".$vpvc_id; ?>" class="my-tooltip pull-right" data-toggle="tooltip" data-placement="top"><i class="fa fa-print fa-2x" style="margin-top: 2px;"></i></a>
															<?php } ?>
														</p>
													</div>
													<div class="col-xs-3 text-center ">
														<?php if(isset($vall["hcptype_id"]) && isset($vall["hcp_value"])){ ?>
														<p> <?php echo gethcpTypeValue(true,$vall["hcptype_id"],$vall["hcp_value"]); ?></p>
														<?php } ?>
													</div>
													<div class="col-xs-1 text-center">
														<?php if($filledstats=="true"){ ?>
															<p style="color: green;margin-left:27px">&#10004;</p>
														<?php }else{ ?>
															<p style="color: red;margin-left:27px">&#10006;</p>
														<?php } ?>
													</div>
												</div>
											<?php } ?>
										</div><!--end of main col xs-3-->
										<div class="col-xs-1 text-center">
											<p><?php $var ="visitdate[".($key+1)."]"; echo isset($val)?getNewDateFormat(date("d-m-Y",strtotime($val["visitdate"]))):''; ?></p>
										</div>
										
									</div>
								</div>
							<?php } ?>
							<?php }else{ ?>
								<div class="row">
									<div class="col-xs-12 text-center">
										<h3>No Plan Found.</h3>
									</div>
								</div>
							<?php } ?>
							</div>
						</div>							
					</div> <!--end of panel body-->
				</div> <!--end of panel panel-primary-->
			</div>
			<!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
	</body>
</html>