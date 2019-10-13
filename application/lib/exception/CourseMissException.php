<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/13 0013
 * Time: 10:15
 */

namespace app\lib\exception;


class CourseMissException extends BaseException
{
    public $code = 404;
    public $errorCode = '请求的Course不存在';
    public $msg = 40000;
}