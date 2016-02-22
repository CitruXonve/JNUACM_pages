<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/2/18
 * Time: 20:30
 */
require_once "include/lib.php";
?>
<script src="//cdn.bootcss.com/jquery/3.0.0-beta1/jquery.min.js"></script>
<script type="text/javascript">
    function xmlhttpload_get(source,id){
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
    }
</script>
