<?php
 require './init.php';


$user_id=$_SESSION['home']['id'];
// p($user_id);
 
//
             $sql="
                     SELECT ordernum,id,status
                     FROM ".PRE."order
                     WHERE user_id=$user_id
                    
            ";

            $list=query($link,$sql);
            // p($sql);
            // p($list);








           // $sql="
           //          SELECT o.ordernum,i.iname, o.id,g.gname,o.status
           //          FROM ".PRE."order o,".PRE."image i,".PRE."ordergoods r,".PRE."goods g
           //          WHERE o.id=r.order_id AND r.goods_id = i.goods_id AND cover=1 AND g.id=r.goods_id
           // ";
           
           


           //  p($sql); 


           
           // $sql="
           //          SELECT i.iname, o.id,g.gname
           //          FROM ".PRE."order o,".PRE."image i,".PRE."ordergoods r,".PRE."goods g
           //          WHERE o.id=r.order_id AND r.goods_id = i.goods_id AND cover=1 AND g.id=r.goods_id
           // ";

           //  $row=query($link,$sql);
           //  p($row);

            // foreach( $row as $val ){
            //   p($val['0']);
            // }








 ?>



<!DOCTYPE html>
<html lang="cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上面3个meta标签*必须*放在最前面 -->
    <title>个人中心</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">


    <link rel="stylesheet" href="./public/my4.css">
  </head>
  <body>
            <nav>
              <ul class="nave-top w">
                
                <li  class="yidong"><a href="#">小米网</a></li>
                <li><a href="#">MIUI</a></li>
                <li><a href="#">米聊</a></li>
                <li><a href="#">游戏</a></li>
                <li><a href="#">多看阅读</a></li>
                <li><a href="#">云服务</a></li>
                <li><a href="#">小米移动版</a></li>
                <li><a href="#">问题反馈</a></li>
                <li><a href="#">Select Region</a></li>

                 <div class="denglu2 fr"><a href="">购物车</a></div>  
                 <div class="denglu fr"><a href="./grdd.php">我的订单</a></div>  
                 <div class="denglu1 fr"><a href="">个人中心</a></div>  


              

              </ul>
              </nav> <!-- end nav -->


                <div class="fenlei w bb">
            <div class="logo fl"><img src="./gerenzhongxin/2016-05-03_135219.png"></div>
              <div >
                <ul class="nave-a ">
                
                <li class="aa"><a href="#">全部商品分类</a></li>
                <li><a href="#">小米手机 </a></li>
                <li><a href="#">红米</a></li>
                <li><a href="#">平板</a></li>
                <li><a href="#">电视</a></li>
                <li><a href="#">盒子</a></li>
                <li><a href="#">路由器</a></li>
                <li><a href="#">智能硬件</a></li>
                <li><a href="#">服务</a></li>
                <li><a href="#">社区</a></li>
              </div>
              
              <div class="kuang1 fl">
         <form>
         <input class="kuang" type="text" name="kuang"placeholder="小米手机4c" >
         <!-- <input class="sb" type="submit" value=""> -->
   
        </form>
              </div>
        </div><!--end feilei-->

        <div class="container">
        <table class="table">

        <?php foreach($list as $values){
           $id=$values['id'];?>

           <tr>
                  <th>商品</th>
                  <th>订单号：<?php echo $values['ordernum']; ?></th>
                  <th>订单id</th>
                  <th>数量</th>
                  <th>价格</th>
                  <th>状态</th>

           </tr>
        
           <?php 
           $sql="
           SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status,g.stock,i.iname
            FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g,".PRE."image i
            WHERE order_id=$id AND og.goods_id=g.id AND og.order_id=o.id AND og.goods_id = i.goods_id";
        $list=query($link,$sql);
        // p($sql);
        // p($list);
           ?>
           <?php foreach ($list as $li){?>
           <tr>
                  <td> <img src="<?php echo getpath(URL.'uploads/',$li['iname'],'b') ?>"></td>
                  <td><?php echo $li['gname'] ?></td>
                  <td><?php echo $values['id']; ?></td>
                  <td><?php echo $li['qty']; ?></td>
                  <td><?php echo $li['price']; ?></td>
                  <td><?php echo $li['status']; ?></td>
           </tr>

   


        <?php } }?>
 



        </table>
        </div>






      

    <!-- 此处引入jQuery --> 
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>
