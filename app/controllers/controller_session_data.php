<?php

class Controller_Session_Data extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		echo(json_encode($_SESSION));
	}
}
