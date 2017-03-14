<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class UlistController extends ParentController
{

//    public function __construct($check = true)
//    {
//        parent::__construct($check);
//    }

//显示用户列表
    public function index()
    {
       $Model = M();
       $result =  $Model->query('select username from Y_user');
       $this->assign('result',$result);
//     $this->show(123);
       $this->display('ulist');
    }



    //添加用户
    public function user_add(){
        var_dump($_POST);die;
       $data['username'] = I(post.username);

    }
}