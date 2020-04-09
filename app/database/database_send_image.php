<?php

class Database_Send_Image extends Database
{
    const TABLE_IMAGES          = 'images';

    public function updateImage($src, $user_id)
    {
        $sql = 'UPDATE '.self::TABLE_IMAGES.'
                SET
                    src      		= :src
                WHERE user_id       = :user_id';

        $vars = array(
            ':user_id' 				=> $user_id,
            ':src' 			        => $src,
        );
        return $this->query($sql, $vars);
    }

    public function hasImage($user_id)
    {
        $sql = 'SELECT * FROM '.self::TABLE_IMAGES.'
                WHERE user_id       = :user_id';

        $vars = array(
            ':user_id' 				=> $user_id,
        );
        return $this->getOne($sql, $vars);
    }

    public function saveImage($src, $user_id)
    {
        $sql = 'INSERT INTO '.self::TABLE_IMAGES.'
                SET
                    user_id         = :user_id,
                    src      		= :src';

        $vars = array(
            ':user_id' 				=> $user_id,
            ':src' 			        => $src,
        );
        return $this->query($sql, $vars);
    }

}
?>