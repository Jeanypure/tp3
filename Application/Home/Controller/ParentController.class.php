<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class ParentController extends Controller {


    public function __construct($check=false){
      parent::__construct();
      $this->is_login($check);
    }

    /*命名模版名称
    * @param string 模版的具体名称
    * 模版{$title}   显示为   TP - title
    */
    public function render($title = ''){
        $prefix= 'TP';
      if($title){$title= $prefix.'-'.$title;}
      $this->assign('title',$title);
    }

    /*判断是否登陆1  获取session中的用户信息或跳转登陆页面
    *
    */
    var $user;
    public function getSessionUserinfo(){
        if(session('session_name')){
            $this->user=session('session_name');
            $this->assign('name',$this->user);
        }else{
            $this->display(T('Home@Users/login'));
//            $this->display('/Home/users/login');
        }

    }

    /*判断是否登陆2
     *@param  $check  boolean   设置是否执行登陆判断功能
     */
    public function is_login($check=FALSE){
        if($check == TRUE){
            $session=$_SESSION['session_name'];
            $controller=I('path.0');
//            var_dump($session);
//            var_dump($controller);exit;
            //控制器不是users 并且没有登陆过  需要跳转到登陆页面
            if(empty($session) && strtolower($controller) !== "users" ){
                redirect('/home/users/login');
            }
        }
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
