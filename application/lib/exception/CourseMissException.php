<?php

namespace app\lib\exception;


class CourseMissException extends BaseException
{
    public $code = 404;
    public $errorCode = 40000;
    public $msg = '请求的Course不存在';
}