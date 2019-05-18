<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/12
 * Time: 18:31
 */

namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;

class Infor extends Model
{
    protected $table = 't_infor';
    use SoftDelete;
    protected static $deleteTime ='delete_time';
}