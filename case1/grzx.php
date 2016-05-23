<?php
 require './init.php';




            // p($sql);
            // p($list);

    $where = '';
    $urlname = '&a=qq';
    $name = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE `name` LIKE '%$name%'";//SQL查询条件
        $urlname = "&name=$name";//url的参数
    }

        //分页开始
    //总记录数
    $sql = "SELECT count(*) total FROM ".PRE."order $where";
    $row = query($link, $sql);
    $total = $row[0]['total'];
    //每页显示数
    $num = 3;
    //总页数
    $allpage = ceil($total / $num);

        //获取页码
    // p($_GET);
    // exit;
    $page = isset($_GET['page'])?(int)$_GET['page']:1;
    //限制页码范围
    //页码:不能小于1 不能大于$allpage
    $page = max(1,$page);//[0,1]
    $page = min($page,$allpage);//[接收的页数,总页数]

    //获取偏移量
    $offset = ($page-1) * $num;
    //获取上一夜/下一夜
    $prev = $page - 1;
    $next = $page + 1;

    //控制数组页码的显示
    $start = max($page - 2, 1);
    $end = min($page + 2, $allpage);

    $pageurl = 'grzx.php';
    //产生数字链接
    $num_link = '';
    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $num_link .= '<li class="active"><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
        }
        $num_link .= '<li><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
    }
  
    // $sql="SELECT ordernum,id,status FROM ".PRE."order $where LIMIT $offset,$num";
    //     $list = query($link ,$sql);


        //显示当前页查询到的记录数量
        // $rows = mysqli_affected_rows($link);
        // p($rows);
        // exit;
        







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


        $user_id=$_SESSION['home']['id'];
// p($user_id);
 
