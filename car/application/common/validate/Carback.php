<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/24
 * Time: 23:00
 */

namespace app\common\validate;


use think\Validate;

class Carback extends Validate
{
    protected $rule = [
        'ordeid'=>'require',
        'beizhu'=>'require',
        'back_time'=>'require',
    ];
    protected $message = [
        'ordeid.require'=>'订单id不能为空',
        'beizhu.require'=>'备注不能为空',
        'back_time.require'=>'归还时间不能为空',
    ];
}