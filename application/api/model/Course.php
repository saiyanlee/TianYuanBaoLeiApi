<?php

namespace app\api\model;

use think\Model;

class Course extends Model
{
    public static function getCourseByStuid($stuid)
    {

        $userClass = '17网工1班';
        $userMajor = '云计算';

        $course = self::get(['user_class' => '17网工1班','user_major' => '云计算']);

        return $course;
    }
}
