<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$conn = @mysql_connect("localhost","bd_user","c111");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}

mysql_select_db("bd_db", $conn);
//mysql_query("set character set 'gbk'");   //避免中文乱码字符转换
mysql_query("set character set 'utf8'");   // PHP 文件为 utf-8 格式时使用
$sql = "SELECT * FROM tags";
$result = mysql_query($sql);                //得到查询结果数据集

//循环从数据集取出数据
while( $row = mysql_fetch_array($result) ){
    echo "标签名:".$row['name']."<br />";
    echo "颜色:".$row['color']."<br />";
    //echo "注册日期:".date("Y-m-d", $row[regdate])."<br /><br />";
}
?>

