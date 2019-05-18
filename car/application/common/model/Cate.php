<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/14
 * Time: 14:57
 */

namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;

class Cate extends Model
{
    protected $table = 't_cate';
    use SoftDelete;
    protected static $deleteTime ='delete_time';
}