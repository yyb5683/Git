<?php

        require './init.php';

    // p($_SESSION);
    // p($_POST);
    
        $regex1 = '/^[a-zA-Z][\w]{3,15}/i';
    // 密码: 长度4-32位
    $regex2 = '/^[\S]{4,32}$/';
    // 手机: 长度11位,合法的手机号 
    $regex3 = '/^1[^0129]\d{9}$/';
    // email: 输入合法的email 
    $regex4 = '/[\w\.]+@\w+(\.\w+)+(\.\w+)*/i';


        if (!preg_match($regex1, $_POST['name'])) {
        // echo '用户名不合法!<br>';
        redirect('用户名不合法!');
        exit;
       }
    


       if (!preg_match($regex2, $_POST['pwd'])) {
        // echo '密码格式不正确!<br>';
        redirect('密码格式不正确!');
        exit;
       
     
    }
    
       if (!preg_match($regex3, $_POST['tel'])) {
        // echo '手机号不合法!<br>';
          redirect('手机号不合法!');
          exit;
       
       
    }
       if (!preg_match($regex4, $_POST['email'])) {
        // echo 'email地址不合法!<br>';
         redirect('email地址不合法!');
         exit;
        
            }



        $pwd = md5($_POST['pwd']);
 
        $name=$_POST['name'];
       // p($pwd);
       // exit;
     
         $sql = "UPDATE ".PRE."user SET `pwd`='$pwd' WHERE `name`='$name'";

          $result = mysqli_query($link,$sql);
          $id=mysqli_affected_rows($link);
         // p($sql);
         // p($result);
         // p($id); 
        // exit;
        if ($result && mysqli_affected_rows($link)>0) {
              redirect('密码重置成功',URL.'login.php');
              

        }else{
           redirect('密码重置失败,请重试!');
    }


        mysqli_close($link);


