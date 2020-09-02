<?php

namespace app\api\controller\v2;


use app\api\validate\IDMustBePositiveInt;
use app\api\validate\PersonalMsg;
use app\lib\exception\CourseMissException;
use app\lib\source\Course as CourseRequest;
use think\Request;
use app\api\model\Course as CourseModel;

class Course
{
    public function getCourse ($week)
    {

        // check stuid
        (new PersonalMsg())->goCheck();

        // get course
        $course = $this->courseRequest($week);


        // check course
        if (!$course)
        {
            $e = new CourseMissException();
            throw $e;
        }

        return ($course);
    }

    protected function courseRequest ($week)
    {
        // get params
        $stuid = Request::instance()->post('stuid');
        $stupasswd = Request::instance()->post('stupasswd');

        // change
        $stuidStr = strval($stuid);
        $stupasswdStr = strval($stupasswd);

        // get data from api and make a loop
        session_start();
//        $res = (new CourseRequest($stuidStr,$stupasswdStr))->getCourse();
        $flag = true;
        while ($flag)
        {
            $res = (new CourseRequest($stuidStr,$stupasswdStr))->getCourse($week);
            if ($res) {
                break;
            }
        }

        //check
//        if (!$res) {
//            throw new CourseMissException();
//        }


        $courseData = CourseModel::getCourseData($res);

        return json_encode($courseData);
    }
}