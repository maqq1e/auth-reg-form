<?php

class Controller_Main extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_Main();
	}

	function action_index()
	{
		// Contant for using in html (php) template
		$page			= array();
		$page['title']	= 'Profile';
		// Inforamtion about user
		$data = $this->model->get_data($_SESSION['userid']);

		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}
