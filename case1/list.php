<?php 

    require './init.php';

    



    //按分类形式生成的二级页
    
    

    // p($gname);
    // exit;
    //按用户点过来的名字去查询商品数据
    // $gname = $_POST['gname'];
     
    // if (isset($_POST['gname']) && !empty($_POST['gname'])) {
    //     $gname = $_POST['gname'];
    //     $where = "WHERE `name` LIKE '%$name%'";
    // }

    

    

    

    //接收用户点击过来的分类ID
    if (empty($_GET['cate_id'])) {
        $cate_id = 1;
    }else{
        $cate_id = $_GET['cate_id'];
    }



    //将此ID下的所有子孙的ID全部都查出来
    
    //1.拼接自己的 "path,id," 条件
    $sql = "SELECT cname,concat(path,id,',') bpath FROM ".PRE."category WHERE id='$cate_id'";

    $row1 = query($link, $sql);
    // p($row1);
    $cname = $row1[0]['cname'];
    // p($cname);
    $bpath = $row1[0]['bpath'];
     // p($bpat);exit;

    // //2.按照当前的bpath,查询出所有的子孙的ID
    // $sql = "SELECT id FROM ".PRE."category WHERE path LIKE '$bpath%'";
    // $ids = query($link, $sql);
    // // p($ids);
    
    // //得到每个子分类的ID,就可以用in查询来查每个分类下的商品情况
    // // "SELECT * FROM s47_goods WHERE cate_id in(1,2,6,14,16)"
    
    // //生成in查询的id们
    // $id_list = "$cate_id,";
    // foreach ($ids as $val) {
    //     $id_list .= $val['id'].',';
    // }
    // $id_list = rtrim($id_list,',');
    // // echo $id_list;
    
    // //按分类ID去查询商品数据
    // $sql = "
    // SELECT i.iname, g.gname, g.price, g.zan
    // FROM ".PRE."goods g, ".PRE."image i
    // WHERE g.id = i.goods_id AND i.cover=1 AND g.state=1 AND cate_id in($id_list)";
    // $list = query($link, $sql);
    // // v($list);exit;

    //按分类ID去查询商品数据
    $sql = "
    SELECT i.iname, g.gname, g.price, g.zan,g.msg,g.id
    FROM ".PRE."goods g, ".PRE."image i
    WHERE g.id = i.goods_id AND i.cover=1 AND g.state=1 AND cate_id in(SELECT id FROM ".PRE."category WHERE path LIKE '$bpath%')";
    $list = query($link, $sql);
    
    // p($list);
    // exit;
    
    
    
    //以下请自重! 
    $sql = "SELECT `id`,`cname`,`path` FROM ".PRE."category WHERE `display`='1' order by path";
    $c_list = query($link,$sql);
    // p($c_list);
    // exit;
    // 
    
 ?>

