<?php        
        
//php的时间是以秒算。js的时间以毫秒算        

date_default_timezone_set("Asia/ShangHai");//地区        
        
//配置每天的活动时间段        
$starttimestr = "09:00:00";        
$endtimestr = "17:50:00";        
        
$starttime =  strtotime($starttimestr);        
$endtime  =   strtotime($endtimestr);        
$nowtime  =   time();        
if ($nowtime<$starttime){        
die("活动还没开始,活动时间是：{$starttimestr}至{$endtimestr}");        
}        
$lefttime = $endtime-$nowtime;  //实际剩下的时间（秒）        
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">        
<html xmlns="http://www.w3.org/1999/xhtml">        
<head>        
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
<title>PHP实时倒计时!</title>        
<script language="JavaScript">        
<!-- //        
var runtimes = 0;        
function GetRTime(){        
var nMS = <?=$lefttime?>*1000-runtimes*1000;        
var nH=Math.floor(nMS/(1000*60*60))%24;        
var nM=Math.floor(nMS/(1000*60)) % 60;        
var nS=Math.floor(nMS/1000) % 60;        
document.getElementById("RemainH").innerHTML=nH;        
document.getElementById("RemainM").innerHTML=nM;        
document.getElementById("RemainS").innerHTML=nS;        
if(nMS>5*59*1000&&nMS<=5*60*1000)        
{        
  alert("还有最后五分钟！");        
}        
runtimes++;        
setTimeout("GetRTime()",1000);        
}        
window.onload=GetRTime;        
// -->        
</script>        
</head>        
<body>        
  <h1><strong id="RemainH">XX</strong>:<strong id="RemainM">XX</strong>:<strong id="RemainS">XX</strong></h1>        
</body>        
</html>  
