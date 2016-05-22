<?php
          // require './init.php';
          $sql = "
        SELECT i.iname, g.gname, g.id, g.price, g.zan
        FROM ".PRE."goods g, ".PRE."image i
        WHERE i.goods_id = g.id AND i.cover=1 AND g.state=1 AND g.is_new=1 limit 1000
    ";
    // p($sql);
    $list = query($link, $sql);
    // p($list);exit;

?>


<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>
        


  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="lssistbox">
    <div class="item active">
      <a href="./list.php"><img src="./imgs/T1aZDjBCYv1RXrhCrK.jpg" alt="..."></a>
      <div class="carousel-caption">
       
      </div>
    </div>
    <div class="item">
      <a href="./list.php"><img src="./imgs/T1NTZjBbdT1RXrhCrK.jpg" alt="..."></a>
      <div class="carousel-caption">
      
      </div>
    </div>
      <div class="item">
      <a href="./list.php"><img src="./imgs/T1XedjByCv1RXrhCrK.jpg" alt="..."></a>
      <div class="carousel-caption">
   
      </div>
    </div>
    
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





























    <!-- <div class="datu"> -->
    <!--大图片开始-->
            <!-- <div><img src="./imgs/jiangjia.jpg" ></div> -->
    <!-- </div> -->
    <!--大图片结束-->
<!-- 
    <div class="xl fl">
    <ul>
        <li>购买手机&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp ></li>
        <li>小米电视与盒子&nbsp&nbsp  &nbsp  ></li>
        <li>小米电视与盒子&nbsp&nbsp&nbsp&nbsp&nbsp></li>
        <li>路由器 / 智能硬件&nbsp&nbsp></li>
        <li>电池 / 储存卡&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp ></li>
        <li>移动电源 / 插线板&nbsp ></li>
        <li>耳机 / 音响&nbsp&nbsp&nbsp &nbsp &nbsp &nbsp&nbsp &nbsp></li>
        <li>保护套 / 后盖&nbsp &nbsp &nbsp&nbsp&nbsp ></li>
        <li>贴膜 / 个性配件&nbsp&nbsp&nbsp&nbsp></li>
        <li>米兔 / 服装&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp></li>
        <li>小米生活方式&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp></li>
        <li>配件优惠套装&nbsp&nbsp&nbsp&nbsp&nbsp ></li>
        <li>手机优惠套装&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp></li>
        <li>按机选择配件&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp></li>
        </ul>

    </div> -->



















        <div class="container"><!--四个小图片开始-->
        
        <?php if (empty($list)): ?>
        <h2>暂无数据</h2>
        <?php else: ?>

        <?php foreach ($list as $key => $val): ?>

          <div class="sige fl">
                      <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
                      <img src="<?php echo getpath(URL.'uploads/',$val['iname'],'c') ?>">
                      </a>



                      <div class="sj1-x bf">
                 <a href="./contentinfo.php?id=<?php echo $val['id'] ?>&gname=<?php echo $val['gname'] ?>" target="_blank">
             <span id="sp0"><span class="sp1"><?php echo $val['gname']?><span/> &nbsp <span class="sp2">&nbsp<?php echo $val['price']?></span><span class="sp3">元起</span></span>
             </span>
                <div class="ljgm fr">
             <button type="button" class="btn btn-">立即购买</button>
             </div>

             <div class="xiaolong ">
           <!--   <?php echo $val['msg']?> -->


             </div>
             
            </div><!--end sj1-x-->


          </div>

             
        <?php endforeach ?>
        <?php endif ?>





    <!-- <div class="sige br fr"><img src="./imgs/2A-95000.jpg"></div>
    <div class="sige br fr"><img src="./imgs/2S-95000.jpg"></div>
    <div class="sige br fr"><img src="./imgs/hongmi-9.jpg"></div>
    <div class="sige br fr"><img src="./imgs/fabuhui0.jpg"></div> -->
    <!-- <div class="sige br"><img src="./imgs/fabuhui0.jpg"></div> -->

    </div><!--四个小图片结束-->

    <!-- <div class="chongzhi"></div> -->



    <div class="fc"></div>
    <div class="container"><!--四个小图片开始-->
     <div class="xinpin">新品上架</div>

    <div class="sanjiao fl"><a href="./404.html"><img src="./imgs/2016-04-30_230456.jpg"></a></div>


    <div class="sanjiao fl">
      <div class="huosai fl"><a href="./404.html"><img src="./imgs/2016-04-30_231007.jpg"></a></div>
      <div class="jinshu fr">
        <div class="guasheng"><a href="./404.html"><img src="./imgs/2016-04-30_232321.jpg"></a></div>
        <div class="shubiao"><a href="./404.html"><img src="./imgs/2016-04-30_231150.jpg"></a></div>
      </div>
      </div>


     

      <div class="baohutao fl"><a href="./404.html"><img src="./imgs/2016-04-30_231351.jpg"></a></div>
      <div class="baohutao fl"><a href="./404.html"><img src="./imgs/2016-04-30_231447.jpg"></a></div>
      <div class="baohutao fl"><a href=""><img src="./imgs/2016-04-30_231539.jpg"></a></div>

      <div class="jishiben fl">
        <div class="hougai"><a href="./404.html"><img src="./imgs/2016-04-30_231626.jpg"></a></div>
        <div class="bing"><a href="./404.html"><img src="./imgs/2016-04-30_231658.jpg"></a></div>
      </div>
        
      </div>

        <!--左侧fudong-->
        <div class="fudong fr">
        
        <!-- <div class="yihao bo"><img src="./imgs/2016-04-30_232019.jpg"></div> -->
        <div class="erhao "></div>
        <div class="sanhao "></div>
          
        </div><!--左侧fudong结束-->

        <div class="remai"><!--热卖开始-->
        <div ><p>热卖电商</p></div>
            <!-- div class="sanjiao fl"><img src="./2016-04-30_231747.jpg"></div> -->
