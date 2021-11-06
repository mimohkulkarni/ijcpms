<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 10/10/2020
 * Time: 12:40 PM
 */

require_once("dbconn.php");

session_start();
if ($_SESSION['user'] == null){
    $uname = $_SESSION['user'];
//    echo "<script>alert('Oops!You are not authorized to visit this page')</script>";
    header("location:page_403.php");
    exit;
}
//else echo $_SESSION['user'];