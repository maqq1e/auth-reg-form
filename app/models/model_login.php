<?php

class Model_Login extends Model
{

    public $error   = [];
    public $success = "<h2 class='success'>Success!</h2>";
    private $result = [];

    public function __construct() {
        $this->db = new Database_Login();
        if($_SESSION['leng'] == 'ru')
        {
            $this->success = "<h2 class='success'>Успех!</h2>";
        }
    }

	public function get_login($data)
    {
        $login              = $data["login"];
        // Persuade that user is exist
        $is_exist           = $this->db->getUserByUserLogin($login);
        if($is_exist)
        {
            // Check password
            if(password_verify($data['password'], $is_exist['password']))
            {
                // Create session
                $_SESSION['userid'] = $is_exist['id'];
                $this->error = [];
            }
            else
            {
                if($_SESSION['leng'] == 'ru')
                {
                    $this->error[] = "<h2 class='error'>Неверный логин или пароль!</h2>";
                }
                else
                {
                    $this->error[] = "<h2 class='error'>Incorrent login or password!</h2>";
                }
            }
        }
        else
        {
            if($_SESSION['leng'] == 'ru')
            {
                $this->error[] = "<h2 class='error'>Неверный логин или пароль!</h2>";
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
            if($_SESSION['leng'] == 'ru')
            {
                $this->error[]  = "<h2 class='error'>Вы должны ввести логин!</h2>";
            }
            else
            {
                $this->error[]  = "<h2 class='error'>You must enter login!</h2>";
            }
        }
        if(empty($data['password']))
        {
            if($_SESSION['leng'] == 'ru')
            {
                $this->error[]  = "<h2 class='error'>Вы должны ввести пароль!</h2>";
            }
            else
            {
                $this->error[]  = "<h2 class='error'>You must enter password!</h2>";
            }
        }

        $data['login']      = isset($data['login']) ? $data['login'] : die("<h1>Login - Error in system - check your input form</h1>");
        $data['password']   = isset($data['password']) ? $data['password'] : die("<h1>Password - Error in system - check your input form</h1>");
        $data['leng']       = isset($_SESSION['leng']) ? $_SESSION['leng'] : "ru";

        if(count($this->error) > 0)
		{
            print($this->error[0]);
			return false;
        }

        return $data;
    }
}