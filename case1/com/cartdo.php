<?php 
    require '../init.php';
    //接收用户动作
    $a = $_GET['a'];
    // p($a);exit;

    //购物车的处理页面
    //session之中来存放购物车数据
    
    /*分析购物车里面该放什么信息,该怎么放
        cart的构成:
            商品的ID
            商品的名字
            商品的图片
            商品的当前价格(因为会涨价)
            购买数量
        [cart]
            array(
                商品的ID => array('qty'=>'1','price'=>'88');
                商品的ID => array('qty'=>'10','price'=>'55.99');
                )
    */
   
   switch ($a) {


        case 'jia':
            $oldqty = $_GET['qty'];
            $goods_id = $_GET['goods_id'];

            //查库存 购买数量小于库存,才做数据处理
            $sql = "SELECT stock FROM ".PRE."goods WHERE id='$goods_id'";
            $row = query($link ,$sql);
            $row = $row[0];
            $stock = $row['stock'];

            //判断 单内的购买量小于库存
            if ($oldqty < $stock) {
                $_SESSION['cart'][$goods_id]['qty'] += 1;
            }
            header("location:".$_SERVER['HTTP_REFERER']);








            break;

        case 'jian':
            $qty = $_GET['qty'];
            $goods_id = $_GET['goods_id'];

            if ($qty == 1) {
                $_SESSION['cart'][$goods_id]['qty'] = 1;
            }else{
                $_SESSION['cart'][$goods_id]['qty'] -= 1;
            }
            header("location:".$_SERVER['HTTP_REFERER']);

            break;

        case 'alldel':
            //扔掉购物车
            unset($_SESSION['cart']);
            header("location:".$_SERVER['HTTP_REFERER']);
            break;

        case 'del':
            //删除购物车内的单条记录
            $goods_id = $_GET['goods_id'];
            unset($_SESSION['cart'][$goods_id]);
            header("location:".$_SERVER['HTTP_REFERER']);
            break;

        case 'buy':
            //接收商品信息
            $goods_id = $_GET['goods_id'];
            $qty = $_GET['qty'];
            
            //通过查询商品表的库存来判断用户购买数量属否合法
             $sql = "SELECT stock FROM ".PRE."goods WHERE id='$goods_id'";
              $row = query($link ,$sql);
              $row=$row['0']['stock'];
              

           
            
            //如果商品已经存在,则只添加数量
            if (!empty($_SESSION['cart'][$goods_id])) {
                //之前的数量加上 新出传过来的数量
                $_SESSION['cart'][$goods_id]['qty'] += $qty;

                if ($_SESSION['cart'][$goods_id]['qty']>$row) {

                    $_SESSION['cart'][$goods_id]['qty']=$row;

                 
                }
                //跳转购物车展示页
                redirect('正在生成购物车.....', URL.'showcart.php',1);
                exit;
            }else{

                 if ($qty>$row) {
                $qty=$row;
                
            }
            }

            //查询商品的信息
            //
            $sql = "
                SELECT i.iname, g.id, g.gname, g.price,g.msg
                FROM ".PRE."goods g, ".PRE."image i
                WHERE g.id = i.goods_id AND i.cover=1 AND g.id='$goods_id'";
            $row = query($link , $sql);
            $row = $row[0];
 
            //将购买数量放入$row数组中
            $row['qty'] = $qty;
            // p($row);exit;
             
            //将信息存入sessino之中
            $_SESSION['cart'][$goods_id] = $row;
            // p($_SESSION['cart']);
            // exit;
            redirect('正在生成购物车.....', URL.'showcart.php',1);
            break;


             case 'add':
            $goods_id = $_GET['goods_id'];
            $qty = $_GET['qty'];
            // if (!empty($_SESSION['cart'][$goods_id])) {
                //之前的数量加上 新出传过来的数量
                // $_SESSION['cart'][$goods_id]['qty'] += $qty;
                //跳转购物车展示页
                // redirect('已成功加入购物车.....', URL.'gouwuche.php',1);
                // exit;
            // }


            $sql = "
                SELECT i.iname, g.id, g.gname, g.price
                FROM ".PRE."goods g, ".PRE."image i
                WHERE g.id = i.goods_id AND i.cover=1 AND g.id='$goods_id'";
            $row = query($link , $sql);
            $row = $row[0];
            //将加入数量放入$row数组中
            $row['qty'] = $qty;
            p($row);

              //将信息存入sessino之中
            $_SESSION['cart'][$goods_id] = $row;
            // p($_SESSION['cart']);
            // exit;
            redirect('成功加入购物车.....', URL.'gouwuche.php',1);
            break;

   }
   

