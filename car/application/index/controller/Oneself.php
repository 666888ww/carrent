<?php

namespace app\index\controller;

use app\common\model\User as UserModel;
use app\common\model\User;
use app\common\model\Orde;
use app\common\validate\Orde as OrdeValidate;
use app\common\model\Orde as OrdeModel;

class Oneself extends Base
{

    //个人中心页面设置
    public function oneself(){
        //$user = model('User')->find(input('id'));
        //$viewData = [
          //  'user'=>$user
        //];
        //$this->view->share($viewData);
       // $order = model('Orde')->with('carmessage')->order('create_time','desc')->find();
        //$viewData = [
           // 'order'=>$order
       // ];
        //$this->view->share($viewData);
        return view();
    }
    public function selfmessage(){
        $id = input('get.id');
        $data = UserModel::get($id);
        $this->assign('data',$data);
        return view();
    }
    public function passupdate(){
        if(request()->isPost())
        {
            $res =(new User())->pass(input('post.'));
            if($res['valid'])
            {
                $this->success($res['msg'],'index/oneself/oneself');exit;
            }else{
                $this->error($res['msg']);exit;
            }
        }
        return view();
    }
    public function selforder(){
        $data= model('Orde')->where('username',session('name'))->order('create_time','desc')->paginate(5);
        $this->assign('data',$data);
        return view();
    }
    public function payment(){
        $id = input('get.id');
        $user = new Orde;
        $ret = $user->save([
            'status'  =>1,
        ],['id' => $id]);
        if ($ret) {
            $this->success('支付成功', 'oneself/selforder');
        } else {
            $this->error('支付失败');
        }
        return view();
    }
    public function delete()
    {
        //通过软删除，删除数据
        $id = input('get.id');
        $ret = OrdeModel::destroy($id);
        if ($ret) {
            $this->success('删除订单成功', 'oneself/selforder');
        } else {
            $this->error('删除订单失败');
        }
    }
}
