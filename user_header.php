<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 14/10/2020
 * Time: 6:10 PM
 */
require_once("dbconn.php");
$today = date("l,F j, Y");

$sqlCurrentIssue = "SELECT Max(`id`) AS `id`,`date` FROM `issues`";
$resultCurrentIssue = mysqli_query($linkId,$sqlCurrentIssue);
$currentIssue = "";
$currentDate = "00-00-0000";
//echo $sqlCurrentIssue;

if (mysqli_num_rows($resultCurrentIssue) == 1){
    while($rowCurrentIssue = mysqli_fetch_array($resultCurrentIssue)){
        $currentIssue = $rowCurrentIssue['id'];
        $sqlCurrentIssueDate = "SELECT `date` FROM `issues` WhERE `id` = '".$currentIssue."'";
        $resultCurrentIssueDate = mysqli_query($linkId,$sqlCurrentIssueDate);
        while($rowCurrentIssueDate = mysqli_fetch_array($resultCurrentIssueDate)){
            $currentDate = $rowCurrentIssueDate['date'];
        }

    }
}