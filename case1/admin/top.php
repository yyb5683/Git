<!-- TOP -->
<?php require './init.php'; ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>top</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/admin.css">
</head>
<body>
<nav id="hs" class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="./index.php">
          <!-- <img src="../imgs/1111.jpg" id="logo">   -->
      </a>
    </div>

    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li><a href="./index.php" target="_top">我的商城后台</a></li>
        <li><a href="./user/index.php" target="main">用户管理</a></li>
        <li><a href="./category/index.php" target="main">分类管理</a></li>
        <li><a href="#">商品管理</a></li>
        <li><a href="#">订单管理</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../index.php" target="_top">回商城首页</a></li>
        <li><a href="#">最近登录时间: <?php echo date('Y年m月d日 H:i:s') ?></a></li>
        <li><a href="#">用户: <?php echo $_SESSION['admin']['name'] ?></a></li>
        <li><a href="./logout.php" target="_top">退出</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>