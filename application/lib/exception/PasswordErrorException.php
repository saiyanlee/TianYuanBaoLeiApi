<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/30 0030
 * Time: 16:18
 */

namespace app\lib\exception;


class PasswordErrorException extends BaseException
{
    public $code = 401;
    public $errorCode = 10000;
    public $msg = '密码错误';

}