<?php

class Model_Register extends Model
{

    public $error   = [];
    public $success = "<h2 class='success'>Success!</h2>";
    private $result = [];

    public function __construct() {
        $this->db = new Database_Register();
        if($_SESSION['leng'] == 'ru')
        {
            $this->success = "<h2 class='success'>Успех!</h2>";
        }
    }

	public function set_data($data)
    {
        $login              = $data["login"];
        // Persuade that user is not exist already
        $is_exist           = $this->db->getUserByUserLogin($login);
        if($is_exist)
        {
            if($_SESSION['leng'] == 'ru')
            {
                $this->error[]  = "<h2 class='error'>Такой пользователь уже существует!</h2>";
            }
            else
            {
                $this->error[]  = "<h2 class='error'>This user is already exist!</h2>";
            }
            return false;
        }
        // Set password
        $data               = $this->setHashToPass($data);
        // Set user
        $is_reg             = $this->db->insertUser($data);
        // Create session
        $_SESSION['userid'] = $this->db->getUserIdByLogin($data['login'])['id'];
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
        if($data['password'] != $data['password2'])
        {
            if($_SESSION['leng'] == 'ru')
            {
                $this->error[]  = "<h2 class='error'>Пароли не совпадают!</h2>";
            }
            else
            {
                $this->error[]  = "<h2 class='error'>Your passwords are mismatched!</h2>";
            }
        }
        $data['login']      = isset($data['login']) ? $data['login'] : die(header('Location: /'));
        $data['password']   = isset($data['password']) ? $data['password'] : die(header('Location: /'));
        $data['leng']       = isset($_SESSION['leng']) ? $_SESSION['leng'] : "ru";

        if(count($this->error) > 0)
		{
			header("HTTP/1.0 400 Bad Request");
            print($this->error[0]);
			return false;
        }
        return $data;
    }

    public function setHashToPass($data)
    {
        $data['password']       = password_hash($data['password'], PASSWORD_DEFAULT);
        unset($data['password2']);
        return $data;
    }
}