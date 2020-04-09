<?php

class Controller_Logout extends Controller
{
	function __construct()
	{
		parent::__construct();
	}

	function action_index()
	{
		$_SESSION['userid'] = '';
		return true;
	}
}
