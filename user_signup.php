<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/25/16
 * Time: 17:29
 */
require_once "include/lib.php";
header('Content-type: text/json');
$da = new DataAccess();

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

$user_login = $_POST['login'];
$user_nick = $_POST['nick'];
if (strlen($user_nick) < 1)
    $user_nick = $user_login;
$user_email = $_POST['email'];
$user_pwd = $_POST['pwd'];
$rep = $_POST['rep'];
if (strcmp($user_pwd, $rep) != 0)
    die(json_encode(array('result' => 'Error: Passwords do not match!')));

if (!preg_match('/.{3,32}/', $user_nick))
    die(json_encode(array('result' => 'Error: Check the nickname!')));

if (!preg_match('/^[a-zA-Z0-9_]{3,16}$/', $user_login))
    die(json_encode(array('result' => 'Error: Check the username!')));
$cnt = $da->dosql("SELECT ID FROM users WHERE user_login='" . $user_login . "';");
//echo "SELECT * FROM users WHERE user_login='$user_login' AND user_pass='$user_pwd';";
if ($cnt > 0)
    die(json_encode(array('result' => 'Error: Username already exist!')));

if (!preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/', $user_email))
    die(json_encode(array('result' => 'Error: Check the email!')));
$cnt = $da->dosql("SELECT ID FROM users WHERE user_email='" . $user_email . "';");
//echo "SELECT * FROM users WHERE user_login='$user_login' AND user_pass='$user_pwd';";
if ($cnt > 0)
    die(json_encode(array('result' => 'Error: Email already exist!')));

if (!preg_match('/.{6,16}/', $user_pwd))
    die(json_encode(array('result' => 'Error: Check the password!')));


session_destroy();
session_start();

$now=new DateTime();
$da->dosql("insert users (user_login,user_nickname,user_email,user_pass,user_registered) values('" . $user_login . "','" . $user_nick . "','" . $user_email . "','" . $user_pwd ."','".$now->format('Y-m-d H:i:s'). "');");

$cnt = $da->dosql("SELECT ID FROM users WHERE user_login='" . $user_login . "';");
if ($cnt != 1)
    die(json_encode(array('result' => 'Error: Operation failed while inserting!')));

$_SESSION['user_id'] = $da->rtnrlt(0)['ID'];
$_SESSION['username'] = $user_login;
$_SESSION['timestamp'] = date_timestamp_get($now);
$da->dosql("UPDATE users SET last_login=" . $_SESSION['timestamp'] . " where ID=" . $_SESSION['user_id'] . ";");
echo json_encode(array('result' => true));
//    echo $_SESSION['username'];
//    session_abort();

