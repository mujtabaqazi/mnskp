<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contents extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
	}
	//============================ Constructor Function Ends ============================//
	public function downloads()
	{
		$this->load->view('downloads');
	}
	public function sop()
	{
		$this->load->view('sop');
	}
}
