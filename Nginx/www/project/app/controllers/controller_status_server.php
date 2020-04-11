<?php

class Controller_Status_Server extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
        phpinfo();
	}
}
