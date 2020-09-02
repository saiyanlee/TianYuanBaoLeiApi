<?php

namespace app\api\validate;


use think\Exception;
use think\Request;
use think\Validate;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{
    public function goCheck ()
    {
        // get all param
        $params = Request::instance() -> param();

        // check param
        $result = $this -> batch() -> check($params);
        if ($result)
        {
            return true;
        }
        else
        {
            $e = new ParameterException([
                'msg' => '参数错误',
            ]);

            throw $e;

        }

    }
}