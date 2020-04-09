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
                    leng            = :leng';

        $vars = array(
            ':login' 				=> $data['login'],
            ':password' 			=> $data['password'],
            ':leng' 			    => $data['leng'],
        );
        return $this->query($sql, $vars);
    }

    public function getUserByUserLogin($login)
    {
        $sql = 'SELECT login, password, leng FROM ' . self::TABLE_USERS . '
                WHERE
                    login 			= :login';

        $vars = array(
            ':login' 				=> $login,
        );
        return $this->getOne($sql, $vars);
    }
    public function getUserIdByLogin($login)
    {
        $sql = 'SELECT id FROM ' . self::TABLE_USERS . '
                WHERE
                    login 			= :login';

        $vars = array(
            ':login' 				=> $login,
        );
        return $this->getOne($sql, $vars);
    }

}
?>