<?php

namespace app\api\model;

use think\Model;

class Course extends Model
{
    public static function getCourseByStuid($stuid)
    {

        $userClass = '17网工1班';
        $userMajor = '云计算';

        $course = self::get(['user_class' => $userClass,'user_major' => $userMajor]);

        return $course;
    }
}
