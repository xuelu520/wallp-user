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
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properities -->
    <title>Fixed Menu Example - Semantic</title>
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/reset.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/site.min.css" rel="stylesheet">

    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/container.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/grid.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/header.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/image.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/menu.min.css" rel="stylesheet">

    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/divider.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/list.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/segment.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/dropdown.min.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/semantic-ui/2.1.6/components/icon.min.css" rel="stylesheet">
    <link href="/public/css/public.css" rel="stylesheet">
</head>
<body>
<div class="ui fixed inverted menu">
    <div class="ui container">
        <a href="#" class="header item">
            <h1>哇扑</h1>
        </a>
        <a href="#" class="item">Home</a>
        <div class="ui simple dropdown item">
            Dropdown <i class="dropdown icon"></i>
            <div class="menu">
                <a class="item" href="#">Link Item</a>
                <a class="item" href="#">Link Item</a>
                <div class="divider"></div>
                <div class="header">Header Item</div>
                <div class="item">
                    <i class="dropdown icon"></i>
                    Sub Menu
                    <div class="menu">
                        <a class="item" href="#">Link Item</a>
                        <a class="item" href="#">Link Item</a>
                    </div>
                </div>
                <a class="item" href="#">Link Item</a>
            </div>
        </div>
    </div>
</div>

<div class="ui main text container">
