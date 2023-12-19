<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Reportfilters Class
 *
 * This class manages the reports filters object
 *
 * @package		Report Filters
 * @version		1.0
 * @version		1.1 updated by imran on 2016-12-14 : option added for [all year can be selected]
 * @version		1.2 updated by imran on 2017-04-07 : option added for [From Period and to period selection]
 * @author 		Uzair <uzair.bsse942@gmail.com>
 * @updated By 	Imran <rajaimranqamer@gmail.com>
 * @copyright 	Copyright (c) 2016,
 * @link		
 */
class Reportfilters {
	
	/**
	 * ReportFilters stack
	 *
     */
	private $options = array();
	private $result = array();
	private $ulevel = "";
	private $utype = "";
	private $distcode = "";
	private $otherAttributes = "";
	private $outputHtml = "";
	 /**
	  * Constructor
	  *
	  * @access	public
	  *
	  */
	public function __construct()
	{	//initialize codeigniter instance
		$this->ci =& get_instance();
		//Get Session Library loaded
		$this->ci->load->library('session');
		//Get database Library loaded
		$this->db = $this->ci->load->database('default',TRUE);
		// Get html helper loaded
		$this->ci->load->helper('html');
		// Get Form Helper Loaded
		$this->ci->load->helper('form');
		// set variables
		$this->ulevel = $this->ci->session->userLevel;
		$this->utype = $this->ci->session->utype;
		$this->distcode = $this->ci->session->distcode;
		
		log_message('debug', "Report Filters Class Initialized");
	}
	
	// --------------------------------------------------------------------

	/**
	 * Main function to dynamically create filters based on desired filters
	 *
	 * @access	public
	 * @param	boolen 					$district
	 * @param	boolen 					$tehsil
	 * @param	boolen 					$uc
	 * @param	boolen 					$hf
	 * @param	array  					$reportPeriod
	 * @param	multidimenttional_array $extraNeededFilters
	 * @param	string 					$reportPath
	 * @param	string 					$reportFiltersTitle
	 * @return	void
	 */		
	function createReportFilters($district=false, $tehsil=false, $uc=false, $hf=false, $reportPeriod=NULL, $reportType=false, $extraNeededFilters=NULL)
	{
		if($district == true)
			$this->districtFilter();
		if($tehsil == true)
			$this->tehsilFilter();
		if($uc == true)
			$this->ucFilter();
		if($hf == true)
			$this->hfFilter();
		if($reportPeriod)
			$this->reportPeriod($reportPeriod);
		if($reportType == true)
			$this->reportType();
		if($extraNeededFilters)
			$this->extraNeededFilters();
		return $this->outputHtml;
	}
	
	// --------------------------------------------------------------------

	/**
	 * Create District Filter for Reports
	 *
	 * @access	public
	 * @return	void
	 */		
	function districtFilter()
	{
		$this->db->select('distcode,district');
		if($this->ulevel=='2')
			$this->options[0] = "--Select District--";
		if($this->ulevel=='3')
			$this->db->where('distcode',$this->distcode);
		$this->db->order_by('district asc');
		$this->result = $this->db->get('districts')->result_array();
		foreach($this->result as $key => $val){
			$this->options[$val['distcode']] = $val['district'];
		}
		$this->otherAttributes = 'id="distcode" class="form-control"';
		$this->filterRowCreation("District", "distcode",$this->otherAttributes, $this->options, "dropdown");
	}
	
	// --------------------------------------------------------------------

