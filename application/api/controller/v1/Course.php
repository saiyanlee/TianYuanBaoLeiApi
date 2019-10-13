<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/13 0013
 * Time: 8:02
 */

namespace app\api\controller\v1;


use app\api\validate\IDMustBePositiveInt;

class Course
{

    public function getCourse ($stuid)
    {
        // check stuid
        (new IDMustBePositiveInt ())->gocheck();
//        $data = [
//            'stuid' => $stuid
//        ];
//        $validate = new IDMustBePositiveInt ();
//        if ($validate->batch()->check($data)) {
//            echo 'OK';
//        } else {
//            dump($validate->getError());
//        }

        echo $stuid.'Hello World!';
    }
}