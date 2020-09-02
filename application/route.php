<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use think\Route;

// v2
Route::get('api/v2/course/:stuid','api/v2.Course/getCourse/');
Route::post('api/v2/course/:week','api/v2.Course/getCourse/');

// v3
Route::post('api/v3/course/','api/v3.Course/getCourse/');
