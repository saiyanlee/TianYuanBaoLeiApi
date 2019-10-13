<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/13 0013
 * Time: 8:02
 */

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
        $course = CourseModel::getCourseByStuid($stuid);

        // check course
        if (!$course)
        {
            throw new CourseMissException();
        }

        return $course;
    }
}