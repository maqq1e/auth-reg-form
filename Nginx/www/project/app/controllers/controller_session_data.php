<?php

class Controller_Session_Data extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		if(empty($_POST['status']))
		{
			header("HTTP/1.0 400 Bad Request");
			print "Access denied!";
		}
		echo(json_encode($_SESSION));
	}
}
