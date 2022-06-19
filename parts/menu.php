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
                                    <a class="btn btn-darkblue" data-toggle="modal" data-target="#registerModal">Login / Sign Up</a>
                                </ul>
                            </div>
                        </div>
                    </nav>