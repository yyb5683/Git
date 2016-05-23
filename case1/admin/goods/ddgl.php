<?php 
    require '../init.php';


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
    $sql = "SELECT count(*) total FROM s47_order $where";
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

    $pageurl = 'ddgl.php';
    //产生数字链接
    $num_link = '';
    for ($i = $start; $i <= $end; $i++) {
        if ($page == $i) {
            $num_link .= '<li class="active"><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
            continue;
        }
        $num_link .= '<li><a href="./'.$pageurl.'?page='.$i.$urlname.'">'.$i.'</a></li>';
    }
    echo '<hr>';

    $sql="SELECT ordernum,id,status FROM ".PRE."order $where LIMIT $offset,$num";
        $list = query($link ,$sql);


        //显示当前页查询到的记录数量
        $rows = mysqli_affected_rows($link);
        // p($rows);
        // exit;
        







?>

<!DOCTYPE html>
<html lang="cn">
<head>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cate-list</title>
    <link href="../public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="../public/js/html5shiv.min.js"></script>
    <script src="../public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="../public/admin.css">
</head>
<body>
<div class="container">
    <div class="row">
        <tr>
        <td><a href="./ddgl.php?a=qq"><button type="button" class="btn btn btn-warning btn-lg">全部订单</button></a></td>
        <td><a href="./ddgl.php?a=yy"><button type="button" class="btn btn-info btn-lg">已完成订单</button></a></td>
        <td><a href="./ddgl.php?a=ww"><button type="button" class="btn btn-success btn-lg">未完成订单</button></a></td><br>
        

        </tr>
        
        <?php if (empty($list)): ?>
            <h2 class="text-center">暂无数据</h2>
        <?php else: ?>
        <?php 
            @$a=$_GET['a'];
            if($a=='qq'){

        foreach ($list as $val){
        $id=$val['id'];
        
        
        ?>

            <table class="table table-bordered table-hover h4">
                    <tr>
                                <th class="col-md-1">商品图片:</th>
                                <th class="col-md-2">订单号:<?php echo $val['ordernum'];?></th>
                                <th class="col-md-1">商品名</th>
                                <th class="col-md-1">价格</th>
                                <th class="col-md-1">数量</th>
                                <th class="col-md-1">收件人</th>
                                <th class="col-md-2">状态</th>
                    </tr>
            <?php 

           $sql="
           SELECT og.id,og.goods_id,og.order_id,og.price,og.qty,g.gname,o.address,o.oname,o.status,g.stock,i.iname
            FROM ".PRE."ordergoods og,".PRE."order o,".PRE."goods g,".PRE."image i
            WHERE order_id=$id AND og.goods_id=g.id AND og.order_id=o.id AND og.goods_id = i.goods_id";
                $row=query($link,$sql);
        // p($sql);
        // p($list);
           ?>
           <?php foreach ($row as $li){?>

                <tr>
                                <td colspan="2"><img src="<?php echo getpath(ADMIN_URL.'../uploads/',$li['iname'],'b') ?>"></td>
                                <td><?php echo $li['gname'] ?></td>
                                <td><?php echo $li['price'] ?></td>
                                <td><?php echo $li['qty'] ?></td>
                                <td><?php echo $li['oname'] ?></td>
                                <td>
                                <?php 
                                  // echo $id;
                                  // exit;
                                // echo $val['status'];
                                switch($val['status']){

                                  

                                    case '0':
                                        echo '<a href="./action1.php?a=wei&id='.$id.'&status=1"><button type="button" class="btn btn-warning">点击发货</button></a>';
                                        echo'<a href="./action1.php?a=che&id='.$id.'&status=3"><button type="button" class="btn btn-default">撤单</button>';


                                        break;
                                        case '1':
                                         echo '发货中<br><br>';
                                        echo '<a href="./action1.php?a=fa&id='.$id.'&status=2"><button type="button" class="btn btn-success">点击强制收货</button></a>';echo '<br>';
                                       
                                        break;
                                        case '2':
                                        echo '订单已完成<br><br>';
                                        echo ' <a href="">查看评论</a>';
                                        break;
                                        case '3':
                                        echo '订单已取消';
                                    

                                }



 
                                ?>

















                    </td>



                </tr>


                                    <?php } }  }if($a=='yy'){

                                         $sql="
                     SELECT ordernum,id
                     FROM ".PRE."order
                     WHERE status=2
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
                            foreach($row as $v){
                                echo '<tr>';
                                        echo '<td colspan="2"><img src="'.getpath(ADMIN_URL.'../uploads/',$v['iname'],'b').'"></td>';
                                        echo '<td>'.$v['gname'].'</td>';
                                        echo '<td>'.$v['price'].'</td>';
                                        echo '<td>'.$v['qty'].'</td>';
                                        echo '<td>'.$v['oname'].'</td>';
                                        echo '<td>';

                                        switch($v['status']){

                                  

                                    case '0':
                                        echo '<a href="./action1.php?a=wei&id='.$id.'&status=1"><button type="button" class="btn btn-warning">点击发货</button></a>';
                                        echo'<a href="./action1.php?a=che&id='.$id.'&status=3"><button type="button" class="btn btn-default">撤单</button>';


                                        break;
                                        case '1':
                                        echo '<a href="./action1.php?a=fa&id='.$id.'&status=2"><button type="button" class="btn btn-success">点击强制收货</button></a>';echo '<br>';
                                        echo '发货中';
                                        break;
                                        case '2':
                                        echo '订单已完成';
                                        break;
                                        case '3':
                                        echo '订单已取消';
                                    

                                }
                                        echo '</td>';



 

                                   echo '</tr>';

                            }
                            echo '</table>';

                         }
                    }

                                    }if($a=='ww'){

                                        $sql="
                                                SELECT ordernum,id
                                                FROM ".PRE."order
                                                WHERE status=0
                                                ";
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

                                                                            echo '<td colspan="2"><img src="'.getpath(ADMIN_URL.'../uploads/',$li['iname'],'b').'"></td>';
                                                                            echo '<td>'.$li['gname'].'</td>';
                                                                            echo '<td>'.$li['price'].'</td>';
                                                                            echo '<td>'.$li['qty'].'</td>';
                                                                            echo '<td>'.$li['oname'].'</td>';
                                                                            echo'<td>';

                                                                            switch($li['status']){

                                  

                                                                                case '0':
                                                                                            echo '<a href="./action1.php?a=wei&id='.$id.'&status=1"><button type="button" class="btn btn-warning">点击发货</button></a>';
                                                                                            echo'<a href="./action1.php?a=che&id='.$id.'&status=3"><button type="button" class="btn btn-default">撤单</button>';


                                                                                            break;
                                                                                case '1':
                                                                                            echo '<a href="./action1.php?a=fa&id='.$id.'&status=2"><button type="button" class="btn btn-success">点击强制收货</button></a>';echo '<br>';
                                                                                            echo '发货中';
                                                                                            break;
                                                                                case '2':
                                                                                            echo '订单已完成';
                                                                                        
                                                                                            break;
                                                                                case '3':
                                                                                            echo '订单已取消';
                                    

                                }




                                                                            echo '</td>';

                                                            echo '</tr>';


                                                                        }


                                                echo '</table>';


                                                    }
                                                 }
                                    }
                                    ?>

                            <?php endif ?>
                           
               
                </table>

                <?php require ADMIN_PATH.'./goods/page.php';?>


            </div>
        
    </div>



    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        
