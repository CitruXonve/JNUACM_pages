<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/24/16
 * Time: 11:03
 */
require_once "include/lib.php";
header('Content-type: text/json');

if (!getVerifyingRes()){
    die(json_encode(array('result'=>false,'timestamp'=>$_SESSION['timestamp'])));
}
else{
    echo json_encode(array('result'=>true,'timestamp'=>$_SESSION['timestamp']));
}