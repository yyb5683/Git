<?php 


    require '../init.php';
   $user_id=$_SESSION['home']['id'];
    $sql="
                     SELECT ordernum,id,status
                     FROM ".PRE."order
                     WHERE user_id=$user_id
                    
            ";

            $list=query($link,$sql);



    $where = '';
    $urlname = '';
    $name = '';
    if (isset($_GET['name']) && !empty($_GET['name'])) {
        $name = $_GET['name'];
        $where = "WHERE `name` LIKE '%$name%'";//SQL查询条件
        $urlname = "&name=$name";//url的参数
    }

    //分页开始
    //总记录数
     $sql = "SELECT count(*) total FROM ".PRE."goods $where";
    $row = query($link, $sql);



    $total = $row[0]['total'];
    // p($total);exit;
    
    //每页显示数
    $num =2;
    //总页数
    $allpage = ceil($total / $num);

    //获取页码
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

    $pageurl = 'index.php';
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
    //5.SQL语句
    

    
    $sql = "SELECT `id`,`gname`,`cate_id`,`price`,`stock`,`sale`,`is_new`,`is_hot`,`state`,`zan`,`msg`
    FROM ".PRE."goods $where LIMIT $offset,$num";
     
    //处理结果集
    $user_list = query($link,$sql);

    // echo'<pre>';
    // print_r($user_list);
    // exit;
    //显示当前页查询到的记录数量
    $rows = mysqli_affected_rows($link);
    //  p($row);
    // exit;


    
    //8.关闭MYSQL连接
    mysqli_close($link);

    // p($user_list);exit;





?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>cate-list</title>

    <!-- Bootstrap -->
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
        <h2>订单管理</h2>

        <?php if (empty($list)): ?>
            <h2 class="text-center">暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $val): ?>
            <table class="table table-bordered table-hover h4">

                <?php foreach($list as $values){ 
                    $id=$values['id'];?>
                    ?>
                <tr>
                    <th class="col-md-1">ID:<?php echo $values['id'] ?></th>
                    <th class="col-md-1">商品名</th>
                    <th class="col-md-1">订单号</th>
                    <th class="col-md-1">价格</th>
                    <th class="col-md-1">数量</th>
                    <th class="col-md-1">强制收货</th>
                    <th class="col-md-1">收件人</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $val['gname'] ?></td>
                  
                    <td><?php echo $val['ordernum'] ?></td>
                    <td><?php echo $val['price'] ?></td>
                    <td><?php echo $val['qty'] ?></td>
                 
               
                  
                   
                    <td>
                        <a href="./action.php?a=status&status=<?php echo $val['status']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['status']==0?'未发货':'已发货'; ?>
                        </a>



                    </td>
                        
                    <td>
                     <?php echo $val['oname'] ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <img src="<?php echo getpath(ADMIN_URL.'../uploads/', $val['iname'], 'b') ?>">
                    </td>
                    
                    <td colspan="5">
                       
                    </td>
                </tr>
            </table>

        <?php endforeach ?>

        <?php endif ?>

         <?php require ADMIN_PATH.'../com/page.php'; ?>
    </div>

</div>



    <!-- 此处引入jQuery -->
    <script src="../public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="../public/js/bootstrap.min.js"></script>
</body>
</html>

        

