<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/10
 * Time: 13:28
 */

namespace app\common\validate;


use think\Validate;

class Caradd extends Validate
{
     protected $rule = [
         'name'=>'require',
         'type'=>'require',
         'price'=>'require',
         'rent'=>'require',
         'carimage'=>'require',
         'status'=>'require',
         'cateid'=>'require',

     ];
     protected $message = [
         'name.require'=>'车辆名称不能为空',
         'type.require'=>'车辆类型不能为空',
         'price.require'=>'车辆不能租金为空',
         'rent.require'=>'车辆押金不能为空',
         'carimage.require'=>'车辆图片不能为空',
         'status.require'=>'车辆状态不能为空',
         'cateid.require'=>'所属导航不能为空',

     ];
}