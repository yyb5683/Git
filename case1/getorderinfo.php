<?php
    require './init.php'; 
    
    $sql = "SELECT `id`,`cname`,`path` FROM ".PRE."category WHERE `display`='1' order by path";
    $c_list = query($link,$sql);


    

    $row = query($link, $sql);


if(empty($_SESSION['home'])){
     redirect('您还未登录请登录.....', URL.'login.php',1);
     exit;


}




















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


  

                <form id="sheng" class="form-inline" action="./dizhi.php" method="post">

                
                <tr><h3 class="h3">选择收货地址</h3></tr>
                <tr>
                    &nbsp;&nbsp;省:&nbsp;<select name="省" class="form-control">
                    <option value="上海市">上海市</option>
                        <option  value="山东">山东</option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>
                     
                     &nbsp;&nbsp;市:&nbsp;<select name="市" class="form-control">
                        <option value="上海市">上海市</option>
                        <option value="泰安">泰安</option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select>

                     &nbsp;&nbsp;区:&nbsp;<select name="区" class="form-control">
                        <option value="浦东新区">浦东新区</option>
                        <option value="新泰">新泰</option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                        <option></option>
                    </select><br><br>


                </tr>
                <tr>
                <th>邮政编码:</th>
                <td>
                <input type="text" name="yzbm" class="form-control" name="yz">
                </td>

                </tr><br><br>
                <tr>
                    <th>街道地址:</th>
                    <td>
                        <input type="textarea"  class="form-control"name="dz">
                    </td>
                </tr><br><br>
                <tr>
                    <th>收货人姓名:</th>
                    <td><input type="text" class="form-control" name="username"></td>
                </tr><br><br>
                <tr>
                    <th>手机号:</th>
                    <td><input type="text" class="form-control" name="tel"></td>
                </tr><br><br>
                <tr>
                    <button type="submit">确认地址</button>
                    <button>取消</button>
                </tr>
                    
                
                    
                </form>
           





















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
                        <a href="getorderinfo.php?a=add" class="btn btn-danger btn-lg ">去支付</a>
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