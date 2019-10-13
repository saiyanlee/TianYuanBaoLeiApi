<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/13 0013
 * Time: 9:22
 */

namespace app\lib\exception;



class ParameterException extends BaseException
{
    public $code = 400;
    public $errorCode = 10000;
    public $msg = '参数错误';
}