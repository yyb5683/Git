<!-- 注册页面 -->
<?php require './init.php' ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>用户登录</title>
    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/my.css">
    <link rel="stylesheet" href="./public/login.css">
    </head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>


<div class="conatiner">
<div calss="row mt50"></div>

    
    <h2 class="text-center">登录</h2>





   <form action="./com/logindo.php" method="post" class="form-horizontal col-md-4 col-md-offset-4">

        <div class="form-group">
            <div class="col-md-12">
                <input type="text" name="name" class="form-control input-lg" placeholder="请输入用户名..">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-12">
                <input type="password" name="pwd" class="form-control input-lg" placeholder="请输入密码">
            </div>
        </div>


        <div class="form-group">
            <div class="col-md-12">
                <div class="pull-left">
                    <input type="text" name="vcode" class="form-control" placeholder="验证码">
                </div>
                <div class="pull-right">
                <img src="./com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" class="pull-right">
                </div>
            </div>
        </div>
        

      <div class="form-group">
        <div class="col-md-12">
          <button type="submit" class="btn btn-primary btn-lg btn-block">登录</button>
          <a href="./zh.php" class="pull-left">忘记密码?</a>
          <a href="./reg.php" class="pull-right">立即注册</a>
        </div>
      </div>

    </form>
  




</div><!--end conatiner-->














<!-- 引入尾部 -->
<?php require PATH.'com/footer-1.php'; ?>


<script src="./public/js/holder.min.js"></script>
<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>