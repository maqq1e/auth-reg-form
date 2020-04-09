<?php

class Controller_Logout extends Controller
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
		// Delete session
		$_SESSION['userid'] = '';
		return true;
	}
}
