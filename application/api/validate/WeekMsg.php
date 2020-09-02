<?php

namespace app\api\validate;


class WeekMsg extends BaseValidate
{
    protected $rule = [
        'week' => 'require|number|max:2|min:1',
    ];
}