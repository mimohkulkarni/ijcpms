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

$txtAbstract = "";
$txtKeywords = "";
$txtAuthors = "";

$errorFile = "";
$lblSuccess ="";
$lblError = "";


if (isset($_POST['submit'])){
    $txtIssueId = $_POST['txtIssueId'];
    $txtSubArticleId = $_POST['txtSubArticleId'];
    $txtIssue = $_POST['txtIssue'];
    $txtSubArticle = $_POST['txtSubArticle'];
    $selectType = $_POST['selectType'];
    $txtAbstract = $_POST['txtAbstract'];
    $txtKeywords = $_POST['txtKeywords'];
    $txtAuthors = $_POST['txtAuthors'];

    if (!empty($txtSubArticleId) && !empty($txtIssueId) && !empty($txtIssue) && !empty($txtSubArticle)
        && !empty($txtAbstract) && !empty($txtKeywords) && !empty($txtAuthors) && $selectType != "0"){

        try {

            // Undefined | Multiple Files | $_FILES Corruption Attack
            // If this request falls under any of them, treat it invalid.
            if ( !isset($_FILES['articleFile']['error']) ||
                is_array($_FILES['articleFile']['error']) ) {
                throw new RuntimeException('Invalid parameters.');
            }

            // Check $_FILES['articleFile']['error'] value.
            switch ($_FILES['articleFile']['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('No file received.');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('Exceeded File Size limit.');
                default:
                    throw new RuntimeException('Unknown error.');
            }

            // You should also check filesize here.
            if ($_FILES['articleFile']['size'] > 5242880) {
                throw new RuntimeException('Exceeded File size limit.');
            }

            // DO NOT TRUST $_FILES['articleFile']['mime'] VALUE !!
            // Check MIME Type by yourself.
            $finfo = new finfo(FILEINFO_MIME_TYPE);
            if (false === $ext = array_search(
                    $finfo->file($_FILES['articleFile']['tmp_name']),
                    array(
                        'pdf' => 'application/pdf',
                    ),
                    true
                )) {
                throw new RuntimeException('Invalid file format.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['articleFile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $sha_filename = sha1_file($_FILES['articleFile']['tmp_name']);

            if (file_exists(sprintf('./assets/pdf/%s.%s', $sha_filename,$ext))){
                throw new RuntimeException('File already exists.');
            }

            if (move_uploaded_file( $_FILES['articleFile']['tmp_name'],
                sprintf('./assets/pdf/%s.%s',
                    $sha_filename,
                    $ext
                    )
                )
            )
            {
                $sqlSubArticle = "SELECT `title`,`subdate` FROM `submissions` WHERE `id` = '".$txtSubArticleId."'";
                $resultSubArticle = mysqli_query($linkId,$sqlSubArticle);

                if (mysqli_affected_rows($linkId) == 1) {
                    while ($rowSubArticle = mysqli_fetch_array($resultSubArticle)) {

                        $sqlArticle = "INSERT INTO `articles`(`issues_id`, `fromsub`, `name`, `authors`, `abstract`, `keywords`, `type`, `subdate`, `pubdate`, `file`, `dcount`)
                                    VALUES ('" . $txtIssueId . "','1','" . $rowSubArticle['title'] . "','" . $txtAuthors . "','" . $txtAbstract . "','" . $txtKeywords . "', '".$selectType."','" . $rowSubArticle['subdate'] . "','" . date('Y-m-d') . "','" .$sha_filename.".".$ext. "','0')";

                        mysqli_query($linkId, $sqlArticle);
                        if (mysqli_affected_rows($linkId) == 1) {

                            $sqlSubUpdate = "UPDATE `submissions` SET `accept` = '1' WHERE `id` = '$txtSubArticleId'";
                            mysqli_query($linkId,$sqlSubUpdate);

                            if (mysqli_affected_rows($linkId) == 1) $lblSuccess = "Manuscript Published Successfully";
                            else{
                                $lblError = "Unknown Error";
                                unlink('/assets/pdf' . DIRECTORY_SEPARATOR . $_FILES['articleFile']['tmp_name']);
                                throw new RuntimeException('Unknown error.');
                            }
                        } else {
                            unlink('/assets/pdf' . DIRECTORY_SEPARATOR . $_FILES['articleFile']['tmp_name']);
                            throw new RuntimeException('Unknown error.');
                        }
                    }
                }
                else{
                    echo "<script>alert('Error. Page Unresponsive.Contact Developer.')</script>";
                    die();
                }

            }
            else{
                throw new RuntimeException('Failed to move uploaded file.');
            }

            $txtIssue = "";
            $txtSubArticle = "";
            $txtAbstract = "";
            $txtKeywords = "";
            $txtAuthors = "";

        } catch (RuntimeException $e) {

            $errorFile = ucwords($e->getMessage());

        }

    }
    else $lblError = "All Fields Are Mandatory";

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
                                <li class="nav-item active"><a class="nav-link" href="pissue.php">Publish Articles</a></li>
                                <li class="nav-item"><a class="nav-link" href="missue.php">Modify Issue</a></li>
                                <li class="nav-item"><a class="nav-link" href="addeditor.php">Add Editor</a></li>
                                <li class="nav-item"><a class="nav-link" href="adminSub.php">Submissions</a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right ml-auto">
                                <li class="nav-item"><a class="nav-link" href="adminSub.php" style="color: #2d8bfa">Contact Developer</a></li>
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
        <form action="pissue.php" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <h2 class="title_color text-center admin">Publish Articles</h2>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Upload Article
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
                                            <label for="name">Search Issue Name</label>
                                            <input type="text" autocomplete="off" name="txtIssue" id="txtIssue" class="form-control" placeholder="Enter Issue Name" />
                                            <div id="issueList" class="autocomplete-items"></div>
                                            <small id="issue" class="form-text text-muted">Do not change the name here.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtVol">Search Article From Submissions</label>
                                            <input type="text" autocomplete="off" name="txtSubArticle" id="txtSubArticle" class="form-control" placeholder="Enter Article Title" />
                                            <div id="subArticleList" class="autocomplete-items"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="type">Select</label>
                                            <select name="selectType" class="custom-select">
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
                                            <textarea class="form-control" name="txtAbstract" rows="5" placeholder="Enter Article's Abtract"><?php echo $txtAbstract; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="keywords">Keywords</label>
                                            <textarea class="form-control" name="txtKeywords" rows="2" placeholder="Enter Article's Keywords"><?php echo $txtKeywords; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="authors">Authors</label>
                                            <textarea class="form-control" name="txtAuthors" rows="2" placeholder="Enter Article's Authors"><?php echo $txtAuthors; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Article File</label>
                                            <div class="custom-file">
                                                <input type="file" name="articleFile" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                            <label class="text-danger"><?php echo $errorFile; ?></label>
                                            <small class="form-text text-muted">Only .pdf files allowed.<br>Max size is 5 MB.</small>
                                        </div>
                                        <div class="alert alert-success mt-3" id="spinnerProgress" style="display: none;">
                                            <div class="row">
                                                <div class="col-lg-1">
                                                    <div class="spinner-border text-danger" role="status">
                                                        <span class="sr-only"></span>
                                                    </div>
                                                </div>
                                                <div class="col-lg-11 align-middle">
                                                    <span  id="spanLoading"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="hidden" id="txtIssueId" name="txtIssueId" value="">
                                        <input type="hidden" id="txtSubArticleId" name="txtSubArticleId" value="">
                                        <div class="mx-auto">
                                            <button type="submit" name="submit" class="btn btn-primary text-center">Submit</button>
                                            <button type="button" class="btn btn-danger text-center ml-2">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card bg-light mb-3">
                                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Instructions</div>
                                    <div class="card-body">
                                        <p>Search and select a issue.</p>
                                        <p>Issue must be created first in order to find it.</p>
                                        <p>Search and select a article.</p>
                                        <p>Article must be submitted first in order to find it..</p>
                                        <p>Values of the fields Abstract, Keywords and Introduction must be filled and can be found in submitted article PDF file.</p>
                                        <p>Article PDF file is uploaded already from submissions. If some changes are to made please re-submit it from submissions.</p>
                                        <p>Date of submission and date of publish of the article will be auto-generated.</p>
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
    <script src="js/autocompletecreate.js"></script>
    <script src="js/upload.js"></script>
    </body>
</html>