<?php

namespace app\lib\source;


class Course extends JwglLogin
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourse () {
        $this -> yzmRequest();
        $this -> loginRequest();
        $result = $this -> courseRequest();
        return $result;
    }
}