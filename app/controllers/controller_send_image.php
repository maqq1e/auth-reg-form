<?php

class Controller_Send_Image extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new Model_Send_Image();
	}

	function action_index()
	{
		$data = $this->model->verificateData($_FILES['upload']);
		if(count($this->model->error) > 0)
		{
			foreach ($this->model->error as $error) {
				print($error);
			}
			return "You have some errors - you must fix it!";
		}
		else
		{
			$this->model->set_data($data);
			print $this->model->success;
			return true;
		}
	}
}
