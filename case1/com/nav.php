  

  <div class="nav1 container navbar-fixed-top">

    <div >
    <a href="<?php echo URL?>index.php"><img class="xiaomi fl" src="./imgs/2016-04-30_163747.jpg"></a>
    </div>
    <div>
      <form class="navbar-form navbar-left">
        <div id="sousuo" class="form-group">
          <input class="input "type="text" class="form-control" placeholder="2s 后盖">

          <button type="submit" class="btn btn-default" ><span class="glyphicon glyphicon-search "></span></button>
           </div>
           <!-- <label class="hot"> -->
            <!-- <a href="">小米手机3</a><a href="">小米电视</a><a href="">变形金刚</a><a href="">百变后盖</a><a href="">优惠套装</a></label> -->
   
      </form>
      </div>
  <?php if (empty($_SESSION['home'])): ?>
    <div ><!--登录注册 开始-->
    <ul class="denglu">
          <li><a href=""><span class="glyphicon glyphicon-shopping-cart -lg"></span>购物车</a></li>
          <li><label><a data-needlogin="true" href="<?php echo URL ?>login.php">  登录&nbsp&nbsp</a> <a href="<?php echo URL ?>reg.php"> 注册&nbsp&nbsp&nbsp</a></label>
          </li>
    <!--   <li id=""><a href="" onclick="_gaq.push(['_trackEvent', '首页', 'A', '我的订单']);">我的订单</a>
        </li> -->
        <li>
              <a href="#"> 欢迎来到本站&nbsp&nbsp&nbsp</a>
        </li>
         </li>
        <li>
              <a href="./admin/login.php"> 进入后台&nbsp&nbsp&nbsp</a>
        </li>
        </ul>
      
    </div><!--登录注册 结束-->
     <?php else: ?>
      <div ><!--登录注册 开始-->
          <ul class="denglu">
         
    <!--   <li id=""><a href="" onclick="_gaq.push(['_trackEvent', '首页', 'A', '我的订单']);">我的订单</a>
        </li> -->
        <li>
              <a href="./com/logout.php"> 退出 &nbsp &nbsp&nbsp&nbsp</a>
        </li>
        <li><a href="#">个人中心&nbsp&nbsp&nbsp&nbsp</a></li>
        <li>
            <a href="#" class="" data-toggle=""><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['home']['name'] ?> &nbsp&nbsp&nbsp</a>
        </li>
    

        </ul>
      
    </div><!--登录注册 结束-->
    <?php endif ?>


  </div>





    <div class="tiao"><!---导航条开始-->

    <ol id="tiao"class="navbar container">
    <li class="active"><a href="#">全部商品分类</a>
    <li class="active"><a href="#"><a href="<?php echo URL ?>index.php">首页 </a></li>
    <li class="active"><a href="">小米手机</a></li>
    <li class="active"><a href="">红米手机</a></li>
    <li class="active"><a href="">小米电视 </a></li>
    <li class="active"><a href=""> 盒子</a></li>
    <li class="active"><a href="">合约机</a></li>
    <li class="active"><a href="">服务</a></li>
    <li class="active"><a href="">MIUI</a></li>
    <li class="active"><a href="">米聊</a></li>
    <li class="active"><a href="">社区</a></li>
  </ol>


    </div><!---导航条结束-->
