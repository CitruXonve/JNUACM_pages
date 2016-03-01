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

function parseContent_full($str)
{
    $read_more = '<!--more-->';

    return $str;
}
function parseContent($str)
{
    $read_more = '<!--more-->';
    $pos = strpos($str, $read_more);
    if ($pos === false)
        return $str;
    else
        return substr($str, 0, $pos);
}

function has_read_more_tag($str)
{
    $read_more = '<!--more-->';
    $pos = strpos($str, $read_more);
    if ($pos === false)
        return false;
    else
        return true;
}

function parseDate($str)
{
    $before = new DateTime($str);
    $now = new DateTime();
    $dif = $before->diff($now);
    if (abs($dif->days) < 1 && abs($dif->h) < 1 && abs($dif->i) < 1)
        return 'a minute ago';
    else if (abs($dif->days) < 1 && abs($dif->h) < 1)
        return $dif->format('i') . ' minutes ago';
    else if (abs($dif->days) < 1 && abs($dif->h) < 2)
        return 'an hour ago';
    else if (abs($dif->days) < 1)
        return $dif->format('%h') . ' hours ago';
    else if (abs($dif->days) < 2)
        return 'a day ago';
    else if (abs($dif->days) < 30)
        return $dif->format('%d') . ' days ago';
    else if (abs($dif->days) < 60)
        return 'a month ago';
    else if (abs($dif->days) < 210)
        return $dif->format('%m') . ' months ago';
    else
        return 'on ' . $before->format('Y/m/d');
}

function formatDatetimeInto($datetime, $str)
{
    return (new DateTime($datetime))->format($str);
}

function getVerifyingRes(){
    session_start();
    if (!isset($_SESSION['user_id'])||!isset($_SESSION['timestamp']))
        return false;
    $da=new DataAccess();
    //echo "SELECT * FROM users WHERE ID=".$_SESSION['user_id']." AND last_login=".$_SESSION['timestamp'].";";
    $cnt = $da->dosql("SELECT * FROM users WHERE ID=".$_SESSION['user_id']." AND last_login=".$_SESSION['timestamp'].";");
    if ($cnt!=1)
        return false;
    else
        return true;
}

?>
<script src="//cdn.bootcss.com/jquery/2.2.1/jquery.min.js"></script>
<script src="//cdn.bootcss.com/jquery.form/3.51/jquery.form.js"></script>
<script src="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.js"></script>
<script src="//cdn.bootcss.com/globalize/1.1.1/globalize.js"></script>
<script src="./js/vendor/jquery.ui.widget.js"></script>
<script src="./js/jquery.iframe-transport.js"></script>
<script src="./js/jquery.fileupload.js"></script>
<script src="./js/jquery.pjax.js"></script>
<script src="./js/state-machine.js"></script>
<!--<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>-->
<link rel="stylesheet" href="//cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.css">
<link rel="stylesheet" href="./assets/jquery.fileupload.css">
<script src="./js/md5.js"></script>
<script type="text/javascript">
    function set_on(evt, attr_name,attr_var) {
        var cl = evt.attr(attr_name);
        if (!cl) return;
        if (cl.indexOf(attr_var) < 0)
            cl = cl + attr_var;
        evt.attr(attr_name, cl);
    }
    function set_off(evt, attr_name,attr_var,regex) {
        var cl = evt.attr(attr_name);
        if (!cl) return;
        if (cl.indexOf(attr_var) >= 0)
            cl = cl.replace(regex, '');
        evt.attr(attr_name, cl);
    }
    function switch_open(evt, attr_name,attr_var,regex) {
        var cl = evt.attr(attr_name);
        if (cl.indexOf(attr_var) >= 0)
            cl = cl.replace(regex, '');
        else
            cl = cl + attr_var;
        evt.attr(attr_name, cl);
    }
    function switch_true(evt, attr_name) {
        evt.attr(attr_name, (evt.attr(attr_name) == 'true' ? false : true));
    }
    function set_true(evt, attr_name) {
        evt.attr(attr_name, true);
    }
    function set_false(evt, attr_name) {
        evt.attr(attr_name, false);
    }
    function activate(evt) {
        set_on(evt, 'class', ' active');
    }
    function deactivate_all() {
        $('li').each(function () {
            set_off($(this), 'class', ' active', / active/g);
        })
    }
    function switch_user_menu(handle) {
        switch_open(handle.parent(), 'class',' open',/ open/g);
        switch_true(handle, 'aria-expanded');
    }
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
