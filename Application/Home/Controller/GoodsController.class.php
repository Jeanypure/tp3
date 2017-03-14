<?php
namespace Home\Controller;
use Think\Controller;
header("Content-type: text/html; charset=utf-8");
class GoodsController extends ParentController {

    public function __construct($check=true)
    {
        parent::__construct($check);
    }

    public function check_sku(){
//        var_dump($_POST);EXIT;
        $goods_sku=$_POST['goods_sku'];
        $Model=M('goods');
        $is_exists=$Model->field('goods_sku')->where("`goods_sku`='".$goods_sku."'")->find();
        if(!$is_exists){
            $msg='OK';
        }else{
            $msg='NO';
        }
        echo json_encode($msg);
    }

    //上传图片
    public function upload_img(){
        // VAR_DUMP($_FILES);
        // if($_FILES){
        //    $data="上传成功";
        // }else{
        //     $data="失败";
        // }
        // .tmp

        $config = array(
            'maxSize'    =>    3145728,
            'rootPath'   =>    './', //__PUBLIC__+....
            'savePath'   =>    './Public/uploads/images/tmp/',
            'saveName'   =>    $_FIELS['upload_img']['name'],
            'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
            'autoSub'    =>    false,
            'replace'    =>    true,
//             'subName'    =>    array('date','Ymd'),
        );
        $upload = new \Think\Upload($config);// 实例化上传类

        $info   =   $upload->upload();
//        var_dump($info);exit;
//        foreach($info as $file){
//            $img_url=$file['savepath'].$file['savename'];
//        }
        $main_pic_relative=$info['upload_img']['savepath'].$info['upload_img']['savename'];
        $small_pic_relative=$this->create_thumb($info['upload_img']['savepath'],$info['upload_img']['savename']);
//         var_dump($info);exit;
        $main_pic_absoulte=ltrim($main_pic_relative,'.');
        $small_pic_absoulte=ltrim($small_pic_relative,'.');
        $data['small_pic']=$small_pic_absoulte;
        $data['main_pic']=$main_pic_absoulte;
        echo json_encode($data);
    }

    //根据上述岸的图片生成缩略图
    public function create_thumb($filepath,$filename){
        $image = new \Think\Image();
        $image->open($filepath.$filename);
        // 按照原图的比例生成一个最大为150*150的缩略图并保存为thumb.jpg
        $array=explode('.',$filename);
        $ext=$array[1];
        $name=$array[0];
        $image->thumb(150,150)->save($filepath.$name.'_thumb.'.$ext);
        return $thumb_url=$filepath.$name.'_thumb.'.$ext;
    }


    //添加商品
    public function goods_add(){
        $goods['goods_sku']=I('post.goods_sku');//$_POST
        $goods['goods_name']=I('post.goods_name');
        $goods['goods_stock']=intval(I('post.goods_stock'));
        $goods['goods_price']=round(floatval(I('post.goods_price')),2);
        $goods['small_pic']=I('post.goods_small_pic');
        $goods['main_pic']=I('post.goods_main_pic');
        $goods['goods_brief']=I('post.goods_brief');
//        echo json_encode($goods);
        mkdir('./Public/uploads/images/'.$goods['goods_sku']);
//      rename('./Public/uploads/images/tmp/test.jpg','./Public/uploads/images/123/test.jpg');
        $array=explode('.',$goods['main_pic']);
        $extence=$array[1];
        rename('.'.$goods['small_pic'],'./Public/uploads/images/'.$goods['goods_sku'].'/'.$goods['goods_sku'].'_thumb.'.$extence);
        rename('.'.$goods['main_pic'],'./Public/uploads/images/'.$goods['goods_sku'].'/'.$goods['goods_sku'].'_main.'.$extence);
        //这里因为文件本身不大 并且数量不多
        //也可以用copy+unlink 方式实现剪切或者移动  这里展示rename移动


        //删除tmp中所有的图片
//        $this->delete_tmp();


        //移动成功后 我们就要数据存入数据库了
        $goods['small_pic']='/Public/uploads/images/'.$goods['goods_sku'].'/'.$goods['goods_sku'].'_thumb.'.$extence;
        $goods['main_pic']='/Public/uploads/images/'.$goods['goods_sku'].'/'.$goods['goods_sku'].'_main.'.$extence;

        $Goods=M('goods');
        $add=$Goods->add($goods);

        if($add){
            $msg['status']='success';
            $msg['data']="添加成功";
        }else{
            $msg['status']='failed';
            $msg['data']="添加失败";
        }


        echo json_encode($msg);
    }

    public function delete_tmp(){
        $dir_handle = opendir('./Public/uploads/images/tmp/');
        while($file = readdir($dir_handle)) {
//            unlink($file);
        }
        closedir($dir_handle);
    }

    //删除文件
    public function delete_img(){
        $res=unlink('./Public/uploads/20160602');
        var_dump($res);
    }

    //删除文件夹
    public function delete_dir(){
        $res=rmdir('./Public/uploads/20160602');
        var_dump($res);
    }

    public function download(){
        //下载本页 下载全部
//        $result = mysql_query("select * from student order by id asc");
        $Model=M('users');
        $rows=$Model->field('username,password,email')->limit(0,5)->select();
//        var_dump($rows);exit;

          //原版转码前
//        $str = "用户名,密码,邮箱\n";
//        foreach($rows as $row){
//             $str.=$row['username'].",".$row['password'].",".$row['email']."\n";
//        }
//        var_dump($str);exit;

        //进入csc需要转码
        $str = iconv('utf-8','gb2312',"用户名,密码,邮箱\n");
        foreach($rows as $row){
              $username = iconv('utf-8','gb2312',$row['username']); //中文转码
              $str.=$username.",".$row['password'].",".$row['email']."\n";

        }

        unset($rows);
        unset($row);

        $filename = date('Ymd').'.csv'; //设置文件名

//        export_csv($filename,$str); //调用下载文件方法

        header("Content-type:text/csv");
        header("Content-Disposition:attachment;filename=".$filename);
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');
        echo $str;
    }

    /*下载csv文件
     *@param 文件名 存入的数据
     */
    public function export_csv($filename,$data){
        header("Content-type:text/csv");
        header("Content-Disposition:attachment;filename=".$filename);
        header('Cache-Control:must-revalidate,post-check=0,pre-check=0');
        header('Expires:0');
        header('Pragma:public');
        echo $data;
    }
}