	/**
	 * Create Tehsil Filter for Reports
	 *
	 * @access	public
	 * @return	void
	 */		
	function tehsilFilter()
	{
		$this->options[0] = "";
		if($this->ulevel=='2'){
		}else{
			$this->options[0] = "--Select Tehsil--";
			$this->db->select('tcode,tehsilname(tcode) as tehsil');
			if($this->ulevel=='3')
				$this->db->where('distcode',$this->distcode);
			$this->db->order_by('tehsil asc');
			$this->result = $this->db->get('tehsil')->result_array();
			foreach($this->result as $key => $val){
				$this->options[$val['tcode']] = $val['tehsil'];
			}
		}
		$this->otherAttributes = 'id="tcode" class="form-control"';
		$this->filterRowCreation("Tehsil", "tcode", $this->otherAttributes, $this->options, "dropdown");
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Create Union Council Filter for Reports
	 *
	 * @access	public
	 * @return	void
	 */		
	function ucFilter()
	{
		$this->options[0] = "";
		if($this->ulevel=='2'){
		}else{
			$this->options[0] = "--Select Union Council--";
			$this->db->select('uncode,unname(uncode) as unname');
			if($this->ulevel=='3')
				$this->db->where('distcode',$this->distcode);
			$this->db->order_by('unname asc');
			$this->result = $this->db->get('unioncouncil')->result_array();
			foreach($this->result as $key => $val){
				$this->options[$val['uncode']] = $val['unname'];
			}
		}
		$this->otherAttributes = 'id="uncode" class="form-control"';
		$this->filterRowCreation("Union Council", "uncode", $this->otherAttributes, $this->options, "dropdown");
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Create Health Facility Filter for Reports
	 *
	 * @access	public
	 * @return	void
	 */		
	function hfFilter()
	{
		$this->options[0] = "";
		if($this->ulevel=='2'){
		}else{
			$this->options[0] = "--Select Facility--";
			$this->db->select('facode,facilityname(facode) as facility');
			if($this->ulevel=='3')
				$this->db->where(array('distcode' => $this->distcode));
			$this->db->order_by('facility asc');
			$this->result = $this->db->get('facilities')->result_array();
			foreach($this->result as $key => $val){
				$this->options[$val['facode']] = $val['facility'];
			}
		}
		$this->otherAttributes = 'id="facode" class="form-control"';
		$this->filterRowCreation("Facility", "facode", $this->otherAttributes, $this->options, "dropdown");
	}
	
	// --------------------------------------------------------------------
	/**
	 * Create a dropdowns for yearly, monthly, weekly and dates inputs in Filters for Reports
	 *
	 * @param	array 	$reportPeriod //array should contain monthly,yearly,weekly,dates filters names to create one of thoes
	 * @access	public
	 * @return	void
	 */	
	function reportPeriod($reportPeriod){
		if(in_array("yearly",$reportPeriod) || in_array("quarterly",$reportPeriod) || in_array("monthly",$reportPeriod)){
			if(in_array("allyear",$reportPeriod))
				$this->options[0] = "--Select Year--";
			$years = $this->getYearsOptions();
			$this->otherAttributes = 'id="year" class="form-control"';
			$this->filterRowCreation("Year", "year", $this->otherAttributes, $this->options, "dropdown");
		}
		if(in_array("quarterly",$reportPeriod)){
			$this->options[0] = "--Select Quarter--";
			$months = $this->getQuarterOptions();
			$this->otherAttributes = 'id="quarter" class="form-control"';
			$this->filterRowCreation("Quarter", "quarter", $this->otherAttributes, $this->options, "dropdown");
		}
		if(in_array("monthly",$reportPeriod)){
			$this->options[0] = "--Select Month--";
			$months = $this->getMonthsOptions();
			$this->otherAttributes = 'id="month" class="form-control"';
			$this->filterRowCreation("Month", "month", $this->otherAttributes, $this->options, "dropdown");
		}
		if(in_array("weekly",$reportPeriod)){
			$this->options[0] = "--Select Week--";
			$weeks = $this->getWeeksOptions();
			$this->otherAttributes = 'id="week" class="form-control"';
			$this->filterRowCreation("Week", "week", $this->otherAttributes, $this->options, "dropdown");
		}
		if(in_array("dates",$reportPeriod)){
			$this->options = array('name' => 'datefrom', 'id' => 'datefrom', 'class' => 'form-control dp', 'required' => 'required');
			$this->filterRowCreation("Date From", "datefrom", $this->otherAttributes, $this->options, "input");
			$this->options = array('name' => 'dateto', 'id' => 'dateto', 'class' => 'form-control dp', 'required' => 'required');
			$this->filterRowCreation("Date To", "dateto", $this->otherAttributes, $this->options, "input");
		}
		if(in_array("month-from-to",$reportPeriod)){
			$this->options = array('name' => 'monthfrom', 'id' => 'monthfrom', 'class' => 'form-control dp-my', 'required' => 'required','data-date-end-date' => "-1m");//+0m
			$this->filterRowCreation("Period From", "monthfrom", $this->otherAttributes, $this->options, "input");
			$this->options = array('name' => 'monthto', 'id' => 'monthto', 'class' => 'form-control dp-my', 'required' => 'required','data-date-end-date' => "-1m");//+0m
			$this->filterRowCreation("Period To", "monthto", $this->otherAttributes, $this->options, "input");
		}
		
	}
	
	// --------------------------------------------------------------------
	
	/**
	 * Create Report Type Filter for Reports
	 *
	 * @access	public
	 * @return	void
	 */		
	function reportType()
	{
		$this->options[0] = "--Select--";
		$this->options["flcf"] = "Facility Wise";
		$this->options["uc"] = "Union Council Wise";
		$this->otherAttributes = 'id="reportType" class="form-control"';
		$this->filterRowCreation("Report Type", "reportType", $this->otherAttributes, $this->options, "dropdown");
	}
	
	// --------------------------------------------------------------------
	/**
	 * Create a row for different Filters for Reports
	 *
	 * @param	string 		$title
	 * @param	string 		$for
	 * @param	string 		$attr
	 * @param	array 		$opt
	 * @param	string 		$type
	 * @access	public
	 * @return	void
	 */		
	function filterRowCreation($title=NULL, $for=NULL, $attr=NULL, $opt=NULL, $type=NULL){
		$this->outputHtml .=	'<div class="row">
									<div class="form-group">';
		$attributes = array(
			'class' => 'col-xs-3 col-xs-offset-1 control-label',
		);
		$this->outputHtml .= form_label($title, $for, $attributes);
		$this->outputHtml .= '<div class="col-xs-7">';		
		if($type == "dropdown"){
			$this->outputHtml .= form_dropdown($for, $opt, '', $attr);
		}
		if($type == "input"){
			$this->outputHtml .= form_input($opt);
		}
		if($type == "radio"){
			//form_radio
		}
		if($type == "checkbox"){
			//form_checkbox
		}
		$this->outputHtml .='</div>  					
						</div>
					</div>';
		$this->options=NULL;
		$this->otherAttributes=NULL;
		$this->result=NULL;
	}
	
	// --------------------------------------------------------------------
	/**
	 * Create Filters Top info and sets its title and path for Reports
	 *
	 * @param	string 		$path
	 * @param	string 		$title
	 * @access	public
	 * @return	void
	 */	
	function filtersHeader($path,$title){
		return '<div class="row">
					<div class="col-xs-6 col-xs-offset-3">
						<div class="panel panel-primary">
							<div class="panel-heading text-center">'.$title.'</div>
								<div class="panel-body">
									<form method="post" target="_blank" id="filter-form" class="form-horizontal form-bordered" action="'.$path.'">';
	}
	
	// --------------------------------------------------------------------
	/**
	 * Create Filters Footer info and add a submit button
	 *
	 * @access	public
	 * @return	void
	 */	
	function filtersFooter(){
						return '<hr>
								<div class="row">
									<div class="col-xs-3" style="margin-left: 71%;">
										<button type="submit" name="submit" class="btn btn-md btn-success"><i class="fa fa-search"></i> Preview </button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>';
	}
	
	// --------------------------------------------------------------------
	/**
	 * Create Years Option for year Filter
	 *
	 * @access	public
	 * @return	void
	 */	
	function getYearsOptions(){
		$startYear = 2015;
		$endYear = date("Y");
		for($endYear; $endYear>=$startYear;$endYear--){
			$this->options[$endYear] = $endYear;
		}
	}
	
	// --------------------------------------------------------------------
	/** 
	 * Create months Option for months Filter
	 *
	 * @access	public
	 * @return	void
	 */	
	function getQuarterOptions(){		
		$quarters = array(1 => 'First', 2 => 'Second', 3 => 'Third', 4 => 'Fourth');
		foreach ($quarters as $num => $quarteritem) {
			$quarter = sprintf("%02d", $num);
			$this->options[$quarter] = $quarteritem;
		}
	}
	
	// --------------------------------------------------------------------
	/**
	 * Create months Option for months Filter
	 *
	 * @access	public
	 * @return	void
	 */	
	function getMonthsOptions(){		
		$months = array(1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April', 5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August', 9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December');
		foreach ($months as $num => $monthitem) {
			$month = sprintf("%02d", $num);
			$this->options[$month] = $monthitem;
		}
	}
}
// END Reportfilters Class

/* End of file Reportfilters.php */
/* Location: ./application/libraries/Reportfilters.php */
