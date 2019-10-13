<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/13 0013
 * Time: 8:25
 */

namespace app\api\validate;


use think\Validate;

class IDMustBePositiveInt extends BaseValidate
{
    protected $rule = [
        'stuid' => 'require|isPositiveInteger'
    ];

    // customize => must PositiveInteger
    protected function isPositiveInteger ($value,$rule='',$data='',$field='')
    {
        if (is_numeric($value) && is_int($value+0) && ($value+0) > 0)
        {
            return true;
        }
        else
        {
            return $field.'必须是正整数';
        }
    }

}