<?php

class Database_Main extends Database
{
    const TABLE_USERS 			= 'users';
    const TABLE_IMAGES          = 'images';

    public function getOneUserByUserID($user_id)
    {
        $sql = 'SELECT login FROM '.self::TABLE_USERS.'
                WHERE
                    id 			= :user_id';

        $vars = array(
            ':user_id' 				=> $user_id,
        );
        return $this->getOne($sql, $vars);
    }
    public function getUserImage($user_id)
    {
        $sql = 'SELECT src FROM '.self::TABLE_IMAGES.'
                WHERE
                    user_id 		= :user_id';

        $vars = array(
            ':user_id' 				=> $user_id,
        );
        return $this->getOne($sql, $vars);
    }

}
?>