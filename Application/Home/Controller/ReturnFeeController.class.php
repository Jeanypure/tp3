<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-02-16
 * Time: 11:28
 */
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");

class ReturnFeeController extends ParentController
{
    public function index()
    {
        $this->display('return_fee');

    }


    //文件上传

    public function upload()
    {
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728;// 设置附件上传大小
            $upload->exts = array('xlsx', 'xls');// 设置附件上传类型
            $upload->savePath = './Uploads/'; // 设置附件上传目录
            $upload->replace = true; // 覆盖文件
            // 单文件上传

            $info = $upload->uploadOne($_FILES['files']);
            if (!$info) {
                // 上传错误提示错误信息
                $this->show($upload->getError());
            } else {
                // 上传成功 获取上传文件信息
                $file = $info['savepath'] . $info['savename'];
                $this->import($file);
                $txt = file_get_contents('Mylogs/fare_log.txt');
                $this->show(nl2br($txt, 'utf-8'), 'text/html');
                exit;
            }
        }
        $this->show('success！');
    }


    private function import($file)
    {
        error_reporting(E_ALL);
        date_default_timezone_set('Asia/ShangHai');
        /** PHPExcel_IOFactory */
        import('ORG.Util.PHPExcel');//手动加载第三方插件
        import("ORG.Util.PHPExcel.IOFactory.php");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.Writer.Excel2007");
        // Check prerequisites
        $file = './Uploads/' . $file;//创建上面文件的文件夹
        if (!file_exists($file)) { //检查目或文件是否存在
            $this->show('文件不存在');
            exit;
        }
        $extension = strtolower(substr(strrchr($file, "."), 1));

        if ($extension == 'xlsx') {

            $reader = \PHPExcel_IOFactory::createReader('Excel2007');
        } else {
            $reader = \PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)

        }
        $PHPExcel = $reader->load($file); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数

//        平台	账号	日期	退款金额
//        plat	suffix	shijian	returnfee


        $A1 = $sheet->getCell(A1)->getValue();
        if ($A1 == '平台') {
            $A1 = 'plat';
        }
        $B1 = $sheet->getCell(B1)->getValue();
        if ($B1 == '账号') {
            $B1 = 'suffix';

            $C1 = $sheet->getCell(C1)->getValue();
            if ($C1 == '日期') {
                $C1 = 'shijian';
            }

            $D1 = $sheet->getCell(D1)->getValue();
            if ($D1 == '退款金额') {
                $D1 = 'returnfee';
            }

            /** 循环读取每个单元格的数据 */
            for ($row = 1; $row <= $highestRow; $row++) {//行数是以第1行开始
                for ($column = 'A'; $column <= $highestColumm; $column++) {//列数是以A列开始
                    $dataset[] = $sheet->getCell($column . $row)->getValue();
//                echo $column.$row.":".$sheet->getCell($column.$row)->getValue()."<br />";
                }

            }
            $Model = M();
            for ($i = 2; $i <= $highestRow; ++$i) {
                $data[$A1] = $sheet->getCell("A" . $i)->getValue();
                $data[$B1] = $sheet->getCell("B" . $i)->getValue();
                $data[$C1] = $sheet->getCell("C" . $i)->getValue();
                $data[$D1] = $sheet->getCell("D" . $i)->getValue();
                $sql = "insert into Y_ReturnFee values('$data[$A1]','$data[$B1]','$data[$C1]','$data[$D1]')";

                $result  = $Model->query($sql);
                if ($result) {
                    //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                    $this->success('导入成功', 'Index/index');
                } else {
                    //错误页面的默认跳转页面是返回前一页，通常不需要设置
                    $this->error('导入失败');
                }


            }


        }


    }
}