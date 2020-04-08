<?php

class Model_Main extends Model
{
    public function __construct() {
        $this->db = new Database_Main();
    }

	public function get_data()
    {
		return array(
            'name' => 'Daniel',
            'img' => 'https://100kursov.com/uploads/2017/05/06/23/21/84d0eb152f1121ca6ca49fd10cd8d346.jpg'
        );
    }
}