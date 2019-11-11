<?php

namespace app\lib\source;


use app\lib\exception\PasswordErrorException;

class Course extends JwglLogin
{

    public function __construct($stuid,$stupasswd)
    {
        parent::__construct($stuid,$stupasswd);
    }

    public function getCourse ($week)
    {
        $this -> yzmRequest();

        $res = $this -> loginRequest();
        $this -> isLogin($res);

        $result = $this -> courseRequest($week);

        return $result;
    }

    public function isLogin ($res)
    {
        if ($res['msg'] != '验证码不正确' && $res['status'] == 'n' ) {
            throw new PasswordErrorException();
        }
    }
}