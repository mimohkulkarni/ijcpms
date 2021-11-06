<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 11/10/2020
 * Time: 2:38 PM
 */
require_once("dbconn.php");
if ($_POST['query'] == null && $_POST['id'] == null) header("location:page_403.php");
$searchTerm = $_POST['query'];
$id = $_POST['id'];

if ($id == 1) {
    //$output="";
//    $output = '<ul class="list-unstyled">';
    $query = "SELECT * FROM issues WHERE `name` LIKE '%" . $searchTerm . "%' ORDER BY `id` ASC";
    //echo $query;
    $result = mysqli_query($linkId, $query);
    $data = array();
//    array_push($data,"<ul class='list-unstyled'>");

    if (mysqli_affected_rows($linkId) > 0) {
        while ($row = mysqli_fetch_array($result)) {
//            $output .= "<li class='abc' data-id='".$row['id']."'>" . $row['name'] . "&emsp;(Volume " . $row['vol'] . " " . $row['date'] . ")</li>";
            $data1 = array();
            $data1['id'] = $row['id'];
            $data1['name'] = $row['name'];
            $data1['vol'] = $row['vol'];
            $data1['date'] = $row['date'];
            array_push($data,$data1);
        }
    }

//    array_push($data,"</ul>");
//    $output .= "</ul>";
    echo json_encode($data);//$output;
}

elseif ($id == 2){
//    $output = '<ul class="list-unstyled">';
    $query = "SELECT * FROM `submissions` WHERE `title` LIKE '%" . $searchTerm . "%' ORDER BY `id` ASC";
//    echo $query;
    $result = mysqli_query($linkId, $query);
    $data = array();

    if (mysqli_affected_rows($linkId) > 0) {
        while ($row = mysqli_fetch_array($result)) {
//            $output .= "<li class='abcd'>[" . $row['id'] . "]  " . $row['name'] . "    (Date: ".$row['subdate'].")</li>";
            $data1 = array();
            $data1['id'] = $row['id'];
            $data1['title'] = $row['title'];
            $data1['date'] = $row['subdate'];
            array_push($data,$data1);
        }
    }

//    $output .= "</ul>";
    echo json_encode($data);//$output;
}

elseif ($id == 3 && $_POST['issueId'] != null && is_numeric($_POST['issueId'])){
//    $output = '<ul class="list-unstyled">';
    $query = "SELECT * FROM `articles` WHERE `issues_id` = ".$_POST['issueId']." AND `name` LIKE '%" . $searchTerm . "%' ORDER BY `id` ASC";
//    echo $query;
    $result = mysqli_query($linkId, $query);
    $data = array();

    if (mysqli_affected_rows($linkId) > 0) {
        while ($row = mysqli_fetch_array($result)) {
//            $output .= "<li class='abcd' data-id='".$row['id']."'>" . $row['name'] . "&emsp;(Date: ".$row['subdate'].")</li>";
            $data1 = array();
            $data1['id'] = $row['id'];
            $data1['name'] = $row['name'];
            $data1['date'] = $row['subdate'];
            array_push($data,$data1);
        }
    }

//    $output .= "</ul>";
    echo json_encode($data);//$output;
}

elseif ($id == 4 && $_POST['articleId'] != null && is_numeric($_POST['articleId'])){
//    $output = '<ul class="list-unstyled">';
    $query = "SELECT `type`,`abstract`,`keywords`,`authors`,`file` FROM `articles` WHERE `id` = '".$_POST['articleId']."'";
//    echo $query;
    $result = mysqli_query($linkId, $query);

    $data = array();
    if (mysqli_affected_rows($linkId) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $data['abstract'] = $row['abstract'];
            $data['keywords'] = $row['keywords'];
            $data['authors'] = $row['authors'];
            $data['file'] = $row['file'];
            $data['type'] = $row['type'];
//            $output .= "<li class='abcd'>[" . $row['id'] . "]  " . $row['name'] . "    (Date: ".$row['subdate'].")</li>";
        }
    }

//    $output .= "</ul>";
    echo json_encode($data);
}

elseif ($id == 5){
    $output = "";
    $output = '<ul class="list-unstyled">';
    $query = "SELECT `id`, `name`, `pubdate` FROM `articles` WHERE `name` LIKE '%" . $searchTerm . "%'";
//    echo $query;
    $result = mysqli_query($linkId, $query);

//    $data = array();
    if (mysqli_affected_rows($linkId) > 0) {
        while ($row = mysqli_fetch_array($result)) {
//            array_push($data,$row['abstract']);
            $output .= "<li><a class='abcd' href='article.php?d=".$row['id']."'>" . $row['name'] . "    (Date: ".$row['pubdate'].")</a></li>";
        }
    }

    $output .= "</ul>";
//    echo json_encode($data);
    echo $output;
}

elseif ($id == 6 && is_numeric($id)){
//    $output = '<ul class="list-unstyled">';
    $query = "SELECT * FROM `editor` WHERE `name` LIKE '%" . $searchTerm . "%' ORDER BY `id` ASC";
//    echo $query;
    $result = mysqli_query($linkId, $query);
    $data = array();

    if (mysqli_affected_rows($linkId) > 0) {
        while ($row = mysqli_fetch_array($result)) {
//            $output .= "<li class='abcd' data-id='".$row['id']."'>" . $row['name'] . "&emsp;(Date: ".$row['subdate'].")</li>";
            $data1 = array();
            $data1['id'] = $row['id'];
            $data1['name'] = $row['name'];
            $data1['desg'] = $row['desg'];
            $data1['email'] = $row['email'];
            array_push($data,$data1);
        }
    }

//    $output .= "</ul>";
    echo json_encode($data);//$output;
}