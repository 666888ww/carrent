<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/12
 * Time: 19:50
 */

namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;

class Comment extends Model
{    protected $table = 't_comment';
     use SoftDelete;
    protected static $deleteTime ='delete_time';
    //关联车辆
    public function carmessage(){
        return $this->belongsTo('Carmessage','carmessageid','id');

    }
    public function user(){
        return $this->belongsTo('User','userid','id');

    }


}