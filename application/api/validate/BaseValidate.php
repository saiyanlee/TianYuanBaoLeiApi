<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/13 0013
 * Time: 9:14
 */

namespace app\api\validate;


use think\Exception;
use think\Request;
use think\Validate;
use app\lib\exception\ParameterException;

class BaseValidate extends Validate
{
    public function gocheck ()
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