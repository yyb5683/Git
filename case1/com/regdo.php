<?php

require '../init.php';

    // p($_SESSION);
    // p($_POST);





        //表单不为空,如果有空值,回之
    foreach ($_POST as $key => $val) {
        if ($val == '') {
            redirect('请完善表单信息!');
            exit;
        }
    }


  //检测验证码
    $vcode = strtolower($_SESSION['vcode']);
    $uservcode = strtolower($_POST['vcode']);
    if ($vcode != $uservcode) {
        redirect('验证码错误!');
        exit;
    }


   //用户名验证
    //密码验证
    //两次密码一致性的验证
    //手机号
    //邮箱
    
    
    $regex1 = '/^[a-zA-Z][\w]{3,15}/i';
    // 密码: 长度4-32位
    $regex2 = '/^[\S]{4,32}$/';
    // 手机: 长度11位,合法的手机号 
    $regex3 = '/^1[^0129]\d{9}$/';
    // email: 输入合法的email 
    $regex4 = '/[\w\.]+@\w+(\.\w+)+(\.\w+)*/i';

    //username
    
    if (!preg_match($regex1, $_POST['name'])) {
        echo '用户名不合法!<br>';
       }
    


       if (!preg_match($regex2, $_POST['pwd'])) {
        echo '密码格式不正确!<br>';
       
     
    }
    
       if (!preg_match($regex3, $_POST['tel'])) {
        echo '手机号不合法!<br>';
       
    }
       if (!preg_match($regex4, $_POST['email'])) {
        echo 'email地址不合法!<br>';
        
            }




   $name = $_POST['name'];
    $pwd = md5($_POST['pwd']);
    $tel = $_POST['tel'];

    $sql = "INSERT INTO ".PRE."user (`name`,`pwd`,`tel`) VALUES('$name','$pwd','$tel')";


    if (execute($link,$sql)) {
        redirect('注册成功!',URL.'login.php');
        exit;
    }else{
        redirect('注册失败,请重试!');
        exit;
    }

    mysqli_close($link);


