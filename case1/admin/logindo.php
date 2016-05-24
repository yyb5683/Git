<?php 
    require './init.php';



         $regex1 = '/^[a-zA-Z][\w]{3,15}/i';
     // 密码: 长度4-32位
        $regex2 = '/^[\S]{4,32}$/';


    //表单不为空,如果有空值,回之
    foreach ($_POST as $key => $val) {
        if ($val == '') {
            admin_redirect('请完善表单信息!');
            exit;
        } 
    }


   if (!preg_match($regex1, $_POST['name'])) {
        // echo '用户名不合法!<br>';
            admin_redirect('用户名不合法');
            exit;

        }

 
        if (!preg_match($regex2, $_POST['pwd'])) {
        
        admin_redirect('密码格式不正确!');
        exit;
       
     
    }






    //验证码的检测
    //检测用户名和密码的合法性
    
    //接收用户数据
    $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);

    //sql
    $sql = "SELECT `id`,`name`,`pwd`,`type` FROM ".PRE."admin_user WHERE `name`='$name'";

    $row = query($link, $sql);
    // p($row);
    // exit;
    
    if ($row) {
        //如果有数据,说明用户存在
        $row = $row[0];
        // p($row);
        //如果有数据,就进行密码比对
        if ($row['pwd'] == $pwd) {
            //密码一致,登录成功了!清除密码和旧验证码
            unset($row['pwd']);
            unset($_SESSION['vcode']);

            //将用户的ID,name放在session
            $_SESSION['admin'] = $row;
            admin_redirect('登录成功!',ADMIN_URL.'index.php',3);
            exit;
        }else{
            //密码不一致
            admin_redirect('密码错误!!');
        }
    }else{
        //用户名不存在
        admin_redirect('用户名并不存在!');
        exit;
    }

   