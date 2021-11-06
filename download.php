<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 14/10/2020
 * Time: 4:03 PM
 */

require_once("dbconn.php");
if ($_POST['id'] == null) header("location:page_403.php");
$id = $_POST['id'];

$sqlDcount = "SELECT `name`,`dcount`,`file` FROM `articles` WHERE `id` = '".$id."'";
//echo $sqlDcount;
$resultDcount = mysqli_query($linkId,$sqlDcount);
$data = array();

if (mysqli_affected_rows($linkId) == 1){
    while ($rowDcount = mysqli_fetch_array($resultDcount)){
        $dCount = $rowDcount['dcount'] + 1;
        $sqlUpdate = "UPDATE `articles` SET `dcount`='".$dCount."' WHERE `id` = '".$id."'";
        mysqli_query($linkId,$sqlUpdate);
        if (mysqli_affected_rows($linkId) == 1){
//            echo $rowDcount['name'];
            $data['name'] = $rowDcount['name'];
            $data['file'] = $rowDcount['file'];
        }
    }
    echo json_encode($data);
}
else echo "error";

//echo "hiii";

?>