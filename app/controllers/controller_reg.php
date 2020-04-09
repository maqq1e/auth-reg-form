<?php

class Controller_Reg extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		// Contant for using in html (php) template
		$page			= array();
		$page['title']	= 'Registration';

		$this->view->generate('reg.php', 'template_view.php', $data);
	}

}
