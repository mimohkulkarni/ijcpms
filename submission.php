<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 14/10/2020
 * Time: 2:09 PM
 */

require_once("user_header.php");
require_once("dbconn.php");

$errorTitle = "";
$errorName = "";
$errorEmail = "";
$errorMobile = "";
$errorFile = "";
$lblSuccess = "";

$txtTitle = "";
$txtName = "";
$txtMobile = "";
$txtEmail = "";



if (isset($_POST['submit'])){

    $txtTitle = $_POST['txtTitle'];
    $txtName = $_POST['txtName'];
    $txtMobile = $_POST['txtMobile'];
    $txtEmail = $_POST['txtEmail'];
    $file = $_FILES['articleFile'];

//    echo "<script>alert('".$txtEmail."');</script>";

    if (empty($txtTitle)) $errorTitle = "Invalid Title";
    if (empty($txtName) || !preg_match("/^[a-zA-Z \*\,\/]*$/",$txtName)) $errorName = "Invalid Name";
    if (empty($txtEmail) || !filter_var($txtEmail,FILTER_VALIDATE_EMAIL)) $errorEmail = "Invalid Email Address";
    if (empty($txtMobile) || !preg_match("/^[0-9]{10}+$/", $txtMobile)) $errorMobile = "Invalid Mobile";

    if (empty($errorTitle) && empty($errorName) && empty($errorMobile) && empty($errorEmail)) {

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
                        'doc' => 'application/msword',
                        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                    ),
                    true
                )) {
                throw new RuntimeException('Invalid file format.');
            }

            // You should name it uniquely.
            // DO NOT USE $_FILES['articleFile']['name'] WITHOUT ANY VALIDATION !!
            // On this example, obtain safe unique name from its binary data.
            $sha_filename = sha1_file($_FILES['articleFile']['tmp_name']);
            if (move_uploaded_file( $_FILES['articleFile']['tmp_name'],
                                        sprintf('./assets/submissions/%s.%s',
                                            $sha_filename,
                                            $ext
                                        )
                )
            )
            {
                $sqlSubmission = "INSERT INTO `submissions`(`name`, `email`, `title`, `mobile`, `subdate`, `file`) VALUES 
                  ('".$txtName."','".$txtEmail."','".$txtTitle."','".$txtMobile."','".date('Y-m-d')."','".$sha_filename.".".$ext."')";

//                $abc = 'submissions/'.$sha_filename.".".$ext;
//                echo "<script>alert($abc);</script>";
            //    echo $sqlSubmission;

                mysqli_query($linkId,$sqlSubmission);
                if (mysqli_affected_rows($linkId) == 1){
                    $lblSuccess = "Manuscript Accepted Successfully";

                    //mail function start

                    require ("vendors/phpmailer/PHPMailerAutoload.php");
                    require ("cred.php");

                    $mail = new PHPMailer;

//                    $mail->SMTPDebug = 4;                               // Enable verbose debug output

                    $mail->isSMTP();                                      // Set mailer to use SMTP
                    $mail->Host = 'mail.ijcpms.com';  // Specify main and backup SMTP servers
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = EMAIL;                 // SMTP username
                    $mail->Password = PASS;                           // SMTP password
                    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                    $mail->Port = 587;                                    // TCP port to connect to

                    $mail->setFrom(EMAIL, EMAIL);
                    $mail->addAddress(EMAIL, EMAIL);     // Add a recipient
//                    $mail->addAddress('ellen@example.com');               // Name is optional
//                    $mail->addReplyTo(EMAIL, EMAIL);
//                    $mail->addCC('cc@example.com');
//                    $mail->addBCC('bcc@example.com');

//                    $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                    $mail->addAttachment('assets/submissions/'.$sha_filename.".".$ext, $txtTitle.".".$ext);    // Optional name
                    $mail->isHTML(true);                                  // Set email format to HTML

                    $mail->Subject = 'Article/Manuscript Submission';
                    $message = "<div>
                                    <h2 style='margin-bottom: 20px;'>Information about new submission</h2>
                                    <table style='align-items: center;border: 1px solid #000000;border-collapse: collapse'>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Title of Article</th>
                                            <td style='border: 1px solid #000000;'>".$txtTitle."</td>
                                        </tr>
                                        <tr>
                                            <th style='border: 1px solid #000000;'>Name of Submitter</th>
                                            <td style='border: 1px solid #000000;'>".$txtName."</td>
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
                                            <th style='border: 1px solid #000000;'>Date & Time</th>
                                            <td style='border: 1px solid #000000;'>".date('Y/m/d H:i:s')."</td>
                                        </tr>
                                    </table>
                                    <p style='margin-top: 20px;'>You can also find this submission in admin panel of '<a href='ijcpms.com' target='_blank'>ijcpms.com</a>'</p>
                                    <p><a href='ijcpms.com/login.php' target='_blank'>Go to Admin Panel</a> </p>
                                    <h4 style='margin-top: 20px;'>Article/Manuscript file is attached to this email.</h4>
                                    <h5 style='margin-top: 20px; color: red'>this email is auto generated by 'ijcpms.com'. Do not reply to this email</h5>
                                    <h5 style='color: #721c24;'>Created by Mimoh Kulkarni</h5>
                                </div>";
                    $mail->Body    = $message;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if(!$mail->send()) {
//                        echo 'Message could not be sent.';
//                        echo 'Mailer Error: ' . $mail->ErrorInfo;
                        echo "<script>alert('".$mail->ErrorInfo."');</script>";
                    }

                    //mail function end

                    $file = "";
                }
                else{
                    if(file_exists("/assets/submissions/".$sha_filename.".".$ext))
                        unlink('/assets/submissions/'.$sha_filename.".".$ext);
                    $file = "";
                    throw new RuntimeException('Unknown error.');
                }

            }
            else{
                throw new RuntimeException('Failed to move uploaded file.');
            }

            $txtTitle = "";
            $txtName = "";
            $txtMobile = "";
            $txtEmail = "";

