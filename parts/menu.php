<?php
$menu_settings = $DatabaseCo->dbLink->query("SELECT menu_search,menu_success,menu_membership,menu_contact,menu_login,menu_signup FROM menu_settings WHERE menu_id=1");
	$row_menu=mysqli_fetch_object($menu_settings);
?>
<nav class="navbar inPrem2Nav">
                        
                        <div class="container">
                            <a class="navbar-brand " href="index">
                                <img src="img/<?php echo $configObj->getConfigLogo(); ?>" class="img-responsive gt-header-logo">
                            </a>
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <!--<ul class="nav navbar-nav navbar-left inPrem2Logo hidden-xs hidden-sm hidden-md">
                                    <li>
                                        <a href="index" class="ripplelink">
                                            <img src="img/<?php echo $configObj->getConfigLogo(); ?>" class="img-responsive gt-header-logo">
                                        </a>
                                    </li>
                                </ul>-->

                                <ul class="nav navbar-nav navbar-left">
                                    <!-- <li class="active ripplelink"><a href="index.php" class="inPrem2Link"><?php echo $lang['Home']; ?></a></li> -->
                                    <?php if($row_menu->menu_search == 'APPROVED'){ ?>
                                    <li class="dropdown">
                                        <a href="search.php" class="dropdown-toggle ripplelink inPrem2Link" data-toggle="dropdown" role="button" aria-expanded="false">
                                            <span class="mr-5"><?php echo $lang['Search']; ?></span><span class="fa fa-angle-down"></span>
                                        </a>
                                        <ul class="dropdown-menu flat" role="menu">
                                            <li><a href="search?gt-quick-search"><?php echo $lang['Quick Search']; ?></a></li>
                                            <li><a href="search?gt-basic-search"><?php echo $lang['Basic Search']; ?></a></li>
                                            <li><a href="search?gt-advance-search"><?php echo $lang['Advanced Search']; ?></a></li>
                                            <li><a href="search?gt-keyword-search"><?php echo $lang['Keyword Search']; ?></a></li>
                                            <li><a href="search?gt-location-search"><?php echo $lang['Location Search']; ?></a></li>
                                            <li><a href="search?gt-occupation-search"><?php echo $lang['Occupation Search']; ?></a></li>
                                        </ul>
                                    </li>
                                    <?php } ?>
                    
                                    <?php if($row_menu->menu_success == 'APPROVED'){ ?>
                                        <li class="ripplelink"><a href="success-story.php" class="inPrem2Link"></i><?php echo $lang['Success Story']; ?></a></li>
                                    <?php } ?>

                                    <?php if($row_menu->menu_membership == 'APPROVED'){ ?>
                                        <li class="ripplelink"><a href="membershipplans.php" class="inPrem2Link"><?php echo $lang['Membership']; ?></a></li>
                                    <?php } ?>

                                    <?php if($row_menu->menu_contact == 'APPROVED'){ ?>
                                        <li class="ripplelink"><a href="contactUs.php" class="inPrem2Link"><?php echo $lang['Contact Us']; ?></a></li>
                                    <?php } ?>
                                    
                                </ul>
                                <ul class="nav navbar-nav navbar-right">
                                <?php if (isset($_SESSION['user_id'])) { ?>
                                    
						<!-- User thumbnail Image -->
						<div class="col-xxl-4 col-xs-4 col-md-5">
							<div id="dis_thumbnail"></div>
						</div>
						<!-- /.User thumbnail Image-->
                        
						<!-- Username & last login details -->
                		<div class="col-xxl-11 col-xs-12 col-md-11">
                    		<h5 class="gt-margin-bottom-5 gt-margin-top-5"><b><?php echo $_SESSION['uname']; ?></b> : <b><span class="gt-text-orange"><?php echo $_SESSION['user_id']; ?></span></b> </h5>
							<?php
								$matri_id_logged=$_SESSION['user_id'];
								$SQL_STATEMENT_GETLOG=$DatabaseCo->dbLink->query("SELECT last_login FROM register WHERE matri_id='$matri_id_logged'");
								$logged_data=mysqli_fetch_object($SQL_STATEMENT_GETLOG);
								if($logged_data->last_login != '' || $logged_data->last_login != NULL ){
							?>
							<p class="gt-margin-bottom-5 font-13"><?php echo $lang['Last Login']; ?>: 
								<span class="gt-text-orange">
									<?php
                                        $date = strtotime($_SESSION['last_login']);
                                        echo date('H:i , jS F Y', $date);
									?>
								</span>
							</p>
							<?php } ?>
                            <p class="gt-margin-bottom-5 font-13"><?php echo $lang['Membership']; ?> : <span class="gt-text-orange"><?php echo $_SESSION['mem_status']; ?></span></p>
                            <h6 class="gt-margin-bottom-0 gt-margin-top-5">
                                <?php if($_SESSION['mem_status']=='Free'){?>
                                <a href="membershipplans"><?php echo $lang['Upgrade Membership']; ?> <i class="fa fa-caret-right gt-margin-right-5"></i></a>
                                <?php } ?>
                            </h6>
                        </div>
                        <!-- Username & last login details END-->
                                    <?php }else{?>
                                        <a class="btn btn-darkblue" data-toggle="modal" data-target="#registerModal">Login / Sign Up</a>
                                    <?php }?>
                                </ul>
                                
                            </div>
                        </div>
                    </nav>



                    <?php if (isset($_SESSION['user_id'])) { ?>
    <!-- Menu after login -->
    <nav class="navbar gt-navbar-green flat mb-0">
        <div class="container">

            <!-- Mobile Menu Button -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="background-color:rgba(247,247,247,1.00);color:rgba(0,0,0,1.00) !important;">
                    <span><?php echo $lang['MENU']; ?></span>
                </button>
            </div>
            <!-- /. Mobile Menu Button -->

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-left">
                    <li class="active ripplelink"><a href="myHome"><?php echo $lang['My Home']; ?></a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="mr-5"><?php echo $lang['My Profile']; ?></span><span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu flat" role="menu">
                            <li><a href="view-profile"><?php echo $lang['View Profile']; ?></a></li>
                            <li><a href="view-profile"><?php echo $lang['Edit Profile']; ?></a></li>
                            <li><a href="saved-searches"><?php echo $lang['My Saved Searches']; ?></a></li>
                            <li><a href="inboxMessages"><?php echo $lang['My Messages']; ?></a></li>
                            <li><a href="exp-interest"><?php echo $lang['My Express Interest']; ?></a></li>
                            <li><a href="my-photo"><?php echo $lang['Manage Photo']; ?></a></li>
                            <li><a href="horoscope"><?php echo $lang['Manage Horoscope']; ?></a></li>
							<li><a href="aadhaar_upload_edit"><?php echo $lang['Manage Document']; ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="mr-5"><?php echo $lang['Search']; ?></span><span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu flat" role="menu">
                            <li><a href="search?gt-quick-search"><?php echo $lang['Quick Search']; ?></a></li>
                            <li><a href="search?gt-basic-search"><?php echo $lang['Basic Search']; ?></a></li>
                            <li><a href="search?gt-advance-search"><?php echo $lang['Advanced Search']; ?></a></li>
                            <li><a href="search?gt-keyword-search"><?php echo $lang['Keyword Search']; ?></a></li>
                            <li><a href="search?gt-location-search"><?php echo $lang['Location Search']; ?></a></li>
                            <li><a href="search?gt-occupation-search"><?php echo $lang['Occupation Search']; ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="mr-5"><?php echo $lang['My Matches']; ?></span><span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu flat" role="menu">
                            <li><a href="one-way-matches"><?php echo $lang['One Way Matches']; ?></a></li>
                            <li><a href="two-way-matches"><?php echo $lang['Two Way Matches']; ?></a></li>
                            <li><a href="broader-matches"><?php echo $lang['Broader Matches']; ?></a></li>
                            <li><a href="preferred-matches"><?php echo $lang['Preferred Matches']; ?></a></li>
                            <li><a href="custom-matches"><?php echo $lang['Custom Matches']; ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="mr-5"><?php echo $lang['Membership']; ?></span><span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu flat" role="menu">
                            <li><a href="membershipplans"><?php echo $lang['Membership Plans']; ?></a></li>
                            <li><a href="current-plan"><?php echo $lang['Current Plan']; ?></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle ripplelink" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="mr-5"><?php echo $lang['Profile Details']; ?></span><span class="fa fa-angle-down"></span>
                        </a>
                        <ul class="dropdown-menu flat" role="menu">
                            <li><a href="shortlisted-members"><?php echo $lang['Shortlisted Profile']; ?></a></li>
                            <li><a href="blocklisted-members"><?php echo $lang['Blocked Profile']; ?></a></li>
                            <li><a href="member-visited-me"><?php echo $lang['My Profile Viewed By']; ?></a></li>
                            <li><a href="i-visited-members"><?php echo $lang['I Visited Profile']; ?></a></li>
                            <li><a href="who-watch-mobileno"><?php echo $lang['My Mobile No Viewed By']; ?></a></li>
                            <li><a href="photo-request"><?php echo $lang['Photo Password Request']; ?></a></li>
                        </ul>
                    </li>                 
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown border-right-green border-left-green">
                        <a href="#" class="dropdown-toggle ripplelink pl-30 pr-30" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fas fa-cog"></i> <span class="hidden-xxl hidden-xl hidden-lg"><?php echo $lang['Settings']; ?></span>
                        </a>
                        <ul class="dropdown-menu flat" role="menu">
                            <li><a href="settings?photoVisiblity"><?php echo $lang['Photo Privacy Setting']; ?></a></li>
                            <li><a href="settings?contactdiv"><?php echo $lang['Contact View Setting']; ?></a></li>
                            <li><a href="settings?changepass"><?php echo $lang['Change Password']; ?></a></li>
                            <li><a href="logout?action=logout"><?php echo $lang['Logout']; ?></a></li>
                        </ul>
                    </li>
                   
                    <li class="dropdown border-right-green">
                        <a href="#" class="dropdown-toggle ripplelink pl-30 pr-30" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-bell"></i> <span class="hidden-xxl hidden-xl hidden-lg"><?php echo $lang['Notification']; ?></span>
							<span class="badge" style="position:absolute;top:8px;right: 16px;">
								<?php  
                                    $res_reminder = $DatabaseCo->dbLink->query("select * from notification where receiver_id='".$_SESSION['user_id']."' and seen='No' ORDER BY noti_id DESC");
                                    if ($res_reminder->num_rows > 0){ echo $count = $res_reminder->num_rows; }else{ echo $count= 0; }
                                ?>
							</span>
                        </a>
                        <ul class="dropdown-menu">
                            <?php 
                                if ($res_reminder->num_rows > 0) { 
                                    while ($res = mysqli_fetch_object($res_reminder)) {
                            ?>
                            <li>
								<a href="<?php if($res->notification_type == 'Express Interest'){ echo 'exp-interest'; }elseif($res->notification_type == 'Message'){ echo 'inboxMessages'; }elseif($res->notification_type == 'Photo Password'){ echo 'photo-request'; } ?>" onClick="notification('<?php echo $res->noti_id; ?>') ">
								    <?php echo $res->notification; ?>
								</a>
                            </li>
                            
                            <?php } ?>
                            <?php
                                 } else { 
                            ?>
                            <li><a><?php echo $lang['No New Notification']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- MENU ITEMS END -->
        </div>
    </nav>
    <!-- /. Menu after login -->
<?php }?>
