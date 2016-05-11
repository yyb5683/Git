<?php 
    require '../init.php';
    $sql = "
    SELECT g.id, g.gname, g.price, g.stock, g.sale, g.is_new, g.is_hot, g.state, g.zan, g.msg, c.cname, i.iname
    FROM ".PRE."goods g,".PRE."category c,".PRE."image i
    WHERE g.cate_id = c.id AND g.id = i.goods_id AND cover=1
     ";
    $list = query($link ,$sql);
    // p($list);exit;
    


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
     $sql = "SELECT count(*) total FROM s47_goods $where";
    $row = query($link, $sql);

    $total = $row[0]['total'];
    
    //每页显示数
    $num =1;
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
        <h2>商品管理</h2>

        <?php if (empty($list)): ?>
            <h2 class="text-center">暂无数据</h2>
        <?php else: ?>
        <?php foreach ($list as $val): ?>
            <table class="table table-bordered table-hover h4">
                <tr>
                    <th class="col-md-1">ID:<?php echo $val['id'] ?></th>
                    <th class="col-md-1">商品名</th>
                    <th class="col-md-3">所属分类</th>
                    <th class="col-md-1">价格</th>
                    <th class="col-md-1">库存</th>
                    <th class="col-md-1">销量</th>
                    <th class="col-md-1">赞量</th>
                    <th class="col-md-1">上架</th>
                    <th class="col-md-1">热销</th>
                    <th class="col-md-1">新品</th>
                </tr>
                <tr>
                    <td colspan="2"><?php echo $val['gname'] ?></td>
                    <td><?php echo $val['cname'] ?></td>
                    <td><?php echo $val['price'] ?></td>
                    <td><?php echo $val['stock'] ?></td>
                    <td><?php echo $val['sale'] ?></td>
                    <td><?php echo $val['zan'] ?></td>
                    <td>
                        <a href="./action.php?a=state&state=<?php echo $val['state']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['state']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./action.php?a=is_hot&is_hot=<?php echo $val['is_hot']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['is_hot']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                    <td>
                        <a href="./action.php?a=is_new&is_new=<?php echo $val['is_new']?>&id=<?php echo $val['id'] ?>">
                        <?php echo $val['is_new']==0?'<span class="glyphicon glyphicon-remove"></span>':'<span class="glyphicon glyphicon-ok"></span>'; ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                    <img src="<?php echo getpath(ADMIN_URL.'../uploads/', $val['iname'], 'b') ?>">
                    </td>
                    <td colspan="5"><?php echo $val['msg'] ?></td>
                    <td colspan="5">
                        <div class="col-md-12 mt20">
                            <a href="./edit.php?id=<?php echo $val['id'] ?>" class="btn btn-primary btn-block">商品信息编辑</a>
                        </div>
                        <div class="col-md-12 mt20">
                            <a href="./img.php?goods_id=<?php echo $val['id'] ?>" class="btn btn-success btn-block">商品图片编辑</a>
                        </div>
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

        

