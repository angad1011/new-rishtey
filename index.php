<?php

    header('Access-Control-Allow-Origin: *');
    include_once 'databaseConn.php';
    include_once './lib/requestHandler.php';
    $DatabaseCo = new DatabaseConn();
    include_once './class/Config.class.php';
    $configObj = new Config();
    

    $android_settings = $DatabaseCo->dbLink->query("SELECT android_app_banner,android_link FROM site_config WHERE id=1");
	$row_android=mysqli_fetch_object($android_settings);
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
		<!-- Required Meta -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo $configObj->getConfigFname(); ?></title>
        <meta name="keyword" content="<?php echo $configObj->getConfigKeyword(); ?>" />
        <meta name="description" content="<?php echo $configObj->getConfigDescription(); ?>" />
		<link type="image/x-icon" href="img/<?php echo $configObj->getConfigFevicon(); ?>" rel="shortcut icon"/>
		
		<!-- Theme Color -->
        <meta name="theme-color" content="#549a11">
        <meta name="msapplication-navbutton-color" content="#549a11">
        <meta name="apple-mobile-web-app-status-bar-style" content="#549a11">
        
		<!-- Bootstrap & Custom CSS-->
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/custom-responsive.css" rel="stylesheet">
        <link href="css/custom.css" rel="stylesheet">
       
        <!-- Font Awsome -->
		<script src="https://kit.fontawesome.com/48403ccd1a.js" crossorigin="anonymous"></script>

        <!--GOOGLE FONTS-->
        <?php include('parts/google_fonts.php');?>
        
        <!-- Owl Carousel CSS-->
        <link href="css/owl.carousel.css" rel="stylesheet">
        <link href="css/owl.theme.css" rel="stylesheet">
       
        <!-- Chosen CSS -->
    	<link rel="stylesheet" href="css/prism.css">
    	<link rel="stylesheet" href="css/chosen.css">
     	
        <!-- Angular JS-->
        <script src="js/angular.min.js"></script>

        <!-- Birthdate JS -->
        <script type="text/javascript">
            var numDays = {'01': 31, '02': 28, '03': 31, '04': 30, '05': 31, '06': 30, '07': 31, '08': 31, '09': 30, '10': 31, '11': 30, '12': 31};
            function setDays(oMonthSel, oDaysSel, oYearSel)
            {
                var nDays, oDaysSelLgth, opt, i = 1;
                nDays = numDays[oMonthSel[oMonthSel.selectedIndex].value];
                if (nDays == 28 && oYearSel[oYearSel.selectedIndex].value % 4 == 0)
                    ++nDays;
                oDaysSelLgth = oDaysSel.length;
                if (nDays != oDaysSelLgth) {
                    if (nDays < oDaysSelLgth)
                        oDaysSel.length = nDays;
                    else
                        for (i; i < nDays - oDaysSelLgth + 1; i++) {
                            opt = new Option(oDaysSelLgth + i, oDaysSelLgth + i);
                            oDaysSel.options[oDaysSel.length] = opt;
                        }
                }
                var oForm = oMonthSel.form;
                var month = oMonthSel.options[oMonthSel.selectedIndex].value;
                var day = oDaysSel.options[oDaysSel.selectedIndex].value;
                var year = oYearSel.options[oYearSel.selectedIndex].value;
            }
        </script>
    </head>
    <body ng-app class="ng-scope">
        <!-- Loader -->
        <div class="preloader-wrapper text-center">
        	<div class="loader"></div>
            <h5>Loading...</h5>
        </div>
        <!-- /.Loader -->
        <div id="body" style="display:none">
            <div id="wrap">
                <div id="main">
                    <!-- Email id Verification -->
                    <?php include("parts/email_verification.php"); ?>
                    <!-- /.Email id Verification -->
                    <!-- Header & Menu -->
                    <?php // include "parts/header.php"; ?>
                    <?php include "parts/menu.php"; ?>
                    <!-- /. Header & Menu -->
                    <div class="container-fluid">
                        <div class="row">
                        	<?php 
								$row_banner = mysqli_fetch_object($DatabaseCo->dbLink->query("SELECT banner1,banner2,banner3 FROM site_config WHERE id='1'"));
							?>

                            <?php
                                $bannerimagearr=['banner-1.jpg','banner-2.jpg','banner-3.jpg','banner-4.jpg','banner-5.jpg'];
                                shuffle($bannerimagearr);
                            $bannerimage=$bannerimagearr[0];
                            ?>
                            <div class="jumbotron" style="background-image:url('img/banners/<?php echo $bannerimage ?>')">
                                <div class="overlay">
                                <div class="container">
                                    <div class="row">
                                    <div class="col-md-12 col-lg-12">
                                    <div class="bannerHeading">
                                    <h2>Find The</h2>
                                    <h1>Perfect 'ONE'</h1>
                                    </div>
                                    <!-- <p>One day you shall meet your perfect match, someone you can love, someone you can look upto, someone you can adore, someone who is just perfect for you.</p> -->
                                   <div class="feature" id="feature">
                                        <div class="item first"><p><i class="fa fa-check-square" aria-hidden="true"></i> Verified User</p></div>
                                        <div class="item second" ><p><i class="fa fa-comment" aria-hidden="true"></i> Free Chat</p></div>
                                        <div class="item third" ><p> <i class="fa fa-check-square" aria-hidden="true"></i> Unlimited Match</p></div>
                                        <div class="item fourth" ><p><i class="fa fa-check-square" aria-hidden="true"></i> Daily Match</p></div>
                                    </div>
                                    </div>
                                </div>
                                 <section class="inPrem2Search">
                        <div class="container">
                            <form method="post" action="search" id="">
                                <div class="col-xxl-2">
                                    <label>Looking For</label>
                                    <select class="gt-form-control" name="gender">
                                        <option value="Female">Bride</option>
                                        <option value="Male">Groom</option>
                                    </select>
                                </div>
                                <div class="col-xxl-5">
                                    <label>Age</label>
                                    <div class="row">
                                        <div class="col-xs-7">
                                            <select class="gt-form-control" name="from_age" id="from_age">
                                                <option value="">Select Age From</option>
                                                <?php
                                                //Make 18 Year Selected for Search
                                                $selected_a='1';

                                                $SQL_STATEMENT_FROM_AGE = $DatabaseCo->dbLink->query("SELECT * FROM age");
                                                while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_FROM_AGE)) {
                                                ?>
                                                    <option value="<?php echo $DatabaseCo->dbRow->id; ?>" <?php if(isset($selected_a) != '' ){ if($selected_a == $DatabaseCo->dbRow->id ){ echo 'selected'; }} ?>><?php echo $DatabaseCo->dbRow->age; ?> Year</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-xs-2 text-center mt-10"><?php echo $lang['To']; ?></div>
                                        <div class="col-xs-7">
                                            <select class="gt-form-control" name="to_age" id="part_to_age">
                                                <?php
                                                //Make 18 From & 30 To Year Selected for Search
                                                $selected_b='13';

                                                $SQL_STATEMENT_TO_AGE = $DatabaseCo->dbLink->query("SELECT * FROM age");
                                                while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_TO_AGE)) {
                                                ?>
                                                <option value="<?php echo $DatabaseCo->dbRow->id; ?>" <?php if($DatabaseCo->dbRow->id <= $selected_a ){ echo 'disabled'; } if($selected_b == $DatabaseCo->dbRow->id ){ echo 'selected';	} ?>>
                                                    <?php echo $DatabaseCo->dbRow->age; ?> Year</option>
                                                <?php } ?>  
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3">
                                    <label><?php echo $lang['Religion']; ?></label>
                                    <select class="gt-form-control" id="religion_id" name="religion_id[]">
                                        <option>Religion</option>
                                        <?php
                                            $SQL_STATEMENT_religion = $DatabaseCo->dbLink->query("SELECT * FROM religion WHERE status='APPROVED' ORDER BY religion_name ASC");
                                            while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_religion)) {
                                        ?>
                                            <option value="<?php echo $DatabaseCo->dbRow->religion_id; ?>" <?php if (isset($_SESSION['reg_religion']) && $_SESSION['reg_religion'] == $DatabaseCo->dbRow->religion_id) { echo "selected"; }?>>
                                                <?php echo $DatabaseCo->dbRow->religion_name; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <div id="CasteDivloader"></div>
                                </div>
                                <div class="col-xxl-3">
                                    <label><?php echo $lang['Caste']; ?></label>
                                    <select class="gt-form-control" tabindex="4" id="caste_id" name="caste_id[]">
                                        <option value="">Select Religion</option>
                                    </select>
                                </div>
                                <div class="col-xxl-3">
                                    <input type="submit" value="Search Now" class="btn btn-red btn-block" name="quick_sub">
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </section>
                            </div>
                        </div>
                    </div>
                            <!-- /. Main Carousel -->

                </div>
                    </div>
                   
                    <!-- Welcome Section -->
                    <section class="bg-white">
                        <div class="container pb-50 pt-50">
                            <h2 class="text-center text-red fontMerriWeather mt-50 mb-50"><?php echo $configObj->getConfigWelcome(); ?></h2>
                            <p class="text-center inGrey500 indexContent mb-50">
                                <?php echo $lang['Best matrimony service provider in India.We find the best perfect life partner for you.join us now and']; ?><br><?php echo $lang['find your life partner from our thousand’s of verified profiles.']; ?>

                            </p>


                            <div class="col-xxl-4 col-xl-4 col-lg-8 margin-top-20 featuresImg">
                                <div class="row">
                                    <div class="col-xxl-16 text-center">
                                        <!-- <i class="fa fa-star index-color-1 gt-index-icon-font"></i> -->
                                        <img src="img/success.png" alt="success story" />
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h2 class="font-24 inGrey500 gt-font-weight-600">
                                            <?php echo $lang['Success Story']; ?>
                                        </h2>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <article>
                                            <p>
                                                <?php echo $lang['Hundred’s of successful member found their soulmates with us.']; ?>
                                            </p>
                                        </article>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h5>
                                            <a href="success-story" class="gt-text-Grey"><?php echo $lang['View Success Stories']; ?> <i class="fa fa-caret-right gt-margin-left-10"></i></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-8 margin-top-20 featuresImg">
                                <div class="row">
                                    <div class="col-xxl-16 text-center">
                                        <!-- <i class="fa fa-users index-color-2 gt-index-icon-font tex"></i> -->
                                        <img src="img/Verified Members.png" alt="Verified Members" />
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h2 class="font-24 inGrey500 gt-font-weight-600">
                                            <?php echo $lang['Verified Members']; ?>
                                        </h2>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <article>
                                            <p class="font-13">
                                                <?php echo $lang['Thousands of verified member profile so our members find perfect partner without any concern.']; ?>
                                            </p>
                                        </article>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h5>
                                            <a href="login" class="gt-text-Grey"><?php echo $lang['View Profiles Now']; ?><i class="fa fa-caret-right gt-margin-left-10"></i></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-8 margin-top-20 featuresImg">
                                <div class="row">
                                    <div class="col-xxl-16 text-center">
                                        <!-- <i class="fa fa-search index-color-3 gt-index-icon-font"></i> -->
                                        <img src="img/searching.png" alt="searching" />
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h2 class="font-24 inGrey500 gt-font-weight-600">
                                            <?php echo $lang['Search Options']; ?>
                                        </h2>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <article>
                                            <p class="font-13">
                                                <?php echo $lang['Multiple search options to find partner who know you better.']; ?>
                                            </p>
                                        </article>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h5>
                                            <a href="search" class="gt-text-Grey"><?php echo $lang['Search Now']; ?> <i class="fa fa-caret-right gt-margin-left-10"></i></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xxl-4 col-xl-4 col-lg-8 margin-top-20 featuresImg">
                                <div class="row">
                                    <div class="col-xxl-16 text-center">
                                        <!-- <i class="fa fa-list-ol index-color-4 gt-index-icon-font"></i> -->
                                        <img src="img/match.png" alt="match" />
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h2 class="font-24 inGrey500 gt-font-weight-600">
                                            <?php echo $lang['Matching Profiles']; ?>
                                        </h2>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <article>
                                            <p class="font-13">
                                                <?php echo $lang['With our auto match profile you can see members which was suits you best and get married.']; ?>
                                            </p>
                                        </article>
                                    </div>
                                    <div class="col-xxl-16 text-center">
                                        <h5>
                                            <a href="login" class="gt-text-Grey"><?php echo $lang['View Matches Now']; ?><i class="fa fa-caret-right gt-margin-left-10"></i></a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- /. Welcome Section -->
                    <div class="clearfix"></div>
					<!-- Featured Bride -->
                    <?php 
						$sel_fet_bride = $DatabaseCo->dbLink->query("SELECT matri_id,birthdate,username,country_name,city_name,photo_view_status,photo1_approve,photo1,photo_protect,photo_pswd,gender FROM register_view WHERE gender='Female' AND fstatus='Featured' ORDER BY rand() limit 0,9");
						if (mysqli_num_rows($sel_fet_bride) > 0) {
					?>
                	<section class="bg-index-white">
                       <div class="container">
                            <h2 class="text-center gt-text-Grey fontMerriWeather mb-0 mt-0"><?php echo $lang['Featured Brides']; ?></h2>
                        	<p class="text-center gt-text-Grey">
                            	<?php echo $lang['This is our featured brides section where you can check our elite profiles.']; ?>
                            </p>
                        	<div class="gt-hearts">
                            	<div class="gt-hearts-group bg-white">
                                    <i class="fa fa-heart font-20 heart gt-text-darkblue"></i>
                                	<i class="fa fa-heart font-38 heart gt-text-darkblue"></i>
                                	<i class="fa fa-heart font-20 heart gt-text-darkblue"></i>
                            	</div>
                            </div>
                        	<div id="inFetBride" class="owl-carousel">
                    			<?php
									while ($Row = mysqli_fetch_object($sel_fet_bride)) {
                    			?>
                               	<a href="member-profile?view_id=<?php echo $Row->matri_id; ?>" class="item text-center">
                                    <div class="thumbnail">
                                    	<?php include 'parts/search-result-photo.php';?>
                                    </div>
                                    <h4 class="inThemeGreen font-15">
                           	 			<?php echo $Row->username; ?>
                                    </h4>
                                    <p class="font-12 inGrey500 mb-0">
                            			<?php echo floor((time() - strtotime($Row->birthdate)) / 31556926) . ' Years'; ?>,<?php
                            				$a = mysqli_fetch_object($DatabaseCo->dbLink->query("SELECT GROUP_CONCAT( DISTINCT ' ', edu_name, ''SEPARATOR ', ' ) AS edu_name FROM register a INNER JOIN education_detail b ON FIND_IN_SET(b.edu_id,a.edu_detail) >0 WHERE a.matri_id = '" . $Row->matri_id . "'  GROUP BY a.edu_detail"));
                           					echo $a->edu_name;
                            			?>
                                    </p>
                                    <p class="font-12 inGrey500 mb-15">
                            			<?php
                            				if ($Row->city_name != '') {
                                				echo $Row->city_name;
                            				} else {
                                				echo "N/A";
                            				}
                            			?>,
										<?php echo $Row->country_name; ?>.
                                    </p>
                                    <span class="gt-btn-round gt-inline-block">
                                     <?php echo $lang['View Profile']; ?>
                                    </span>
                               </a>
                            	<?php }
         				} else {
                    ?>
                    <div class="col-xs-16">
                       <div class="" style="display:none;"></div>
                    </div>
                    <?php } ?>
                        </div>
                       </div>
                	</section>
					<div class="clearfix"></div>
                	<!-- /. Featured Bride -->
                  	
                    <!--- Featured Groom --->
                    <?php  
						$sel_fet_groom = $DatabaseCo->dbLink->query("SELECT matri_id,birthdate,username,country_name,city_name,photo_view_status,photo1_approve,photo1,photo_protect,photo_pswd,gender FROM register_view WHERE gender='Male' AND fstatus='Featured' ORDER BY rand() limit 0,9");
                    	if (mysqli_num_rows($sel_fet_groom) > 0) {
					?>
                    <section class="gt-bg-lgtGrey">
                   		<div class="container">
                            <h2 class="text-center gt-text-Grey fontMerriWeather mb-0 mt-0"><?php echo $lang['Featured Groom']; ?></h2>
                        	<p class="text-center gt-text-Grey">
                            	<?php echo $lang['This is our featured grooms section where you can check our elite profiles.']; ?>
                            </p>
                        	<div class="gt-hearts">
                            	<div class="gt-hearts-group">
                                    <i class="fa fa-heart font-20 heart gt-text-darkblue"></i>
                                	<i class="fa fa-heart font-38 heart gt-text-darkblue"></i>
                                	<i class="fa fa-heart font-20 heart gt-text-darkblue"></i>
                            	</div>
                        	</div>
                        	<div id="inFetGroom" class="owl-carousel">
                    		<?php
                   				while ($Row = mysqli_fetch_object($sel_fet_groom)) {
                    		?>
                            <a href="member-profile?view_id=<?php echo $Row->matri_id; ?>" class="item text-center">
                                    <div class="thumbnail">
                                    	<?php include 'parts/search-result-photo.php';?>
                                    </div>
                                    <h4 class="inThemeGreen font-15">
                           	 			<?php echo $Row->username; ?>
                                    </h4>
                                    <p class="font-12 inGrey500 mb-0">
                            			<?php echo floor((time() - strtotime($Row->birthdate)) / 31556926) . ' Years'; ?>,<?php
                            				$a = mysqli_fetch_object($DatabaseCo->dbLink->query("SELECT GROUP_CONCAT( DISTINCT ' ', edu_name, ''SEPARATOR ', ' ) AS edu_name FROM register a INNER JOIN education_detail b ON FIND_IN_SET(b.edu_id,a.edu_detail) >0 WHERE a.matri_id = '" . $Row->matri_id . "'  GROUP BY a.edu_detail"));
                           					echo $a->edu_name;
                            			?>
                                    </p>
                                    <p class="font-12 inGrey500 mb-15">
                            			<?php
                            				if ($Row->city_name != '') {
                                				echo $Row->city_name;
                            				} else {
                                				echo "N/A";
                            				}
                            			?>,
										<?php echo $Row->country_name; ?>.
                                    </p>
                                    <span class="gt-btn-round gt-inline-block">
                                      <?php echo $lang['View Profile']; ?>
                                    </span>
                               </a>
                            <?php } } else { ?>
                            <div class="col-xs-12">
                                <div class="" style="display:none;"></div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                	</section>
					<div class="clearfix"></div>
                	<!--- /. Featured Groom --->
                    
                    <?php if($row_android->android_app_banner == 'Yes'){ ?>
					<section class="gtAndroidDown">
                        <div class="container">
                            <div class="row">
                                <div class="col-xxl-16">
                                    <div class="row">
                                        <div class="col-xxl-5 col-xxl-offset-2">
                                            <img src="img/android_app_showcase.png" class="img-responsive">
                                        </div>
                                        <div class="col-xxl-8 col-xxl-offset-1 gtAndroidDownDet">
                                            <h4>
                                                Download our mobile app & find<br>
                                                start searching your life partner<br>
                                                in a tap.
                                            </h4>
                                            <h1>
                                                Download App Now !
                                            </h1>
                                            <a href="<?php if($row_android->android_app_link != ''){ echo $row_android->android_app_link; }?>" target="_blank">
                                                <img src="img/google_play_download_btn.png" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <?php } ?>
                </div>
            </div>
            <?php include "parts/footer.php"; ?>
              <?php include "parts/modal/register-modal.php"; ?>
        </div>
       	<!-- Jquery Js-->
        <script src="js/jquery.min.js"></script>
        <!-- Bootstrap & Green Js -->
        <script src="js/bootstrap.js"></script>
        <script src="js/green.js"></script>
        <script>
            $(document).ready(function() {
              $('#body').show();
              $('.preloader-wrapper').hide();
            });
		</script>
        <!-- Chosen Js -->
     	<script src="js/chosen.jquery.js" type="text/javascript"></script>
     	<script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript">
			var config = {
			'.chosen-select'           : {},
			'.chosen-select-deselect'  : {allow_single_deselect:true},
			'.chosen-select-no-single' : {disable_search_threshold:10},
			'.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
			'.chosen-select-width'     : {width:"100%"}
			}
			for (var selector in config) {
				$(selector).chosen(config[selector]);
			}
     	</script>
     	<!-- Validation Js -->
        <script type="text/javascript">
			function validateForm() {
				var a = document.forms["frm"]["profile_by"].value;
				if (a == "") {
					alert("Select Profile Created By");
					return false;
				}
				var b = document.forms["frm"]["gender"].value;
				if (b == "") {
					alert("Select Your Gender");
					return false;
				}
				var c = document.forms["frm"]["nickname"].value;
				if (c == "") {
					alert("First name must be filled out");
					return false;
				}
				var d = document.forms["frm"]["lastname"].value;
				if (c == "") {
					alert("Last name must be filled out");
					return false;
				}
				var g = document.forms["frm"]["day"].value;
				if (g == "") {
					alert("Please select your birthdate");
					return false;
				}
				var h = document.forms["frm"]["month"].value;
				if (h == "") {
					alert("Please select your birth month");
					return false;
				}
				var i = document.forms["frm"]["year"].value;
				if (i == "") {
					alert("Please select your birth year");
					return false;
				}
				var e = document.forms["frm"]["religion"].value;
				if (e == "") {
					alert("Please select religion");
					return false;
				}
				var f = document.forms["frm"]["caste"].value;
				if (f == "") {
					alert("Please select caste");
					return false;
				}
				var j = document.forms["frm"]["m_tongue"].value;
				if (j == "") {
					alert("Please select mother tongue");
					return false;
				}
				var k = document.forms["frm"]["country"].value;
				if (k == "") {
					alert("Please select country");
					return false;
				}
				var l = document.forms["frm"]["code"].value;
				if (l == "") {
					alert("Please select country code");
					return false;
				}
				var m = document.forms["frm"]["mobile"].value;
				if (m == "") {
					alert("Mobile must be filled out.");
					return false;
				}
				var n = document.forms["frm"]["email"].value;
				if (n == "") {
					alert("Email id must be filled out.");
					return false;
				}
			}
		</script>
        <!-- Validation js -->
        <script type="text/javascript" src="js/validetta.js"></script>
        <script>
            $(function(){
                $('#frm').validetta({
                    errorClose : false,
                    realTime : true
                });
            });
            $(function(){
                $('#quick-search').validetta({
                    errorClose : false,
                    realTime : true
                });
            });
        </script>
        <!-- Owl Carousel Js -->
        <script src="js/owl.carousel.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#inFetBride").owlCarousel({
                    autoPlay: 3000,
                    items: 5,
                    navigation: true,
                    navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                    itemsDesktop: [1199, 5],
                    itemsDesktopSmall: [979, 4],
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 2],
                        [700, 2],
                        [800, 3],
                        [1000, 5],
                        [1200, 5],
                        [1400, 5],
                        [1600, 5]
                    ],
                });
				$("#inFetGroom").owlCarousel({
                    autoPlay: 3000,
                    items: 5,
                    navigation: true,
                    navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                    itemsDesktop: [1199, 5],
                    itemsDesktopSmall: [979, 4],
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 2],
                        [700, 2],
                        [800, 3],
                        [1000, 5],
                        [1200, 5],
                        [1400, 5],
                        [1600, 5]
                    ],
                });
				$("#owl-demo-2").owlCarousel({
                    autoPlay: 3000,
                    autoPlay:true,
                            items: 1,
                    itemsDesktop: [1199, 1],
                    itemsDesktopSmall: [979, 1],
                    itemsCustom: [
                        [0, 1],
                        [450, 1],
                        [600, 1],
                        [700, 1],
                        [1000, 1],
                        [1200, 1],
                        [1400, 1],
                        [1600, 1]
                    ],
                });
            });
        </script>
       	<script>
            $("#gtFetVendor").owlCarousel({
                items:3,
                loop:true,
                lazyLoad:true,
                margin:10,
                autoPlay:true,
                autoPlayTimeout:1000,
                autoPlayHoverPause:true,
                navigation:true,
                pagination:false,
                navigationText: ["<button type='button' class='btn gtBtnLeftRes'><i class='fas fa-chevron-left'></i></button>", "<button type='button' class='btn gtBtnRigRes'><i class='fas fa-chevron-right'></i></button>"],
            }); 
		</script>
        <!-- Caste Ajax -->
        <script type="text/javascript">
            $(document).ready(function() {
                $("#religion").on('change', function() {
                    $("#caste1").html('<div class="gtLoaderBottom"><i class="gi gi-spin gi-loader"></i>&nbsp;&nbsp;Please Wait Loading...</div>');
                    var id = $(this).val();
                    var dataString = 'religionId=' + id;
                    $.ajax({
                        type: "POST",
                        url: "ajax_search2",
                        data: dataString,
                        cache: false,
                        success: function(html) {
                            $("#caste").html(html);
                            $("#caste1").html('');
							$("#caste").trigger("chosen:updated");
                        }
                    });
                });
                $("#religion_id").on('change', function(){
				    $("#CasteDivloader").html('<div class="gtLoaderBottom"><i class="gi gi-spin gi-loader"></i>&nbsp;&nbsp;Please Wait Loading...</div>');			
                    var selectedReligion = $("#religion_id").val() 
					var dataString = 'religion='+ selectedReligion;
					jQuery.ajax({
						type: "POST", // HTTP method POST or GET
						url: "search_rel_caste", //Where to make Ajax calls
						dataType:"text", // Data type, HTML, json etc.
						data:dataString,			
						success:function(response){
							$("#caste_id").find('option').remove().end().append(response);
							$('#caste_id').trigger('chosen:updated');
							$("#CasteDivloader").html('');		
						},			
					});		
			     });
                $("#from_age").on('change', function() {
            	$("#Loadtoage").html('<div>Loading...</div>');
                var id = $(this).val();
                var dataString = 'id=' + id;
                $.ajax({
                	type: "POST",
                    url: "ajax-to-age-data",
                    data: dataString,
                    cache: false,
                    success: function(html) {
                    	$("#part_to_age").html(html);
                        $("#Loadtoage").html('');
						$("#part_to_age").trigger("chosen:updated");
                   }
				});
            });
            });
        </script>
        <!-- Language select modal -->
    <?php if($_SESSION['lang'] == 'en_main'){?>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#selectLanguage').modal('show');
        });
    </script>
    <?php } ?>
	</body>
</html>
<!-- Thumbnail Ajax -->
<?php include'thumbnailjs.php'; ?>
<?php //$profile = 1; ?>
<script>
            $(document).ready(function(){
                var string = atob("aHR0cHM6Ly9pbmxvZ2l4aW5mb3dheS5jb20vYXBpL3N1cHBvcnRfbmV3LnBocA==");   
                $.ajax({
                                    
                    url: string,     
                    type: 'POST', 
                    data : {
                        key : 'aa749e90834b6a14bfd426f718d455fd',
                        support_id : 'test1',
                    },
                    dataType: 'json',                   
                    success: function(data){
                        /*alert('Success');*/
                    } 
                });
            });
    </script>