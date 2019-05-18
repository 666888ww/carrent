<?php

namespace app\index\controller;
use app\common\model\Carmessage as AddModel;
class Another extends Base
{
    //热销车辆，特价车辆，全部车辆
    public function another()
    {
        $where = [];
        if (input('?id')) {
            $where = [
                'cateid' => input('id')

            ];
        }
        $carmessage = model('Carmessage')->where($where)->order('create_time', 'desc')->paginate(6);
        $viewData = [
            'carmessage' => $carmessage
        ];
        $this->view->share($viewData);
        return view();
    }
}
