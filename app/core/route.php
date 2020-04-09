<?php
class Route
{
	static function start()
	{
		// Controller and default action
		$controller_name    = 'Main';
		$action_name        = 'index';

		$routes = explode('/', $_SERVER['REQUEST_URI']);

		// Get controller name
		if ( !empty($routes[1]) )
		{
			$controller_name = $routes[1];
		}

		// Get action name
		if ( !empty($routes[2]) )
		{
			$action_name = $routes[2];
		}

		// If user is not login yet
		if(($controller_name == 'Main') && !$_SESSION['userid'])
		{
			header('Location: /reg');
		}

		// Add prefix
        $model_name         = 'Model_'.$controller_name;
		$database_name      = 'Database_'.$controller_name;
		$controller_name    = 'Controller_'.$controller_name;
		$action_name        = 'action_'.$action_name;

		// Connect file with database class ( if it is exist )
		$database_file = strtolower($database_name).'.php';
		$database_path = "app/database/".$database_file;
		if(file_exists($database_path))
		{
			include "app/database/".$database_file;
		}
		// Connect file with modal class ( if it is exist )

		$model_file = strtolower($model_name).'.php';
		$model_path = "app/models/".$model_file;
		if(file_exists($model_path))
		{
			include "app/models/".$model_file;
		}

		// Connect file with controller class
		$controller_file = strtolower($controller_name).'.php';
		$controller_path = "app/controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "app/controllers/".$controller_file;
		}
		else
		{
			if(IS_PRODUCTION)
			{
				Route::ErrorPage404();
			}
			else {
				throw new Error('Controller is not exist!');
			}
		}

		// Create controller
		$controller = new $controller_name;
		$action = $action_name;

		if(method_exists($controller, $action))
		{
			// Init controller's action
			$controller->$action();
		}
		else
		{
			if(IS_PRODUCTION)
			{
				throw new Error('Action is not exist!');
			}
			else {
				Route::ErrorPage404();
			}
		}

	}

	static function ErrorPage404()
	{
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
		header("Status: 404 Not Found");
		header('Location:'.$host.'404');
    }
}