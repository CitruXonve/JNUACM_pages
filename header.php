<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/18
 * Time: 20:30
 */
require_once "include/lib.php";
//php获取当前访问的完整url地址
function GetCurUrl()
{
    $url = 'http://';
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $url = 'https://';
    }
    if ($_SERVER['SERVER_PORT'] != '80') {
        $url .= $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER['REQUEST_URI'];
    } else {
        $url .= $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    }
    return $url;
}

function convertUrlQuery($query)
{
    $queryParts = explode('&', $query);

    $params = array();
    foreach ($queryParts as $param) {
        $item = explode('=', $param);
        $params[$item[0]] = $item[1];
    }

    return $params;
}

?>
<script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.js"></script>
<script src="./js/md5.js"></script>
<script type="text/javascript">
    /*function user_verify() {
        var fun = function (returnData) {
            if (returnData.result)
                return true;
            else
                return false;
        };
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'user_verify.php',
            cache: false,
            success: fun
        })
        return fun;
    }*/
    /*function xmlhttpload_get(source,id){
     var xmlhttp;
     if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
     xmlhttp = new XMLHttpRequest();
     }
     else {// code for IE6, IE5
     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
     }
     xmlhttp.onreadystatechange = function () {
     if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
     document.getElementById(id).innerHTML = xmlhttp.responseText;
     }
     }
     xmlhttp.open("GET", source, true);
     xmlhttp.send();
     }*/
</script>
