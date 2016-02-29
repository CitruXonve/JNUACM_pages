<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/29/16
 * Time: 14:33
 */
require_once "include/lib.php";
header('Content-type: text/json');
$da = new DataAccess();
session_start();

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

if (!getVerifyingRes())
    die(json_encode(array("result"=>'Wrong parameters!')));
else
    $uid = $_SESSION['user_id'];
//echo $uid;

//echo "select * from users WHERE ID=" . $uid . ";";
$u_cnt = $da->dosql("select * from users WHERE ID=" . $uid . ";");

$col = $da->rtnres();
if ($u_cnt != 1)
    die(json_encode(array("result"=>'No such user!')));

$dir=$_POST['avatar'];
//if (!preg_match('/^\./uploads/.+\.(bmp|jpg|jpeg|gif|png)$/',$dir))
//    die(json_encode(array("result"=>"Invalid file!".$dir)));
$da->dosql("UPDATE users SET user_avatar='".$dir."' WHERE ID=".$uid.";");
echo json_encode(array("result"=>true));