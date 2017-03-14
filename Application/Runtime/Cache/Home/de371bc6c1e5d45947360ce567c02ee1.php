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
    <title> 毛利润报表￥</title>
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
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link rel="stylesheet" type="text/css" href="/Public/assets/plugins/select2/select2_metro.css" />
    <link rel="stylesheet" href="/Public/assets/plugins/data-tables/DT_bootstrap.css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link href="/Public/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
    <link href="/Public/assets/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
    <link href="/Public/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <!-- END THEME STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
    <style type="text/css">
        .page-content{
            margin:0px;
        }
        td{
            text-align:center;
        }
        th{
            text-align:center;
        }

        /* body{
           margin: -100 auto;
         }*/
    </style>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
<!-- BEGIN HEADER -->
<div class="header navbar navbar-inverse navbar-fixed-top">
    <!-- BEGIN TOP NAVIGATION BAR -->
    <div class="header-inner">
        <!-- BEGIN LOGO -->
        <a class="navbar-brand"  href=”#” onClick="javascript :history.back(-1);">返回条件选择页
            <!--href="<?php echo U('Home/Users/do_login');?>"-->
        </a>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <!-- <img src="assets/img/menu-toggler.png" alt="" /> -->
        </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a  class="navbar-brand" href="/home/product/export" >导出数据
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->

    </div>
    <!-- END TOP NAVIGATION BAR -->
