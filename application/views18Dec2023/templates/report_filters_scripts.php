<?php 
$basePath = base_url();
$scriptsPath = base_url()."assets/js/";
?>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>megamenu.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="<?php echo $scriptsPath; ?>bootstrap-clockpicker.min.js"></script>
<script type="text/javascript">
	$('.collapse').on('shown.bs.collapse', function(){
		$(this).parent().find(".glyphicon-plus").removeClass("glyphicon-plus").addClass("glyphicon-minus");
	}).on('hidden.bs.collapse', function(){
		$(this).parent().find(".glyphicon-minus").removeClass("glyphicon-minus").addClass("glyphicon-plus");
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
	var x =$('input[name=dov]');
	if(x.length){
		var visitedate = $('input[name=dov]').val();
		var arr = visitedate.split('-');
		var Year = parseInt(arr[2]);
		var Month = parseInt(arr[1]);
		function getStartDate() {
				var ourStartDate = new Date((new Date(Year, Month-1,1)));
				return ourStartDate;
		}
		function getEndDate() {
				var lastDate = new Date((new Date(Year, Month,1))-1 );
				return lastDate;
			}
			$('.dp1').datepicker({
				format : "dd-mm-yyyy",
				startDate: getStartDate(),
				endDate: getEndDate()
			});
	}
 });
 </script>
<script type="text/javascript">
  $(function () {
	  if( typeof dateSet !== 'undefined' && dateSet==="custom"){}else{
			var options = {
			  format : "dd-mm-yyyy",
			  startDate : "01-01-1925",
			  endDate: "12-12-2000"
			};   
			$('#date_of_birth').datepicker(options);
				var options = {
				  format : "dd-mm-yyyy"
				};
				$('.dp').datepicker(options); 
	  }		
  });
</script>
<!--end of script for clander-->
<!--start of script for clockpicker-->
<script type="text/javascript">
	if($(".single-input").length == 0) {	
	}else{
		var input = $('.single-input').clockpicker({
			placement: 'bottom',
			align: 'left',
			autoclose: true,
			'default': 'now'
		});
	}	
