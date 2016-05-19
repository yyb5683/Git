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
                
                <li  class="yidong"><a href="./index.php">小米网</a></li>
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
                        <li class="aa"><a href="./grzx.php?a=qq"> <h2><button type="button" class="btn btn-info btn-lg">全部订单</button></h2></a></li>
                        <li class="aa"><a href="./grzx.php?a=yy"> <h2><button type="button" class="btn btn-info btn-lg">已完成订单</button></h2></a></li>
                        <li class="aa"><a href="./grzx.php?a=ww"> <h2><button type="button" class="btn btn-info btn-lg">未完成订单</button></h2></a></li>
                        <li><a href="./grzx.php?a=gg"><h2><button type="button" class="btn btn-info btn-lg">个人信息</button></h2></a></li>
                        <li><a href="./grzx.php?a=xx"><h2><button type="button" class="btn btn-info btn-lg">修改密码</button></h2></a></li>
                        <li><a href="./grzx.php?a=ll"><h2><button type="button" class="btn btn-info btn-lg">兄弟连s47</button></h2></a></li>
                        <li><a href="./grzx.php?a=aa"><h2><button type="button" class="btn btn-info btn-lg">A组</button></h2></a></li>
                        
                        <!-- <li><a href="#">电视</a></li>
                        <li><a href="#">盒子</a></li>
                        <li><a href="#">路由器</a></li>
                        <li><a href="#">智能硬件</a></li>
                        <li><a href="#">服务</a></li>
                        <li><a href="#">社区</a></li> -->
          </div>
              
          <div class="kuang1 fl">
                <!--   <form>
                        <input class="kuang" type="text" name="kuang"placeholder="小米手机4c" >
         <!-- <input class="sb" type="submit" value=""> -->
                  <!-- </form> --> 
          </div>
        </div><!--end feilei-->

        <div class="container">
                <table class="table">

            <?php 
             // p($_GET);
            @$a=$_GET['a'];
             if ($a=='qq') {
               # code...
            
            foreach($list as $values){
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
           <?php 

          
           foreach ($list as $li){?>
                <tr>
                      <td> <img src="<?php echo getpath(URL.'uploads/',$li['iname'],'b') ?>"></td>
                      <td><?php echo $li['gname'] ?></td>
                      <td><?php echo $values['id']; ?></td>
                      <td><?php echo $li['qty']; ?></td>
                      <td><?php echo $li['price']; ?></td>
                      <td>
                                <?php 

                                $status=$li['status'];

                                switch($status){

                                  case '0': 

                                  echo '未发货';echo '<br>';

                                  echo '<a href="./action1.php?a=qu&id='.$id.'&status=3">取消订单';

                                  break;

                                  case '1':

                                  echo '已发货';

                                  break;

                                  case '2':

                                  echo '订单已完成';

                                  break;

                                  case '3':

                                  echo '订单已撤销';

                                  break;
                                }


                                ?>
                        <!--       <?php echo $li['status']==0?'<button type="button" class="btn btn-info">取消订单</button>':'<button type="button" class="btn btn-info">已发货</button>'; ?>
 -->






                      </td>
                </tr>

   


        <?php } }  }
        if ($a=='xx') {
       
            echo '<div class="conatiner">';
echo '<div calss="row mt20"></div>';

    
    echo '<h2>重置密码</h2>';





   echo '<form action="./com/mimado.php" method="post" class="form-horizontal col-md-4 col-md-offset-4">';

        echo '<div class="form-group">';
            echo '<div class="col-md-7">';
                echo '用户名:';
                echo '<input type="text" name="name" class="form-control input-lg" placeholder="请输入用户名..">';
            echo '</div>';
        echo '</div>';

        echo '<div class="form-group">';
          echo '<div class="col-md-7">';
                echo '新的密码:';
                echo '<input type="password" name="pwd" class="form-control input-lg" placeholder="请输入新密码">';
                echo '<span class="xing">* 由4-32位组成</span>';

            echo '</div>';


            


            echo '<div class="col-md-7">';
                echo '邮箱地址:';
                echo '<input type="text" name="email" class="form-control input-lg" placeholder="请输入邮箱地址"></div>';
          
            echo '<div class="col-md-7">';
                echo '手机号:';
                echo '<input type="text" name="tel" class="form-control input-lg" placeholder="请输入手机号">';
                echo '<span class="xing">* 请输入合法的手机号</span>';
            echo '</div>';
        echo '</div>';


        

      echo '<div class="form-group">';
        echo '<div class="col-md-7">';
          echo '<button type="submit" class="btn btn-primary btn-lg btn-block">密码重置</button>';
        
        echo '</div>';
      echo '</div>';

    echo '</form>';
  




echo '</div>';



        }if($a=='ll'){

            echo '<img src="./imgs/2016-05-19_205043.png">';

        }
        ?>
 



                </table>

        </div>







      

    <!-- 此处引入jQuery --> 
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>