<!DOCTYPE html>
<html lang="cn">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上面3个meta标签*必须*放在最前面 -->
    <title>Bootstrap 基本模版</title>

    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="./public/js/html5shiv.min.js"></script>
      <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/my1.css">
  </head>
  <body>

              <nav>
              <ul class="nave-top w">
                <li class="yidong"><a href="./index.php">首页</a></li>

                <li><a href="./index.php">小米网</a></li>
                <li><a href="./404.html">MIUI</a></li>
                <li><a href="./404.html">米聊</a></li>
                <li><a href="./404.html">游戏</a></li>
                <li><a href="./404.html">多看阅读</a></li>
                <li><a href="./404.html">云服务</a></li>
                <li><a href="./404.html">小米移动版</a></li>
                <li><a href="./404.html">问题反馈</a></li>
                <li><a href="./404.html">Select Region</a></li>
              
                 <div class="denglu fr">登录 | 注册</div>  

              </ul>
             
              
                </nav> <!-- end nav -->

          
                <div class="fenlei w bb">
                 
                <div class="logo fl"><img src="./2016-05-01_124116.png"></div>
                <div >
                <ul class="nave-a ">
                
                <li class="aa"><a href="./index.php">全部商品分类</a></li>

                <li>
                <?php if (!empty($c_list)): ?>

                <?php foreach ($c_list as $val): ?>
                <li><a href="./list.php?cate_id=<?php echo $val['id'] ?>"><?php echo $val['cname'] ?></a></li>
                <?php endforeach ?>
                <?php endif ?>

      
                </li>

            <!--     <li><a href="#">小米手机 </a></li>
                <li><a href="#">红米</a></li>
                <li><a href="#">平板</a></li>
                <li><a href="#">电视</a></li>
                <li><a href="#">盒子</a></li>
                <li><a href="#">路由器</a></li>
                <li><a href="#">智能硬件</a></li>
                <li><a href="#">服务</a></li>
                <li><a href="#">社区</a></li> -->
              </div>
              
              <div>
         <form class="navbar-form navbar-left" role="search">
   
            </form>
              </div>
        </div><!--end feilei-->



        <div class="shouxuan w"><!--hongmi-->
        <div>
          <p class="pinban">首选 &nbsp/&nbsp 选购手机 · 平板</p>
        </div>


        <div class="ys">
                <ul class="nave-b">
                
                <li class="cc"><a href="#">选购手机&nbsp·&nbsp</a></li>

                <?php $sql = "
                                SELECT i.iname, g.gname, g.price, g.zan,g.msg,g.id
                                FROM ".PRE."goods g, ".PRE."image i
                                WHERE g.id = i.goods_id AND i.cover=1 AND g.state=1 AND cate_id in(SELECT id FROM ".PRE."category WHERE path LIKE '$bpath%')";
                                $list = query($link, $sql);?>
                <?php if (!empty($list)): ?>

                <?php foreach ($list as $v): ?>
                <li><a href=""><?php echo $v['gname'] ?></a></li>
                <?php endforeach ?>
                <?php endif ?>

                 <!-- <li><a href="#">小米手机5 </a></li>
                <li><a href="#">小米Note </a></li>
                <li><a href="#">红米手机4s</a></li>
                <li><a href="#">小米4c</a></li>
                <li><a href="#">小米手机4</a></li>
                <li><a href="#">红米Not3</a></li>
                <li><a href="#">小米平板</a></li>
                <li><a href="#">手机对比</a></li> -->
                
              </div>

                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="./imgs/T1aZDjBCYv1RXrhCrK.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="./imgs/T1NTZjBbdT1RXrhCrK.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
      <div class="item">
      <img src="./imgs/T1XedjByCv1RXrhCrK.jpg" alt="...">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    ...
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>






























            <div class="clear"></div>


            <div class="ys1">
            <!-- <img src="./ejy/T1qNDQBvCT1RXrhCrK.jpg"></div> -->
            <div class="clear"></div>

            <div class="ys1">
            <?php if (empty($list)): ?>
            <h2>暂无数据</h2>
            <?php else: ?>

            <?php foreach ($list as $key => $val): ?>
             <div class="sj1 fl ">
              <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
             <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'d') ?>">
             </a>
            <div class="sj1-x">
                 <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
             <span id="sp0"><span class="sp1"><?php echo $val['gname']?><span/> &nbsp <span class="sp2">&nbsp<?php echo $val['price']?></span><span class="sp3">元起</span></span>
             </span>
                <div class="ljgm fr">
             <button type="button" class="btn btn-danger btn-lg">立即购买</button>
             </div>

             <div class="xiaolong ">
             <?php echo $val['msg']?>


             </div>
             
            </div><!--end sj1-x-->
            </div><!--end sj1-->


        <?php endforeach ?>


        <?php endif ?>
        </div>
           <!--    <div class="sj1 fl bb"><img src="./mi5dhy.jpg">
             
              <div class="sj1-x">
                <span id="sp0"><span class="sp1">小米手机5<span/> &nbsp <span class="sp2"> 1999</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">骁龙820处理器,4GB内存,128GB闪存,4轴<br>防抖相机,3D陶瓷机身
                </div>
                </div> -->
         
              <!-- </div>
              </div> -->

