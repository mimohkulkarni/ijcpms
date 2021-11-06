<?php
  require_once("user_header.php");
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
		<div class="container">
			<div class="section-top-border" style="padding-bottom: 5px">
				<h2 class="title_color">About The Journal</h2>
				<div class="row">
					<div class="col-lg-12">
						<blockquote class="generic-blockquote">
							“The Indian Journal of Clinical Pharmacy and medical sciences (IJCPMS) offers a platform for articles on research in Clinical Pharmacy, Pharmaceutical Care, translational sciences, therapeutics, and diagnostics in different medical specialties.
                            The Journal considers for publication original research papers, systematic qualitative and quantitative reviews, rare case reports, research letters, news notes and invited editorials covering issues of modern clinical pharmacy research and practice ”
						</blockquote>
					</div>
				</div>
			</div>

			<section class="sample-text-area">
				<div class="container">
                    <h3 class="text-heading title_color"><b>Aims and Scope</b></h3>
                    <p class="sample-text">
                        Indian journal of clinical pharmacy and medical sciences designed to provide physicians, pharmacists, research scientists, regulatory scientists, drug developers and academic colleagues a forum to present research in all aspects of Healthcare sector.  The journal aims to publish original research, review articles and short communications about molecular and cellular processes in disease, in order to increase understanding of the fundamental principles and biological questions of medicine. Researchers in academic and clinical settings as well as health professionals are encouraged to publish their theoretical and experimental results in this journal, which aims to integrate expertise from the molecular and translational sciences, therapeutics, and diagnostics in different medical specialties.
                        <br>The editors therefore welcome contributions on the above-mentioned topics and especially on the following:
                    <ul class="unordered-list ml-4 pt-2 mb-5">
							<li>Pharmacotherapy and outcome research</li>
                            <li>Pathogenesis of disease</li>
                            <li>Translational research</li>
                            <li>Laboratory and animal investigation</li>
                            <li>Pharmacology</li>
                            <li>Clinical medicine</li>
                            <li>Epidemiologic studies</li>
                            <li>Health improvement strategies</li>
                            <li>Clinical pharmacy</li>
							<li>Pharmacoepidemiology</li>
							<li>Pharmacoeconomics</li>
							<li>Pharmaceutical care</li>
							<li>Medicines and medical devices utilization</li>
							<li>Medicines and medical devices information</li>
							<li>Pharmacy services research</li>
							<li>Medication management</li>
							<li>Other clinical aspects of pharmacy</li>
							<li>Pharmaceutical Technology, Pharmaceutics, Novel Drug Delivery, Biopharmaceutics, Pharmacokinetics</li>
							<li>Pharmacognosy and Natural Product Research</li>
							<li>Pharmaceutical/Medicinal Chemistry, Computational Chemistry and Molecular Drug Design, Pharmaceutical Analysis</li>
							<li>Cell Biology, Genomics and Proteomics, Pharmacogenomics, Bioinformatics, Pharmacoeconomics</li>
							<li>Research outcomes from medical sciences/case study and biotechnology of pharmaceutical interest are also considered.</li>
						</ul>
                    </p>
                    <p class="sample-text mt-2 mb-5">Download Copyright Notice of IJCPMS - &emsp;<a style="cursor: pointer" class="text-info" id="download"><i class="fa fa-download" aria-hidden="true"></i> Download</a> </p>
				</div>

			</section>
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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#download').click(function(){
                    var link = document.createElement('a');
                    link.href = "assets/files/Copyright Notice.docx";
                    link.download = "Copyright Notice.docx";
                    link.dispatchEvent(new MouseEvent('click'));
                    // alert("Thank you for downloading");
                });
            });
        </script>
    </body>
</html>