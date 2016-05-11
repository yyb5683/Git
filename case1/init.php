<?php
  //字符集+时间+屏蔽错误+开启session
    header("content-type:text/html;charset=utf-8");
    date_default_timezone_set('PRC');
    // error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_ERROR));
    session_start();

      //PATH 的拼装
    //获取当前init.php的绝对路径
 $path = dirname(__FILE__);
    //将绝对路径改装成路径常量
    //PATH  用于require/路径文件/增删改文件时
    define('PATH',str_replace('\\', '/', $path).'/');


$url = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];


    $dir = $_SERVER['DOCUMENT_ROOT'];


        //进行拼装 把PATH中的项目目录之前部分,替换成域名的形式
    $url = str_replace($dir,$url,PATH);
    define('URL',$url);



        require PATH.'config.php';

   //引入自定义函数文件
    require PATH.'com/function.php';



        $link = mysqli_connect(HOST,USER,PWD,DB) or die('数据库连接失败!');
    mysqli_set_charset($link,CHAR);