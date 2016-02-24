<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/23/16
 * Time: 19:26
 */

require_once "include/lib.php";
header('Content-type: text/json');

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

$parsed_url = convertUrlQuery(parse_url(GetCurUrl(), PHP_URL_QUERY));
//echo $parsed_url['login'].','.$parsed_url['pwd'];

$user_login = $parsed_url['login'];
$user_pwd = $parsed_url['pwd'];

$da = new DataAccess();
$cnt = $da->dosql("SELECT * FROM users WHERE user_login='$user_login' AND user_pass='$user_pwd';");
//echo "SELECT * FROM users WHERE user_login='$user_login' AND user_pass='$user_pwd';";
session_start();
//session_reset();
if ($cnt != 1) {
    /*session_start();
    if (!isset($_SESSION['username'])) {
        echo "Not logged in";
    } else {
        echo "Logging out...";
        //        unset($_SESSION['username']);
        session_destroy();
    }*/
    session_destroy();
    die(json_encode(array('result' => false)));
} else {
    $_SESSION['user_id'] = $da->rtnrlt(0)['ID'];
    $_SESSION['username'] = $da->rtnrlt(0)['user_login'];
    $_SESSION['timestamp'] = date_timestamp_get(new DateTime());
    $da->dosql("UPDATE users SET last_login=" . $_SESSION['timestamp'] . " where ID=" . $_SESSION['user_id'] . ";");
    echo json_encode(array('result' => true));
//    echo $_SESSION['username'];
//    session_abort();
}
