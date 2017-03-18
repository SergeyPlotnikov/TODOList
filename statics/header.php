<?php
/**
 * Created by PhpStorm.
 * User: Sergey
 * Date: 29.05.2016
 * Time: 13:06
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Todo Maker</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../jQueryUI/jquery-ui.min.css">
    <script src="../jquery-1.12.1.js"></script>
    <script src="../jQueryUI/jquery-ui.min.js"></script>
    <script>
        $(function () {
            var currentValue = $("#progressValue").val();
            $("#due_date").datepicker({
                dateFormat: "yy-mm-dd"
            });
            $("#seekbar").slider({
                range: "max",
                min: 0,
                max: 100,
                value: currentValue,
                slide: function (event, ui) {
                    $("#progress").html(ui.value + '%');
                    $("#progressValue").val(ui.value);
                }
            });
            //  $("#progressValue").val($("#seekbar").slider("value"));
        });
    </script>
</head>
<body>
<div id="mainWrapper" class="clearfix">
    <div id="td_container" class="clearfix">
        <div id="sidebar">
            <h2>Main menu</h2>
            <ul class="nav nav-pills nav-stacked">
                <li><a href="index.php?label=Inbox"><i class="glyphicon glyphicon-envelope"></i>Inbox</a></li>
                <li><a href="index.php?label=ReadLater"><i class="glyphicon glyphicon-book"></i>Read later</a></li>
                <li><a href="index.php?label=Important"><i class="glyphicon glyphicon-star"></i>Important</a></li>
                <li><a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Logout</a></li>
            </ul>
        </div>
