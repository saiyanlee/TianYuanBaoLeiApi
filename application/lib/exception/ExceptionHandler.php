<?php

namespace app\lib\exception;


use think\exception\Handle;
use think\Request;

class ExceptionHandler extends Handle
{
    private $code;
    private $errorCode;
    private $msg;
    // 需要返回客户端当前请求的URL路径

    public function render (\Exception $exception)  //因为也要接收HttpException，所以要用基类的Exception
    {
        if ($exception instanceof BaseException) {
            // 自定义的异常
            $this -> code = $exception -> code;
            $this -> errorCode = $exception -> errorCode;
            $this -> msg = $exception -> msg;

        } else {        // 内部错误

            if (config('app_debug'))
            {
                return parent::render($exception);
            }
            else
            {
                $this -> code = 500;
                $this -> msg = '服务器内部错误';
                $this -> errorCode = 999;
                $this -> recordErrorLog($exception);
            }

        }

        $request = Request::instance();
        $result = [
            'error_code' => $this ->errorCode,
            'msg' => $this ->msg,
            'request_url' => $request->url()
        ];

        return json($result,$this->code);
    }

    private function recordErrorLog (\Exception $exception)
    {
        // 初始化配置
        Log::init([
            'type' => 'File',
            'path' => LOG_PATH,
            'level' => ['error']
        ]);

        Log::record($exception->getMessage(),'error');
    }

}