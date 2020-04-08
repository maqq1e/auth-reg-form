<?php

class Controller_Login extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_Login();
	}

	function action_index()
	{
		$data = $this->model->verificateData($_POST);
		if(gettype($data) == 'string')
		{
			return $data;
		}
		$this->model->get_login($data);
		if(count($this->model->error) > 0)
		{
			foreach ($this->model->error as $error) {
				print($error);
			}
			return "You have some errors - you must fix it!";
		}
		else
		{
			print $this->model->success;
			// Redirection to user page
			print "<script>setTimeout(function() {window.location.href='/'}, 1000)</script>";
		}
	}
}
