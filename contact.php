<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 17/10/2020
 * Time: 12:01 PM
 */
require_once("user_header.php");

$errorSub = "";
$errorName = "";
$errorEmail = "";
$errorMobile = "";
$errorMsg = "";
$lblSuccess = "";

$txtName = "";
$txtEmail = "";
$txtSub = "";
$txtMobile = "";
$txtMsg = "";

if (isset($_POST['submit'])){
    $txtName = $_POST['txtName'];
    $txtEmail = $_POST['txtEmail'];
    $txtSub = $_POST['txtSub'];
    $txtMobile = $_POST['txtMobile'];
    $txtMsg = $_POST['txtMsg'];

    if (empty($txtSub) || !preg_match("/^[a-zA-Z0-9 \/\*\-]*$/",$txtSub)) $errorSub = "Invalid Subject";
    if (empty($txtMsg)) $errorSub = "Invalid Message";
    if (empty($txtName) || !preg_match("/^[a-zA-Z \/\*\-]*$/",$txtName)) $errorName = "Invalid Name";
    if (empty($txtEmail) || !filter_var($txtEmail,FILTER_VALIDATE_EMAIL)) $errorEmail = "Invalid Email Address";
    if (empty($txtMobile) || !preg_match("/^[0-9]{10}+$/", $txtMobile)) $errorMobile = "Invalid Mobile";

    if (empty($errorTitle) && empty($errorName) && empty($errorMobile) && empty($errorEmail)) {

//        echo $txtSub."<br>";
//        echo $txtName."<br>";
//        echo $txtSub."<br>";

        require ("vendors/phpmailer/PHPMailerAutoload.php");
        require ("cred.php");

        $mail = new PHPMailer;

//                    $mail->SMTPDebug = 4;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'mail.ijcpms.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = EMAILs;                 // SMTP username
        $mail->Password = PASSs;                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom(EMAILs, EMAILs);
        $mail->addAddress(EMAILs, EMAILs);     // Add a recipient
//                    $mail->addAddress('ellen@example.com');               // Name is optional
        $mail->addReplyTo($txtEmail, $txtName);
//                    $mail->addCC('cc@example.com');
//                    $mail->addBCC('bcc@example.com');

//                    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//        $mail->addAttachment('submissions/'.$sha_filename.".".$ext, $txtTitle.".".$ext);    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'New Query Received';
        $message = "<div>
                                    <h2 style='margin-bottom: 20px;'>New Query Information</h2>
                                    <table style='align-items: center;border: 1px solid #000000;border-collapse: collapse'>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Name of Submitter</th>
                                            <td style='border: 1px solid #000000;'>".$txtName."</td>
                                        </tr>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Subject</th>
                                            <td style='border: 1px solid #000000;'>".$txtSub."</td>
                                        </tr>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Mobile Number</th>
                                            <td style='border: 1px solid #000000;'>".$txtMobile."</td>
                                        </tr>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Email Address</th>
                                            <td style='border: 1px solid #000000;'>".$txtEmail."</td>
                                        </tr>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Message</th>
                                            <td style='border: 1px solid #000000;'>".$txtMsg."</td>
                                        </tr>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Date & Time</th>
                                            <td style='border: 1px solid #000000;'>".date('Y/m/d H:i:s')."</td>
                                        </tr>
                                    </table>
                                    <h4 style='margin-top: 20px;'>You can reply to this email, but make sure email provided in information matches to reply email</h4>
                                    <h5 style='margin-top: 20px; color: red'>this email is auto generated by 'ijcpms.com'</h5>
                                    <h5 style='color: #721c24;'>Created by Mimoh Kulkarni</h5>
                                </div>";
        $mail->Body    = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
//            echo 'Message could not be sent.';
//            echo 'Mailer Error: ' . $mail->ErrorInfo;
            echo "<script>alert('".$mail->ErrorInfo."');</script>";
        }
        else{
            $txtName = "";
            $txtEmail = "";
            $txtSub = "";
            $txtMobile = "";
            $txtMsg = "";
            $lblSuccess = "Query Has been submitted successfully. We will reply  via email.";
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
                                    <li class="nav-item dropdown active">
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
                                    <li class="nav-item active"><a class="nav-link" href="contact.php">Contact Us</a></li>
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
                                    <h2>Home > Contact Us</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= End Home Banner Area ==============-->

        <!--============= Start Page Contents ==============-->
        <section class="contact_area p_60">
            <div class="container">
                <?php
                if (!empty($lblSuccess)) {
                    ?>
                    <div class="alert alert-success mb-4">
                        <strong><?php echo $lblSuccess; ?></strong>
                    </div>
                    <?php
                    $lblSuccess = "";
                }
                ?>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3772.9106057001363!2d75.7420143148997!3d18.97955498714338!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTjCsDU4JzQ2LjQiTiA3NcKwNDQnMzkuMSJF!5e0!3m2!1sen!2sin!4v1602917413440!5m2!1sen!2sin"
                        width="100%" height="450" frameborder="0" style="border:1px solid black;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                <div class="row mt-5">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="fas fa-home"></i>
                                <h6>IJCPMS OFFICE H.no 686712, Sant Namdev nagar east, Dhanora road</h6>
                                <p>Beed 431122, Maharastra, India</p>
                            </div>
                            <div class="info_item">
                                <i class="fas fa-phone"></i>
                                <h6>+91 72763 63685</h6>
                                <h6>+91 93705 60504</h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="fas fa-envelope"></i>
                                <h6>support@ijcpms.com</h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form class="row contact_form" action="contact.php" method="post" id="contactForm">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" name="txtName" placeholder="Enter Your Name" value="<?php echo $txtName; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Your Name'" required class="single-input">
                                    <label class="text-danger"><?php echo $errorName; ?></label>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="txtEmail" placeholder="Enter Email address" value="<?php echo $txtEmail; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email address'" required class="single-input">
                                    <label class="text-danger"><?php echo $errorEmail; ?></label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="txtSub" placeholder="Enter Subject" value="<?php echo $txtSub; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" required class="single-input">
                                    <label class="text-danger"><?php echo $errorSub; ?></label>
                                </div>
                                <div class="form-group">
                                    <input type="number" name="txtMobile" placeholder="Enter Mobile No" value="<?php echo $txtMobile; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Mobile No'" required class="single-input">
                                    <label class="text-danger"><?php echo $errorMobile; ?></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="single-textarea" name="txtMsg" placeholder="Enter Message" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" required><?php echo $txtMsg; ?></textarea>
                                    <label class="text-danger"><?php echo $errorMsg; ?></label>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" name="submit" class="btn submit_btn">Send Message <i class="fa fa-long-arrow-right"></i> </button>
                            </div>
                        </form>
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

        <!-- Optional JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>

