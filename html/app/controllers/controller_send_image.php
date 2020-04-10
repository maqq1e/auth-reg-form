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
		// Verificate date from user
		$data = $this->model->verificateData($_FILES['upload']);
		if(!$data)
		{
			return false;
		}
		// Print all erorrs ( if exist )
		if(count($this->model->error) > 0)
		{
			header("HTTP/1.0 400 Bad Request");
			print($this->model->error[0]);
			return false;
		}
		else
		{
			// Set data
			$this->model->set_data($data);
			print $this->model->success;
			return true;
		}
	}
}
