<?php

namespace app\index\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
    //使用共享视图
    public function initialize()
    {
        $cates = model('Cate')->select();
        $viewData = [
            'cates'=>$cates
        ];
        $this->view->share($viewData);
    }

}
