<?php 
    //此页面会进行 增 删 改
    require '../init.php';

    // p($_GET);
    // p($_POST);


    // exit;

    $a = $_GET['a'];


    switch ($a) {

        case 'edit':
            
          
            $id = $_POST['id'];
            echo '正在编辑ID为'.$id.'的家伙..<br>';
            $set = '';
            foreach ($_POST as $key => $val) {
                $set .= "`$key`='$val',";
            }
            $set = rtrim($set,',');
            $sql = "UPDATE ".PRE."user SET $set WHERE `id`='$id'";
           
             $id = execute($link,$sql);

            if($id){
                 admin_redirect('成功编辑ID为:'.$id, './index.php',10);
                exit;
            }else{
                admin_redirect('编辑失败');
                exit;
            }
           
            break;

        case 'add':
            echo '正在添加用户....<br>';
            //表单不为空,如果有空值,回之
            foreach ($_POST as $key => $val) {
                if ($val == '') {
                    admin_redirect('请完善表单信息!');
                    exit;
                }
            }

            //得到用户输入的信息
            //各种信息验证!!!
            
            $_POST['pwd'] = md5($_POST['pwd']);

            $keys = '';
            $values = '';
            //遍历得到的post 生成SQL语句的条件
            foreach ($_POST as $key => $val) {
                $keys .= "`$key`,";
                $values .= "'$val',";
            }
            //抹去右边的逗号
            $keys = rtrim($keys,',');
            $values = rtrim($values,',');

            //5
            $sql = "INSERT INTO ".PRE."user ($keys) VALUES($values)";
            $id = execute($link,$sql);
            if ($id) {
                admin_redirect('添加成功 ID:'.$id, './index.php',1);
                exit;
            }else{
                admin_redirect('添加失败');
                exit;
            }
            break;

        case 'del':
            echo '正在删除用户';
 
            //删除动作
            $id = $_GET['id'];
            echo '我要删除ID为'.$id.'的家伙<br>';
            //5
            $sql = "DELETE FROM ".PRE."user WHERE `id`='$id'";
            //6
                $id=execute($link,$sql);
                 if ($id) {
                admin_redirect('成功删除 ID为:'.$id, './index.php',1);
                exit;
            }else{
                admin_redirect('添加失败');
                exit;
            }
          break;

          case 'cha':
            
            $name=$_POST['name'];
            echo '正在查询name为'.$name.'的用户<br>';
                    $sql ="SELECT `id`,`name`,`sex`,`tel`,`email`,`logincount` FROM ".PRE."user WHERE `name`='$name'";

                    $result = mysqli_query($link,$sql);
                    if ($result && mysqli_num_rows($result)>0) {
                          $user_list = mysqli_fetch_all($result,MYSQLI_ASSOC);
    }
            //         echo '<pre>';
            // print_r($user_list);

            
           

          
            // exit;

            if($user_list){
                $user_list = $user_list[0];
                if($user_list['name']==$name) {

                    admin_redirect('成功查询到name为:'.$name,'./index.php',10);
                }
            }else{

                admin_redirect('用户不存在,查询失败');
            }







        }

    //8.关闭连接
    mysqli_close($link);