//            echo 'File is uploaded successfully.';

        } catch (RuntimeException $e) {

            $errorFile = ucwords($e->getMessage());

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
        <title>IJCPMS - Submissions</title>
        <!-- Bootstrap CSS -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
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
                                    <li class="nav-item active"><a class="nav-link" href="submission.php">Submissions <span class="blinking align-middle">NEW</span></a></li>
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
                                    <h2>Home > Submission</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= End Home Banner Area ==============-->

        <!--============= Start Page Contents ==============-->
        <div class="container mb-60">
            <form action="submission.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-10">
                        <h2 class="title_color text-center admin">Article/Manuscript Submission</h2>
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white"><i class="fa fa-envelope"></i> Article Submission
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
                                            ?>
                                            <div class="form-group">
                                                <label for="txtTitle">Enter Article Title</label>
                                                <input type="text" name="txtTitle" placeholder="Article Title" value="<?php echo $txtTitle; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Article Title'" class="single-input">
                                                <label class="text-danger"><?php echo $errorTitle; ?></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtName">Enter Your Name</label>
                                                <input type="text" name="txtName" placeholder="Full Name" value="<?php echo $txtName; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'"  class="single-input">
                                                <label class="text-danger"><?php echo $errorName; ?></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtMobile">Enter Mobile Number</label>
                                                <input type="number" name="txtMobile" placeholder="Mobile No" value="<?php echo $txtMobile; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Mobile No'" class="single-input">
                                                <label class="text-danger"><?php echo $errorMobile; ?></label>
                                                <small class="form-text text-muted">Your mobile no. is protected as per our privacy policy.</small>
                                            </div>
                                            <div class="form-group">
                                                <label for="txtName">Enter Your Email Address</label>
                                                <input type="email" name="txtEmail" placeholder="Email" value="<?php echo $txtEmail; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" class="single-input">
                                                <label class="text-danger"><?php echo $errorEmail; ?></label>
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Article File</label>
                                                <div class="custom-file">
                                                    <input type="file" name="articleFile" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                                <label class="text-danger"><?php echo $errorFile; ?></label>
                                                <small class="form-text text-muted">Only .docx & .doc files allowed.<br>Max size is 5 MB.</small>
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
                                            <div class="mx-auto">
                                                <button type="submit" name="submit" class="btn btn-primary text-center" onclick="showProgress()">Submit</button>
                                                <button type="button" class="btn btn-danger text-center ml-2" onclick="resetAll()">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-4">
                                    <div class="card bg-light mb-3">
                                        <div class="card-header bg-success text-white text-uppercase"><i class="fa fa-home"></i> Instructions</div>
                                        <div class="card-body">
                                            <p>You need to submit your manuscript on website only. No need to send on mail.</p>
                                            <p>Please read <u><a class="text-danger" href="guidelines.php">Author Guidelies</a></u> first before submission.</p>
                                            <p>You have to upload your manuscript as one file. The documents should be in word format (.doc) during submission.</p>
                                            <p>Only word('.docx' & '.doc') files are allowed.</p>
                                            <p>The title page should include
                                                <ul>
                                                    <li>The title</li>
                                                    <li>The author's names, degrees, affiliations, and contact information (names, addresses, e-mail addresses, and phone numbers)</li>
                                                    <li>The author's disclosure or conflict of interest information</li>
                                                    <li>Grants and other acknowledgments. You need to send other supporting files as per editor’s instructions through email.</li>
                                                </ul>
                                            </p>
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

        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="js/upload.js"></script>

    </body>
</html>


