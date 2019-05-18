<?php

namespace app\admin\controller;

use think\Controller;
use app\common\validate\Caradd as AddValidate;
use app\common\model\Carmessage as AddModel;

class User extends Controller
{
    //后台首页
    public function index(){
        return view();
    }
    //
    public function carlist(){
        //$data = AddModel::all();
        //$this->assign('data',$data);
        //将数据库中的内容渲染到模板
        $order = model('carmessage')->with('cate')->order('create_time','desc')->paginate(3);
        $viewData = [
            'order'=>$order,
        ];
        $this->assign($viewData);
        $data = AddModel::paginate(3);
        $page = $data->render();
        $this->assign('data',$data);
        $this->assign('page',$page);
        return view();
    }
    public function caradd(){
        $cate = model('Cate')->select();
        $viewData = [
            'cate'=>$cate
        ];
        $this->assign($viewData);
        return view();
    }
//新增车辆信息
   public function insert(){

        $data = [
            'name'=>input('post.name'),
            'cateid'=>input('post.cateid',0),
            'price'=>input('post.price'),
            'rent'=>input('post.rent'),
            'sale'=>input('post.sale'),
            'status'=>input('post.status'),
            'type'=>input('post.type'),
            'cardespertion'=>input('post.cardespertion'),
            'carimage'=>input('post.carimage'),
            'starttimeid'=>input('post.starttimeid'),
            'overtimeid'=>input('post.overtimeid'),
        ];
       $val = new AddValidate();
       if(!$val->check($data)){
           $this->error($val->getError());
           exit;
       }
        $user = new AddModel($data);
        $ret = $user->allowField(true)->save();
        if($ret){
            $this->success('新增车辆信息成功','user/carlist');
        }else{
            $this->error('新增车辆信息失败');
        }


   }
   //编辑车辆信息
  public function edit(){
        $id = input('get.id');
        $data = AddModel::get($id);
        $this->assign('data',$data);
      $cate = model('Cate')->select();
      $viewData = [
          'cate'=>$cate
      ];
      $this->assign($viewData);
        return view();
  }
  public function update(){
      $data = [
          'name'=>input('post.name'),
          'cateid'=>input('post.cateid',0),
          'price'=>input('post.price'),
          'rent'=>input('post.rent'),
          'sale'=>input('post.sale'),
          'status'=>input('post.status'),
          'type'=>input('post.type'),
          'cardespertion'=>input('post.cardespertion'),
          'carimage'=>input('post.carimage'),
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
          $this->success('车辆信息编辑成功','user/carlist');
      }else{
          $this->error('车辆信息编辑失败');
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
         $this->success('删除车辆信息成功','user/carlist');
         }else{
         $this->error('删除车辆信息失败');
         }
    }

}
