<!-- 首页 -->
<?php require './init.php' ?>

<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./imgs/face.jpg" type="image/png" sizes="16x16">
    <title>我的商城</title>
    <!-- Bootstrap -->
    <link href="./public/css/bootstrap.min.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="./public/js/html5shiv.min.js"></script>
    <script src="./public/js/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="./public/my.css">
    </head>
<body>
<!-- 引入导航条 -->
<?php require PATH.'com/nav.php'; ?>




<!-- 引入巨幕 -->

<?php require PATH.'com/jum.php'; ?>


<!-- 引入尾部 -->
<?php require PATH.'com/footer.php'; ?>


<?php require PATH.'com/footer-1.php'; ?>



<!-- 此处引入jQuery -->
<script src="./public/js/jquery.min.js"></script>
<!-- bootstrap.min.js必须放在JQ后面 -->
<script src="./public/js/bootstrap.min.js"></script>
</body>
</html>