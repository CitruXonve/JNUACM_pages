<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/23/16
 * Time: 20:36
 */
include_once "header.php";
session_start();
if (isset($_SESSION['timestamp'])){
    $da=new DataAccess();
    $da->dosql("UPDATE users SET last_login=NULL where ID=" . $_SESSION['user_id'] . ";");
    session_destroy();
    echo "Log out";
}

