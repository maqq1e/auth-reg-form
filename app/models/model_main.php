<?php

class Model_Main extends Model
{
    public function __construct() {
        $this->db = new Database_Main();
    }

	public function get_data($user_id)
    {
        if(!isset($user_id))
        {
            throw new Error('Session is not exist!!!');
        }
        else
        {
            $result     = $this->db->getOneUserByUserID($user_id);
            $result['pic']   = $this->db->getUserImage($user_id)['src'];
            if(!$result['pic'])
            {
                $result['pic'] = DEFAULT_IMAGE;
            }
            return $result;
        }
    }
}