</script>
<!--end of script for clockpicker-->
<!--start of script for common ajax-->
<script type="text/javascript">
	$(document).ready(function(){
		if($("#distcode").length == 0) {
			//it doesn't exist
			if($("#tcode").length == 0) {
			  //it doesn't exist
			}else{
				$('#tcode').trigger("change");
			}
		}else{
			if( typeof triggerDist !== 'undefined' && triggerDist !=='No')
			{
				$('#distcode').trigger("change");
			}			
		}	
		//for facat
		if($("#facat").length == 0) {
			//it doesn't exist
			if($("#fatype").length == 0) {
				//it doesn't exist
			}else{
				//for fatype
				if( typeof selectedfatype !== 'undefined' && selectedfatype!=='')
				{
					fatypes(selectedfatype);
				}else{
					fatypes('');
				}
			}
		}else{
			$('#facat').trigger("change");
		}
		//for month and year linking
		if($("#month").length == 0) {
			//month does not exist dont trigger
		}else{
			$('#year').trigger("change");
		}
	});
	$(document).ready(function(){
	  $('#changePass-trigger').click(function(){
		$(this).next('#changePass-content').slideToggle();
		$(this).toggleClass('active');          
		
		if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
		  else $(this).find('span').html('&#x25BC;')
		})
	});
	function updatePassword(){
		var opassword=document.getElementById("oldpassword").value;
		var newpassword=document.getElementById("newpassword").value;
		var confirmpassword=document.getElementById("repeatnewpassword").value;
		var username=document.getElementById("username").value;
		if(newpassword==confirmpassword){
			if(newpassword.toString().length >= 6 && newpassword.toString().length < 25){
				//console.log(opassword);
				if (opassword.toString().length >= 6 && opassword.toString().length < 25) 
				{
					$.ajax({
						type: 'GET',
						url:'<?php echo base_url(); ?>Common_Ajax/change_password',
						data:'username='+username+'&oldpassword='+opassword+'&newpassword='+newpassword+'&repeatnewpassword='+confirmpassword,
						success: function(response){
							//console.log(response);
							if (response=="Password Updated!") {	
								document.getElementById('oldpassword').value="";
								document.getElementById('newpassword').value="";
								document.getElementById('repeatnewpassword').value="";
								document.getElementById('txtCpwd').innerHTML="";
								$('#txtHint').html(response);
								$('#error').html("");
							}else
							{
								document.getElementById('txtCpwd').innerHTML="";
								$('#txtHint').html(response);
								$('#error').html("");
							}
						}
					});	
				} else
				{
					$('#txtHint').html("Enter correct password!");
				}
			}
			else{
				$('#error').html("Please Enter between 6-25 characters/numbers!");
				$('#txtHint').html("");
			}
		}else{
			$('#error').html("New Password and Confirm Password Doesn't Match!");
			$('#txtHint').html("");
		}
	}
	function validateConfirmPassword()
	{
		var pwd=document.getElementById("newpassword").value;
		var cpwd=document.getElementById("repeatnewpassword").value;
		if(pwd==cpwd)
		{
			$('#error').html("");
			document.getElementById('txtHint').innerHTML="Password Match!";
			
		}
		else
		{
			document.getElementById('txtHint').innerHTML="";
		}
	}
	$('#distcode').on('change', function(){
		var distcode = this.value;
		//to get tehsils of selected distcrict
		if($("#tcode").length == 0) {
			//tcode doesn't exist
			if($("#uncode").length == 0) {
				//uncode doesn't exist
				if(($("#facode").length > 0) || ($("#facode1").length > 0) || ($("#facode2").length > 0)) {
					var urll = "<?php echo base_url(); ?>Common_Ajax/getFacilities_options";
					$.ajax({
						type: "POST",
						data: "distcode="+distcode,
						url: urll,
						success: function(result){
							$('#facode').html(result);
							$('#facode1').html(result);
							$('#facode2').html(result);
						}
					});
				}else{
					
				}			
			}else{
				$('#uncode').trigger("change");
			}
		}else{
			if( typeof selectedtcode !== 'undefined' && selectedtcode>0)
			{
				var urll = "<?php echo base_url(); ?>Common_Ajax/getTehsils_options/"+selectedtcode;
			}else{
				var urll = "<?php echo base_url(); ?>Common_Ajax/getTehsils_options";
			}
			$.ajax({
				type: "POST",
				data: "distcode="+distcode,
				url: urll,//"<?php echo base_url(); ?>Common_Ajax/getTehsils_options",
				success: function(result){
					$('#tcode').html(result);
					$('#tcode').trigger("change");
				}
			});
		}
		
		//to get lhs list of selected district
		if(($("#lhscode").length > 0) || ($("#lhscode1").length > 0) || ($("#lhscode2").length > 0)) {
			$.ajax({
				type: "POST",
				data: "distcode="+distcode,
				url: "<?php echo base_url(); ?>Common_Ajax/getLHS_options",
				success: function(result){
					$('#lhscode').html(result);
					$('#lhscode1').html(result);
					$('#lhscode2').html(result);
				}
			});
		}
		
		//to get lhw list of selected district
		if(($("#lhwcode").length > 0) || ($("#lhwcode1").length > 0) || ($("#lhwcode2").length > 0)) {
			$.ajax({
				type: "POST",
				data: "distcode="+distcode,
				url: "<?php echo base_url(); ?>Common_Ajax/getLHW_options",
				success: function(result){
					$('#lhwcode').html(result);
					$('#lhwcode1').html(result);
					$('#lhwcode2').html(result);
				}
			});
		}
	});
	$('#tcode').on('change', function(){
		var tcode = this.value;
		//to get ucs of selected distcrict
		if($("#uncode").length == 0) {
		  //it doesn't exist
		}else{
			if( typeof selecteduncode !== 'undefined' && selecteduncode>0)
			{
				var urll = "<?php echo base_url(); ?>Common_Ajax/getUnC_options/"+selecteduncode;
			}else{
				var urll = "<?php echo base_url(); ?>Common_Ajax/getUnC_options";
			}
			$.ajax({
				type: "POST",
				data: "tcode="+tcode,
				url: urll,
				success: function(result){
					$('#uncode').html(result);
					$('#uncode').trigger("change");
				}
			});
		}				
	});	
	$('#uncode').on('change', function(){
		var uncode = this.value;
		//to get facilities of selected distcrict
		if($("#facode").length == 0) {
		  //it doesn't exist
		}else{
			if( typeof selectedfacode !== 'undefined' && selectedfacode>0)
			{
				var urll = "<?php echo base_url(); ?>Common_Ajax/getFacilities_options/"+selectedfacode;
			}else{
				var urll = "<?php echo base_url(); ?>Common_Ajax/getFacilities_options";
			}
			$.ajax({
				type: "POST",
				data: "uncode="+uncode,
				url: urll,//"<?php echo base_url(); ?>Common_Ajax/getFacilities_options",
				success: function(result){
					$('#facode').html(result);
					if($("#facode1").length == 0) {
					  //it doesn't exist
					}else{
						$('#facode1').html(result);
					}
					if($("#facode2").length == 0) {
					  //it doesn't exist
					}else{
						$('#facode2').html(result);
					}
				}
			});
		}			
	});	
	$('#facode').on('change', function(){
		//
	});
	$('#facat').on('change', function(){
		var facat = this.value;
		if( typeof selectedfatype !== 'undefined' && selectedfatype!='')
		{
			var urll = "<?php echo base_url(); ?>Common_Ajax/get_faTypes_options/"+facat+"/"+selectedfatype;
		}else{
			var urll = "<?php echo base_url(); ?>Common_Ajax/get_faTypes_options/"+facat;
		}
		$.ajax({
			type: "POST",
			url: urll,//"<?php echo base_url(); ?>Common_Ajax/get_faTypes_options/"+facat,
			success: function(result){
				$('#fatype').html(result);
			}
		});
	});
	function fatypes(selectedfatype=''){
		if( (typeof(selectedfatype) !== 'undefined') && (selectedfatype!==''))
		{
			var urll = "<?php echo base_url(); ?>Common_Ajax/get_faTypes_options/0/"+selectedfatype;
		}else{
			var urll = "<?php echo base_url(); ?>Common_Ajax/get_faTypes_options";
		}
		$.ajax({
			type: "POST",
			url: urll,//"<?php echo base_url(); ?>Common_Ajax/get_faTypes_options",
			success: function(result){
				$('#fatype').html(result);
			}
		});
	}
	
	$('#year').on('change', function(){
		var year = this.value;
		var curryear = (new Date).getFullYear();
		if(year < curryear)
		{
			$data1 = "month=13";
		}else{
			$data1 = "";
		}
		$.ajax({
			type: "POST",
			data: $data1,
			url: "<?php echo base_url(); ?>Common_Ajax/getMonthsWithCurrent",//getMonths
			success: function(result){
				$('#month').html('<option value="0">-- Select Month --</option>');
				$('#month').append(result);
			}
		});
	});
	
	$(document).on("keydown",".numberclass",function(e) {
		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || // Allow: Ctrl+A, Command+A
		(e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) || // Allow: home, end, left, right, down, up
		(e.keyCode >= 35 && e.keyCode <= 40)) {// let it happen, don't do anything
			return;
		}
		// Ensure that it is a number and stop the keypress
		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
			e.preventDefault();
			$(this).val('0');
			$(this).select();
		}
	});
</script>
<!--end of script for common ajax-->