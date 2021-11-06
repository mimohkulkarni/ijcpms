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

$sqlSubmission = "SELECT * FROM `submissions` WHERE `accept` = '0'";
$resultSubmission = mysqli_query($linkId,$sqlSubmission);
$countSub = mysqli_affected_rows($linkId);

if (isset($_POST['submit'])){
    $issue = $_POST['issue'];
    $issue_id = substr(explode("]",$issue)[0],1);
//    echo "<script>alert('$issue_id');</script>";



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
                                    <li class="nav-item"><a class="nav-link" href="missue.php">Modify Issue</a></li>
                                    <li class="nav-item"><a class="nav-link" href="addeditor.php">Add Editor</a></li>
                                    <li class="nav-item active"><a class="nav-link" href="adminSub.php">Submissions</a></li>
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
            <form action="pissue.php" method="post">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <h2 class="title_color text-center admin">Pending Submissions</h2>
                        <div class="container">
                            <table class="table table-bordered table-hover text-center">
                                <?php
                                    if ($countSub > 0){
                                        ?>
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">Sr No</th>
                                                <th scope="col">Author Names</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Mobile</th>
                                                <th scope="col">Title</th>
                                                <th scope="col">Submission Date</th>
                                                <th scope="col">Article PDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $i = 1;
                                        while ($rowSub = mysqli_fetch_array($resultSubmission)){
                                            $file = $rowSub['file'];
                                            $title = $rowSub['title'];
                                            echo "<tr>";
                                                echo "<td>".$i++."</td>";
                                                echo "<td>".$rowSub['name']."</td>";
                                                echo "<td>".$rowSub['email']."</td>";
                                                echo "<td>".$rowSub['mobile']."</td>";
                                                echo "<td>".$rowSub['title']."</td>";
                                                echo "<td>".date("F j, Y",strtotime($rowSub['subdate']))."</td>";
                                                echo "<td><span class='text-info subdownload' style='text-decoration: underline;cursor: pointer' data-file='".$file."' data-name='".$title."'>View File</span></td>";
                                            echo "</tr>";
                                        }
                                    }
                                    else echo "<thead class='thead-dark'><tr><th colspan='7'>No New Submissions Found</th></tr></thead>";
                                ?>
                                </tbody>
                            </table>
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
    <script src="js/subdownload.js"></script>
    </body>
</html>