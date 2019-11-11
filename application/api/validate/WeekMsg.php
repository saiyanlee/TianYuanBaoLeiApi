<?php

namespace app\api\validate;


class WeekMsg
{
    protected $rule = [
        'week' => 'require|number|max:2|min:1',
    ];
}