<?php
date_default_timezone_set("Asia/ShangHai");//地区
$name = dirname(__FILE__).'/data/'.'team'.$_POST['TeamNo'].' '.date('H:i:s',time()).".txt";
$myfile = fopen($name, "x") or die("Unable to open file!");
$txt = 'team'.$_POST['TeamNo'].' '.date('Y/m/d H:i:s',time())."\n=================================\n".$_POST['CodeContent'];
fwrite($myfile, $txt);
fclose($myfile);
echo '提交成功';
?>