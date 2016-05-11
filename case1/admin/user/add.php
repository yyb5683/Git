<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h2>添加用户</h2>
    <form action="./action.php?a=add" method="post">
        用户名:
        <input type="text" name="name" placeholder="请输入用户名"><br><br>
        密码:
        <input type="password" name="pwd" placeholder="请输入密码"><br><br>
        手机号:
        <input type="text" name="tel" placeholder="请输入tel"><br><br>
        性别:
        <input type="radio" name="sex" value="0">女
        <input type="radio" name="sex" value="1" checked>男
        <input type="radio" name="sex" value="2">保密<br><br>
        邮箱:
        <input type="text" name="email" placeholder="请输入邮箱"><br><br>

        <input type="submit" value="确认添加">
    </form>
</body>
</html>