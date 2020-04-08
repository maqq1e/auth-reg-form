<?php

class Database_Main extends Database
{
    const TABLE_USERS 			= 'users';

    public function insertUser($data)
    {
        $sql = 'INSERT INTO '.self::TABLE_USERS.'
                SET
                    login 			= :login,
                    password 		= :password,
                    leng            = :leng
                    pic             = :pic';

        $vars = array(
            ':login' 				=> $data['login'],
            ':password' 			=> $data['password'],
            ':leng' 			    => $data['leng'],
            ':pic' 			        => $data['pic'],
        );
        return $this->query($sql, $vars);
    }

    public function updateUser($data)
    {
        $sql = 'UPDATE '.self::TABLE_USERS.'
                SET
                    login 			= :login,
                    password 		= :password,
                    leng            = :leng,
                    pic             = :pic;
                WHERE
                    id			    = :id';

        $vars = array(
            ':login' 				=> $data['login'],
            ':password' 			=> $data['password'],
            ':leng' 			    => $data['leng'],
            ':pic' 			        => $data['pic'],
            ':id' 				    => $data['id'],
        );

        return $this->query($sql, $vars);
    }

    public function deleteUser($user_id)
    {
        $sql = 'DELETE FROM '.self::TABLE_USERS.'
                WHERE 
                    user_id			= :user_id';

        $vars = array(
            ':user_id' 				=> $user_id
        );
        
        return $this->query($sql, $vars);
    }

    public function getOneUserByLogin($login)
    {
        $sql = 'SELECT * FROM '.self::TABLE_USERS.'
                WHERE 
                    login 			= :login';
                    
        $vars = array(
            ':login' 				=> $login,
        );
        return $this->getOne($sql, $vars);
    }

    public function getOneUserByUserID($user_id)
    {
        $sql = 'SELECT * FROM '.self::TABLE_USERS.'
                WHERE 
                    user_id 			= :user_id';

        $vars = array(
            ':user_id' 				=> $user_id,
        );
        return $this->getOne($sql, $vars);
    }

    public function getAllUsers()
    {
        $sql = 'SELECT user_id FROM '.self::TABLE_USERS;
        return $this->getAll($sql);
    }
}
?>