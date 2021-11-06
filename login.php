<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 09/10/2020
 * Time: 7:00 PM
*/
require_once("dbconn.php");
require_once("user_header.php");

$lblError = "";

if (isset($_POST["BTNlogin"])){
    $uname = preg_replace("/[^A-Za-z0-9@.\-\']/", '', $_POST["username"]);
    $pass = preg_replace("/[^A-Za-z0-9@.\-\']/", '', $_POST["pass"]);

    $uname = mysqli_real_escape_string($linkId,$uname);
    $pass = mysqli_real_escape_string($linkId,$pass);

    $sqlLogin = "SELECT `username` FROM `admin` WHERE  `username` = '".$uname."' AND `pass` = '".$pass."'";
    mysqli_query($linkId,$sqlLogin);
    //echo $sqlLogin;
    if (mysqli_affected_rows($linkId) == 1){

        session_start();
        $_SESSION['user'] = $uname;
        header("location:adminHome.php");

//        echo "<script>alert('Success')</script>";
    }
    else $lblError = "Invalid Username and Password Combination";
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
        <!-- main css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
    </head>
    <body>

    <!--============= Start Header Menu Area ==============-->
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
                            <img src="img/favicon.png" alt="logo">
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
                                <li class="nav-item active"><a href="login.php" class="login">Admin Login</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--============= End Header Menu Area ==============-->

    <!--============= Page Content ==============-->
    <form method="post" action="login.php">
        <div class="container login_box">
            <div class="row">
                <div class="col-lg-4"></div>
                <div class="col-lg-4">
                    <h2 class="title_color text-center">Admin Login</h2>
                    <div class="tablediv">
                        <table class="table mt-2 text-center">
                            <?php
                            if (!empty($lblError)) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="alert alert-danger mb-3">
                                            <strong><?php echo $lblError; ?></strong>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                                $lblError = "";
                            }
                            ?>
                            <tr>
                                <td>
                                    <input type="text" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'" required class="single-input">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="password" name="pass" placeholder="Password" onblur="this.placeholder = 'Password'" required class="single-input">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" name="BTNlogin" value="Login" class="genric-btn info circle mt-2" style="font-size: 15px"/>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4"></div>
            </div>
        </div>
    </form>
    <!--============= End Page Content ==============-->

    <!-- Optional JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>