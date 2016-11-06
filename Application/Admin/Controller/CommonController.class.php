<?php

namespace Admin\Controller;
use Think\Controller;

class CommonController extends Controller {

    public function _initialize()
    {
        $this->assign('action',ACTION_NAME);
        //过滤不需要登陆的行为
        if(in_array(ACTION_NAME,array('login','logout','verify')) || in_array(CONTROLLER_NAME,array('Ueditor','Uploadify'))){
            //return;
        }else
        {
            if(!session(SESSION_PRE.'admin_id')){
                $this->error('请先登陆',U('Index/login'),1);
            }
        }
    }
}