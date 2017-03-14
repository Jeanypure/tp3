<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <title>from-data</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/Public/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/Public/assets/bootstrap-table/src/bootstrap-table.css">
    <link rel="stylesheet" href="/Public/assets/examples.css">
    <script src="/Public/assets/jquery.min.js"></script>
    <script src="/Public/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/Public/assets/bootstrap-table/src/bootstrap-table.js"></script>
    <script src="../ga.js"></script>
</head>
<body>
<div class="container">
    <h1>From data</h1>
    <p></p>
    <table id="table">
        <thead>
        <tr>
            <th data-field="id">ID</th>
            <th data-field="name">Item Name</th>
            <th data-field="price">Item Price</th>
        </tr>
        </thead>
    </table>
</div>
<script>
    var $table = $('#table');
    $(function () {
        $table.bootstrapTable({
            url: '/Demo/Index/echo_Json',
            refresh: 'glyphicon-refresh icon-refresh',


        });
    });
</script>
</body>
</html>