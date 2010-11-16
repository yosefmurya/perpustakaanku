<?php

class main extends CommonControl {

	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		//echo "Neat Project";
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/main.php */