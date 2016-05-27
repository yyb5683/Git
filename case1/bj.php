<?php
require './init.php';
// p($_POST);
$a=$_GET['a'];

switch($a){

    case 'bj':



        $id=$_POST['id'];
        // p($id);
        
          $regex1 = '/^[a-zA-Z][\w]{3,15}/i';
           $regex4 = '/[\w\.]+@\w+(\.\w+)+(\.\w+)*/i';
        if (!preg_match($regex1, $_POST['name'])) {
        // echo '用户名不合法!<br>';
        redirect('用户名不合法!');
        exit;
       }

             if (!preg_match($regex4, $_POST['email'])) {
        // echo 'email地址不合法!<br>';
         redirect('email地址不合法!');
         exit;
        
            }



        echo '正在编辑用户';
        $set = '';
        foreach ($_POST as $key=>$val){

            $set .= "`$key`='$val',";
        }

        $set = rtrim($set,',');

       $sql = "UPDATE ".PRE."user SET $set WHERE `id`='$id'";

         $id = execute($link,$sql);

         unset($_SESSION['home']);


        if($id){

            redirect('成功编辑用户','./login.php',3);
            exit;

        }else{
            redirect('编辑失败','',111111111111111);
            exit;
        }

        break;
}



?>