<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/11
 * Time: 16:25
 */

namespace app\common\validate;


use think\Validate;

class Caruseradd extends Validate
{
    protected $rule = [
        'name'=>'require|min:2',
        'pass'=>'require|min:6|confirm:repass',
        'nickname'=>'require',
        'telephone'=>'require',
        'email'=>'require',
    ];
    protected $message = [
        'name.require'=>'用户名不能为空',
        'name.min'=>'用户名长度不能少于2位',
        'pass.require'=>'密码不能为空',
        'pass.min'=>'密码长度不能少于6位',
        'pass.confirm:repass'=>'密码要与确认密码一致',
        'nickname.require'=>'昵称不能为空',
        'telephone.require'=>'电话不能为空',
        'email.require'=>'邮箱不能为空',
    ];
}