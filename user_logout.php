<?php
/**
 * Created by PhpStorm.
 * User: semprathlon
 * Date: 2/23/16
 * Time: 20:36
 */
session_start();
if (isset($_SESSION['timestamp']))
    session_destroy();
