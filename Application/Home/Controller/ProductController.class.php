<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class ProductController extends ParentController
{

//    public function __construct($check = true)
//    {
//        parent::__construct($check);
//    }

    public function index(){
        $data['pingtai'] = $_POST['pingtai'];
        $data['DateFlag'] = $_POST['DateFlag'];
        $data['BeginDate'] = trim($_POST['BeginDate']);
        $data['EndDate'] = trim($_POST['EndDate']);
        $data['saler'] = implode(',',array_unique($_POST['saler']));
        $data['suffix'] = implode(',',$_POST['suffix']);

        $data['StoreName'] = implode(',',$_POST['StoreName']);


        $username = session('username');
        $Model = M();
        $SalerRate = $Model->query('select salerrate from Y_Ratemanagement'); //查到salerrate

        $data['ExchangeRate'] = $SalerRate[0]['salerrate'];



        if($username=='毕郑强'||$username=='韩珍'||$username=='张葵'||$username=='吴志超'||$username=='方蓓'){
            if(empty($data['suffix'])){
                $sql = "select ss.suffix from Y_SuffixSalerman ss 
            LEFT JOIN Y_suffixPingtai sp on sp.suffix= ss.suffix
            WHERE mangerid in (SELECT mid FROM Y_manger WHERE manger='$username')
           -- AND isnull('$data[pingtai]','') or pingtai ='$data[pingtai]'";
                $Model = M();
                $result = $Model->query($sql);

                foreach($result as $val){
                    foreach($val as $v)
                        $res[] =$v;
                }
                $data['suffix'] = implode(',',$res);
            }

            if(!empty($data['suffix'])){
                $data['suffix'] = "''$data[suffix] ''"  ;
            }
            if(!empty($data['saler'])){
                $data['saler'] = "''$data[saler] ''"  ;
            }
            if(!empty($data['StoreName'])){
                $data['StoreName'] = "''$data[StoreName] ''"  ;
            }

            $tsql_callSP = "EXEC Z_P_FinancialProfit '$data[pingtai]','$data[DateFlag]','$data[BeginDate]','$data[EndDate]','$data[suffix]','$data[saler]','$data[StoreName]',0,'$data[ExchangeRate]'";


            $result = $Model->query($tsql_callSP);

            session('result',$result);
            $this->assign('result',$result);
            $this->display('list');

        }elseif($username=='admin'){
            if(!empty($data['suffix'])){
                $data['suffix'] = "''$data[suffix] ''"  ;
            }
            if(!empty($data['saler'])){
                $data['saler'] = "''$data[saler] ''"  ;
            }
            if(!empty($data['StoreName'])){
                $data['StoreName'] = "''$data[StoreName] ''"  ;
            }

            $tsql_callSP = "EXEC Z_P_FinancialProfit '$data[pingtai]','$data[DateFlag]','$data[BeginDate]','$data[EndDate]','$data[suffix]','$data[saler]','$data[StoreName]',0,'$data[ExchangeRate]'";


            $result = $Model->query($tsql_callSP);

            session('result',$result);
            $this->assign('result',$result);
            $this->display('list');
        }else{
            if(!empty($data['suffix'])){
                $data['suffix'] = "''$data[suffix] ''"  ;
            }else{
              $res = $Model->query("select * from Y_SuffixSalerman WHERE salesman= '$username' ");
              foreach($res as $val){
                  $arr_suffix[] = $val['suffix'];
              }
                 $str_suffix = implode(',',$arr_suffix);
                $data['suffix'] = "''$str_suffix''";

            }
            if(!empty($data['saler'])){
                $data['saler'] = "''$data[saler] ''"  ;
            }
            if(!empty($data['StoreName'])){
                $data['StoreName'] = "''$data[StoreName] ''"  ;
            }

            $tsql_callSP = "EXEC Z_P_FinancialProfit '$data[pingtai]','$data[DateFlag]','$data[BeginDate]','$data[EndDate]','$data[suffix]','$data[saler]','$data[StoreName]',0,'$data[ExchangeRate]'";

            $Model = M();
            $result = $Model->query($tsql_callSP);
            session('result',$result);
            $this->assign('result',$result);
            $this->display('list');

        }


    }





    //数据导出
    public function export(){
        $arr = session('result');
        session('result',null);
        foreach ($arr as $field=>$v){
            if($field == 'pingtai'){
                $headArr[]='平台';
            }
            if($field == 'suffix'){
                $headArr[]='账号';
            }
            if($field == 'salesman'){
                $headArr[]='销售员';
            }
            if($field == 'salemoney'){
                $headArr[]='成交价$';
            }
            if($field == 'salemoneyzn'){
                $headArr[]='成交价￥';
            }
            if($field == 'ebayfeeebay'){
                $headArr[]='eBay成交费$';
            }
            if($field == 'ebayfeeznebay'){
                $headArr[]='eBay成交费￥';
            }
            if($field == 'ppfee'){
                $headArr[]='Paypal成交费$';
            }
            if($field == 'ppfeezn'){
                $headArr[]='Paypal成交费￥';
            }
            if($field == 'costmoney'){
                $headArr[]='商品成本￥';
            }
            if($field == 'expressfare'){
                $headArr[]='运费成本￥';
            }
            if($field == 'inpackagemoney'){
                $headArr[]='包装成本￥';
            }
            if($field == 'storename'){
                $headArr[]='发货仓库';
            }
            if($field == 'refund'){
                $headArr[]='退款金额￥';
            }
            if($field == 'diefeeZn'){
                $headArr[]='死库处理￥';
            }
            if($field == 'insertionFee'){
                $headArr[]='店铺杂费￥';
            }
            if($field == 'grossprofit'){
                $headArr[]='毛利￥';
            }
            if($field == 'grossprofitrate'){
                $headArr[]='毛利率%';
            }

        }
        $filename="毛利润报表";

        $this->getExcel_wlFee($filename,$headArr,$arr);
    }

    public  function getExcel_wlFee($fileName,$headArr,$data){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能import导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();

        $objProps = $objPHPExcel->getProperties();
        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();
//        print_r($data);exit;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }
        $fileName = iconv("utf-8", "gb2312", $fileName);

        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename='$fileName'");
        header('Cache-Control: max-age=0');
        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }



    //渲染文件上传页面
    public function showUploadForm(){
        $this->display('file');
    }
    //excel 文件导入
     public function upload(){
        if (IS_POST) {
            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('xlsx', 'xls');// 设置附件上传类型
            $upload->savePath = './Uploads/'; // 设置附件上传目录
            $upload->replace = true; // 覆盖文件
            // 单文件上传
            $info = $upload->uploadOne($_FILES['file']);
            if(!$info) {
                // 上传错误提示错误信息
                $this->show($upload->getError());
            }else{
                // 上传成功 获取上传文件信息
                $file = $info['savepath'].$info['savename'];
                $this->import($file);
                $txt = file_get_contents('Mylogs/fare_log.txt');
                $this->show(nl2br($txt,'utf-8'),'text/html');
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
        $extension=strtolower(substr(strrchr($file,"."),1));

        if( $extension =='xlsx' )
        {

            $reader = \PHPExcel_IOFactory::createReader('Excel2007');
        }
        else
        {
            $reader = \PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)

        }
        $PHPExcel = $reader->load($file); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数
//        卖家简称	退款金额	死库处理成本	店铺杂费 suffix	refund	deadAmount	shopelsefee

         $A1 = $sheet->getCell(A1)->getValue();
        if($A1=='卖家简称'){
            $A1='suffix';
        }
        $B1 = $sheet->getCell(B1)->getValue();
        if($B1=='退款金额'){
            $B1='refund';
        }


        /** 循环读取每个单元格的数据 */
        for ($row = 1; $row <= $highestRow; $row++){//行数是以第1行开始
            for ($column = 'A'; $column <= $highestColumm; $column++) {//列数是以A列开始
                $dataset[]= $sheet->getCell($column.$row)->getValue();
//                echo $column.$row.":".$sheet->getCell($column.$row)->getValue()."<br />";
            }

        }
        unset($dataset);


        for ($i=2; $i<=$highestRow; ++$i) {
            $data['suffix'] = $sheet->getCell("A".$i)->getValue();
            $data['refund'] = $sheet->getCell("B".$i)->getValue();

            $Model = M();
            $sql = "select * from Y_suffixFee WHERE suffix='$data[suffix]'";
            $res = $Model->query($sql);

            if(!$res){

                $result = M('suffixfee')->add($data);                                                               //不存在做插入
            }else{

                $result = M('suffixfee')->where("suffix='$data[$A1]'")->save($data);                              //表中已存在做更新
            }

            if($result){

                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
//                我就用的$this->success('修改成功！',U('index',array('p'=>$_POST['p'])));
                $this->success('导入成功', '/home/Users/do_login');
            } else {
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('导入失败');
            }
        }

    }

    public  function  ulist(){
         $this->redirect('home/Ulist/index');
    }

    //渲染死库费用上传页面 线下清仓
    public function diebasefee(){
        $this->display('diebasefee');

    }

    public function upload_diebase(){

        if (IS_POST) {

            $upload = new \Think\Upload();// 实例化上传类
            $upload->maxSize = 3145728 ;// 设置附件上传大小
            $upload->exts = array('xlsx', 'xls');// 设置附件上传类型
            $upload->savePath = './Uploads/'; // 设置附件上传目录
            $upload->replace = true; // 覆盖文件
            // 单文件上传
            $info = $upload->uploadOne($_FILES['file']);
//            dump($info);
            if(!$info) {
                // 上传错误提示错误信息
                $this->show($upload->getError());
            }else{
                // 上传成功 获取上传文件信息
                $filediebase = $info['savepath'].$info['savename'];
                $this->import_diebase($filediebase);
                $txt = file_get_contents('Mylogs/fare_log.txt');
                $this->show(nl2br($txt,'utf-8'),'text/html');
                exit;
            }
        }
        $this->show('success！');

    }

    public function  import_diebase($filediebase){
        error_reporting(E_ALL);
        date_default_timezone_set('Asia/ShangHai');
        /** PHPExcel_IOFactory */
        import('ORG.Util.PHPExcel');//手动加载第三方插件
        import("ORG.Util.PHPExcel.IOFactory.php");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.Writer.Excel2007");

        // Check prerequisites
        $filediebase = './Uploads/' . $filediebase;//创建上面文件的文件夹

        if (!file_exists($filediebase)) { //检查目或文件是否存在
            $this->show('文件不存在');
            exit;
        }
        $extension=strtolower(substr(strrchr($filediebase,"."),1));

        if( $extension =='xlsx' )
        {

            $reader = \PHPExcel_IOFactory::createReader('Excel2007');
        }
        else
        {
            $reader = \PHPExcel_IOFactory::createReader('Excel5'); //设置以Excel5格式(Excel97-2003工作簿)

        }
        $PHPExcel = $reader->load($filediebase); // 载入excel文件
        $sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
        $highestRow = $sheet->getHighestRow(); // 取得总行数
        $highestColumm = $sheet->getHighestColumn(); // 取得总列数


        $A1 = $sheet->getCell(A1)->getValue();
        if($A1=='部门'){
            $A1='plat';
        }
        $B1 = $sheet->getCell(B1)->getValue();
        if($B1=='卖家简称'){
            $B1='suffx';
        }
        $C1 = $sheet->getCell(C1)->getValue();
        if($B1=='线下清仓分摊金额'){
            $B1='diefeeZn';
        }

        for ($i=2; $i<=$highestRow; ++$i) {
            $data['plat'] = $sheet->getCell("A".$i)->getValue();
            $data['suffix'] = $sheet->getCell("B".$i)->getValue();
            $data['diefeeZn'] = $sheet->getCell("C".$i)->getValue();

            $Model = M();
            $sql = "select * from Y_offlineclearn WHERE suffix='$data[suffix]'";
            $res = $Model->query($sql);


            if(!$res){

                $result = M('offlineclearn')->add($data);                                                               //不存在做插入
            }else{

                $result = M('offlineclearn')->where("suffix='$data[suffix]'")->save($data);                              //表中已存在做更新
            }
//            echo  M('offlineclearn')->getLastSql();
//            dump($result);die;
            if($result){
                //设置成功后跳转页面的地址，默认的返回页面是$_SERVER['HTTP_REFERER']
                $this->success('导入成功', '/home/Users/do_login');
            } else {
                //错误页面的默认跳转页面是返回前一页，通常不需要设置
                $this->error('导入失败');
            }
        }
    }











}