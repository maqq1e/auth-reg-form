<?php

class Model_Register extends Model
{

    public $error   = [];
    public $success = "<h2 class='success'>Success!</h2>";
    private $result = [];

    public function __construct() {
        $this->db = new Database_Register();
    }

	public function set_data($data)
    {
        $login              = $data["login"];
        // Persuade that user is not exist already
        $is_exist           = $this->db->getUserByUserLogin($login);
        if($is_exist)
        {
            $this->error[]  = "<h2 class='error'>This user is already exist!</h2>";
            return false;
        }
        // Set password
        $data               = $this->setHashToPass($data);
        // Set user
        $is_reg             = $this->db->insertUser($data);
        // Create session
        $_SESSION['userid'] = $this->db->getUserIdByLogin($data['login']);
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
        if($data['password'] != $data['password2'])
        {
            $this->error[]  = "<h2 class='error'>You passwords are mismatched!</h2>";
        }
        $data['login']      = isset($data['login']) ? $data['login'] : die("<h1>Login - Error in system - check your input form</h1>");
        $data['password']   = isset($data['password']) ? $data['password'] : die("<h1>Password - Error in system - check your input form</h1>");
        $data['leng']       = isset($_SESSION['leng']) ? $_SESSION['leng'] : "ru";

        if(count($this->error) > 0)
		{
			foreach ($this->error as $error) {
				print($error);
			}
			return "You have some errors - you must fix it!";
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