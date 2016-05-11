<?php
require '../init.php';
    // p($_SESSION);
    // p($_POST);
    // exit;
    $name=$_POST['name'];
    $sql ="SELECT `id`,`name`,`sex`,`tel`,`email`,`logincount` FROM ".PRE."user WHERE `name`='$name'";

    $user_list = query($link,$sql);




       //8.关闭MYSQL连接
    mysqli_close($link);
    // p($user_list);


        if($user_list){

            $user_list=$user_list[0];

            $user_list['name']=$name;
            redirect('用户密码匹配成功','./mima.php',10);

        }else{
             redirect('用户匹配失败','../zh.php',10);

        }
   


