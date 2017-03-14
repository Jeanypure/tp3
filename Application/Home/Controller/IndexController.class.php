<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends ParentController{

    public function __construct($check=true){
        parent::__construct($check);
    }

    //主方法
    public function index(){
        redirect('/home/users/login');
    }


    /*
    *登陆页面
     *
     */
    public function home(){
        $admin=session('session_name');
        $this->assign('admin',$admin);
        $this->render('管理中心');
        $this->display('home');
    }



    public function goodslist(){
        $this->Page('goods',1);
        $this->render('商品列表');
        $this->display('goodslist');
    }

    public function goodslistAjax(){
        $data=$this->PageAjax('goods',3);
        echo json_encode($data);
    }

    public function goods_add(){

        $this->display('goods_add');
    }

    //分页
    public function Page($table,$line){
        $Model = M($table); // 实例化User对象
        $count = $Model->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,$line);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Model->limit($Page->firstRow.','.$Page->listRows)->select();
        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
    }

    public function PageAjax($table,$line){
        $Model = M($table); // 实例化User对象
        $count = $Model->count();// 查询满足要求的总记录数
        $Page = new \Think\Page($count,$line);// 实例化分页类 传入总记录数和每页显示的记录数(25)
        $show = $Page->show();// 分页显示输出
        // 进行分页数据查询 注意limit方法的参数要使用Page类的属性
        $list = $Model->limit($Page->firstRow.','.$Page->listRows)->select();

        return array('page'=>$show,'list' =>$list);
    }




    public function get_goodsinfo(){
        $p=$_POST['page'];
        $Model=M('goods');
        $list=$Model->limit(($p-1)*1,1)->select();
        echo json_encode($list);
    }



    public function demo(){
        if(I('path.2')){
            $now=I('path.2');
        }else{ $now='1';}

        $page=$this->showpage(7,$now);
//        var_dump($page);exit;
//            <a href="/home/index/demo/{$vo.num}" class="{$vo.class}">{$vo.num}</a>
        $show='';
        foreach ($page as $key =>$value) {
            $html='<a href="/home/index/demo/'.$value['num'].'" class="'.$value['class'].'">'.$value['show'].'</a>';
            if($value['class']=='current'){
            $html='<span class="current laypage_curr">'.$value['num'].'</span>';
            }
            $show.=$html;
        }
        $this->assign('page2',$show);
        $this->assign('page',$page);
        $this->display('Demo:test');
    }

    public function showpage($pagenum,$current=1){
        $page_arr=array();
        $show_page='9'; //一组显示多少页   7  1-7   2-8
        $center_page=($show_page+1)/2+1; //一组中中心页 1-7时:3  2-8:4  7-13:10
        $side_page=($show_page-1)/2; //中心页左右显示几页 1 - 5 6 9-11
        $next_num=">>";
        $last_num="<<";
        $end_num="最后一页";
        $start_num="第一页";
        if($pagenum<=$show_page){
//            if($current>= ($pagenum+1)){

            for($i=1;$i<=$pagenum;$i++){
                if($current!=1){
                    $page_arr[0]['class']='last';
                    $page_arr[0]['show']=$last_num;
                }
                $page_arr[$i]['num']=$i;
                $page_arr[$i]['class']='num';
                $page_arr[$i]['show']=$i;
                if($current==$i){
                    $page_arr[$i]['class']='current';

                }
                if($i==$pagenum-1){
                    $page_arr[$i]['num']=$current+1;
                    $page_arr[$i]['class']='next';
                    $page_arr[$i]['show']=$next_num;
                }
                if($i==$pagenum){
                    $page_arr[$i]['class']='end';
                    $page_arr[$i]['show']=$end_num;
                }
            }
//            $page_arr['']

        }
//        var_dump($page_arr);exit;

        if($pagenum>$show_page){
            if($current>=$center_page){
                $start=$current-$side_page;
                $end=$current+$side_page;
                if($end>$pagenum){
                    $end=$pagenum;
                }
            }else{
                $start=1;
                $end=$show_page;
                for($i=$start;$i<=$end;$i++){
                    $page_arr[$i]['num']=$i;
                    $page_arr[$i]['class']='num';
                    if($current==$i){
                        $page_arr[$i]['class']='current';
                    }
                }

            }
//            for($i=$start;$i<=$end;$i++){
//                $page_arr[$i]['num']=$i;
//                $page_arr[$i]['class']='num';
//                if($current==$i){
//                    $page_arr[$i]['class']='current';
//                }
//            }
        }
        return $page_arr;
    }






}