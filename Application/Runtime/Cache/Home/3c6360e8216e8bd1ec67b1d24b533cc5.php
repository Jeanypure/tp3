<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.0.2
Version: 1.5.4
Author: KeenThemes
Website: http://www.keenthemes.com/
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8" />
    <title>毛利润报表</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <meta name="MobileOptimized" content="320">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="/Public/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
    <link href="/Public/assets/plugins/gritter/css/jquery.gritter.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="/Public/assets/plugins/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css"/>

    <!-- END PAGE LEVEL STYLES -->
    <!-- END PAGE LEVEL PLUGIN STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/Public/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/pages/tasks.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/Public/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <link rel="stylesheet" type="text/css" href="/Public/css/bootstrap-select.min.css">
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand" href="index.html">
            <img src="/Public/assets/img/logo.png" alt="logo" class="img-responsive" />
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <img src="/Public/assets/img/menu-toggler.png" alt="" />
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <ul class="nav navbar-nav pull-right">




            <!-- END TODO DROPDOWN -->
            <!-- BEGIN USER LOGIN DROPDOWN -->
            <li class="dropdown user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" src="/Public/assets/img/avatar1_small.jpg"/>
                    <span class="username"><?php echo ($username); ?></span>
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu">
                    <!--<li><a href="extra_profile.html"><i class="fa fa-user"></i> My Profile</a></li>-->
                    <!--<li><a href="page_calendar.html"><i class="fa fa-calendar"></i> My Calendar</a></li>-->
                    <!--<li><a href="inbox.html"><i class="fa fa-envelope"></i> My Inbox <span class="badge badge-danger">3</span></a></li>-->
                    <!--<li><a href="#"><i class="fa fa-tasks"></i> My Tasks <span class="badge badge-success">7</span></a></li>-->
                    <!--<li class="divider"></li>-->
                    <!--<li><a href="javascript:;" id="trigger_fullscreen"><i class="fa fa-move"></i> Full Screen</a></li>-->
                    <!--<li><a href="extra_lock.html"><i class="fa fa-lock"></i> Lock Screen</a></li>-->
                    <li><a href="login.html"><i class="fa fa-key"></i>退出登录</a></li>
                </ul>
            </li>
            <!-- END USER LOGIN DROPDOWN -->
        </ul>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->

<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <!-- BEGIN SIDEBAR -->
    <!-- BEGIN SIDEBAR -->
<div class="page-sidebar navbar-collapse collapse">
    <!-- BEGIN SIDEBAR MENU -->
    <ul class="page-sidebar-menu">
        <li>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
            <div class="sidebar-toggler hidden-phone"></div>
            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
        </li>
        <li>
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
            <form class="sidebar-search" action="extra_search.html" method="POST">
                <div class="form-container">
                    <div class="input-box">
                        <a href="javascript:;" class="remove"></a>
                        <input type="text" placeholder="Search..."/>
                        <input type="button" class="submit" value=" "/>
                    </div>
                </div>
            </form>
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
        </li>
        <li class="start active ">
            <a href="#">
                <i class="fa fa-home"></i>
                <span class="title">销售毛利润报表</span>
                <span class="selected"></span>

            </a>
        </li>
        <!--<li class="">-->
            <!--<a id="return-fee-btn" >-->
                <!--&lt;!&ndash;href="<?php echo U('Home/ReturnFee/index');?>"&ndash;&gt;-->
                <!--<i class="fa fa-briefcase"></i>-->
                <!--<span class="title">退款金额</span>-->

            <!--</a>-->

        <!--</li>-->


        <!--<li class="">-->
            <!--<a href="<?php echo U('Home/ExchangeRate/index');?>">-->
                <!--<i class="fa fa-home"></i>-->
                <!--<span class="title">毛利润报表</span>-->
                <!--<span class="selected"></span>-->

            <!--</a>-->
        <!--</li>-->


        <!--<li class="last ">-->
            <!--<a href="charts.html">-->
                <!--<i class="fa fa-bar-chart-o"></i>-->
                <!--<span class="title">Visual Charts</span>-->
            <!--</a>-->
        <!--</li>-->
    </ul>
    <!-- END SIDEBAR MENU -->
