<?php

namespace app\index\controller;
use app\common\model\Carmessage as AddModel;
class Index extends Base
{  //前台首页
    public function first(){
        $carmessage = model('Carmessage')->order('create_time','desc')->paginate(6);
        $viewData = [
            'carmessage'=>$carmessage
        ];
        $this->view->share($viewData);
        return view();
    }

}
