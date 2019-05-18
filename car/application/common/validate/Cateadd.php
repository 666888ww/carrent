<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 14:59
 */

namespace app\common\validate;


use think\Validate;

class Cateadd extends Validate
{
    protected $rule = [
        'catename'=>'require',


    ];
    protected $message = [
        'catename.require'=>'栏目名称不能为空',


    ];
}