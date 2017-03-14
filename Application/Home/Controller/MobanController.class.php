<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class MobanController extends ParentController
{


    public function __construct() {
        /*导入phpExcel核心类    注意 ：你的路径跟我不一样就不能直接复制*/
        include_once('./Excel/PHPExcel.php');
    }


    //导出退款费用模板
    public function refund_moban(){
        $this->show('导出退款费用模板!');


    }



    //导出死库模板
//    public function diebase_moban(){
//      $this->show('导出死库模板!');
//
//    }
    /**
     * [exportExcel description]
     * @param  [type] $expTitle     [导出的表名字]
     * @param  [type] $expCellName  [单元格名字]
     * @param  [type] $expTableData [表里数据]
     * @return [type]               [description]
     */
    public function exportExcel($expTitle,$expCellName,$expTableData){
        echo 666;
        $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
        $fileName = $_SESSION['GoodsCode'].date('_YmdHis');//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
//         dump($expCellName);die;
//         dump($expTableData);die;
//        vendor("PHPExcel.PHPExcel");
//        vendor("ORG.Util.PHPExcel");


         import('ORG.Util.PHPExcel');//手动加载第三方插件
        $objPHPExcel = new \PHPExcel();
        $cellName = array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM','AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ','BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM','BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ','EA','EB');


        for($i=0;$i<$cellNum;$i++){
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i].'1', $expCellName[$i][1]);
        }



        // Miscellaneous glyphs, UTF-8
        for($i=0;$i<$dataNum;$i++){
            for($j=0;$j<$cellNum;$j++){
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j].($i+2), $expTableData[$i][$expCellName[$j][0]]);
            }
        }


        header('pragma:public');
        header('Content-type:application/vnd.ms-excel;charset=utf-8;name="'.$xlsTitle.'.xls"');
        header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
        session(null);
        exit;


    }


    /**
     *
     * 导出Excel
     */
    function diebase_moban(){
        $xlsName  = "Refund";
        $xlsCell  = array(
            array('plat','Site'),
            array('suffix','Selleruserid'),
            array('diefeeZn','ListingType'),
            array('ClearanceDate','ClearanceDate')


        );
        $xlsData = array(
            array('plat','eBay'),
            array('suffix','01-buy'),
            array('diefeeZn','264.4457'),
            array('ClearanceDate','2/20/2017 00:00:00')

        );

        $this->exportExcel($xlsName,$xlsCell,$xlsData);

    }

}