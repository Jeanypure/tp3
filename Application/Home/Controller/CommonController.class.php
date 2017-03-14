<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class CommonController extends ParentController
{


    public function __construct($check=false)
    {
        parent::__construct($check);

    }

    //生成验证码
    public function create_vcode(){
        $config=array(
            'fontSize'    =>    30,              // 验证码字体大小
            'length'      =>    4,               // 验证码位数
            'useNoise'    =>   true,              // 关闭验证码杂点
            'bg'          =>    array(255, 255, 255),//验证码背景颜色为白色
            'useCurve'    =>    false, //不使用混淆曲线
            'fontttf'     => '6.ttf', //使用6号字体
        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }

    //验证验证码
    function check_verify($code, $id = ''){
        $verify = new \Think\Verify();
        return $verify->check($code, $id);
    }






}