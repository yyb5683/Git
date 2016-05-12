<?php 
    //按分类形式生成的二级页
    require './init.php';
    $search = $_GET['s'];


    //按分类ID去查询商品数据
    $sql = "
    SELECT i.iname, g.gname, g.price, g.zan
    FROM ".PRE."goods g, ".PRE."image i
    WHERE g.id = i.goods_id AND i.cover=1 AND g.state=1 AND g.gname LIKE '%$search%'";
    $list = query($link, $sql);
    // v($list);exit;
    
    //以下请自重! 
 ?>



<!DOCTYPE html>
<html lang="cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上面3个meta标签*必须*放在最前面 -->
    <title>Bootstrap 基本模版</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="./public/js/html5shiv.min.js"></script>
      <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/my1.css">
  </head>
  <body>

              <nav>
              <ul class="nave-top w">
                <li class="yidong"><a href="./index.php">首页</a></li>

                <li><a href="./index.php">小米网</a></li>
                <li><a href="#">MIUI</a></li>
                <li><a href="#">米聊</a></li>
                <li><a href="#">游戏</a></li>
                <li><a href="#">多看阅读</a></li>
                <li><a href="#">云服务</a></li>
                <li><a href="#">小米移动版</a></li>
                <li><a href="#">问题反馈</a></li>
                <li><a href="#">Select Region</a></li>
              
                 <div class="denglu fr">登录 | 注册</div>  

              </ul>
             
              
                </nav> <!-- end nav -->

          
                <div class="fenlei w bb">
                 
                <div class="logo fl"><img src="./2016-05-01_124116.png"></div>
                <div >
                <ul class="nave-a ">
                
                <li class="aa"><a href="./list.php">全部商品分类</a></li>

                <li>
                <?php if (!empty($c_list)): ?>

                <?php foreach ($c_list as $val): ?>
                <li><a href="./list.php?cate_id=<?php echo $val['id'] ?>"><?php echo $val['cname'] ?></a></li>
                <?php endforeach ?>
                <?php endif ?>
      
                </li>

            <!--     <li><a href="#">小米手机 </a></li>
                <li><a href="#">红米</a></li>
                <li><a href="#">平板</a></li>
                <li><a href="#">电视</a></li>
                <li><a href="#">盒子</a></li>
                <li><a href="#">路由器</a></li>
                <li><a href="#">智能硬件</a></li>
                <li><a href="#">服务</a></li>
                <li><a href="#">社区</a></li> -->
              </div>
              
              <div>
         <form class="navbar-form navbar-left" role="search">
   
            </form>
              </div>
        </div><!--end feilei-->



        <div class="shouxuan w"><!--hongmi-->
        <div>
          <p class="pinban">首选 &nbsp/&nbsp 选购手机 · 平板</p>
        </div>


        <div class="ys">
                <ul class="nave-b">
                
                <li class="cc"><a href="#">选购手机&nbsp·&nbsp</a></li>
                 <li><a href="#">小米手机5 </a></li>
                <li><a href="#">小米Note </a></li>
                <li><a href="#">红米手机4s</a></li>
                <li><a href="#">小米4c</a></li>
                <li><a href="#">小米手机4</a></li>
                <li><a href="#">红米Not3</a></li>
                <li><a href="#">小米平板</a></li>
                <li><a href="#">手机对比</a></li>
                
              </div>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="./imgs/T1aZDjBCYv1RXrhCrK.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="./imgs/T1NTZjBbdT1RXrhCrK.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
      <div class="item">
      <img src="./imgs/T1XedjByCv1RXrhCrK.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


