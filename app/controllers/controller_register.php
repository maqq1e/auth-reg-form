<?php

class Controller_Register extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_Register();
	}

	function action_index()
	{
		$data = $this->model->verificateData($_POST);
		if(gettype($data) == 'string')
		{
			return $data;
		}
		$this->model->set_data($data);
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
			return true;
		}
	}
}
