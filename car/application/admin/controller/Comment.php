<?php

namespace app\admin\controller;

use app\common\validate\Caradd;
use think\Controller;
use app\common\model\Comment as CommentModel;
class Comment extends Controller
{
    //评论列表
    public function commentlist(){
        $comment = model('Comment')->with('carmessage,user')->order('create_time','desc')->paginate(3);
        $viewData = [
            'comment'=>$comment
        ];
        $this->assign($viewData);
        $data = CommentModel::paginate(3);
        $page = $data->render();
        $this->assign('page',$page);
        return view();
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
        $ret = CommentModel::destroy($id,true);
        if($ret){
            $this->success('删除评论信息成功','comment/commentlist');
        }else{
            $this->error('删除评论信息失败');
        }
    }

}
