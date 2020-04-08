<?php

class Controller_Reg extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		$this->view->generate('reg.php', 'template_view.php', $data);
	}

}
