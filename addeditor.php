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

$lblSuccess = "";
$lblError = "";
$errorFile = "";

if (isset($_POST['btnAddEditor'])){
    $txtEditorName = $_POST['txtAddEditorName'];
    $txtDesg = $_POST['txtAddDesg'];
    $txtEmail = $_POST['txtAddEmail'];
    $isEditor = $_POST['isEditor'];
    $checkbox = null;
    if(isset($_POST['checkbox']))
        $checkbox = $_POST['checkbox'];
    
    if (!empty($txtEditorName) && !empty($txtDesg) && !empty($txtEmail) && ($isEditor == 1 || $isEditor == 0)){

        try {
            $sha_filename = $ext = "";

            if($checkbox == null){
                // Undefined | Multiple Files | $_FILES Corruption Attack
                // If this request falls under any of them, treat it invalid.
                if (isset($_FILES['editorFile']['error']) &&
                    is_array($_FILES['editorFile']['error']) ) {
                    throw new RuntimeException('Invalid Image Found.');
                }

                // Check $_FILES['editorFile']['error'] value.
                switch ($_FILES['editorFile']['error']) {
                    case UPLOAD_ERR_OK:
                        break;
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        throw new RuntimeException('Exceeded File Size limit.');
                    default:
                        throw new RuntimeException('Unknown error.');
                }

                // You should also check filesize here.
                if ($_FILES['editorFile']['size'] > 2097152) {
                    throw new RuntimeException('Exceeded File size limit.');
                }

                // DO NOT TRUST $_FILES['editorFile']['mime'] VALUE !!
                // Check MIME Type by yourself.
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                if (false === $ext = array_search(
                        $finfo->file($_FILES['editorFile']['tmp_name']),
                        array(
                            'jpeg' => 'image/jpeg',
                            'jpg' => 'image/jpg',
                            'png' => 'image/png'
                        ),
                        true
                    )) {
                    throw new RuntimeException('Invalid file format.');
                }

                // You should name it uniquely.
                // DO NOT USE $_FILES['editorFile']['name'] WITHOUT ANY VALIDATION !!
                // On this example, obtain safe unique name from its binary data.
                $sha_filename = sha1_file($_FILES['editorFile']['tmp_name']);

                if (file_exists(sprintf('./assets/img/%s.%s', $sha_filename,$ext))){
                    throw new RuntimeException('File already exists.');
                }

            }

            $fileName = "default.png";
            if($checkbox == null){
                $fileName = $sha_filename.".".$ext;
                if(!move_uploaded_file($_FILES['editorFile']['tmp_name'],sprintf('./assets/img/%s.%s', $sha_filename,$ext)))
                    throw new RuntimeException('Failed to upload file.');
            }
            $sqlAddEditor = "INSERT INTO `editor`(`name`, `desg`, `email`,`img`,`editor`) VALUES ('".$txtEditorName."','".$txtDesg."','".$txtEmail."','".$fileName."','".$isEditor."')";
            mysqli_query($linkId,$sqlAddEditor);
            if (mysqli_affected_rows($linkId) == 1){
                $lblSuccess = "Editor Added Successfully";
            }
            else{
                $lblError = "Error Adding New Editor";
                if($checkbox == null && file_exists(sprintf('./assets/img/%s',$fileName))){
                    unlink('./assets/img/'.$fileName);
                }
                throw new RuntimeException('Unknown error.');
            }

        } catch (RuntimeException $e) {
            $errorFile = ucwords($e->getMessage());
        }
    }
    else $lblError = "All Fields Are Mandatory";
}


