<?php

namespace app\admin\controller;

use think\Controller;
use app\common\validate\Carback as AddValidate;
use app\common\model\Carback as AddModel;
use app\common\model\Orde;

class Carback extends Controller
{
    //车辆归还
    public function carbacklist(){
        $order = model('Carback')->with('orde')->order('create_time','desc')->paginate(3);
        $viewData = [
            'order'=>$order,
        ];
        $this->assign($viewData);
        $data = AddModel::paginate(3);
        $page = $data->render();
        $this->assign('page',$page);
        return view();
    }
    public function carbackadd(){
       
 $carback = model('Orde')->select();
       
 $viewData = [
            'carback'=>$carback
        ];
        
$this->assign($viewData);
        return view();
    }
   
 public function insert(){
        
$data = [
            'ordeid'=>input('post.ordeid',0),
            
'beizhu'=>input('post.beizhu'),
           
 'back_time'=>input('post.back_time'),
        ];
       
 $id = input('post.ordeid',0);
        $use = new Orde;
       
 $use->save([
            'status'  =>2,
        ],['id' => $id]);
        
$val = new AddValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new AddModel($data);
        $ret = $user->allowField(true)->save();
        if($ret){
            $this->success('新增车辆归还信息成功','carback/carbacklist');
        }else{
            $this->error('新增车辆归还信息失败');
        }
    }

    public function edit(){
        $id = input('get.id');
        $data = AddModel::get($id);
        $this->assign('data',$data);
        $cate = model('Orde')->select();
        $viewData = [
            'cate'=>$cate
        ];
        $this->assign($viewData);
        return view();
    }
    public function update(){
        $data = [
            'ordeid'=>input('post.ordeid',0),
            'back_time'=>input('post.back_time'),
            'beizhu'=>input('post.beizhu'),
        ];
        $id = input('post.id');
        $val = new AddValidate();
        if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
        $user = new AddModel();
        $ret = $user->allowField(true)->save($data,['id'=>$id]);
        if($ret){
            $this->success('车辆归还信息编辑成功','carback/carbacklist');
        }else{
            $this->error('车辆归还信息编辑失败');
        }
    }
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
            $this->success('删除车辆归还信息成功','carback/carbacklist');
        }else{
            $this->error('删除车辆归还信息失败');
        }
    }

}
