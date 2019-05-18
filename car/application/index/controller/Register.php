<?php

namespace app\index\controller;


use think\Controller;
use app\common\validate\Caruseradd as UserValidate;
use app\common\model\User as UserModel;
use think\Db;
use think\Request;

class Register extends Controller
{
    //前台注册
    public function register()
    {
        return view();
    }
   
 public function insert(){
        $data = input('post.');
        
$val = new UserValidate();
        
if(!$val->check($data)){
            
$this->error($val->getError());
            
exit;
        }
           
 if($_FILES['image']['tmp_name']) {
           
 $file = request()->file('image');
           
 $info = $file->move('../public/static/upload/img');
           
 if ($info) {
                $date['image'] = '/static/upload/img/' . date('Ymd') . '/' . $info->getFilename();

            } 
else {
                // 上传失败获取错误信息
                echo $file->getError();
            }
       
 }

        
$user = new UserModel($data);
      
  $ret = $user->allowField(true)->save($date);
       
 if($ret){
            $this->success('用户注册成功','login/login');
       
 }
else{
            $this->error('用户注册失败');
        }
    }


}
