<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/25
 * Time: 14:48
 */

namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;

class Orde extends Model
{
    protected $table = 't_orde';
    use SoftDelete;
    protected static $deleteTime ='delete_time';
    //关联车辆
    public function carmessage(){
        return $this->belongsTo('Carmessage','carid','id');

    }
    //关联用户
    public function user(){
        return $this->belongsTo('User','userid','id');
    }
}