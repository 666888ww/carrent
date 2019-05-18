<?php

namespace app\index\controller;
use app\common\model\Carback as OrdeModel;
use app\common\model\Carmessage;
use app\common\validate\Comment as UserValidate;
use app\common\model\Comment as UserModel;

class Comment extends Base
{
    //评论列表
    public function comment(){
        
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
    public function commte(){
        
$data = [
            'userid'=>input('post.userid'),
           
 'content'=>input('post.content'),
        ];
        
$val = new UserValidate();
        
if(!$val->check($data)){
            $this->error($val->getError());
            exit;
        }
       
 $user = new UserModel($data);
       
 $ret = $user->allowField(true)->save();
        
if($ret){
            $this->success('评论成功');
        }else{
            $this->error($ret);
        }
    }
}
