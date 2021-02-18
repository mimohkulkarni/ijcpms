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


$sqlMaxDwn = "SELECT `articles`.`name`, `issues`.`vol`, `issues`.`date`, `articles`.`dcount` FROM `articles` 
                INNER JOIN `issues` ON `articles`.`issues_id` = `issues`.`id` ORDER BY `articles`.`dcount` DESC LIMIT 5";

$resultMaxDwn = mysqli_query($linkId,$sqlMaxDwn);

$fromSub = 0;
$sqlCard = "SELECT `fromsub` FROM `articles`";
$resultCard = mysqli_query($linkId,$sqlCard);
$totalArticles = mysqli_affected_rows($linkId);
while($rowCard = mysqli_fetch_array($resultCard)){
    if($rowCard['fromsub'] == "1") $fromSub++;
}

$sqlNewSubmisions = "SELECT `id` FROM `submissions`";
mysqli_query($linkId,$sqlNewSubmisions);
$newSub = mysqli_affected_rows($linkId);

$sqlIssues = "SELECT `id` FROM `issues`";
mysqli_query($linkId,$sqlIssues);
$totalIssues = mysqli_affected_rows($linkId);

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="#" type="image/png">
        <title>Admin Login</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/68c66954a3.js" crossorigin="anonymous"></script>
        <!-- Main css -->
        <link rel="stylesheet" href="css/card.css">
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
                                <li class="nav-item active"><a class="nav-link" href="adminHome.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="cissue.php">Create Issue</a></li>
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
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <h2 class="title_color text-center admin">Most Downloaded Articles</h2>
                <table class="table table-bordered table-hover text-center" style="box-shadow: 0 10px 20px #8c8c8c;">
                    <thead class="thead-dark">
                        <th>Sr. No</th>
                        <th>Name</th>
                        <th>Issue</th>
                        <th>Count</th>
                    </thead>
                    <?php
                    $i = 0;
                    while ($rowwMaxDwn = mysqli_fetch_array($resultMaxDwn)){
                        $issue = date("Y",strtotime($rowwMaxDwn['date']))." Vol ".$rowwMaxDwn['vol'];
                        $i++;
                        ?><tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo ucwords($rowwMaxDwn['name']);?></td>
                        <td><?php echo $issue;?></td>
                        <td><?php echo $rowwMaxDwn['dcount'];?></td>
                        </tr><?php
                    }
                    ?>
                </table>
            </div>
            <div class="col-lg-5 mb-60">
                <section class="cards admin">
                    <div class="card card--tree card-right">
                        <div class="card__svg-container">
                            <i class="fa fa-envelope-o fa-10x"></i>
                        </div>
                        <div class="card__count-container">
                            <div class="card__count-text">
                                <span class="card__count-text--big"><?php echo $newSub;?></span>
                            </div>
                        </div>
                        <div class="card__stuff-container">
                            <div class="card__stuff-text"> New Submissions </div>
                        </div>
                    </div>

                    <div class="card card--tree">
                        <div class="card__svg-container">
                            <i class="fa fa-envelope-open-o fa-10x"></i>
                        </div>
                        <div class="card__count-container">
                            <div class="card__count-text">
                                <span class="card__count-text--big"><?php echo $fromSub;?></span>
                            </div>
                        </div>
                        <div class="card__stuff-container">
                            <div class="card__stuff-text"> Accepted Submissions </div>
                        </div>
                    </div>
                </section>
                <section class="cards">
                    <div class="card card--tree card-right">
                        <div class="card__svg-container">
                            <i class="fa fa-file-text-o fa-10x"></i>
                        </div>
                        <div class="card__count-container">
                            <div class="card__count-text">
                                <span class="card__count-text--big"><?php echo $totalArticles;?></span>
                            </div>
                        </div>
                        <div class="card__stuff-container">
                            <div class="card__stuff-text"> Total Articles </div>
                        </div>
                    </div>

                    <div class="card card--tree">
                        <div class="card__svg-container">
                            <i class="fa fa-book fa-10x"></i>
                        </div>
                        <div class="card__count-container">
                            <div class="card__count-text">
                                <span class="card__count-text--big"><?php echo $totalIssues;?></span>
                            </div>
                        </div>
                        <div class="card__stuff-container">
                            <div class="card__stuff-text"> Total Issues </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!--================ End Page Content =================-->


    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>





    </body>
</html>