<div class="sanjiao fl"><a href="./404.html"><img src="./imgs/2016-05-01_001549.jpg"></a></div>

    <div class="sanjiao fl">
      <div class="huosai fl"><a href="./404.html"><img src="./imgs/2016-04-30_231858.jpg"></a></div>
      <div class="jinshu fr">
        <div class="guasheng"><a href="./404.html"><img src="./imgs/2016-05-01_001846.jpg"></a></div>
        <div class="shubiao"><a href="./404.html"><img src="./imgs/2016-05-01_001926.jpg"></a></div>
      </div>

      </div>
      <div class="fc"></div>
      <div class="lanya fr"><a href="./404.html"><img src="./imgs/2016-05-01_002054.jpg"></a></div>




    <div>
<div class="neiqian fl">
<div class="usb">
<div class="dukaqi"><a href="./404.html"><img src="./imgs/2016-05-01_005137.jpg"></a></div>
<div class="shuangcai"><a href=""><img src="./imgs/2016-05-01_005215.jpg"></a></div>
  
</div>



<div class="gaosu fr"><a href="./404.html"><img src="./imgs/2016-05-01_005410.jpg"></a></div>
<div class="fc"></div>

<!-- <div classs="shuaka bb"></div>
 -->



  
</div>
<div class="neiqian2 fl"><a href="./404.html"><img src="./imgs/2016-05-01_003218.jpg"></a></div>
<!-- <div class="neiqian bo fl"></div> -->
<!-- <div class="fc"></div> -->

<div class="shuaka fr"><a href="./404.html"><img src="./imgs/2016-05-01_010440.jpg"></a></div>

</div>

</div><!--热卖结束-->
<div class="fc"></div>

<div class="remai2"><!--热卖商品-->
<div ><p>热评商品</p></div>
<div class="feiche fl"><a href="./404.html"><img src="./imgs/2016-05-01_013546.jpg"></a></div>
<div class="box bf fl"><a href="./404.html"><img src="./imgs/1995_1_1359984635_3.jpg"></a></div>
<div class="box bf fl"><a href="./404.html"><img src="./imgs/1776_1_1358776675_3.jpg"></a></div>
<div class="box bf fl"><a href="./404.html"><img src="./imgs/1945_1_1359343942_3.jpg"></a></div>



<div class="box bf fl"><a href="./404.html"><img src="./imgs/1964_1_1364824434_3.jpg"></a></div>
<div class="box bf fl"><a href="./404.html"><img src="./imgs/1778_1_1355903561_3.jpg"></a></div>
<div class="box bf fl"><a href="./404.html"><img src="./imgs/1312_1_1357479179_3.jpg"></a></div>




<div class="fc"></div>

<div class="remai3"><!--特卖商品-->
<div ><p>特卖商品</p></div>
<div class="xianshi bf fl"><a href="./404.html"><img src="./imgs/qianbao8.jpg"></a></div>
<div class="box-sub bf fl"><a href="./404.html"><img src="./imgs/4127_1_1374148722_3.jpg"></a></div>
<div class="box-sub bf fl"><a href="./404.html"><img src="./imgs/2525_1_1370525591_3.jpg"></a></div>
<div class="box-sub bf fl"><a href="./404.html"><img src="./imgs/4283_1_1376032486_3.jpg"></a></div>

 
  
  
  
</div>