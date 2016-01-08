<?php
/**
 * Created by PhpStorm.
 * User: m_xuelu
 * Date: 2015/12/18
 * Time: 23:14
 */
?>
<!DOCTYPE html>
<html>
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta property="qc:admins" content="2454325707607535017636" />
    <meta property="wb:webmaster" content="fe395b364e508212" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <!-- Site Properities -->
    <title>哇扑-看你所看，想你所想</title>
    <!--公共css文件-->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="/public/owl-carousel/owl.theme.css">
    <link href="/public/css/public.css" rel="stylesheet">
    <!--公共JS文件-->
    <script src="http://cdn.bootcss.com/jquery/2.1.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="/public/owl-carousel/owl.carousel.js"></script>
    <script>
        $(function() {
            $('.btn-qq').bind('click', function() {
                window.open('/login/index?type=qq',
                    "哇扑-QQ登录",
                    "width=450,height=320,menubar=0,scrollbars=1, resizable=1,status=1,titlebar=0,toolbar=0,location=1");
            });
        });
    </script>
</head>
<body>
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="/"><b>WallP</b></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="/" title="主页">
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    </a>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">
                <?php if(isset($_SESSION['user:id'])): ?>
                    <li><a href="javascript:void(0);" class="">你好：<?=$_SESSION['user:name']?></a></li>
                    <li><a href="/login/logout">登出</a></li>
                <?php else: ?>
                    <li><a href="javascript:void(0);" class="btn-qq"></a></li>
                    <li><a href="#">微信登录</a></li>
                <?php endif;?>
            </ul>
        </div><!-- /.nav-collapse -->
    </div><!-- /.container -->
</nav>