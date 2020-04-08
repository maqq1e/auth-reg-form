<?php

class Model_Login extends Model
{

    public $error   = [];
    public $success = "<h2 class='success'>Success!</h2>";
    private $result = [];

    public function __construct() {
        $this->db = new Database_Login();
    }

	public function get_login($data)
    {
        $login              = $data["login"];
        $is_exist           = $this->db->getUserByUserLogin($login);
        if($is_exist)
        {
            if(password_verify($data['password'], $is_exist['password']))
            {
                $_SESSION['userid'] = $is_exist['id'];
                $this->error = [];
            }
            else
            {
                $this->error[] = "<h2 class='error'>Incorrent login or password!</h2>";
            }
        }

    }

    public function verificateData($data)
    {
        if(empty($data['login']))
        {
            $this->error[]  = "<h2 class='error'>You must enter login!</h2>";
        }
        if(empty($data['password']))
        {
            $this->error[]  = "<h2 class='error'>You must enter password!</h2>";
        }

        $data['login']      = isset($data['login']) ? $data['login'] : die("<h1>Login - Error in system - check your input form</h1>");
        $data['password']   = isset($data['password']) ? $data['password'] : die("<h1>Password - Error in system - check your input form</h1>");
        $data['leng']       = isset($_SESSION['leng']) ? $_SESSION['leng'] : "ru";

        if(count($this->error) > 0)
		{
			foreach ($this->error as $error) {
				print($error);
			}
			return false;
        }

        return $data;
    }
}