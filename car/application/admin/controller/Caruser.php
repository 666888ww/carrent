<?php

namespace app\admin\controller;

use think\Controller;
use app\common\validate\Caruseradd as UserValidate;
use app\common\model\User as UserModel;
class Caruser extends Controller
{
    //会员信息的修改
    public function caruser(){
        $data = UserModel::paginate(3);
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        return view();
    }
    public function caruseradd(){
        return view();
    }
    //增加用户
    public function userinsert(){
        $data = input('post.');
        $val = new UserValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new UserModel($data);
        $ret = $user->allowField(true)->save();
        if($ret){
            $this->success('增加用户成功','user/caruser');
        }else{
            $this->error('增加用户失败');
        }
    }
   public function caruseredit(){
       $id = input('get.id');
       $data = UserModel::get($id);
       $this->assign('data',$data);
       return view();
   }
    public function update()
    {
        $data = input('post.');
        $id = input('post.id');
        $val = new UserValidate();
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit;
        }
        $user = new UserModel();
        $ret = $user->allowField(true)->save($data, ['id' => $id]);
        if ($ret) {
            $this->success('会员信息编辑成功', 'caruser/caruser');
        } else {
            $this->error('会员信息编辑失败');
        }
    }
        //删除车辆信息
        public function delete(){
            //通过软删除，删除数据
            // $id = input('get.id');
            // $ret = AddModel::destroy($id);
            //if($ret){
            //  $this->success('删除车辆信息成功','user/carlist');
            /// }else{
            // $this->error('删除车辆信息失败');
            // }
            //真正删除车辆信息
            $id = input('get.id');
            $ret = UserModel::destroy($id,true);
            if($ret){
                $this->success('删除用户信息成功','caruser/caruser');
            }else{
                $this->error('删除用户信息失败');
            }
        }
}
