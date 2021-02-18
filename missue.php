<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 09/10/2020
 * Time: 7:00 PM
 */
require_once("dbconn.php");
require_once("header.php");
$uname = $_SESSION['user'];

$lblError = "";
$lblSuccess = "";


if (isset($_POST['modify'])){
    $txtIssueId = $_POST['txtIssueId'];
    $txtArticleId = $_POST['txtArticleId'];
    $txtIssue = $_POST['txtIssue'];
    $txtSubArticle = $_POST['txtSubArticle'];
    $selectType = $_POST['selectType'];
    $txtAbstract = $_POST['txtAbstract'];
    $txtKeywords = $_POST['txtKeywords'];
    $txtAuthors = $_POST['txtAuthors'];

    if (!empty($txtIssueId) && !empty($txtIssue)) {

        if (empty($txtArticleId)) {

            $issueUpdateCount = updateIssue($linkId,$txtIssueId,$txtIssue);

            if ($txtArticleId == 1 || $txtArticleId == 0) $lblSuccess = "Issue modified successfully";
        }

        elseif (!empty($txtArticleId) && !empty($txtSubArticle) && !empty($txtAbstract) && !empty($txtKeywords)
            && !empty($txtAuthors) && $selectType != "0") {

            $issueUpdateCount = updateIssue($linkId,$txtIssueId,$txtIssue);

            if ($issueUpdateCount == 1 || $issueUpdateCount == 0) {

                $sqlArticleUpdate = "UPDATE `articles` SET `name` = '" . $txtSubArticle . "',`authors` = '" . $txtAuthors . "',`abstract` = '" . $txtAbstract . "',`keywords` = '" . $txtKeywords . "',`type` = '" . $selectType . "' WHERE `id` = '" . $txtArticleId . "'";
                mysqli_query($linkId, $sqlArticleUpdate);

                if (mysqli_affected_rows($linkId) == 1) $lblSuccess = "Issue and Article modified successfully";
                else $lblError = "Error occurred0.";
            }
            else $lblError = "Error occurred1.";
        }
        else $lblError = "All fields are mandatory to modify article";
    }
    else $lblError = "Please select an issue to modify";

}

function updateIssue($linkId,$issueId,$issueName){
    $sqlIssueUpdate = "UPDATE `issues` SET `name` = '" . $issueName . "' WHERE `id` = '" . $issueId . "'";
    //        echo $sqlIssueUpdate;
    mysqli_query($linkId, $sqlIssueUpdate);
    return mysqli_affected_rows($linkId);
}

if (isset($_POST['deleteArticle'])){
    $txtArticleId = $_POST['txtArticleId'];

    if (!empty($txtArticleId)){

        $sqlArticleDelete = "DELETE FROM `articles` WHERE `id` = '".$txtArticleId."'";
        mysqli_query($linkId,$sqlArticleDelete);

        if (mysqli_affected_rows($linkId) == 1) $lblSuccess = "Article deleted successfully";
        else{
            $lblError = "Error occurred.";
            exit;
        }
    }
    else{
        $lblError = "Please select Issue and Article";
    }
}

