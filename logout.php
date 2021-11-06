<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 10/10/2020
 * Time: 12:13 PM
 */

session_start();
session_unset();
session_destroy();
header("location:login.php");