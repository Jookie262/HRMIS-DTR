<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DTR_Controller extends MY_Controller 
{
	public function index()
	{
		$this -> load -> view('dtr_view');
	}
}