//
             $sql="
                     SELECT ordernum,id,status
                     FROM ".PRE."order
                     WHERE user_id=$user_id $where LIMIT $offset,$num
                    
            ";

            $list=query($link,$sql);

            //显示当前页查询到的记录数量
        $rows = mysqli_affected_rows($link);





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
                <li><a href="./404.html">MIUI</a></li>
                <li><a href="./404.html">米聊</a></li>
                <li><a href="./404.html">游戏</a></li>
                <li><a href="./404.html">多看阅读</a></li>
                <li><a href="./404.html">云服务</a></li>
                <li><a href="./404.html">小米移动版</a></li>
                <li><a href="./404.html">问题反馈</a></li>
                <li><a href="./404.html">Select Region</a></li>

                 <div class="denglu2 fr"><a href="./showcart.php">购物车</a></div>  
                 <div class="denglu fr"><a href="./grzx.php?a=qq">我的订单</a></div>  
                 <div class="denglu1 fr"><a href="./grzx.php?a=gg">个人中心</a></div>  


              

              </ul>
              </nav> <!-- end nav -->


          <div class="fenlei w bb">
              <div class="logo fl"><img src="./imgs/1312_1_1357479179_3.jpg"></div>
              <div >
                <ul class="nave-a ">
                        <li class="aa"><a href="./grzx.php?a=qq"> <h2><button type="button" class="btn btn-info btn-lg">全部订单</button></h2></a></li>
                        <li class="aa"><a href="./grzx.php?a=yy"> <h2><button type="button" class="btn btn-info btn-lg">已完成订单</button></h2></a></li>
                        <li class="aa"><a href="./grzx.php?a=ww"> <h2><button type="button" class="btn btn-info btn-lg">未完成订单</button></h2></a></li>
                        <li><a href="./grzx.php?a=gg"><h2><button type="button" class="btn btn-info btn-lg">个人信息</button></h2></a></li>
                        <li><a href="./grzx.php?a=xx"><h2><button type="button" class="btn btn-info btn-lg">修改密码</button></h2></a></li>
                      <!--   <li><a href="./grzx.php?a=ll"><h2><button type="button" class="btn btn-info btn-lg">兄弟连s47</button></h2></a></li>
                        <li><a href="./grzx.php?a=aa"><h2><button type="button" class="btn btn-info btn-lg">A组</button></h2></a></li>
                         -->
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

                                  echo '已发货<br>';
                                  echo '<a href="./action1.php?a=shou&id='.$id.'&status=2"><button type="button" class="btn btn-warning">确定收货</button>';

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
echo '<div calss="row mt20"></div><br><br><br>';

    
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

        }if($a=='gg') {
          // p($_SESSION['home']);
          $id=$_SESSION['home']['id'];
          // exit;
          // $id=
           $sql="SELECT `id`,`name`,`pwd`,`tel`,`sex`,`email`,`logincount` FROM ".PRE."user WHERE `id`='$id'";
           $list=query($link,$sql);
           // p($sql);
           // p($list);
         
       
                foreach($list as $val ){
          
           
              echo '<form class="form-inline " action="./bj.php?a=bj" method="post">';

              echo '<div class="form-group"><br><br><br><br>';
               echo '<input type="hidden" name="id" value="'.$val['id'].'">';
              echo '<label for="exampleInputName2">姓名:</label>';
              echo '<input type="text" class="form-control"name="name" placeholder="Jane Doe" value="'.@$val['name'].'"></div>';
              echo '<div class="form-group">';
              echo '<label for="exampleInputEmail2">电话</label>';
echo '<input type="text" class="form-control" name="tel" placeholder="请输入合法的手机号" value="'.$val['tel'].'"></div>';
              echo '<label for="exampleInputName2">邮箱:</label>';
              echo '<input type="text" class="form-control" name="email" placeholder="Jjane.doe@example.com" value="'.$val['email'].'"></div>';
              
              echo '<div class="radio">';
              echo '<label>';
              echo '<input type="radio" name="sex" value=1 checked='.($val['sex']==1 ? '"checked"':'').'>';
              echo '男';
              echo '</label>';
              echo '</div>';
              echo '<div class="radio">';
              echo '<label>';
              echo '<input type="radio" name="sex" value=0 checked='.($val['sex']==0 ? '"checked"':'').'>';
              echo '女';  
              echo '</label>';
              echo '</div>';
              echo '<div class="radio">';
              echo '<label>';
              echo '<input type="radio" name="sex" value=2 checked='.($val['sex']==2 ? '"checked"':'').'>';
              echo '保密';
              echo '</label>';
              echo '</div>';

              echo '<a class="btn btn-success" href="./grzx.php?a=xx">去修改密码</a>';echo '<button type="submit" class="btn btn-default">编辑可修改资料</button>';
              echo '</form>';

              }
                 }else{
                  if($a=='yy'){

                     $sql="
                     SELECT ordernum,id
                     FROM ".PRE."order
                     WHERE user_id=$user_id AND status=2
                    ";
                     $list=query($link,$sql);
                     // P($list);

                     if(empty($list)){
                      echo '<h2 class="text-center">暂无完成的订单</h2>';
                     }else{

                      foreach ($list as $val) {
                        $id = $val['id'];
                        echo '<table class="table table-bordered table-hover h4">';
                            echo '<tr>';

                                echo '<th class="col-md-1">商品图片:</th>';
                                echo '<th class="col-md-2">订单号:'.$val['ordernum'].'</th>';
                                echo '<th class="col-md-1">商品名</th>';
                                echo '<th class="col-md-1">价格</th>';
                                echo '<th class="col-md-1">数量</th>';
                                echo '<th class="col-md-1">收件人</th>';
                                echo '<th class="col-md-1">状态</th>';
                               

                            echo '<tr>';


                            $sql="
           SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status,g.stock,i.iname
            FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g,".PRE."image i
            WHERE order_id=$id AND og.goods_id=g.id AND og.order_id=o.id AND og.goods_id = i.goods_id";
                $row=query($link,$sql);

                // p($row);


                      foreach ($row as $v){
                        echo '<tr>';

                                  echo '<td colspan="2"><img src="'.getpath(URL.'uploads/',$v['iname'],'b').'"></td>';
                                  echo '<td>'.$v['gname'].'</td>';
                                  echo '<td>'.$v['price'].'</td>';
                                  echo '<td>'.$v['qty'].'</td>';
                                  echo '<td>'.$v['oname'].'</td>';
                                  echo '<td>';

                                    $status=$v['status'];

                                switch($status){

                                  case '0': 

                                  echo '未发货';echo '<br>';

                                  echo '<a href="./action1.php?a=qu&id='.$v.'&status=3">取消订单';

                                  break;

                                  case '1':

                                  echo '已发货<br>';
                                  echo '<a href="./action1.php?a=shou&id='.$v.'&status=2"><button type="button" class="btn btn-warning">确定收货</button>';

                                  break;

                                  case '2':

                                  echo '订单已完成';

                                  break;

                                  case '3':

                                  echo '订单已撤销';

                                  break;
                                }




                                  echo '</td>';
                                  

                        echo '</tr>';
                      }


                      echo '</table>';

                      }


                     }


                  }
                 }if ($a=='ww') {

                    $sql="
                     SELECT ordernum,id
                     FROM ".PRE."order
                     WHERE user_id=$user_id AND status=0
                    ";
                    // p($sql);
                     $list=query($link,$sql);
                     // p($list);

                       if(empty($list)){
                      echo '<h2 class="text-center">暂无未完成的订单</h2>';
                     }else{
                      foreach ($list as $values){

                             $id = $values['id'];

                     echo '<table class="table table-bordered table-hover h4">';
                            echo '<tr>';

                                echo '<th class="col-md-1">商品图片:</th>';
                                echo '<th class="col-md-2">订单号:'.$values['ordernum'].'</th>';
                                echo '<th class="col-md-1">商品名</th>';
                                echo '<th class="col-md-1">价格</th>';
                                echo '<th class="col-md-1">数量</th>';
                                echo '<th class="col-md-1">收件人</th>';
                                echo '<th class="col-md-1">状态</th>';
                               

                            echo '</tr>';


                            $sql="
           SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status,g.stock,i.iname
            FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g,".PRE."image i
            WHERE order_id=$id AND og.goods_id=g.id AND og.order_id=o.id AND og.goods_id = i.goods_id";
                $row=query($link,$sql);
                           foreach ($row as $li){
                                echo '<tr>';

                                      echo '<td colspan="2"><img src="'.getpath(URL.'uploads/',$li['iname'],'b').'"></td>';
                                      echo '<td>'.$li['gname'].'</td>';
                                      echo '<td>'.$li['price'].'</td>';
                                      echo '<td>'.$li['qty'].'</td>';
                                      echo '<td>'.$li['oname'].'</td>';
                                      echo '<td>';

                                      $status=$li['status'];

                                switch($status){

                                  case '0': 

                                  echo '未发货';echo '<br>';

                                  echo '<a href="./action1.php?a=qu&id='.$id.'&status=3">取消订单';

                                  break;

                                  case '1':

                                  echo '已发货<br>';
                                  echo '<a href="./action1.php?a=shou&id='.$id.'&status=2"><button type="button" class="btn btn-warning">确定收货</button>';

                                  break;

                                  case '2':

                                  echo '订单已完成';

                                  break;

                                  case '3':

                                  echo '订单已撤销';

                                  break;
                                }



                                      echo'</td>';
                                  

                                 echo '</tr>';

                          }
                            echo '</table>';
                      }
 
                    }


                  }
  
        ?>

                </table>
                <?php require PATH.'./page.php';?>
        </div>

    <!-- 此处引入jQuery --> 
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>
