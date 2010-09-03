<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->layout->view('welcome');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */