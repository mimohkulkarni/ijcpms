<?php
require_once("user_header.php");

$sqlCard = "SELECT `dcount` FROM `articles`";
$resultCard = mysqli_query($linkId,$sqlCard);
$totalArticles = mysqli_affected_rows($linkId);

$dcount = 0;
while($rowCard = mysqli_fetch_array($resultCard)){
    $dcount = $rowCard['dcount'] + $dcount;
}

$sqlIssues = "SELECT `id` FROM `issues`";
mysqli_query($linkId,$sqlIssues);
$totalIssues = mysqli_affected_rows($linkId);

$sqlEditor = "SELECT * FROM `editor` WHERE `editor` = '1'";
$resultEditor = mysqli_query($linkId,$sqlEditor);

$sqlReviewer = "SELECT * FROM `editor` WHERE `editor` = '0'";
$resultReviewer = mysqli_query($linkId,$sqlReviewer);

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>IJCPMS - Editor Board</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/68c66954a3.js" crossorigin="anonymous"></script>
        
        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        
        <!-- Main css -->
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <style>
        @keyframes slideInFromLeft {
  0% {
    transform: rotate(0deg);
  }
  25%{
      transform: rotate(15deg);
  }
  50%{
      transform: rotate(-15deg);
  }
  70%{
      transform: rotate(10deg);
  }
  90%{
      transform: rotate(-5deg);
  }
  100% {
    transform: translateX(0);
    transform: translateY(0);
  }
}

img {  
  /* This section calls the slideInFromLeft animation we defined above */
  animation: 1.5s ease-in 0s 1 slideInFromLeft;
}
        </style>
    </head>
    <body>

        <!--================ Header Area =================-->
        <header class="header_area">
            <div class="top_menu">
                <div class="container">
                    <div class="float-left">
                        <a href="#"><?php echo $today;?></a>
                    </div>
                    <div class="float-right">
                        <ul class="list header_social">
                            <li><a href="https://twitter.com/ijcpms/" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.instagram.com/ijcpms/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="https://www.linkedin.com/company/indian-journal-of-clinical-pharmacy-and-medical-sciences/?viewAsMember=true" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="logo_part">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="float-left">
                                <a class="logo" href="index.php"><img src="img/logo.png" alt="" style="width: 100%"></a>
                            </div>
                        </div>
                        <div class="col-sm-9">
                            <h2 class="typo-list text-center">INDIAN JOURNAL OF CLINICAL PHARMACY AND MEDICAL SCIENCES</h2>
                        </div>
                        <div class="col-sm-1">
                            <div class="align-middle">
                                <div class="header_magazin">
                                    <img src="img/favicon.png" alt="logo">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
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
                                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                                    <li class="nav-item active dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown"
                                           role="button" aria-haspopup="true" aria-expanded="false">
                                            About Us <i class="fa fa-caret-down"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="aboutus.php">About Us</a>
                                            <a class="dropdown-item" href="editorial.php">Editorial Board</a>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="guidelines.php">Guidelines</a></li>
                                    <li class="nav-item"><a class="nav-link" href="archive.php">Archive</a></li>
                                    <?php if(!empty($currentIssue)){ ?>
                                        <li class="nav-item"><a class="nav-link" href="issue.php?d=<?php echo $currentIssue; ?>">Current Issue <span class="blinking align-middle">NEW</span></a></li>
                                    <?php } ?>
                                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                                    <li class="nav-item"><a class="nav-link" href="submission.php">Submission <span class="blinking align-middle">NEW</span></a></li>
                                </ul>
                                <ul class="nav navbar-nav navbar-right ml-auto">
                                    <li class="nav-item"><a href="login.php" class="login">Admin Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!--============= End Header Area ==============-->

        <!--============= Start Home Banner Area ==============-->
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="banner_content text-center">
                                    <div class="banner_content text-center">
                                        <h2>Home > About Us</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= End Home Banner Area ==============-->

        <!--============= Start Page Contents ==============-->
        <section class="news_area p_100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="main_title2">
                            <h2>Editorial Board</h2>
                        </div>
                        <div class="latest_news">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8 text-center">
                                    <img src="img/files/pdc_photo.png" width="150px">
                                    <h4 class="text-info pt-3">Editorial In Chief</h4>
                                    <h4 class="text-default pt-1">Dr. Praveen D. Chaudhari</h4>
                                    <h4 class="text-default pt-1">pdchaudhari21@rediffmail.com</h4>
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <div class="col-lg-6 text-center">
                                    <img src="img/files/assistantEditor1.png" width="150px">
                                    <h4 class="text-info pt-3">Assistant Editor</h4>
                                    <h4 class="text-default pt-1">Dr.Vinayak Ghayal</h4>
                                    <h4 class="text-default pt-1">vin14994@gmail.com</h4>
                                </div>
                                <div class="col-lg-6 text-center">
                                    <img src="img/files/assistantEditor2.png" width="150px">
                                    <h4 class="text-info pt-3">Assistant Editor</h4>
                                    <h4 class="text-default pt-1">Dr.Khadija Aurangabadi</h4>
                                    <h4 class="text-default pt-1">khadija.aurangabadi93@gmail.com</h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <?php if(mysqli_num_rows($resultEditor) > 0){ ?>
                                    <h2 class="text-center">Editors</h2>
                                    <table class="table table-bordered table-hover text-center table-middle">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="align-middle" style="min-width: 70px">Sr No</th>
                                                <th class="align-middle">Image</th>
                                                <th class="align-middle">Editor Name</th>
                                                <th class="align-middle">Designation</th>
                                                <th class="align-middle">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            while($rowEditor = mysqli_fetch_array($resultEditor)){
                                                echo "<tr>";
                                                echo "<td>".$i++."</td>";
                                                echo "<td><img src='assets/img/".$rowEditor['img']."' alt='No Image' width='100' /></td>";
                                                echo "<td>".$rowEditor['name']."</td>";
                                                echo "<td>".$rowEditor['desg']."</td>";
                                                echo "<td>".$rowEditor['email']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <?php if(mysqli_num_rows($resultReviewer) > 0){ ?>
                                    <h2 class="text-center">Reviewers</h2>
                                    <table class="table table-bordered table-hover text-center table-middle">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th class="align-middle" style="min-width: 70px">Sr No</th>
                                                <!-- <th class="align-middle">Image</th> -->
                                                <th class="align-middle">Reviewer Name</th>
                                                <th class="align-middle">Designation</th>
                                                <th class="align-middle">Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $i = 1;
                                            while($rowReviewer = mysqli_fetch_array($resultReviewer)){
                                                echo "<tr>";
                                                echo "<td>".$i++."</td>";
                                                echo "<td>".$rowReviewer['name']."</td>";
                                                echo "<td>".$rowReviewer['desg']."</td>";
                                                echo "<td>".$rowReviewer['email']."</td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="right_sidebar">
                            <aside class="r_widgets social_widgets">
                                <div class="main_title2">
                                    <h2>Journal Information</h2>
                                </div>
                                <ul class="list">
                                    <li><a href="#"><i class="fa fa-envelope"></i> Total Issues <span><?php echo $totalIssues;?></span></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark"></i> Total Articles <span><?php echo $totalArticles; ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-upload"></i> Current Issue <span><?php echo (trim($currentDate) != "00-00-0000") ? date("M-Y",strtotime($currentDate)) : 'NA';?></span></a></li>
                                    <li><a href="#"><i class="fa fa-file-download"></i> Download Score <span><?php echo $dcount;?></span></a></li>
                                </ul>
                            </aside>
                            <div>
                                <div class="main_title2">
                                    <h2>Links</h2>
                                </div>
                                <a href="issue.php?d=<?php echo $currentIssue;?>" class="genric-btn info-border circle arrow" style="width: 100%;font-size: 15px;">Current Issues<span class="fa fa-arrow-right"></span></a>
                                <a href="submission.php" class="genric-btn info-border circle arrow mt-2" style="width: 100%;font-size: 15px;">Submit Your Article<span class="fa fa-arrow-right"></span></a>
                                <a href="guidelines.php" class="genric-btn info-border circle arrow mt-2" style="width: 100%;font-size: 15px;">Auther Guidelines<span class="fa fa-arrow-right"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= End Page Content ==============-->

        <!--============= Start footer Area  ==============-->
        <footer class="footer">
            <div class="container bottom_border">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <h5 class="headin5_amrc col_white_amrc pt2">INDIAN JOURNAL OF CLINICAL PHARMACY AND MEDICAL SCIENCES</h5>
                        <!--headin5_amrc-->
                        <p class="mb-3">The Indian Journal of Clinical Pharmacy and medical sciences (IJCPMS) offers a platform for articles on research in Clinical Pharmacy, Pharmaceutical Care and related practice-oriented subjects in the pharmaceutical sciences.</p>
                        <h5 class="headin5_amrc col_white_amrc">Find us</h5>
                        <p><i class="fa fa-location-arrow"></i> IJCPMS OFFICE H.no 686712, Sant Namdev nagar east, Dhanora road, Beed 431122 </p>
                        <p><i class="fa fa-phone"></i>  +91 72763 63685  </p>
                        <p><i class="fa fa fa-envelope"></i> support@ijcpms.com  </p>
                    </div>
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <h5 class="headin5_amrc col_white_amrc pt2">Quick links</h5>
                        <!--headin5_amrc-->
                        <ul class="footer_ul_amrc">
                            <li><a href="index.php">Home Page</a></li>
                            <li><a href="aboutus.php">About Us</a></li>
                            <li><a href="guidelines.php">Author Guidelines</a></li>
                            <li><a href="archive.php">Archive</a></li>
                            <li><a href="issue.php?d=<?php echo $currentIssue; ?>">Current Issue</a></li>
                            <li><a href="submission.php">Submission</a></li>
                            <li><a href="sitemap.php">Site Map</a></li>
                        </ul>
                        <!--footer_ul_amrc ends here-->
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <h5 class="headin5_amrc col_white_amrc pt2">Follow us</h5>
                        <!--headin5_amrc ends here-->
                        <ul class="footer_ul2_amrc mb-4">
                            <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Twitter - &emsp;<a href="https://twitter.com/ijcpms/">https://twitter.com/ijcpms/</a></p></li>
                            <li><a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a><p>Instagram - &emsp;<a href="https://www.instagram.com/ijcpms/">https://www.instagram.com/ijcpms/</a></p></li>
                            <!--                            <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Twitter about&emsp;<a href="#">https://www.twitter.com/</a></p></li>-->
                        </ul>
                        <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank"><img alt="Creative Commons Licence" style="border-width:0" src="https://i.creativecommons.org/l/by-nc-nd/4.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/" target="_blank">Creative Commons Attribution-NonCommercial-NoDerivatives 4.0 International License</a>.
                        <!--footer_ul2_amrc ends here-->
                    </div>
                </div>
            </div>

            <div class="container">
                <!--foote_bottom_ul_amrc ends here-->
                <p class="text-center">Copyright @<?php echo date("Y"); ?> | Designed by <a href="https://www.facebook.com/mimohkulkarni17">Mimoh Kulkarni</a></p>
                <ul class="footer_ul2_amrc mb-4">
                    <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Twitter - &emsp;<a href="https://twitter.com/ijcpms" target="_blank">twitter.com/ijcpms</a></p></li>
                    <li><a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a><p>Instagram - &emsp;<a href="https://www.instagram.com/ijcpms" target="_blank">instagram.com/ijcpms</a></p></li>
                    <li><a href="#"><i class="fab fa-linkedin fleft padding-right"></i> </a><p>LinkedIn - &emsp;<a href="https://www.linkedin.com/company/indian-journal-of-clinical-pharmacy-and-medical-sciences" target="_blank">linkedin.com/ijcpms</a></p></li>
                    <!--                            <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Twitter about&emsp;<a href="#">https://www.twitter.com/</a></p></li>-->
                </ul>
                <!--social_footer_ul ends here-->
            </div>
        </footer>
        <!--============= End footer Area  ==============-->

    </body>
</html>