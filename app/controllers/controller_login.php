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
		// Verificate date from user
		$data = $this->model->verificateData($_POST);
		// If return string ( fatal error )
		if(!$data)
		{
			return false;
		}
		// Try to login
		$this->model->get_login($data);
		// Print all erorrs ( if exist )
		if(count($this->model->error) > 0)
		{
			header("HTTP/1.0 400 Bad Request");
			print($this->model->error[0]);
			return false;
		}
		else
		{
			print $this->model->success;
			return true;
		}
	}
}
