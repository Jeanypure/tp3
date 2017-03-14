<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class UsersController extends ParentController {

//    public function __construct($check=true){
//        parent::__construct($check);
//    }

    /*相对路径 跳转到登陆页面*/
    public function index()
    {
        redirect('./login');
    }

    /* 渲染登陆页面
     * 其中包含注册页面
     */
    public function login()
    {
        $this->render('用户登陆');
        $this->display('Index:login');
    }


    /* 执行登陆功能
     * 获取post传值->验证验证码->确认用户存在->检测密码是否相符->执行登陆或返回失败
     */
    public function do_login()
    {
        if(IS_POST){
            $postdata['username'] = $_POST['username'];
            $postdata['password'] = $_POST['password'];
            session('username',$postdata['username']);
            session('password',$postdata['password']);
        }else{
            $postdata['username'] = session('username');
            $postdata['password'] = session('password');
        }

        $Model=M('user');
            $is_registered=$Model->where("username='$postdata[username]'")->find();

            if(!empty($is_registered)){
                if($is_registered['password']==$postdata['password'])
                {
                    session('session_name',$is_registered['username']);
                    $return['status']="OK";
                    $return['msg']="登陆成功";
                }else{
                    $return['status']="NO";
                    $return['msg']="密码有误";
                }
            }else{
                $return['status']="NO";
                $return['msg']="用户不存在";
            }

        if($return['status']=="OK"){
            $Model = M();
            $mres =  $Model->query("select * from Y_manger WHERE manger='$postdata[username]'");
            if($postdata['username'] == 'admin'){
                $sql = "select ss.suffix from Y_SuffixSalerman ss ORDER BY ss.suffix ";
                $result = $Model->query($sql);
                $sql2 = "select distinct salesman from Y_SuffixSalerman order by salesman asc";
                $salesman = $Model->query($sql2);
                $platfrom = $Model->query("SELECT DISTINCT pingtai from Y_suffixPingtai");
            }elseif(!empty($mres)){                                                                                             //不空则是主管,主管看部门下的所有销售员和账号,
                $result = $Model->query("SELECT ys.suffix from Y_SuffixSalerman ys left JOIN Y_manger ym 
                                     ON ym.mid=ys.mangerid
                                     WHERE manger='$postdata[username]'
                                     order by ys.suffix asc
                                     ");
                $salesman = $Model->query("SELECT DISTINCT ys.salesman from Y_SuffixSalerman ys left JOIN Y_manger ym
                                       ON ym.mid=ys.mangerid
                                       WHERE manger='$postdata[username]'
                                       order by ys.salesman asc ");
                $platfrom = $Model->query("SELECT DISTINCT sp.pingtai from Y_SuffixSalerman ys
                                      left JOIN Y_manger ym ON ym.mid=ys.mangerid
                                      left join Y_suffixPingtai sp ON ys.suffix= sp.suffix
                                      WHERE manger='$postdata[username]'");

            }else{
                $sql = "select * from Y_SuffixSalerman where salesman='$postdata[username]' order by suffix asc";
                $result = $Model->query($sql);
                $sql2 = "select distinct pingtai from Y_suffixPingtai ysp
                LEFT JOIN Y_SuffixSalerman yss ON yss.suffix=ysp.suffix
                WHERE yss.salesman='$postdata[username]' 
                 order by pingtai asc";
                $platfrom = $Model->query($sql2);

            }

            $this->assign('return',$return);
            $this->assign('username',$postdata['username']);
            $this->assign('salesman',$salesman);
            $this->assign('plat',$platfrom);
            $this->assign('result',$result);
            if(
                $postdata['username'] == '毕郑强'||
                $postdata['username'] == '韩珍'||
                $postdata['username'] == '张葵'||
                $postdata['username'] == '吴志超'||
                $postdata['username'] == '方蓓'
            ){
                $this->condition2();
            }elseif(
                $postdata['username'] == '尚显贝'||
                $postdata['username'] == '宋现中'||
                $postdata['username'] == '陈海月'||
                $postdata['username'] == '吴琼'||
                $postdata['username'] == '杨淑琳'||
                $postdata['username'] == '杨曼曼'
            ){
               $this->devlist();
            }
            elseif($postdata['username'] == 'admin'){
                $this->admincondition();
            }else{
                $this->condition();
            }
        }else{
            $return = '用户名或密码不对！！';
           $this->assign('return',$return);
           $this->display('Index:login');
        }


    }


    public function condition2(){
        $this->display('Product:listcondition2');//这个是主管可以用的 页面
    }

    public function condition(){
        $this->display('Product:listcondition');//普通用户 页面
    }

    public function admincondition(){
        $this->display('Product:admincondition'); //admin页面
    }


    //渲染开发界面

    public function devlist(){

        $this->display('Demo@Index:test');


    }



    /* 执行注销功能
     * 销毁用户session->跳转到登陆页面
     */
    public function logout(){
        session('username',null);
        redirect('/home/users/login');
    }




    /*执行用户注册功能*/
    public function do_register(){

    }




}
