<?php
 require './init.php';



 
//
             $sql="
                     SELECT o.ordernum, o.id
                     FROM ".PRE."order o,".PRE."image i,".PRE."ordergoods r,".PRE."goods g
                     WHERE o.id=r.order_id AND r.goods_id = i.goods_id AND cover=1 AND g.id=r.goods_id
            ";

            $list=query($link,$sql);
            p($sql);
            p($list);







           // $sql="
           //          SELECT o.ordernum,i.iname, o.id,g.gname,o.status
           //          FROM ".PRE."order o,".PRE."image i,".PRE."ordergoods r,".PRE."goods g
           //          WHERE o.id=r.order_id AND r.goods_id = i.goods_id AND cover=1 AND g.id=r.goods_id
           // ";
           
           


           //  p($sql); 


           
           $sql="
                    SELECT o.ordernum,i.iname, o.id,g.gname,o.status
                    FROM ".PRE."order o,".PRE."image i,".PRE."ordergoods r,".PRE."goods g
                    WHERE o.id=r.order_id AND r.goods_id = i.goods_id AND cover=1 AND g.id=r.goods_id
           ";

            $row=query($link,$sql);
            p($row);







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
    <div class="row">
        <h1>全部订单</h1>
    </div>

    <div class="row">
        <?php if (empty($row)): ?>
            <h3>没有订单信息</h3>
            <p><a href="./index.php">[继续购物]</a></p>
        <?php else: ?>
            <?php foreach ($row as $key =>$val):?>

            <table class="table">
                <tr >

                    <th class="col-md-4">订单号:<?php echo $val['ordernum']?></th>
                    <th>商品名</th>
                    <th>订单id:<?php echo $val['id']?></th>
                    <th>状态</th>
                    
                </tr>
                
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
                    <td>
                        
                    </td>
                    <td>

                        <?php echo $val['status']==0?'未发货':'已发货';?>


                    </td>
                
                   
                        
                        
                        
                    
                </tr>
                
                
             
            <?php endforeach ?>
            </table>
        <?php endif ?>
    </div>
</div>













        





































































     

    
    
    <!-- 此处引入jQuery --> 
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>
