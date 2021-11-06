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

if (isset($_POST['submit'])){
    $txtName = $_POST['txtName'];
    $txtVol = $_POST['txtVol'];
    $txtDate = $_POST['txtDate'];
    $txtGuest = $_POST['txtGuest'];

    if (!empty($txtName) && !empty($txtVol) && !empty($txtDate)){
        $sqlIssueNo = "SELECT MAX(`issue_no`) AS `max_issue_no` FROM `issues` WHERE year(`date`) = '".date('Y',strtotime($txtDate))."'";
        $resultIssueNo = mysqli_query($linkId,$sqlIssueNo);

        while ($rowIssueNo = mysqli_fetch_array($resultIssueNo)) {
            $max_issue_no = $rowIssueNo['max_issue_no'] + 1;
            $sqlIssue = "INSERT INTO `issues`(`name`, `guest`, `issue_no`, `vol`, `date`) VALUES ('" . $txtName . "','" . $txtGuest . "','" .$max_issue_no."','".$txtVol."','".$txtDate."')";
            mysqli_query($linkId,$sqlIssue);
            if (mysqli_affected_rows($linkId) == 1) $lblSuccess = "Issue Created Successfully";
            else $lblError = "Issue Creation Unsuccessful";
        }
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
                                <li class="nav-item active"><a class="nav-link" href="cissue.php">Create Issue</a></li>
                                <li class="nav-item"><a class="nav-link" href="pissue.php">Publish Articles</a></li>
                                <li class="nav-item"><a class="nav-link" href="missue.php">Modify Issue</a></li>
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
        <div class="row">
            <div class="col-lg-1"></div>
            <div class="col-lg-10">
                <h2 class="title_color text-center admin">Create New Issue</h2>
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Create Issue
                                </div>
                                <div class="card-body">
                                    <form action="cissue.php" method="post">
                                        <?php
                                        if (!empty($lblSuccess)) {
                                            ?>
                                            <div class="alert alert-success mb-3">
                                                <strong><?php echo $lblSuccess; ?></strong>
                                            </div>
                                            <?php
                                            $lblSuccess = "";
                                        }
                                        if (!empty($lblSuccess)) {
                                            ?>
                                            <div class="alert alert-danger mb-3">
                                                <strong><?php echo $lblError; ?></strong>
                                            </div>
                                            <?php
                                            $lblSuccess = "";
                                        }
                                        ?>
                                        <div class="form-group">
                                            <label for="name">Issue Name</label>
                                            <input type="text" class="form-control" name="txtName"  placeholder="Enter name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtVol">Volume No</label>
                                            <input type="number" class="form-control" name="txtVol" placeholder="Enter Volume No" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Publishing Date</label>
                                            <input type="date" name="txtDate" class="form-control" id="message" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="txtguest">Special Guests<small> (Optional)</small></label>
                                            <input type="text" class="form-control" name="txtGuest" placeholder="Enter Guest Names">
                                        </div>
                                        <div class="mx-auto">
                                            <button type="submit" name="submit" class="btn btn-primary text-center">Submit</button>
                                            <button type="button" class="btn btn-danger text-center ml-2">Reset</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="card bg-light mb-3">
                                <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Instructions</div>
                                <div class="card-body">
                                    <p>Issue name must be unique.</p>
                                    <p>Dont use volume no and date in issue name.(We display them whenever issue name is requested).</p>
                                    <p>Volume no must be unique for given year</p>
                                    <p>Publishing date must not contradict with other issue publishing date.</p>
                                    <p>Example: Issue Name, Volume 3, 2020</p>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

    </body>
</html>