<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/26
 * Time: 13:18
 */

namespace app\common\validate;


use think\Validate;

class Comment extends Validate
{
    protected $rule = [
        'content'=>'require',
        'userid'=>'require',
    ];
    protected $message = [
        'content.require'=>'评论内容不能为空',
        'userid.require'=>'请先登录'
    ];
}