if (isset($_POST['deleteIssue'])){
    $txtIssueId = $_POST['txtIssueId'];

    if (!empty($txtIssueId)){

        $sqlIssueDelete = "DELETE FROM `issues` WHERE `id` = '".$txtIssueId."'";
        mysqli_query($linkId,$sqlIssueDelete);

        if (mysqli_affected_rows($linkId)){
            $sqlIssueArticleDelete = "DELETE FROM `articles` WHERE `issues_id` = '".$txtIssueId."'";
            mysqli_query($linkId,$sqlIssueArticleDelete);

            if (mysqli_affected_rows($linkId) >= 0) $lblSuccess = "Issue and its Articles deleted successfully";
            else{
                $lblError = "Error occurred0.";
            }
        }
        else{
            $lblError = "Error occurred1.";
        }
    }
    else{
        $lblError = "Please select Issue";
    }
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>Admin Login</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/68c66954a3.js" crossorigin="anonymous"></script>

        <!-- Main css -->
        <link rel="stylesheet" href="css/autocomplete.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>

    <!--================Header Area =================-->
        <header class="admin_header">
            <div class="logo_part">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2 d-flex justify-content-center align-items-center">
                            <a class="logo" href="index.php"><img src="img/logo.png" alt="" style="width: 100%"></a>
                    </div>
                    <div class="col-sm-9 d-flex justify-content-center align-items-center">
                        <h2 class="typo-list text-center">INDIAN JOURNAL OF CLINICAL PHARMACY AND MEDICAL SCIENCES</h2>
                    </div>
                    <div class="col-sm-1 d-flex justify-content-center align-items-center">
                        <div class="header_magazin">
                            <img src="img/favicon1.png" alt="logo">
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light mb-2">
                    <div class="container">
                        <div class="container_inner">
                            <!-- For better mobile display -->
                            <a class="navbar-brand logo_h" href="index.php"><img src="img/logo.png" alt=""></a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <!-- Nav links and forms -->
                            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                <ul class="nav navbar-nav menu_nav">
                                    <li class="nav-item"><a class="nav-link" href="adminHome.php">Home</a></li>
                                    <li class="nav-item"><a class="nav-link" href="cissue.php">Create Issue</a></li>
                                    <li class="nav-item"><a class="nav-link" href="pissue.php">Publish Articles</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="missue.php">Modify Issue</a></li>
                                    <li class="nav-item"><a class="nav-link" href="addeditor.php">Add Editor</a></li>
                                    <li class="nav-item"><a class="nav-link" href="adminSub.php">Submissions</a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right ml-auto">
                                    <li class="nav-item active"><a href="logout.php" class="login">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="container mt-3">
                <h4 class="welcome">Welcome <?php echo $uname;?></h4>
            </div>
        </header>
        <!--============= End Header Area ==============-->

        <!--============= Start Page Content ==============-->
        <div class="container mb-60">
            <form action="missue.php" method="post">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <h2 class="title_color text-center admin">Modify Issue/Articles</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Modify Issue
                                        </div>
                                        <div class="card-body">
                                            <?php
                                            if (!empty($lblSuccess)) {
                                                ?>
                                                <div class="alert alert-success mb-3">
                                                    <strong><?php echo $lblSuccess; ?></strong>
                                                </div>
                                                <?php
                                                $lblSuccess = "";
                                            }
                                            elseif (!empty($lblError)) {
                                                ?>
                                                <div class="alert alert-danger mb-3">
                                                    <strong><?php echo $lblError; ?></strong>
                                                </div>
                                                <?php
                                                $lblError = "";
                                            }
                                            ?>
                                            <div class="form-group">
                                                <label for="txtIssue">Search Issue Name</label>
                                                <input type="text" autocomplete="off" name="txtIssue" id="txtIssue" class="form-control" placeholder="Issue Name" />
                                                <div id="issueList" class="autocomplete-items"></div>
                                            </div>
                                            <div class="form-group">
                                                <label for="subArticle">Search Article Issue<small>(Optional)</small></label>
                                                <input type="text" autocomplete="off" name="txtSubArticle" id="txtSubArticle" class="form-control" placeholder="Article Title" />
                                                <div id="subArticleList" class="autocomplete-items"></div>
                                            </div>
                                            <div id="hideShow" style="display: none">
                                                <div class="form-group">
                                                    <label for="type">Select</label>
                                                    <select name="selectType" id="selectType" class="custom-select">
                                                        <option selected value="0">Select</option>
                                                        <option value="original research article">Original Research Article</option>
                                                        <option value="case report">Case Report</option>
                                                        <option value="pictorial essay">Pictorial Essay</option>
                                                        <option value="review article">Review Article</option>
                                                        <option value="short communication">Short Communication</option>
                                                        <option value="editorial">Editorial</option>
                                                        <option value="letter to editor">Letter to Editor</option>
                                                        <option value="commentary/opinion/perspective">Commentary/Opinion/Perspective</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="abstract">Abstract</label>
                                                    <textarea class="form-control" name="txtAbstract" id="txtAbstract" rows="5" placeholder="Enter Article's Abstract"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="keywords">Keywords</label>
                                                    <textarea class="form-control" name="txtKeywords" id="txtKeywords" rows="2" placeholder="Enter Article's Keywords"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="intro">Authors</label>
                                                    <textarea class="form-control" name="txtAuthors" id="txtAuthors" rows="5" placeholder="Enter Article's Authors"></textarea>
                                                </div>
                                                <input type="hidden" id="txtIssueId" name="txtIssueId" value="">
                                                <input type="hidden" id="txtArticleId" name="txtArticleId" value="">
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-1"></div>
                                                <div class="col-lg-10">
                                                    <table class="table table-borderless" style="z-index: 99">
                                                        <tr class="text-center">
                                                            <td>
                                                                <button type="submit" name="modify" class="btn btn-primary text-center">Modify</button>
                                                            </td>
                                                            <td>
                                                                <button type="button" id="btnReset" class="btn btn-warning text-center">Reset All</button>
                                                            </td>
                                                        </tr>
                                                        <tr class="text-center">
                                                            <td>
                                                                <button type="submit" name="deleteArticle" class="btn btn-danger text-center">Delete Article</button>
                                                            </td>
                                                            <td>
                                                                <button type="submit" name="deleteIssue" class="btn btn-danger text-center ">Delete Issue</button>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <div class="col-lg-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Instructions</div>
                                        <div class="card-body">
                                            <p>Issue must be created first in order to find it here.</p>
                                            <p>Article must be published first in order to find it here.</p>
                                            <p>Values of the fields Abstract, Keywords and Authors must be filled.</p>
                                            <p class="text-danger">If you delete an article it will be permanently deleted</p>
                                            <p class="text-danger">If you delete an issue then that issue and all articles of that issue will be permanently deleted</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                </div>
            </form>
        </div>
    <!--================ End Page Content =================-->

    <!-- JavaScript Files -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"></script>
    <script src="js/autocompletemodify.js"></script>
    <script>
        $(document).ready(function(){
            $('#btnReset').click(function(){
                $('#txtIssue').val("");
                $('#txtSubArticle').val("");
                $('#selectType').val("0");
                $('#txtAbstract').val("");
                $('#txtKeywords').val("");
                $('#txtAuthors').val("");
                $('#hideShow').fadeOut();
            });
        });
    </script>
    </body>
</html>