<?php
require './init.php';


//订单号生成
$date=date('Ymd').mt_rand(0,9999999);
$ordernum=$_SESSION['order']=$date;




// p($_SESSION['cart']);

//接受用户传过来的信息

// p($_SESSION['order']);
// exit;

     foreach ($_POST as $key => $val) {
                if ($val == '') {
                    redirect('请完善表单信息!','',12345676543);
                    exit;
                }
            }

// p($_GET);
$address=$_POST['address'];
$oname=$_POST['oname'];
$phone=$_POST['phone'];
// echo $allprice=$_GET['total'];
//得到用户id和商品信息
$user_id=$_SESSION['home']['id'];
$allprice =$_SESSION['allprice'];

$_SESSION['address']=$address;
$_SESSION['oname']=$oname;
$_SESSION['phone']=$phone;

 // header("location:".$_SERVER['HTTP_REFERER']);

// P($_SESSION);


// $keys= '';
// $values = '';
// foreach($_POST as $key=>$val){
//     $key .="`$key`";
//     $val .="'$val'";

// }
// $keys=rtrim($keys,',');
// $values =rtrim($values,',');

// $sql="INSERT INTO `s47_order`(`ordernum`,`user_id`,`oname`,`phone`,`address`,`allprice`) VALUES('$ordernum','$user_id','$oname','$phone','$address','$allprice')"; 

// p($sql);


// $row=execute($link,$sql);
// p($row);




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










                
                <h1 class="sp">商品:</h1>

<div class="container mt30">
    <div class="row">
        
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
                    <!-- <th>操作</th> -->
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
                         
                        </a>
                         <?php echo $val['qty'] ?> 
                        <a href="./com/cartdo.php?a=jia&goods_id=<?php echo $key ?>&qty=<?php echo $val['qty'] ?>">
                           
                        </a>
                        
                    </td>
                    <td><?php echo @$val['price'] * $val['qty'] ?></td>
                    
                </tr>
                <?php @$total += $val['price'] * $val['qty'];//总价 ?>
                <?php endforeach ?>
                <tr>
                    <td colspan="6" class="text-right">
                        
                       
                        <a class="btn btn-default btn-lg">应付总额: <?php echo $total ?>元</a>
                        <a href="grdd.php?goods_id=<?php echo $key?>&qty=<?php echo $val['qty']?>&price=<?php echo $val['price']?>&total=<?php echo $total ?>" class="btn btn-danger btn-lg ">去支付</a>
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


















?>
