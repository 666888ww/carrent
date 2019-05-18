<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/12
 * Time: 18:33
 */

namespace app\common\validate;


use think\Validate;

class Infor extends Validate
{
    protected $rule = [
        'infortitle'=>'require',
        'inforcontent'=>'require',

    ];
    protected $message = [
        'infortitle.require'=>'车辆名称不能为空',
        'inforcontent.require'=>'车辆类型不能为空',

    ];
}