<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/2 0002
 * Time: 21:41
 */

namespace app\api\controller\v3;

use app\api\validate\PersonalMsg;
use app\api\validate\SemesterMsg;
use app\api\validate\WeekMsg;

class Course
{
    public function getCourse ()
    {
        // check input
        (new PersonalMsg())->goCheck();
        (new SemesterMsg())->goCheck();
        (new WeekMsg())->goCheck();

        // get course
        $course = $this->courseRequest();




    }


    protected function courseRequest ()
    {
        // get params
        $stuId = Request::instance()->post('stuId');
        $stuPasswd = Request::instance()->post('stuPasswd');
        $semester = Request::instance()->post('semester');
        $week = Request::instance()->post('week');

        $stuidStr = strval($stuId);
        $stupasswdStr = strval($stuPasswd);


    }


}