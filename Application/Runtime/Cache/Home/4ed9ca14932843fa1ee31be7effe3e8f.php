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
                <span class="title">毛利润报表</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="">
            <a href="<?php echo U('Home/Return/index');?>">
                <i class="fa fa-briefcase"></i>
                <span class="title">退款金额</span>
            </a>
        </li>
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-cogs"></i>-->
                <!--<span class="title">Layouts</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="layout_session_timeout.html">-->
                        <!--<span class="badge badge-roundless badge-warning">new</span>Session Timeout</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_idle_timeout.html">-->
                        <!--<span class="badge badge-roundless badge-important">new</span>User Idle Timeout</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_language_bar.html">-->
                        <!--Language Switch Bar</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_horizontal_sidebar_menu.html">-->
                        <!--Horizontal & Sidebar Menu</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_horizontal_menu1.html">-->
                        <!--Horizontal Menu 1</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_horizontal_menu2.html">-->
                        <!--Horizontal Menu 2</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_sidebar_toggler_on_header.html">-->
                        <!--<span class="badge badge-roundless badge-warning">new</span>Sidebar Toggler On Header</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_sidebar_fixed.html">-->
                        <!--Sidebar Fixed Page</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_sidebar_closed.html">-->
                        <!--Sidebar Closed Page</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_disabled_menu.html">-->
                        <!--Disabled Menu Links</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_blank_page.html">-->
                        <!--Blank Page</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_boxed_page.html">-->
                        <!--Boxed Page</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_boxed_not_responsive.html">-->
                        <!--Non-Responsive Boxed Layout</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_promo.html">-->
                        <!--Promo Page</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_email.html">-->
                        <!--Email Templates</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="layout_ajax.html">-->
                        <!--Content Loading via Ajax</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="tooltips" data-placement="right" data-original-title="Frontend&nbsp;Theme For&nbsp;Metronic&nbsp;Admin">-->
            <!--<a href="http://keenthemes.com/preview/index.php?theme=metronic_frontend" target="_blank">-->
                <!--<i class="fa fa-gift"></i>-->
                <!--<span class="title">Frontend Theme</span>-->
            <!--</a>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-bookmark-o"></i>-->
                <!--<span class="title">UI Features</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="ui_general.html">-->
                        <!--General</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_buttons.html">-->
                        <!--Buttons & Icons</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_typography.html">-->
                        <!--Typography</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_modals.html">-->
                        <!--Modals</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_extended_modals.html">-->
                        <!--Extended Modals</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_tabs_accordions_navs.html">-->
                        <!--Tabs, Accordions & Navs</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_datepaginator.html">-->
                        <!--<span class="badge badge-roundless badge-success">new</span>Date Paginator</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_bootbox.html">-->
                        <!--<span class="badge badge-roundless badge-important">new</span>Bootbox Dialogs</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_tiles.html">-->
                        <!--Tiles</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_toastr.html">-->
                        <!--<span class="badge badge-roundless badge-warning">new</span>Toastr Notifications</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_tree.html">-->
                        <!--Tree View</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_nestable.html">-->
                        <!--Nestable List</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_ion_sliders.html">-->
                        <!--Ion Range Sliders</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_noui_sliders.html">-->
                        <!--<span class="badge badge-roundless badge-success">new</span>NoUI Range Sliders</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_jqueryui_sliders.html">-->
                        <!--jQuery UI Sliders</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="ui_knob.html">-->
                        <!--Knob Circle Dials</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-table"></i>-->
                <!--<span class="title">Form Stuff</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="form_controls.html">-->
                        <!--Form Controls</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_layouts.html">-->
                        <!--Form Layouts</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_component.html">-->
                        <!--Form Components</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_editable.html">-->
                        <!--<span class="badge badge-roundless badge-warning">new</span>Form X-editable</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_wizard.html">-->
                        <!--Form Wizard</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_validation.html">-->
                        <!--Form Validation</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_image_crop.html">-->
                        <!--<span class="badge badge-roundless badge-important">new</span>Image Cropping</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_fileupload.html">-->
                        <!--Multiple File Upload</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="form_dropzone.html">-->
                        <!--Dropzone File Upload</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-sitemap"></i>-->
                <!--<span class="title">Pages</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="page_portfolio.html">-->
                        <!--<i class="fa fa-briefcase"></i>-->
                        <!--<span class="badge badge-warning badge-roundless">new</span>Portfolio</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_timeline.html">-->
                        <!--<i class="fa fa-clock-o"></i>-->
                        <!--<span class="badge badge-info">4</span>Timeline</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_coming_soon.html">-->
                        <!--<i class="fa fa-cogs"></i>-->
                        <!--Coming Soon</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_blog.html">-->
                        <!--<i class="fa fa-comments"></i>-->
                        <!--Blog</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_blog_item.html">-->
                        <!--<i class="fa fa-font"></i>-->
                        <!--Blog Post</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_news.html">-->
                        <!--<i class="fa fa-coffee"></i>-->
                        <!--<span class="badge badge-success">9</span>News</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_news_item.html">-->
                        <!--<i class="fa fa-bell"></i>-->
                        <!--News View</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_about.html">-->
                        <!--<i class="fa fa-group"></i>-->
                        <!--About Us</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_contact.html">-->
                        <!--<i class="fa fa-envelope-o"></i>-->
                        <!--Contact Us</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="page_calendar.html">-->
                        <!--<i class="fa fa-calendar"></i>-->
                        <!--<span class="badge badge-important">14</span>Calendar</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-gift"></i>-->
                <!--<span class="title">Extra</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="extra_profile.html">-->
                        <!--User Profile</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_lock.html">-->
                        <!--Lock Screen</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_faq.html">-->
                        <!--FAQ</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="inbox.html">-->
                        <!--<span class="badge badge-important">4</span>Inbox</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_search.html">-->
                        <!--Search Results</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_invoice.html">-->
                        <!--Invoice</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_pricing_table.html">-->
                        <!--Pricing Tables</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_404_option1.html">-->
                        <!--404 Page Option 1</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_404_option2.html">-->
                        <!--404 Page Option 2</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_404_option3.html">-->
                        <!--404 Page Option 3</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_500_option1.html">-->
                        <!--500 Page Option 1</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="extra_500_option2.html">-->
                        <!--500 Page Option 2</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li>-->
            <!--<a class="active" href="javascript:;">-->
                <!--<i class="fa fa-leaf"></i>-->
                <!--<span class="title">3 Level Menu</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li>-->
                    <!--<a href="javascript:;">-->
                        <!--Item 1-->
                        <!--<span class="arrow"></span>-->
                    <!--</a>-->
                    <!--<ul class="sub-menu">-->
                        <!--<li><a href="#">Sample Link 1</a></li>-->
                        <!--<li><a href="#">Sample Link 2</a></li>-->
                        <!--<li><a href="#">Sample Link 3</a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="javascript:;">-->
                        <!--Item 1-->
                        <!--<span class="arrow"></span>-->
                    <!--</a>-->
                    <!--<ul class="sub-menu">-->
                        <!--<li><a href="#">Sample Link 1</a></li>-->
                        <!--<li><a href="#">Sample Link 1</a></li>-->
                        <!--<li><a href="#">Sample Link 1</a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="#">-->
                        <!--Item 3-->
                    <!--</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li>-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-folder-open"></i>-->
                <!--<span class="title">4 Level Menu</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li>-->
                    <!--<a href="javascript:;">-->
                        <!--<i class="fa fa-cogs"></i>-->
                        <!--Item 1-->
                        <!--<span class="arrow"></span>-->
                    <!--</a>-->
                    <!--<ul class="sub-menu">-->
                        <!--<li>-->
                            <!--<a href="javascript:;">-->
                                <!--<i class="fa fa-user"></i>-->
                                <!--Sample Link 1-->
                                <!--<span class="arrow"></span>-->
                            <!--</a>-->
                            <!--<ul class="sub-menu">-->
                                <!--<li><a href="#"><i class="fa fa-remove"></i> Sample Link 1</a></li>-->
                                <!--<li><a href="#"><i class="fa fa-pencil"></i> Sample Link 1</a></li>-->
                                <!--<li><a href="#"><i class="fa fa-edit"></i> Sample Link 1</a></li>-->
                            <!--</ul>-->
                        <!--</li>-->
                        <!--<li><a href="#"><i class="fa fa-user"></i>  Sample Link 1</a></li>-->
                        <!--<li><a href="#"><i class="fa fa-external-link"></i>  Sample Link 2</a></li>-->
                        <!--<li><a href="#"><i class="fa fa-bell"></i>  Sample Link 3</a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="javascript:;">-->
                        <!--<i class="fa fa-globe"></i>-->
                        <!--Item 2-->
                        <!--<span class="arrow"></span>-->
                    <!--</a>-->
                    <!--<ul class="sub-menu">-->
                        <!--<li><a href="#"><i class="fa fa-user"></i>  Sample Link 1</a></li>-->
                        <!--<li><a href="#"><i class="fa fa-external-link"></i>  Sample Link 1</a></li>-->
                        <!--<li><a href="#"><i class="fa fa-bell"></i>  Sample Link 1</a></li>-->
                    <!--</ul>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<a href="#">-->
                        <!--<i class="fa fa-folder-open"></i>-->
                        <!--Item 3-->
                    <!--</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-user"></i>-->
                <!--<span class="title">Login Options</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="login.html">-->
                        <!--Login Form 1</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="login_soft.html">-->
                        <!--Login Form 2</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-th"></i>-->
                <!--<span class="title">Data Tables</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="table_basic.html">-->
                        <!--Basic Datatables</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="table_responsive.html">-->
                        <!--Responsive Datatables</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="table_managed.html">-->
                        <!--Managed Datatables</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="table_editable.html">-->
                        <!--Editable Datatables</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="table_advanced.html">-->
                        <!--Advanced Datatables</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="table_ajax.html">-->
                        <!--Ajax Datatables</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-file-text"></i>-->
                <!--<span class="title">Portlets</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="portlet_general.html">-->
                        <!--General Portlets</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="portlet_draggable.html">-->
                        <!--Draggable Portlets</a>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</li>-->
        <!--<li class="">-->
            <!--<a href="javascript:;">-->
                <!--<i class="fa fa-map-marker"></i>-->
                <!--<span class="title">Maps</span>-->
                <!--<span class="arrow "></span>-->
            <!--</a>-->
            <!--<ul class="sub-menu">-->
                <!--<li >-->
                    <!--<a href="maps_google.html">-->
                        <!--Google Maps</a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a href="maps_vector.html">-->
                        <!--Vector Maps</a>-->
                <!--</li>-->
            <!--</ul>-->
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
<include file="Public:script">
    <script src="//cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/Public/js/bootstrap-select.min.js"></script>
    <script src="/Public/js/moment.min.js"></script>
    <script src="/Public/js/zh-cn.js"></script>