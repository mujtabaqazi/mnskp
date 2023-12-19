<?php
//hi its reports class
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends CI_Controller {

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
