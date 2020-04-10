<?php

class Controller_404 extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		// Contant for using in html (php) template
		$page			= array();
		$page['title']	= '404';

		$this->view->generate('404_view.php', 'template_view.php', $data);
	}
}
