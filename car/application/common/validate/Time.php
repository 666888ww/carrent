<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/1
 * Time: 20:24
 */

namespace app\common\validate;
use app\admin\controller\User;
use think\Validate;

class Time extends Validate
{
    protected $rule = [
        'starttime'=>'require',
        'overtime'=>'require',
    ];
    protected $message = [
        'starttime.require'=>'开始时间不能为空',
        'overtime.require'=>'结束时间不能为空',
    ];
}