</div>
<!-- END HEADER -->
<div class="clearfix"></div>
<!-- BEGIN CONTAINER -->
<div class="page-container">

    <!-- BEGIN PAGE -->
    <div class="page-content">
        <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
        <div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h4 class="modal-title">Modal title</h4>
                    </div>
                    <div class="modal-body">
                        Widget settings form goes here
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn blue">Save changes</button>
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->

        <!-- BEGIN PAGE HEADER-->
        <div class="row">
            <!--<div class="col-md-12">-->
                <!--&lt;!&ndash; BEGIN PAGE TITLE & BREADCRUMB&ndash;&gt;-->
                <!--<span>数据来源：财务销售报表中单SKU订单。</span>-->
                <!--<br>-->
                <!--<span>注意：财务销售报表都不包含缺货订单。</span>-->
                <!--&lt;!&ndash; END PAGE TITLE & BREADCRUMB&ndash;&gt;-->
            <!--</div>-->
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row">
            <div class="col-md-12">

                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption"><i class="fa fa-globe"></i>毛利润报表</div>
                        <div class="actions">
                            <div class="btn-group">
                                <!--<a class="btn default" href="#" data-toggle="dropdown">
                                Columns
                                <i class="fa fa-angle-down"></i>
                                </a>
                                 <div id="sample_2_column_toggler" class="dropdown-menu hold-on-click dropdown-checkboxes pull-right">
                                    <label><input type="checkbox" checked data-column="0">Rendering engine</label>
                                    <label><input type="checkbox" checked data-column="1">Browser</label>
                                    <label><input type="checkbox" checked data-column="2">Platform(s)</label>
                                    <label><input type="checkbox" checked data-column="3">Engine version</label>
                                    <label><input type="checkbox" checked data-column="4">CSS grade</label>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_2">
                            <thead>
                                <tr>
                                    <th>平台</th>
                                    <th>账号</th>
                                    <th>销售员</th>
                                    <th>成交价$</th>
                                    <th>成交价￥</th>
                                    <th>eBay成交费$</th>
                                    <th>eBay成交费￥</th>
                                    <th>Paypal成交费$</th>
                                    <th>Paypal成交费￥</th>
                                    <th>商品成本￥</th>
                                    <th>运费成本￥</th>
                                    <th>包装成本￥</th>
                                    <th>发货仓库</th>
                                    <th>退款金额￥</th>
                                    <th>死库处理￥</th>
                                    <th>店铺杂费￥</th>
                                    <th>毛利￥</th>
                                    <th>毛利率%</th>
                                </tr>

                            </thead>
                            <tbody>
                            <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pingtai"] != 汇总 ): ?><tr>
                                        <td><?php echo ($vo["pingtai"]); ?></td>
                                        <td><?php echo ($vo["suffix"]); ?></td>
                                        <td><?php echo ($vo["salesman"]); ?></td>
                                        <td><?php echo ($vo["salemoney"]); ?></td>
                                        <td><?php echo ($vo["salemoneyzn"]); ?></td>
                                        <td><?php echo ($vo["ebayfeeebay"]); ?></td>
                                        <td><?php echo ($vo["ebayfeeznebay"]); ?></td>
                                        <td><?php echo ($vo["ppfee"]); ?></td>
                                        <td><?php echo ($vo["ppfeezn"]); ?></td>
                                        <td><?php echo ($vo["costmoney"]); ?></td>
                                        <td><?php echo (round($vo["expressfare"],2)); ?></td>
                                        <td><?php echo ($vo["inpackagemoney"]); ?></td>
                                        <td><?php echo ((isset($vo["storename"]) && ($vo["storename"] !== ""))?($vo["storename"]):'未知'); ?></td>
                                        <td><?php echo (round($vo["refund"],2)); ?></td>
                                        <td><?php echo (round($vo["diefeezn"],2)); ?></td>
                                        <td><?php echo (round($vo["insertionfee"],2)); ?></td>
                                        <td><?php echo (round($vo["grossprofit"],2)); ?></td>
                                        <td><?php echo (round($vo["grossprofitrate"],2)); ?></td>
                                    </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                            <tfoot>
                            <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["pingtai"] == 汇总 ): ?><tr>
                                    <th style=" color:#F00;"><?php echo ($vo["pingtai"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["suffix"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["salesman"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["salemoney"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["salemoneyzn"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["ebayfeeebay"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["ebayfeeznebay"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["ppfee"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["ppfeezn"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["costmoney"]); ?></th>
                                    <th style=" color:#F00;"><?php echo (round($vo["expressfare"],2)); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["inpackagemoney"]); ?></th>
                                    <th style=" color:#F00;"><?php echo ($vo["storename"]); ?></th>
                                    <th style=" color:#F00;"><?php echo (round($vo["refund"],2)); ?></th>
                                    <th style=" color:#F00;"><?php echo (round($vo["diefeezn"],2)); ?></th>
                                    <th style=" color:#F00;"><?php echo (round($vo["insertionfee"],2)); ?></th>
                                    <th style=" color:#F00;"><?php echo (round($vo["grossprofit"],2)); ?></th>
                                    <th style=" color:#F00;"><?php echo (round($vo["grossprofitrate"],2)); ?></th>
                                </tr><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                            </tfoot>

                        </table>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>
        </div>
        <!-- END PAGE CONTENT-->
    </div>
    <!-- END PAGE -->
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<!--<div class="footer">
   <div class="footer-inner">
       <font color="red" size="5"><big>注意：以上所有数据都不包含缺货订单！！！</big></font>
      <br>
       <big>以上所有数据都是单ＳＫＵ统计的结果</big>


   </div>
   <div class="footer-tools">
       <span class="go-top">
       <i class="fa fa-angle-up"></i>
       </span>
   </div>
</div>-->
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="/Public/assets/plugins/respond.min.js"></script>
<script src="/Public/assets/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="/Public/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/bootstrap-hover-dropdown/twitter-bootstrap-hover-dropdown.min.js" type="text/javascript" ></script>
<script src="/Public/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
<script src="/Public/assets/plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="/Public/assets/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="/Public/assets/plugins/data-tables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/Public/assets/plugins/data-tables/DT_bootstrap.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="/Public/assets/scripts/app.js"></script>
<script src="/Public/assets/scripts/table-advanced.js"></script>
<script>
    jQuery(document).ready(function() {
        App.init();
        TableAdvanced.init();
    });
</script>
</body>
<!-- END BODY -->
</html>