</div>
<!-- END SIDEBAR -->
    <!-- END SIDEBAR -->
    <!-- BEGIN PAGE -->
    <div class="page-content">

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal myclass"   action="<?php echo U('Home/Product/index');?> " method="post">
                    <div class="portlet box red">
                        <div class="portlet-title">
                            <div class="caption"><i class="fa fa-globe"></i>查询条件</div>
                            <div class="tools">
                                <a href="javascript:;" class="reload"></a>
                                <a href="javascript:;" class="remove"></a>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="form-group" >
                                <label for="pingtai" class="col-sm-1 control-label" >平台</label>
                                <div class="col-sm-2" >
                                    <select name="pingtai"  class="form-control">
                                        <option value=""></option>
                                        <?php if(is_array($plat)): $i = 0; $__LIST__ = $plat;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["pingtai"]); ?>"><?php echo ($vo["pingtai"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>

                                <div class="col-sm-2">
                                    <select name="DateFlag" class="col-sm-2 form-control">
                                        <option value="1">发货时间</option>
                                        <option value="0">交易时间</option>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <input type="date" name="BeginDate" class="form-control" required/>
                                    <!--<input id="d11" type="text" name="BeginDate" class="form-control" placeholder="BeginDate" required="required">-->
                                    <!--<img onclick="WdatePicker({el:'d11'})" src="/Public/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">-->
                                </div>
                                <div class="col-sm-2">
                                    <input type="date" name="EndDate" class="form-control" required/>
                                    <!--<input id="d12" type="text" name="EndDate" class="form-control"  placeholder="EndDate" required="required">-->
                                    <!--<img onclick="WdatePicker({el:'d12'})" src="/Public/My97DatePicker/skin/datePicker.gif" width="16" height="22" align="absmiddle">-->
                                </div>
                            </div>
                            <div class="form-group">
                                <label  class="col-sm-1 control-label" >账号</label>
                                <div class="col-sm-2" >
                                    <select name="suffix[]" class="form-control selectpicker" multiple data-actions-box="true" >
                                        <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["suffix"]); ?>"><?php echo ($vo["suffix"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>

                                    </select>
                                </div>
                                <label for="StoreName" class="col-sm-1 control-label" >出货仓库</label>
                                <div class="col-sm-2" >
                                    <select name="StoreName[]"  class="form-control selectpicker"  multiple data-actions-box="true" >
                                        <option value="义务仓">义务仓</option>
                                        <option value="FBW仓库">FBW仓库</option>
                                        <option value="AMZ上海仓">AMZ上海仓</option>
                                        <option value="FBA仓库">FBA仓库</option>
                                        <option value="4PXUS">4PXUS</option>
                                    </select>
                                </div>
                                <div class="col-sm-2" >
                                    <input  type="text" name="ExchangeRate" class="form-control"   placeholder="美元汇率">
                                </div>
                                <div class="col-sm-1" >
                                    <input  name="button" type="submit" class="btn btn-default btn-primary btn-lg btn-block"  id="form-sale-btn" value="查询">
                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- END PAGE HEADER-->

        <!-- BEGIN PAGE HEADER-->

        <!-- END PAGE HEADER-->
        <!--&lt;!&ndash; BEGIN PAGE CONTENT&ndash;&gt;-->
        <!--<div class="row">-->
        <!--<div class="col-md-12">-->
        <!--&lt;!&ndash; 载入中 &ndash;&gt;-->
        <!--<div class="loading" style="display: none;"><center><img src="/Public/assets/img/ajax-loading.gif"></center></div>-->
        <!--&lt;!&ndash; BEGIN EXAMPLE TABLE PORTLET&ndash;&gt;-->
        <!--<div class="portlet box red " id="expressfaretable" style="display:block" >-->
        <!--<div class="portlet-title">-->
        <!--<div class="caption"><i class="fa fa-edit"></i></div>-->
        <!--<div class="tools">-->
        <!--<a href="javascript:;" class="collapse"></a>-->
        <!--<a href="#portlet-config" data-toggle="modal" class="config"></a>-->
        <!--<a href="javascript:;" class="reload"></a>-->
        <!--<a href="javascript:;" class="remove"></a>-->
        <!--</div>-->
        <!--</div>-->
        <!--<div class="portlet-body" >-->
        <!--<div class="table-toolbar">-->
        <!--&lt;!&ndash;<div class="btn-group">&ndash;&gt;-->
        <!--&lt;!&ndash;<button id="sample_editable_1_new" class="btn green">&ndash;&gt;-->
        <!--&lt;!&ndash;Add New <i class="fa fa-plus"></i>&ndash;&gt;-->
        <!--&lt;!&ndash;</button>&ndash;&gt;-->
        <!--&lt;!&ndash;</div>&ndash;&gt;-->
        <!--<div class="btn-group pull-right">-->
        <!--<button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down"></i>-->
        <!--</button>-->
        <!--&lt;!&ndash;<ul class="dropdown-menu pull-right">&ndash;&gt;-->
        <!--&lt;!&ndash;<li><a href="#">导出数据</a></li>&ndash;&gt;-->
        <!--&lt;!&ndash;<li><a href="#">Save as PDF</a></li>&ndash;&gt;-->
        <!--&lt;!&ndash;<li><a href="#">Export to Excel</a></li>&ndash;&gt;-->
        <!--&lt;!&ndash;</ul>&ndash;&gt;-->
        <!--</div>-->
        <!--</div>-->

        <!--<table class="table table-striped table-bordersed table-hover expressfare" id="example" >-->
        <!--<thead>-->
        <!--<tr>-->
        <!--<th>平台</th>-->
        <!--<th>账号</th>-->
        <!--<th>销售员</th>-->
        <!--<th>成交价$</th>-->
        <!--<th>成交价￥</th>-->
        <!--<th>eBay成交费$</th>-->
        <!--<th>eBay成交费￥</th>-->
        <!--<th>Paypal成交费$</th>-->
        <!--<th>Paypal成交费￥</th>-->
        <!--<th>商品成本￥</th>-->
        <!--<th>包装成本￥</th>-->
        <!--</tr>-->
        <!--</thead>-->
        <!--<tbody>-->

        <!--&lt;!&ndash;<?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>&ndash;&gt;-->
        <!--&lt;!&ndash;<tr>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($i); ?>.<?php echo ($vo["pingtai"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["suffix"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["salesman"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["salemoney"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["salemoneyzn"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["ebayfeeebay"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["ebayfeeznebay"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["ppfee"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["ppfeezn"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["costmoney"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["inpackagemoney"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;<td><?php echo ($vo["storename"]); ?></td>&ndash;&gt;-->
        <!--&lt;!&ndash;</tr>&ndash;&gt;-->
        <!--&lt;!&ndash;<?php endforeach; endif; else: echo "" ;endif; ?>&ndash;&gt;-->
        <!--</tbody>-->
        <!--</table>-->

        <!--</div>-->


        <!--</div>-->
        <!--&lt;!&ndash; END EXAMPLE TABLE PORTLET&ndash;&gt;-->
        <!--</div>-->

        <!--</div>-->
        <!--&lt;!&ndash; END PAGE CONTENT &ndash;&gt;-->


    </div>
    <!-- END PAGE -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="footer">
    <div class="footer-inner">
        2013 &copy; Metronic by keenthemes.
    </div>
    <div class="footer-tools">
			<span class="go-top">
			<i class="fa fa-angle-up"></i>
			</span>
    </div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->

<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/Public/assets/plugins/respond.min.js"></script>
<script src="/Public/assets/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/Public/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="/Public/assets/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script src="/Public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<script src="/Public/assets/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
<script src="/Public/assets/scripts/app.js"></script>
<script src="/Public/js/ajaxfileupload.js"></script>



<!-- BEGIN PAGE LEVEL PLUGINS -->


<script>
    $(document).ready(function(){

        //显示退款费用的页面 return-fee-btn
        $('#return-fee-btn').click(function(){
            console.log(888);
            $('.page').hide();
            $('#return-fee').show();
        });

    });
</script>
<script>


    jQuery(document).ready(function() {
//         App.init();

        //侧边栏点击效果
        $('.mylist').click(function(){
            $('.mylist').not(this).removeClass('active');
            $('.mylist').children('a').children('.arrow').removeClass('open');
            $('.mylist').children('a').children('.select').removeClass('selected');
            $(this).children('a').children('.select').addClass('selected');
            $(this).children('a').children('.arrow').addClass('open');
            $(this).addClass('active');
            return false;
        });

        //显示主页页面
        $('#home-btn').click(function(){
//				$('#goodslist').hide();
            $('.page').hide();
            $('#home-page').show();
        });


        //显示商品添加页面
        $('#goodsadd-btn').click(function(){
//				$('#goodslist').hide();
            $('.page').hide();
            $('#goodsadd').show();
        });

        //side边缩放效果
        $('.page-sidebar, .header').on('click','.sidebar-toggler',function(e) {
            var body = $('body');
            var sidebar = $('.page-sidebar');

            if ((body.hasClass("page-sidebar-hover-on") && body.hasClass('page-sidebar-fixed')) || sidebar.hasClass('page-sidebar-hovering')) {
                body.removeClass('page-sidebar-hover-on');
                sidebar.css('width', '').hide().show();
                $.cookie('sidebar_closed', '0');
                e.stopPropagation();
                return;
            }

            $(".sidebar-search", sidebar).removeClass("open");

            if (body.hasClass("page-sidebar-closed")) {
                body.removeClass("page-sidebar-closed");
                if (body.hasClass('page-sidebar-fixed')) {
                    sidebar.css('width', '');
                }
                $.cookie('sidebar_closed', '0');
            } else {
                body.addClass("page-sidebar-closed");
                $.cookie('sidebar_closed', '1');
            }
        });


        //显示商品列表页面 查出数据 返回前端生成相应的html 添加进列表中
        $('#goodslist-btn').click(function() {
//				$('#home-page').hide();
            $('.page').hide();
            $('.goodsinfo').remove();
            $.get('/home/index/goodslistAjax',function(data,status){
//					console.log(status);
//					console.log(data);
                $('#goods-page').html(data.page);//innerHTML=".."
                console.log(data);
                $.each(data.list,function(index,item){
                    // console.log(item.goods_sku);
//						LIST=DATA.LIST   LIST[INDEX]=ITEM
                    var tr='<tr class="goodsinfo" id="'+item.id+'">' +
                        '<td>'+item.goods_sku+'</td>'+
                        '<td>'+item.goods_name+'</td>'+
                        '<td>'+item.goods_stock+'</td>'+
                        '<td>'+item.goods_price+'</td>'+
                        '<td><span class="label label-sm label-success">'+item.status+'</span></td>';
                    $('.goodsInfoList').append(tr);
                });
            },'json');
            $('#goodslist').show();

            return false;
        });

        //商品列表翻页  .click缩写方法无法监听预加载前不存在的标签所触发的事件
//			$('.laypage_main .num').click(function(){
//				console.log(123);
//				return false;
//			});
        //商品列表翻页 点击分页页码 ->获取url ->get发送给后台查出数据后返回 ->生成html后添加到列表中
        $(document).on('click','.laypage_main a',function(){
//				console.log(123);
//				var a=$(this);
//				console.log(a);
            var url=$(this).attr('href');
//				<a class="num" href="/index.php/Home/Index/goodslistAjax/p/3.html">3</a>
//				var rule=new RegExp("\d");
            var patrn=/[0-9]/;
            var result=patrn.exec(url);
//				console.log(result);
            var page=result[0];
//				$.post('/home/index/get_goodsinfo', { 'page': page }, function(data){
            $.get(url,{ 'page': page },function(data){
                $('.goodsinfo').remove();
                console.log(data);
                $('#goods-page').html(data.page);
                $.each(data.list,function(index,item){
                    var tr='<tr class="goodsinfo" id="'+item.id+'">' +
                        '<td>'+item.goods_sku+'</td>'+
                        '<td>'+item.goods_name+'</td>'+
                        '<td>'+item.goods_stock+'</td>'+
                        '<td>'+item.goods_price+'</td>'+
                        '<td><span class="label label-sm label-success">'+item.status+'</span></td>';
                    $('.goodsInfoList').append(tr);
                });
                $('#goodslist').show();
            },'json');


            return false;
        });


        //添加商品页面 选择图片 生成缩略图
        $(document).on('change','#goods_img_file',function(){
//			$('#goods_img_file').change(function () {

            $.ajaxFileUpload({
                url:'/home/goods/upload_img',//处理图片脚本
                secureuri :false,
                fileElementId :"goods_img_file",//file控件id
                dataType : 'json',
                success : function (data,status){
                    console.log(data);
                    // 图片上传成功后做相应操作
                    if(status=='success'){
                        $('input[name=goods_main_pic]').val(data.main_pic);
                        $('input[name=goods_small_pic]').val(data.small_pic);
                        var img='<img src="'+data.small_pic+'">';
                        $('#show_upload_img').html(img);
                    }else{
//							alert(data.error);//
                    }

                },
                error:function(data,status,e){
                    // 上传出错信息
                    //console.log(data);
                    //console.log(e);
                }
            });
//				return false;
        });

        //uploads...
        //sku
        //
        //添加商品 ->以sku创建文件夹->移动最终图片文件夹内 ->添加数据库 ->删除外部不需要的图片->返回成功
        $('#goods-add-btn').click(function(){
            var add=$('.goods-add-form').serialize();
            //$().toFixed(2);
            console.log(add);
            $.ajax({
                type:'POST',
                url:'/home/goods/goods_add',
                data:add,
//					dataType:'json',
                success:function(data,status){
//						console.log(status);
                    var res=eval("("+data+")");
//						console.log(res);
                    if(res.status=='OK'){
                        alert(res.data);
//							confirm("添加成功,是否继续添加？"){
//
//							}else{
//
//							}
                    }else{
                        alert(res.data);
                    }

                }
            });
            return false;
        });

        //验证输入的SKU的唯一性
        $(document).on('change','#check_sku',function(){
            $('#check_sku').addClass('spinner');
            var sku=$('#check_sku').val();
            $.post('/home/goods/check_sku',{'goods_sku':sku},function(data){
                console.log(data);
                if(data == "OK"){
                    $('#check_sku').removeClass('spinner');
                    var span='<span><i class="fa fa-check"></i></span>'
                    $('.msg').html(span);
                }else{
                    $('#check_sku').removeClass('spinner');
                    var span='<span><i class="fa fa-times"></i>编号已存在</span>';
                    $('.msg').html(span);
                }
            },'json');
        });


        $(document).on('ajaxStart', function(){
            $('.page .page-change').hide();
            $('.loading').show();
            return false;
        });


        $(document).on('ajaxComplete',function(e,x,o){
//				console.log(o);
            $('.loading').hide();
//				$('.page').show();

            return false;
        });
    });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>