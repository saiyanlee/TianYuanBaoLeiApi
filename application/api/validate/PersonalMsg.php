<?php

namespace app\api\validate;


class PersonalMsg extends BaseValidate
{
    protected $rule = [
        'stuid' => 'require|number|max:14|min:14',
        'stupasswd' => 'require'
    ];
}