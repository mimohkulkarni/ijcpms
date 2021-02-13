<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 14/10/2020
 * Time: 3:16 PM
 */

?>
<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 14/10/2020
 * Time: 12:09 PM
 */

require_once("user_header.php");

if($_GET['d'] == null){
    header("location:page_404.php");
}
else{
    require_once("dbconn.php");
    $articleId = $_GET['d'];

    $sqlArticle = "SELECT * FROM `articles` WHERE `id` = '".$articleId."'";
//    echo $sqlArticles;
    $resultArticles = mysqli_query($linkId,$sqlArticle);
    $articleCount = mysqli_affected_rows($linkId);

    $articleDownloadScore = 0;
    $issueName = "";
    $issueDate = "";
    $issueVol = "";

    $articleName = "";
    $articleType = "";
    $articleAuthors = "";
    $articleAbstract = "";
    $articleKeywords = "";
    $articleSubDate = "";
    $articlePubDate = "";

    if ($articleCount == 1){
        while($rowArticle = mysqli_fetch_array($resultArticles)){
            $articleDownloadScore = $rowArticle['dcount'];

            $articleName = $rowArticle['name'];
            $articleType = $rowArticle['type'];
            $articleAuthors = $rowArticle['authors'];
            $articleAbstract = $rowArticle['abstract'];
            $articleKeywords = $rowArticle['keywords'];
            $articleSubDate = date("F j, Y",strtotime($rowArticle['subdate']));
            $articlePubDate = date("F j, Y",strtotime($rowArticle['subdate']));


            $sqlIssue = "SELECT `name`, `vol`, `date` FROM `issues` WHERE `id` = '".$rowArticle['issues_id']."'";

            $resultIssue = mysqli_query($linkId,$sqlIssue);

            if (mysqli_num_rows($resultIssue) > 0) {
                while ($rowIssue = mysqli_fetch_array($resultIssue)) {
                    $issueName = $rowIssue['name'];
                    $issueDate = $rowIssue['date'];
                    $issueVol = $rowIssue['vol'];
                }
            }
            else  header("location:page_404.php");
        }
    }
    else  header("location:page_404.php");

//if (mysqli_num_rows($resultArticles) > 0){



}

?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="icon" href="img/favicon.png" type="image/png">
        <title>IJCPMS - About</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
              integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <script src="https://kit.fontawesome.com/68c66954a3.js" crossorigin="anonymous"></script>
        <!-- Main css -->
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body oncopy="return false" oncut="return false" onpaste="return false">

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
                                    <li class="nav-item dropdown">
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
                                    <li class="nav-item"><a class="nav-link" href="submission.php">Submissions <span class="blinking align-middle">NEW</span></a></li>
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
                                    <h2>Home > Issue > Article</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= End Home Banner Area ==============-->

        <!--============= Start Page Contents ==============-->
        <section class="news_area p_60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="main_blog_details">
                            <h4> <?php echo ucwords($articleName); ?> </h4>
                            <h5><b>Authors</b></h5>
                            <p class="pl-3"> <?php echo ucwords($articleAuthors); ?> </p>
                            <h5><b>Article Type</b></h5>
                            <p class="pl-3"> <?php echo ucwords($articleType); ?> </p>
                            <h5 class="mt-4"><b>Abstract</b></h5>
                            <p class="pl-3"> <?php echo ucwords($articleAbstract); ?> </p>
                            <h5 class="mt-4"><b>Keywords</b></h5>
                            <p class="pl-3"> <?php echo ucwords($articleKeywords); ?> </p>
                            <div class="mt-4" style="font-size: 16px">
                                Submitted on &nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>  <?php echo $articleSubDate; ?>
                            </div>
                            <div class="mt-3" style="font-size: 16px">
                                Published on &nbsp;<i class="fa fa-calendar" aria-hidden="true"></i>  <?php echo $articlePubDate; ?>
                            </div>
                            <div class="mt-3" style="font-size: 16px">
                                Download Count &nbsp;<i class="fa fa-download" aria-hidden="true"></i> <?php echo $articleDownloadScore; ?>
                            </div>
                        </div>

                        <div class="my-4">
                            <span class="gad_btn ml-2 download" id="<?php echo $articleId; ?>" style="cursor: pointer;font-size: 15px">Download Full Article PDF</span>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="right_sidebar">
                            <aside class="r_widgets social_widgets">
                                <div class="main_title2">
                                    <h2>Issue Information</h2>
                                </div>
                                <ul class="list">
                                    <li><a href="#"><i class="fa fa-envelope"></i> Issue Name <span><?php echo  ucwords($issueName); ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark"></i> Volume <span><?php echo  $issueVol; ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-upload"></i> Published On <span><?php echo  date("F j, Y",strtotime($issueDate)); ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-newspaper"></i> Total Articles <span><?php echo  $articleCount; ?></span></a></li>
                                    <li><a href="#"><i class="fa fa-file-download"></i> Article Download Score <span><?php echo  $articleDownloadScore; ?></span></a></li>
                                </ul>
                            </aside>
                            <div>
                                <div class="main_title2">
                                    <h2>Links</h2>
                                </div>
                                <a href="archive.php" class="genric-btn info-border circle arrow" style="width: 100%;font-size: 15px;">All Issues<span class="fa fa-arrow-right"></span></a>
                                <a href="submission.php" class="genric-btn info-border circle arrow mt-2" style="width: 100%;font-size: 15px;">Submit Your Article<span class="fa fa-arrow-right"></span></a>
                                <a href="guidelines.php" class="genric-btn info-border circle arrow mt-2" style="width: 100%;font-size: 15px;">Author Guidelines<span class="fa fa-arrow-right"></span></a>
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
                        <li><a href="#"><i class="fab fa-twitter fleft padding-right"></i> </a><p>Twitter - &emsp;<a href="https://twitter.com/ijcpms" target="_blank">twitter.com/ijcpms</a></p></li>
                        <li><a href="#"><i class="fab fa-instagram fleft padding-right"></i> </a><p>Instagram - &emsp;<a href="https://www.instagram.com/ijcpms" target="_blank">instagram.com/ijcpms</a></p></li>
                        <li><a href="#"><i class="fab fa-linkedin fleft padding-right"></i> </a><p>LinkedIn - &emsp;<a href="https://www.linkedin.com/company/indian-journal-of-clinical-pharmacy-and-medical-sciences" target="_blank">linkedin.com/ijcpms</a></p></li>
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
            <ul class="social_footer_ul">
                <li><a href="https://www.facebook.com/mimohkulkarni17" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="https://www.linkedin.com/in/mimoh-kulkarni" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                <li><a href="https://www.instagram.com/mimoh_kulkarni" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
            <!--social_footer_ul ends here-->
        </div>
    </footer>
        <!--============= End footer Area  ==============-->

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="js/download.js"></script>
        <script src="js/disablecopy.js"></script>
    </body>
</html>