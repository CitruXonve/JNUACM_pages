<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$conn = @mysql_connect("localhost","bd_user","c111");
if (!$conn){
    die("连接数据库失败：" . mysql_error());
}
mysql_select_db("bd_db", $conn);
//mysql_query("set character set 'gbk'");   //避免中文乱码字符转换
mysql_query("set character set 'utf8'");   // PHP 文件为 utf-8 格式时使用
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="assets/forum.css">
        <script src="js/action.js"></script>
        <script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script>
    </head>
    <body>
        <?php
        $sql = "SELECT * FROM tags";
        $result = mysql_query($sql);                //得到查询结果数据集

        //循环从数据集取出数据
        while( $row = mysql_fetch_array($result) ){
            echo '<li class="item-tag'.$row['tid'].'">';
            echo '<a class="TagLinkButton hasIcon " href="" style="" title="">';
            echo '<span class="icon TagIcon Button-icon" style="background-color: '.$row['color'].';"></span>'.$row['name'];
            echo '</a>';
            echo '</li>';
            //echo "注册日期:".date("Y-m-d", $row[regdate])."<br /><br />";
        }
        ?>
    </body>
</html>
