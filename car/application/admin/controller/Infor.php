<?php

namespace app\admin\controller;

use think\Controller;
use app\common\validate\Infor as InforValidate;
use app\common\model\Infor as InforModel;
class Infor extends Controller
{
    //新闻管理
    public function inforlist(){
        $data = InforModel::paginate(3);
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        return view();
    }
    public function inforadd(){
        return view();
    }
    public function inforinsert(){

        $data = input('post.');
        $val = new InforValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new InforModel($data);
        $ret = $user->allowField(true)->save();
        if($ret){
            $this->success('新增新闻成功','infor/inforlist');
        }else{
            $this->error('新增新闻失败');
        }
    }
    public function inforedit(){
        $id = input('get.id');
        $data = InforModel::get($id);
        $this->assign('data',$data);
        return view();

    }

    public function inforupdate(){
        $data = input('post.');
        $id = input('post.id');
        $val = new InforValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new InforModel();
        $ret = $user->allowField(true)->save($data,['id'=>$id]);
        if($ret){
            $this->success('新闻信息编辑成功','infor/inforlist');
        }else{
            $this->error('新闻信息编辑失败');
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
        $ret = InforModel::destroy($id,true);
        if($ret){
            $this->success('删除新闻信息成功','infor/inforlist');
        }else{
            $this->error('删除新闻信息失败');
        }
    }
}
