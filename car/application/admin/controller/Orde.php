<?php

namespace app\admin\controller;

use think\Controller;
use app\common\model\Orde as OrdeModel;
class Orde extends Controller
{
    //订单列表
    public function ordelist(){
        $order = model('Orde')->with('carmessage,user')->order('create_time','desc')->paginate(3);
        $viewData = [
            'order'=>$order,
        ];
        $this->assign($viewData);
        $data = OrdeModel::paginate(3);
        $page = $data->render();
        $this->assign('page',$page);
        return view();
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
        $ret = OrdeModel::destroy($id,true);
        if($ret){
            $this->success('删除订单信息成功','orde/ordelist');
        }else{
            $this->error('删除订单信息失败');
        }
    }
}
