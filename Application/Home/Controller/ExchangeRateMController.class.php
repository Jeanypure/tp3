<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-03-04
 * Time: 11:50
 */

namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class ExchangeRateMController extends Controller
{
    public function index(){

        $data['SaleRate'] = I('post.SaleRate');
        $data['DevRate'] = I('post.DevRate');
        $Model = M();
        if(isset($data['SaleRate'])&&isset($data['DevRate'])){
            echo "both all not null";
            $sql ="update Y_RateManagement SET SalerRate='$data[SaleRate]',DevRate='$data[DevRate]'";
            $res = $Model->execute($sql);
        }elseif(empty($data['SaleRate'])&&empty($data['DevRate'])){
            echo "SaleRate is not null";
            $sql ="update Y_RateManagement SET DevRate='$data[SaleRate]'";
            $res = $Model->execute($sql);
        }elseif(isset($data['DevRate'])&&empty($data['SaleRate'])){
            echo "DevRate is not null";
            $sql ="update Y_RateManagement SET DevRate=' $data[DevRate]'";
            $res = $Model->execute($sql);
        }
        if(isset($res)){
            echo '更新成功';
        }
    }

    //把表中的汇率查出来到placehoder
    public function as_rate(){
        $Model = M();
        $rate =$Model->query('select * from Y_Ratemanagement') ;
        echo json_encode($rate,true);
    }

    //更新销售汇率
    public function update_salerrate(){

        if(IS_POST){
            $data['SalerRate'] = I('post.salerrate');
            $Model = M();
            $sql ="update Y_RateManagement SET salerRate='$data[SalerRate]'";
            $res = $Model->execute($sql);
            if(isset($res)){
                echo '更新销售汇率成功！';
            }
        }


    }


    //更新开发汇率
    public function update_devrate(){
        $data['DevRate'] = I('post.devrate');
        $Model = M();
        $sql ="update Y_RateManagement SET DevRate='$data[DevRate]'";
        $res = $Model->execute($sql);
        if(isset($res)){
            echo '更新开发汇率成功！';
        }

    }



}