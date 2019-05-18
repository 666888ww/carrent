<?php

namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Validate;

class Index extends Controller
{
    public function login()
    {

        return view();
    }

    public function check()
    {
        $data = input('post.');
        $validate = Validate::make([
            'name|用户名' => 'require|min:3',
            'pass|密码' => 'require|min:6',
        ]);
        $status = $validate->check($data);

        if ($status) {
            $user = db('t_admin')->where('name',$data
           ['name'])->where('pass',$data['pass'])->find();
           if($user){
                    //在session中存入用户id和name
                    //session('id',$user['id']);
                    //session('name',$user['name']);
                     return $this->success('登录成功','user/index');
           }else{
                 return $this->error('用户名或密码错误');
           }
        } else {
                return $this->error($validate->getError());
        }

    }

}
