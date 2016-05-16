<?php
require './init.php';


P($_SESSION);


P($_GET);

$goods_id=$_GET['goods_id'];
$qty=$_GET['qty'];  
$price=$_GET['price'];
$ordernum=$_SESSION['order'];
$user_id=$_SESSION['home']['id'];
$oname=$_SESSION['oname'];
$phone=$_SESSION['phone'];
$allprice=$_SESSION['allprice'];
$address=$_SESSION['address'];



// p($ordernum);
// p($user_id);



 // p($sql);
// $ordernum=query($link,$sql);
// p($ordernum);
// $order_id=$ordernum['0']['id'];
// p($order_id);







$sql="INSERT INTO `s47_order`(`ordernum`,`user_id`,`oname`,`phone`,`address`,`allprice`) VALUES('$ordernum','$user_id','$oname','$phone','$address','$allprice')"; 
p($sql);
$order_id=execute($link,$sql);
p($order_id);






 $sql="INSERT INTO ".PRE."ordergoods (`goods_id`,`price`,`qty`,`order_id`)VALUES('$goods_id','$price','$qty','$order_id')"; 

  p($sql);  

 $id=execute($link,$sql);

 p($id);




// $sql="
//             SELECT r.price,r.qty,o.ordernum,o.oname,o.phone,o.address,o.allprice,o.status,o.id,i.iname
//             FROM ".PRE."order o,".PRE."ordergoods r, ".PRE."user u, ".PRE."image i
//             WHERE o.id=r.order_id AND u.id=o.user_id AND i.goods_id=r.goods_id
//             ";
//             // p($sql);
//             $row=query($link,$sql);
//             // p($row);

// $_SESSION['row']=$row;
// p($_SESSION['row']);

redirect('进入个人中心:','./grzx.php',1);



?>




