<?php

namespace app\api\model;

use app\lib\exception\CourseMissException;
use app\lib\exception\ParameterException;
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

    public static function getCourseData ($res)
    {

        $courseData = array();
        $courseMsg = array('className' => 'kcmc','teacherName' => 'teaxms','place' => 'jxcdmc','number' => 'jcdm','day' => 'xq','major' => 'jxbmc');

        // change for arr
        $resArr = json_decode($res);

        // get the msg
        for ($i=0; $i<sizeof($resArr[0]);$i++)
        {
            foreach ($courseMsg as $key => $item)
            {
                $courseData[$i][$key] = $resArr[0][$i]->$item;
            }
        }

        return $courseData;

    }
}