if (isset($_POST['btnDeleteEditor'])) {
    $txtDeleteEditorId = $_POST['txtDeleteEditorId'];

    if (!empty($txtDeleteEditorId)) {
        $sqlSelectEditor = "SELECT `img` FROM `editor` WHERE `id` = '" . $txtDeleteEditorId . "'";
        $resultEditor = mysqli_query($linkId,$sqlSelectEditor);
        if(mysqli_affected_rows($linkId) == 1){
            $fileName = null;
            while($row_Editor = mysqli_fetch_array($resultEditor)){
                $fileName = $row_Editor['img'];
            }
            if(!empty($fileName) && $fileName != "default.png" && file_exists(sprintf('./assets/img/%s',$fileName))){
                unlink('./assets/img/'.$fileName);
            }
            $sqlDeleteEditor = "DELETE FROM `editor` WHERE `id` = '" . $txtDeleteEditorId . "'";
            mysqli_query($linkId, $sqlDeleteEditor);

            if (mysqli_affected_rows($linkId) >= 0) $lblSuccess = "Editor Deleted Successfully.";
            else $lblError = "Editor Deletion Unsuccessful.";
        }
        else $lblError = "Editor Deletion Unsuccessful.";

    } else $lblError = "Please Search and Select Editor to Delete";
}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="#" type="image/png">
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
                                    <li class="nav-item"><a class="nav-link" href="missue.php">Modify Issue</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="addeditor.php">Add Editor</a></li>
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
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <h2 class="title_color text-center admin"><span id="spanMainTitle">Add New Editor</span></h2>
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> <span id="spanTitle">Add Editor</span>
                                    </div>
                                    <div class="card-body">
                                        <form action="addeditor.php" method="post" enctype="multipart/form-data">
                                            <?php
                                            if (!empty($lblSuccess)) {
                                                ?>
                                                <div class="alert alert-success mb-3">
                                                    <strong><?php echo $lblSuccess; ?></strong>
                                                </div>
                                                <?php
                                                $lblSuccess = "";
                                            }
                                            if (!empty($lblError)) {
                                                ?>
                                                <div class="alert alert-danger mb-3">
                                                    <strong><?php echo $lblError; ?></strong>
                                                </div>
                                                <?php
                                                $lblError = "";
                                            }
                                            ?>
                                            <div id="addDiv">
                                                <div class="form-group">
                                                    <label for="txtEditorName">Editor Name</label>
                                                    <input type="text" class="form-control" name="txtAddEditorName" id="txtAddEditorName" placeholder="Enter Editor Name" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtAddDesg">Editor's Designation</label>
                                                    <input type="text" class="form-control" name="txtAddDesg" id="txtAddDesg" placeholder="Enter Designation" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="txtAddEmail">Editor's Email Address</label>
                                                    <input type="email" name="txtAddEmail" placeholder="Enter Email Address" class="form-control" id="txtAddEmail" required/>
                                                </div>
                                                <div class="form-group">
                                                    <label for="isEditor">Select Title</label>
                                                    <select class="form-control" name="isEditor">
                                                    <option value="1" selected>Editor</option>
                                                    <option value="0">Reviewer</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">    
                                                    <label for="name">Editor Photo</label>
                                                    <div class="custom-file">
                                                        <input type="file" name="editorFile" class="custom-file-input" id="editorFIle">
                                                        <label class="custom-file-label" for="editorFile">Choose file</label>
                                                    </div>
                                                    <div class="form-check mt-2">
                                                        <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                                                        <label class="form-check-label" for="checkbox">Choose Default</label>
                                                    </div>
                                                    <label class="text-danger"><?php echo $errorFile; ?></label>
                                                    <small class="form-text text-muted">Only image files allowed.<br>Max size is 2 MB.</small>
                                                </div>
                                                <div class="form-group">
                                                </div>
                                                <div class="mx-auto">
                                                    <button type="submit" name="btnAddEditor" class="btn btn-primary text-center">Submit</button>
                                                </div>
                                                <div class="mx-auto mt-2">
                                                    <button type="button" id="btnDeleteSwitch" class="btn btn-warning text-center">Switch To Delete Editor <i class="fa fa-long-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="addeditor.php" method="post">
                                            <div id="deleteDiv" style="display: none;">
                                                <div class="form-group">
                                                    <label for="txtEditor">Search Editor Name</label>
                                                    <input type="text" autocomplete="off" name="txtEditor" id="txtEditor" class="form-control" placeholder="Enter Editor Name" />
                                                    <div id="editorList" class="autocomplete-items"></div>
                                                    <small id="editor" class="form-text text-muted">Do not change the name here.</small>
                                                </div>
                                                <div id="deleteInnerDiv" style="display: none;">
                                                    <div class="form-group">
                                                        <label for="txtDeleteDesg">Editor's Designation</label>
                                                        <input type="text" class="form-control" name="txtDeleteDesg" id="txtDeleteDesg" placeholder="Enter Designation" disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="txtDeleteEmail">Editor's Email Address</label>
                                                        <input type="email" name="txtDeleteEmail" placeholder="Enter Email Address" class="form-control" id="txtDeleteEmail" disabled/>
                                                    </div>
                                                </div>
                                                <input type="hidden" id="txtDeleteEditorId" name="txtDeleteEditorId" value="">
                                                <div class="mx-auto">
                                                    <input type="submit" name="btnDeleteEditor" class="btn btn-danger text-center" value="Delete Editor">
                                                </div>
                                                <div class="mx-auto mt-2">
                                                    <button type="button" id="btnAddSwitch" class="btn btn-warning text-center"><i class="fa fa-long-arrow-left"></i> Switch To Add Editor</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="card bg-light mb-3">
                                    <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Instructions</div>
                                    <div class="card-body">
                                        <p>In add New Editor Section all fields are mandatory for adding editor.</p>
                                        <p>Editor photo is not mandatory, but if no image available please select 'Choose Default'.</p>
                                        <p>In delete Editor Section search and select an editor.</p>
                                        <p>Editor should exist first in order to find it.</p>
                                        <p>In Editor Delete Section Designation and Email fields are non-editable.</p>
                                        <p>In order to edit Edior Details delete that editor and re-create it again.</p>
                                        <p class="text-danger">If you delete an editor it will be permanently deleted</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1"></div>
            </div>
        </div>
        <!--================ End Page Content =================-->


        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="js/autocompleteeditor.js"></script>
        <script src="js/adddeletehideshow.js"></script>
        <script>
            $(".custom-file-input").on("change", function() {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        </script>
        <script>
            $('#checkbox').change(function(){
                const checkbox = $('#checkbox').is(":checked");
                // alert(checkbox);
                if(checkbox) $('#editorFIle').attr('disabled',true);
                else $('#editorFIle').attr('disabled',false);
            });
        </script>
    </body>
</html>