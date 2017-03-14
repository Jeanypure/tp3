<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>Bootstrap Table Examples</title>
    <link rel="stylesheet" href="/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/assets/bootstrap-table/src/bootstrap-table.css">
    <link rel="stylesheet" href="//rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/css/bootstrap-editable.css">
    <link rel="stylesheet" href="/Public/assets/examples.css">

    <script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <!--<script src="/Public/assets/jquery.min.js"></script>-->
    <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap-table/1.9.1/bootstrap-table.min.js"></script>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/json2/20140204/json2.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">

    <table id="table"
           data-toolbar="#toolbar"
           data-search="false"
           data-show-refresh="false"
           data-show-toggle="true"
           data-show-columns="true"
           data-show-export="false"
           data-detail-view="true"
           data-detail-formatter="detailFormatter"
           data-minimum-count-columns="2"
           data-show-pagination-switch="false"
           data-pagination="true"
           data-id-field="id"
           data-page-list="[10, 25, 50, 100, ALL]"
           data-show-footer="false"
           data-side-pagination="server"
           data-url="/Demo/Index/salername"
           data-response-handler="responseHandler">
    </table>

    <table id="table2"
           data-toolbar="#toolbar"
           data-search="false"
           data-show-refresh="false"
           data-show-toggle="true"
           data-show-columns="true"
           data-show-export="false"
           data-detail-view="true"
           data-detail-formatter="detailFormatter"
           data-minimum-count-columns="2"
           data-show-pagination-switch="false"
           data-pagination="true"
           data-id-field="id"
           data-page-list="[10, 25, 50, 100, ALL]"
           data-show-footer="false"
           data-side-pagination="server"
           data-url="/Demo/Index/SalerName2"
           data-response-handler="responseHandler">
    </table>
</div>

