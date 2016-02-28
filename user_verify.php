<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/24/16
 * Time: 11:03
 */
require_once "include/lib.php";
//require_once "header.php";
header('Content-type: text/json');

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
    echo json_encode(array("result"=>false,"timestamp"=>$_SESSION['timestamp']));
else
    echo json_encode(array("result"=>true,"timestamp"=>$_SESSION['timestamp']));

