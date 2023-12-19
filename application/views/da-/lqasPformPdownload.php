<?php 
$basePath = base_url();
$assetsPath = base_url()."assets/";
$userId = $this -> session -> id;
$this->load->view("templates/scripts"); ?>
<script src='<?php echo $assetsPath; ?>build/pdfmake.min.js'></script>
<script src='<?php echo $assetsPath; ?>build/vfs_fonts.js'></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script type="text/javascript">				
	var docDefinition = { 
	content: [	
			{text: 'Data Accuracy Using LQAS Techniques\n\n', style: 'header'},
				{	
					columns: [
							{width: 150,text:'Name of reporting officer', style: 'text'},
							{width: 120,text:'<?php echo isset($DataRow)?$DataRow->supervisor_name:''; ?>', style: 'text1' },
							{width: 120,text:'Designation', style: 'text'},
							{width: 150,text:'<?php echo isset($DataRow)?$DataRow->supervisor_desg:''; ?>\n\n', style: 'text1'},
						]			
				},	
				{	
					columns: [
							{width: 150,text:'Plan month / MR month', style: 'text'},
							{width: 120,text:'<?php $var ="fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?> / <?php $var ="mis_data_fmonth"; echo isset($DataRow)?getNewFMonthFormat($DataRow->$var):''; ?>', style: 'text1' },
							{width: 120,text:'District', style: 'text'},
							{width: 150,text:'<?php echo isset($DataRow)?get_District_Name($DataRow->distcode):''; ?>\n\n', style: 'text1' },
						]			
				},	
				{	
					columns: [
							{width: 150,text:'LQAS Date', style: 'text'},
							{width: 120,text:'_____________________' },
							{width: 120,text:'Facility', style: 'text'},
							{width: 150,text:'<?php echo isset($DataRow)?$DataRow->facode.'-'.get_Facility_Name($DataRow->facode):''; ?>\n\n'},
						]			
				},
				{	
					columns: [
							{width: 150,text:'Respondent Type', style: 'text'},
							{width: 120,text:'<?php echo isset($DataRow)?$DataRow->entity_type:''; ?>' },
							{width: 120,text:'Respondent', style: 'text'},
							{width: 150,text:'<?php echo isset($DataRow)?$DataRow->entity_code."-".get_Entity_Name($DataRow->entity_code,$DataRow->entity_type):''; ?>\n\n'},
						]			
				},
				{
					table: {
						widths: [25,110,55,60,30,30,30,110],
						headerRows: 3,
						body: [
							[{rowSpan: 2, text: 'Sr. #', style: 'text1'},{rowSpan: 2, text: 'Data elements from the monthly reporting form (randomly selected)', style: 'text1'}, {rowSpan: 2,text:'No. from the MR <?php echo "(".((isset($DataRow) && $DataRow->mis_data_fmonth!==NULL)?$DataRow->mis_data_fmonth:"No MR Submitted").")"; ?>', style: 'text1'}, {text:'Verification of data', style: 'text1',colSpan:2},{},{rowSpan: 2, text:'Do numbers in column 2\n &3 match?', style: 'text1',colSpan:2},{},{rowSpan: 2,text:'Remarks(Such as Data \navailability, completeness etc)', style: 'text1'}],
							['','', '',{text:'Register/form', style: 'text1'},{text:'NO.', style: 'text1'},'','',''],
							['',{text:'1', style: 'text1'}, {text:'2', style: 'text1'},{text:'3', style: 'text1',colSpan: 2},'',{text:'Yes/No', style: 'text1',colSpan: 2},'',''],
							<?php for($i=1;$i<=12;$i++){ ?>
							[
								{text:'<?php echo $i;?>', style: 'text1',alignment:'center'},
								{text:'<?php $var ="lqas_r".$i."_f1"; echo isset($DataRow)?$DataRow->$var:''; ?>', style: 'text1'},
								{text:'<?php $var ="lqas_r".$i."_f2"; echo isset($DataRow)?$DataRow->$var:''; ?>', style: 'text1',alignment:'center'},
								{text:'<?php $var ="lqas_r".$i."_f3"; echo isset($DataRow)?$DataRow->$var:''; ?>', style: 'text1'},
								'',
								{text:'',colSpan:2},
								'',
								''
							],
							<?php } ?>
						['','','',{text:'Total', style: 'text1',colSpan: 2},'','','',''],
						['','','',{text:'Accuracy Percentage', style: 'text1',colSpan: 2},'',{text:'',colSpan:2},'',''] 
							 
						]
					} 
				},  
			{text: '\n\nLQAS Table: Decisions Rules for Sample Sizes of 12 and Coverage Targets/Average of 40-95%\n\n', style: 'footerheader'},
			{
				//style: 'tableExample',
				table: {
					widths: [60,70,22,22,22,22,22,22,22,22,22,22,22,30],
					body: [
						[{text:'Sample Size', style: 'text1'}, {text:'Less than 20%', style: 'text1'},{text:'20%', style: 'text1'},{text:'30%', style: 'text1'},{text:'40%', style: 'text1'},{text:'45%', style: 'text1'},{text:'50%', style: 'text1'},{text:'60%', style: 'text1'},{text:'65%', style: 'text1'},{text:'75%', style: 'text1'},{text:'85%', style: 'text1'},{text:'90%', style: 'text1'},{text:'95%', style: 'text1'},{text:'100%', style: 'text1'}],
						[{text:'12', style: 'text1'}, {text:'N/A', style: 'text1'},{text:'1', style: 'text1'},{text:'2', style: 'text1'},{text:'3', style: 'text1'},{text:'4', style: 'text1'},{text:'5', style: 'text1'},{text:'6', style: 'text1'},{text:'7', style: 'text1'},{text:'8', style: 'text1'},{text:'9', style: 'text1'},{text:'10', style: 'text1'},{text:'11', style: 'text1'},{text:'12', style: 'text1'}]
					]
				}
			},
		],
		styles: {
			header: {
				fontSize: 14,
				bold: true,
				alignment: 'center'		
			},
			text: {
				bold: true,
				fontSize: 10
			},
			text1: {
				fontSize: 10
			},
			footerheader: {
				fontSize: 12,
				bold: false,
				alignment: 'center'		
			},
			subheader: {
				fontSize: 12
			},
			
		}
	};
	// open the PDF in a new window
	//pdfMake.createPdf(docDefinition).open();

	// print the PDF
	try {
		pdfMake.createPdf(docDefinition).print();
		setTimeout(function(){ window.close(); }, 1000);
	}
	catch(err) {  //We can also throw from try block and catch it here
		alert(err);
		window.close();
	}
	/* var result = pdfMake.createPdf(docDefinition).print();
	alert(result);
	if (result === false) {
		alert('The popup was blocked by the browser. Please allow popups from this domain');
	} */
	// download the PDF
	//pdfMake.createPdf(docDefinition).download('optionalName.pdf');
	//window.close();
	//setTimeout(function(){ window.close(); }, 1000);
</script>
