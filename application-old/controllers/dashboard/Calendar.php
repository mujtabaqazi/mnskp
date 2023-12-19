<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Calendar extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
		if(is_logged_in()){}else{
			redirect(base_url());exit;
		}
		$this -> load -> helper ('dashboard_functions_helper');
		$this -> load -> model ('Common_model');
		/********** Prefernce and template Settings For Calendar starts **********/
		$prefs = $this -> get_cal_prefs();
		$prefs['template'] = $this -> get_cal_template();
		//load library
		$this->load->library('calendar',$prefs);
		/********** Prefernce and template Settings For Calendar ends **********/
		//$this -> load -> model ('dashboard/Calendar_model',"calendar");
		$this -> load -> model ('dashboard/Home_model',"home");
	}
	//============================ Constructor Function Ends ============================//
	public function index($year=NULL, $month=NULL)
	{
		if($year){}else{$year = date("Y");}
		if($month){}else{$month = date("m");}
		$fmonth = $year."-".$month;
		$data["fmonth"] = $fmonth;
		$data["pagetitle"] = "Monthly Calendar";
		$data["currpage"] = "calendar";
		$total_days = $this->calendar->get_total_days($month, $year);
		$calldata = array();
		$PlansInfo = array();
		for($i=1;$i<=$total_days;$i++){
			$totChecklists = 0;$fillChecklists = 0;
			$dateToCheck = $fmonth."-".sprintf("%02d", $i);
			$PlansInfo[$i] = '';
			$PlansSupInfo[$i] = $this -> home -> get_all_plans_sup_data($fmonth,$dateToCheck);
			
			if(count($PlansSupInfo[$i])>0){
				//loop through visits to get checklists data
				foreach($PlansSupInfo[$i] as $key => $val){
					$PlansSupInfo[$i][$key]["checklists"] = $this -> home -> get_visit_checklists($val["vpvid"]);
					$totChecklists += count($PlansSupInfo[$i][$key]["checklists"]);
					$fillChecklists += array_sum(array_column($PlansSupInfo[$i][$key]["checklists"],"filledstat"));
				}
				//set counts for specific date
				$calldata[$i] = array(
					'visits' 	=> count($PlansSupInfo[$i]),
					'confirmed' => array_sum( array_column($PlansSupInfo[$i],"Status")),
					'checklists' => $totChecklists,
					'filled' 	=> $fillChecklists 
				);
			}
		}
		$data["calendar"] = $this->calendar->generate($year, $month, $calldata);
		$data["calldata"] = $calldata;
		$data["PlansInfo"] = json_encode($PlansInfo,JSON_NUMERIC_CHECK);
		$data["PlansSupInfo"] = json_encode($PlansSupInfo);
		$data["total_days"] = $total_days;
		$this->load->view('dashboard/calendar',$data);
	}
	protected function get_cal_template()
	{
		return '
			{table_open}<table border="0" cellpadding="0" cellspacing="0" class="table table-bordered calendar">{/table_open}
			{heading_row_start}<thead><tr>{/heading_row_start}
			{heading_previous_cell}<th><a href="{previous_url}"><i class="fa fa-chevron-left fa-2x"></i></a></th>{/heading_previous_cell}
			{heading_title_cell}<th class="text-center" colspan="{colspan}">{heading}</th>{/heading_title_cell}
			{heading_next_cell}<th class="text-right"><a href="{next_url}"><i class="fa fa-chevron-right fa-2x"></i></a></th>{/heading_next_cell}
			{heading_row_end}</tr>{/heading_row_end}
			{week_row_start}<tr class="title-row">{/week_row_start}
			{week_day_cell}<td>{week_day}</td>{/week_day_cell}
			{week_row_end}</tr></thead><tbody>{/week_row_end}
			{cal_row_start}<tr class="calendar-row">{/cal_row_start}
			{cal_cell_start}<td class="calendar-day" data-id="{day}">{/cal_cell_start}
			{cal_cell_start_today}<td class="calendar-day today" data-id="{day}">{/cal_cell_start_today}
			{cal_cell_start_other}<td class="other-month">{/cal_cell_start_other}
			{cal_cell_content}<div class="div-inner">
				<div class="day-number">
					<span>{day}</span>
				</div>
				<div class="plans_count">
					<span class="badge success"><span>Planned Visits</span>{content}[visits]</span>
				</div>
				<div class="plan_visits">
					<span class="badge blue2"><span>Confirmed Visits</span>{content}[confirmed]</span>
				</div>
				<div class="visits_confirmed">
					<span class="badge green2"><span>Planned Checklists</span>{content}[checklists]</span>
				</div>
				<div class="chklsts_filled">
					<span class="badge red3"><span>Filled Checklists</span>{content}[filled]</span>
				</div>
			</div>{/cal_cell_content}
			{cal_cell_content_today}<div class="div-inner highlight">
				<div class="day-number">
					<span>{day}</span>
				</div>
				<div class="plans_count">
					<span class="badge success"><span>Planned Visits</span>{content}[visits]</span>
				</div>
				<div class="plan_visits">
					<span class="badge blue2"><span>Confirmed Visits</span>{content}[confirmed]</span>
				</div>
				<div class="visits_confirmed">
					<span class="badge green2"><span>Planned Checklists</span>{content}[checklists]</span>
				</div>
				<div class="chklsts_filled">
					<span class="badge red3"><span>Filled Checklists</span>{content}[filled]</span>
				</div>
			</div>{/cal_cell_content_today}
			{cal_cell_no_content}<div class="div-inner no-data"><div class="day-number"><span>{day}</span></div></div>{/cal_cell_no_content}
			{cal_cell_no_content_today}<div class="div-inner highlight no-data"><div class="day-number"><span class="badge current-date">{day}</span></div></div>{/cal_cell_no_content_today}
			{cal_cell_blank}&nbsp;{/cal_cell_blank}
			{cal_cell_other}{day}{/cal_cel_other}
			{cal_cell_end}</td>{/cal_cell_end}
			{cal_cell_end_today}</td>{/cal_cell_end_today}
			{cal_cell_end_other}</td>{/cal_cell_end_other}
			{cal_row_end}</tr>{/cal_row_end}
			{table_close}</tbody></table>{/table_close}
		';// title="Header" data-toggle="popover" data-placement="left" data-content="Content"
	}
	protected function get_cal_prefs(){
		return $prefs = array(
			'show_next_prev'	=> TRUE,
			'next_prev_url'		=> base_url().'dashboard/calendar/',
			'start_day' 		=> 'monday',
			'month_type'   		=> 'long',
			'day_type'   		=> 'long'
		);
	}
}