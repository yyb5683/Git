<?php

        require '../init.php';

    // p($_SESSION);
    // p($_POST);
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


