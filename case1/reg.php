<!-- 注册页面 -->
<?php require './init.php' ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>seeker商城</title>
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

    
    <h2 class="text-center">欢迎注册,快乐购物</h2>




<form action="./com/regdo.php" method="post" class="form-horizontal col-md-7 h4">
 <div class="form-group">
      <label for="uesr" class="col-md-3 control-label">用户名</label>
      <div class="col-md-9">
      <input type="text" name="name" id="user" class="form-control" placeholder="请输入用户名">
      <span class="xing">* 以字母开头,4-15个字符,由数字字母下划线组成</span>

      </div>
    </div>

    <div class="form-group">
      <label for="uesr" class="col-md-3 control-label">密码</label>
      <div class="col-md-9">
      <input type="password" name="pwd" id="user" class="form-control" placeholder="请输入密码" id="pwd">
      <span class="xing">* 由4-32位组成</span>

      </div>
    </div>

        <div class="form-group">
            <label for="repwd" class="col-md-3 control-label">确认密码</label>
            <div class="col-md-9">
                <input type="password" name="repwd" class="form-control" id="repwd" placeholder="请再次确认,密码">
                <span class="xing">* 由4-32位组成</span>
            </div>
        </div>


        <div class="form-group">
            <label for="tel" class="col-md-3 control-label">手机</label>
            <div class="col-md-9">
                <input type="text" name="tel" class="form-control" id="tel" placeholder="请输入11位手机号...">
                <span class="xing">* 请输入合法的手机号</span>
            </div>
        </div>




        <div class="form-group">
            <label for="email" class="col-md-3 control-label">邮箱</label>
            <div class="col-md-9">
                <input type="email" name="email" class="form-control" id="email" placeholder="请输入邮箱">
                <span class="xing">* 请输入合法的邮箱</span>
            </div>
        </div>



        <div class="form-group">
            <div class="col-md-9 col-md-offset-3">
                <div class="pull-left">
                    <input type="text" name="vcode" class="form-control" placeholder="验证码">
                </div>
                <div class="pull-right">
                <img src="./com/yzm.php" title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" class="pull-right">
                </div>
            </div>
        </div>



        <div class="form-group">
        <div class="col-md-offset-3 col-md-9">
          <button type="submit" class="btn btn-primary">注册</button>
          <button type="reset" class="btn btn-danger pull-right">重置</button>
        </div>
      </div>


 
</form>

    <div class="col-md-5">
        <img src="holder.js/300x400" class="center-block">
    </div>





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