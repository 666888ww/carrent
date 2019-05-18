<?php

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Carmessage extends Model
{   //关联栏目表
    public function cate(){
        return $this->belongsTo('Cate','cateid','id');
    }
    protected $table = 't_carmessage';
    use SoftDelete;
    protected static $deleteTime ='delete_time';
}
