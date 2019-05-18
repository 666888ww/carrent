<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/24
 * Time: 22:59
 */

namespace app\common\model;

use think\model\concern\SoftDelete;
use think\Model;

class Carback extends Model
{
    protected $table = 't_carback';
    use SoftDelete;
    protected static $deleteTime ='delete_time';
    //关联订单
    public function orde(){
        return $this->belongsTo('Orde','ordeid','id');
    }

}