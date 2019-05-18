<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/11
 * Time: 16:23
 */

namespace app\common\model;


use think\Model;
use think\model\concern\SoftDelete;
use think\Validate;

class User extends Model
{
    protected $table = 't_user';
    use SoftDelete;
    protected static $deleteTime ='delete_time';
    public function pass($data){
        $validate = new Validate([
            'pass'=>'require|min:6',
            'new_pass'=>'require|min:6'
        ],[
            'pass.require'=>'请输入原始密码',
            'pass.min'=>'密码长度不能少于6位',
            'new_pass'=>'请输入新密码',
            'new_pass.min'=>'密码长度不能少于6位',
        ]);
        if(!$validate->check($data)){
            return ['valid'=>0,'msg'=>$validate->getError()];
        }
        $userInfo = $this->where('id',session('id'))->where('pass',$data['pass'])->find();
        if(!$userInfo)
        {
            return ['valid'=>0,'msg'=>'原始密码不正确'];
        }

// save方法第二个参数为更新条件
       $res = $this->save([
            'pass'  => $data['new_pass'],

        ],[$this->pk =>session('id')]);
        if($res)
        {
            return ['valid'=>1,'msg'=>'密码修改成功'];
        }else{
              return ['valid'=>0,'msg'=>'密码修改失败'];
        }


    }
}