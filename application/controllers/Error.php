<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends My_Controller {

	public function index()
	{
		$this->load->view('errors/error/php');
	}
}
