<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/9/2 0002
 * Time: 22:07
 */

namespace app\api\validate;


class SemesterMsg extends BaseValidate
{
    protected $rule = [
        'week' => 'require|number|max:6|min:6',
    ];
}