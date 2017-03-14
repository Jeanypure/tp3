<?php
namespace Demo\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class IndexController extends Controller
{

//    public function __construct($check=true){
//        parent::__construct($check);
//    }

    //主方法
    public function index()
    {
        $part = $_GET['part'];
        echo $part;
        $this->display('test');
    }

//业绩归属人1 table data
    public function salername()
    {
        $username = session('username');
        $Model =M();
        if($username=='admin'){
            $sql ="select * from Y_devNetProfit order by salemoneyrmbzn desc";
            $count = "select count(*) as total from Y_devNetProfit";
        }else{
            $sql = "select * from Y_devNetProfit where salername='$username' order by salemoneyrmbzn desc";
            $count = "select count(*) as total from Y_devNetProfit where salername='$username'";
        }
        $res = $Model->query($sql);
        $countnum = $Model->query($count);
        $arr['total'] = $countnum[0]['total'];
        $arr['rows'] =$res;
     echo    json_encode($arr);

    }

//业绩归属人2的表数据
    public function SalerName2(){

        $username = session('username');

        $Model =M();
        if($username=='admin'){
            $sql ="select * from Y_devNetProfit order by salemoneyrmbzn desc";
            $count = "select count(*) as total from Y_devNetProfit";
        }else{
            $sql ="select * from Y_devNetProfit where salername2='$username' order by salemoneyrmbzn desc";
            $count = "select count(*) as total from Y_devNetProfit where salername2='$username'";
        }

        $res =$Model->query($sql);
        $cum = $Model->query($count);
        $arr['total'] = $cum[0]['total'];
        $arr['rows'] = $res;

        echo    json_encode($arr);
    }

}