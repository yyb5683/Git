<?php
require './init.php';

// if(){}



// p($_SESSION['order']);



// p($_SESSION['cart']);




// $sql="INSERT INTO ".PRE."ordergoods (`goods_id`,`price`,`qty`,`order_id`)VALUES('$goods_id','$price','$qty','$order_id')"; 



// P($_GET);
// p($_POST);



$ordernum=$_SESSION['order']['ordernum'];
$user_id=$_SESSION['order']['user_id'];
$oname=$_SESSION['order']['oname'];
$phone=$_SESSION['order']['phone'];
$allprice=$_SESSION['order']['allprice'];
$address=$_SESSION['order']['address'];


$sql="INSERT INTO `s47_order`(`ordernum`,`user_id`,`oname`,`phone`,`address`,`allprice`) VALUES('$ordernum','$user_id','$oname','$phone','$address','$allprice')"; 

$order_id=execute($link,$sql);
// p($order_id);








$v= '';
foreach($_SESSION['cart'] as $val){

    $v .='('.'NULL'.','.$val['id'].','.$val['price'].','.$val['qty'].','.$order_id.')'.',';
}
$v=rtrim($v,',');

$sql="INSERT INTO ".PRE."ordergoods VALUES $v";
// p($sql);


$row=execute($link,$sql);

// p($row);



$cart=$_SESSION['cart'];
// p($cart);
// exit;
foreach ($cart as $val){
    $qty=$val['qty'];
    $id=$val['id'];


// p($qty);



$sql="SELECT `stock` FROM ".PRE."goods WHERE `id`='$id'";
    // p($sql);

    $stok=query($link,$sql);
    $stok=$stok['0']['stock'];

  $stok=$stok-$qty;


$sql="UPDATE ".PRE."goods SET `stock`='$stok' WHERE `id`=$id";
// p($sql);

$rows=execute($link,$sql);
// p($rows);
  
}








unset($_SESSION['cart']);















redirect('进入个人中心:','./grzx.php',1);



?>



