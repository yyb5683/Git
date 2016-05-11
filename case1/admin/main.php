<?php require './init.php'; ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>main</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/admin.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <h2 id="yyb" class="col-md-12">尹义斌的商城后台管理系统</h2>
        <p id="tj" class="col-md-12">
            <a href="./user/add.php" class="btn btn-primary">添加用户</a>
            <a href="#" class="btn btn-success">添加商品</a>
            <a href="#" class="btn btn-info">查看商品</a>
            <a href="#" class="btn btn-warning">处理订单</a>
            <a href="http://www.baidu.com" class="btn btn-default">我要百度</a>
        </p>
    </div>

    <div class="row">
        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">最新订单</div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">订单统计</div>
              <div class="panel-body">
                GD
              </div>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">商城统计</div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div>

        <div class=" col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">Panel heading without title</div>
              <div class="panel-body">
                Panel content
              </div>
            </div>
        </div>
        
    </div><!-- END row -->
</div><!-- END container -->



<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>