<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {
	//================ Constructor Function Starts ==================//
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Karachi");
	}
	//============================ Constructor Function Ends ============================//
	public function page_missing()
	{
		$this->load->view('errors/error_404');	
	}
}
