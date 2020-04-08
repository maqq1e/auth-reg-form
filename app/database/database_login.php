<?php

class Database_Login extends Database
{
    const TABLE_USERS 			= 'users';

    public function getUserByUserLogin($login)
    {
        $sql = 'SELECT id, login, password, leng, pic FROM ' . self::TABLE_USERS . '
                WHERE
                    login 			= :login';

        $vars = array(
            ':login' 				=> $login,
        );
        return $this->getOne($sql, $vars);
    }

}
?>