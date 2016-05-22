<?php
require './init.php';
p($_POST);
$a=$_GET['a'];

switch($a){

    case 'bj':

        $id=$_POST['id'];
        // p($id);

        echo '正在编辑用户';
        $set = '';
        foreach ($_POST as $key=>$val){

            $set .= "`$key`='$val',";
        }

        $set = rtrim($set,',');

       $sql = "UPDATE ".PRE."user SET $set WHERE `id`='$id'";

         $id = execute($link,$sql);


        if($id){
            redirect('成功编辑用户','./grzx.php?a=qq',10);
            exit;

        }else{
            redirect('编辑失败','',111111111111111);
            exit;
        }

        break;
}



?>