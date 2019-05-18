<?php

namespace app\admin\controller;

use think\Controller;
use app\common\validate\Cateadd as AddValidate;
use app\common\model\Cate as AddModel;
class Cate extends Controller
{
    //栏目管理
    public function catelist(){
        $data = AddModel::paginate(3);
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        return view();
    }
    public function cateadd(){
        return view();
    }
    public function insert(){

        $data = input('post.');
        $val = new AddValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new AddModel($data);
        $ret = $user->allowField(true)->save();
        if($ret){
            $this->success('新增栏目信息成功','cate/catelist');
        }else{
            $this->error('新增栏目信息失败');
        }

    }
    //编辑车辆信息
    public function edit(){
        $id = input('get.id');
        $data = AddModel::get($id);
        $this->assign('data',$data);
        return view();
    }
    public function update(){
        $data = input('post.');
        $id = input('post.id');
        $val = new AddValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new AddModel();
        $ret = $user->allowField(true)->save($data,['id'=>$id]);
        if($ret){
            $this->success('栏目信息编辑成功','cate/catelist');
        }else{
            $this->error('栏目信息编辑失败');
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
        $ret = AddModel::destroy($id,true);
        if($ret){
            $this->success('删除栏目信息成功','cate/catelist');
        }else{
            $this->error('删除栏目信息失败');
        }
    }
}
