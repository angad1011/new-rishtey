<?php
	$menu_settings = $DatabaseCo->dbLink->query("SELECT footer_contact,footer_faq,footer_refund,footer_terms,footer_policy,footer_report,footer_login,footer_register,footer_membership,footer_success,footer_about,footer_about_short FROM menu_settings WHERE menu_id=1");
	$row_menu=mysqli_fetch_object($menu_settings);
?>
<div class="container gt-margin-top-10">
	<?php include('level-3.php');?>
</div>
<!-- Footer -->
<footer class="footer-before-login gt-margin-top-25">
   <div class="container">
	  <div class="row">
		 <?php if($row_menu->footer_contact == 'APPROVED' || $row_menu->footer_faq == 'APPROVED' || $row_menu->footer_refund == 'APPROVED'){ ?>
		 <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
			<h5 class="gt-text-green gt-font-weight-600">
				<?php echo $lang['Help And Support']; ?>
            </h5>
 			<ul class="">
				<?php if($row_menu->footer_contact == 'APPROVED'){ ?>
				<li><a href="contactUs.php"><?php echo $lang['Contact Us']; ?></a></li>
				<?php } ?>
				<?php if($row_menu->footer_faq == 'APPROVED'){ ?>
				<li><a href="cms?cms_id=13"><?php echo $lang['FAQ']; ?></a></li>
				<?php } ?>
				<?php if($row_menu->footer_refund == 'APPROVED'){ ?>
				<li><a href="cms?cms_id=16"><?php echo $lang['Refund Policy']; ?></a></li>
				<?php } ?>
			</ul>
		 </div>
		 <?php } ?>
		 <?php if($row_menu->footer_terms == 'APPROVED' || $row_menu->footer_policy == 'APPROVED' || $row_menu->footer_report == 'APPROVED'){ ?>
		 <div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
			<h5 class="gt-text-green gt-font-weight-600">
				<?php echo $lang['Terms & Policy']; ?>
			</h5>
			<ul class="">
				<?php if($row_menu->footer_terms == 'APPROVED'){ ?>
				<li><a href="cms?cms_id=7"><?php echo $lang['Terms & Conditions']; ?></a></li>
				<?php } ?>
				<?php if($row_menu->footer_policy == 'APPROVED'){ ?>
			 	<li><a href="cms?cms_id=6"><?php echo $lang['Privacy Policy']; ?></a></li>
				<?php } ?>
				<?php if($row_menu->footer_report == 'APPROVED'){ ?>
				<li><a href="cms?cms_id=15"><?php echo $lang['Report Misuse']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
		<?php if($row_menu->footer_login == 'APPROVED' || $row_menu->footer_register == 'APPROVED' || $row_menu->footer_membership == 'APPROVED'){ ?>
		<div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
			<h5 class="gt-text-green gt-font-weight-600">
				<?php echo $lang['Need Help?']; ?>
			</h5>
			<ul class="">
            	<?php if (!isset($_SESSION['user_id'])) { ?>
				<?php if($row_menu->footer_login == 'APPROVED'){ ?>
            	<li><a href="login"><?php echo $lang['Login']; ?></a></li>
				<?php } ?>
				<?php if($row_menu->footer_register == 'APPROVED'){ ?>
 				<li><a href="index"><?php echo $lang['Register']; ?></a></li>
				<?php } ?>
                <?php } ?>
				<?php if($row_menu->footer_membership == 'APPROVED'){ ?>
 				<li><a href="membershipplans"><i class="fa fa-star text-red"></i> <?php echo $lang['Upgrade Membership']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
		<?php if($row_menu->footer_success == 'APPROVED' || $row_menu->footer_about == 'APPROVED' ){ ?>
		<div class="col-xxl-4 col-xl-4 col-lg-8 col-sm-16 col-md-8">
			<h5 class="gt-text-green gt-font-weight-600">
				<?php echo $lang['Information']; ?>
			</h5>
			<ul class="">
				<?php if($row_menu->footer_success == 'APPROVED'){ ?>
				<li><a href="success-story"><?php echo $lang['Success Story']; ?></a></li>
				<?php } ?>
				<?php if($row_menu->footer_about == 'APPROVED'){ ?>
				<li><a href="cms?cms_id=8"><?php echo $lang['About Us']; ?></a></li>
				<?php } ?>
			</ul>
		</div>
		<?php } ?>
      </div>
      <div class="row">
		  <div class="col-xxl-10 col-xl-10 col-lg-10 col-md-16">
			<?php if($row_menu->footer_about_short == 'APPROVED'){ ?>
			<h5 class="gt-text-green gt-font-weight-600"><?php echo $lang['About Us']; ?></h5>
            <p><?php echo $configObj->getConfigFshortDescription(); ?></p>
			<?php } ?>
		  </div>
		  <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-16 text-center">
				<h5 class="gt-text-green gt-font-weight-600">
                    <?php echo $lang['Join us on social']; ?>
                </h5>
				<?php
					$get_soc_icon=mysqli_fetch_object($DatabaseCo->dbLink->query("select facebook,twitter,linkedin,google,google_analytics_code from site_config where id='1'"));	
				?>
                <ul class="gt-footer-social">
                   <li><a href="<?php echo $get_soc_icon->facebook;?>" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
				   <li><a href="<?php echo $get_soc_icon->google;?>" target="_blank"><i class="fab fa-pinterest-square"></i></a></li>
                   <li><a href="<?php echo $get_soc_icon->twitter;?>" target="_blank"><i class="fab fa-twitter-square"></i></a></li>
				   <li><a href="<?php echo $get_soc_icon->linkedin;?>" target="_blank"><i class="fab fa-linkedin"></i></a></li>
 				</ul>
		  </div>
	   </div>   
   </div>
</footer>
<div class="container-fluid gt-footer-bottom">
  	<div class="row">
  		<div class="container text-center">
        	<?php echo $lang['All Rights Reserved By']; ?> @ <a href="<?php echo $configObj->getConfigName();?>"><?php echo $configObj->getConfigFooter();?></a>
        </div>
    </div>
</div>
<!--/. Footer -->
<a href="#selectLanguage" class="btn fixLangugeBtn" data-toggle="modal" style=""><i class="fas fa-language gt-margin-right-5"></i><span>Change language</span></a>
<div class="modal fade gtLogModal" id="selectLanguage" tabindex="-1" role="dialog" aria-labelledby="selectLanguage" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <div class="col-12">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $lang['Select your language']; ?>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </h5>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-16">
                        <div class="list-group">
                            <a href="index.php?lang=en" class="list-group-item list-group-item-action">English</a>
                            <a href="index.php?lang=hi" class="list-group-item list-group-item-action">हिंदी</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login With OTP Modal  -->
<div class="modal fade" id="loginWithOTP" tabindex="-1" role="dialog" aria-labelledby="loginWithOTPLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title text-center" id="loginWithOTPLabel"><?php echo $lang['Login With OTP']; ?></h5>
            </div>
            <div class="modal-body">
                <form class="" action="login-with-otp" method="post">
                    <div class="form-group">
                        <label><?php echo $lang['Email/Mobile No/Matri id']; ?></label>
                        <input type="text" name="userId" class="gt-form-control" placeholder="<?php echo $lang['Enter Email id / Mobile No / Matri Id']; ?>">
                    </div>
                    <div class="form-group text-center">
                        <input type="submit" value="<?php echo $lang['GET OTP']; ?>" class="btn btn-default">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- register modal -->
<div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

      <div class="modal-body">
        <div class="gt-slideup-form pull-right">
            <div class="gt-slideUp-form-head">
                <h4><?php echo $lang['REGISTER NOW']; ?></h4>
            </div>
            <div class="gt-slideUp-form-body">
                <form action="mobile-verification" id="frm" method="post" name="frm" onsubmit="return validateForm()">
                    <div class="col-xxl-16 col-xl-16 form-group gt-index-collab">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                                <select class="gt-form-control form-1" name="profile_by" >
                                    <option value=""><?php echo $lang['Profile Created By']; ?></option>
                                    <?php 
                                        $SQL_STATEMENT_PROFILE_BY = $DatabaseCo->dbLink->query("SELECT * FROM profile_by WHERE status='APPROVED' ORDER BY id ASC");
                                        while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_PROFILE_BY)) {
                                    ?>
                                    <option value="<?php echo $DatabaseCo->dbRow->id; ?>" ><?php echo $DatabaseCo->dbRow->profile_by; ?></option>
                                    <?php } ?>
                                </select>
                                <select class="gt-form-control form-2" name="gender">
                                    <option value=""><?php echo $lang['Select Gender']; ?></option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group gt-index-collab">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user fa-fw"></i></span>
                                <input type="text" class="gt-form-control form-1" placeholder="<?php echo $lang['Enter First Name']; ?>" name="nickname" id="nickname" ng-maxlength="30" ng-model="user.name">
                                <!-- <span ng-show="frm.lastname.$dirty && frm.lastname.$error.maxlength" class="text-danger gt-margin-left-10">Name Is Too Long!</span> -->
                                <input type="text" class="gt-form-control form-2" placeholder="<?php echo $lang['Enter Last Name']; ?>" name="lastname" id="lastname" ng-maxlength="30" ng-model="user.lastname">
                                <!-- <span ng-show="frm.nickname.$dirty && frm.nickname.$error.maxlength" class="text-danger gt-margin-left-10">Name Is Too Long !</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                <div class="row">
                                    <div class="col-xxl-4 col-xs-5 col-s-5 col-m-5 col-l-5">
                                        <select name="day" id="day" class="gt-form-control form-1" onchange="setDays(month, this, year)">
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-5 col-xs-6 col-s-6 col-m-6 col-l-6">
                                        <select name="month" id="month" class="gt-form-control" onchange="setDays(this, day, year)">
                                            <option value=""><?php echo $lang['Month']; ?></option>
                                            <option value="01">Jan</option>
                                            <option value="02">Feb</option>
                                            <option value="03">Mar</option>
                                            <option value="04">Apr</option>
                                            <option value="05">May</option>
                                            <option value="06">Jun</option>
                                            <option value="07">Jul</option>
                                            <option value="08">Aug</option>
                                            <option value="09">Sep</option>
                                            <option value="10">Oct</option>
                                            <option value="11">Nov</option>
                                            <option value="12">Dec</option>
                                        </select>
                                    </div>
                                    <div class="col-xxl-7 col-xs-5 col-s-5 col-m-5 col-l-5">
                                        <select name="year" id="year" class="gt-form-control" onchange="setDays(month, day, this)">
                                            <option value=""><?php echo $lang['Year']; ?></option>
                                            <?php
                                                $SQL_SITE_SETTING_BIRTHYEAR = $DatabaseCo->dbLink->query("SELECT birthyear FROM site_config WHERE id='1' ");
                                                $birth_year_data = mysqli_fetch_object($SQL_SITE_SETTING_BIRTHYEAR);
                                                $birth_year=$birth_year_data->birthyear;
                                                for ($x = $birth_year; $x >= 1924; $x--) { ?>
                                                <option value='<?php echo $x; ?>'>
                                                    <?php echo $x; ?>
                                                </option>
                                                <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        
                        <div class="row">
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-book fa-fw"></i></span>
                                <select class="gt-form-control flat chosen-single chosen-select" name="religion" id="religion">
                                    <option value=""><?php echo $lang['Select Your Religion']; ?></option>
                                    <?php
                                        $SQL_STATEMENT_religion = $DatabaseCo->dbLink->query("SELECT * FROM religion WHERE status='APPROVED' ORDER BY religion_name ASC");
                                    
                                        while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_religion)) {
                                    ?>
                                    <option value="<?php echo $DatabaseCo->dbRow->religion_id; ?>">
                                        <?php echo $DatabaseCo->dbRow->religion_name; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                                <div id="caste1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-users fa-fw"></i></span>
                                <select class="gt-form-control chosen-single chosen-select" name="caste" id="caste" >
                                    <option value=""><?php echo $lang['Select Religion First']; ?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        <div class="row">
                            <div class="input-group custom-chosen">
                                <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i></span>
                                <select class="gt-form-control chosen-single chosen-select" name="m_tongue" id="m_tongue" >
                                    <option value=""><?php echo $lang['Mother Tongue']; ?></option>
                                    <?php
                                        $SQL_STATEMENT_Mtongu = $DatabaseCo->dbLink->query("SELECT mtongue_id,mtongue_name FROM mothertongue WHERE status='APPROVED' ORDER BY mtongue_name ASC");
                                        while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_Mtongu)) {
                                    ?>
                                    <option value="<?php echo $DatabaseCo->dbRow->mtongue_id; ?>">
                                        <?php echo $DatabaseCo->dbRow->mtongue_name; ?>
                                    </option>
                                    
                                    <?php } ?>
                                </select>
                                <span class="f2">
                                    <select class="gt-form-control chosen-single chosen-select" name="country">
                                        <option value=""><?php echo $lang['Country']; ?></option>
                                        <?php
                                            $SQL_STATEMENT_country = $DatabaseCo->dbLink->query("SELECT country_id,country_name FROM country WHERE status='APPROVED'");
                                            while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_country)) {
                                        ?>
                                        <option value="<?php echo $DatabaseCo->dbRow->country_id; ?>" ><?php echo $DatabaseCo->dbRow->country_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone-alt fa-fw"></i></span>
                                <div class="row">
                                    <div class="col-xxl-5 col-xs-5 col-sm-5 col-md-5 col-lg-5">
                                        <select class="gt-form-control form-1" name="code" id="code" >
                                        <?php
                                            $SQL_STATEMENT_code = $DatabaseCo->dbLink->query("SELECT * FROM country_code");
                                            while ($DatabaseCo->dbRow = mysqli_fetch_object($SQL_STATEMENT_code)) {
                                        ?>
                                        <option value="+<?php echo $DatabaseCo->dbRow->phonecode; ?>" <?php if($DatabaseCo->dbRow->phonecode == "91"){ echo "selected";} ?> >+<?php echo $DatabaseCo->dbRow->phonecode; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                    <div class="col-xxl-11 col-xs-11 col-sm-11 col-md-11 col-lg-12">
                                        <input type="number" class="gt-form-control" placeholder="<?php echo $lang['Enter Your 10 Digit No']; ?>" name="mobile" id="mobile" maxlength="10" ng-maxlength="10" ng-minlength="5" ng-model="user.mobile">
                                        <!-- <span ng-show="frm.mobile.$dirty && frm.mobile.$error.maxlength" class="text-danger">Mobile Number Is Too Long !</span> -->
                                        <!-- <span ng-show="frm.mobile.$dirty && frm.mobile.$error.minlength" class="text-danger">Mobile Number Is Too Short !</span> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        <div class="row">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fas fa-at fa-fw"></i></span>
                                <input type="email" class="gt-form-control form-1" placeholder="<?php echo $lang['Enter Your Email Id']; ?>" name="email" ng-model="user.email">
                                <!-- <span ng-show="frm.email.$dirty && frm.email.$error.email" class="text-danger gt-margin-left-10">Enter Valid Email Id !</span> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-16 col-xl-16 form-group">
                        <div class="row">
                            <label for="terms" class="inTerms">
                                <input type="checkbox" id="terms" name="chk_terms" checked data-validetta="required"><span class="gt-margin-left-10">I accept <a href="cms?cms_id=7" target="_blank"><?php echo $lang['terms & conditions']; ?></a> <?php echo $lang['and']; ?> <a href="cms?cms_id=6" target="_blank"><?php echo $lang['privacy policy']; ?></a></span>.
                            </label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-xxl-16 text-center">
                            <button type="submit" class="btn btn-darkblue inIndexRegBtn" name="reg_sub"><?php echo $lang['Register Now']; ?></button>
							<a href="/login">Already Registered? Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
  </div>
</div>

<!-- Right Click Disable -->
<!--
<script language=JavaScript>
	function clickIE4(){
		if (event.button==2){
			return false;
		}
	}
	function clickNS4(e){
		if (document.layers||document.getElementById&&!document.all){
			if (e.which==2||e.which==3){
				return false;
			}
		}
	}
	if (document.layers){
		document.captureEvents(Event.MOUSEDOWN);
		document.onmousedown=clickNS4;
	}else if (document.all&&!document.getElementById){
		document.onmousedown=clickIE4;
	}
	document.oncontextmenu=new Function("return false")
</script>
-->
<!-- /.Right Click Disable -->

<!-- Live Chat -->
<script type="text/javascript">
	var auto_refresh = setInterval(
		function (){
			$('#count').load('parts/online').fadeIn("slow");
		},15000 
	); // refresh every 10 second
</script>
<script src="js/jquery.min.js"></script>
<small class="pull-right">
    <?php
        $mid = isset($_SESSION['user_id'])?$_SESSION['user_id']:0;
        $select=$DatabaseCo->dbLink->query("SELECT * FROM payments WHERE pmatri_id='$mid'");
        $fetch=mysqli_fetch_object($select);
        if(isset($fetch->exp_date)){
            $exp_date=$fetch->exp_date;
        }else{
            $exp_date="";
        }
        
        $today= date('Y-m-d');
	    if(isset($_SESSION['user_id']) && $_SERVER['PHP_SELF']!='/memprofile.php'){
    ?>
    <link rel="stylesheet" type="text/css" href="who-is-online/widget.css" />
    <script type="text/javascript" src="who-is-online/widget.js"></script>
    <div class="onlineWidget">
	    <div class="channel">
            <img class="preloader" src="who-is-online/img/preloader.gif" alt="Loading.." width="22" height="22" />
        </div>
	    <div class="count" id="count"></div>
        <div class="label">online member</div>
        <div class="arrow"></div>
    </div>
<?php } ?>
</small>
<!-- /. Live Chat -->

<!-- Analytic Code -->
<?php $google = mysqli_fetch_object($DatabaseCo->dbLink->query("select google_analytics_code from site_config where id='1'")); ?>
<script>
	var id = '<?php echo $google->google_analytics_code; ?>';
  	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  	})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
	ga('create', id, 'auto');
  	ga('send', 'pageview');
</script>
<!-- /.Analytic Code -->


 