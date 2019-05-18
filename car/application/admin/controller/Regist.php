<?php

namespace app\admin\controller;

use think\Controller;
use think\Validate;

class Regist extends Controller
{
    //注册
    public function regist(){
        return view();
    }
    public function check(){
        $data = input('post.');
        $Validate = Validate::make([
            'name|用户名'=>'require|min:3',
            'nickname|昵称'=>'require',
            'pass|密码'=>'require|min:6|confirm:repass',
            'email|邮箱'=>'require',
        ]);
        $status = $Validate->check($data);
        if($status){
               $result =db('t_admin')->insert([
                   'name'=>$data['name'],
                   'nickname'=>$data['nickname'],
                   'pass'=>$data['pass'],
                   'repass'=>$data['repass'],
               ]);
               if($result){
                   return $this->success('注册成功','index/login');
               }else{
                   return $this->error('注册失败');
               }

        }else{
              return $this->error($Validate->getError());
        }
    }
}
