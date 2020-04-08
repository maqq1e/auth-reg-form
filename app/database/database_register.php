<?php

class Database_Register extends Database
{
    const TABLE_USERS 			= 'users';

    public function insertUser($data)
    {
        $sql = 'INSERT INTO '.self::TABLE_USERS.'
                SET
                    login 			= :login,
                    password 		= :password,
                    leng            = :leng,
                    pic             = :pic';

        $vars = array(
            ':login' 				=> $data['login'],
            ':password' 			=> $data['password'],
            ':leng' 			    => $data['leng'],
            ':pic' 			        => $data['pic'],
        );
        return $this->query($sql, $vars);
    }

    public function getUserByUserLogin($login)
    {
        $sql = 'SELECT login, password, leng, pic FROM ' . self::TABLE_USERS . '
                WHERE
                    login 			= :login';

        $vars = array(
            ':login' 				=> $login,
        );
        return $this->getOne($sql, $vars);
    }

}
?>