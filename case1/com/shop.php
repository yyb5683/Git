<?php
    //商品ID
    $goods_id = $_GET['id'];
    //查询商品详情
    $sql = "
        SELECT i.iname, g.id, g.gname, g.price, g.stock, g.sale, g.msg, g.zan
        FROM ".PRE."goods g, ".PRE."image i
        WHERE g.id = i.goods_id AND i.cover=1 AND g.id='$goods_id';";

    $list = query($link, $sql);
    $list = $list[0];//去除0下标
    // p($list);
    
    //将该商品的所有非封面全部查出来
    $sql = "SELECT iname FROM ".PRE."image WHERE goods_id='$goods_id' AND cover=0";
    $img_list = query($link, $sql);
    // p($img_list);
?>

<div class="container mt50">
    <div class="row mt50">
        <div class="col-md-5 pull-left">

            <div class="thumbnail">
              <img id="big" src="<?php echo getpath(URL.'uploads/',$list['iname'],'d') ?>">
              <div class="row mt10">
                  <ul>
                      <li class="col-md-3 spic">
                        <img onmouseover="changesrc(this)" src="<?php echo getpath(URL.'uploads/',$list['iname'],'a') ?>">
                      </li>
                      <?php if (!empty($img_list)): ?>
                      <?php foreach ($img_list as $val): ?>
                      <li class="col-md-3 spic">
                        <img onmouseover="changesrc(this)" src="<?php echo getpath(URL.'uploads/',$val['iname'],'a') ?>">
                      </li>
                      <?php endforeach ?>
                      <?php endif ?>
                  </ul>
              </div>
            </div>

        </div><!-- END pull-left -->

        <div class="col-md-5 pull-left">
            <div class="row">
                <h2><?php echo $list['gname'] ?></h2>
                <p><?php echo $list['msg'] ?></p>
            </div>
            <div class="row">
                <h2 class="col-md-6 red">
                    <span class="glyphicon glyphicon-jpy"></span>
                    <?php echo $list['price'] ?>
                </h2>
                <h1 class="col-md-3 col-md-offset-1">
                    <a href="" class="red zan">
                        <span class="glyphicon glyphicon-heart"></span>
                        <?php echo $list['zan'] ?>
                    </a>
                </h1>
            </div>
            <form action="./com/cartdo.php" method="get">
                <!-- 隐藏域放入商品的ID -->
                <input type="hidden" name="goods_id" value="<?php echo $goods_id ?>">
                <div class="row mt10">
                    <h4 class="col-md-2">数量:</h4>
                    <div class="col-md-4">
                        <button type="button" class="btn col-md-3" onclick="minus()">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <div class="col-md-6">
                             <input type="text" name="qty" value="1" maxlength="3" class="form-control text-center zan" id="num">
                        </div>
                        <button type="button" class="btn col-md-3" onclick="plus()">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </div>
                    <span class="col-md-3 h4">库存: <?php echo $list['stock'] ?></span>
                    <span class="col-md-3 h4">销量: <?php echo $list['sale'] ?></span>
                </div>
                <div class="row mt30">
                    <div style="height:5px;" class="col-md-12 bg-success"></div>
                    <div class="col-md-12 mt20">
                        <!-- 点击后跳转到购物车页面 -->
                        <button type="submit" name="a" value="buy" class="btn btn-danger" <?php echo $list['stock']==0?'disabled':''; ?>>立即购买</button>
                        <!-- 点击后只加入购物车的内容,页面不跳转 -->
                        <button type="submit" name="a" value="add" class="btn btn-success" onclick="if(confirm('你确定要加入购物车吗?')==false)return false">加入购物车</button>
                    </div>
                </div>
            </form>
        </div><!-- END pull-right -->
    </div><!-- END row -->
</div><!-- END container -->
