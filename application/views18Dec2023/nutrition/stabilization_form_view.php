<?php
$basePath = base_url();
$assetsPath = base_url() . "assets/";
$userId = $this -> session -> id;
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Monitoring Checklist for Nutrition Stabilization Centers || Form</title>
		<?php $this -> load -> view("templates/styles"); ?>
	</head>
	<body>
		<!--start of header-->
		<?php $this -> load -> view("templates/header"); ?>
		<?php $this -> load -> view("templates/menu"); ?>
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
				<div class="panel-heading text-center">  Monitoring Checklist for Nutrition Stabilization Centers   
				</div>
				<div class="panel-body pbody">
					<form class="form-horizontal">
						<div class="alignmentview">
							<div class="rowlightbg">
      
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Supervisor Name</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="supervisor_name"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Supervisor Designation</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="supervisor_desg"; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">District</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?></label>
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Facility</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var = "facode"; echo isset($DataRow)?get_Facility_Name($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Reporting Month</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Date of Visit</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var ="dov"; echo isset($DataRow)?getNewDateFormat(date("d-m-Y",strtotime($DataRow->$var))):''; ?></label>
									
									</div>
								</div>
								<div class="row">
									<div class="col-xs-2">
										<label class="pt7 pb2">Facility Type</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2"><?php $var = "fatype";  echo isset($DataRow)?$DataRow->$var:''; ?></label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Province</label>
									</div>
									<div class="col-xs-2">
										<label class="pt7 pb2">Khyber Pakhtunkhwa</label>
									</div>
								</div>
								<div class="row bc">
									<div class="col-sm-2">
									  <div class="row">
										<div class="col-sm-3">
										  <label class="pt14">#</label>
										</div>
										<div class="col-sm-9 brl">
										  <label class="pt14 pb12">Name</label>
										</div>
									  </div>
									</div>
									<div class="col-sm-1">
									  <label class="pt14">Designation</label>
									</div>
									<div class="col-sm-1 brl">
									  <label class="pt14 pb12">Shift</label>
									</div>
									<div class="col-sm-2 br">
									  <div class="row">
										<div class="col-sm-5">
										  <label>Govt / Hired</label>
										</div>
										<div class="col-sm-7 bl">
										  <div class="row">
											<div class="col-sm-12 text-center">
											  <label>Trained</label>
											</div>
										  </div>
										  <div class="row bt">
											<div class="col-sm-6 text-center">
											  <label>SAM</label>
											</div>
											<div class="col-sm-6 bl text-center">
											  <label>IYCF</label>
											</div>
										  </div>
										</div>
									  </div>
									</div>
									<div class="col-xs-3">
									  <div class="row">
										<div class="col-xs-3 zp br text-center">
										  <label class="pb6">Regular / Punctual</label>
										</div>
										<div class="col-xs-3 br zp text-center">
										  <label class="pb6">Absent / Leave</label>
										</div>
										<div class="col-xs-6">
										  <label class="pt14">JD Given</label>
										</div>
									  </div>
									</div>
									<div class="col-sm-1 brl">
									  <label class="pb6">Contact Number</label>
									</div>
									<div class="col-sm-2 text-center">
									  <label class="pt14">Performance</label>
									</div>
								</div>
								<?php for($index=1;$index<=11;$index++){ ?>
									<div class="row">
										<div class="col-xs-2">
											<div class="row">
												<div class="col-xs-3">
												  <label class="pt7"><?php echo $index; ?></label>
												</div>
												<div class="col-xs-9">
												   <p class="pt7"><?php $var ='bi_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-1">
										   <p><?php $var ='bi_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:''; ?></p>
										</div>
										<div class="col-xs-1  ">
										  <p><?php $var ='bi_r'.$index.'_f3'; echo isset($DataRow)?ucfirst(strtolower($DataRow->$var)):'';?></p>
										</div>
										<div class="col-xs-2">
											<div class="row">
												<div class="col-xs-5">
												  <p class="pt7"><?php $var ='bi_r'.$index.'_f4'; echo isset($DataRow)?(($DataRow->$var=="1")?'Govt':'Hired'):'Hired'; ?></p>
												</div>
												<div class="col-xs-7">
													<div class="row">
														<div class="col-xs-6  ">
														  <p class="pt7"><?php $var ='bi_r'.$index.'_f5'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
														</div>
														<div class="col-xs-6  ">
														  <p class="pt7"><?php $var ='bi_r'.$index.'_f6'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="col-xs-3">
											<div class="row">
												<div class="col-xs-3 text-center  ">
												  <p class="pt7"><?php $var ='bi_r'.$index.'_f7'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':'No'):'No'; ?></p>
												</div>
												<div class="col-xs-3  text-center">
												  <p class="pt7"><?php $var ='bi_r'.$index.'_f8'; echo isset($DataRow)?(($DataRow->$var=="1")?'Absent':'Leave'):'Leave'; ?></p>
												</div>
												<div class="col-xs-6 ">
												  <p class="pt7"><?php $var ='bi_r'.$index.'_f9'; echo isset($DataRow)?$DataRow->$var:'';?></p>
												</div>
											</div>
										</div>
										<div class="col-xs-1 ">
										   <p><?php $var ='bi_r'.$index.'_f10'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
										</div>
										<div class="col-xs-2 ">
										   <p><?php $var ='bi_r'.$index.'_f11'; echo isset($DataRow)?$DataRow->$var:'';?></p>
										</div>
									</div>
								<?php } ?>
								<div class="row">
									<div class="col-sm-12 bgcolcl text-center">
									  <label>1- Checklist for Monitoring Food Preparation</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
							  <?php
								$labels =array(
									"1.	Kitchen available for food preparation?",
									"2.	Are F-75 prepared feeds available? ",
									"3.	Are F-100 prepared feeds available? ",
									"4.	Are RUTF/F-100 prepared feeds available? ",
									"5.	Does kitchen staff (or those preparing feeds) wash hands with soap before preparing food? ",
									"6.	Are measurements made exactly with proper measuring utensils (e.g. correct scoops, jugs)? ",
									"7.	Are ingredients thoroughly mixed? ",
									"8.	Is correct amount of water added to make up a liter of formula? (Staff should not add a liter of water, but just enough to make a liter of formula.) ", 
									"9.	Is food served at an appropriate temperature? ",
									"10. Are correct amounts put in the dish for each child? ",
									"11. Is leftover prepared food discarded promptly? ",
									"12. Are containers and utensils kept clean? ",
									"13. Are ingredients stored appropriately and discarded at appropriate times?", 
									"14. Is refrigerator available and clean? ",
									"15. Is microwave available and clean? "
								);
								for ($index=1;$index<=count($labels);$index++){ ?>
								  <div class="row">
									<div class="col-xs-8">
									  <label><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-1 text-center">
									   <p><?php $var ='fp_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
									</div>
									
									<div class="col-xs-3  ">
									   <p><?php $var ='fp_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								  </div>
								<?php } ?>
								<div class="row">
									<div class="col-xs-8">
									  <label>16. <?php $var ='fp_other'; echo isset($DataRow)?$DataRow->$var:'';  ?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='fp_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
									</div>
									<div class="col-xs-3  ">
									   <p><?php $var ='fp_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								</div>
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
									  <label>2. Checklist for Monitoring Hygiene of NSC Ward</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
								<div class="row mt1">
									<div class="col-sm-8 bc ">
									  <label>Hand washing</label>
									</div>
								 </div>
								<?php 
								$labels=array(
									"1.	Are the hands washing facilities available in the ward? ",	 	 	 
									"2.	Does staff consistently wash hands thoroughly with soap? ", 	 	 	 
									"3.	Are their (staff) nails clean? ", 	 	 	 
									"4.	Do they wash hands before handling food? ", 	 	 	 
									"5.	Do they wash hands before and after dealing with every patient? ",
									"Mother's cleanliness",
									"1.	Do mothers have a place to bathe? ", 	 	 	 
									"2.	Do mothers utilize place to bathe? ",  	 	 	 
									"3.	Who helps mothers in bathing? ", 	 	 	 
									"4.	Do mothers wash hands with soap after using the toilet/changing diapers of child? ", 	 	 	 
									"5.	Do mothers wash hands before feeding their children? ",
									"Bedding and laundry",
									"1.	Is bedding changed every day? ", 	 	 	 
									"2.	Is bedding changed when soiled/wet? ", 	 	 	 
									"3.	Are diapers, soiled towels and rags, etc. stored in bag, then washed or disposed of properly? ", 	 	 	 
									"4.	Is there a place for mothers to do laundry? ", 	 	 	 
									"5.	Is there a place outside the ward for hanging the wet clothes to dry?",
									"General maintenance",
									"1.	Are floors swept daily? ", 	 	 	 
									"2.	Is trash disposed of properly in the dust bins? ",  	 	 	 
									"3.	Is the ward kept insects and rodents free as much as possible? ",
									"Food storage",
									"1.	Are ingredients and food kept covered and stored at the proper temperature beside children’s bed sides? ", 	 	 	 
									"2.	Are leftovers discarded? ",
									"Dishwashing",
									"1.	Are dishwashing powders /detergents etc. available? ", 	 	 	 
									"2.	Are dishes washed after each meal? ", 	 	 	 
									"3.	Are they washed in hot water with soap? ",
									"Toys",
									"1.	Is play area available and developed? ",  	 	 	 
									"2.	Are all toys washable? ", 	 	 	 
									"3.	Are toys washed regularly and every time when child uses them?", 	 	 	 
									"4.	Who helps mothers in play area?"
								);
								$i=1;
								for($index=1;$index<=count($labels);$index++){
									if($index==6||$index==12||$index==18||$index==22||$index==25||$index==29){ ?>
				      				 <div class="row mt1">
							        <div class="col-sm-8 bc ">
							          <label><label><?php echo $labels[$index-1];?></label></label>
							        </div>
							      </div>
								<?php
								}else{ ?>
									<div class="row">
										<div class="col-xs-8">
										  <label><?php echo $labels[$index-1];?></label>
										</div>
										<div class="col-xs-1 text-center">
										   <p><?php $var ='hnsc_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
										</div>
										<div class="col-xs-3  ">
										   <p><?php $var ='hnsc_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
										</div>
									</div>
								<?php $i++;} }?>
      
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>3- Checklist for Monitoring Ward Procedures</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
								<div class="row mt1">
									<div class="col-sm-8 bc">
									  <label>Feeding</label>
									</div>
								</div>
							  <?php
								$labels=array(
									"1.	Are correct feeds served in correct amounts? ", 	 	 	 
									"2.	Are feeds given at the prescribed times, even at nights and weekends? ", 	 	 	 
									"3.	Are children held and encouraged to eat (never left alone to feed)? ", 	 	 	 
									"4.	Are children fed with a cup/spoon (never a bottle)? ",	 	 	 
									"5.	Is food intake recorded correctly after each feed? ", 	 	 	 
									"6.	Are leftovers recorded accurately? ", 	 	 	 
									"7.	Are amounts of F-75 kept the same throughout the initial phase, even if weight is lost? ", 	 	 	 
									"8.	In transition phase or after given RUTF according to weight. If child not taking RUTF than given F-\"100 and increased as the child gains weight? ",  	 	 	 
									"9.	Is any vomiting/diarrhea recorded correctly after each feed?",
									"Warming",
									"1.	Is the room temperature kept between 25° − 30°C (to the extent possible)? ", 	 	 	 
									"2.	Is the room temperature chart maintained weekly/monthly? ",  	 	 	 
									"3.	Are blankets provided and children kept covered at night? ", 	 	 	 
									"4.	Are safe measures used for re-warming children? ", 	 	 	 
									"5.	Are temperatures taken and recorded correctly? ",
									"Weighing",
									"1.	Are scales functioning correctly? ", 	 	 	 
									"2.	Are scales standardized weekly? ", 	 	 	 
									"3.	Are children weighed at about the same time each day? ", 	 	 	 
									"4.	Are they weighed about one hour before a feed (to the extent possible)? ",	 	 	 
									"5.	Does staff adjust the scale to zero before weighing? ", 	 	 	 
									"6.	Are children consistently weighed without clothes? ", 	 	 	 
									"7.	Does staff correctly read weight to the nearest division of the scale? ", 	 	 	 
									"8.	Does staff immediately record weights on the child’s CCP? ", 	 	 	 
									"9.	Are weights correctly plotted on the Weight Chart? ",
									"Giving antibiotics, medications, supplements",
									"1.	Are antibiotics given as prescribed (correct dose at correct time)? ", 	 	 	 
									"2.	Are antibiotics given according to protocol? ",  	 	 	 
									"3.	When antibiotics are given, does staff immediately make a notation on the CCP? ", 	 	 	 
									"4.	Is reason of change of antibiotic mentioned in chart/record? ",  	 	 	 
									"5.	Is folic acid given daily and recorded on the CCP? ", 	 	 	 
									"6.	Is vitamin A given according to protocol? ",  	 	 	 
									"7.	Is multivitamin given daily and recorded on the CCP? ", 	 	 	 
									"8.	When children are on RUTF/F-100 for 2 days, is the correct dose of iron given twice a day, afterwards, and recorded on the CCP? ",
									"Ward environment",
									"1.	Are surroundings welcoming and cheerful? ", 	 	 	 
									"2.	Is ward well ventilated and has light? ", 	 	 	 
									"3.	Are mothers offered a place to sit and sleep? ", 	 	 	 
									"4.	Are mothers taught/encouraged to be involved in care taking? ", 	 	 	 
									"5.	As children recover, are they stimulated and encouraged to move and play? ", 	 	 	 
									"6.	Are mothers involved in the counseling (Individual/Group)? ", 	 	 	 
									"7.	Are separate baths available for children? ", 	 	 	 
									"8.	Is warm water available for bathing especially in winter season? ",  	 	 	 
									"9.	Is Potassium permanganate (KMnO4) available? ",  	 	 	 
									"10. Who helps mothers in bathing (Nurse/Aya)?",
									""
								);
								$i=1;
								for($index=1;$index<=count($labels);$index++){
									if($index==10||$index==16||$index==26||$index==35){
									?>
								<div class="row">
									<div class="col-xs-8 bc">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
								</div>
								<?php
								}else { ?>
								<div class="row">
							        <div class="col-xs-8">
									<?php if($index==count($labels)){?>
										<label>11. <?php $var ='wp_other'; echo isset($DataRow)?$DataRow->$var:''; ?></label>
									<?php }else{ ?>
										<label><?php echo $labels[$index-1]; ?></label>
									<?php }?>
							        </div>
							        <div class="col-xs-1 text-center">
							           <p><?php $var ='wp_r'.$i.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
							        </div>
							        <div class="col-xs-3  ">
							           <p><?php $var ='wp_r'.$i.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
							        </div>
							    </div>
							    <?php $i++;}}?>
				      
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
									  <label>4- Checklist for Play Area in NSC Ward</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
								<?php
								$labels=array(
									"1.	Is there a play area in the ward?", 	 	 	 
									"2.	Are walls colorful? ", 	 	 	 
									"3.	Are drawings present on the walls? ", 	 	 	 
									"4.	Is play area neat and clean? ",  	 	 	 
									"5.	Is play area cleaned regularly? ", 	 	 	 
									"6.	Are toys washable? ", 	 	 	 
									"7.	Are toys washed regularly, and every time when child uses them? ", 	 	 	 
									"8.	As children recover, are they encouraged to move and play? ", 	 	 	 
									"9.	Does staff advice mothers to let their children move & play after recovery? ",  	 	 	 
									"10. Who supervises child in the play area (Nurse/Aya)?"
								);
								for($index=1;$index<=count($labels);$index++){
								?>
								<div class="row">
									<div class="col-xs-8">
									  <label><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-1 text-center">
									   <p><?php $var ='paw_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
									</div>
									<div class="col-xs-3  ">
									   <p><?php $var ='paw_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
									  <label>5- Checklist for Mothers’ Counseling Room</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
								<?php
								$labels=array(
									"1.	Is there a separate counseling room in the ward? (If not observe the individual counseling at bed side).",    	 	 	 
									"2.	Does staff or FMO counsel mothers? ", 	 	 	 
									"3.	Is IYCF book available in the room? ", 	 	 	 
									"4.	Are counseling cards available? ",  	 	 	 
									"5.	Are there any reading materials in the room? ", 	 	 	 
									"6.	Observe one group (1-8 mothers) in counseling area and note all the counseling tips. ",  	 	 	 
									"7.	Are mothers counseled regarding hand washing/vaccination/complementary feed/ Family Planning/Hygiene etc.? ", 	 	 	 
									"8.	Does a mother have additional counseling at time of discharge? " 
								);
								
								for($index=1;$index<=count($labels);$index++){
								?>
								<div class="row">
									<div class="col-xs-8">
										<label><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='mcr_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
									</div>
									<div class="col-xs-3  ">
										<p><?php $var ='mcr_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								</div>
								<?php } ?>
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>6- Checklist for NSC Follow-up</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
							  <?php
								$labels=array(
									"1.	Is the counter in NSC available?",			
									"2.	Is there separate staff for follow up? ", 	 	 	 
									"3.	Are follow up forms available? ", 	 	 	 
									"4.	No. of follow ups completed? ",     			
									"5.	RUTF available for follow up? "
								);
								for($index=1;$index<=count($labels);$index++){
								?>
								<div class="row">
									<div class="col-xs-8">
										<label><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-1 text-center">
										<p><?php $var ='fu_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
									</div>
									<div class="col-xs-3  ">
										<p><?php $var ='fu_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								</div>
								<?php } ?>
   
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>7- Checklist for Screening Corner for SAM/MAM</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-9">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-3 bl text-center">
										<label>COMMENTS</label>
									</div>
								</div>
								<?php
								$labels=array(
									"1.	Who does the screening in OPD for SAM/MAM?(Pediatric/ Medical Doctor/ Women Medical Doctor/LHV/Nurse/other) ",   	 
									"2.	How many children (0-6 months) screened/total OPD in last month? ", 	 
									"3.	How many children (6-59 months) screened/total OPD in last month? ",  	 
									"4.	How many MAM Children? ", 	 
									"5.	How many SAM Children? ", 
									"6.	No. of SAM children with complication referred to NSC? ",  	 
									"7.	No. of SAM Children without complication (Followed at OTP)? ",  	 
									"8.	No. of admissions in NSC Ward? ", 	 
									"9.	No. of mothers whom counseling is provided in OPD? "
								);
								for($index=1;$index<=count($labels);$index++){
								?>
								<div class="row">
									<div class="col-xs-9">
										<label><?php echo $labels[$index-1]; ?></label>
									</div>
									<div class="col-xs-3  ">
									  <p><?php $var ='s_mam_r'.$index.'_f1'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								</div>
								<?php } ?>	  
								<div class="row mt1">
									<div class="col-sm-12 bgcolcl text-center">
										<label>8- Checklist for Counselling in Postnatal Ward</label>
									</div>
								</div>
								<div class="row bc mt1">
									<div class="col-sm-8">
										<label>OBSERVE</label>
									</div>
									<div class="col-sm-1 brl text-center">
										<label>YES / No</label>
									</div>
									
									<div class="col-sm-3 text-center">
										<label>COMMENTS</label>
									</div>
								</div>
							   <?php
								$labels=array(
									"1.	Are mothers counseled in postnatal wards? ", 	 	 	 
									"2.	Who does the counseling? ", 	 	 	 
									"3.	Are different counseling techniques used? ", 	 	 	 
									"4.	How many mothers counseled during last month? ",	 	 	 
									"5.	How many patients came for follow up in OPD? ", 	 	 	
									"6.	How many babies are on EBF? "
								);
								for($index=1;$index<=count($labels);$index++){
								?>
								<div class="row">
									<div class="col-xs-8">
									  <label><?php echo $labels[$index-1];?></label>
									</div>
									<div class="col-xs-1 text-center">
									   <p><?php $var ='cpw_r'.$index.'_f1'; echo isset($DataRow)?(($DataRow->$var=="1")?'Yes':(($DataRow->$var=="0")?'No':'')):''; ?></p>
									</div>
									
									<div class="col-xs-3  ">
									   <p><?php $var ='cpw_r'.$index.'_f2'; echo isset($DataRow)?$DataRow->$var:'';  ?></p>
									</div>
								</div>
								<?php } ?>
      
							</div><!--end of div rowlightbg-->
						</div><!--end of div alignmentview-->
						<br>
						<div class="row" style="background: #0B7D05 none repeat scroll 0% 0%;">	
							<div style="text-align: right;padding-top: 5px;padding-bottom: 5px;" class="col-md-5 col-md-offset-7 col-sm-6 col-sm-offset-6 col-xs-6 col-xs-offset-6">
								<?php if($DataRow->submitted_by==$userId){ ?>
									<a class="btn btn-primary btn-md btncc" href="<?php echo $basePath; ?>nutrition/forms/stabilization_edit/<?php echo $vpvc_id; ?>"><i class="fa fa-pencil-square-o"></i> Update </a>
								<?php } ?>
									<a class="btn btn-primary btn-md btncc" onclick="history.go(-1)"><i class="fa fa-arrow-left"></i> Back </a>
							</div>
						</div>
					</form>
				</div> <!--end of panel body-->
			</div> <!--end of panel panel-primary-->
		</div><!--end of container-->
		<?php $this -> load -> view("templates/footer"); ?>
		<?php $this -> load -> view("templates/scripts"); ?>
		<script type="text/javascript">
		$(document).ready(function() {
			$("#compare_btn").on('click',function(e){
				window.location.href="<?php echo $basePath; ?>nutrition/forms/stabilization_compare?current=<?php echo $vpvc_id; ?>&compareto="+$("#p_month").val();
			});
		})
	</script>
	</body>
</html>