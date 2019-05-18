<?php

namespace app\index\controller;

use think\Controller;
use app\common\model\Carback as OrdeModel;
use app\common\validate\Comment as UserValidate;
use app\common\model\ Carmessage as UserModel;
use app\common\validate\Orde as OrdeValidate;
use app\common\validate\Time;
use app\common\model\ Orde as OrModel;
use app\common\model\Comment ;
class Carrent extends Controller
{
    //车辆信息展示
    public function carremt(){

        $carmessage = model('Carmessage')->find(input('id'));
        $viewData = [
            'carmessage'=>$carmessage
        ];
        $this->view->share($viewData);
        $comment = model('Comment')->order('create_time','desc')->paginate(6);
        $viewData = [
            'comment'=>$comment
        ];
        $this->view->share($viewData);
        return view();
    }
    public function update()
    {
        $id = input('post.id');
        $data = [
            'starttime'=>input('post.starttime'),
            'overtime'=>input('post.overtime'),
        ];

        $val = new Time();
        if (!$val->check($data)){
            $this->error($val->getError());
            exit;
        }

        $user = new UserModel();
        $ret = $user->allowField(true)->save($data, ['id' => $id]);
        if ($ret) {
            $this->success('', "carrent/carremt");
        } else {
            $this->error('时间选择失败');
        }
    }
  //车辆信息收集，订单信息
    public function edit(){
        $id = input('get.id');
        $data = UserModel::get($id);
        $this->assign('data',$data);
        return view();
    }

    public function insert()
    {
        $data = [
            'username'=>input('post.username'),
            'carname'=>input('post.carname'),
            'priceid'=>input('post.priceid'),
            'rentid'=>input('post.rentid'),
            'starttime'=>input('post.starttime'),
            'overtime'=>input('post.overtime'),
        ];
        $val = new OrdeValidate();
        if (!$val->check($data)) {
            $this->error($val->getError());
            exit;
        }
        $user = new OrModel($data );
        $ret = $user->allowField(true)->save();
        if ($ret) {
            $this->success('订单提交成功', 'oneself/selforder');
        } else {
            $this->error('订单提交失败');
        }
    }
}