<!-- 
            <div class="sj2 fl bb"><img src="./4Sdhy.jpg">
                <div class="sj1-x">
                <span id="sp0"><span class="sp1">小米手机4<span/> &nbsp <span class="sp2"> 1299</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">64GB 全网通旗舰，5" 非凡手感 </div>
                </div>
            </div> -->
            
            <!-- </div>end ys1 -->
            <!-- <br> -->



            <!-- <div class="ys1">
                    <div class="sj3 fl bb"><img src="./h3dhy.jpg">
                    <div class="sj1-x">
                <span id="sp0"><span class="sp1">红米手机3<span/> &nbsp <span class="sp2"> 1999</san><span class="sp3">元起</span></span>
                <div class="xiaolong ">骁龙820处理器,4GB内存,128GB闪存,4轴<br>防抖相机,3D陶瓷机身</div>
                </div>


                    </div> -->


                   <!--  <div class="sj4 fl bb"><img src="./T1kbCjBXCT1RXrhCrK.jpg">
                    <div class="sj1-x">
                <span id="sp0"><span class="sp1">小米Not<span/> &nbsp <span class="sp2"> 1999</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">骁龙820处理器,4GB内存,128GB闪存,4轴<br>防抖相机,3D陶瓷机身</div>
                </div> -->


                    <!-- </div> -->
            <!-- </div> end ys2 -->


                        <!-- <div class="ys1">
                     div class="sj3 fl bb"><img src="./T1jUh_B7hv1RXrhCrK.jpg">
                    <div class="sj1-x">
                <span id="sp0"><span class="sp1">小米手机4c <span/> &nbsp <span class="sp2"> 1099</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">骁龙808旗舰手机,经典的5英寸屏幕与全包围外壳珠联璧合,让你爱不释手 </div>
                </div> -->


                    <!-- </div> -->


                 <!--    <div class="sj4 fl bb"><img src="./T1kbCjBXCT1RXrhCrK.jpg">
                    <div class="sj1-x">
                <span id="sp0"><span class="sp1">小米手机4<span/> &nbsp <span class="sp2"> 1299</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">千万销量经典机型，5英寸屏超窄边。 </div>
                </div>


                    </div> -->
            <!-- </div> end ys2 -->









                        <!-- <div class="ys1">
                    <div class="sj3 fl bb"><img src="./T1u2D_BXEv1RXrhCrK.jpg">
                    <div class="sj1-x">
                <span id="sp0"><span class="sp1">红米Not3<span/> &nbsp <span class="sp2"> 899</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">金属机身,指纹识别,4000mAh轻薄大电池,1300万像素相位对焦相机,双网通 </div>
                </div>


                    </div>
 -->

                    <!-- <div class="sj4 fl bb"><img src="./T1WUE_BCZv1RXrhCrK.jpg">
                    <div class="sj1-x">
                <span id="sp0"><span class="sp1">小米平板2<span/> &nbsp <span class="sp2"> 999</span><span class="sp3">元起</span></span>
                <div class="xiaolong ">轻薄全金属，图书视频游戏，应有尽有。 </div>
                </div>


                    </div> -->
            <!-- </div> end ys2 -->







          
        <!-- </div> -->
        <!--end hongmi-->



    <div class="clear"></div>

        <div class="baozhang bb">
        <!-- <img src="./phone-section-01.png"> -->



        <div class="dh bb">
                        <!-- <img src="./mi-mobile.jpg"> -->
        </div>

        <div class="ze bb">
          <!-- <img src="./phone-section-02.png"> -->
        </div>


        <div class="ze bb">
          <!-- <img src="./phone-section-04.jpg"> -->
        </div>

          



          <div>
      <h2 class="dapei bb"><a href="./404.html">搭配更多智能硬件产品</a></h2>
      <p class="zhong bb"><a href="./404.html">以小米手机为中心，控制智能硬件产品，轻松享受智能生活带来的方便和舒适.</a></p>
      <p class="zhong bb"><a href="./404.html">查看更多智能硬件产品</a></p>
    </div>





          <div class=" bb">
                      <div class="box1 bb fl"><a href="./404.html"><img src="./imgs/T1o0h_B5VT1RXrhCrK220x220.jpg"></a>
                      <div class="box3">
                      <p class="zhong1">小米活塞耳机 基础版</p>
                      <p class="zhong2">新鲜绽放，5 色可选</p>
                      <p class="zhong3">29元</p>
                      </div>
                      </div>

        <div class="box bb fl"><a href="./404.html"><img src="./imgs/T1obJvBghv1RXrhCrK220x220.jpg"></a>
        <div class="box3">
        <p class="zhong1">小米活塞耳机标准版</p>
        <p class="zhong2">音质优化专利，金属复合振膜技术</p>
        <p class="zhong3">69元</p>
        </div>
        </div>






        <div class="box bb fl"><a href="./404.html"><img src="./imgs/T190DvB4dv1RXrhCrK220x220.jpg"></a>
        <div class="box3">
        <p class="zhong1">小米蓝牙耳机</p>
        <p class="zhong2">6.5克轻巧，蓝牙4.1高清通话音质</p>
        <p class="zhong3">79元</p>
        </div>

        </div>
        </div>



        <div class="w bb">

        <div class="box1 bb fl"><a href="./404.html"><img src="./imgs/T1Tfd_BjAv1RXrhCrK220x220.jpg"></a>
        <div class="box3 ">
        <p class="zhong1">小钢炮蓝牙音箱2</p>
        <p class="zhong2">极简设计，声声动听的桌上艺术品</p>
        <p class="zhong3">129元 </p>
        </div>
        </div>

        <div class="box bb fl"><a href="./404.html"><img src="./imgs/T1vFEjBbWT1RXrhCrK220x220.jpg"></a>
        <div class="box3 ">
        <p class="zhong1">小米USB充电器（4口）</p>
        <p class="zhong2">4个USB接口，2A快充，轻巧便携</p>
        <p class="zhong3">69元</p>
        </div>
        </div>

        <div class="box bb fl"><a href="./404.html"><img src="./imgs/T1ggWQBybT1RXrhCrK220x220.jpg"></a>
        <div class="box3 ">
        <p class="zhong1">小米移动电源10000mAh</p>
        <p class="zhong2">高密度进口电芯，仅名片大小</p>
        <p class="zhong3">69元</p>
        </div>
        </div>
        </div>




   

    </div><!--end baozhang-->

    <div class="clear"> </div>


    <div class="footer ">
    <div class="footer-a">
    <span class="footer-b">&nbsp&nbsp&nbsp &nbsp &nbsp <a href="./404.html">1小时快修服务</a>&nbsp &nbsp &nbsp &nbsp |</span>
    <span class="footer-b">&nbsp &nbsp &nbsp &nbsp <a href="./404.html">天无理由退货</a> &nbsp &nbsp &nbsp &nbsp|</span>
    <span  class="footer-b">&nbsp &nbsp &nbsp &nbsp <a href="./404.html">15天免费换货</a>&nbsp &nbsp &nbsp &nbsp|</span>
     <span  class="footer-b">&nbsp &nbsp &nbsp &nbsp <a href="./404.html">满150元包邮</a></span>
    </div>































    <div class="w bb">
                
            <dl class="bzz fl">
                <dt>帮助中心</dt>
                
                <dd><a rel="nofollow" href="./404.html">购物指南</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">支付方式</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">配送方式</a></dd>
                
            </dl>
                
            <dl class="bzz2 fl">
                <dt>服务支持</dt>
                
                <dd><a rel="nofollow" href="./404.html">售后政策</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">自助服务</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">相关下载</a></dd>
                
            </dl>
                
            <dl class="bzz2 fl">
                <dt>线下门店</dt>
                
                <dd><a rel="nofollow" href="./404.html">小米之家</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">服务网点</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">线下专区</a></dd>
                
            </dl>
                
            <dl class="bzz2 fl ">
                <dt>关于小米</dt>
                
                <dd><a rel="nofollow" href="./404.html">了解小米</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">加入小米</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">联系我们</a></dd>
                
            </dl>
                
            <dl class="bzz2 fl">
                <dt>关注我们</dt>
                
                <dd><a rel="nofollow" href="./404.html">新浪微博</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">小米部落</a></dd>
                
                <dd><a rel="nofollow" href="./404.html">官方微信</a></dd>
                
            </dl>
                
            <dl class="bzz2 fl">
                <dt>特色服务</dt>
                
                <dd><a rel="nofollow" href="./404.html" target="_blank">F 码通道</a></dd>
                
                <dd><a rel="nofollow" href="./404.html" target="_blank">小米移动</a></dd>
                
                <dd><a rel="nofollow" href="./404.html" target="_blank">防伪查询</a></dd>
                
            </dl>
                
            <div class="bzz2 fl">
                <p class="phone">400-100-5678</p>
<p><span class="J_serviceTime-normal" style="
">周一至周日 8:00-18:00</span>
<span class="J_serviceTime-holiday" style="display:none;">2月7日至13日服务时间 9:00-18:00</span><br>（仅收市话费）</p>
<a rel="nofollow" class="btn btn-line-primary btn-small" href="./404.html"><i class="iconfont"></i> 24小时在线客服</a>            </div>


        </div>











































     </div>

     

      

   





    
    
    
    <!-- 此处引入jQuery -->
    <script src="./public/js/jquery.min.js"></script>
    <!-- bootstrap.min.js必须放在JQ后面 -->
    <script src="./public/js/bootstrap.min.js"></script>
  </body>
</html>
