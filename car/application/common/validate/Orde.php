<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/3/16
 * Time: 15:55
 */

namespace app\common\validate;


use think\Validate;

class Orde extends Validate
{
    protected $rule = [
        'username'=>'require',
        'carname'=>'require',
        'priceid'=>'require',
        'rentid'=>'require',
        'starttime'=>'require',
        'overtime'=>'require',

    ];
    protected $message = [
        'username.require'=>'用户名不能为空',
        'carname.require'=>'车辆名称不能为空',
        'priceid.require'=>'租金不能为空',
        'rentid.require'=>'押金不能为空',
        'starttime.require'=>'开始时间不能为空',
        'overtime.require'=>'结束时间不能为空',

    ];
}