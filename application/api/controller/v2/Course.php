<?php

namespace app\api\controller\v2;


use app\api\validate\IDMustBePositiveInt;
use app\api\validate\PersonalMsg;
use app\lib\exception\CourseMissException;
use app\lib\source\Course as CourseRequest;
use think\Request;

class Course
{
    public function getCourse ()
    {

        // check stuid
        (new PersonalMsg())->gocheck();

        // get course
        $course = $this->courseRequest();


        // check course
        if (!$course)
        {
            $e = new CourseMissException();
            throw $e;
        }

        return json($course);
    }

    protected function courseRequest ()
    {
        // get
        $stuid = Request::instance()->post('stuid');
        $stupasswd = Request::instance()->post('stupasswd');

        session_start();
        $res = (new CourseRequest())->getCourse();

        return $res;
    }
}