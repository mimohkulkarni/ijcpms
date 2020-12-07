<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 09/10/2020
 * Time: 7:41 PM
 */

$mysqli_host = "localhost";
$mysqli_user = "root";
$mysqli_pass = "";
$mysqli_dbName = "ijcpms";

$linkId = mysqli_connect($mysqli_host,$mysqli_user,$mysqli_pass,$mysqli_dbName);
date_default_timezone_set("Asia/Kolkata");

if(!$linkId) die("Connection Failed! Contact Admin or Developer. Error: " . mysqli_connect_error());
//else echo "<script>alert('connection success!')</script>";