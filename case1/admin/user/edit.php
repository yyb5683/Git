<?php
 require '../init.php';
 
    $id = $_GET['id'];

    

    $sql ="SELECT `id`,`name`,`sex`,`tel`,`email`,`logincount` FROM ".PRE."user WHERE `id`='$id'";


   // $row = execute($link, $sql);


    $result = mysqli_query($link,$sql);
    if ($result && mysqli_num_rows($result)>0) {
        $row = mysqli_fetch_assoc($result);
    }
    
    // echo '<pre>';

//         print_r($result);
//         var_dump($result);
        // print_r($row);
//         print_r($sql);
//     echo '</pre>';
// exit;


 ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>编辑用户</h2>
    <form action="./action.php?a=edit" method="post">
        <!-- 隐藏域用于传递用户的ID 以便action页面知道是编辑谁 -->
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
        
        用户名:
        <input type="text" name="name" value="<?php echo $row['name'] ?>"><br><br>

       性别:
        <input type="radio" name="sex" value="0" <?php echo $row['sex']==0?'checked':''; ?>>女
        <input type="radio" name="sex" value="1" <?php echo $row['sex']==1?'checked':''; ?>>男
        <input type="radio" name="sex" value="2" <?php echo $row['sex']==2?'checked':''; ?>>保密<br><br>


      邮箱:
        <input type="text" name="email" value="<?php echo $row['email']?>"><br><br>

        手机号:
        <input type="text" name="tel" value="<?php echo $row['tel']?>"><br><br>

        
        <input type="submit" value="保存编辑">
    </form>
</body>
</html>