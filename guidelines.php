<?php
/**
 * Created by PhpStorm.
 * User: mimoh
 * Date: 29/10/2020
 * Time: 5:13 PM
 */
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

        <!--============= Start Header Menu Area ==============-->
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
                            <!-- Nav links and  forms -->
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
                                            <a class="dropdown-item" href="page_404.php">Editorial Board</a>
                                        </div>
                                    </li>
                                    <li class="nav-item active"><a class="nav-link" href="guidelines.php">Guidelines</a></li>
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
        <!--============= End Header Menu Area ==============-->

        <!--============= Start Home Banner Area ==============-->
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="banner_content text-center">
                                    <div class="banner_content text-center">
                                        <h2>Home > Author Guidelines</h2>
                                    </div>
                                </div>
                            </div>>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--============= End Home Banner Area ==============-->

        <!--============= Page Content ==============-->
        <div class="container">
            <div class="section-top-border" style="padding-bottom: 5px">
                <h2 class="title_color">Manuscript preparation/Author guidelines</h2>
            </div>

            <section class="sample-text-area">
                <div class="container">
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Title:</b> Title should be brief, specific, attractive and informative, the scientific name(s) in italics/underlined.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Authors:</b> Names of authors to be typed, in capitals unaccompanied by their degrees, titles etc.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Address:</b> Address of the institution where the work was carried out be given below the name(s) of author(s). Present address of correspondence should be given as footnote indicating by asterisk the author to whom the correspondence is to be addressed.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Abstract:</b> Abstract need to be introduce in three parts (Background/Methods/Conclusion). The Abstract should be informative and completely self-explanatory, briefly present the topic, state the scope of the experiments, indicate significant data, and point out major findings and conclusions. The Abstract should be in about 150 to 200 words. Standard nomenclature should be used and abbreviations should be avoided. No literature should be cited.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Keywords:</b> Following the abstract, key words not more than 8 that will provide indexing references should be listed and in alphabetical order
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Introduction:</b> This should be brief and the review of the literature should be pertinent to the theme of the paper. Extensive review and unnecessary detail of earlier work should be avoided.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Materials and Methods:</b> It should inform the reader about appropriate methodology etc. but if known methods have been adopted, only references be cited. It should comprise the experimental design and techniques with experimental area and institutional with year of experiment. Authors need to indicate when (year/period) and where (university/institute) the present experiment was conducted.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Results and Discussion:</b> It should be combined to avoid repetition. The results should not be repeated in both tables and figures. The discussion should relate to the significance of the observations.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Conclusion and Acknowledgement:</b> Table numbers should be followed by the title of the table, Line drawings/photographs should contain figure number and description thereof. The corresponding number(s) of Tables, Figures etc should quoted in the text. Size of tables and figures should be below 1 MB.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">References:</b> The author should use the author-date format for citations and references (e.g., Hebbar et al. 2006; Subba Rao, 2001). A List of all the references quoted should be provided at the end of the paper. It should be prepared alphabetically with surname of all the authors followed by these initials and year of publication in brackets. The titles of the articles should be mentioned. Full journal name should be used and be typed in italics. Volume numbers need to be in bold type and pagination in normal type.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Page/Line Number:</b> Authors are requested to mention Page number and Line number to each line in the MS for easy and quick review. Text Alignment, line spacing, word count, figures, tables etc must be as per format. Kindly go through below sample paper for the reference.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Reporting Guidelines for Specific Study Designs:</b><br>
                        <table class="table table-bordered ml-3 mb-4 text-center">
                            <tr>
                                <th>Initiative</th>
                                <th>Type of Study</th>
                                <th>Source</th>
                            </tr>
                            <tr>
                                <td>CONSORT</td>
                                <td>Randomised trials</td>
                                <td>http://www.equator-network.org/reporting-guidelines/consort/</td>
                            </tr>
                            <tr>
                                <td>STROBE</td>
                                <td>Observational studies</td>
                                <td>http://www.equator-network.org/reporting-guidelines/strobe</td>
                            </tr>
                            <tr>
                                <td>PRISMA</td>
                                <td>Systematic reviews and meta-analyses</td>
                                <td>http://www.equator-network.org/reporting-guidelines/prisma/</td>
                            </tr>
                            <tr>
                                <td>CARE</td>
                                <td>Case reports</td>
                                <td>http://www.equator-network.org/reporting-guidelines/care/</td>
                            </tr>
                        </table>
                        <table class="table table-bordered ml-3 mb-4 text-center">
                            <tr>
                                <th>Type of Manuscript </th>
                                <th>Review article</th>
                                <th>Original article</th>
                                <th>Brief communication</th>
                                <th>Case report</th>
                                <th>Letter to the Editor ‡</th>
                            </tr>
                            <tr>
                                <td>Including …</td>
                                <td>-</td>
                                <td>Randomized controlled trials, intervention studies, pharmacy practice, outcome studies, case-control series, medication utilization studies, cost-effectiveness studies, and surveys with high response rate</td>
                                <td>Like as “Original articles</td>
                                <td>New, interesting and really rare cases with a clear rational of its report</td>
                                <td>These should be short and including decisive observations</td>
                            </tr>
                            <tr>
                                <td>Scope</td>
                                <td>-</td>
                                <td>All aspects of drug-related human (non-animal and non-laboratory work) studies</td>
                                <td>Like as “Original articles”</td>
                                <td>Drug-related human reports</td>
                                <td>Preferably be related to articles previously published in the Journal or views expressed in the journal</td>
                            </tr>
                            <tr>
                                <td>Word count limitation (including Abstract, and References)</td>
                                <td>5000</td>
                                <td>3000 - 3500</td>
                                <td>2000</td>
                                <td>1500</td>
                                <td>500</td>
                            </tr>
                            <tr>
                                <td>Headings</td>
                                <td>Abstract (un-structured), Keywords, Introduction, Methods, Results, Conclusion, References, Table and Figure <legends></legends></td>
                                <td>Abstract, Keywords, Introduction, Methods, Results, Discussion, References, Table and Figure legends (Do not divide the Introduction, Methods, Results and Discussion into various sub-headings)</td>
                                <td>Like as “Original articles”</td>
                                <td>Abstract (un-structured), Keywords, Introduction, Case report, Discussion, Reference, Tables and Legends</td>
                                <td>To the Editor</td>
                            </tr>
                            <tr>
                                <td>Abstract</td>
                                <td>Up to 250 words; un-structured</td>
                                <td>Up to 250 words; structured as: Objective, Methods, Findings, Conclusion</td>
                                <td>Up to 200 words; structured as: Objective, Methods, Findings, Conclusion</td>
                                <td>Up to 200 words; un-structured</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>References</td>
                                <td>Unlimited</td>
                                <td>Up to 30</td>
                                <td>Up to 12</td>
                                <td>Up to 10</td>
                                <td>Up to 5</td>
                            </tr>
                            <tr>
                                <td>Tables and Figures</td>
                                <td>Unlimited</td>
                                <td>Up to 4</td>
                                <td>Up to 2</td>
                                <td>Up to 3</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>Authors §</td>
                                <td>Up to 6</td>
                                <td>Up to 8</td>
                                <td>Up to 5</td>
                                <td>Up to 4</td>
                                <td>Up to 2</td>
                            </tr>
                            <tr>
                                <td colspan="6">
                                    * Editorial, Guest Editorial, and Commentary are solicited by the editorial board.<br>
                                    ‡ Letters must not duplicate other material published or submitted for publication. Letters considered for publication undergo external peer review.<br>
                                    § Other persons who have contributed to the study may be indicated in an “Acknowledgment”, with their permission, including their academic degrees, affiliation, contribution to the study, and an indication if compensation was received for their role.
                                </td>
                            </tr>
                        </table>
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Essential checks/checklist:</b><br>
                        <ul class="unordered-list ml-4 pt-2 mb-5">
                            <li>Make sure you submit the final version of your manuscript. Once your manuscript is accepted for publication and received at publication no further changes can be made.</li>
                            <li>Do not submit papers to journal if they have been published somewhere else, or are being considered for publication elsewhere.</li>
                            <li>If your paper uses figures, tables, or parts of text that have been published elsewhere, you need permission from the copyright holder. Please see Rights and Permissions for details.</li>
                            <li>Submit your paper as a Word or LaTeX file.</li>
                            <li>Remember to include a title, all author names and affiliations, and the corresponding author’s email address.</li>
                            <li>Check the journal website for any journal-specific or subject-specific style elements, such as keywords or JEL codes.</li>
                            <li>Provide an abstract that avoids abbreviations or reference citations.</li>
                            <li>Define all non-standard abbreviations when they first appear.</li>
                            <li>Number tables and figures, ensure they all have a legend. Define the meaning of any bold or italic formatting in your tables. Figures should be high-resolution and in a common image format (e.g. .eps or .tif).</li>
                            <li>All references should be readable and accurate. You do not need to format references to the journal’s style when you first submit your paper.</li>
                            <li>Include acknowledgements, conflict-of-interest declarations and details of funding sources and grant numbers at the end of your paper. Include the full funder name. Use author initials to indicate which authors received grants.</li>
                            <li>Check the journal’s Data Availability policy, and ensure your paper follows it.</li>
                            <li>Include all supplementary data files with your submission.</li>
                            <li>Use Word’s ‘Insert equation’ and ‘Insert symbol’ functions to insert symbols or special characters. Do not use images. Times New Roman and Arial Unicode MS typically provide the widest range of symbols and special characters.</li>
                            <li>After we have reviewed your manuscript, we may ask for editable files, higher resolution figures, or edited files to fit journal style.</li>
                        </ul>
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Selection of Reviewers:</b> Reviewers are selected on the basis of many factors, including expertise, prior publications in the same topic area, and prior performance as a reviewer (including quality and timeliness). Invitations to review may contain confidential information, which should be treated as such.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Timeliness:</b> Because we are committed to provide timely editorial decisions, potential reviewers are requested to respond promptly and those who accept invitations to review are requested to provide their comments within the agreed timeframe. If reviewers anticipate that they will not be able to meet the deadline, they are requested to inform the assigning editor so that alternative arrangements can be made.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Potential Conflicts of Interest:</b> If a reviewer perceives that there may be a significant conflict of interest (financial or otherwise) for a particular manuscript that they are invited to review, they should either seek clarification with the assigning editor or decline the invitation.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Editing Referees' Reports:</b> As a matter of policy, comments that were intended for the authors are transmitted; however, we reserve the right to edit a report in order to remove offensive language or to remove comments that reveal confidential information.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Requests to Re-review:</b> We may return to reviewers for further advice, particularly in cases where there is disagreement among reviewers or where authors believe that reviewers have misunderstood points of fact. However, editors will not send a resubmitted paper back to the reviewers if the quality of the revisions can be adequately evaluated by the assigned editor without additional input.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Confidentiality:</b> Manuscripts are reviewed with due respect for authors’ and reviewers' confidentiality. As a condition of agreeing to assess the manuscript, all reviewers undertake to keep submitted manuscripts and associated data confidential. If a reviewer seeks advice from colleagues while assessing a manuscript, he or she ensures that confidentiality is maintained and that the names of any such colleagues are provided to the journal with the final report.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Anonymity:</b> We do not release reviewers' identities to authors. We strongly discourage reviewers from revealing their identities as they may be asked to comment on the criticisms of other reviewers and on further revisions of the manuscript; identified reviewers may find it more difficult to be objective in such circumstances. We also strongly discourage authors from attempting to determine reviewer identities or to confront their reviewers directly. Our policy is to neither confirm nor deny speculation about reviewers' identities and we encourage reviewers to adopt a similar policy.
                    </p>
                    <p class="sample-text mb-3">
                        <b class="text-headingnew">Writing the review:</b><br>
                    <p class="sample-text mb-2">Reviewers are encouraged to provide the editors with the information on which a decision should be based, including specific comments that describe the arguments for and against publication. Although reviewers are welcome to recommend a particular course of action (accept, minor revisions, major revisions, reject) in their confidential comments to the editor, it is not recommended that such decisions be provided within the body of the review, as other reviewers may have opposing views.</p>
                    <p class="sample-text mb-2">The primary purpose of the review is to provide the editors with the information needed to reach a decision. The review should also instruct the authors on how they can strengthen their paper to the point where it may be acceptable. As far as possible, a negative review should explain to the authors the weaknesses of their manuscript, so that rejected authors can understand the basis for the decision and see in broad terms what needs to be done to improve the manuscript for publication elsewhere. This is secondary to the other functions, however, and reviewers are not obliged to provide detailed advice to authors of papers that they believe are not suitable for publication.</p>
                    <p class="sample-text mb-2">Confidential comments to the editor are welcome, but it is helpful if the main points are stated in the comments for transmission to the authors.</p>
                    <p class="sample-text mb-2">A more complete description of the review writing process is available in “Lovejoy, Revenson, and France (2011) Reviewing Manuscripts for Peer-Review Journals: A Primer for Novice and Seasoned Reviewers.</p>
                    <p class="sample-text mb-2">(source: <a href="https://www.springer.com/authors/manuscript+guidelines?SGWID=0-40162-6-849421-0" target="_blank">https://www.springer.com/authors/manuscript+guidelines?SGWID=0-40162-6-849421-0</a>)</p>
                    <p class="sample-text mb-5">Download Form to Transfer Copyright to IJCPMS - &emsp;<a style="cursor: pointer" class="text-info" id="download"><i class="fa fa-download" aria-hidden="true"></i> Download</a> </p>
                </div>
            </section>
        </div>
        <!--============= End Page  Content ==============-->

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

        <!-- JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function(){
                $('#download').click(function(){
                    var link = document.createElement('a');
                    link.href = "assets/files/Copyright Transfer form IJCPMS.docx";
                    link.download = "Copyright Transfer form IJCPMS.docx";
                    link.dispatchEvent(new MouseEvent('click'));
                    // alert("Thank you for downloading");
                });
            });
        </script>
    </body>
</html>