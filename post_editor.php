<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "include/lib.php";
header('Content-type: text/json;charset:utf-8');
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

$now=new DateTime();
$datetime=$now->format('Y-m-d H:i:s');
$title=$_POST['post_title'];
$content=$_POST['post_content'];

$da->dosql("SET NAMES utf8");
$da->dosql("INSERT posts (uid,title,content,date) values(".$uid.",'".$title."','".$content."','".$datetime."');");

$cnt=$da->dosql("SELECT pid FROM posts WHERE title='".$title."' and date='".$datetime."';");
if ($cnt==1)
    echo json_encode(array('result'=>true,'pid'=>$da->rtnrlt(0)['pid']));
else
    echo json_encode(array('result'=>false));