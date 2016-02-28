<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/28/16
 * Time: 17:58
 */
require_once "header.php";
$da = new DataAccess();

$parsed_url = parse_url(GetCurUrl(), PHP_URL_QUERY);
preg_match('([0-9]+)', convertUrlQuery($parsed_url)['p'], $matches);
$pid = $matches[0];

if (!getVerifyingRes())
    die("Not logged in!");

session_start();
$da->dosql("select * from users WHERE ID='" . $_SESSION['user_id'] . "';");
$col = $da->rtnres();
?>