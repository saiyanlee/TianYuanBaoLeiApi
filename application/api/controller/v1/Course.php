<?php

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;
use app\api\model\Course as CourseModel;
use app\lib\exception\CourseMissException;

class Course
{

    public function getCourse ($stuid)
    {
        // check stuid
        (new IDMustBePositiveInt ())->gocheck();

        // get course
//        $course = CourseModel::getCourseByStuid($stuid);
        $course = (new \app\lib\source\Course())->getCourse();

        // check course
        if (!$course)
        {
            throw new CourseMissException();
        }

        return $course;
    }
}