<script>
    var $table = $('#table'),
        $remove = $('#remove'),
        selections = [],
        $table2 = $('#table2');

    function initTable() {

        $table.bootstrapTable({
//            height: getHeight(),
            columns: [
                [
                    {
                    title: '业绩归属人1',
                    field: 'salername',
                    rowspan: 2,
                    align: 'center',
                    valign: 'middle',
                    sortable: true,
                    footerFormatter: totalTextFormatter
                }
                ,{
                    title: '0-6个月 ',
                    colspan: 12,
                    align: 'center'
                }
                ,{
                    title: ' 6-12月',
                    colspan: 12,
                    align: 'center'
                }
                ,{
                    title: '  12月以上',
                    colspan: 12,
                    align: 'center'
                }

                ],
                [
                    {
                        field: 'timegroup',
                        title: '时间段',
                        sortable: true,
                        editable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },{
                        field: 'salemoneyrmbus',
                        title: '销售额$',
                        sortable: true,
                        editable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    }, {
                    field: 'salemoneyrmbzn',
                    title: '销售额￥',
                    sortable: true,
                    align: 'center',
                    editable: {
                        type: 'text',
                        title: 'Item Price',
                        validate: function (value) {
                            value = $.trim(value);
                            if (!value) {
                                return 'This field is required';
                            }
                            if (!/^\$/.test(value)) {
                                return 'This field needs to start width $.'
                            }
                            var data = $table.bootstrapTable('getData'),
                                index = $(this).parents('tr').data('index');
                            console.log(data[index]);
                            return '';
                        }
                    },
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'costmoneyrmb',
                    title: '商品成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayus',
                    title: '交易费汇总$',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayzn',
                    title: '交易费汇总￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'inpackagefeermb',
                    title: '包装成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'expressfarermb',
                    title: '运费成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'devofflinefee',
                    title: '死库处理￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'netprofit',
                    title: '毛利润￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                }
                ,{
                    field: 'netrate',
                    title: '毛利率%',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'timegroup2',
                    title: '时间段',
                    sortable: true,
                    editable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                },{
                    field: 'salemoneyrmbus2',
                    title: '销售额$',
                    sortable: true,
                    editable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                }, {
                    field: 'salemoneyrmbzn2',
                    title: '销售额￥',
                    sortable: true,
                    align: 'center',
                    editable: {
                        type: 'text',
                        title: 'Item Price',
                        validate: function (value) {
                            value = $.trim(value);
                            if (!value) {
                                return 'This field is required';
                            }
                            if (!/^\$/.test(value)) {
                                return 'This field needs to start width $.'
                            }
                            var data = $table.bootstrapTable('getData'),
                                index = $(this).parents('tr').data('index');
                            console.log(data[index]);
                            return '';
                        }
                    },
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'costmoneyrmb2',
                    title: '商品成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayus2',
                    title: '交易费汇总$',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayzn2',
                    title: '交易费汇总￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'inpackagefeermb2',
                    title: '包装成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'expressfarermb2',
                    title: '运费成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'devofflinefee2',
                    title: '死库处理￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'netprofit2',
                    title: '毛利润￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                }
                    ,{
                    field: 'netrate2',
                    title: '毛利率%',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },
                    {
                        field: 'timegroup3',
                        title: '时间段',
                        sortable: true,
                        editable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },{
                    field: 'salemoneyrmbus3',
                    title: '销售额$',
                    sortable: true,
                    editable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                }, {
                    field: 'salemoneyrmbzn3',
                    title: '销售额￥',
                    sortable: true,
                    align: 'center',
                    editable: {
                        type: 'text',
                        title: 'Item Price',
                        validate: function (value) {
                            value = $.trim(value);
                            if (!value) {
                                return 'This field is required';
                            }
                            if (!/^\$/.test(value)) {
                                return 'This field needs to start width $.'
                            }
                            var data = $table.bootstrapTable('getData'),
                                index = $(this).parents('tr').data('index');
                            console.log(data[index]);
                            return '';
                        }
                    },
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'costmoneyrmb3',
                    title: '商品成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayus3',
                    title: '交易费汇总$',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayzn3',
                    title: '交易费汇总￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'inpackagefeermb3',
                    title: '包装成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'expressfarermb3',
                    title: '运费成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'devofflinefee3',
                    title: '死库处理￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'netprofit3',
                    title: '毛利润￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'netrate3',
                    title: '毛利率%',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                }

                ]



            ]
        });


        // sometimes footer render error.
        setTimeout(function () {
            $table.bootstrapTable('resetView');
        }, 200);
        $table.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table.bootstrapTable('getSelections').length);

            // save your data, here just save the current page
            selections = getIdSelections();
            // push or splice the selections if you want to save all data selections
        });
        $table.on('expand-row.bs.table', function (e, index, row, $detail) {
            if (index % 2 == 1) {
                $detail.html('Loading from ajax request...');
                $.get('LICENSE', function (res) {
                    $detail.html(res.replace(/\n/g, '<br>'));
                });
            }
        });
        $table.on('all.bs.table', function (e, name, args) {
            console.log(name, args);
        });
        $remove.click(function () {
            var ids = getIdSelections();
            $table.bootstrapTable('remove', {
                field: 'id',
                values: ids
            });
            $remove.prop('disabled', true);
        });
        $(window).resize(function () {
            $table.bootstrapTable('resetView', {
//                height: getHeight()
            });
        });




        $table2.bootstrapTable({
//            height: getHeight(),
            columns: [
                [
                    {
                        title: '业绩归属人2',
                        field: 'salername2',
                        rowspan: 2,
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                        footerFormatter: totalTextFormatter
                    }
                    ,{
                    title: '按 0-6个月 6-12月 12月以上 分段',
                    colspan: 20,
                    align: 'center'
                }

                ],
                [
                    {
                        field: 'timegroup',
                        title: '时间段',
                        sortable: true,
                        editable: true,
                        footerFormatter: totalNameFormatter,
                        align: 'center'
                    },{
                    field: 'salemoneyrmbus',
                    title: '销售额$',
                    sortable: true,
                    editable: true,
                    footerFormatter: totalNameFormatter,
                    align: 'center'
                }, {
                    field: 'salemoneyrmbzn',
                    title: '销售额￥',
                    sortable: true,
                    align: 'center',
                    editable: {
                        type: 'text',
                        title: 'Item Price',
                        validate: function (value) {
                            value = $.trim(value);
                            if (!value) {
                                return 'This field is required';
                            }
                            if (!/^\$/.test(value)) {
                                return 'This field needs to start width $.'
                            }
                            var data = $table.bootstrapTable('getData'),
                                index = $(this).parents('tr').data('index');
                            console.log(data[index]);
                            return '';
                        }
                    },
                    footerFormatter: totalPriceFormatter
                }, {
                    field: 'costmoneyrmb',
                    title: '商品成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayus',
                    title: '交易费汇总$',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'ppebayzn',
                    title: '交易费汇总￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'inpackagefeermb',
                    title: '包装成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'expressfarermb',
                    title: '运费成本￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'devofflinefee',
                    title: '死库处理￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                },{
                    field: 'netprofit',
                    title: '毛利润￥',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                }
                    ,{
                    field: 'netrate',
                    title: '毛利率%',
                    sortable: true,
                    align: 'center',
                    footerFormatter: totalNameFormatter,

                }

                ]



            ]
        });


        // sometimes footer render error.
        setTimeout(function () {
            $table2.bootstrapTable('resetView');
        }, 200);
        $table2.on('check.bs.table uncheck.bs.table ' +
            'check-all.bs.table uncheck-all.bs.table', function () {
            $remove.prop('disabled', !$table2.bootstrapTable('getSelections').length);

            // save your data, here just save the current page
            selections = getIdSelections();
            // push or splice the selections if you want to save all data selections
        });
        $table2.on('expand-row.bs.table', function (e, index, row, $detail) {
            if (index % 2 == 1) {
                $detail.html('Loading from ajax request...');
                $.get('LICENSE', function (res) {
                    $detail.html(res.replace(/\n/g, '<br>'));
                });
            }
        });
        $table2.on('all.bs.table', function (e, name, args) {
            console.log(name, args);
        });
        $remove.click(function () {
            var ids = getIdSelections();
            $table2.bootstrapTable('remove', {
                field: 'id',
                values: ids
            });
            $remove.prop('disabled', true);
        });
        $(window).resize(function () {
            $table2.bootstrapTable('resetView', {
//                height: getHeight()
            });
        });
    }



    function getIdSelections() {
        return $.map($table.bootstrapTable('getSelections'), function (row) {
            return row.id
        });
    }

    function responseHandler(res) {
        $.each(res.rows, function (i, row) {
            row.state = $.inArray(row.id, selections) !== -1;
        });
        return res;
    }

    function detailFormatter(index, row) {
        var html = [];
        $.each(row, function (key, value) {
            html.push('<p><b>' + key + ':</b> ' + value + '</p>');
        });
        return html.join('');
    }

    function operateFormatter(value, row, index) {
        return [
            '<a class="like" href="javascript:void(0)" title="Like">',
            '<i class="glyphicon glyphicon-heart"></i>',
            '</a>  ',
            '<a class="remove" href="javascript:void(0)" title="Remove">',
            '<i class="glyphicon glyphicon-remove"></i>',
            '</a>'
        ].join('');
    }

    window.operateEvents = {
        'click .like': function (e, value, row, index) {
            alert('You click like action, row: ' + JSON.stringify(row));
        },
        'click .remove': function (e, value, row, index) {
            $table.bootstrapTable('remove', {
                field: 'id',
                values: [row.id]
            });
        }
    };

    function totalTextFormatter(data) {
        return 'Total';
    }

    function totalNameFormatter(data) {
        return data.length;
    }

    function totalPriceFormatter(data) {
        var total = 0;
        $.each(data, function (i, row) {
            total += +(row.price.substring(1));
        });
        return '$' + total;
    }

    function getHeight() {
        return $(window).height() - $('h1').outerHeight(false);
    }

    $(function () {
        var scripts = [
                location.search.substring(1) || '/Public/assets/bootstrap-table/src/bootstrap-table.js',
                '/Public/assets/bootstrap-table/src/extensions/export/bootstrap-table-export.js',
                'http://rawgit.com/hhurz/tableExport.jquery.plugin/master/tableExport.js',
                '/Public/assets/bootstrap-table/src/extensions/editable/bootstrap-table-editable.js',
                'http://rawgit.com/vitalets/x-editable/master/dist/bootstrap3-editable/js/bootstrap-editable.js'
            ],
            eachSeries = function (arr, iterator, callback) {
                callback = callback || function () {};
                if (!arr.length) {
                    return callback();
                }
                var completed = 0;
                var iterate = function () {
                    iterator(arr[completed], function (err) {
                        if (err) {
                            callback(err);
                            callback = function () {};
                        }
                        else {
                            completed += 1;
                            if (completed >= arr.length) {
                                callback(null);
                            }
                            else {
                                iterate();
                            }
                        }
                    });
                };
                iterate();
            };

        eachSeries(scripts, getScript, initTable);
    });

    function getScript(url, callback) {
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.src = url;

        var done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState ||
                this.readyState == 'loaded' || this.readyState == 'complete')) {
                done = true;
                if (callback)
                    callback();

                // Handle memory leak in IE
                script.onload = script.onreadystatechange = null;
            }
        };

        head.appendChild(script);

        // We handle everything using the script element injection
        return undefined;
    }
</script>
</body>
</html>