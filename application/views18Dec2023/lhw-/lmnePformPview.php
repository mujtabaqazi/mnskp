<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$userId = $this -> session -> id;
?>
<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	  <title>LMNE || Form</title>
	  <?php $this->load->view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this->load->view("templates/header"); ?>
		<?php $this->load->view("templates/menu"); ?>
		<!--End of header-->
		<?php if (count($previous)>0){?>
		<div class="container">
			<div class="row" style="background:#0F4A6F;color:white;margin: 0px; padding-top: 3px; padding-bottom: 3px;">
				<div class="col-xs-4 col-xs-offset-4 text-right">
					<label class="mt7">Compare With Previously Submitted Checklist</label>
				</div>
				<div class="col-xs-2">
					<select class="form-control" id="p_month" name="p_month">
						<!--<option value="0">Select Month</option>-->
						<?php foreach($previous as $row){?>
						<option value="<?php echo $row['vpvc_id']; ?>"><?php echo getNewFMonthFormat($row['fmonth']); ?></option>
						<?php } ?>
					</select>
				</div>
				<div class="col-xs-1 text-right">
					<button style="border-radius: 0px;" type="submit" id="compare_btn" name="compare_btn"  class="btn btn-primary btn-md btncc" role="button">
						<i class="fa fa-clipboard"></i> Compare
					</button>
				</div>
			</div>
		</div><!--end of container for compare-->
		<?php } ?>
		<div class="container">
			<div class="panel panel-primary">
				<div class="panel-heading text-center">Logistics Monitoring/Evaluation 
				</div>
				<div class="panel-body pbody">
					<div class="alignmentview">
					<div class="rowlightbg"> 
						<div class="row">
							<div class="col-xs-3 col-xs-offset-1  ">
								<label>Reporting month</label>
							</div>
							<div class="col-xs-2">
								<p><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></p>
							</div>
							<div class="col-xs-3 ">
								<label>Province</label>
							</div>
							<div class="col-xs-2">
								<p>Khyber Pakhtunkhwa</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-xs-offset-1  ">
								<label>Name of District</label>
							</div>
							<div class="col-xs-2">
								<p><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></p>
							</div>
							<div class="col-xs-3 ">
								<label>Name of FLCF</label>
							</div>
							<div class="col-xs-2">
								<p><?php echo isset($DataRow)?get_Facility_Name($DataRow->facode):''; ?></p>
							</div>
						</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 ">
						<label>Name of District Coordinator</label>
					  </div>
						<div class="col-xs-2">
							<p><?php $var ="district_coordinator_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
						<div class="col-xs-3  ">
						<label>Name of In-charge FLCF</label>
					  </div>
						<div class="col-xs-2">
							<p><?php $var ="incharge_flcf_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 ">
						<label>In-charge Store</label>
					  </div>
						<div class="col-xs-2">
							<p><?php $var ="incharge_store_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
						<div class="col-xs-3 ">
						<label>In-charge Logistics</label>
					  </div>
						<div class="col-xs-2">
							<p><?php $var ="incharge_store_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 ">
						<label>Name of DHIS/HMIS Person</label>
					  </div>
						<div class="col-xs-2">
							<p><?php $var ="dhis_person_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
						<div class="col-xs-3 ">
						<label>Designation of DHIS/HMIS Person</label>
					  </div>
						<div class="col-xs-2">
							<p><?php $var ="dhis_person_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 ">
						<label>Number of LHWs</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="total_lhws"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
						<div class="col-xs-3 ">
							<label>Is a separate space for the storage of contraceptives/general medicine provided?</label>
						</div>
						<div class="col-xs-2">
							<p><?php $var ="storage_space"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
						</div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-sm-12 cmargin27 bgcolcl text-center">
            				<label>6. Store Specification</label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 ">
						<label>Location</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ss_location"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <div class="col-xs-3 ">
						<label>Measurements of present space?</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ss_measurement"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-3 col-xs-offset-1 ">
						<label>Is the present space adequate?</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ss_adequate"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <div class="col-xs-3 ">
						<label>If no, area required in sq. ft.</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ss_area"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-sm-12 cmargin27 bgcolcl text-center">
            				<label>7. Maintenance of Stores</label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Cleanliness</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_cleanliness"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Whitewash</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_whitewash"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Ceiling Condition (No Leakage etc.)</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_ceiling"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Floor cemented</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_cemented"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Ventilation</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_ventilation"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Light</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_light"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						 <label class="">Fire-fighting equipment</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_ff_equipment"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Door/Windows</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_door_windows"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Direct Sunlight is penetrating in</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_sunlight"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">Secure</label>
					  </div>
					  <div class="col-xs-2">
						<p><?php $var ="ms_security"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-xs-12 cmargin27 bgcolcl text-center">
            				<label></label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">8. Are storerooms disinfected and sprayed every third month against insects, rodents andbi</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="sr_sprayed"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">9. Is stacking of cartons four (4) inches of the floor? (Using wooden planks and approximately two (2) feet away from any wall).</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="cartons_stacking"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">10. Is each consignment stacked separately? (To facilitate counting and access to hind stack?)</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="consignment"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">11. Is fist-expiry-fist out (FEFO) method followed?</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="fefo"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">12. Are stacks more than eight (8) feet high?</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="stacks_8feet"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">13. Are marking, labels, manufacturing or expiry dates visible?</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="dates_visible"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">14. Has each stack a Bin Card?</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="bin_card"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">15. If yes? Entries proper</label>
					  </div>					  
					  <div class="col-xs-2">
						<p><?php $var ="entries_proper"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">16. How many times in the last quarter the following officials have visited your store?</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-sm-7 col-sm-offset-3 bc text-center">
						<label>Officials</label>
					  </div>
					  <div class="col-sm-2 bc bl text-center">
						<label>Number of Times</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 ">
						<label>EDO(H)/DOH</label>
					  </div>
					  <div class="col-xs-2 text-center">
						<p><?php $var ="edo_dho_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 ">
						<label>District Coordinator</label>
					  </div>
					  <div class="col-xs-2 text-center">
						<p><?php $var ="dc_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 ">
						<label>Program Officer</label>
					  </div>
					  <div class="col-xs-2 text-center">
						<p><?php $var ="po_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-7 col-xs-offset-3 ">
						<label>Any Other</label>
					  </div>
					  <div class="col-xs-2 text-center">
						<p><?php $var ="other_visits"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-4 col-xs-offset-1">
						<label class="">17. Frequency of supply received from PPIU/DPIU</label>
					  </div>					  
					  <div class="col-xs-6">
						<p><?php $var ="supply_frequency"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">18. What is the average time between a FLCF/District request for medicines/supplies and receipt against that indent?</label>
					  </div>
						<div class="col-xs-2 zp">
							<p><?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					</div>
					<!-- <div class="row">
					  <div class="col-xs-3 col-xs-offset-3">
						<div class="input-group">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>1.</span>
							</a>
						  </div>
						  <p><?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control" type="Search">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>Weeks</span>
							</a>
						  </div>
						</div>                         
					  </div>
					  <div class="col-xs-3">
						<div class="input-group">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>2.</span>
							</a>
						  </div>
						  <p><?php $var ="supply_avg_time"; echo isset($DataRow)?$DataRow->$var:''; ?>" name="<?php echo $var; ?>[]" class="form-control" type="Search">
						  <div class="input-group-btn">
							<a class="btn" disabled='disabled' style="font-weight:bold;color:black;">
							  <span>Months</span>
							</a>
						  </div>
						</div>                         
					  </div>
					</div> -->
					<div class="row">
					  <div class="col-xs-9 col-xs-offset-1">
						<label class="">19.  Mode of Transportation:</label>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2 col-xs-offset-3">
						<label class="">From PPIU to DPIU:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<p><?php $var ="ppiu_dpiu_trans"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <div class="col-xs-2">
						<label class="">From DPIU to FLCF:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<p><?php $var ="dpiu_flcf_trans"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2 col-xs-offset-3">
						<label class="">Date:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<p><?php $var ="store_date"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
					  </div>
					  <div class="col-xs-2">
						<label class="">Time:</label>
					  </div>
					  <div class="col-xs-2 zp">
						<p><?php $var ="store_time"; echo isset($DataRow)?date("H:i",strtotime($DataRow->$var)):''; ?></p>
					  </div>
					</div>
					<div class="row">
					  <div class="col-xs-2 col-xs-offset-3">
						<label class="">Location:</label>
					  </div>
						<div class="col-xs-2 zp">
							<p><?php $var = "store_location"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					  <div class="col-xs-2 ">
						<label></label>
					  </div>
					  <div class="col-xs-2 zp">
					</div>
					</div>
					<div class="row bc">
					  <div class="col-sm-2 text-center">
						<label class="pt10">Items</label>
					  </div>
					  <div class="col-sm-2 brl zp text-center">
						<label>Items found to be out of stock at the time of inspection?</label>
					  </div>
					  <div class="col-sm-2 text-center">
						<label class="pt10">Any stock found expired?</label>
					  </div>
					  <div class="col-sm-2 brl text-center">
						<label>Physically counted stock in hand(# Units)</label>
					  </div>
					  <div class="col-sm-2 br text-center">
						<label>Quantity recorded on Bin Card (Stock Ledger)</label>
					  </div>
					  <div class="col-sm-2 text-center">
						<label class="pt10">Quantity</label>
					  </div>
					</div>
					<?php
					$labels = array(
						'Paracetamole Tablets',
						'Paracetamole Syrup',
						'Cholorquine Tablets',
						'Cholorquine Syrup',
						'Cotrimoxazol Syrup',
						'Piperzine Syrup',
						'Ferrous Fumate & Folic Acid Tablets',
						'Sticking Plaster',
						'Antiseptic Lotion',
						'Cotton Wool',
						'Cotton Bandages',
						'Eye Ointment (Polyfax)',
						'Oral Rehydration Solution (ORS)',
						'Benzyl Benzoate Lotion',
						'B. Complex Syrup',
						'Geomizol tablets',
						'Condoms',
						'Oral Contraceptive Pills',
						'Inj. Depo Provera',
						'IUCDs'
					);
					for($i=1;$i<=count($labels); $i++)
					{
						?>
						<div class="row">
						  <div class="col-xs-2">
							<label class=""><?php echo $labels[$i-1]; ?></label>
						  </div>					  
						  <div class="col-xs-2 zp text-center">
							<p><?php $var ="so_r".$i."_f1"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
						  </div>					  
						  <div class="col-xs-2 zp text-center">
							<p><?php $var ="so_r".$i."_f2"; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
						  </div>
						  <div class="col-xs-2 zp text-center">
							<p><?php $var ="so_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>
						  <div class="col-xs-2 zp text-center">
							<p><?php $var ="so_r".$i."_f4"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </div>					  
						  <div class="col-xs-2 zp">
							<p><?php $var ="so_r".$i."_f5"; echo isset($DataRow)?ucfirst($DataRow->$var):''; ?></p>
						  </div>
						</div>
						<?php 
					} ?>
					<div class="row">
					  <div class="col-xs-2 ">
						<label>Contact Person</label>
					  </div>
					  <div class="col-xs-2 zp">
						<p><?php $var ="contact_person"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					</div>
					</div><!--end of rowlightbg-->
					</div><!--end of alignmentview-->
					<div class="row" style="padding-bottom: 1px;">
           				<div class="col-sm-12 cmargin27 bgcolcl text-center">
            				<label>Problems and recommendations</label>
          				</div>
        			</div>
					<div class="row">
					  <div class="col-xs-12 zp">
						<table class="table   table-bordered">
						<tbody>
						<tr>
						  <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Problems
						  </td>
						  <td>
							<p><?php $var ="problems"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </td>               
						</tr>
						<tr>
						  <td style="width: 14% !important;text-align: left !important;background-color: #0B7D05; color:white;font-weight: bold;">Recommendations
						  </td>
						  <td>
							<p><?php $var ="recommendations"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						  </td>               
						</tr>
						
					  </tbody>
					</table>
					  </div>
					</div>
					<div class="row rowmsr-filters row-signatures form-group">
					  <label class="col-md-3 ">Name of visiting Supervisor</label>
					  <div class="col-md-2">
							<p><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
						</div>
					  <label class="col-md-2 ">Designation</label>
					  <div class="col-md-2">
						<p><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
					  </div>
					  <label class="col-md-1 zp">Date of Visit</label>
					  <div class="col-md-2">
						<p><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></p>
						
					  </div>
					</div>
				<div class="row">
							<div class="col-xs-6">
								<label class="pt7 pb2">Remarks (Reason .. If visit Date is changed than planned)</label>
							</div>
							<div class="col-xs-6">
								<p><?php $var ="remarks"; echo isset($DataRow)?$DataRow->$var:''; ?></p>
							</div>

					</div>
					 <br>
					<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">
						<div  style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
							<?php if($DataRow->submitted_by==$userId){ ?>
								<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>lhw/forms/lmne_edit/<?php echo $vpvc_id; ?>">
									<i class="fa fa-pencil-square-o"></i> Update  
								</a>
							<?php } ?>
							<a class="btn btn-primary btn-md btncc" onClick="history.go(-1);"><i class="fa fa-arrow-left"></i> Back </a>
						</div>
					</div>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this->load->view("templates/footer"); ?>
		<?php $this->load->view("templates/scripts"); ?>
		<script type="text/javascript">
			$(document).ready(function() {
				$("#compare_btn").on('click',function(e){
					window.location.href="<?php echo $basePath; ?>lhw/forms/lmne_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
				});
			});
		</script>
	</body>
</html>