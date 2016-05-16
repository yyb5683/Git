<?php
    require './init.php'; 
    
    $sql = "SELECT `id`,`cname`,`path` FROM ".PRE."category WHERE `display`='1' order by path";
    $c_list = query($link,$sql);


    

    $row = query($link, $sql);


if(empty($_SESSION['home'])){
     redirect('您还未登录请登录.....', URL.'login.php',1);
     exit;


}

$total = $_GET['total'];
// p($total);


$_SESSION['allprice']=$total;

// p($_POST);


p($_SESSION);
$oname=$_SESSION['oname'];
$phone=$_SESSION['phone'];
$address=$_SESSION['address'];


















?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/bitcoin-blank.png" type="image/png" sizes="16x16">
    <title>小米商城</title>
    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    
    <link rel="stylesheet" href="./public/my1.css">
    <link rel="stylesheet" href="./public/my-c.css">
</head>
<body>
<!-- 引入导航条 -->
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

                 <div class="fenlei w">
                 
                <!-- <div class="logo fl"><img src="./2016-05-01_124116.png"></div> -->
                <div >
                <ul class="nave-a ">
                
                <li class="ab"><h1>确认订单</h1></li>
                </ul>

                </div>
                </div>


  

                <form id="sheng" class="form-horizontal" action="./getorderinfo.php" method="post">

                
                <tr><h3 class="h3">选择收货地址</h3></tr>
             

               

                <tr>
             
                

                </tr><br><br>
                <tr>
                    <th>详细地址省市区街道:</th>
                    <td>
                        <input type="textarea"  class="form-control"name="address">
                    </td>
                </tr><br><br>
                <tr>
                    <th>收货人姓名:</th>
                    <td><input type="text" class="form-control" name="oname"></td>
                </tr><br><br>
                <tr>
                    <th>手机号:</th>
                    <td><input type="text" class="form-control" name="phone"></td>
                </tr><br><br>
                <tr>
                    <button type="submit" class="btn btn-primary">保存地址</button>
                    <button type="reset" class="btn btn-primary">取消</button>
                </tr>
                    
                
                    
                </form><br><br>

             
                <form id="sheng" class="form-horizontal" action="./dizhi.php" method="post">

                
             
             

               

           
                <tr>
                    <th>详细地址省市区街道:</th>
                    <td>
                        <input type="textarea"  class="form-control"name="address" value="<?php echo $address?>">
                    </td>
                </tr><br><br>
                <tr>
                    <th>收货人姓名:</th>
                    <td><input type="text" class="form-control" name="oname" value="<?php echo $oname?>"</td>
                </tr><br><br>
                <tr>
                    <th>手机号:</th>
                    <td><input type="text" class="form-control" name="phone" value="<?php echo $phone?>"></td>
                </tr><br><br>
                <tr>
                    <button type="submit" class="btn btn-primary">保存地址</button>
                    <button type="reset" class="btn btn-primary">取消</button>
                </tr>
                    
                
                    
                </form>


























<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>
<?php require PATH.'com/footer-1.php'; ?>


<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>