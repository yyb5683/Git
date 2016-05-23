<?php
    require './init.php'; 
    
// p($_SESSION['cart']);
// exit;

if(empty($_SESSION['home'])){
     redirect('您还未登录请登录.....', URL.'login.php',1);
     exit;


}



// $sql="SELECT `oname`,`phone`,`address` FROM ".PRE."address WHERE ";

// p($_SESSION);
// p($_GET);

// @$address=$_POST['address'];
// @$oname=$_POST['oname'];
// @$phone=$_POST['phone'];
// @$allprice=$_GET['total'];



// $date=date('Ymd').mt_rand(0,999999);
// $user_id=$_SESSION['home']['id'];



// @$_SESSION['order']['date']=$date; 
// @$_SESSION['order']['address']=$address;
// @$_SESSION['order']['oname']=$oname;
// @$_SESSION['order']['phone']=$phone;
// @$_SESSION['order']['allprice']=$allprice;

// p($_SESSION['order']);

























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
    <div class="container">
        <div class="row">
            <div class="col-sm-2"><h4>收货人信息</h4></div>
            <form action="" method="post">
            <div class="col-sm-12">
                <dl class="dl-horizontal">
                    <dt>订单号</dt>
                    <dd>
                        <?php 
                        $ordernum = date('Ymd').mt_rand(10000,99999);
                        echo $ordernum;
                         ?>
                    </dd>
                    <dt>订单总价</dt>
                    <dd><?php 
                    $allprice = 0;
                    foreach ($_SESSION['cart'] as $key => $val) {
                        $allprice += $val['price'] * $val['qty'];
                        }
                        echo $allprice;
                     ?></dd>
                    <dt>用户名</dt>
                    <dd><?php echo $_SESSION['home']['name'] ?></dd>
                    <dt>收件人</dt>
                    <dd><input type="text" name="oname" placeholder="请输入收件人"></dd>
                    <dt>移动电话</dt>
                    <dd><input type="text" name="phone" placeholder="请输入移动电话"></dd>
                    <dt>地址</dt>
                    <dd><input type="text" name="address" placeholder="请输入收件地址"></dd>
                    
                     <dt>保存收货人信息</dt>
                     <dd><button type="submit" class="btn btn-danger" onclick="if(confirm('确认地址?')==false)return false" >保存收货地址</button></dd>
                </dl>
            </div><!-- endcol12 -->

            </form>

                <?php 
                if (!empty($_POST)) {


                        $_SESSION['order']['ordernum'] = $ordernum;
                        $_SESSION['order']['user_id'] = $_SESSION['home']['id'];
                        $_SESSION['order']['oname'] = $_POST['oname'];
                        $_SESSION['order']['phone'] = $_POST['phone'];
                        $_SESSION['order']['address'] = $_POST['address'];
                        $_SESSION['order']['allprice'] = $allprice;

                        // p($_SESSION['order']);

                         $phone=$_SESSION['order']['phone'];
                         $address=$_SESSION['order']['address'];
                         $oname=$_SESSION['order']['oname'];

                        // echo '<tr class="active">收件人</tr>';
                        // echo '<td class="active"><input type="text" name="oname" value="'.$oname.'"></td>';
                        // echo '<tr class="success">移动电话</tr>';
                        // echo '<td class="success"><input type="text" name="phone" value='.$phone.'></td>';
                        // echo '<tr class="warning">收货地址</tr>';
                        // echo '<td class="warning"><input type="text" name="address" value='.$address.'></td>';
                        






                     echo '<div class="col-sm-12">';
                    echo '<dt>收件人</dt>';
                     echo '<dd><input type="text" name="oname" value="'.$oname.'"></dd>';
                     echo '<tr>移动电话</tr>';
                    echo '<dd><input type="text" name="phone" value='.$phone.'></dd>';
                    echo '<tr>收货地址</tr>';
                    echo '<dd><input type="text" name="address" value='.$address.'></dd>';

                     echo '<div>';





                        

                       
                }
                ?>






            <div class="container">
    <div class="row">
        <h1>购物车</h1>
    </div>

    <div class="row">
        <?php if (empty($_SESSION['cart'])): ?>
            <h3>购物车空空如也....</h3>
            <p><a href="./index.php">[继续购物]</a></p>
        <?php else: ?>
            <table class="table">
                <tr>
                    <th>图片</th>
                    <th>商品名</th>
                    <th>价格</th>
                    <th>数量</th>
                    <th>小计</th>
                    <th>操作</th>
                </tr>
                <?php $total = 0; //总价的初始值?>
                <?php foreach ($_SESSION['cart'] as $key => $val): ?>
                <tr>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo @$key ?>&gname=<?php echo @$val['gname'] ?>">
                            <img src="<?php echo @getpath(URL.'uploads/',$val['iname'],'b') ?>">
                        </a>
                    </td>
                    <td>
                        <a href="./contentinfo.php?id=<?php echo @$key ?>&gname=<?php echo @$val['gname'] ?>">
                            <?php echo @$val['gname'] ?>
                        </a>
                    </td>
                    <td><?php echo @$val['price'] ?></td>
                    <td>
                        <a href="./com/cartdo.php?a=jian&goods_id=<?php echo $key ?>&qty=<?php echo $val['qty'] ?>">
                            <span class="glyphicon glyphicon-minus"></span>
                        </a>
                        [ <?php echo $val['qty'] ?> ]
                        <a href="./com/cartdo.php?a=jia&goods_id=<?php echo $key ?>&qty=<?php echo $val['qty'] ?>">
                            <span class="glyphicon glyphicon-plus"></span>
                        </a>
                        
                    </td>
                    <td><?php echo @$val['price'] * $val['qty'] ?></td>
                    <td>
                        <a href="./com/cartdo.php?a=del&goods_id=<?php echo $key ?>">删除</a>
                    </td>
                </tr>
                <?php @$total += $val['price'] * $val['qty'];//总价 ?>
                <?php endforeach ?>
                <tr>
                    <td colspan="6" class="text-right">
                        <a href="./index.php" class="btn btn-success">继续购物</a>
                        <a href="./com/cartdo.php?a=alldel" class="btn btn-danger">清空购物车</a>
                        <a href="./index.php" class="btn btn-default">总计: <?php echo $total ?></a>
                        <a href="ddzx.php?total= <?php echo $total ?>" class="btn btn-primary">去结算</a>
                    </td>
                </tr>
            </table>
        <?php endif ?>
    </div>
</div>
























<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>
<?php require PATH.'com/footer-1.php'; ?>


<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>