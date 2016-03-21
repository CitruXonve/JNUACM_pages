<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
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

$datetime=$now->format('Y-m-d H:i:s');
$title=$_SESSION['post_title'];
$content=$_SESSION['post_content'];

$da->dosql("insert posts (uid,title,content,date) values(".$uid.",'".$title."'.'".$content."','".$datetime."');");
echo(json_encode(array('result'=>true)));