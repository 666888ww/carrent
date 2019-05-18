<?php

namespace app\index\controller;

class Message extends Base
{
    //新闻公告
    public function message(){
        $infor = model('Infor')->select();
        $viewData = [
            'infor'=>$infor
        ];
        $this->view->share($viewData);
        return view();
    }

}
