<?php

class Controller_Switch_Leng extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		if(empty($_POST['leng']))
		{
			header("HTTP/1.0 400 Bad Request");
			print "Access denied!";
		}
		if($_POST['leng'] == 'ru')
		{
			$_SESSION['leng'] = 'ru';
		}
		else
		{
			$_SESSION['leng'] = 'en';
		}
	}
}
